<?php

$folder = "uploads/";

$files = array_diff(scandir($folder), array('.', '..'));

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>List Data Upload</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    min-height:100vh;
    padding:40px;
}

.container{
    max-width:1200px;
    margin:auto;
}

.title{
    text-align:center;
    color:white;
    margin-bottom:30px;
}

.gallery{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

.card{
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 20px rgba(0,0,0,0.2);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.content{
    padding:15px;
}

.filename{
    font-weight:bold;
    margin-bottom:15px;
    word-break:break-all;
}

.btn{
    display:inline-block;
    padding:10px 15px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    font-size:14px;
    margin-right:5px;
    margin-top:5px;
}

.download{
    background:#4caf50;
}

.delete{
    background:#f44336;
}

.upload{
    background:#2196f3;
    margin-bottom:30px;
}

.empty{
    background:white;
    padding:30px;
    border-radius:15px;
    text-align:center;
    font-size:18px;
}

</style>

</head>
<body>

<div class="container">

    <h1 class="title">📂 List Data Upload</h1>

    <center>
        <a href="index.php" class="btn upload">
            ⬆ Upload File Baru
        </a>
    </center>

    <?php if(empty($files)){ ?>

        <div class="empty">
            Belum ada file upload.
        </div>

    <?php } else { ?>

    <div class="gallery">

        <?php foreach($files as $file){ ?>

        <div class="card">

            <img src="uploads/<?php echo $file; ?>">

            <div class="content">

                <div class="filename">
                    <?php echo $file; ?>
                </div>

                <a 
                    href="uploads/<?php echo $file; ?>"
                    download
                    class="btn download"
                >
                    ⬇ Download
                </a>

                <a 
                    href="delete.php?file=uploads/<?php echo $file; ?>"
                    class="btn delete"
                    onclick="return confirm('Yakin ingin menghapus file ini?')"
                >
                    🗑 Delete
                </a>

            </div>

        </div>

        <?php } ?>

    </div>

    <?php } ?>

</div>

</body>
</html>