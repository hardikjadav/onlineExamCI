<?php

class adminControl extends Ci_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model');
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
			$res=$this->model->selectWhere('adminlogin',$where);
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
		$res=$this->model->select_join('adminlogin','country','adminlogin.countryId=country.countryId','state','adminlogin.stateId=state.stateId','city','adminlogin.cityId=city.cityId',$where);
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
		$res=$this->model->selectWhere('adminlogin',$where);
		$fetchArray['fetch']=$res->result_array();
		$oldImage=$fetch[0]['adminImage'];
		$fetchArray['countryArray']=$this->model->select('country');
		$fetchArray['stateArray']=$this->model->select('state');
		$fetchArray['cityArray']=$this->model->select('city');
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
				$res=$this->model->update('adminlogin',$dataArray,$where);
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
				$res=$this->model->update('adminlogin',$dataArray,$where);
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
		$res=$this->model->selectWhere('adminlogin',$where);
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
					$res=$this->model->update('adminlogin',$data,$where);
					if($res){	
						redirect('index','refresh');
					}
				}else{
					$this->load->view('dashboard/changePassword.php');
				}
			}
		}
		
	}
	function addCategory()
	{

		$this->form_validation->set_rules('categoryName', 'Category Name', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('category/addCategory.php');
		}else{
		
			$categoryName = $this->input->post('categoryName');
			
			date_default_timezone_set('asia/culcutta');
			$createdAt=date("Y-m-d H:i:s");
			$createdBy=$this->session->userdata('adminId');
			$whereArray=array("categoryName"=>$categoryName,"createdAt"=>$createdAt,"createdBy"=>$createdBy);

			$categoryResult=$this->model->insert('category',$whereArray);
			
			if($categoryResult)
			{
				
				echo redirect('manageCategory','refresh');

			}else{
				$this->load->view('category/addCategory.php');
			}
		}
	}
	function searchCategory()
	{	if($this->input->post('searchBtn'))
		{
			$value = $this->input->post('categoryName');

			if(isset($value) and !empty($value)){
				$data['fetch'] = $this->model->selectLike('category','categoryName',$value);
				$data['link'] = '';
				$data['message'] = 'Search Results';
				$this->load->view('category/manageCategory' , $data);
			}
			else
			{
				redirect('manageCategory','refresh');
			}
		}
        
 
	}
	function manageCategory()
	{
		//$CategoryFetchArray['fetch']=$this->model->select('category');
		$config = array();
		$config["base_url"] = base_url() . "adminControl/manageCategory";
        $config["total_rows"] = $this->model->getCount('category');
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$CategoryFetchArray = array();
        $CategoryFetchArray["links"] = $this->pagination->create_links();
		$CategoryFetchArray['message'] = '';

        $CategoryFetchArray['fetch'] = $this->model->selectLimit('category',$config["per_page"], $page);

        
		$this->load->view('category/manageCategory.php',$CategoryFetchArray);
	}

	function editCategory()
	{
		$categoryId= $this->uri->segment(3);
		$whereArray= array("categoryId"=>$categoryId);
		$res=$this->model->selectWhere('category',$whereArray);
		$fetchCategoryArray['fetch']=$res->result_array();
		if($this->input->post('update'))
		{
			$categoryName = $this->input->post('categoryName');
			
			date_default_timezone_set('asia/culcutta');
			$updatedAt=date("Y-m-d H:i:s");
			$updatedBy=$this->session->userdata('adminId');
			$dataArray=array("categoryName"=>$categoryName,"updatedAt"=>$updatedAt,"updatedBy"=>$updatedBy);

			$categoryResult=$this->model->update('category',$dataArray,$whereArray);
			
			if($categoryResult)
			{
				
				echo redirect('manageCategory','refresh');
			}	
		}
		$this->load->view('category/editCategory.php',$fetchCategoryArray);
	}

	function deleteCategory()
	{
		$categoryId= $this->uri->segment(3);
		$whereArray= array("categoryId"=>$categoryId);
		$categoryResult=$this->model->delete('category',$whereArray);
		if($categoryResult)
		{
			redirect('manageCategory','refresh');
		}
	}

	function addQuestion()
	{
		$fetchArray = array();
		$fetchArray['fetchCategory']=$this->model->select('category');
		$this->form_validation->set_rules('categoryId', 'Category Name', 'required');
		$this->form_validation->set_rules('questionName', 'Question Name', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('exam/addQuestion.php',$fetchArray);
		}else{
		
			$categoryId = $this->input->post('categoryId');
			$questionName = $this->input->post('questionName');
			
			date_default_timezone_set('asia/culcutta');
			$createdAt=date("Y-m-d H:i:s");
			$createdBy=$this->session->userdata('adminId');
			$whereArray=array("questionName"=>$questionName,"categoryId"=>$categoryId,"createdAt"=>$createdAt,"createdBy"=>$createdBy);

			$questionResult=$this->model->insert('questions',$whereArray);
			
			if($questionResult)
			{
				echo redirect('addQuestion','refresh');
			}else{
				
				$this->load->view('exam/addQuestion.php',$fetchArray);
			}
		}
	}


	function searchQuestion()
	{	
		if($this->input->post('searchQuestions'))
		{
			$value = $this->input->post('questionName');

			if(isset($value) and !empty($value)){
				$data['fetch'] = $this->model->selectJoinLike('questions','category','questions.categoryId=category.categoryId','questionName',$value);
				$data['link'] = '';
				$data['message'] = 'Search Results';
				$this->load->view('exam/manageQuestion',$data);
			}
			else
			{
				redirect('manageQuestion','refresh');
			}
		}
        
 
	}

	function manageQuestion()
	{
		//$CategoryFetchArray['fetch']=$this->model->select('category');
		$config = array();
		$config["base_url"] = base_url() . "adminControl/manageQuestion";
        $config["total_rows"] = $this->model->getCount('questions');
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$questionFetchArray = array();
        $questionFetchArray['links'] = $this->pagination->create_links();

		//echo "<pre>";print_r($questionFetchArray);exit;
		$questionFetchArray['message'] = '';

        $questionFetchArray['fetch'] = $this->model->selectJoinLimit('questions','category','questions.categoryId=category.categoryId',$config['per_page'],$page);
		
        
		$this->load->view('exam/manageQuestion.php',$questionFetchArray);
	}


	function editQuestion()
	{
		$fetchQuestionArray = array();
		$fetchQuestionArray['categoryArray']=$this->model->select('category');
		$questionId= $this->uri->segment(3);
		$whereArray= array("questionId"=>$questionId);
		$res=$this->model->selectWhere('questions',$whereArray);
		$fetchQuestionArray['fetch']=$res->result_array();
		if($this->input->post('update'))
		{
			$categoryId = $this->input->post('categoryId');
			$questionName = $this->input->post('questionName');
			
			date_default_timezone_set('asia/culcutta');
			$updatedAt=date("Y-m-d H:i:s");
			$updatedBy=$this->session->userdata('adminId');
			$dataArray=array("categoryId"=>$categoryId,"questionName"=>$questionName,"updatedAt"=>$updatedAt,"updatedBy"=>$updatedBy);

			$questionResult=$this->model->update('questions',$dataArray,$whereArray);
			
			if($questionResult)
			{
				
				echo redirect('manageQuestion','refresh');
			}	
		}
		$this->load->view('exam/editQuestion.php',$fetchQuestionArray);
	}

	function deleteQuestion()
	{
		$questionId= $this->uri->segment(3);
		$whereArray= array("questionId"=>$questionId);
		$questionResult=$this->model->delete('questions',$whereArray);
		if($questionResult)
		{
			redirect('manageQuestion','refresh');
		}
	}

	function addResult()
	{
		$fetchArray = array();
		$fetchArray['fetchCategory']=$this->model->select('category');
		$this->form_validation->set_rules('userCategory', 'Category', 'required');
		$this->form_validation->set_rules('userName', 'User Name', 'required');
		$this->form_validation->set_rules('points', 'points', 'required');
		$this->form_validation->set_rules('totalPoints', 'Total Points', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('result/addResult.php',$fetchArray);
		}else{
		
			$userCategory = $this->input->post('userCategory');
			$userName = $this->input->post('userName');
			$points = $this->input->post('points');
			$totalPoints = $this->input->post('totalPoints');
			
			date_default_timezone_set('asia/culcutta');
			$createdAt=date("Y-m-d H:i:s");
			$createdBy=$this->session->userdata('adminId');
			$whereArray=array("userCategory"=>$userCategory,"userName"=>$userName,"points"=>$points,"totalPoints"=>$totalPoints,"createdAt"=>$createdAt,"createdBy"=>$createdBy);

			$userResult=$this->model->insert('result',$whereArray);
			
			if($userResult)
			{
				echo redirect('manageResult','refresh');
			}else{
				
				$this->load->view('result/addResult.php',$fetchArray);
			}
		}
	}

	function searchResult()
	{	
		if($this->input->post('searchUserResult'))
		{
			$value = $this->input->post('userName');

			if(isset($value) and !empty($value)){
				$data['fetch'] = $this->model->selectLike('result','userName',$value);
				$data['link'] = '';
				$data['message'] = 'Search Results';
				$this->load->view('result/manageResult',$data);
			}
			else
			{
				redirect('manageResult','refresh');
			}
		}
        
 
	}

	function manageResult()
	{
		//$CategoryFetchArray['fetch']=$this->model->select('category');
		$config = array();
		$config["base_url"] = base_url() . "manageResult";
        $config["total_rows"] = $this->model->getCount('result');
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $resultFetchArray["links"] = $this->pagination->create_links();
		$resultFetchArray['message'] = '';

        $resultFetchArray['fetch'] = $this->model->selectLimit('result',$config["per_page"], $page);
		
        
		$this->load->view('result/manageResult.php',$resultFetchArray);
	}


	function editResult()
	{
		$fetchResultArray = array();
		$fetchResultArray['categoryArray']=$this->model->select('category');
		$resultId= $this->uri->segment(3);
		$whereArray= array("resultId"=>$resultId);
		$res=$this->model->selectWhere('result',$whereArray);
		$fetchResultArray['fetch']=$res->result_array();
		if($this->input->post('editResult'))
		{
			$userCategory = $this->input->post('userCategory');
			$userName = $this->input->post('userName');
			$points = $this->input->post('points');
			$totalPoints = $this->input->post('totalPoints');
			
			date_default_timezone_set('asia/culcutta');
			$updatedAt=date("Y-m-d H:i:s");
			$updatedBy=$this->session->userdata('adminId');
			$dataArray=array("userCategory"=>$userCategory,"userName"=>$userName,"points"=>$points,"totalPoints"=>$totalPoints,"updatedAt"=>$updatedAt,"updatedBy"=>$updatedBy);

			$questionResult=$this->model->update('result',$dataArray,$whereArray);
			
			if($questionResult)
			{
				
				echo redirect('manageResult','refresh');
			}	
		}
		$this->load->view('result/editResult.php',$fetchResultArray);
	}


	function deleteResult()
	{
		$resultId= $this->uri->segment(3);
		$whereArray= array("resultId"=>$resultId);
		$userResult=$this->model->delete('result',$whereArray);
		if($userResult)
		{
			redirect('manageResult','refresh');
		}
	}
	
}
?>