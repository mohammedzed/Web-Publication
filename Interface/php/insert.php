
<?php
$data = json_decode(file_get_contents("php://input"));
$qfid = $data->qfid;
$name = $data->name;
$publishing_names = $data->publishing_names;
$qf_email = $data->qf_email;
$other_emails = $data->other_emails;
$nationality = $data->nationality;
$start_date = $data->start_date;
$end_date = $data->end_date;
$citation_count = $data->citation_count;
$h_index = $data->h_index;
$research_title = $data->research_title;
$api_handle = $data->api_handle;
$personal_webpage = $data->personal_webpage;
$is_academic = $data->is_academic;
$experience = $data->experience;
$con = mysql_connect("localhost","root","qatar123");
mysql_select_db("qcri_kpi");
$sql = "insert into staff_members(qfid,name,publishing_names,qf_email,other_emails,nationality,start_date,end_date,
citation_count,h_index,research_title,api_handle,personal_webpage,is_academic,experience)
 values('$qfid','$name','$publishing_names','$qf_email','$other_emails','$nationality','$start_date','$end_date',
 '$citation_count','$h_index','$research_title','$api_handle','$personal_webpage','$is_academic','$experience')";
$result = mysql_query($sql);

?>
