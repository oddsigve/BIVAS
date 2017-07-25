<!--The php file that displays the add Kategorier form and the list of Kategorier added to the database -->
<?php
require("../../../../../private/CuU17/include/connect.php");
?>
<script type="text/javascript">
	function rm(){
	}
</script>
<script type='text/javascript'>
	var number = 2;

    function addSpecifications(){
        // Container <div> where dynamic content will be placed
        var container = document.getElementById("spec_div");
        // Create an <input> element, set its type and name attributes
        var input_spec = document.createElement("input");
        input_spec.type = "text";
        input_spec.name="spec" + number;
        container.appendChild(input_spec);

        var input_m = document.createElement("input");
        input_m.type = "text";
        input_m.name="measurment" + number;
        container.appendChild(input_m);

        var button = document.createElement("button");
        button.addEventListener("click", rm(), false);
        button.innerHTML = "Delete";
        container.appendChild(button);

       	number++;
    }
</script>

<div class="msg">
    <?php 
        // Mssage when form is correctly or incorrectly filled
        if($msg != null){
            $err = $_GET['msg'];
            echo "$msg";
        }
    ?>
</div>
<section id="form">
    <h3>Kategorier</h3>
    <p>Her kan du legge til flere kategorier</p>
    <ol>
        <li>Har det kommet en ny underkategori av verktøyet?</li>
    </ol>
    <form method="POST" action="/CuU17/Assignment3/htdocs/admin/php/add_category.php">
        <fieldset>
            <legend>Legg til Kategori</legend>
            <label for"navn"><b>Kategori: <span class="red">*</span></b></label><br>
            <input id="navn" class="boxStyle" type="text" name="type" required><br>
            <input class="subStyle nav-blue" type="submit" value="Add category"><br>
        </fieldset>
    </form>
</section>
<section id="list">
    <h3>Kategorier i databasen</h3>
    <?php
    //List of categories in the database
        $query = "SELECT * FROM category";
        $result = mysqli_query($connect, $query) or die("Could not get categories from database..." . mysqli_error($connect));
        echo "<ul class='list-single'>";
        while($row = mysqli_fetch_assoc($result)){
            $type = $row['type'];
            $id = $row['id'];
            echo "<li>";
            echo "<p>$type</p>";
            print_edit_delete_icons($id, "category", "category");
            echo "</li>"; 
        }
        echo "</ul>";
    ?>
</section>

