$(document).ready(function() {
  var myTimer = setInterval(function()
  {
    var xmlthttp = new XMLHttpRequest();
  xmlthttp.open('GET',"/home/counttime/",false);
  xmlthttp.send(null);
  var time = "<h3><span class='label label-danger'>"+xmlthttp.responseText+"</span></h3>"
  document.getElementById("count_time").innerHTML=time;
  if(xmlthttp.responseText.localeCompare('stop') == 0)
  {
    clearInterval(myTimer);
  }
  },1000);
} );
