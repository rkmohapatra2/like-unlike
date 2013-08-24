<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Like and dislike</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script src="js/jquery.js"></script><!--drop down login-->


<script src="js/bootstrap.js"></script>
<script src="js/btn_action.js"></script>

<h4>
<a href="http://pinoysourcecode.blogspot.com">Click here to view my article </a>
</h4>
<?php 
   include('database/config.php');
   ?>
 
  
  <?php if(!isset($_SESSION['email'])){ ?>
   <span class="span4">
   <table class="table table-bordered success" border="1" align="center" style="margin-top:40px;">
   <th>
Enter email address
   </th>
<tr>
  <td>
   <form>
<fieldset>
<label>Email Address:</label>
<input type="text"  name="email" id="email" required="required" />
<table border="0">
<td>
<a href="javascript:void(0);" class="btn btn-large"  style="float:left;"onClick="doLogin();"><i class="icon-thumbs-up icon-black"></i>&nbsp;&nbsp;&nbsp;Click to rate&nbsp;&nbsp;&nbsp;<i class="icon-thumbs-down icon-black"></i></a>
</td><td>
<div class="login_div" id="login_div"></div>
</td></table>
</fieldset>
</form>
</td></tr></table>
</span>
<?php }else {?>
 
       <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" >
           
              <input name="nlike" id="nlike" type="hidden" value="0" >
        <?php 
		   include('database/config.php');
		$like=mysql_query("SELECT * FROM lud where email='".$_SESSION['email']."'");
$num=mysql_num_rows($like);
$row=mysql_fetch_array($like); ?>


        <span class="span4">
 <table class="table table-bordered success" border="1" align="center" style="margin-top:40px;">
 <th><a href="?try">cancel</a>
   </th>
   <tr>
   <td>Do you like my post??</td>
   </tr>
   
   <tr>
   <td><img src="images/photo.jpg" height="200" width="200" /></td>
   </tr>
    <tr>
   <td><?php
   $likes=mysql_query("SELECT * FROM lud where lyk=1");
$nums=mysql_num_rows($likes);
echo  $nums."&nbsp;people like this";
    ?></td>
   </tr>
    <tr>
   <td><?php
   $l=mysql_query("SELECT * FROM lud where lyk=0");
$n=mysql_num_rows($l);
echo  $n."&nbsp;people hate this";
    ?></td>
   </tr>
<tr>
  <td>

 
<?php 
if($row['lyk']=='1'){ 
		?>
 <span class="btn disabled btn-small" id="l" title="You like this" ><i class="icon-thumbs-up"></i>&nbsp;Liked</span>

		<?php }else{ ?>
        <a href="javascript:void(0);" id="like" class="btn btn-small" title="Likes" onClick="like();"><i class="icon-thumbs-up icon-black"></i>&nbsp;<span id="like_div">Like</span></a><span id="youlike"></span>
        <?php } if($row['lyk']=='0'){ ?>
          <span class="btn disabled btn-small" title="dislike" id="hide"><i class="icon-thumbs-down"></i>&nbsp;Disliked</span>

         <?php }else{ ?>
         <a href="javascript:void(0);" class="btn btn-small" title="Total Downloads" id="dislike" onClick="dislike();"><i class="icon-thumbs-down icon-black"></i>&nbsp;<span id="dislike_div">DisLike</span></a><span id="disyoulike"></span>
         
         <?php }?>
  <?php }?>
      </td> 
     
 </tr>
 

</table>
<?php 
if(isset($_GET['try'])){
	 unset($_SESSION['email']);
	echo "<script>window.location='index.php'</script>";
	
	}
?>
 </span>
 <a href="http://pinoysourcecode.blogspot.com">Download more here </a>
 </body>
</html>
