<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class clients_model extends CI_Model
{
public function create($name,$image,$order,$title)
{
$data=array("name" => $name,"logo" => $image,"order" => $order,"title" => $title);
$query=$this->db->insert( "rdbackend_clients", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_clients")->row();
return $query;
}
function getsingleclients($id){
$this->db->where("id",$id);
$query=$this->db->get("rdbackend_clients")->row();
return $query;
}
public function edit($name,$image,$order,$title,$id)
{
if($image=="")
{
$image=$this->clients_model->getimagebyid($id);
$image=$image->image;
}
$data=array("name" => $name,"logo" => $image,"order" => $order,"title" => $title);
$this->db->where( "id", $id );
$query=$this->db->update( "rdbackend_clients", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `rdbackend_clients` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `logo` FROM `rdbackend_clients` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `rdbackend_clients` ORDER BY `id`
                    ASC")->row();
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
