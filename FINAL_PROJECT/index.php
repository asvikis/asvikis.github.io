
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="script.js"></script>
</head>
<body>
	<?php require_once 'process.php'; ?>	
	<div id="wrapper">

	
		<div id="left">
			<div id="add-data">
			  	<form  method="post" action="process.php">
				  	<input type="hidden" name="id" value="<?= $id?>">
			  		<label>
			  			<h1>Add Data</h1>
			    		<input type="text" name="name" class="name" value="<?= $name?>" placeholder="Add data" >
			    	</label>

					<?php
					if ($update == true):
					?>
					<input type="submit" name="update" class="submit" value="Update">
					<?php else: ?>
			    	<input type="submit" name="save" class="submit" value="Save">
					<?php endif; ?>
			  	</form>
			</div>
			
		</div>

		<div id="right">

		<?php
		$user = 'root';
		$pass = '';
		
		$db = 'project_database';
		$mysqli = new mysqli('localhost', $user, $pass, $db) or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT name, id FROM final_project LIMIT 25") or
		die($mysqli->error);
	

		?>
		
			<table>
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
                <?php
                    while ($row = $result->fetch_assoc()) { ?>
					<tr class="row_position">
						<td><i class="fa fa-arrows-v"></i></td>
						<td><input class="delete-row" type="checkbox" name="record" value="1"></td>
						<td id="line"><?= $row["name"]?></td>
						<td class="float-right">

                        <a href="index.php?edit=<?= $row["id"]?>" id="edit" class="btn-primary btn-edit"><span>EDIT</span></button>
						<a href="process.php?delete=<?= $row["id"]?>" class="btn-primary btn-delete"><span>DELETE</span></button>
						</td>
                    </tr>
                    <?php } ?> 
				</tbody>
			</table>
			
			

		</div>
	</div>
</body>
</html>
