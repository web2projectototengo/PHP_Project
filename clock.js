setInterval(display,500);
function display(){
  var time = new Date();
  var hrs = time.getHours();
  var min = time.getMinutes();
  var sec = time.getSeconds();

  document.getElementById('clock').innerHTML = hrs +":"+min+":"+sec;
}
