
  var myTimer = setInterval(function()
  {
    var xmlthttp = new XMLHttpRequest();
  xmlthttp.open('GET',"/home/counttime/",false);
  xmlthttp.send(null);
  var time = "<h3><span class='label label-danger'>"+xmlthttp.responseText+"</span></h3>"
  document.getElementById("count_time").innerHTML=time;
  if(xmlthttp.responseText.localeCompare('stop') == 0)
  {
    document.getElementById('btn_submit_lambaitap').click();
    clearInterval(myTimer);
  }
  },1000);


//
$(document).on('click', '#btn_submit_lambaitap', function() {
  var time = "<h3><span class='label label-danger'>stop</span></h3>"
  document.getElementById("count_time").innerHTML=time;
  clearInterval(myTimer);
  $.ajaxSetup({
  headers: {
      'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
  }
});
  var url = $(this).attr("data-link");
  var token = $(this).data('token');
  $('#_token').val(token);
        $.ajax({
            method: 'POST',
            url: url,
            data: $('#form_baitap').serialize()
            ,beforeSend: function(xhr){
              xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
            },success: function(data) {
                if (data.errors){
                }
                 else {
                    $('#form_baitap').hide();
                    $("#ketquadiv").prop('hidden', false);
                    var kq = "<blockquote><h1>"+data+"</h1></blockquote>";
                    $('#ketqua').html(kq);
                 }},error: function (xhr, status, error) {
                   alert(xhr.responseText)
                     }
        });
});
