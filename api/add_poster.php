<?php
include_once "db.php";

if (isset($_FILES['poster']['tmp_name'])) {
  move_uploaded_file($_FILES['poster']['tmp_name'], "../img/{$_FILES['poster']['name']}");
  // 配合資料表欄位
  $_POST['img'] = $_FILES['poster']['name'];
}

$_POST['sh'] = 1;
// 這裡要重聽，不太懂這麼寫的原因
$_POST['rank'] = $Poster->max('id') + 1;
$_POST['ani'] = rand(1, 3);

$Poster->save($_POST);
to("../back.php?do=poster");
