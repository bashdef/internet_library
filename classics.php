<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Library</title>
</head>
<body>
    <form method="get" style="width: 100px; margin-left: 1850px; position: absolute; margin-top: 16px;">
        <div class="d-flex flex-column row g-3">
            <div class="col-auto">
                <button type="submit" name="login" class="btn btn-primary" value="1" style="width: 100px;">Войти</button>
            </div>
    <?php
    require_once 'dbconnect.php';
    if(isset($_GET['login']) && $_GET['login'] == 1){
        ?>
            <div class="col-auto">
                <button type="submit" name="logout" class="btn btn-primary" value="0" style="width: 100px;">Выйти</button>
            </div>
        </div>
    </form>
        <?php
        require_once 'classics_del.php';
        require_once 'classics_edit.php';
        require_once 'classics_add.php';
        require_once 'classics_view.php';
    }
    ?>
</body>
</html>
