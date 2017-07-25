<!--The php file that displays the add Leverandører form and the list of Leverandører added to the database -->
<?php
require("../../../../../private/CuU17/include/connect.php");
?>
<div class="msg">
</div>
<section id="form">
	<h3>Leverandører</h3>
	<p>Her kan du legge inn nye leverandører i databasen. Leverandøren du legge til vil dukke opp i listen til høyre når den legges til.</p> 
	<p>Skjemaet fylles ut på følgende måte:</p>
	<ol>
		<li> <b>Navnet</b> til leverandøren(f.eks Bosch, Hitachi, Makita, Skil).</li>
		<li> En <b>beskrivelse</b> av firmaet(f. eks historie, beliggenhet, hva de gjør, osv.).</li>
		<li> Adressen til selskapets <b>hjemmeside</b>(Eks. www.Biv.no). </li>
		<li> <b>Bilde</b> av firmaets logo i formatet .jpg, .jpeg, .png eller .gif. </li>
	</ol>
	<!-- Mssage when form is correctly or incorrectly filled -->
	<?php 
		if($msg != null){
			if($err == "true"){
				echo "<p class='msg-warning'>$msg</p>";
			}else{
				echo "<p class='msg-success'>$msg</p>";
			}
		}
	?>
	<!-- Form to add Leverandør -->
	<form method="POST" action="/CuU17/Assignment3/htdocs/admin/php/add_company.php" enctype="multipart/form-data">
		<fieldset>
			<legend><b>Leverandør:</b></legend>
			<label for="name"><b>Navn:<span class="red">*</span></b></label><br><input class="boxStyle" id="name" type="text" name="name" placeholder="" required><br>
			<label for="description"><b>Beskrivelse:<span class="red">*</span></b></label><br><textarea class="textAreaStyle" type="textarea" name="description" placeholder="" required></textarea><br>
			<label for="website"><b>Hjemmeside:<span class="red">*</span></b></label><br><input class="boxStyle" id="website" type="text" name="website" placeholder="" required><br>
			<label for="image_link"><b>Bilde:<span class="red">*</span></b></label><br><input class="boxStyle" id="image_link" type="file" name="fileToUpload" required><br>
			<input class="subStyle nav-blue" id="sub" type="submit" value="Legg til"><br>
		</fieldset>
	</form>
</section>
<!-- List of Leverandører in the database -->
<section id="list">
	<h3>Leverandører i databasen</h3>
	<?php
		$query = "SELECT * FROM company";
		$result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
		echo "<ul class='list-double'>";
		while($row = mysqli_fetch_assoc($result)){
			$image = $row['image'];
			$id = $row['id'];
			$table = "company";
			$page="company";
			//print_list('image', $image);
			
			echo "<li>";
			print_edit_delete_icons($id, $table, $page);
			echo "<img src='$image'></img>";
			echo "</li>";
		}
		echo "</ul>";
	?>
</section>
