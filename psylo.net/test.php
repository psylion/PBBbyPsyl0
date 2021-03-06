<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html>

<head>
  <script src="/js/jquery-3.6.0.js" type="text/javascript"></script>
</head>

<body>
  <button onclick="clearInterval(myVar)">Stop Loop</button>
  <script>
    $(document).ready(function() {
      var myVar = setInterval(myTimer, 5000);
      $("#flux").load("title.php");
    });

    function myTimer() {
      $("#flux").load("title.php");
      let info = $("#flux").text();
      let smallinfo = info;
      var d = new Date();
      //d = d.substring(d.indexOf('T')+1,d.length-5);
      // correcting difference between javascript time locale between Mac and Windows
      t = d.toTimeString().substr(0, 8);
      d = d.toISOString().split('.')[0]+"Z";
      $("#date").html(d);

      if ($("#current").text() != info) {
        //$("#log").append(smallinfo +"(smallinfo)<br/>");
        $("#log").html(t + "|"+ info + "(" + d + ")<br/>");
        $("#current").html(info);
        //call php passing info through the call

        $.ajax({
          type: "POST",
          url: 'title.php',
          data: {
            'extractEle': info + "(" + d + ")"
          },
          success: function(data) {
            console.log("call php: " + info);
            //console.log("data: " +data);
          }
        });

      }
    }
  </script>
  Flux:
  <div id="flux">Flux: </div>
  <hr />
  current:
  <div id="current"> </div>
  <hr />
  date:
  <div id="date">date: </div>
  <hr />
  Log:
  <div id="log"> </div>
</body>

</html>