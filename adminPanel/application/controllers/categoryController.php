<?php

class categoryController extends Ci_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('categoryModel');
	}
	
	function index(){

		$this->load->view('category/index.php');
	}
	
	function addCategory()
	{
		$this->load->view('category/addCategory.php');
	}

	function saveCategory()
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

			$categoryResult=$this->categoryModel->insert('category',$whereArray);
			
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
				$data['fetch'] = $this->categoryModel->selectLike('category','categoryName',$value);
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
		$config["base_url"] = base_url() . "categoryController/manageCategory";
        $config["total_rows"] = $this->categoryModel->getCount('category');
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$CategoryFetchArray = array();
        $CategoryFetchArray["links"] = $this->pagination->create_links();
		$CategoryFetchArray['message'] = '';

        $CategoryFetchArray['fetch'] = $this->categoryModel->selectLimit('category',$config["per_page"], $page);

        
		$this->load->view('category/manageCategory.php',$CategoryFetchArray);
	}

	function editCategory()
	{
		$categoryId= $this->uri->segment(3);
		$whereArray= array("categoryId"=>$categoryId);
		$res=$this->categoryModel->selectWhere('category',$whereArray);
		$fetchCategoryArray['fetch']=$res->result_array();
		if($this->input->post('update'))
		{
			$categoryName = $this->input->post('categoryName');
			
			date_default_timezone_set('asia/culcutta');
			$updatedAt=date("Y-m-d H:i:s");
			$updatedBy=$this->session->userdata('adminId');
			$dataArray=array("categoryName"=>$categoryName,"updatedAt"=>$updatedAt,"updatedBy"=>$updatedBy);

			$categoryResult=$this->categoryModel->update('category',$dataArray,$whereArray);
			
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
		$categoryResult=$this->categoryModel->delete('category',$whereArray);
		if($categoryResult)
		{
			redirect('manageCategory','refresh');
		}
	}
	
}
?>