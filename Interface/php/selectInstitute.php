
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "root", "qatar123", "qcri_kpi");

$result = mysqli_query($conn,"SELECT * from institutes");

$outp = "";
while($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"inst_id":"'  . $rs["inst_id"] . '",';
    $outp .= '"name":"'   .$rs["name"]        . '",';
    $outp .= '"acronym":"'   .$rs["acronym"]        . '",';
    $outp .= '"location":"'. $rs["location"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
