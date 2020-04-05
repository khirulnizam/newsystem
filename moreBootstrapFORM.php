<!-- moreBootstrapFORM.php -->
<!DOCTYPE html>
<html>
<head>
	<title>More on Bootstrap FORM</title>
	<!-- responsive design mobile-first -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- import Bootstrap library from CDN -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<body>
<div class="row p-3">
	<div class="col-md-6">
	<div class="card border-danger">
		<div class="card-header bg-danger">
		Register your details</div>
		<div class="card-body">
			<form action="processdata.php" method="get">
				<div class="form-row">
					<div class="col">
						Firstname 
						<input type="text" name="fname" 
						class="form-control">
					</div>
					<div class="col">
						Lastname 
						<input type="text" name="lname"
						class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						Email 
						<input type="email" name="email"
						class="form-control">
					</div>
					<div class="col">
						Password 
						<input type="password" name="pword"
						class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						Date of Birth 
						<input type="date" name="dob"
						class="form-control">
					</div>
					<div class="col">
						Age 
						<input type="number" name="age"
						class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						Postcode 
						<input type="number" name="postcode"
						class="form-control">
					</div>
					<div class="col">
						State 
						<select name="state" class="form-control">
							<option value="01">Johor</option>
							<option value="02">Kedah</option>
							<option value="03">Kelantan</option>
						</select>
					</div>
				</div>
				<div class="form-row">
				Address<textarea name="address" row=3
				class="form-control"></textarea>
				</div>
				<div class="float-right">
					<input type="reset" class="btn btn-default">
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