<?php
include 'conn.php';
if(isset($_GET['genQr'])){
    $genQr = $_GET['genQr'];
    $sql = mysqli_query($conn,"SELECT * FROM books WHERE b_id = $genQr");

    $row = mysqli_fetch_array($sql);
        $b_id = $row['b_id'];

    //QRCODE
    include "../../phpqrcode/qrlib.php";
    $PNG_TEMP_DIR = '../../temp/';
    if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

    $filename = $PNG_TEMP_DIR . 'test.png';
    $codeString = $row['b_id'];
    $filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';
    QRcode::png($codeString, $filename);
    echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><hr/>';
    //END OF QRCODE 

    $insert = mysqli_query ($conn,"UPDATE books SET qrcode = '$filename' WHERE b_id = $genQr");
    }
    header('location: view_book.php');
?>

