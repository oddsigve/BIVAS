<!-- Generates the Font Awesome pencil and trash icons-->
<?php
	function print_element($type, $variable, $id, $table, $page){

        if($type == "single-text"){

            echo "<li><p>$variable</p>";
            print_edit_delete_icons($id, $table, $page);
            echo "</li>";

	   }
       if($type == "single-image"){

       }
    }
    function print_edit_delete_icons($id, $table, $page){
         echo "<a href='https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/php/delete.php?id=$id&table=$table&page=$page'>
                    <i class='fa fa-pencil' aria-hidden='true'></i>
                    </a>
                    <a href='#'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </a>";
    }
?>