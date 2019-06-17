<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
	$id=mktime();
$pname=$_POST['packagename'];
	

$q="select * from list where url='$pname'";
$r=mysql_query($q);
$ee=mysql_fetch_row($r);
$tt=$ee[2];
if($tt=="whitelist")
{
$msg="Great!!! This site is in Whitelist";
}
else 
{
$rr="blacklist";
$error="This site is in Blacklisted";
$q="insert into list values('$id','$pname','$rr')";
mysql_query($q);
}

}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Phishing Detection</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?>
<div class="banner">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Phishing Detection</h1>
	</div>
</div>


<!--- rupes ---->
<!--- /rupes ---->




<!---holiday---->
<div class="container">
	<div class="holiday">
	



	
	
  	       <h3>search Url</h3>
  	        	  <?php  if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form action="search.php" class="form-horizontal" name="package" method="post">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">URL</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Enter Url" required>
									</div>
								</div>



								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Search</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     </br>
	 </br></br>
      
	</div>
</div>

<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>			
<!-- //write us -->
</body>
</html>