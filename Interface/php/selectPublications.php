
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "root", "qatar123", "qcri_kpi");

$result = mysqli_query($conn,"SELECT * from publications");

$outp = "";
while($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"publication_id":"'  . $rs["publication_id"] . '",';
    $outp .= '"title":"'   .$rs["title"]        . '",';
    $outp .= '"group":"'   .$rs["group"]        . '",';
    $outp .= '"joint_groups":"'   .$rs["joint_groups"]        . '",';
    $outp .= '"year":"'   .$rs["year"]        . '",';
    $outp .= '"publisher_id":"'   .$rs["publisher_id"]        . '",';
    $outp .= '"citation_count":"'   .$rs["citation_count"]        . '",';
    $outp .= '"pages_count":"'   .$rs["pages_count"]        . '",';
    $outp .= '"link":"'   .$rs["link"]        . '",';
    $outp .= '"status":"'. $rs["status"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
