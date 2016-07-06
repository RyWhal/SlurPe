$(document).ready(function () {
    $("#copy-button").zclip({
        path: "http://www.steamdev.com/zclip/js/ZeroClipboard.swf",
        copy: function(){return $('#txtCopyText').val();},
        beforeCopy: function () { },
        afterCopy: function () {
            alert('Copy To Clipboard : \n'+ $('#txtCopyText').val());
        }
    });
});
