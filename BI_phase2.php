
<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
<?php
error_reporting(0);
$host=$_GET['host'];
$u=$_GET['u'];
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

<form action="BI.php" method="GET">

Selected Table : <?php $table=$_GET['table'];echo $table;?><br><br><br> Select X Axis <select name="x" required>
<?php 
$mysqli = new mysqli($host, $u, $p, $db);
$result1 = $mysqli->query("SELECT * FROM $table");
if($result1) {
    $column = $mysqli->query("SHOW COLUMNS FROM $table");
    while($row3 = $column->fetch_row() ) {
        echo "<option value='".$row3[0]."'>".$row3[0]."</option>";
}
}
?>
</select>

<br><br><br> Select Y Axis <select name="y" required>
<?php 
$mysqli = new mysqli($host, $u, $p, $db);
$result1 = $mysqli->query("SELECT * FROM $table");
if($result1) {
    $column = $mysqli->query("SHOW COLUMNS FROM $table");
    while($row3 = $column->fetch_row() ) {
        echo "<option value='".$row3[0]."'>".$row3[0]."</option>";
}
}
?>
</select> (This Must be a Number  Field if Selected Algorithm is Summing )
<br><br><br> Select Plot Diagram <select name="plot" required>
<option value="bar">Bar</option>
<option value="column">Column</option>
<option value="area">Area</option>
<option value="spline">Spline</option>
<option value="pie">Pie</option>
</select>
<br><br><br> Select Algorithm <select name="algo" required>
<option value="0">Counting X vs Y</option>
<option value="1">Summing X vs Y</option>
</select>
<br>
<br>
<br>
<input type="submit" value="Select Fields ">
<input type="hidden" value="<?php echo $host;?>" name="host"/>
<input type="hidden" value="<?php echo $u;?>" name="u"/>
<input type="hidden" value="<?php echo $p;?>" name="p"/>
<input type="hidden" value="<?php echo $db;?>" name="db"/>
<input type="hidden" value="<?php echo $table;?>" name="table"/>
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