
$( "#qr" ).change(function()  {

	var sobhyt_catchuoi = $( "#qr" ).val().split("|");

	$("#sobhyt").val(sobhyt_catchuoi[0].trim());

	$("#hoten").val(convert_utf8totext(sobhyt_catchuoi[1]));

	$("#namsinh").val(sobhyt_catchuoi[2]);
	$("#cbgioitinh").val(sobhyt_catchuoi[3] == "1" ? "1" : "2");
	//$("#cbgioitinh").val(sobhyt_catchuoi[3] == "1" ? "true" : "false");
	try {
		$("#diachi").val(convert_utf8totext(sobhyt_catchuoi[4]));
	} catch (e) {
		$("#diachi").val("");
	}
	var noidk = sobhyt_catchuoi[5].trim().replace(" - ", "");
	$("#noidangky").val(noidk);

	$("#tungay").val(sobhyt_catchuoi[6]);
	$("#denngay").val(sobhyt_catchuoi[7]);

});
function Utf8ArrayToStr(array) {
    var out, i, len, c;
    var char2, char3;

    out = "";
    len = array.length;
    i = 0;
    while (i < len) {
        c = array[i++];
        switch (c >> 4)
        {
            case 0:
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
                // 0xxxxxxx
                out += String.fromCharCode(c);
                break;
            case 12:
            case 13:
                // 110x xxxx   10xx xxxx
                char2 = array[i++];
                out += String.fromCharCode(((c & 0x1F) << 6) | (char2 & 0x3F));
                break;
            case 14:
                // 1110 xxxx  10xx xxxx  10xx xxxx
                char2 = array[i++];
                char3 = array[i++];
                out += String.fromCharCode(((c & 0x0F) << 12) |
                        ((char2 & 0x3F) << 6) |
                        ((char3 & 0x3F) << 0));
                break;
        }
    }

    return out;
}
function convert_utf8totext(str) {
    var length = str.length;
    var array = new Uint8Array(length / 2);
	
    for (i = 0; i < length; i += 2)
    {
        array[i / 2] = '0x' + str.substr(i, 2);
		//alert(str.substr(i, 2));
    }

    return Utf8ArrayToStr(array);
}