        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
            <div class="pull-right">
                <a href="<?= base_url('admin/dataJabatan')?>" class="btn btn-secondary btn-md">
                    <i class="fa fa-reply-all"></i> Back
                </a>
            </div>
          </div>
          
          <!-- Content Row -->
          <div class="row mt-4">
            <div class="col-12">
                <form action="<?= base_url('admin/dataJabatan/tambahJabatanAksi')?>" method="post">
                    <div class="form-group">
                        <label for="nama_jabatan">Nama Jabatan :</label>
                        <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" autocomplete="off">
                        <?= form_error('nama_jabatan')?>
                    </div>
                    <div class="form-group">
                        <label for="gaji_pokok">Gaji Pokok :</label>
                        <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" autocomplete="off">
                        <?= form_error('gaji_pokok')?>
                    </div>
                    <div class="form-group">
                        <label for="tj_transport">Tunjangan Transport :</label>
                        <input type="number" name="tj_transport" id="tj_transport" class="form-control" autocomplete="off">
                        <?= form_error('tj_transport')?>
                    </div>
                    <div class="form-group">
                        <label for="uang_makan">Uang Makan :</label>
                        <input type="number" name="uang_makan" id="uang_makan" class="form-control" autocomplete="off">
                        <?= form_error('uang_makan')?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-md">
                        <i class="fa fa-check"></i> Save
                    </button>
                </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
