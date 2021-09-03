/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	//config.extraPlugins = "imageresize";
	//config.imageResize = { maxWidth : 800, maxHeight : 800 };
	config.disallowedContent = 'img{width,height}';
	// config.uiColor = '#AADC6E';
};
