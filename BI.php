<?php $start = microtime(true);?><?php
$host=$_GET['host'];
$u=$_GET['u'];
$p=$_GET['p'];
$db=$_GET['db'];
$con = mysqli_connect($host, $u, $p, $db);
$result="";
$table=$_GET['table'];
$result="";
$xdata="";
$x=$_GET['y'];
$y=$_GET['x'];
$algo=$_GET['algo'];

if ($algo=='0')
{
	
// Check connection
if (mysqli_connect_errno($con)) {
    $result= "Failed to connect to MySQL";
}
else
{
	$result="Connected!";
}

$mysqli = new mysqli($host, $u, $p, $db);
$result1 = $mysqli->query("SELECT DISTINCT $y FROM $table");
if($result1) {
   
    while($row3 = $result1->fetch_row() ) {
		$yy=$row3[0];
		$result22 = $mysqli->query("SELECT * FROM $table WHERE $y='$yy'");
$row22 = $result22->fetch_row();
		
        $xdata="{ label: '$row3[0]',  y: $mysqli->affected_rows  },".$xdata;

}
}
}

else
{
	$amount=0;	
// Check connection
if (mysqli_connect_errno($con)) {
    $result= "Failed to connect to MySQL";
}
else
{
	$result="Connected!";
}

$mysqli = new mysqli($host, $u, $p, $db);
$result1 = $mysqli->query("SELECT DISTINCT $y FROM $table");
if($result1) {
   
    while($row3 = $result1->fetch_row() ) {
		$yy=$row3[0];
		$result22 = $mysqli->query("SELECT $x FROM $table WHERE $y='$yy'");

while($row22 = $result22->fetch_row() ) {
		$amount=$row22[0]+$amount;
		$r=$row22[0];
}
	
        $xdata="{ label: '$row3[0]',  y: $amount  },".$xdata;
		$amount=0;

}
}
}

?><!DOCTYPE HTML>
<html>
<head>
<script src="canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
		theme: "theme1",//theme1
		title:{
			text: "Business Intelligence"              
		},
		animationEnabled: true,   // change to true
		data: [              
		{
			// Change type to "bar", "area", "spline", "pie",etc.
			type: "<?php echo $_GET['plot'];?>",
			dataPoints: [
				<?php echo $xdata;?>
				
			]
		}
		]
	});
	chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>
<?php  $end = microtime(true);
$creationtime = ($end - $start);
printf("Page created in %.6f seconds.", $creationtime);?>