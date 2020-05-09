<?php

	session_start();
	if(isset($_SESSION['kaori_chat_nama']))
	{
		$nama = $_SESSION['kaori_chat_nama'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kaori Chat 2</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="assets/js/jquery-3.5.0.js"></script>
	<script src="assets/bs_js/bootstrap.min.js"></script>

	<script src="assets/js/mqttws31.js"></script>
	<script src="assets/js/control_chat.js"></script>
	
	<script>
	jQuery(document).ready(function(){
	
		document.getElementById('txt_pesan').onkeydown = function(e){
		  if(e.keyCode == 13){
				publish("chat/nama", "<?php echo $nama ;?>");
				publish("chat/pesan", txt_pesan.value);
				document.getElementById('txt_pesan').value = "";
			}
		};
		
	});
	</script>

</head>
	
<body class="bg-light text-dark" id="badan">
	<div class="row d-flex justify-content-center align-middle vertical-center">
		
		<div class="col-md-6 align-self-center border rounded m-4 p-4" id="sistem_selesai">
		
			<h2 align="center">Kaori Chat 2</h2>
		
			<table class="table" width="100%" id="tabel">
				<tbody id="tbody_keluaran">
				</tbody>
				<tbody>
					<tr>
						<td><input type="text" name="teks" id="txt_pesan" class="form-control"/></td>
					</tr>
				</tbody>
			</table>
		
		</div>
		
	</div>
</body>
</html>

<?php

	}
	else
	{
		session_start();
		if(session_destroy())
		{
		header("Location: index.php");
		}
	}
	
?>