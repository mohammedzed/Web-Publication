
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "root", "qatar123", "qcri_kpi");

$result = mysqli_query($conn,"SELECT * from publication_authors");

$outp = "";
while($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"publication_author_id":"'  . $rs["publication_author_id"] . '",';
    $outp .= '"publication_id":"'   .$rs["publication_id"]        . '",';
    $outp .= '"author_qfid":"'   .$rs["author_qfid"]        . '",';
    $outp .= '"authoring_order":"'   .$rs["authoring_order"]        . '",';
    $outp .= '"affiliation_id":"'   .$rs["affiliation_id"]        . '",';
    $outp .= '"author_name":"'. $rs["author_name"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
