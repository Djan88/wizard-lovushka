<?php


/* Отключаем админ панель для всех, кроме администраторов. */
if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;

?>
