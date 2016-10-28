/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.editorConfig = function(config)
{
 config.language = 'zh';
 config.skin = 'kama'; //office2003 , 
 config.toolbar=
    [
        ['Source','-','Cut','Copy','Paste'],
        ['Image','Flash','Table','HorizontalRule'],   
        ['Bold','Italic','Underline','Strike','-'],
       
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],'/',
        ['TextColor','BGColor','Format','FontSize','-','Link','Unlink'],
        	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat']
    ];

   
     
     // 設置寬高
    config.width = 645;
    config.height = 400;
    config.toolbarCanCollapse = true;
    // 取消 “拖拽以改變尺寸”功能 plugins/resize/plugin.js
    config.resize_enabled = false;
    //改變大小的最大高度
    config.resize_maxHeight = 3000;
    //改變大小的最大寬度
    config.resize_maxWidth = 3000;
    //改變大小的最小高度
    config.resize_minHeight = 645;
    //改變大小的最小寬度
    config.resize_minWidth = 550;
    config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = 'ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
config.filebrowserImageUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
config.filebrowserFlashUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
config.enterMode = CKEDITOR.ENTER_BR;
config.shiftEnterMode = CKEDITOR.ENTER_P; 

};

