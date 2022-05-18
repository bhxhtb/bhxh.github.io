<?php
error_reporting(0);
include "config.php";
include "function.php";
$dangnhap = dangnhap();
$access_token = $dangnhap["APIKey"]["access_token"];
$id_token = $dangnhap["APIKey"]["id_token"];

$mathe = array(
	"maThe" => $_POST["mathe"],
	"hoTen" => $_POST["hoten"],
	"ngaySinh" => $_POST["namsinh"],
	"gioiTinh" =>  $_POST["gioi"],
	"maCSKCB" => "",
	"ngayBD" => "",
	"ngayKT" => ""
);
$result = LichsuKB595($mathe);
$kq = ketquacheckthe595($result["maKetQua"]);
echo $kq;
thongtinhanhchinhthe($result);
thongtinlichsukcb($result);
?>