<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "root", "qatar123", "qcri_kpi");

$result = mysqli_query($conn,"SELECT * from staff_members");

$outp = "";
while($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"qfid":"' . $rs["qfid"] . '",';
    $outp .= '"name":"' .$rs["name"] . '",';
    $outp .= '"publishing_names":"' .$rs["publishing_names"] . '",';
    $outp .= '"qf_email":"' .$rs["qf_email"] . '",';
    $outp .= '"other_emails":"' .$rs["other_emails"] . '",';
    $outp .= '"nationality":"' .$rs["nationality"] . '",';
    $outp .= '"start_date":"' .$rs["start_date"] . '",';
    $outp .= '"end_date":"' .$rs["end_date"] . '",';
    $outp .= '"citation_count":"' .$rs["citation_count"] . '",';
    $outp .= '"h_index":"' .$rs["h_index"] . '",';
    $outp .= '"research_title":"' .$rs["research_title"] . '",';
    $outp .= '"api_handle":"' .$rs["api_handle"] . '",';
    $outp .= '"personal_webpage":"' .$rs["personal_webpage"] . '",';
    $outp .= '"is_academic":"' .$rs["is_academic"] . '",';
    $outp .= '"experience":"'. $rs["experience"] . '"}';
}

$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
