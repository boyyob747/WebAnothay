$(document).ready(function() {
  var sec = 0;
  var min = 0;
  var hour = 0;
  var count = 2400;
  display(count);
} );

function display(count)
{
  var hour = Math.floor((count/60)/60);
  var min = Math.floor(count/60) - hour*60;
  var sec = count%60;
  if(count>=0)
  {
    var time = "<h3><span class='label label-danger'>"+hour+" : "+min+ " : "+sec+" "+"</span></h3>"
     $("#count_time").html(time);
    count = count - 1;
    setTimeout(display,1000,count);
    if(count==0)
    {
        alert("het roi");
    }
  }
}
