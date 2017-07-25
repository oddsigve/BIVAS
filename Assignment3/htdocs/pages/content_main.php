<?php 
//Queries for Bosch
//Hitachi
//Skil
//Makita
	require("../../../../private/CuU17/include/connect.php");
		$query1 = "SELECT * FROM tool WHERE news=true AND company='Makita' LIMIT 1";

		$result1 = mysqli_query($connect, $query1) or die("Could not get companies to database..." . mysqli_error($connect));

		$row1 = mysqli_fetch_assoc($result1);

		$query2 = "SELECT * FROM tool WHERE news=true AND company='Bosch' LIMIT 1";

		$result2 = mysqli_query($connect, $query2) or die("Could not get companies to database..." . mysqli_error($connect));

		$row2 = mysqli_fetch_assoc($result2);

		$query3 = "SELECT * FROM tool WHERE news=true AND company='Hitachi' LIMIT 1";

		$result3 = mysqli_query($connect, $query3) or die("Could not get companies to database..." . mysqli_error($connect));

		$row3 = mysqli_fetch_assoc($result3);

		$query4 = "SELECT * FROM tool WHERE news=true AND company='Skil' LIMIT 1";

		$result4 = mysqli_query($connect, $query4) or die("Could not get companies to database..." . mysqli_error($connect));

		$row4 = mysqli_fetch_assoc($result4);

		$name1 = $row1['name'];
		$company1 = $row1['company'];
		$image1 = $row1['image'];

		//SECOND TOOL
	    $name2 = $row2['name'];
	    $company2 = $row2['company'];
	    $image2 = $row2['image'];

	    $name3 = $row3['name'];
		$company3 = $row3['company'];
		$image3 = $row3['image'];

		//SECOND TOOL
	    $name4 = $row4['name'];
	    $company4 = $row4['company'];
	    $image4 = $row4['image'];
?>
<div id="flex">
<section id="c1">
	<div id="news">
		<a class='item-display' href='https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/index.php?page=tool&id=$id'>
			<div id="news1">
				<img src=<?php echo $image1;?>/>
				<p><b><?php echo $name1?></b></p>
				<p><?php echo $company1?></p>
			</div>
		</a>
		<a class='item-display' href='https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/index.php?page=tool&id=$id'>
			<div id="news2">
				<img src=<?php echo $image2;?>/>
				<p><b><?php echo $name2?></b></p>
				<p><?php echo $company2?></p>
			</div>
		</a>
		<a class='item-display' href='https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/index.php?page=tool&id=$id'>
			<div id="news3">
				<img src=<?php echo $image3;?>/>
				<p><b><?php echo $name3?></b></p>
				<p><?php echo $company3?></p>
			</div>
		</a>
		<a class='item-display' href='https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/index.php?page=tool&id=$id'>
			<div id="news4">
				<img src=<?php echo $image4;?>/>
				<p><b><?php echo $name4?></b></p>
				<p><?php echo $company4?></p>
			</div>
		</a>
	</div>
</section>
<section id="c2">
	<h3>Drill duellen</h3>
	<p id="introP">Makita, Bosch, Hitachi og Skil er leverandører av elektriske driller til profesjonelt og privat bruk. 
		BIV har lagt til rette for at du skal kunne sammeligne produkter fra våres sortiment, for å gjøre veien til ny drill mer oversiktlig.</p>
	<img src="img/butikk1.jpg" alt="Bilde av Biv butikk">
</section>
</div>
