<html>
	<head>
		  <meta charset="iso=8859-2">
		  <title>AMIPaC psycho-physical test - admin</title>
		  <link rel="stylesheet" href="css/style_conf.css" type="text/css"/>
	</head>
	<script src="../TUFIQoEMOS/js/admin_conf.js" type="text/javascript" ></script>
	<script type="text/javascript" src="jquery-2.0.3.min.js"></script>

<body onload="onLoadFunction()">
	  <section id="container_conf">
		<div id="panel_conf">
		  <h1>Zalogowany jako: 
			<?php 
			
				include 'function.php';
				
				session_start();				
				if($_SESSION['login'] != null){
					echo $_SESSION['login'];
					//session_destroy();
				}
				else{
					header( "Location: ../TUFIQoEMOS/index_admin.php" );
				}

				if(isset($_SESSION['refresh']) && $_SESSION['refresh'] == 1)
				{
					connectToDBAndSetData2();
				}				
			?>
		  </h1>
		<form method="post" action="admin_save_conf.php">
	        <label class ="lab">Dostępne testy:</label>
	             <select id = "test_select" onchange="changeTestDoc();" name="testDocOption">
					  <?php 					
							if($_SESSION['resultS'] != null) {				
								$obj2 = json_decode($_SESSION['resultS']);
								foreach ($obj2 as $item) {
									
									if(isset($_SESSION['lastUpdate'])) {
										$sel = $_SESSION['lastUpdate'];
										if($item->ID == $sel && $sel > 0) {
											?>					
												<option  value="<?php echo $item->ID ?>"  data-allinfo = <?php echo json_encode($item) ?> selected= "<?php  echo '"selected"' ?>" ><?php echo $item->TEST_DOC_NAME ?></option>
											<?php											
										}
										else {
											?>					
												<option  value="<?php echo $item->ID ?>"  data-allinfo = <?php echo json_encode($item) ?> ><?php echo $item->TEST_DOC_NAME ?></option>
											<?php	
										}
									}
									else{
										?>					
											<option  value="<?php echo $item->ID ?>"  data-allinfo = <?php echo json_encode($item) ?> ><?php echo $item->TEST_DOC_NAME ?></option>
										<?php	
									}
								}
							}
							
							$_SESSION['lastUpdate'] = 0;
					  ?>					  
				</select> 
			</br>
	        <label class ="lab">Status testu:</label>
	            <select id="activTest" name = "activeTestOption">
					<option value="1">Aktywny</option>
					<option value="2">Nieaktywny</option>
				</select></br>
	        <label class ="lab">Numer testu:</label>
					<input id="maxNumber" type="number" name="numberTest"></br>
			<label class = "lab">Max MOS:</label>		
					<input id = "maxMOS" type="number" name = "maxMOS" min="2" max="100">
			<p class="submit"><input type="submit" name="commit" value="Zapisz zmiany"></p>
		</form>
		<form method="post" action="admin_save_doc.php" enctype="multipart/form-data">
			<label class ="lab">Dodaj nowy test:</label>
			<input  type="file" name="file" id="file">
			<p class="submit"><input type="submit" name="commit" value="Wyślij"></p>
		</form>
		<form method="post" action="adminReturn.php">
			<p class="submit"><input type="submit" name="commit" value="Wyloguj"></p>
		</form>
		</div>
	  </section>	  
</body>
</html>
