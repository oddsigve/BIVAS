<section id="tool">
	<?php
        echo "<section>";
		if($id != null){
			require("../../../../private/CuU17/include/connect.php");
			
			$query = "SELECT * FROM tool WHERE id='$id'";
			$result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
			while($row = mysqli_fetch_assoc($result)){
                $name = $row["name"];
                $description = $row["description"];
                $inStore = $row["inStore"];
                $batteryDriven = $row["batteryDriven"];
                $category = $row["category"];
                $company = $row["company"];
                $news = $row["news"];
                $image = $row["image"];
                echo "<section class='item-display-x1 inline'>";
                echo "<figure>";
                echo "<img src='$image'></img>";
                echo "<figcaption>$description</figcaption>";
                echo "</figure>";
                echo "<div id='right-side'>";
                echo "<h4>$name ($company)</h4>";
                echo "<ul id='top-box'>";
                if($inStore != false && $inStore != ""){
                    echo "<li>I butikk: <i class='fa fa-check-circle-o' aria-hidden='true' style='color:green;'></i></li>";
                }else {
                    echo "<li>I butikk: <i class='fa fa-window-close-o' aria-hidden='true' style='color:red;'></i></li>";
                }
                if($batteryDriven != false && $batteryDriven != ""){
                    echo "<li>Batteri: <i class='fa fa-check-circle-o' aria-hidden='true' style='color:green;'></i></li>";
                }else {
                    echo "<li>Batteri:  <i class='fa fa-window-close-o' aria-hidden='true' style='color:red;'></i></li>";
                }
                if($news != false && $news != ""){
                    echo "<li>Nyhet: <i class='fa fa-check-circle-o' aria-hidden='true' style='color:green;'></i></li>";
                }else {
                    echo "<li>Nyhet:  <i class='fa fa-window-close-o' aria-hidden='true' style='color:red;'></i></li>";
                }
                echo "</ul>";
				$query = "SELECT * FROM specifications WHERE toolId='$id'";
				$result2 = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
				while($row = mysqli_fetch_assoc($result2)){
					$type = $row['type'];
					$value = $row['value'];
					$measurement = $row['measurement'];

                    echo "<ul class='item-display-bot'>";
					echo "<li id='specif-type' class='inline'>$type</li>";
					echo "<li id='specif-value' class='inline'>$value</li>";
					echo "<li id='specif-measur'class='inline'>$measurement</li><br>";
                    echo "</ul>";

				}
                    echo "</div>";
            	echo "</section>";

			}

		}else{
			echo "<p> Ingen id har blitt valgt </p>";
		}

	?>
</section>
