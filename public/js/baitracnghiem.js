$(document).on('click', '#btn_modal_tracngiem', function() {
      $('#modalBaiTracNgiem').modal('show');
      $('#btn_update_baitrac').hide();
      $('#btn_delete_baitrac').hide();
      $('#btn_save_baitrac').show();
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
              'soluongcauhoi': $('#soluongcauhoi').val(),
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
                   alert(xhr.responseText)
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
