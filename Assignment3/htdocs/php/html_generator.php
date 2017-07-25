<?php
	
        function print_edit_delete_icons($id, $table, $page){
         echo "<a href='https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/admin.php?page=edit&id=$id&table=$table'>
                    <i class='fa fa-pencil icon-blue' aria-hidden='true'></i>
                    </a>
                    <a href='https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/php/delete.php?id=$id&table=$table&page=$page'>
                        <i class='fa fa-trash icon-blue' aria-hidden='true'></i>
                    </a>";
    }
    

    function print_edit_company($id, $connect){
    $query = "SELECT * FROM company WHERE id='$id' LIMIT 1";
            $result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
            while($row = mysqli_fetch_assoc($result)){
                $name = $row['name'];
                $description = $row['description'];
                $website = $row['website'];
                $image = $row['image'];

                echo "<form id='form'>";
                echo "<input class='boxStyle' type='text' name='name' value='$name'><br>";
                echo "<textarea class='textAreaStyle' type='textarea' name='description' value='$description'>$description</textarea><br>";
                echo "<input class='boxStyle' type='text' name='website' value='$website'><br>";
                echo "<input class='boxStyle' type='text' name='img' value='$image'><br>";
                echo "<input class='subStyle' type='submit' value='Oppdater'>";
                echo "</form>";

        }
    }

    function print_edit_category($id, $connect){
        $query = "SELECT * FROM category WHERE id='$id' LIMIT 1";
            $result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
            while($row = mysqli_fetch_assoc($result)){
                $type = $row['type'];

                echo "<form id='form'>";
                echo "<input class='boxStyle' type='text' name='type' value='$type'><br>";
                echo "<input class='subStyle' type='submit' value='Oppdater'>";
                echo "</form>";

        }
    }

        function print_edit_specification($id, $connect){
            $query = "SELECT * FROM specification_dropDown WHERE id='$id'";
                $result = mysqli_query($connect, $query) or die("<p>Could not get companies to database...</p>" . mysqli_error($connect));
                while($row = mysqli_fetch_assoc($result)){
                    $type = $row['type'];
                    $measurement = $row['measurement'];

                    echo "<form id='form'>";
                    echo "<input class='boxStyle' type='text' name='type' value='$type'><br>";
                    echo "<input class='boxStyle' type='text' name='measurement' value='$measurement'><br>";
                    echo "<input class='subStyle' type='submit' value='Oppdater'>";
                    echo "</form>";

        }
    }

        function print_edit_tool($id, $connect){
            $query = "SELECT * FROM tool WHERE id='$id'";
                $result = mysqli_query($connect, $query) or die("<p>Could not get companies to database...</p>" . mysqli_error($connect));
                while($row = mysqli_fetch_assoc($result)){
                    $name = $row['name'];
                    $description = $row['description'];
                    $inStore = $row['inStore'];
                    $batteryDriven = $row['batteryDriven'];
                    $isElectric = $row['isElectric'];
                    $category = $row['category'];
                    $company = $row['company'];
                    $news = $row['news'];
                    $image = $row['image'];


                    echo "<form id='form'>";
                    echo "<fieldset>";
                    echo "<label for'name'><b>Navn:</b></label><br>";
                    echo "<input id='name' class='boxStyle' type='text' name='name' value='$name'><br>";
                    echo "<label for'description'><b>Beskrivelse:</b></label><br>";
                    echo "<input id='description' class='boxStyle' type='text' name='description' value='$description'><br>";

                    echo "<label for'name' class='checkBoxLabel'><b>Nyhet:</b></label>";
                    if($news == true){
                        echo "<input id='news' class='checkBoxStyle' type='checkbox' name='news' checked>";
                    }else{
                        echo "<input id='news' class='checkBoxStyle' type='checkbox' name='news'>";
                    }
                    echo "<br>";

                    echo "<label for'inStore' class='checkBoxLabel'><b>På lager:</b></label>";
                    if($inStore == true){
                        echo "<input id='inStore' class='checkBoxStyle' type='checkbox' name='inStore' checked>";
                    }else{
                        echo "<input id='inStore' class='checkBoxStyle' type='checkbox' name='inStore'>";
                    }
                    echo "<br>";

                    echo "<label for'battery_box' class='checkBoxLabel'><b>Batteri:</b></label>";
                    if($batteryDriven == true){
                        echo "<input id='battery_box' class='checkBoxStyle' type='checkbox' name='batteryDriven' checked>";
                    }else{
                        echo "<input id='battery_box' class='checkBoxStyle' type='checkbox' name='batteryDriven'>";
                    }
                    echo "<br>";

                    echo "<label for'electric' class='checkBoxLabel'><b>Elektrisk:</b></label>";
                    if($isElectric == true){
                        echo "<input id='electric' class='checkBoxStyle' type='checkbox' name='isElectric' checked>";
                    }else{
                        echo "<input id='electric' class='checkBoxStyle' type='checkbox' name='isElectric'>";
                    }
                    echo "<br>";

                    echo "<label for'company'><b>Navn på leverandør:</b></label><br>";
                     echo "<select class='selectStyle' id='company' name='company'>";
                    $query = "SELECT * FROM company";
                    $result = mysqli_query($connect, $query) or die("Could not get categories to database..." . mysqli_error($connect));
                    while($row = mysqli_fetch_assoc($result)){
                        $name = $row['name'];
                        echo "<option value='$name'>$name</option>";
                    }
                    echo "</select><br>";
                    
                    echo "<label for'category'><b>Kategori:</b></label><br>";
                    echo "<select class='selectStyle' id='category' name='category' onclick='selecting()'>";
                        $query = "SELECT * FROM category";
                        $result = mysqli_query($connect, $query) or die("Could not get categories to database..." . mysqli_error($connect));
                        while($row = mysqli_fetch_assoc($result)){
                            $type = $row['type'];
                            echo "<option value='$type'>$type</option>";
                        }
                        echo "</select><br>";
                    echo "<button class='buttonStyle' type='button' onclick='addSpec()'>Legg til spesifikasjon</button>";
                    echo "<input class='subStyle' type='submit' value='Oppdater'>";
                    echo "</fieldset>";
                    echo "</form>";



                    /*
                        Print SPECS 

                        LEGG ALL JS I EN FIL, SOM METODER FOR AT INDEX SKAL INKLUDERE
                        BRUKE JS METODENE fra tool på edit/Tool

                        Oppdater specs-> prøv sql update -> catch eror - > insert


                    */



        }
    }





?>