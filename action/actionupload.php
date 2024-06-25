<?php 
 
 session_start();
 include("../config/koneksi.php");
// Include PhpSpreadsheet library autoloader 
require_once '../vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Reader\Xls; 
 
if(isset($_POST['importSubmit'])){ 
     
    // Allowed mime types 
    $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
     
    // Validate whether selected file is a Excel file 
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)){ 
         
        // If the file is uploaded 
        if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
            $reader = new Xls(); 
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
            $worksheet = $spreadsheet->getActiveSheet();  
            $worksheet_arr = $worksheet->toArray(); 
 
            // Remove header row 
            unset($worksheet_arr[0]); 

			array_shift($worksheet_arr);
            array_shift($worksheet_arr);
            array_shift($worksheet_arr);
 
            foreach($worksheet_arr as $row){ 
                $nama = $row[1]; 
                $departemen = $row[2]; 
                $status = $row[3]; 
                $tanggal= date("Y-m-d");


                $jam_masuk = "";
                $jam_keluar = "";

                // Set status
                if($status == 3){
                    $status_text = "Hadir";
                    $jam_masuk = "08:00:00";
                    $jam_keluar = "17:00:00";
                } else {
                    $status_text = "Tidak Hadir";
                }
 
                    // Insert member data in the database 
                    $conn->query("INSERT INTO laporan (nama, departemen, tanggal, status, jam_masuk, jam_keluar) VALUES ('".$nama."', '".$departemen."', '".$tanggal."', '".$status_text."','".$jam_masuk."', '".$jam_keluar."')");
                
            }
              
        }else{ 
        } 
    }else{ 
    } 
} 
 
// Redirect to the listing page 
header("Location: ../user/index.php?page=rekapabsen"); 
 
?>