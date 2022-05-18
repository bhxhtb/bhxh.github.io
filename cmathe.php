<?php
error_reporting(0);
include "config.php";
include "function.php";
include "tiengviet.php";
$dangnhap = dangnhap();
$access_token = $dangnhap["APIKey"]["access_token"];
$id_token = $dangnhap["APIKey"]["id_token"];

$mathe = array(
	"maThe" => $_GET["mathe"],
	"hoTen" => chuhoa($_GET["hoten"]),
	"ngaySinh" => $_GET["namsinh"],
	"gioiTinh" =>  $_GET["gioi"],
	"maCSKCB" => $_GET["macs"],
	"ngayBD" => "",
	"ngayKT" => ""
);

//var_dump($mathe);
$result = LichsuKB595($mathe);
$kq = ketquacheckthe595($result["maKetQua"]);
if ($result["maKetQua"] == "000") $suss = 1;

//var_dump($result) ;
?>
<script type='text/javascript' src="http://10.0.0.100/medi/qlbv/files/jquery-1.10.2.js"></script>
<SCRIPT type=text/javascript chars9et=utf-8>

	$(document).ready(function () {
		//parent.ketqua(<?php echo $_GET["mabn"].',"'. $kq.'"';?>);

		$("#tr<?php echo $_GET["mabn"];?>", window.parent.document).addClass("rs<?php echo substr($result["maKetQua"],0,2);?>");
		$("#kt<?php echo $_GET["mabn"];?>", window.parent.document).html("<?php echo $kq;?>");

	});
</SCRIPT>	
<?php echo $kq;?>
