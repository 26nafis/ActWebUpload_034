<?php

if(isset($_GET['file'])){

    $file = $_GET['file'];

    if(file_exists($file)){

        unlink($file);

        echo "
        <script>
            alert('File berhasil dihapus');
            window.location='index.php';
        </script>
        ";

    }else{

        echo "File tidak ditemukan.";
    }
}
?>