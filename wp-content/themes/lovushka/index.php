<!DOCTYPE html>
<html id="html" lang="en"> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  <title><?php wp_title(''); ?></title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/fav180.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/fav32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/fav16.png">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
<?php if(is_user_logged_in()){ ?>
  <?php if(!current_user_can('administrator')){ ?>
    <style>
      #wpadminbar
      {
        display: none;
      }
      html.mdl-js#html
      {
        margin-top: 0!important;
        padding-top: 0!important; 
      }

      html { margin-top: 0 !important; }
      * html body { margin-top: 0 !important; }
      @media screen and ( max-width: 782px ) {
        html { margin-top: 0 !important; }
        * html body { margin-top: 0 !important; }
      }

    </style>
  <?php } ?>
<?php } ?>
</head>
<body>
  
  <!-- ====================================================
  header section -->
  <header class="top-header">
    <div class="container">
      <div class="row">
        <div class="header_area col-md-12">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
              <a href="/" class="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></a>
            </div>
          </div>
        </div>
        <?php if(!is_user_logged_in()){ ?>
          <button class="btn btn-success btn_login ru_block" data-toggle="modal" data-target="#login">ВХОД</button>
          <button class="btn btn-success btn_login en_block hidden" data-toggle="modal" data-target="#login">ENTER</button>
        <?php } ?>
      </div>
    </div>
  </header> 
  <!-- end of header area -->
  <section class="lovushka text-center" id="lovushka">
    <?php if (is_front_page()) { ?>
      <?php if (!is_user_logged_in() || current_user_can('subscriber')) { ?>
        <div class="container vitrin_wrap">
          <?php if(current_user_can('subscriber')){ ?>
            <a href="/kabinet" data-lang="ru" class="btn btn-sm btn-default btn-kabinet"><span class="glyphicon glyphicon-user"></span></a>
          <?php } ?>
          <a href="https://www.youtube.com/watch?v=dDIE13kCdOc&t=1s" target="_blank" data-lang="ru" class="btn btn-sm btn-default btn-movie"><span class="glyphicon glyphicon-play"></span></a>
          <div class="btn-group lang_block">
            <button type="button" data-lang="ru" class="btn btn-sm btn-default active btn_lang btn_lang_ru">РУС</button>
            <button type="button" data-lang="en" data-speed="4" class="btn btn-sm btn-default btn_lang btn_lang_en">EN</button>
          </div>
          <?php if(current_user_can('subscriber')){ ?>
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                          <div class="vitrin vitrin-content vitrin-article vitrin-centered ru_block">
                              Вы видите это сообщение потому что зарегистрированы в программе<a href="/"> "Антистресс Визард Ловушка"</a> но на данный момент не имеете действующего доступа к функционалу.<br>Узнайте как получить доступ перейдя по <a href="#howto">этой ссылке</a>
                          </div>
                          <div class="vitrin vitrin-content vitrin-article vitrin-centered en_block hidden">You see this message because they are registered in the program<a href="/">"Antistress Wizard Lovushka"</a> but at the moment you do not have an effective access to the functionality.<br>Learn how to access by clicking <a href="#howto">this link</a>
                          </div>
                      </div>
                  </div>
              </div>
          <?php } ?>
          <div class="col-md-12">
            <h1 class="vitrin_heading ru_block">Антистресс Визард Ловушка</h1>
            <h1 class="vitrin_heading en_block hidden">Antistress Wizard Lovushka</h1>
            <div class="row">
              <div class="col-md-10 col-md-offset-1 ru_block">
                <div class="vitrin">
                  <p><h3>Добрый день!</h3></p>
                  <p>
                    Для того чтоб избавиться от злости, раздражения и прочих надоедливых мыслей нам часто приходится искать "свободные уши" и изливать в них свои беспокойства. Мы решили сделать программу которая справлялась бы с этой задачей и была под рукой 24 часа в сутки.
                  </p>
                  <p>
                    20 декабря 2017г. программа <b>"Антистресс Визард Ловушка"</b> стала доступна пользователям. Мы продумали максимально удобный и простой интерфейс. Им одинаково удобно пользоваться на компьютере, ноутбуке, планшете и даже на смартфоне. Так, в любой момент Вы можете воспользоваться ловушкой прямо с экрана своего смартфона, для этого Вам необходим только интернет и доступ к <b>"Антистресс Визард Ловушка"</b>.
                  </p>
                  <p>
                    <img src="<?php bloginfo('template_url'); ?>/img/items.png" alt="lovushka_items" class="items">
                  </p>
                </div>
              </div>
              <div class="col-md-10 col-md-offset-1 en_block hidden">
                <div class="vitrin">
                  <p><h3>Good day!</h3></p>
                  <p>
                    In order to get rid of anger, irritation and other annoying thoughts, we often have to look for "free ears" and pour out their concerns in them. We decided to make a program that would cope with this task and was at hand 24 hours a day.
                  </p>
                  <p>
                    December 20, 2017 program <b>"Antistress Wizard Lovushka"</b> became available to users. We thought of the most convenient and simple interface. They are equally convenient to use on a computer, laptop, tablet and even on a smartphone. So, at any time you can use the trap directly from your smartphone's screen, for this you need only the Internet and access to<b>"Antistress Wizard Lovushka"</b>.
                  </p>
                  <p>
                    <img src="<?php bloginfo('template_url'); ?>/img/items_en.png" alt="lovushka_items" class="items">
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <h2 class="ru_block">Мы предлагаем 2 варианта использования программы</h2>
            <h2 class="en_block hidden">We offer 2 options for using the program</h2>
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <div class="vitrin">
                  <h3 class="ru_block">Базовый вариант</h3>
                  <h3 class="en_block hidden">Basic mode</h3>
                  <p class="vitrin_content ru_block">В базовом режиме программы <b>"Антистресс Визард Ловушка"</b> пользователю доступны быстрые протоколы ("Боюсь", "Злюсь", "Обижаюсь", "Сомневаюсь"). Эти протоколы позволяют в один "клик", за 4 минуты, избавиться от переживаний. В этом режиме, возможно ручное управление скоростью вращения ловушки. Время работы ловушки при ручном управлении осуществляется на усмотрение пользователя.</p>
                  <p class="vitrin_content en_block hidden">In the basic mode of the program <b>"Antistress Wizard Lovushka"</b>  fast protocols are available to the user ("I'm Afraid", "I'm angry", "I'm offended", "I doubt"). These protocols allow one "click", in 4 minutes, to get rid of the experience. In this mode, it is possible to manually control the speed of rotation of the trap. The time of the trap operation with manual control is at the discretion of the user.</p>
                  <h4 class="ru_block">Стоимость базовой версии</h4>
                  <h4 class="en_block hidden">Cost of the basic mode</h4>
                  <div class="price ru_block">5500 руб./год.</div>
                  <div class="price en_block hidden">5500 rur. / year.</div>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="vitrin">
                  <h3 class="ru_block">Расширенный вариант</h3>
                  <h3 class="en_block hidden">Extended mode</h3>
                  <p class="vitrin_content ru_block">Раширенный режим программы <b>"Антистресс Визард Ловушка"</b> включает в себя все возможности базового режима, а так же механизм для "Пересмотра личной истории". В этом режиме, можно выбрать до 2-х актуальных проблем из списка и следую подсказкам программы провести глубокую проработку личной истории. В этом режиме скоростью вращения лоушки управляет программа. На разных этапах она может меняться</p>
                  <p class="vitrin_content en_block hidden">Extended program mode <b>"Antistress Wizard Lovushka"</b> includes all the features of the basic mode, as well as a mechanism for the "Revision of personal history." In this mode, you can select up to 2 relevant problems from the list and follow the prompts of the program to conduct a deep study of your personal history. In this mode, the speed of rotation of the louver is controlled by the program. At different stages it can vary</p>
                  <h4 class="ru_block">Стоимость расширенной версии</h4>
                  <h4 class="en_block hidden">Cost of the extended mode</h4>
                  <div class="price ru_block">10000 руб./год.</div>
                  <div class="price en_block hidden">10000 rur. / year.</div>
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>
          <div class="col-md-12">
            <h2 class="ru_block">Как приобрести доступ к программе?</h2>
            <h2 class="en_block hidden">How can I get access to the program?</h2>
            <a name="howto"></a>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <div class="vitrin">
                  <h3 class="ru_block">Оплата из личного кабинета</h3>
                  <h3 class="en_block hidden">Payment from the personal cabinet</h3>
                  <div style="text-align: left;">
                    <p>
                      <b class="ru_block">Чтоб получить доступ к программе из личного кабнета необходимо сделать следующее:</b>
                      <b class="en_block hidden">To access the program you need to do the following:</b>
                    </p>
                    <?php if (!is_user_logged_in()) { ?>
                      <p class="ru_block">
                          <span class="article_main">— </span><span class="reg_login toLogin" data-toggle="modal" data-target="#login">Войдите</span> на сайт. Если у Вас еще нет учетной записи "Визард Ловушка" — <span class="reg_login toRegistration" data-toggle="modal" data-target="#login">зарегистрируйтесь</span>
                      </p>
                      <p class="en_block hidden">
                          <span class="article_main">— </span><span class="reg_login toLogin" data-toggle="modal" data-target="#login">Sign in</span> to the website. If you do not have an account yet "Wizard Lovushka" — <span class="reg_login toRegistration" data-toggle="modal" data-target="#login">register now</span>
                      </p>
                    <?php } ?>
                    <p class="ru_block">
                        <span class="article_main">— </span> Войдите в <a target="_blank" href="/kabinet">личный кабинет</a> пользователя.
                    </p>
                    <p class="en_block hidden">
                        <span class="article_main">— </span> Sign in to<a target="_blank" href="/kabinet">user's personal</a> cabinet.
                    </p>
                    <p class="ru_block">
                        <span class="article_main">— </span> Выберите вкладку <b>"Все доступы"</b>
                    </p>
                    <p class="en_block hidden">
                        <span class="article_main">— </span> Select the tab <b>"All Accesses"</b>
                    </p>
                    <p class="ru_block">
                        <span class="article_main">— </span> Выберите тип аккаунта и нажмите "Приобрести" -&gt; "Оплатить через "Робокасса" -&gt; Выберите удобный для Вас способ и произведите оплату.
                    </p>
                    <p class="en_block hidden">
                        <span class="article_main">— </span> Select the account type and click "Purchase" -&gt; "Pay through "Robocassa" -&gt; Choose the method convenient for you and make payment.
                    </p>
                    <p class="ru_block">
                        По завершении оплаты на Вашу почту поступит письмо с подтверждением. С этой минуты Ваш доступ к программе "Визард Ловушка" активен! Приятного пользования!
                    </p>
                    <p class="en_block hidden">
                        Upon completion of payment, a confirmation letter will be sent to your mail. From now on, your access to the "Wizard Lovushka" program is active! Pleasant use!
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="vitrin">
                  <h3 class="ru_block">Перевод на банковскую карту</h3>
                  <h3 class="en_block hidden">Transfer to bank card</h3>
                  <div style="text-align: left;">
                    <p>
                      <b class="ru_block">Вы можете оплатить доступ к программе онлайн переводом на банковскую карту. Для этого необходимо:</b>
                      <b class="en_block hidden">You can pay for access to the program online by transfer to a bank card. To do this you need:</b>
                    </p>
                    <p class="ru_block">
                        — Для перевода перейдите по <a target="_blank" href="https://tochka.com/my/b95e3c7070b54fb1aa43d073b6fd86dc">сслыке</a>
                    </p>
                    <p class="en_block hidden">
                        — For translation click on the <a target="_blank" href="https://tochka.com/my/b95e3c7070b54fb1aa43d073b6fd86dc">link</a>
                    </p>
                    <p class="ru_block">
                        — В комментарии надо указать: <b>"Учебный курс Ловушка"</b>.
                    </p>
                    <p class="en_block hidden">
                        — In the comment, you must specify the following text: <b>"Учебный курс Ловушка"</b>.
                    </p>
                    <p class="ru_block">
                        — После перевода обязательно пришлите нам копию квитанции об оплате. Подключение к программе "Антистресс Визард Ловушка", при оплате этим способом, происходит в течение 24 часов.
                    </p>
                    <p class="en_block hidden">
                        — After the transfer, please send us a copy of the payment receipt. Connection to the program "Antistress Wizard Lovushka", when paying this way, occurs within 24 hours. An email with your username and password will be sent to your mailbox.
                    </p>
                  </div>
                  <p class="ru_block">
                    <b>Когда доступ будет открыт на ваш почтовый ящик поступит письмо с логином и паролем.</b>
                  </p>
                  <p class="en_block hidden">
                    <b>When access is opened, you will receive an email with a username and password.</b>
                  </p>
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <h2></h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="vitrin">
                  <div style="text-align: left; font-size: 18px;">
                    <h4 class="ru_block" style="text-align: center;">По любому возникшему у Вас вопросу с удовольствием поможет наша служба технической поддержки. Напишите на <a href="mailto:info@chikurov.com">info@chikurov.com</a>. Мы работаем 7 дней в неделю.</br> По телефону консультаций не проводим!</h4>
                    <h4 class="en_block hidden" style="text-align: center;">With any question you have, our technical support will be pleased to help. Write on <a href="mailto:info@chikurov.com">info@chikurov.com</a>. We respond promptly 7 days a week.</br> We do not hold consultations on the phone!</h4>
                    <h3></h3>
                  </div>
                  <h4 class="ru_block">Юридическая информация:</h4>
                  <h4 class="en_block hidden">Legal information:</h4>
                  <p><a href="mailto:info@chikurov.com">info@chikurov.com</a> / +7 (495) 135-25-48</p>
                  <p class="ru_block">ОГРНИП: 314910224600336</p>
                  <p class="en_block hidden">OGRNIP: 314910224600336</p>
                  <p class="ru_block">ИНН: 7706092528</p>
                  <p class="en_block hidden">INN: 7706092528</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <a href="/kabinet" data-lang="ru" class="btn btn-sm btn-default btn-kabinet"><span class="glyphicon glyphicon-user"></span></a>
        <a href="https://www.youtube.com/watch?v=dDIE13kCdOc&t=1s" target="_blank" data-lang="ru" class="btn btn-sm btn-default btn-movie"><span class="glyphicon glyphicon-play"></span></a>
        <div class="btn-group lang_block">
          <button type="button" data-lang="ru" class="btn btn-sm btn-default active btn_lang btn_lang_ru">РУС</button>
          <button type="button" data-lang="en" data-speed="4" class="btn btn-sm btn-default btn_lang btn_lang_en">EN</button>
        </div>
        <div class="reg_block">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 ring">
                <!-- <img src="img/lovushka.png" alt="lovushka" class="protocol"> -->
                <div class="protocol">
                  <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="612px" height="792px" viewBox="0 0 612 792" enable-background="new 0 0 612 792" xml:space="preserve">
                  <g>
                    <g>
                      <path fill="#D6AC3B" d="M472.7,366.872c-0.217-10.506,3.621-19.459,10.95-26.804c6.811-6.826,14.083-6.128,18.936,1.99
                        c2.344,3.921,3.69,8.485,5.123,12.877c0.408,1.249-0.465,2.916-0.75,4.391c-1.137-1.072-2.678-1.943-3.333-3.255
                        c-1.754-3.516-2.807-7.401-4.722-10.813c-3.704-6.601-6.971-7.046-12.476-1.827c-8.746,8.292-10.951,18.892-8.986,30.179
                        c2.863,16.446,10.024,31.101,20.643,44.019c0.843,1.026,1.794,1.98,2.79,2.86c6.277,5.544,9.757,4.842,14.739-1.964
                        c5.85-7.992,11.955-15.826,18.391-23.352c3.902-4.562,9.211-6.857,15.512-6.373c2.453,0.188,4.959-0.389,7.424-0.271
                        c1.307,0.062,2.58,0.865,3.868,1.334c-1.11,1.045-2.108,2.799-3.351,2.995c-3.096,0.489-6.315,0.12-9.464,0.361
                        c-8.254,0.633-13.282,6.158-17.863,12.192c-3.994,5.261-7.773,10.684-11.755,15.954c-7.621,10.086-12.335,10.052-22.215-0.157
                        c-12.934-13.362-19.613-30.303-23.407-48.354C472.352,370.942,472.7,368.87,472.7,366.872z"/>
                      <path fill="#D6AE3F" d="M205.151,392.457c-1.358,2.397-2.527,4.929-4.119,7.158c-2.396,3.356-4.824,6.765-7.725,9.665
                        c-3.444,3.443-6.757,3.033-8.61-1.447c-3.406-8.234-6.329-16.693-8.999-25.201c-7.364-23.468-13.461-47.414-27.001-68.45
                        c-0.42-0.653,0.063-1.887,1.333-3.269c1.09,1.474,2.358,2.848,3.244,4.436c10.675,19.107,18.02,39.528,24.03,60.507
                        c2.508,8.755,5.538,17.367,8.578,25.957c0.665,1.879,2.383,3.385,3.617,5.063c1.578-1.345,3.554-2.426,4.655-4.087
                        c2.738-4.128,4.98-8.581,7.625-12.776c0.978-1.551,2.525-2.743,3.813-4.098c1.458,1.426,3.365,2.612,4.284,4.327
                        c2.323,4.332,4.203,8.902,6.26,13.377c0.522,0.059,1.043,0.117,1.565,0.176c1.529-4.176,3.057-8.353,4.587-12.529
                        c0.564-1.54,1.02-3.131,1.72-4.606c1.609-3.388,4.597-3.912,6.863-1.521c7.403,7.81,14.448,15.965,21.473,24.123
                        c0.546,0.634-0.135,2.326-0.245,3.526c-1.335-0.542-3.118-0.711-3.931-1.688c-5.189-6.234-10.118-12.684-15.243-18.972
                        c-1.22-1.497-2.862-2.649-4.819-4.421c-2.429,6.279-4.419,12.012-6.904,17.521c-0.839,1.86-2.932,3.155-4.451,4.708
                        c-1.361-1.49-3.097-2.782-4.008-4.51c-2.205-4.181-4.025-8.566-6-12.868C206.214,392.523,205.683,392.49,205.151,392.457z"/>
                      <path fill="#D6AF41" d="M146.083,382.646c-0.058-16.61-4.384-29.908-16.463-39.773c-1.765-1.442-4.807-3.021-6.47-2.406
                        c-1.646,0.609-2.782,3.812-3.255,6.064c-0.571,2.72-0.069,5.648-0.332,8.458c-0.086,0.922-1.108,1.756-1.702,2.63
                        c-0.867-0.798-2.571-1.729-2.469-2.374c0.886-5.607,1.355-11.462,3.446-16.638c1.647-4.078,6.246-4.155,10.204-1.154
                        c12.911,9.789,20.413,22.927,21.128,38.961c0.408,9.155-1.119,18.571-3.02,27.608c-2.235,10.622-10.694,15.468-20.284,5.593
                        c-3.824-3.937-7.694-7.875-11.896-11.391c-11.823-9.891-25.734-14.08-40.981-14.587c-1.435-0.048-2.813-1.78-4.218-2.731
                        c1.321-0.607,2.714-1.857,3.952-1.719c10.954,1.224,22.029,2.56,31.575,8.541c6.792,4.255,13.027,9.419,19.374,14.353
                        c2.87,2.231,5.268,5.07,8.135,7.306c3.213,2.506,6.096,2.089,8.199-1.748C145.553,399.339,145.67,390.234,146.083,382.646z"/>
                      <path fill="#D6AF42" d="M305.642,365.074c3.375-3.592,6.708-7.226,10.137-10.766c4.288-4.427,4.085-5.79-1.47-8.702
                        c-1.03-0.54-2.053-1.097-3.056-1.687c-5.471-3.217-5.926-6.739-1.389-10.985c2.871-2.688,5.793-5.321,9.216-8.459
                        c-3.183-2.311-5.91-4.1-8.421-6.153c-5.162-4.221-5.494-8.598,0.216-11.948c9.059-5.316,18.616-9.848,28.196-14.196
                        c13.507-6.131,27.219-11.812,40.868-17.628c1.468-0.626,3.098-0.873,4.653-1.295c0.28,0.607,0.56,1.214,0.84,1.821
                        c-2.103,1.21-4.106,2.656-6.324,3.594c-17.15,7.25-34.394,14.281-51.489,21.658c-5.009,2.162-9.808,4.95-14.377,7.948
                        c-3.924,2.575-3.683,4.853,0.14,7.656c1.737,1.273,3.518,2.488,5.305,3.691c4.04,2.722,4.427,5.291,1.023,8.934
                        c-2.038,2.181-4.4,4.06-6.609,6.082c-2.34,2.141-3.454,4.207,0.318,6.054c1.328,0.651,2.542,1.558,3.903,2.116
                        c5.881,2.411,7.089,5.201,3.621,10.199c-3.014,4.343-6.523,8.365-10.063,12.306c-0.88,0.98-2.723,1.096-4.124,1.609
                        C306.383,366.307,306.012,365.69,305.642,365.074z"/>
                      <path fill="#D6AD3C" d="M321.816,579.539c-4.664,1.978-5.249-2.526-5.295-4.616c-0.163-7.449-4.656-11.61-9.939-15.607
                        c-3.306-2.501-6.407-5.296-9.441-8.129c-3.064-2.861-3.136-6.418,0.443-8.343c5.292-2.847,10.96-5.302,16.755-6.847
                        c12.416-3.311,24.299-1.056,35.158,5.657c2.294,1.418,4.741,4.177,5.085,6.607c0.232,1.634-2.76,4.572-4.927,5.527
                        c-4.802,2.117-9.951,3.518-15.058,4.82c-1.109,0.283-2.637-1.077-3.972-1.68c1.133-0.871,2.14-2.112,3.421-2.547
                        c5.313-1.807,10.71-3.37,17.358-5.419c-6.256-6.49-12.608-8.948-19.216-9.72c-9.971-1.166-19.902-0.175-29.049,4.614
                        c-1.382,0.724-3.585,2.042-3.505,2.911c0.135,1.484,1.548,3.105,2.831,4.183c3.665,3.076,7.954,5.514,11.194,8.958
                        c2.614,2.778,4.406,6.509,5.916,10.09C320.808,572.92,321.084,576.247,321.816,579.539z"/>
                      <path fill="#D6AD3F" d="M327.671,219.294c2.266,11.826-1.395,22.006-9.531,30.724c-3.847,4.122-8.486,7.523-12.19,11.754
                        c-1.874,2.141-4.164,6.488-3.254,7.908c1.459,2.276,5.334,3.859,8.338,4.142c12.857,1.214,24.802-2.409,36.109-8.267
                        c2.327-1.205,4.463-2.903,6.401-4.685c1.1-1.011,1.618-2.654,2.398-4.013c-1.443-0.518-2.853-1.304-4.338-1.489
                        c-1.964-0.245-4.019,0.203-5.97-0.086c-1.102-0.164-2.073-1.209-3.103-1.858c1.072-0.765,2.123-2.141,3.221-2.179
                        c2.946-0.102,6.054-0.091,8.825,0.763c2.088,0.643,5.04,2.464,5.284,4.107c0.313,2.101-1.076,5.487-2.84,6.676
                        c-5.89,3.97-11.969,8.001-18.542,10.538c-9.921,3.829-20.304,6.567-31.161,3.547c-9.103-2.532-11.189-7.944-5.366-15.393
                        c3.337-4.267,7.471-7.954,11.491-11.635c7.78-7.124,11.671-15.826,11.565-26.376c-0.016-1.553,0.475-3.112,0.732-4.668
                        C326.384,218.968,327.028,219.131,327.671,219.294z"/>
                      <path fill="#D4AB38" d="M446.737,393.618c-10.677-1.312-21.4-2.34-32.013-4.052c-5.519-0.89-9.664-0.121-14.059,3.788
                        c-6.676,5.938-14.187,10.949-21.471,16.178c-0.846,0.608-2.497,0.095-3.775,0.102c0.249-1.164,0.089-2.859,0.808-3.413
                        c8.477-6.524,16.907-13.141,25.77-19.11c2.563-1.726,6.524-2.211,9.741-1.958c6.708,0.528,13.316,2.398,20.022,2.843
                        c7.319,0.485,14.704-0.118,22.057,0c1.341,0.021,2.663,1.223,3.993,1.879c-1.003,1.044-1.883,2.787-3.033,2.989
                        c-2.586,0.454-5.306,0.142-7.971,0.142C446.783,393.21,446.76,393.414,446.737,393.618z"/>
                      <path fill="#D7AE3F" d="M302.324,483.499c1.843-2.153,3.455-2.7,5.529-0.026c4.628,5.968,9.564,11.698,14.134,17.707
                        c0.991,1.302,1.307,3.361,1.36,5.09c0.206,6.638,0.297,13.287,0.132,19.924c-0.03,1.216-1.452,2.398-2.231,3.596
                        c-0.736-1.099-2.004-2.15-2.107-3.305c-0.309-3.456-0.677-7.042-0.095-10.417c1.633-9.472-2.802-16.506-8.489-23.166
                        C307.874,489.759,305.115,486.681,302.324,483.499z"/>
                    </g>
                  </g>
                  </svg>
                </div>
              </div>
              <?php if(is_user_logged_in()){ ?>
                <?php if(current_user_can('administrator') || current_user_can('author')){ ?>
                  <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 ru_block">
                    <div class="instruction_block hidden">
                      <span class="instr"></span>
                      <div>
                        <button type="button" class="btn btn-primary next_instr">Далее <i class="fa fa-chevron-right"></i></button>
                        <button type="button" class="btn btn-primary hidden close_instr">Закрыть</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 en_block hidden">
                    <div class="instruction_block hidden">
                      <span class="instr"></span>
                      <div>
                        <button type="button" class="btn btn-primary next_instr">Next <i class="fa fa-chevron-right"></i></button>
                        <button type="button" class="btn btn-primary hidden close_instr">Close</button>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
              <div class="col-md-4 col-md-offset-4 ru_block">
                <div class="btn-group speed_control">
                  <button type="button" class="btn btn-default btn-lg speed_slover"><i class="fa fa-backward" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg disabled speed_closed hidden" data-toggle="tooltip" data-placement="top" title="В текущем режиме скорость регулируется автоматически"><i class="fa fa-backward" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg play"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg stop"><i class="fa fa-stop" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg disabled speed_closed hidden" data-toggle="tooltip" data-placement="top" title="В текущем режиме скорость регулируется автоматически"><i class="fa fa-forward" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg speed_faster"><i class="fa fa-forward" aria-hidden="true"></i></button>
                </div>
              </div>
              <div class="col-md-4 col-md-offset-4 en_block hidden">
                <div class="btn-group speed_control">
                  <button type="button" class="btn btn-default btn-lg speed_slover"><i class="fa fa-backward" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg disabled speed_closed hidden" data-toggle="tooltip" data-placement="top" title="In the current mode, the speed is automatically adjusted"><i class="fa fa-backward" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg play"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg stop"><i class="fa fa-stop" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg disabled speed_closed hidden" data-toggle="tooltip" data-placement="top" title="In the current mode, the speed is automatically adjusted"><i class="fa fa-forward" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-default btn-lg speed_faster"><i class="fa fa-forward" aria-hidden="true"></i></button>
                </div>
              </div>
              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ru_block">
                <div class="btn-group easy_mode">
                  <button type="button" data-mode="scare" data-speed="2" class="btn btn-default easy_mode_item easy_mode_item_scare">Боюсь</button>
                  <button type="button" data-mode="angry" data-speed="4" class="btn btn-default easy_mode_item easy_mode_item_angry">Злюсь</button>
                  <button type="button" data-mode="resentment" data-speed="6" class="btn btn-default easy_mode_item easy_mode_item_resentment">Обижаюсь</button>
                  <button type="button" data-mode="doubt" data-speed="8" class="btn btn-default easy_mode_item easy_mode_item_doubt">Сомневаюсь</button>
                </div>
              </div>
              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 en_block hidden">
                <div class="btn-group easy_mode">
                  <button type="button" data-mode="scare" data-speed="2" class="btn btn-default easy_mode_item easy_mode_item_scare">I'm afraid</button>
                  <button type="button" data-mode="angry" data-speed="4" class="btn btn-default easy_mode_item easy_mode_item_angry">I'm angry</button>
                  <button type="button" data-mode="resentment" data-speed="6" class="btn btn-default easy_mode_item easy_mode_item_resentment">I'm offended</button>
                  <button type="button" data-mode="doubt" data-speed="8" class="btn btn-default easy_mode_item easy_mode_item_doubt">I doubt it</button>
                </div>
              </div>
              <?php if(is_user_logged_in()){ ?>
                <?php if(current_user_can('administrator') || current_user_can('author')){ ?>
                  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ru_block">
                    <div class="btn-group revece_mode">
                      <button type="button" class="btn btn-default revece_bc" data-toggle="modal" data-target="#revece_bc">Регрессивное центрирование</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 hidden en_block">
                    <div class="btn-group revece_mode">
                      <button type="button" class="btn btn-default revece_bc" data-toggle="modal" data-target="#revece_bc">The Regress Centering</button>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ru_block">
                    <div class="btn-group revece_mode">
                      <button type="button" class="btn btn-default disabled set_disabled" data-toggle="popover" data-placement="top" data-original-title="Регрессивное центрирование" data-content='Регрессивное центрирование доступно для пользователей расширенной лицензии'>Регрессивное центрирование</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 hidden en_block">
                    <div class="btn-group revece_mode">
                      <button type="button" class="btn btn-default disabled set_disabled" data-toggle="popover" data-placement="top" data-original-title="The Regress Centering" data-content='The Regress Centering is available for extended license users'>The Regress Centering</button>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ru_block">
                <div class="btn-group speed_control">
                  <button type="button" class="btn btn-default manual" data-toggle="modal" data-target="#manual">Правила</button>
                  <button type="button" class="btn btn-default speed_info" data-toggle="modal" data-target="#speed_info">Уровни работы</button>
                <?php if(is_user_logged_in()){ ?>
                  <?php if(current_user_can('administrator') || current_user_can('author')){ ?>
                    <button type="button" class="btn btn-default set" data-toggle="modal" data-target="#set">Пересмотр</button>
                  <?php } else { ?>
                    <button type="button" class="btn btn-default disabled set_disabled" data-toggle="popover" data-placement="top" data-original-title="Пересмотр личной истории" data-content='Пересмотр личной истории доступен для пользователей расширенной лицензии'>Пересмотр</button>
                  <?php } ?>
                <?php } ?>
                </div>
              </div>
              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 en_block hidden">
                <div class="btn-group speed_control">
                  <button type="button" class="btn btn-default manual" data-toggle="modal" data-target="#manual"><i class="fa fa-file-text" aria-hidden="true"></i> Rules</button>
                  <button type="button" class="btn btn-default speed_info" data-toggle="modal" data-target="#speed_info">Levels</button>
                <?php if(is_user_logged_in()){ ?>
                  <?php if(current_user_can('administrator') || current_user_can('author')){ ?>
                    <button type="button" class="btn btn-default set" data-toggle="modal" data-target="#set"><i class="fa fa-sliders" aria-hidden="true"></i> Revision</button>
                  <?php } else { ?>
                    <button type="button" class="btn btn-default disabled set_disabled" data-toggle="popover" data-placement="top" data-original-title="Revision of personal history" data-content='Revision of personal history is available for users of the extended license'><i class="fa fa-sliders" aria-hidden="true"></i> Revision</button>
                  <?php } ?>
                <?php } ?>
                </div>
              </div>
              <div class="col-md-8 col-md-offset-2 col-xs-12 speed_val ru_block">
                <div class="lovushka_speed">0</div>
                скорость вращения
              </div>
              <div class="col-md-8 col-md-offset-2 col-xs-12 speed_val en_block hidden">
                <div class="lovushka_speed">0</div>
                rotational speed
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      <?php } ?>
    <?php } else { ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="container inside">
          <div class="row">
            <div class="col-md-12">
              <h2><?php the_title()?></h2>
            </div>
            <div class="col-md-12">
              <p><?php the_content()?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
    <?php } ?>
  </section><!-- end of doctor section -->
  <footer class="footer clearfix">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-left" style="padding-top: 7px;">
            v 2.3 | 2020 | <a class="ru_block" href="/oferta">Оферта</a><?php if(is_user_logged_in()){ ?> | <button class="btn btn_warning btn-sm" id="upgrade_btn">Полная версия</button><?php } ?>
          </div>
          <?php if(is_user_logged_in()){ ?>
          <div class="pull-right">
            <a class="btn btn_sm btn_warning wings_door_closed ru_block" href="<?php echo home_url(); ?>/wp-login.php?action=logout&amp;_wpnonce=a6cad512ba">Выйти</a>
            <a class="btn btn_sm btn_warning wings_door_closed hidden en_block" href="<?php echo home_url(); ?>/wp-login.php?action=logout&amp;_wpnonce=a6cad512ba">Exit</a>
          </div>
          <?php } ?>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  <!-- script tags
  ============================================================= -->
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.1.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.ui.touch-punch.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/gsap.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript" >
      (function (d, w, c) {
          (w[c] = w[c] || []).push(function() {
              try {
                  w.yaCounter48119267 = new Ya.Metrika({
                      id:48119267,
                      clickmap:true,
                      trackLinks:true,
                      accurateTrackBounce:true
                  });
              } catch(e) { }
          });

          var n = d.getElementsByTagName("script")[0],
              s = d.createElement("script"),
              f = function () { n.parentNode.insertBefore(s, n); };
          s.type = "text/javascript";
          s.async = true;
          s.src = "https://mc.yandex.ru/metrika/watch.js";

          if (w.opera == "[object Opera]") {
              d.addEventListener("DOMContentLoaded", f, false);
          } else { f(); }
      })(document, window, "yandex_metrika_callbacks");
  </script>
  <noscript><div style="display: none;"><img src="https://mc.yandex.ru/watch/48119267" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
  <div class="modal fade" id="set" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">Диагностика личной истории:</span><span class="hidden en_block">Diagnosis of personal history:</span></h4>
        </div>
        <div class="modal-body text-centered">
          <h4 class="ru_block">Выберите из списка актуальные проблемы, но не более 2-х.</h4>
          <h4 class="hidden en_block">Please choose no more than 2 current issue from the list.</h4>
          <div class="questions">
            <div class="ru_block">
              <button type="button" class="btn btn-default question noactive" data-quest_one = "2" data-quest_two = "5" data-choiced="">Злость на кого-либо, на ситуацию или на себя</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "5" data-quest_two = "2" data-choiced="">Сложности в общении и в любых делах</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "7" data-quest_two = "12" data-choiced="">Чувство вины</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "3" data-quest_two = "6" data-choiced="">Самоограничения и заниженная самооценка</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "4" data-quest_two = "1" data-choiced="">Необходимость прислушиваться к чужому мнению</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "6" data-quest_two = "3" data-choiced="">Наличие в жизни того, с чем сложно смириться</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "1" data-quest_two = "4" data-choiced="">Беспокойство, суета, страхи</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "8" data-quest_two = "12" data-choiced="">Желания и правила жизни</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "9" data-quest_two = "12" data-choiced="">Дилеммы касательно предметов и отношений</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "10" data-quest_two = "12" data-choiced="">Неосуществлённые мечты</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "11" data-quest_two = "12" data-choiced="">Обиды и унижения</button>
            </div>
          </div>
          <div class="questions">
            <div class="hidden en_block">
              <button type="button" class="btn btn-default question noactive" data-quest_one = "2" data-quest_two = "5" data-choiced="">The anger at someone, situation. Or the anger at yourself</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "5" data-quest_two = "2" data-choiced="">Difficulties in communication or difficulties in any affairs</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "7" data-quest_two = "12" data-choiced="">Feeling guilty</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "3" data-quest_two = "6" data-choiced="">Holding yourself back or lowering self-esteem</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "4" data-quest_two = "1" data-choiced="">The need to follow someone else’s opinion</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "6" data-quest_two = "3" data-choiced="">Something in your life that you cannot accept</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "1" data-quest_two = "4" data-choiced="">Worries, bustling and fears</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "8" data-quest_two = "12" data-choiced="">Wishes and the rules of life</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "9" data-quest_two = "12" data-choiced="">Dilemmas related to subjects or relationships</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "10" data-quest_two = "12" data-choiced="">Not realised life goals and wishes</button>
              <button type="button" class="btn btn-default question noactive" data-quest_one = "11" data-quest_two = "12" data-choiced="">Offences  and humiliations</button>
            </div>
          </div>
          <div class="runed hidden">
            <h3><span class="ru_block">Сессия еще выполняется!</span><span class="hidden en_block">The session is still running!</span></h3>
            <h4><span class="ru_block">Перед началом новой сессии необходимо остановить выполнение текущей</span><span class="hidden en_block">Before starting a new session, you must stop the current</span></h4>
            <button class="btn btn-primary btn-lg stop_prot ru_block">Остановить</button>
            <button class="btn btn-primary btn-lg stop_prot hidden en_block">Stop</button>
          </div>
        </div>
        <div class="modal-footer ru_block">
          <div class="pull-left">
            <button class="btn btn-warning clear_prot hidden">Отменить выбор</button>
          </div>
          <button class="btn btn-primary set_acept hidden">Применить настройки</button>
        </div>
        <div class="modal-footer hidden en_block">
          <div class="pull-left">
            <button class="btn btn-warning clear_prot hidden">Deselect</button>
          </div>
          <button class="btn btn-primary set_acept hidden">Apply Settings</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">Правила пользования</span><span class="hidden en_block">The manual</span></h4>
        </div>
        <div class="modal-text ru_block">
          Включите ловушку и поставьте средний палец правой руки в центр рисунка. Следуя инструкциям вспоминайте из своей жизни предлагаемые ситуации и переживания. Будьте честными перед собой, не фантазируйте. Удерживайте палец в Ловушке не менее 2-х минут на каждое переживание, за тем нажмите кноку "Далее" и снова поставьте палец на ловушку. Повторяйте пока инструкции не закончатся. Рекомендуется повторить процедуру пересмотра не менее 4-х раз в течение месяца. Каждый новый раз вопросы из списка могут быть разные.
          <div class="row text-centered">
            <div class="col-md-12">
              <button class="btn btn-primary start_prot">Включить ловушку</button>
            </div>
          </div>
        </div>
        <div class="modal-text hidden en_block">
          Switch on the device, put your third finger of the right hand to the centre of the picture and start thinking or speaking about your worries, fears, doubts, offences etc. You could repeat it several times until you feel released. It could be repeated in every cases you need.
          <div class="row text-centered">
            <div class="col-md-12">
              <button class="btn btn-primary start_prot">Enable LOVUSHKA</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="speed_info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">Глобальная работа через пуповину V4</span><span class="hidden en_block">Global V4 umbilical cord work</span></h4>
        </div>
        <div class="modal-text ru_block">
          <p>
            Это очень мощная техника. Она позволяет "прочистить" все телесные и внетелесные уровни, освободим их от негативного флюида. 
          </p>
          <p>
            Предложенный протокол может быть самодостаточной техникой терапии, а может дополнять другие методы работы как с телом, так и энергетические практики.
          </p>
          <p>
            <h5>Скорости "WizardLovushka" и уровни работы:</h5>
            <div><b>2</b> — нижние зоны, пуповина локально;</div>
            <div><b>4</b> — живот, большая часть 4-х и 3-х зон;</div>
            <div><b>6</b> — третьи зоны;</div>
            <div><b>8</b> — вторые зоны, включая шею;</div>
            <div><b>10</b> — голова, основание черепа;</div>
            <div><b>12</b> — головной мозг;</div>
            <div><b>14</b> — нижний уровень R-зоны (слева над головой), сновидения, НУМы и исполнительные эгрегоры низких частот;</div>
            <div><b>15-22</b> — средний уровень R-зоны, типичные сновидения и социальные эгрегоры средних частот;</div>
            <div><b>23-34</b> — верхние уровни   R-зоны, сновидения и причинные эгрегоры высоких частот;</div>
            <div><b>36 <</b> — нижний уровень кармического К-поля (справа над головой)</div>
          </p>

        </div>
        <div class="modal-text hidden en_block">
          <p>
            This is a very powerful technique. It allows you to "clear" all bodily and out-of-body levels, we will free them from the negative fluid.
          </p>
          <p>
            The proposed protocol can be a self-sufficient therapy technique, and can complement other methods of working with both the body and energy practices.
          </p>
          <p>
            <h5>Speeds of "WizardLovushka" and working levels:</h5>
            <div><b>2</b> — lower zones, umbilical cord locally;</div>
            <div><b>4</b> — stomach, most of the 4-th and 3-th zones;</div>
            <div><b>6</b> — third zones;</div>
            <div><b>8</b> — second zones, including the neck;</div>
            <div><b>10</b> — head, base of the skull;</div>
            <div><b>12</b> — brain;</div>
            <div><b>14</b> — the lower level of the R-zone (left above the head), dreams, low-frequency executive egregors;</div>
            <div><b>15-22</b> — the average level of the R-zone, typical dreams and social aggregators of medium frequencies;</div>
            <div><b>23-34</b> — upper levels of the R-zone, dreams and causal aggregators of high frequencies;</div>
            <div><b>36 <</b> — lower level of karmic K-field (right above the head)</div>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="revece_bc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">Регрессивное Центрирование</span><span class="hidden en_block">The Regress Centering</span></h4>
        </div>
        <div class="modal-text">
          <div class="reverce_graph">
            <div class="reverce_graph_handle"><i class="fa fa-arrows-alt-h"></i></div>
          </div>
          <div class="reverce_age">
            <table>
              <tr>
                <td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
              </tr>
            </table>
          </div>
          <div id="slider">
            <div id="custom-handle" class="ui-slider-handle"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success ru_block reverce_acept pull-left" data-dismiss="modal" style="display: none;">Применить</button>
          <button class="btn btn-success en_block hidden reverce_acept pull-left" data-dismiss="modal" style="display: none;">Acept</button>
          <button class="btn btn-warning reverce_clean_graph pull-left" style="display: none;"><i class="fa fa-trash"></i></button>
          <button class="btn btn-primary ru_block" data-dismiss="modal">Закрыть</button>
          <button class="btn btn-primary hidden en_block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="upgrade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">Расширенная версия</span><span class="hidden en_block">Full access</span></h4>
        </div>
        <div class="modal-text">
          <div class="access_title">
            Вы можете перейти на Расширенную весию программы, это откроет доступ к режимам "Пересмотр личной истории" и "Регрессивное центрирование". Чтоб узнать условия перехода заполните форму.
          </div>
          <div class="access_form">
            <?php echo do_shortcode('[contact-form-7 id="4" title="Контактная форма 1"]')?>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success ru_block reverce_acept pull-left" data-dismiss="modal" style="display: none;">Применить</button>
          <button class="btn btn-success en_block hidden reverce_acept pull-left" data-dismiss="modal" style="display: none;">Acept</button>
          <button class="btn btn-warning reverce_clean_graph pull-left" style="display: none;"><i class="fa fa-trash"></i></button>
          <button class="btn btn-primary ru_block" data-dismiss="modal">Закрыть</button>
          <button class="btn btn-primary hidden en_block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="manual" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">Правила пользования:</span><span class="hidden en_block">The manual</span></h4>
        </div>
        <div class="modal-text ru_block">
          <b>Способ 1. Избавление.</b><br>
          Нажмите на кнопку вашего переживания. Поставьте средний палец правой руки в центр ловушки и начните проговаривать свои проблемы. Ловушка выключится автоматически. При необходимости повторите. Количество повторений не ограничено.<br>
          <b>Способ 2. Пересмотр личной истории.</b><br>
          Выберите из списка проблем не более двух, наиболее типичных для вас. Включите ловушку и поставьте средний палец правой руки в центр рисунка. Следуя инструкциям вспоминайте из своей жизни предлагаемые ситуации и переживания. Будьте честными перед собой, не фантазируйте, а четко следуйте инструкциям. Удерживайте палец в Ловушке не менее 2-х минут на каждое переживание. Рекомендуется повторить процедуру пересмотра не менее 4-х раз в течение месяца. Каждый новый раз вопросы из списка могут быть разные.
        </div>
        <div class="modal-text hidden en_block">
          <b>Method 1. Releasing.</b><br>
          Click on the button of your experience. Put the middle finger of the right hand in the center of the LOVUSHKA and start to speak out your problems. The LOVUSHKA will turn off automatically. Repeat if necessary. The number of repetitions is unlimited.<br>
          <b>Method 2. Revision of personal history.</b><br>
          Please, choose no more than two problems from the list. Put you third right finger to the centre of the picture and try to recall the situations from your life that are offered by the device. Please don’t imagine. Be honest to yourself. Continue it no less than 2 min for every issue. It is recommended to repeat this procedure 4 times per month or more. Next time you can choose another issues from the list.
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary ru_block" data-dismiss="modal">Закрыть</button>
          <button class="btn btn-primary hidden en_block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm login_modal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><span class="ru_block">Вход/Регистрация</span><span class="hidden en_block">Login/Register</span></h4>
        </div>
        <div class="modal-text">
          <div class="login__form">
            <div class="btn-group lang_block">
              <button type="button" data-lang="ru" class="btn btn-sm btn-default active btn_lang btn_lang_ru">РУС</button>
              <button type="button" data-lang="en" data-speed="4" class="btn btn-sm btn-default btn_lang btn_lang_en">EN</button>
            </div>
            <!-- LOGIN -->
            <form name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
              <p>
                <label for="user_login"><span class="ru_block">Логин</span><span class="hidden en_block">Login</span><br />
                  <input type="text" name="log" id="user_login" class="input" value="<?php echo esc_attr($user_login); ?>" size="20" />
                </label>
              </p>
              <p>
                <label for="user_pass"><span class="ru_block">Пароль</span><span class="hidden en_block">Password</span><br />
                  <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
                </label>
              </p>
              <?php
              /**
               * Fires following the 'Password' field in the login form.
               *
               * @since 2.1.0
               */
              do_action( 'login_form' );
              ?>
              <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" <?php checked( $rememberme ); ?> /> <span class="ru_block">Запомнить меня</span><span class="hidden en_block">Remember me</span></label></p>
              <p class="submit">
                  <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large ru_block" value="Войти" />
                  <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large hidden en_block" value="Login" />
                  <?php   if ( $interim_login ) { ?>
                      <input type="hidden" name="interim-login" value="1" />
                  <?php   } else { ?>
                      <input type="hidden" name="redirect_to" value="<?php echo esc_attr($redirect_to); ?>" />
                  <?php   } ?>
                  <?php   if ( $customize_login ) : ?>
                      <input type="hidden" name="customize-login" value="1" />
                  <?php   endif; ?>
                  <input type="hidden" name="testcookie" value="1" />
              </p>
              <p class="ru_block">У Вас еще нет учетной записи? <span class="toRegistration">Зарегистрируйтесь</span> в "Wizard Lovuska" и узнайте как получить доступ</p>
              <p class="hidden en_block">Do not have an account yet? <span class="toRegistration">Register</span> in "Wizard Lovuska" and learn how to get access</p>
            </form>

            <!-- REGISTRATION -->
            <form id="registerform" class="hidden" action="<?php echo site_url('wp-login.php?action=register'); ?>" method="post">
              <p>
                <label for="user_login"><span class="ru_block">Придумайте логин</span><span class="hidden en_block">Create a username</span><br>
                  <input type="text" name="user_login" id="user_login" class="input" value="" size="20" style="">
                </label>
              </p>
              <p>
                <label for="user_email">
                  E-mail<br>
                  <input type="email" name="user_email" id="user_email" class="input" value="" size="25">
                </label>
              </p>

              <p id="reg_passmail" class="ru_block">Подтверждение регистрации будет отправлено на ваш e-mail.</p>
              <p id="reg_passmail" class="hidden en_block">Confirmation of registration will be sent to your e-mail.</p>

              <br class="clear">
              <input type="hidden" name="redirect_to" value="">

              <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large ru_block" value="Регистрация"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large hidden en_block" value="Registration"></p>
              <p class="ru_block">У Вас уже есть учетная запись? <span class="toLogin">Войдите</span> в "Wizard Lovuska" используя свои логин и пароль</p>
              <p class="hidden en_block">Do you already have an account? <span class="toLogin">Enter</span> in "Wizard Lovuska" using your login and password</p>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary ru_block" data-dismiss="modal">Закрыть</button>
          <button class="btn btn-primary hidden en_block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php if(!is_user_logged_in()&&is_front_page()) { ?>
      <script>
          //Отображение меню в модали
          jQuery('#login').modal('show');
      </script>
  <?php } ?>
</body>
</html>
