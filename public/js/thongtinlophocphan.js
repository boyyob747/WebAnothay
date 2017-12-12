$(document).on('click', '#btn_state_test', function() {
  var details = $(this).data('info').split(',');
  var url = $(this).attr("data-link");
  var token = $(this).data('token');
  var id_thongtin = details[0];
  var state = details[1];
  $.ajax({
      method: 'POST',
      url: url,
      data: {
        '_token': token,
        'id_thongtin': id_thongtin,
        'state': state,
        '_method' : 'POST'
      }
      ,beforeSend: function(xhr){
        xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
      },success: function(data) {
          if (data.errors){
          }
           else {
              var msg = ''
               $.each(data,function(key,value){
                 var diem = 'Chưa thi';
                 if(value.diem >= 0){
                   diem = value.diem;
                 }
                 var state = ""
                 if(value.state == 1){
                   state = "<buton class='btn btn-danger' id='btn_state_test' data-info='"+value.id+",0' "+
                   "data-link='"+value.url+"' "+
                   "data-token="+value.token+">Không cho phép vào phòng thi</button>"
                 }else if(value.state == 0){
                   state = "<buton class='btn btn-primary' id='btn_state_test' data-info='"+value.id+",1' "+
                   "data-link='"+value.url+"' "+
                   "data-token="+value.token+">Cho phép vào phòng thi</button>"
                 }

                  $('.item' + value.id).replaceWith("<tr class='item"+value.id+"'><th scope='row'>"+value.STT+"</th>"
                  +"<td>"+value.name+"</td>"
                  +"<td>"+value.mssv+"</td>"
                  +"<td>"+value.sodienthoai+"</td>"
                  +"<td>"+value.lop+"</td>"
                  +"<td>"+value.nhom_thi+"</td>"
                  +"<td>"+diem+"</td>"
                  +"<td>"+state+"</td></tr>"
                );
               });

           }},error: function (xhr, status, error) {
             alert(xhr.responseText)
            }
  });
});

$(document).on('click', '#submit_table_danh_sach', function() {

});
