$(document).on('click', '#btn_add_sinhvien', function() {
  $("#email").prop('disabled', false);
  $("#username").prop('disabled', false);
        $('#btn_update_sinhvien').hide();
        $('.modal-title').text('Add');
        $('#add_with_excel').show();
        $('#modalAddSinhvien').modal('show');
        $('#btn_delete_sinhvien').hide();
        $('#form_create_sinhvien').show();
        $('.delete_msg').hide();
        $('#btn_save_sinhvien').show();
        fillmodalDataSinhVien(['','','','','','','Công nghệ thông tin','','','']);
    });
    $(document).on('click', '#btn_save_sinhvien', function() {
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
                  'name': $('#name').val(),
                  'ngaysinh': $('#datepicker').val(),
                  'lop': $('#lop').val(),
                  'khoa': $('#khoa').val(),
                  'username': $('#username').val(),
                  'email': $('#email').val(),
                  'sodienthoai': $('#sodienthoai').val(),
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
                        $('#table_teachers').DataTable();
                     }},error: function (xhr, status, error) {
                       $('#modalAddSinhvien').modal('show');
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

        $(document).on('click', '.delete-modal-sinhvien', function() {
          $('#btn_save_sinhvien').hide();
          $('#btn_update_sinhvien').hide();
          $('#btn_delete_sinhvien').show();
          $('#add_with_excel').hide();
          $('.modal-title').text('Delete');
          $('#form_create_sinhvien').hide();
          $('#modalAddSinhvien').modal('show');
          var stuff = $(this).data('info').split(',');
          $msg = "<div class='alert alert-danger'>Bạn có thực sự muốn xóa "+stuff[1]+" Không ?</div>";
          $('#save_id').text(stuff[8]);
          $('#save_row').text(stuff[0]);
          $('.delete_msg').show();
          $('.delete_msg').html($msg);
      });
      $(document).on('click', '#btn_delete_sinhvien', function() {
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
                        $('.item' + row).remove();
                        $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã xóa thành công</strong></div>"
                        $('#showsuccesbyself').html($msg);
                    },
                    error: function (xhr, status, error) {
                      alert(xhr.responseText)
                      $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Lỗi : </strong>"+xhr.responseText+"</div>"
                      $('#showsuccesbyself').html($msg);
                    }
                });

      });
        $(document).on('click', '.edit-modal-sinhvien', function() {
                $("#email").prop('disabled', true);
                $("#username").prop('disabled', true);
                $('.modal-title').text('Edit');
                $('#add_with_excel').hide();
                $('.form-horizontal').show();
                var stuff = $(this).data('info').split(',');
                fillmodalDataSinhVien(stuff);
                $('#modalAddSinhvien').modal('show');
                $('#btn_delete_sinhvien').hide();
                $('#btn_save_sinhvien').hide();
                $('#form_create_teacher').show();
                $('.delete_msg').hide();
                $('#btn_update_sinhvien').show();
        });
        function fillmodalDataSinhVien(details){
            $('#id').val(details[0]);
            $('#name').val(details[1]);
            $('#username').val(details[2]);
            $('#email').val(details[3]);
            $('#datepicker').val(details[4]);
            $('#lop').val(details[5]);
            $('#khoa').val(details[6]);
            $('#sodienthoai').val(details[7]);
            $('#user_id').val(details[8]);
            $('#row').val(details[9]);
        }

        $(document).on('click', '#btn_update_sinhvien', function() {
          var id = $("#id").val();
          var url = $(this).attr("data-link");
          var token = $(this).data('token');
          var row = $('#row').val();
                $.ajax({
                    method: 'POST',
                    url: url+'/'+id,
                    data: {
                      '_token': token,
                      'id': id,
                      'user_id': $('#user_id').val(),
                      'name': $('#name').val(),
                      'ngaysinh': $('#datepicker').val(),
                      'lop': $('#lop').val(),
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
                                "</td><td>" + value.email + "</td><td>" + value.ngaysinh + "</td><td>"+value.mssv+"</td><td>" +
                                 value.lop + "</td><td>" + value.khoa + "</td><td>"+value.sodienthoai+"</td><td><button class='edit-modal-sinhvien btn btn-info' data-info='"
                                  +value.id+","+value.name+","+value.username+","+ value.email
                                    +","+value.ngaysinh+","+value.lop+","+value.khoa+","+value.sodienthoai+","
                                    +value.user_id+","+row+"'><span class='glyphicon glyphicon-edit'></span></button></td><td><button class='delete-modal-sinhvien btn btn-danger' data-info='"
                                     +value.id+","+value.name+","+value.username+","+ value.email
                                       +","+value.ngaysinh+","+value.lop+","+value.khoa+","+value.sodienthoai+","
                                       +value.user_id+","+row+"'><span class='glyphicon glyphicon-trash'></span></button></td></tr>")

                          });
                         }},error: function (xhr, status, error) {
                           alert( xhr.responseText )
                           $('#modalAddSinhvien').modal('show');
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
