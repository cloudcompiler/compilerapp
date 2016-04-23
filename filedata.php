<?php
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//****************************************File Upload*****************************************
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$acturl="http://192.168.43.156/owncloud/apps/compilerapp/";

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	$mess="";
	$filename="";
	
	if(isset($_FILES['Ofile']['tmp_name']))
	{
	$filename = $_FILES['Ofile']['tmp_name']; 
	}
	else
	{
		$mess="File Not Found<br>";
	}

	if($mess=="")
	{
	$path = "upload/"; 
	$valid_formats = array("java", "php", "c", "cpp", "xml","JAVA", "PHP", "C", "CPP", "CS", "cs","XML"); 
	$name = $_FILES['Ofile']['name']; 
	$size = $_FILES['Ofile']['size'];
	if(strlen($name)) 
		{
			list($txt, $ext) = explode(".", $name); //extract the name and extension of the image
			if(in_array($ext,$valid_formats)) //if the file is valid go on.
			{
					if($size < 512000) // check if the file size is more than 5 mb
					{
						$actual_image_name =  $_FILES['Ofile']['name']; 
						$Parameter=$_POST['Parameter'];

						$tmp = $_FILES['Ofile']['tmp_name']; 
						if(move_uploaded_file($tmp, $path.$actual_image_name)) 
						{
						move_uploaded_file($tmp, $path.$actual_image_name); 
						$RD=date('y-m-d');

						if(strpos($actual_image_name,".java")>=1 or strpos($actual_image_name,".JAVA")>=1)
							{
					$actufile=$acturl.$path."javarun.php?FileNam=".$actual_image_name."&Parameter=".$Parameter;
							?>
<iframe name="InlineFrame1" id="InlineFrame1" style="width:100%;height:300px;border:1px #C0C0C0 solid;" src="<?php echo $actufile; ?>" frameborder="0"></iframe>
							<?php
							}
						if(strpos($actual_image_name,".cs")>=1 or strpos($actual_image_name,".CS")>=1)
							{
					$actufile=$acturl.$path."csrun.php?FileNam=".$actual_image_name."&Parameter=".$Parameter;
							?>
<iframe name="InlineFrame1" id="InlineFrame1" style="width:100%;height:300px;border:1px #C0C0C0 solid;" src="<?php echo $actufile; ?>" frameborder="0"></iframe>
							<?php
							}
						else if(strpos($actual_image_name,".c")>=1 or strpos($actual_image_name,".C")>=1)
							{
					$actufile=$acturl.$path."tccrun.php?FileNam=".$actual_image_name."&Parameter=".$Parameter;
							?>
<iframe name="InlineFrame1" id="InlineFrame1" style="width:100%;height:300px;border:1px #C0C0C0 solid;" src="<?php echo $actufile; ?>" frameborder="0"></iframe>
							<?php
							}
						else if(strpos($actual_image_name,".cpp")>=1 or strpos($actual_image_name,".CPP")>=1)
							{
					$actufile=$acturl.$path."tccrun.php?FileNam=".$actual_image_name."&Parameter=".$Parameter;
							?>
<iframe name="InlineFrame1" id="InlineFrame1" style="width:100%;height:300px;border:1px #C0C0C0 solid;" src="<?php echo $actufile; ?>" frameborder="0"></iframe>
							<?php
							}
						if(strpos($actual_image_name,".xml")>=1 or strpos($actual_image_name,".XML")>=1)
							{
							$actufile=$acturl.$path.$actual_image_name;
							?>
<iframe name="InlineFrame1" id="InlineFrame1" style="width:100%;height:300px;border:1px #C0C0C0 solid;" src="<?php echo $actufile; ?>" frameborder="0"></iframe>
							<?php
							}
						if(strpos($actual_image_name,".php")>=1 or strpos($actual_image_name,".PHP")>=1)
							{
							$actufile=$acturl.$path.$actual_image_name;
							?>
<iframe name="InlineFrame1" id="InlineFrame1" style="width:100%;height:300px;border:1px #C0C0C0 solid;" src="<?php echo $actufile; ?>" frameborder="0"></iframe>	
							<?php
							}

						}
						else
						{	
						echo "<font style=\"font-size:13px\" color=\"#FF0000\" face=\"Arial\"><b>failed</b></font>";		
						}
					}
					else{ 
					echo "<font style=\"font-size:13px\" color=\"#FF0000\" face=\"Arial\"><b>file size max 5 MB</b></font>";	
						  }
				}
				else
				{
					echo "<font style=\"font-size:13px\" color=\"#FF0000\" face=\"Arial\"><b>Invalid file format..</b></font>";	
				}
		}
		else
		{		
			echo "<font style=\"font-size:13px\" color=\"#FF0000\" face=\"Arial\"><b>Please select File..!</b></font>";
		}
		
	}
	else
	{
		echo "<font style=\"font-size:13px\" color=\"#FF0000\" face=\"Arial\"><b>$mess</b></font>";
	}
}


?>

