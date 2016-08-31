<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
<?php
error_reporting(0);
$host=$_GET['host'];
$u=$_GET['user'];
$p=$_GET['p'];
$db=$_GET['db'];
$con = mysqli_connect($host, $u, $p, $db);
$result="";
// Check connection
if (mysqli_connect_errno($con)) {
    $result= "Failed to connect to MySQL";
}
else
{
	$result="Connected!";
}

?>
Database Connectivity Result: <?php echo $result;?>
<br>
<br>
<br>

<form action="BI_phase2.php" method="GET">
<input type="hidden" value="<?php echo $host;?>" name="host"/>
<input type="hidden" value="<?php echo $u;?>" name="u"/>
<input type="hidden" value="<?php echo $p;?>" name="p"/>
<input type="hidden" value="<?php echo $db;?>" name="db"/>
Select Table : <select name="table" required>
<?php 
$mysqli = new mysqli($host, $u, $p, $db);
$result = $mysqli->query("SHOW TABLES");
    while ( $row = $result->fetch_row() ){
    echo "<option value='".$row[0]."'>".$row[0]."</option>";
	}
?>
</select>
<input type="submit" value="Select Fields ">
</form>
<?php
/*
$mysqli = new mysqli($host, $u, $p, $db);
$result = $mysqli->query("SHOW TABLES");
    while ( $row = $result->fetch_row() ){
    $table = $row[0];
 echo '<h3>',$table,'</h3>';
$result1 = $mysqli->query("SELECT * FROM $table");
if($result1) {
    echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    $column = $mysqli->query("SHOW COLUMNS FROM $table");
echo '<tr>';
    while($row3 = $column->fetch_row() ) {
    echo '<th>'.$row3[0].'</th>';
}
echo '</tr>';
    while($row2 = $result1->fetch_row() ) {
      echo '<tr>';
      foreach($row2 as $key=>$value) {
        echo '<td>',$value,'</td>';
      }
      echo '</tr>';
    }
    echo '</table><br />';
  }
  }
$mysqli->close();*/
?>
</form>
</body>
</html>