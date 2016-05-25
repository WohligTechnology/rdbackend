<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class sector_model extends CI_Model
{
public function create($name,$description)
{
$data=array("name" => $name,"description" => $description);
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
public function edit($id,$name,$description)
{
$data=array("name" => $name,"description" => $description);
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
}
?>
