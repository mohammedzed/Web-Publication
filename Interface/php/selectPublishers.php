
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "root", "qatar123", "qcri_kpi");

$result = mysqli_query($conn,"SELECT * from publishers");

$outp = "";
while($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"publisher_id":"'  . $rs["publisher_id"] . '",';
    $outp .= '"name":"'   .$rs["name"]        . '",';
    $outp .= '"acronym":"'   .$rs["acronym"]        . '",';
    $outp .= '"field":"'   .$rs["field"]        . '",';
    $outp .= '"category":"'   .$rs["category"]        . '",';
    $outp .= '"type":"'. $rs["type"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
