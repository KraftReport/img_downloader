<?php 
    if(isset($_POST['download'])){
        $imgUrl = $_POST['imgurl'];
        $ch = curl_init($imgUrl);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $download = curl_exec($ch);
        curl_close($ch);
        header('Content-type: image/jpg');
        header('Content-Disposition: attachment; filename="thumbnail.jpg"');
        echo $download;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <header>Thumbnail Downloader</header>
        <div class="url-input">
            <span class="title">Paste video url:</span>
            <div class="field">
                <input type="text" placeholder="you link " required>
                <input type="hidden" class="hidden-input" name="imgurl">
                <div class="bottom-line"></div>
            </div>
        </div>
        <div class="preview-area">
            <img  class="thumbnail" src="" alt="">
            <i class="icon fas fa-cloud-download-alt"></i>
            <span>Paste video url to see the preview</span>
        </div>
        <button class="download-btn" type="submit" name="download">Download</button>
    </form>
</body>
<script src="app.js"></script>

<script src="https://kit.fontawesome.com/e2397b357b.js" crossorigin="anonymous"></script>
</html>