! function(a) {
    var e = {};

    function i(r) {
        if (e[r]) return e[r].exports;
        var t = e[r] = {
            i: r,
            l: !1,
            exports: {}
        };
        return a[r].call(t.exports, t, t.exports, i), t.l = !0, t.exports
    }
    i.m = a, i.c = e, i.d = function(a, e, r) {
        i.o(a, e) || Object.defineProperty(a, e, {
            enumerable: !0,
            get: r
        })
    }, i.r = function(a) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(a, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(a, "__esModule", {
            value: !0
        })
    }, i.t = function(a, e) {
        if (1 & e && (a = i(a)), 8 & e) return a;
        if (4 & e && "object" == typeof a && a && a.__esModule) return a;
        var r = Object.create(null);
        if (i.r(r), Object.defineProperty(r, "default", {
                enumerable: !0,
                value: a
            }), 2 & e && "string" != typeof a)
            for (var t in a) i.d(r, t, function(e) {
                return a[e]
            }.bind(null, t));
        return r
    }, i.n = function(a) {
        var e = a && a.__esModule ? function() {
            return a.default
        } : function() {
            return a
        };
        return i.d(e, "a", e), e
    }, i.o = function(a, e) {
        return Object.prototype.hasOwnProperty.call(a, e)
    }, i.p = "", i(i.s = 20)
}({
    20: function(a, e, i) {
        a.exports = i(21)
    },
    21: function(a, e) {
        function i(a, e) {
            for (var i = 0; i < e.length; i++) {
                var r = e[i];
                r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(a, r.key, r)
            }
        }
        var r = function() {
            function a() {
                ! function(a, e) {
                    if (!(a instanceof e)) throw new TypeError("Cannot call a class as a function")
                }(this, a)
            }
            var e, r, t;
            return e = a, t = [{
                key: "initWizardDefaults",
                value: function() {
                    jQuery.fn.bootstrapWizard.defaults.tabClass = "nav nav-tabs", jQuery.fn.bootstrapWizard.defaults.nextSelector = '[data-wizard="next"]', jQuery.fn.bootstrapWizard.defaults.previousSelector = '[data-wizard="prev"]', jQuery.fn.bootstrapWizard.defaults.firstSelector = '[data-wizard="first"]', jQuery.fn.bootstrapWizard.defaults.lastSelector = '[data-wizard="lsat"]', jQuery.fn.bootstrapWizard.defaults.finishSelector = '[data-wizard="finish"]', jQuery.fn.bootstrapWizard.defaults.backSelector = '[data-wizard="back"]'
                }
            }, {
                key: "initWizardSimple",
                value: function() {
                    jQuery(".js-wizard-simple").bootstrapWizard({
                        onTabShow: function(a, e, i) {
                            var r = (i + 1) / e.find("li").length * 100,
                                t = e.parents(".block").find('[data-wizard="progress"] > .progress-bar');
                            t.length && t.css({
                                width: r + 1 + "%"
                            })
                        }
                    })
                }
            }, {
                key: "init",
                value: function() {
                    this.initWizardDefaults(), this.initWizardSimple()
                }
            }], (r = null) && i(e.prototype, r), t && i(e, t), a
        }();
        jQuery(function() {
            r.init()
        })
    }
});