<!--The php file that displays the add Verktøy form and the list of Verktøy added to the database -->
<?php
require("../../../../../private/CuU17/include/connect.php");
?>
<?php

	$query = "SELECT DISTINCT type FROM specification_dropDown";
	$row = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));

    $result_array = Array();
	while ($result = mysqli_fetch_assoc($row)) {
		$result_array[] = $result["type"];
	}
    //convert the PHP array into JSON format, so it works with javascript
    $json_array = json_encode($result_array);
?>
<script>
    //now put it into the javascript
    var arrayObjects = <?php echo $json_array; ?>
</script>
<script src="../js/functions.js"></script>
<script>
    function spec_change(select)
    {	

    	alert("IN : spec_change");
    	alert(selct.value);
    	data = select.value;
        $.ajax({
            type: "POST",
            url: "../php/spec_process.php",
            data: {spec: data},
            dataType:'JSON', 
            success function(result){
            	alert(result[0]);
                var container = document.getElementById("spec_div");

				var para = document.createElement("p");
				var node = document.createTextNode(result[0]);
				para.appendChild(node);

				container.appendChild(para);
            }
        });
    }
</script>
<script>
	function check(){
		checkbox = document.getElementById("electric");
		checkbox.value="true";
		checkbox.checked = true;
	}
</script>
<script type="text/javascript">

     $(window).bind("load", function() {
     	alert("script run");
   		array = [
    		<?php
        		$query = mysql_query("SELECT * FROM specification_dropDown");
        		while ($result = mysql_fetch_assoc($query)) {
            		$drop_down = $result["type"];
            		echo "'$drop_down',";
        		}
    		?>
    		
		];
		alert("Script run");
	});

</script>
<!-- Script to add Spesifikasjon -->
<script>
	var number = 2;

    function addSpec(){
        // Container <div> where dynamic content will be placed
        var container = document.getElementById("spec_div");
        // Create an <input> element, set its type and name attributes
        //var input_spec = document.createElement("input");
        //input_spec.type = "text";
        //input_spec.name="spec" + number;
        //container.appendChild(input_spec);

        //var input_m = document.createElement("input");
        //input_m.type = "text";
        //input_m.name="measurment" + number;
        //container.appendChild(input_m);

        //var button = document.createElement("button");
        //button.addEventListener("click", rm(), false);
        //button.innerHTML = "Delete";
        //container.appendChild(button);

       	//number++;

       	//Create and append select list
		var selectList = document.createElement("select");
		selectList.id = "mySelect";

		/*
		selectList.addEventListener(
 				'change',
 					function() { spec_change(this); },
 					false
			);*/

			selectList.onchange = function(){spec_change(this);};


		//selectList.setAttribute("onchange", spec_change());
		//selectList.onchange = "spec_change(this)";
		container.appendChild(selectList);
		//Create and append the options
		for (var i = 0; i < arrayObjects.length; i++) {
		    var option = document.createElement("option");
		    option.value = arrayObjects[i];
		    option.text = arrayObjects[i];
		    selectList.appendChild(option);
		}
    }
</script>
<!-- Mssage when form is correctly or incorrectly filled -->
<div class="msg">
	<?php 
		if($msg != null){
			$err = $_GET['msg'];
			echo "$msg";
		}
	?>
</div>
<!-- Form to add Verktøy -->
<section id="form">
	<h3>Legg til Verktøy</h3>
	<p>Her kan du legge inn nye verktøy i databasen. Verktøyet du legge til vil dukke opp i listen til høyre når den legges til.</p> 
	<p>Skjemaet fylles ut på følgende måte:</p>
	<ol>
		<li> <b>Navnet</b> på verktøyet. </li>
		<li> Legg inn en kort <b>beskrivelse</b> av verktøyet. </li>
		<li> Legg inn <b>pris</b> på verktøy</li>
		<li> Er verktøyet en <b>nyhet</b>? </li>
		<li> Er verktøyet på <b>lager</b></li>
		<li> Kommer verktøyet med <b>batteri?</b></li>
		<li> Er verktøyet <b>eletrisk?</b></li>
		<li> Navnet på <b>leverandør</b> av verktøyet. For eksempel Makita, Bosch, osv.</li>
		<li> Legg til <b>kategorien</b> til verktøyet. For eksempel momentskrutrekker, borskrutrekker, osv. </li>
		<li> Legg til <b>spesifikasjon</b> til verktøyet. For eksempel lydnivå, dreiemoment, ladetid, osv. </li>
	</ol>
	<form method="POST" action="/CuU17/Assignment3/htdocs/admin/php/add_tool.php">
		<fieldset>
			<legend>Nytt verktøy</legend>
			<label for"name"><b>Navn:<span class="red">*</span></b></label><br>
			<input id="name" class="boxStyle" type="text" name="name" placeholder="" required><br>
			<label for"description"><b>Beskrivesle:<span class="red">*</span></b></label><br>
			<textarea id="description" class="textAreaStyle"type="text" name="description" placeholder="" required></textarea><br>
			<label for="image_link"><b>Bilde:<span class="red">*</span></b></label><br>
			<input class="boxStyle" id="image_link" type="file" name="fileToUpload" required><br>
			<label for"price"><b>Pris:<span class="red">*</span></b></label><br>
			<input id="price" class="boxStyle" type="text" name="price" placeholder="" required><br>	
			<label for"news" class="checkBoxLabel"><b>Nyhet:<span class="red">*</span></b></label>
			<input id="news" class="checkBoxStyle" type="checkbox" name="news" value="true" checked><br>
			<label for"inStore" class="checkBoxLabel"><b>På lager:</b></label>
			<input id="inStore" class="checkBoxStyle" type="checkbox" name="inStore" value="true" checked><br>
			<label for"battery_box" class="checkBoxLabel"><b>Batteri:</b></label>
			<input id="battery_box" class="checkBoxStyle" type="checkbox" name="batterDriven" value="false" onclick="check()"><br>
			<label for"eletric" class="checkBoxLabel"><b>Eletrisk:</b></label>
			<input id="electric" class="checkBoxStyle"  type="checkbox" name="isElectric" value="false"><br>

			<label for="company"><b>Navn på Leverandør:</b></label><br>
			<?php
				echo "<select class='selectStyle' id='company' name='company'>";
				$query = "SELECT * FROM company";
				$result = mysqli_query($connect, $query) or die("Could not get categories to database..." . mysqli_error($connect));
				while($row = mysqli_fetch_assoc($result)){
					$name = $row['name'];
					echo "<option value='$name'>$name</option>";
				}
				echo "</select><br>";
			?>

			<label for="category"><b>Kategori:</b></label><br>
			<?php
				echo "<select class='selectStyle' id='category' name='category' onclick='selecting()'>";
				$query = "SELECT * FROM category";
				$result = mysqli_query($connect, $query) or die("Could not get categories to database..." . mysqli_error($connect));
				while($row = mysqli_fetch_assoc($result)){
					$type = $row['type'];
					echo "<option value='$type'>$type</option>";
				}
				echo "</select><br>";
			?>
			<div id="spec_div">
			</div>
			<button class="buttonStyle nav-blue" type="button" onclick="addSpec()">Legg til spesifikasjon</button>
			<input class="subStyle nav-blue" type="submit" value="Legg til verktøy" name="submit">
		</fieldset>
	</form>
</section>
<!-- List of Verktøy in the database -->
<section id="list">
	<h3>Verktøy i databasen</h3>
	<?php
		$query = "SELECT * FROM tool";
		$result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
		echo "<ul class='list-single'>";
		while($row = mysqli_fetch_assoc($result)){
			$name = $row['name'];
			$id = $row['id'];
			$company = $row['company'];
			echo "<li> <p>$name | $company </p>";
			print_edit_delete_icons($id, "tool", "tool");
			echo "</li>";
		}
		echo "</ul>";
	?>
</section>