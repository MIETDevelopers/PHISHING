<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Phising</title>
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
<!--- banner ---->
<div class="banner-1">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Search</h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="rooms">
	<div class="container">
	

<div class="container">
	<div class="holiday">

      <h3>Search Url</h3>
  	        	  <?php  if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php
if(isset($_GET['m'])) {

$m=$_GET['m'];
  	   
  	   if($m=='w'){?>
  	   
  	   <div class="successWrap"><strong>SUCCESS</strong>:<?php echo htmlentities(" Your searched URL is White Listed"); ?> </div>
  	   <?php } else if($m=='b') 
  	   {?>
<div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities(" Your searched URL is Black Listed"); ?> </div>
  <?php
  } else {
  ?>
  <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities(" Your searched URL is Not Available in Database"); ?> </div>
  <?php
  }
  }
?>

    <div class="tab-content" style="text-align:center;">
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

				<button type="reset" class="btn-inverse btn" onclick="clear_msg()" >Reset</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
	 </div>
	 </div>

	
		<div class="room-bottom" style="min-height:299px">
			<h3>Recent Search List</h3>
<br>
	<table border="1" width="100%">
<tr align="center">
<th align="center">#</th>
<th align="center">Dated</th>
<th align="center">URL</th>	
<th align="center">Status</th>
</tr>
<?php 

$uemail=$_SESSION['login'];;
$sql = "SELECT * FROM log WHERE searched_by=".$_SESSION['login_id'].' order by created_dated desc Limit 5' ;
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
<tr align="center">
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($result->created_dated);?></td>

<td><?php echo htmlentities($result->url);?></td>
<td><?php echo htmlentities($result->status);?></td>
</tr>
<?php $cnt=$cnt+1; }} ?>
	</table>
			
		
		</div>
	</div>
</div>
<!--- /rooms ---->

<!--- /footer-top ---->
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
<script>
function clear_msg()
{
  
  $('.successWrap').css("display","none");
    $('.errorWrap').css("display","none");
}
</script>
</body>
</html>