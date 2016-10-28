<?php 
  if (!isset($_SESSION)) session_start();

  require('include/conn.php');
  require('include/function.php');

        // seesion 
        $_SESSION['cur']=1;
        $_SESSION['total_cur']=1;
        $_SESSION['correct']=0;
        $_SESSION['total_correct']=0;
        $_SESSION['error']=0;
        $_SESSION['total_error']=0;
        $_SESSION["qset"]= rand(1,5);
        $_SESSION["RandNum"] = getRandNum();
        
        //get var
        $get_test_id = fixsql('test_id',1);
        $get_level = fixsql('level',1);
        $get_rank = fixsql('rank',1);
        $get_question_type = fixsql('question_type',1);
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

    <meta name="og:site_name" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image"     content=""/>
    <meta property="og:image:url" content=""/>

    <link rel="icon"          type="image/x-icon" href=""/>
    <link rel="shortcut icon" type="image/x-icon" href=""/>


    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/headerfooter.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">
      <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> 
<style>
#commentForm{width:500px;}
#commentForm label{width:250px;}
#commentForm label.error,
#commentForm input.submit{margin-left:253px;}
#signupForm {width:670px;}
#signupForm label.error{margin-left:10px;width:auto;display:inline;color:red;}
#newsletter_topics label.error {display:none;margin-left:103px;}
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/EaselJS/0.8.0/easeljs.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/PreloadJS/0.6.0/preloadjs.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/device.js/0.2.7/device.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/cookie.js/1.1.1/cookie.min.js"></script> -->
      <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.1/additional-methods.js"></script>
    <script>
    $.validator.setDefaults({
        submitHandler: function() {
            alert("開始測試!");
              document.signupForm.submit();
        }
    });

    $().ready(function() {
        // validate the comment form when it is submitted
         
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                test_id: "required"
            },
            messages: {
                test_id: "請輸入姓名"
            }
        });
  
    });
    </script>
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
<div id="wrapper">
 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
             
             <!-- /.navbar-static-side -->
        </nav>

        
            <div class="container-fluid">
            <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->  
             <!-- <div class="col-lg-4">-->
                   <div class="panel panel-info">
                        <div class="panel-heading"> 
                            <h2>測驗說明</h2>
                        </div>

                 <div class="panel-body">
                    <div class="col-sm-3" style="margin-top: 100px: ">
                       <img src="images/read.png">
                       </div>
                         <div class="col-lg-6">
                        <blockquote> <p>本測驗包含聽力與填空兩大題型，共45題，均為選擇題
</p><br>注意：<br>
 
請依照頁面上方說明作答；<br>聽力題型共可聽取兩次題目，請點選頁面下方「播放」按鈕即可。   
<form role="form" id="signupForm" name="signupForm" enctype="multipart/form-data" action="start_test.php" action method="post" novalidate="novalidate">
                     <INPUT type="hidden" value="<?php echo $get_level;?>" name="level">
                    <INPUT type="hidden" value="<?php echo $get_question_type;?>" name="question_type"> 
                      <INPUT type="hidden" value="ok" name="u"> 
                    <h4 style="color:blue">輸入受測者姓名:</h4> 
                    <input type="text" name="test_id" id="test_id" width="12"  minlength="2"  ><br></blockquote>
                           <div class="col-lg-2"> 
                            <button type="submit" class="btn btn-primary">開始測驗 &#8811;</button></div>
                           <!--<button type="button" class="btn btn-primary" onclick="javascript:location.href='start_test.php?level=<?php echo $get_level;?>&question_type=<?php echo $get_question_type;?>&total_cur=1&cur=1'">開始測驗 &#8811;</button>-->
                            </form></div>

                        </div>
                     </div>
                        <div class="panel-footer">
                      
                        </div>
                    </div>
                <!--</div>-->
             
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper --> 
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
   
</body>
</html>