$(document).on('click', '#btn_modal_tracngiem', function() {
  resetText();
      $('#modalBaiTracNgiem').modal('show');
      $('#btn_update_baitrac').hide();
      $('#btn_delete_baitrac').hide();
      $('#btn_save_baitrac').show();
      $('#form_create_lophocphan').show();
      $('.delete_msg').hide();
      $('#add_current_bai').show();
});
$(document).on('click', '#btn_update_baitrac', function() {
  $.ajaxSetup({
  headers: {
      'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
  }
});
  var url = $(this).attr("data-link");
  var token = $(this).data('token');
  var id = $('#save_id').val();
  var row = $('#save_row').val();
        $.ajax({
            method: 'POST',
            url: url+'/'+id,
            data: {
              '_token': token,
              'lophocphan_id': $('#lophocphan_id').val(),
              'thoigianthi': $('#thoigianthi').val(),
              'title': $('#title').val(),
              'diemcua': $('#diemcua').val(),
              '_method' : 'PUT'
            },beforeSend: function(xhr){
              xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
            },success: function(data) {
                if (data.errors){

                }
                 else {
                   $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã sửa thành công</strong></div>"
                   $('#showsuccesbyself').html($msg);
                   $.each(data,function(key,value){
                     var d = "Điểm thi";
                     if (value.diemcua != 1)
                     {
                       d = "Luyền tập không có điểm";
                     }
                      $('.item' + value.id).replaceWith("<tr class='item" + value.id + "'><th scope='row'>"+row+"</th><td>" +
                         value.title + "</td><td>" + d +
                         "</td><td>" + value.duration + " phút</td><td><a href='"+$('#save_url').val()+"' class='delete-modal-sinhvien btn btn-warning'><span class='glyphicon glyphicon-eye-open'></span></a></td><td><button class='edit-modal-baitrac btn btn-info' data-info='"+value.id+","+row+","+value.title+","+ value.diemcua
                             +","+value.duration+"'><span class='glyphicon glyphicon-edit'></span></button></td><td><button class='delete-modal-baitrac btn btn-danger' data-info='"+value.id+","+row+","+value.title+","+ value.diemcua
                                +","+value.duration+"'><span class='glyphicon glyphicon-trash'></span></button></td>")

                   });
                 }},error: function (xhr, status, error) {
                   $('#modalBaiTracNgiem').modal('show');
                  // alert(xhr.responseText)
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
$(document).on('click', '#btn_delete_baitrac', function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var url = $(this).attr("data-link");
  var id = $('#save_id').text();
  var token = $(this).data('token');
  $.ajax({
              method: 'DELETE',
              url: url+'/'+id,
              data: {
                 '_token' :token,
                 '_method':'DELETE'
              },
              success: function(data) {
                  $('.item' + id).remove();
                  $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã xóa thành công</strong></div>"
                  $('#showsuccesbyself').html($msg);
              },
              error: function (xhr, status, error) {
                $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Lỗi : </strong>"+xhr.responseText+"</div>"
                $('#showsuccesbyself').html($msg);
              }
          });
});
$(document).on('click', '.edit-modal-baitrac', function() {
var stuff = $(this).data('info').split(',');
$('#modalBaiTracNgiem').modal('show');
$('#btn_update_baitrac').show();
$('#btn_delete_baitrac').hide();
$('#btn_save_baitrac').hide();
$('#add_current_bai').hide();
$('#thoigianthi').val(stuff[4]);
$('#title').val(stuff[2]);
$('#save_id').val(stuff[0]);
$('#save_row').val(stuff[1]);
$('#save_url').val(stuff[5]);

$('.delete_msg').hide();
$('#form_create_lophocphan').show();
document.getElementById("diemcua").selectedIndex = stuff[3];
});
function resetText()
{
    $('#thoigianthi').val("");
    $('#title').val("");
    document.getElementById("diemcua").selectedIndex = "0";
}
$(document).on('click', '.delete-modal-baitrac', function() {
  $('#btn_save_baitrac').hide();
  $('#btn_update_baitrac').hide();
  $('#btn_delete_baitrac').show();
  $('.modal-title').text('Delete');
  $('#modalBaiTracNgiem').modal('show');
  $('#add_current_bai').hide();
 $('#form_create_lophocphan').hide();
  var stuff = $(this).data('info').split(',');
  $msg = "<div class='alert alert-danger'>Bạn có thực sự muốn xóa Bài : "+stuff[2]+"  Không ?</div>";
  $('#save_id').text(stuff[0]);
  $('.delete_msg').show();
  $('.delete_msg').html($msg);
});
$(document).on('click', '#btn_save_baitrac', function() {
  $.ajaxSetup({
  headers: {
      'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
  }
});
  var url = $(this).attr("data-link");
  var token = $(this).data('token');
        $.ajax({
            method: 'POST',
            url: url,
            data: {
              '_token': token,
              'lophocphan_id': $('#lophocphan_id').val(),
              'thoigianthi': $('#thoigianthi').val(),
              'title': $('#title').val(),
              'diemcua': $('#diemcua').val(),
              '_method' : 'POST'
            },beforeSend: function(xhr){
              xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
            },success: function(data) {
                if (data.errors){
                }
                 else {
                   $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã sửa thành công</strong></div>"
                   $('#showsuccesbyself').html($msg);
                   $("#content-main").html(data);
                   var table = $('#table_teachers').DataTable();
                   table.page('last').draw('page');
                 }},error: function (xhr, status, error) {
                   //alert(xhr.responseText)
                   $('#modalLopHocPhanSinhvien').modal('show');
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
