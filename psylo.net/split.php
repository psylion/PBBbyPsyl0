<?php
$str1 = "(W_N) FADUMO OASSIM & SHAREERO BAND - Waakaa Helaa (I like you)(16:58:08)";
$str2 = "(J) SLEEP_WALKER_ - eclipse_(17:00:48)";
$str3 = "(E) PATRICK ZIGON - nebelkind(17:09:50)";
$str4 = "(Fr_N_N) RONE & FLAVIEN BERGER - Polichinelle _ INFINE(17:16:28)";
$str5 = "(E) AMIRALI - A Fly In Your Tongue _DARK MATTERS(17:20:14)";
$strs = array($str1,$str2,$str3,$str4,$str5);

$today = date_format( new DateTime('NOW'), 'Ymd');
echo "<hr/> today: " .$today;
$todayFile = $today.'test.json';
echo "<hr/> todayFile: " .$todayFile;
 
//echo "<hr/>get content: " . 
$inp = file_get_contents($todayFile);
  if($inp != null){ $tempArray = json_decode($inp);}else{$tempArray = array();}
foreach ($strs as $item){
  $ar = extractEle($item);
  array_push($tempArray,$ar);
  //echo "<hr/> info array: 1)".count($tempArray) ." 2)".count($ar);
}
//echo "<hr/> encode: (" . count($tempArray) .")".
$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
echo "<hr/>put content: " . file_put_contents($todayFile, $jsonData);

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
  
  echo "<hr/>ftitle: " . $ftitle . "<br/>par: "  . $par . "<br/>artist:" . $artist . "<br/>title: " . $title . "<br/>label: " .$label . "<br/>time: " .$time;  
  $array = array('otitle' => $ftitle,'label' => $label,'artist' => $artist,'title' => $title,'date'=> $time);
  //if ($tArray == null){ array_push($tArray, $array);}else{$tArray=$array;}
  echo "<hr/> array: " . json_encode($array);
  return $array;
}
?>
<html>
<body>
</body>
</html>