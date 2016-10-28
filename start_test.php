<?php  
  if (!isset($_SESSION)) session_start();
  require('include/conn.php');
  require('include/function.php');
  //  Process Start
    // seesion 
        $_SESSION['test_id']=fixsql('test_id',1);
       //echo  $_SESSION['test_id'];
        // get staus 
        $get_error = $_SESSION['error']; 
           if ($_SESSION["RandNum"]==""){
           Redirect('index.php', false);
            die();
          } 
        
      //get var
        $get_rank = fixsql('rank',1);
        $get_level = fixsql('level',1);
        $get_qid = fixsql('qid',1);
        $get_question_type = fixsql('question_type',1); 
        $get_test_id = $_SESSION['test_id'];
        $get_RealDate = fixsql('RealDate',1); 
 
   $result = mysql_query("SELECT * FROM savsoft_qbank WHERE level = $get_level AND question_type = '$get_question_type' AND qid not in (select qid from sessions WHERE test_id= '$get_test_id') ORDER BY RAND() LIMIT 1 ");
  
  $line = mysql_fetch_array($result, MYSQL_BOTH);
    $get_qid = $line["qid"];
    $level = $line["level"];
    $qset = $line["qset"];
    $question = $line["question"];
    $question_type  = $line["question_type"];
    $answer = $line["answer"];
    $a = $line["a"];
    $b = $line["b"];
    $c = $line["c"];
    $d = $line["d"];
    $images = $line["images_path"];
  // Process END
    $sound = $line["sound_path"];
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
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/headerfooter.css">
  <link rel="stylesheet" type="text/css" href="css/about.css">
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> 
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
     .gap-right {
                 margin-right: 20px; 
              }
   .block{display:block;}
  form.cmxform label.error
  {display:none;
    color: #8a6d3b;
 color: #a94442;
background-color: #f2dede;
border-color: #ebccd1
}
label.error
{
  padding: 6px;
 
border: 1px solid transparent;
border-radius: 4px
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
              $("#myButton").unbind("click").click(myHandler);
   </script>

<script>
 function disable_f5(e)
{
  if ((e.which || e.keyCode) == 116)
  {
      e.preventDefault();
  }
}
 
 
  $(document).ready(function() {
        $(document).bind("keydown", disable_f5);    
    $("#signupForm").validate({
      
            rules: {
                optionsRadios: "required"
            },
            messages: {
                optionsRadios: "&nbsp&nbsp&nbsp&nbsp&nbsp 請 填 寫 答 案  &nbsp&nbsp&nbsp&nbsp&nbsp"
            }
        });
  });
  </script>
  
  <style>
 
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
 <div id="wrapper">
        <!-- Navigation -->
     <form role="form" class="cmxform" name="signupForm" id="signupForm" enctype="multipart/form-data" action="verify.php" method="post"   novalidate="novalidate">
             <INPUT type="hidden" value="<?php echo $get_qid;?>" name="qid">
             <INPUT type="hidden" value="<?php echo $level;?>" name="level">
             <INPUT type="hidden" value="<?php echo $question_type;?>" name="question_type">
             <INPUT type="hidden" value="<?php echo $_SESSION['test_id'];?>" name="test_id"> 
            
           <div class="panel panel-success">
              <div class="panel-heading ">
           <?php if ($question_type == "ListenPic"){  
                echo "<h4>". $_SESSION['total_cur'].".&nbsp看圖辨義：請按「播放」聽取題目，然後依照所看到的圖畫，選出最相符的答案。每題可播放兩次。 </h3>";  
                }elseif ($question_type == "ListenPhrase"){
                echo "<h4>". $_SESSION['total_cur'].".&nbsp問答：請按「播放」聽取題目，然後依照所聽到的短句，選出最適當的回應。每題可播放兩次。 </h3>"; 
                    }else{ 
                echo "<h4>". $_SESSION['total_cur'].".&nbsp填空：每題有一個空格，請從四個選項中選出一個最適合題意的字或詞作答。 </h3>"  ;
                $quest_txt = "<Blockquote style=\"margin:2px;\"><h3 style=\"margin:2px;\">".$question."</h3></Blockquote>";
                }
              ?>  
             </div>  
                  <div class="panel-body">  
          <?php echo $quest_txt ?>
            <div class="clearfix"> 
     <?php   if ($images > 0){ ?><img class="pull-left gap-right" src="images/<?php echo $images?>" >     <?php } ?>
  <p>   <div class="col-md-6"> <div class="row"> <div class="input-group input-group-lg">
      <span class="input-group-addon"> <input type="radio" name="optionsRadios" id="optionsRadios" value="A" required="" aria-required="true" class="error" ></span>
      <div class="form-control">&#9372;&nbsp <?php echo $a;?></div>
    </div>
     <div class="input-group input-group-lg">
      <span class="input-group-addon"> <input type="radio" name="optionsRadios" id="optionsRadios" value="B" class="error" ></span>
      <div class="form-control">&#9373;&nbsp <?php echo $b;?></div>
    </div>
      <div class="input-group input-group-lg">
      <span class="input-group-addon"> <input type="radio" name="optionsRadios" id="optionsRadios" value="C" class="error"></span>
      <div class="form-control">&#9374;&nbsp <?php echo $c;?></div>
    </div>
      <div class="input-group input-group-lg">
      <span class="input-group-addon"> <input type="radio" name="optionsRadios" id="optionsRadios" value="D" class="error"></span>
      <div class="form-control">&#9375;&nbsp <?php echo $d;?></div>
    </div><!-- /input-group --></div>  </div> </p>
</div> 
    </div>
          <div class="panel-footer">  
             <?php if ($_SESSION['total_cur']== 45) {
              $next_txt="作答完畢";  
             }else{
               $next_txt="下一題";
             }?>
      <div class="row"><div class="col-sm-4">
        <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite"> 
              <script>  
   $( window ).load(function() {  
    $('input:radio[name=optionsRadios]').prop('checked', false); 
    $('input:radio[name=optionsRadios]').click(function () {
    var checkval = $('input:radio[name=optionsRadios]:checked').val();
     if (checkval == 'A' || checkval == 'B'  || checkval == 'C'  || checkval == 'D'){
        $('#commandButton_1_0').removeAttr('disabled');
    }
  });
});
   </script>
         <button class="btn btn-primary" id="commandButton_1_0" disabled="disabled" ><?php echo $next_txt?> &#8811;</button>
             <label for="optionsRadios" class="error" ></label></div></div>  
             <audio id="demo" src="images/<?php echo $sound?>" type="audio/wav"></audio>
                  <?  
              if ($sound > 0){ ?>
              <div class="col-md-1"> <p><button type="button" class="btn btn-info" name="myButton" id="myButton" >播放 </button> </p> </div>
                <div class="col-md-1"> <p><button type="button" class="btn btn-info" name="myButton" id="myButton"  >播放</button> </p></div>
              <?php } ?>
              </div>
  </div>  
                </div> 
            </form>
            <!-- Loop End -->
            <?php 
        mysql_free_result($result);
      ?>
   
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
closeTime: 3000, 

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
minTop: 0,

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
   
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
 
</body>
</html>