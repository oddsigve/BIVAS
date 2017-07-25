<!--The php file that displays the add Spesifikasjon form and the list of Spesifikasjoner added to the database -->
<?php
require("../../../../../private/CuU17/include/connect.php");
?>

<!DOCTYPE html>
<html>
	<head>
	    <title>BIV Admin</title>
		<link rel="stylesheet" type="text/css" href="css/form.css">
		<link rel="stylesheet" type="text/css" href="css/list.css">

	    <meta http-equiv="Content-type" content="text/html" charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1" />
	</head>
	<body>
		<!-- Mssage when form is correctly or incorrectly filled -->
		<div class="msg">
			<?php 
				if($msg != null){
					$err = $_GET['msg'];
					echo "$msg";
				}
			?>
		</div>
		<!-- Form to add Spesifikasjon -->
		<section id="form">
			<h3>Spesifikasjoner</h3>
			<p>Her kan du legge inn nye leverandører i databasen. Leverandøren du legge til vil dukke opp i listen til høyre når den legges til.</p> 
			<p>Skjemaet fylles ut på følgende måte:</p>
			<ol>
				<li> <b>Navnet</b> på spesifikasjonen. For eksempel Batteritype, Ladetid, Lengde, osv. </li>
				<li> <b>Måleenheten</b> til spesifikasjonen. For eksempel Nm, o/min, V, min, osv.</li>
			</ol>
			<form method="POST" action="/CuU17/Assignment3/htdocs/admin/php/add_specifications.php" enctype="multipart/form-data">
				<fieldset>
					<legend>Legg til spesifikasjon</legend>
						<label for"type"><b>Navn:<span class="red">*</span></b></label><br>
						<input id="type" class="boxStyle" type="text" name="type" placeholder="" required><br>
						<label for"maleenhet"><b>Måleenhet</b> (Kan stå tom):</label><br>
						<input id="maleenhet" class="boxStyle" type="text" name="type" placeholder=""><br>
						<input type="submit" class="subStyle nav-blue" name="submit" value="Legg til spesifikasjon"><br>
				</fieldset>
			</form>
		</section>
		<!-- List of Spesifikasjoner in the database -->
		<section id="list">
			<h3>Spesifikasjoner i databasen</h3>
			<p id="listP">Navn | Måleenhet</p>
			<?php
		            $query = "SELECT * FROM specification_dropDown";
		            $result = mysqli_query($connect, $query) or die("Could not get categories from database..." . mysqli_error($connect));
		            echo "<ul class='list-single'>";
		            while($row = mysqli_fetch_assoc($result)){
		                $type = $row['type'];
		                $measurement = $row['measurement'];
		                $id = $row['id'];
		                
		                echo "<li><p>$type | $measurement </p>";
		                print_edit_delete_icons($id, "specification", "specifications");
		                echo "</li>";		               
		            }
		            echo "</ul>";
		        ?>
		</section>
	</body>
</html>