<!DOCTYPE html>
<html lang="en">

<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $web_site_title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
       <? include ("_head_menu.php") ?>
  <!-- /.navbar-top-links -->
        <? include ('_sidebar.php') ?>
  <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">訊息公告</h1>
                    </div>

                    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            訊 息 列 表
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10"> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                             <form role="form">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>編輯</th>
                                            <th>更新日期</th>
                                            <th>標題</th>
                                            <th>訊息內容</th>
                                            <th>排序</th>
                                            <th>刪除</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                       <FORM id="form1" name="form1" action="" method="post">
            <INPUT type="hidden" value="ok" name="u">
            <?
             //  Process Start
             /* $int_page_size = 10;
              $t_count = 0;
              $query = "select count(*) as total_count from news WHERE `upordown` = 0";
              mysql_query("set NAMES 'UTF8'");
              $rs = mysql_query($query,$link);
              $line = mysql_fetch_array($rs,MYSQL_ASSOC);
              if(isset($line)){
                $t_count = $line['total_count'];
              }
              mysql_free_result($rs);
              
              if($t_count < $int_page_size){
                $total_page = 1;
              }else{
                $total_page = (int) (($t_count - 1) / $int_page_size + 1);
              }
              
              
              $int_page = fixsql('page',0);
              if($int_page==0){
                $int_page = 1;        
              }
              if($int_page > $total_page){
                $int_page = $total_page;
              }
        
              $start = ($int_page-1) * $int_page_size;
    
              $tmp_id = 0;// tmp_id
                
            $query = "select * FROM news WHERE `upordown` = 0 ORDER BY indexNo asc limit ".$start.",".$int_page_size;  
             //$query = "SELECT * from news WHERE upordown = 0 ORDER BY indexNo asc limit ".$start.",".$int_page_size;   
             //echo $query;
              mysql_query("SET NAMES 'UTF8'");
              
              $rs = mysql_query($query,$link) or die("Query failed"); 
              $rows = mysql_num_rows($rs); 
              $cur2 = 0; 
                    
              while($line=mysql_fetch_array($rs,MYSQL_ASSOC)){
                  $id = $line["id"];
        $title = $line["title"];
        $des = $line["des"];        
        $pic = $line["pic"];
        $news_link = $line["link"];
        $brows = $line["brows"];
        $uptime = $line["uptime"];
        $downtime = $line["downtime"];
        $upordown = $line["upordown"];
        $indexNo = $line["indexNo"];
        $udate = $line["udate"];    
        $upordown  = $line["upordown"];
        $be_top = $line["be_top"];
        $des = delHtml($des);
        $short_des = cutStr($des,80); 
                 if ($cur2%2==0){;
                $bg_Color='#ffffff';
        }else{
                $bg_Color='#efefef';
                }
                 if($doc==0){//縮圖
                 $tmp_img = "noimg.png";      
              }else{
                  $tmp_img = "$doc";
              }
                if($line['be_top'] =='1') {
                    $be_top_str ="<font color=\"red\">[置頂]</font>";
                }else{
                    $be_top_str ="";
                }
                if($line['upordown']==0){
                    $upordown_str = "上架";
                }else{
                    $upordown_str = "下架";
                }
                $cur2 +=1; 
                */
            // Process END
            ?>
          <td bgColor="<? echo $bg_Color;?>"><a href="page_news.php?id=<?echo $id;?>" class="navigation"><img src="images/editor.gif" alt="" width="22" height="22"></a></td>
          <td bgColor="<? echo $bg_Color;?>">&nbsp;<? echo $udate;?></td>
          <td bgColor="<? echo $bg_Color;?>">&nbsp;<?echo $be_top_str;?><? echo $title;?> <? echo $be_top;?></td>
          <td bgColor="<? echo $bg_Color;?>" ><?echo $short_des;?></td>
         <TD height="22" align=center bgColor="<? echo $bg_Color;?>" style="padding-left:2px"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="22">
                            <?if($indexNo > 1){?>
                                <a href='javascript:up(<?echo $line["id"]?>,<?echo $indexNo?>);'><img src="images/admin/order_asc.gif" width="13" height="13" border="0" class="delete"></a>
                            <?}else{?>
                                &nbsp;
                            <?}?>                        </td>
                         <td width="22">
                            <?if($indexNo < $rows ){?>
                            <a href='javascript:down(<?echo $line["id"]?>,<?echo $indexNo?>);'><img src="images/admin/order_desc.gif" width="13" height="13" border="0" class="delete"></a>
                            <?}else{?>
                            &nbsp;
                            <?}?>                       </td>
                      </tr>
                  </table></TD>
          <TD height="22" align=center bgColor="<? echo $bg_Color;?>" style="padding-left:2px"><A href="javascript:del('<? echo $web_url;?>?u=del&page=<? echo $int_page;?>&id=<?echo $line['id'];?>');"><img src="images/delete.png" width="16" height="16"></A></TD>
        </tr>
                
            <?
              //}
              //mysql_free_result($rs);
            ?>
                                         
                                    </tbody>
                                        </tr>
                                </form>
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body --> 
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
