<?php
if(isset($_POST['ifsc'])) {
	$ifsc = $_POST['ifsc'];
	$json = @file_get_contents(
		"https://ifsc.razorpay.com/".$ifsc);
	$arr = json_decode($json);

	if(isset($arr->BRANCH)) {
		echo '<pre>';
		echo "<b>Bank:-</b>".$arr->BANK;
		echo "<br/>";
		echo "<b>Branch:-</b>".$arr->BRANCH;
		echo "<br/>";
		echo "<b>Centre:-</b>".$arr->CENTRE;
		echo "<br/>";
		echo "<b>District:-</b>".$arr->DISTRICT;
		echo "<br/>";
		echo "<b>State:-</b>".$arr->STATE;
		echo "<br/>";
		echo "<b/>Address:-</b>".$arr->ADDRESS;
		echo "<br/>";
	}
	else {
		echo "Invalid IFSC Code";
	}
}
?>
