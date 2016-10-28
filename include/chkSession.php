<?
if($_COOKIE["SYS_USER_ID"] == ""){
?>
   <script>
   	   window.location = "login.php";
   </script>
<?
   exit; 
 }else{
	$DEFAULT_INDEXNO = 2;
 }
?>