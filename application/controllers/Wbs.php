<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wbs extends CI_Controller {


	
	public function wbs_view()
	{
		
		$this->load->view('wbs_view');
	}

	// function simpan_project(){
	// 	$project_name=$this->input->post('project_name');
	// 	$project_desc=$this->input->post('project_desc');
	// 	$start_date=$this->input->post('start_date');
	// 	$start_date=date('d-m-Y', strtotime($start_date));
	// 	$end_date=$this->input->post('end_date');
	// 	$end_date=date('d-m-Y', strtotime($end_date));
	// 	$duration=$this->input->post('duration');
	// 	$budget=$this->input->post('budget');
	// 	$project_manager=$this->input->post('project_manager');
	// 	$this->m_project->simpan_project($project_name,$project_desc,$start_date,$end_date,$duration,$budget,$project_manager);
	// 	redirect('ProjectCharter/project_charter');

	// }



	// function edit_project(){
	// 	$project_name=$this->input->post('project_name');
	// 	$project_desc=$this->input->post('project_desc');
	// 	$start_date=$this->input->post('start_date');
	// 	$start_date=date('d-m-Y', strtotime($start_date));
	// 	$end_date=$this->input->post('end_date');
	// 	$end_date=date('d-m-Y', strtotime($end_date));
	// 	$duration=$this->input->post('duration');
	// 	$budget=$this->input->post('budget');
	// 	$project_manager=$this->input->post('project_manager');
	// 	$this->m_project->edit_project($project_name,$project_desc,$start_date,$end_date,$duration,$budget,$project_manager);
	// 	redirect('ProjectCharter/project_charter');
	// }

	
}
