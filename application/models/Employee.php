<?php
/**
*
*/
class Employee extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function GetTotal(){
		$query 	= $this->db->query('SELECT COUNT(*) AS total FROM employees LIMIT 1');
		$res 		= $query->result();
		return $res[0]->total;
	}

	public function Insert($data=array()){
		$this->first_name 	= $data['first_name'];
		$this->last_name 		= $data['last_name'];
		$this->designation 	= $data['designation'];
		$this->email 				= $data['email'];
		return $this->db->insert('employees',$this);
	}

	public function Update($id,$data){
		$this->first_name 	= $data['first_name'];
		$this->last_name 		= $data['last_name'];
		$this->designation 	= $data['designation'];
		$this->email 				= $data['email'];

		$this->db->where('id', $id);
		return $this->db->update('employees', $this);
	}

	public function Attendance($data){
		$this->employee_id 	= $data['id'];
		$this->status 			= $data['status'];
		$this->created 			= date('Y-m-d');
		return $this->db->insert('attendances',$this);
	}

	public function Delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('employees');
	}

	public function GetAll($limit=10,$offset=0){
		$query = $this->db->get('employees',$limit,$offset);
		return $query->result();
	}

	public function GetAllAttandances($limit=10,$offset=0){
		$this->db->select('employee_id,status');
		$conditions = sprintf("created like '%s'",date('Y-m-d').'%');
		$this->db->where($conditions);
		$query = $this->db->get('attendances',$limit,$offset);

		$stored = array();
		$results = $query->result();

		if (count($results)) {
			foreach ($results as $key => $value) {
				$stored[$value->employee_id] = $value->status;
			}
		}
		return $stored;
	}

	public function GetSingleDateGraphdata($date){
		$combine 	= array();
		$total 		= sprintf("SELECT COUNT(*) AS total FROM attendances WHERE created like '%s'",$date.'%');
		$absent 	= sprintf("SELECT COUNT(status) AS absent FROM attendances WHERE created like '%s' AND status='absent'",$date.'%');
		$present 	= sprintf("SELECT COUNT(status) AS present FROM attendances WHERE created like '%s' AND status='present'",$date.'%');

		$total 		= $this->db->query($total)->result('array');
		$absent 	= $this->db->query($absent)->result('array');
		$present 	= $this->db->query($present)->result('array');

		$pPercent = ($present[0]['present']*100)/$total[0]['total'];
		$aPercent = ($absent[0]['absent']*100)/$total[0]['total'];
		$pp = array();
		$aa = array();
		$category = array();

		$pPercent = number_format($pPercent,2);
		$aPercent = number_format($aPercent,2);

		$pp[]  = array('value'=>$pPercent);
		$aa[]   = array('value'=>$aPercent);
		$category[] = array('label'=>$date);

		$datas['category'] 	= $category;
		$datas['absent'] 		= $aa;
		$datas['present'] 	= $pp;

		return $datas;
	}

	public function GetMultipleDateGraphdata($start,$end){
		$combine 	= array();
		$total 		= sprintf("SELECT COUNT(*) AS total, created FROM attendances GROUP BY created HAVING created BETWEEN '%s' AND '%s'",$start,$end);
		$absent 	= sprintf("SELECT COUNT(*) AS absent, created FROM attendances WHERE status='absent' GROUP BY created HAVING created BETWEEN '%s' AND '%s'",$start,$end);
		$present 	= sprintf("SELECT COUNT(*) AS present, created FROM attendances WHERE status='present' GROUP BY created HAVING created BETWEEN '%s' AND '%s'",$start,$end);

		$total 		= $this->db->query($total)->result('array');
		$absent 		= $this->db->query($absent)->result('array');
		$present 		= $this->db->query($present)->result('array');

		$datas = array();
		$category = array();
		$pp = array();
		$aa = array();

		$t = array();
		$a = array();
		$p = array();

		if(count($absent)){
			foreach ($absent as $key => $value) {
				$a[$value['created']] = $value['absent'];
			}
		}

		if(count($present)){
			foreach ($present as $key => $value) {
				$p[$value['created']] = $value['present'];
			}
		}

		if(count($total)){
			foreach ($total as $key => $value) {
				if (!isset($a[$value['created']])) {
					$a[$value['created']] = '0';
				}
				if (!isset($p[$value['created']])) {
					$p[$value['created']] = '0';
				}
				$t[$value['created']] = $value['total'];


				$pPercent = ($p[$value['created']]*100)/$value['total'];
				$aPercent = ($a[$value['created']]*100)/$value['total'];

				$pPercent = number_format($pPercent,2);
				$aPercent = number_format($aPercent,2);

				$pp[]  = array('value'=>$pPercent);
				$aa[]   = array('value'=>$aPercent);
				$category[] = array('label'=>$value['created']);
			}

			$datas['category'] 	= $category;
			$datas['absent'] 		= $aa;
			$datas['present'] 	= $pp;
		}


		return $datas;
	}

}
?>
