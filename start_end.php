<?php  
   if (!isset($_SESSION)) session_start();
     
  require('include/conn.php');
  require('include/function.php');
  //  Process Start 
        $test_id = fixsql('test_id',1);
    //get var
        $get_rank = fixsql('rank',1);
        $get_level = fixsql('level',1);  
        if ($_SESSION["RandNum"]==''){
           $RandNum = fixsql('RandNum',1);  
       }else{
         $RandNum = $_SESSION["RandNum"];
       }
       $test_date = getRealDate(); 
    // Process END 
    
      
 ?>
 <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> -->
     <title><?php echo $web_site_title?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description"        content=""/> 

	<link rel="icon"          type="image/x-icon" href=""/>
	<link rel="shortcut icon" type="image/x-icon" href=""/>
<script src="js/bootstrap.min.js"></script>
	  <!-- Bootstrap Core CSS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300|Source+Sans+Pro:700,400:300' rel='stylesheet' type='text/css'>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/headerfooter.css">
  <link rel="stylesheet" type="text/css" href="css/svg.css">
	
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/device.js/0.2.7/device.min.js"></script> -->
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/cookie.js/1.1.1/cookie.min.js"></script> -->
 <style type="text/css">
  body { 
    font-family: "Microsoft JhengHei", 微軟正黑體, "Microsoft Yahei", 微軟雅黑體, Arial, sans-serif;
  background: url(img/banner-07.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.container{
margin-left:  10px;
padding-left: 15px; 
padding-right: 15px;
}
/*
    ==============================================================
       Banner Services CSS
    ==============================================================
*/
.gt_servicer{
  position:relative;
  margin-top:-50px;
  float: left;
  width: 100%;
  z-index: 10;
}
.gt_main_services{
  float: left;
    width: 100%;
    padding: 40px 30px 50px;
    position: relative;
}
.gt_main_services >i{
  font-size:50px;
  margin-bottom: 23px;
  color: #fff;
  display: block; 
} 
.gt_main_services h5{
  margin-bottom:18px;
  color: #fff;
  font-weight: 600;
}

.gt_main_services h3{
  margin-bottom:18px;
  color: #fff;
  font-weight: 600;
}

.gt_main_services p{
  font-size:14px;
  color: #fff;
}
 
.gt_main_services a {
    right: 16px;
    padding: 14px 15px;
    bottom: -15px;
    color: #ffffff;
   
}
 
.bg_1{
  background:#f64c1e;
}
.bg_2{
  background:rgba(255, 0, 0, 0.2);
  
}
.bg_3{
  background:#fc0018;
}

.bg_4{
  background:#80cd33;
}
.bg_5{
  background:#efc336;
}
.bg_6{
  background:#896ac3;
} 
 
 /*
    ==============================================================
       What We Offer 02 Wrap CSS
    ==============================================================
*/
 
.gt_wht_offer_wrap{
  float: left;
  width: 100%;
  position: relative;
  min-height: 100px;

}
.gt_wht_offer_wrap > i{
  width: 30px;
  height: 30px;
  border-radius: 100%;
  line-height: 30px;
  color: #000;
  font-size: 20px;
  text-align: center;
  float: left;
  position: relative;
  margin: 5px 0 5px 5px;
}
 
 
 i.fa.fa-print{
  font-size:20px;
 }
  /*footer*/ 
    .footer .copyright {
        text-align: center;
        background: #595758;
        color: #999;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2.3em;
    }
        .footer .copyright .right {
            margin-left: 2em;
        }
        .footer .copyright figure {
            padding-bottom: 0.769em;
        }

        .footer .copyright p {
            padding: 0.769em 0;
            color: #9f9d9e;
        } 
 </style>
</head>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<body>
	 <header>
         <h1><a href="javascript:;"></a></h1>
    </header>
	<div class="borderBar"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <div class="container"> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="gt_main_services bg_6">
                            <i class="icon-write-board"></i>
                            <h5>已答完所有題目</h5>
                             <h3>請通知主任或老師 </h3>
                             <a href="print.php?test_id=<?php echo $test_id;?>&RandNum=<?php echo $RandNum;?>" target="_blank"><i class="fa fa-print" aria-hidden="true"  ></i> 成績單列印</a> 
                        </div>
                      </div>   
                    </div>   
  <div class="col-md-6" style="margin-top: 100px;">  
  <div class="gt_wht_offer_wrap">
  <?php    #$baby_count; 
       $baby_count = _test_level($test_id);  
          for ( $i=0; $i < $baby_count; $i++){ 
             if ($i < 10 ){
                   echo "<i class=\"icon-smiling-baby bg_2\"></i>";
               }  
            if ($i == 9 ){
                 echo  " <div class=\"gt_wht_offer_wrap\">";
               } 
               if ($i > 9 ){
                   echo "<i class=\"icon-smiling-baby bg_5\"></i>";
               } 
            } 
        ?>   
        </div>
</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --> 

</body>
</html>