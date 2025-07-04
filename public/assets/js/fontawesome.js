window.FontAwesomeKitConfig = {
    asyncLoading: { enabled: false },
    autoA11y: { enabled: true },
    baseUrl: "https://ka-f.fontawesome.com",
    baseUrlKit: "https://kit.fontawesome.com",
    detectConflictsUntil: null,
    iconUploads: {},
    id: 114865835,
    license: "free",
    method: "css",
    minify: { enabled: true },
    token: "8e03f6bcbe",
    v4FontFaceShim: { enabled: true },
    v4shim: { enabled: true },
    v5FontFaceShim: { enabled: true },
    version: "6.4.0",
};
!(function (t) {
    "function" == typeof define && define.amd ? define("kit-loader", t) : t();
})(function () {
    "use strict";
    function t(t, e) {
        var n = Object.keys(t);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(t);
            e &&
                (r = r.filter(function (e) {
                    return Object.getOwnPropertyDescriptor(t, e).enumerable;
                })),
                n.push.apply(n, r);
        }
        return n;
    }
    function e(e) {
        for (var n = 1; n < arguments.length; n++) {
            var o = null != arguments[n] ? arguments[n] : {};
            n % 2
                ? t(Object(o), !0).forEach(function (t) {
                      r(e, t, o[t]);
                  })
                : Object.getOwnPropertyDescriptors
                ? Object.defineProperties(
                      e,
                      Object.getOwnPropertyDescriptors(o)
                  )
                : t(Object(o)).forEach(function (t) {
                      Object.defineProperty(
                          e,
                          t,
                          Object.getOwnPropertyDescriptor(o, t)
                      );
                  });
        }
        return e;
    }
    function n(t) {
        return (n =
            "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                ? function (t) {
                      return typeof t;
                  }
                : function (t) {
                      return t &&
                          "function" == typeof Symbol &&
                          t.constructor === Symbol &&
                          t !== Symbol.prototype
                          ? "symbol"
                          : typeof t;
                  })(t);
    }
    function r(t, e, n) {
        return (
            (e = (function (t) {
                var e = (function (t, e) {
                    if ("object" != typeof t || null === t) return t;
                    var n = t[Symbol.toPrimitive];
                    if (void 0 !== n) {
                        var r = n.call(t, e || "default");
                        if ("object" != typeof r) return r;
                        throw new TypeError(
                            "@@toPrimitive must return a primitive value."
                        );
                    }
                    return ("string" === e ? String : Number)(t);
                })(t, "string");
                return "symbol" == typeof e ? e : String(e);
            })(e)) in t
                ? Object.defineProperty(t, e, {
                      value: n,
                      enumerable: !0,
                      configurable: !0,
                      writable: !0,
                  })
                : (t[e] = n),
            t
        );
    }
    function o(t, e) {
        return (
            (function (t) {
                if (Array.isArray(t)) return t;
            })(t) ||
            (function (t, e) {
                var n =
                    null == t
                        ? null
                        : ("undefined" != typeof Symbol &&
                              t[Symbol.iterator]) ||
                          t["@@iterator"];
                if (null != n) {
                    var r,
                        o,
                        i,
                        c,
                        a = [],
                        u = !0,
                        f = !1;
                    try {
                        if (((i = (n = n.call(t)).next), 0 === e)) {
                            if (Object(n) !== n) return;
                            u = !1;
                        } else
                            for (
                                ;
                                !(u = (r = i.call(n)).done) &&
                                (a.push(r.value), a.length !== e);
                                u = !0
                            );
                    } catch (t) {
                        (f = !0), (o = t);
                    } finally {
                        try {
                            if (
                                !u &&
                                null != n.return &&
                                ((c = n.return()), Object(c) !== c)
                            )
                                return;
                        } finally {
                            if (f) throw o;
                        }
                    }
                    return a;
                }
            })(t, e) ||
            (function (t, e) {
                if (!t) return;
                if ("string" == typeof t) return i(t, e);
                var n = Object.prototype.toString.call(t).slice(8, -1);
                "Object" === n && t.constructor && (n = t.constructor.name);
                if ("Map" === n || "Set" === n) return Array.from(t);
                if (
                    "Arguments" === n ||
                    /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)
                )
                    return i(t, e);
            })(t, e) ||
            (function () {
                throw new TypeError(
                    "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                );
            })()
        );
    }
    function i(t, e) {
        (null == e || e > t.length) && (e = t.length);
        for (var n = 0, r = new Array(e); n < e; n++) r[n] = t[n];
        return r;
    }
    function c(t, e) {
        var n = (e && e.addOn) || "",
            r = (e && e.baseFilename) || t.license + n,
            o = e && e.minify ? ".min" : "",
            i = (e && e.fileSuffix) || t.method,
            c = (e && e.subdir) || t.method;
        return (
            t.baseUrl +
            "/releases/" +
            ("latest" === t.version ? "latest" : "v".concat(t.version)) +
            "/" +
            c +
            "/" +
            r +
            o +
            "." +
            i
        );
    }
    function a(t) {
        return t.baseUrlKit + "/" + t.token + "/" + t.id + "/kit-upload.css";
    }
    function u(t, e) {
        var n = e || ["fa"],
            r = "." + Array.prototype.join.call(n, ",."),
            o = t.querySelectorAll(r);
        Array.prototype.forEach.call(o, function (e) {
            var n = e.getAttribute("title");
            e.setAttribute("aria-hidden", "true");
            var r =
                !e.nextElementSibling ||
                !e.nextElementSibling.classList.contains("sr-only");
            if (n && r) {
                var o = t.createElement("span");
                (o.innerHTML = n),
                    o.classList.add("sr-only"),
                    e.parentNode.insertBefore(o, e.nextSibling);
            }
        });
    }
    var f,
        s = function () {},
        d =
            "undefined" != typeof global &&
            void 0 !== global.process &&
            "function" == typeof global.process.emit,
        l = "undefined" == typeof setImmediate ? setTimeout : setImmediate,
        h = [];
    function m() {
        for (var t = 0; t < h.length; t++) h[t][0](h[t][1]);
        (h = []), (f = !1);
    }
    function p(t, e) {
        h.push([t, e]), f || ((f = !0), l(m, 0));
    }
    function v(t) {
        var e = t.owner,
            n = e._state,
            r = e._data,
            o = t[n],
            i = t.then;
        if ("function" == typeof o) {
            n = "fulfilled";
            try {
                r = o(r);
            } catch (t) {
                w(i, t);
            }
        }
        y(i, r) || ("fulfilled" === n && b(i, r), "rejected" === n && w(i, r));
    }
    function y(t, e) {
        var r;
        try {
            if (t === e)
                throw new TypeError(
                    "A promises callback cannot return that same promise."
                );
            if (e && ("function" == typeof e || "object" === n(e))) {
                var o = e.then;
                if ("function" == typeof o)
                    return (
                        o.call(
                            e,
                            function (n) {
                                r || ((r = !0), e === n ? g(t, n) : b(t, n));
                            },
                            function (e) {
                                r || ((r = !0), w(t, e));
                            }
                        ),
                        !0
                    );
            }
        } catch (e) {
            return r || w(t, e), !0;
        }
        return !1;
    }
    function b(t, e) {
        (t !== e && y(t, e)) || g(t, e);
    }
    function g(t, e) {
        "pending" === t._state &&
            ((t._state = "settled"), (t._data = e), p(S, t));
    }
    function w(t, e) {
        "pending" === t._state &&
            ((t._state = "settled"), (t._data = e), p(j, t));
    }
    function A(t) {
        t._then = t._then.forEach(v);
    }
    function S(t) {
        (t._state = "fulfilled"), A(t);
    }
    function j(t) {
        (t._state = "rejected"),
            A(t),
            !t._handled &&
                d &&
                global.process.emit("unhandledRejection", t._data, t);
    }
    function O(t) {
        global.process.emit("rejectionHandled", t);
    }
    function E(t) {
        if ("function" != typeof t)
            throw new TypeError("Promise resolver " + t + " is not a function");
        if (this instanceof E == !1)
            throw new TypeError(
                "Failed to construct 'Promise': Please use the 'new' operator, this object constructor cannot be called as a function."
            );
        (this._then = []),
            (function (t, e) {
                function n(t) {
                    w(e, t);
                }
                try {
                    t(function (t) {
                        b(e, t);
                    }, n);
                } catch (t) {
                    n(t);
                }
            })(t, this);
    }
    (E.prototype = {
        constructor: E,
        _state: "pending",
        _then: null,
        _data: void 0,
        _handled: !1,
        then: function (t, e) {
            var n = {
                owner: this,
                then: new this.constructor(s),
                fulfilled: t,
                rejected: e,
            };
            return (
                (!e && !t) ||
                    this._handled ||
                    ((this._handled = !0),
                    "rejected" === this._state && d && p(O, this)),
                "fulfilled" === this._state || "rejected" === this._state
                    ? p(v, n)
                    : this._then.push(n),
                n.then
            );
        },
        catch: function (t) {
            return this.then(null, t);
        },
    }),
        (E.all = function (t) {
            if (!Array.isArray(t))
                throw new TypeError("You must pass an array to Promise.all().");
            return new E(function (e, n) {
                var r = [],
                    o = 0;
                function i(t) {
                    return (
                        o++,
                        function (n) {
                            (r[t] = n), --o || e(r);
                        }
                    );
                }
                for (var c, a = 0; a < t.length; a++)
                    (c = t[a]) && "function" == typeof c.then
                        ? c.then(i(a), n)
                        : (r[a] = c);
                o || e(r);
            });
        }),
        (E.race = function (t) {
            if (!Array.isArray(t))
                throw new TypeError(
                    "You must pass an array to Promise.race()."
                );
            return new E(function (e, n) {
                for (var r, o = 0; o < t.length; o++)
                    (r = t[o]) && "function" == typeof r.then
                        ? r.then(e, n)
                        : e(r);
            });
        }),
        (E.resolve = function (t) {
            return t && "object" === n(t) && t.constructor === E
                ? t
                : new E(function (e) {
                      e(t);
                  });
        }),
        (E.reject = function (t) {
            return new E(function (e, n) {
                n(t);
            });
        });
    var _ = "function" == typeof Promise ? Promise : E;
    function F(t, e) {
        var n = e.fetch,
            r = e.XMLHttpRequest,
            o = e.token,
            i = t;
        return (
            "URLSearchParams" in window
                ? (i = new URL(t)).searchParams.set("token", o)
                : (i = i + "?token=" + encodeURIComponent(o)),
            (i = i.toString()),
            new _(function (t, e) {
                if ("function" == typeof n)
                    n(i, { mode: "cors", cache: "default" })
                        .then(function (t) {
                            if (t.ok) return t.text();
                            throw new Error("");
                        })
                        .then(function (e) {
                            t(e);
                        })
                        .catch(e);
                else if ("function" == typeof r) {
                    var o = new r();
                    o.addEventListener("loadend", function () {
                        this.responseText
                            ? t(this.responseText)
                            : e(new Error(""));
                    });
                    ["abort", "error", "timeout"].map(function (t) {
                        o.addEventListener(t, function () {
                            e(new Error(""));
                        });
                    }),
                        o.open("GET", i),
                        o.send();
                } else {
                    e(new Error(""));
                }
            })
        );
    }
    function P(t, e, n) {
        var r = t;
        return (
            [
                [
                    /(url\("?)\.\.\/\.\.\/\.\./g,
                    function (t, n) {
                        return "".concat(n).concat(e);
                    },
                ],
                [
                    /(url\("?)\.\.\/webfonts/g,
                    function (t, r) {
                        return ""
                            .concat(r)
                            .concat(e, "/releases/v")
                            .concat(n, "/webfonts");
                    },
                ],
                [
                    /(url\("?)https:\/\/kit-free([^.])*\.fontawesome\.com/g,
                    function (t, n) {
                        return "".concat(n).concat(e);
                    },
                ],
            ].forEach(function (t) {
                var e = o(t, 2),
                    n = e[0],
                    i = e[1];
                r = r.replace(n, i);
            }),
            r
        );
    }
    function C(t, n) {
        var r =
                arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : function () {},
            o = n.document || o,
            i = u.bind(u, o, ["fa", "fab", "fas", "far", "fal", "fad", "fak"]),
            f = Object.keys(t.iconUploads || {}).length > 0;
        t.autoA11y.enabled && r(i);
        var s = [{ id: "fa-main", addOn: void 0 }];
        t.v4shim &&
            t.v4shim.enabled &&
            s.push({ id: "fa-v4-shims", addOn: "-v4-shims" }),
            t.v5FontFaceShim &&
                t.v5FontFaceShim.enabled &&
                s.push({ id: "fa-v5-font-face", addOn: "-v5-font-face" }),
            t.v4FontFaceShim &&
                t.v4FontFaceShim.enabled &&
                s.push({ id: "fa-v4-font-face", addOn: "-v4-font-face" }),
            f && s.push({ id: "fa-kit-upload", customCss: !0 });
        var d = s.map(function (r) {
            return new _(function (o, i) {
                F(
                    r.customCss
                        ? a(t)
                        : c(t, { addOn: r.addOn, minify: t.minify.enabled }),
                    n
                )
                    .then(function (i) {
                        o(
                            T(
                                i,
                                e(
                                    e({}, n),
                                    {},
                                    {
                                        baseUrl: t.baseUrl,
                                        version: t.version,
                                        id: r.id,
                                        contentFilter: function (t, e) {
                                            return P(t, e.baseUrl, e.version);
                                        },
                                    }
                                )
                            )
                        );
                    })
                    .catch(i);
            });
        });
        return _.all(d);
    }
    function T(t, e) {
        var n =
                e.contentFilter ||
                function (t, e) {
                    return t;
                },
            r = document.createElement("style"),
            o = document.createTextNode(n(t, e));
        return (
            r.appendChild(o),
            (r.media = "all"),
            e.id && r.setAttribute("id", e.id),
            e &&
                e.detectingConflicts &&
                e.detectionIgnoreAttr &&
                r.setAttributeNode(
                    document.createAttribute(e.detectionIgnoreAttr)
                ),
            r
        );
    }
    function U(t, n) {
        (n.autoA11y = t.autoA11y.enabled),
            "pro" === t.license &&
                ((n.autoFetchSvg = !0),
                (n.fetchSvgFrom =
                    t.baseUrl +
                    "/releases/" +
                    ("latest" === t.version
                        ? "latest"
                        : "v".concat(t.version)) +
                    "/svgs"),
                (n.fetchUploadedSvgFrom = t.uploadsUrl));
        var r = [];
        return (
            t.v4shim.enabled &&
                r.push(
                    new _(function (r, o) {
                        F(
                            c(t, {
                                addOn: "-v4-shims",
                                minify: t.minify.enabled,
                            }),
                            n
                        )
                            .then(function (t) {
                                r(k(t, e(e({}, n), {}, { id: "fa-v4-shims" })));
                            })
                            .catch(o);
                    })
                ),
            r.push(
                new _(function (r, o) {
                    F(c(t, { minify: t.minify.enabled }), n)
                        .then(function (t) {
                            var o = k(t, e(e({}, n), {}, { id: "fa-main" }));
                            r(
                                (function (t, e) {
                                    var n =
                                            e && void 0 !== e.autoFetchSvg
                                                ? e.autoFetchSvg
                                                : void 0,
                                        r =
                                            e && void 0 !== e.autoA11y
                                                ? e.autoA11y
                                                : void 0;
                                    void 0 !== r &&
                                        t.setAttribute(
                                            "data-auto-a11y",
                                            r ? "true" : "false"
                                        );
                                    n &&
                                        (t.setAttributeNode(
                                            document.createAttribute(
                                                "data-auto-fetch-svg"
                                            )
                                        ),
                                        t.setAttribute(
                                            "data-fetch-svg-from",
                                            e.fetchSvgFrom
                                        ),
                                        t.setAttribute(
                                            "data-fetch-uploaded-svg-from",
                                            e.fetchUploadedSvgFrom
                                        ));
                                    return t;
                                })(o, n)
                            );
                        })
                        .catch(o);
                })
            ),
            _.all(r)
        );
    }
    function k(t, e) {
        var n = document.createElement("SCRIPT"),
            r = document.createTextNode(t);
        return (
            n.appendChild(r),
            (n.referrerPolicy = "strict-origin"),
            e.id && n.setAttribute("id", e.id),
            e &&
                e.detectingConflicts &&
                e.detectionIgnoreAttr &&
                n.setAttributeNode(
                    document.createAttribute(e.detectionIgnoreAttr)
                ),
            n
        );
    }
    function I(t) {
        var e,
            n = [],
            r = document,
            o = r.documentElement.doScroll,
            i = (o ? /^loaded|^c/ : /^loaded|^i|^c/).test(r.readyState);
        i ||
            r.addEventListener(
                "DOMContentLoaded",
                (e = function () {
                    for (
                        r.removeEventListener("DOMContentLoaded", e), i = 1;
                        (e = n.shift());

                    )
                        e();
                })
            ),
            i ? setTimeout(t, 0) : n.push(t);
    }
    function L(t) {
        "undefined" != typeof MutationObserver &&
            new MutationObserver(t).observe(document, {
                childList: !0,
                subtree: !0,
            });
    }
    try {
        if (window.FontAwesomeKitConfig) {
            var x = window.FontAwesomeKitConfig,
                M = {
                    detectingConflicts:
                        x.detectConflictsUntil &&
                        new Date() <= new Date(x.detectConflictsUntil),
                    detectionIgnoreAttr: "data-fa-detection-ignore",
                    fetch: window.fetch,
                    token: x.token,
                    XMLHttpRequest: window.XMLHttpRequest,
                    document: document,
                },
                N = document.currentScript,
                D = N ? N.parentElement : document.head;
            (function () {
                var t =
                        arguments.length > 0 && void 0 !== arguments[0]
                            ? arguments[0]
                            : {},
                    e =
                        arguments.length > 1 && void 0 !== arguments[1]
                            ? arguments[1]
                            : {};
                return "js" === t.method
                    ? U(t, e)
                    : "css" === t.method
                    ? C(t, e, function (t) {
                          I(t), L(t);
                      })
                    : void 0;
            })(x, M)
                .then(function (t) {
                    t.map(function (t) {
                        try {
                            D.insertBefore(t, N ? N.nextSibling : null);
                        } catch (e) {
                            D.appendChild(t);
                        }
                    }),
                        M.detectingConflicts &&
                            N &&
                            I(function () {
                                N.setAttributeNode(
                                    document.createAttribute(
                                        M.detectionIgnoreAttr
                                    )
                                );
                                var t = (function (t, e) {
                                    var n = document.createElement("script");
                                    return (
                                        e &&
                                            e.detectionIgnoreAttr &&
                                            n.setAttributeNode(
                                                document.createAttribute(
                                                    e.detectionIgnoreAttr
                                                )
                                            ),
                                        (n.src = c(t, {
                                            baseFilename: "conflict-detection",
                                            fileSuffix: "js",
                                            subdir: "js",
                                            minify: t.minify.enabled,
                                        })),
                                        n
                                    );
                                })(x, M);
                                document.body.appendChild(t);
                            });
                })
                .catch(function (t) {
                    console.error(
                        "".concat("Font Awesome Kit:", " ").concat(t)
                    );
                });
        }
    } catch (t) {
        console.error("".concat("Font Awesome Kit:", " ").concat(t));
    }
});
