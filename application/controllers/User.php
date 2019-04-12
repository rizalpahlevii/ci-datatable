<?php 
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->Model('M_biodata');
    }
    public function index(){
        $this->load->view('index');
    }
    
    function datauser() {             
        $fetch_data = $this->M_biodata->make_datatables();  
        $data = array();  
        $no=1;
        foreach($fetch_data as $row)  
        {  
            $sub_array = array(); 
            $sub_array[] = $no;                 
            $sub_array[] = $row->nama;  
            $sub_array[] = $row->alamat;
            $sub_array[] = $row->rayon; 
            $sub_array[] = $row->rombel;
            $sub_array[] = $row->jurusan;
            $sub_array[] = '<button data-kode="'.$row->id.'" class="btn btn-primary mr-1 tmb-edit" id="tmb-edit">Edit</button>'.'<button data-kode="'.$row->id.'" class="btn btn-danger tmb-hapus" id="tmb-hapus">Hapus</button>';
            $data[] = $sub_array;  
            $no++;
        }  
        $output = array(  
            "draw"                    =>     intval($_POST["draw"]),  
            "recordsTotal"          =>      $this->M_biodata->get_all_data(),  
            "recordsFiltered"     =>     $this->M_biodata->get_filtered_data(),  
            "data"                    =>     $data  
        );  
        echo json_encode($output);  
    } 



    public function insert(){
        $elm = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'rayon' => $this->input->post('rayon'),
            'rombel' => $this->input->post('rombel'),
            'jurusan' => $this->input->post('jurusan')
        );
        $insert = $this->db->insert('biodata', $elm);
        if($insert){
            echo "berhasil";
        }else{
            echo "gagal";
        }

    } 

    function delete(){
        $where = array('id' => $this->input->post('id'));
        $delete=$this->db->delete('biodata',$where);
        if($delete){
            echo "berhasil";
        }else{
            echo "gagal";
        }

    }




    function biodataById(){
        $where = array('id' => $this->input->post('id'));
        $result = $this->db->get_where('biodata', $where)->row_array();
        $hasil = array(
            'nama' => $result['nama'],
            'alamat' => $result['alamat'],
            'rayon' => $result['rayon'],
            'rombel' => $result['rombel'],
            'jurusan' => $result['jurusan'],
        );
        echo json_encode($hasil);
    }

    function update(){
        $where = array('id' => $this->input->post('id'));
        $elm = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'rayon' => $this->input->post('rayon'),
            'rombel' => $this->input->post('rombel'),
            'jurusan' => $this->input->post('jurusan')
        );
        $update=$this->db->update('biodata', $elm, $where);
        if($update){
            echo "berhasil";
        }else{
            echo "gagal";
        }
    }
}


?>