<?php  
  if (!isset($_SESSION)) session_start();
  require('include/conn.php');
  require('include/function.php');
  //  Process Start 
        $test_id = fixsql('test_id',1);
    //get var
        $get_rank = fixsql('rank',1);
        $get_level = fixsql('level',1);
    // Process END  
         $RandNum = fixsql('RandNum',1);   
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""> 
   <title><?php echo $web_site_title?></title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Custom CSS -->
     
   <style type="text/css">
@import url(css/print-style.css) ;
</style>

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
    
 <style type="text/css">
              .input-group{
                margin-bottom: 20px;
              }
              .input-group-lg{
                height: 46px; 
                font-size: 16px;
                line-height: 1.33;
                }
              .form-control {
                  color:#337ab7;
                  font-weight: 400;
                }
              .thumbnail{
                margin-bottom:  10px;
              }
  </style>
</head>
<body>
  <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header"> 
           <a class="navbar-brand" href="index.php">SuperABC 語文能力測驗</a>    
        </nav> 
           <div class="panel panel-success"> 
           
 <style>
  .bs-example {
        margin-right: 0;
        margin-left: 0;
        background-color: #fff;
        border-color: #ddd;
        border-width: 1px;
        border-radius: 4px 4px 0 0;
        -webkit-box-shadow: none;
        box-shadow: none
    }
    </style>
  <div class="col-md-12"  >
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                         <th>#</th>
                                            <th>題目</th>
                                            <th>你的答案</th>
                                             <th>正解</th>
                                            <th>A</th>
                                            <th>B</th>
                                            <th>C</th>
                                            <th>D</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
  <?php 
  //$result = mysql_query("select * FROM sessions WHERE test_id = $test_id ORDER BY total_cur DESC");
   $result = "SELECT a.*, b.* FROM `sessions` as a, `savsoft_qbank` as b where a.test_id = '$test_id' AND  RandNum = '$RandNum' AND a.qid = b.qid ORDER BY total_cur ASC"; 
    $rs = mysql_query($result,$link) or die("Query failed");  
while($line=mysql_fetch_array($rs,MYSQL_ASSOC)){
    $get_optionsRadios  = $line["optionsRadios"];
    $get_total_cur  = $line["total_cur"]; 
    $question = $line["question"];
    $question_type  = $line["question_type"];
    $answer = $line["answer"];
    $a = $line["a"];
    $b = $line["b"];
    $c = $line["c"];
    $d = $line["d"]; 
  
if ( $get_optionsRadios != $answer ){
    $get_optionsRadios_txt = '<div style=color:red;text-decoration:none><strong>'.$get_optionsRadios.'</strong></div>';
    $question_txt = '<div style=color:red;text-decoration:none>'.$question.'</div>';
     }else{
       $get_optionsRadios_txt = $get_optionsRadios;
       $question_txt =$question;
     } 
   ?> 
      <tr>
        <td><?php echo $get_total_cur;?>  </td>
            <td><?php echo $question_txt;?>  </td>
              <td><?php echo $get_optionsRadios_txt; ?></td>
              <td><?php echo $answer; ?></td>
              <td><?php echo $a;?></td>
              <td><?php echo $b;?></td>
              <td><?php echo $c;?></td>
              <td><?php echo $d;?></td>
      </tr>  
        </div> 
    <?php
       }
         mysql_free_result($result);
        ?>
     <!-- /.col-lg-12 -->
         </tbody>
                                </table>
                            </div>
   
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="//raw.github.com/fryn/html5slider/master/html5slider.js"></script>
    <script src="js/bootstrap-player.js"></script>
    <script src="http://www.jqueryscript.net/demo/Create-Simple-Alert-Messages-with-jQuery-Bootstrap-alert-js/alert.js" type="text/javascript"></script>
      <script type="text/javascript">
                 $( "p" ).click(function() {
               $( this ).slideUp();
               $.alert('播放完畢自行關閉', {
               // Enable auto close
autoClose: true, 

// Auto close delay time in ms (>1000)
closeTime: 5000, 

// Display a countdown timer
withTime: false, 

// danger, success, warning or info
 type: 'danger', 

// position+offeset
// top-left,top-right,bottom-left,bottom-right,center
position: ['center', [-0.42, 0]],

// Message title
title: '語音播放中',

// For close button
close: '', 

// <a href="http://www.jqueryscript.net/animation/">Animation</a> speed
speed: 'normal', 

// Set to false to display multiple messages at a time
isOnly: true, 

// Minimal space in PX from top
minTop: 90,

// onShow callback
onShow: function () {
  document.getElementById('demo').play();
}, 

// onClose callback
onClose: function () {
}  
              });
                

              });
             </script>
</body>

</html>
