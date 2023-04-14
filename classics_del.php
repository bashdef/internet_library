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