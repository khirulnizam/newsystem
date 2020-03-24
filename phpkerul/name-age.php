<!-- filename  - name-age.php -->

<h2>Enter ur name and age</h2>

<form action=""	method="GET">
  <label for="username">Name </label><br>
  <input type="text" name="urname">
  <br>
  <label for="pwd">Age</label><br>
  <input type="number" name="age"
  	min="1" max="50">
  <br><br>
  <input type="submit" value="Print name">
</form> 
<hr>
Output here<br>

<?php
	if(isset ($_GET['urname'])){//not first time load
		$urname=$_GET['urname'];
		$age=$_GET['age'];
		if($urname==null){//urname has no value
			echo "Pls enter yourname";
		}else{//urname not null
			echo "Hi, $urname <br>";
			//echo "Your age $age <br>";
			for ($i=1;$i<=$age;$i++)//iterate by age times
		 	{
		 		echo "$i: $urname <br>";
		 	}
		}
	}
	else{
		//first time page loading 
		echo "Welcome<br>";
	}
?>