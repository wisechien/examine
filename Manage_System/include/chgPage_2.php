  <?
  if($total_page > 1){
  ?> <table border="0" cellspacing="1" cellpadding="1">
                <tr>
                  <td width="12%" style="display:none"><table width="40" height="22" border="0" cellpadding="0" cellspacing="0" background="images/table/news_n.png">
                    <tr >
                      <td>
                       <? if($int_page > 1){ ?>
		   <a href="<? echo $web_url?>?ctid=<? echo $ctid?>&page=<? echo $int_page-1?>" class="blackLink"><div align="center" class="sign_w07">上一頁</div></a>
		  <? }else{ ?>
		 <div align="center" class="sign_w07">上一頁</div>
		  <? } ?>
                     </td>
                    </tr>
                  </table></td>
                  <td width="13%" align="center">   
		   <?       
		   for($i=1;$i<=$total_page;$i++){                                       
			   if($i==$int_page){
						echo "&nbsp$i&nbsp;.";                                       
			   }else{                                       
				  echo "&nbsp<a href='$web_url?ctid=$ctid&page=$i'><font color='black'>$i</font></a>&nbsp.";                          
			   }                                     
		   }                                      
		   ?>
		</td>
                  
                  <td width="25%" style="display:none"><table width="40" height="22" border="0" cellpadding="0" cellspacing="0" background="images/table/news_n.png">
                    <tr >
                      <td>
                       <? if($int_page < $total_page){?>
		   <a href="<? echo $web_url?>?ctid=<? echo $ctid?>&page=<? echo $int_page+1?>" class="blackLink"> <div align="center" class="sign_w07">下一頁</div></a>
		 
		  <? }else{ ?>
          <div align="center" class="sign_w07">下一頁</div>
        
		  <? } ?>
                     </td>
                    </tr>
                  </table></td>
                </tr>
              </table>   
  <?
  }
  ?>