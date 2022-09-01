/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'zh';
	// config.uiColor = '#AADC6E';
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'NewPage,Save,ExportPdf,Preview,Flash,Smiley,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Checkbox,Radio,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CreateDiv,Language,Anchor,Unlink,PageBreak,Iframe,ShowBlocks,Maximize,About,Form,TextField,Textarea';
	// config.removeButtons = 'Underline,Subscript,Superscript,Flash';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	config.allowedContent=true;
	config.disallowedContent = 'img{width,height};img[width,height]';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	// config.filebrowserUploadUrl = '/ckeditorUpload?type=File';
	// config.filebrowserImageUploadUrl = "/ckeditorUpload?type=image";
	// config.filebrowserImageBrowseUrl = '/browerServer?type=image';

	config.filebrowserImageUploadUrl = '/bed/admin/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserImageBrowseUrl = '/bed/admin/dist/ckfinder/ckfinder.html?resourceType=Images';

};
