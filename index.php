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

$store_op=$_POST['lastOp'];

for ($i=0;$i<18;$i++){

	//$_POST[$i] is the value of the input name.
	//SO, if the $i = 13, which means the post get the name="13" value, 
	//then $_POST[$i] will be "X"
 	
 	echo "post ".$i.": ".$_POST[$i]."<br>";
	echo "isset: ".isset($_POST[$i])."<br>";
	
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
			break;
			case 17:
				$currentOp='.';
			break;

		}
	}
}
$store_op.=$currentOp;

echo "store_opx: ".$store_op;

function result_get($store_op){

	$opArray=explode(" ", $store_op);
	var_dump($opArray);
	$total=$opArray[0];

	$numOfOps=count($opArray);
	echo "<br>"."numOfOps: ".$numOfOps;
	for ($i=0;$i<$numOfOps;$i++){
		$countMod=$i%2;
		echo " countMod: ".$countMod;
		if ($countMod == 1){
			//normally people enter number first, then enter the operator
			//So 0 1 0 1 0 1 0
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