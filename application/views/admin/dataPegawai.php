        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
          </div>
          <a href="<?= base_url('admin/dataPegawai/tambahPegawai')?>" class="btn btn-success btn-md mb-2">
            <i class="fa fa-plus"></i> Tambah Data Pegawai
          </a>
          <!-- Content Row -->
          <div class="row">
            <div class="col-12">
            <?= $this->session->flashdata('pesan')?>
                <table class="table table-bordered text-center table-responsive-lg table-striped">
                    <tr class="bg-info text-white font-weight-bold">
                        <th>No</th>
                        <th>Photo Pegawai</th>
                        <th>NIK</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php $no=1; foreach($pegawai as $p):?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td>
                                <img src="<?= base_url().'assets/photo/'.$p->photo?>" class="rounded-circle" width="50px">
                            </td>
                            <td><?= $p->nik?></td>
                            <td><?= $p->nama_pegawai?></td>
                            <td><?= $p->jenis_kelamin?></td>
                            <td><?= $p->jabatan?></td>
                            <td><?= $p->tanggal_masuk?></td>
                            <td><?= $p->status?></td>
                            <td>
                                <a href="<?= base_url('admin/dataPegawai/ubahPegawai/'.$p->id_pegawai)?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>    |
                                <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')" href="<?= base_url('admin/dataPegawai/hapusPegawai/'.$p->id_pegawai)?>" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
