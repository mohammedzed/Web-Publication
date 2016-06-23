<?php
$data = json_decode(file_get_contents("php://input"));
$publication_id = $data->publication_id;
$title = $data->title;
$group = $data->group;
$joint_groups = $data->joint_groups;
$year = $data->year;
$publisher_id = $data->publisher_id;
$citation_count = $data->citation_count;
$pages_count = $data->pages_count;
$link = $data->link;
$status = $data->status;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "update publications set title='$title',group='$group',
joint_groups='$joint_groups',year='$year',publisher_id='$publisher_id',citation_count='$citation_count',pages_count='$pages_count',
link='$link',status='$status' where publication_id=$publication_id";
$result = mysql_query($sql);

?>
