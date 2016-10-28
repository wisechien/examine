 <?php 
   if (!isset($_SESSION)) session_start();
        session_unset();
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

      <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/headerfooter.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">
    
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/device.js/0.2.7/device.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/cookie.js/1.1.1/cookie.min.js"></script> -->
 <style type="text/css">
  body { 
  background: url(img/banner-03.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
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
  <div class="col-lg-5" style="margin-top:50px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">
                             <h4>級距選擇 </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="alert alert-success">
                               <button type="button" class="btn btn-success btn-lg btn-block" onclick="javascript:location.href='test.php?level=4&amp;rank=w1&amp;question_type=ListenPic'"> W1 ( 適合學習英文 0~2 年 )</button>
                            </div>
                            <div class="alert alert-info">
                               <button type="button" class="btn btn-info btn-lg btn-block" onclick="javascript:location.href='test.php?level=8&amp;rank=j1&amp;question_type=ListenPic'"> J1 ( 適合學習英文 2~3 年 )</button>
                            </div>
                            <div class="alert alert-warning">
                               <button type="button" class="btn btn-warning btn-lg btn-block" onclick="javascript:location.href='test.php?level=12&amp;rank=r1&amp;question_type=ListenPic'"> R1 ( 適合學習英文 3~5 年 )</button>
                            </div>
                             
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
 <footer role="contentinfo" class="footer"> 
<div class="copyright">
    <div class="left">
            <figure>
           </figure>
        <p>双語(股)公司 版權所有 | ©2004 Ace Bilingual Channel All Rights Reserved
 .</p>
    </div>
        <div class="right"> </div>
</div>
</footer>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/EaselJS/0.8.0/easeljs.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/PreloadJS/0.6.0/preloadjs.min.js"></script>
 
</body>
</html>