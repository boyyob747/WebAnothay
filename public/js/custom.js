function submitForm(action) {
    var form = document.getElementById('form_create_teacher');
    form.action = action;
    form.submit();
}
$(document).on('click',function(){
    // $('#datepicker').datetimepicker({
    //     locale: 'it',
    //     viewMode: 'years',
    //     format: 'DD/MM/YYYY',
    // }).on("dp.show", function(){
    //     console.log("dtp open");
    //     if (firstOpen==true){
    //         $(this).data('DateTimePicker').date("01/01/1980");
    //         firstOpen=false;
    //     }
    // });
    $('#datepicker').datepicker({
            format: 'yyyy-mm-dd'
    });
});

function bs_input_file() {
    $(".input-file").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                var element = $("<input type='file' name='fileimport' class='input-ghost' style='visibility:hidden; height:0'>");
                element.attr("name",$(this).attr("name"));
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                });
                $(this).find("button.btn-choose").click(function(){
                    element.click();
                });
                $(this).find("button.btn-reset").click(function(){
                    element.val(null);
                    $(this).parents(".input-file").find('input').val('');
                });
                $(this).find('input').css("cursor","pointer");
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();
                    return false;
                });
                return element;
            }
        }
    );
}
$(function() {
    bs_input_file();
});