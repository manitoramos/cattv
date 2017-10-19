<?php
	if ($_SERVER['SERVER_NAME'] == "localhost")
	{
		$BD = mysqli_connect("localhost", "root", "", "cattv");
		
		if (!$BD) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}

		/*echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
		echo "Host information: " . mysqli_get_host_info($BD) . PHP_EOL;
		*/
		//mysqli_close($BD);
	}
	else if ($_SERVER['SERVER_NAME'] == "cattv.000webhostapp.com")
	{
		$BD = mysqli_connect("localhost", "id3309559_cattv", "Manitocattv..", "id3309559_cattv");
		
		if (!$BD) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
	}
?>