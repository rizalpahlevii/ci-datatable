<?php 
class M_biodata extends CI_Model{
  var $table = 'biodata';
  var $order_column = array(null, 'nama', 'alamat', 'rayon', 'rombel', 'jurusan');
  var $select_column = array('id','nama', 'alamat', 'rayon', 'rombel', 'jurusan');
  var $order = array('id' => 'asc');

  function make_query(){  
    $this->db->select($this->select_column);  
    $this->db->from($this->table);  
    if(isset($_POST["search"]["value"])){  
      $this->db->like("nama", $_POST["search"]["value"]);  
      $this->db->or_like("alamat", $_POST["search"]["value"]);   
      $this->db->or_like("rayon", $_POST["search"]["value"]);   
      $this->db->or_like("rombel", $_POST["search"]["value"]);    
      $this->db->or_like("jurusan", $_POST["search"]["value"]); 
    }  
    if(isset($_POST["order"])){  
      $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
    }else{  
      $this->db->order_by('nama', 'DESC');  
    }  
  }  
  function make_datatables(){  
    $this->make_query();  
    if($_POST["length"] != -1){  
      $this->db->limit($_POST['length'], $_POST['start']);  
    }  
    $query = $this->db->get();  
    return $query->result();  
  }  
  function get_filtered_data(){  
    $this->make_query();  
    $query = $this->db->get();  
    return $query->num_rows();  
  }       
  function get_all_data(){  
    $this->db->select("*");  
    $this->db->from($this->table);  
    return $this->db->count_all_results();  
  }
}

?>