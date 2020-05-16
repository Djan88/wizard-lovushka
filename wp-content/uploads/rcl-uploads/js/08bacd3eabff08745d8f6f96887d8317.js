var rcl_actions = [ ]; var rcl_filters = [ ]; var rcl_beats = [ ]; var rcl_beats_delay = 0; var rcl_url_params = rcl_get_value_url_params(); jQuery.fn.extend( { animateCss: function( animationNameStart, functionEnd ) { var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend'; this.addClass( 'animated ' + animationNameStart ).one( animationEnd, function() { jQuery( this ).removeClass( 'animated ' + animationNameStart ); if ( functionEnd ) { if ( typeof functionEnd == 'function' ) { functionEnd( this ); } else { jQuery( this ).animateCss( functionEnd ); } } } ); return this; } } ); function rcl_do_action( action_name ) { var callbacks_action = rcl_actions[action_name]; if ( !callbacks_action ) return false; var args = [ ].slice.call( arguments, 1 ); callbacks_action.forEach( function( callback, i, callbacks_action ) { window[callback].apply( this, args ); } ); } function rcl_add_action( action_name, callback ) { if ( !rcl_actions[action_name] ) { rcl_actions[action_name] = [ callback ]; } else { var i = rcl_actions[action_name].length; rcl_actions[action_name][i] = callback; } } function rcl_apply_filters( filter_name ) { var args = [ ].slice.call( arguments, 1 ); var callbacks_filter = rcl_filters[filter_name]; if ( !callbacks_filter ) return args[0]; callbacks_filter.forEach( function( callback, i, callbacks_filter ) { args[0] = window[callback].apply( this, args ); } ); return args[0]; } function rcl_add_filter( filter_name, callback ) { if ( !rcl_filters[filter_name] ) { rcl_filters[filter_name] = [ callback ]; } else { var i = rcl_filters[filter_name].length; rcl_filters[filter_name][i] = callback; } } function rcl_get_value_url_params() { var tmp_1 = new Array(); var tmp_2 = new Array(); var rcl_url_params = new Array(); var get = location.search; if ( get !== '' ) { tmp_1 = ( get.substr( 1 ) ).split( '&' ); for ( var i = 0; i < tmp_1.length; i++ ) { tmp_2 = tmp_1[i].split( '=' ); rcl_url_params[tmp_2[0]] = tmp_2[1]; } } return rcl_url_params; } function rcl_is_valid_url( url ) { var objRE = /http(s?):\/\/[-\w\.]{3,}\.[A-Za-z]{2,3}/; return objRE.test( url ); } function setAttr_rcl( prmName, val ) { var res = ''; var d = location.href.split( "#" )[0].split( "?" ); var base = d[0]; var query = d[1]; if ( query ) { var params = query.split( "&" ); for ( var i = 0; i < params.length; i++ ) { var keyval = params[i].split( "=" ); if ( keyval[0] !== prmName ) { res += params[i] + '&'; } } } res += prmName + '=' + val; return base + '?' + res; } function rcl_update_history_url( url ) { if ( url != window.location ) { if ( history.pushState ) { window.history.pushState( null, null, url ); } } } function rcl_init_cookie() { jQuery.cookie = function( name, value, options ) { if ( typeof value !== 'undefined' ) { options = options || { }; if ( value === null ) { value = ''; options.expires = -1; } var expires = ''; if ( options.expires && ( typeof options.expires === 'number' || options.expires.toUTCString ) ) { var date; if ( typeof options.expires === 'number' ) { date = new Date(); date.setTime( date.getTime() + ( options.expires * 24 * 60 * 60 * 1000 ) ); } else { date = options.expires; } expires = '; expires=' + date.toUTCString(); } var path = options.path ? '; path=' + ( options.path ) : ''; var domain = options.domain ? '; domain=' + ( options.domain ) : ''; var secure = options.secure ? '; secure' : ''; document.cookie = [ name, '=', encodeURIComponent( value ), expires, path, domain, secure ].join( '' ); } else { var cookieValue = null; if ( document.cookie && document.cookie !== '' ) { var cookies = document.cookie.split( ';' ); for ( var i = 0; i < cookies.length; i++ ) { var cookie = jQuery.trim( cookies[i] ); if ( cookie.substring( 0, name.length + 1 ) === ( name + '=' ) ) { cookieValue = decodeURIComponent( cookie.substring( name.length + 1 ) ); break; } } } return cookieValue; } }; } function rcl_add_dynamic_field( e ) { var parent = jQuery( e ).parents( '.dynamic-value' ); var box = parent.parent( '.dynamic-values' ); var html = parent.html(); box.append( '<span class="dynamic-value">' + html + '</span>' ); jQuery( e ).attr( 'onclick', 'rcl_remove_dynamic_field(this);return false;' ).children( 'i' ).toggleClass( "fa-plus fa-minus" ); box.children( 'span' ).last().children( 'input' ).val( '' ).focus(); } function rcl_remove_dynamic_field( e ) { jQuery( e ).parents( '.dynamic-value' ).remove(); } function rcl_update_require_checkbox( e ) { var name = jQuery( e ).attr( 'name' ); var chekval = jQuery( 'form input[name="' + name + '"]:checked' ).val(); if ( chekval ) jQuery( 'form input[name="' + name + '"]' ).attr( 'required', false ); else jQuery( 'form input[name="' + name + '"]' ).attr( 'required', true ); } function rcl_rand( min, max ) { if ( max ) { return Math.floor( Math.random() * ( max - min + 1 ) ) + min; } else { return Math.floor( Math.random() * ( min + 1 ) ); } } function rcl_notice( text, type, time_close ) { time_close = time_close || false; var options = { text: text, type: type, time_close: time_close }; options = rcl_apply_filters( 'rcl_notice_options', options ); var notice_id = rcl_rand( 1, 1000 ); var html = '<div id="notice-' + notice_id + '" class="notice-window type-' + options.type + '"><a href="#" class="close-notice"><i class="rcli fa-times"></i></a>' + options.text + '</div>'; if ( !jQuery( '#rcl-notice' ).size() ) { jQuery( 'body > div' ).last().after( '<div id="rcl-notice">' + html + '</div>' ); } else { if ( jQuery( '#rcl-notice > div' ).size() ) jQuery( '#rcl-notice > div:last-child' ).after( html ); else jQuery( '#rcl-notice' ).html( html ); } jQuery( '#rcl-notice > div' ).last().animateCss( 'slideInLeft' ); if ( time_close ) { setTimeout( function() { rcl_close_notice( '#rcl-notice #notice-' + notice_id ) }, options.time_close ); } } function rcl_close_notice( e ) { var timeCook = jQuery( e ).data( 'notice_time' ); if ( timeCook ) { var idCook = jQuery( e ).data( 'notice_id' ); var block = jQuery( e ).parents( '.rcl-notice' ); jQuery( block ).animateCss( 'flipOutX', function() { jQuery( block ).remove(); } ); jQuery.cookie( idCook, '1', { expires: timeCook, path: '/' } ); } else { jQuery( e ).animateCss( 'flipOutX', function( e ) { jQuery( e ).hide(); } ); } return false; } function rcl_preloader_show( e, size ) { var font_size = ( size ) ? size : 80; var margin = font_size / 2; var options = { size: font_size, margin: margin, icon: 'fa-circle-o-notch', class: 'rcl_preloader' }; options = rcl_apply_filters( 'rcl_preloader_options', options ); var style = 'style="font-size:' + options.size + 'px;margin: -' + options.margin + 'px 0 0 -' + options.margin + 'px;"'; var html = '<div class="' + options.class + '"><i class="rcli ' + options.icon + ' fa-spin" ' + style + '></i></div>'; if ( typeof ( e ) === 'string' ) jQuery( e ).after( html ); else e.append( html ); } function rcl_preloader_hide() { jQuery( '.rcl_preloader' ).remove(); } function rcl_setup_datepicker_options() { jQuery.datepicker.setDefaults( jQuery.extend( jQuery.datepicker.regional["ru"] ) ); var options = { monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ], dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ], firstDay: 1, dateFormat: 'yy-mm-dd', yearRange: "1950:c+3", changeYear: true }; options = rcl_apply_filters( 'rcl_datepicker_options', options ); return options; } function rcl_show_datepicker( e ) { jQuery( e ).datepicker( rcl_setup_datepicker_options() ); jQuery( e ).datepicker( "show" ); rcl_add_action( 'rcl_upload_tab', 'rcl_remove_datepicker_box' ); } function rcl_remove_datepicker_box() { jQuery( '#ui-datepicker-div' ).remove(); } function rcl_init_field_file( field_id ) { jQuery( "#" + field_id ).parents( 'form' ).attr( "enctype", "multipart/form-data" ); } function rcl_init_runner( props ) { var box = jQuery( '#rcl-runner-' + props.id ); box.children( '.rcl-runner-box' ).slider( { value: parseInt( props.value ), min: parseInt( props.min ), max: parseInt( props.max ), step: parseInt( props.step ), create: function( event, ui ) { var value = box.children( '.rcl-runner-box' ).slider( 'value' ); box.children( '.rcl-runner-value' ).text( value ); box.children( '.rcl-runner-field' ).val( value ); }, slide: function( event, ui ) { box.find( '.rcl-runner-value' ).text( ui.value ); box.find( '.rcl-runner-field' ).val( ui.value ); } } ); } function rcl_init_range( props ) { var box = jQuery( '#rcl-range-' + props.id ); box.children( '.rcl-range-box' ).slider( { range: true, values: [ parseInt( props.values[0] ), parseInt( props.values[1] ) ], min: parseInt( props.min ), max: parseInt( props.max ), step: parseInt( props.step ), create: function( event, ui ) { var values = box.children( '.rcl-range-box' ).slider( 'values' ); box.children( '.rcl-range-value' ).text( values[0] + ' - ' + values[1] ); box.children( '.rcl-range-min' ).val( values[0] ); box.children( '.rcl-range-max' ).val( values[1] ); }, slide: function( event, ui ) { box.children( '.rcl-range-value' ).text( ui.values[0] + ' - ' + ui.values[1] ); box.find( '.rcl-range-min' ).val( ui.values[0] ); box.find( '.rcl-range-max' ).val( ui.values[1] ); } } ); } function rcl_init_color( id, props ) { jQuery( "#" + id ).wpColorPicker( props ); } function rcl_init_field_maxlength( fieldID ) { var field = jQuery( '#' + fieldID ); var maxlength = field.attr( 'maxlength' ); if ( !field.parent().find( '.maxlength' ).size() ) { if ( field.val() ) { maxlength = maxlength - field.val().length; } field.after( '<span class="maxlength">' + maxlength + '</span>' ); } field.on( 'keyup', function() { var maxlength = jQuery( this ).attr( 'maxlength' ); if ( !maxlength ) return false; var word = jQuery( this ); var count = maxlength - word.val().length; jQuery( this ).next().text( count ); if ( word.val().length > maxlength ) word.val( word.val().substr( 0, maxlength ) ); } ); } function rcl_init_ajax_editor( id, options ) { if ( typeof QTags === 'undefined' ) return false; rcl_do_action( 'rcl_pre_init_ajax_editor', { id: id, options: options } ); var qt_options = { id: id, buttons: ( options.qt_buttons ) ? options.qt_buttons : "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close" }; QTags( qt_options ); QTags._buttonsInit(); if ( options.tinymce ) { tinyMCEPreInit.qtInit[id] = qt_options; tinyMCEPreInit.mceInit[id] = { body_class: id, selector: '#' + id, menubar: false, skin: "lightgray", theme: 'modern', toolbar1: "formatselect,bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv", toolbar2: "strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help", wpautop: true }; tinymce.init( tinyMCEPreInit.mceInit[id] ); tinyMCE.execCommand( 'mceAddEditor', true, id ); switchEditors.go( id, 'html' ); } } function rcl_setup_quicktags( newTags ) { if ( typeof QTags === 'undefined' ) return false; newTags.forEach( function( tagArray, i, newTags ) { QTags.addButton( tagArray[0], tagArray[1], tagArray[2], tagArray[3], tagArray[4], tagArray[5], tagArray[6] ); } ); } rcl_add_action( 'rcl_pre_init_ajax_editor', 'rcl_add_ajax_quicktags' ); function rcl_add_ajax_quicktags( editor ) { if ( typeof Rcl === 'undefined' || !Rcl.QTags ) return false; rcl_setup_quicktags( Rcl.QTags ); } rcl_add_action( 'rcl_footer', 'rcl_add_quicktags' ); function rcl_add_quicktags() { if ( typeof Rcl === 'undefined' || !Rcl.QTags ) return false; rcl_setup_quicktags( Rcl.QTags ); } function rcl_proccess_ajax_return( result ) { var methods = { redirect: function( url ) { var urlData = url.split( '#' ); if ( window.location.origin + window.location.pathname === urlData[0] ) { location.reload(); } else { location.replace( url ); } }, reload: function() { location.reload(); }, current_url: function( url ) { rcl_update_history_url( url ); }, dialog: function( dialog ) { if ( dialog.content ) { if ( jQuery( '#ssi-modalContent' ).size() ) ssi_modal.close(); var ssiOptions = { className: 'rcl-dialog-tab ' + ( dialog.class ? ' ' + dialog.class : '' ), sizeClass: dialog.size ? dialog.size : 'auto', content: dialog.content, buttons: [ ] }; if ( dialog.buttons ) { ssiOptions.buttons = dialog.buttons; } var buttonClose = true; if ( 'buttonClose' in dialog ) { buttonClose = dialog.buttonClose; } if ( buttonClose ) { ssiOptions.buttons.push( { label: Rcl.local.close, closeAfter: true } ); } if ( 'onClose' in dialog ) { ssiOptions.onClose = function( m ) { window[dialog.onClose[0]].apply( this, dialog.onClose[1] ); }; } if ( dialog.title ) ssiOptions.title = dialog.title; ssi_modal.show( ssiOptions ); } if ( dialog.close ) { ssi_modal.close(); } } }; for ( var method in result ) { if ( methods[method] ) { methods[method]( result[method] ); } } } function rcl_ajax( prop ) { if ( prop.data.ask ) { if ( !confirm( prop.data.ask ) ) { rcl_preloader_hide(); return false; } } if ( typeof Rcl != 'undefined' ) { if ( typeof prop.data === 'string' ) { prop.data += '&ajax_nonce=' + Rcl.nonce; } else if ( typeof prop.data === 'object' ) { prop.data.ajax_nonce = Rcl.nonce; } } var action = false; if ( typeof prop.data === 'string' ) { var propData = prop.data.split( '&' ); var propObj = { }; for ( var key in propData ) { propObj[propData[key].split( "=" )[0]] = propData[key].split( "=" )[1]; } action = propObj.action; } else if ( typeof prop.data === 'object' ) { action = prop.data.action; } jQuery.ajax( { type: 'POST', data: prop.data, dataType: 'json', url: ( typeof ajaxurl !== 'undefined' ) ? ajaxurl : Rcl.ajaxurl, success: function( result, post ) { if ( !result ) { rcl_notice( Rcl.local.error, 'error', 5000 ); return false; } if ( result.error || result.errors ) { rcl_preloader_hide(); if ( result.errors ) { jQuery.each( result.errors, function( index, error ) { rcl_notice( error, 'error', 5000 ); } ); } else { rcl_notice( result.error, 'error', 5000 ); } if ( prop.error ) prop.error( result ); return false; } if ( !result.preloader_live ) { rcl_preloader_hide(); } if ( result.success ) { rcl_notice( result.success, 'success', 5000 ); } if ( result.warning ) { rcl_notice( result.warning, 'warning', 5000 ); } rcl_do_action( 'rcl_ajax_success', result ); if ( prop.success ) { prop.success( result ); } else { rcl_proccess_ajax_return( result ); } rcl_do_action( action, result ); } } ); } function rcl_send_form_data( action, e ) { var form = jQuery( e ).parents( 'form' ); if ( !rcl_check_form( form ) ) return false; if ( e && jQuery( e ).parents( '.preloader-parent' ) ) { rcl_preloader_show( jQuery( e ).parents( '.preloader-parent' ) ); } rcl_ajax( { data: form.serialize() + '&action=' + action } ); } function rcl_check_form( form ) { var rclFormFactory = new RclForm( form ); return rclFormFactory.validate(); } function rcl_add_beat( beat_name, delay, data ) { delay = ( delay < 10 ) ? 10 : delay; var data = ( data ) ? data : false; var i = rcl_beats.length; rcl_beats[i] = { beat_name: beat_name, delay: delay, data: data }; } function rcl_remove_beat( beat_name ) { if ( !rcl_beats ) return false; var remove = false; var all_beats = rcl_beats; all_beats.forEach( function( beat, index, all_beats ) { if ( beat.beat_name != beat_name ) return; delete rcl_beats[index]; remove = true; } ); return remove; } function rcl_exist_beat( beat_name ) { if ( !rcl_beats ) return false; var exist = false; rcl_beats.forEach( function( beat, index, rcl_beats ) { if ( beat.beat_name != beat_name ) return; exist = true; } ); return exist; } function rcl_init_table( table_id ) { jQuery( '#' + table_id ).on( 'click', '.rcl-table__cell-must-sort', function() { jQuery( '#' + table_id ).find( '.rcl-table__cell-must-sort, .rcl-table__cell-sort' ).removeClass( 'rcl-table__cell-current-sort' ); var sortCell = jQuery( this ); var sortby = sortCell.data( 'sort' ); var route = sortCell.attr( 'data-route' ); sortCell.addClass( 'rcl-table__cell-current-sort' ); jQuery( '#' + table_id ).find( '[data-' + sortby + '-value]' ).addClass( 'rcl-table__cell-current-sort' ); var list = jQuery( '#' + table_id + ' .rcl-table__row-must-sort' ); list.sort( function( a, b ) { var aVal = jQuery( a ).find( '[data-' + sortby + '-value]' ).data( sortby + '-value' ); var bVal = jQuery( b ).find( '[data-' + sortby + '-value]' ).data( sortby + '-value' ); if ( route == 'asc' ) return ( aVal < bVal ) - ( aVal > bVal ); else return ( aVal > bVal ) - ( aVal < bVal ); } ); sortCell.attr( 'data-route', ( route == 'desc' ? 'asc' : 'desc' ) ); jQuery( '#' + table_id + ' .rcl-table__row-must-sort' ).remove(); list.each( function( i, e ) { jQuery( '#' + table_id + ' .rcl-table__row-header' ).after( jQuery( this ) ); } ); } ); } function RclForm( form ) { this.form = form; this.errors = { }; this.validate = function() { var valid = true; for ( var objKey in this.checkForm ) { var chekObject = this.checkForm[objKey]; if ( !chekObject.isValid.call( this ) ) { valid = false; break; } } ; if ( this.errors ) { for ( var k in this.errors ) { this.showError( this.errors[k] ); } ; } return valid; }; this.addChekForm = function( id, data ) { this.checkForm[id] = data; }; this.addChekFields = function( id, data ) { this.checkFields[id] = data; }; this.addError = function( id, error ) { this.errors[id] = error; }; this.shake = function( shakeBox ) { shakeBox.css( 'box-shadow', 'red 0px 0px 5px 1px inset' ).animateCss( 'shake' ); }; this.noShake = function( shakeBox ) { shakeBox.css( 'box-shadow', 'none' ); }; this.showError = function( error ) { rcl_notice( error, 'error', 10000 ); }; this.checkForm = { checkFields: { isValid: function() { var valid = true; var parent = this; this.form.find( 'input,select,textarea' ).each( function() { var field = jQuery( this ); var typeField = field.attr( 'type' ); if ( field.tagName && field.tagName.toLowerCase() == 'textarea' ) { typeField = 'textarea'; } var checkFields = rcl_apply_filters( 'rcl_form_check_rules', parent.checkFields, parent ); for ( var objKey in checkFields ) { var chekObject = checkFields[objKey]; if ( chekObject.types.length && jQuery.inArray( typeField, chekObject.types ) < 0 ) { continue; } var shakeBox = ( typeField == 'checkbox' ) ? field.next( 'label' ) : field; if ( !chekObject.isValid( field ) ) { parent.shake( shakeBox ); parent.addError( objKey, chekObject.errorText() ); valid = false; return; } else { parent.noShake( shakeBox ); } } ; } ); return valid; } } }; this.checkFields = { required: { types: [ ], isValid: function( field ) { var required = true; if ( !field.is( ":required" ) ) return required; var value = false; if ( field.attr( 'type' ) == 'checkbox' ) { if ( field.is( ":checked" ) ) { value = true; } } else { if ( field.val() ) value = true; } if ( !value ) { required = false; } return required; }, errorText: function() { return Rcl.errors.required; } }, numberRange: { types: [ 'number' ], isValid: function( field ) { var range = true; var val = field.val(); if ( val === '' ) return true; val = parseInt( val ); var min = parseInt( field.attr( 'min' ) ); var max = parseInt( field.attr( 'max' ) ); if ( min != 'undefined' && min > val || max != 'undefined' && max < val ) { range = false; } return range; }, errorText: function() { return Rcl.errors.number_range; } }, pattern: { types: [ 'text', 'tel' ], isValid: function( field ) { var val = field.val(); if ( !val ) return true; var pattern = field.attr( 'pattern' ); if ( !pattern ) return true; var re = new RegExp( pattern ); return re.test( val ); }, errorText: function() { return Rcl.errors.pattern; } }, fileMaxSize: { types: [ 'file' ], isValid: function( field ) { var valid = true; field.each( function() { var maxsize = jQuery( this ).data( "size" ); var fileInput = jQuery( this )[0]; var file = fileInput.files[0]; if ( !file ) return; var filesize = file.size / 1024 / 1024; if ( filesize > maxsize ) { valid = false; return; } } ); return valid; }, errorText: function() { return Rcl.errors.file_max_size; } }, fileAccept: { types: [ 'file' ], isValid: function( field ) { var valid = true; field.each( function() { var fileInput = jQuery( this )[0]; var file = fileInput.files[0]; var accept = fileInput.accept.split( ',' ); if ( !file ) return; if ( accept ) { var fileType = false; if ( file.type ) { for ( var i in accept ) { if ( accept[i] == file.type ) { fileType = true; return; } } } var exts = jQuery( this ).data( "ext" ); if ( !exts ) return; if ( !fileType ) { var exts = exts.split( ',' ); var filename = file.name; for ( var i in exts ) { if ( filename.indexOf( '.' + exts[i] ) + 1 ) { fileType = true; return; } } } if ( !fileType ) { valid = false; return; } } } ); return valid; }, errorText: function() { return Rcl.errors.file_accept; } } }; this.send = function( action, success ) { if ( !this.validate() ) return false; rcl_preloader_show( form ); var sendData = { data: form.serialize() + '&action=' + action }; if ( success ) { sendData.success = success; } rcl_ajax( sendData ); }; } jQuery(function($){ $.fn.extend({ insertAtCaret: function(myValue){ return this.each(function(i) { if (document.selection) { this.focus(); var sel = document.selection.createRange(); sel.text = myValue; this.focus(); } else if (this.selectionStart || this.selectionStart == '0') { var startPos = this.selectionStart; var endPos = this.selectionEnd; var scrollTop = this.scrollTop; this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length); this.focus(); this.selectionStart = startPos + myValue.length; this.selectionEnd = startPos + myValue.length; this.scrollTop = scrollTop; } else { this.value += myValue; this.focus(); } }) } }); rcl_do_action('rcl_init'); }); jQuery(window).load(function() { jQuery('body').on('drop', function (e) { return false; }); jQuery(document.body).bind("drop", function(e){ e.preventDefault(); }); }); rcl_add_action('rcl_init','rcl_init_ajax_tab'); function rcl_init_ajax_tab(){ jQuery('body').on('click','.rcl-ajax',function(){ var e = jQuery(this); if(e.hasClass('tab-upload')) return false; rcl_do_action('rcl_before_upload_tab',e); rcl_ajax({ data:{ action: 'rcl_ajax_tab', post: e.data('post'), tab_url: e.attr('href') }, success: function(data){ e.removeClass('tab-upload'); data = rcl_apply_filters('rcl_upload_tab',data); if(data.result.error){ rcl_notice(data.result.error,'error',10000); return false; } var url = data.post.tab_url; var supports = data.post.supports; var subtab_id = data.post.subtab_id; if(supports && supports.indexOf('dialog')>=0){ if(!subtab_id){ ssi_modal.show({ className: 'rcl-dialog-tab '+data.post.tab_id, sizeClass: 'small', buttons: [{ label: Rcl.local.close, closeAfter: true }], content: data.result }); }else{ var box_id = '#ssi-modalContent'; } }else{ rcl_update_history_url(url); if(!subtab_id) jQuery('.rcl-tab-button .recall-button').removeClass('active'); e.addClass('active'); var box_id = '#lk-content'; } if(box_id){ jQuery(box_id).html(data.result); var options = rcl_get_options_url_params(); if(options.scroll == 1){ var offsetTop = jQuery(box_id).offset().top; jQuery('body,html').animate({scrollTop:offsetTop - options.offset}, 1000); } if(data.includes){ var includes = data.includes; includes.forEach(function(src, i, includes) { jQuery.getScript(src); }); } } if(!data.post.subtab_id){ jQuery('#lk-content').animateCss('fadeIn'); }else{ jQuery('#lk-content .rcl-subtab-content').animateCss('fadeIn'); } rcl_do_action('rcl_upload_tab',{element:e,result:data}); } }); return false; }); } function rcl_get_options_url_params(){ var options = { scroll:1, offset:100 }; options = rcl_apply_filters('rcl_options_url_params',options); return options; } function rcl_add_dropzone(idzone){ jQuery(document.body).bind("drop", function(e){ var dropZone = jQuery(idzone), node = e.target, found = false; if(dropZone[0]){ dropZone.removeClass('in hover'); do { if (node === dropZone[0]) { found = true; break; } node = node.parentNode; } while (node != null); if(found){ e.preventDefault(); }else{ return false; } } }); jQuery(idzone).bind('dragover', function (e) { var dropZone = jQuery(idzone), timeout = window.dropZoneTimeout; if (!timeout) { dropZone.addClass('in'); } else { clearTimeout(timeout); } var found = false, node = e.target; do { if (node === dropZone[0]) { found = true; break; } node = node.parentNode; } while (node != null); if (found) { dropZone.addClass('hover'); } else { dropZone.removeClass('hover'); } window.dropZoneTimeout = setTimeout(function () { window.dropZoneTimeout = null; dropZone.removeClass('in hover'); }, 100); }); } function passwordStrength(password){ var desc = new Array(); desc[0] = Rcl.local.pass0; desc[1] = Rcl.local.pass1; desc[2] = Rcl.local.pass2; desc[3] = Rcl.local.pass3; desc[4] = Rcl.local.pass4; desc[5] = Rcl.local.pass5; var score = 0; if (password.length > 6) score++; if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++; if (password.match(/\d+/)) score++; if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++; if (password.length > 12) score++; document.getElementById("passwordDescription").innerHTML = desc[score]; document.getElementById("passwordStrength").className = "strength" + score; } function rcl_manage_user_black_list(e,user_id){ var class_i = jQuery(e).children('i').attr('class'); if(class_i=='rcli fa-refresh fa-spin') return false; jQuery(e).children('i').attr('class','rcli fa-refresh fa-spin'); rcl_ajax({ data: { action: 'rcl_manage_user_black_list', user_id: user_id }, success: function(data){ jQuery(e).children('i').attr('class',class_i); if(data['label']){ jQuery(e).find('span').text(data['label']); } } }); return false; } rcl_add_action('rcl_init','rcl_init_update_requared_checkbox'); function rcl_init_update_requared_checkbox(){ jQuery('body form').find('.required-checkbox').each(function(){ rcl_update_require_checkbox(this); }); jQuery('body form').on('click','.required-checkbox',function(){ rcl_update_require_checkbox(this); }); } function rcl_show_tab(id_block){ jQuery(".rcl-tab-button .recall-button").removeClass("active"); jQuery("#lk-content .recall_content_block").removeClass("active"); jQuery('#tab-button-'+id_block).children('.recall-button').addClass("active"); jQuery('#lk-content .'+id_block+'_block').addClass("active"); return false; } rcl_add_action('rcl_init','rcl_init_recallbar_hover'); function rcl_init_recallbar_hover(){ jQuery("#recallbar .menu-item-has-children").hover(function() { jQuery(this).children(".sub-menu").css({'visibility': 'visible'}); }, function() { jQuery(this).children(".sub-menu").css({'visibility': ''}); }); } rcl_add_action('rcl_before_upload_tab','rcl_add_class_upload_tab'); function rcl_add_class_upload_tab(e){ e.addClass('tab-upload'); } rcl_add_action('rcl_before_upload_tab','rcl_add_preloader_tab'); function rcl_add_preloader_tab(e){ rcl_preloader_show('#lk-content > div'); rcl_preloader_show('#ssi-modalContent > div'); } rcl_add_action('rcl_init','rcl_init_get_smilies'); function rcl_init_get_smilies(){ jQuery(document).on({ mouseenter: function () { var sm_box = jQuery(this).next(); var block = sm_box.children(); sm_box.show(); if(block.html()) return false; block.html(Rcl.local.loading+'...'); var dir = jQuery(this).data('dir'); rcl_ajax({ data: { action: 'rcl_get_smiles_ajax', area: jQuery(this).parent().data('area'), dir: dir? dir: 0 }, success: function(data){ if(data['content']){ block.html(data['content']); } } }); }, mouseleave: function () { jQuery(this).next().hide(); } }, "body .rcl-smiles .fa-smile-o"); } rcl_add_action('rcl_init','rcl_init_hover_smilies'); function rcl_init_hover_smilies(){ jQuery(document).on({ mouseenter: function () { jQuery(this).show(); }, mouseleave: function () { jQuery(this).hide(); } }, "body .rcl-smiles > .rcl-smiles-list"); jQuery('body').on('hover click','.rcl-smiles > img',function(){ var block = jQuery(this).next().children(); if(block.html()) return false; block.html(Rcl.local.loading+'...'); var dir = jQuery(this).data('dir'); rcl_ajax({ data: { action: 'rcl_get_smiles_ajax', area: jQuery(this).parent().data('area'), dir: dir? dir: 0 }, success: function(data){ if(data['content']){ block.html(data['content']); } } }); return false; }); } rcl_add_action('rcl_init','rcl_init_click_smilies'); function rcl_init_click_smilies(){ jQuery("body").on("click",'.rcl-smiles-list img',function(){ var alt = jQuery(this).attr("alt"); var area = jQuery(this).parents(".rcl-smiles").data("area"); jQuery("#"+area).val(jQuery("#"+area).val()+" "+alt+" "); }); } rcl_add_action('rcl_init','rcl_init_close_popup'); function rcl_init_close_popup(){ jQuery('#rcl-popup,.floatform').on('click','.close-popup',function(){ rcl_hide_float_login_form(); jQuery('#rcl-overlay').fadeOut(); jQuery('#rcl-popup').empty(); return false; }); } rcl_add_action('rcl_init','rcl_init_click_overlay'); function rcl_init_click_overlay(){ jQuery('#rcl-overlay').click(function(){ rcl_hide_float_login_form(); jQuery('#rcl-overlay').fadeOut(); jQuery('#rcl-popup').empty(); return false; }); } rcl_add_action('rcl_init','rcl_init_click_float_window'); function rcl_init_click_float_window(){ jQuery(".float-window-recall").on('click','.close',function(){ jQuery(".float-window-recall").remove(); return false; }); } rcl_add_action('rcl_init','rcl_init_loginform_shift_tabs'); function rcl_init_loginform_shift_tabs(){ jQuery('body').on('click','.form-tab-rcl .link-tab-rcl',function(){ jQuery('.form-tab-rcl').hide(); if(jQuery(this).hasClass('link-login-rcl')) rcl_show_login_form_tab('login'); if(jQuery(this).hasClass('link-register-rcl')) rcl_show_login_form_tab('register'); if(jQuery(this).hasClass('link-remember-rcl')) rcl_show_login_form_tab('remember'); return false; }); } rcl_add_action('rcl_init','rcl_init_check_url_params'); function rcl_init_check_url_params(){ var options = rcl_get_options_url_params(); if(rcl_url_params['tab']){ if(!jQuery("#lk-content").size()) return false; if(options.scroll == 1){ var offsetTop = jQuery("#lk-content").offset().top; jQuery('body,html').animate({scrollTop:offsetTop - options.offset}, 1000); } var id_block = rcl_url_params['tab']; rcl_show_tab(id_block); } } rcl_add_action('rcl_init','rcl_init_close_notice'); function rcl_init_close_notice(){ jQuery('#rcl-notice,body').on('click','a.close-notice',function(){ rcl_close_notice(jQuery(this).parent()); return false; }); } rcl_add_action('rcl_init','rcl_init_cookie'); rcl_add_action('rcl_login_form','rcl_init_login_form'); function rcl_init_login_form(type_form){ if(rcl_url_params['action-rcl']){ jQuery('.panel_lk_recall.floatform > div').hide(); } if(type_form=='floatform'){ jQuery("body").on('click','.rcl-register',function(){ rcl_show_float_login_form(); rcl_show_login_form_tab('register',type_form); return false; }); jQuery("body").on('click','.rcl-login',function(){ rcl_show_float_login_form(); rcl_show_login_form_tab('login',type_form); return false; }); if(rcl_url_params['action-rcl']){ rcl_show_float_login_form(); } }else{ if(rcl_url_params['action-rcl']==='login'){ jQuery('.rcl-loginform-full.'+type_form+' #register-form-rcl').hide(); } if(rcl_url_params['action-rcl']==='register'){ jQuery('.rcl-loginform-full.'+type_form+' #login-form-rcl').hide(); } if(rcl_url_params['action-rcl']==='remember'){ jQuery('.rcl-loginform.'+type_form+' #login-form-rcl').hide(); } } if(rcl_url_params['action-rcl']){ rcl_show_login_form_tab(rcl_url_params['action-rcl'],type_form); } } function rcl_show_login_form_tab(tab,type_form){ type_form = (!type_form)? '' : '.'+type_form; jQuery('.panel_lk_recall'+type_form+' #'+tab+'-form-rcl').show(); } function rcl_show_float_login_form(){ jQuery('.panel_lk_recall.floatform > div').hide(); rcl_setup_position_float_form(); jQuery('.panel_lk_recall.floatform').show(); } function rcl_hide_float_login_form(){ jQuery('.panel_lk_recall.floatform').fadeOut().children('.form-tab-rcl').hide(); } function rcl_setup_position_float_form(){ jQuery("#rcl-overlay").fadeIn(); var screen_top = jQuery(window).scrollTop(); var popup_h = jQuery('.panel_lk_recall.floatform').height(); var window_h = jQuery(window).height(); screen_top = screen_top + 60; jQuery('.panel_lk_recall.floatform').css('top', screen_top+'px'); } rcl_add_action('rcl_footer','rcl_beat'); function rcl_beat(){ var beats = rcl_apply_filters('rcl_beats',rcl_beats); var DataBeat = rcl_get_actual_beats_data(beats); if(rcl_beats_delay && DataBeat.length){ rcl_do_action('rcl_beat'); rcl_ajax({ data: { action: 'rcl_beat', databeat: JSON.stringify(DataBeat) }, success: function(data){ data.forEach(function(result, i, data) { rcl_do_action('rcl_beat_success_'+result['beat_name']); new (window[result['success']])(result['result']); }); } }); } rcl_beats_delay++; setTimeout('rcl_beat()', 1000); } function rcl_get_actual_beats_data(beats){ var beats_actual = new Array(); if(beats){ beats.forEach(function(beat, i, beats) { var rest = rcl_beats_delay % beat.delay; if(rest == 0){ var object = new (window[beat.beat_name])(beat.data); if(object.data){ object = rcl_apply_filters('rcl_beat_' + beat.beat_name,object); object.beat_name = beat.beat_name; var k = beats_actual.length; beats_actual[k] = object; } } }); } return beats_actual; } jQuery(function($){ jQuery('body').on('click','.rcl-form-add-user-count .rcl-get-form-pay',function(){ var id = jQuery(this).parents('.rcl-form-add-user-count').attr('id'); rcl_preloader_show('#'+id+' .rcl-form-input'); var dataString = 'action=rcl_add_count_user&' + jQuery('#'+id+' form').serialize(); rcl_ajax({ data: dataString, success: function(data){ if(data['otvet']==100){ jQuery('#'+id+' .rcl-result-box').html(data['redirectform']); } } }); return false; }); jQuery('body').on('click','.rcl-widget-balance .rcl-toggle-form-link',function(){ var id = jQuery(this).parents('.rcl-widget-balance').attr('id'); jQuery('#'+id+' .rcl-form-balance').slideToggle(200); return false; }); }); function rcl_pay_order_user_balance(e,data){ rcl_preloader_show(jQuery('.rcl-payment-buttons')); rcl_ajax({ data: { action: 'rcl_pay_order_user_balance', pay_id: data.pay_id, pay_type: data.pay_type, pay_summ: data.pay_summ, description: data.description, baggage_data: JSON.stringify(data.baggage_data) } }); return false; }function wau_get_payment_form(tariff_id, e){ if(e && jQuery(e).parents('.preloader-parent')){ rcl_preloader_show(jQuery(e).parents('.preloader-parent')); } rcl_ajax({ data:{ action: 'wau_ajax_get_payment_form', tariff_id: tariff_id } }); } 