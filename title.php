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
?>