<?php
$pbbs = "https://pbbradio.com:8443/128";
$pbb = "https://www.kdbuzz.com/PBB/pbbstream.php";
 
// PHP program to illustrate
// stream_get_meta_data function
  
#$url = 'http://php.net/manual/en/function.stream-get-meta-data.php';
  
/* $file = fopen($pbb, 'r');
$meta_data = stream_get_meta_data($file);
  
print_r($meta_data);
print($file);  
fclose($file);

echo "<pre>". $file . "<pre/>";

$context = stream_context_create(
  array (
    'ssl' => array (
      'verify_peer' => false,
      'verify_peer_name' => false
    )
  )
); */

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

function append2json(string $lbl, string $artist, string $title, string $date){
  $array = array('label' => $lbl,'artist' => $artist,'title' => $title,'date'=> $date);

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
  append2json($par, $artist, $title, $label,$time);
}
?>