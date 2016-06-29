<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class project_model extends CI_Model
{
public function create($title,$image,$description,$order,$sector)
{
$data=array("title" => $title,"image" => $image,"description" => $description,"order" => $order,"services" => $sector);
$query=$this->db->insert( "rdbackend_project", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_project")->row();
return $query;
}
function getsingleproject($id){
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_project")->row();
return $query;
}
public function edit($id,$title,$image,$description,$order,$sector)
{
if($image=="")
{
$image=$this->project_model->getimagebyid($id);
$image=$image->image;
}
$data=array("title" => $title,"image" => $image,"description" => $description,"order" => $order,"services" => $sector);
$this->db->where( "id", $id );
$query=$this->db->update( "rdbackend_project", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `rdbackend_project` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `rdbackend_project` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `rdbackend_project` ORDER BY `id`
                    ASC")->result();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}
}
?>
