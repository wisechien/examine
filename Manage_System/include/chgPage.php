  <?
  if($total_page > 1){
  ?>
	<script language="javascript">
		function sbchgPageForm(url){
			document.chgPageForm.action=url;
			document.chgPageForm.submit();
		}
	</script>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <form name="chgPageForm" action="" method="post">
	  <?echo GetParentToHidden();?>
	  <tr>
		
		<td height="40" align="center">
		  <? if($int_page > 1){?>
		  <a href="javascript:sbchgPageForm('<? echo $web_url?>?page=1');" class="blackLink">第一頁</a>
		  <? }else{ ?>
		  第一頁
		  <? } ?>
		  <? if($int_page > 1){ ?>
		  | <a href="javascript:sbchgPageForm('<? echo $web_url?>?page=<? echo $int_page-1?>');" class="blackLink">上一頁</a>
		  <? }else{ ?>
		  | 上一頁
		  <? } ?>
		  | 當前頁:<? echo $int_page;?>, 跳轉至:
		  <select name="gopage" onchange="javascript:sbchgPageForm('<? echo $web_url?>?page=' + this.value);">
		   <?       
		   for($i=1;$i<=$total_page;$i++){                                       
			   if($i==$int_page){
				  echo "<option value=\"$i\" selected>$i</option>";                                      
			   }else{                                       
				  echo "<option value=\"$i\">$i</option>";                                      
			   }                                     
		   }                                      
		   ?>
		  </select>
		  <? if($int_page < $total_page){?>
		  | <a href="javascript:sbchgPageForm('<? echo $web_url?>?page=<? echo $int_page+1?>');" class="blackLink">下一頁</a>
		  | <a href="javascript:sbchgPageForm('<? echo $web_url?>?page=<? echo $total_page?>');" class="blackLink">最末頁</a>	
		  <? }else{ ?>
		  | 下一頁
          | 最末頁
		  <? } ?>		</td>
	  </tr>
	  </form>
	</table>
  <?
  }
  ?>