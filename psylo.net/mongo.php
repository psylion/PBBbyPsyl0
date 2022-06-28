<?php
$mongoAccess = parse_ini_file('../access.ini');

$user = $mongoAccess['user'];
$passwd = $mongoAccess['passwd'];

$client = new MongoDB\Driver\Manager(
    'mongodb+srv://'.$user.':'.$passwd.'@cluster0.3bhpn.mongodb.net/?retryWrites=true&w=majority');
$filter = [];
$options = [
    'sort'=>array('time'=>-1),
    'limit' => 10
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $client->executeQuery('savePBB.newpy', $query);
$ar = array();
foreach ($cursor as $document) {
    array_push($ar, $document);
}
echo json_encode($ar);
?>
