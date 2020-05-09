<?php
	
	session_start();
	if(isset($_SESSION['kaori_login']))
	{
		header("Location: c.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kaori Chat Login</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="assets/bs_js/bootstrap.min.js"></script>
	
	<style>
	
	.vertical-center {
	  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
	  min-height: 100vh; /* These two lines are counted as one :-)       */

	  display: flex;
	  align-items: center;
	}
	
	</style>
</head>
	
<body class="bg-light text-dark">
	<div class="row d-flex justify-content-center align-middle vertical-center">
		
		<div class="col-md-3 align-self-center border rounded m-4 p-4" id="sistem_selesai">
		
			<form action="login.php" method="POST">
			  <div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" placeholder="Nama" name="nama">
			  </div>
			  <button type="submit" class="btn btn-primary col-md-12">Go</button>
			</form>
		
		</div>
		
	</div>
</body>
</html>