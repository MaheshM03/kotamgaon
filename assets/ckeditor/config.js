/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' } 
	];
	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	
	//config.removeButtons = 'Underline,Subscript,Superscript';
	config.removeButtons = 'Underline';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;h4;h5;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.colorButton_backStyle = {
	    element: 'span',
	    styles: { 'background-color': '#(color)' }
	};
	config.colorButton_foreStyle = {
		element: 'font',
		attributes: { 'color': '#(color)' }
	};
//config.languages = [ 'fr:French', 'de:German', 'it:Italian' ];

	config.extraPlugins = 'table';
	config.extraPlugins = 'myplugin,anotherplugin';
	
	config.extraAllowedContent = 'table{background,background-color}';
 
   var url_path = 'https://www.kotamgaon.in/assets';//local url
   //var url_path = 'http://www.jyodent.com/assets/admin';	//local url
   config.filebrowserBrowseUrl =url_path+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl =url_path+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl =url_path+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl =url_path+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl =url_path+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl =url_path+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';

	config.extraPlugins = 'panel';
	config.extraPlugins = 'floatpanel';
	config.extraPlugins = 'tabletools';
	config.extraPlugins = 'contextmenu';
	config.extraPlugins = 'dialog';
	config.extraPlugins = 'colordialog';
	config.extraPlugins = 'colorbutton';
	//config.extraPlugins = 'language';

	config.colorButton_enableMore = true;
		//config.language = 'de';

};



