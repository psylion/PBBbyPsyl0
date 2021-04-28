<?php
function append2json(string $lbl, string $artist, string $title, string $date){
  $array = array('label' => $lbl,'artist' => $artist,'title' => $title,'date'=> $date,'par'=> $par);

  #$fp = fopen('results.json', 'w');
  $inp = file_get_contents('results.json');
  $tempArray = json_decode($inp);
  array_push($tempArray, $data);
  $jsonData = json_encode($tempArray);
  file_put_contents('results.json', $jsonData);
  #fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));   // here it will print the array pretty
  #fclose($fp);
}

function extractEle($str){
  $ftitle = $str;
  $par =  substr($ftitle,0,strpos($ftitle,")")+1);
  $time = substr($ftitle,strlen($ftitle)-10);
  $ft2 = substr($ftitle,strlen($par),-10);
  $artist = substr($ft2,1,strpos($ft2,"-")-1);
  $ft3 = substr($ft2,strlen($artist)+3);
  if (strlen(strpos($ft3,"_"))>0) {
    $title = substr($ft3,0,strpos($ft3,"_"));
    $ft4 = substr($ft3,strlen($title)+1);
  }else{
    $title = $ft3;
  }
  if (strlen($ft4)>0){
    $label = $ft4;
  }else{$label="";}
  
  //echo "<hr/>ftitle: " . $ftitle . "<br/>par: "  . $par . "<br/>artist:" . $artist . "<br/>title: " . $title . "<br/>label: " .$label . "<br/>time: " .$time;  
  return $label; $artist; $title;$time;
}
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
    jQuery.ajax({
    type: "POST",
    url: 'title.php',
    dataType: 'json',
    data: {functionname: 'extractEle', arguments: [info]},

    success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                      yourVariable = obj.result;
                  }
                  else {
                      console.log(obj.error);
                  }
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