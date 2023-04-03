<?php
$mod = $_REQUEST['mod'];
switch ($mod) {
case "home":
require("index.php");
break;
case "hapus":
require("hapus.php");
break;
case "tambah":
require("tambah.php");
break;
case "ubah":
require("ubah.php");
break;
}
?>