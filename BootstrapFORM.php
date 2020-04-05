<!-- BootstrapFORM.php -->
<!DOCTYPE html>
<html>
<head>
	<title>BootstrapFORM</title>
	<!-- responsive design mobile-first -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- import Bootstrap library from CDN -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="col-md-12">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
		    <h1 class="display-4">Fluid jumbotron</h1>
		    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  			</div>
		</div>
	</div>
	</div>
	<div class="row p-3">
		<div class="col-md-8">
			Main content
		</div>
		<div class="col-md-4">
			<div class="card border-primary" >
				<div class="card-header bg-primary">
					<b>Register page</b> 
				</div>
				<div class="card-body">
				
				
				<form method="POST">
					Username
					<input type="text" name="uname"
					class="form-control"><br>
					Password
					<input type="password" name="pwd"
					class="form-control"><br>
					<div class="checkbox">
					    <label><input type="checkbox"> Remember me</label>
					  </div>

					  <div >
					  	Date of birth
					  	<input type="date" name="dob" class="form-control">
					  	Age
					  	<input type="number" name="age" class="form-control">
					  </div>
					  <br>
					<div class="float-right">
						<input type="reset" value="Reset"
						class="btn btn-default">
						<input type="submit" value="Register"
						class="btn btn-primary">
					</div>
				</form>

			</div>
		</div>
		</div>
	</div>

</body>
</html>

