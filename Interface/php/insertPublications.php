
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
$sql = "INSERT INTO publications(`publication_id`, `title`, `group`, `joint_groups`, `year`, `publisher_id`, `citation_count`, `pages_count`, `link`, `status`)
 VALUES('$publication_id','$title','$group','$joint_groups','$year','$publisher_id','$citation_count','$pages_count',
 '$link','$status')";
$result = mysql_query($sql);

?>