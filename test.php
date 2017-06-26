<?php
$date = strtotime(date("d-m-Y"));
$final = strtotime("+3 days",$date);
if($date < $final){
	echo "Yet to approve<br>";
}
echo "Current date is ".$date."<br>";
echo "date after 1 week from current date ".$final."<br>";
echo date("Y m d", $date),"<br>";
echo date("Y m d", $final);
?>
