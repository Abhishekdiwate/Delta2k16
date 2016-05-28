


 var clear;
function start() {
	var dd = document.getElementById("date").value;
    var tt = document.getElementById("time").value;
    dd = dd + ' ' + tt;
	dd = new Date(dd);
	function startTime(){
    var today = new Date();
    var t=today.getTime();
	var x=dd.getTime();
	var rem=x-t;
	
	if (rem<=0)
	{
	document.getElementById("finish").innerHTML="countdown finished!";
	
	$(document).ready(function(){
        $(".countdowncontent").fadeOut()
    });
	$(document).ready(function(){
        $(".buttons").fadeOut()
    });
	
	clearInterval(startTime());
	}
	
	     var seconds=Math.floor((rem/1000)%60);
         var minutes=Math.floor(rem/((1000*60))%60);
         var hours=Math.floor((rem/(1000*60*60))%24);
         var days=Math.floor((rem/(1000*60*60*24)));
		minutes=checkTime(minutes);
		seconds=checkTime(seconds);
		hours=checkTime(hours); 
		document.getElementById("minutes").innerHTML=minutes;
   document.getElementById("days").innerHTML=days;
     document.getElementById("hours").innerHTML=hours;
	  document.getElementById("seconds").innerHTML=seconds;
	 
    
}
startTime();
 clear=setInterval(startTime,1000)
}
function stop(){
clearInterval(clear);}






function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
	}
	function reset()
	{ document.getElementById("minutes").innerHTML=0;
   document.getElementById("days").innerHTML=0;
     document.getElementById("hours").innerHTML=0;
	  document.getElementById("seconds").innerHTML=0;
	}
	
	