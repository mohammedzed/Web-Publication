<?php
$data = json_decode(file_get_contents("php://input"));
$qfid = $data->qfid;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "delete from staff_members where qfid=$qfid";
$result = mysql_query($sql);

?>
