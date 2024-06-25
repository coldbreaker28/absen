<?php 
 
// Load the database configuration file 
include_once 'koneksi.php'; 
 
// Include PhpSpreadsheet library autoloader 
require_once 'vendor/autoload.php'; 
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
            unset($worksheet_ar[0]); 

			array_shift($worksheet_arr);
            array_shift($worksheet_arr);
            array_shift($worksheet_arr);
 
            foreach($worksheet_arr as $row){ 
                $nama = $row[1]; 
                $departemen = $row[2]; 
                $tanggal = $row[3]; 
 
                    // Insert member data in the database 
                    $conn->query("INSERT INTO laporan (nama, departemen, tanggal) VALUES ('".$nama."', '".$departemen."', '".$tanggal."')"); 
                
            }
              
        }else{ 
        } 
    }else{ 
    } 
} 
 
// Redirect to the listing page 
header("Location: index.php"); 
 
?>