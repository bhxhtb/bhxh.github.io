<link rel="stylesheet" type="text/css" href="style.css">
<?php
error_reporting(0);
include "config.php";
include "function.php";
$dangnhap = dangnhap();
$access_token = $dangnhap["APIKey"]["access_token"];
$id_token = $dangnhap["APIKey"]["id_token"];
$result = ChitietHS($_GET["mahoso"]);
$result = $result["hoSoKCB"]["xml1"];
foreach ($result as $k =>$v) {
	if ($k == "dsXml2") {
		$dsxml2 = $v;
	}
	if ($k == "dsXml3") {
		$dsxml3 = $v;
	}	
		if ($k == "dsXml4") {
		$dsxml4 = $v;
	}
	if ($k == "dsXml5") {
		$dsxml5 = $v;
	}	
}
echo "
Họ tên: {$result["HoTen"]} &nbsp;&nbsp;&nbsp;&nbsp; Năm sinh: ".substr($result["NgaySinh"],0,4) ." <br>
Mã thẻ: {$result["MaThe"]} &nbsp;&nbsp;&nbsp;&nbsp; Mức hưởng {$result["MucHuong"]}%<br>
Địa chỉ: {$result["DiaChi"]} <br>
Ngày vào: ".substr($result["NgayVao"],6,2)."/".substr($result["NgayVao"],4,2) . "/".substr($result["NgayVao"],0,4) ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày ra: ".substr($result["NgayRa"],6,2)."/".substr($result["NgayRa"],4,2) . "/".substr($result["NgayRa"],0,4) ."<br>
Chẩn đoán: {$result["MaBenh"]} - {$result["TenBenh"]} <br>
CSKCB ID: {$result["CosokcbId"]}  <br>
Tổng chi: {$result["TTongchi"]} <br>
Tiền BN: {$result["TBntt"]} <br>
Tiền BH: {$result["TBhtt"]} <br>
<table>
<tr align='center'>
<td>Nội dung</td>
<td>Đơn vị tính</td>
<td>Số lượng</td>
<td style='width: 150px'>Đơn giá * % mức hưởng(đồng)</td>
<td style='width: 150px'>BH thanh toán (đồng)</td>


</tr>";
foreach ($xml3 as $v) {
	
	echo "<tr>
	<td>" . $v["TenDichVu"] ."</td>
	<td>" . $v["DonViTinh"] ."</td>
	<td align='right'>" . $v["SoLuong"] ."</td>
	<td align='right'>" . $v["DonGia"] ."</td>
	
	<td align='right'>" . $v["ThanhTien"] ."</td>
	</tr>";
}
foreach ($xml2 as $v) {
	echo "<tr>
	<td>" . $v["TenThuoc"] ."</td>
	<td>" . $v["DonViTinh"] ."</td>
	<td align='right'>" . $v["SoLuong"] ."</td>
	<td align='right'>" . $v["DonGia"] ."</td>
	<td align='right'>" . $v["ThanhTien"] ."</td>
	</tr>";
}
echo  "</table>";
//$result = $result["MaGd"];
//print_r($result);
//var_dump($result);
?>