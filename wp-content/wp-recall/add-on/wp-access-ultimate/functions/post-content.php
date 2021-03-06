<?php

add_filter( 'wp', 'wau_setup_content_filter', 10 );
function wau_setup_content_filter() {
	add_filter( 'the_content', 'wau_filter_content', wau_get_option( 'filter-priority', 10 ) );
	add_filter( 'the_excerpt', 'wau_filter_excerpt', wau_get_option( 'filter-priority', 10 ) );
}

function wau_filter_content( $content ) {
	global $WAU_User, $WAU_Post, $post; //print_r(array('content'));

	if ( wau_get_option( 'author-show' ) && $WAU_User->user_id == $post->post_author )
		return $content;

	if ( is_archive() || doing_filter( 'get_the_excerpt' ) ) {
		return wau_filter_excerpt( $content );
	}

	if ( ! wau_check_post_type( get_post_type( $post ) ) )
		return $content;

	if ( $accountIds = wau_get_post_closed_term_ids( $post->ID ) ) {

		return wau_get_access_box_single_page( $accountIds );
	}

	if ( ! $WAU_Post || ! $WAU_Post->access || $WAU_Post->post_id != $post->ID )
		return $content;

	$account_ids = array();

	if ( $WAU_Post->options['important'] ) {

		foreach ( $WAU_Post->access as $access ) {
			if ( ! $WAU_User->is_branch_access( $access->account_id, 1 ) ) {
				$account_ids[] = $access->account_id;
			}
		}

		if ( ! $account_ids )
			return $content;
	} else {

		$account_ids = $WAU_Post->get_account_ids();

		if ( $WAU_User->is_branch_access( $account_ids, 0 ) ) {
			return $content;
		}
	}

	return wau_get_access_box_single_page( $account_ids );
}

function wau_filter_excerpt( $content ) {
	global $WAU_User, $post; //print_r(array('excerpt'));

	if ( ! wau_check_post_type( get_post_type( $post ) ) )
		return $content;

	if ( $accountIds = wau_get_post_closed_term_ids( $post->ID ) ) {

		$content = str_replace( array(
			'{accountName}',
			'{excerpt}'
			), array(
			wau_get_account_field( $accountIds[0], 'account_name' ),
			$post->post_excerpt
			), wau_get_option( 'access-text-archive' ) );

		return $content;
	}

	$WAU_Post = new WAU_Post( array(
		'post_id' => $post->ID
		) );

	if ( ! $WAU_Post->access )
		return $content;

	$accountIds = $WAU_Post->get_account_ids();

	if ( $WAU_User->is_branch_access( $accountIds ) ) {
		return $content;
	}

	$content = str_replace( array(
		'{accountName}',
		'{excerpt}'
		), array(
		wau_get_account_field( $accountIds[0], 'account_name' ),
		$post->post_excerpt
		), wau_get_option( 'access-text-archive' ) );

	return $content;
}

function wau_get_post_closed_term_ids( $post_id ) {
	global $WAU_User;

	$closedAccess = array();

	$PostTerms = new WAU_Post_Terms( array( 'post_id' => $post_id ) );
	//print_r( $PostTerms );
	if ( ! $PostTerms->terms_access )
		return false;

	foreach ( $PostTerms->terms_access as $term_access ) {

		$account_ids = array();

		if ( $term_access->options['important'] ) {

			foreach ( $term_access->access as $access ) {
				if ( ! $WAU_User->is_branch_access( $access->account_id, 1 ) ) {
					$closedAccess[] = $access->account_id;
				}
			}
		} else {

			foreach ( $term_access->access as $access ) {
				$account_ids[] = $access->account_id;
			}

			if ( ! $WAU_User->is_branch_access( $account_ids ) ) {
				$closedAccess = array_merge( $closedAccess, $account_ids );
			}
		}
	}

	return $closedAccess;
}

function wau_get_access_box_single_page( $account_ids ) {
	global $user_ID, $post, $WAU_Post;

	$notice = '';

	if ( $genNotice = wau_get_option( 'access-text-single' ) ) {
		$notice .= '<div class="wau-general-notice">' . $genNotice . '</div>';
	}

	if ( $user_ID ) {

		if ( $memberNotice = wau_get_option( 'access-member-notice' ) ) {
			$notice .= '<div class="wau-member-notice">' . $memberNotice . '</div>';
		}
	} else {

		if ( $guestNotice = wau_get_option( 'access-guest-notice' ) ) {
			$notice .= '<div class="wau-guest-notice">' . $guestNotice . '</div>';
		}
	}

	$content = str_replace( array(
		'{accountName}',
		'{excerpt}'
		), array(
		wau_get_account_field( $account_ids[0], 'account_name' ),
		$post->post_excerpt
		), do_shortcode( $notice ) );

	if ( $user_ID || wau_get_option( 'access-guest-card' ) ) {
		$content .= wau_get_accounts_box( $account_ids, $WAU_Post->options );
	}

	return $content;
}
