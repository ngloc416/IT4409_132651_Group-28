
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body class="div">
	<div class="div2">

<div class="div3">
<ul >
	<li class="list">ĐẠI HỌC BÁCH KHOA HÀ NỘI</li>
	<li class="list">TRƯỜNG CNTT</li>
</ul>
<ul>
	<li class="list">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</li>
	<li class="list">Độc lập - Tự do - Hạnh phúc</li>
</ul>
</div>
<div align="center">ĐƠN XIN ĐĂNG KÝ HỌC PHẦN</div>
<br><br>

<?php
$name=$_POST['names'];
$mssv=$_POST['mssv'];
$class=$_POST['class'];
$mail=$_POST['email'];
$address=$_POST['address'];
$mhp=$_POST['mhp'];
$thp=$_POST['thp'];
$mlh=$_POST['mlh'];

echo "&nbsp Kính gửi: &nbsp;&nbsp Viện Công Nghệ Thông Tin & Truyền Thông <br><br>";
echo "&nbsp Họ và tên sinh viên: &nbsp $name <br><br>";
echo "&nbsp Mã số sinh viên: &nbsp    $mssv <br><br>";
echo "&nbsp Lớp:         &nbsp        $class <br><br>";
echo "&nbsp Gmail:  &nbsp   $mail <br><br>";
echo "&nbsp Địa chỉ thường chú:   &nbsp  $address <br><br>";
	?>
<p>&nbsp Tôi viết đơn này kính mong quý Viện tạo điều kiện đăng ký giúp tôi các môn học sau:</p>
<div>
<table border="1" style="width:70%; height: 20px;" class="table">
	<tr>
		<th style="width: 15%;">Mã HP</th>
		<th style="width: 40%;" >Tên HP</th>
		<th style="width: 15%;">Mã Lớp</th>
	</tr>
	<tr>
<td>
<?php
echo $mhp;
?>
</td>
<td><?php
echo $thp;
?></td>
<td><?php
echo $mlh;
?></td>

	</tr>
</table>

<p>Kính mong quý viện xem xét và giúp đỡ</p>
<p>Em xin chân thành cảm ơn</p>
<div class="div3">
	<div><br>TRƯỜNG CNTT&TT
	</div>
	<div>
<ul>
<li class="list">Hà Nội, Ngày 25 tháng 4 năm 2022</li>
<li class="list">NGƯỜI VIẾT ĐƠN</li><br><br>
<li class="list"><?php echo $name ?>
</li>
</ul>
	</div>
</div>
</div>
	</div>
</body>
</html>
