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
    <form method="get">
        <button type="submit" name="login" class="btn btn-primary" value="1">Войти</button>
    <?php
    require_once 'dbconnect.php';
    if(isset($_GET['login']) && $_GET['login'] == 1){
        ?>
        <button type="submit" name="logout" class="btn btn-primary" value="0">Выйти</button>
    </form>
        <?php
        // Если флаг на удаление и идентификатор записи не пустой
        // то удаляем запись
        if (!empty($_GET['del']) && !empty((int)$_GET['classics_id'])) {
            $id = (int)$_GET['classics_id'];
            $query = "DELETE FROM classics WHERE classics_id=$id";
            $res = mysqli_query($mysqli, $query);
 
            if (!$res) die (mysqli_error($mysqli));
            // Если количество затронутых запростом записей равно 1 (одна запись удалена)
            // то выводим сообщение
            if (mysqli_affected_rows($mysqli) == 1) {
                echo "<h2>Запись с id = $id удалена</h2>";
            }
        }
        if(!empty($_GET['red']) && !empty((int)$_GET['classics_id'])){
        ?>
            <form action="" method="post">
                <label class="form-label">Author <input type="text" name="author" class="form-control" style="width: 200px;"></label>
                <label class="form-label">Title <input type="text" name="title" class="form-control" style="width: 200px;"></label>
                <label class="form-label">Category <input type="text" name="type" class="form-control" style="width: 200px;"></label>
                <label class="form-label">Year <input type="text" name="year" class="form-control" style="width: 200px;"></label>
                <input type="submit" name="submit" value="Редактировать" class="form-control" style="width: 812px;">
            </form>
        <?php
            if(!empty($_POST['submit']) && $_POST['submit'] == 'Редактировать'){
                $author = strip_tags($_POST['author']);
                $title = strip_tags($_POST['title']);
                $type = strip_tags($_POST['type']);
                $year = strip_tags($_POST['year']);
                $id = (int)$_GET['classics_id'];
                $query = "UPDATE classics SET author = '$author', title = '$title', type = '$type', year = '$year' WHERE classics_id=$id";
                $res = mysqli_query($mysqli, $query);
                if (!$res) die (mysqli_error($mysqli));
                // Если количество затронутых запростом записей равно 1 (одна запись отредактирована)
                // то выводим сообщение
                if (mysqli_affected_rows($mysqli) == 1) {
                    echo "<h2>Запись отредактирована</h2>";
                }
                header('Location: /lab6/classics.php?login=1');
            }
    }

    // Если флаг на добавление, до добавляем запись
    if(!empty($_POST['submit']) && $_POST['submit'] == 'Добавить'){
        $author = strip_tags($_POST['author']);
        $title = strip_tags($_POST['title']);
        $type = strip_tags($_POST['type']);
        $year = strip_tags($_POST['year']);
        $query = "INSERT INTO classics (author, title, type, year) VALUES ('$author', '$title', '$type', '$year')";
        $res = mysqli_query($mysqli, $query);
        if (!$res) die (mysqli_error($mysqli));
        // Если количество затронутых запростом записей равно 1 (одна запись добавлена)
        // то выводим сообщение
        if (mysqli_affected_rows($mysqli) == 1) {
            echo "<h2>Запись добавлена</h2>";
        }
        header('Location: /lab6/classics.php?login=1');
    }
    ?>
        <form action="" method="post">
            <label class="form-label">Author <input type="text" name="author" class="form-control" style="width: 200px;"></label>
            <label class="form-label">Title <input type="text" name="title" class="form-control" style="width: 200px;"></label>
            <label class="form-label">Category <input type="text" name="type" class="form-control" style="width: 200px;"></label>
            <label class="form-label">Year <input type="text" name="year" class="form-control" style="width: 200px;"></label>
            <input type="submit" name="submit" value="Добавить" class="form-control" style="width: 812px;">
        </form>
    <?php
    $query = "SELECT * FROM classics";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <p>
    <h2><?= $row['title']; ?> <a href="?login=1&del=ok&classics_id=<?= $row['classics_id']; ?>">уд.</a> <a href="?login=1&red=ok&classics_id=<?= $row['classics_id']; ?>">ред.</a></h2>
    <?= $row['author']; ?><br>
    Category: <?= $row['type']; ?><br>
    Year: <?= $row['year']; ?><br>
    </p>
    <?php
        }
    }
    ?>
</body>
</html>
