<?php
Function dangnhap() {
	Global $username,$password;
	$user = array(
		'username' => $username,
		'password' => $password
	);
	$param = json_encode($user);
	$url = 'http://egw.baohiemxahoi.gov.vn/api/token/take';
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result, true);
}	
Function LichsuKB($mathe) {
	Global $username,$password,$access_token,$id_token;
	$param = json_encode($mathe);	
	$url = "http://egw.baohiemxahoi.gov.vn/api/egw/NhanLichSuKCB2018?token=$access_token&id_token=$id_token&username=$username&password=$password";
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$result = curl_exec($ch);
	curl_close($ch);	
	return json_decode($result, true);
}
Function LichsuKB595($mathe) {
	Global $username,$password,$access_token,$id_token;
	if ($mathe["gioiTinh"] <> "1") $mathe["gioiTinh"] = "2";
	$param = json_encode($mathe);	
	$url = "https://egw.baohiemxahoi.gov.vn/api/egw/KQNhanLichSuKCB2019?token=$access_token&id_token=$id_token&username=$username&password=$password";
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$result = curl_exec($ch);
	curl_close($ch);	
	return json_decode($result, true);
}
Function ketquacheckthe($maketqua) {
	Global $maketquacheckthe;
	if (array_key_exists($maketqua, $maketquacheckthe)) {
		return $maketquacheckthe[$maketqua];
	} else {
		return "Mã kết quả chưa biết - liên hệ với BHXH mã($maketqua)";
	}
}
Function thongtinhanhchinhthe($result) {
	if($result["hoTen"]){
        Echo "<div>
	<strong>Thông tin hành chính (Kết quả trả về từ BHXH) </strong><br>
	Thông báo: $result[ghiChu] <br>
	Họ và tên: $result[hoTen] <br>
	Giới tính: $result[gioiTinh] <br>
	Địa chỉ: $result[diaChi] <br>
	Nơi ĐK KCB BĐ: $result[maDKBD] - {$thongtincskcb->ten}<br>
	Giá trị thẻ từ: $result[gtTheTu] <br>
	Giá trị thẻ đến: $result[gtTheDen] <br>
	Mã khu vực: $result[maKV] <br>
	Ngày đủ 5 năm: $result[ngayDu5Nam] <br>
	Cơ quan BHXH: $result[cqBHXH] <br>
	Mã số BHXH: $result[maSoBHXH] <br>
	Mã thẻ cũ: $result[maTheCu] <br>
	Mã thẻ mới: $result[maTheMoi] <br>
	Giá trị thẻ mới từ: $result[gtTheTuMoi] <br>
	Giá trị thẻ mới đến: $result[gtTheDenMoi] <br>
	</div>";
	}
}
Function thongtinlichsukcb($result) {
	global $ketqua, $tinhtrang;
	if(is_array($result["dsLichSuKCB2018"])){
	echo "<br><strong>Lịch sử KCB</strong>
	<table>
	<tr align='center'>
	<td style='font-weight:bold;'><center><h4>Mã hồ sơ</center></h4></td>
	<td style='font-weight:bold;'><center><h4>Cơ sở KCB</center></h4></td>
	<th style='font-weight:bold;'><center><h4>Ngày vào</center></h4></th>
	<th style='font-weight:bold;'><center><h4>Ngày ra</center></h4></th>
	<th style='font-weight:bold;'><center><h4>Tình trạng</center></h4></th>
	<th style='font-weight:bold;'><center><h4>Kết quả điều trị</center></h4></th>
	</tr";
	foreach ($result["dsLichSuKCB2018"] as $ls) {
		echo "
		<tr align='center'>
		<td><center>" . $ls["maHoSo"] . "</center></td>
		<td><center>" . $ls["maCSKCB"]. "</center></td>
		<td><center>". date('d/m/Y H:i', strtotime($ls['ngayVao']))."</center></td>
		<td><center>". date(' d/m/Y H:i', strtotime($ls['ngayRa']))."</center></td>
		<td><center>" . $tinhtrang[$ls["tinhTrang"]] . "</center></td>
		<td><center>" . $ketqua[$ls["kqDieuTri"]] . "</center></td>
		</tr>";				
	}
	echo "</table>";			
	}
}

Function ketquacheckthe595($maketqua) {
	Global $maketquacheckthe595;
	if (array_key_exists($maketqua, $maketquacheckthe595)) {
		return $maketquacheckthe595[$maketqua];
	} else {
		return "Mã kết quả chưa biết - liên hệ với BHXH mã($maketqua)";
	}
}
Function ChitietHS($maHoSo) {
	Global $username,$password,$access_token,$id_token;
	$url = "http://egw.baohiemxahoi.gov.vn/api/egw/nhanHoSoKCBChiTiet?token=$access_token&id_token=$id_token&username=$username&password=$password&maHoSo=$maHoSo";
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, "");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$result = curl_exec($ch);	
	return json_decode($result, true);
}
?>
