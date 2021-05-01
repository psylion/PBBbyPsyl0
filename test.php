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
      d = d.toTimeString().substr(0, 8);

      $("#date").html(d);

      if ($("#current").text() != info) {
        //$("#log").append(smallinfo +"(smallinfo)<br/>");
        $("#log").append(info + "(" + d + ")<br/>");
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
  <div id="flux">Flux: </div>
  <hr />
  <div id="current"> </div>
  <hr />
  <div id="date">date: </div>
  <hr />
  <div id="log"> </div>
</body>

</html>