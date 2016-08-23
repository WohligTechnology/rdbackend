<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class gallery_model extends CI_Model
{
public function create($sector,$image,$order)
{
$data=array("sector" => $sector,"image" => $image,"order" => $order);
$query=$this->db->insert( "rdbackend_gallery", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_gallery")->row();
return $query;
}
function getsinglegallery($id){
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_gallery")->row();
return $query;
}
public function edit($id,$sector,$image,$order)
{
if($image=="")
{
$image=$this->gallery_model->getimagebyid($id);
$image=$image->image;
}
$data=array("sector" => $sector,"image" => $image,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "rdbackend_gallery", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `rdbackend_gallery` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `rdbackend_gallery` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `rdbackend_gallery` ORDER BY `id`
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
