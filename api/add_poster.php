<?php
include_once "db.php";

if (isset($_FILES['poster']['tmp_name'])) {
  move_uploaded_file($_FILES['poster']['tmp_name'], "../img/{$_FILES['poster']['name']}");
  // 配合資料表欄位
  $_POST['img'] = $_FILES['poster']['name'];
}

$_POST['sh'] = 1;
// 之後排序時，會使用到的欄位 [ 'rank' ]；這裡不能直接用 id，因為還沒有新增進去
$_POST['rank'] = $Poster->max('id') + 1;
// 這裡用亂數，來決定動畫種類
$_POST['ani'] = rand(1, 3);

$Poster->save($_POST);
to("../back.php?do=poster");
