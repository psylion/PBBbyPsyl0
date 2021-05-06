<html>
    <head>
        <script src="/js/jquery-3.6.0.js" type="text/javascript"></script>
    </head>
<body>
<script>
$(document).ready(function(){
  var myVar = setInterval(myTimer, 5000);
  var d = new Date();
    // correcting difference between javascript time locale between Mac and Windows
    d = d.toTimeString().substr(0,8);
    $("#time").append(d);
});

function myTimer() {
    //location.reload();
}
 
</script>
<div id="time" class="clock">time: </div><hr/>
<?php 
#$path = "./";
#$temp_files = scandir($path);
$string = file_get_contents('20210430results.json');
$data = json_decode($string, true);

#natsort($temp_files);
//var_dump(array_reverse($data));
array_to_table(array_reverse($data));

function array_to_table($matriz) 
{   
   echo "<table>";

   // Table header
        foreach ($matriz[0] as $clave=>$fila) {
            echo "<th>".$clave."</th>";
        }

    // Table body
       foreach ($matriz as $fila) {
           echo "<tr>";
           foreach ($fila as $elemento) {
                 echo "<td>".$elemento."</td>";
           } 
          echo "</tr>";
       } 
   echo "</table>";}
?>
</body>
</html>
