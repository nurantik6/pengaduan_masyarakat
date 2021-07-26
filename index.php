<!-- ini untuk login pengaduan masyarakat -->
<?php
/*melakukan query dari username dan password yang didapatkan di form (html) ke dalam mysql*/


/*melakukan koneksi ke database*/
include 'lib/database.php';
/*mendapatkan data dari form dengan method post*/
$username = $_POST['username'];
$password = $_POST['password'];

/*melakukan query*/
$query = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password' ;";

$execQuery = mysqli_query($koneksi, $query);

/* melakukan aksi untuk mendapatkan data yang keluar dari hasil query*/
$getData = mysqli_fetch_all($execQuery, MYSQLI_ASSOC);

/*melakukan aksi mendapatkan jumlah dari data yang keluar setelah eksekusi query*/
$numRows = mysqli_num_rows($execQuery);

if ($numRows == 1) {
	/*data user yang berhasil login dilakukan penyimpanan di variabel Session*/
	echo '<script> alert("data anda benar")</script>';
} else{
	echo '<script> alert("data anda salah")</script>';
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="username" placeholder="Username" required>
		<input type="password" name="password" placeholder="Password" required>
		<input type="submit" name="login" value="Login">
	</form>
</body>
</html>