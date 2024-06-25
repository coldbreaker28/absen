<div class="row">
 <div class="col-12">
  <div class="card mb-4">
   <div class="card-header pb-0">
    <div class="row">
     <div class="col-lg-6 col-7">
      <h6>Data Guru</h6>
     </div>
     <div class="col-lg-6 col-5 my-auto text-end">
      <button type="button" data-bs-toggle="modal" data-bs-target="#addguru" class="btn btn-primary btn-sm mb-2" style="padding: 8px 14px;"><i class="fas fa-plus m-1" style="font-size: 10px;"></i> Tambah Guru</button>
     </div>
    </div>
   </div>
   <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
     <table id="example" class="table align-items-center mb-0">
      <thead>
       <tr>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NUPTK</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telephone</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
       </tr>
      </thead>
      <tbody>

       <?php
       $query3 = "SELECT * FROM pegawai WHERE role != '1'";

       $sql3 = mysqli_query($conn, $query3);
       // $data = mysqli_fetch_array($sql3);
       $no = 0;
       while ($data = mysqli_fetch_array($sql3)) {
        $no++;

       ?>
        <tr>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $no ?></span></td>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $data['nama_guru'] ?></span></td>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $data['nuptk'] ?></span></td>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $data['tlp'] ?></span></td>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $data['jk'] ?></span></td>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $data['status_guru'] ?></span></td>
         <td class="align-middle text-center">
          <button type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_user'] ?>" class="btn btn-info btn-sm mb-0" style="padding: 8px 14px;"><i class="fas fa-pen" style="font-size: 10px;"></i></button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#reset<?= $data['id_user'] ?>" class="btn btn-warning btn-sm mb-0" style="padding: 8px 14px;"><i class="fas fa-key" style="font-size: 10px;"></i></button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_user'] ?>" class="btn btn-danger btn-sm mb-0" style="padding: 8px 14px;"><i class="fas fa-trash" style="font-size: 10px;"></i></button>
         </td>

        </tr>

       <?php
       }
       ?>

      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>
</div>

<!-- Modal -->
<?php
$query3 = "SELECT * FROM pegawai WHERE role != '1'";

$sql3 = mysqli_query($conn, $query3);
while ($data = mysqli_fetch_array($sql3)) {
?>
 <div class="modal fade" id="edit<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel" style="font-size: small;">Edit Data Guru</h5>
     <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
     </button>
    </div>
    <div class="modal-body">
     <form action="../action/editguru.php" method="post">
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">NIK:</label>
       <input type="text" class="form-control form-control-sm" name="nik" value="<?= $data['nik'] ?>" id="recipient-name" required>
      </div>
      <div class="form-group mb-0">
       <label for="recipient-name" class="col-form-label" style="font-size: small;">Nama:</label>
       <input type="text" class="form-control form-control-sm" name="id_user" value="<?= $data['id_user'] ?>" id="recipient-name" hidden>
       <input type="text" class="form-control form-control-sm" name="nama_guru" value="<?= $data['nama_guru'] ?>" id="recipient-name" required>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">NUPTK:</label>
       <input type="text" class="form-control form-control-sm" name="nuptk" value="<?= $data['nuptk'] ?>" id="recipient-name" required>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">Alamat:</label>
       <input type="text" class="form-control form-control-sm" name="alamat" value="<?= $data['alamat'] ?>" id="recipient-name" required>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">Tempat Lahir:</label>
       <input type="text" class="form-control form-control-sm" name="tmp_lahir" value="<?= $data['tmp_lahir'] ?>" id="recipient-name" required>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">Tanggal Lahir:</label>
       <input type="date" class="form-control form-control-sm" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" id="recipient-name" required>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">Jenis Kelamin:</label>
       <select class="form-control form-control-sm" name="jk" id="exampleFormControlSelect1">
        <option value="">-- Pilih --</option>
        <option value="L" <?php if ($data['jk'] == 'L') {
                           echo 'selected';
                          } ?>>Laki-laki</option>
        <option value="P" <?php if ($data['jk'] == 'P') {
                           echo 'selected';
                          } ?>>Perempuan</option>
       </select>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">Agama:</label>
       <input type="text" class="form-control form-control-sm" name="agama" value="<?= $data['agama'] ?>" id="recipient-name" required>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">Telephone:</label>
       <input type="text" class="form-control form-control-sm" name="tlp" value="<?= $data['tlp'] ?>" id="recipient-name" required>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">Status Guru:</label>
       <select class="form-control form-control-sm" name="status_guru" id="exampleFormControlSelect1">
        <option value="">-- Pilih --</option>
        <option value="Guru Mapel" <?php if ($data['status_guru'] == 'Guru Mapel') {
                                    echo 'selected';
                                   } ?>>Guru Mapel</option>
        <option value="Kepala Sekolah" <?php if ($data['status_guru'] == 'Kepala Sekolah') {
                                    echo 'selected';
                                   } ?>>Kepala Sekolah</option>
       </select>
      </div>
      <div class="form-group mb-0">
       <label for="message-text" class="col-form-label" style="font-size: small;">Username:</label>
       <input type="text" class="form-control form-control-sm" name="username" value="<?= $data['username'] ?>" id="recipient-name" required>
      </div>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
     <button type="submit" class="btn bg-gradient-primary">Simpan</button>
    </div>

    </form>
   </div>
  </div>
 </div>
 <!-- reset password -->
 <div class="modal fade" id="reset<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel" style="font-size: small;">Reset Password User</h5>
     <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
     </button>
    </div>
    <div class="modal-body">
     <form action="../action/resetpass.php" method="post">
      <div class="form-group mb-0">
       <label for="recipient-name" class="col-form-label" style="font-size: small;">Password Baru:</label>
       <input type="text" class="form-control form-control-sm" name="id_user" value="<?= $data['id_user'] ?>" id="recipient-name" hidden>
       <input type="password" class="form-control form-control-sm" name="newpass" value="" id="recipient-name" required>
      </div>

    </div>
    <div class="modal-footer">
     <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
     <button type="submit" class="btn bg-gradient-primary">Simpan</button>
    </div>

    </form>
   </div>
  </div>
 </div>
 <!-- hapus data guru -->
 <div class="modal fade" id="hapus<?= $data['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel" style="font-size: small;">Konfirmasi Hapus User</h5>
     <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
     </button>
    </div>
    <div class="modal-body">
     <form action="../action/hapusguru.php" method="post">
      <input type="text" class="form-control form-control-sm" name="id_user" value="<?= $data['id_user'] ?>" id="recipient-name" hidden>
      <p>Anda yakin ingin menghapus user ini ?</p>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
     <button type="submit" class="btn bg-gradient-danger">Hapus</button>
    </div>

    </form>
   </div>
  </div>
 </div>

 <!-- tambah data guru -->
<?php } ?>

<div class="modal fade" id="addguru" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel" style="font-size: small;">Edit Data Guru</h5>
    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
    </button>
   </div>
   <div class="modal-body">
    <form action="../action/addguru.php" method="post">
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Username:</label>
      <input type="text" class="form-control form-control-sm" name="username" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Password:</label>
      <input type="password" class="form-control form-control-sm" name="password" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">NIK:</label>
      <input type="text" class="form-control form-control-sm" name="nik" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="recipient-name" class="col-form-label" style="font-size: small;">Nama:</label>
      <input type="text" class="form-control form-control-sm" name="nama_guru" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">NUPTK:</label>
      <input type="text" class="form-control form-control-sm" name="nuptk" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Alamat:</label>
      <input type="text" class="form-control form-control-sm" name="alamat" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Tempat Lahir:</label>
      <input type="text" class="form-control form-control-sm" name="tmp_lahir" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Tanggal Lahir:</label>
      <input type="date" class="form-control form-control-sm" name="tgl_lahir" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Jenis Kelamin:</label>
      <select class="form-control form-control-sm" name="jk" id="exampleFormControlSelect1">
       <option value="">-- Pilih --</option>
       <option value="L">Laki-laki</option>
       <option value="P">Perempuan</option>
      </select>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Agama:</label>
      <input type="text" class="form-control form-control-sm" name="agama" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Telephone:</label>
      <input type="text" class="form-control form-control-sm" name="tlp" value="" id="recipient-name" required>
     </div>
     <div class="form-group mb-0">
      <label for="message-text" class="col-form-label" style="font-size: small;">Status Guru:</label>
      <select class="form-control form-control-sm" name="status_guru" id="exampleFormControlSelect1">
       <option value="">-- Pilih --</option>
       <option value="Guru Mapel">Guru Mapel</option>
       <option value="Kepala Sekolah">Kepala Sekolah</option>
      </select>
     </div>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
   </div>

   </form>
  </div>
 </div>
</div>