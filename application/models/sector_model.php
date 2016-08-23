<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class sector_model extends CI_Model
{
public function create($name,$description,$image1,$image2,$order,$type)
{
$data=array("name" => $name,"description" => $description,"image1" => $image1,"image2" => $image2,"order" => $order,"type" => $type);
$query=$this->db->insert( "rdbackend_sector", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_sector")->row();
return $query;
}
function getsinglesector($id){
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_sector")->row();
return $query;
}

public function getimage1byid($id)
{
$query=$this->db->query("SELECT `image1` FROM `rdbackend_sector` WHERE `id`='$id'")->row();
return $query;
}
public function getimage2byid($id)
{
$query=$this->db->query("SELECT `image2` FROM `rdbackend_sector` WHERE `id`='$id'")->row();
return $query;
}


public function edit($id,$name,$description,$image1,$image2,$order,$type)
{
$data=array("name" => $name,"description" => $description,"order" => $order,"type" => $type);
if($image1 != "")
  $data['image1']=$image1;
if($image2 != "")
  $data['image2']=$image2;
$this->db->where( "id", $id );
$query=$this->db->update( "rdbackend_sector", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `rdbackend_sector` WHERE `id`='$id'");
return $query;
}
// public function getimagebyid($id)
// {
// $query=$this->db->query("SELECT `image` FROM `rdbackend_sector` WHERE `id`='$id'")->row();
// return $query;
// }
public function getsectordropdown()
{
$query=$this->db->query("SELECT * FROM `rdbackend_sector` ORDER BY `id`
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

public function getAllSectors()
{
  $query = $this->db->query("SELECT `id`, `name`, `description`, `image1`, `image2`, `order`,`type` FROM `rdbackend_sector` WHERE 1 ORDER BY `order`")->result();
  return $query;
}
public function getSector($id)
{
  $query = $this->db->query("SELECT `id`, `name`, `description`, `image1`, `image2`, `order` FROM `rdbackend_sector` WHERE `id`=$id")->row();

  $query->services = $this->db->query("SELECT `id`, `name`, `description`, `order`, `sector` FROM `rdbackend_services` WHERE `sector`=$id ORDER BY `order` ASC")->result();
  // foreach ($query->services as $services) {
  //   // echo $services->id;
  //   $services->project = $this->db->query("SELECT `id`, `title`, `image`, `description`, `order`, `services` FROM `rdbackend_project` WHERE `services`=$services->id ORDER BY `order` ASC")->result();
  //   foreach ($services->project as $project) {
  //   $project->images = $this->db->query("SELECT `id`, `project`, `image`, `order` FROM `projectimage` WHERE `project`=$project->id ORDER BY `order` ASC")->result();
  //   }
  // }

  $query->images = $this->db->query("SELECT `id`, `sector`, `image`, `order` FROM `rdbackend_gallery` WHERE `sector`=$id ORDER BY `order` ASC")->result();
return $query;
}

public function getsectortypedropdown()
{

$return=array(
"" => "Select type",
"1" => "Small Image",
"2" => "Big Image"
);

return $return;
}
}
