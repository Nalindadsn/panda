<?php

$username = 'root';
$password = '';
$pdo = new PDO( 'mysql:host=localhost;dbname=sis', $username, $password );
date_default_timezone_set('Asia/Colombo');



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		
	</title>
</head>
<body style="max-width: 800px; margin:auto;">
	<table border="1" style="width:100%">
		<tr>
			<th colspan="2">imaeg</th>
		</tr>
		<tr>
	<?php 
	$statement = $pdo->prepare("SELECT * FROM  std WHERE id='".$_GET['id']."'");
	$statement->execute();
	$result = $statement->fetch();


	if (isset($_POST['submit1'])) {
		echo "submit1";



header('location:index.php?id='.$_POST['r_id']);

	}

?>
<td>
	
				<form action="index.php" method="POST">
					Select the Table<br>
					<select>
						<option>Biodata</option>
					</select>
					<input type="text" name="r_id">
					<br>Input relevent id
					<br><br>
					Search <input type="radio" name=""><br>
					Edit <input type="radio" name=""><br>
					Insert <input type="radio" name=""><br>
					Delete <input type="radio" name=""><br>
					<input type="submit" name="submit1">

				</form>
</td>
			<td>
<?php

	if (isset($_POST['submit2'])) {



  // set the PDO error mode to exception


	 ?>

<?php 


  $sql = "UPDATE std SET st_id='".$_POST['in1']."', team='".$_POST['in2']."', town='".$_POST['in3']."', sport_id='".$_POST['in4']."', st_id2='".$_POST['in5']."' WHERE id='".$_GET['id']."'";

  // Prepare statement
  $stmt = $pdo->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";


	}



	$statement2 = $pdo->prepare("SELECT * FROM  std WHERE id='".$_GET['id']."'");
	$statement2->execute();
	$result2 = $statement2->fetch();
 ?>
			<form action="index.php?id=<?php echo $_GET['id'] ?>" method="POST">
<?php 	if (isset($_GET['id']) || $_GET['id']=='') {
	?>



				<input type="checkbox" name="ck1">Report Card<br>
				<input type="text" name="in1" value="<?php echo $result2['st_id'] ?>">Enter student ID<br>
				Input team<input type="text" name="in2" value="<?php echo $result2['team'] ?>"><br>
				<input type="checkbox" name="ck2">Student by Town<br>
				Enter Town<input type="text" name="in3" value="<?php echo $result2['town'] ?>"><br>
				<input type="checkbox" name="ck2">Student of Sport<br>
				<input type="text" name="in4"  value="<?php echo $result2['sport_id'] ?>">Enter Sport ID<br>
				<input type="checkbox" name="ck2">Sport by Student<br>
				<input type="text" name="in5"  value="<?php echo $result2['st_id2'] ?>">Enter Student ID<br>

					<input type="submit" name="submit2">

	<?php


}else{

 ?>

				<input type="checkbox" name="ck1"><br>
				<input type="text" name="in1"><br>
				<input type="text" name="in2"><br>
				<input type="checkbox" name="ck2"><br>
				<input type="text" name="in3"><br>
				<input type="text" name="in4"><br>
				<input type="text" name="in5"><br>

					<input type="submit" name="submit2">
<?php } ?>
			</form></td>
		</tr>
	</table>

</body>
</html>