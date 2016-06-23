<?php
$data = json_decode(file_get_contents("php://input"));
$publisher_id = $data->publisher_id;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "delete from publishers where publisher_id=$publisher_id";
$result = mysql_query($sql);

?>
