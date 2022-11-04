<?php 
if (isset($_COOKIE['products'])) { 
  $products = json_decode($_COOKIE['products']);
} else {
  $products = array();
}
echo "-----------All products----------"."<br>";
foreach ($products as $key => $value) {
  echo $value."<br>";
}

// echo $data = json_encode(array('productid'=>"2",'date'=>date('Y-m-d')));
// setcookie("phpcookies", $data, time() + (86400 * 30), "/");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<table width="30%" align="center" style="margin-top:150px;">
	<tr>
		<td colspan="2">
			<div>Time: <span id="_time"></span></div>
		</td>
	</tr>
	<tr>
		<td><button id="start-btn">Start</button></td>
		<td><button id="stop-btn" disabled>Stop</button></td>
		<td><button id="reset-btn" disabled>Restart</button></td>
	</tr>
	<tr>
		<td><button onclick="setcookies()">Set Cookie</button></td>
		<td><button onclick="getcookies()">Get Cookie</button></td>
		<td><button onclick="removecookies()">Remove Cookie</button></td>
	</tr>
</table>
<div id='Mouse' style="position: absolute; margin-left: 20px;width: 80px; height: 20px; background: antiquewhite; text-align: center; border: 1px solid;">Mouse</div>
<script type="text/javascript">

addEventListener('mousemove', (event) => {
    var left  = event.pageX + "px";
    var top  = event.clientY  + "px";
    var div = document.getElementById('Mouse');
    div.style.left = left;
    div.style.top = top;
});


// console.log(Intl.DateTimeFormat().resolvedOptions().timeZone);
  var hour = 0;
  var minute = 0;
  var seconds = 0;
  var totalSeconds = 0;
  var _time = document.getElementById("_time");
  var _start = document.getElementById("start-btn");
  var _stop = document.getElementById("stop-btn");
  var _reset = document.getElementById("reset-btn");
  var intervalId = null;

	function startTimer() {
    totalSeconds++;
    hour = Math.floor(totalSeconds /3600);
    minute = Math.floor((totalSeconds - hour*3600)/60);
    seconds = totalSeconds - (hour*3600 + minute*60);
    _time.innerHTML = `${hour}:${minute}:${seconds}`;
  }

  _start.addEventListener('click', () => {
    intervalId = setInterval(startTimer, 1000);
	_stop.removeAttribute("disabled");
	_reset.removeAttribute("disabled");
	_start.setAttribute("disabled", "disabled");
  })
  
  _stop.addEventListener('click', () => {
    if (intervalId)
      clearInterval(intervalId);
	_start.removeAttribute("disabled");
	_stop.setAttribute("disabled", "disabled");
	_reset.setAttribute("disabled", "disabled");
  });
  
  _reset.addEventListener('click', () => {
     totalSeconds = 0;
     _time.innerHTML = `0:0:0`;
    _stop.removeAttribute("disabled");
	_start.setAttribute("disabled", "disabled");
	_reset.setAttribute("disabled", "disabled");
  });


  function getcookies(){
    var data,n;
    if(document.cookie.length==0) {  
      data=null;
    } else {
      let all = document.cookie.split("; "); 
      all.forEach((item,index)=>{
        n = item.split("=");
        if(n[0]=="products"){
          data=JSON.parse(n[1]);
        } else{
          data=null;
        }
      })
    }
     console.clear();
     console.log(data);
  }
 function setcookies(){
  var expires = "";
  var date = new Date();
  let data = {"productid":"test","date": date.toUTCString()};
  date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
  expires = "; expires=" + date.toUTCString();
  document.cookie = "products" + "=" + (JSON.stringify(data) || "") + expires + "; path=/";
 }
 function removecookies() {
    document.cookie = 'products=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
} 
</script>
</body>
</html>