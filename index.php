<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP ReactJS Calculator</title>
</head>
<body>
	<form action="index.php" method="POST">
		<div class="enter_area">
			<p>PHP ReactJS Calculator By JIRO</p>
			<input id="out-put" type="text" readonly="readonly" name="" value="" placeholder="Please enter number...">
			<?php
				if(empty($_POST['jiro_test'])){
					$jiro_test = " ";
				}else{
					$jiro_test = $_POST['jiro_test'];
					echo "jiro_test: ".$jiro_test."<br>";
				}
			?>
		</div>
		<div class="keys">
			<p>
				<input type="text" name="jiro_test">
				<input type="submit" class="num_val" name="num1" value="1">
				<input type="submit" class="num_val" name="num2" value="2">
				<input type="submit" class="num_val" name="num3" value="3">
				<input type="submit" name="add" value=" + ">

			</p>
			<p>
				<input type="submit" class="num_val" name="num4" value="4">
				<input type="submit" class="num_val" name="num5" value="5">
				<input type="submit" class="num_val" name="num6" value="6">
				<input type="submit" name="minus" value=" - ">
			</p>
			<p>
				<input type="submit" class="num_val" name="num7" value="7">
				<input type="submit" class="num_val" name="num8" value="8">
				<input type="submit" class="num_val" name="num9" value="9">
				<input type="submit" name="sum" value=" x ">
			</p>
			<p>
				<input type="submit" class="num_val" name="num0" value="0">
				<input type="submit" class="num_val" name="num_dot" value=".">
				<input type="submit" class="num_val" name="num_c" value="C">
				<input type="submit" name="divide" value=" / ">
			</p>
			<P>
				<input type="submit" name="result_post" value="=" style="width: 110px;">
			</P>
		</div>
	</form>

</body>
</html>
