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