
<?php
$data = json_decode(file_get_contents("php://input"));
$inst_id = $data->inst_id;
$name = $data->name;
$acronym = $data->acronym;
$location = $data->location;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "insert into institutes(inst_id,name,acronym,location) values($inst_id,'$name','$acronym','$location')";
$result = mysql_query($sql);

?>
