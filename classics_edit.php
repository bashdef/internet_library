<?php
if(!empty($_GET['red']) && !empty((int)$_GET['classics_id'])){
        ?>
        <form action="" method="post" style="width: 200px;">
            <div class="row g-3 d-flex flex-column" style="margin-left: 200px; position: absolute; margin-top: 0px;">
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
                    <button type="submit" name="submit" value="Редактировать" class="btn btn-primary" style="width: 200px;">Редактировать</button>
                </div>
            </div>
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