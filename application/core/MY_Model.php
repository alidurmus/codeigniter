<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    public $tableName;

    public function __construct()
    {
        parent::__construct();
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($where = array(), $order = "id ASC")
    {
        $this->db->limit(10000, 0);
        $query = $this->db->where($where)->order_by($order)->get($this->tableName);
        return $query->result();
    }

    public function get_limit($where = array(), $limit, $start, $search = "")
    {
        $this->db->limit($limit, $start);
        $query = $this->db->where($where)->get($this->tableName);

        return $query->result();
    }

    public function search($where = array(), $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->where($where)->get($this->tableName);

        // if($s_data['sepcli'] !="")
        //     $this->db->like('ts.spec_specialise',$s_data['sepcli'],'both');
        // if($s_data['distct'] !="")
        //     $this->db->like('td.district',$s_data['distct'],'both');
        // if($s_data['locat'] !="")
        //     $this->db->like('td.place', $s_data['locat'], 'both');


        return $query->result();
    }


    public function get_count()
    {
        return $this->db->count_all($this->tableName);
    }

    public function add($data = array())
    {
        /// TODO: yetkiler kontrol edilecek
        if (isAllowedWriteModule()) {
            return $this->db->insert($this->tableName, $data);
        }
    }

    public function update($where = array(), $data = array())
    {
        if (isAllowedUpdateModule()) {
            return $this->db->where($where)->update($this->tableName, $data);
        }
    }

    public function delete($where = array())
    {
        if (isAllowedDeleteModule()) {
            return $this->db->where($where)->delete($this->tableName);
        }
    }
}
