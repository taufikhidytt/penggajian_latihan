        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
            <div class="pull-right">
                <a href="<?= base_url('admin/dataPegawai')?>" class="btn btn-secondary btn-md">
                    <i class="fa fa-reply-all"></i> Back
                </a>
            </div>
          </div>
          
          <!-- Content Row -->
          <div class="row mt-4">
            <div class="col-12">
                <form action="<?= base_url('admin/dataPegawai/tambahPegawaiAksi')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nik">NIK :</label>
                        <input type="number" name="nik" id="nik" class="form-control" autocomplete="off">
                        <?= form_error('nik')?>
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai :</label>
                        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" autocomplete="off">
                        <?= form_error('nama_pegawai')?>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin')?>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan :</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php foreach($jabatan as $j):?>
                                <option value="<?= $j->nama_jabatan?>"><?= $j->nama_jabatan?></option>
                            <?php endforeach;?>
                        </select>
                        <?= form_error('jabatan')?>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk :</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" autocomplete="off">
                        <?= form_error('tanggal_masuk')?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status :</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Pegawai Tetap">Pegawai Tetap</option>
                            <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                            <option value="Pegawai Harian">Pegawai Harian</option>
                        </select>
                        <?= form_error('status')?>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo Pegawai :</label>
                        <input type="file" name="photo" id="photo" class="form-control" autocomplete="off">
                        <?= form_error('photo')?>
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

      
