var area2;
$(document).on('click', '.delete-modal-cauhoi', function() {
      var sizeOfCauHoi = $(this).data('info');
      var msg = "";
      for(var i=0;i<sizeOfCauHoi;i++)
      {
         var name = "cautl"+i;
         msg = msg + i +" : " +  $("#cautl"+i+":checked").val() + "\n"
      }
      alert(msg)
});
$(document).on('click', '#gg', function() {
  var nicE = new nicEditors.findEditor('fucker');
  question = nicE.getContent();
  alert(question)
    });
$(document).on('click', '#btn_add_cauhoi', function() {
        area2 = new nicEditor({fullPanel : true}).panelInstance('cau_hoi');
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
