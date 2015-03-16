<!doctype html>
<html>
<head><title>PHP/CSS Calculator</title>
<meta charset="UTF-8">
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<head>
<body>
<div id="calc">
<div id="header">Jiro Practice Calculator
	<div id="closeBtn"></div>
</div>

<?php

$store_op=@$_POST['lastOp'];

// 1.==== This for loop will find out which number or operator has been submit.
//then push the string with "one space on left side and right side of value" into $currentOp variable
//these two space around the value are for the output UI, if no space it will be very ugly!!

for ($i=0;$i<18;$i++){

	// 2.==== $_POST[$i] is the value of the input name.
	//SO, if the $i = 13, which means the post get the name="13" value, 
	//then $_POST[$i] will be "X"
 	
 	echo empty($_POST[$i])?"<br>"."no number":"<br>"."value of name: ".@$_POST[$i]."<br>";
	
	if (isset($_POST[$i])){
		$currentOp=$i;
		switch ($currentOp){
			case 10:
				$currentOp=' + ';
			break;
			case 11:
				$currentOp=' - ';
			break;
			case 12:
				$currentOp=' / ';
			break;
			case 13:
				$currentOp=' X ';
			break;
			case 14:
				$currentOp="";
				$store_op=result_get($store_op);
			break;
			case 15:
				$currentOp="";
				$store_op="";
			break;
			case 16:
				$currentOp=' % ';
				$store_op=result_get($store_op);
				echo "<br>"."The submmit is percentage: ".$store_op."<br>";
			break;
			case 17:
				$currentOp='.';
			break;

		}
	}
}

// 3.==== If the submmit value is "number" not "operator", 
//then just ".=" store the number into string variable!
//But no matter what, the for loop still will run 18 times to searching the "operator"!

$store_op.=@$currentOp;

echo "<br>"."store_op: ".$store_op;

// 4.==== This result_get function is to calculate those value.
// it will explode the store_op string into an "array"

function result_get($store_op){

	// 5.==== Because the for loop for checking operator will insert an " "."x"." " two space around it
	// so the array will be "12 + 10 - 55", and we using explode to get all nubmer and operator, 
	// and remove those space
	$opArray=explode(" ", $store_op);
	echo "opArray: "."<br>";
	var_dump($opArray);
	$total=$opArray[0];

	$numOfOps=count($opArray);
	echo "<br>"."numOfOps: ".$numOfOps;
	for ($i=0;$i<$numOfOps;$i++){

		$countMod=$i%2;
		echo " countMod: ".$countMod;

		// 6.==== without the space the array will be 12+50-601+100 == 0101010
		// so what if the array become 12++50--610--100?? it will be == 0101010101
		if ($countMod == 1){
			
			// 7.==== If the $opArray[$i] is operator then the [$i+1] 
			// will be the number to calculate with previous number result
			// If!! the [$i+1] still is operator, then just ignore it, and return the total value
			switch($opArray[$i])
			{
				case '+':
					$total+=$opArray[$i+1];
				break;
				case '-':
					$total-=$opArray[$i+1];
				break;
				case 'X':
					$total*=$opArray[$i+1];
				break;
				case '/':
					$total/=$opArray[$i+1];
				break;
				case '%':
					$total/=100;
				break;
			}
		}
	}
return $total;
}

?>

<div id="formStyle">
	<form method="post" action="index.php" id="formCalc">
<?php
// 8.==== The final result will be update into this input textbox value="$store_op"
// <<<_END XXXXXXXXXX _END is the paragraph expression, it can read the php variable and html tag
echo <<<_END
<input type="hidden" value="$store_op" name="lastOp" />
<input type="textbox" value="$store_op" id="opBox" name="opBox"  /><br>
_END;
?>
		<input type="submit" value="0" id="zero" name="0" class="opButtons" />
		<input type="submit" value="1" id="one" name="1" class="opButtons" />
		<input type="submit" value="2" id="two" name="2" class="opButtons" /><br>
		<input type="submit" value="3" id="three" name="3" class="opButtons" />
		<input type="submit" value="4" id="four" name="4" class="opButtons" />
		<input type="submit" value="5" id="five" name="5" class="opButtons" /><br>
		<input type="submit" value="6" id="six" name="6" class="opButtons" />
		<input type="submit" value="7" id="seven" name="7" class="opButtons" />
		<input type="submit" value="8" id="eight" name="8" class="opButtons" /><br>
		<input type="submit" value="9" id="nine" name="9" class="opButtons" />

		<input type="submit" value="+" id="add" name="10" class="opButtons"/>
		<input type="submit" value="-" id="sub" name="11" class="opButtons"/><br>
		<input type="submit" value="/" id="div" name="12" class="opButtons"/>
		<input type="submit" value="X" id="mul" name="13" class="opButtons"/>
		<input type="submit" value="=" id="equals" name="14" class="opButtons"/><br>
		<input type="submit" value="Esc" id="escape" name="15" class="opButtons"/>
		<input type="submit" value="%" id="percent" name="16" class="opButtons" />
		<input type="submit" value="." id="dot" name="17" class="opButtons" />


	</form>
</div>
</div>
</body>
</html>