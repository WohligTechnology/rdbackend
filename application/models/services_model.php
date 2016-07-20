<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class services_model extends CI_Model
{
public function create($name,$description,$order,$sector)
{
$data=array("name" => $name,"description" => $description,"order" => $order,"sector" => $sector);
$query=$this->db->insert( "rdbackend_services", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_services")->row();
return $query;
}
function getsingleservices($id){
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_services")->row();
return $query;
}
public function edit($id,$name,$description,$order,$sector)
{

$data=array("name" => $name,"description" => $description,"order" => $order,"sector" => $sector);
$this->db->where( "id", $id );
$query=$this->db->update( "rdbackend_services", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `rdbackend_services` WHERE `id`='$id'");
return $query;
}
// public function getimagebyid($id)
// {
// $query=$this->db->query("SELECT `image` FROM `rdbackend_services` WHERE `id`='$id'")->row();
// return $query;
// }
public function getservicesdropdown()
{
$query=$this->db->query("SELECT * FROM `rdbackend_services` ORDER BY `id`
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
