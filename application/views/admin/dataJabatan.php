        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
          </div>
          <a href="<?= base_url('admin/dataJabatan/tambahJabatan')?>" class="btn btn-success btn-md mb-2">
            <i class="fa fa-plus"></i> Tambah Data Jabatan
          </a>
          <!-- Content Row -->
          <div class="row">
            <div class="col-12">
            <?= $this->session->flashdata('pesan')?>
                <table class="table table-bordered text-center table-responsive-lg table-striped">
                    <tr class="bg-info text-white font-weight-bold">
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan Transport</th>
                        <th>Uang Makan</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    <?php $no=1; foreach($jabatan as $j):?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $j->nama_jabatan?></td>
                            <td><?= $j->gaji_pokok?></td>
                            <td><?= $j->tj_transport?></td>
                            <td><?= $j->uang_makan?></td>
                            <td><?= $j->gaji_pokok + $j->tj_transport + $j->uang_makan?></td>
                            <td>
                                <a href="<?= base_url('admin/dataJabatan/ubahJabatan/'.$j->id_jabatan)?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>    |
                                <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')" href="<?= base_url('admin/dataJabatan/hapusJabatan/'.$j->id_jabatan)?>" class="btn btn-danger btn-sm">
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

      
