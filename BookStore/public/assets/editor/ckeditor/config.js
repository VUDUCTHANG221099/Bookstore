/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:

    config.language = "en";
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = "../ckfinder/ckfinder.html";
    config.filebrowserImageBrowseUrl =
        "/assets/editor/ckfinder/ckfinder.html?type=Images";
    config.filebrowserFlashBrowseUrl = "../ckfinder/ckfinder.html?type=Flash";
    config.filebrowserUploadUrl =
        "../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
    config.filebrowserImageUploadUrl =
        "../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
    config.filebrowserFlashUploadUrl =
        "../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";
    config.toolbar = [
        [
            "Cut",
            "Copy",
            "Paste",
            "Undo",
            "Redo",
            "Find",
            "Replace",
            "Bold",
            "Italic",
            "Underline",
            "Strike",
            "Subscript",
            "Superscript",
            "Link", "Unlink", "Anchor",
            "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock",
            "Table",
            "Image",
            "NumberedList",
            "BulletedList",
           
            "SelectAll",
            "RemoveFormat",
            "HorizontalRule",
            "Smiley",
            "SpecialChar",
            "PageBreak",
            "Outdent",
            "Indent",
            "Blockquote",
            // "BidiLtr", "BidiRtl"


        ],
        
        
        ["Styles", "Format", "Font", "FontSize"],
        ["TextColor", "BGColor"],
        // ["Maximize", "ShowBlocks", "Syntaxhighlight"],
    ];
};
