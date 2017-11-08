
$(document).on('click', '#btn_add_lophocphan', function() {
        $('#btn_update_sinhvien').hide();
        $('#btn_delete_lophocphan').hide();
        $('.modal-title').text('Add');
        $('#modalLopHocPhanSinhvien').modal('show');
        $('#btn_update_lophocphan').hide();
        $('#form_create_lophocphan').show();
        $('.delete_msg').hide();
        $('#btn_save_lophocphan').show();
          $('#add_with_excel').hide();
      //  fillmodalDataSinhVien(['','','','','','','Công nghệ thông tin','','','']);
    });
    $(document).on('click', '#btn_xoa_lophoc', function() {
      $('#btn_update_sinhvien').hide();
      $('#btn_save_lophocphan').hide();
      $('#btn_delete_lophocphan').show();
      $('#add_with_excel').hide();
      $('.modal-title').text('Delete');
      $('#form_create_lophocphan').hide();
      $('#modalLopHocPhanSinhvien').modal('show');
      var stuff = $(this).data('info').split(',');
      $msg = "<div class='alert alert-danger'>Bạn có thực sự muốn xóa "+stuff[1]+" Không ?</div>";
      $('#save_id').text(stuff[0]);
      $('#save_row').text(stuff[4]);
      $('.delete_msg').show();
      $('.delete_msg').html($msg);
  });
  $(document).on('click', '#btn_delete_lophocphan', function() {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var url = $(this).attr("data-link");
    var id = $('#save_id').text();
    var token = $(this).data('token');
    var row = $('#save_row').text();
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
    $(document).on('click', '#btn_sua_lophoc', function() {
            $('#btn_update_lophocphan').hide();
            $('#btn_delete_lophocphan').hide();
            $('.modal-title').text('Edit');
            $('#modalLopHocPhanSinhvien').modal('show');
            $('#btn_update_lophocphan').show();
            $('#form_create_lophocphan').show();
            $('.delete_msg').hide();
            $('#btn_save_lophocphan').hide();
            $('#add_with_excel').hide();
            var stuff = $(this).data('info').split(',');
            fillmodalDataSinhVien(stuff);
        });
        function fillmodalDataSinhVien(details){
            $('#id').val(details[0]);
            $('#ten_lop_hoc_phan').val(details[1]);
            $("#monhoc_id").val(details[2]).change();
            $('#name_teacher').val(details[3]);
        }
    $(document).on('click', '#btn_nhap_sv', function() {
            $('#btn_update_sinhvien').hide();
            $('#btn_delete_lophocphan').hide();
            $('.modal-title').text('Nhập dánh sách sinh viên');
            $('#modalLopHocPhanSinhvien').modal('show');
            $('#add_with_excel').show();
            $('#btn_update_lophocphan').hide();
            $('#form_create_lophocphan').hide();
            $('.delete_msg').hide();
            $('#btn_save_lophocphan').show();
            var details = $(this).data('info').split(',');
            $('#lophocphan_id').val(details[0]);
        });

$(document).on('click', '#btn_save_lophocphan', function() {
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
              'name_teacher':$('#name_teacher').val(),
              'monhoc_id':$('#monhoc_id').val(),
              'ten_lop_hoc_phan':$('#ten_lop_hoc_phan').val(),
              '_method' : 'POST'
            },beforeSend: function(xhr){
              xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
            },success: function(data) {
                if (data.errors){

                }
                 else {

                   if(data == 'false'){
                      $('#modalLopHocPhanSinhvien').modal('show');
                      it = "<div class='alert alert-danger alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Lỗi : </strong> Không có giảng viên này</div>"
                      $('.div_error').html(it);
                      $('#name_teacher').val(null);
                      $("#name_teacher").focus();
                   }else{
                      $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã nhập dữ liệu thành công</strong></div>"
                      $('#showsuccesbyself').html($msg);
                     $("#content-main").html(data);
                     var table = $('#table_teachers').DataTable();
                      table.page('last').draw('page');
                   }

                 }},error: function (xhr, status, error) {
                   $('#modalLopHocPhanSinhvien').modal('show');
                   alert(xhr.responseText)
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
  $(document).on('click', '#btn_update_lophocphan', function() {

    $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
    }
  });
    var url = $(this).attr("data-link");
    var token = $(this).data('token');
    var id = $('#id').val();
          $.ajax({
              method: 'POST',
              url: url+'/'+id,
              data: {
                '_token': token,
                'name_teacher':$('#name_teacher').val(),
                'monhoc_id':$('#monhoc_id').val(),
                'ten_lop_hoc_phan':$('#ten_lop_hoc_phan').val(),
                '_method' : 'PUT'
              },beforeSend: function(xhr){
                xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
              },success: function(data) {
                  if (data.errors){

                  }
                   else {

                     if(data == 'false'){
                        $('#modalLopHocPhanSinhvien').modal('show');
                        it = "<div class='alert alert-danger alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Lỗi : </strong> Không có giảng viên này</div>"
                        $('.div_error').html(it);
                        $('#name_teacher').val(null);
                        $("#name_teacher").focus();
                     }else{
                       $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã sửa thành công</strong></div>"
                       $('#showsuccesbyself').html($msg);
                       var thongtin ="<a href='"+data.url+"/"+data.id+"' class='btn btn-info'><i class='fa fa-eye' aria-hidden='true'></i>  Xem Dánh sách sinh viên</a>";
                       if(data.isHasThongtinSV == false){
                         thongtin = "<button id='btn_nhap_sv' data-info='"+data.id+","+data.ten_lophocphans+"'"+
                           " class='btn btn-primary'><i class='fa fa-plus' aria-hidden='true'></i>  Nhập dánh sách sinh viên</button></td>"
                       }
                       var mm = "<tr class='item" + data.id + "'><th scope='row'>"+1+"</th><td>" +
                          data.ten_lophocphans + "</td><td>" + data.monhoc +
                          "</td><td>" + data.name + "</td><td>" + data.truong + "</td><td>"+data.khoa+"</td><td>" +
                           data.sodienthoai + "</td><td>" + thongtin + "</td><td><button id='btn_sua_lophoc' class='btn btn-info' data-info='"
                            +data.id+","+data.ten_lophocphans+","+data.monhoc_id+","+data.name+"'><span class='glyphicon glyphicon-edit'></span></button></td><td><button id='btn_xoa_lophoc' class='btn btn-danger' data-info='"
                             +data.id+","+data.ten_lophocphans+","+data.monhoc_id+","+data.name+"'><span class='glyphicon glyphicon-trash'></span></button></td></tr>";
                         $('.item' + data.id).replaceWith(mm)
                     }
                   }},error: function (xhr, status, error) {
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
