<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Upload</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#4facfe,#00f2fe);
            padding:20px;
        }

        .container{
            background:white;
            width:450px;
            padding:35px;
            border-radius:20px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        h2{
            margin-bottom:10px;
            color:#333;
        }

        p{
            color:#666;
            margin-bottom:20px;
        }

        input[type=file]{
            width:100%;
            padding:12px;
            border:2px dashed #4facfe;
            border-radius:10px;
            background:#f9f9f9;
            cursor:pointer;
        }

        .btn{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background:#2196f3;
            color:white;
            font-size:16px;
            margin-top:15px;
            cursor:pointer;
            transition:0.3s;
            font-weight:bold;
        }

        .btn:hover{
            background:#0b7dda;
        }

        #preview{
            width:100%;
            margin-top:20px;
            border-radius:15px;
            display:none;
            box-shadow:0 5px 15px rgba(0,0,0,0.2);
        }

    </style>
</head>
<body>

<div class="container">

    <h2>📁 Web Upload</h2>

    <p>Upload gambar Anda</p>

    <form action="upload.php" method="post" enctype="multipart/form-data">

        <input 
            type="file" 
            name="fileToUpload" 
            id="fileToUpload"
            accept="image/*"
            onchange="previewImage(event)"
            required
        >

        <img id="preview">

        <button type="submit" name="submit" class="btn">
            Upload File
            <a href="gallery.php" class="btn" style="display:block; text-decoration:none; margin-top:10px;">
    📂 Lihat List Upload
</a>
        </button>

    </form>

</div>

<script>

function previewImage(event){

    const preview = document.getElementById('preview');

    preview.src = URL.createObjectURL(event.target.files[0]);

    preview.style.display = "block";
}

</script>

</body>
</html>