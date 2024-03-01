<?php

class Girdi_kontrol_model extends MY_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->tableName = "girdi_kontrol";
  }

  public function get_limit($where = array(), $limit, $start, $search = "")
  {
    // $this->db->limit($limit, $start);
    //$query = $this->db->where($where)->get($this->tableName);

    /*
        $query = $this->db->query(
            'SELECT gk.*, 
             ml.adi as malzeme_adi,
             td.adi as tedarikci_adi, 
             us.user_name as kullanici_adi, 
             son.adi as sonuc_adi 
             FROM girdi_kontrol gk 
             INNER JOIN malzemeler ml ON ml.id = gk.malzeme 
             INNER JOIN tedarikciler td ON td.id = gk.tedarikci 
             INNER JOIN users us ON us.id = gk.kullanici 
             INNER JOIN sonuc_secim son ON son.id = gk.sonuc 

            ORDER BY gk.id DESC
            LIMIT '. $limit.' OFFSET '. $start.'
             '); 
           */

    $this->db->select('gk.id,gk.kontrol_no,gk.hpk,gk.parti_no,gk.irsaliye,gk.tarih, 
          ml.adi as malzeme_adi,
          td.adi as tedarikci_adi, 
          us.user_name as kullanici_adi, 
          son.adi as sonuc_adi ');
    $this->db->from('girdi_kontrol gk');
    $this->db->join('malzemeler ml', 'ml.id = gk.malzeme', 'inner');
    $this->db->join('tedarikciler td', 'td.id = gk.tedarikci', 'inner');
    $this->db->join('users us', 'us.id = gk.kullanici', 'inner');
    $this->db->join('sonuc_secim son', 'son.id = gk.sonuc ', 'inner');
    $this->db->order_by("gk.id ", "DESC");
    $this->db->limit($limit, $start);
    if ($search != '') {
      $this->db->like('ml.adi', $search);
      $this->db->or_like('kontrol_no', $search);
    }
    $query = $this->db->get();
    return $query->result();
  }

  public function listele()
  {
    $query = $this->db->query(
      'SELECT gk.id,gk.kontrol_no,gk.hpk,gk.parti_no,gk.irsaliye,gk.tarih,gk.aciklama,   
         ml.adi as malzeme_adi,
         td.adi as tedarikci_adi, 
         us.user_name as kullanici_adi, 
         son.adi as sonuc_adi 
         FROM girdi_kontrol gk 
         INNER JOIN malzemeler ml ON ml.id = gk.malzeme 
         INNER JOIN tedarikciler td ON td.id = gk.tedarikci 
         INNER JOIN users us ON us.id = gk.kullanici 
         INNER JOIN sonuc_secim son ON son.id = gk.sonuc 
		 ORDER BY gk.tarih DESC
         LIMIT 10000
         '
    );
    return $query->result();
  }

  // Select total records
  public function getrecordCount($search = '')
  {
    $this->db->select('count(*) as allcount, gk.id, 
    ml.adi as malzeme_adi,
    td.adi as tedarikci_adi, 
    us.user_name as kullanici_adi, 
    son.adi as sonuc_adi');
    $this->db->from('girdi_kontrol gk');
    $this->db->join('malzemeler ml', 'ml.id = gk.malzeme', 'inner');
    $this->db->join('tedarikciler td', 'td.id = gk.tedarikci', 'inner');
    $this->db->join('users us', 'us.id = gk.kullanici', 'inner');
    $this->db->join('sonuc_secim son', 'son.id = gk.sonuc ', 'inner');
    if ($search != '') {
      $this->db->like('ml.adi', $search);
      $this->db->or_like('kontrol_no', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();

    return $result[0]['allcount'];
  }
}
