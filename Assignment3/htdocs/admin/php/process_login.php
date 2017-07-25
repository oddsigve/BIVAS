<!-- Handles the index.php login-->
<?php
	require("../../../../../../private/CuU17/include/connect.php");

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$errors = array();

		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username =$_POST['username'];
			$password =$_POST['password'];

			$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";

			$result = mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));


			while($row = mysqli_fetch_assoc($result)){
				$password_stored = $row['password'];
				$username_db = $row['username'];
				echo "on the right way";
			}
			if($username == $username_db ){
				if(md5($password) == $password_stored){
					session_start();
					$_SESSION['status'] = "online";
					header("Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/admin.php");
					exit;
				}else{
					header("Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/index.php?msg=password");
					exit;
				}
			}else{
				header("Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/index.php?msg=username");
					exit;
			}
		}
	}
?>