var area2;
$(document).on('click', '.delete-modal-cauhoi', function() {
  $('#btn_save_cauhoi').hide();
  $('#btn_update_cauhoi').hide();
  $('#btn_delete_cauhoi').show();
  $('.modal-title').text('Delete');
  $('#modalCauhoi').modal('show');
  $('#form_create_cauhoi').hide();

  var stuff = $(this).data('info').split(',');
  $msg = "<div class='alert alert-danger'>Bạn có thực sự muốn xóa câu hỏi : "+stuff[1]+"  Không ?</div>";
  $('#save_id').text(stuff[0]);
  $('.delete_msg').show();
  $('.delete_msg').html($msg);
});
$(document).on('click', '#close_form_cauhoi', function() {
 resetNiceEdit();
});
$(document).on('click', '#btn_update_cauhoi', function() {
 $.ajaxSetup({
 headers: {
     'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
 }
});
 var url = $(this).attr("data-link");
 var token = $(this).data('token');
 var id = $('#save_id').val();
 var row = $('#save_row').val();
 var nicE = new nicEditors.findEditor('cau_hoi');
 question = nicE.getContent();
       $.ajax({
           method: 'POST',
           url: url+'/'+id,
           data: {
             '_token': token,
             'cau_hoi': question,
                  'cau_tla': $('#cau_tla').val(),
                  'cau_tlb': $('#cau_tlb').val(),
                  'cau_tlc': $('#cau_tlc').val(),
                  'cau_tld': $('#cau_tld').val(),
                  'cau_tl': $('#cau_tl').val(),
                  'id_baithi': $('#id_baithi').val(),
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
                     $('.item' + value.id).replaceWith("<tr class='item" + value.id + "'><th scope='row'>"+row+"</th><td>"+value.cau_hoi+"</td><td>"+value.cau_tla+"</td><td>"+value.cau_tlb+"</td><td>"+value.cau_tlc+"</td><td>"+value.cau_tld+"</td><td><button class='edit-modal-cauhoi btn btn-info' data-info='"+value.id+","+value.cau_hoi+","+value.cau_tla+","+ value.cau_tlb
                        +","+value.cau_tlc+","+value.cau_tld+","+row+"'><span class='glyphicon glyphicon-edit'></span></button></td><td><button class='delete-modal-cauhoi btn btn-danger'data-info='"+value.id+","+value.cau_hoi+","+value.cau_tla+","+ value.cau_tlb
                           +","+value.cau_tlc+","+value.cau_tld+","+row+"'><span class='glyphicon glyphicon-trash'></span></button></td>");
                  });
                }},error: function (xhr, status, error) {
                  $('#modalCauhoi').modal('show');
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
$(document).on('click', '#btn_delete_cauhoi', function() {
  resetNiceEdit();
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
function resetNiceEdit()
{
  if(!area2) {

        }else {
                area2.removeInstance('cau_hoi');
                area2 = null;
        }
}
function resetText()
{
    $('#cau_hoi').val("");
    $('#cau_tla').val("");
    $('#cau_tlb').val("");
    $('#cau_tlc').val("");
    $('#cau_tld').val("");
}
$(document).on('click', '.edit-modal-cauhoi', function() {
  resetText()
  var stuff = $(this).data('info').split(',');
  $('#save_id').val(stuff[0]);
  $('#save_row').val(stuff[6]);
  $('#cau_hoi').val(stuff[1]);
  $('#cau_tla').val(stuff[2]);
  $('#cau_tlb').val(stuff[3]);
  $('#cau_tlc').val(stuff[4]);
  $('#cau_tld').val(stuff[5]);
      if(!area2) {
              area2 = new nicEditor({fullPanel : true}).panelInstance('cau_hoi');
      }
      $('#btn_update_cauhoi').show();
      $('#form_create_cauhoi').show();
      $('#btn_save_cauhoi').hide();
      $('#btn_delete_cauhoi').hide();
      $('.modal-title').text('Update');
      $('.delete_msg').hide();
      $('#modalCauhoi').modal('show');
});
$(document).on('click', '#gg', function() {
  var nicE = new nicEditors.findEditor('fucker');
  question = nicE.getContent();
  alert(question)
    });
$(document).on('click', '#btn_add_cauhoi', function() {
  resetText();
  if(!area2) {
              area2 = new nicEditor({fullPanel : true}).panelInstance('cau_hoi');
    }

        $('#form_create_cauhoi').show();
        $('#btn_update_cauhoi').hide();
        $('#btn_delete_cauhoi').hide();
        $('.modal-title').text('Add');
        $('#modalCauhoi').modal('show');
        $('.delete_msg').hide();
        $('#btn_save_cauhoi').show();
    });
    $(document).on('click', '#btn_save_cauhoi', function() {
      $.ajaxSetup({
      headers: {
          'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
      }
    });
      var nicE = new nicEditors.findEditor('cau_hoi');
      question = nicE.getContent();
      var url = $(this).attr("data-link");
      var token = $(this).data('token');
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                  '_token': token,
                  'cau_hoi': question,
                  'cau_tla': $('#cau_tla').val(),
                  'cau_tlb': $('#cau_tlb').val(),
                  'cau_tlc': $('#cau_tlc').val(),
                  'cau_tld': $('#cau_tld').val(),
                  'cau_tl': $('#cau_tl').val(),
                  'id_baithi': $('#id_baithi').val(),
                  '_method' : 'POST'
                },beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },success: function(data) {
                    if (data.errors){

                    }
                     else {
                       $msg = "<div class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Đã sửa thành công</strong></div>"
                       $('#showsuccesbyself').html($msg);
                       $("#form_cauhoi").html(data);
                      var table = $('#table_teachers').DataTable();
                      table.page('last').draw('page');
                      resetNiceEdit();
                     }},error: function (xhr, status, error) {
                       $('#modalCauhoi').modal('show');
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
