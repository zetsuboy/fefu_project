$(document).ready(function(){
    $('#review_button').click(function(){
        $('.overlay').fadeIn(297,	function(){
            $('.write_review_form') 
            .css('display', 'block')
            .animate({opacity: 1}, 198);
          });
    })

    $('#review_form_close, .overlay').click(function(){
        $('.write_review_form').animate({opacity: 0}, 198, function(){
            $(this).css('display', 'none');
            $('.overlay').fadeOut(297);
          });
    })

    $('.review_form').submit(function(event){
        event.preventDefault();

        var $form = $(this);
        var $inputs = $form.find("input, select, button, textarea");
        var serData = $form.serialize();
        $inputs.prop("disabled", true);

        var request = $.ajax({
            url:'backend/write_review.php',
            type:'post',
            data:serData,
            success:function(response){
                $('#add_review_result').html("Отзыв успешно добавлен!");
            }
        })
    })
})