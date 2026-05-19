<?php

$target_dir = "uploads/";

if(!file_exists($target_dir)){
    mkdir($target_dir,0777,true);
}

$file_name = basename($_FILES["fileToUpload"]["name"]);

$target_file = $target_dir . $file_name;

$uploadOk = 1;

$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])){

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false){

        $uploadOk = 1;

    }else{

        $uploadOk = 0;

        $message = "Berkas bukan gambar.";

    }
}

if(file_exists($target_file)){

    $uploadOk = 0;

    $message = "File sudah ada.";
}

if($_FILES["fileToUpload"]["size"] > 500000){

    $uploadOk = 0;

    $message = "Ukuran file terlalu besar.";
}

if(
    $fileType != "jpg" &&
    $fileType != "png" &&
    $fileType != "jpeg" &&
    $fileType != "gif"
){

    $uploadOk = 0;

    $message = "Hanya JPG, JPEG, PNG & GIF.";
}

if($uploadOk == 1){

    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){

        $message = "✅ File berhasil diupload.";

    }else{

        $message = "❌ Gagal upload file.";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hasil Upload</title>

<style>

body{
    font-family:Arial;
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.container{
    background:white;
    width:500px;
    padding:30px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

img{
    width:100%;
    border-radius:15px;
    margin-top:20px;
}

.btn{
    display:inline-block;
    margin-top:15px;
    padding:12px 20px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    font-weight:bold;
}

.download{
    background:#4caf50;
}

.delete{
    background:#f44336;
}

.back{
    background:#2196f3;
}

</style>

</head>
<body>

<div class="container">

<h2>Hasil Upload</h2>

<p><?php echo $message; ?></p>

<?php if($uploadOk == 1){ ?>

<img src="<?php echo $target_file; ?>">

<br>

<a 
    href="<?php echo $target_file; ?>" 
    download
    class="btn download"
>
⬇ Download
</a>

<a 
    href="delete.php?file=<?php echo $target_file; ?>"
    class="btn delete"
>
🗑 Delete
</a>

<?php } ?>

<br>

<a href="index.php" class="btn back">
⬅ Kembali
</a>

</div>

</body>
</html>