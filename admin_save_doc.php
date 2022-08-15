<?php


if ($_FILES["file"]["type"] == "text/plain" && $_FILES["file"]["size"] < 65536) {
		if ($_FILES["file"]["error"] > 0) {
			echo "Błąd: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			echo "Plik: " . $_FILES["file"]["name"] . "<br>";
			echo "Typ: " . $_FILES["file"]["type"] . "<br>";
			echo "Rozmiar: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
			echo "Plik tymczasowy: " . $_FILES["file"]["tmp_name"] . "<br>";
			
			if (file_exists("../TUFIQoEMOS/TestDoc/" . $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " już istnieje.";
				sleep(5);
			}
			else
			{
				if(move_uploaded_file($_FILES["file"]["tmp_name"], "../TUFIQoEMOS/TestDoc/" . $_FILES["file"]["name"])){
					echo "Zapisano jako: " . "../TUFIQoEMOS/TestDoc/" . $_FILES["file"]["name"];
					header( "Location: ../TUFIQoEMOS/admin_update_db.php");
				}
				else {
					print_r($errors);
				}
			}
	  }
	  
	  //header( "Location: ../TUFIQoEMOS/admin_data.php" );
}
else {
		if ($_FILES["file"]["type"] != "text/plain"){
			echo "Plik jest nieodpowiedniego typu!";
			sleep(5);
		}
		else if ($_FILES["file"]["size"] < 65536){
			echo "Plik przekracza maksymalny rozmiar!";
			sleep(5);			
		}
		
		header( "Location: ../TUFIQoEMOS/admin_data.php" );
}



?>
