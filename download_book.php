<?php 
// Define file name and path 

$bookname = $_GET['b'];

$fileName = $bookname; 
$filePath = 'assets/books/pdf/'.$fileName; 
 
if(!empty($fileName) && file_exists($filePath)){ 
    // Define headers 
    header("Cache-Control: public"); 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$fileName"); 
    header("Content-Type: application/zip"); 
    header("Content-Transfer-Encoding: binary"); 
     
    // Read the file 
    readfile($filePath); 
    exit; 
}else{ 
    echo 'The file does not exist.'; 
}