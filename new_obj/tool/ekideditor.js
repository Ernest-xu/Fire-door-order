/*  
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */  
  
/** 
 * Author : ____��K�ļ� 
 * Easyui KindEditor�ļ���չ. 
 * �������֮��,��Ϳ�����ʹ��Easyui����ķ�ʽʹ��KindEditor�� 
 * ǰ��������Ҫ����KindEditor�ĺ���js�������ʽ. �����Ҳ��Ҫ��Easyui.min��KindEditor֮����. 
 * �Ǻ�..û��������չ��,��ʵ����һ�¹���,�����Ѿ����.����Ҫ��Ͳ�ӿ��������������չ. 
 **/  
(function ($, K) {  
    if (!K)  
        throw "KindEditorδ����!";  
  
    function create(target) {  
        var opts = $.data(target, 'kindeditor').options;  
        var editor = K.create(target, opts);  
        $.data(target, 'kindeditor').options.editor = editor;  
    }  
  
    $.fn.kindeditor = function (options, param) {  
        if (typeof options == 'string') {  
            var method = $.fn.kindeditor.methods[options];  
            if (method) {  
                return method(this, param);  
            }  
        }  
        options = options || {};  
        return this.each(function () {  
            var state = $.data(this, 'kindeditor');  
            if (state) {  
                $.extend(state.options, options);  
            } else {  
                state = $.data(this, 'kindeditor', {  
                        options : $.extend({}, $.fn.kindeditor.defaults, $.fn.kindeditor.parseOptions(this), options)  
                    });  
            }  
            create(this);  
        });  
    }  
  
    $.fn.kindeditor.parseOptions = function (target) {  
        return $.extend({}, $.parser.parseOptions(target, []));  
    };  
  
    $.fn.kindeditor.methods = {  
        editor : function (jq) {  
            return $.data(jq[0], 'kindeditor').options.editor;  
        }  
    };  
  
    $.fn.kindeditor.defaults = {  
        resizeType : 1,  
        allowPreviewEmoticons : false,  
        allowImageUpload : false,  
        items : [  
            'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',  
        'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',  
        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',  
        'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',  
        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',  
        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',  
        'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',  
        'anchor', 'link', 'unlink', '|', 'about'],  
        afterChange:function(){  
            this.sync();//����Ǳ����,�����Ҫ����afterChange�¼��Ļ�,��ǵ���ð�������.  
        }  
    };  
    $.parser.plugins.push("kindeditor");  
})(jQuery, KindEditor);  