<?php
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
        <form action="" method="post" style="width: 200px;">
            <div class="row g-3 d-flex flex-column">
                <div class="col-auto">
                    <input type="text" name="author" class="form-control" style="width: 200px;" placeholder="Author">
                </div>
                <div class="col-auto">
                    <input type="text" name="title" class="form-control" style="width: 200px;" placeholder="Title">
                </div>
                <div class="col-auto">
                    <input type="text" name="type" class="form-control" style="width: 200px;" placeholder="Category">
                </div>
                <div class="col-auto">
                    <input type="text" name="year" class="form-control" style="width: 200px;" placeholder="Year">
                </div>
                <div class="col-auto">
                    <button type="submit" name="submit" value="Добавить" class="btn btn-primary" style="width: 200px;">Добавить</button>
                </div>
            </div>
        </form>
        