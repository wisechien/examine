<?php 
 $str = array(8,9,8,7,6);
 

 $level = array();
 $total_cur = 5; 
 for ($i=0;$i<=$total_cur;$i++){
        array_push($level,id_rand( 1 , 17));
        //echo $i;
    }
 
    print_r($level);
?>
<hr>
<?php
function id_rand($min,$max){
  //$min=17;
  //$max=61;
    $rand= rand($min,$max);
  return $rand;
}
echo "id_rand=".id_rand( 11 , 17); 

foreach (range(0, 2, 1) as $number) {
    //echo $number;
}

?>
<hr>
<?php
function my_range( $start, $end, $step = 1) {

    $range = array();

    foreach (range( $start, $end ) as $index) {

        if (! (($index - $start) % $step) ) {
            $range[] = $index;
        }
    }

    return $range;
}

 echo my_range(0 ,2,1 );

?>
<hr>
<?php
 //晉級判斷
//http://stackoverflow.com/questions/5029409/how-to-check-if-an-integer-is-within-a-range
function t1($val, $min, $max) {

    if ($val >= 0 && $val <= 2){
        return "晉級";
    } else if ($val >= 3 && $val <= 6){ 
        return "維持";
    } else if ($val >= 7 && $val <= 9);
        return "降級";
    }
            echo t1(2);
     ?>
    <hr>
<?php
$string = '12 12 13 13 15';

$substring = '6';

$substringCount = substr_count($string, $substring);

echo '"' . $substring . '" appears in "' . $string . '" ' . $substringCount . ' times<br>';

?>
<hr>
 
<?php
function printCharMostRepeated($str)
{
    if (!empty($str))
    {
        $max = 0;
        foreach (count_chars($str(), 1) as $key => $val)
            if ($max < $val) {
                $max = $val;
                $i = 0;
                unset($letter);
                $letter[$i++] = chr($key);
            } else if ($max == $val)
                $letter[$i++] = chr($key);
        if (count($letter) === 1)
            echo 'The character the most repeated is "'.$letter[0].'"';
        else if (count($letter) > 1) {
            echo 'The characters the most repeated are : ';
            $count = count($letter);
            foreach ($letter as $key => $value) {
                echo '"'.$value.'"';
                echo ($key === $count - 1) ? '.': ', ';
            }
        }
    } else
        echo 'value passed to '.__FUNCTION__.' can\'t be empty';
}
 //$str = 8,9,8,99;
 //$str  = ('7,7,8,8,9');
 //printCharMostRepeated(12345);
?>

<hr>
<?php
$str = 12245;    
echo $str;
echo "<br>";
$repeating = array();
preg_match_all('/(\w)(\1+)/', $str, $repeating);

//aaa = 3 aaa = 3 ee = 2
if (count($repeating[0]) > 0) {
    // there are repeating characters
    foreach ($repeating[0] as $repeat) {
        echo $repeat . ' = ' . strlen($repeat) . "\n";

    }
        echo "no repeat";
}

?>
<hr>
<?php

$passarr = Array('12', '12', '13' ,'14','15');

foreach($passarr as $p) {
   $repeats = 0;
   preg_match_all('/(.)(\1+)/', $p, $matches, PREG_SET_ORDER);
   foreach($matches as $m) $repeats += strlen($m[2]);
   printf("%s => %d repeats\n", $p, $repeats);
}
?>
<hr>
 
<?php
$string = '11323';
$new_string = '';
$starting_char = 0;
while (strlen($string) > 0 && $starting_char < strlen($string)) {
    $blah = preg_match('/[0-9]{2,}/', $string, $matches);
    $letter = $matches[0][$starting_char];
    $new_string .= $letter;
    $regex = '/' . $letter . '{2,}/';
    $string = preg_replace($regex, $letter, $string);
    $starting_char++;
}
echo $new_string;
?>
<HR>
<?php
$str="1,2,9,8,7";
  $checked= array();  

  for($i=0; $i<strlen($str); $i++)
   {
    $c=0;
    if(in_array($str[$i],$checked)) continue;

    $checked[]=$str[$i];

    for($j=$i+1;$j<=strlen($str);$j++)
    {
        if($str[$i]==$str[$j]) 
        {
            $c=1;
            break;  
        }
    }
    if($c!=1) 
    {
        echo "First non repetive char is:".$str[$i]."<br>"; 
        break;
      }
  }

//Last number 
$Last_str = "11,12,12,18,17"; 

$end = strlen($Last_str); 
$start = strlen($Last_str)-1; 

$out = $Last_str{$start}.$Last_str{$end}; 

echo "Last_str = $out <br>";
 
  // 計算數字數目
function count_digit($number) {
return strlen((string) $number);
}

//function call
$num = 12312;
$number_of_digits = count_digit($num); //this is call :)
echo "Count_digit= $number_of_digits <br>";; 
//prints 5
?>
<hr>
 
<?php
$stuff = array('8','9','10','11', '12');

$result = array_count_values($stuff);
asort($result);
end($result);
$answer = key($result);

echo $answer;
?>
<hr>
<?php
function get_duplicates( $array ) {
    return array_unique( array_diff_assoc( $array, array_unique( $array ) ) );
}
echo get_duplicates(11223);

?>
<hr>
<?php 
function showDups($array)
{
  $array_temp = array();

   foreach($array as $val)
   {
     if (!in_array($val, $array_temp))
     {
       $array_temp[] = $val;
        echo 'non-duplicate = ' . $val . '<br />';
     }
     else
     {
       echo "duplicate =  $val  <br />";
     }
   }
}
$array = array(1,2,2,4,5);
showDups($array);

//取得重複數字 
function getArrayDups($array)
{
   $counts = array_count_values($array);
   return array_filter(
      $counts,
      create_function(
         '$val',
         'return($val > 1);'
      )
   );
}

// usage test:
$test = array('5','2','3','4','5');
$result = getArrayDups($test);
if(count($result))
{
  echo "<p>You had one or more duplicate entries:</p>\n<ul>\n";

   foreach($result as $entry => $count)
   {

    if ($count >= 3){
      echo "<li> Level is  $entry ($count)</li>";
       break;  
    } 
     echo "<li>  Level is $entry ($count)</li>"; 
   }
}
else
{
echo end($test);
 echo "<p>No duplicates  Level found. last .".end($test)."</p>";
}


 /* $myArray = array("7", "7", "2","2","3" );
$my_array_values = array_count_values($myArray);

while (list ($key, $val) = each ($my_array_values))
{
   echo "$key -> $val "."  times"."<br/>";
}*/

$str = '18,18,19,17,17';
    $arr = explode(',', $str);
    $arrCount = array_count_values($arr);
    $temp= false;
    for($i=count($arr)-1;$i> 0;$i--) {
        if($arrCount[$arr[$i]] > 1) {
           echo "last repeat is: ".$arr[$i];
           $temp = true;
           break;
        }
    }
    if(!$temp)
        echo "no repeat found";
?>
 
  