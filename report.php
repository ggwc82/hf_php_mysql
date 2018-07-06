<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Aliens Abducted Me - Report an Abduction</title>
</head>
<body>
  <h2>Aliens Abducted Me - Report an Abduction</h2>

<?php
  require_once "vendor/autoload.php";
  (new \Dotenv\Dotenv(__DIR__))->load();

  $db_location = $_ENV['LOCATION'];
  $db_user = $_ENV['USER_NAME'];
  $db_password = $_ENV['PASSWORD'];
  $db_name = $_ENV['DATABASE_NAME'];

  $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $when_it_happened = $_POST['whenithappened'];
  $how_long = $_POST['howlong'];
  $how_many = $_POST['howmany'];
  $alien_description = $_POST['aliendescription'];
  $what_they_did = $_POST['whattheydid'];
  $fang_spotted = $_POST['fangspotted'];
  $email = $_POST['email'];
  $other = $_POST['other'];

  // $to = 'get.gobby@googlemail.com';
  // $subject = 'Aliens Abducted Me - Abduction Report';
  // $msg = "$name was abducted $when_it_happened and was gone for $how_long.\n" .
  //   "Number of aliens: $how_many\n" .
  //   "Alien description: $alien_description\n" .
  //   "What they did: $what_they_did\n" .
  //   "Fang spotted: $fang_spotted\n" .
  //   "Other comments: $other";
  // mail($to, $subject, $msg, 'From:' . $email);

  $dbc = mysqli_connect($db_location, $db_user, $db_password, $db_name)
    or die('Error connecting to MySQL server');

  $query = "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened, how_long, " .
    "how_many, alien_description, what_they_did, fang_spotted, other, email) " .
    "VALUES ('$first_name', '$last_name', '$when_it_happened', '$how_long', '$how_many', '$alien_description', " .
    "'$what_they_did', '$fang_spotted', '$other', '$email')";
  echo $query;

  $result = mysqli_query($dbc, $query)
    or die('Error querying database');
  
  mysqli_close($dbc);

  echo 'Hello' . $name . '!<br />';
  echo 'Thanks for submitting the form.<br />';
  echo 'You were abducted ' . $when_it_happened;
  echo ' and were gone for ' . $how_long . '<br />';
  echo 'Number of aliens: ' . $how_many . '<br />';
  echo 'Describe them: ' . $alien_description . '<br />';
  echo 'The aliens did this: ' . $what_they_did . '<br />';
  echo 'Was Fang there? ' . $fang_spotted . '<br />';
  echo 'Other comments: ' . $other . '<br />';
  echo "Your email address is $email <br />";
  echo 'This isn\'t the final line ' . $name; 
?>

</body>
</html>
