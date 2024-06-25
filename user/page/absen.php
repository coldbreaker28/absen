<div class="row">
 <div class="col-12">
  <div class="card mb-4">
   <div class="card-header pb-0">
    <h6>Absen Harian</h6>
   </div>
   <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
     <table class="table align-items-center mb-0">
      <thead>
       <tr>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hari, Tanggal</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absen Masuk</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absen Pulang</th>

       </tr>
      </thead>
      <tbody>
       <tr>
        <td class="align-middle text-center text-sm">
         <?php
         date_default_timezone_set('Asia/Jakarta');
         $id = $_SESSION['user_id'];
         $tgl = date('Y-m-d');
         $jam = date('H:i:s');

         $query3 = "SELECT * FROM absen WHERE id_guru='$id' AND tgl_absen = '$tgl' AND jam_datang!='00:00:00' AND jam_pulang!='00:00:00'";

         $sql3 = mysqli_query($conn, $query3);
         if (mysqli_num_rows($sql3) >= 1) {
         ?>
          <span class="badge badge-sm bg-gradient-success"><i class="fas fa-check"></i></span>
         <?php
         } else {
         ?>
          <span class="badge badge-sm bg-gradient-danger"><i class="fas fa-times"></i></span>
         <?php
         }
         ?>
        </td>
        <td class="align-middle text-center">
         <?php
         date_default_timezone_set('Asia/Jakarta');
         $tglskr = date('d-m-Y');
         $hari_array = array(
          'Minggu',
          'Senin',
          'Selasa',
          'Rabu',
          'Kamis',
          'Jumat',
          'Sabtu'
         );
         $hr = date('w', strtotime($tglskr));
         $hari = $hari_array[$hr];
         $tanggal = date('j', strtotime($tglskr));
         $bulan_array = array(
          1 => 'Januari',
          2 => 'Februari',
          3 => 'Maret',
          4 => 'April',
          5 => 'Mei',
          6 => 'Juni',
          7 => 'Juli',
          8 => 'Agustus',
          9 => 'September',
          10 => 'Oktober',
          11 => 'November',
          12 => 'Desember',
         );
         $bl = date('n', strtotime($tglskr));
         $bulan = $bulan_array[$bl];
         $tahun = date('Y', strtotime($tglskr));
         ?>
         <span class="text-secondary text-xs font-weight-bold"><?= $hari . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun ?></span>
        </td>
        <td class="align-middle text-center">
         <?php 


         $query = "SELECT * FROM absen WHERE id_guru='$id' AND tgl_absen = '$tgl' AND jam_datang!='00:00:00'";

         $sql = mysqli_query($conn, $query);

         if (mysqli_num_rows($sql) >= 1) {
         ?>
          <button type="button" class="btn mb-0 bg-gradient-info">Absen Masuk</button>
          <?php
         } else {
          $jam = date('H:i:s');
          if ($hari == 'Senin' or $hari == 'Selasa' or $hari == 'Rabu' or $hari == 'Kamis') {
           if ($jam >= '07:00:00' and $jam <= '08:00:00') {
          ?>
            <a href="../action/absenmasuk.php">
             <button type="button" class="btn mb-0 bg-gradient-success">Absen Masuk</button>
            </a>
           <?php
           } else {
           ?>
            <button type="button" class="btn mb-0 bg-gradient-secondary">Absen Masuk</button>
           <?php
           }
          } else {
           if ($jam >= '07:00:00' and $jam <= '08:00:00') {
           ?>
            <a href="../action/absenmasuk.php">
             <button type="button" class="btn mb-0 bg-gradient-success">Absen Masuk</button>
            </a>
           <?php
           } else {
           ?>
            <button type="button" class="btn mb-0 bg-gradient-secondary">Absen Masuk</button>
         <?php
           }
          }
         } ?>

        </td>
        <td class="align-middle text-center">
         <?php
         $query2 = "SELECT * FROM absen WHERE id_guru='$id' AND tgl_absen = '$tgl' AND jam_pulang!='00:00:00'";

         $sql2 = mysqli_query($conn, $query2);

         if (mysqli_num_rows($sql2) >= 1) {
         ?>
          <button type="button" class="btn mb-0 bg-gradient-info">Absen Pulang</button>
          <?php
         } else {
          $jam = date('H:i:s');
          if ($hari == 'Senin' or $hari == 'Selasa' or $hari == 'Rabu' or $hari == 'Kamis') {
           if ($jam >= '11:20:00' and $jam <= '12:00:00') {
          ?>
            <a href="../action/absenpulang.php">
             <button type="button" class="btn mb-0 bg-gradient-success">Absen Pulang</button>
            </a>
           <?php
           } else {
           ?>
            <button type="button" class="btn mb-0 bg-gradient-secondary">Absen Pulang</button>
           <?php
           }
          } else {
           if ($jam >= '10:40:00' and $jam <= '11:00:00') {
           ?>
            <a href="../action/absenpulang.php">
             <button type="button" class="btn mb-0 bg-gradient-success">Absen Pulang</button>
            </a>
           <?php
           } else {
           ?>
            <button type="button" class="btn mb-0 bg-gradient-secondary">Absen Pulang</button>
         <?php
           }
          }
         }
         ?>
        </td>
       </tr>
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>
</div>