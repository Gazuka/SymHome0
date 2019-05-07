/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.uiColor = 'red';

	// Adds a custom alignment style.
config.easyimage_styles = {
    left: {
        attributes: {
            'class': 'left'
        },
        label: 'Align left jerome',
        icon: '/my/example/icons/alignleft.png',
        iconHiDpi: '/my/example/icons/hidpi/alignleft.png'
    }
};

	config.easyimage_toolbar = [ 'EasyImageAlt', 'EasyImageLeft', 'EasyImageFull', 'EasyImageSide', 'EasyImageAlignLeft', 'EasyImageAlignCenter', 'EasyImageAlignRight' ];
};
