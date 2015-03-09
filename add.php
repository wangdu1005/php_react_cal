<!doctype html>
<html>
<head><title>PHP/CSS Calculator</title>
<meta charset="UTF-8">
<!-- <link href="css/add.css" rel="stylesheet" type="text/css" /> -->
<head>
<body>
<div id="calc">
<div id="header">Calculator
	<div id="closeBtn"></div>
</div>

<?php
$oldOp=$_POST['lastOp'];
for ($x=0;$x<18;$x++){
	if (isset($_POST[$x])){
		$currentOp=$x;
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
				$oldOp=equals($oldOp);
			break;
			case 15:
				$currentOp="";
				$oldOp="";
			break;
			case 16:
				$currentOp=' % ';
				$oldOp=equals($oldOp);
			break;
			case 17:
				$currentOp='.';
			break;

		}
	}
}
$oldOp.=$currentOp;

echo "oldOp: ".$oldOp;

function equals($oldOp){

	$opArray=explode(" ", $oldOp);
	var_dump($opArray);
	$total=$opArray[0];

	$numOfOps=count($opArray);
	echo "<br>"."numOfOps: ".$numOfOps;
	for ($x=0;$x<$numOfOps;$x++){
		$countMod=$x%2;
		echo " countMod: ".$countMod;
		if ($countMod == 1){
			switch($opArray[$x])
			{
				case '+':
					$total+=$opArray[$x+1];
				break;
				case '-':
					$total-=$opArray[$x+1];
				break;
				case 'X':
					$total*=$opArray[$x+1];
				break;
				case '/':
					$total/=$opArray[$x+1];
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
	<form method="post" action="add.php" id="formCalc">
<?php
echo <<<_END
<input type="hidden" value="$oldOp" name="lastOp" />
<input type="textbox" value="$oldOp" id="opBox" name="opBox"  />
_END;
?>
		<input type="submit" value="0" id="zero" name="0" class="opButtons" />
		<input type="submit" value="1" id="one" name="1" class="opButtons" />
		<input type="submit" value="2" id="two" name="2" class="opButtons" />
		<input type="submit" value="3" id="three" name="3" class="opButtons" />
		<input type="submit" value="4" id="four" name="4" class="opButtons" />
		<input type="submit" value="5" id="five" name="5" class="opButtons" />
		<input type="submit" value="6" id="six" name="6" class="opButtons" />
		<input type="submit" value="7" id="seven" name="7" class="opButtons" />
		<input type="submit" value="8" id="eight" name="8" class="opButtons" />
		<input type="submit" value="9" id="nine" name="9" class="opButtons" />

		<input type="submit" value="+" id="add" name="10" class="opButtons"/>
		<input type="submit" value="-" id="sub" name="11" class="opButtons"/>
		<input type="submit" value="/" id="div" name="12" class="opButtons"/>
		<input type="submit" value="X" id="mul" name="13" class="opButtons"/>
		<input type="submit" value="=" id="equals" name="14" class="opButtons"/>
		<input type="submit" value="Esc" id="escape" name="15" class="opButtons"/>
		<input type="submit" value="%" id="percent" name="16" class="opButtons" />
		<input type="submit" value="." id="dot" name="17" class="opButtons" />


	</form>
</div>
</div>
</body>
</html>