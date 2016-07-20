<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller
{function getallsector()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`rdbackend_sector`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`rdbackend_sector`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`rdbackend_sector`.`description`";
$elements[2]->sort="1";
$elements[2]->header="description";
$elements[2]->alias="description";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `rdbackend_sector`");
$this->load->view("json",$data);
}
public function getsinglesector()
{
$id=$this->input->get_post("id");
$data["message"]=$this->sector_model->getsinglesector($id);
$this->load->view("json",$data);
}
function getallproject()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`rdbackend_project`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`rdbackend_project`.`title`";
$elements[1]->sort="1";
$elements[1]->header="title";
$elements[1]->alias="title";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`rdbackend_project`.`image`";
$elements[2]->sort="1";
$elements[2]->header="image";
$elements[2]->alias="image";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`rdbackend_project`.`description`";
$elements[3]->sort="1";
$elements[3]->header="description";
$elements[3]->alias="description";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`rdbackend_project`.`order`";
$elements[4]->sort="1";
$elements[4]->header="order";
$elements[4]->alias="order";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`rdbackend_project`.`sector`";
$elements[5]->sort="1";
$elements[5]->header="sector";
$elements[5]->alias="sector";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `rdbackend_project`");
$this->load->view("json",$data);
}
public function getsingleproject()
{
$id=$this->input->get_post("id");
$data["message"]=$this->project_model->getsingleproject($id);
$this->load->view("json",$data);
}
function getallservices()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`rdbackend_services`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`rdbackend_services`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`rdbackend_services`.`description`";
$elements[2]->sort="1";
$elements[2]->header="description";
$elements[2]->alias="description";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`rdbackend_services`.`order`";
$elements[3]->sort="1";
$elements[3]->header="order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`rdbackend_services`.`sector`";
$elements[4]->sort="1";
$elements[4]->header="sector";
$elements[4]->alias="sector";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `rdbackend_services`");
$this->load->view("json",$data);
}
public function getsingleservices()
{
$id=$this->input->get_post("id");
$data["message"]=$this->services_model->getsingleservices($id);
$this->load->view("json",$data);
}
function getallclients()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`rdbackend_clients`.`name`";
$elements[0]->sort="1";
$elements[0]->header="name";
$elements[0]->alias="name";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`rdbackend_clients`.`logo`";
$elements[1]->sort="1";
$elements[1]->header="logo";
$elements[1]->alias="logo";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`rdbackend_clients`.`order`";
$elements[2]->sort="1";
$elements[2]->header="order";
$elements[2]->alias="order";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`rdbackend_clients`.`title`";
$elements[3]->sort="1";
$elements[3]->header="title";
$elements[3]->alias="title";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`rdbackend_clients`.`id`";
$elements[4]->sort="1";
$elements[4]->header="id";
$elements[4]->alias="id";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `rdbackend_clients`");
$this->load->view("json",$data);
}
public function getsingleclients()
{
$id=$this->input->get_post("id");
$data["message"]=$this->clients_model->getsingleclients($id);
$this->load->view("json",$data);
}
public function getClients()
{
  $data["message"]=$this->clients_model->getClients();
  $this->load->view("json",$data);
}
public function getAllSectors()
{
  $data["message"]=$this->sector_model->getAllSectors();
  $this->load->view("json",$data);
}
public function getSector()
{
  $id=$this->input->get_post("id");
  $data["message"]=$this->sector_model->getSector($id);
  $this->load->view("json",$data);
}

}
