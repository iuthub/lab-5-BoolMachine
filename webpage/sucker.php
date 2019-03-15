<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
        if(($_REQUEST["firstname"] == "") || ($_REQUEST["sections"] == "selectDefault")||
            ($_REQUEST["creditCardInfo"] == "")){ ?>
                <h1>Sorry</h1>
        <p>You didn't fill out the form completely. <a href="buyagrade.html"> Try again?</a></p>

        <?php 
            }else{
			
            ?>

		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?php echo $_POST["firstname"]; ?><br></dd>

			<dt>Section</dt>
			<dd><?php echo $_POST["sections"]; ?></dd>

			<dt>Credit Card</dt>
			<dd><?php echo $_POST["creditCardInfo"];?>
			<?php echo "("; echo $_POST["optradio"]; echo ")"?></dd>
			<br>

			<dd><dt>Here are the suckers who have submitted here before you:</dt></dd>
			<br>
			<?php
			$myfile = fopen("sucker.txt", "r") or die("Unable to open file!");
			// Output one line until end-of-file
			while(!feof($myfile)) {
			  echo fgets($myfile) . "<br>"; }
			fclose($myfile);
			?>

			<?php
				$myfile = fopen("sucker.txt", "a") or die("Unable to open file!");
				fwrite($myfile, "\n");
				$txt = $_POST["firstname"];
				fwrite($myfile, $txt);
				fwrite($myfile, ";");
				$txt = $_POST["sections"];
				fwrite($myfile, $txt);
				fwrite($myfile, ";");
				$txt = $_POST["creditCardInfo"];
				fwrite($myfile, $txt);
				fwrite($myfile, ";");
				$txt = $_POST["optradio"];

				fwrite($myfile, $txt);
				fclose($myfile);
			?>

		<?php
            }
        ?>

		</dl>
	</body>
</html> 