<?php

class Kontrol_no_model extends MY_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->tableName = "kontrol_no";
  }

  public function get_limit($where = array(), $limit, $start, $search = "")
  {
    $this->db->select('kn.*');
    $this->db->from('kontrol_no kn');
    $this->db->order_by("kn.id ", "DESC");
    $this->db->limit($limit, $start);
    if ($search != '') {
      $this->db->like('id', $search);
    }
    $query = $this->db->get();
    return $query->result();
  }

  // Select total records
  public function getrecordCount($search = '')
  {
    $this->db->select('count(*) as allcount,kn.* ');
    $this->db->from('kontrol_no kn');
    if ($search != '') {
      $this->db->like('id', $search);
    }
    $query = $this->db->get();
    $result = $query->result_array();
    return $result[0]['allcount'];
  }
}
