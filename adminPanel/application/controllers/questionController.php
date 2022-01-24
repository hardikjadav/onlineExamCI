<?php

class questionController extends Ci_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('questionModel');
	}
	
	function index(){

		$this->load->view('category/index.php');
	}
	
	function addQuestion()
	{
		$this->load->view('category/addCategory.php');
	}

	function saveQuestion()
	{
		$fetchArray = array();
		$fetchArray['fetchCategory']=$this->questionModel->select('category');
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

			$questionResult=$this->questionModel->insert('questions',$whereArray);
			
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
				$data['fetch'] = $this->questionModel->selectJoinLike('questions','category','questions.categoryId=category.categoryId','questionName',$value);
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
		$config["base_url"] = base_url() . "questionController/manageQuestion";
        $config["total_rows"] = $this->questionModel->getCount('questions');
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$questionFetchArray = array();
        $questionFetchArray['links'] = $this->pagination->create_links();

		//echo "<pre>";print_r($questionFetchArray);exit;
		$questionFetchArray['message'] = '';

        $questionFetchArray['fetch'] = $this->questionModel->selectJoinLimit('questions','category','questions.categoryId=category.categoryId',$config['per_page'],$page);
		
        
		$this->load->view('exam/manageQuestion.php',$questionFetchArray);
	}


	function editQuestion()
	{
		$fetchQuestionArray = array();
		$fetchQuestionArray['categoryArray']=$this->questionModel->select('category');
		$questionId= $this->uri->segment(3);
		$whereArray= array("questionId"=>$questionId);
		$res=$this->questionModel->selectWhere('questions',$whereArray);
		$fetchQuestionArray['fetch']=$res->result_array();
		if($this->input->post('update'))
		{
			$categoryId = $this->input->post('categoryId');
			$questionName = $this->input->post('questionName');
			
			date_default_timezone_set('asia/culcutta');
			$updatedAt=date("Y-m-d H:i:s");
			$updatedBy=$this->session->userdata('adminId');
			$dataArray=array("categoryId"=>$categoryId,"questionName"=>$questionName,"updatedAt"=>$updatedAt,"updatedBy"=>$updatedBy);

			$questionResult=$this->questionModel->update('questions',$dataArray,$whereArray);
			
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
		$questionResult=$this->questionModel->delete('questions',$whereArray);
		if($questionResult)
		{
			redirect('manageQuestion','refresh');
		}
	}
	
}
?>