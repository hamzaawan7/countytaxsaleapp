;!function (t, e) {
    "function" == typeof define && define.amd ? define([], e) : "object" == typeof module && module.exports ? module.exports = e() : t.ScrollTrigger = e()
}(this, function () {
    "use strict";
    return function (t, e, n) {
        function i() {
            var t = h.scrollElement.innerWidth, e = h.scrollElement.innerHeight,
                n = h.bindElement.scrollTop ? h.bindElement.scrollTop : document.documentElement.scrollTop,
                l = h.bindElement.scrollLeft ? h.bindElement.scrollLeft : document.documentElement.scrollLeft;
            c.left == l && c.top == n || (o.forEach(function (i, o) {
                var a = i.left(), f = i.top();
                c.left > l ? a -= i.xOffset(!0) : c.left < l && (a += i.xOffset(!1)), c.top > n ? f -= i.yOffset(!0) : c.top < n && (f += i.yOffset(!1)), t > a && a >= 0 && e > f && f >= 0 ? (i.addClass(i.visibleClass, function () {
                    i.showCallback && s(i, i.showCallback)
                }), i.removeClass(i.hiddenClass), i.once && r.push(o)) : (i.addClass(i.hiddenClass), i.removeClass(i.visibleClass, function () {
                    i.hideCallback && s(i, i.hideCallback)
                }))
            }), a.forEach(function (i) {
                i.call(h, l, n, t, e)
            }), c.left = l, c.top = n), r.forEach(function (t) {
                o.splice(t, 1)
            }), r = [], o.length > 0 || a.length > 0 ? (d = !0, f(i)) : d = !1
        }

        function s(t, e) {
            var n = e.split("("), i = n[0];
            n = n.length > 1 ? n[1].split(")")[0] : void 0, window[i] && window[i].call(t.element, n)
        }

        var l = function (t, e) {
            this.element = e, this.defaultOptions = t, this.showCallback = null, this.hideCallback = null, this.visibleClass = "visible", this.hiddenClass = "invisible", this.addWidth = !1, this.addHeight = !1, this.once = !1;
            var n = 0, i = 0;
            this.left = function (t) {
                return function () {
                    return t.element.getBoundingClientRect().left
                }
            }(this), this.top = function (t) {
                return function () {
                    return t.element.getBoundingClientRect().top
                }
            }(this), this.xOffset = function (t) {
                return function (e) {
                    var i = n;
                    return t.addWidth && !e ? i += t.width() : e && !t.addWidth && (i -= t.width()), i
                }
            }(this), this.yOffset = function (t) {
                return function (e) {
                    var n = i;
                    return t.addHeight && !e ? n += t.height() : e && !t.addHeight && (n -= t.height()), n
                }
            }(this), this.width = function (t) {
                return function () {
                    return t.element.offsetWidth
                }
            }(this), this.height = function (t) {
                return function () {
                    return t.element.offsetHeight
                }
            }(this), this.reset = function (t) {
                return function () {
                    t.removeClass(t.visibleClass), t.removeClass(t.hiddenClass)
                }
            }(this), this.addClass = function (t) {
                var e = function (e, n) {
                    t.element.classList.contains(e) || (t.element.classList.add(e), "function" == typeof n && n())
                }, n = function (e, n) {
                    e = e.trim();
                    var i = new RegExp("(?:^|\\s)" + e + "(?:(\\s\\w)|$)", "ig"), s = t.element.className;
                    i.test(s) || (t.element.className += " " + e, "function" == typeof n && n())
                };
                return t.element.classList ? e : n
            }(this), this.removeClass = function (t) {
                var e = function (e, n) {
                    t.element.classList.contains(e) && (t.element.classList.remove(e), "function" == typeof n && n())
                }, n = function (e, n) {
                    e = e.trim();
                    var i = new RegExp("(?:^|\\s)" + e + "(?:(\\s\\w)|$)", "ig"), s = t.element.className;
                    i.test(s) && (t.element.className = s.replace(i, "$1").trim(), "function" == typeof n && n())
                };
                return t.element.classList ? e : n
            }(this), this.init = function (t) {
                return function () {
                    var e = t.defaultOptions, s = t.element.getAttribute("data-scroll");
                    e && (e.toggle && e.toggle.visible && (t.visibleClass = e.toggle.visible), e.toggle && e.toggle.hidden && (t.hiddenClass = e.toggle.hidden), e.centerHorizontal === !0 && (n = t.element.offsetWidth / 2), e.centerVertical === !0 && (i = t.element.offsetHeight / 2), e.offset && e.offset.x && (n += e.offset.x), e.offset && e.offset.y && (i += e.offset.y), e.addWidth && (t.addWidth = e.addWidth), e.addHeight && (t.addHeight = e.addHeight), e.once && (t.once = e.once));
                    var l = s.indexOf("addWidth") > -1, o = s.indexOf("addHeight") > -1, r = s.indexOf("once") > -1;
                    t.addWidth === !1 && l === !0 && (t.addWidth = l), t.addHeight === !1 && o === !0 && (t.addHeight = o), t.once === !1 && r === !0 && (t.once = r), t.showCallback = t.element.getAttribute("data-scroll-showCallback"), t.hideCallback = t.element.getAttribute("data-scroll-hideCallback");
                    var a = s.split("toggle(");
                    if (a.length > 1) {
                        var c = a[1].split(")")[0].split(",");
                        String.prototype.trim || (String.prototype.trim = function () {
                            return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "")
                        }), t.visibleClass = c[0].trim().replace(".", ""), t.hiddenClass = c[1].trim().replace(".", "")
                    }
                    s.indexOf("centerHorizontal") > -1 && (n = t.element.offsetWidth / 2), s.indexOf("centerVertical") > -1 && (i = t.element.offsetHeight / 2);
                    var f = s.split("offset(");
                    if (f.length > 1) {
                        var d = f[1].split(")")[0].split(",");
                        n += parseInt(d[0].replace("px", "")), i += parseInt(d[1].replace("px", ""))
                    }
                    return t
                }
            }(this)
        };
        this.scrollElement = window, this.bindElement = document.body;
        var o = [], r = [], a = [], c = {left: -1, top: -1},
            f = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || function (t) {
                    setTimeout(t, 1e3 / 60)
                }, d = !1, u = function (t) {
                return function (e, n, i) {
                    return void 0 != n && null != n ? t.bindElement = n : t.bindElement = document.body, void 0 != i && null != i ? t.scrollElement = i : t.scrollElement = window, t.bind(t.bindElement.querySelectorAll("[data-scroll]")), t
                }
            }(this);
        this.bind = function (e) {
            return function (n) {
                n instanceof HTMLElement && (n = [n]);
                var s = [].slice.call(n);
                return s = s.map(function (e) {
                    var n = new l(t, e);
                    return n.init()
                }), o = o.concat(s), o.length > 0 && 0 == d ? (d = !0, i()) : d = !1, e
            }
        }(this), this.triggerFor = function () {
            return function (t) {
                var e = null;
                return o.forEach(function (n) {
                    n.element == t && (e = n)
                }), e
            }
        }(this), this.destroy = function (t) {
            return function (e) {
                return o.forEach(function (t, n) {
                    t.element == e && o.splice(n, 1)
                }), t
            }
        }(this), this.destroyAll = function (t) {
            return function () {
                return o = [], t
            }
        }(this), this.reset = function (t) {
            return function (e) {
                var n = t.triggerFor(e);
                if (null != n) {
                    n.reset();
                    var i = o.indexOf(n);
                    i > -1 && o.splice(i, 1)
                }
                return t
            }
        }(this), this.resetAll = function (t) {
            return function () {
                return o.forEach(function (t) {
                    t.reset()
                }), o = [], t
            }
        }(this), this.attach = function (t) {
            return function (e) {
                return a.push(e), d || (d = !0, i()), t
            }
        }(this), this.detach = function (t) {
            return function (e) {
                var n = a.indexOf(e);
                return n > -1 && a.splice(n, 1), t
            }
        }(this);
        var h = this;
        return u(t, e, n)
    }
});
;!function ($) {
    "use strict";
    var Typed = function (el, options) {
        this.el = $(el);
        this.options = $.extend({}, $.fn.typed.defaults, options);
        this.isInput = this.el.is('input');
        this.attr = this.options.attr;
        this.showCursor = this.isInput ? false : this.options.showCursor;
        this.elContent = this.attr ? this.el.attr(this.attr) : this.el.text()
        this.contentType = this.options.contentType;
        this.typeSpeed = this.options.typeSpeed;
        this.startDelay = this.options.startDelay;
        this.backSpeed = this.options.backSpeed;
        this.backDelay = this.options.backDelay;
        this.strings = this.options.strings;
        this.strPos = 0;
        this.arrayPos = 0;
        this.stopNum = 0;
        this.loop = this.options.loop;
        this.loopCount = this.options.loopCount;
        this.curLoop = 0;
        this.stop = false;
        this.cursorChar = this.options.cursorChar;
        this.build();
    };
    Typed.prototype = {
        constructor: Typed, init: function () {
            var self = this;
            self.timeout = setTimeout(function () {
                self.typewrite(self.strings[self.arrayPos], self.strPos);
            }, self.startDelay);
        }, build: function () {
            if (this.showCursor === true) {
                this.cursor = $("<span class=\"typed-cursor\">" + this.cursorChar + "</span>");
                this.el.after(this.cursor);
            }
            this.init();
        }, typewrite: function (curString, curStrPos) {
            if (this.stop === true) {
                return;
            }
            var humanize = Math.round(Math.random() * (100 - 30)) + this.typeSpeed;
            var self = this;
            self.timeout = setTimeout(function () {
                var charPause = 0;
                var substr = curString.substr(curStrPos);
                if (substr.charAt(0) === '^') {
                    var skip = 1;
                    if (/^\^\d+/.test(substr)) {
                        substr = /\d+/.exec(substr)[0];
                        skip += substr.length;
                        charPause = parseInt(substr);
                    }
                    curString = curString.substring(0, curStrPos) + curString.substring(curStrPos + skip);
                }
                if (self.contentType === 'html') {
                    if (curString.substr(curStrPos).charAt(0) === '<') {
                        var tag = '';
                        while (curString.substr(curStrPos).charAt(0) !== '>') {
                            tag += curString.substr(curStrPos).charAt(0);
                            curStrPos++;
                        }
                        curStrPos++;
                        tag += '>';
                    }
                }
                self.timeout = setTimeout(function () {
                    if (curStrPos === curString.length) {
                        self.options.onStringTyped(self.arrayPos);
                        if (self.arrayPos === self.strings.length - 1) {
                            self.options.callback();
                            self.curLoop++;
                            if (self.loop === false || self.curLoop === self.loopCount)
                                return;
                        }
                        self.timeout = setTimeout(function () {
                            self.backspace(curString, curStrPos);
                        }, self.backDelay);
                    } else {
                        if (curStrPos === 0)
                            self.options.preStringTyped(self.arrayPos);
                        var nextString = self.elContent + curString.substr(0, curStrPos + 1);
                        if (self.attr) {
                            self.el.attr(self.attr, nextString);
                        } else {
                            if (self.contentType === 'html') {
                                self.el.html(nextString);
                            } else {
                                self.el.text(nextString);
                            }
                        }
                        curStrPos++;
                        self.typewrite(curString, curStrPos);
                    }
                }, charPause);
            }, humanize);
        }, backspace: function (curString, curStrPos) {
            if (this.stop === true) {
                return;
            }
            var humanize = Math.round(Math.random() * (100 - 30)) + this.backSpeed;
            var self = this;
            self.timeout = setTimeout(function () {
                if (self.contentType === 'html') {
                    if (curString.substr(curStrPos).charAt(0) === '>') {
                        var tag = '';
                        while (curString.substr(curStrPos).charAt(0) !== '<') {
                            tag -= curString.substr(curStrPos).charAt(0);
                            curStrPos--;
                        }
                        curStrPos--;
                        tag += '<';
                    }
                }
                var nextString = self.elContent + curString.substr(0, curStrPos);
                if (self.attr) {
                    self.el.attr(self.attr, nextString);
                } else {
                    if (self.contentType === 'html') {
                        self.el.html(nextString);
                    } else {
                        self.el.text(nextString);
                    }
                }
                if (curStrPos > self.stopNum) {
                    curStrPos--;
                    self.backspace(curString, curStrPos);
                }
                else if (curStrPos <= self.stopNum) {
                    self.arrayPos++;
                    if (self.arrayPos === self.strings.length) {
                        self.arrayPos = 0;
                        self.init();
                    } else
                        self.typewrite(self.strings[self.arrayPos], curStrPos);
                }
            }, humanize);
        }, reset: function () {
            var self = this;
            clearInterval(self.timeout);
            var id = this.el.attr('id');
            this.el.after('<span id="' + id + '"/>')
            this.el.remove();
            this.cursor.remove();
            self.options.resetCallback();
        }
    };
    $.fn.typed = function (option) {
        return this.each(function () {
            var $this = $(this), data = $this.data('typed'), options = typeof option == 'object' && option;
            if (!data) $this.data('typed', (data = new Typed(this, options)));
            if (typeof option == 'string') data[option]();
        });
    };
    $.fn.typed.defaults = {
        strings: ["These are the default values...", "You know what you should do?", "Use your own!", "Have a great day!"],
        typeSpeed: 0,
        startDelay: 0,
        backSpeed: 0,
        backDelay: 500,
        loop: false,
        loopCount: false,
        showCursor: true,
        cursorChar: "",
        attr: null,
        contentType: 'html',
        callback: function () {
        },
        preStringTyped: function () {
        },
        onStringTyped: function () {
        },
        resetCallback: function () {
        }
    };
}(window.jQuery);