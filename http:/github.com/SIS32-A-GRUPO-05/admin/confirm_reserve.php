<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html lang = "en">
	<head>
		<title>Hotel Florencia</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Hotel Florencia</a>
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "glyphicon glyphicon-user"></i> <?php echo $name;?></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">
		<ul class = "nav nav-pills">
			<li><a href = "home.php">Home</a></li>
			<li><a href = "account.php">Cuentas</a></li>
			<li class = "active"><a href = "reserve.php">Reservacion</a></li>
			<li><a href = "room.php">Habitaciones</a></li>
		</ul>
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Llenar formulario</div>
				<?php
					$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
				<br />
				<form method = "POST" enctype = "multipart/form-data" action = "save_form.php?transaction_id=<?php echo $fetch['transaction_id']?>">
					<div class = "form-inline" style = "float:left;">
						<label>Primer nombre</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['firstname']?>" class = "form-control" size = "40" disabled = "disabled"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Segundo nombre</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['middlename']?>" class = "form-control" size = "40" disabled = "disabled"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Apellidos</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['lastname']?>" class = "form-control" size = "40" disabled = "disabled"/>
					</div>
					<br style = "clear:both;"/>
					<br />
					<div class = "form-inline" style = "float:left;">
						<label>Tipo de habitacion</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['room_type']?>" class = "form-control" size = "20" disabled = "disabled"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Numero de habitacion</label>
						<br />
						<input type = "number" min = "0" max = "999" name = "room_no" class = "form-control" required = "required"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Dias</label>
						<br />
						<input type = "number" min = "0" max = "99" name = "days" class = "form-control" required = "required"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Cama extra</label>
						<br />
						<input type = "number" min = "0" max = "99" name = "extra_bed" class = "form-control"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label style = "color:#ff0000;">*Cama extra cuesta 800</label>
					</div>
					<br style = "clear:both;"/>
					<br />
					<button name = "add_form" class = "btn btn-primary"><i class = "glyphicon glyphicon-save"></i> Submit</button>
				</form>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label></label>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
</html>
