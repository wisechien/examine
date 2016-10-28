<?php 
  //require('../include/chkSession.php');
  require('../include/conn.php');
  require('../include/function.php');
  
 
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
<!-- Expansion Java Script Start-->
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script>
function sbForm(){
	if(chkForm()){
		var obj = document.form1;
		obj.submit();
	}
}

function chkForm(){
	var obj = document.form1;
	var strVar = "";
 
	strVar = obj.title.value;
	if(strVar==""){
		alert("請輸入主旨。");
		obj.title.focus();
		return false;
	}
	return true;
}
 
function chgFile(obj,ext){
	var var1 = obj.value;
	var1 = var1.toLowerCase();
	if(var1.lastIndexOf('.gif')==-1&& var1.lastIndexOf('.jpg')==-1&& var1.lastIndexOf('.bmp')==-1&& var1.lastIndexOf('jpeg')==-1)    {
		alert("請選擇 .gif / .jpg / .bmp 檔案。");
	}else{
		document.getElementById(ext).value=var1.substr(var1.lastIndexOf('.')+1); 
	}
}
function showPic(txt,width,height){
   var url = "show_pic.php?pic=" + txt;
   window.open(url,"UPLOAD","toolbar=no,scrollbars=no,menubar=no,status=no,location=no,width="+width+",height="+height);
}
function delPic(txt){
	if(confirm("您確定要刪除嗎？")){
		var obj = document.form1;
		obj.u.value = "del_pic";
		obj.action = "<?php echo $web_url;?>?pic=" + txt;
		obj.submit();
	}
}
</script>
</head>

<body>

    <div id="wrapper">

       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
       <?php  include ("_head_menu.php") ?>
  <!-- /.navbar-top-links -->
        <?php  include ('_sidebar.php') ?> 
  <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">訊 息 公 告</h1>
                    </div>

                    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            新增訊息
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12"> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
             <form role="form" name="form1" enctype="multipart/form-data" action="" method="post">
              <INPUT type="hidden" value="news_info.php" name="ctid">
              <INPUT type="hidden" value="ok" name="u">
              <INPUT type="hidden" value="<?php  echo $id;?>" name="id">
              <INPUT type="hidden" name="ext_0" value="">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr> 
                                           <th>標 題</th>
                                           <th>輸 入 欄 位</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label> 文 章 標 題</label></td>
                                            <td><input name="title" class="form-control" placeholder="Enter text"></td>
                                         </tr>
                                        <tr>
                                            <td><label>Text Input</label></td>
                                            <td><input class="form-control" placeholder="Enter text"></td>
                                         </tr>
                                         <tr> 
                                            <td> <label> 圖 片 上 傳 </label></td>
                                             <td><input type="file">  <label>(最佳尺寸：160px X 120px)</label> </td>
                                         </tr>
                                         <tr> 
                                            <td> <label> 文 章 內 容</label></td>
                                          <td>
                              <textarea class="form-control" rows="3" name="des"><?php  echo $des;?></textarea>
                                             <script type="text/javascript">
					                               CKEDITOR.replace('des');
					                               </script>
                                         </td>
                                          </tr>
                                         <tr> 
                                            <td> </td>
                                            <td> <button type="submit" class="btn btn-default" onClick="sbForm();">Submit  </button>
                                            <button type="reset" class="btn btn-default">Reset</button></td>
                                          </tr>
                                    </tbody>
                                </table>
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
<!-- Warning Script-->
<?php  if($strMessage!=""){?>
  <script>
  	alert("<?php echo $strMessage;?>");
  </script>
<?php }?>
<script>
chgWebSite();
</script>
	<!-- Warning Script-->
</body>

</html>
