<?php
include_once "db.php";



if (!empty($_FILES['trailer']['tmp_name'])) {
  move_uploaded_file($_FILES['trailer']['tmp_name'], "../img/{$FILES['trailer']['name']}");
  $_POST['trailer'] = $_FILES['trailer']['name'];
}

// 為甚麼圖片沒上傳，會抓不到圖片 ?

if (!empty($_FILES['poster']['tmp_name'])) {
  move_uploaded_file($_FILES['poster']['tmp_name'], "../img/{$FILES['poster']['name']}");
  $_POST['poster'] = $_FILES['poster']['name'];
}

$_POST['ondate'] = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['date'];
unset($_POST['year'], $_POST['month'], $_POST['date']);

// 為了讓 新增院線片、編輯院線片 共用這個程式
if (!isset($_POST['id'])) {
  $_POST['sh'] = 1;
  $_POST['rank'] = $Movie->max('id') + 1;
}

$Movie->save($_POST);
to("../back.php?do=movie");
