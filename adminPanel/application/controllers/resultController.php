<?php

class resultController extends Ci_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('resultModel');
	}
	
	function index(){

		$this->load->view('category/index.php');
	}
	
	function addResult()
	{
		$this->load->view('result/addResult.php');
	}

	
	function saveResult()
	{
		$fetchArray = array();
		$fetchArray['fetchCategory']=$this->resultModel->select('category');
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

			$userResult=$this->resultModel->insert('result',$whereArray);
			
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
				$data['fetch'] = $this->resultModel->selectLike('result','userName',$value);
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
		//$CategoryFetchArray['fetch']=$this->resultModel->select('category');
		$config = array();
		$config["base_url"] = base_url() . "questionController/manageQuestion";
        $config["total_rows"] = $this->resultModel->getCount('result');
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $resultFetchArray["links"] = $this->pagination->create_links();
		$resultFetchArray['message'] = '';

        $resultFetchArray['fetch'] = $this->resultModel->selectLimit('result',$config["per_page"], $page);
		
        
		$this->load->view('result/manageResult.php',$resultFetchArray);
	}


	function editResult()
	{
		$fetchResultArray = array();
		$fetchResultArray['categoryArray']=$this->resultModel->select('category');
		$resultId= $this->uri->segment(3);
		$whereArray= array("resultId"=>$resultId);
		$res=$this->resultModel->selectWhere('result',$whereArray);
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

			$questionResult=$this->resultModel->update('result',$dataArray,$whereArray);
			
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
		$userResult=$this->resultModel->delete('result',$whereArray);
		if($userResult)
		{
			redirect('manageResult','refresh');
		}
	}
	
}
?>