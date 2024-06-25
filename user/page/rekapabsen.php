<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Import Excel File Data with PHP</title>


<!-- Show/hide Excel file upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
</head>
<body>

<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12 p-3">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>
<div class="row">
 <div class="col-12">
  <div class="card mb-4">
   <div class="card-header pb-0">
    <h6>Import Data Absen Harian</h6>
   </div>
   <div class="card-body px-0 pt-0 pb-2">
        <div class="row p-3">
            <!-- Import link -->
            <div class="col-md-12 head">
                <div class="float-end">
                    <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import Excel</a>
                </div>
            </div>
            <!-- Excel file upload form -->
            <div class="col-md-12" id="importFrm" style="display: none;">
                <form class="row g-3" action="../action/actionupload.php" method="post" enctype="multipart/form-data">
                    <div class="col-auto">
                        <label for="fileInput" class="visually-hidden">File</label>
                        <input type="file" class="form-control" name="file" id="fileInput" />
                    </div>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
                    </div>
                </form>
            </div>

    <!-- Data list table --> 
    <div class="table-responsive p-0">
     <table id="example" class="table align-items-center mb-0">
     <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Departemen</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absen Masuk</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absen Pulang</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        // Get member rows 
        $result = $conn->query("SELECT * FROM laporan"); 
        if($result->num_rows > 0){ $i=0; 
            while($row = $result->fetch_assoc()){ $i++; 
        ?>
            <tr>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $i; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['nama']; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['departemen']; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['tanggal']; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['status']; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['jam_masuk']; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['jam_keluar']; ?></span></td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="7">No absen(s) found...</td></tr>
        <?php } ?>
        </tbody>
     </table>
    </div>
    </div>
    </div>
  </div>
 </div>
</div>

</body>
</html>







<div class="row">
 <div class="col-12">
  <div class="card mb-4">
   <div class="card-header pb-0">
    <h6>Cetak Rekap Absen</h6>
   </div>
   <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-5">
    <form role="form" action="cetak.php" method="post">
          <label>Tanggal</label>
                    <div class="mb-3">
                      <input type="date" class="form-control" placeholder="Username" name="tanggal1" aria-label="Username" aria-describedby="email-addon">
                    </div>
                    <label>Tanggal</label>
                    <div class="mb-3">
                      <input type="date" class="form-control" placeholder="Password" name="tanggal2" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Cetak</button>
                    </div>
                  </form>
    </div>
   </div>
  </div>
 </div>
</div>



<div class="row">
 <div class="col-12">
  <div class="card mb-4">
   <div class="card-header pb-0">
    <h6>Rekap Absen <?=date('d-m-Y')?></h6>
   </div>
   <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
     <table id="example" class="table align-items-center mb-0">
      <thead>
       <tr>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telepon</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absen Masuk</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absen Pulang</th>
       </tr>
      </thead>
      <tbody>

       <?php
       $query3 = "SELECT * FROM absen a LEFT JOIN pegawai b ON a.id_guru=b.id_user WHERE tgl_absen=CURDATE()";

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
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $data['nama_guru']  ?></span></td>
         <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $data['tlp']  ?></span></td>
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