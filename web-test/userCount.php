<?php
$sum = 0;
$today = date("Y-m-d");
$sql = "select * from counter where date='$today'";
$result = mysqli_query($sql, $connect);
$row = mysqli_fetch_array($result);

if (!$row) {
	$sql0 = "insert into counter(date, count) values('$today', 1)";
	mysqli_query($sql0, $connect);
} else {
	$sql1 = "update counter set count=count+1 where date='$today'";
	mysqli_query($sql1, $connect);
}

$sql = "select * from counter where date='$today'";
$result = mysqli_query($sql, $connect);
$row = mysqli_fetch_array($result);
$count = $row[count];

$sql_total = "select * from counter";
$result_total = mysqli_query($sql_total, $connect);
while ($row_total = mysqli_fetch_array($result_total)) {
	$sum += $row_total[count];
}
?>
<!DOCTYPE html>
<html>

<head>
	<h1>방문자 수</h1>
</head>

<body>
	<p>today visitor :</p><?= number_format($count) ?><br>
	<p>total visitor: </p><?= number_format($sum) ?>
</body>

</html>
