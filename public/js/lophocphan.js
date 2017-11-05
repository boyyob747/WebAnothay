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

          //  fillmodalDataSinhVien(['','','','','','','Công nghệ thông tin','','','']);
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
                  'ten_lop_hoc_phan': $('#ten_lop_hoc_phan').val(),
                  'teacher_id': $('#teacher_id').val(),
                  'monhoc_id': $('#monhoc_id').val(),
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
