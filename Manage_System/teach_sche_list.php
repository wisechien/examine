<?php
 require('../include/chkSession.php');
 require('../include/conn.php');
 require('../include/function.php');
 
 //  Process Start
$u = fixsql('u',1);
 if($u=='del'){ 

	$id = fixsql("id",0);
	$sql = "update `news` set `upordown`= 1 where `id`=$id";
	mysql_query($sql,$link) or die("query db false!!!");

	
 }else if($u == "up"){
    $id = fixsql("id",0);
	$indexNo = fixsql("indexNo",0);
 	$sql = "update news set indexNo=indexNo + 1 where indexNo=" . ($indexNo-1);	
	mysql_query($sql,$link) or die("query db false!!!"); 	
 	$sql = "update news set indexNo=indexNo - 1 where id=$id";
	mysql_query($sql,$link) or die("query db false!!!"); 	
 }else if($u == "down"){
    $id = fixsql("id",0);
	$indexNo = fixsql("indexNo",0);
 	$sql = "update news set indexNo=indexNo - 1 where indexNo=" . ($indexNo+1);	
	mysql_query($sql,$link) or die("query db false!!!"); 	
 	$sql = "update  news set indexNo=indexNo + 1 where id=$id";
	mysql_query($sql,$link) or die("query db false!!!"); 
 }  
  
 // Process END
 ?>
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
<script>
function del(url){
	if(confirm("刪除將無法復原，您確定要刪除嗎？")){
		window.location = url;
	}
}
function up(id,index){
	document.form1.u.value="up";
	document.form1.action="<?phpecho $web_url?>?id=" + id + "&indexNo=" + index;
	document.form1.submit();
}
function down(id,index){
	document.form1.u.value="down";
	document.form1.action="<?phpecho $web_url?>?id=" + id + "&indexNo=" + index;
	document.form1.submit();
}
</script>
<script >
<!--
function setPointer(theRow, thePointerColor)
{
                if (typeof(theRow.style) == 'undefined' || typeof(theRow.cells) == 'undefined')
        {
                                return false;
                }
                var row_cells_cnt = theRow.cells.length;
                for (var c = 0; c < row_cells_cnt; c++)
        {
                                theRow.cells[c].bgColor = thePointerColor;
                }
                return true;
}
//-->
</script>
</head>

<body>

    <div id="wrapper">

       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
       <?php include ("_head_menu.php") ?>
  <!-- /.navbar-top-links -->
        <?php include ('_sidebar.php') ?>
  <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> 師 資 培 訓</h1>
                    </div>

                    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default panel-green">
                        <div class="panel-heading">
                            行 事 曆 列 表
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
            <?php
			 //  Process Start
  			  $int_page_size = 10;
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
				 
                 if($doc==0){//縮圖
			     $tmp_img = "noimg.png";	  
			  }else{
			  	  $tmp_img = "$doc";
			  }
			     
			    	$be_top_str ="<font color=\"red\">[置頂]</font>";
			   
			 	if($line['upordown']==0){
					$upordown_str = "上架";
				}else{
					$upordown_str = "下架";
				}
				$cur2 +=1; 
                
			// Process END
			?>
          <td><a href="page_news.php?id=<?phpecho $id;?>" class="navigation"><img src="images/editor.gif" alt="" width="22" height="22"></a></td>
          <td>&nbsp;<?php echo $udate;?></td>
          <td><?php echo $be_top_str ."".  $title  ."". $be_top;?></td>
          <td><?php echo $short_des;?></td>
         <TD height="22" align=center bgColor="<?php echo $bg_Color;?>" style="padding-left:2px"><table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>
						    <?php if($indexNo > 1){?>
								<a href='javascript:up(<?phpecho $line["id"]?>,<?phpecho $indexNo?>);'><img src="images/admin/order_asc.gif" width="13" height="13" border="0" class="delete"></a>
							<?php }else{?>
								&nbsp;
							<?php }?>						 </td>
						<td>
							<?php if($indexNo < $rows ){?>
							<a href='javascript:down(<?phpecho $line["id"]?>,<?phpecho $indexNo?>);'><img src="images/admin/order_desc.gif" width="13" height="13" border="0" class="delete"></a>
							<?php }else{?>
							&nbsp;
							<?php }?>					    </td>
					  </tr>
				  </table></TD>
         <td><A href="javascript:del('<?php echo $web_url;?>?u=del&page=<?php echo $int_page;?>&id=<?phpecho $line['id'];?>');"><img src="images/delete.png" width="16" height="16"></A></TD>
        </tr>
        		
            <?php
			   }
			  mysql_free_result($rs);
			?>
                                         
                                    </tbody>
                                        </tr>
                                </form> <?php require('../include/chgPage.php');?>
                                
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
        </div>
    
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
 
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
<!-- Warning Script-->
<?php if($strMessage!=""){?>
  <script>
  	alert("<?phpecho $strMessage;?>");
  </script>
<?php }?>
<script>
chgWebSite();
</script>
	<!-- Warning Script-->
</body>

</html>
