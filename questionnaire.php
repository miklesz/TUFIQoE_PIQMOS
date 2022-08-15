<html>
	<head>
		  <meta charset="iso=8859-2">
		  <title>Test MOS</title>
	</head>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" type='text/css'>
	<link rel="stylesheet" href="css/style_questionnaire.css" type="text/css"/>
<body>

<?php 
include 'function.php';
	session_start();
	if(isset($_SESSION['id_user']) && isset($_SESSION['testID']) && isset($_SESSION['testNumber']) && isset($_SESSION['fileMOS']) && $_SESSION['activeFile'] != null && isset($_SESSION['beginTest'])){ 
	if(!isset($_SESSION['comm_pl'])) {
			$_SESSION['comm_pl'] = 'Komunikat: Test został przeprowadzony.';
		}
		
		if(!isset($_SESSION['comm_eng'])) {
			$_SESSION['comm_eng'] = 'Message: Test has been ended.';
		}	
		
	}
	else{}
	
?>
<div class='container-fluid'>
		<div class='row end-message'>	  	  
			<h3  id="com" style="margin-bottom: 5px;"> 
				Test jakości zakończył się.
			</h3>
		</div>
		<div class='end-message'>
			<h3>
				Teraz poprosimy Państwa o wypełnienie krótkiej ankiety
			</h3>
		</div>	
		<div class='row' id='ankieta'>
			<div class='col-md-6 col-xs-8 col-xs-offset-2 col-md-offset-1'>
			<form action="./submit_questionnaire.php" id='questionnaire' method='POST'>
				<?php
				$dbhandle = connectToDB();
				$questions = mysql_query("SELECT * FROM `QUESTIONS`");
				while ($row = mysql_fetch_array($questions)) {
					if($row['ACTIVE'] == true){
						echo '<div class="row form-group">';
						$row['TYPE'] = trim($row['TYPE']);
						$question = $row['QUESTION'];
						$answers = explode(';', $row['ANSWERS']);
						$answers_id = explode(';', $row['ANSWERS_ID']);
						$field_id = $row['POST_ID'];
						if($row['TYPE'] == 'radio'){
							echo '<p>' . $question . '</p>';
							$i = 0;
							foreach($answers as $answer){
								echo '<input type="radio" name="' . $field_id . '"value="' . $answers_id[$i] . '"> ' . $answer .'<br>';
								$i = $i +1;
							}
						}
						elseif($row['TYPE'] === 'open'){
							echo '<p>' . $question . '</p>';
							echo '<textarea rows="4" cols="50" name="' . $field_id . '"></textarea>';
						}
						elseif($row['TYPE'] === 'open_short'){
							echo '<p>' . $question . '<input class="text-input" type="text" name="' . $field_id . '"><br></p>';
						}
						elseif($row['TYPE'] === 'checkbox'){
						echo '<p>' . $question . '</p>';
							$i = 0;
							foreach($answers as $answer){
								$answers_id[$i] = trim($answers_id[$i]);
								$answers_id[$i] = strtolower($answers_id[$i]);
								if($answers_id[$i] === "inne"){
									echo $answer . '<input class="text-input" type="text" name="' . $field_id . '[]"><br>';
								}
								else{
									echo '<input type="checkbox" name="' . $field_id . '[]"value="' . $answers_id[$i] . '"> ' . $answer .'<br>';
								}
								$i = $i +1;
							}
						}
						elseif($row['TYPE'] === 'sortable'){
							echo '<p>' . $question . '</p>';
							$i = 0;
							$answers_glued = implode(",", $answers_id);
							echo '<input type="hidden" name="' . $field_id  . '" value="' . $answers_glued . '" />';
							echo '<ul class="sortable list-group col-md-6 col-xs-6" id="' . $field_id . '">';
							foreach($answers as $answer){
								$answers_id[$i] = trim($answers_id[$i]);
								echo '<li id=' . $answers_id[$i] . ' class="list-group-item">' . $answer . '</li>';
								$i = $i +1;
							}
							echo '</ul>';
						}
					}
					else{
						continue;
					}
					echo '</div>';
				}
				?>	
				<div>
				<button class='btn' type="submit" value="Submit">Wyślij</button>
				</div>
				</form>
		</div>
		</div>
</body>
<script type="text/javascript">
  $( function() {
    $( ".sortable" ).sortable();
    $( ".sortable" ).disableSelection();
	$( ".sortable" ).sortable({
    	update: function(event, ui) {
            var listID = event.target.id;
            var order = $("#" + listID).sortable("toArray");
            $('input[name=' + listID + ']').val(order.join(";"));
         }
    });
  });
</script>
</html>
