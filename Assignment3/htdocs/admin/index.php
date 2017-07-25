
<!doctype html>
<html>
    <head>
        <title>BIV Admin</title>
        <link rel="stylesheet" type="text/css" href="css/components.css">
        <meta http-equiv="Content-type" content="text/html" charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <section id="form">
            <fieldset>
                <?php
                    if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        switch($msg){
                            case "username":
                                echo "<p class='msg-warning'>Brukernavnet finnes ikke</p>";
                                break;
                            case "password":
                                echo "<p class='msg-warning'>Feil passord</p>";
                                break;
                        }
                    }
                ?>
                <legend>Logg inn for BIV Administrator</legend>
                <form method="POST" action="/CuU17/Assignment3/htdocs/admin/php/process_login.php">
                	<input class="boxStyle" type="text" name="username" placeholder="Username">        
                    <input class="boxStyle" type="password" name="password" placeholder="Password">
                    <input class="subStyle nav-blue" type="submit" value="Logg inn">
                </form>
            </fieldset>
        </section>
    </body>
</html>
