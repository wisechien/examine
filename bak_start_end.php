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
 
</head>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<body>
  
  <header>
     <h1><a href="index.php"></a></h1> 
  </header>
  <div class="borderBar"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --> 
 <div id="wrapper">
        <!-- Navigation --> 
     <div class="panel panel-success">
              <div class="panel-heading "> 
           已答完所有題目，下列為答案列表 「<a href="print.php?test_id=<?php echo $test_id;?>&RandNum=<?php echo $RandNum;?>">列印版本</a>」
             </div>  
  
  <div class="col-md-12">
     <div class="row">
     
      <div class="col-md-12" style="padding-top:10px">
     <div class="panel panel-primary">
                        <div class="panel-heading"> 
                        </div>
                        <div class="panel-body">
                            <p><?php
                           
                                  ?> 
                             </p>  
          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
                  </div>
        </div>  
  <?php
 //echo $test_id; 
 $result = "SELECT a.*, b.* FROM `sessions` as a, `savsoft_qbank` as b where a.test_id = '$test_id' AND a.RandNum = '$RandNum' AND a.qid = b.qid ORDER BY total_cur ASC";   
    $rs = mysql_query($result,$link) or die("Query failed"); 
while($line=mysql_fetch_array($rs,MYSQL_ASSOC)){
     //$qid = $line["qid"];
    //$get_answer = $line["answer"];
   //$get_qid = $line["qid"];
    $get_optionsRadios  = $line["optionsRadios"];
    $get_total_cur  = $line["total_cur"]; 
    $question = $line["question"];
    $question_type  = $line["question_type"];
    $answer = $line["answer"];
    $a = $line["a"];
    $b = $line["b"];
    $c = $line["c"];
    $d = $line["d"];
    $level =  $line["level"];
    $rank =  $line["rank"];
   
    if ( $get_optionsRadios != $answer ){
    $question_txt = '<div style=color:red;text-decoration:none>'.$get_total_cur .".&nbsp".$question.'</div>';
    $error += 1; 
     }else{
       $question_txt = '<div style=color:black;>'.$get_total_cur .".&nbsp".$question.'</div>';
       $get_correct += 1 ;
    }  
  $cur += 1;
     if ($cur % 9 == 0){ 
  $get_cur = $cur;
  $get_level = $level;
  $sessions['incorrect_score'] = $error;
  $get_incorrect_score =  $sessions['incorrect_score'] ; 
   //_insert_class($test_id,$get_level,$get_cur,$get_incorrect_score,$get_correct);  
   //$get_correct = 0;
}   
  ?> 
  <div class="col-md-6" style="padding-top:10px">
       <div class="caption" style="border: 1px solid #ddd;padding:10px">
        <h4 style="height:30px"> <!-- title -->
   <?php echo $question_txt;?>  </h4> 
        </div>   
<ul class="list-group">
  <li class="list-group-item <?php echo $arr;?>">
   <b> 你的答案是: <?php echo $get_optionsRadios; ?> /</b>
    <b style="color:red">正確解答是: <?php echo $answer."<br>";?></b>
    </li> 
  <li class="list-group-item <?php echo $arr;?>">A:<?php echo $a;?></li>
  <li class="list-group-item <?php echo $arr;?>">B:<?php echo $b;?></li>
  <li class="list-group-item <?php echo $arr;?>">C:<?php echo $c;?></li>
  <li class="list-group-item <?php echo $arr;?>">D:<?php echo $d;?></li>
 </ul>
  </div> 
    <?php
       }
         mysql_free_result($result); 
          ?>
     <!-- /.col-lg-12 -->
       </div>
   </div>
  
    <!-- /#wrapper -->
  <!-- Custom Theme JavaScript --> 
    <script src="//raw.github.com/fryn/html5slider/master/html5slider.js"></script> 
    <script src="http://www.jqueryscript.net/demo/Create-Simple-Alert-Messages-with-jQuery-Bootstrap-alert-js/alert.js" type="text/javascript"></script>
      <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<script>
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'SuperABC 語文能力測驗'
        },
        
        xAxis: {
            categories: [
             <?php echo _format_level($test_id,$RandNum);?> 
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
             tickInterval: 1,
            max: 9,
            maxColor: '#102D4C',
            title: {
                text: '你的答案'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">答題正確數: </td>' +
                '<td style="padding:0"><b>{point.y:1f}  </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{ 
            name: <?php echo _test_level($test_id);?>, 
            data: [<?php  echo _format_str($test_id,$RandNum);?>] 
        }]
    });
});
</script>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  
</body>
</html>