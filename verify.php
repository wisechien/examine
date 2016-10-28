<?php 
 if (!isset($_SESSION)) session_start();
  //require('../include/chkSession.php');
  require('include/conn.php');
  require('include/function.php');
  require('session_record.php');
   // 預載 
   // seesion  
   /*
        $_SESSION['cur'];
        $_SESSION['total_cur'];
        $_SESSION['correct'];
        $_SESSION['total_correct'];
        $_SESSION['error'];
        $_SESSION['total_error'];
   */ 
   $test_id =  fixsql('test_id',1);   
//導入 回答的參數
   $get_level = fixsql('level',1);
   $get_qid = fixsql('qid',1);
   $get_optionsRadios = fixsql('optionsRadios',1);  
   $get_question_type = fixsql('question_type',1);
  
// 導入答題數 
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
      $_SESSION['total_error'] +=1;
      $_SESSION['error'] +=1;  
    }
      //  答題單筆寫入資料庫 
   _insert_class_level($get_qid,$get_answer,$get_optionsRadios,$test_id,$_SESSION['total_cur'],$_SESSION['RandNum']); 
   
   // 總答題數 判斷處理項目 
   /* 處理 題型變換*/ 
  if ($_SESSION['total_cur'] != 45){
  //計算答題數量 
      $_SESSION['total_cur'] +=1; 
      $_SESSION['cur'] +=1; 

 //判斷 目前答題數 變換 題目 & Level // 
  if ($_SESSION['cur']==10){ 
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
        } 
   /* 返回清空 */

      $_SESSION['cur'] = 1 ;
       unset($_SESSION['error']);
      unset($_SESSION['correct']);
}
  //指向並指定下一題  
   Redirect('start_test.php?level='.$get_level.'&qid=' . $get_qid . '&question_type=' . _change_level($_SESSION['cur']) .'&test_id='. $test_id , false);
 die();  
  }else { 
  /* 已經全部回答完畢逐筆 計算  */
 $result = "SELECT a.*, b.* FROM `sessions` as a, `savsoft_qbank` as b where a.test_id = '$test_id' AND a.qid = b.qid ORDER BY total_cur ASC"; $rs = mysql_query($result,$link) or die("Query failed"); 
      while($line=mysql_fetch_array($rs,MYSQL_ASSOC)){ 
        $get_optionsRadios = $line["optionsRadios"];
        $get_total_cur = $line["total_cur"]; 
        $question = $line["question"];
        $question_type = $line["question_type"];
        $answer = $line["answer"];
        $a = $line["a"];
        $b = $line["b"];
        $c = $line["c"];
        $d = $line["d"];
        $level = $line["level"];
        $rank = $line["rank"];
        $cur += 1;  
    if ( $get_optionsRadios != $answer ){
         $error += 1; 
     }else{
         $get_correct += 1 ;
     }   
 if ($cur % 9 == 0){
    $get_cur = $cur;
    $get_level = $level;
    $incorrect_score = $error ;
  _insert_class($test_id,$get_level,$get_cur,$get_incorrect_score,$get_correct,$_SESSION['RandNum']); 
    $get_correct = 0; 
       $cur += 1; 
      }   
    }

  //Redirect('print.php?test_id=' . $_SESSION['test_id'].'&RandNum=' . $_SESSION['RandNum'], false);
  Redirect('start_end.php?test_id=' . $_SESSION['test_id'].'&RandNum=' . $_SESSION['RandNum'], false);
  die(); 
  } 

  ?>