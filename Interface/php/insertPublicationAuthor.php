
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
$sql = "insert into publication_authors(publication_author_id,publication_id,author_qfid,authoring_order,affiliation_id,author_name)
 values('$publication_author_id','$publication_id','$author_qfid','$authoring_order','$affiliation_id','$author_name')";
$result = mysql_query($sql);

?>
