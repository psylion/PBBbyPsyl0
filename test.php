
<html>
<head>
<script src="/js/jquery-3.6.0.js" type="text/javascript"></script>
</head>

<body>
<script>
$(document).ready(function(){


  $("#flux").load("title.php");
  let title = $("#flux").text();
  $("#log").append(title +"<br/>");
  $("#log").append(title.slice(32,title.length-32));
/* 
setInterval(function(){

$("#flux").load('test.php')
}, 5000);*/
}); 
</script>
<div id="flux">Flux: </div><hr/>
<div id="log">Log: </div>

</body>
</html>