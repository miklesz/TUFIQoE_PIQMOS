<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

//include 'function.php';

session_start();

// DEBUG: uncomment to test this separately
//if(!isset($_SESSION['id_user']))
//  $_SESSION['id_user'] = 100;



function log_debug($txt) {
  // Uncomment for debugging
  //echo "$txt\n";
}

function normalize_cheat_score($c) {
  // Normalize score and apply non-linear fitting
  $normScore =  $c / 2;
  return round( 100 * ( -0.5 * ( tanh($normScore - 3) - 1 ) ) );
}

if(isset($_SESSION['id_user'])) {

  $id_user = $_SESSION['id_user'];
  $screen = $_REQUEST['screen'];
  $browser = $_REQUEST['browser'];
  $smallest = $_REQUEST['smallestNumber'];
  $highest = $_REQUEST['highestNumber'];
  $blackStars = $_REQUEST['blackStars'];
  $focusTime = $_REQUEST['focusTime'];
  $clickNo = $_REQUEST['clickNo'];
  $clickCounter = $_REQUEST['clickCounter'];

  $minStar = min($blackStars);
  $maxStar = max($blackStars);
  $numStars = count($blackStars);

  //
  $numberWhites = array(-1, 247, 248, 249, 250, 251, 253, 254, 255);
  $startBlacks = array(-1, 41, 20, 16, 13,  9,  7,  5,  0);

  // Check for user cheating, See;
  // https://github.com/St1c/screentest#reliability-checks
  $cheat = 0;


  // Check black stars
  if($numStars > 0) {
    if($maxStar - $minStar != $numStars - 1) {
      log_debug("Numbers in stars array are not consecutive or 0");
      $cheat += 1;
    }
    if($minStar != 1) {
      log_debug("Low visible star selected, but not selected more visible one");
      $cheat += 2;
    }
    if($maxStar == 8) {
      log_debug("Invisible star selected");
      $cheat += 3;
    }
  }
  else {
    // put some values
    $minStar = 0;
    $maxStar = 0;
  }

  // Smallest vs highest
  if($smallest != "none") {
    if($highest == "none") {
      log_debug("Either one answer is 'none' and the other isn't");
      $cheat += 3;
    }
    else if($highest < $smallest) {
      log_debug("Highest visible number is smaller then the Smallest");
      $cheat += 1;
    }
    if($smallest < 1 || $smallest > 7) {
      log_debug("Smallest number not in < 1;7 > interval");
      $cheat += 3;
    }
  }
  if($highest != "none") {
    if($smallest == "none") {
      log_debug("Either one answer is 'none' and the other isn't");
      $cheat += 3;
    }
    if($highest < 1 || $highest > 7) {
      log_debug("Highest number not in < 1;7 > interval");
      $cheat += 3;
    }
  }
  // now set "none" to "-1" for db insertion
  if($smallest == "none" || $smallest < 1 || $smallest > 7)
    $smallest = 0; // Invalid
  if($highest == "none" || $highest < 1 || $highest > 7)
    $highest = 0;

  // focus
  if($focusTime < 6000) {
    log_debug("Time on page lower than 6 seconds");
    $cheat += 1;
  }
  // Clicking on dark area to find stars
  if($clickNo > 3) {
    log_debug("More than 3 clicks");
    $cheat += 3;
  }
  else if($clickNo > 1) {
    log_debug("More than 1 click");
    $cheat += 1;
  }

  $max_white = $numberWhites[$highest];
  $min_black = $startBlacks[$maxStar];

  $reliability = normalize_cheat_score($cheat);

  date_default_timezone_set('Europe/Warsaw');
  $test_date = date('Y-m-d H:i:s');

  // We have all the data: insert in database
  echo 'id_user='.$id_user.'<br>';
  echo 'test_date='.$test_date.'<br>';
  echo 'max_white='.$max_white.'<br>';
  echo 'min_black='.$min_black.'<br>';
  echo 'reliability='.$reliability.'<br>';
  echo 'screen='.$screen.'<br>';
  echo 'browser='.$browser.'<br>';

//  file_put_contents('results/'.$id_user.'.csv', 'id_user,'.$id_user.PHP_EOL, FILE_APPEND | LOCK_EX);
//  file_put_contents('results/'.$id_user.'.csv', 'test_date,'.$test_date.PHP_EOL, FILE_APPEND | LOCK_EX);
//  file_put_contents('results/'.$id_user.'.csv', 'max_white,'.$max_white.PHP_EOL, FILE_APPEND | LOCK_EX);
//  file_put_contents('results/'.$id_user.'.csv', 'min_black,'.$min_black.PHP_EOL, FILE_APPEND | LOCK_EX);
//  file_put_contents('results/'.$id_user.'.csv', 'reliability,'.$reliability.PHP_EOL, FILE_APPEND | LOCK_EX);
//  file_put_contents('results/'.$id_user.'.csv', 'screen,'.$screen.PHP_EOL, FILE_APPEND | LOCK_EX);
//  file_put_contents('results/'.$id_user.'.csv', 'browser,'.$browser.PHP_EOL, FILE_APPEND | LOCK_EX);

  file_put_contents(
      'results/'.$id_user.'_screen.csv',
      'id_user,test_date,max_white,min_black,reliability,screen,browser'.PHP_EOL
  );
  file_put_contents(
      'results/'.$id_user.'_screen.csv',
      $id_user.','.$test_date.','.$max_white.','.$min_black.','.$reliability.','.$screen.','.$browser.PHP_EOL,
      FILE_APPEND | LOCK_EX
  );


//  $dbhandle = connectToDB();
//  $query = mysql_query("INSERT INTO `SCREEN`(`ID_USER`, `TEST_DATE`, `MAX_WHITE`, `MIN_BLACK`, `RELIABILITY`, `SCREEN`, `BROWSER` ) VALUES ((SELECT ID FROM `USER` WHERE NUMBER = ('$id_user')), NOW(),('$max_white'),('$min_black'),('$reliability'),('$screen'),('$browser'))");


  header( "Location: testDescription.php" );

}
else {
  header( "Location: index.php" );
}



