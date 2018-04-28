<?php

add_filter("login_redirect", "sp_login_redirect", 10, 3);

function sp_login_redirect($redirect_to, $request, $user){
    if(is_array($user->roles))
        if(in_array('administrator', $user->roles))
            return home_url('/wp-admin/');
    return home_url();
}

/* Отключаем админ панель для всех, кроме администраторов. */
if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;

?>
