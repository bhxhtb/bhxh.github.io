<?php
error_reporting(0);
include "config.php";
include "function.php";
$dangnhap = dangnhap();
$access_token = $dangnhap["APIKey"]["access_token"];
$id_token = $dangnhap["APIKey"]["id_token"];
$mathe = array(
	"maThe" => str_replace("-","",$_POST["sobhyt"]),
	"hoTen" => $_POST["hoten"],
	"ngaySinh" => $_POST["namsinh"],
	"gioiTinh" =>  $_POST["gioitinh"],
	"maCSKCB" => $_POST["noidangky"],
	"ngayBD" => $_POST["tungay"],
	"ngayKT" => $_POST["denngay"]
);
$result = LichsuKB595($mathe);
/*
echo "<pre>";
var_dump($result);
echo "</pre>";
//*/
$kq = ketquacheckthe595($result["maKetQua"]);
/*
if ($mathe["maCSKCB"] == "" && $result["maKetQua"] == "090") {
	$kq = "THÔNG TIN THẺ CHÍNH XÁC";
	$class = "";
} else {
	$kq = "THẺ SAI NƠI ĐKKCB BAN ĐẦU";
}	
//*/
echo $kq;
thongtinhanhchinhthe($result);
thongtinlichsukcb($result);
//var_dump($result) ;

?>
