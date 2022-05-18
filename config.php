<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$username = '49475_BV'; // Tên đăng nhập
$password = md5('123456'); //Mật khẩu 
$tinhtrang = array(
	1 => "Ra viện", 
	2 => "Chuyển viện", 
	3 => "Trốn viện",
	4 => "Xin ra viện"
);
$ketqua = array(
	1 => "Khỏi", 
	2 => "Đỡ", 
	3 => "Không thay đổi",
	4 => "Nặng hơn",
	5 => "Tử vong"
);
$maketquacheckthe = array(
	"00" => "Thông tin thẻ chính xác",
	"01" => "Thẻ hết giá trị sử dụng",
	"02" => "KCB khi chưa đến hạn",
	"03" => "Hết hạn thẻ khi chưa ra viện",
	"04" => "Thẻ có giá trị khi đang nằm viện",
	"05" => "Mã thẻ không có trong dữ liệu thẻ",
	"06" => "Thẻ sai họ tên",
	"07" => "Thẻ sai ngày sinh",
	"08" => "Thẻ sai giới tính",
	"09" => "Thẻ sai nơi đăng ký KCB ban đầu"
);
$maketquacheckthe595 = array(
	"000" => "Thông tin thẻ chính xác",
	"001" => "Hệ thống không có thông tin thẻ do BHXH Bộ Quốc Phòng quản lý, đề nghị kiểm tra thẻ và thông tin giấy tờ tùy thân và khám chữa bệnh BHYT theo quy định",
	"002" => "Hệ thống không có thông tin thẻ do BHXH Bộ Công An quản lý, đề nghị kiểm tra thẻ và thông tin giấy tờ tùy thân và khám chữa bệnh BHYT theo quy định",
	"010" => "Thẻ hết giá trị sử dụng",
	"051" => "Mã thẻ không đúng",
	"052" => "Mã tỉnh cấp thẻ(kí tự thứ 4, 5 của mã thẻ) không đúng",
	"053" => "Mã quyền lợi thẻ(kí tự thứ 3 của mã thẻ) không đúng",
	"050" => "Không thấy thông tin thẻ bhyt",
	"060" => "Thẻ sai họ tên",
	"061" => "Thẻ sai họ tên(đúng kí tự đầu)",
	"070" => "Thẻ sai ngày sinh",
	"080" => "Thẻ sai giới tính",
	"090" => "Thẻ sai nơi đăng ký KCB ban đầu",
	"100" => "Lỗi khi lấy dữ liệu sổ thẻ",
	"101" => "Lỗi server",
	"110" => "Thẻ đã thu hồi",
	"120" => "Thẻ đã báo giảm",
	"121" => "Thẻ đã báo giảm. Giảm chuyển ngoại tỉnh",
	"122" => "Thẻ đã báo giảm. Giảm chuyển nội tỉnh",
	"123" => "Thẻ đã báo giảm. Thu hồi do tăng lại cùng đơn vị",
	"124" => "Thẻ đã báo giảm. Ngừng tham gia",
	"130" => "Trẻ em không xuất trình thẻ",
	"205" => "Thiếu 1 trong số các thông tin: Họ tên, số thẻ, năm sinh, giới tính, đăng ký KCB ban đầu",
	"0" => ""
);
?>