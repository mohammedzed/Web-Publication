<?php
$data = json_decode(file_get_contents("php://input"));
$publication_id = $data->publication_id;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "delete from publications where publication_id=$publication_id";
$result = mysql_query($sql);

?>
