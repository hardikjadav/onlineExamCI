<?php

class adminControl extends Ci_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('adminModel');
	}
	
	function dashboard()
	{
		$this->load->view('dashboard/dashboard.php');
	}
	
	function register()
	{
		$this->load->view('login/register.php');
	}
	
	function index(){

		$this->load->view('login/index.php');
	}
	
	function checkAuthentication()
	{
		$this->form_validation->set_rules('userName', 'User Name', 'required|alpha');
		$this->form_validation->set_rules('userPassword', 'Password', 'required|min_length[2]|max_length[8]');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('login/index.php');
		}else{
		
			$userName = $this->input->post('userName');
			$userPassword = md5($this->input->post('userPassword'));

			$where=array("userName"=>$userName,"userPassword"=>$userPassword);
			$res=$this->adminModel->selectWhere('adminlogin',$where);
			$check=$res->num_rows();
			if($check==1)
			{
				$fetchArray=$res->result_array();
				$adminId=$fetchArray[0]['adminId'];

				$this->session->set_userdata('admin',$userName);
				$this->session->set_userdata('adminId',$adminId);
				echo redirect('dashboard','refresh');
			}else{
				$this->load->view('login/index.php');
			}
		}
	}

	function profile(){
		$adminId=$this->session->userdata('adminId');
		$where=array("adminId"=>$adminId);
		$res=$this->adminModel->select_join('adminlogin','country','adminlogin.countryId=country.countryId','state','adminlogin.stateId=state.stateId','city','adminlogin.cityId=city.cityId',$where);
		$fetchArray['fetch']=$res->result_array();
		$this->load->view('dashboard/profile.php',$fetchArray);
	}
	
	function logout()
	{
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('adminId');
		redirect('index','refresh');
	}

	function editUserProfile()
	{
		$adminId=$this->uri->segment(3);
		$where=array("adminId"=>$adminId);
		$res=$this->adminModel->selectWhere('adminlogin',$where);
		$fetchArray['fetch']=$res->result_array();
		$oldImage=$fetch[0]['adminImage'];
		$fetchArray['countryArray']=$this->adminModel->select('country');
		$fetchArray['stateArray']=$this->adminModel->select('state');
		$fetchArray['cityArray']=$this->adminModel->select('city');
		if($this->input->post('submit'))
		{
			$firstName = $this->input->post('firstName');
			$lastName = $this->input->post('lastName');
			$userName = $this->input->post('userName');
			$gender = $this->input->post('gender');
			$address = $this->input->post('address');
			$countryId = $this->input->post('countryId');
			$stateId = $this->input->post('stateId');
			$cityId = $this->input->post('cityId');
			$config['upload_path']='./public/admin/upload';
			$config['allowed_types']='gif|png|jpg';
			$this->load->library('upload',$config);
			if($this->upload->do_upload('adminImage')>0)
			{
				$tmpFile=$this->upload->data();
				$adminImage=$tmpFile['file_name'];

				$dataArray=array("firstName"=>$firstName,"lastName"=>$lastName,"userName"=>$userName,
				"gender"=>$gender,"address"=>$address,"countryId"=>$countryId,"stateId"=>$stateId,
				"cityId"=>$cityId,"adminImage"=>$adminImage);
				$res=$this->adminModel->update('adminlogin',$dataArray,$where);
				if($res)
				{
					
					unlink('./public/admin/upload/'.$oldImage);
					$this->session->set_userdata('admin',$userName);
					$this->session->set_userdata('adminId',$adminId);
					echo redirect('profile','refresh');
				}
			}
			else
			{
				$dataArray=array("firstName"=>$firstName,"lastName"=>$lastName,"userName"=>$userName,
				"gender"=>$gender,"address"=>$address,"countryId"=>$countryId,"stateId"=>$stateId,"cityId"=>$cityId);
				$res=$this->adminModel->update('adminlogin',$dataArray,$where);
				if($res)
				{
					
					$this->session->set_userdata('admin',$userName);
					$this->session->set_userdata('adminId',$adminId);
					echo redirect('profile','refresh');
				}
			}
		}
		$this->load->view('dashboard/editUserProfile.php',$fetchArray);
	}
	
	function changePassword()
	{
		$adminId=$this->session->userdata('adminId');
		$where=array("adminId"=>$adminId);
		$res=$this->adminModel->selectWhere('adminlogin',$where);
		$fetchArray=$res->result_array();
		$userPassword = $fetchArray[0]['userPassword'];


		//$this->form_validation->set_rules('userName', 'User Name', 'required|alpha');
		$this->form_validation->set_rules('userPasswordFetch', 'old Password', 'required|min_length[2]|max_length[8]');
		$this->form_validation->set_rules('newUserPassword', ' New Password', 'required|min_length[2]|max_length[8]');
		$this->form_validation->set_rules('confirmUserPassword', 'Confirm Password', 'required|min_length[2]|max_length[8]|matches[newUserPassword]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('dashboard/changePassword.php');
		}
		else
		{

			$userPasswordFetch=md5($this->input->post('userPasswordFetch'));
			$newUserPassword=md5($this->input->post('newUserPassword'));
			$confirmUserPassword=md5($this->input->post('confirmUserPassword'));
			if($newUserPassword==$confirmUserPassword)
			{
				if($userPassword==$userPasswordFetch)
				{
					//$newPassword=md5($newPass);
					$data=array("userPassword"=>$newUserPassword);
					$res=$this->adminModel->update('adminlogin',$data,$where);
					if($res){	
						redirect('index','refresh');
					}
				}else{
					$this->load->view('dashboard/changePassword.php');
				}
			}
		}
		
	}
	
	
}
//$obj= new adminControl();
?>