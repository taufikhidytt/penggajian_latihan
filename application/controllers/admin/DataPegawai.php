<?php 


class DataPegawai extends CI_Controller{

    public function index(){
        $data ["title"] =   "Data Pegawai";
        $data ["pegawai"]   =   $this->Penggajian->data('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahPegawai(){
        $data ["title"]     =   "Tambah Data Pegawai";
        $data ["pegawai"]   =   $this->Penggajian->data('data_pegawai')->result();
        $data ["jabatan"]   =   $this->Penggajian->data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahPegawaiAksi(){
        $this->rules();

        if($this->form_validation->run() == FALSE){
            $this->tambahPegawai();
        }else{
            $nik            =  $this->input->post('nik');
            $namaPegawai    =  $this->input->post('nama_pegawai');
            $jenisKelamin   =  $this->input->post('jenis_kelamin');
            $jabatan        =  $this->input->post('jabatan');
            $tanggalMasuk   =  $this->input->post('tanggal_masuk');
            $status         =  $this->input->post('status');
            $photo          =  $_FILES['photo']['name'];

            if($photo = ''){
            }else{
                $config ['upload_path']     =   './assets/photo';
                $config ['allowed_types']   =   'png|jpg|jpeg';
                $config ['encrypt_name']    =   'True';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('photo')){
                    echo 'Gagal Upload Photo';
                }else{
                    $photo = $this->upload->data('file_name');
                    
                }
            }

            $data = array(
                'nik'           => $nik,
                'nama_pegawai'  => $namaPegawai,
                'jenis_kelamin' => $jenisKelamin,
                'jabatan'       => $jabatan,
                'tanggal_masuk' => $tanggalMasuk,
                'status'        => $status,
                'photo'         => $photo
            );

            $this->Penggajian->insert($data, 'data_pegawai');

            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamaatt!</strong> Anda Berhasil Menambahkan Data Baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPegawai');
        }
    }

    public function ubahPegawai($id){
        $where = array('id_pegawai' => $id);
        $data ["title"]     =   "Update Data Pegawai";
        $data ["pegawai"]   =   $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();
        $data ["jabatan"]   =   $this->Penggajian->data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/ubahPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function ubahPegawaiAksi(){
        $this->rules();

        if($this->form_validation->run() == FALSE){
            $this->ubahPegawai();
        }else{
            $id             =  $this->input->post('id_pegawai');
            $nik            =  $this->input->post('nik');
            $namaPegawai    =  $this->input->post('nama_pegawai');
            $jenisKelamin   =  $this->input->post('jenis_kelamin');
            $jabatan        =  $this->input->post('jabatan');
            $tanggalMasuk   =  $this->input->post('tanggal_masuk');
            $status         =  $this->input->post('status');
            $photo          =  $_FILES['photo']['name'];

            if($photo){

                $config ['upload_path']     =   './assets/photo';
                $config ['allowed_types']   =   'png|jpg|jpeg';
                $config ['encrypt_name']    =   'True';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('photo')){
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo', $photo);
                }else{
                    $this->upload->display_errors();
                    
                }
            }

            $data = array(
                'nik'           => $nik,
                'nama_pegawai'  => $namaPegawai,
                'jenis_kelamin' => $jenisKelamin,
                'jabatan'       => $jabatan,
                'tanggal_masuk' => $tanggalMasuk,
                'status'        => $status,
                'photo'         => $photo
            );

            $where = array('id_pegawai' => $id);

            $this->Penggajian->update('data_pegawai', $data, $where);

            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamaatt!</strong> Anda Berhasil Mengupdate Data Ini.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPegawai');
        }
    }

    public function rules(){
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
    }

    public function hapusPegawai($id){
        $where = array('id_pegawai' => $id);

        $this->Penggajian->delete('data_pegawai', $where);

         $this->session->set_flashdata('pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Selamaatt!</strong> Anda Berhasil Menghapus Data Ini.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPegawai');
    }
}

?>