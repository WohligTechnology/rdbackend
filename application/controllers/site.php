<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller
{
	public function __construct( )
	{
		parent::__construct();

		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
    public function getOrderingDone()
    {
        $orderby=$this->input->get("orderby");
        $ids=$this->input->get("ids");
        $ids=explode(",",$ids);
        $tablename=$this->input->get("tablename");
        $where=$this->input->get("where");
        if($where == "" || $where=="undefined")
        {
            $where=1;
        }
        $access = array(
            '1',
        );
        $this->checkAccess($access);
        $i=1;
        foreach($ids as $id)
        {
            //echo "UPDATE `$tablename` SET `$orderby` = '$i' WHERE `id` = `$id` AND $where";
            $this->db->query("UPDATE `$tablename` SET `$orderby` = '$i' WHERE `id` = '$id' AND $where");
            $i++;
            //echo "/n";
        }
        $data["message"]=true;
        $this->load->view("json",$data);

    }
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
        $data['gender']=$this->user_model->getgenderdropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
            $data['gender']=$this->user_model->getgenderdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $phone=$this->input->post('phone');
            $billingaddress=$this->input->post('billingaddress');
            $billingcity=$this->input->post('billingcity');
            $billingstate=$this->input->post('billingstate');
            $billingcountry=$this->input->post('billingcountry');
            $billingpincode=$this->input->post('billingpincode');
            $billingcontact=$this->input->post('billingcontact');

            $shippingaddress=$this->input->post('shippingaddress');
            $shippingcity=$this->input->post('shippingcity');
            $shippingstate=$this->input->post('shippingstate');
            $shippingcountry=$this->input->post('shippingcountry');
            $shippingpincode=$this->input->post('shippingpincode');
            $shippingcontact=$this->input->post('shippingcontact');
            $shippingname=$this->input->post('shippingname');
            $currency=$this->input->post('currency');
            $credit=$this->input->post('credit');
            $companyname=$this->input->post('companyname');
            $registrationno=$this->input->post('registrationno');
            $vatnumber=$this->input->post('vatnumber');
            $country=$this->input->post('country');
            $fax=$this->input->post('fax');
            $gender=$this->input->post('gender');

            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$firstname,$lastname,$phone,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$billingcontact,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$shippingcontact,$shippingname,$currency,$credit,$companyname,$registrationno,$vatnumber,$country,$fax,$gender)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");

		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);


        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";

        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";

        $elements[4]=new stdClass();
        $elements[4]->field="`user`.`logintype`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";

        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";

        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";

        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";


        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }

        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }

        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");

		$this->load->view("json",$data);
	}


	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
        $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data['gender']=$this->user_model->getgenderdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('templatewith2',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);

		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data['gender']=$this->user_model->getgenderdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{

            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
//            $category=$this->input->get_post('category');
            $firstname=$this->input->post('firstname');
            $lastname=$this->input->post('lastname');
            $phone=$this->input->post('phone');
            $billingaddress=$this->input->post('billingaddress');
            $billingcity=$this->input->post('billingcity');
            $billingstate=$this->input->post('billingstate');
            $billingcountry=$this->input->post('billingcountry');
            $billingpincode=$this->input->post('billingpincode');
            $billingcontact=$this->input->post('billingcontact');

            $shippingaddress=$this->input->post('shippingaddress');
            $shippingcity=$this->input->post('shippingcity');
            $shippingstate=$this->input->post('shippingstate');
            $shippingcountry=$this->input->post('shippingcountry');
            $shippingpincode=$this->input->post('shippingpincode');
            $shippingcontact=$this->input->post('shippingcontact');
            $shippingname=$this->input->post('shippingname');
            $currency=$this->input->post('currency');
            $credit=$this->input->post('credit');
            $companyname=$this->input->post('companyname');
            $registrationno=$this->input->post('registrationno');
            $vatnumber=$this->input->post('vatnumber');
            $country=$this->input->post('country');
            $fax=$this->input->post('fax');
            $gender=$this->input->post('gender');
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }

			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$firstname,$lastname,$phone,$billingaddress,$billingcity,$billingstate,$billingcountry,$billingpincode,$billingcontact,$shippingaddress,$shippingcity,$shippingstate,$shippingcountry,$shippingpincode,$shippingcontact,$shippingname,$currency,$credit,$companyname,$registrationno,$vatnumber,$country,$fax,$gender)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";

			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);

		}
	}

	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    public function viewcart()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewcart";
    $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
$data['page2']='block/userblock';
$data["base_url"]=site_url("site/viewcartjson?id=").$this->input->get('id');
$data["title"]="View cart";
$this->load->view("templatewith2",$data);
}
function viewcartjson()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_cart`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`fynx_cart`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`fynx_cart`.`quantity`";
$elements[2]->sort="1";
$elements[2]->header="Quantity";
$elements[2]->alias="quantity";
$elements[3]=new stdClass();
$elements[3]->field="`fynx_cart`.`product`";
$elements[3]->sort="1";
$elements[3]->header="Product";
$elements[3]->alias="product";
$elements[4]=new stdClass();
$elements[4]->field="`fynx_cart`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Timestamp";
$elements[4]->alias="timestamp";

$elements[5]=new stdClass();
$elements[5]->field="`fynx_cart`.`size`";
$elements[5]->sort="1";
$elements[5]->header="Size";
$elements[5]->alias="size";

$elements[6]=new stdClass();
$elements[6]->field="`fynx_cart`.`color`";
$elements[6]->sort="1";
$elements[6]->header="Color";
$elements[6]->alias="color";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_cart`","WHERE `fynx_cart`.`user`='$id'");
$this->load->view("json",$data);
}
    public function viewwishlist()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewwishlist";
    $data["before1"]=$this->input->get('id');
        $data["before2"]=$this->input->get('id');
        $data["before3"]=$this->input->get('id');
        $data["before4"]=$this->input->get('id');
        $data["before5"]=$this->input->get('id');
$data['page2']='block/userblock';
$data["base_url"]=site_url("site/viewwishlistjson?id=".$this->input->get('id'));
$data["title"]="View wishlist";
$this->load->view("templatewith2",$data);
}
function viewwishlistjson()
{
    $user=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_wishlist`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`fynx_wishlist`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`fynx_wishlist`.`product`";
$elements[2]->sort="1";
$elements[2]->header="Product";
$elements[2]->alias="product";
$elements[3]=new stdClass();
$elements[3]->field="`fynx_wishlist`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$elements[4]=new stdClass();
$elements[4]->field="`fynx_product`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Product Name";
$elements[4]->alias="productname";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_wishlist` LEFT OUTER JOIN `fynx_product` ON `fynx_product`.`id`=`fynx_wishlist`.`product`","WHERE `fynx_wishlist`.`user`='$user'");
$this->load->view("json",$data);
}



    public function viewsector()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewsector";
$data["base_url"]=site_url("site/viewsectorjson");
$data["title"]="View sector";
$this->load->view("template",$data);
}
function viewsectorjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`rdbackend_sector`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`rdbackend_sector`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `rdbackend_sector`");
$this->load->view("json",$data);
}

public function createsector()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createsector";
$data['type']=$this->sector_model->getsectortypedropdown();
$data["title"]="Create sector";
$this->load->view("template",$data);
}
public function createsectorsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("description","description","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createsector";
$data["title"]="Create sector";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$type=$this->input->get_post("type");
$order=$this->input->get_post("order");
$description=$this->input->get_post("description");
$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$filename = 'image1';
				$image1 = '';
				if ($this->upload->do_upload($filename)) {
						$uploaddata = $this->upload->data();
						$image1 = $uploaddata['file_name'];
				}
				$filename = 'image2';
				$image2 = '';
				if ($this->upload->do_upload($filename)) {
						$uploaddata = $this->upload->data();
						$image2 = $uploaddata['file_name'];
				}
if($this->sector_model->create($name,$description,$image1,$image2,$order,$type)==0)
$data["alerterror"]="New sector could not be created.";
else
$data["alertsuccess"]="sector created Successfully.";
$data["redirect"]="site/viewsector";
$this->load->view("redirect",$data);
}
}
public function editsector()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editsector";
$data["title"]="Edit sector";
$data['type']=$this->sector_model->getsectortypedropdown();
$data["before"]=$this->sector_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editsectorsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("description","description","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editsector";
$data["title"]="Edit sector";
$data["before"]=$this->sector_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$type=$this->input->get_post("type");
$description=$this->input->get_post("description");
$order=$this->input->get_post("order");
$config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $filename = 'image1';
            $image1 = '';
            if ($this->upload->do_upload($filename)) {
                $uploaddata = $this->upload->data();
                $image1 = $uploaddata['file_name'];
            }
            if ($image1 == '') {
                $image1 = $this->sector_model->getimage1byid($id);
                    // print_r($image);
                     $image1 = $image1->image1;
            }
            $filename = 'image2';
            $image2 = '';
            if ($this->upload->do_upload($filename)) {
                $uploaddata = $this->upload->data();
                $image2 = $uploaddata['file_name'];
            }
            if ($image2 == '') {
                $image2 = $this->sector_model->getimage2byid($id);
                    // print_r($image);
                     $image2 = $image2->image2;
            }

if($this->sector_model->edit($id,$name,$description,$image1,$image2,$order,$type)==0)
$data["alerterror"]="New sector could not be Updated.";
else
$data["alertsuccess"]="sector Updated Successfully.";
$data["redirect"]="site/viewsector";
$this->load->view("redirect",$data);
}
}
public function deletesector()
{
$access=array("1");
$this->checkaccess($access);
$this->sector_model->delete($this->input->get("id"));
$data["redirect"]="site/viewsector";
$this->load->view("redirect",$data);
}
public function viewproject()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewproject";
$data["base_url"]=site_url("site/viewprojectjson");
$data["title"]="View project";
$this->load->view("template",$data);
}
function viewprojectjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`rdbackend_project`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`rdbackend_project`.`title`";
$elements[1]->sort="1";
$elements[1]->header="title";
$elements[1]->alias="title";
$elements[2]=new stdClass();
$elements[2]->field="`rdbackend_project`.`image`";
$elements[2]->sort="1";
$elements[2]->header="image";
$elements[2]->alias="image";
$elements[3]=new stdClass();
$elements[3]->field="`rdbackend_project`.`description`";
$elements[3]->sort="1";
$elements[3]->header="description";
$elements[3]->alias="description";
$elements[4]=new stdClass();
$elements[4]->field="`rdbackend_project`.`order`";
$elements[4]->sort="1";
$elements[4]->header="order";
$elements[4]->alias="order";
$elements[5]=new stdClass();
$elements[5]->field="`rdbackend_services`.`name`";
$elements[5]->sort="1";
$elements[5]->header="service";
$elements[5]->alias="service";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `rdbackend_project` INNER JOIN `rdbackend_services` ON `rdbackend_project`.`services`=`rdbackend_services`.`id`");
$this->load->view("json",$data);
}

public function createproject()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createproject";
$data['sector']=$this->services_model->getservicesdropdown();
$data["title"]="Create project";
$this->load->view("template",$data);
}
public function createprojectsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("title","title","trim");
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("description","description","trim");
$this->form_validation->set_rules("order","order","trim");
$this->form_validation->set_rules("services","sector","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createproject";
$data["title"]="Create project";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$title=$this->input->get_post("title");
// $image=$this->input->get_post("image");
$description=$this->input->get_post("description");
$order=$this->input->get_post("order");
$sector=$this->input->get_post("sector");
$config['upload_path'] = './uploads/';
		 $config['allowed_types'] = 'gif|jpg|png|jpeg';
		 $this->load->library('upload', $config);
		 $filename="image";
		 $image="";
		 if (  $this->upload->do_upload($filename))
		 {
			 $uploaddata = $this->upload->data();
			 $image=$uploaddata['file_name'];

							 $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
							 $config_r['maintain_ratio'] = TRUE;
							 $config_t['create_thumb'] = FALSE;///add this
							 // $config_r['width']   = 800;
							 // $config_r['height'] = 800;
							 $config_r['quality']    = 100;
							 //end of configs
							 $this->load->library('image_lib', $config_r);
							 $this->image_lib->initialize($config_r);
							 if(!$this->image_lib->resize())
							 {
									 echo "Failed." . $this->image_lib->display_errors();
									 //return false;
							 }
							 else
							 {
									 //print_r($this->image_lib->dest_image);
									 //dest_image
									 $image=$this->image_lib->dest_image;
									 //return false;
							 }

		 }

if($this->project_model->create($title,$image,$description,$order,$sector)==0)
$data["alerterror"]="New project could not be created.";
else
$data["alertsuccess"]="project created Successfully.";
$data["redirect"]="site/viewproject";
$this->load->view("redirect",$data);
}
}
public function editproject()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editproject";
$data["page2"]="block/productblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data['sector']=$this->services_model->getservicesdropdown();
$data["title"]="Edit project";
$data["before"]=$this->project_model->beforeedit($this->input->get("id"));
// $this->load->view("template",$data);
$this->load->view("templatewith2",$data);

}
public function editprojectsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("title","title","trim");
$this->form_validation->set_rules("image","image","trim");
$this->form_validation->set_rules("description","description","trim");
$this->form_validation->set_rules("order","order","trim");
$this->form_validation->set_rules("sector","sector","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editproject";
$data["title"]="Edit project";
$data["before"]=$this->project_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$title=$this->input->get_post("title");
$image=$this->input->get_post("image");
$description=$this->input->get_post("description");
$order=$this->input->get_post("order");
$sector=$this->input->get_post("sector");
$config['upload_path'] = './uploads/';
		 $config['allowed_types'] = 'gif|jpg|png|jpeg';
		 $this->load->library('upload', $config);
		 $filename="image";
		 $image="";
		 if (  $this->upload->do_upload($filename))
		 {
			 $uploaddata = $this->upload->data();
			 $image=$uploaddata['file_name'];

							 $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
							 $config_r['maintain_ratio'] = TRUE;
							 $config_t['create_thumb'] = FALSE;///add this
							 // $config_r['width']   = 800;
							 // $config_r['height'] = 800;
							 $config_r['quality']    = 100;
							 //end of configs

							 $this->load->library('image_lib', $config_r);
							 $this->image_lib->initialize($config_r);
							 if(!$this->image_lib->resize())
							 {
									 echo "Failed." . $this->image_lib->display_errors();
									 //return false;
							 }
							 else
							 {
									 //print_r($this->image_lib->dest_image);
									 //dest_image
									 $image=$this->image_lib->dest_image;
									 //return false;
							 }

		 }

					 if($image=="")
					 {
					 $image=$this->project_model->getimagebyid($id);
							// print_r($image);
							 $image=$image->logo;
					 }
if($this->project_model->edit($id,$title,$image,$description,$order,$sector)==0)
$data["alerterror"]="New project could not be Updated.";
else
$data["alertsuccess"]="project Updated Successfully.";
$data["redirect"]="site/viewproject";
$this->load->view("redirect",$data);
}
}
public function deleteproject()
{
$access=array("1");
$this->checkaccess($access);
$this->project_model->delete($this->input->get("id"));
$data["redirect"]="site/viewproject";
$this->load->view("redirect",$data);
}
public function viewservices()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewservices";
$data["base_url"]=site_url("site/viewservicesjson");
$data["title"]="View services";
$this->load->view("template",$data);
}
function viewservicesjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`rdbackend_services`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`rdbackend_services`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";
$elements[2]=new stdClass();
$elements[2]->field="`rdbackend_services`.`description`";
$elements[2]->sort="1";
$elements[2]->header="description";
$elements[2]->alias="description";
$elements[3]=new stdClass();
$elements[3]->field="`rdbackend_services`.`order`";
$elements[3]->sort="1";
$elements[3]->header="order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`rdbackend_sector`.`name`";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `rdbackend_services` LEFT OUTER JOIN `rdbackend_sector` ON `rdbackend_services`.`sector`=`rdbackend_sector`.`id`");
$this->load->view("json",$data);
}

public function createservices()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createservices";
$data['sector']=$this->sector_model->getsectordropdown();
$data["title"]="Create services";
$this->load->view("template",$data);
}
public function createservicessubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("description","description","trim");
$this->form_validation->set_rules("order","order","trim");
$this->form_validation->set_rules("sector","sector","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createservices";
$data["title"]="Create services";
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$description=$this->input->get_post("description");
$order=$this->input->get_post("order");
$sector=$this->input->get_post("sector");
if($this->services_model->create($name,$description,$order,$sector)==0)
$data["alerterror"]="New services could not be created.";
else
$data["alertsuccess"]="services created Successfully.";
$data["redirect"]="site/viewservices";
$this->load->view("redirect",$data);
}
}
public function editservices()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editservices";
$data['sector']=$this->sector_model->getsectordropdown();
$data["title"]="Edit services";
$data["before"]=$this->services_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editservicessubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","id","trim");
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("description","description","trim");
$this->form_validation->set_rules("order","order","trim");
$this->form_validation->set_rules("sector","sector","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editservices";
$data["title"]="Edit services";
$data["before"]=$this->services_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$description=$this->input->get_post("description");
$order=$this->input->get_post("order");
$sector=$this->input->get_post("sector");
if($this->services_model->edit($id,$name,$description,$order,$sector)==0)
$data["alerterror"]="New services could not be Updated.";
else
$data["alertsuccess"]="services Updated Successfully.";
$data["redirect"]="site/viewservices";
$this->load->view("redirect",$data);
}
}
public function deleteservices()
{
$access=array("1");
$this->checkaccess($access);
$this->services_model->delete($this->input->get("id"));
$data["redirect"]="site/viewservices";
$this->load->view("redirect",$data);
}
public function viewclients()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewclients";
$data["base_url"]=site_url("site/viewclientsjson");
$data["title"]="View clients";
$this->load->view("template",$data);
}
function viewclientsjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`rdbackend_clients`.`name`";
$elements[0]->sort="1";
$elements[0]->header="name";
$elements[0]->alias="name";
$elements[1]=new stdClass();
$elements[1]->field="`rdbackend_clients`.`logo`";
$elements[1]->sort="1";
$elements[1]->header="logo";
$elements[1]->alias="logo";
$elements[2]=new stdClass();
$elements[2]->field="`rdbackend_clients`.`order`";
$elements[2]->sort="1";
$elements[2]->header="order";
$elements[2]->alias="order";
$elements[3]=new stdClass();
$elements[3]->field="`rdbackend_clients`.`title`";
$elements[3]->sort="1";
$elements[3]->header="title";
$elements[3]->alias="title";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `rdbackend_clients`");
$this->load->view("json",$data);
}

public function createclients()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createclients";
$data["title"]="Create clients";
$this->load->view("template",$data);
}
public function createclientssubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","name","trim");
$this->form_validation->set_rules("logo","logo","trim");
$this->form_validation->set_rules("order","order","trim");
$this->form_validation->set_rules("title","title","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createclients";
$data["title"]="Create clients";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
// $logo=$this->input->get_post("logo");
$order=$this->input->get_post("order");
$title=$this->input->get_post("title");
$id=$this->input->get_post("id");
$config['upload_path'] = './uploads/';
		 $config['allowed_types'] = 'gif|jpg|png|jpeg';
		 $this->load->library('upload', $config);
		 $filename="image";
		 $image="";
		 if (  $this->upload->do_upload($filename))
		 {
			 $uploaddata = $this->upload->data();
			 $image=$uploaddata['file_name'];

							 $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
							 $config_r['maintain_ratio'] = TRUE;
							 $config_t['create_thumb'] = FALSE;///add this
							 // $config_r['width']   = 800;
							 // $config_r['height'] = 800;
							 $config_r['quality']    = 100;
							 //end of configs
							 $this->load->library('image_lib', $config_r);
							 $this->image_lib->initialize($config_r);
							 if(!$this->image_lib->resize())
							 {
									 echo "Failed." . $this->image_lib->display_errors();
									 //return false;
							 }
							 else
							 {
									 //print_r($this->image_lib->dest_image);
									 //dest_image
									 $image=$this->image_lib->dest_image;
									 //return false;
							 }

		 }

if($this->clients_model->create($name,$image,$order,$title)==0)
$data["alerterror"]="New clients could not be created.";
else
$data["alertsuccess"]="clients created Successfully.";
$data["redirect"]="site/viewclients";
$this->load->view("redirect",$data);
}
}
public function editclients()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editclients";
$data["title"]="Edit clients";
$data["before"]=$this->clients_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editclientssubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","name","trim");
// $this->form_validation->set_rules("logo","logo","trim");
$this->form_validation->set_rules("order","order","trim");
$this->form_validation->set_rules("title","title","trim");
$this->form_validation->set_rules("id","id","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editclients";
$data["title"]="Edit clients";
$data["before"]=$this->clients_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
// $logo=$this->input->get_post("logo");
$order=$this->input->get_post("order");
$title=$this->input->get_post("title");
$id=$this->input->get_post("id");
$config['upload_path'] = './uploads/';
		 $config['allowed_types'] = 'gif|jpg|png|jpeg';
		 $this->load->library('upload', $config);
		 $filename="image";
		 $image="";
		 if (  $this->upload->do_upload($filename))
		 {
			 $uploaddata = $this->upload->data();
			 $image=$uploaddata['file_name'];

							 $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
							 $config_r['maintain_ratio'] = TRUE;
							 $config_t['create_thumb'] = FALSE;///add this
							 // $config_r['width']   = 800;
							 // $config_r['height'] = 800;
							 $config_r['quality']    = 100;
							 //end of configs

							 $this->load->library('image_lib', $config_r);
							 $this->image_lib->initialize($config_r);
							 if(!$this->image_lib->resize())
							 {
									 echo "Failed." . $this->image_lib->display_errors();
									 //return false;
							 }
							 else
							 {
									 //print_r($this->image_lib->dest_image);
									 //dest_image
									 $image=$this->image_lib->dest_image;
									 //return false;
							 }

		 }

					 if($image=="")
					 {
					 $image=$this->clients_model->getimagebyid($id);
							// print_r($image);
							 $image=$image->logo;
					 }
if($this->clients_model->edit($name,$image,$order,$title,$id)==0)
$data["alerterror"]="New clients could not be Updated.";
else
$data["alertsuccess"]="clients Updated Successfully.";
$data["redirect"]="site/viewclients";
$this->load->view("redirect",$data);
}
}
public function deleteclients()
{
$access=array("1");
$this->checkaccess($access);
$this->clients_model->delete($this->input->get("id"));
$data["redirect"]="site/viewclients";
$this->load->view("redirect",$data);
}
public function viewproductimage()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewproductimage";
$data["page2"]="block/productblock";
$data["before1"]=$this->input->get('id');
$data["before2"]=$this->input->get('id');
$data["base_url"]=site_url("site/viewproductimagejson?id=").$this->input->get('id');
$data["title"]="View productimage";
$this->load->view("templatewith2",$data);
}
function viewproductimagejson()
{
$id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`projectimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`projectimage`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";
// $elements[2]=new stdClass();
// $elements[2]->field="`status`";
// $elements[2]->sort="1";
// $elements[2]->header="status";
// $elements[2]->alias="status";

$elements[3]=new stdClass();
$elements[3]->field="`projectimage`.`image`";
$elements[3]->sort="1";
$elements[3]->header="image";
$elements[3]->alias="image";

$elements[4]=new stdClass();
$elements[4]->field="`projectimage`.`project`";
$elements[4]->sort="1";
$elements[4]->header="productid";
$elements[4]->alias="productid";
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `projectimage` LEFT OUTER JOIN `rdbackend_project` ON `rdbackend_project`.`id`=`projectimage`.`project`","WHERE `projectimage`.`project`='$id'");
$this->load->view("json",$data);
}

public function createproductimage()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createproductimage";
$data["page2"]="block/productblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
$data['product']=$this->project_model->getdropdown();
$data["title"]="Create productimage";
$this->load->view("templatewith2",$data);
}
public function createproductimagesubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("product","Product","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("status","Status","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();

$data["page"]="createproductimage";
$data['design']=$this->designs_model->getdesignsdropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data['relatedproduct']=$this->product_model->getproductdropdown();
$data['product']=$this->product_model->getproductdropdown();
$data["title"]="Create productimage";
$this->load->view("template",$data);
}
else
{
    $product=$this->input->get_post("product");
    $order=$this->input->get_post("order");
    $status=$this->input->get_post("status");
 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                // $config_r['width']   = 800;
                // $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs
                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

if($this->productimage_model->create($product,$order,$status,$image)==0)
$data["alerterror"]="New productimage could not be created.";
else
$data["alertsuccess"]="productimage created Successfully.";
$data["redirect"]="site/viewproductimage?id=".$product;
$this->load->view("redirect2",$data);
}
}
public function editproductimage()
{
$access=array("1");
$this->checkaccess($access);
// $data['relatedproduct']=$this->product_model->getproductdropdown();
$data['product']=$this->project_model->getdropdown();
    // $data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editproductimage";
$data["page2"]="block/productblock";
$data["before1"]=$this->input->get("id");
$data["before2"]=$this->input->get("id");
// $data['design']=$this->designs_model->getdesignsdropdown();
$data["title"]="Edit productimage";
$data["before"]=$this->productimage_model->beforeedit($this->input->get("id"));
$this->load->view("templatewith2",$data);
}
public function editproductimagesubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("product","Product","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("status","Status","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editproductimage";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data['product']=$this->product_model->getproductdropdown();
    $data['design']=$this->designs_model->getdesignsdropdown();
$data['relatedproduct']=$this->product_model->getproductdropdown();
$data["title"]="Edit productimage";
$data["before"]=$this->productimage_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
  $product=$this->input->get_post("product");
    $order=$this->input->get_post("order");
    $status=$this->input->get_post("status");
 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];

                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                // $config_r['width']   = 800;
                // $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }

			}

            if($image=="")
            {
            $image=$this->productimage_model->getImageById($id);
               // print_r($image);
                $image=$image->image;
            }

if($this->productimage_model->edit($id,$product,$order,$status,$image)==0)
$data["alerterror"]="New productimage could not be Updated.";
else
$data["alertsuccess"]="productimage Updated Successfully.";
$data["redirect"]="site/viewproductimage?id=".$product;
$this->load->view("redirect2",$data);
}
}
public function deleteproductimage()
{
$access=array("1");
$this->checkaccess($access);
$this->productimage_model->delete($this->input->get("id"));
$data["redirect"]="site/viewproductimage?id=".$this->input->get("productid");
$this->load->view("redirect2",$data);
}

}
