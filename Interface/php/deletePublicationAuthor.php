<?php
$data = json_decode(file_get_contents("php://input"));
$publication_author_id = $data->publication_author_id;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "delete from publication_authors where publication_author_id=$publication_author_id";
$result = mysql_query($sql);

?>
