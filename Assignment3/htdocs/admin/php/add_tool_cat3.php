<!-- Adds Verktøy to the databse after which category selected-->
<?php

require("../../../../../../private/CuU17/include/connect.php");

if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = null;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	

	echo "<table>";	

	foreach ($_POST as $key => $value) {
    
    	echo "<tr>";
    	echo "<td>";
    	echo $key;
    	echo "</td>";
    	echo "<td>";
    	echo $value;
    	echo "</td>";
    	echo "</tr>";
	}

		 echo "</table>";



	$errors = array();

	if (isset($_POST['name'])) {
		$name =trim($_POST['name']);
	} else  {
		$errors[] = 'Please enter the company name!';
	}
	
	if (isset($_POST['description'])) {
		$description =trim($_POST['description']);
	} else  {
		$errors[] = 'Please enter a description!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);

		if($news == "on"){
			$news = true;
		}else{
			$news = false;
		}

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['inStore'])) {
		$inStore =trim($_POST['inStore']);
		if($inStore == "on"){
			$inStore = true;
		}else{
			$inStore = false;
		}
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['batteryDriven'])) {
		$batteryDriven =trim($_POST['batteryDriven']);

		if($batteryDriven == "on"){
			$batteryDriven = true;
		}else{
			$batteryDriven = false;
		}
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['isElectric'])) {
		$isElectric =trim($_POST['isElectric']);
		if($isElectric == "on"){
			$isElectric = true;
		}else{
			$isElectric = false;
		}
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['company'])) {
		$company =trim($_POST['company']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}



	//ADDING TOOL WITHOUT SPECS

	$category = "Slagskrutrekker";
	$image = null;

	if (isset($_POST['image'])) {
		$image =trim($_POST['image']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}


	$query = "INSERT INTO tool (name, description, inStore, batteryDriven, isElectric, category, company, news, image) VALUES ('$name', '$description', '$inStore', '$batteryDriven', '$isElectric', '$category', '$company', '$news', '$image')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	$query = "SELECT id FROM tool WHERE description='$description'";
	$result = mysqli_query($connect, $query) or die("Could not get categories to database..." 	. mysqli_error($connect));
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];
	}

	
	if (isset($_POST['dreiemoment_maks_hard'])) {
		$value =trim($_POST['dreiemoment_maks_hard']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Dreiemoment maks hard', '$value', 'Nm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}


	if (isset($_POST['dreiemoment_maks_myk'])) {
		$value =trim($_POST['dreiemoment_maks_myk']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Dreiemoment maks myk', '$value', 'Nm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['tomgangsturtall_(gir_1)'])) {
		$value =trim($_POST['tomgangsturtall_(gir_1)']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Tomgangsturtall (gir 1)', '$value', 'o/min')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['batteritype'])) {
		$value =trim($_POST['batteritype']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Batteritype', '$value', '')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['batterispenning'])) {
		$value =trim($_POST['batterispenning']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Batterispenning', '$value', 'V')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['ladetid'])) {
		$value =trim($_POST['ladetid']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Ladetid', '$value', 'min')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['moment_innstilling'])) {
		$value =trim($_POST['moment_innstilling']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Moment innstillinger', '$value', '')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['lengde'])) {
		$value =trim($_POST['lengde']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Lengde', '$value', 'mm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['bredde'])) {
		$value =trim($_POST['bredde']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Bredde', '$value', 'mm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['høyde'])) {
		$value =trim($_POST['høyde']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Høyde', '$value', 'mm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['vekt'])) {
		$value =trim($_POST['vekt']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Vekt', '$value', 'g')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['borediameter_maks_tre'])) {
		$value =trim($_POST['borediameter_maks_tre']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Borediameter maks tre', '$value', 'mm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['borediameter_maks_stål'])) {
		$value =trim($_POST['borediameter_maks_stål']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Borediameter maks stål', '$value', 'mm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['usikkerhet_k'])) {
		$value =trim($_POST['usikkerhet_k']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Usikkerhet K', '$value', 'm/s^2')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['vibrasjonsverdi'])) {
		$value =trim($_POST['vibrasjonsverdi']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Vibrasjonsverdi', '$value', 'm/s^2')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['lydnivå'])) {
		$value =trim($_POST['lydnivå']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Lydnivå', '$value', 'dB(A)')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['spindelgjenge'])) {
		$value =trim($_POST['spindelgjenge']);

	$s = '"';	
	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Spindelgjenge', '$value', '$s')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}


	if (isset($_POST['chuckkapasitet_min'])) {
		$value =trim($_POST['chuckkapasitet_min']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Chuckkapasitet min', '$value', 'mm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['chuckkapasitet_max'])) {
		$value =trim($_POST['chuckkapasitet_max']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Chuckkapasitet max', '$value', 'mm')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['slagtall_ubelastet'])) {
		$value =trim($_POST['slagtall_ubelastet']);

	$query = "INSERT INTO specifications(toolId, type, value, measurement) VALUES ('$id', 'Slagtall ubelastet', '$value', 'ss')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	} else  {
		$errors[] = 'Please enter a image link!';
	}
	/*
	/*
	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}


	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}


	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}


	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}


	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}


	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}



	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}

	if (isset($_POST['news'])) {
		$news =trim($_POST['news']);
	} else  {
		$errors[] = 'Please enter a image link!';
	}
	
	*/
	/*
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);

	$query = "INSERT INTO company (name, description, website, image)
		VALUES ('$name', '$description', '$website', '$image')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));
	*/
	echo "<p>$name has been added to the database </p>";
	}
?>