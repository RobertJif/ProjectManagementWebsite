<?php
class M_project extends CI_Model{

    public function prosesLogin($username,$password){
	    $this->db->where('username',$username);
	    $this->db->where('password',$password);
	    return $this->db->get('user')->row();

    }

	function show_project(){
		$hasil=$this->db->query("SELECT a.*, (select sum(b.end_date-b.start_date+1) from activity_holiday b where b.id_project=a.id) holidayduration FROM project_charter a");
		return $hasil;
	}

	
	function show_project_detail($id){
		$hasil=$this->db->query("SELECT * FROM project_charter where id='$id'");
		return $hasil;
	}
	function get_project_start_date($id){
		$hasil=$this->db->query("SELECT * FROM project_charter where id='$id'");
		$this->db->select('start_date');
		$this->db->from('project_charter');
		$this->db->where('id',$id);
		$reault_array = $this->db->get()->result_array();
		return $reault_array[0]['start_date'];
	}

	function simpan_project($project_name,$project_desc,$start_date,$end_date,$duration,$budget,$project_manager){
		$hasil=$this->db->query("INSERT INTO project_charter VALUES ('$id','$project_name','$project_desc','$start_date', '$end_date', '$duration', '$budget', '$project_manager', 'Ongoing')");
		return $hasil;
	}

	function edit_project($id,$project_name,$project_desc,$start_date,$end_date,$duration,$budget,$project_manager){
		$hasil=$this->db->query("UPDATE project_charter SET project_name='$project_name',project_desc='$project_desc',start_date='$start_date',end_date='$end_date',duration='$duration',budget='$budget',project_manager='$project_manager' WHERE id='$id'");
		return $hasil;
	}
	function close_project($id){
		$hasil=$this->db->query("UPDATE project_charter SET status='Close' WHERE id='$id'");
		return $hasil;
	}
	function hapus_project($id){
		$hasil=$this->db->query("DELETE FROM project_charter WHERE id=".$id);
		return $hasil;
	}


	function is_initiated($id){
		$hasil=$this->db->query("SELECT * FROM initiating where id='$id'");
		return $hasil->num_rows();
	}
	function start_quality($id){
		$hasil=$this->db->query("INSERT INTO activity_quality(id_project) VALUES ('$id')");
		return $hasil;
	}
	function start_init($id){
		$hasil=$this->db->query("INSERT INTO initiating(id) VALUES ('$id')");
		return $hasil;
	}
	function show_init_detail($id){
		$hasil=$this->db->query("SELECT * FROM initiating where id='$id'");
		return $hasil;
	}
	function edit_init($id, $colname, $filename){
		$hasil=$this->db->query("UPDATE initiating SET $colname='$filename' WHERE id='$id'");
		return $hasil;
	}

	function show_plan_scope_req_detail($id){
		$hasil=$this->db->query("SELECT * FROM planning_scope_requirement where id_project='$id'");
		return $hasil;
	}
	function show_plan_scope_sco_detail($id){
		$hasil=$this->db->query("SELECT * FROM planning_scope_scope where id_project='$id'");
		return $hasil;
	}
	function show_plan_scope_res_detail($id){
		$hasil=$this->db->query("SELECT * FROM planning_scope_resource where id_project='$id'");
		return $hasil;
	}
	function show_plan_scope_res_detail2($id){
		$hasil=$this->db->query("SELECT * FROM planning_scope_resource where id_project='$id' order by id");
		return $hasil;
	}
	function show_plan_scope_wbs_detail($id){
		$hasil=$this->db->query("SELECT * FROM activity_wbs_parent where id_project='$id'");
		return $hasil;
	}

	function simpan_planning_scope_requirement($id_project,$requirement,$business_unit,$role){
		$hasil=$this->db->query("INSERT INTO planning_scope_requirement(requirement,business_unit,role,id_project) VALUES ('$requirement','$business_unit','$role','$id_project')");
		return $hasil;
	}

	function edit_planning_scope_requirement($id,$id_project,$requirement,$business_unit,$role){
		$hasil=$this->db->query("UPDATE planning_scope_requirement SET requirement='$requirement',business_unit='$business_unit',role='$role' WHERE id='$id'");
		return $hasil;
	}
	function hapus_planning_scope_requirement($id){
		$hasil=$this->db->query("DELETE FROM planning_scope_requirement WHERE id=".$id);
		return $hasil;
	}

	function simpan_planning_scope_resource($id_project,$position,$salary,$name){
		$hasil=$this->db->query("INSERT INTO planning_scope_resource VALUES ('','$position','$salary','$name','$id_project')");
		return $hasil;
	}

	function edit_planning_scope_resource($id,$id_project,$position,$salary,$name){
		$hasil=$this->db->query("UPDATE planning_scope_resource SET position='$position',salary='$salary',name='$name' WHERE id='$id'");
		return $hasil;
	}
	function hapus_planning_scope_resource($id){
		$hasil=$this->db->query("DELETE FROM planning_scope_resource WHERE id=".$id);
		return $hasil;
	}

	function simpan_planning_scope_scope($id_project,$description,$deliverable,$name){
		$hasil=$this->db->query("INSERT INTO planning_scope_scope VALUES ('','$name','$description','$deliverable','$id_project')");
		return $hasil;
	}

	function edit_planning_scope_scope($id,$id_project,$description,$deliverable,$name){
		$hasil=$this->db->query("UPDATE planning_scope_scope SET name='$name',description='$description',deliverable='$deliverable' WHERE id='$id'");
		return $hasil;
	}
	function hapus_planning_scope_scope($id){
		$hasil=$this->db->query("DELETE FROM planning_scope_scope WHERE id=".$id);
		return $hasil;
	}

	function simpan_planning_scope_wbs($id_project,$task_name,$description,$sequence){
		$hasil=$this->db->query("INSERT INTO activity_wbs_parent VALUES ('','$task_name','$description','$sequence','$id_project')");
		return $hasil;
	}

	function edit_planning_scope_wbs($id,$id_project,$task_name,$description,$sequence){
		$hasil=$this->db->query("UPDATE activity_wbs_parent SET name='$task_name',description='$description',sequence='$sequence' WHERE id='$id'");
		return $hasil;
	}
	function hapus_planning_scope_wbs($id){
		$hasil=$this->db->query("DELETE FROM activity_wbs_parent WHERE id=".$id);
		return $hasil;
	}

	function show_plan_scope_wbs_details($id){
		$hasil=$this->db->query("SELECT * FROM planning_scope_wbs_detail where id_wbs='$id'");
		return $hasil;
	}
	function simpan_planning_scope_wbs_detail($id_wbs,$task_name){
		$hasil=$this->db->query("INSERT INTO planning_scope_wbs_detail VALUES ('','$task_name','$id_wbs')");
		return $hasil;
	}

	function edit_planning_scope_wbs_detail($id,$id_wbs,$task_name){
		$hasil=$this->db->query("UPDATE planning_scope_wbs_detail SET task_name='$task_name' WHERE id='$id'");
		return $hasil;
	}
	function hapus_planning_scope_wbs_detail($id){
		$hasil=$this->db->query("DELETE FROM planning_scope_wbs_detail WHERE id=".$id);
		return $hasil;
	}
	function edit_collect_requirement($id,$status,$scope){
		$hasil=$this->db->query("UPDATE planning_scope_requirement SET status='$status',id_scope='$scope' WHERE id='$id'");
		return $hasil;
	}
	function show_activity_wbs($id){
		$hasil=$this->db->query("SELECT * FROM activity_wbs where id_project='$id'");
		return $hasil;
	}
	function show_activity_wbs_byparent($id,$id_parent){
		$hasil=$this->db->query("SELECT * FROM activity_wbs where id_project='$id' and id_parent='$id_parent'");
		return $hasil;
	}
	function simpan_activity_wbs($sequence, $activity, $description, $responsibility,$id_project,$id_parent){
		$hasil=$this->db->query("INSERT INTO activity_wbs VALUES ('','$activity','$description','$id_parent', '$responsibility','$sequence', '$id_project')");
		return $hasil;
	}
	function edit_activity_wbs($id, $sequence, $activity, $description, $responsibility){
		$hasil=$this->db->query("UPDATE activity_wbs SET responsibility='$responsibility',sequence='$sequence',name='$activity',description='$description' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_wbs($id){
		$hasil=$this->db->query("DELETE FROM activity_wbs WHERE id=".$id);
		return $hasil;
	}
	function show_activity_resource($id){
		$hasil=$this->db->query("SELECT * FROM activity_resource where id_project='$id'");
		return $hasil;
	}
	function simpan_activity_resource($id_activity, $id_resource, $description, $predecessor_id, $successor_id, $location, $start_date, $end_date, $id_project){
		$hasil=$this->db->query("INSERT INTO activity_resource VALUES ('', '$id_activity', '$id_resource', '$description','$predecessor_id','$successor_id','$location','','','','','$start_date','$end_date',0, '$id_project')");
		return $hasil;
	}
	function edit_activity_resource($id, $id_activity, $id_resource, $description, $predecessor_id, $successor_id, $location){
		$hasil=$this->db->query("UPDATE activity_resource SET id_activity='$id_activity',id_resource='$id_resource',description='$description',predecessor_id='$predecessor_id',successor_id='$successor_id',location='$location' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_resource($id){
		$hasil=$this->db->query("DELETE FROM activity_resource WHERE id=".$id);
		return $hasil;
	}
	function show_activity_resource2($id){
		$hasil=$this->db->query("SELECT * FROM activity_resource where id_project='$id'");
		return $hasil;
	}
	function simpan_activity_resource2($id_activity, $id_resource, $description, $predecessor_id, $successor_id, $location, $optimistic, $most_likely, $pessimistic, $estimated, $start_date, $end_date, $id_project){
		$hasil=$this->db->query("INSERT INTO activity_resource VALUES ('', '$id_activity', '$id_resource', '$description',''$predecessor_id','$successor_id','$location','$optimistic','$most_likely','$pessimistic','$estimated','$start_date','$end_date',0, '$id_project')");
		return $hasil;
	}
	function edit_activity_resource2($id, $optimistic, $most_likely, $pessimistic, $estimated, $start_date, $end_date, $estimated_workhours){
		$hasil=$this->db->query("UPDATE activity_resource SET optimistic='$optimistic',most_likely='$most_likely',estimated='$estimated',pessimistic='$pessimistic',start_date='$start_date',end_date='$end_date' ,estimated_workhours='$estimated_workhours' WHERE id='$id'");
		return $hasil;
	}
	function show_activity_budget($id){
		$hasil=$this->db->query("SELECT * FROM activity_resource_indirect where id_project='$id'");
		return $hasil;
	}
	function simpan_activity_budget($cost,$name,$amount,$description,$unit, $id_project){
		$hasil=$this->db->query("INSERT INTO activity_resource_indirect VALUES ('', '$cost', '$name', '$id_project','$amount','$description','$unit')");
		return $hasil;
	}
	function edit_activity_budget($id,$cost,$name,$amount,$description,$unit, $id_project){
		$hasil=$this->db->query("UPDATE activity_resource_indirect SET cost='$cost',name='$name',amount='$amount',description='$description',unit='$unit' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_budget($id){
		$hasil=$this->db->query("DELETE FROM activity_resource_indirect WHERE id=".$id);
		return $hasil;
	}


	function show_activity_budget_detail($id){
		$hasil=$this->db->query("SELECT CONCAT(A.name,CONCAT('(',CONCAT(A.position,')'))) as 'name',IFNULL(B.estimated*A.salary,0) as direct_cost,(0) as 'indirect_cost' FROM planning_scope_resource A LEFT JOIN activity_resource B ON A.id=B.id_resource WHERE A.id_project='$id' UNION SELECT name,(0) as 'direct_cost' ,(cost*amount) as 'indirect_cost' FROM activity_resource_indirect WHERE id_project='$id'");
		return $hasil;
	}
	function show_activity_define_sequence($id){
		$hasil=$this->db->query("SELECT a.name 'task_name_ds', (SELECT DISTINCT COUNT(b.id_activity) FROM activity_resource b WHERE b.id_activity=a.id and b.id_project='$id') define_activity, (SELECT COUNT(*) FROM activity_resource b WHERE b.id_activity=a.id and b.id_project='$id') sequence_activity FROM activity_wbs a where a.id_project='$id'");
		return $hasil;
	}
	function show_activity_budget_report($id){
		$hasil=$this->db->query("SELECT c.name 'activity', b.name 'resource', b.salary, (1) 'amount', a.estimated, (a.estimated*b.salary) 'total_cost' FROM activity_resource a LEFT JOIN planning_scope_resource b on a.id_resource=b.id LEFT JOIN activity_wbs c on c.id=a.id_activity where a.id_project='$id'");
		return $hasil;
	}
	Public function getEvents($id)
	{
		
	$hasil=$this->db->query("SELECT (SELECT b.name FROM activity_wbs b where b.id=a.id_activity) 'title', CONVERT(a.start_date, datetime) 'start', CONVERT(a.end_date, datetime) 'end', ('green') 'color' FROM activity_resource a where a.id_project='$id' UNION SELECT c.description, CONVERT(c.date_entered, datetime), CONVERT(c.end_date, datetime), ('red') FROM activity_risk c where c.id_project='$id' ORDER BY start ASC");
		return $hasil;
	}

	function show_activity_risk($id){
		$hasil=$this->db->query("SELECT * FROM activity_risk where id_project='$id'");
		return $hasil;
	}
	function simpan_activity_risk($description,$category,$trigger_event,$backup,$owner,$date_entered, $review,$end_date, $status, $id_project){
		$hasil=$this->db->query("INSERT INTO activity_risk VALUES ('', '$description','$category', '$trigger_event', '$backup','$owner','$date_entered','$review','$end_date','$status','$id_project')");
		return $hasil;
	}
	function edit_activity_risk($id,$description,$category,$trigger_event,$backup,$owner,$date_entered, $review,$end_date, $status){
		$hasil=$this->db->query("UPDATE activity_risk SET description='$description',category='$category',trigger_event='$trigger_event',backup='$backup',owner='$owner',date_entered='$date_entered',review='$review',end_date='$end_date',status='$status' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_risk($id){
		$hasil=$this->db->query("DELETE FROM activity_risk WHERE id=".$id);
		return $hasil;
	}

	function show_activity_stake_holder($id){
		$hasil=$this->db->query("SELECT * FROM planning_stake_holder where id_project='$id'");
		return $hasil;
	}
	function simpan_activity_stake_holder($resource_id,$resource_name,$role,$impact,$needs,$responsibility,$id_project){
		$hasil=$this->db->query("INSERT INTO planning_stake_holder VALUES ('', '$resource_id','$resource_name', '$role', '$impact','$needs','$responsibility','$id_project')");
		return $hasil;
	}
	function edit_activity_stake_holder($id,$resource_id,$resource_name,$role,$impact,$needs,$responsibility){
		$hasil=$this->db->query("UPDATE planning_stake_holder SET resource_id='$resource_id',resource_name='$resource_name',role='$role',impact='$impact',needs='$needs',responsibility='$responsibility' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_stake_holder($id){
		$hasil=$this->db->query("DELETE FROM planning_stake_holder WHERE id=".$id);
		return $hasil;
	}

	function get_resource_name_by_id($id){

		$this->db->select('name');
		$this->db->from('planning_scope_resource');
		$this->db->where('id',$id);
		$reault_array = $this->db->get()->result_array();
		return $reault_array[0]['name'];
	}

	function show_activity_issue_log($id){
		$hasil=$this->db->query("SELECT * FROM planning_communication where id_project='$id'");
		return $hasil;
	}
	function simpan_activity_issue_log($description,$date,$fname ,$id_project){
		$hasil=$this->db->query("INSERT INTO planning_communication VALUES ('', '$description','', '', '', '$date','$fname','$id_project')");
		return $hasil;
	}
	function edit_activity_issue_log_plan($id,$description,$date){
		$hasil=$this->db->query("UPDATE planning_communication SET description='$description',impact='$impact',action='$action',importance='$importance',date_entered='$date' WHERE id='$id'");
		return $hasil;
	}
		function edit_activity_issue_log($id,$description,$impact,$action,$importance,$date){
		$hasil=$this->db->query("UPDATE planning_communication SET description='$description',impact='$impact',action='$action',importance='$importance',date_entered='$date' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_issue_log($id){
		$hasil=$this->db->query("DELETE FROM planning_communication WHERE id=".$id);
		return $hasil;
	}

	function get_max_issue_log($id){

		$this->db->select('IFNULL(MAX(id),0) as `name`');
		$this->db->from('planning_communication');
		$this->db->where('id_project',$id);
		$reault_array = $this->db->get()->result_array();
		return $reault_array[0]['name'];
	}
	function get_max_vendor($id){

		$this->db->select('IFNULL(MAX(id),0) as `name`');
		$this->db->from('activity_vendor');
		$this->db->where('id_project',$id);
		$reault_array = $this->db->get()->result_array();
		return $reault_array[0]['name'];
	}
	function show_activity_stake_holder_owner($id){
		$hasil=$this->db->query("SELECT a.*,b.resource_name 'stake_holder_name' FROM issue_owner a left join planning_stake_holder b on a.stake_holder_id=b.id where id_issue='$id'");
		return $hasil;
	}
	function simpan_activity_stake_holder_owner($stake_holder_id,$id_issue){
		$hasil=$this->db->query("INSERT INTO issue_owner VALUES ('', '$stake_holder_id', '$id_issue')");
		return $hasil;
	}
	function edit_activity_stake_holder_owner($id,$stake_holder_id){
		$hasil=$this->db->query("UPDATE issue_owner SET stake_holder_id='$stake_holder_id' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_stake_holder_owner($id){
		$hasil=$this->db->query("DELETE FROM issue_owner WHERE id=".$id);
		return $hasil;
	}

	Public function getEvents_issue($id)
	{
		
	$hasil=$this->db->query("SELECT a.id, a.date_entered 'end',a.date_entered 'start',a.description 'title',CASE WHEN a.importance='High' THEN 'red' when a.importance='Mid' THEN 'orange' else 'green' end 'color',a.file 'description' from planning_communication a where a.id_project='$id' ORDER BY a.date_entered");
		return $hasil;
	}

	function show_project_staffing_estimates($id){
		$hasil=$this->db->query("SELECT b.name,b.position,COUNT(a.id) activity,SUM(a.estimated) workday from activity_resource a left join planning_scope_resource b on a.id_resource=b.id where a.id_project='$id' group by a.id_resource");
		return $hasil;
	}
	function show_histogram($id,$rsid){
		$hasil=$this->db->query("SELECT b.name 'label',ifnull(SUM(a.estimated*a.estimated_workhours),0) y,monthname(a.start_date) bulan,month(a.start_date) bulanan from activity_resource a left join planning_scope_resource b on a.id_resource=b.id where a.id_project='$id' and a.id_resource='$rsid' group by month(a.start_date)");
		return $hasil;
	}
	function show_histogram2($id,$id_bulan){
		$hasil=$this->db->query("SELECT b.name 'label',ifnull(SUM(a.estimated*a.estimated_workhours),0) y,monthname(a.start_date) bulan from activity_resource a left join planning_scope_resource b on a.id_resource=b.id where a.id_project='$id' and month(a.start_date)='$id_bulan' group by a.id_resource");
		return $hasil;
	}
	function show_activity_resource_histogram($id){
		$hasil=$this->db->query("SELECT DISTINCT month(start_date) id_bulan FROM activity_resource where id_project='$id'");
		return $hasil;
	}
	function show_activity_wbs_available($id,$id_resource){
		$hasil=$this->db->query("SELECT * FROM activity_wbs where id_project='$id' and id not in (SELECT id_wbs FROM raci where id_project='$id' and id_resource='$id_resource')");
		return $hasil;
	}
	function show_raci($id,$id_resource){
		$hasil=$this->db->query("SELECT (select name from activity_wbs b where b.id=a.id_wbs) activity_name,(select name from planning_scope_resource c where c.id=a.id_resource) position_name,a.* FROM raci a where a.id_project='$id' and a.id_resource='$id_resource'");
		return $hasil;
	}
	function show_resource_by_id($id){
		$hasil=$this->db->query("SELECT name,position from planning_scope_resource where id='$id'");
		return $hasil;
	}
	function simpan_raci_scores($id_resource,$id_wbs,$score,$id_project){
		$hasil=$this->db->query("INSERT INTO raci VALUES ('', '$id_resource','$id_wbs', '$score', '$id_project')");
		return $hasil;
	}
	function edit_raci_scores($id,$score){
		$hasil=$this->db->query("UPDATE raci SET score='$score' WHERE id='$id'");
		return $hasil;
	}
	function show_raci_all($id){
		$hasil=$this->db->query("SELECT (select name from activity_wbs b where b.id=a.id_wbs) activity_name,(select name from planning_scope_resource c where c.id=a.id_resource) position_name,a.* FROM raci a where a.id_project='$id'");
		return $hasil;
	}
	function show_plan_scope_res_detail_with_left_count($id){
		$hasil=$this->db->query("SELECT (SELECT count(*) FROM activity_wbs where id_project='$id' and id not in (SELECT id_wbs FROM raci where id_project='$id' and id_resource=a.id)) remaining,a.* FROM planning_scope_resource a where a.id_project='$id' order by remaining desc");
		return $hasil;
	}
	function show_count_raci_all($id){
		$hasil=$this->db->query("SELECT sum((SELECT count(*) FROM activity_wbs where id_project='$id' and id not in (SELECT id_wbs FROM raci where id_project='$id' and id_resource=a.id))) remaining FROM planning_scope_resource a where a.id_project='$id' order by remaining desc");
		return $hasil;
	}


	function show_blackbox($id){
		$hasil=$this->db->query("SELECT * FROM blackbox where id_project='$id'");
		return $hasil;
	}
	function show_uat_result($id){
		$hasil=$this->db->query("SELECT (sum(well)/(SUM(well)+SUM(enough)+SUM(notgood))*100) value,(Case when (sum(well)/(SUM(well)+SUM(enough)+SUM(notgood))*100)>60 then 'Awesome' else 'Bad' end) tag from uat where id_project='$id'");
		return $hasil;
	}
	function show_blackbox_result($id){
		$hasil=$this->db->query("SELECT 'Blackbox' type,SUM((CASE WHEN a.result='Succeed' THEN 1 ELSE 0 END)) succeed,SUM((CASE WHEN a.result='Fail' THEN 1 ELSE 0 END)) fail FROM blackbox a where id_project='$id' union SELECT 'Whitebox' type,SUM((CASE WHEN b.result='Succeed' THEN 1 ELSE 0 END)) succeed,SUM((CASE WHEN b.result='Fail' THEN 1 ELSE 0 END)) fail FROM whitebox b where id_project='$id'");
		return $hasil;
	}
	function simpan_blackbox($title,$input,$expected,$result, $id_project){
		$hasil=$this->db->query("INSERT INTO blackbox VALUES ('', '$title', '$input', '$expected','$result','$id_project')");
		return $hasil;
	}
	function edit_blackbox($id,$title,$input,$expected,$result, $id_project){
		$hasil=$this->db->query("UPDATE blackbox SET title='$title',input='$input',expected='$expected',result='$result'  WHERE id='$id'");
		return $hasil;
	}
	function hapus_blackbox($id){
		$hasil=$this->db->query("DELETE FROM blackbox WHERE id=".$id);
		return $hasil;
	}

	function show_whitebox($id){
		$hasil=$this->db->query("SELECT * FROM whitebox where id_project='$id'");
		return $hasil;
	}
	function simpan_whitebox($title,$output,$expected,$result, $id_project){
		$hasil=$this->db->query("INSERT INTO whitebox VALUES ('', '$title', '$output', '$expected','$result','$id_project')");
		return $hasil;
	}
	function edit_whitebox($id,$title,$output,$expected,$result, $id_project){
		$hasil=$this->db->query("UPDATE whitebox SET title='$title',output='$output',expected='$expected',result='$result'  WHERE id='$id'");
		return $hasil;
	}
	function hapus_whitebox($id){
		$hasil=$this->db->query("DELETE FROM whitebox WHERE id=".$id);
		return $hasil;
	}

	function show_uat($id){
		$hasil=$this->db->query("SELECT * FROM uat where id_project='$id'");
		return $hasil;
	}
	function simpan_uat($title,$well,$enough,$notgood, $id_project){
		$hasil=$this->db->query("INSERT INTO uat VALUES ('', '$title', '$well', '$enough','$notgood','$id_project')");
		return $hasil;
	}
	function edit_uat($id,$title,$well,$enough,$notgood, $id_project){
		$hasil=$this->db->query("UPDATE uat SET title='$title',well='$well',enough='$enough',notgood='$notgood'  WHERE id='$id'");
		return $hasil;
	}
	function hapus_uat($id){
		$hasil=$this->db->query("DELETE FROM uat WHERE id=".$id);
		return $hasil;
	}
	function show_risk_calendar($id){
		$hasil=$this->db->query("SELECT CASE WHEN a.status='Pending' THEN 'RED' ELSE 'GREEN' END 'color',b.end_date,a.description,a.backup,a.date_entered,a.id,a.trigger_event,a.owner,a.status,a.category,a.review FROM activity_risk a LEFT JOIN project_charter b on a.id_project=b.id where id_project='$id'");
		return $hasil;
	}
	//vendor

	function show_activity_vendor($id){
		$hasil=$this->db->query("SELECT * FROM activity_vendor where id_project='$id'");
		return $hasil;
	}
	function simpan_activity_vendor($name,$description,$document,$id_project){
		$hasil=$this->db->query("INSERT INTO activity_vendor(id,name,description,document,id_project) VALUES ('', '$name','$description','$document','$id_project')");
		return $hasil;
	}
	function edit_activity_vendor($id,$name,$description,$product_quality,$ontime_delivery,$document,$cost,$time,$cost_unit,$efficiency,$order_date,$status,$id_project){
		$hasil=$this->db->query("UPDATE activity_vendor SET name='$name',description='$description',product_quality='$product_quality',ontime_delivery='$ontime_delivery',cost='$cost',time='$time',cost_unit='$cost_unit',efficiency='$efficiency',order_date='$order_date' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_vendor($id){
		$hasil=$this->db->query("DELETE FROM activity_vendor WHERE id=".$id);
		return $hasil;
	}
	function close_activity_vendor($id){
		$hasil=$this->db->query("UPDATE activity_vendor SET status='Close' WHERE id='$id'");
		return $hasil;
	}
	function edit_quality($id,$cbbb,$cbwb,$cbuat){
		$hasil=$this->db->query("UPDATE activity_quality SET blackbox='$cbbb',whitebox='$cbwb',uat='$cbuat' WHERE id_project='$id'");
		return $hasil;
	}
	function show_quality($id){
		$hasil=$this->db->query("SELECT * FROM activity_quality where id_project='$id'");
		return $hasil;
	}
	Public function getEvents_vendor($id)
	{
	$hasil=$this->db->query("SELECT name 'title',document 'description',product_quality 'quality',cost,order_date 'start', order_date 'end'  FROM activity_vendor where id_project='$id' ORDER BY order_Date");
		return $hasil;
	}

	function show_activity_holiday($id){
		$hasil=$this->db->query("SELECT * FROM activity_holiday where id_project='$id'");
		return $hasil;
	}
	function simpan_activity_holiday( $start_date, $end_date, $description, $id_project){
		$hasil=$this->db->query("INSERT INTO activity_holiday VALUES ('','$start_date','$end_date', '$description', '$id_project')");
		return $hasil;
	}
	function edit_activity_holiday($id, $start_date, $end_date, $description){
		$hasil=$this->db->query("UPDATE activity_holiday SET description='$description', start_date='$start_date',end_date='$end_date' WHERE id='$id'");
		return $hasil;
	}
	function hapus_activity_holiday($id){
		$hasil=$this->db->query("DELETE FROM activity_holiday WHERE id=".$id);
		return $hasil;
	}
}	