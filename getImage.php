<?php

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $link = mysql_connect('servername', 'root', 'abcd');
  mysql_select_db('BonApetit');
  $sql = 'SELECT * FROM restaurants where id='.$id;
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header('Content-type: image/jpeg');
  echo $row['image'];
