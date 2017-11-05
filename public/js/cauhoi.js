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
