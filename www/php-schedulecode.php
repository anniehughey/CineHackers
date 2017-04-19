<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHP Schedule Code</title>
</head>

<body>
<div id="schedule">
  <h2>Week at a Glance</h2>
<?php $subject = 0;
	$start_date = 1;
	$start_time = 2;
	$end_date = 3;
	$end_time = 4;
	$all_day_event = 5;
	$description = 6;
	$location = 7;
	$trailer = 8;
	$today = time();
	 	
	for ($c = 0; $c < 6; $c++) {
		$day = $today + 60*60*24*$c;
		echo "<div class=\"dayblock\"><h4>" . date("D", $day) ."<br>". date("d", $day) . "</h4>\n";
		$mdy = date("m/d/y", $day);
		if (($handle = fopen("calendar_Spring2013/cal_full.csv", "r")) !== FALSE) {
			
			while (($data = fgetcsv($handle, 1000)) !== FALSE) {
				if (trim($data[$start_date]) == $mdy) {
					echo "<div class=\"showing\">\n";
					if (strlen($data[$trailer]) > 0){
				echo
				"<a href=\"" . $data[$trailer]. 
				 "\" rel=\"prettyPhoto\" class=\"trailer\" title=\"".$data[$subject]."\">
				Trailer</a>";
				}	
					echo "<p><a class=\"title\" href=\"" . substr($data[$description],26) . "\">" . $data[$subject] . "</a><br>\n" . $data[$start_time] . " - " . $data[$location] . "</p>\n";
					
					
					echo "</div>\n";
				}
			
			}
		}echo "</div>\n";
	}
	
	echo "<br>";
	fclose($handle);
?>
-->

</body>
</html>