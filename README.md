# examine
  很簡單的 線上測驗
  php + Mysql 
  
  為語文的分級測驗<br>
級距選擇:<br>
	分為三個進入級距選擇,供老師主任依照學生選擇進入級距測驗 <br>
  	Walker 1  (學習英文 0~2 年)<br>
  	Jumper 1 (學習英文 2~3 年)<br>
	  Runner 1 (學習英文 3~5 年)<br>
測驗方式:<br>
	測驗包含聽力與填空兩大題型，共45題，均為選擇題<br>
題型: <br>
	聽力- 看圖選擇 共 兩 題 供有播放按鈕 可播放兩次 <br>
	聽力- 單句選擇 共 兩 題 供有播放按鈕 可播放兩次<br>
	單字 - 填空選擇 共 三 題<br>
	文法 - 填空選擇 共 兩 題<br>
規則:<br>
	每九題一個題組, 錯 0-2 題 晉級,錯 3~6 維持等級 7~9 降級 <br>
	程式會自動判斷最後的結果等級顯示數量<br>

答題完畢 另可列印輸出結果<br>
<br>
條件參數 每一個 SET (每九題 一個 SET)<br>
大於 2 或 等於 2 判定 等級為 該級數<br>
如 : 2 3 [2 2] 3<br>
如 : 2 2 [3 3] 2<br>
若每集數都只出現一次 擇取最後數<br>
如 : 1 2 3 4 [5] <br>

最後會輸出結果 .. <br>

本來有做一個輸出表格的 結果硬生生拿掉 檔名為 bak_start_end.php 加上參數應該可以顯示 <br>
