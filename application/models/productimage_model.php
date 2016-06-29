<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class productimage_model extends CI_Model
{
public function create($product,$order,$status,$image)
{
$data=array("project" => $product,"order" => $order,"image" => $image);
$query=$this->db->insert( "projectimage", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("projectimage")->row();
return $query;
}
function getsingleproductimage($id){
$this->db->where("id",$id);
$query=$this->db->get("projectimage")->row();
return $query;
}
public function edit($id,$product,$order,$status,$image)
{
$data=array("project" => $product,"order" => $order,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "projectimage", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `projectimage` WHERE `id`='$id'");
return $query;
}
     public function getImageById($id)
    {
        $query = $this->db->query('SELECT `image` FROM `projectimage` WHERE `id`=('.$this->db->escape($id).')')->row();

        return $query;
    }
}
?>
