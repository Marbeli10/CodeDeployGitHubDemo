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
			<li class = "active"><a href = "account.php">Cuentas</a></li>
			<li><a href = "reserve.php">Reservacion</a></li>
			<li><a href = "room.php">Habitacion</a></li>
		</ul>
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Cuentas</div>
				<a class = "btn btn-success" href = "add_account.php"><i class = "glyphicon glyphicon-plus"></i> Crear cuenta nueva</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Username</th>
							<th>Contrasena</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['name']?></td>
							<td><?php echo $fetch['username']?></td>
							<td><?php echo md5($fetch['password'])?></td>
							<td><center><a class = "btn btn-warning" href = "edit_account.php?admin_id=<?php echo $fetch['admin_id']?>"><i class = "glyphicon glyphicon-edit"></i> Editar</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "delete_account.php?admin_id=<?php echo $fetch['admin_id']?>"><i class = "glyphicon glyphicon-remove"></i> Eliminar</a></center></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
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
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Estas seguro de eliminar este registro?");
		if(conf){
			window.location = anchor.attr("href");
		}
	}
</script>

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>
