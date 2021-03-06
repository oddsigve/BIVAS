<!-- Displays the category page-->
<section id="category">
    <?php 
        echo "<h3 class='item-display-h3'>Søke resultat</h3>";

        global $search;

if($search != null){
	require("../../../../private/CuU17/include/connect.php");

	$query = "SELECT * FROM tool WHERE name LIKE '$search' OR  company LIKE '$search' OR category LIKE '$search'";
    
		$row = mysqli_query($connect, $query) or die("Could not retrive from database..." . mysqli_error($connect));

	 while ($result = mysqli_fetch_assoc($row)) {
            $id = $result['id'];
            $name = $result["name"];
            $description = $result["description"];
            $inStore = $result["inStore"];
            $batteryDriven = $result["batteryDriven"];
            $category = $result["category"];
            $company = $result["company"];
            $news = $result["news"];
            $image = $result["image"];
            echo "<a class='item-display' href='https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/index.php?page=tool&id=$id'>";
            echo "<section class='item-display-x4'>";
            echo "<figure>";
            echo "<img src='$image'></img> <br>";
            echo "<figcaption>$description</figcaption>";
            echo "</figure>";
            echo "<h4>$name</h4>";
            echo "<p>$company</p>";
            if($inStore != false && $inStore != ""){
                echo "<p>I butikk: <i class='fa fa-check-circle-o' aria-hidden='true' style='color:green;'></i></p>";
            }else {
                echo "<p>I butikk: <i class='fa fa-window-close-o' aria-hidden='true' style='color:red;'></i></p>";
            }
            if($batteryDriven != false && $batteryDriven != ""){
                echo "<p>Batteri: <i class='fa fa-check-circle-o' aria-hidden='true' style='color:green;'></i></p>";
            }else {
                echo "<p>Batteri:  <i class='fa fa-window-close-o' aria-hidden='true' style='color:red;'></i></p>";
            }
            if($news != false && $news != ""){
                echo "<p>Nyhet: <i class='fa fa-check-circle-o' aria-hidden='true' style='color:green;'></i></p>";
            }else {
                echo "<p>Nyhet:  <i class='fa fa-window-close-o' aria-hidden='true' style='color:red;'></i></p>";
            }
            echo "</section>";
            echo "</a>";
            }
		}
	?>
</section>
