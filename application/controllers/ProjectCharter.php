<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectCharter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_project');
		$this->load->helper('form');
		$this->load->library('session');
		//$this->output->enable_profiler(TRUE);

	}

	public function detailsystem(){
		$this->load->view("detailsystem.php");
	}
	public function project_charter()
	{
		$x['data']=$this->m_project->show_project();

		$this->load->view('project_charter', $x);
	}

	function simpan_project(){
		$project_name=$this->input->post('project_name');
		$project_desc=$this->input->post('project_desc');
		$start_date=$this->input->post('start_date');
		$start_date=date('Y-m-d', strtotime($start_date));
		$end_date=$this->input->post('end_date');
		$end_date=date('Y-m-d', strtotime($end_date));
		$duration=$this->input->post('duration');
		$budget=$this->input->post('budget');
		$project_manager=$this->input->post('project_manager');
		$this->m_project->simpan_project($project_name,$project_desc,$start_date,$end_date,$duration,$budget,$project_manager);
		redirect('ProjectCharter/project_charter');

	}

	function close_project($id){
		$this->m_project->close_project($id);
		redirect('ProjectCharter/project_charter');
	}

	function edit_project(){
		$id=$this->input->post('id');
		$project_name=$this->input->post('project_name');
		$project_desc=$this->input->post('project_desc');
		$start_date=$this->input->post('start_date');
		$start_date=date('Y-m-d', strtotime($start_date));
		$end_date=$this->input->post('end_date');
		$end_date=date('Y-m-d', strtotime($end_date));
		$duration=$this->input->post('duration');
		$budget=$this->input->post('budget');
		$project_manager=$this->input->post('project_manager');
		$this->m_project->edit_project($id,$project_name,$project_desc,$start_date,$end_date,$duration,$budget,$project_manager);
		redirect('ProjectCharter/project_charter');
	}

	function hapus_project(){
		$id = $this->input->get('id');
		$this->m_project->hapus_project($id);
		redirect('ProjectCharter/project_charter');

	}
		
	function simpan_initiating(){


		$id=$this->input->post('project_id');
		$col_name=$this->input->post('opt1')."".$this->input->post('opt2');
		$file_initiating=$this->input->post('file_initiating');
		$filename= $_FILES["file_initiating"]["name"];
		$file_ext = pathinfo($filename,PATHINFO_EXTENSION);

        $config['upload_path']          = './files/';
        $config['allowed_types']        = 'gif|jpg|png|doc|docx|xls|xlsx|rar|pdf';
        $config['max_size']             = 8000000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
		$config['overwrite'] 			= TRUE;
        $config['file_name']            = $id.'_'.$col_name.'.'.$file_ext;

        $this->load->library('upload', $config);
        $fname = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('file_initiating'))
        {
	     $error = array('error' => $this->upload->display_errors());
	     echo "Max size of files are 8 MB, please reupload a files with a permitted size.";
	     echo "Redirecting u back...";
	     sleep(5);
	     redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
         $data = array('upload_data' => $this->upload->data());
         $this->m_project->edit_init($id, $col_name,$fname);
		 $this->view_project($id);
        
        }
    }

    function view_project($vid=0)
	{	
		/*
		$vid = $id;
		if($id==0){
			$vid = $this->input->get('id');
		}
		*/
		$x['project_detail_data']=$this->m_project->show_project_detail($vid);
		
		$started = $this->m_project->is_initiated($vid);
		if($started==0){
			$this->m_project->start_init($vid);
			$this->m_project->start_quality($vid);
		}

		$x['init_data']=$this->m_project->show_init_detail($vid);

		$x['planning_scope_requirement_data']=$this->m_project->show_plan_scope_req_detail($vid);
		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail($vid);
		$x['planning_scope_resource_data2']=$this->m_project->show_plan_scope_res_detail2($vid);
		$x['planning_scope_scope_data']=$this->m_project->show_plan_scope_sco_detail($vid);
		$x['planning_scope_wbs_data']=$this->m_project->show_plan_scope_wbs_detail($vid);
		$x['activity_budget_detail_data']=$this->m_project->show_activity_budget_detail($vid);
		$x['activity_budget_report_data']=$this->m_project->show_activity_budget_report($vid);
		$x['activity_define_sequence_data']=$this->m_project->show_activity_define_sequence($vid);
		$x['activity_risk_data']=$this->m_project->show_activity_risk($vid);
		$x['activity_stake_holder_data']=$this->m_project->show_activity_stake_holder($vid);
		$x['activity_issue_log_data']=$this->m_project->show_activity_issue_log($vid);
		$x['remaining_raci']=$this->m_project->show_count_raci_all($vid);
		$x['activity_quality_data']=$this->m_project->show_quality($vid);
		$x['activity_vendor_data']=$this->m_project->show_activity_vendor($vid);

		//blackbox
		$x['blackbox_data']=$this->m_project->show_blackbox_result($vid);
		//uat
		$x['uat_data']=$this->m_project->show_uat_result($vid);


		$parent = $this->m_project->show_plan_scope_wbs_detail($vid);

		$x['id_project']=$vid;
		
		$this->load->view('progress_view', $x);
	}

	public function view_planning_scope_requirement($vid)
	{
		$x['planning_scope_requirement_data']=$this->m_project->show_plan_scope_req_detail($vid);
		$x['id_proj'] = $vid;
		$this->load->view('planning_scope_requirement', $x);
	}

	public function view_planning_scope_resource($vid)
	{
		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail($vid);
		$x['id_proj'] = $vid;
		$this->load->view('planning_scope_resource', $x);
	}

	public function view_planning_scope_scope($vid)
	{
		$x['planning_scope_scope_data']=$this->m_project->show_plan_scope_sco_detail($vid);
		$x['id_proj'] = $vid;
		$this->load->view('planning_scope_scope', $x);
	}

	public function view_planning_scope_wbs($vid)
	{
		$x['planning_scope_wbs_data']=$this->m_project->show_plan_scope_wbs_detail($vid);
		$x['id_proj'] = $vid;
		$this->load->view('planning_scope_wbs', $x);
	}

	function simpan_planning_scope_requirement(){
		$id_project=$this->input->post('id_proj');
		$requirement=$this->input->post('requirement');
		$business_unit=$this->input->post('business_unit');
		$role=$this->input->post('role');
		
		$this->m_project->simpan_planning_scope_requirement($id_project,$requirement,$business_unit,$role);
		redirect('ProjectCharter/view_planning_scope_requirement/'.$id_project);

	}

	function simpan_planning_scope_resource(){
		$id_project=$this->input->post('id_proj');
		$position=$this->input->post('position');
		$salary=$this->input->post('salary');
		$name=$this->input->post('name');
		
		$this->m_project->simpan_planning_scope_resource($id_project,$position,$salary,$name);
		redirect('ProjectCharter/view_planning_scope_resource/'.$id_project);

	}

	function simpan_planning_scope_scope(){
		$id_project=$this->input->post('id_proj');
		$description=$this->input->post('scope_desc');
		$deliverable="pending";
		$name=$this->input->post('scope_name');
		
		$this->m_project->simpan_planning_scope_scope($id_project,$description,$deliverable,$name);
		redirect('ProjectCharter/view_planning_scope_scope/'.$id_project);

	}

function simpan_planning_scope_wbs(){
		$id_project=$this->input->post('id_proj');
		$task_name=$this->input->post('task_name');
		$description=$this->input->post('description');
		$sequence=$this->input->post('sequence');
		
		$this->m_project->simpan_planning_scope_wbs($id_project,$task_name,$description,$sequence);
		redirect('ProjectCharter/view_planning_scope_wbs/'.$id_project);

	}

	function edit_planning_scope_requirement(){
		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj_edit');
		$requirement=$this->input->post('requirement_edit');
		$business_unit=$this->input->post('business_unit_edit');
		$role=$this->input->post('role_edit');
		
		$this->m_project->edit_planning_scope_requirement($id,$id_project,$requirement,$business_unit,$role);
		redirect('ProjectCharter/view_planning_scope_requirement/'.$id_project);

	}

	function edit_planning_scope_resource(){
		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj_edit');
		$position=$this->input->post('position_edit');
		$salary=$this->input->post('salary_edit');
		$name=$this->input->post('name_edit');
		
		$this->m_project->edit_planning_scope_resource($id,$id_project,$position,$salary,$name);
		redirect('ProjectCharter/view_planning_scope_resource/'.$id_project);

	}

	function edit_planning_scope_scope(){
		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj_edit');
		$description=$this->input->post('description_edit');
		$deliverable=$this->input->post('deliverable');
		$name=$this->input->post('name_edit');
		$this->m_project->edit_planning_scope_scope($id,$id_project,$description,$deliverable,$name);
		redirect('ProjectCharter/view_planning_scope_scope/'.$id_project);

	}


	function edit_planning_scope_wbs(){
		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj_edit');
		$task_name=$this->input->post('task_name_edit');
		$description=$this->input->post('description_edit');
		$sequence=$this->input->post('sequence_edit');
		
		$this->m_project->edit_planning_scope_wbs($id,$id_project,$task_name,$description,$sequence);
		redirect('ProjectCharter/view_planning_scope_wbs/'.$id_project);

	}

	function hapus_planning_scope_requirement($id=0,$id_project=0){
		
		
		$this->m_project->hapus_planning_scope_requirement($id);
		redirect('ProjectCharter/view_planning_scope_requirement/'.$id_project);

	}

	function hapus_planning_scope_resource($id=0,$id_project=0){
		$this->m_project->hapus_planning_scope_resource($id);
		redirect('ProjectCharter/view_planning_scope_resource/'.$id_project);

	}

	function hapus_planning_scope_scope($id=0,$id_project=0){
		
		$this->m_project->hapus_planning_scope_scope($id);
		redirect('ProjectCharter/view_planning_scope_scope/'.$id_project);

	}

	function hapus_planning_scope_wbs($id=0,$id_project=0){
		$this->m_project->hapus_planning_scope_wbs($id);
		redirect('ProjectCharter/view_planning_scope_wbs/'.$id_project);

	}

	public function view_planning_scope_wbs_detail($id_wbs,$vid)
	{
		$x['id_proj'] = $vid;
		$x['id_wbs'] = $id_wbs;
		$x['planning_scope_wbs_data']=$this->m_project->show_plan_scope_wbs_details($id_wbs);
		$this->load->view('planning_scope_wbs_detail', $x);
	}


	function simpan_planning_scope_wbs_detail(){
		$id_project=$this->input->post('id_proj');
		$id_wbs=$this->input->post('id_wbs');
		$task_name=$this->input->post('task_name');
		
		$this->m_project->simpan_planning_scope_wbs_detail($id_wbs,$task_name);
		redirect('ProjectCharter/view_planning_scope_wbs_detail/'.$id_wbs.'/'.$id_project);

	}

	function edit_planning_scope_wbs_detail(){
		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj_edit');
		$id_wbs=$this->input->post('id_wbs');
		$task_name=$this->input->post('task_name_edit');
		
		$this->m_project->edit_planning_scope_wbs_detail($id,$id_wbs,$task_name);
		redirect('ProjectCharter/view_planning_scope_wbs_detail/'.$id_wbs.'/'.$id_project);

	}
	function hapus_planning_scope_wbs_detail($id=0,$id_wbs=0,$id_project=0){
		$this->m_project->hapus_planning_scope_wbs_detail($id);
		redirect('ProjectCharter/view_planning_scope_wbs_detail/'.$id_wbs.'/'.$id_project);

	}

	public function view_collect_requirement($vid)
	{
		$x['planning_scope_requirement_data']=$this->m_project->show_plan_scope_req_detail($vid);
		$count=$this->m_project->show_plan_scope_req_detail($vid);
		$x['req_count']=$count->num_rows();
		$x['planning_scope_scope_data']=$this->m_project->show_plan_scope_sco_detail($vid);
		$x['id_proj'] = $vid;
		$this->load->view('planning_collect_requirement', $x);
	}

	function simpan_collect_requirement($id_project){
		$count = $this->input->post('req_count');
		$now = 0;
		while ($now <= $count) {
			$scope=$this->input->post('scope'.$now);
			$status=$this->input->post('status'.$now);
			$id=$this->input->post('id_req'.$now);
		
		$this->m_project->edit_collect_requirement($id,$status,$scope);
			$now+=1;
		}
		redirect('ProjectCharter/view_collect_requirement/'.$id_project);
	}

	function view_activity_wbs($id_parent,$vid)
	{
		$x['activity_wbs_data']=$this->m_project->show_activity_wbs_byparent($vid,$id_parent);
		$x['id_proj'] = $vid;
		$x['id_parent'] = $id_parent;
		$count=$this->m_project->show_activity_wbs_byparent($vid,$id_parent);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_wbs', $x);
	}
	function simpan_activity_wbs(){
		$id_project=$this->input->post('id_proj');
		$id_parent=$this->input->post('id_parent');
		$sequence=$this->input->post('sequence');
		$activity=$this->input->post('activity');
		$description=$this->input->post('description');
		$responsibility=$this->input->post('responsibility');
		
		$this->m_project->simpan_activity_wbs($sequence, $activity, $description, $responsibility,$id_project,$id_parent);
		redirect('ProjectCharter/view_activity_wbs/'.$id_parent.'/'.$id_project);

	}
	function edit_activity_wbs($id_project){
		$count = $this->input->post('req_count');
		$id_parent=$this->input->post('id_parent');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$sequence=$this->input->post('sequence'.$now);
			$activity=$this->input->post('name'.$now);
			$description=$this->input->post('description'.$now);
			$responsibility=$this->input->post('responsibility'.$now);
			
		
		$this->m_project->edit_activity_wbs($id, $sequence, $activity, $description, $responsibility);
			$now+=1;
		}
		redirect('ProjectCharter/view_activity_wbs/'.$id_parent."/".$id_project);
	}
	function hapus_activity_wbs($id=0,$id_project=0,$id_parent=0){
		$this->m_project->hapus_activity_wbs($id);
		redirect('ProjectCharter/view_activity_wbs/'.$id_parent.'/'.$id_project);

	}

	function view_activity_holiday($vid)
	{
		$x['activity_holiday_data']=$this->m_project->show_activity_holiday($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_holiday($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_holiday', $x);
	}
	function simpan_activity_holiday(){
		$id_project=$this->input->post('id_proj');
		$start_date=$this->input->post('start_date');
		$end_date=$this->input->post('end_date');
		$description=$this->input->post('description');
		
		$this->m_project->simpan_activity_holiday($start_date, $end_date, $description, $id_project);
		redirect('ProjectCharter/view_activity_holiday/'.$id_project);

	}
	function edit_activity_holiday($id_project){
		$count = $this->input->post('req_count');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$start_date=$this->input->post('start_date'.$now);
			$end_date=$this->input->post('end_date'.$now);
			$description=$this->input->post('description'.$now);
		
		$this->m_project->edit_activity_holiday($id, $start_date, $end_date, $description);
			$now+=1;
		}
		redirect('ProjectCharter/view_activity_holiday/'.$id_project);
	}
	function hapus_activity_holiday($id=0,$id_project=0){
		$this->m_project->hapus_activity_holiday($id);
		redirect('ProjectCharter/view_activity_holiday/'.$id_project);

	}
	
	function view_activity_resource($vid)
	{
		$x['activity_resource_data']=$this->m_project->show_activity_resource($vid);
		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail($vid);
		$x['activity_wbs_data']=$this->m_project->show_activity_wbs($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_resource($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_resource', $x);
	}

	
	function simpan_activity_resource(){
		$id_project=$this->input->post('id_proj');
		$id_activity=$this->input->post('id_activity');
		$id_resource=$this->input->post('id_position');
		$description=$this->input->post('description');
		$predecessor_id=$this->input->post('predecessor_id');
		$successor_id=$this->input->post('successor_id');
		$location=$this->input->post('location');

		$start_date=$this->m_project->get_project_start_date($id_project);
		$end_date=$this->m_project->get_project_start_date($id_project);
		
		$this->m_project->simpan_activity_resource($id_activity, $id_resource, $description, $predecessor_id, $successor_id, $location, $start_date, $end_date, $id_project);
		redirect('ProjectCharter/view_activity_resource/'.$id_project);

	}
	function edit_activity_resource($id_project){
		$count = $this->input->post('req_count');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$id_activity=$this->input->post('id_activity'.$now);
			$id_resource=$this->input->post('id_resource'.$now);
			$description=$this->input->post('description'.$now);
			$predecessor_id=$this->input->post('predecessor_id'.$now);
			$successor_id=$this->input->post('successor_id'.$now);
			$location=$this->input->post('location'.$now);
			echo $location;
		
		$this->m_project->edit_activity_resource($id, $id_activity, $id_resource, $description, $predecessor_id, $successor_id, $location);
			$now+=1;
		}
		redirect('ProjectCharter/view_activity_resource/'.$id_project);
	}
	function hapus_activity_resource($id=0,$id_project=0){
		$this->m_project->hapus_activity_resource($id);
		redirect('ProjectCharter/view_activity_resource/'.$id_project);

	}
	function view_activity_resource2($vid)
	{
		$x['activity_resource_data']=$this->m_project->show_activity_resource($vid);
		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail($vid);
		$x['activity_wbs_data']=$this->m_project->show_activity_wbs($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_resource($vid);
		$x['req_count'] = $count->num_rows();
		
		$this->load->view('activity_resource2', $x);
	}

	function edit_activity_resource2($id_project){
		$count = $this->input->post('req_count');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$optimistic=$this->input->post('optimistic'.$now);
			$most_likely=$this->input->post('most_likely'.$now);
			$pessimistic=$this->input->post('pessimistic'.$now);
			$estimated=$this->input->post('estimated'.$now);
			$start_date=$this->input->post('start_date'.$now);
			$end_date=$this->input->post('end_date'.$now);
			$estimated_workhours=$this->input->post('estimated_workhours'.$now);
			
		
		$this->m_project->edit_activity_resource2($id, $optimistic, $most_likely, $pessimistic, $estimated, $start_date, $end_date,$estimated_workhours);
			$now+=1;
		}
		redirect('ProjectCharter/view_activity_resource2/'.$id_project);
	}

	function view_activity_budget($vid)
	{
		$x['activity_budget_data']=$this->m_project->show_activity_budget($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_budget($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_budget', $x);
	}
	function simpan_activity_budget(){
		$id_project=$this->input->post('id_proj');
		$cost=$this->input->post('cost');
		$name=$this->input->post('name');
		$amount=$this->input->post('amount');
		$description=$this->input->post('description');
		$unit=$this->input->post('unit');

		
		$this->m_project->simpan_activity_budget($cost,$name,$amount,$description,$unit, $id_project);
		redirect('ProjectCharter/view_activity_budget/'.$id_project);

	}
	function edit_activity_budget($id_project){
		$count = $this->input->post('req_count');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$cost=$this->input->post('cost'.$now);
			$name=$this->input->post('name'.$now);
			$amount=$this->input->post('amount'.$now);
			$description=$this->input->post('description'.$now);
			$unit=$this->input->post('unit'.$now);
		
		$this->m_project->edit_activity_budget($id,$cost,$name,$amount,$description,$unit, $id_project);
			$now+=1;
		}
		redirect('ProjectCharter/view_activity_budget/'.$id_project);
	}
	function hapus_activity_budget($id=0,$id_project=0){
		$this->m_project->hapus_activity_budget($id);
		redirect('ProjectCharter/view_activity_budget/'.$id_project);

	}

	function calendar($vid){
		$x['id_proj'] = $vid;

		$this->load->view('calendar',$x);
	}
	Public function getEvents($id=0)
	{
		
     $events = $this->m_project->getEvents($id);

     $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
             "end" => $r->end,
             "start" => $r->start,
             "title" => "--".$r->title,
             "color" => $r->color,
             "description" => $r->title,
             "allDay" => "false"
         );
     }

     echo json_encode(array("events" => $data_events));
     exit();
	}

	function view_activity_risk($vid)
	{
		$x['activity_risk_data']=$this->m_project->show_activity_risk($vid);
		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_risk($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_risk', $x);
	}
	function simpan_activity_risk(){
		$id_project=$this->input->post('id_proj');
		$description=$this->input->post('description');
		$category=$this->input->post('category');
		$trigger_event=$this->input->post('trigger_event');
		$backup=$this->input->post('backup');
		$owner=$this->input->post('owner');
		$date_entered=$this->input->post('date_entered');
		$review=$this->input->post('review');
		$end_date=$this->input->post('end_date');
		$status=$this->input->post('status');
		
		$this->m_project->simpan_activity_risk($description,$category,$trigger_event,$backup,$owner,$date_entered, $review,$end_date, $status, $id_project);
		redirect('ProjectCharter/view_activity_risk/'.$id_project);

	}
	function edit_activity_risk($id_project){
		$count = $this->input->post('req_count');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$description=$this->input->post('description'.$now);
			$category=$this->input->post('category'.$now);
			$trigger_event=$this->input->post('trigger_event'.$now);
			$backup=$this->input->post('backup'.$now);
			$owner=$this->input->post('owner'.$now);
			$date_entered=$this->input->post('date_entered'.$now);
			$review=$this->input->post('review'.$now);
			$end_date=$this->input->post('end_date'.$now);
			$status=$this->input->post('status'.$now);
		
		$this->m_project->edit_activity_risk($id,$description,$category,$trigger_event,$backup,$owner,$date_entered, $review,$end_date, $status);
			$now+=1;
		}
		redirect('ProjectCharter/view_activity_risk/'.$id_project);
	}
	function hapus_activity_risk($id=0,$id_project=0){
		$this->m_project->hapus_activity_risk($id);
		redirect('ProjectCharter/view_activity_risk/'.$id_project);

	}

	function view_activity_stake_holder_plan($vid)
	{
		$x['activity_stake_holder_data']=$this->m_project->show_activity_stake_holder($vid);
		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_stake_holder($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_stake_holder_plan', $x);
	}
	function view_activity_stake_holder($vid)
	{
		$x['activity_stake_holder_data']=$this->m_project->show_activity_stake_holder($vid);
		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_stake_holder($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_stake_holder', $x);
	}
	function simpan_activity_stake_holder(){
		$id_project=$this->input->post('id_proj');
		
		$role=$this->input->post('role');
		if ($role=="internal") {
			$resource_id=$this->input->post('stake_holder_internal');
			$resource_name=$this->m_project->get_resource_name_by_id($resource_id);
		}else{
			$resource_id=0;
			$resource_name=$this->input->post('stake_holder_external');
		}

		$impact=$this->input->post('impact');
		$needs=$this->input->post('needs');
		$responsibility=$this->input->post('responsibility');
		
		$this->m_project->simpan_activity_stake_holder($resource_id,$resource_name,$role,$impact,$needs,$responsibility, $id_project);
		redirect('ProjectCharter/view_activity_stake_holder_plan/'.$id_project);

	}
	function edit_activity_stake_holder(){

		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj');
		
		$role=$this->input->post('role');
		if ($role=="internal") {
			$resource_id=$this->input->post('stake_holder_internal');
			$resource_name=$this->m_project->get_resource_name_by_id($resource_id);
		}else{
			$resource_id=0;
			$resource_name=$this->input->post('stake_holder_external');
		}

		$impact=$this->input->post('impact');
		$needs=$this->input->post('needs');
		$responsibility=$this->input->post('responsibility');
		
		$this->m_project->edit_activity_stake_holder($id,$resource_id,$resource_name,$role,$impact,$needs,$responsibility);

		redirect('ProjectCharter/view_activity_stake_holder/'.$id_project);
	}
	function edit_activity_stake_holder_plan(){

		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj');
		
		$role=$this->input->post('role');
		if ($role=="internal") {
			$resource_id=$this->input->post('stake_holder_internal');
			$resource_name=$this->m_project->get_resource_name_by_id($resource_id);
		}else{
			$resource_id=0;
			$resource_name=$this->input->post('stake_holder_external');
		}

		$impact=$this->input->post('impact');
		$needs=$this->input->post('needs');
		$responsibility=$this->input->post('responsibility');
		
		$this->m_project->edit_activity_stake_holder($id,$resource_id,$resource_name,$role,$impact,$needs,$responsibility);

		redirect('ProjectCharter/view_activity_stake_holder/'.$id_project);
	}
	function hapus_activity_stake_holder($id=0,$id_project=0){
		$this->m_project->hapus_activity_stake_holder($id);
		redirect('ProjectCharter/view_activity_stake_holder/'.$id_project);

	}

	function view_activity_issue_log($vid)
	{
		$x['activity_issue_log_data']=$this->m_project->show_activity_issue_log($vid);
		$x['activity_stake_holder_data']=$this->m_project->show_activity_stake_holder($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_issue_log($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_issue_log', $x);
	}
	function view_activity_issue_log_planning($vid)
	{
		$x['activity_issue_log_data']=$this->m_project->show_activity_issue_log($vid);
		$x['activity_stake_holder_data']=$this->m_project->show_activity_stake_holder($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_issue_log($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_issue_log_plan', $x);
	}

	function simpan_activity_issue_log(){
		$id_project=$this->input->post('id_proj');
		
		$description=$this->input->post('description');
		$date=$this->input->post('date');
		$date=date('Y-m-d', strtotime($date));


		$max = $this->m_project->get_max_issue_log($id_project);
		$col_name="issue_".$id_project."_".$max."_".rand().".docx";

		$this->m_project->simpan_activity_issue_log($description,$date,$col_name,$id_project);
		redirect('ProjectCharter/view_activity_issue_log_planning/'.$id_project);

		

	}

	function edit_activity_issue_log_plan(){

		$id=$this->input->post('id');
		$description=$this->input->post('description');
		$id_project=$this->input->post('id_proj');
		$date=$this->input->post('date');
		$date=date('Y-m-d', strtotime($date));


		$this->m_project->edit_activity_issue_log_plan($id,$description,$date,$col_name);
		redirect('ProjectCharter/view_activity_issue_log_planning/'.$id_project);

	}
	function edit_activity_issue_log(){

		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj');
		$hdeditfileid=$this->input->post('hdeditfileid');
		$description=$this->input->post('description');
		$impact=$this->input->post('impact');
		$action=$this->input->post('action');
		$importance=$this->input->post('importance');
		$hdfilename=$this->input->post('edit_file_name');
		$date=$this->input->post('date');
		$date=date('Y-m-d', strtotime($date));



		$file_initiating=$this->input->post($hdeditfileid);

	        $config['upload_path']          = './files/';
	        $config['allowed_types']        = 'doc|docx';
	        $config['max_size']             = 8000000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;
			$config['overwrite'] 			= TRUE;
	        $config['file_name']            = $hdfilename;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload($hdeditfileid))
	        {
		     $this->m_project->edit_activity_issue_log($id,$description,$impact,$action,$importance,$date);
			redirect('ProjectCharter/view_activity_issue_log/'.$id_project);
	        }
	        else
	        {
	         $data = array('upload_data' => $this->upload->data());
	        
	        }

		$this->m_project->edit_activity_issue_log($id,$description,$impact,$action,$importance,$date);
		redirect('ProjectCharter/view_activity_issue_log/'.$id_project);

	}
	function hapus_activity_issue_log($id=0,$id_project=0){
		$this->m_project->hapus_activity_issue_log($id);
		redirect('ProjectCharter/view_activity_issue_log/'.$id_project);

	}

	function view_activity_stake_holder_owner($id,$vid)
	{
		$x['activity_stake_holder_owner_data']=$this->m_project->show_activity_stake_holder_owner($id);
		$x['activity_stake_holder_data']=$this->m_project->show_activity_stake_holder($vid);
		$x['id_proj'] = $vid;
		$x['issue_id'] = $id;
		$count=$this->m_project->show_activity_stake_holder_owner($id);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_stake_holder_owner', $x);
	}
	function simpan_activity_stake_holder_owner(){
		$id_project=$this->input->post('id_proj');
		$stake_holder_id=$this->input->post('stake_holder_id');
		$id_issue=$this->input->post('issue_id');
		
		$this->m_project->simpan_activity_stake_holder_owner($stake_holder_id,$id_issue);
		redirect('ProjectCharter/view_activity_stake_holder_owner/'.$id_issue.'/'.$id_project);

	}
	function edit_activity_stake_holder_owner($id_project){
		$count = $this->input->post('req_count');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$stake_holder_id=$this->input->post('stake_holder_id'.$now);
			$id_issue=$this->input->post('id_issue'.$now);
		
		$this->m_project->edit_activity_stake_holder_owner($id,$stake_holder_id);
			$now+=1;
		}
		redirect('ProjectCharter/view_activity_stake_holder_owner/'.$id_issue.'/'.$id_project);
	}
	function hapus_activity_stake_holder_owner($id=0,$id_project=0,$id_issue=0){
		$this->m_project->hapus_activity_stake_holder_owner($id);
		redirect('ProjectCharter/view_activity_stake_holder_owner/'.$id_issue.'/'.$id_project);

	}

	function calendar_issue($vid){
		$x['id_proj'] = $vid;
		$x['activity_issue_log_data']=$this->m_project->show_activity_issue_log($vid);
		$x['activity_stake_holder_data']=$this->m_project->show_activity_stake_holder($vid);

		$this->load->view('calendar_issue',$x);
	}

	Public function getEvents_issue($id=0)
	{
		
     $events = $this->m_project->getEvents_issue($id);

     $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
             "end" => $r->end,
             "start" => $r->start,
             "title" => "=> ".$r->title,
             "color" => $r->color,
             "description" => $r->description,
             "modalid" => $r->id,
             "allDay" => "false"
         );
     }

     echo json_encode(array("events" => $data_events));
     exit();
	}

	public function project_staffing($id)
	{
		$x['project_staffing_estimates_data'] = $this->m_project->show_project_staffing_estimates($id);
		$x['id_project'] = $id;
		$this->load->view('project_staffing',$x);
	}

public function histogram($id)
	{
	
     $x['graphHistogram'] = "[";
     $count = 0;
	 $resources = $this->m_project->show_activity_resource_histogram($id);
	 foreach ($resources->result_array() as $is => $i) {
	 	
	 $events = $this->m_project->show_histogram2($id,$i['id_bulan']);
     $data_events = array();
     if ($count>0) {
     	$x['graphHistogram'] .= ",";
     }
     foreach($events->result() as $rs => $r) {
     
         $data_events[] = array(
             "label" => $r->label,
             "y" => $r->y
         );
     }


		//print_r(json_encode($data_events, JSON_NUMERIC_CHECK));	
		  	$count += 1;

     $x['graphHistogram'] .= "{
		    type: 'column',
		    name: '".$r->bulan."',
		    indexLabel: '{y}',
		    yValueFormatString: '#0.##',
		    showInLegend: true,
		    dataPoints: ".json_encode($data_events, JSON_NUMERIC_CHECK)."
		  	}";
     //print_r("<br>".$i['id_resource']);
	 }

     	$x['graphHistogram'] .= "]";
     	$x['histogram_data'] = $data_events;
		$x['id_project'] = $id;
				
		//print_r($x['graphHistogram']);	
		$this->load->view('histogram',$x);
	}



//MODEL
	function view_activity_raci($vid)
	{
		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail_with_left_count($vid);
		$x['id_proj'] = $vid;
		$this->load->view('activity_raci', $x);
	}

	function view_raci_scores($vid,$id_resource)
	{
		$x['activity_wbs_data']=$this->m_project->show_activity_wbs_available($vid,$id_resource);
		$x['raci_data']=$this->m_project->show_raci($vid,$id_resource);
		$x['id_proj'] = $vid;
		$x['id_resource'] = $id_resource;
		$count=$this->m_project->show_activity_resource($vid);
		$x['resource_data']=$this->m_project->show_resource_by_id($id_resource);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_raci_scores', $x);
	}

	function simpan_raci_scores(){
		$id_project=$this->input->post('id_proj');
		$id_resource=$this->input->post('id_resource');
		$id_wbs=$this->input->post('id_wbs');
		$score=$this->input->post('score');
		
		$this->m_project->simpan_raci_scores($id_resource,$id_wbs,$score,$id_project);
		redirect('ProjectCharter/view_raci_scores/'.$id_project.'/'.$id_resource);

	}
	function edit_raci_scores($id_project,$id_resource){
		$count = $this->input->post('req_count');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$score=$this->input->post('score'.$now); 
		
		$this->m_project->edit_raci_scores($id,$score);
			$now+=1;
		}
		redirect('ProjectCharter/view_raci_scores/'.$id_project.'/'.$id_resource);
	}

	function view_qcontrol($vid)
	{

		$x['activity_quality_data']=$this->m_project->show_quality($vid);
		//blackbox
		$x['blackbox_data']=$this->m_project->show_blackbox($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_blackbox($vid);
		$x['req_count_bb'] = $count->num_rows();

		//whitebox
		$x['whitebox_data']=$this->m_project->show_whitebox($vid);
		$count=$this->m_project->show_whitebox($vid);
		$x['req_count_wb'] = $count->num_rows();

		//uat
		$x['uat_data']=$this->m_project->show_uat($vid);
		$count=$this->m_project->show_uat($vid);
		$x['req_count_uat'] = $count->num_rows();

		$this->load->view('qcontrol', $x);
	}
	function simpan_blackbox(){
		$id_project=$this->input->post('id_proj');
		$title=$this->input->post('title');
		$input=$this->input->post('input');
		$expected=$this->input->post('expected');
		$result=$this->input->post('result');

		$this->m_project->simpan_blackbox($title,$input,$expected,$result, $id_project);
		redirect('ProjectCharter/view_qcontrol/'.$id_project);

	}
	function edit_blackbox($id_project){
		$count = $this->input->post('req_count_bb');
		$now = 0;

		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$title=$this->input->post('title'.$now);
			$input=$this->input->post('input'.$now);
			$expected=$this->input->post('expected'.$now);
			$result=$this->input->post('result'.$now);
		echo $id;
		$this->m_project->edit_blackbox($id,$title,$input,$expected,$result, $id_project);
			$now+=1;
		}
		redirect('ProjectCharter/view_qcontrol/'.$id_project);
	}
	function hapus_blackbox($id=0,$id_project=0){
		$this->m_project->hapus_blackbox($id);
		redirect('ProjectCharter/view_qcontrol/'.$id_project);

	}

	function simpan_whitebox(){
		$id_project=$this->input->post('id_proj');
		$title=$this->input->post('title');
		$output=$this->input->post('output');
		$expected=$this->input->post('expected');
		$result=$this->input->post('result');

		
		$this->m_project->simpan_whitebox($title,$output,$expected,$result, $id_project);
		redirect('ProjectCharter/view_qcontrol/'.$id_project);

	}
	function edit_whitebox($id_project){
		$count = $this->input->post('req_count_wb');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$title=$this->input->post('title'.$now);
			$output=$this->input->post('output'.$now);
			$expected=$this->input->post('expected'.$now);
			$result=$this->input->post('result'.$now);
		
		$this->m_project->edit_whitebox($id,$title,$output,$expected,$result, $id_project);
			$now+=1;
		}
		redirect('ProjectCharter/view_qcontrol/'.$id_project);
	}
	function hapus_whitebox($id=0,$id_project=0){
		$this->m_project->hapus_whitebox($id);
		redirect('ProjectCharter/view_qcontrol/'.$id_project);

	}

	function simpan_uat(){
		$id_project=$this->input->post('id_proj');
		$title=$this->input->post('title');
		$well=$this->input->post('well');
		$enough=$this->input->post('enough');
		$notgood=$this->input->post('notgood');

		
		$this->m_project->simpan_uat($title,$well,$enough,$notgood, $id_project);
		redirect('ProjectCharter/view_qcontrol/'.$id_project);

	}
	function edit_uat($id_project){
		$count = $this->input->post('req_count_uat');
		$now = 0;
		while ($now <= $count) {
			$id=$this->input->post('id'.$now);
			$title=$this->input->post('title'.$now);
			$well=$this->input->post('well'.$now);
			$enough=$this->input->post('enough'.$now);
			$notgood=$this->input->post('notgood'.$now);
		
		$this->m_project->edit_uat($id,$title,$well,$enough,$notgood, $id_project);
			$now+=1;
		}
		redirect('ProjectCharter/view_qcontrol/'.$id_project);
	}
	function hapus_uat($id=0,$id_project=0){
		$this->m_project->hapus_uat($id);
		redirect('ProjectCharter/view_qcontrol/'.$id_project);

	}

	function calendar_risk($vid){
		$x['id_proj'] = $vid;
		$x['activity_risk_data']=$this->m_project->show_risk_calendar($vid);

		$x['planning_scope_resource_data']=$this->m_project->show_plan_scope_res_detail($vid);
		$this->load->view('calendar_risk',$x);
	}

	Public function getEvents_risk($id=0)
	{
		
     $events = $this->m_project->show_risk_calendar($id);

     $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
             "end" => $r->end_date,
             "start" => $r->date_entered,
             "title" => "=> ".$r->description,
             "color" => $r->color,
             "description" => $r->backup,             
             "modalid" => $r->id,
             "allDay" => "false"
         );

     }
     echo json_encode(array("events" => $data_events));
     exit();
	}

	function edit_activity_risk_calendar($id_project){

			$id=$this->input->post('id');
			$id_project=$this->input->post('id_proj');
			$description=$this->input->post('description');
			$category=$this->input->post('category');
			$trigger_event=$this->input->post('trigger_event');
			$backup=$this->input->post('backup');
			$owner=$this->input->post('owner');
			$date_entered=$this->input->post('date_entered');
			$review=$this->input->post('review');
			$end_date=$this->input->post('end_date');
			$status=$this->input->post('status');
		
		$this->m_project->edit_activity_risk($id,$description,$category,$trigger_event,$backup,$owner,$date_entered, $review,$end_date, $status);
		
		redirect('ProjectCharter/calendar_risk/'.$id_project);
	}
	//vendor
	function view_activity_vendor($vid)
	{
		$x['activity_vendor_data']=$this->m_project->show_activity_vendor($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_vendor($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_vendor', $x);
	}
	function view_activity_vendor_planning($vid)
	{
		$x['activity_vendor_data']=$this->m_project->show_activity_vendor($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_vendor($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_vendor_plan', $x);
	}

	function simpan_activity_vendor(){
		$id_project=$this->input->post('id_proj');
		
		$description=$this->input->post('description');
		$name=$this->input->post('name');


		$max = $this->m_project->get_max_vendor($id_project);
		$col_name="vendor".$id_project."_".$max."_".rand().".docx";

		$this->m_project->simpan_activity_vendor($name,$description,$col_name,$id_project);
		redirect('ProjectCharter/view_activity_vendor_planning/'.$id_project);

		

	}

	function edit_activity_vendor_plan(){

		$id=$this->input->post('id');
		$description=$this->input->post('description');
		$id_project=$this->input->post('id_proj');
		$date=$this->input->post('date');
		$date=date('Y-m-d', strtotime($date));


		$this->m_project->edit_activity_vendor_plan($id,$description,$date,$col_name);
		redirect('ProjectCharter/view_activity_vendor_planning/'.$id_project);

	}
	function edit_activity_vendor(){

		$id=$this->input->post('id');
		$id_project=$this->input->post('id_proj');
		$hdeditfileid=$this->input->post('hdeditfileid');
		$description=$this->input->post('description');
		$name=$this->input->post('name');
		$hdfilename=$this->input->post('edit_file_name');
		$date=$this->input->post('date');
		$date=date('Y-m-d', strtotime($date));
		$product_quality=$this->input->post('product_quality');
		$cost=$this->input->post('cost');
		$time=$this->input->post('time');
		$cost_unit=$this->input->post('cost_unit');
		$efficiency=$this->input->post('efficiency');
		$ontime_delivery=$this->input->post('ontime_delivery');
		$status='Ongoing';


		$file_initiating=$this->input->post($hdeditfileid);

	        $config['upload_path']          = './files/';
	        $config['allowed_types']        = 'doc|docx';
	        $config['max_size']             = 8000000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;
			$config['overwrite'] 			= TRUE;
	        $config['file_name']            = $hdfilename;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload($hdeditfileid))
	        {

	     $error = array('error' => $this->upload->display_errors());
	     print_r($error) ;
		     $this->m_project->edit_activity_vendor($id,$name,$description,$product_quality,$ontime_delivery,'',$cost,$time,$cost_unit,$efficiency,$date,$status,$id_project);
			redirect('ProjectCharter/view_activity_vendor/'.$id_project);
	        }
	        else
	        {
	         $data = array('upload_data' => $this->upload->data());
	      		  
	        }

		$this->m_project->edit_activity_vendor($id,$name,$description,$product_quality,$ontime_delivery,$document,$cost,$time,$cost_unit,$efficiency,$order_date,$status,$id_project);
		redirect('ProjectCharter/view_activity_vendor/'.$id_project);

	}
	function hapus_activity_vendor($id=0,$id_project=0){
		$this->m_project->hapus_activity_vendor($id);
		redirect('ProjectCharter/view_activity_vendor/'.$id_project);

	}
	function close_activity_vendor($id=0,$id_project=0){
		$this->m_project->close_activity_vendor($id);
		redirect('ProjectCharter/view_activity_vendor_status/'.$id_project);

	}
	function view_activity_vendor_status($vid)
	{
		$x['activity_vendor_data']=$this->m_project->show_activity_vendor($vid);
		$x['id_proj'] = $vid;
		$count=$this->m_project->show_activity_vendor($vid);
		$x['req_count'] = $count->num_rows();
		$this->load->view('activity_vendor_status', $x);
	}
	//quality
	function edit_quality($id_project){
		
		$cbbb=$this->input->post('cbbb');
		$cbwb=$this->input->post('cbwb');
		$cbuat=$this->input->post('cbuat');
		if ($cbbb=="") {
			$cbbb="0";
		}
		if ($cbwb=="") {
			$cbwb=0;
		}
		if ($cbuat=="") {
			$cbuat=0;
		}

		$this->m_project->edit_quality($id_project,$cbbb,$cbwb,$cbuat);
		redirect('ProjectCharter/view_project/'.$id_project);

	}


	function calendar_vendor($vid){
		$x['id_proj'] = $vid;
		$x['activity_vendor_data']=$this->m_project->show_activity_vendor($vid);

		$this->load->view('calendar_vendor',$x);
	}

	Public function getEvents_vendor($id=0)
	{
		
     $events = $this->m_project->getEvents_vendor($id);

     $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
             "end" => $r->end,
             "start" => $r->start,
             "title" => "=> ".$r->title,
             "color" => "green",
             "description" => $r->description,
             "cost" => $r->cost,
             "quality" => $r->quality,
             "allDay" => "false"
         );
     }

     echo json_encode(array("events" => $data_events));
     exit();
	}

}