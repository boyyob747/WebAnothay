function popitup(link) {
  var w = window.open(link.href,
        link.target||"_blank",
        'menubar=no,toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=no,dependent,width=800,height=620,left=0,top=0');
  return w?false:true; // allow the link to work if popup is blocked
 }

function submitForm(action) {
    var form = document.getElementById('form_create_teacher');
    form.action = action;
    form.submit();
}
$(document).ready(function() {
    $('#table_teachers').DataTable();
} );

$(document).on('click',function(){
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

function getTeacherFromServer($id){
  $.ajax({url: "/home/teacher/"+$id+"/edit",type: "get",dataType: "html", success: function(result){
               $('#include').html(result);
              $('#modalEdit').modal('show')
              $('#modalAdd').modal('hide')
        },  error: function (xhr, status, error) {
                alert(xhr.responseText);
            }});
}
function editTeacherFromServer($id)
{
  $.ajax({url: "/home/teacher/update/"+$id,type: "POST",dataType: "html",data: $("#form_edit_teacher").serialize(), success: function(result){
        },  error: function (xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          var msg = ""
          var it = ""
          var data = jQuery.parseJSON(JSON.stringify(err.errors));
            $.each(data, function(key, item)
            {
                it = "<li>"+item+"</\li>"
                msg = msg + it ;
              });
            document.getElementById("divError").innerHTML=msg;
            }});
}

$(document).on('click', '.edit-modal', function() {
        $('#btn_acction').text(" Update");
        $('.modal-title').text('Edit');
        $('#add_with_excel').hide();
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff);
        $('#modalAdd').modal('show');
        $('#btn_delete').hide();
        $('#btn_save_teacher').hide();
        $('#form_create_teacher').show();
        $('.delete_msg').hide();
        $('#btn_acction').show();
        $("#username").prop('disabled', true);
        $("#email").prop('disabled', true);
});
function fillmodalData(details){
    $('#id').val(details[0]);
    $('#name').val(details[1]);
    $('#username').val(details[2]);
    $('#email').val(details[3]);
    $('#datepicker').val(details[4]);
    $('#truong').val(details[5]);
    $('#khoa').val(details[6]);
    $('#sodienthoai').val(details[7]);
    $('#user_id').val(details[8]);
    $('#row').val(details[9]);
}
    $(document).on('click', '#btn_add', function() {
            $('#btn_acction').hide();
            $('.modal-title').text('Add');
            $('#add_with_excel').show();
            $('#modalAdd').modal('show');
            $('#btn_delete').hide();
            $('#form_create_teacher').show();
            $('.delete_msg').hide();
            $('#btn_save_teacher').show();
            $("#email").prop('disabled', false);
            $("#username").prop('disabled', false);
            $("#password").prop('disabled', false);
            fillmodalData(['','','','','','Truong dai hoc bach khoa','Công nghệ thông tin','','','']);
        });


    $(document).on('click', '#btn_acction', function() {
      var id = $("#id").val();
      var url = '/home/teacher/'+id;
      var row = $('#row').val();
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                  '_token': $('input[name=_token]').val(),
                  'id': id,
                  'user_id': $('#user_id').val(),
                  'name': $('#name').val(),
                  'ngaysinh': $('#datepicker').val(),
                  'truong': $('#truong').val(),
                  'password': $('#password').val(),
                  'khoa': $('#khoa').val(),
                  'sodienthoai': $('#sodienthoai').val(),
                  '_method' : 'PUT'
                },
                success: function(data) {
                    if (data.errors){
                        alert('error');
                    }
                     else {
                       $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã sửa thành công</strong></div>"
                       $('#showsuccesbyself').html($msg);
                      $.each(data,function(key,value){
                         $('.item' + value.id).replaceWith("<tr class='item" + value.id + "'><th scope='row'>"+row+"</th><td>" +
                            value.name + "</td><td>" + value.username +
                            "</td><td>" + value.email + "</td><td>" + value.ngaysinh + "</td><td>" +
                             value.truong + "</td><td>" + value.khoa + "</td><td>"+value.sodienthoai+"</td><td><button class='edit-modal btn btn-info' data-info='"
                              +value.id+","+value.name+","+value.username+","+ value.email
                                +","+value.ngaysinh+","+value.truong+","+value.khoa+","+value.sodienthoai+","
                                +value.user_id+","+row+"'><span class='glyphicon glyphicon-edit'></span></button></td><td><button class='delete-modal btn btn-danger' data-info='"
                                 +value.id+","+value.name+","+value.username+","+ value.email
                                   +","+value.ngaysinh+","+value.truong+","+value.khoa+","+value.sodienthoai+","
                                   +value.user_id+","+row+"'><span class='glyphicon glyphicon-trash'></span></button></td></tr>")

                      });
                     }},error: function (xhr, status, error) {
                       $('#modalAdd').modal('show');
                       var err = eval("(" + xhr.responseText + ")");
                       var msg = ""
                       var it = ""
                       var data = jQuery.parseJSON(JSON.stringify(err.errors));
                         $.each(data, function(key, item)
                         {
                             it = "<div class='alert alert-danger alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Lỗi : </strong> "+item+"</div>"
                             msg = msg + it ;
                           });
                        $('.div_error').html(msg);

                         }
            });
        });
        $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
        }
      });

    $(document).on('click', '.delete-modal', function() {
      $('#btn_save_teacher').hide();
      $('#btn_acction').hide();
      $('#btn_delete').show();
      $('#add_with_excel').hide();
      $('.modal-title').text('Delete');
      $('#form_create_teacher').hide();
      $('#modalAdd').modal('show');
      var stuff = $(this).data('info').split(',');
      $msg = "<div class='alert alert-danger'>Bạn có thực sự muốn xóa "+stuff[1]+" Không ?</div>";
      $('#save_id').text(stuff[8]);
      $('#save_row').text(stuff[0]);
      $('.delete_msg').show();
      $('.delete_msg').html($msg);
  });

    $(document).on('click', '#btn_delete', function() {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var id = $('#save_id').text();
      var token = $('#btn_delete').data('token');
       var row = $('#save_row').text();
      $.ajax({
                  method: 'GET',
                  url: '/deleteteacher/'+id,
                  data: {
                     '_token' :token
                  },
                  success: function(data) {
                      $('.item' + row).remove();
                      $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã xóa thành công</strong></div>"
                      $('#showsuccesbyself').html($msg);
                  },
                  error: function (xhr, status, error) {
                    $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Lỗi : </strong>"+xhr.responseText+"</div>"
                    $('#showsuccesbyself').html($msg);
                  }
              });

    });
