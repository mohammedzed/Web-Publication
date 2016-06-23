<?php
$data = json_decode(file_get_contents("php://input"));
$publisher_id = $data->publisher_id;
$name = $data->name;
$acronym = $data->acronym;
$field = $data->field;
$category = $data->category;
$type = $data->type;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "update publishers set name='$name',acronym='$acronym',
field='$field',category='$category',type='$type' where publisher_id=$publisher_id";
$result = mysql_query($sql);

?>
