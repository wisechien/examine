<?php 
 if (!isset($_SESSION)) session_start();
  //require('../include/chkSession.php');
  require('include/conn.php');
  require('include/function.php');
  require('session_record.php');
 
   // seesion 
  
  
   $test_id =  fixsql('test_id',1);  
   $get_qset = $_SESSION["qset"];
   //echo $test_id;
  /*$_SESSION['cur'] = fixsql('cur',1);
   $_SESSION['total_cur'] = fixsql('total_cur',1);
   $_SESSION['correct']  = fixsql('correct',1);
   $_SESSION['total_correct']  = fixsql('total_correct',1);*/
  //導入 回答的參數
   $get_level = fixsql('level',1);
   $get_qid = fixsql('qid',1);
   $get_optionsRadios = fixsql('optionsRadios',1);  
   $get_question_type = fixsql('question_type',1);
  //$answer = fixsql('answer',1);  

  // 導入答題數
 
    
  /* for ($i=0;$i>=$total_cur;$i++){
        $question_id = $i;
    }
    echo $question_id;
  */

  
//判斷是否答對 比對傳來的資料與資料庫資料 
$result = mysql_query("select qid,answer FROM savsoft_qbank WHERE level = '$get_level' and qid = '$get_qid'");
$line = mysql_fetch_array($result, MYSQL_BOTH);
  $qid = $line["qid"];
  $get_answer = $line["answer"]; 
 if ($get_answer == $get_optionsRadios ){
      $ans_txt='答對了';
          $countanswer +=1;
          $_SESSION['total_correct'] +=1;
          $_SESSION['correct'] +=1; 
         
    }else{
      $ans_txt= '答錯了';
      //$_SESSION['correct'] = $_SESSION['correct'];
      //$_SESSION['total_correct']  = $_SESSION['total_correct'];
      $_SESSION['total_error'] +=1;
      $_SESSION['error'] +=1; 
        
  }
  // 寫入資料庫 
   _insert($get_qid,$get_answer,$get_optionsRadios,$test_id,$_SESSION['total_cur']); 
  //_writ($get_qid,$get_answer);
             
    /*$access = time();
   $qid = $get_qid;
   $answer = $get_answer;
   $optionsRadios = $get_optionsRadios;
   $sql = "INSERT INTO sessions  (access, qid, answer, optionsRadios)VALUES  ('$access', '$qid', '$answer', '$optionsRadios')";
   mysql_query($sql,$link) or die("query db false!!!"); */
  
?>
 
  <?php
   //$_SESSION['total_cur'] =43;
  if ($_SESSION['total_cur'] != 45){
   
  //計算答題數量
  //$_SESSION['cur'] = fixsql('cur',1);
  
  $_SESSION['total_cur'] +=1; 
  $_SESSION['cur'] +=1; 
  
 //判斷 目前答題數 變換 題目 & Level // 
 
if ($_SESSION['cur']==10){
  $get_cur=$_SESSION['cur'];
  $get_correct = $_SESSION['correct'];
  _insert_class($test_id,$get_level,$get_cur,$get_incorrect_score,$get_correct);  

  if ($_SESSION['error'] <= 2){
     $get_level +=1;
      if ($get_level >= 15){
        $get_level = 15;
        }   
     
  }elseif($_SESSION['error'] >= 7){
      $get_level -=1;
          if ($get_level <= 1){
        $get_level = 1;
        }   
   }else{
       echo 不變等級;
  }
 
  $_SESSION['cur'] = 1 ;
  unset($_SESSION['error']);
  unset($_SESSION['correct']);
  
}

  switch ($_SESSION['cur']) {
        case '1':
       $get_question_type = ListenPic;
      break;
        case '2':
       $get_question_type = ListenPic;
      break;
        case '3':
       $get_question_type = ListenPhrase;
      break;
      case '4':
       $get_question_type = ListenPhrase;
      break;
      case '5':
       $get_question_type =  Letter;
      break; 
      case '6':
       $get_question_type = Letter;
      break;
     case '7':
       $get_question_type =  Letter;
      break;
       case '8':
       $get_question_type =  Grammar;
      break;
       case '9':
       $get_question_type = Grammar;
        break; 
  }

 //echo $_SESSION['cur']; 

 
 /* switch ($_SESSION['error']) {
     case '0':
     $get_level +=1;
     echo 升級;
       case '1':
     $get_level +=1;
     echo 升級;
    break;
      case '2':
    $get_level +=1;
      echo 升級;
    break; 
   case '7':
      $get_level -=1;
        echo 降級;
    break;
     case '8':
       $get_level -=1;
        echo 降級;
    break;
     case '9':
         $get_level -=1;
          echo 降級;
  unset($_SESSION['error']);
    break; 
  default:
     echo 不變等級;
    break;
} */
  //指向並指定下一題 
  Redirect('start_test.php?level='.$get_level.'&qid=' . $get_qid . '&question_type=' . $get_question_type .'&test_id='. $test_id , false);
 die(); 
 
?>

<?php
   //結果輸出
   echo "<div class=\"col-lg-6\">";
   echo "<div class=\"panel panel-default\">";
   echo "<div class=\"panel-heading\"> 系統訊息 </div>";

    echo "<div  class=\"panel-body\">";
    echo "<div class=\"alert alert-success\">";
    echo "session 總答題數計算 total_cur=".$_SESSION['total_cur']."<br>";
    echo "session Level 答題數計算 cur=".$_SESSION['cur']."<br>";
    echo  $ans_txt."<br>";     
    echo "傳入參數<br>";
    echo "表單<br>";
    echo "qid=".$get_qid."<br>";
    echo "qset=".$get_qset."<br>";
    echo "get_level=".$get_level."<br>";
    echo "optionsRadios 解題=".$optionsRadios."<br>";     
    echo "</div>";

   //參數帶出
   //運算
   
  echo "<div class=\"alert alert-danger\">";
  echo "answer=".$answer."<br>";
   echo "session 答錯數計算 error=".$_SESSION['error']."<br>";
  echo "session 總答正確數計算 total_correct=".$_SESSION['total_correct']."<br>";
  echo "session 正確數計算 correct=".$_SESSION['correct']."<br>";
  echo "</div>";
 ?>

<!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
<?php
 
 ?>
   <form role="form" name="test1" enctype="multipart/form-data" action="start_test.php" method="post">
      <!--<INPUT type="hidden" value="<?php //echo rand($min,$max);?>" name="qid"> -->
      <!--<INPUT type="hidden" value="<?php //echo $_SESSION['correct']?>" name="correct"> -->
      <!--<INPUT type="hidden" value="<?php //echo $_SESSION['total_correct']?>" name="total_correct"> -->
      <!--INPUT type="hidden" value="<?php //echo $_SESSION['cur'];?>" name="cur">  -->
      <!--<INPUT type="hidden" value="<?php //echo $_SESSION['total_cur'];?>" name="total_cur">  -->
          
           <INPUT type="hidden" value="<?php echo $get_level;?>" name="level">
           <INPUT type="hidden" value="<?php echo $get_qid;?>" name="qid">
           <INPUT type="hidden" value="<?php echo $get_question_type;?>" name="question_type">
           
 <button type="button" onclick="document.test1.submit()" class="btn btn-primary" >繼續考試
 </button>
 </form>
 </div>
</div>
</div>
   <?php  
  }else {
  //echo "已經全部回答完畢";
    //echo $test_id; 
 $result = "SELECT a.*, b.* FROM `sessions` as a, `savsoft_qbank` as b where a.test_id = '$test_id' AND a.qid = b.qid ORDER BY total_cur ASC"; 
 
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
    $cur += 1; 
    if ( $get_optionsRadios != $answer ){
      $error += 1; 
     } 

 
     if ($cur % 9 == 0){
  $get_cur = $cur;
  $get_level = $level;
  $incorrect_score = $error ;
  
   _insert_class($test_id,$get_level,$get_cur,$get_incorrect_score,$get_correct);  
    $cur += 1; 
      }   
    }
  Redirect('start_end.php?test_id=' . $_SESSION['test_id'], false);
  die(); 
  } 

  ?>