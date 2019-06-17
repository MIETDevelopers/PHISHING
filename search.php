<?php
session_start();
//error_reporting(0);
include('includes/config1.php');

if(isset($_POST['submit']))
{

$login_id=$_SESSION['login_id'];
	$id=mktime();
$pname=$_POST['packagename'];
	

$q="select * from list where url='$pname'";

$r=mysql_query($q);
$ee=mysql_fetch_row($r);

$tt=$ee[3];

//echo  $tt.'  LLLL';
if($tt=="whitelist")
{
$msg="Great!!! This site is in Whitelist";
echo $msg;
echo "<script type='text/javascript'> document.location = 'dashboard.php?m=w'; </script>";
}
else if($tt=="blacklist" || $tt=="BlackList")
{
$rr="blacklist";
$error="This site is in Blacklisted";
//$q="insert into list values('$id','$pname','$rr')";
echo "<script type='text/javascript'> document.location = 'dashboard.php?m=b'; </script>";
//echo '           '.$q;
//mysql_query($q);

}
else
{
   $tt="Not Available";
  echo "<script type='text/javascript'> document.location = 'dashboard.php?m=n'; </script>";

}
$sql_log="insert into log(url,status,searched_by) values('$pname','$tt',$login_id)";

mysql_query($sql_log);



}
?>