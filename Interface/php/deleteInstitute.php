<?php
$data = json_decode(file_get_contents("php://input"));
$inst_id = $data->inst_id;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "delete from institutes where inst_id=$inst_id";
$result = mysql_query($sql);

?>
