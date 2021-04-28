<?php
    if (isset($_POST['extractEle'])) {
      echo extractEle($_POST['extractEle']);
  }

$pbbs = "https://pbbradio.com:8443/128";
$pbb = "https://www.kdbuzz.com/PBB/pbbstream.php";

$f= fopen($pbb, "rb", false, $context);
$lines = "";
do{
  $data=fread($f,1024);
  if(strlen($data)==0){
    break;
  }
  $lines.=$data;
}while(true);
fclose($f);

$objDateTime = new DateTime('NOW');
//echo $objDateTime->format('c'); // ISO8601 formated datetime
//echo $objDateTime->format(DateTime::ATOM); 
//echo "<hr/>";
//echo $objDateTime->format(DateTime::ISO8601)." : " . substr($lines,11);
// Removed some html in front
echo substr($lines,11);

function append2json($jarray){
  echo "<hr/>get content: " . $inp = file_get_contents('results.json');
  if($inp != null){ $tempArray = json_decode($inp);}else{$tempArray = array();}
  array_push($tempArray,$jarray);
  echo "<hr/> info array: 1)".count($tempArray) ." 2)".count($ar);
  echo "<hr/> encode: (" . count($tempArray) .")".$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
  echo "<hr/>put content: " . file_put_contents('results.json', $jsonData);
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
  
  echo "<hr/>ftitle: " . $ftitle . "<br/>par: "  . $par . "<br/>artist:" . $artist . "<br/>title: " . $title . "<br/>label: " .$label . "<br/>time: " .$time;  
  $array = array('otitle'=>$ftitle,'par' => $par,'label' => $label,'artist' => $artist,'title' => $title,'time'=> $time);
  //if ($tArray == null){ array_push($tArray, $array);}else{$tArray=$array;}
  echo "<hr/> array: " . json_encode($array);

  echo "<hr/> append2json: " . append2json($array);
  return "append2json completed";
}
?>