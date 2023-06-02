<?php 

class DataJabatan extends CI_Controller{

    public function index(){
        $data ["title"] = "Data Jabatan";
        $data ["jabatan"] = $this->Penggajian->data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('templates_admin/footer');

    }

    public function tambahJabatan(){
        $data ["title"] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahJabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahJabatanAksi(){
        $this->rules();

        if($this->form_validation->run() == FALSE){
            $this->tambahJabatan();
        }else{
            $namaJabatan            =   $this->input->post('nama_jabatan');
            $gajiPokok              =   $this->input->post('gaji_pokok');
            $tunjanganTransport     =   $this->input->post('tj_transport');
            $uangMakan              =   $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan'  =>  $namaJabatan,
                'gaji_pokok'    =>  $gajiPokok,
                'tj_transport'  =>  $tunjanganTransport,
                'uang_makan'    =>  $uangMakan
            );

            $this->Penggajian->insert($data, 'data_jabatan');

            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamaatt!</strong> Anda Berhasil Menambahkan Data Baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataJabatan');
        }
    }

    public function ubahJabatan($id){
        $where = array('id_jabatan' => $id);
        $data ["jabatan"] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan = '$id'")->result();
        $data ["title"] = "Update Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/ubahJabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function ubahJabatanAksi(){
        $this->rules();

        if($this->form_validation->run() == FALSE){
            $this->ubahJabatan();
        }else{
            $id                     =   $this->input->post('id_jabatan');
            $namaJabatan            =   $this->input->post('nama_jabatan');
            $gajiPokok              =   $this->input->post('gaji_pokok');
            $tunjanganTransport     =   $this->input->post('tj_transport');
            $uangMakan              =   $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan'  =>  $namaJabatan,
                'gaji_pokok'    =>  $gajiPokok,
                'tj_transport'  =>  $tunjanganTransport,
                'uang_makan'    =>  $uangMakan
            );

            $where = array('id_jabatan' => $id);

            $this->Penggajian->update('data_jabatan', $data, $where);

            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamaatt!</strong> Anda Berhasil Mengupdate Data Ini.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataJabatan');
        }
    }

    public function rules(){
        $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
        $this->form_validation->set_rules('tj_transport', 'tunjangan transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
    }

    public function hapusJabatan($id){
        $where = array('id_jabatan' => $id);

        $this->Penggajian->delete('data_jabatan', $where);

        $this->session->set_flashdata('pesan', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Selamaatt!</strong> Anda Berhasil Menghapus Data Ini.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataJabatan');
    }
}

?>