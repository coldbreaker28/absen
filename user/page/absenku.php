<div class="row">
 <div class="col-12">
  <div class="card mb-4">
   <div class="card-header pb-0">
    <h6>Absenku</h6>
   </div>
   <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
     <table id="example" class="table align-items-center mb-0">
      <thead>
       <tr>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hari, Tanggal</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absen Masuk</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absen Pulang</th>
       </tr>
      </thead>
      <tbody>

       <?php
       $id = $_SESSION['user_id'];
       $query3 = "SELECT * FROM absen WHERE id_guru='$id' ORDER BY tgl_absen DESC";

       $sql3 = mysqli_query($conn, $query3);
       // $data = mysqli_fetch_array($sql3);
       $no = 0;
       while ($data = mysqli_fetch_array($sql3)) {
        $no++;
        $hari_array = array(
         'Minggu',
         'Senin',
         'Selasa',
         'Rabu',
         'Kamis',
         'Jumat',
         'Sabtu'
        );
        $hr = date('w', strtotime($data['tgl_absen']));
        $hari = $hari_array[$hr];
        $tanggal = date('j', strtotime($data['tgl_absen']));
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
        $bl = date('n', strtotime($data['tgl_absen']));
        $bulan = $bulan_array[$bl];
        $tahun = date('Y', strtotime($data['tgl_absen']));
       ?>
        <tr>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $no ?></span></td>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $hari . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun ?></span></td>
         <td class="align-middle text-center">
          <?php
          if ($data['jam_datang'] == '00:00:00') {
          ?>
           <span class="badge badge-sm bg-gradient-secondary">Belum Absen</span>

          <?php
          } else {
          ?>
           <span class="badge badge-sm bg-gradient-success"><?= $data['jam_datang'] ?></span>
          <?php
          }
          ?>
         </td>
         <td class="align-middle text-center">
          <?php
          if ($data['jam_pulang'] == '00:00:00') {
          ?>
           <span class="badge badge-sm bg-gradient-secondary">Belum Absen</span>

          <?php
          } else {
          ?>
           <span class="badge badge-sm bg-gradient-success"><?= $data['jam_pulang'] ?></span>
          <?php
          }
          ?>
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