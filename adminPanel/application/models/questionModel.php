<?php

//page name & class name same

class questionModel extends Ci_Model  // default class 
{
	function select($tbl)
	{
		$res=$this->db->get($tbl);
		$arr=$res->result_array();
		return $arr;
	}	
	function insert($tbl,$arr)
	{
		$res=$this->db->insert($tbl,$arr);
		return $res;
	}
	// login / fetch data 
	function selectWhere($tbl,$where)
	{
		$res=$this->db->get_where($tbl,$where);
		return $res;
	}
	function update($tbl,$data,$where)
	{
		
		$res=$this->db->update($tbl,$data,$where);
		return $res;
	}
	function delete($tbl,$where)
	{
		$res=$this->db->delete($tbl,$where);
		return $res;
	}
	
	
	
	// fetch join data with where
	function select_join_where($tbl1,$tbl2,$on,$where)
	{
		
	}
	function select_join($tbl1,$tbl2,$on1,$tbl3,$on2,$tbl4,$on3,$where)
	{
		$this->db->select('*');
		$this->db->from($tbl1);
		$this->db->join($tbl2, $on1);
		$this->db->join($tbl3, $on2);
		$this->db->join($tbl4, $on3);
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	
	function getCount($tbl)
	{
		return $this->db->count_all($tbl);
	}

	
	public function selectJoinLimit($tbl1,$tbl2,$on,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from($tbl1);
		$this->db->join($tbl2, $on);
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	public function selectLimit($tbl,$limit,$start) {
        $this->db->limit($limit,$start);
        $query = $this->db->get($tbl);

        return $query->result();
    }

	//SELECT * FROM Customers WHERE CustomerName LIKE 'a%';
	function selectLike($tbl,$keyword,$value)
	{
		$this->db->select('*');
        $this->db->from($tbl);
        $this->db->like($keyword,$value);
        $query = $this->db->get();

        if($query->num_rows()>0){
          return $query->result();
        }
	}	

	function selectJoinLike($tbl1,$tbl2,$on,$keyword,$value)
	{
		$this->db->select('*');
        $this->db->from($tbl1);
		$this->db->join($tbl2, $on);
        $this->db->like($keyword,$value);
        $query = $this->db->get();

        if($query->num_rows()>0){
          return $query->result();
        }
	}	

}

?>