/*
* jHtmlArea 0.8 - WYSIWYG Html Editor jQuery Plugin
* Copyright (c) 2013 Chris Pietschmann
* http://jhtmlarea.codeplex.com
* Licensed under the Microsoft Reciprocal License (Ms-RL)
* http://jhtmlarea.codeplex.com/license
*/
(function ($, window) {

    var $jhtmlarea = window.$jhtmlarea = {};
    var $browser = $jhtmlarea.browser = {};
    (function () {
        $browser.msie = false;
        $browser.mozilla = false;
        $browser.safari = false;
        $browser.version = 0;
        
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            $browser.msie = true;
            $browser.version = parseFloat(RegExp.$1);
        } else if (navigator.userAgent.match(/Trident\/([0-9]+)\./)) {
            $browser.msie = true;
            $browser.version = RegExp.$1;
            if (navigator.userAgent.match(/rv:([0-9]+)\./)) {
                $browser.version = parseFloat(RegExp.$1);
            }
        }
        if (navigator.userAgent.match(/Mozilla\/([0-9]+)\./)) {
            $browser.mozilla = true;
            if ($browser.version === 0) {
                $browser.version = parseFloat(RegExp.$1);
            }
        }
        if (navigator.userAgent.match(/Safari ([0-9]+)\./)) {
            $browser.safari = true;
            $browser.version = RegExp.$1;
            if (navigator.userAgent.match(/Version\/([0-9]+)\./)) {
                if ($browser.version === 0) {
                    $browser.version = parseFloat(RegExp.$1);
                }
            }
        }
    })();

    $.fn.htmlarea = function (opts) {
        if (opts && typeof (opts) === "string") {
            var args = [];
            for (var i = 1; i < arguments.length; i++) { args.push(arguments[i]); }
            var htmlarea = jHtmlArea(this[0]);
            var f = htmlarea[opts];
            if (f) { return f.apply(htmlarea, args); }
        }
        return this.each(function () { jHtmlArea(this, opts); });
    };
    var jHtmlArea = window.jHtmlArea = function (elem, options) {
        if (elem.jquery) {
            return jHtmlArea(elem[0]);
        }
        if (elem.jhtmlareaObject) {
            return elem.jhtmlareaObject;
        } else {
            return new jHtmlArea.fn.init(elem, options);
        }
    };
    jHtmlArea.fn = jHtmlArea.prototype = {

        // The current version of jHtmlArea being used
        jhtmlarea: "0.8",

        init: function (elem, options) {
            if (elem.nodeName.toLowerCase() === "textarea") {
                var opts = $.extend({}, jHtmlArea.defaultOptions, options);
                elem.jhtmlareaObject = this;

                var textarea = this.textarea = $(elem);
                var container = this.container = $("<div/>").addClass("jhtmlarea").addClass('ow_smallmargin').insertAfter(textarea);
                var toolbar = this.toolbar = $("<div/>").addClass("toolbar clearfix").appendTo(container);
                priv.initToolBar.call(this, opts);

                var iframe = this.iframe = $("<iframe/>").height(textarea.height());
                iframe.width(textarea.width());

                var htmlarea = this.htmlarea = $('<div class="input_ws_cont"/>').append(iframe);

                var interval;
                var tempStyles = function(){

                    if( !window.htmlAreaData.tempStyles ){
                        var baseCss = false;
                        
                        $.each(document.styleSheets, function(index, data){
                            if( data.href && data.href.match(/base\.css/) ){
                                baseCss = data;
                            }
                        });

                        if( $browser.msie ){
                            if( !baseCss || !baseCss.rules ){
                                return;
                            }

                            var crules = baseCss.rules;
                        }
                        else{
                            if( !baseCss || !baseCss.cssRules ){
                                return;
                            }

                            var crules = baseCss.cssRules;
                        }

                        window.htmlAreaData.tempStyles = '';
                        $.each( crules,
                            function(key, data){
                                if( data.selectorText && data.selectorText.match(/.htmlarea_styles/i) ){
                                    window.htmlAreaData.tempStyles += ( $browser.msie ? data.selectorText + '{' + data.style.cssText + '}' : data.cssText );
                                }
                            }
                            );
                    }


                    var icontents = iframe.get(0).contentDocument;

                    if ( icontents )
                    {
                        $('body', icontents).addClass('htmlarea_styles');
                        if( options.customClass ){
                            $('body', icontents).addClass(options.customClass);
                        }
                        $('head', icontents).html('<style>'+window.htmlAreaData.tempStyles+'</style>');
                        if( window.htmlAreaData.rtl ){
                            $('html', icontents).attr('dir', 'rtl');
                        }
                    }

                    clearInterval(interval);
                }

                interval = setInterval(tempStyles, 50);

                container.append(htmlarea).append(textarea.hide());

                priv.initEditor.call(this, opts);
                priv.attachEditorEvents.call(this);

                // Fix total height to match TextArea
                iframe.height(iframe.height() - toolbar.height());
                //toolbar.width(textarea.width() - 2);

                if (opts.loaded) { opts.loaded.call(this); }
            }
        },
        dispose: function () {
            this.textarea.show().insertAfter(this.container);
            this.container.remove();
            this.textarea[0].jhtmlareaObject = null;
        },
        execCommand: function (a, b, c) {
            this.iframe[0].contentWindow.focus();
            
            if ($browser.msie === true && $browser.version >= 11) {
                if (this.previousRange) {
                    var rng = this.previousRange;
                    var sel = this.getSelection()
                    sel.removeAllRanges();
                    sel.addRange(rng);
                }
            }
            
            this.editor.execCommand(a, b || false, c || null);
            this.updateTextArea();
        },
        ec: function (a, b, c) {
            this.execCommand(a, b, c);
        },
        queryCommandValue: function (a) {
            this.iframe[0].contentWindow.focus();
            return this.editor.queryCommandValue(a);
        },
        qc: function (a) {
            return this.queryCommandValue(a);
        },
        getSelectedHTML: function () {
            if ($browser.msie) {
                return this.getRange().htmlText;
            } else {
                var elem = this.getRange().cloneContents();
                return $("<p/>").append($(elem)).html();
            }
        },
        getSelection: function () {
            if ($browser.msie === true && $browser.version < 11) {
                //return (this.editor.parentWindow.getSelection) ? this.editor.parentWindow.getSelection() : this.editor.selection;
                return this.editor.selection;
            } else {
                return this.iframe[0].contentDocument.defaultView.getSelection();
            }
        },
        getRange: function () {
            var s = this.getSelection();
            if (!s) { return null; }
            if (s.getRangeAt) {
                if (s.rangeCount > 0) {
                    return s.getRangeAt(0);
                }
            }
            if (s.createRange) {
                return s.createRange();
            }
            return null;
            //return (s.getRangeAt) ? s.getRangeAt(0) : s.createRange();
        },
        html: function (v) {
            if (v !== undefined) {
                this.textarea.val(v);
                this.updateHtmlArea();
            } else {
                return this.toHtmlString();
            }
        },
        pasteHTMLSpec: function(html) {
            this.iframe[0].contentWindow.focus();
            var r = this.getRange();
            var s = this.getSelection();
            if($browser.msie) {
                r.pasteHTML(html);
                r.select();
            } else if ($browser.mozilla) {
                r.deleteContents();
                var node = $((html.indexOf("<") != 0) ? $("<span/>").append(html) : html)[0];
                r.insertNode(node);
                r.setStartAfter(node);
                r.setEndAfter(node);
                r.collapse(false);
                s.removeAllRanges();
                s.addRange(r);
                  //this.ec("insertHTML", false, html);
            } else {
                r.deleteContents();
                var node = $(this.iframe[0].contentWindow.document.createElement("span")).append($((html.indexOf("<") != 0) ? "<span>" + html + "</span>" : html))[0];
                r.insertNode(node);
                r.setStartAfter(node);
                r.setEndAfter(node);
                r.collapse(false);
                s.removeAllRanges();
                s.addRange(r);
            }
            this.updateTextArea();

        },
        pasteHTML: function(html) {
            if( !$browser.msie ){
                this.pasteHTMLSpec(html);
                return;
            }
            
            var window = this.iframe[0].contentWindow, document = window.document;
            var sel, range;
            if (window.getSelection) {
                // IE9 and non-IE
                sel = window.getSelection();
                if (sel.getRangeAt && sel.rangeCount) {
                    range = sel.getRangeAt(0);
                    range.deleteContents();

                    // Range.createContextualFragment() would be useful here but is
                    // only relatively recently standardized and is not supported in
                    // some browsers (IE9, for one)
                    var el = document.createElement("div");
                    el.innerHTML = html;
                    var frag = document.createDocumentFragment(), node, lastNode;
                    while ( (node = el.firstChild) ) {
                        lastNode = frag.appendChild(node);
                    }
                    
                    range.insertNode(frag);

                    // Preserve the selection
                    if (lastNode) {
                        range = range.cloneRange();
                        range.setStartAfter(lastNode);
                        range.collapse(true);
                        sel.removeAllRanges();
                        sel.addRange(range);
                    }
                }
            } else if (document.selection && document.selection.type != "Control") {
                // IE < 9
                document.selection.createRange().pasteHTML(html);
            }
        },
        cut: function () {
            this.ec("cut");
        },
        copy: function () {
            this.ec("copy");
        },
        paste: function () {
            this.ec("paste");
        },
        bold: function () { this.ec("bold"); },
        italic: function () { this.ec("italic"); },
        underline: function () { this.ec("underline"); },
        strikeThrough: function () { this.ec("strikethrough"); },
        insertImage: function(params){
            this.restoreCaret();
            if( params.preview ){
                $html = $('<div><a href="'+params.src+'" target="_blank"><img style="padding:5px;max-width:100%" src="'+params.src+'" /></a></div>');
            }else{
                $html = $('<div><img style="padding:5px;max-width:100%" src="'+params.src+'" /></div>');
            }

            $img = $('img', $html);
            if( params.align ){
                
                if( params.align == 'center' ){
                    $img.css({
                        display:'block',
                        margin: '0 auto'
                    });
                }else{
                    $img.css({
                        'float':params.align
                        });
                }
            }
            if( params.resize ){
                $img.css({
                    'width':params.resize
                });
            }
            
            this.pasteHTML($html.html());
            this.tempFB.close();
            this.updateTextArea();
        },
        saveCaret: function(){
            if($browser.mozilla || $browser.msie ){
                this.pasteHTML('<span id="caret" />');
            }
        },
        restoreCaret: function(){
            var iDocument = this.iframe[0].contentWindow.document;
            if( $browser.msie ){
                var referenceNode = iDocument.getElementById("caret");
                var rng = iDocument.body.createTextRange();
                if( referenceNode ){
                    rng.moveToElementText(referenceNode);
                    $(referenceNode).removeAttr('id');
                }
                rng.select();
            }
            else if ( $browser.mozilla ){
                var referenceNode = iDocument.getElementById("caret");
                if( referenceNode ){
                    var r = this.getRange();
                    r.selectNode(referenceNode);
                    r.deleteContents();
                }
            }
            
        },
        image: function(){
            this.saveCaret();
            this.tempFB = new OW_FloatBox({
                $title: window.htmlAreaData.labels.buttons.image,
                width: '600px',
                height: '600px',
                $contents: '<center><iframe style="min-width: 550px; min-height: 500px;" src="'+window.htmlAreaData.imagesUrl.replace('__id__', this.textarea.attr('id'))+'"></iframe></center>'
            });
        },
        video: function(){
            this.saveCaret();
            var self = this;
            var $contents = $('<div>'+window.htmlAreaData.labels.common.videoTextareaLabel+'<br /><textarea name="code" style="height:200px;"></textarea><br /><br /></div>');
            var buttonCode = window.htmlAreaData.buttonCode;
            $contents.append('<div style="text-align:center;">'+buttonCode.replace('#label#', window.htmlAreaData.labels.common.buttonInsert)+'</div>');
            $('input[type=button].mn_submit', $contents).click(function(){
                self.insertVideo({
                    code:$('textarea[name=code]', $contents).val()
                })
            });

            this.tempFB = new OW_FloatBox({
                $title: window.htmlAreaData.labels.common.videoHeadLabel,
                width: '600px',
                height: '400px',
                $contents: $contents
            });
            
            setInterval(function(){$('textarea[name=code]', $contents).focus()}, 100);
        },

        insertVideo: function(params){
            this.restoreCaret();
            if( !params || !params.code ){
                OW.error(window.htmlAreaData.labels.messages.videoEmptyField);
                return;
            }
            $html = $('<div><span class="ow_ws_video"></span></div>');
            $('span', $html).append(params.code);
            this.pasteHTML($html.html());
            this.tempFB.close();
        },
        html: function(){
            this.saveCaret();
            var self = this;
            var $contents = $('<div>'+window.htmlAreaData.labels.common.htmlTextareaLabel+'<br /><textarea name="code" style="height:200px;"></textarea><br /><br /></div>');
            var buttonCode = window.htmlAreaData.buttonCode;
            $contents.append('<div style="text-align:center;">'+buttonCode.replace('#label#', window.htmlAreaData.labels.common.buttonInsert)+'</div>');
            $('input[type=button].mn_submit', $contents).click(function(){
                self.addHtml({
                    code:$('textarea[name=code]', $contents).val()
                })
            });

            this.tempFB = new OW_FloatBox({
                $title: window.htmlAreaData.labels.common.htmlHeadLabel,
                width: '600px',
                height: '400px',
                $contents: $contents
            });
        },

        addHtml: function(params){
            this.restoreCaret();
            if( !params || !params.code ){
                OW.error(window.htmlAreaData.labels.messages.videoEmptyField);
                return;
            }
            $html = $('<div><span class="ow_ws_html"></span></div>');
            $('span', $html).append(params.code);
            this.pasteHTML($html.html());
            this.tempFB.close();
        },

        insertLink: function(params){
            this.restoreCaret();
            if( !params || !params.url || !params.label ){
                OW.error(window.htmlAreaData.labels.messages.linkEmptyFields);
                return;
            }

            this.pasteHTML('<span class="ow_ws_link"><a rel="nofollow" href="'+params.url+'"'+ ( params.newWindow ? ' target="_blank"' : '') +'>'+params.label+'</a></span>');
            this.tempFB.close();
        },

        link: function() {
            this.saveCaret();
            var self = this;
            var $contents = $('<div style="padding:10px 35px;">'+window.htmlAreaData.labels.common.linkTextLabel+'<br /><input name="wLabel" type="text" style="width:400px;" /><br /><br />'+window.htmlAreaData.labels.common.linkUrlLabel+'<br /><input type="text" value="http://" name="url" style="width:400px;" /><br /><br /><label><input type="checkbox" name="new_window" checked="checked" /> '+window.htmlAreaData.labels.common.linkNewWindowLabel+'</label><br /><br /><br /></div>');
            var buttonCode = window.htmlAreaData.buttonCode;
            $contents.append('<div style="width:400px;text-align:center;">'+buttonCode.replace('#label#', window.htmlAreaData.labels.common.buttonInsert)+'</div>');
            $('input[type=button].mn_submit', $contents).click(function(){
                self.insertLink({
                    label:$('input[name=wLabel]', $contents).val(),
                    url:$('input[name=url]', $contents).val(),
                    newWindow:$('input[name=new_window]', $contents)[0].checked
                })
            });

            var fbInput = $('input[name=wLabel]', $contents);
            
            this.tempFB = new OW_FloatBox({
                $title: window.htmlAreaData.labels.buttons.link,
                width: '500px',
                height: '300px',
                $contents: $contents
            });
            
            setTimeout(function(){fbInput.focus()}, 100);
            
            
        },
        quote: function(){

        },
        more: function(){
            $html = $('<div></div>');
            $html.append(document.createTextNode('<!--more-->'));
            this.pasteHTML($html.html());
        },
        removeFormat: function () {
            this.ec("removeFormat", false, []);
            this.unlink();
        },
        unlink: function () { this.ec("unlink", false, []); },
        orderedList: function () { this.ec("insertorderedlist"); },
        unorderedList: function () { this.ec("insertunorderedlist"); },
        superscript: function () { this.ec("superscript"); },
        subscript: function () { this.ec("subscript"); },

        p: function () {
            this.formatBlock("<p>");
        },
        h1: function () {
            this.heading(1);
        },
        h2: function () {
            this.heading(2);
        },
        h3: function () {
            this.heading(3);
        },
        h4: function () {
            this.heading(4);
        },
        h5: function () {
            this.heading(5);
        },
        h6: function () {
            this.heading(6);
        },
        heading: function (h) {
            this.formatBlock($browser.msie === true ? "Heading " + h : "h" + h);
        },

        indent: function () {
            this.ec("indent");
        },
        outdent: function () {
            this.ec("outdent");
        },

        insertHorizontalRule: function () {
            this.ec("insertHorizontalRule", false, "ht");
        },

        justifyLeft: function () {
            this.ec("justifyLeft");
        },
        justifyCenter: function () {
            this.ec("justifyCenter");
        },
        justifyRight: function () {
            this.ec("justifyRight");
        },

        increaseFontSize: function () {
            if ($browser.msie === true) {
                this.ec("fontSize", false, this.qc("fontSize") + 1);
            } else if ($browser.safari) {
                this.getRange().surroundContents($(this.iframe[0].contentWindow.document.createElement("span")).css("font-size", "larger")[0]);
            } else {
                this.ec("increaseFontSize", false, "big");
            }
        },
        decreaseFontSize: function () {
            if ($browser.msie === true) {
                this.ec("fontSize", false, this.qc("fontSize") - 1);
            } else if ($browser.safari) {
                this.getRange().surroundContents($(this.iframe[0].contentWindow.document.createElement("span")).css("font-size", "smaller")[0]);
            } else {
                this.ec("decreaseFontSize", false, "small");
            }
        },

        forecolor: function (c) {
            this.ec("foreColor", false, c !== undefined ? c : prompt("Enter HTML Color:", "#"));
        },

        formatBlock: function (v) {
            this.ec("formatblock", false, v || null);
        },
        switchhtml: function(btn){
            this.toggleHTMLView(btn);
        },
        showHTMLView: function () {
            this.updateTextArea();
            this.textarea.show();
            this.htmlarea.hide();
            $("ul li:not(li:has(a.switchhtml))", this.toolbar).hide();
            $("ul:not(:has(:visible))", this.toolbar).hide();
            $("ul li a.html", this.toolbar).addClass("highlighted");
        },
        hideHTMLView: function () {
            this.updateHtmlArea();
            this.textarea.hide();
            this.htmlarea.show();
            $("ul", this.toolbar).show();
            $("ul li", this.toolbar).show().find("a.html").removeClass("highlighted");
        },
        toggleHTMLView: function () {
            (this.textarea.is(":hidden")) ? this.showHTMLView() : this.hideHTMLView();
        },

        toHtmlString: function () {
            return this.editor.body.innerHTML;
        },
        toString: function () {
            return this.editor.body.innerText;
        },

        updateTextArea: function () {
            this.textarea.val(this.toHtmlString());
        },
        updateHtmlArea: function () {
            this.editor.body.innerHTML = this.textarea.val();
        }
    };
    jHtmlArea.fn.init.prototype = jHtmlArea.fn;

    jHtmlArea.defaultOptions = {
        toolbar: [],
        css: null,
        toolbarText: {
            bold: "Bold", italic: "Italic", underline: "Underline", strikethrough: "Strike-Through",
            cut: "Cut", copy: "Copy", paste: "Paste",
            h1: "Heading 1", h2: "Heading 2", h3: "Heading 3", h4: "Heading 4", h5: "Heading 5", h6: "Heading 6", p: "Paragraph",
            indent: "Indent", outdent: "Outdent", horizontalrule: "Insert Horizontal Rule",
            justifyleft: "Left Justify", justifycenter: "Center Justify", justifyright: "Right Justify",
            increasefontsize: "Increase Font Size", decreasefontsize: "Decrease Font Size", forecolor: "Text Color",
            link: "Insert Link", unlink: "Remove Link", image: "Insert Image",
            orderedlist: "Insert Ordered List", unorderedlist: "Insert Unordered List",
            subscript: "Subscript", superscript: "Superscript",
            html: "Show/Hide HTML Source View"
        }
    };
    var priv = {
        toolbarButtons: {
            strikethrough: "strikeThrough", orderedlist: "orderedList", unorderedlist: "unorderedList",
            horizontalrule: "insertHorizontalRule",
            justifyleft: "justifyLeft", justifycenter: "justifyCenter", justifyright: "justifyRight",
            increasefontsize: "increaseFontSize", decreasefontsize: "decreaseFontSize",
            html: function (btn) {
                this.toggleHTMLView();
            }
        },
        initEditor: function (options) {
            var edit = this.editor = this.iframe[0].contentWindow.document;
            edit.designMode = 'on';
            edit.open();
            edit.write(this.textarea.val());
            edit.close();
            if (options.css) {
                var e = edit.createElement('link'); e.rel = 'stylesheet'; e.type = 'text/css'; e.href = options.css; edit.getElementsByTagName('head')[0].appendChild(e);
            }
        },
        initToolBar: function (options) {
            var that = this;

            var menuItem = function (className, altText, action) {
                return $("<li/>").append($("<a href='javascript:void(0);'/>").addClass(className).attr("title", altText).click(function () { action.call(that, $(this)); }));
            };

            function addButtons(arr) {
                var ul = $("<ul/>").appendTo(that.toolbar);
                for (var i = 0; i < arr.length; i++) {
                    var e = arr[i];
                    if ((typeof (e)).toLowerCase() === "string") {
                        if (e === "|") {
                            ul.append($('<li class="separator"/>'));
                        } else {
                            var f = (function (e) {
                                // If button name exists in priv.toolbarButtons then call the "method" defined there, otherwise call the method with the same name
                                var m = priv.toolbarButtons[e] || e;
                                if ((typeof (m)).toLowerCase() === "function") {
                                    return function (btn) { m.call(this, btn); };
                                } else {
                                    return function () { this[m](); this.editor.body.focus(); };
                                }
                            })(e.toLowerCase());
                            var t = options.toolbarText[e.toLowerCase()];
                            ul.append(menuItem(e.toLowerCase(), t || e, f));
                        }
                    } else {
                        ul.append(menuItem(e.css, e.text, e.action));
                    }
                }
            };
            if (options.toolbar.length !== 0 && priv.isArray(options.toolbar[0])) {
                for (var i = 0; i < options.toolbar.length; i++) {
                    addButtons(options.toolbar[i]);
                }
            } else {
                addButtons(options.toolbar);
            }
        },
        attachEditorEvents: function () {
            var t = this;

            var fnHA = function () {
                t.updateHtmlArea();
            };

            this.textarea.click(fnHA).
                keyup(fnHA).
                keydown(fnHA).
                mousedown(fnHA).
                blur(fnHA);

            this.iframe.blur(function () {
                t.previousRange = t.getRange();
            });

            var fnTA = function () {
                t.updateTextArea();
            };

            $(this.editor.body).click(fnTA).
                keyup(fnTA).
                keydown(fnTA).
                mousedown(fnTA).
                blur(fnTA);

            $('form').submit(function () { t.toggleHTMLView(); t.toggleHTMLView(); });
            //$(this.textarea[0].form).submit(function() { //this.textarea.closest("form").submit(function() {


            // Fix for ASP.NET Postback Model
            if (window.__doPostBack) {
                var old__doPostBack = __doPostBack;
                window.__doPostBack = function () {
                    if (t) {
                        if (t.toggleHTMLView) {
                            t.toggleHTMLView();
                            t.toggleHTMLView();
                        }
                    }
                    return old__doPostBack.apply(window, arguments);
                };
            }

        },
        isArray: function (v) {
            return v && typeof v === 'object' && typeof v.length === 'number' && typeof v.splice === 'function' && !(v.propertyIsEnumerable('length'));
        }
    };
})(jQuery, window);