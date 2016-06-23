<?php
$data = json_decode(file_get_contents("php://input"));
$publication_author_id = $data->publication_author_id;
$publication_id = $data->publication_id;
$author_qfid = $data->author_qfid;
$authoring_order = $data->authoring_order;
$affiliation_id = $data->affiliation_id;
$author_name = $data->author_name;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "update publication_authors set publication_id='$publication_id',author_qfid='$author_qfid',
authoring_order='$authoring_order',affiliation_id='$affiliation_id',author_name='$author_name' where publication_author_id=$publication_author_id";
$result = mysql_query($sql);

?>
