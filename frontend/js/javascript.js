$(document).ready(function() {
  $('a.log').click( function(event){
    event.preventDefault();
    $('.overlay').fadeIn(297,	function(){
      $('#login_window') 
      .css('display', 'block')
      .animate({opacity: 1}, 198);
    });
  });

  $('a.logout').click( function(event){
    event.preventDefault();

    var request = $.ajax({
      url: "/backend/logout.php",
    });

    request.done(function(response, textStatus, jqXHR){
        location.reload();
    });
  });

  $('a.CreateAcc').click( function(event){
    event.preventDefault();
    $('#login_window').animate({opacity: 0}, 198, function(){
      $(this).css('display', 'none');
      $('#newacc_window') 
      .css('display', 'block')
      .animate({opacity: 1}, 198);
    });
  });

  $('#login_close, .overlay').click( function(){
    $('#login_window').animate({opacity: 0}, 198, function(){
      $(this).css('display', 'none');
      $('.overlay').fadeOut(297);
    });
  });

  $('#newacc_close, .overlay').click( function(){
    $('#newacc_window').animate({opacity: 0}, 198, function(){
      $(this).css('display', 'none');
      $('.overlay').fadeOut(297);
    });
  });

  $('#add_ev').click( function(event){
    event.preventDefault();
    $('.overlay').fadeIn(297,	function(){
      $('.add_window') 
      .css('display', 'flex')
      .animate({opacity: 1}, 198);
    });
  });

  $('#add_window_close, .overlay').click( function(){
    $('.add_window').animate({opacity: 0}, 198, function(){
      $(this).css('display', 'none');
      $('.overlay').fadeOut(297);
      location.reload();
    });
  });

  $('.event_box').click(function(){
    var $event_box = $(this);
    var $num = $event_box.attr('id').split('-')[1];
    var $event_box_window = '#event_box_window-' + $num;
    $('.overlay').fadeIn(297,	function(){
      $($event_box_window) 
      .css('display', 'block')
      .animate({opacity: 1}, 198);
    });
  });

  $('.event_box_window_close, .overlay').click( function(){
    $('.event_box_window').animate({opacity: 0}, 198, function(){
      $(this).css('display', 'none');
      $('.overlay').fadeOut(297);
    });
  });

  $('.event_delete_button').click(function(){
    var $button = $(this);
    var $num = $button.attr('id').split('-')[1];
    var $event_box_window = '#event_box_window-' + $num;
    var $event_box = '#event_box_-' + $num;

    $button.prop("disabled", true);

    var request = $.ajax({
      url:'backend/delete_event.php',
      type: 'post',
      data: {id:$num}
    });

    request.done(function(response, textStatus, jqXHR){
      $(".main_block_of_schdl").load(location.href + " .main_block_of_schdl");
      $('.overlay').click();
      setTimeout(
        function() 
        {
          $($event_box_window).remove();
        }, 1000);
    });

    

    request.fail(function(jqXHR, textStatus, errorThrown){
      alert("Не удалость удалить событие!");
    })

    request.always(function(){
      $button.prop("disabled", false);
    });
  });

  $(".login_field").submit(function(event){
    event.preventDefault();

    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serData = $form.serialize();
    $inputs.prop("disabled", true);

    var request = $.ajax({
      url: "backend/login.php",
      type: "post",
      data: serData
    });

    request.done(function(response, textStatus, jqXHR){
      if (response == '0'){
        location.reload();
      }
      else {
        alert("Неверные данные!");
      }
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
      alert("Проблемы с соединением!");
    });

    request.always(function(){
      $inputs.prop("disabled", false);
    });
  });

  $(".newacc_field").submit(function(event){
    event.preventDefault();

    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serData = $form.serialize();
    $inputs.prop("disabled", true);

    var request = $.ajax({
      url: "backend/newacc_create.php",
      type: "post",
      data: serData
    });

    request.done(function (response, textStatus, jqXHR){
      alert(response);
    });

    request.fail(function (response, textStatus, jqXHR){
      alert("Ошибка!");
    });

    request.always(function(){
      $inputs.prop("disabled", false);
    });
  });

  $(".add_form").submit(function(event){
    event.preventDefault();

    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serData = $form.serialize();
    $inputs.prop("disabled", true);

    var request = $.ajax({
      url: "backend/add_event.php",
      type: "post",
      data: serData,
      success:function(data){
        $('#add_result').html("Событие успешно добавлено!");
      }
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
      $('#add_result').html("Проблемы с соединением!!");
    });

    request.always(function(){
      $inputs.prop("disabled", false);
    });
  });

  $('#butt_next').click(function(){

    var request = $.ajax({
      url: 'backend/week_counter_set.php',
      type:'post',
      data: {tri:'next'},
      success:function(response){
        //$(".main_block_of_schdl").load(location.href + " .main_block_of_schdl");
        location.reload();
      }
    })
  })

  $('#butt_prev').click(function(){

    var request = $.ajax({
      url: 'backend/week_counter_set.php',
      type:'post',
      data: {tri:'prev'},
      success:function(response){
        //$(".main_block_of_schdl").load(location.href + " .main_block_of_schdl");
        location.reload();
      }
    })
  })

  $('#week').click(function(){
    var request = $.ajax({
      url: 'backend/week_counter_set.php',
      type:'post',
      data: {tri:'current'},
      success:function(response){
        //$(".main_block_of_schdl").load(location.href + " .main_block_of_schdl");
        location.reload();
      }
    })
  })
});