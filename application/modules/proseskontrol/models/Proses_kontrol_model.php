<?php

class Proses_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "proses_kontrol";
    }

    public function get_limit($where = array(), $limit, $start, $search = "")
    {
        // $this->db->limit($limit, $start);
        //$query = $this->db->where($where)->get($this->tableName);
        /*
         $query = $this->db->query(
            'SELECT pk.*, 
            ur.adi as urun_adi, 
            us.user_name as kullanici_adi, 
            son.adi as sonuc_adi  
            FROM proses_kontrol pk   
            INNER JOIN urunler ur ON ur.id = pk.urun 
            INNER JOIN users us ON us.id = pk.kullanici 
            INNER JOIN sonuc_secim son ON son.id = pk.sonuc 
 
             ORDER BY pk.id DESC
             LIMIT '. $limit.' OFFSET '. $start.'
              ');        
        */

        $this->db->select('pk.id, pk.urun,pk.lot,pk.kontrol_no,pk.tarih,pk.parti_no,pk.hpk,   
        ur.adi as urun_adi, 
        us.user_name as kullanici_adi , 
        son.adi as sonuc_adi');
        $this->db->from('proses_kontrol pk');
        $this->db->join('urunler ur', 'ur.id = pk.urun', 'inner');
        $this->db->join('users us', 'us.id = pk.kullanici', 'inner');
        $this->db->join('sonuc_secim son', 'son.id = pk.sonuc', 'inner');
        $this->db->order_by("pk.id ", "DESC");
        $this->db->limit($limit, $start);
        if ($search != '') {
            $this->db->like('ur.adi', $search);
            $this->db->or_like('pk.lot', $search);
        }
        $query = $this->db->get();
        return $query->result();
    }


    /*
<td><?php echo $item->urun_adi; ?></td>
<td><?php echo $item->lot; ?></td>
<td><?php echo $item->kontrol_no; ?></td>
<td><?php echo $item->parti_no; ?></td>
<td><?php  echo tarih_ayarla($item->tarih,"Y/m/d H:i");  ?></td>

     */

    public function listele()
    {
        $query = $this->db->query(
            'SELECT pk.id, pk.urun,pk.lot,pk.kontrol_no,pk.tarih,pk.parti_no, pk.buji_braket_lot,
            pk.aciklama,pk.hpk,pk.klips_hpk,   
        ur.adi as urun_adi, 
        us.user_name as kullanici_adi, 
        son.adi as sonuc_adi  
        FROM proses_kontrol pk   
        INNER JOIN urunler ur ON ur.id = pk.urun 
        INNER JOIN users us ON us.id = pk.kullanici 
        INNER JOIN sonuc_secim son ON son.id = pk.sonuc 
		ORDER BY pk.tarih DESC
        LIMIT 10000
        '
        );
        return $query->result();
    }

    // Select total records
    public function getrecordCount($search = '')
    {
        $this->db->select('count(*) as allcount, pk.id, 
        ur.adi as urun_adi, 
        us.user_name as kullanici_adi , 
        son.adi as sonuc_adi');
        $this->db->from('proses_kontrol pk');
        $this->db->join('urunler ur', 'ur.id = pk.urun', 'inner');
        $this->db->join('users us', 'us.id = pk.kullanici', 'inner');
        $this->db->join('sonuc_secim son', 'son.id = pk.sonuc', 'inner');
        if ($search != '') {
            $this->db->like('ur.adi', $search);
            $this->db->or_like('pk.lot', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function getSearchCount($search = '')
    {
        echo $search;
        $this->db->select('count(*) as allcount, pk.id, pk.lot,
        ur.adi as urun_adi, 
        us.user_name as kullanici_adi , 
        son.adi as sonuc_adi');
        $this->db->from('proses_kontrol pk');
        $this->db->join('urunler ur', 'ur.id = pk.urun', 'inner');
        $this->db->join('users us', 'us.id = pk.kullanici', 'inner');
        $this->db->join('sonuc_secim son', 'son.id = pk.sonuc', 'inner');
        if ($search != '') {
            $this->db->like('pk.lot', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }


    public function getSearch($where = array(),  $search = "")
    {
        $this->db->select('pk.id, pk.urun,pk.lot,pk.kontrol_no,pk.tarih,pk.parti_no,  
        ur.adi as urun_adi, 
        us.user_name as kullanici_adi , 
        son.adi as sonuc_adi');
        $this->db->from('proses_kontrol pk');
        $this->db->join('urunler ur', 'ur.id = pk.urun', 'inner');
        $this->db->join('users us', 'us.id = pk.kullanici', 'inner');
        $this->db->join('sonuc_secim son', 'son.id = pk.sonuc', 'inner');
        $this->db->limit(1000);
        $this->db->order_by("pk.id ", "DESC");
        if ($search != '') {
            $this->db->like('pk.lot', $search);
        }
        $query = $this->db->get();
        return $query->result();
    }
}
