
<?php
include ('database/config.php');

// declare post fields
if(isset($_POST["page1"]) && !empty($_POST["page1"]))
{
	$nlike = $_POST["nlike"];
	$email = $_POST["email"];

$like=mysql_query("SELECT * FROM lud WHERE 
     email='$email'");
$num=mysql_num_rows($like);
$row=mysql_fetch_array($like);

if($num==0){
	$titleget="Insert into lud(email,lyk) values('".$email."','1')";
}else{
	$titleget="update lud set lyk='1' where  email='".$email."'";

	}

$rs=mysql_query($titleget) or die (mysql_error());
echo "<script>window.location='index.php'</script>";
?>
		     <span class="btn disabled btn-small" id="l" title="You like this" ><i class="icon-thumbs-up"></i>&nbsp;Liked</span>

       
      <?php }
?>     



<?php
include ('database/config.php');

// declare post fields
if(isset($_POST["page2"]) && !empty($_POST["page2"]))
{
	$nlike = $_POST["nlike"];
	$email = $_POST["email"];
	

$like=mysql_query("SELECT * FROM lud WHERE 
     email='$email'
    ");
$num=mysql_num_rows($like);
$row=mysql_fetch_array($like);

if($num==0){
	$titleget="Insert into lud(email,lyk) values('".$email."','0')";
}else{
	$titleget="update lud set lyk='0' where  email='".$email."'";

	}

$rs=mysql_query($titleget) or die (mysql_error());
echo "<script>window.location='index.php'</script>";
?>
		     <span class="btn disabled btn-small" title="You like this" id="u"><i class="icon-thumbs-down"></i>&nbsp;Disliked</span>

       
      <?php }
?>  