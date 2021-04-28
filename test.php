<?php
?>
<html>
<head>
<script src="/js/jquery-3.6.0.js" type="text/javascript"></script>
</head>

<body>
<button onclick="clearInterval(myVar)">Stop Loop</button>
<script>
$(document).ready(function(){
  var myVar = setInterval(myTimer, 5000);
  $("#flux").load("title.php");
  
});

function myTimer() {
  $("#flux").load("title.php");
  let info = $("#flux").text();
  let smallinfo = info;
  var d = new Date();
  $("#date").html( d.toLocaleTimeString());
  
  if ($("#current").text() != info) {
    //$("#log").append(smallinfo +"(smallinfo)<br/>");
    $("#log").append(info + "("+d.toLocaleTimeString()+")<br/>");
    $("#current").html( info);
//call php passing info through the call
    $.ajax({
      type: "POST",
      url: 'title.php',
      data: {'extractEle': info+ "("+d.toLocaleTimeString()+")"},
      success: function (data) {    
              console.log("call php: " + info);
              console.log("data: " +data);
            }
    });

  }
}
 
</script>
<div id="flux">Flux: </div><hr/>
<div id="current"> </div><hr/>
<div id="date">date: </div><hr/>
<div id="log"> </div>
</body>
</html>