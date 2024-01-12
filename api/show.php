<?php
include_once "db.php";

$row = $Movie->all($_POST['id']);

// 方法一
$row['sh'] = ($row['sh'] == 1) ? 0 : 1;

// 方法二，較不會消耗資源
// $row['sh'] = ($row['sh'] + 1) % 2;
$Movie->save($row);
