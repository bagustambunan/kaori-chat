<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$nama = $_POST['nama'];
	if($nama!="")
	{
		session_start();
		$_SESSION['kaori_chat_nama'] = $_POST['nama'];
		echo"<meta http-equiv='refresh' content='0,URL=c.php'>";
	}
	else
	{
		echo"<meta http-equiv='refresh' content='0,URL=index.php'>";
	}
}
?>