jQuery(document).ready(function () {
  var cur_animation_val = 0,
      paused = true,
      count_animation = 0,
      rotat_per_sec = 2,
      rotateVal = 0,
      quest_count = 0,
      mode_speed,
      mode = false,
      phaseOne,
      lang,
      knife,
      knifeDate,
      knifeDateOld,
      knifeDateDiff,
      knife_rate_class,
      knife_rate_class_dotted,
      supportsStorage = function(){
          try {
              return 'localStorage' in window && window['localStorage'] !== null;
          } catch (e) {
              return false;
          }
      },
      cur_instruction = 1,
      instruction_one = undefined,
      instruction_two = undefined,
      instruction_three = undefined,
      instruction_four = undefined,
      speed_from = undefined,
      speed_one = undefined,
      speed_two = undefined,
      speed_three = undefined,
      speed_four = undefined,
      instructions = {
        "1": 'Вспомните ситуацию в которой вы волновались, суетились, боялись того, что может случиться.',
        "2": 'Вспомните ситуацию, где вы злились.',
        "3": 'Вспомните ситуацию, когда вы сдерживались и терпели, либо занижали самооценку.',
        "4": 'Вспомните, как вас заставляли согласиться с чужим мнением.',
        "5": 'Вспомните ситуацию, когда вы пытались донести до других правильную точку зрения.',
        "6": 'Вспомните ситуацию обмана и несправедливости к вам, невозможность смириться с чем-либо.',
        "7": 'Вспомните переживания чувства вины.',
        "8": 'Вспомните увлеченность идеей, планами жизни, желанием материальных ценностей.',
        "9": 'Вспомните свои сомнения при выборе того или иного товара или сомнения в чувствах при отношениях с людьми.',
        "10": 'Вспомните свои нереализованные жизненные цели и желания.',
        "11": 'Вспомните свои обиды и унижения.',
        "12": 'Вспомните состояние переживания одиночества.',
       },
      instructions_en = {
        "1": 'Please recall the situation when you worried, fussed and feared what might happen.',
        "2": 'Please recall the situation when you were angry.',
        "3": 'Please recall the situation when you held yourself back from something or lowered your self-esteem.',
        "4": 'Please recall when you were forced to agree with others opinion.',
        "5": 'Please recall the situation when you were trying to convey the proper point of view to someone or others.',
        "6": 'Please recall the situation where you experienced deceit and injustice. Inability to accept something.',
        "7": 'Please recall when you felt guilty.',
        "8": 'Please recall your obsession with an idea, plans or wealth.',
        "9": 'Please recall your doubts when choosing any products or doubt in relationship with other people.',
        "10": 'Please recall your life goals and desires which were not realised.',
        "11": 'Please recall the situation when you felt offended and humiliated.',
        "12": 'Please recall when you felt extremely lonely.',
       }
// Клик по вопросу
  jQuery('.question').on('click', function(event) {
    console.log(quest_count);
    // Если клик по уже выбранному пункту
    if (jQuery(this).hasClass('active')) {
      quest_count -= 1;
      jQuery(this).removeClass('active').addClass('noactive');
      jQuery('.noactive').removeClass('hidden');
      jQuery('.clear_prot').removeClass('hidden');
      jQuery('.set_acept').removeClass('hidden');
      if (quest_count == 0) {
        jQuery('.clear_prot').addClass('hidden');
        jQuery('.set_acept').addClass('hidden');
      }
      if (quest_count == 1) {
        if (instruction_three) {
          instruction_one = instruction_three;
        }
        if (instruction_four) {
          instruction_two = instruction_four;
        }
        instruction_three = undefined;
        instruction_four = undefined;
      } else if (quest_count == 0) {
        instruction_one = undefined;
        instruction_two = undefined;
        instruction_three = undefined;
        instruction_four = undefined;
      }
      // Клик по новому вопросу
    } else { 
      quest_count += 1;
      jQuery(this).addClass('active');
      jQuery(this).removeClass('noactive');
      jQuery('.clear_prot').removeClass('hidden');
      jQuery('.set_acept').removeClass('hidden');
      lang = localStorage.getItem('lang');
      if (quest_count == 1) {
        if (lang == 'en') {
          instruction_one = instructions_en[jQuery(this).data('quest_one')];
        } else {
          instruction_one = instructions[jQuery(this).data('quest_one')];
        }
        speed_from = jQuery(this).data('quest_one');
        if (speed_from == "1" || speed_from == "2" || speed_from == "3" || speed_from == "12") {
          speed_one = 2
        } else if (speed_from == "4" || speed_from == "5" || speed_from == "6") {
          speed_one = 10
        } else if (speed_from == "7" || speed_from == "9" || speed_from == "10" || speed_from == "11") {
          speed_one = 20
        } else if (speed_from == "8") {
          speed_one = 34
        }
        if (lang == 'en') {
          instruction_two = instructions_en[jQuery(this).data('quest_two')];
        } else {
          instruction_two = instructions[jQuery(this).data('quest_two')];
        }
        speed_from = jQuery(this).data('quest_two');
        if (speed_from == "1" || speed_from == "2" || speed_from == "3" || speed_from == "12") {
          speed_two = 2
        } else if (speed_from == "4" || speed_from == "5" || speed_from == "6") {
          speed_two = 10
        } else if (speed_from == "7" || speed_from == "9" || speed_from == "10" || speed_from == "11") {
          speed_two = 20
        } else if (speed_from == "8") {
          speed_two = 34
        }
      } else if (quest_count == 2) {
        if (lang == 'en') {
          instruction_three = instructions_en[jQuery(this).data('quest_one')];
        } else {
          instruction_three = instructions[jQuery(this).data('quest_one')];
        }
        speed_from = jQuery(this).data('quest_one');
        if (speed_from == "1" || speed_from == "2" || speed_from == "3" || speed_from == "12") {
          speed_three = 2
        } else if (speed_from == "4" || speed_from == "5" || speed_from == "6") {
          speed_three = 10
        } else if (speed_from == "7" || speed_from == "9" || speed_from == "10" || speed_from == "11") {
          speed_three = 20
        } else if (speed_from == "8") {
          speed_three = 34
        }
        if (lang == 'en') {
          instruction_four = instructions_en[jQuery(this).data('quest_two')];
        } else {
          instruction_four = instructions[jQuery(this).data('quest_two')];
        }
        speed_from = jQuery(this).data('quest_two');
        if (speed_from == "1" || speed_from == "2" || speed_from == "3" || speed_from == "12") {
          speed_four = 2
        } else if (speed_from == "4" || speed_from == "5" || speed_from == "6") {
          speed_four = 10
        } else if (speed_from == "7" || speed_from == "9" || speed_from == "10" || speed_from == "11") {
          speed_four = 20
        } else if (speed_from == "8") {
          speed_four = 34
        }
        if (instruction_three == instruction_one || instruction_three == instruction_two) {
          instruction_three = undefined;
          speed_three = undefined;
        }
        if (instruction_four == instruction_one || instruction_four == instruction_two) {
          instruction_four = undefined;
          speed_four = undefined;
        }
      }
      // Если выбрано 2 пункта
      if (quest_count >= 2) {
        jQuery('.noactive').addClass('hidden');
      }
    }
  });
//Отмена выбора
jQuery('.clear_prot, .stop_prot, .stop').on('click', function(event) {
  quest_count = 0;
  jQuery('.clear_prot').addClass('hidden');
  jQuery('.set_acept').addClass('hidden');
  instruction_one = undefined;
  instruction_two = undefined;
  instruction_three = undefined;
  instruction_four = undefined;
  speed_from = undefined;
  speed_one = undefined;
  speed_two = undefined;
  speed_three = undefined;
  speed_four = undefined;
  cur_instruction = 1;
  jQuery('.speed_slover').removeClass('hidden');
  jQuery('.speed_faster').removeClass('hidden');
  jQuery('.speed_closed').addClass('hidden');
  jQuery('.instruction_block').addClass('hidden');
  jQuery('.close_instr').addClass('hidden');
  jQuery('.next_instr').removeClass('hidden');
  jQuery('.question').removeClass('active').addClass('noactive').removeClass('hidden');
  jQuery('.clear_prot').addClass('hidden');
});

// Инструктаж перед стартом
  jQuery('.set_acept').on('click', function(event) {
    jQuery('#set').modal('hide');
    jQuery('#result').modal('show');
  });
 // Быстрее 
  jQuery('.speed_faster').on('click', function(event) {
    if (paused == false) {
      rotat_per_sec += 2;
    } else {
      rotat_per_sec += 2;
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      jQuery('.speed_control').removeClass('hidden');
      phaseOne = setInterval(function(){
        if (count_animation <= 1200){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val -= rotat_per_sec;
        } else {
            clearInterval(phaseOne);
            jQuery('.protocol').css('transform', 'rotate(0deg)');
        } 
      }, 500);
    }
    jQuery('.lovushka_speed').text(rotat_per_sec);
  });
  // Медленнее
  jQuery('.speed_slover').on('click', function(event) {
    if (paused == false) {
      rotat_per_sec -= 2;
      if (rotat_per_sec <= 1) {
        rotat_per_sec = 2;
      }
    } else {
      rotat_per_sec -= 2;
      if (rotat_per_sec <= 1) {
        rotat_per_sec = 2;
      }
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      jQuery('.speed_control').removeClass('hidden');
      phaseOne = setInterval(function(){
        if (count_animation <= 1200){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val -= rotat_per_sec;
        } else {
            clearInterval(phaseOne);
        } 
      }, 500);
    }
    jQuery('.lovushka_speed').text(rotat_per_sec);
  });
// Запуск расширенного протокола
  jQuery('.start_prot').on('click', function(event) {
    paused = false;
    jQuery('.instr').text(instruction_one);
    jQuery('.speed_slover').addClass('hidden');
    jQuery('.speed_faster').addClass('hidden');
    jQuery('.speed_closed').removeClass('hidden');
    jQuery('.instruction_block').removeClass('hidden');
    jQuery('.set_acept').addClass('hidden');
    jQuery('.clear_prot').addClass('hidden');
    jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
    jQuery('.speed_control').removeClass('hidden');
    jQuery('#result').modal('hide');
    jQuery('.questions').addClass('hidden');
    jQuery('.runed').removeClass('hidden');
    rotat_per_sec = speed_one;
    phaseOne = setInterval(function(){
      if (count_animation <= 1200){                                                                         //120
        jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
        count_animation += 0.5;
        cur_animation_val -= rotat_per_sec;
        jQuery('.lovushka_speed').text(rotat_per_sec);
      } else {
          clearInterval(phaseOne);
          jQuery('.protocol').css('transform', 'rotate(0deg)');
      } 
    }, 500);
  });
// Переключение инструкций
jQuery('.instruction_block').on('click', function(event) {
  cur_instruction += 1;
  if (cur_instruction == 2 && instruction_two) {
    jQuery('.instr').text(instruction_two);
    rotat_per_sec = speed_two;
    if (instruction_three == undefined) {
      jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
    }
  } else if (cur_instruction == 3 && instruction_three) {
    jQuery('.instr').text(instruction_three);
    rotat_per_sec = speed_three;
    if (instruction_four == undefined) {
      jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
    }
  } else if (cur_instruction == 4 && instruction_four) {
    jQuery('.instr').text(instruction_four);
    rotat_per_sec = speed_four;
    jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
  } else {
    jQuery('.close_instr').removeClass('hidden');
    jQuery('.next_instr').addClass('hidden');
  }
  jQuery('.lovushka_speed').text(rotat_per_sec);
});
//Закрытие окна инструкций
  jQuery('.close_instr').on('click', function(event) {
    jQuery('.instruction_block').addClass('hidden');
    jQuery('.close_instr').addClass('hidden');
    jQuery('.next_instr').removeClass('hidden');
    cur_instruction = 1;
  });
  // Пауза/Пуск
  jQuery('.play').on('click', function(event) {
    if (paused == false) {
      jQuery('.fa-pause').removeClass('fa-pause').addClass('fa-play');
      paused = true;
      clearInterval(phaseOne);
    } else {
      paused = false;
      jQuery('.fa-play').removeClass('fa-play').addClass('fa-pause');
      jQuery('.questions').addClass('hidden');
      jQuery('.runed').removeClass('hidden');
      phaseOne = setInterval(function(){
        if (count_animation <= 1200){                                                                         //120
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val -= rotat_per_sec;
        } else {
            clearInterval(phaseOne);
            jQuery('.protocol').css('transform', 'rotate(0deg)');
        } 
      }, 500);
      jQuery('.lovushka_speed').text(rotat_per_sec);
    }
  });
  // Остановка протокола
  jQuery('.stop_prot, .stop').on('click', function(event) {
    jQuery('.fa-pause').removeClass('fa-pause').addClass('fa-play');
    jQuery('.question').removeClass('active');
    jQuery('.easy_mode_item').removeClass('active');
    paused = true;
    jQuery('.protocol').css('transform', 'rotate(0deg)');
    rotat_per_sec = 2;
    cur_animation_val = 0;
    count_animation = 0;
    mode = false;
    mode_speed = 0;
    clearInterval(phaseOne);
    jQuery('.questions').removeClass('hidden');
    jQuery('.runed').addClass('hidden');
    quest_count = 0;
    instruction_one = undefined;
    instruction_two = undefined;
    instruction_three = undefined;
    instruction_four = undefined;
    speed_from = undefined;
    speed_one = undefined;
    speed_two = undefined;
    speed_three = undefined;
    speed_four = undefined;
    cur_instruction = 1;
    jQuery('.speed_slover').removeClass('hidden');
    jQuery('.speed_faster').removeClass('hidden');
    jQuery('.speed_closed').addClass('hidden');
    jQuery('.close_instr').addClass('hidden');
    jQuery('.next_instr').removeClass('hidden');
    jQuery('.instruction_block').addClass('hidden');
    jQuery('.lovushka_speed').text('0');
  });

  // Упрощенный протокол
  jQuery('.easy_mode_item').on('click', function(event) {
    jQuery('.easy_mode_item').removeClass('active');
    if (jQuery(this).hasClass('active')) {
      jQuery('.lovushka_speed').text(0);
      cur_animation_val = 0;
      count_animation = 0;
      mode_speed = 0;
      mode = false;
      jQuery('.protocol').css('transform', 'rotate(0deg)');
      jQuery('.speed_slover').removeClass('hidden');
      jQuery('.speed_faster').removeClass('hidden');
      jQuery('.speed_closed').addClass('hidden');
    } else {
      jQuery(this).addClass('active');
      mode = true;
      mode_speed = parseFloat(jQuery(this).data('speed'));
      jQuery('.speed_slover').addClass('hidden');
      jQuery('.speed_faster').addClass('hidden');
      jQuery('.speed_closed').removeClass('hidden');
    }
    clearInterval(phaseOne);
    if (mode == true) {
      console.log(mode);
      phaseOne = setInterval(function(){
        if (count_animation <= 240){                      //4
          jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
          count_animation += 0.5;
          cur_animation_val -= mode_speed;
          jQuery('.lovushka_speed').text(mode_speed);
          console.log(count_animation);
        } else {
            clearInterval(phaseOne);
            jQuery('.lovushka_speed').text(0);
            cur_animation_val = 0;
            count_animation = 0;
            mode_speed = 0;
            mode = false;
            jQuery('.protocol').css('transform', 'rotate(0deg)');
            jQuery('.easy_mode_item').removeClass('active');
            jQuery('.speed_slover').removeClass('hidden');
            jQuery('.speed_faster').removeClass('hidden');
            jQuery('.speed_closed').addClass('hidden');
        } 
      }, 500);
    }
  });

  // Переключение языков
  if(supportsStorage && localStorage.getItem('lang')){
    lang = localStorage.getItem('lang');
    jQuery('.btn_lang').removeClass('active');
    if (lang == 'en') {
      jQuery('.btn_lang_en').addClass('active')
      jQuery('.en_block').removeClass('hidden');
      jQuery('.ru_block').addClass('hidden');
    } else {
      jQuery('.btn_lang_ru').addClass('active');
      jQuery('.en_block').addClass('hidden');
      jQuery('.ru_block').removeClass('hidden');
    }
  }

  jQuery('.btn_lang').on('click', function(event) {
    jQuery('.btn_lang').removeClass('active');
    lang = jQuery(this).data('lang');
    localStorage.setItem('lang', lang);
    if (lang == 'en') {
      jQuery('.btn_lang_en').addClass('active');
      jQuery('.en_block').removeClass('hidden');
      jQuery('.ru_block').addClass('hidden');
    } else {
      jQuery('.btn_lang_ru').addClass('active');
      jQuery('.en_block').addClass('hidden');
      jQuery('.ru_block').removeClass('hidden');
    }
  });

  // Переход к форме регистрации и обратно
  jQuery('.toRegistration').on('click', function(event) {
    jQuery('#loginform').addClass('hidden');
    jQuery('#registerform').removeClass('hidden');
  });
  jQuery('.toLogin').on('click', function(event) {
    jQuery('#loginform').removeClass('hidden');
    jQuery('#registerform').addClass('hidden');
  });

  jQuery('.protocol').css('height', jQuery('.protocol').css('width'));
  jQuery('.protocol svg').css('height', jQuery('.protocol svg').css('width'));
  jQuery(window).resize(function(event) {
    jQuery('.protocol').css('height', jQuery('.protocol').css('width'));
    jQuery('.protocol svg').css('height', jQuery('.protocol svg').css('width'));
  });
  jQuery('.set_disabled').popover();
  jQuery('.speed_closed').tooltip({
    delay: {hide: 2000 }
  })

  // Регрессивное центрирование

  jQuery( function() {
    var handle = jQuery("#custom-handle");
    var handle_val;
    jQuery("#slider").slider({
      min: 0,
      max: 200,
      create: function() {
        handle.text(jQuery(this).slider("value"));
      },
      slide: function( event, ui ) {
        // handle.text( ui.value );
        handle_val = ui.value;
        knife = jQuery('body').find('#custom-handle').css('left');
        knife = parseFloat(knife.substr(0, knife.length - 2)).toFixed();
        console.log(knife);
        knifeDate = new Date();
        knifeDateDiff = knifeDate - knifeDateOld;
        // console.log('test '+knifeDateDiff);
        knife_rate_class = 'knife_rate-'+knife;
        knife_rate_class_dotted = '.knife_rate-'+knife;
        jQuery('.reverce_graph').append('<div class='+knife_rate_class+'></div>');
        jQuery(knife_rate_class_dotted).addClass('knife_rate').css({
            left: +knife+30+'px',
            height: knifeDateDiff*2+'px'
        });
        knifeDateOld = knifeDate;
      },
      stop: function( event, ui ) {
        console.log(handle_val);
        jQuery('.reverce_acept').removeAttr('style');
        if (handle_val <= 60) {
          mode_speed = 2;
        } else if (handle_val > 60 && handle_val <= 111) {
          mode_speed = 4;
        } else if (handle_val > 111 && handle_val <= 160) {
          mode_speed = 6;
        } else if (handle_val > 160) {
          mode_speed = 8;
        }
      }
    });
  });
  
  jQuery('.revece_bc').on('click', function(event) {
    jQuery('.lovushka_speed').text(0);
    cur_animation_val = 0;
    count_animation = 0;
    mode_speed = 0;
    jQuery('.protocol').css('transform', 'rotate(0deg)');
    clearInterval(phaseOne);
    jQuery('.reverce_acept').css('display', 'none');
  });
  jQuery('.reverce_acept').on('click', function(event) {
    cur_animation_val = 0;
    count_animation = 0;
    jQuery('.speed_slover').addClass('hidden');
    jQuery('.speed_faster').addClass('hidden');
    jQuery('.speed_closed').removeClass('hidden');
    phaseOne = setInterval(function(){
      if (count_animation <= 240){
        jQuery('.protocol').css('transform', 'rotate('+cur_animation_val+'deg)');
        count_animation += 0.5;
        cur_animation_val -= mode_speed;
        jQuery('.lovushka_speed').text(mode_speed);
      } else {
          clearInterval(phaseOne);
          jQuery('.lovushka_speed').text(0);
          cur_animation_val = 0;
          count_animation = 0;
          mode_speed = 0;
          mode = false;
          jQuery('.protocol').css('transform', 'rotate(0deg)');
          jQuery('.speed_slover').removeClass('hidden');
          jQuery('.speed_faster').removeClass('hidden');
          jQuery('.speed_closed').addClass('hidden');
      } 
    }, 500);
  });
});
