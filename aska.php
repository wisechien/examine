<?php 
   if (!isset($_SESSION)) session_start();
  require('include/conn.php');
  require('include/function.php');
$test_id = ASKA ;
 
 $result = "SELECT *  FROM `class_level`  where test_id = '$test_id'  ";
  $rs = mysql_query($result,$link) or die("Query failed"); 
  while($list=mysql_fetch_array($rs)){  //判斷是否還有資料沒有取完，如果取完，則停止while迴圈。
  $set1 = $list['set1'];
  $set2 = $list['set2'];
  $set3 = $list['set3'];
  $set4 = $list['set4'];
  $set5 = $list['set5'];

  $format_str  =  $set1.','.$set2.','.$set3.','.$set4.','.$set5 ;
}
    //$str = "8,9,10,11,11";
    $arr = explode(',', $str);
    $arrCount = array_count_values($arr);
    $temp= false;
    for($i=count($arr)-1;$i> 0;$i--) {
        if($arrCount[$arr[$i]] > 1) {
           $last_repeat = $arr[$i];
           
           echo "Level=".$last_repeat."<br>";
           echo "Level="._last_level($last_repeat)."<br>";

           $temp = true;
           break;
        }
    } 
    if(!$temp) {
 echo "Level=".end($arr);
 $last_repeat = end($arr);
    echo "Level="._last_level($last_repeat)."<br>";
 
}
echo $str;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Superabc 語文能力測驗</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-player.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     
</head>
<body>

  <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript --> 
    <script src="//raw.github.com/fryn/html5slider/master/html5slider.js"></script> 
    <script src="http://www.jqueryscript.net/demo/Create-Simple-Alert-Messages-with-jQuery-Bootstrap-alert-js/alert.js" type="text/javascript"></script>
     
</body>

</html>