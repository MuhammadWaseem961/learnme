!(function (e, t) {
    "object" == typeof exports && "undefined" != typeof module
        ? t(require("@firebase/app"))
        : "function" == typeof define && define.amd
        ? define(["@firebase/app"], t)
        : t(
              (e = "undefined" != typeof globalThis ? globalThis : e || self)
                  .firebase
          );
})(this, function (da) {
    "use strict";
    try {
        !function () {
            function e(e) {
                return e && "object" == typeof e && "default" in e
                    ? e
                    : { default: e };
            }
            var t = e(da),
                r = function (e, t) {
                    return (r =
                        Object.setPrototypeOf ||
                        ({ __proto__: [] } instanceof Array &&
                            function (e, t) {
                                e.__proto__ = t;
                            }) ||
                        function (e, t) {
                            for (var n in t)
                                Object.prototype.hasOwnProperty.call(t, n) &&
                                    (e[n] = t[n]);
                        })(e, t);
                };
            function n(e, t) {
                if ("function" != typeof t && null !== t)
                    throw new TypeError(
                        "Class extends value " +
                            String(t) +
                            " is not a constructor or null"
                    );
                function n() {
                    this.constructor = e;
                }
                r(e, t),
                    (e.prototype =
                        null === t
                            ? Object.create(t)
                            : ((n.prototype = t.prototype), new n()));
            }
            var l = function () {
                return (l =
                    Object.assign ||
                    function (e) {
                        for (var t, n = 1, r = arguments.length; n < r; n++)
                            for (var i in (t = arguments[n]))
                                Object.prototype.hasOwnProperty.call(t, i) &&
                                    (e[i] = t[i]);
                        return e;
                    }).apply(this, arguments);
            };
            function i(e, s, a, u) {
                return new (a = a || Promise)(function (n, t) {
                    function r(e) {
                        try {
                            o(u.next(e));
                        } catch (e) {
                            t(e);
                        }
                    }
                    function i(e) {
                        try {
                            o(u.throw(e));
                        } catch (e) {
                            t(e);
                        }
                    }
                    function o(e) {
                        var t;
                        e.done
                            ? n(e.value)
                            : ((t = e.value) instanceof a
                                  ? t
                                  : new a(function (e) {
                                        e(t);
                                    })
                              ).then(r, i);
                    }
                    o((u = u.apply(e, s || [])).next());
                });
            }
            function o(n, r) {
                var i,
                    o,
                    s,
                    a = {
                        label: 0,
                        sent: function () {
                            if (1 & s[0]) throw s[1];
                            return s[1];
                        },
                        trys: [],
                        ops: [],
                    },
                    e = { next: t(0), throw: t(1), return: t(2) };
                return (
                    "function" == typeof Symbol &&
                        (e[Symbol.iterator] = function () {
                            return this;
                        }),
                    e
                );
                function t(t) {
                    return function (e) {
                        return (function (t) {
                            if (i)
                                throw new TypeError(
                                    "Generator is already executing."
                                );
                            for (; a; )
                                try {
                                    if (
                                        ((i = 1),
                                        o &&
                                            (s =
                                                2 & t[0]
                                                    ? o.return
                                                    : t[0]
                                                    ? o.throw ||
                                                      ((s = o.return) &&
                                                          s.call(o),
                                                      0)
                                                    : o.next) &&
                                            !(s = s.call(o, t[1])).done)
                                    )
                                        return s;
                                    switch (
                                        ((o = 0),
                                        (t = s ? [2 & t[0], s.value] : t)[0])
                                    ) {
                                        case 0:
                                        case 1:
                                            s = t;
                                            break;
                                        case 4:
                                            return (
                                                a.label++,
                                                { value: t[1], done: !1 }
                                            );
                                        case 5:
                                            a.label++, (o = t[1]), (t = [0]);
                                            continue;
                                        case 7:
                                            (t = a.ops.pop()), a.trys.pop();
                                            continue;
                                        default:
                                            if (
                                                !(s =
                                                    0 < (s = a.trys).length &&
                                                    s[s.length - 1]) &&
                                                (6 === t[0] || 2 === t[0])
                                            ) {
                                                a = 0;
                                                continue;
                                            }
                                            if (
                                                3 === t[0] &&
                                                (!s ||
                                                    (t[1] > s[0] &&
                                                        t[1] < s[3]))
                                            ) {
                                                a.label = t[1];
                                                break;
                                            }
                                            if (6 === t[0] && a.label < s[1]) {
                                                (a.label = s[1]), (s = t);
                                                break;
                                            }
                                            if (s && a.label < s[2]) {
                                                (a.label = s[2]), a.ops.push(t);
                                                break;
                                            }
                                            s[2] && a.ops.pop(), a.trys.pop();
                                            continue;
                                    }
                                    t = r.call(n, a);
                                } catch (e) {
                                    (t = [6, e]), (o = 0);
                                } finally {
                                    i = s = 0;
                                }
                            if (5 & t[0]) throw t[1];
                            return { value: t[0] ? t[1] : void 0, done: !0 };
                        })([t, e]);
                    };
                }
            }
            function _(e) {
                var t = "function" == typeof Symbol && Symbol.iterator,
                    n = t && e[t],
                    r = 0;
                if (n) return n.call(e);
                if (e && "number" == typeof e.length)
                    return {
                        next: function () {
                            return {
                                value:
                                    (e = e && r >= e.length ? void 0 : e) &&
                                    e[r++],
                                done: !e,
                            };
                        },
                    };
                throw new TypeError(
                    t
                        ? "Object is not iterable."
                        : "Symbol.iterator is not defined."
                );
            }
            function y(e, t) {
                var n = "function" == typeof Symbol && e[Symbol.iterator];
                if (!n) return e;
                var r,
                    i,
                    o = n.call(e),
                    s = [];
                try {
                    for (; (void 0 === t || 0 < t--) && !(r = o.next()).done; )
                        s.push(r.value);
                } catch (e) {
                    i = { error: e };
                } finally {
                    try {
                        r && !r.done && (n = o.return) && n.call(o);
                    } finally {
                        if (i) throw i.error;
                    }
                }
                return s;
            }
            function s(e, t) {
                for (var n = 0, r = t.length, i = e.length; n < r; n++, i++)
                    e[i] = t[n];
                return e;
            }
            function a(e) {
                for (var t = [], n = 0, r = 0; r < e.length; r++) {
                    var i = e.charCodeAt(r);
                    i < 128
                        ? (t[n++] = i)
                        : (i < 2048
                              ? (t[n++] = (i >> 6) | 192)
                              : (55296 == (64512 & i) &&
                                r + 1 < e.length &&
                                56320 == (64512 & e.charCodeAt(r + 1))
                                    ? ((i =
                                          65536 +
                                          ((1023 & i) << 10) +
                                          (1023 & e.charCodeAt(++r))),
                                      (t[n++] = (i >> 18) | 240),
                                      (t[n++] = ((i >> 12) & 63) | 128))
                                    : (t[n++] = (i >> 12) | 224),
                                (t[n++] = ((i >> 6) & 63) | 128)),
                          (t[n++] = (63 & i) | 128));
                }
                return t;
            }
            function u(e) {
                try {
                    return c.decodeString(e, !0);
                } catch (e) {
                    console.error("base64Decode failed: ", e);
                }
                return null;
            }
            var h = {
                    NODE_CLIENT: !1,
                    NODE_ADMIN: !1,
                    SDK_VERSION: "${JSCORE_VERSION}",
                },
                g = function (e, t) {
                    if (!e) throw m(t);
                },
                m = function (e) {
                    return new Error(
                        "Firebase Database (" +
                            h.SDK_VERSION +
                            ") INTERNAL ASSERT FAILED: " +
                            e
                    );
                },
                c = {
                    byteToCharMap_: null,
                    charToByteMap_: null,
                    byteToCharMapWebSafe_: null,
                    charToByteMapWebSafe_: null,
                    ENCODED_VALS_BASE:
                        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
                    get ENCODED_VALS() {
                        return this.ENCODED_VALS_BASE + "+/=";
                    },
                    get ENCODED_VALS_WEBSAFE() {
                        return this.ENCODED_VALS_BASE + "-_.";
                    },
                    HAS_NATIVE_SUPPORT: "function" == typeof atob,
                    encodeByteArray: function (e, t) {
                        if (!Array.isArray(e))
                            throw Error(
                                "encodeByteArray takes an array as a parameter"
                            );
                        this.init_();
                        for (
                            var n = t
                                    ? this.byteToCharMapWebSafe_
                                    : this.byteToCharMap_,
                                r = [],
                                i = 0;
                            i < e.length;
                            i += 3
                        ) {
                            var o = e[i],
                                s = i + 1 < e.length,
                                a = s ? e[i + 1] : 0,
                                u = i + 2 < e.length,
                                l = u ? e[i + 2] : 0,
                                h = o >> 2,
                                o = ((3 & o) << 4) | (a >> 4),
                                a = ((15 & a) << 2) | (l >> 6),
                                l = 63 & l;
                            u || ((l = 64), s || (a = 64)),
                                r.push(n[h], n[o], n[a], n[l]);
                        }
                        return r.join("");
                    },
                    encodeString: function (e, t) {
                        return this.HAS_NATIVE_SUPPORT && !t
                            ? btoa(e)
                            : this.encodeByteArray(a(e), t);
                    },
                    decodeString: function (e, t) {
                        return this.HAS_NATIVE_SUPPORT && !t
                            ? atob(e)
                            : (function (e) {
                                  for (
                                      var t = [], n = 0, r = 0;
                                      n < e.length;

                                  ) {
                                      var i,
                                          o,
                                          s,
                                          a = e[n++];
                                      a < 128
                                          ? (t[r++] = String.fromCharCode(a))
                                          : 191 < a && a < 224
                                          ? ((o = e[n++]),
                                            (t[r++] = String.fromCharCode(
                                                ((31 & a) << 6) | (63 & o)
                                            )))
                                          : 239 < a && a < 365
                                          ? ((i =
                                                (((7 & a) << 18) |
                                                    ((63 & (o = e[n++])) <<
                                                        12) |
                                                    ((63 & (s = e[n++])) << 6) |
                                                    (63 & e[n++])) -
                                                65536),
                                            (t[r++] = String.fromCharCode(
                                                55296 + (i >> 10)
                                            )),
                                            (t[r++] = String.fromCharCode(
                                                56320 + (1023 & i)
                                            )))
                                          : ((o = e[n++]),
                                            (s = e[n++]),
                                            (t[r++] = String.fromCharCode(
                                                ((15 & a) << 12) |
                                                    ((63 & o) << 6) |
                                                    (63 & s)
                                            )));
                                  }
                                  return t.join("");
                              })(this.decodeStringToByteArray(e, t));
                    },
                    decodeStringToByteArray: function (e, t) {
                        this.init_();
                        for (
                            var n = t
                                    ? this.charToByteMapWebSafe_
                                    : this.charToByteMap_,
                                r = [],
                                i = 0;
                            i < e.length;

                        ) {
                            var o = n[e.charAt(i++)],
                                s = i < e.length ? n[e.charAt(i)] : 0,
                                a = ++i < e.length ? n[e.charAt(i)] : 64,
                                u = ++i < e.length ? n[e.charAt(i)] : 64;
                            if (
                                (++i,
                                null == o ||
                                    null == s ||
                                    null == a ||
                                    null == u)
                            )
                                throw Error();
                            o = (o << 2) | (s >> 4);
                            r.push(o),
                                64 !== a &&
                                    ((s = ((s << 4) & 240) | (a >> 2)),
                                    r.push(s),
                                    64 !== u &&
                                        ((u = ((a << 6) & 192) | u),
                                        r.push(u)));
                        }
                        return r;
                    },
                    init_: function () {
                        if (!this.byteToCharMap_) {
                            (this.byteToCharMap_ = {}),
                                (this.charToByteMap_ = {}),
                                (this.byteToCharMapWebSafe_ = {}),
                                (this.charToByteMapWebSafe_ = {});
                            for (var e = 0; e < this.ENCODED_VALS.length; e++)
                                (this.byteToCharMap_[e] =
                                    this.ENCODED_VALS.charAt(e)),
                                    (this.charToByteMap_[
                                        this.byteToCharMap_[e]
                                    ] = e),
                                    (this.byteToCharMapWebSafe_[e] =
                                        this.ENCODED_VALS_WEBSAFE.charAt(e)),
                                    (this.charToByteMapWebSafe_[
                                        this.byteToCharMapWebSafe_[e]
                                    ] = e) >= this.ENCODED_VALS_BASE.length &&
                                        ((this.charToByteMap_[
                                            this.ENCODED_VALS_WEBSAFE.charAt(e)
                                        ] = e),
                                        (this.charToByteMapWebSafe_[
                                            this.ENCODED_VALS.charAt(e)
                                        ] = e));
                        }
                    },
                };
            function d(e) {
                return (function e(t, n) {
                    if (!(n instanceof Object)) return n;
                    switch (n.constructor) {
                        case Date:
                            var r = n;
                            return new Date(r.getTime());
                        case Object:
                            void 0 === t && (t = {});
                            break;
                        case Array:
                            t = [];
                            break;
                        default:
                            return n;
                    }
                    for (var i in n)
                        n.hasOwnProperty(i) && p(i) && (t[i] = e(t[i], n[i]));
                    return t;
                })(void 0, e);
            }
            function p(e) {
                return "__proto__" !== e;
            }
            var f =
                ((v.prototype.wrapCallback = function (n) {
                    var r = this;
                    return function (e, t) {
                        e ? r.reject(e) : r.resolve(t),
                            "function" == typeof n &&
                                (r.promise.catch(function () {}),
                                1 === n.length ? n(e) : n(e, t));
                    };
                }),
                v);
            function v() {
                var n = this;
                (this.reject = function () {}),
                    (this.resolve = function () {}),
                    (this.promise = new Promise(function (e, t) {
                        (n.resolve = e), (n.reject = t);
                    }));
            }
            function w() {
                return (
                    "undefined" != typeof window &&
                    (window.cordova || window.phonegap || window.PhoneGap) &&
                    /ios|iphone|ipod|ipad|android|blackberry|iemobile/i.test(
                        "undefined" != typeof navigator &&
                            "string" == typeof navigator.userAgent
                            ? navigator.userAgent
                            : ""
                    )
                );
            }
            function C() {
                return !0 === h.NODE_ADMIN;
            }
            var b,
                E = "FirebaseError",
                S = (n(T, (b = Error)), T);
            function T(e, t, n) {
                t = b.call(this, t) || this;
                return (
                    (t.code = e),
                    (t.customData = n),
                    (t.name = E),
                    Object.setPrototypeOf(t, T.prototype),
                    Error.captureStackTrace &&
                        Error.captureStackTrace(t, I.prototype.create),
                    t
                );
            }
            var I =
                ((P.prototype.create = function (e) {
                    for (var t = [], n = 1; n < arguments.length; n++)
                        t[n - 1] = arguments[n];
                    var r,
                        i = t[0] || {},
                        o = this.service + "/" + e,
                        e = this.errors[e],
                        e = e
                            ? ((r = i),
                              e.replace(N, function (e, t) {
                                  var n = r[t];
                                  return null != n ? String(n) : "<" + t + "?>";
                              }))
                            : "Error",
                        e = this.serviceName + ": " + e + " (" + o + ").";
                    return new S(o, e, i);
                }),
                P);
            function P(e, t, n) {
                (this.service = e), (this.serviceName = t), (this.errors = n);
            }
            var N = /\{\$([^}]+)}/g;
            function R(e) {
                return JSON.parse(e);
            }
            function x(e) {
                return JSON.stringify(e);
            }
            function k(e) {
                var t = {},
                    n = {},
                    r = {},
                    i = "";
                try {
                    var o = e.split("."),
                        t = R(u(o[0]) || ""),
                        n = R(u(o[1]) || ""),
                        i = o[2],
                        r = n.d || {};
                    delete n.d;
                } catch (e) {}
                return { header: t, claims: n, data: r, signature: i };
            }
            function D(e, t) {
                return Object.prototype.hasOwnProperty.call(e, t);
            }
            function O(e, t) {
                if (Object.prototype.hasOwnProperty.call(e, t)) return e[t];
            }
            function A(e) {
                for (var t in e)
                    if (Object.prototype.hasOwnProperty.call(e, t)) return !1;
                return !0;
            }
            function L(e, t, n) {
                var r,
                    i = {};
                for (r in e)
                    Object.prototype.hasOwnProperty.call(e, r) &&
                        (i[r] = t.call(n, e[r], r, e));
                return i;
            }
            function M(e) {
                for (
                    var n = [], t = 0, r = Object.entries(e);
                    t < r.length;
                    t++
                ) {
                    var i = r[t];
                    !(function (t, e) {
                        Array.isArray(e)
                            ? e.forEach(function (e) {
                                  n.push(
                                      encodeURIComponent(t) +
                                          "=" +
                                          encodeURIComponent(e)
                                  );
                              })
                            : n.push(
                                  encodeURIComponent(t) +
                                      "=" +
                                      encodeURIComponent(e)
                              );
                    })(i[0], i[1]);
                }
                return n.length ? "&" + n.join("&") : "";
            }
            var F =
                ((q.prototype.reset = function () {
                    (this.chain_[0] = 1732584193),
                        (this.chain_[1] = 4023233417),
                        (this.chain_[2] = 2562383102),
                        (this.chain_[3] = 271733878),
                        (this.chain_[4] = 3285377520),
                        (this.inbuf_ = 0),
                        (this.total_ = 0);
                }),
                (q.prototype.compress_ = function (e, t) {
                    t = t || 0;
                    var n = this.W_;
                    if ("string" == typeof e)
                        for (var r = 0; r < 16; r++)
                            (n[r] =
                                (e.charCodeAt(t) << 24) |
                                (e.charCodeAt(t + 1) << 16) |
                                (e.charCodeAt(t + 2) << 8) |
                                e.charCodeAt(t + 3)),
                                (t += 4);
                    else
                        for (r = 0; r < 16; r++)
                            (n[r] =
                                (e[t] << 24) |
                                (e[t + 1] << 16) |
                                (e[t + 2] << 8) |
                                e[t + 3]),
                                (t += 4);
                    for (r = 16; r < 80; r++) {
                        var i = n[r - 3] ^ n[r - 8] ^ n[r - 14] ^ n[r - 16];
                        n[r] = 4294967295 & ((i << 1) | (i >>> 31));
                    }
                    for (
                        var o,
                            s = this.chain_[0],
                            a = this.chain_[1],
                            u = this.chain_[2],
                            l = this.chain_[3],
                            h = this.chain_[4],
                            r = 0;
                        r < 80;
                        r++
                    )
                        var c =
                                r < 40
                                    ? r < 20
                                        ? ((o = l ^ (a & (u ^ l))), 1518500249)
                                        : ((o = a ^ u ^ l), 1859775393)
                                    : r < 60
                                    ? ((o = (a & u) | (l & (a | u))),
                                      2400959708)
                                    : ((o = a ^ u ^ l), 3395469782),
                            i =
                                (((s << 5) | (s >>> 27)) + o + h + c + n[r]) &
                                4294967295,
                            h = l,
                            l = u,
                            u = 4294967295 & ((a << 30) | (a >>> 2)),
                            a = s,
                            s = i;
                    (this.chain_[0] = (this.chain_[0] + s) & 4294967295),
                        (this.chain_[1] = (this.chain_[1] + a) & 4294967295),
                        (this.chain_[2] = (this.chain_[2] + u) & 4294967295),
                        (this.chain_[3] = (this.chain_[3] + l) & 4294967295),
                        (this.chain_[4] = (this.chain_[4] + h) & 4294967295);
                }),
                (q.prototype.update = function (e, t) {
                    if (null != e) {
                        for (
                            var n =
                                    (t = void 0 === t ? e.length : t) -
                                    this.blockSize,
                                r = 0,
                                i = this.buf_,
                                o = this.inbuf_;
                            r < t;

                        ) {
                            if (0 === o)
                                for (; r <= n; )
                                    this.compress_(e, r), (r += this.blockSize);
                            if ("string" == typeof e) {
                                for (; r < t; )
                                    if (
                                        ((i[o] = e.charCodeAt(r)),
                                        ++r,
                                        ++o === this.blockSize)
                                    ) {
                                        this.compress_(i), (o = 0);
                                        break;
                                    }
                            } else
                                for (; r < t; )
                                    if (
                                        ((i[o] = e[r]),
                                        ++r,
                                        ++o === this.blockSize)
                                    ) {
                                        this.compress_(i), (o = 0);
                                        break;
                                    }
                        }
                        (this.inbuf_ = o), (this.total_ += t);
                    }
                }),
                (q.prototype.digest = function () {
                    var e = [],
                        t = 8 * this.total_;
                    this.inbuf_ < 56
                        ? this.update(this.pad_, 56 - this.inbuf_)
                        : this.update(
                              this.pad_,
                              this.blockSize - (this.inbuf_ - 56)
                          );
                    for (var n = this.blockSize - 1; 56 <= n; n--)
                        (this.buf_[n] = 255 & t), (t /= 256);
                    this.compress_(this.buf_);
                    for (var r = 0, n = 0; n < 5; n++)
                        for (var i = 24; 0 <= i; i -= 8)
                            (e[r] = (this.chain_[n] >> i) & 255), ++r;
                    return e;
                }),
                q);
            function q() {
                (this.chain_ = []),
                    (this.buf_ = []),
                    (this.W_ = []),
                    (this.pad_ = []),
                    (this.inbuf_ = 0),
                    (this.total_ = 0),
                    (this.blockSize = 64),
                    (this.pad_[0] = 128);
                for (var e = 1; e < this.blockSize; ++e) this.pad_[e] = 0;
                this.reset();
            }
            function W(e, t, n, r) {
                var i;
                if (
                    (r < t
                        ? (i = "at least " + t)
                        : n < r && (i = 0 === n ? "none" : "no more than " + n),
                    i)
                )
                    throw new Error(
                        e +
                            " failed: Was called with " +
                            r +
                            (1 === r ? " argument." : " arguments.") +
                            " Expects " +
                            i +
                            "."
                    );
            }
            function Q(e, t, n) {
                var r = "";
                switch (t) {
                    case 1:
                        r = n ? "first" : "First";
                        break;
                    case 2:
                        r = n ? "second" : "Second";
                        break;
                    case 3:
                        r = n ? "third" : "Third";
                        break;
                    case 4:
                        r = n ? "fourth" : "Fourth";
                        break;
                    default:
                        throw new Error(
                            "errorPrefix called with argumentNumber > 4.  Need to update it?"
                        );
                }
                e += " failed: ";
                return (e += r + " argument ");
            }
            function j(e, t, n, r) {
                if ((!r || n) && "function" != typeof n)
                    throw new Error(Q(e, t, r) + "must be a valid function.");
            }
            function U(e, t, n, r) {
                if ((!r || n) && ("object" != typeof n || null === n))
                    throw new Error(
                        Q(e, t, r) + "must be a valid context object."
                    );
            }
            function B(e) {
                for (var t = 0, n = 0; n < e.length; n++) {
                    var r = e.charCodeAt(n);
                    r < 128
                        ? t++
                        : r < 2048
                        ? (t += 2)
                        : 55296 <= r && r <= 56319
                        ? ((t += 4), n++)
                        : (t += 3);
                }
                return t;
            }
            var H =
                ((V.prototype.setInstantiationMode = function (e) {
                    return (this.instantiationMode = e), this;
                }),
                (V.prototype.setMultipleInstances = function (e) {
                    return (this.multipleInstances = e), this;
                }),
                (V.prototype.setServiceProps = function (e) {
                    return (this.serviceProps = e), this;
                }),
                V);
            function V(e, t, n) {
                (this.name = e),
                    (this.instanceFactory = t),
                    (this.type = n),
                    (this.multipleInstances = !1),
                    (this.serviceProps = {}),
                    (this.instantiationMode = "LAZY");
            }
            var z = "[DEFAULT]",
                K =
                    ((Y.prototype.get = function (e) {
                        void 0 === e && (e = z);
                        var t = this.normalizeInstanceIdentifier(e);
                        if (!this.instancesDeferred.has(t)) {
                            var n = new f();
                            this.instancesDeferred.set(t, n);
                            try {
                                var r = this.getOrInitializeService({
                                    instanceIdentifier: t,
                                });
                                r && n.resolve(r);
                            } catch (e) {}
                        }
                        return this.instancesDeferred.get(t).promise;
                    }),
                    (Y.prototype.getImmediate = function (e) {
                        var t = l({ identifier: z, optional: !1 }, e),
                            e = t.identifier,
                            n = t.optional,
                            r = this.normalizeInstanceIdentifier(e);
                        try {
                            var i = this.getOrInitializeService({
                                instanceIdentifier: r,
                            });
                            if (i) return i;
                            if (n) return null;
                            throw Error(
                                "Service " + this.name + " is not available"
                            );
                        } catch (e) {
                            if (n) return null;
                            throw e;
                        }
                    }),
                    (Y.prototype.getComponent = function () {
                        return this.component;
                    }),
                    (Y.prototype.setComponent = function (e) {
                        var t, n;
                        if (e.name !== this.name)
                            throw Error(
                                "Mismatching Component " +
                                    e.name +
                                    " for Provider " +
                                    this.name +
                                    "."
                            );
                        if (this.component)
                            throw Error(
                                "Component for " +
                                    this.name +
                                    " has already been provided"
                            );
                        if ("EAGER" === (this.component = e).instantiationMode)
                            try {
                                this.getOrInitializeService({
                                    instanceIdentifier: z,
                                });
                            } catch (e) {}
                        try {
                            for (
                                var r = _(this.instancesDeferred.entries()),
                                    i = r.next();
                                !i.done;
                                i = r.next()
                            ) {
                                var o = y(i.value, 2),
                                    s = o[0],
                                    a = o[1],
                                    u = this.normalizeInstanceIdentifier(s);
                                try {
                                    var l = this.getOrInitializeService({
                                        instanceIdentifier: u,
                                    });
                                    a.resolve(l);
                                } catch (e) {}
                            }
                        } catch (e) {
                            t = { error: e };
                        } finally {
                            try {
                                i && !i.done && (n = r.return) && n.call(r);
                            } finally {
                                if (t) throw t.error;
                            }
                        }
                    }),
                    (Y.prototype.clearInstance = function (e) {
                        void 0 === e && (e = z),
                            this.instancesDeferred.delete(e),
                            this.instances.delete(e);
                    }),
                    (Y.prototype.delete = function () {
                        return i(this, void 0, void 0, function () {
                            var t;
                            return o(this, function (e) {
                                switch (e.label) {
                                    case 0:
                                        return (
                                            (t = Array.from(
                                                this.instances.values()
                                            )),
                                            [
                                                4,
                                                Promise.all(
                                                    s(
                                                        s(
                                                            [],
                                                            y(
                                                                t
                                                                    .filter(
                                                                        function (
                                                                            e
                                                                        ) {
                                                                            return (
                                                                                "INTERNAL" in
                                                                                e
                                                                            );
                                                                        }
                                                                    )
                                                                    .map(
                                                                        function (
                                                                            e
                                                                        ) {
                                                                            return e.INTERNAL.delete();
                                                                        }
                                                                    )
                                                            )
                                                        ),
                                                        y(
                                                            t
                                                                .filter(
                                                                    function (
                                                                        e
                                                                    ) {
                                                                        return (
                                                                            "_delete" in
                                                                            e
                                                                        );
                                                                    }
                                                                )
                                                                .map(function (
                                                                    e
                                                                ) {
                                                                    return e._delete();
                                                                })
                                                        )
                                                    )
                                                ),
                                            ]
                                        );
                                    case 1:
                                        return e.sent(), [2];
                                }
                            });
                        });
                    }),
                    (Y.prototype.isComponentSet = function () {
                        return null != this.component;
                    }),
                    (Y.prototype.isInitialized = function (e) {
                        return void 0 === e && (e = z), this.instances.has(e);
                    }),
                    (Y.prototype.initialize = function (e) {
                        var t = (e = void 0 === e ? {} : e).instanceIdentifier,
                            t = void 0 === t ? z : t,
                            e = e.options,
                            e = void 0 === e ? {} : e,
                            t = this.normalizeInstanceIdentifier(t);
                        if (this.isInitialized(t))
                            throw Error(
                                this.name +
                                    "(" +
                                    t +
                                    ") has already been initialized"
                            );
                        if (!this.isComponentSet())
                            throw Error(
                                "Component " +
                                    this.name +
                                    " has not been registered yet"
                            );
                        return this.getOrInitializeService({
                            instanceIdentifier: t,
                            options: e,
                        });
                    }),
                    (Y.prototype.getOrInitializeService = function (e) {
                        var t = e.instanceIdentifier,
                            n = e.options,
                            r = void 0 === n ? {} : n,
                            e = this.instances.get(t);
                        return (
                            !e &&
                                this.component &&
                                ((e = this.component.instanceFactory(
                                    this.container,
                                    {
                                        instanceIdentifier:
                                            (n = t) === z ? void 0 : n,
                                        options: r,
                                    }
                                )),
                                this.instances.set(t, e)),
                            e || null
                        );
                    }),
                    (Y.prototype.normalizeInstanceIdentifier = function (e) {
                        return !this.component ||
                            this.component.multipleInstances
                            ? e
                            : z;
                    }),
                    Y);
            function Y(e, t) {
                (this.name = e),
                    (this.container = t),
                    (this.component = null),
                    (this.instances = new Map()),
                    (this.instancesDeferred = new Map());
            }
            var G,
                $ =
                    ((J.prototype.addComponent = function (e) {
                        var t = this.getProvider(e.name);
                        if (t.isComponentSet())
                            throw new Error(
                                "Component " +
                                    e.name +
                                    " has already been registered with " +
                                    this.name
                            );
                        t.setComponent(e);
                    }),
                    (J.prototype.addOrOverwriteComponent = function (e) {
                        this.getProvider(e.name).isComponentSet() &&
                            this.providers.delete(e.name),
                            this.addComponent(e);
                    }),
                    (J.prototype.getProvider = function (e) {
                        if (this.providers.has(e)) return this.providers.get(e);
                        var t = new K(e, this);
                        return this.providers.set(e, t), t;
                    }),
                    (J.prototype.getProviders = function () {
                        return Array.from(this.providers.values());
                    }),
                    J);
            function J(e) {
                (this.name = e), (this.providers = new Map());
            }
            ((mt = G = G || {})[(mt.DEBUG = 0)] = "DEBUG"),
                (mt[(mt.VERBOSE = 1)] = "VERBOSE"),
                (mt[(mt.INFO = 2)] = "INFO"),
                (mt[(mt.WARN = 3)] = "WARN"),
                (mt[(mt.ERROR = 4)] = "ERROR"),
                (mt[(mt.SILENT = 5)] = "SILENT");
            function X(e, t) {
                for (var n = [], r = 2; r < arguments.length; r++)
                    n[r - 2] = arguments[r];
                if (!(t < e.logLevel)) {
                    var i = new Date().toISOString(),
                        o = te[t];
                    if (!o)
                        throw new Error(
                            "Attempted to log a message with an invalid logType (value: " +
                                t +
                                ")"
                        );
                    console[o].apply(
                        console,
                        s(["[" + i + "]  " + e.name + ":"], n)
                    );
                }
            }
            var Z = {
                    debug: G.DEBUG,
                    verbose: G.VERBOSE,
                    info: G.INFO,
                    warn: G.WARN,
                    error: G.ERROR,
                    silent: G.SILENT,
                },
                ee = G.INFO,
                te =
                    (((Ct = {})[G.DEBUG] = "log"),
                    (Ct[G.VERBOSE] = "log"),
                    (Ct[G.INFO] = "info"),
                    (Ct[G.WARN] = "warn"),
                    (Ct[G.ERROR] = "error"),
                    Ct),
                ne =
                    (Object.defineProperty(re.prototype, "logLevel", {
                        get: function () {
                            return this._logLevel;
                        },
                        set: function (e) {
                            if (!(e in G))
                                throw new TypeError(
                                    'Invalid value "' +
                                        e +
                                        '" assigned to `logLevel`'
                                );
                            this._logLevel = e;
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    (re.prototype.setLogLevel = function (e) {
                        this._logLevel = "string" == typeof e ? Z[e] : e;
                    }),
                    Object.defineProperty(re.prototype, "logHandler", {
                        get: function () {
                            return this._logHandler;
                        },
                        set: function (e) {
                            if ("function" != typeof e)
                                throw new TypeError(
                                    "Value assigned to `logHandler` must be a function"
                                );
                            this._logHandler = e;
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    Object.defineProperty(re.prototype, "userLogHandler", {
                        get: function () {
                            return this._userLogHandler;
                        },
                        set: function (e) {
                            this._userLogHandler = e;
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    (re.prototype.debug = function () {
                        for (var e = [], t = 0; t < arguments.length; t++)
                            e[t] = arguments[t];
                        this._userLogHandler &&
                            this._userLogHandler.apply(
                                this,
                                s([this, G.DEBUG], e)
                            ),
                            this._logHandler.apply(this, s([this, G.DEBUG], e));
                    }),
                    (re.prototype.log = function () {
                        for (var e = [], t = 0; t < arguments.length; t++)
                            e[t] = arguments[t];
                        this._userLogHandler &&
                            this._userLogHandler.apply(
                                this,
                                s([this, G.VERBOSE], e)
                            ),
                            this._logHandler.apply(
                                this,
                                s([this, G.VERBOSE], e)
                            );
                    }),
                    (re.prototype.info = function () {
                        for (var e = [], t = 0; t < arguments.length; t++)
                            e[t] = arguments[t];
                        this._userLogHandler &&
                            this._userLogHandler.apply(
                                this,
                                s([this, G.INFO], e)
                            ),
                            this._logHandler.apply(this, s([this, G.INFO], e));
                    }),
                    (re.prototype.warn = function () {
                        for (var e = [], t = 0; t < arguments.length; t++)
                            e[t] = arguments[t];
                        this._userLogHandler &&
                            this._userLogHandler.apply(
                                this,
                                s([this, G.WARN], e)
                            ),
                            this._logHandler.apply(this, s([this, G.WARN], e));
                    }),
                    (re.prototype.error = function () {
                        for (var e = [], t = 0; t < arguments.length; t++)
                            e[t] = arguments[t];
                        this._userLogHandler &&
                            this._userLogHandler.apply(
                                this,
                                s([this, G.ERROR], e)
                            ),
                            this._logHandler.apply(this, s([this, G.ERROR], e));
                    }),
                    re);
            function re(e) {
                (this.name = e),
                    (this._logLevel = ee),
                    (this._logHandler = X),
                    (this._userLogHandler = null);
            }
            var ie =
                ((oe.prototype.set = function (e, t) {
                    null == t
                        ? this.domStorage_.removeItem(this.prefixedName_(e))
                        : this.domStorage_.setItem(this.prefixedName_(e), x(t));
                }),
                (oe.prototype.get = function (e) {
                    e = this.domStorage_.getItem(this.prefixedName_(e));
                    return null == e ? null : R(e);
                }),
                (oe.prototype.remove = function (e) {
                    this.domStorage_.removeItem(this.prefixedName_(e));
                }),
                (oe.prototype.prefixedName_ = function (e) {
                    return this.prefix_ + e;
                }),
                (oe.prototype.toString = function () {
                    return this.domStorage_.toString();
                }),
                oe);
            function oe(e) {
                (this.domStorage_ = e), (this.prefix_ = "firebase:");
            }
            var se =
                ((ae.prototype.set = function (e, t) {
                    null == t ? delete this.cache_[e] : (this.cache_[e] = t);
                }),
                (ae.prototype.get = function (e) {
                    return D(this.cache_, e) ? this.cache_[e] : null;
                }),
                (ae.prototype.remove = function (e) {
                    delete this.cache_[e];
                }),
                ae);
            function ae() {
                (this.cache_ = {}), (this.isInMemoryStorage = !0);
            }
            function ue(e) {
                var t = (function (e) {
                    for (var t = [], n = 0, r = 0; r < e.length; r++) {
                        var i,
                            o = e.charCodeAt(r);
                        55296 <= o &&
                            o <= 56319 &&
                            ((i = o - 55296),
                            g(
                                ++r < e.length,
                                "Surrogate pair missing trail surrogate."
                            ),
                            (o =
                                65536 + (i << 10) + (e.charCodeAt(r) - 56320))),
                            o < 128
                                ? (t[n++] = o)
                                : (o < 2048
                                      ? (t[n++] = (o >> 6) | 192)
                                      : (o < 65536
                                            ? (t[n++] = (o >> 12) | 224)
                                            : ((t[n++] = (o >> 18) | 240),
                                              (t[n++] =
                                                  ((o >> 12) & 63) | 128)),
                                        (t[n++] = ((o >> 6) & 63) | 128)),
                                  (t[n++] = (63 & o) | 128));
                    }
                    return t;
                })(e);
                return (
                    (e = new F()).update(t),
                    (e = e.digest()),
                    c.encodeByteArray(e)
                );
            }
            function le(e, t) {
                g(
                    !t || !0 === e || !1 === e,
                    "Can't turn on custom loggers persistently."
                ),
                    !0 === e
                        ? ((me.logLevel = G.VERBOSE),
                          (be = me.log.bind(me)),
                          t && ge.set("logging_enabled", !0))
                        : "function" == typeof e
                        ? (be = e)
                        : ((be = null), ge.remove("logging_enabled"));
            }
            function he() {
                for (var e = [], t = 0; t < arguments.length; t++)
                    e[t] = arguments[t];
                var n =
                    "FIREBASE INTERNAL ERROR: " + Ce.apply(void 0, s([], y(e)));
                me.error(n);
            }
            function ce(e) {
                return (
                    "number" == typeof e &&
                    (e != e ||
                        e === Number.POSITIVE_INFINITY ||
                        e === Number.NEGATIVE_INFINITY)
                );
            }
            function de(e, t) {
                return e === t ? 0 : e < t ? -1 : 1;
            }
            function pe(e, t) {
                if (t && e in t) return t[e];
                throw new Error(
                    "Missing required key (" + e + ") in object: " + x(t)
                );
            }
            function fe(e, t) {
                var n = e.length;
                if (n <= t) return [e];
                for (var r = [], i = 0; i < n; i += t)
                    n < i + t
                        ? r.push(e.substring(i, n))
                        : r.push(e.substring(i, i + t));
                return r;
            }
            var _e,
                ye = function (e) {
                    try {
                        if (
                            "undefined" != typeof window &&
                            void 0 !== window[e]
                        ) {
                            var t = window[e];
                            return (
                                t.setItem("firebase:sentinel", "cache"),
                                t.removeItem("firebase:sentinel"),
                                new ie(t)
                            );
                        }
                    } catch (e) {}
                    return new se();
                },
                ve = ye("localStorage"),
                ge = ye("sessionStorage"),
                me = new ne("@firebase/database"),
                we =
                    ((_e = 1),
                    function () {
                        return _e++;
                    }),
                Ce = function () {
                    for (var e = [], t = 0; t < arguments.length; t++)
                        e[t] = arguments[t];
                    for (var n = "", r = 0; r < e.length; r++) {
                        var i = e[r];
                        Array.isArray(i) ||
                        (i &&
                            "object" == typeof i &&
                            "number" == typeof i.length)
                            ? (n += Ce.apply(null, i))
                            : (n += "object" == typeof i ? x(i) : i),
                            (n += " ");
                    }
                    return n;
                },
                be = null,
                Ee = !0,
                Se = function () {
                    for (var e, t = [], n = 0; n < arguments.length; n++)
                        t[n] = arguments[n];
                    !0 === Ee &&
                        ((Ee = !1),
                        null === be &&
                            !0 === ge.get("logging_enabled") &&
                            le(!0)),
                        be && ((e = Ce.apply(null, t)), be(e));
                },
                Te = function (n) {
                    return function () {
                        for (var e = [], t = 0; t < arguments.length; t++)
                            e[t] = arguments[t];
                        Se.apply(void 0, s([n], y(e)));
                    };
                },
                Ie = function () {
                    for (var e = [], t = 0; t < arguments.length; t++)
                        e[t] = arguments[t];
                    var n =
                        "FIREBASE FATAL ERROR: " +
                        Ce.apply(void 0, s([], y(e)));
                    throw (me.error(n), new Error(n));
                },
                Pe = function () {
                    for (var e = [], t = 0; t < arguments.length; t++)
                        e[t] = arguments[t];
                    var n =
                        "FIREBASE WARNING: " + Ce.apply(void 0, s([], y(e)));
                    me.warn(n);
                },
                Ne = "[MIN_NAME]",
                Re = "[MAX_NAME]",
                xe = function (e, t) {
                    if (e === t) return 0;
                    if (e === Ne || t === Re) return -1;
                    if (t === Ne || e === Re) return 1;
                    var n = We(e),
                        r = We(t);
                    return null !== n
                        ? null !== r
                            ? n - r == 0
                                ? e.length - t.length
                                : n - r
                            : -1
                        : null === r && e < t
                        ? -1
                        : 1;
                },
                ke = function (e) {
                    if ("object" != typeof e || null === e) return x(e);
                    var t,
                        n = [];
                    for (t in e) n.push(t);
                    n.sort();
                    for (var r = "{", i = 0; i < n.length; i++)
                        0 !== i && (r += ","),
                            (r += x(n[i])),
                            (r += ":"),
                            (r += ke(e[n[i]]));
                    return (r += "}");
                };
            function De(e, t) {
                for (var n in e) e.hasOwnProperty(n) && t(n, e[n]);
            }
            function Oe(e) {
                var t, n, r, i;
                g(!ce(e), "Invalid JSON number"),
                    0 === e
                        ? (t = 1 / e == -1 / (r = n = 0) ? 1 : 0)
                        : ((t = e < 0),
                          (r =
                              (e = Math.abs(e)) >= Math.pow(2, -1022)
                                  ? ((n =
                                        (i = Math.min(
                                            Math.floor(Math.log(e) / Math.LN2),
                                            1023
                                        )) + 1023),
                                    Math.round(
                                        e * Math.pow(2, 52 - i) -
                                            Math.pow(2, 52)
                                    ))
                                  : ((n = 0),
                                    Math.round(e / Math.pow(2, -1074)))));
                for (var o = [], s = 52; s; --s)
                    o.push(r % 2 ? 1 : 0), (r = Math.floor(r / 2));
                for (s = 11; s; --s)
                    o.push(n % 2 ? 1 : 0), (n = Math.floor(n / 2));
                o.push(t ? 1 : 0), o.reverse();
                var a = o.join(""),
                    u = "";
                for (s = 0; s < 64; s += 8) {
                    var l = parseInt(a.substr(s, 8), 2).toString(16);
                    u += l = 1 === l.length ? "0" + l : l;
                }
                return u.toLowerCase();
            }
            function Ae(e, t) {
                return (
                    "object" == typeof (t = setTimeout(e, t)) &&
                        t.unref &&
                        t.unref(),
                    t
                );
            }
            var Le = function (e, t) {
                    var n = "Unknown Error";
                    "too_big" === e
                        ? (n =
                              "The data requested exceeds the maximum size that can be accessed with a single request.")
                        : "permission_denied" === e
                        ? (n =
                              "Client doesn't have permission to access the desired data.")
                        : "unavailable" === e &&
                          (n = "The service is unavailable");
                    n = new Error(e + " at " + t.path.toString() + ": " + n);
                    return (n.code = e.toUpperCase()), n;
                },
                Me = new RegExp("^-?(0*)\\d{1,10}$"),
                Fe = -2147483648,
                qe = 2147483647,
                We = function (e) {
                    if (Me.test(e)) {
                        e = Number(e);
                        if (Fe <= e && e <= qe) return e;
                    }
                    return null;
                },
                Qe = function (e) {
                    try {
                        e();
                    } catch (t) {
                        setTimeout(function () {
                            var e = t.stack || "";
                            throw (
                                (Pe(
                                    "Exception was thrown by user callback.",
                                    e
                                ),
                                t)
                            );
                        }, Math.floor(0));
                    }
                },
                je =
                    ((Ue.prototype.getToken = function (e) {
                        return this.auth_
                            ? this.auth_.getToken(e).catch(function (e) {
                                  return e &&
                                      "auth/token-not-initialized" === e.code
                                      ? (Se(
                                            "Got auth/token-not-initialized error.  Treating as null token."
                                        ),
                                        null)
                                      : Promise.reject(e);
                              })
                            : Promise.resolve(null);
                    }),
                    (Ue.prototype.addTokenChangeListener = function (t) {
                        this.auth_
                            ? this.auth_.addAuthTokenListener(t)
                            : (setTimeout(function () {
                                  return t(null);
                              }, 0),
                              this.authProvider_.get().then(function (e) {
                                  return e.addAuthTokenListener(t);
                              }));
                    }),
                    (Ue.prototype.removeTokenChangeListener = function (t) {
                        this.authProvider_.get().then(function (e) {
                            return e.removeAuthTokenListener(t);
                        });
                    }),
                    (Ue.prototype.notifyForInvalidToken = function () {
                        var e =
                            'Provided authentication credentials for the app named "' +
                            this.app_.name +
                            '" are invalid. This usually indicates your app was not initialized correctly. ';
                        "credential" in this.app_.options
                            ? (e +=
                                  'Make sure the "credential" property provided to initializeApp() is authorized to access the specified "databaseURL" and is from the correct project.')
                            : "serviceAccount" in this.app_.options
                            ? (e +=
                                  'Make sure the "serviceAccount" property provided to initializeApp() is authorized to access the specified "databaseURL" and is from the correct project.')
                            : (e +=
                                  'Make sure the "apiKey" and "databaseURL" properties provided to initializeApp() match the values provided for your app at https://console.firebase.google.com/.'),
                            Pe(e);
                    }),
                    Ue);
            function Ue(e, t) {
                var n = this;
                (this.app_ = e),
                    (this.authProvider_ = t),
                    (this.auth_ = null),
                    (this.auth_ = t.getImmediate({ optional: !0 })),
                    this.auth_ ||
                        t.get().then(function (e) {
                            return (n.auth_ = e);
                        });
            }
            var Be =
                ((He.prototype.getToken = function (e) {
                    return Promise.resolve({
                        accessToken: He.EMULATOR_AUTH_TOKEN,
                    });
                }),
                (He.prototype.addTokenChangeListener = function (e) {
                    e(He.EMULATOR_AUTH_TOKEN);
                }),
                (He.prototype.removeTokenChangeListener = function (e) {}),
                (He.prototype.notifyForInvalidToken = function () {}),
                (He.EMULATOR_AUTH_TOKEN = "owner"),
                He);
            function He() {}
            var Ve =
                    /(console\.firebase|firebase-console-\w+\.corp|firebase\.corp)\.google\.com/,
                ze = "websocket",
                Ke = "long_polling",
                Ye =
                    ((Ge.prototype.isCacheableHost = function () {
                        return "s-" === this.internalHost.substr(0, 2);
                    }),
                    (Ge.prototype.isCustomHost = function () {
                        return (
                            "firebaseio.com" !== this._domain &&
                            "firebaseio-demo.com" !== this._domain
                        );
                    }),
                    Object.defineProperty(Ge.prototype, "host", {
                        get: function () {
                            return this._host;
                        },
                        set: function (e) {
                            e !== this.internalHost &&
                                ((this.internalHost = e),
                                this.isCacheableHost() &&
                                    ve.set(
                                        "host:" + this._host,
                                        this.internalHost
                                    ));
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    (Ge.prototype.toString = function () {
                        var e = this.toURLString();
                        return (
                            this.persistenceKey &&
                                (e += "<" + this.persistenceKey + ">"),
                            e
                        );
                    }),
                    (Ge.prototype.toURLString = function () {
                        var e = this.secure ? "https://" : "http://",
                            t = this.includeNamespaceInQueryParams
                                ? "?ns=" + this.namespace
                                : "";
                        return e + this.host + "/" + t;
                    }),
                    Ge);
            function Ge(e, t, n, r, i, o, s) {
                void 0 === i && (i = !1),
                    void 0 === o && (o = ""),
                    void 0 === s && (s = !1),
                    (this.secure = t),
                    (this.namespace = n),
                    (this.webSocketOnly = r),
                    (this.nodeAdmin = i),
                    (this.persistenceKey = o),
                    (this.includeNamespaceInQueryParams = s),
                    (this._host = e.toLowerCase()),
                    (this._domain = this._host.substr(
                        this._host.indexOf(".") + 1
                    )),
                    (this.internalHost = ve.get("host:" + e) || this._host);
            }
            function $e(e, t, n) {
                var r;
                if (
                    (g("string" == typeof t, "typeof type must == string"),
                    g("object" == typeof n, "typeof params must == object"),
                    t === ze)
                )
                    r =
                        (e.secure ? "wss://" : "ws://") +
                        e.internalHost +
                        "/.ws?";
                else {
                    if (t !== Ke)
                        throw new Error("Unknown connection type: " + t);
                    r =
                        (e.secure ? "https://" : "http://") +
                        e.internalHost +
                        "/.lp?";
                }
                ((t = e).host !== t.internalHost ||
                    t.isCustomHost() ||
                    t.includeNamespaceInQueryParams) &&
                    (n.ns = e.namespace);
                var i = [];
                return (
                    De(n, function (e, t) {
                        i.push(e + "=" + t);
                    }),
                    r + i.join("&")
                );
            }
            var Je =
                ((Xe.prototype.incrementCounter = function (e, t) {
                    void 0 === t && (t = 1),
                        D(this.counters_, e) || (this.counters_[e] = 0),
                        (this.counters_[e] += t);
                }),
                (Xe.prototype.get = function () {
                    return d(this.counters_);
                }),
                Xe);
            function Xe() {
                this.counters_ = {};
            }
            var Ze = {},
                et = {};
            function tt(e) {
                e = e.toString();
                return Ze[e] || (Ze[e] = new Je()), Ze[e];
            }
            var nt =
                ((rt.prototype.closeAfter = function (e, t) {
                    (this.closeAfterResponse = e),
                        (this.onClose = t),
                        this.closeAfterResponse < this.currentResponseNum &&
                            (this.onClose(), (this.onClose = null));
                }),
                (rt.prototype.handleResponse = function (e, t) {
                    var n = this;
                    this.pendingResponses[e] = t;
                    for (
                        var r = this;
                        this.pendingResponses[this.currentResponseNum];

                    )
                        if (
                            "break" ===
                            (function () {
                                var t =
                                    r.pendingResponses[r.currentResponseNum];
                                delete r.pendingResponses[r.currentResponseNum];
                                for (var e = 0; e < t.length; ++e)
                                    !(function (e) {
                                        t[e] &&
                                            Qe(function () {
                                                n.onMessage_(t[e]);
                                            });
                                    })(e);
                                if (
                                    r.currentResponseNum ===
                                    r.closeAfterResponse
                                )
                                    return (
                                        r.onClose &&
                                            (r.onClose(), (r.onClose = null)),
                                        "break"
                                    );
                                r.currentResponseNum++;
                            })()
                        )
                            break;
                }),
                rt);
            function rt(e) {
                (this.onMessage_ = e),
                    (this.pendingResponses = []),
                    (this.currentResponseNum = 0),
                    (this.closeAfterResponse = -1),
                    (this.onClose = null);
            }
            var it = "pLPCommand",
                ot = "pRTLPCB",
                st =
                    ((at.prototype.open = function (e, t) {
                        var n,
                            r,
                            i,
                            s = this;
                        (this.curSegmentNum = 0),
                            (this.onDisconnect_ = t),
                            (this.myPacketOrderer = new nt(e)),
                            (this.isClosed_ = !1),
                            (this.connectTimeoutTimer_ = setTimeout(
                                function () {
                                    s.log_("Timed out trying to connect."),
                                        s.onClosed_(),
                                        (s.connectTimeoutTimer_ = null);
                                },
                                Math.floor(3e4)
                            )),
                            (n = function () {
                                var e;
                                s.isClosed_ ||
                                    ((s.scriptTagHolder = new ut(
                                        function () {
                                            for (
                                                var e = [], t = 0;
                                                t < arguments.length;
                                                t++
                                            )
                                                e[t] = arguments[t];
                                            var n = y(e, 5),
                                                r = n[0],
                                                i = n[1],
                                                o = n[2];
                                            n[3], n[4];
                                            if (
                                                (s.incrementIncomingBytes_(e),
                                                s.scriptTagHolder)
                                            )
                                                if (
                                                    (s.connectTimeoutTimer_ &&
                                                        (clearTimeout(
                                                            s.connectTimeoutTimer_
                                                        ),
                                                        (s.connectTimeoutTimer_ =
                                                            null)),
                                                    (s.everConnected_ = !0),
                                                    "start" === r)
                                                )
                                                    (s.id = i),
                                                        (s.password = o);
                                                else {
                                                    if ("close" !== r)
                                                        throw new Error(
                                                            "Unrecognized command received: " +
                                                                r
                                                        );
                                                    i
                                                        ? ((s.scriptTagHolder.sendNewPolls =
                                                              !1),
                                                          s.myPacketOrderer.closeAfter(
                                                              i,
                                                              function () {
                                                                  s.onClosed_();
                                                              }
                                                          ))
                                                        : s.onClosed_();
                                                }
                                        },
                                        function () {
                                            for (
                                                var e = [], t = 0;
                                                t < arguments.length;
                                                t++
                                            )
                                                e[t] = arguments[t];
                                            var n = y(e, 2),
                                                r = n[0],
                                                n = n[1];
                                            s.incrementIncomingBytes_(e),
                                                s.myPacketOrderer.handleResponse(
                                                    r,
                                                    n
                                                );
                                        },
                                        function () {
                                            s.onClosed_();
                                        },
                                        s.urlFn
                                    )),
                                    ((e = { start: "t" }).ser = Math.floor(
                                        1e8 * Math.random()
                                    )),
                                    s.scriptTagHolder
                                        .uniqueCallbackIdentifier &&
                                        (e.cb =
                                            s.scriptTagHolder.uniqueCallbackIdentifier),
                                    (e.v = "5"),
                                    s.transportSessionId &&
                                        (e.s = s.transportSessionId),
                                    s.lastSessionId && (e.ls = s.lastSessionId),
                                    s.applicationId && (e.p = s.applicationId),
                                    "undefined" != typeof location &&
                                        location.hostname &&
                                        Ve.test(location.hostname) &&
                                        (e.r = "f"),
                                    (e = s.urlFn(e)),
                                    s.log_("Connecting via long-poll to " + e),
                                    s.scriptTagHolder.addTag(
                                        e,
                                        function () {}
                                    ));
                            }),
                            "complete" === document.readyState
                                ? n()
                                : ((r = !1),
                                  (i = function () {
                                      document.body
                                          ? r || ((r = !0), n())
                                          : setTimeout(i, Math.floor(10));
                                  }),
                                  document.addEventListener
                                      ? (document.addEventListener(
                                            "DOMContentLoaded",
                                            i,
                                            !1
                                        ),
                                        window.addEventListener("load", i, !1))
                                      : document.attachEvent &&
                                        (document.attachEvent(
                                            "onreadystatechange",
                                            function () {
                                                "complete" ===
                                                    document.readyState && i();
                                            }
                                        ),
                                        window.attachEvent("onload", i)));
                    }),
                    (at.prototype.start = function () {
                        this.scriptTagHolder.startLongPoll(
                            this.id,
                            this.password
                        ),
                            this.addDisconnectPingFrame(this.id, this.password);
                    }),
                    (at.forceAllow = function () {
                        at.forceAllow_ = !0;
                    }),
                    (at.forceDisallow = function () {
                        at.forceDisallow_ = !0;
                    }),
                    (at.isAvailable = function () {
                        return (
                            !!at.forceAllow_ ||
                            !(
                                at.forceDisallow_ ||
                                "undefined" == typeof document ||
                                null == document.createElement ||
                                ("object" == typeof window &&
                                    window.chrome &&
                                    window.chrome.extension &&
                                    !/^chrome/.test(window.location.href)) ||
                                ("object" == typeof Windows &&
                                    "object" == typeof Windows.UI)
                            )
                        );
                    }),
                    (at.prototype.markConnectionHealthy = function () {}),
                    (at.prototype.shutdown_ = function () {
                        (this.isClosed_ = !0),
                            this.scriptTagHolder &&
                                (this.scriptTagHolder.close(),
                                (this.scriptTagHolder = null)),
                            this.myDisconnFrame &&
                                (document.body.removeChild(this.myDisconnFrame),
                                (this.myDisconnFrame = null)),
                            this.connectTimeoutTimer_ &&
                                (clearTimeout(this.connectTimeoutTimer_),
                                (this.connectTimeoutTimer_ = null));
                    }),
                    (at.prototype.onClosed_ = function () {
                        this.isClosed_ ||
                            (this.log_("Longpoll is closing itself"),
                            this.shutdown_(),
                            this.onDisconnect_ &&
                                (this.onDisconnect_(this.everConnected_),
                                (this.onDisconnect_ = null)));
                    }),
                    (at.prototype.close = function () {
                        this.isClosed_ ||
                            (this.log_("Longpoll is being closed."),
                            this.shutdown_());
                    }),
                    (at.prototype.send = function (e) {
                        e = x(e);
                        (this.bytesSent += e.length),
                            this.stats_.incrementCounter(
                                "bytes_sent",
                                e.length
                            );
                        for (
                            var e = (function (e) {
                                    e = a(e);
                                    return c.encodeByteArray(e, !0);
                                })(e),
                                t = fe(e, 1840),
                                n = 0;
                            n < t.length;
                            n++
                        )
                            this.scriptTagHolder.enqueueSegment(
                                this.curSegmentNum,
                                t.length,
                                t[n]
                            ),
                                this.curSegmentNum++;
                    }),
                    (at.prototype.addDisconnectPingFrame = function (e, t) {
                        this.myDisconnFrame = document.createElement("iframe");
                        var n = { dframe: "t" };
                        (n.id = e),
                            (n.pw = t),
                            (this.myDisconnFrame.src = this.urlFn(n)),
                            (this.myDisconnFrame.style.display = "none"),
                            document.body.appendChild(this.myDisconnFrame);
                    }),
                    (at.prototype.incrementIncomingBytes_ = function (e) {
                        e = x(e).length;
                        (this.bytesReceived += e),
                            this.stats_.incrementCounter("bytes_received", e);
                    }),
                    at);
            function at(e, t, n, r, i) {
                (this.connId = e),
                    (this.repoInfo = t),
                    (this.applicationId = n),
                    (this.transportSessionId = r),
                    (this.lastSessionId = i),
                    (this.bytesSent = 0),
                    (this.bytesReceived = 0),
                    (this.everConnected_ = !1),
                    (this.log_ = Te(e)),
                    (this.stats_ = tt(t)),
                    (this.urlFn = function (e) {
                        return $e(t, Ke, e);
                    });
            }
            var ut =
                ((lt.createIFrame_ = function () {
                    var t = document.createElement("iframe");
                    if (((t.style.display = "none"), !document.body))
                        throw "Document body has not initialized. Wait to initialize Firebase until after the document is ready.";
                    document.body.appendChild(t);
                    try {
                        t.contentWindow.document ||
                            Se("No IE domain setting required");
                    } catch (e) {
                        var n = document.domain;
                        t.src =
                            "javascript:void((function(){document.open();document.domain='" +
                            n +
                            "';document.close();})())";
                    }
                    return (
                        t.contentDocument
                            ? (t.doc = t.contentDocument)
                            : t.contentWindow
                            ? (t.doc = t.contentWindow.document)
                            : t.document && (t.doc = t.document),
                        t
                    );
                }),
                (lt.prototype.close = function () {
                    var e = this;
                    (this.alive = !1),
                        this.myIFrame &&
                            ((this.myIFrame.doc.body.innerHTML = ""),
                            setTimeout(function () {
                                null !== e.myIFrame &&
                                    (document.body.removeChild(e.myIFrame),
                                    (e.myIFrame = null));
                            }, Math.floor(0)));
                    var t = this.onDisconnect;
                    t && ((this.onDisconnect = null), t());
                }),
                (lt.prototype.startLongPoll = function (e, t) {
                    for (
                        this.myID = e, this.myPW = t, this.alive = !0;
                        this.newRequest_();

                    );
                }),
                (lt.prototype.newRequest_ = function () {
                    if (
                        this.alive &&
                        this.sendNewPolls &&
                        this.outstandingRequests.size <
                            (0 < this.pendingSegs.length ? 2 : 1)
                    ) {
                        this.currentSerial++;
                        var e = {};
                        (e.id = this.myID),
                            (e.pw = this.myPW),
                            (e.ser = this.currentSerial);
                        for (
                            var e = this.urlFn(e), t = "", n = 0;
                            0 < this.pendingSegs.length;

                        ) {
                            if (
                                !(
                                    this.pendingSegs[0].d.length +
                                        30 +
                                        t.length <=
                                    1870
                                )
                            )
                                break;
                            var r = this.pendingSegs.shift(),
                                t =
                                    t +
                                    "&seg" +
                                    n +
                                    "=" +
                                    r.seg +
                                    "&ts" +
                                    n +
                                    "=" +
                                    r.ts +
                                    "&d" +
                                    n +
                                    "=" +
                                    r.d;
                            n++;
                        }
                        return (
                            (e += t),
                            this.addLongPollTag_(e, this.currentSerial),
                            !0
                        );
                    }
                    return !1;
                }),
                (lt.prototype.enqueueSegment = function (e, t, n) {
                    this.pendingSegs.push({ seg: e, ts: t, d: n }),
                        this.alive && this.newRequest_();
                }),
                (lt.prototype.addLongPollTag_ = function (e, t) {
                    var n = this;
                    this.outstandingRequests.add(t);
                    function r() {
                        n.outstandingRequests.delete(t), n.newRequest_();
                    }
                    var i = setTimeout(r, Math.floor(25e3));
                    this.addTag(e, function () {
                        clearTimeout(i), r();
                    });
                }),
                (lt.prototype.addTag = function (e, n) {
                    var r = this;
                    setTimeout(function () {
                        try {
                            if (!r.sendNewPolls) return;
                            var t = r.myIFrame.doc.createElement("script");
                            (t.type = "text/javascript"),
                                (t.async = !0),
                                (t.src = e),
                                (t.onload = t.onreadystatechange =
                                    function () {
                                        var e = t.readyState;
                                        (e &&
                                            "loaded" !== e &&
                                            "complete" !== e) ||
                                            ((t.onload = t.onreadystatechange =
                                                null),
                                            t.parentNode &&
                                                t.parentNode.removeChild(t),
                                            n());
                                    }),
                                (t.onerror = function () {
                                    Se("Long-poll script failed to load: " + e),
                                        (r.sendNewPolls = !1),
                                        r.close();
                                }),
                                r.myIFrame.doc.body.appendChild(t);
                        } catch (e) {}
                    }, Math.floor(1));
                }),
                lt);
            function lt(e, t, n, r) {
                (this.onDisconnect = n),
                    (this.urlFn = r),
                    (this.outstandingRequests = new Set()),
                    (this.pendingSegs = []),
                    (this.currentSerial = Math.floor(1e8 * Math.random())),
                    (this.sendNewPolls = !0),
                    (this.uniqueCallbackIdentifier = we()),
                    (window[it + this.uniqueCallbackIdentifier] = e),
                    (window[ot + this.uniqueCallbackIdentifier] = t),
                    (this.myIFrame = lt.createIFrame_());
                var t = "",
                    i =
                        "<html><body>" +
                        (t =
                            this.myIFrame.src &&
                            "javascript:" ===
                                this.myIFrame.src.substr(
                                    0,
                                    "javascript:".length
                                )
                                ? '<script>document.domain="' +
                                  document.domain +
                                  '";</script>'
                                : t) +
                        "</body></html>";
                try {
                    this.myIFrame.doc.open(),
                        this.myIFrame.doc.write(i),
                        this.myIFrame.doc.close();
                } catch (e) {
                    Se("frame writing exception"),
                        e.stack && Se(e.stack),
                        Se(e);
                }
            }
            var ht = "";
            function ct(e) {
                ht = e;
            }
            var dt = null;
            "undefined" != typeof MozWebSocket
                ? (dt = MozWebSocket)
                : "undefined" != typeof WebSocket && (dt = WebSocket);
            var pt =
                ((ft.connectionURL_ = function (e, t, n) {
                    var r = { v: "5" };
                    return (
                        "undefined" != typeof location &&
                            location.hostname &&
                            Ve.test(location.hostname) &&
                            (r.r = "f"),
                        t && (r.s = t),
                        n && (r.ls = n),
                        $e(e, ze, r)
                    );
                }),
                (ft.prototype.open = function (t, e) {
                    var n,
                        r = this;
                    (this.onDisconnect = e),
                        (this.onMessage = t),
                        this.log_("Websocket connecting to " + this.connURL),
                        (this.everConnected_ = !1),
                        ve.set("previous_websocket_failure", !0);
                    try {
                        C() ||
                            ((n = {
                                headers: {
                                    "X-Firebase-GMPID":
                                        this.applicationId || "",
                                },
                            }),
                            (this.mySock = new dt(this.connURL, [], n)));
                    } catch (e) {
                        this.log_("Error instantiating WebSocket.");
                        t = e.message || e.data;
                        return t && this.log_(t), void this.onClosed_();
                    }
                    (this.mySock.onopen = function () {
                        r.log_("Websocket connected."), (r.everConnected_ = !0);
                    }),
                        (this.mySock.onclose = function () {
                            r.log_("Websocket connection was disconnected."),
                                (r.mySock = null),
                                r.onClosed_();
                        }),
                        (this.mySock.onmessage = function (e) {
                            r.handleIncomingFrame(e);
                        }),
                        (this.mySock.onerror = function (e) {
                            r.log_("WebSocket error.  Closing connection.");
                            e = e.message || e.data;
                            e && r.log_(e), r.onClosed_();
                        });
                }),
                (ft.prototype.start = function () {}),
                (ft.forceDisallow = function () {
                    ft.forceDisallow_ = !0;
                }),
                (ft.isAvailable = function () {
                    var e,
                        t = !1;
                    return (
                        "undefined" != typeof navigator &&
                            navigator.userAgent &&
                            (e = navigator.userAgent.match(
                                /Android ([0-9]{0,}\.[0-9]{0,})/
                            )) &&
                            1 < e.length &&
                            parseFloat(e[1]) < 4.4 &&
                            (t = !0),
                        !t && null !== dt && !ft.forceDisallow_
                    );
                }),
                (ft.previouslyFailed = function () {
                    return (
                        ve.isInMemoryStorage ||
                        !0 === ve.get("previous_websocket_failure")
                    );
                }),
                (ft.prototype.markConnectionHealthy = function () {
                    ve.remove("previous_websocket_failure");
                }),
                (ft.prototype.appendFrame_ = function (e) {
                    this.frames.push(e),
                        this.frames.length === this.totalFrames &&
                            ((e = this.frames.join("")),
                            (this.frames = null),
                            (e = R(e)),
                            this.onMessage(e));
                }),
                (ft.prototype.handleNewFrameCount_ = function (e) {
                    (this.totalFrames = e), (this.frames = []);
                }),
                (ft.prototype.extractFrameCount_ = function (e) {
                    if (
                        (g(
                            null === this.frames,
                            "We already have a frame buffer"
                        ),
                        e.length <= 6)
                    ) {
                        var t = Number(e);
                        if (!isNaN(t))
                            return this.handleNewFrameCount_(t), null;
                    }
                    return this.handleNewFrameCount_(1), e;
                }),
                (ft.prototype.handleIncomingFrame = function (e) {
                    null !== this.mySock &&
                        ((e = e.data),
                        (this.bytesReceived += e.length),
                        this.stats_.incrementCounter(
                            "bytes_received",
                            e.length
                        ),
                        this.resetKeepAlive(),
                        null !== this.frames
                            ? this.appendFrame_(e)
                            : null !== (e = this.extractFrameCount_(e)) &&
                              this.appendFrame_(e));
                }),
                (ft.prototype.send = function (e) {
                    this.resetKeepAlive();
                    e = x(e);
                    (this.bytesSent += e.length),
                        this.stats_.incrementCounter("bytes_sent", e.length);
                    var t = fe(e, 16384);
                    1 < t.length && this.sendString_(String(t.length));
                    for (var n = 0; n < t.length; n++) this.sendString_(t[n]);
                }),
                (ft.prototype.shutdown_ = function () {
                    (this.isClosed_ = !0),
                        this.keepaliveTimer &&
                            (clearInterval(this.keepaliveTimer),
                            (this.keepaliveTimer = null)),
                        this.mySock &&
                            (this.mySock.close(), (this.mySock = null));
                }),
                (ft.prototype.onClosed_ = function () {
                    this.isClosed_ ||
                        (this.log_("WebSocket is closing itself"),
                        this.shutdown_(),
                        this.onDisconnect &&
                            (this.onDisconnect(this.everConnected_),
                            (this.onDisconnect = null)));
                }),
                (ft.prototype.close = function () {
                    this.isClosed_ ||
                        (this.log_("WebSocket is being closed"),
                        this.shutdown_());
                }),
                (ft.prototype.resetKeepAlive = function () {
                    var e = this;
                    clearInterval(this.keepaliveTimer),
                        (this.keepaliveTimer = setInterval(function () {
                            e.mySock && e.sendString_("0"), e.resetKeepAlive();
                        }, Math.floor(45e3)));
                }),
                (ft.prototype.sendString_ = function (e) {
                    try {
                        this.mySock.send(e);
                    } catch (e) {
                        this.log_(
                            "Exception thrown from WebSocket.send():",
                            e.message || e.data,
                            "Closing connection."
                        ),
                            setTimeout(this.onClosed_.bind(this), 0);
                    }
                }),
                (ft.responsesRequiredToBeHealthy = 2),
                (ft.healthyTimeout = 3e4),
                ft);
            function ft(e, t, n, r, i) {
                (this.connId = e),
                    (this.applicationId = n),
                    (this.keepaliveTimer = null),
                    (this.frames = null),
                    (this.totalFrames = 0),
                    (this.bytesSent = 0),
                    (this.bytesReceived = 0),
                    (this.log_ = Te(this.connId)),
                    (this.stats_ = tt(t)),
                    (this.connURL = ft.connectionURL_(t, r, i)),
                    (this.nodeAdmin = t.nodeAdmin);
            }
            var _t =
                (Object.defineProperty(yt, "ALL_TRANSPORTS", {
                    get: function () {
                        return [st, pt];
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                (yt.prototype.initTransports_ = function (e) {
                    var t,
                        n,
                        r = pt && pt.isAvailable(),
                        i = r && !pt.previouslyFailed();
                    if (
                        (e.webSocketOnly &&
                            (r ||
                                Pe(
                                    "wss:// URL used, but browser isn't known to support websockets.  Trying anyway."
                                ),
                            (i = !0)),
                        i)
                    )
                        this.transports_ = [pt];
                    else {
                        var o = (this.transports_ = []);
                        try {
                            for (
                                var s = _(yt.ALL_TRANSPORTS), a = s.next();
                                !a.done;
                                a = s.next()
                            ) {
                                var u = a.value;
                                u && u.isAvailable() && o.push(u);
                            }
                        } catch (e) {
                            t = { error: e };
                        } finally {
                            try {
                                a && !a.done && (n = s.return) && n.call(s);
                            } finally {
                                if (t) throw t.error;
                            }
                        }
                    }
                }),
                (yt.prototype.initialTransport = function () {
                    if (0 < this.transports_.length) return this.transports_[0];
                    throw new Error("No transports available");
                }),
                (yt.prototype.upgradeTransport = function () {
                    return 1 < this.transports_.length
                        ? this.transports_[1]
                        : null;
                }),
                yt);
            function yt(e) {
                this.initTransports_(e);
            }
            var vt =
                ((gt.prototype.start_ = function () {
                    var e = this,
                        t = this.transportManager_.initialTransport();
                    (this.conn_ = new t(
                        this.nextTransportId_(),
                        this.repoInfo_,
                        this.applicationId_,
                        void 0,
                        this.lastSessionId
                    )),
                        (this.primaryResponsesRequired_ =
                            t.responsesRequiredToBeHealthy || 0);
                    var n = this.connReceiver_(this.conn_),
                        r = this.disconnReceiver_(this.conn_);
                    (this.tx_ = this.conn_),
                        (this.rx_ = this.conn_),
                        (this.secondaryConn_ = null),
                        (this.isHealthy_ = !1),
                        setTimeout(function () {
                            e.conn_ && e.conn_.open(n, r);
                        }, Math.floor(0));
                    t = t.healthyTimeout || 0;
                    0 < t &&
                        (this.healthyTimeout_ = Ae(function () {
                            (e.healthyTimeout_ = null),
                                e.isHealthy_ ||
                                    (e.conn_ && 102400 < e.conn_.bytesReceived
                                        ? (e.log_(
                                              "Connection exceeded healthy timeout but has received " +
                                                  e.conn_.bytesReceived +
                                                  " bytes.  Marking connection healthy."
                                          ),
                                          (e.isHealthy_ = !0),
                                          e.conn_.markConnectionHealthy())
                                        : e.conn_ && 10240 < e.conn_.bytesSent
                                        ? e.log_(
                                              "Connection exceeded healthy timeout but has sent " +
                                                  e.conn_.bytesSent +
                                                  " bytes.  Leaving connection alive."
                                          )
                                        : (e.log_(
                                              "Closing unhealthy connection after timeout."
                                          ),
                                          e.close()));
                        }, Math.floor(t)));
                }),
                (gt.prototype.nextTransportId_ = function () {
                    return "c:" + this.id + ":" + this.connectionCount++;
                }),
                (gt.prototype.disconnReceiver_ = function (t) {
                    var n = this;
                    return function (e) {
                        t === n.conn_
                            ? n.onConnectionLost_(e)
                            : t === n.secondaryConn_
                            ? (n.log_("Secondary connection lost."),
                              n.onSecondaryConnectionLost_())
                            : n.log_("closing an old connection");
                    };
                }),
                (gt.prototype.connReceiver_ = function (t) {
                    var n = this;
                    return function (e) {
                        2 !== n.state_ &&
                            (t === n.rx_
                                ? n.onPrimaryMessageReceived_(e)
                                : t === n.secondaryConn_
                                ? n.onSecondaryMessageReceived_(e)
                                : n.log_("message on old connection"));
                    };
                }),
                (gt.prototype.sendRequest = function (e) {
                    e = { t: "d", d: e };
                    this.sendData_(e);
                }),
                (gt.prototype.tryCleanupConnection = function () {
                    this.tx_ === this.secondaryConn_ &&
                        this.rx_ === this.secondaryConn_ &&
                        (this.log_(
                            "cleaning up and promoting a connection: " +
                                this.secondaryConn_.connId
                        ),
                        (this.conn_ = this.secondaryConn_),
                        (this.secondaryConn_ = null));
                }),
                (gt.prototype.onSecondaryControl_ = function (e) {
                    "t" in e &&
                        ("a" === (e = e.t)
                            ? this.upgradeIfSecondaryHealthy_()
                            : "r" === e
                            ? (this.log_(
                                  "Got a reset on secondary, closing it"
                              ),
                              this.secondaryConn_.close(),
                              (this.tx_ !== this.secondaryConn_ &&
                                  this.rx_ !== this.secondaryConn_) ||
                                  this.close())
                            : "o" === e &&
                              (this.log_("got pong on secondary."),
                              this.secondaryResponsesRequired_--,
                              this.upgradeIfSecondaryHealthy_()));
                }),
                (gt.prototype.onSecondaryMessageReceived_ = function (e) {
                    var t = pe("t", e),
                        e = pe("d", e);
                    if ("c" === t) this.onSecondaryControl_(e);
                    else {
                        if ("d" !== t)
                            throw new Error("Unknown protocol layer: " + t);
                        this.pendingDataMessages.push(e);
                    }
                }),
                (gt.prototype.upgradeIfSecondaryHealthy_ = function () {
                    this.secondaryResponsesRequired_ <= 0
                        ? (this.log_("Secondary connection is healthy."),
                          (this.isHealthy_ = !0),
                          this.secondaryConn_.markConnectionHealthy(),
                          this.proceedWithUpgrade_())
                        : (this.log_("sending ping on secondary."),
                          this.secondaryConn_.send({
                              t: "c",
                              d: { t: "p", d: {} },
                          }));
                }),
                (gt.prototype.proceedWithUpgrade_ = function () {
                    this.secondaryConn_.start(),
                        this.log_("sending client ack on secondary"),
                        this.secondaryConn_.send({
                            t: "c",
                            d: { t: "a", d: {} },
                        }),
                        this.log_("Ending transmission on primary"),
                        this.conn_.send({ t: "c", d: { t: "n", d: {} } }),
                        (this.tx_ = this.secondaryConn_),
                        this.tryCleanupConnection();
                }),
                (gt.prototype.onPrimaryMessageReceived_ = function (e) {
                    var t = pe("t", e),
                        e = pe("d", e);
                    "c" === t
                        ? this.onControl_(e)
                        : "d" === t && this.onDataMessage_(e);
                }),
                (gt.prototype.onDataMessage_ = function (e) {
                    this.onPrimaryResponse_(), this.onMessage_(e);
                }),
                (gt.prototype.onPrimaryResponse_ = function () {
                    this.isHealthy_ ||
                        (this.primaryResponsesRequired_--,
                        this.primaryResponsesRequired_ <= 0 &&
                            (this.log_("Primary connection is healthy."),
                            (this.isHealthy_ = !0),
                            this.conn_.markConnectionHealthy()));
                }),
                (gt.prototype.onControl_ = function (e) {
                    var t = pe("t", e);
                    if ("d" in e) {
                        e = e.d;
                        if ("h" === t) this.onHandshake_(e);
                        else if ("n" === t) {
                            this.log_("recvd end transmission on primary"),
                                (this.rx_ = this.secondaryConn_);
                            for (
                                var n = 0;
                                n < this.pendingDataMessages.length;
                                ++n
                            )
                                this.onDataMessage_(
                                    this.pendingDataMessages[n]
                                );
                            (this.pendingDataMessages = []),
                                this.tryCleanupConnection();
                        } else
                            "s" === t
                                ? this.onConnectionShutdown_(e)
                                : "r" === t
                                ? this.onReset_(e)
                                : "e" === t
                                ? he("Server Error: " + e)
                                : "o" === t
                                ? (this.log_("got pong on primary."),
                                  this.onPrimaryResponse_(),
                                  this.sendPingOnPrimaryIfNecessary_())
                                : he("Unknown control packet command: " + t);
                    }
                }),
                (gt.prototype.onHandshake_ = function (e) {
                    var t = e.ts,
                        n = e.v,
                        r = e.h;
                    (this.sessionId = e.s),
                        (this.repoInfo_.host = r),
                        0 === this.state_ &&
                            (this.conn_.start(),
                            this.onConnectionEstablished_(this.conn_, t),
                            "5" !== n &&
                                Pe("Protocol version mismatch detected"),
                            this.tryStartUpgrade_());
                }),
                (gt.prototype.tryStartUpgrade_ = function () {
                    var e = this.transportManager_.upgradeTransport();
                    e && this.startUpgrade_(e);
                }),
                (gt.prototype.startUpgrade_ = function (e) {
                    var t = this;
                    (this.secondaryConn_ = new e(
                        this.nextTransportId_(),
                        this.repoInfo_,
                        this.applicationId_,
                        this.sessionId
                    )),
                        (this.secondaryResponsesRequired_ =
                            e.responsesRequiredToBeHealthy || 0);
                    var n = this.connReceiver_(this.secondaryConn_),
                        e = this.disconnReceiver_(this.secondaryConn_);
                    this.secondaryConn_.open(n, e),
                        Ae(function () {
                            t.secondaryConn_ &&
                                (t.log_("Timed out trying to upgrade."),
                                t.secondaryConn_.close());
                        }, Math.floor(6e4));
                }),
                (gt.prototype.onReset_ = function (e) {
                    this.log_("Reset packet received.  New host: " + e),
                        (this.repoInfo_.host = e),
                        1 === this.state_
                            ? this.close()
                            : (this.closeConnections_(), this.start_());
                }),
                (gt.prototype.onConnectionEstablished_ = function (e, t) {
                    var n = this;
                    this.log_("Realtime connection established."),
                        (this.conn_ = e),
                        (this.state_ = 1),
                        this.onReady_ &&
                            (this.onReady_(t, this.sessionId),
                            (this.onReady_ = null)),
                        0 === this.primaryResponsesRequired_
                            ? (this.log_("Primary connection is healthy."),
                              (this.isHealthy_ = !0))
                            : Ae(function () {
                                  n.sendPingOnPrimaryIfNecessary_();
                              }, Math.floor(5e3));
                }),
                (gt.prototype.sendPingOnPrimaryIfNecessary_ = function () {
                    this.isHealthy_ ||
                        1 !== this.state_ ||
                        (this.log_("sending ping on primary."),
                        this.sendData_({ t: "c", d: { t: "p", d: {} } }));
                }),
                (gt.prototype.onSecondaryConnectionLost_ = function () {
                    var e = this.secondaryConn_;
                    (this.secondaryConn_ = null),
                        (this.tx_ !== e && this.rx_ !== e) || this.close();
                }),
                (gt.prototype.onConnectionLost_ = function (e) {
                    (this.conn_ = null),
                        e || 0 !== this.state_
                            ? 1 === this.state_ &&
                              this.log_("Realtime connection lost.")
                            : (this.log_("Realtime connection failed."),
                              this.repoInfo_.isCacheableHost() &&
                                  (ve.remove("host:" + this.repoInfo_.host),
                                  (this.repoInfo_.internalHost =
                                      this.repoInfo_.host))),
                        this.close();
                }),
                (gt.prototype.onConnectionShutdown_ = function (e) {
                    this.log_(
                        "Connection shutdown command received. Shutting down..."
                    ),
                        this.onKill_ &&
                            (this.onKill_(e), (this.onKill_ = null)),
                        (this.onDisconnect_ = null),
                        this.close();
                }),
                (gt.prototype.sendData_ = function (e) {
                    if (1 !== this.state_) throw "Connection is not connected";
                    this.tx_.send(e);
                }),
                (gt.prototype.close = function () {
                    2 !== this.state_ &&
                        (this.log_("Closing realtime connection."),
                        (this.state_ = 2),
                        this.closeConnections_(),
                        this.onDisconnect_ &&
                            (this.onDisconnect_(),
                            (this.onDisconnect_ = null)));
                }),
                (gt.prototype.closeConnections_ = function () {
                    this.log_("Shutting down all connections"),
                        this.conn_ && (this.conn_.close(), (this.conn_ = null)),
                        this.secondaryConn_ &&
                            (this.secondaryConn_.close(),
                            (this.secondaryConn_ = null)),
                        this.healthyTimeout_ &&
                            (clearTimeout(this.healthyTimeout_),
                            (this.healthyTimeout_ = null));
                }),
                gt);
            function gt(e, t, n, r, i, o, s, a) {
                (this.id = e),
                    (this.repoInfo_ = t),
                    (this.applicationId_ = n),
                    (this.onMessage_ = r),
                    (this.onReady_ = i),
                    (this.onDisconnect_ = o),
                    (this.onKill_ = s),
                    (this.lastSessionId = a),
                    (this.connectionCount = 0),
                    (this.pendingDataMessages = []),
                    (this.state_ = 0),
                    (this.log_ = Te("c:" + this.id + ":")),
                    (this.transportManager_ = new _t(t)),
                    this.log_("Connection created"),
                    this.start_();
            }
            var mt =
                ((wt.prototype.put = function (e, t, n, r) {}),
                (wt.prototype.merge = function (e, t, n, r) {}),
                (wt.prototype.refreshAuthToken = function (e) {}),
                (wt.prototype.onDisconnectPut = function (e, t, n) {}),
                (wt.prototype.onDisconnectMerge = function (e, t, n) {}),
                (wt.prototype.onDisconnectCancel = function (e, t) {}),
                (wt.prototype.reportStats = function (e) {}),
                wt);
            function wt() {}
            var Ct =
                ((bt.prototype.trigger = function (e) {
                    for (var t = [], n = 1; n < arguments.length; n++)
                        t[n - 1] = arguments[n];
                    if (Array.isArray(this.listeners_[e]))
                        for (
                            var r = s([], y(this.listeners_[e])), i = 0;
                            i < r.length;
                            i++
                        )
                            r[i].callback.apply(r[i].context, t);
                }),
                (bt.prototype.on = function (e, t, n) {
                    this.validateEventType_(e),
                        (this.listeners_[e] = this.listeners_[e] || []),
                        this.listeners_[e].push({ callback: t, context: n });
                    e = this.getInitialEvent(e);
                    e && t.apply(n, e);
                }),
                (bt.prototype.off = function (e, t, n) {
                    this.validateEventType_(e);
                    for (
                        var r = this.listeners_[e] || [], i = 0;
                        i < r.length;
                        i++
                    )
                        if (r[i].callback === t && (!n || n === r[i].context))
                            return void r.splice(i, 1);
                }),
                (bt.prototype.validateEventType_ = function (t) {
                    g(
                        this.allowedEvents_.find(function (e) {
                            return e === t;
                        }),
                        "Unknown event: " + t
                    );
                }),
                bt);
            function bt(e) {
                (this.allowedEvents_ = e),
                    (this.listeners_ = {}),
                    g(
                        Array.isArray(e) && 0 < e.length,
                        "Requires a non-empty array"
                    );
            }
            var Et,
                St =
                    (n(Tt, (Et = Ct)),
                    (Tt.getInstance = function () {
                        return new Tt();
                    }),
                    (Tt.prototype.getInitialEvent = function (e) {
                        return (
                            g("online" === e, "Unknown event type: " + e),
                            [this.online_]
                        );
                    }),
                    (Tt.prototype.currentlyOnline = function () {
                        return this.online_;
                    }),
                    Tt);
            function Tt() {
                var e = Et.call(this, ["online"]) || this;
                return (
                    (e.online_ = !0),
                    "undefined" == typeof window ||
                        void 0 === window.addEventListener ||
                        w() ||
                        (window.addEventListener(
                            "online",
                            function () {
                                e.online_ ||
                                    ((e.online_ = !0), e.trigger("online", !0));
                            },
                            !1
                        ),
                        window.addEventListener(
                            "offline",
                            function () {
                                e.online_ &&
                                    ((e.online_ = !1), e.trigger("online", !1));
                            },
                            !1
                        )),
                    e
                );
            }
            var It = 32,
                Pt = 768,
                Nt =
                    ((Rt.prototype.toString = function () {
                        for (
                            var e = "", t = this.pieceNum_;
                            t < this.pieces_.length;
                            t++
                        )
                            "" !== this.pieces_[t] &&
                                (e += "/" + this.pieces_[t]);
                        return e || "/";
                    }),
                    Rt);
            function Rt(e, t) {
                if (void 0 === t) {
                    this.pieces_ = e.split("/");
                    for (var n = 0, r = 0; r < this.pieces_.length; r++)
                        0 < this.pieces_[r].length &&
                            ((this.pieces_[n] = this.pieces_[r]), n++);
                    (this.pieces_.length = n), (this.pieceNum_ = 0);
                } else (this.pieces_ = e), (this.pieceNum_ = t);
            }
            function xt() {
                return new Nt("");
            }
            function kt(e) {
                return e.pieceNum_ >= e.pieces_.length
                    ? null
                    : e.pieces_[e.pieceNum_];
            }
            function Dt(e) {
                return e.pieces_.length - e.pieceNum_;
            }
            function Ot(e) {
                var t = e.pieceNum_;
                return t < e.pieces_.length && t++, new Nt(e.pieces_, t);
            }
            function At(e) {
                return e.pieceNum_ < e.pieces_.length
                    ? e.pieces_[e.pieces_.length - 1]
                    : null;
            }
            function Lt(e, t) {
                return (
                    void 0 === t && (t = 0), e.pieces_.slice(e.pieceNum_ + t)
                );
            }
            function Mt(e) {
                if (e.pieceNum_ >= e.pieces_.length) return null;
                for (var t = [], n = e.pieceNum_; n < e.pieces_.length - 1; n++)
                    t.push(e.pieces_[n]);
                return new Nt(t, 0);
            }
            function Ft(e, t) {
                for (var n = [], r = e.pieceNum_; r < e.pieces_.length; r++)
                    n.push(e.pieces_[r]);
                if (t instanceof Nt)
                    for (r = t.pieceNum_; r < t.pieces_.length; r++)
                        n.push(t.pieces_[r]);
                else
                    for (var i = t.split("/"), r = 0; r < i.length; r++)
                        0 < i[r].length && n.push(i[r]);
                return new Nt(n, 0);
            }
            function qt(e) {
                return e.pieceNum_ >= e.pieces_.length;
            }
            function Wt(e, t) {
                var n = kt(e),
                    r = kt(t);
                if (null === n) return t;
                if (n === r) return Wt(Ot(e), Ot(t));
                throw new Error(
                    "INTERNAL ERROR: innerPath (" +
                        t +
                        ") is not within outerPath (" +
                        e +
                        ")"
                );
            }
            function Qt(e, t) {
                for (
                    var n = Lt(e, 0), r = Lt(t, 0), i = 0;
                    i < n.length && i < r.length;
                    i++
                ) {
                    var o = xe(n[i], r[i]);
                    if (0 !== o) return o;
                }
                return n.length === r.length ? 0 : n.length < r.length ? -1 : 1;
            }
            function jt(e, t) {
                if (Dt(e) !== Dt(t)) return !1;
                for (
                    var n = e.pieceNum_, r = t.pieceNum_;
                    n <= e.pieces_.length;
                    n++, r++
                )
                    if (e.pieces_[n] !== t.pieces_[r]) return !1;
                return !0;
            }
            function Ut(e, t) {
                var n = e.pieceNum_,
                    r = t.pieceNum_;
                if (Dt(e) > Dt(t)) return !1;
                for (; n < e.pieces_.length; ) {
                    if (e.pieces_[n] !== t.pieces_[r]) return !1;
                    ++n, ++r;
                }
                return !0;
            }
            var Bt = function (e, t) {
                (this.errorPrefix_ = t),
                    (this.parts_ = Lt(e, 0)),
                    (this.byteLength_ = Math.max(1, this.parts_.length));
                for (var n = 0; n < this.parts_.length; n++)
                    this.byteLength_ += B(this.parts_[n]);
                Ht(this);
            };
            function Ht(e) {
                if (e.byteLength_ > Pt)
                    throw new Error(
                        e.errorPrefix_ +
                            "has a key path longer than " +
                            Pt +
                            " bytes (" +
                            e.byteLength_ +
                            ")."
                    );
                if (e.parts_.length > It)
                    throw new Error(
                        e.errorPrefix_ +
                            "path specified exceeds the maximum depth that can be written (" +
                            It +
                            ") or object contains a cycle " +
                            Vt(e)
                    );
            }
            function Vt(e) {
                return 0 === e.parts_.length
                    ? ""
                    : "in property '" + e.parts_.join(".") + "'";
            }
            var zt,
                Kt =
                    (n(Yt, (zt = Ct)),
                    (Yt.getInstance = function () {
                        return new Yt();
                    }),
                    (Yt.prototype.getInitialEvent = function (e) {
                        return (
                            g("visible" === e, "Unknown event type: " + e),
                            [this.visible_]
                        );
                    }),
                    Yt);
            function Yt() {
                var t,
                    e,
                    n = zt.call(this, ["visible"]) || this;
                return (
                    "undefined" != typeof document &&
                        void 0 !== document.addEventListener &&
                        (void 0 !== document.hidden
                            ? ((e = "visibilitychange"), (t = "hidden"))
                            : void 0 !== document.mozHidden
                            ? ((e = "mozvisibilitychange"), (t = "mozHidden"))
                            : void 0 !== document.msHidden
                            ? ((e = "msvisibilitychange"), (t = "msHidden"))
                            : void 0 !== document.webkitHidden &&
                              ((e = "webkitvisibilitychange"),
                              (t = "webkitHidden"))),
                    (n.visible_ = !0),
                    e &&
                        document.addEventListener(
                            e,
                            function () {
                                var e = !document[t];
                                e !== n.visible_ &&
                                    ((n.visible_ = e), n.trigger("visible", e));
                            },
                            !1
                        ),
                    n
                );
            }
            var Gt,
                $t = 1e3,
                Jt = 3e5,
                Xt =
                    (n(Zt, (Gt = mt)),
                    (Zt.prototype.sendRequest = function (e, t, n) {
                        var r = ++this.requestNumber_,
                            t = { r: r, a: e, b: t };
                        this.log_(x(t)),
                            g(
                                this.connected_,
                                "sendRequest call when we're not connected not allowed."
                            ),
                            this.realtime_.sendRequest(t),
                            n && (this.requestCBHash_[r] = n);
                    }),
                    (Zt.prototype.get = function (e) {
                        var n = this,
                            r = new f(),
                            i = { p: e.path.toString(), q: e.queryObject() },
                            t = {
                                action: "g",
                                request: i,
                                onComplete: function (e) {
                                    var t = e.d;
                                    "ok" === e.s
                                        ? (n.onDataUpdate_(i.p, t, !1, null),
                                          r.resolve(t))
                                        : r.reject(t);
                                },
                            };
                        this.outstandingGets_.push(t),
                            this.outstandingGetCount_++;
                        var o = this.outstandingGets_.length - 1;
                        return (
                            this.connected_ ||
                                setTimeout(function () {
                                    var e = n.outstandingGets_[o];
                                    void 0 !== e &&
                                        t === e &&
                                        (delete n.outstandingGets_[o],
                                        n.outstandingGetCount_--,
                                        0 === n.outstandingGetCount_ &&
                                            (n.outstandingGets_ = []),
                                        n.log_(
                                            "get " +
                                                o +
                                                " timed out on connection"
                                        ),
                                        r.reject(
                                            new Error("Client is offline.")
                                        ));
                                }, 3e3),
                            this.connected_ && this.sendGet_(o),
                            r.promise
                        );
                    }),
                    (Zt.prototype.listen = function (e, t, n, r) {
                        var i = e.queryIdentifier(),
                            o = e.path.toString();
                        this.log_("Listen called for " + o + " " + i),
                            this.listens.has(o) ||
                                this.listens.set(o, new Map()),
                            g(
                                e.getQueryParams().isDefault() ||
                                    !e.getQueryParams().loadsAllData(),
                                "listen() called for non-default but complete query"
                            ),
                            g(
                                !this.listens.get(o).has(i),
                                "listen() called twice for same path/queryId."
                            );
                        n = { onComplete: r, hashFn: t, query: e, tag: n };
                        this.listens.get(o).set(i, n),
                            this.connected_ && this.sendListen_(n);
                    }),
                    (Zt.prototype.sendGet_ = function (t) {
                        var n = this,
                            r = this.outstandingGets_[t];
                        this.sendRequest("g", r.request, function (e) {
                            delete n.outstandingGets_[t],
                                n.outstandingGetCount_--,
                                0 === n.outstandingGetCount_ &&
                                    (n.outstandingGets_ = []),
                                r.onComplete && r.onComplete(e);
                        });
                    }),
                    (Zt.prototype.sendListen_ = function (r) {
                        var i = this,
                            o = r.query,
                            s = o.path.toString(),
                            a = o.queryIdentifier();
                        this.log_("Listen on " + s + " for " + a);
                        var e = { p: s };
                        r.tag && ((e.q = o.queryObject()), (e.t = r.tag)),
                            (e.h = r.hashFn()),
                            this.sendRequest("q", e, function (e) {
                                var t = e.d,
                                    n = e.s;
                                Zt.warnOnListenWarnings_(t, o),
                                    (i.listens.get(s) &&
                                        i.listens.get(s).get(a)) === r &&
                                        (i.log_("listen response", e),
                                        "ok" !== n && i.removeListen_(s, a),
                                        r.onComplete && r.onComplete(n, t));
                            });
                    }),
                    (Zt.warnOnListenWarnings_ = function (e, t) {
                        e &&
                            "object" == typeof e &&
                            D(e, "w") &&
                            ((e = O(e, "w")),
                            Array.isArray(e) &&
                                ~e.indexOf("no_index") &&
                                ((e =
                                    '".indexOn": "' +
                                    t.getQueryParams().getIndex().toString() +
                                    '"'),
                                (t = t.path.toString()),
                                Pe(
                                    "Using an unspecified index. Your data will be downloaded and filtered on the client. Consider adding " +
                                        e +
                                        " at " +
                                        t +
                                        " to your security rules for better performance."
                                )));
                    }),
                    (Zt.prototype.refreshAuthToken = function (e) {
                        (this.authToken_ = e),
                            this.log_("Auth token refreshed"),
                            this.authToken_
                                ? this.tryAuth()
                                : this.connected_ &&
                                  this.sendRequest(
                                      "unauth",
                                      {},
                                      function () {}
                                  ),
                            this.reduceReconnectDelayIfAdminCredential_(e);
                    }),
                    (Zt.prototype.reduceReconnectDelayIfAdminCredential_ =
                        function (e) {
                            ((e && 40 === e.length) ||
                                (function (e) {
                                    e = k(e).claims;
                                    return (
                                        "object" == typeof e && !0 === e.admin
                                    );
                                })(e)) &&
                                (this.log_(
                                    "Admin auth credential detected.  Reducing max reconnect time."
                                ),
                                (this.maxReconnectDelay_ = 3e4));
                        }),
                    (Zt.prototype.tryAuth = function () {
                        var n,
                            e,
                            t,
                            r = this;
                        this.connected_ &&
                            this.authToken_ &&
                            ((e = (function (e) {
                                e = k(e).claims;
                                return (
                                    !!e &&
                                    "object" == typeof e &&
                                    e.hasOwnProperty("iat")
                                );
                            })((n = this.authToken_))
                                ? "auth"
                                : "gauth"),
                            (t = { cred: n }),
                            null === this.authOverride_
                                ? (t.noauth = !0)
                                : "object" == typeof this.authOverride_ &&
                                  (t.authvar = this.authOverride_),
                            this.sendRequest(e, t, function (e) {
                                var t = e.s,
                                    e = e.d || "error";
                                r.authToken_ === n &&
                                    ("ok" === t
                                        ? (r.invalidAuthTokenCount_ = 0)
                                        : r.onAuthRevoked_(t, e));
                            }));
                    }),
                    (Zt.prototype.unlisten = function (e, t) {
                        var n = e.path.toString(),
                            r = e.queryIdentifier();
                        this.log_("Unlisten called for " + n + " " + r),
                            g(
                                e.getQueryParams().isDefault() ||
                                    !e.getQueryParams().loadsAllData(),
                                "unlisten() called for non-default but complete query"
                            ),
                            this.removeListen_(n, r) &&
                                this.connected_ &&
                                this.sendUnlisten_(n, r, e.queryObject(), t);
                    }),
                    (Zt.prototype.sendUnlisten_ = function (e, t, n, r) {
                        this.log_("Unlisten on " + e + " for " + t);
                        e = { p: e };
                        r && ((e.q = n), (e.t = r)), this.sendRequest("n", e);
                    }),
                    (Zt.prototype.onDisconnectPut = function (e, t, n) {
                        this.connected_
                            ? this.sendOnDisconnect_("o", e, t, n)
                            : this.onDisconnectRequestQueue_.push({
                                  pathString: e,
                                  action: "o",
                                  data: t,
                                  onComplete: n,
                              });
                    }),
                    (Zt.prototype.onDisconnectMerge = function (e, t, n) {
                        this.connected_
                            ? this.sendOnDisconnect_("om", e, t, n)
                            : this.onDisconnectRequestQueue_.push({
                                  pathString: e,
                                  action: "om",
                                  data: t,
                                  onComplete: n,
                              });
                    }),
                    (Zt.prototype.onDisconnectCancel = function (e, t) {
                        this.connected_
                            ? this.sendOnDisconnect_("oc", e, null, t)
                            : this.onDisconnectRequestQueue_.push({
                                  pathString: e,
                                  action: "oc",
                                  data: null,
                                  onComplete: t,
                              });
                    }),
                    (Zt.prototype.sendOnDisconnect_ = function (e, t, n, r) {
                        n = { p: t, d: n };
                        this.log_("onDisconnect " + e, n),
                            this.sendRequest(e, n, function (e) {
                                r &&
                                    setTimeout(function () {
                                        r(e.s, e.d);
                                    }, Math.floor(0));
                            });
                    }),
                    (Zt.prototype.put = function (e, t, n, r) {
                        this.putInternal("p", e, t, n, r);
                    }),
                    (Zt.prototype.merge = function (e, t, n, r) {
                        this.putInternal("m", e, t, n, r);
                    }),
                    (Zt.prototype.putInternal = function (e, t, n, r, i) {
                        n = { p: t, d: n };
                        void 0 !== i && (n.h = i),
                            this.outstandingPuts_.push({
                                action: e,
                                request: n,
                                onComplete: r,
                            }),
                            this.outstandingPutCount_++;
                        r = this.outstandingPuts_.length - 1;
                        this.connected_
                            ? this.sendPut_(r)
                            : this.log_("Buffering put: " + t);
                    }),
                    (Zt.prototype.sendPut_ = function (t) {
                        var n = this,
                            r = this.outstandingPuts_[t].action,
                            e = this.outstandingPuts_[t].request,
                            i = this.outstandingPuts_[t].onComplete;
                        (this.outstandingPuts_[t].queued = this.connected_),
                            this.sendRequest(r, e, function (e) {
                                n.log_(r + " response", e),
                                    delete n.outstandingPuts_[t],
                                    n.outstandingPutCount_--,
                                    0 === n.outstandingPutCount_ &&
                                        (n.outstandingPuts_ = []),
                                    i && i(e.s, e.d);
                            });
                    }),
                    (Zt.prototype.reportStats = function (e) {
                        var t = this;
                        this.connected_ &&
                            ((e = { c: e }),
                            this.log_("reportStats", e),
                            this.sendRequest("s", e, function (e) {
                                "ok" !== e.s &&
                                    ((e = e.d),
                                    t.log_(
                                        "reportStats",
                                        "Error sending stats: " + e
                                    ));
                            }));
                    }),
                    (Zt.prototype.onDataMessage_ = function (e) {
                        if ("r" in e) {
                            this.log_("from server: " + x(e));
                            var t = e.r,
                                n = this.requestCBHash_[t];
                            n && (delete this.requestCBHash_[t], n(e.b));
                        } else {
                            if ("error" in e)
                                throw (
                                    "A server-side error has occurred: " +
                                    e.error
                                );
                            "a" in e && this.onDataPush_(e.a, e.b);
                        }
                    }),
                    (Zt.prototype.onDataPush_ = function (e, t) {
                        this.log_("handleServerMessage", e, t),
                            "d" === e
                                ? this.onDataUpdate_(t.p, t.d, !1, t.t)
                                : "m" === e
                                ? this.onDataUpdate_(t.p, t.d, !0, t.t)
                                : "c" === e
                                ? this.onListenRevoked_(t.p, t.q)
                                : "ac" === e
                                ? this.onAuthRevoked_(t.s, t.d)
                                : "sd" === e
                                ? this.onSecurityDebugPacket_(t)
                                : he(
                                      "Unrecognized action received from server: " +
                                          x(e) +
                                          "\nAre you using the latest client?"
                                  );
                    }),
                    (Zt.prototype.onReady_ = function (e, t) {
                        this.log_("connection ready"),
                            (this.connected_ = !0),
                            (this.lastConnectionEstablishedTime_ =
                                new Date().getTime()),
                            this.handleTimestamp_(e),
                            (this.lastSessionId = t),
                            this.firstConnection_ && this.sendConnectStats_(),
                            this.restoreState_(),
                            (this.firstConnection_ = !1),
                            this.onConnectStatus_(!0);
                    }),
                    (Zt.prototype.scheduleConnect_ = function (e) {
                        var t = this;
                        g(
                            !this.realtime_,
                            "Scheduling a connect when we're already connected/ing?"
                        ),
                            this.establishConnectionTimer_ &&
                                clearTimeout(this.establishConnectionTimer_),
                            (this.establishConnectionTimer_ = setTimeout(
                                function () {
                                    (t.establishConnectionTimer_ = null),
                                        t.establishConnection_();
                                },
                                Math.floor(e)
                            ));
                    }),
                    (Zt.prototype.onVisible_ = function (e) {
                        e &&
                            !this.visible_ &&
                            this.reconnectDelay_ === this.maxReconnectDelay_ &&
                            (this.log_(
                                "Window became visible.  Reducing delay."
                            ),
                            (this.reconnectDelay_ = $t),
                            this.realtime_ || this.scheduleConnect_(0)),
                            (this.visible_ = e);
                    }),
                    (Zt.prototype.onOnline_ = function (e) {
                        e
                            ? (this.log_("Browser went online."),
                              (this.reconnectDelay_ = $t),
                              this.realtime_ || this.scheduleConnect_(0))
                            : (this.log_(
                                  "Browser went offline.  Killing connection."
                              ),
                              this.realtime_ && this.realtime_.close());
                    }),
                    (Zt.prototype.onRealtimeDisconnect_ = function () {
                        var e;
                        this.log_("data client disconnected"),
                            (this.connected_ = !1),
                            (this.realtime_ = null),
                            this.cancelSentTransactions_(),
                            (this.requestCBHash_ = {}),
                            this.shouldReconnect_() &&
                                (this.visible_
                                    ? this.lastConnectionEstablishedTime_ &&
                                      (3e4 <
                                          new Date().getTime() -
                                              this
                                                  .lastConnectionEstablishedTime_ &&
                                          (this.reconnectDelay_ = $t),
                                      (this.lastConnectionEstablishedTime_ =
                                          null))
                                    : (this.log_(
                                          "Window isn't visible.  Delaying reconnect."
                                      ),
                                      (this.reconnectDelay_ =
                                          this.maxReconnectDelay_),
                                      (this.lastConnectionAttemptTime_ =
                                          new Date().getTime())),
                                (e =
                                    new Date().getTime() -
                                    this.lastConnectionAttemptTime_),
                                (e = Math.max(0, this.reconnectDelay_ - e)),
                                (e = Math.random() * e),
                                this.log_("Trying to reconnect in " + e + "ms"),
                                this.scheduleConnect_(e),
                                (this.reconnectDelay_ = Math.min(
                                    this.maxReconnectDelay_,
                                    1.3 * this.reconnectDelay_
                                ))),
                            this.onConnectStatus_(!1);
                    }),
                    (Zt.prototype.establishConnection_ = function () {
                        var t,
                            n,
                            r,
                            i,
                            o,
                            s,
                            a,
                            u,
                            l,
                            e,
                            h = this;
                        this.shouldReconnect_() &&
                            (this.log_("Making a connection attempt"),
                            (this.lastConnectionAttemptTime_ =
                                new Date().getTime()),
                            (this.lastConnectionEstablishedTime_ = null),
                            (t = this.onDataMessage_.bind(this)),
                            (n = this.onReady_.bind(this)),
                            (r = this.onRealtimeDisconnect_.bind(this)),
                            (i = this.id + ":" + Zt.nextConnectionId_++),
                            (s = (o = this).lastSessionId),
                            (a = !1),
                            (u = null),
                            (l = function () {
                                u ? u.close() : ((a = !0), r());
                            }),
                            (this.realtime_ = {
                                close: l,
                                sendRequest: function (e) {
                                    g(
                                        u,
                                        "sendRequest call when we're not connected not allowed."
                                    ),
                                        u.sendRequest(e);
                                },
                            }),
                            (e = this.forceTokenRefresh_),
                            (this.forceTokenRefresh_ = !1),
                            this.authTokenProvider_
                                .getToken(e)
                                .then(function (e) {
                                    a
                                        ? Se(
                                              "getToken() completed but was canceled"
                                          )
                                        : (Se(
                                              "getToken() completed. Creating connection."
                                          ),
                                          (o.authToken_ = e && e.accessToken),
                                          (u = new vt(
                                              i,
                                              o.repoInfo_,
                                              o.applicationId_,
                                              t,
                                              n,
                                              r,
                                              function (e) {
                                                  Pe(
                                                      e +
                                                          " (" +
                                                          o.repoInfo_.toString() +
                                                          ")"
                                                  ),
                                                      o.interrupt(
                                                          "server_kill"
                                                      );
                                              },
                                              s
                                          )));
                                })
                                .then(null, function (e) {
                                    o.log_("Failed to get token: " + e),
                                        a ||
                                            (h.repoInfo_.nodeAdmin && Pe(e),
                                            l());
                                }));
                    }),
                    (Zt.prototype.interrupt = function (e) {
                        Se("Interrupting connection for reason: " + e),
                            (this.interruptReasons_[e] = !0),
                            this.realtime_
                                ? this.realtime_.close()
                                : (this.establishConnectionTimer_ &&
                                      (clearTimeout(
                                          this.establishConnectionTimer_
                                      ),
                                      (this.establishConnectionTimer_ = null)),
                                  this.connected_ &&
                                      this.onRealtimeDisconnect_());
                    }),
                    (Zt.prototype.resume = function (e) {
                        Se("Resuming connection for reason: " + e),
                            delete this.interruptReasons_[e],
                            A(this.interruptReasons_) &&
                                ((this.reconnectDelay_ = $t),
                                this.realtime_ || this.scheduleConnect_(0));
                    }),
                    (Zt.prototype.handleTimestamp_ = function (e) {
                        e -= new Date().getTime();
                        this.onServerInfoUpdate_({ serverTimeOffset: e });
                    }),
                    (Zt.prototype.cancelSentTransactions_ = function () {
                        for (var e = 0; e < this.outstandingPuts_.length; e++) {
                            var t = this.outstandingPuts_[e];
                            t &&
                                "h" in t.request &&
                                t.queued &&
                                (t.onComplete && t.onComplete("disconnect"),
                                delete this.outstandingPuts_[e],
                                this.outstandingPutCount_--);
                        }
                        0 === this.outstandingPutCount_ &&
                            (this.outstandingPuts_ = []);
                    }),
                    (Zt.prototype.onListenRevoked_ = function (e, t) {
                        (t = t
                            ? t
                                  .map(function (e) {
                                      return ke(e);
                                  })
                                  .join("$")
                            : "default"),
                            (t = this.removeListen_(e, t));
                        t && t.onComplete && t.onComplete("permission_denied");
                    }),
                    (Zt.prototype.removeListen_ = function (e, t) {
                        var n,
                            r = new Nt(e).toString();
                        return (
                            this.listens.has(r)
                                ? ((n = (e = this.listens.get(r)).get(t)),
                                  e.delete(t),
                                  0 === e.size && this.listens.delete(r))
                                : (n = void 0),
                            n
                        );
                    }),
                    (Zt.prototype.onAuthRevoked_ = function (e, t) {
                        Se("Auth token revoked: " + e + "/" + t),
                            (this.authToken_ = null),
                            (this.forceTokenRefresh_ = !0),
                            this.realtime_.close(),
                            ("invalid_token" !== e &&
                                "permission_denied" !== e) ||
                                (this.invalidAuthTokenCount_++,
                                3 <= this.invalidAuthTokenCount_ &&
                                    ((this.reconnectDelay_ = 3e4),
                                    this.authTokenProvider_.notifyForInvalidToken()));
                    }),
                    (Zt.prototype.onSecurityDebugPacket_ = function (e) {
                        this.securityDebugCallback_
                            ? this.securityDebugCallback_(e)
                            : "msg" in e &&
                              console.log(
                                  "FIREBASE: " +
                                      e.msg.replace("\n", "\nFIREBASE: ")
                              );
                    }),
                    (Zt.prototype.restoreState_ = function () {
                        var t, e, n, r;
                        this.tryAuth();
                        try {
                            for (
                                var i = _(this.listens.values()), o = i.next();
                                !o.done;
                                o = i.next()
                            ) {
                                var s = o.value;
                                try {
                                    for (
                                        var a = ((n = void 0), _(s.values())),
                                            u = a.next();
                                        !u.done;
                                        u = a.next()
                                    ) {
                                        var l = u.value;
                                        this.sendListen_(l);
                                    }
                                } catch (e) {
                                    n = { error: e };
                                } finally {
                                    try {
                                        u &&
                                            !u.done &&
                                            (r = a.return) &&
                                            r.call(a);
                                    } finally {
                                        if (n) throw n.error;
                                    }
                                }
                            }
                        } catch (e) {
                            t = { error: e };
                        } finally {
                            try {
                                o && !o.done && (e = i.return) && e.call(i);
                            } finally {
                                if (t) throw t.error;
                            }
                        }
                        for (var h = 0; h < this.outstandingPuts_.length; h++)
                            this.outstandingPuts_[h] && this.sendPut_(h);
                        for (; this.onDisconnectRequestQueue_.length; ) {
                            var c = this.onDisconnectRequestQueue_.shift();
                            this.sendOnDisconnect_(
                                c.action,
                                c.pathString,
                                c.data,
                                c.onComplete
                            );
                        }
                        for (h = 0; h < this.outstandingGets_.length; h++)
                            this.outstandingGets_[h] && this.sendGet_(h);
                    }),
                    (Zt.prototype.sendConnectStats_ = function () {
                        var e = {};
                        (e["sdk.js." + ht.replace(/\./g, "-")] = 1),
                            w()
                                ? (e["framework.cordova"] = 1)
                                : "object" == typeof navigator &&
                                  "ReactNative" === navigator.product &&
                                  (e["framework.reactnative"] = 1),
                            this.reportStats(e);
                    }),
                    (Zt.prototype.shouldReconnect_ = function () {
                        var e = St.getInstance().currentlyOnline();
                        return A(this.interruptReasons_) && e;
                    }),
                    (Zt.nextPersistentConnectionId_ = 0),
                    (Zt.nextConnectionId_ = 0),
                    Zt);
            function Zt(e, t, n, r, i, o, s) {
                var a = Gt.call(this) || this;
                if (
                    ((a.repoInfo_ = e),
                    (a.applicationId_ = t),
                    (a.onDataUpdate_ = n),
                    (a.onConnectStatus_ = r),
                    (a.onServerInfoUpdate_ = i),
                    (a.authTokenProvider_ = o),
                    (a.authOverride_ = s),
                    (a.id = Zt.nextPersistentConnectionId_++),
                    (a.log_ = Te("p:" + a.id + ":")),
                    (a.interruptReasons_ = {}),
                    (a.listens = new Map()),
                    (a.outstandingPuts_ = []),
                    (a.outstandingGets_ = []),
                    (a.outstandingPutCount_ = 0),
                    (a.outstandingGetCount_ = 0),
                    (a.onDisconnectRequestQueue_ = []),
                    (a.connected_ = !1),
                    (a.reconnectDelay_ = $t),
                    (a.maxReconnectDelay_ = Jt),
                    (a.securityDebugCallback_ = null),
                    (a.lastSessionId = null),
                    (a.establishConnectionTimer_ = null),
                    (a.visible_ = !1),
                    (a.requestCBHash_ = {}),
                    (a.requestNumber_ = 0),
                    (a.realtime_ = null),
                    (a.authToken_ = null),
                    (a.forceTokenRefresh_ = !1),
                    (a.invalidAuthTokenCount_ = 0),
                    (a.firstConnection_ = !0),
                    (a.lastConnectionAttemptTime_ = null),
                    (a.lastConnectionEstablishedTime_ = null),
                    s && !C())
                )
                    throw new Error(
                        "Auth override specified in options, but not supported on non Node.js platforms"
                    );
                return (
                    a.scheduleConnect_(0),
                    Kt.getInstance().on("visible", a.onVisible_, a),
                    -1 === e.host.indexOf("fblocal") &&
                        St.getInstance().on("online", a.onOnline_, a),
                    a
                );
            }
            var en =
                ((tn.Wrap = function (e, t) {
                    return new tn(e, t);
                }),
                tn);
            function tn(e, t) {
                (this.name = e), (this.node = t);
            }
            var nn,
                ye =
                    ((rn.prototype.getCompare = function () {
                        return this.compare.bind(this);
                    }),
                    (rn.prototype.indexedValueChanged = function (e, t) {
                        (e = new en(Ne, e)), (t = new en(Ne, t));
                        return 0 !== this.compare(e, t);
                    }),
                    (rn.prototype.minPost = function () {
                        return en.MIN;
                    }),
                    rn);
            function rn() {}
            var on,
                ne =
                    (n(sn, (on = ye)),
                    Object.defineProperty(sn, "__EMPTY_NODE", {
                        get: function () {
                            return nn;
                        },
                        set: function (e) {
                            nn = e;
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    (sn.prototype.compare = function (e, t) {
                        return xe(e.name, t.name);
                    }),
                    (sn.prototype.isDefinedOn = function (e) {
                        throw m(
                            "KeyIndex.isDefinedOn not expected to be called."
                        );
                    }),
                    (sn.prototype.indexedValueChanged = function (e, t) {
                        return !1;
                    }),
                    (sn.prototype.minPost = function () {
                        return en.MIN;
                    }),
                    (sn.prototype.maxPost = function () {
                        return new en(Re, nn);
                    }),
                    (sn.prototype.makePost = function (e, t) {
                        return (
                            g(
                                "string" == typeof e,
                                "KeyIndex indexValue must always be a string."
                            ),
                            new en(e, nn)
                        );
                    }),
                    (sn.prototype.toString = function () {
                        return ".key";
                    }),
                    sn);
            function sn() {
                return (null !== on && on.apply(this, arguments)) || this;
            }
            var an = new ne(),
                un =
                    ((ln.prototype.getNext = function () {
                        if (0 === this.nodeStack_.length) return null;
                        var e = this.nodeStack_.pop(),
                            t = this.resultGenerator_
                                ? this.resultGenerator_(e.key, e.value)
                                : { key: e.key, value: e.value };
                        if (this.isReverse_)
                            for (e = e.left; !e.isEmpty(); )
                                this.nodeStack_.push(e), (e = e.right);
                        else
                            for (e = e.right; !e.isEmpty(); )
                                this.nodeStack_.push(e), (e = e.left);
                        return t;
                    }),
                    (ln.prototype.hasNext = function () {
                        return 0 < this.nodeStack_.length;
                    }),
                    (ln.prototype.peek = function () {
                        if (0 === this.nodeStack_.length) return null;
                        var e = this.nodeStack_[this.nodeStack_.length - 1];
                        return this.resultGenerator_
                            ? this.resultGenerator_(e.key, e.value)
                            : { key: e.key, value: e.value };
                    }),
                    ln);
            function ln(e, t, n, r, i) {
                void 0 === i && (i = null),
                    (this.isReverse_ = r),
                    (this.resultGenerator_ = i),
                    (this.nodeStack_ = []);
                for (var o = 1; !e.isEmpty(); )
                    if (((o = t ? n(e.key, t) : 1), r && (o *= -1), o < 0))
                        e = this.isReverse_ ? e.left : e.right;
                    else {
                        if (0 === o) {
                            this.nodeStack_.push(e);
                            break;
                        }
                        this.nodeStack_.push(e),
                            (e = this.isReverse_ ? e.right : e.left);
                    }
            }
            var hn =
                ((cn.prototype.copy = function (e, t, n, r, i) {
                    return new cn(
                        null != e ? e : this.key,
                        null != t ? t : this.value,
                        null != n ? n : this.color,
                        null != r ? r : this.left,
                        null != i ? i : this.right
                    );
                }),
                (cn.prototype.count = function () {
                    return this.left.count() + 1 + this.right.count();
                }),
                (cn.prototype.isEmpty = function () {
                    return !1;
                }),
                (cn.prototype.inorderTraversal = function (e) {
                    return (
                        this.left.inorderTraversal(e) ||
                        !!e(this.key, this.value) ||
                        this.right.inorderTraversal(e)
                    );
                }),
                (cn.prototype.reverseTraversal = function (e) {
                    return (
                        this.right.reverseTraversal(e) ||
                        e(this.key, this.value) ||
                        this.left.reverseTraversal(e)
                    );
                }),
                (cn.prototype.min_ = function () {
                    return this.left.isEmpty() ? this : this.left.min_();
                }),
                (cn.prototype.minKey = function () {
                    return this.min_().key;
                }),
                (cn.prototype.maxKey = function () {
                    return this.right.isEmpty()
                        ? this.key
                        : this.right.maxKey();
                }),
                (cn.prototype.insert = function (e, t, n) {
                    var r = this,
                        i = n(e, r.key);
                    return (r =
                        i < 0
                            ? r.copy(
                                  null,
                                  null,
                                  null,
                                  r.left.insert(e, t, n),
                                  null
                              )
                            : 0 === i
                            ? r.copy(null, t, null, null, null)
                            : r.copy(
                                  null,
                                  null,
                                  null,
                                  null,
                                  r.right.insert(e, t, n)
                              )).fixUp_();
                }),
                (cn.prototype.removeMin_ = function () {
                    if (this.left.isEmpty()) return fn.EMPTY_NODE;
                    var e = this;
                    return (e = (e =
                        !e.left.isRed_() && !e.left.left.isRed_()
                            ? e.moveRedLeft_()
                            : e).copy(
                        null,
                        null,
                        null,
                        e.left.removeMin_(),
                        null
                    )).fixUp_();
                }),
                (cn.prototype.remove = function (e, t) {
                    var n,
                        r = this;
                    if (t(e, r.key) < 0)
                        r = (r = !(
                            r.left.isEmpty() ||
                            r.left.isRed_() ||
                            r.left.left.isRed_()
                        )
                            ? r.moveRedLeft_()
                            : r).copy(
                            null,
                            null,
                            null,
                            r.left.remove(e, t),
                            null
                        );
                    else {
                        if (
                            0 ===
                            t(
                                e,
                                (r = !(
                                    (r = r.left.isRed_()
                                        ? r.rotateRight_()
                                        : r).right.isEmpty() ||
                                    r.right.isRed_() ||
                                    r.right.left.isRed_()
                                )
                                    ? r.moveRedRight_()
                                    : r).key
                            )
                        ) {
                            if (r.right.isEmpty()) return fn.EMPTY_NODE;
                            (n = r.right.min_()),
                                (r = r.copy(
                                    n.key,
                                    n.value,
                                    null,
                                    null,
                                    r.right.removeMin_()
                                ));
                        }
                        r = r.copy(
                            null,
                            null,
                            null,
                            null,
                            r.right.remove(e, t)
                        );
                    }
                    return r.fixUp_();
                }),
                (cn.prototype.isRed_ = function () {
                    return this.color;
                }),
                (cn.prototype.fixUp_ = function () {
                    var e = this;
                    return (e =
                        (e =
                            (e =
                                e.right.isRed_() && !e.left.isRed_()
                                    ? e.rotateLeft_()
                                    : e).left.isRed_() && e.left.left.isRed_()
                                ? e.rotateRight_()
                                : e).left.isRed_() && e.right.isRed_()
                            ? e.colorFlip_()
                            : e);
                }),
                (cn.prototype.moveRedLeft_ = function () {
                    var e = this.colorFlip_();
                    return (e = e.right.left.isRed_()
                        ? (e = (e = e.copy(
                              null,
                              null,
                              null,
                              null,
                              e.right.rotateRight_()
                          )).rotateLeft_()).colorFlip_()
                        : e);
                }),
                (cn.prototype.moveRedRight_ = function () {
                    var e = this.colorFlip_();
                    return (e = e.left.left.isRed_()
                        ? (e = e.rotateRight_()).colorFlip_()
                        : e);
                }),
                (cn.prototype.rotateLeft_ = function () {
                    var e = this.copy(
                        null,
                        null,
                        cn.RED,
                        null,
                        this.right.left
                    );
                    return this.right.copy(null, null, this.color, e, null);
                }),
                (cn.prototype.rotateRight_ = function () {
                    var e = this.copy(
                        null,
                        null,
                        cn.RED,
                        this.left.right,
                        null
                    );
                    return this.left.copy(null, null, this.color, null, e);
                }),
                (cn.prototype.colorFlip_ = function () {
                    var e = this.left.copy(
                            null,
                            null,
                            !this.left.color,
                            null,
                            null
                        ),
                        t = this.right.copy(
                            null,
                            null,
                            !this.right.color,
                            null,
                            null
                        );
                    return this.copy(null, null, !this.color, e, t);
                }),
                (cn.prototype.checkMaxDepth_ = function () {
                    var e = this.check_();
                    return Math.pow(2, e) <= this.count() + 1;
                }),
                (cn.prototype.check_ = function () {
                    if (this.isRed_() && this.left.isRed_())
                        throw new Error(
                            "Red node has red child(" +
                                this.key +
                                "," +
                                this.value +
                                ")"
                        );
                    if (this.right.isRed_())
                        throw new Error(
                            "Right child of (" +
                                this.key +
                                "," +
                                this.value +
                                ") is red"
                        );
                    var e = this.left.check_();
                    if (e !== this.right.check_())
                        throw new Error("Black depths differ");
                    return e + (this.isRed_() ? 0 : 1);
                }),
                (cn.RED = !0),
                (cn.BLACK = !1),
                cn);
            function cn(e, t, n, r, i) {
                (this.key = e),
                    (this.value = t),
                    (this.color = null != n ? n : cn.RED),
                    (this.left = null != r ? r : fn.EMPTY_NODE),
                    (this.right = null != i ? i : fn.EMPTY_NODE);
            }
            (dn.prototype.copy = function (e, t, n, r, i) {
                return this;
            }),
                (dn.prototype.insert = function (e, t, n) {
                    return new hn(e, t, null);
                }),
                (dn.prototype.remove = function (e, t) {
                    return this;
                }),
                (dn.prototype.count = function () {
                    return 0;
                }),
                (dn.prototype.isEmpty = function () {
                    return !0;
                }),
                (dn.prototype.inorderTraversal = function (e) {
                    return !1;
                }),
                (dn.prototype.reverseTraversal = function (e) {
                    return !1;
                }),
                (dn.prototype.minKey = function () {
                    return null;
                }),
                (dn.prototype.maxKey = function () {
                    return null;
                }),
                (dn.prototype.check_ = function () {
                    return 0;
                }),
                (dn.prototype.isRed_ = function () {
                    return !1;
                }),
                (Ct = dn);
            function dn() {}
            var pn,
                fn =
                    ((_n.prototype.insert = function (e, t) {
                        return new _n(
                            this.comparator_,
                            this.root_
                                .insert(e, t, this.comparator_)
                                .copy(null, null, hn.BLACK, null, null)
                        );
                    }),
                    (_n.prototype.remove = function (e) {
                        return new _n(
                            this.comparator_,
                            this.root_
                                .remove(e, this.comparator_)
                                .copy(null, null, hn.BLACK, null, null)
                        );
                    }),
                    (_n.prototype.get = function (e) {
                        for (var t, n = this.root_; !n.isEmpty(); ) {
                            if (0 === (t = this.comparator_(e, n.key)))
                                return n.value;
                            t < 0 ? (n = n.left) : 0 < t && (n = n.right);
                        }
                        return null;
                    }),
                    (_n.prototype.getPredecessorKey = function (e) {
                        for (var t, n = this.root_, r = null; !n.isEmpty(); ) {
                            if (0 === (t = this.comparator_(e, n.key))) {
                                if (n.left.isEmpty()) return r ? r.key : null;
                                for (n = n.left; !n.right.isEmpty(); )
                                    n = n.right;
                                return n.key;
                            }
                            t < 0 ? (n = n.left) : 0 < t && (n = (r = n).right);
                        }
                        throw new Error(
                            "Attempted to find predecessor key for a nonexistent key.  What gives?"
                        );
                    }),
                    (_n.prototype.isEmpty = function () {
                        return this.root_.isEmpty();
                    }),
                    (_n.prototype.count = function () {
                        return this.root_.count();
                    }),
                    (_n.prototype.minKey = function () {
                        return this.root_.minKey();
                    }),
                    (_n.prototype.maxKey = function () {
                        return this.root_.maxKey();
                    }),
                    (_n.prototype.inorderTraversal = function (e) {
                        return this.root_.inorderTraversal(e);
                    }),
                    (_n.prototype.reverseTraversal = function (e) {
                        return this.root_.reverseTraversal(e);
                    }),
                    (_n.prototype.getIterator = function (e) {
                        return new un(
                            this.root_,
                            null,
                            this.comparator_,
                            !1,
                            e
                        );
                    }),
                    (_n.prototype.getIteratorFrom = function (e, t) {
                        return new un(this.root_, e, this.comparator_, !1, t);
                    }),
                    (_n.prototype.getReverseIteratorFrom = function (e, t) {
                        return new un(this.root_, e, this.comparator_, !0, t);
                    }),
                    (_n.prototype.getReverseIterator = function (e) {
                        return new un(
                            this.root_,
                            null,
                            this.comparator_,
                            !0,
                            e
                        );
                    }),
                    (_n.EMPTY_NODE = new Ct()),
                    _n);
            function _n(e, t) {
                void 0 === t && (t = _n.EMPTY_NODE),
                    (this.comparator_ = e),
                    (this.root_ = t);
            }
            function yn(e, t) {
                return xe(e.name, t.name);
            }
            function vn(e, t) {
                return xe(e, t);
            }
            function gn(e) {
                return "number" == typeof e ? "number:" + Oe(e) : "string:" + e;
            }
            var mn,
                wn,
                Cn,
                bn,
                En = function (e) {
                    var t;
                    e.isLeafNode()
                        ? ((t = e.val()),
                          g(
                              "string" == typeof t ||
                                  "number" == typeof t ||
                                  ("object" == typeof t && D(t, ".sv")),
                              "Priority must be a string or number."
                          ))
                        : g(
                              e === pn || e.isEmpty(),
                              "priority of unexpected type."
                          ),
                        g(
                            e === pn || e.getPriority().isEmpty(),
                            "Priority nodes can't have a priority of their own."
                        );
                },
                Sn =
                    (Object.defineProperty(Tn, "__childrenNodeConstructor", {
                        get: function () {
                            return mn;
                        },
                        set: function (e) {
                            mn = e;
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    (Tn.prototype.isLeafNode = function () {
                        return !0;
                    }),
                    (Tn.prototype.getPriority = function () {
                        return this.priorityNode_;
                    }),
                    (Tn.prototype.updatePriority = function (e) {
                        return new Tn(this.value_, e);
                    }),
                    (Tn.prototype.getImmediateChild = function (e) {
                        return ".priority" === e
                            ? this.priorityNode_
                            : Tn.__childrenNodeConstructor.EMPTY_NODE;
                    }),
                    (Tn.prototype.getChild = function (e) {
                        return qt(e)
                            ? this
                            : ".priority" === kt(e)
                            ? this.priorityNode_
                            : Tn.__childrenNodeConstructor.EMPTY_NODE;
                    }),
                    (Tn.prototype.hasChild = function () {
                        return !1;
                    }),
                    (Tn.prototype.getPredecessorChildName = function (e, t) {
                        return null;
                    }),
                    (Tn.prototype.updateImmediateChild = function (e, t) {
                        return ".priority" === e
                            ? this.updatePriority(t)
                            : t.isEmpty() && ".priority" !== e
                            ? this
                            : Tn.__childrenNodeConstructor.EMPTY_NODE.updateImmediateChild(
                                  e,
                                  t
                              ).updatePriority(this.priorityNode_);
                    }),
                    (Tn.prototype.updateChild = function (e, t) {
                        var n = kt(e);
                        return null === n
                            ? t
                            : t.isEmpty() && ".priority" !== n
                            ? this
                            : (g(
                                  ".priority" !== n || 1 === Dt(e),
                                  ".priority must be the last token in a path"
                              ),
                              this.updateImmediateChild(
                                  n,
                                  Tn.__childrenNodeConstructor.EMPTY_NODE.updateChild(
                                      Ot(e),
                                      t
                                  )
                              ));
                    }),
                    (Tn.prototype.isEmpty = function () {
                        return !1;
                    }),
                    (Tn.prototype.numChildren = function () {
                        return 0;
                    }),
                    (Tn.prototype.forEachChild = function (e, t) {
                        return !1;
                    }),
                    (Tn.prototype.val = function (e) {
                        return e && !this.getPriority().isEmpty()
                            ? {
                                  ".value": this.getValue(),
                                  ".priority": this.getPriority().val(),
                              }
                            : this.getValue();
                    }),
                    (Tn.prototype.hash = function () {
                        var e, t;
                        return (
                            null === this.lazyHash_ &&
                                ((e = ""),
                                this.priorityNode_.isEmpty() ||
                                    (e +=
                                        "priority:" +
                                        gn(this.priorityNode_.val()) +
                                        ":"),
                                (e += (t = typeof this.value_) + ":"),
                                (e +=
                                    "number" == t
                                        ? Oe(this.value_)
                                        : this.value_),
                                (this.lazyHash_ = ue(e))),
                            this.lazyHash_
                        );
                    }),
                    (Tn.prototype.getValue = function () {
                        return this.value_;
                    }),
                    (Tn.prototype.compareTo = function (e) {
                        return e === Tn.__childrenNodeConstructor.EMPTY_NODE
                            ? 1
                            : e instanceof Tn.__childrenNodeConstructor
                            ? -1
                            : (g(e.isLeafNode(), "Unknown node type"),
                              this.compareToLeafNode_(e));
                    }),
                    (Tn.prototype.compareToLeafNode_ = function (e) {
                        var t = typeof e.value_,
                            n = typeof this.value_,
                            r = Tn.VALUE_TYPE_ORDER.indexOf(t),
                            i = Tn.VALUE_TYPE_ORDER.indexOf(n);
                        return (
                            g(0 <= r, "Unknown leaf type: " + t),
                            g(0 <= i, "Unknown leaf type: " + n),
                            r === i
                                ? "object" == n
                                    ? 0
                                    : this.value_ < e.value_
                                    ? -1
                                    : this.value_ === e.value_
                                    ? 0
                                    : 1
                                : i - r
                        );
                    }),
                    (Tn.prototype.withIndex = function () {
                        return this;
                    }),
                    (Tn.prototype.isIndexed = function () {
                        return !0;
                    }),
                    (Tn.prototype.equals = function (e) {
                        return (
                            e === this ||
                            (!!e.isLeafNode() &&
                                this.value_ === e.value_ &&
                                this.priorityNode_.equals(e.priorityNode_))
                        );
                    }),
                    (Tn.VALUE_TYPE_ORDER = [
                        "object",
                        "boolean",
                        "number",
                        "string",
                    ]),
                    Tn);
            function Tn(e, t) {
                void 0 === t && (t = Tn.__childrenNodeConstructor.EMPTY_NODE),
                    (this.value_ = e),
                    (this.priorityNode_ = t),
                    (this.lazyHash_ = null),
                    g(
                        void 0 !== this.value_ && null !== this.value_,
                        "LeafNode shouldn't be created with null/undefined value."
                    ),
                    En(this.priorityNode_);
            }
            function In() {
                return (null !== bn && bn.apply(this, arguments)) || this;
            }
            var Pn = new (n(In, (bn = ye)),
                (In.prototype.compare = function (e, t) {
                    var n = e.node.getPriority(),
                        r = t.node.getPriority(),
                        r = n.compareTo(r);
                    return 0 === r ? xe(e.name, t.name) : r;
                }),
                (In.prototype.isDefinedOn = function (e) {
                    return !e.getPriority().isEmpty();
                }),
                (In.prototype.indexedValueChanged = function (e, t) {
                    return !e.getPriority().equals(t.getPriority());
                }),
                (In.prototype.minPost = function () {
                    return en.MIN;
                }),
                (In.prototype.maxPost = function () {
                    return new en(Re, new Sn("[PRIORITY-POST]", Cn));
                }),
                (In.prototype.makePost = function (e, t) {
                    e = wn(e);
                    return new en(t, new Sn("[PRIORITY-POST]", e));
                }),
                (In.prototype.toString = function () {
                    return ".priority";
                }),
                In)(),
                Nn = Math.log(2),
                Rn =
                    ((xn.prototype.nextBitIsOne = function () {
                        var e = !(this.bits_ & (1 << this.current_));
                        return this.current_--, e;
                    }),
                    xn);
            function xn(e) {
                var t;
                (this.count = ((t = e + 1), parseInt(Math.log(t) / Nn, 10))),
                    (this.current_ = this.count - 1);
                var n,
                    r = ((n = this.count), parseInt(Array(n + 1).join("1"), 2));
                this.bits_ = (e + 1) & r;
            }
            var kn,
                Dn,
                On = function (l, e, h, t) {
                    l.sort(e);
                    var c = function (e, t) {
                            var n = t - e;
                            if (0 == n) return null;
                            if (1 == n)
                                return (
                                    (r = l[e]),
                                    (i = h ? h(r) : r),
                                    new hn(i, r.node, hn.BLACK, null, null)
                                );
                            var n = parseInt(n / 2, 10) + e,
                                e = c(e, n),
                                t = c(n + 1, t),
                                r = l[n],
                                i = h ? h(r) : r;
                            return new hn(i, r.node, hn.BLACK, e, t);
                        },
                        n = (function (e) {
                            for (
                                var t = null,
                                    n = null,
                                    i = l.length,
                                    r = function (e, t) {
                                        var n = i - e,
                                            r = i;
                                        i -= e;
                                        (e = c(1 + n, r)),
                                            (r = l[n]),
                                            (n = h ? h(r) : r);
                                        o(new hn(n, r.node, t, null, e));
                                    },
                                    o = function (e) {
                                        t = t ? (t.left = e) : (n = e);
                                    },
                                    s = 0;
                                s < e.count;
                                ++s
                            ) {
                                var a = e.nextBitIsOne(),
                                    u = Math.pow(2, e.count - (s + 1));
                                a
                                    ? r(u, hn.BLACK)
                                    : (r(u, hn.BLACK), r(u, hn.RED));
                            }
                            return n;
                        })(new Rn(l.length));
                    return new fn(t || e, n);
                },
                An = {},
                Ln =
                    (Object.defineProperty(Mn, "Default", {
                        get: function () {
                            return (
                                g(Pn, "ChildrenNode.ts has not been loaded"),
                                (kn =
                                    kn ||
                                    new Mn(
                                        { ".priority": An },
                                        { ".priority": Pn }
                                    ))
                            );
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    (Mn.prototype.get = function (e) {
                        var t = O(this.indexes_, e);
                        if (!t) throw new Error("No index defined for " + e);
                        return t instanceof fn ? t : null;
                    }),
                    (Mn.prototype.hasIndex = function (e) {
                        return D(this.indexSet_, e.toString());
                    }),
                    (Mn.prototype.addIndex = function (e, t) {
                        g(
                            e !== an,
                            "KeyIndex always exists and isn't meant to be added to the IndexMap."
                        );
                        for (
                            var n = [],
                                r = !1,
                                i = t.getIterator(en.Wrap),
                                o = i.getNext();
                            o;

                        )
                            (r = r || e.isDefinedOn(o.node)),
                                n.push(o),
                                (o = i.getNext());
                        var s = r ? On(n, e.getCompare()) : An,
                            a = e.toString(),
                            u = l({}, this.indexSet_);
                        u[a] = e;
                        t = l({}, this.indexes_);
                        return (t[a] = s), new Mn(t, u);
                    }),
                    (Mn.prototype.addToIndexes = function (s, a) {
                        var u = this;
                        return new Mn(
                            L(this.indexes_, function (e, t) {
                                var n = O(u.indexSet_, t);
                                if (
                                    (g(
                                        n,
                                        "Missing index implementation for " + t
                                    ),
                                    e === An)
                                ) {
                                    if (n.isDefinedOn(s.node)) {
                                        for (
                                            var r = [],
                                                i = a.getIterator(en.Wrap),
                                                o = i.getNext();
                                            o;

                                        )
                                            o.name !== s.name && r.push(o),
                                                (o = i.getNext());
                                        return r.push(s), On(r, n.getCompare());
                                    }
                                    return An;
                                }
                                n = a.get(s.name);
                                return (e = n
                                    ? e.remove(new en(s.name, n))
                                    : e).insert(s, s.node);
                            }),
                            this.indexSet_
                        );
                    }),
                    (Mn.prototype.removeFromIndexes = function (n, r) {
                        return new Mn(
                            L(this.indexes_, function (e) {
                                if (e === An) return e;
                                var t = r.get(n.name);
                                return t ? e.remove(new en(n.name, t)) : e;
                            }),
                            this.indexSet_
                        );
                    }),
                    Mn);
            function Mn(e, t) {
                (this.indexes_ = e), (this.indexSet_ = t);
            }
            var Fn,
                qn =
                    (Object.defineProperty(Wn, "EMPTY_NODE", {
                        get: function () {
                            return (Dn =
                                Dn || new Wn(new fn(vn), null, Ln.Default));
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    (Wn.prototype.isLeafNode = function () {
                        return !1;
                    }),
                    (Wn.prototype.getPriority = function () {
                        return this.priorityNode_ || Dn;
                    }),
                    (Wn.prototype.updatePriority = function (e) {
                        return this.children_.isEmpty()
                            ? this
                            : new Wn(this.children_, e, this.indexMap_);
                    }),
                    (Wn.prototype.getImmediateChild = function (e) {
                        if (".priority" === e) return this.getPriority();
                        e = this.children_.get(e);
                        return null === e ? Dn : e;
                    }),
                    (Wn.prototype.getChild = function (e) {
                        var t = kt(e);
                        return null === t
                            ? this
                            : this.getImmediateChild(t).getChild(Ot(e));
                    }),
                    (Wn.prototype.hasChild = function (e) {
                        return null !== this.children_.get(e);
                    }),
                    (Wn.prototype.updateImmediateChild = function (e, t) {
                        if (
                            (g(t, "We should always be passing snapshot nodes"),
                            ".priority" === e)
                        )
                            return this.updatePriority(t);
                        var n = new en(e, t),
                            r = void 0,
                            i = void 0,
                            i = t.isEmpty()
                                ? ((r = this.children_.remove(e)),
                                  this.indexMap_.removeFromIndexes(
                                      n,
                                      this.children_
                                  ))
                                : ((r = this.children_.insert(e, t)),
                                  this.indexMap_.addToIndexes(
                                      n,
                                      this.children_
                                  )),
                            n = r.isEmpty() ? Dn : this.priorityNode_;
                        return new Wn(r, n, i);
                    }),
                    (Wn.prototype.updateChild = function (e, t) {
                        var n = kt(e);
                        if (null === n) return t;
                        g(
                            ".priority" !== kt(e) || 1 === Dt(e),
                            ".priority must be the last token in a path"
                        );
                        t = this.getImmediateChild(n).updateChild(Ot(e), t);
                        return this.updateImmediateChild(n, t);
                    }),
                    (Wn.prototype.isEmpty = function () {
                        return this.children_.isEmpty();
                    }),
                    (Wn.prototype.numChildren = function () {
                        return this.children_.count();
                    }),
                    (Wn.prototype.val = function (n) {
                        if (this.isEmpty()) return null;
                        var r = {},
                            i = 0,
                            o = 0,
                            s = !0;
                        if (
                            (this.forEachChild(Pn, function (e, t) {
                                (r[e] = t.val(n)),
                                    i++,
                                    s && Wn.INTEGER_REGEXP_.test(e)
                                        ? (o = Math.max(o, Number(e)))
                                        : (s = !1);
                            }),
                            !n && s && o < 2 * i)
                        ) {
                            var e,
                                t = [];
                            for (e in r) t[e] = r[e];
                            return t;
                        }
                        return (
                            n &&
                                !this.getPriority().isEmpty() &&
                                (r[".priority"] = this.getPriority().val()),
                            r
                        );
                    }),
                    (Wn.prototype.hash = function () {
                        var n;
                        return (
                            null === this.lazyHash_ &&
                                ((n = ""),
                                this.getPriority().isEmpty() ||
                                    (n +=
                                        "priority:" +
                                        gn(this.getPriority().val()) +
                                        ":"),
                                this.forEachChild(Pn, function (e, t) {
                                    t = t.hash();
                                    "" !== t && (n += ":" + e + ":" + t);
                                }),
                                (this.lazyHash_ = "" === n ? "" : ue(n))),
                            this.lazyHash_
                        );
                    }),
                    (Wn.prototype.getPredecessorChildName = function (e, t, n) {
                        n = this.resolveIndex_(n);
                        if (n) {
                            t = n.getPredecessorKey(new en(e, t));
                            return t ? t.name : null;
                        }
                        return this.children_.getPredecessorKey(e);
                    }),
                    (Wn.prototype.getFirstChildName = function (e) {
                        e = this.resolveIndex_(e);
                        if (e) {
                            e = e.minKey();
                            return e && e.name;
                        }
                        return this.children_.minKey();
                    }),
                    (Wn.prototype.getFirstChild = function (e) {
                        e = this.getFirstChildName(e);
                        return e ? new en(e, this.children_.get(e)) : null;
                    }),
                    (Wn.prototype.getLastChildName = function (e) {
                        e = this.resolveIndex_(e);
                        if (e) {
                            e = e.maxKey();
                            return e && e.name;
                        }
                        return this.children_.maxKey();
                    }),
                    (Wn.prototype.getLastChild = function (e) {
                        e = this.getLastChildName(e);
                        return e ? new en(e, this.children_.get(e)) : null;
                    }),
                    (Wn.prototype.forEachChild = function (e, t) {
                        e = this.resolveIndex_(e);
                        return e
                            ? e.inorderTraversal(function (e) {
                                  return t(e.name, e.node);
                              })
                            : this.children_.inorderTraversal(t);
                    }),
                    (Wn.prototype.getIterator = function (e) {
                        return this.getIteratorFrom(e.minPost(), e);
                    }),
                    (Wn.prototype.getIteratorFrom = function (e, t) {
                        var n = this.resolveIndex_(t);
                        if (n)
                            return n.getIteratorFrom(e, function (e) {
                                return e;
                            });
                        for (
                            var r = this.children_.getIteratorFrom(
                                    e.name,
                                    en.Wrap
                                ),
                                i = r.peek();
                            null != i && t.compare(i, e) < 0;

                        )
                            r.getNext(), (i = r.peek());
                        return r;
                    }),
                    (Wn.prototype.getReverseIterator = function (e) {
                        return this.getReverseIteratorFrom(e.maxPost(), e);
                    }),
                    (Wn.prototype.getReverseIteratorFrom = function (e, t) {
                        var n = this.resolveIndex_(t);
                        if (n)
                            return n.getReverseIteratorFrom(e, function (e) {
                                return e;
                            });
                        for (
                            var r = this.children_.getReverseIteratorFrom(
                                    e.name,
                                    en.Wrap
                                ),
                                i = r.peek();
                            null != i && 0 < t.compare(i, e);

                        )
                            r.getNext(), (i = r.peek());
                        return r;
                    }),
                    (Wn.prototype.compareTo = function (e) {
                        return this.isEmpty()
                            ? e.isEmpty()
                                ? 0
                                : -1
                            : e.isLeafNode() || e.isEmpty()
                            ? 1
                            : e === jn
                            ? -1
                            : 0;
                    }),
                    (Wn.prototype.withIndex = function (e) {
                        if (e === an || this.indexMap_.hasIndex(e)) return this;
                        e = this.indexMap_.addIndex(e, this.children_);
                        return new Wn(this.children_, this.priorityNode_, e);
                    }),
                    (Wn.prototype.isIndexed = function (e) {
                        return e === an || this.indexMap_.hasIndex(e);
                    }),
                    (Wn.prototype.equals = function (e) {
                        if (e === this) return !0;
                        if (e.isLeafNode()) return !1;
                        if (this.getPriority().equals(e.getPriority())) {
                            if (this.children_.count() !== e.children_.count())
                                return !1;
                            for (
                                var t = this.getIterator(Pn),
                                    n = e.getIterator(Pn),
                                    r = t.getNext(),
                                    i = n.getNext();
                                r && i;

                            ) {
                                if (r.name !== i.name || !r.node.equals(i.node))
                                    return !1;
                                (r = t.getNext()), (i = n.getNext());
                            }
                            return null === r && null === i;
                        }
                        return !1;
                    }),
                    (Wn.prototype.resolveIndex_ = function (e) {
                        return e === an
                            ? null
                            : this.indexMap_.get(e.toString());
                    }),
                    (Wn.INTEGER_REGEXP_ = /^(0|[1-9]\d*)$/),
                    Wn);
            function Wn(e, t, n) {
                (this.children_ = e),
                    (this.priorityNode_ = t),
                    (this.indexMap_ = n),
                    (this.lazyHash_ = null),
                    this.priorityNode_ && En(this.priorityNode_),
                    this.children_.isEmpty() &&
                        g(
                            !this.priorityNode_ || this.priorityNode_.isEmpty(),
                            "An empty node cannot have a priority"
                        );
            }
            function Qn() {
                return (
                    Fn.call(this, new fn(vn), qn.EMPTY_NODE, Ln.Default) || this
                );
            }
            var jn = new (n(Qn, (Fn = qn)),
            (Qn.prototype.compareTo = function (e) {
                return e === this ? 0 : 1;
            }),
            (Qn.prototype.equals = function (e) {
                return e === this;
            }),
            (Qn.prototype.getPriority = function () {
                return this;
            }),
            (Qn.prototype.getImmediateChild = function (e) {
                return qn.EMPTY_NODE;
            }),
            (Qn.prototype.isEmpty = function () {
                return !1;
            }),
            Qn)();
            Object.defineProperties(en, {
                MIN: { value: new en(Ne, qn.EMPTY_NODE) },
                MAX: { value: new en(Re, jn) },
            }),
                (ne.__EMPTY_NODE = qn.EMPTY_NODE),
                (Sn.__childrenNodeConstructor = qn),
                (pn = jn),
                (Cn = jn);
            var Un = !0;
            function Bn(n, e) {
                if ((void 0 === e && (e = null), null === n))
                    return qn.EMPTY_NODE;
                if (
                    ("object" == typeof n &&
                        ".priority" in n &&
                        (e = n[".priority"]),
                    g(
                        null === e ||
                            "string" == typeof e ||
                            "number" == typeof e ||
                            ("object" == typeof e && ".sv" in e),
                        "Invalid priority type found: " + typeof e
                    ),
                    "object" == typeof n &&
                        ".value" in n &&
                        null !== n[".value"] &&
                        (n = n[".value"]),
                    "object" != typeof n || ".sv" in n)
                )
                    return new Sn(n, Bn(e));
                if (n instanceof Array || !Un) {
                    var r = qn.EMPTY_NODE;
                    return (
                        De(n, function (e, t) {
                            D(n, e) &&
                                "." !== e.substring(0, 1) &&
                                ((!(t = Bn(t)).isLeafNode() && t.isEmpty()) ||
                                    (r = r.updateImmediateChild(e, t)));
                        }),
                        r.updatePriority(Bn(e))
                    );
                }
                var i = [],
                    o = !1;
                if (
                    (De(n, function (e, t) {
                        "." !== e.substring(0, 1) &&
                            ((t = Bn(t)).isEmpty() ||
                                ((o = o || !t.getPriority().isEmpty()),
                                i.push(new en(e, t))));
                    }),
                    0 === i.length)
                )
                    return qn.EMPTY_NODE;
                var t = On(
                    i,
                    yn,
                    function (e) {
                        return e.name;
                    },
                    vn
                );
                if (o) {
                    var s = On(i, Pn.getCompare());
                    return new qn(
                        t,
                        Bn(e),
                        new Ln({ ".priority": s }, { ".priority": Pn })
                    );
                }
                return new qn(t, Bn(e), Ln.Default);
            }
            wn = Bn;
            var Hn,
                Vn,
                zn =
                    (n(Kn, (Hn = ye)),
                    (Kn.prototype.extractChild = function (e) {
                        return e.getChild(this.indexPath_);
                    }),
                    (Kn.prototype.isDefinedOn = function (e) {
                        return !e.getChild(this.indexPath_).isEmpty();
                    }),
                    (Kn.prototype.compare = function (e, t) {
                        var n = this.extractChild(e.node),
                            r = this.extractChild(t.node),
                            r = n.compareTo(r);
                        return 0 === r ? xe(e.name, t.name) : r;
                    }),
                    (Kn.prototype.makePost = function (e, t) {
                        (e = Bn(e)),
                            (e = qn.EMPTY_NODE.updateChild(this.indexPath_, e));
                        return new en(t, e);
                    }),
                    (Kn.prototype.maxPost = function () {
                        var e = qn.EMPTY_NODE.updateChild(this.indexPath_, jn);
                        return new en(Re, e);
                    }),
                    (Kn.prototype.toString = function () {
                        return Lt(this.indexPath_, 0).join("/");
                    }),
                    Kn);
            function Kn(e) {
                var t = Hn.call(this) || this;
                return (
                    (t.indexPath_ = e),
                    g(
                        !qt(e) && ".priority" !== kt(e),
                        "Can't create PathIndex with empty path or .priority key"
                    ),
                    t
                );
            }
            function Yn() {
                return (null !== Vn && Vn.apply(this, arguments)) || this;
            }
            function Gn(e) {
                if (e === "" + qe) return "-";
                var t = We(e);
                if (null != t) return "" + (t + 1);
                for (var n = new Array(e.length), r = 0; r < n.length; r++)
                    n[r] = e.charAt(r);
                if (n.length < 786) return n.push("-"), n.join("");
                for (var i = n.length - 1; 0 <= i && "z" === n[i]; ) i--;
                return -1 === i
                    ? Re
                    : ((t = n[i]),
                      (t = er.charAt(er.indexOf(t) + 1)),
                      (n[i] = t),
                      n.slice(0, i + 1).join(""));
            }
            function $n(e) {
                if (e === "" + Fe) return Ne;
                var t = We(e);
                if (null != t) return "" + (t - 1);
                for (var n = new Array(e.length), r = 0; r < n.length; r++)
                    n[r] = e.charAt(r);
                return "-" === n[n.length - 1]
                    ? 1 === n.length
                        ? "" + qe
                        : (delete n[n.length - 1], n.join(""))
                    : ((n[n.length - 1] = er.charAt(
                          er.indexOf(n[n.length - 1]) - 1
                      )),
                      n.join("") + "z".repeat(786 - n.length));
            }
            var Jn,
                Xn,
                Zn = new (n(Yn, (Vn = ye)),
                (Yn.prototype.compare = function (e, t) {
                    var n = e.node.compareTo(t.node);
                    return 0 === n ? xe(e.name, t.name) : n;
                }),
                (Yn.prototype.isDefinedOn = function (e) {
                    return !0;
                }),
                (Yn.prototype.indexedValueChanged = function (e, t) {
                    return !e.equals(t);
                }),
                (Yn.prototype.minPost = function () {
                    return en.MIN;
                }),
                (Yn.prototype.maxPost = function () {
                    return en.MAX;
                }),
                (Yn.prototype.makePost = function (e, t) {
                    e = Bn(e);
                    return new en(t, e);
                }),
                (Yn.prototype.toString = function () {
                    return ".value";
                }),
                Yn)(),
                er =
                    "-0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz",
                tr =
                    ((Jn = 0),
                    (Xn = []),
                    function (e) {
                        var t = e === Jn;
                        Jn = e;
                        for (var n = new Array(8), r = 7; 0 <= r; r--)
                            (n[r] = er.charAt(e % 64)),
                                (e = Math.floor(e / 64));
                        g(0 === e, "Cannot push at time == 0");
                        var i = n.join("");
                        if (t) {
                            for (r = 11; 0 <= r && 63 === Xn[r]; r--) Xn[r] = 0;
                            Xn[r]++;
                        } else
                            for (r = 0; r < 12; r++)
                                Xn[r] = Math.floor(64 * Math.random());
                        for (r = 0; r < 12; r++) i += er.charAt(Xn[r]);
                        return (
                            g(
                                20 === i.length,
                                "nextPushId: Length should be 20."
                            ),
                            i
                        );
                    });
            function nr(e) {
                return { type: "value", snapshotNode: e };
            }
            function rr(e, t) {
                return { type: "child_added", snapshotNode: t, childName: e };
            }
            function ir(e, t) {
                return { type: "child_removed", snapshotNode: t, childName: e };
            }
            function or(e, t, n) {
                return {
                    type: "child_changed",
                    snapshotNode: t,
                    childName: e,
                    oldSnap: n,
                };
            }
            var sr =
                ((ar.prototype.updateChild = function (e, t, n, r, i, o) {
                    g(
                        e.isIndexed(this.index_),
                        "A node must be indexed if only a child is updated"
                    );
                    var s = e.getImmediateChild(t);
                    return s.getChild(r).equals(n.getChild(r)) &&
                        s.isEmpty() === n.isEmpty()
                        ? e
                        : (null != o &&
                              (n.isEmpty()
                                  ? e.hasChild(t)
                                      ? o.trackChildChange(ir(t, s))
                                      : g(
                                            e.isLeafNode(),
                                            "A child remove without an old child only makes sense on a leaf node"
                                        )
                                  : s.isEmpty()
                                  ? o.trackChildChange(rr(t, n))
                                  : o.trackChildChange(or(t, n, s))),
                          e.isLeafNode() && n.isEmpty()
                              ? e
                              : e
                                    .updateImmediateChild(t, n)
                                    .withIndex(this.index_));
                }),
                (ar.prototype.updateFullNode = function (r, n, i) {
                    return (
                        null != i &&
                            (r.isLeafNode() ||
                                r.forEachChild(Pn, function (e, t) {
                                    n.hasChild(e) ||
                                        i.trackChildChange(ir(e, t));
                                }),
                            n.isLeafNode() ||
                                n.forEachChild(Pn, function (e, t) {
                                    var n;
                                    r.hasChild(e)
                                        ? (n = r.getImmediateChild(e)).equals(
                                              t
                                          ) || i.trackChildChange(or(e, t, n))
                                        : i.trackChildChange(rr(e, t));
                                })),
                        n.withIndex(this.index_)
                    );
                }),
                (ar.prototype.updatePriority = function (e, t) {
                    return e.isEmpty() ? qn.EMPTY_NODE : e.updatePriority(t);
                }),
                (ar.prototype.filtersNodes = function () {
                    return !1;
                }),
                (ar.prototype.getIndexedFilter = function () {
                    return this;
                }),
                (ar.prototype.getIndex = function () {
                    return this.index_;
                }),
                ar);
            function ar(e) {
                this.index_ = e;
            }
            var ur =
                ((lr.prototype.getStartPost = function () {
                    return this.startPost_;
                }),
                (lr.prototype.getEndPost = function () {
                    return this.endPost_;
                }),
                (lr.prototype.matches = function (e) {
                    return (
                        this.index_.compare(this.getStartPost(), e) <= 0 &&
                        this.index_.compare(e, this.getEndPost()) <= 0
                    );
                }),
                (lr.prototype.updateChild = function (e, t, n, r, i, o) {
                    return (
                        this.matches(new en(t, n)) || (n = qn.EMPTY_NODE),
                        this.indexedFilter_.updateChild(e, t, n, r, i, o)
                    );
                }),
                (lr.prototype.updateFullNode = function (e, t, n) {
                    t.isLeafNode() && (t = qn.EMPTY_NODE);
                    var r = (r = t.withIndex(this.index_)).updatePriority(
                            qn.EMPTY_NODE
                        ),
                        i = this;
                    return (
                        t.forEachChild(Pn, function (e, t) {
                            i.matches(new en(e, t)) ||
                                (r = r.updateImmediateChild(e, qn.EMPTY_NODE));
                        }),
                        this.indexedFilter_.updateFullNode(e, r, n)
                    );
                }),
                (lr.prototype.updatePriority = function (e, t) {
                    return e;
                }),
                (lr.prototype.filtersNodes = function () {
                    return !0;
                }),
                (lr.prototype.getIndexedFilter = function () {
                    return this.indexedFilter_;
                }),
                (lr.prototype.getIndex = function () {
                    return this.index_;
                }),
                (lr.getStartPost_ = function (e) {
                    if (e.hasStart()) {
                        var t = e.getIndexStartName();
                        return e.getIndex().makePost(e.getIndexStartValue(), t);
                    }
                    return e.getIndex().minPost();
                }),
                (lr.getEndPost_ = function (e) {
                    if (e.hasEnd()) {
                        var t = e.getIndexEndName();
                        return e.getIndex().makePost(e.getIndexEndValue(), t);
                    }
                    return e.getIndex().maxPost();
                }),
                lr);
            function lr(e) {
                (this.indexedFilter_ = new sr(e.getIndex())),
                    (this.index_ = e.getIndex()),
                    (this.startPost_ = lr.getStartPost_(e)),
                    (this.endPost_ = lr.getEndPost_(e));
            }
            var hr =
                ((cr.prototype.updateChild = function (e, t, n, r, i, o) {
                    return (
                        this.rangedFilter_.matches(new en(t, n)) ||
                            (n = qn.EMPTY_NODE),
                        e.getImmediateChild(t).equals(n)
                            ? e
                            : e.numChildren() < this.limit_
                            ? this.rangedFilter_
                                  .getIndexedFilter()
                                  .updateChild(e, t, n, r, i, o)
                            : this.fullLimitUpdateChild_(e, t, n, i, o)
                    );
                }),
                (cr.prototype.updateFullNode = function (e, t, n) {
                    if (t.isLeafNode() || t.isEmpty())
                        r = qn.EMPTY_NODE.withIndex(this.index_);
                    else if (
                        2 * this.limit_ < t.numChildren() &&
                        t.isIndexed(this.index_)
                    ) {
                        var r = qn.EMPTY_NODE.withIndex(this.index_),
                            i = void 0;
                        i = this.reverse_
                            ? t.getReverseIteratorFrom(
                                  this.rangedFilter_.getEndPost(),
                                  this.index_
                              )
                            : t.getIteratorFrom(
                                  this.rangedFilter_.getStartPost(),
                                  this.index_
                              );
                        for (var o = 0; i.hasNext() && o < this.limit_; ) {
                            var s = i.getNext();
                            if (
                                !(this.reverse_
                                    ? this.index_.compare(
                                          this.rangedFilter_.getStartPost(),
                                          s
                                      ) <= 0
                                    : this.index_.compare(
                                          s,
                                          this.rangedFilter_.getEndPost()
                                      ) <= 0)
                            )
                                break;
                            (r = r.updateImmediateChild(s.name, s.node)), o++;
                        }
                    } else {
                        r = (r = t.withIndex(this.index_)).updatePriority(
                            qn.EMPTY_NODE
                        );
                        var a,
                            u = void 0,
                            l = void 0,
                            h = void 0,
                            i = void 0;
                        h = this.reverse_
                            ? ((i = r.getReverseIterator(this.index_)),
                              (u = this.rangedFilter_.getEndPost()),
                              (l = this.rangedFilter_.getStartPost()),
                              (a = this.index_.getCompare()),
                              function (e, t) {
                                  return a(t, e);
                              })
                            : ((i = r.getIterator(this.index_)),
                              (u = this.rangedFilter_.getStartPost()),
                              (l = this.rangedFilter_.getEndPost()),
                              this.index_.getCompare());
                        for (var o = 0, c = !1; i.hasNext(); ) {
                            s = i.getNext();
                            (c = !c && h(u, s) <= 0 ? !0 : c) &&
                            o < this.limit_ &&
                            h(s, l) <= 0
                                ? o++
                                : (r = r.updateImmediateChild(
                                      s.name,
                                      qn.EMPTY_NODE
                                  ));
                        }
                    }
                    return this.rangedFilter_
                        .getIndexedFilter()
                        .updateFullNode(e, r, n);
                }),
                (cr.prototype.updatePriority = function (e, t) {
                    return e;
                }),
                (cr.prototype.filtersNodes = function () {
                    return !0;
                }),
                (cr.prototype.getIndexedFilter = function () {
                    return this.rangedFilter_.getIndexedFilter();
                }),
                (cr.prototype.getIndex = function () {
                    return this.index_;
                }),
                (cr.prototype.fullLimitUpdateChild_ = function (e, t, n, r, i) {
                    var o, s;
                    s = this.reverse_
                        ? ((o = this.index_.getCompare()),
                          function (e, t) {
                              return o(t, e);
                          })
                        : this.index_.getCompare();
                    var a = e;
                    g(a.numChildren() === this.limit_, "");
                    var u = new en(t, n),
                        l = this.reverse_
                            ? a.getFirstChild(this.index_)
                            : a.getLastChild(this.index_),
                        h = this.rangedFilter_.matches(u);
                    if (a.hasChild(t)) {
                        for (
                            var c = a.getImmediateChild(t),
                                d = r.getChildAfterChild(
                                    this.index_,
                                    l,
                                    this.reverse_
                                );
                            null != d && (d.name === t || a.hasChild(d.name));

                        )
                            d = r.getChildAfterChild(
                                this.index_,
                                d,
                                this.reverse_
                            );
                        var p = null == d ? 1 : s(d, u);
                        if (h && !n.isEmpty() && 0 <= p)
                            return (
                                null != i && i.trackChildChange(or(t, n, c)),
                                a.updateImmediateChild(t, n)
                            );
                        null != i && i.trackChildChange(ir(t, c));
                        c = a.updateImmediateChild(t, qn.EMPTY_NODE);
                        return null != d && this.rangedFilter_.matches(d)
                            ? (null != i &&
                                  i.trackChildChange(rr(d.name, d.node)),
                              c.updateImmediateChild(d.name, d.node))
                            : c;
                    }
                    return !n.isEmpty() && h && 0 <= s(l, u)
                        ? (null != i &&
                              (i.trackChildChange(ir(l.name, l.node)),
                              i.trackChildChange(rr(t, n))),
                          a
                              .updateImmediateChild(t, n)
                              .updateImmediateChild(l.name, qn.EMPTY_NODE))
                        : e;
                }),
                cr);
            function cr(e) {
                (this.rangedFilter_ = new ur(e)),
                    (this.index_ = e.getIndex()),
                    (this.limit_ = e.getLimit()),
                    (this.reverse_ = !e.isViewFromLeft());
            }
            var dr =
                ((pr.prototype.hasStart = function () {
                    return this.startSet_;
                }),
                (pr.prototype.hasStartAfter = function () {
                    return this.startAfterSet_;
                }),
                (pr.prototype.hasEndBefore = function () {
                    return this.endBeforeSet_;
                }),
                (pr.prototype.isViewFromLeft = function () {
                    return "" === this.viewFrom_
                        ? this.startSet_
                        : "l" === this.viewFrom_;
                }),
                (pr.prototype.getIndexStartValue = function () {
                    return (
                        g(this.startSet_, "Only valid if start has been set"),
                        this.indexStartValue_
                    );
                }),
                (pr.prototype.getIndexStartName = function () {
                    return (
                        g(this.startSet_, "Only valid if start has been set"),
                        this.startNameSet_ ? this.indexStartName_ : Ne
                    );
                }),
                (pr.prototype.hasEnd = function () {
                    return this.endSet_;
                }),
                (pr.prototype.getIndexEndValue = function () {
                    return (
                        g(this.endSet_, "Only valid if end has been set"),
                        this.indexEndValue_
                    );
                }),
                (pr.prototype.getIndexEndName = function () {
                    return (
                        g(this.endSet_, "Only valid if end has been set"),
                        this.endNameSet_ ? this.indexEndName_ : Re
                    );
                }),
                (pr.prototype.hasLimit = function () {
                    return this.limitSet_;
                }),
                (pr.prototype.hasAnchoredLimit = function () {
                    return this.limitSet_ && "" !== this.viewFrom_;
                }),
                (pr.prototype.getLimit = function () {
                    return (
                        g(this.limitSet_, "Only valid if limit has been set"),
                        this.limit_
                    );
                }),
                (pr.prototype.getIndex = function () {
                    return this.index_;
                }),
                (pr.prototype.loadsAllData = function () {
                    return !(this.startSet_ || this.endSet_ || this.limitSet_);
                }),
                (pr.prototype.isDefault = function () {
                    return this.loadsAllData() && this.index_ === Pn;
                }),
                (pr.prototype.copy = function () {
                    var e = new pr();
                    return (
                        (e.limitSet_ = this.limitSet_),
                        (e.limit_ = this.limit_),
                        (e.startSet_ = this.startSet_),
                        (e.indexStartValue_ = this.indexStartValue_),
                        (e.startNameSet_ = this.startNameSet_),
                        (e.indexStartName_ = this.indexStartName_),
                        (e.endSet_ = this.endSet_),
                        (e.indexEndValue_ = this.indexEndValue_),
                        (e.endNameSet_ = this.endNameSet_),
                        (e.indexEndName_ = this.indexEndName_),
                        (e.index_ = this.index_),
                        (e.viewFrom_ = this.viewFrom_),
                        e
                    );
                }),
                pr);
            function pr() {
                (this.limitSet_ = !1),
                    (this.startSet_ = !1),
                    (this.startNameSet_ = !1),
                    (this.startAfterSet_ = !1),
                    (this.endSet_ = !1),
                    (this.endNameSet_ = !1),
                    (this.endBeforeSet_ = !1),
                    (this.limit_ = 0),
                    (this.viewFrom_ = ""),
                    (this.indexStartValue_ = null),
                    (this.indexStartName_ = ""),
                    (this.indexEndValue_ = null),
                    (this.indexEndName_ = ""),
                    (this.index_ = Pn);
            }
            function fr(e, t, n) {
                e = e.copy();
                return (
                    (e.startSet_ = !0),
                    void 0 === t && (t = null),
                    (e.indexStartValue_ = t),
                    null != n
                        ? ((e.startNameSet_ = !0), (e.indexStartName_ = n))
                        : ((e.startNameSet_ = !1), (e.indexStartName_ = "")),
                    e
                );
            }
            function _r(e, t, n) {
                e = e.copy();
                return (
                    (e.endSet_ = !0),
                    void 0 === t && (t = null),
                    (e.indexEndValue_ = t),
                    void 0 !== n
                        ? ((e.endNameSet_ = !0), (e.indexEndName_ = n))
                        : ((e.endNameSet_ = !1), (e.indexEndName_ = "")),
                    e
                );
            }
            function yr(e, t) {
                e = e.copy();
                return (e.index_ = t), e;
            }
            function vr(e) {
                var t,
                    n = {};
                return (
                    e.isDefault() ||
                        ((t =
                            e.index_ === Pn
                                ? "$priority"
                                : e.index_ === Zn
                                ? "$value"
                                : e.index_ === an
                                ? "$key"
                                : (g(
                                      e.index_ instanceof zn,
                                      "Unrecognized index type!"
                                  ),
                                  e.index_.toString())),
                        (n.orderBy = x(t)),
                        e.startSet_ &&
                            ((n.startAt = x(e.indexStartValue_)),
                            e.startNameSet_ &&
                                (n.startAt += "," + x(e.indexStartName_))),
                        e.endSet_ &&
                            ((n.endAt = x(e.indexEndValue_)),
                            e.endNameSet_ &&
                                (n.endAt += "," + x(e.indexEndName_))),
                        e.limitSet_ &&
                            (e.isViewFromLeft()
                                ? (n.limitToFirst = e.limit_)
                                : (n.limitToLast = e.limit_))),
                    n
                );
            }
            var gr,
                mr =
                    (n(wr, (gr = mt)),
                    (wr.prototype.reportStats = function (e) {
                        throw new Error("Method not implemented.");
                    }),
                    (wr.getListenId_ = function (e, t) {
                        return void 0 !== t
                            ? "tag$" + t
                            : (g(
                                  e.getQueryParams().isDefault(),
                                  "should have a tag if it's not a default query."
                              ),
                              e.path.toString());
                    }),
                    (wr.prototype.listen = function (e, t, n, r) {
                        var i = this,
                            o = e.path.toString();
                        this.log_(
                            "Listen called for " + o + " " + e.queryIdentifier()
                        );
                        var s = wr.getListenId_(e, n),
                            a = {};
                        this.listens_[s] = a;
                        e = vr(e.getQueryParams());
                        this.restRequest_(o + ".json", e, function (e, t) {
                            null === (e = 404 === e ? (t = null) : e) &&
                                i.onDataUpdate_(o, t, !1, n),
                                O(i.listens_, s) === a &&
                                    r(
                                        e
                                            ? 401 === e
                                                ? "permission_denied"
                                                : "rest_error:" + e
                                            : "ok",
                                        null
                                    );
                        });
                    }),
                    (wr.prototype.unlisten = function (e, t) {
                        t = wr.getListenId_(e, t);
                        delete this.listens_[t];
                    }),
                    (wr.prototype.get = function (e) {
                        var n = this,
                            t = vr(e.getQueryParams()),
                            r = e.path.toString(),
                            i = new f();
                        return (
                            this.restRequest_(r + ".json", t, function (e, t) {
                                null === (e = 404 === e ? (t = null) : e)
                                    ? (n.onDataUpdate_(r, t, !1, null),
                                      i.resolve(t))
                                    : i.reject(new Error(t));
                            }),
                            i.promise
                        );
                    }),
                    (wr.prototype.refreshAuthToken = function (e) {}),
                    (wr.prototype.restRequest_ = function (r, i, o) {
                        var s = this;
                        ((i = void 0 === i ? {} : i).format = "export"),
                            this.authTokenProvider_
                                .getToken(!1)
                                .then(function (e) {
                                    e = e && e.accessToken;
                                    e && (i.auth = e);
                                    var t =
                                        (s.repoInfo_.secure
                                            ? "https://"
                                            : "http://") +
                                        s.repoInfo_.host +
                                        r +
                                        "?ns=" +
                                        s.repoInfo_.namespace +
                                        M(i);
                                    s.log_("Sending REST request for " + t);
                                    var n = new XMLHttpRequest();
                                    (n.onreadystatechange = function () {
                                        if (o && 4 === n.readyState) {
                                            s.log_(
                                                "REST Response for " +
                                                    t +
                                                    " received. status:",
                                                n.status,
                                                "response:",
                                                n.responseText
                                            );
                                            var e = null;
                                            if (
                                                200 <= n.status &&
                                                n.status < 300
                                            ) {
                                                try {
                                                    e = R(n.responseText);
                                                } catch (e) {
                                                    Pe(
                                                        "Failed to parse JSON response for " +
                                                            t +
                                                            ": " +
                                                            n.responseText
                                                    );
                                                }
                                                o(null, e);
                                            } else
                                                401 !== n.status &&
                                                    404 !== n.status &&
                                                    Pe(
                                                        "Got unsuccessful REST response for " +
                                                            t +
                                                            " Status: " +
                                                            n.status
                                                    ),
                                                    o(n.status);
                                            o = null;
                                        }
                                    }),
                                        n.open("GET", t, !0),
                                        n.send();
                                });
                    }),
                    wr);
            function wr(e, t, n) {
                var r = gr.call(this) || this;
                return (
                    (r.repoInfo_ = e),
                    (r.onDataUpdate_ = t),
                    (r.authTokenProvider_ = n),
                    (r.log_ = Te("p:rest:")),
                    (r.listens_ = {}),
                    r
                );
            }
            var Cr =
                ((br.prototype.getNode = function (e) {
                    return this.rootNode_.getChild(e);
                }),
                (br.prototype.updateSnapshot = function (e, t) {
                    this.rootNode_ = this.rootNode_.updateChild(e, t);
                }),
                br);
            function br() {
                this.rootNode_ = qn.EMPTY_NODE;
            }
            function Er() {
                return { value: null, children: new Map() };
            }
            function Sr(e, t, n) {
                var r;
                qt(t)
                    ? ((e.value = n), e.children.clear())
                    : null !== e.value
                    ? (e.value = e.value.updateChild(t, n))
                    : ((r = kt(t)),
                      e.children.has(r) || e.children.set(r, Er()),
                      Sr(e.children.get(r), (t = Ot(t)), n));
            }
            function Tr(e, n, r) {
                var i;
                null !== e.value
                    ? r(n, e.value)
                    : ((i = function (e, t) {
                          Tr(t, new Nt(n.toString() + "/" + e), r);
                      }),
                      e.children.forEach(function (e, t) {
                          i(t, e);
                      }));
            }
            var Ir =
                ((Pr.prototype.get = function () {
                    var e = this.collection_.get(),
                        n = l({}, e);
                    return (
                        this.last_ &&
                            De(this.last_, function (e, t) {
                                n[e] = n[e] - t;
                            }),
                        (this.last_ = e),
                        n
                    );
                }),
                Pr);
            function Pr(e) {
                (this.collection_ = e), (this.last_ = null);
            }
            var Nr,
                Rr =
                    ((xr.prototype.reportStats_ = function () {
                        var n = this,
                            e = this.statsListener_.get(),
                            r = {},
                            i = !1;
                        De(e, function (e, t) {
                            0 < t &&
                                D(n.statsToReport_, e) &&
                                ((r[e] = t), (i = !0));
                        }),
                            i && this.server_.reportStats(r),
                            Ae(
                                this.reportStats_.bind(this),
                                Math.floor(2 * Math.random() * 3e5)
                            );
                    }),
                    xr);
            function xr(e, t) {
                (this.server_ = t),
                    (this.statsToReport_ = {}),
                    (this.statsListener_ = new Ir(e));
                e = 1e4 + 2e4 * Math.random();
                Ae(this.reportStats_.bind(this), Math.floor(e));
            }
            function kr() {
                return {
                    fromUser: !0,
                    fromServer: !1,
                    queryId: null,
                    tagged: !1,
                };
            }
            function Dr() {
                return {
                    fromUser: !1,
                    fromServer: !0,
                    queryId: null,
                    tagged: !1,
                };
            }
            function Or(e) {
                return { fromUser: !1, fromServer: !0, queryId: e, tagged: !0 };
            }
            ((mt = Nr = Nr || {})[(mt.OVERWRITE = 0)] = "OVERWRITE"),
                (mt[(mt.MERGE = 1)] = "MERGE"),
                (mt[(mt.ACK_USER_WRITE = 2)] = "ACK_USER_WRITE"),
                (mt[(mt.LISTEN_COMPLETE = 3)] = "LISTEN_COMPLETE");
            var Ar =
                ((Lr.prototype.operationForChild = function (e) {
                    if (qt(this.path)) {
                        if (null != this.affectedTree.value)
                            return (
                                g(
                                    this.affectedTree.children.isEmpty(),
                                    "affectedTree should not have overlapping affected paths."
                                ),
                                this
                            );
                        var t = this.affectedTree.subtree(new Nt(e));
                        return new Lr(xt(), t, this.revert);
                    }
                    return (
                        g(
                            kt(this.path) === e,
                            "operationForChild called for unrelated child."
                        ),
                        new Lr(Ot(this.path), this.affectedTree, this.revert)
                    );
                }),
                Lr);
            function Lr(e, t, n) {
                (this.path = e),
                    (this.affectedTree = t),
                    (this.revert = n),
                    (this.type = Nr.ACK_USER_WRITE),
                    (this.source = kr());
            }
            var Mr =
                ((Fr.prototype.operationForChild = function (e) {
                    return qt(this.path)
                        ? new Fr(this.source, xt())
                        : new Fr(this.source, Ot(this.path));
                }),
                Fr);
            function Fr(e, t) {
                (this.source = e),
                    (this.path = t),
                    (this.type = Nr.LISTEN_COMPLETE);
            }
            var qr =
                ((Wr.prototype.operationForChild = function (e) {
                    return qt(this.path)
                        ? new Wr(
                              this.source,
                              xt(),
                              this.snap.getImmediateChild(e)
                          )
                        : new Wr(this.source, Ot(this.path), this.snap);
                }),
                Wr);
            function Wr(e, t, n) {
                (this.source = e),
                    (this.path = t),
                    (this.snap = n),
                    (this.type = Nr.OVERWRITE);
            }
            var Qr =
                ((jr.prototype.operationForChild = function (e) {
                    if (qt(this.path)) {
                        var t = this.children.subtree(new Nt(e));
                        return t.isEmpty()
                            ? null
                            : t.value
                            ? new qr(this.source, xt(), t.value)
                            : new jr(this.source, xt(), t);
                    }
                    return (
                        g(
                            kt(this.path) === e,
                            "Can't get a merge for a child not on the path of the operation"
                        ),
                        new jr(this.source, Ot(this.path), this.children)
                    );
                }),
                (jr.prototype.toString = function () {
                    return (
                        "Operation(" +
                        this.path +
                        ": " +
                        this.source.toString() +
                        " merge: " +
                        this.children.toString() +
                        ")"
                    );
                }),
                jr);
            function jr(e, t, n) {
                (this.source = e),
                    (this.path = t),
                    (this.children = n),
                    (this.type = Nr.MERGE);
            }
            var Ur =
                ((Br.prototype.isFullyInitialized = function () {
                    return this.fullyInitialized_;
                }),
                (Br.prototype.isFiltered = function () {
                    return this.filtered_;
                }),
                (Br.prototype.isCompleteForPath = function (e) {
                    if (qt(e))
                        return this.isFullyInitialized() && !this.filtered_;
                    e = kt(e);
                    return this.isCompleteForChild(e);
                }),
                (Br.prototype.isCompleteForChild = function (e) {
                    return (
                        (this.isFullyInitialized() && !this.filtered_) ||
                        this.node_.hasChild(e)
                    );
                }),
                (Br.prototype.getNode = function () {
                    return this.node_;
                }),
                Br);
            function Br(e, t, n) {
                (this.node_ = e),
                    (this.fullyInitialized_ = t),
                    (this.filtered_ = n);
            }
            var Hr,
                Vr = function (e) {
                    (this.query_ = e),
                        (this.index_ = this.query_.getQueryParams().getIndex());
                };
            function zr(n, e, t, r) {
                var i = [],
                    o = [];
                return (
                    e.forEach(function (e) {
                        var t;
                        "child_changed" === e.type &&
                            n.index_.indexedValueChanged(
                                e.oldSnap,
                                e.snapshotNode
                            ) &&
                            o.push(
                                ((t = e.childName),
                                {
                                    type: "child_moved",
                                    snapshotNode: e.snapshotNode,
                                    childName: t,
                                })
                            );
                    }),
                    Kr(n, i, "child_removed", e, r, t),
                    Kr(n, i, "child_added", e, r, t),
                    Kr(n, i, "child_moved", o, r, t),
                    Kr(n, i, "child_changed", e, r, t),
                    Kr(n, i, "value", e, r, t),
                    i
                );
            }
            function Kr(o, s, t, e, a, u) {
                e = e.filter(function (e) {
                    return e.type === t;
                });
                e.sort(function (e, t) {
                    return (function (e, t, n) {
                        if (null == t.childName || null == n.childName)
                            throw m("Should only compare child_ events.");
                        (t = new en(t.childName, t.snapshotNode)),
                            (n = new en(n.childName, n.snapshotNode));
                        return e.index_.compare(t, n);
                    })(o, e, t);
                }),
                    e.forEach(function (t) {
                        var e,
                            n,
                            r,
                            i =
                                ((e = o),
                                (r = u),
                                "value" === (n = t).type ||
                                    "child_removed" === n.type ||
                                    (n.prevName = r.getPredecessorChildName(
                                        n.childName,
                                        n.snapshotNode,
                                        e.index_
                                    )),
                                n);
                        a.forEach(function (e) {
                            e.respondsTo(t.type) &&
                                s.push(e.createEvent(i, o.query_));
                        });
                    });
            }
            function Yr(e, t) {
                return { eventCache: e, serverCache: t };
            }
            function Gr(e, t, n, r) {
                return Yr(new Ur(t, n, r), e.serverCache);
            }
            function $r(e, t, n, r) {
                return Yr(e.eventCache, new Ur(t, n, r));
            }
            function Jr(e) {
                return e.eventCache.isFullyInitialized()
                    ? e.eventCache.getNode()
                    : null;
            }
            function Xr(e) {
                return e.serverCache.isFullyInitialized()
                    ? e.serverCache.getNode()
                    : null;
            }
            var Zr =
                ((ei.fromObject = function (e) {
                    var n = new ei(null);
                    return (
                        De(e, function (e, t) {
                            n = n.set(new Nt(e), t);
                        }),
                        n
                    );
                }),
                (ei.prototype.isEmpty = function () {
                    return null === this.value && this.children.isEmpty();
                }),
                (ei.prototype.findRootMostMatchingPathAndValue = function (
                    e,
                    t
                ) {
                    if (null != this.value && t(this.value))
                        return { path: xt(), value: this.value };
                    if (qt(e)) return null;
                    var n = kt(e),
                        r = this.children.get(n);
                    if (null === r) return null;
                    t = r.findRootMostMatchingPathAndValue(Ot(e), t);
                    return null == t
                        ? null
                        : { path: Ft(new Nt(n), t.path), value: t.value };
                }),
                (ei.prototype.findRootMostValueAndPath = function (e) {
                    return this.findRootMostMatchingPathAndValue(
                        e,
                        function () {
                            return !0;
                        }
                    );
                }),
                (ei.prototype.subtree = function (e) {
                    if (qt(e)) return this;
                    var t = kt(e),
                        t = this.children.get(t);
                    return null !== t ? t.subtree(Ot(e)) : new ei(null);
                }),
                (ei.prototype.set = function (e, t) {
                    if (qt(e)) return new ei(t, this.children);
                    var n = kt(e),
                        t = (this.children.get(n) || new ei(null)).set(
                            Ot(e),
                            t
                        ),
                        t = this.children.insert(n, t);
                    return new ei(this.value, t);
                }),
                (ei.prototype.remove = function (e) {
                    if (qt(e))
                        return this.children.isEmpty()
                            ? new ei(null)
                            : new ei(null, this.children);
                    var t = kt(e),
                        n = this.children.get(t);
                    if (n) {
                        (n = n.remove(Ot(e))),
                            (e = void 0),
                            (e = n.isEmpty()
                                ? this.children.remove(t)
                                : this.children.insert(t, n));
                        return null === this.value && e.isEmpty()
                            ? new ei(null)
                            : new ei(this.value, e);
                    }
                    return this;
                }),
                (ei.prototype.get = function (e) {
                    if (qt(e)) return this.value;
                    var t = kt(e),
                        t = this.children.get(t);
                    return t ? t.get(Ot(e)) : null;
                }),
                (ei.prototype.setTree = function (e, t) {
                    if (qt(e)) return t;
                    var n = kt(e),
                        e = (this.children.get(n) || new ei(null)).setTree(
                            Ot(e),
                            t
                        ),
                        t = void 0,
                        t = e.isEmpty()
                            ? this.children.remove(n)
                            : this.children.insert(n, e);
                    return new ei(this.value, t);
                }),
                (ei.prototype.fold = function (e) {
                    return this.fold_(xt(), e);
                }),
                (ei.prototype.fold_ = function (n, r) {
                    var i = {};
                    return (
                        this.children.inorderTraversal(function (e, t) {
                            i[e] = t.fold_(Ft(n, e), r);
                        }),
                        r(n, this.value, i)
                    );
                }),
                (ei.prototype.findOnPath = function (e, t) {
                    return this.findOnPath_(e, xt(), t);
                }),
                (ei.prototype.findOnPath_ = function (e, t, n) {
                    var r = !!this.value && n(t, this.value);
                    if (r) return r;
                    if (qt(e)) return null;
                    var i = kt(e),
                        r = this.children.get(i);
                    return r ? r.findOnPath_(Ot(e), Ft(t, i), n) : null;
                }),
                (ei.prototype.foreachOnPath = function (e, t) {
                    return this.foreachOnPath_(e, xt(), t);
                }),
                (ei.prototype.foreachOnPath_ = function (e, t, n) {
                    if (qt(e)) return this;
                    this.value && n(t, this.value);
                    var r = kt(e),
                        i = this.children.get(r);
                    return i
                        ? i.foreachOnPath_(Ot(e), Ft(t, r), n)
                        : new ei(null);
                }),
                (ei.prototype.foreach = function (e) {
                    this.foreach_(xt(), e);
                }),
                (ei.prototype.foreach_ = function (n, r) {
                    this.children.inorderTraversal(function (e, t) {
                        t.foreach_(Ft(n, e), r);
                    }),
                        this.value && r(n, this.value);
                }),
                (ei.prototype.foreachChild = function (n) {
                    this.children.inorderTraversal(function (e, t) {
                        t.value && n(e, t.value);
                    });
                }),
                ei);
            function ei(e, t) {
                void 0 === t && (t = Hr = Hr || new fn(de)),
                    (this.value = e),
                    (this.children = t);
            }
            var ti =
                ((ni.empty = function () {
                    return new ni(new Zr(null));
                }),
                ni);
            function ni(e) {
                this.writeTree_ = e;
            }
            function ri(e, t, n) {
                if (qt(t)) return new ti(new Zr(n));
                var r = e.writeTree_.findRootMostValueAndPath(t);
                if (null != r) {
                    var i = r.path,
                        o = r.value,
                        r = Wt(i, t),
                        o = o.updateChild(r, n);
                    return new ti(e.writeTree_.set(i, o));
                }
                (n = new Zr(n)), (n = e.writeTree_.setTree(t, n));
                return new ti(n);
            }
            function ii(e, n, t) {
                var r = e;
                return (
                    De(t, function (e, t) {
                        r = ri(r, Ft(n, e), t);
                    }),
                    r
                );
            }
            function oi(e, t) {
                if (qt(t)) return ti.empty();
                t = e.writeTree_.setTree(t, new Zr(null));
                return new ti(t);
            }
            function si(e, t) {
                return null != ai(e, t);
            }
            function ai(e, t) {
                var n = e.writeTree_.findRootMostValueAndPath(t);
                return null != n
                    ? e.writeTree_.get(n.path).getChild(Wt(n.path, t))
                    : null;
            }
            function ui(e) {
                var n = [],
                    t = e.writeTree_.value;
                return (
                    null != t
                        ? t.isLeafNode() ||
                          t.forEachChild(Pn, function (e, t) {
                              n.push(new en(e, t));
                          })
                        : e.writeTree_.children.inorderTraversal(function (
                              e,
                              t
                          ) {
                              null != t.value && n.push(new en(e, t.value));
                          }),
                    n
                );
            }
            function li(e, t) {
                if (qt(t)) return e;
                var n = ai(e, t);
                return new ti(null != n ? new Zr(n) : e.writeTree_.subtree(t));
            }
            function hi(e) {
                return e.writeTree_.isEmpty();
            }
            function ci(e, t) {
                return (function n(r, e, i) {
                    {
                        if (null != e.value) return i.updateChild(r, e.value);
                        var o = null;
                        return (
                            e.children.inorderTraversal(function (e, t) {
                                ".priority" === e
                                    ? (g(
                                          null !== t.value,
                                          "Priority writes must always be leaf nodes"
                                      ),
                                      (o = t.value))
                                    : (i = n(Ft(r, e), t, i));
                            }),
                            (i =
                                !i.getChild(r).isEmpty() && null !== o
                                    ? i.updateChild(Ft(r, ".priority"), o)
                                    : i)
                        );
                    }
                })(xt(), e.writeTree_, t);
            }
            function di(e, t) {
                return Si(t, e);
            }
            function pi(t, n) {
                var e = t.allWrites.findIndex(function (e) {
                    return e.writeId === n;
                });
                g(0 <= e, "removeWrite called with nonexistent writeId.");
                var r = t.allWrites[e];
                t.allWrites.splice(e, 1);
                for (
                    var i, o = r.visible, s = !1, a = t.allWrites.length - 1;
                    o && 0 <= a;

                ) {
                    var u = t.allWrites[a];
                    u.visible &&
                        (e <= a &&
                        (function (e, t) {
                            {
                                if (e.snap) return Ut(e.path, t);
                                for (var n in e.children)
                                    if (
                                        e.children.hasOwnProperty(n) &&
                                        Ut(Ft(e.path, n), t)
                                    )
                                        return !0;
                                return !1;
                            }
                        })(u, r.path)
                            ? (o = !1)
                            : Ut(r.path, u.path) && (s = !0)),
                        a--;
                }
                return (
                    !!o &&
                    (s
                        ? (((i = t).visibleWrites = _i(i.allWrites, fi, xt())),
                          0 < i.allWrites.length
                              ? (i.lastWriteId =
                                    i.allWrites[i.allWrites.length - 1].writeId)
                              : (i.lastWriteId = -1))
                        : r.snap
                        ? (t.visibleWrites = oi(t.visibleWrites, r.path))
                        : De(r.children, function (e) {
                              t.visibleWrites = oi(
                                  t.visibleWrites,
                                  Ft(r.path, e)
                              );
                          }),
                    !0)
                );
            }
            function fi(e) {
                return e.visible;
            }
            function _i(e, t, n) {
                for (var r = ti.empty(), i = 0; i < e.length; ++i) {
                    var o = e[i];
                    if (t(o)) {
                        var s = o.path,
                            a = void 0;
                        if (o.snap)
                            Ut(n, s)
                                ? (r = ri(r, (a = Wt(n, s)), o.snap))
                                : Ut(s, n) &&
                                  ((a = Wt(s, n)),
                                  (r = ri(r, xt(), o.snap.getChild(a))));
                        else {
                            if (!o.children)
                                throw m(
                                    "WriteRecord should have .snap or .children"
                                );
                            Ut(n, s)
                                ? (r = ii(r, (a = Wt(n, s)), o.children))
                                : Ut(s, n) &&
                                  (qt((a = Wt(s, n)))
                                      ? (r = ii(r, xt(), o.children))
                                      : (o = O(o.children, kt(a))) &&
                                        ((a = o.getChild(Ot(a))),
                                        (r = ri(r, xt(), a))));
                        }
                    }
                }
                return r;
            }
            function yi(e, t, n, r, i) {
                if (r || i) {
                    var o = li(e.visibleWrites, t);
                    if (!i && hi(o)) return n;
                    if (i || null != n || si(o, xt()))
                        return ci(
                            _i(
                                e.allWrites,
                                function (e) {
                                    return (
                                        (e.visible || i) &&
                                        (!r || !~r.indexOf(e.writeId)) &&
                                        (Ut(e.path, t) || Ut(t, e.path))
                                    );
                                },
                                t
                            ),
                            n || qn.EMPTY_NODE
                        );
                    return null;
                }
                o = ai(e.visibleWrites, t);
                if (null != o) return o;
                e = li(e.visibleWrites, t);
                return hi(e)
                    ? n
                    : null != n || si(e, xt())
                    ? ci(e, n || qn.EMPTY_NODE)
                    : null;
            }
            function vi(e, t, n, r) {
                return yi(e.writeTree, e.treePath, t, n, r);
            }
            function gi(e, t) {
                return (function (e, t, n) {
                    var r = qn.EMPTY_NODE,
                        i = ai(e.visibleWrites, t);
                    if (i)
                        return (
                            i.isLeafNode() ||
                                i.forEachChild(Pn, function (e, t) {
                                    r = r.updateImmediateChild(e, t);
                                }),
                            r
                        );
                    if (n) {
                        var o = li(e.visibleWrites, t);
                        return (
                            n.forEachChild(Pn, function (e, t) {
                                t = ci(li(o, new Nt(e)), t);
                                r = r.updateImmediateChild(e, t);
                            }),
                            ui(o).forEach(function (e) {
                                r = r.updateImmediateChild(e.name, e.node);
                            }),
                            r
                        );
                    }
                    return (
                        ui(li(e.visibleWrites, t)).forEach(function (e) {
                            r = r.updateImmediateChild(e.name, e.node);
                        }),
                        r
                    );
                })(e.writeTree, e.treePath, t);
            }
            function mi(e, t, n, r) {
                return (
                    (i = e.writeTree),
                    (e = e.treePath),
                    (t = t),
                    (r = r),
                    g(
                        n || r,
                        "Either existingEventSnap or existingServerSnap must exist"
                    ),
                    (e = Ft(e, t)),
                    si(i.visibleWrites, e)
                        ? null
                        : hi((e = li(i.visibleWrites, e)))
                        ? r.getChild(t)
                        : ci(e, r.getChild(t))
                );
                var i;
            }
            function wi(e, t) {
                return (
                    (n = e.writeTree),
                    (t = Ft(e.treePath, t)),
                    ai(n.visibleWrites, t)
                );
                var n;
            }
            function Ci(e, t, n, r, i, o) {
                return (function (e, t, n, r, i, o, s) {
                    var a,
                        e = li(e.visibleWrites, t);
                    if (null != (t = ai(e, xt()))) a = t;
                    else {
                        if (null == n) return [];
                        a = ci(e, n);
                    }
                    if ((a = a.withIndex(s)).isEmpty() || a.isLeafNode())
                        return [];
                    for (
                        var u = [],
                            l = s.getCompare(),
                            h = o
                                ? a.getReverseIteratorFrom(r, s)
                                : a.getIteratorFrom(r, s),
                            c = h.getNext();
                        c && u.length < i;

                    )
                        0 !== l(c, r) && u.push(c), (c = h.getNext());
                    return u;
                })(e.writeTree, e.treePath, t, n, r, i, o);
            }
            function bi(e, t, n) {
                return (
                    (r = e.writeTree),
                    (i = e.treePath),
                    (e = n),
                    (t = Ft(i, (n = t))),
                    null != (i = ai(r.visibleWrites, t))
                        ? i
                        : e.isCompleteForChild(n)
                        ? ci(
                              li(r.visibleWrites, t),
                              e.getNode().getImmediateChild(n)
                          )
                        : null
                );
                var r, i;
            }
            function Ei(e, t) {
                return Si(Ft(e.treePath, t), e.writeTree);
            }
            function Si(e, t) {
                return { treePath: e, writeTree: t };
            }
            var Ti =
                ((Ii.prototype.trackChildChange = function (e) {
                    var t = e.type,
                        n = e.childName;
                    g(
                        "child_added" === t ||
                            "child_changed" === t ||
                            "child_removed" === t,
                        "Only child changes supported for tracking"
                    ),
                        g(
                            ".priority" !== n,
                            "Only non-priority child changes can be tracked."
                        );
                    var r = this.changeMap.get(n);
                    if (r) {
                        var i = r.type;
                        if ("child_added" === t && "child_removed" === i)
                            this.changeMap.set(
                                n,
                                or(n, e.snapshotNode, r.snapshotNode)
                            );
                        else if ("child_removed" === t && "child_added" === i)
                            this.changeMap.delete(n);
                        else if ("child_removed" === t && "child_changed" === i)
                            this.changeMap.set(n, ir(n, r.oldSnap));
                        else if ("child_changed" === t && "child_added" === i)
                            this.changeMap.set(n, rr(n, e.snapshotNode));
                        else {
                            if ("child_changed" !== t || "child_changed" !== i)
                                throw m(
                                    "Illegal combination of changes: " +
                                        e +
                                        " occurred after " +
                                        r
                                );
                            this.changeMap.set(
                                n,
                                or(n, e.snapshotNode, r.oldSnap)
                            );
                        }
                    } else this.changeMap.set(n, e);
                }),
                (Ii.prototype.getChanges = function () {
                    return Array.from(this.changeMap.values());
                }),
                Ii);
            function Ii() {
                this.changeMap = new Map();
            }
            function Pi() {}
            var Ni = new ((Pi.prototype.getCompleteChild = function (e) {
                    return null;
                }),
                (Pi.prototype.getChildAfterChild = function (e, t, n) {
                    return null;
                }),
                Pi)(),
                Ri =
                    ((xi.prototype.getCompleteChild = function (e) {
                        var t = this.viewCache_.eventCache;
                        if (t.isCompleteForChild(e))
                            return t.getNode().getImmediateChild(e);
                        t =
                            null != this.optCompleteServerCache_
                                ? new Ur(this.optCompleteServerCache_, !0, !1)
                                : this.viewCache_.serverCache;
                        return bi(this.writes_, e, t);
                    }),
                    (xi.prototype.getChildAfterChild = function (e, t, n) {
                        var r =
                                null != this.optCompleteServerCache_
                                    ? this.optCompleteServerCache_
                                    : Xr(this.viewCache_),
                            e = Ci(this.writes_, r, t, 1, n, e);
                        return 0 === e.length ? null : e[0];
                    }),
                    xi);
            function xi(e, t, n) {
                void 0 === n && (n = null),
                    (this.writes_ = e),
                    (this.viewCache_ = t),
                    (this.optCompleteServerCache_ = n);
            }
            function ki(e, t, n, r, i) {
                var o,
                    s,
                    a,
                    u,
                    l,
                    h,
                    c,
                    d,
                    p = new Ti();
                if (n.type === Nr.OVERWRITE)
                    var f = n,
                        _ = f.source.fromUser
                            ? Ai(e, t, f.path, f.snap, r, i, p)
                            : (g(f.source.fromServer, "Unknown source."),
                              (o =
                                  f.source.tagged ||
                                  (t.serverCache.isFiltered() && !qt(f.path))),
                              Oi(e, t, f.path, f.snap, r, i, o, p));
                else if (n.type === Nr.MERGE) {
                    var y = n;
                    _ = y.source.fromUser
                        ? ((s = e),
                          (a = t),
                          (u = y.path),
                          (f = y.children),
                          (l = r),
                          (h = i),
                          (c = p),
                          (d = a),
                          f.foreach(function (e, t) {
                              e = Ft(u, e);
                              Li(a, kt(e)) && (d = Ai(s, d, e, t, l, h, c));
                          }),
                          f.foreach(function (e, t) {
                              e = Ft(u, e);
                              Li(a, kt(e)) || (d = Ai(s, d, e, t, l, h, c));
                          }),
                          d)
                        : (g(y.source.fromServer, "Unknown source."),
                          (o = y.source.tagged || t.serverCache.isFiltered()),
                          Fi(e, t, y.path, y.children, r, i, o, p));
                } else if (n.type === Nr.ACK_USER_WRITE) {
                    var v = n;
                    _ = v.revert
                        ? (function (e, t, n, r, i, o) {
                              var s;
                              {
                                  if (null != wi(r, n)) return t;
                                  var a,
                                      u,
                                      l = new Ri(r, t, i),
                                      h = t.eventCache.getNode(),
                                      i = void 0;
                                  return (
                                      qt(n) || ".priority" === kt(n)
                                          ? ((u = void 0),
                                            (u =
                                                t.serverCache.isFullyInitialized()
                                                    ? vi(r, Xr(t))
                                                    : ((a =
                                                          t.serverCache.getNode()),
                                                      g(
                                                          a instanceof qn,
                                                          "serverChildren would be complete if leaf node"
                                                      ),
                                                      gi(r, a))),
                                            (i = e.filter.updateFullNode(
                                                h,
                                                u,
                                                o
                                            )))
                                          : ((a = kt(n)),
                                            null ==
                                                (u = bi(r, a, t.serverCache)) &&
                                                t.serverCache.isCompleteForChild(
                                                    a
                                                ) &&
                                                (u = h.getImmediateChild(a)),
                                            (i =
                                                null != u
                                                    ? e.filter.updateChild(
                                                          h,
                                                          a,
                                                          u,
                                                          Ot(n),
                                                          l,
                                                          o
                                                      )
                                                    : t.eventCache
                                                          .getNode()
                                                          .hasChild(a)
                                                    ? e.filter.updateChild(
                                                          h,
                                                          a,
                                                          qn.EMPTY_NODE,
                                                          Ot(n),
                                                          l,
                                                          o
                                                      )
                                                    : h).isEmpty() &&
                                                t.serverCache.isFullyInitialized() &&
                                                (s = vi(
                                                    r,
                                                    Xr(t)
                                                )).isLeafNode() &&
                                                (i = e.filter.updateFullNode(
                                                    i,
                                                    s,
                                                    o
                                                ))),
                                      (s =
                                          t.serverCache.isFullyInitialized() ||
                                          null != wi(r, xt())),
                                      Gr(t, i, s, e.filter.filtersNodes())
                                  );
                              }
                          })(e, t, v.path, r, i, p)
                        : (function (e, t, r, n, i, o, s) {
                              if (null != wi(i, r)) return t;
                              var a = t.serverCache.isFiltered(),
                                  u = t.serverCache;
                              {
                                  if (null != n.value) {
                                      if (
                                          (qt(r) && u.isFullyInitialized()) ||
                                          u.isCompleteForPath(r)
                                      )
                                          return Oi(
                                              e,
                                              t,
                                              r,
                                              u.getNode().getChild(r),
                                              i,
                                              o,
                                              a,
                                              s
                                          );
                                      if (qt(r)) {
                                          var l = new Zr(null);
                                          return (
                                              u
                                                  .getNode()
                                                  .forEachChild(
                                                      an,
                                                      function (e, t) {
                                                          l = l.set(
                                                              new Nt(e),
                                                              t
                                                          );
                                                      }
                                                  ),
                                              Fi(e, t, r, l, i, o, a, s)
                                          );
                                      }
                                      return t;
                                  }
                                  var h = new Zr(null);
                                  return (
                                      n.foreach(function (e, t) {
                                          var n = Ft(r, e);
                                          u.isCompleteForPath(n) &&
                                              (h = h.set(
                                                  e,
                                                  u.getNode().getChild(n)
                                              ));
                                      }),
                                      Fi(e, t, r, h, i, o, a, s)
                                  );
                              }
                          })(e, t, v.path, v.affectedTree, r, i, p);
                } else {
                    if (n.type !== Nr.LISTEN_COMPLETE)
                        throw m("Unknown operation type: " + n.type);
                    (o = e),
                        (v = t),
                        (i = n.path),
                        (e = r),
                        (n = p),
                        (r = v.serverCache),
                        (r = $r(
                            v,
                            r.getNode(),
                            r.isFullyInitialized() || qt(i),
                            r.isFiltered()
                        )),
                        (_ = Di(o, r, i, e, Ni, n));
                }
                p = p.getChanges();
                return (
                    (function (e, t, n) {
                        var r = t.eventCache;
                        {
                            var i, o;
                            r.isFullyInitialized() &&
                                ((i =
                                    r.getNode().isLeafNode() ||
                                    r.getNode().isEmpty()),
                                (o = Jr(e)),
                                (0 < n.length ||
                                    !e.eventCache.isFullyInitialized() ||
                                    (i && !r.getNode().equals(o)) ||
                                    !r
                                        .getNode()
                                        .getPriority()
                                        .equals(o.getPriority())) &&
                                    n.push(nr(Jr(t))));
                        }
                    })(t, _, p),
                    { viewCache: _, changes: p }
                );
            }
            function Di(e, t, n, r, i, o) {
                var s = t.eventCache;
                if (null != wi(r, n)) return t;
                var a,
                    u,
                    l,
                    h,
                    c = void 0,
                    d = void 0;
                return (
                    (c = qt(n)
                        ? (g(
                              t.serverCache.isFullyInitialized(),
                              "If change path is empty, we must have complete server data"
                          ),
                          t.serverCache.isFiltered()
                              ? ((a = gi(
                                    r,
                                    (a = Xr(t)) instanceof qn
                                        ? a
                                        : qn.EMPTY_NODE
                                )),
                                e.filter.updateFullNode(
                                    t.eventCache.getNode(),
                                    a,
                                    o
                                ))
                              : ((u = vi(r, Xr(t))),
                                e.filter.updateFullNode(
                                    t.eventCache.getNode(),
                                    u,
                                    o
                                )))
                        : ".priority" === (u = kt(n))
                        ? (g(
                              1 === Dt(n),
                              "Can't have a priority with additional path components"
                          ),
                          null !=
                          (h = mi(
                              r,
                              n,
                              (l = s.getNode()),
                              (d = t.serverCache.getNode())
                          ))
                              ? e.filter.updatePriority(l, h)
                              : s.getNode())
                        : ((l = Ot(n)),
                          (h = void 0),
                          null !=
                          (h = s.isCompleteForChild(u)
                              ? ((d = t.serverCache.getNode()),
                                null != (d = mi(r, n, s.getNode(), d))
                                    ? s
                                          .getNode()
                                          .getImmediateChild(u)
                                          .updateChild(l, d)
                                    : s.getNode().getImmediateChild(u))
                              : bi(r, u, t.serverCache))
                              ? e.filter.updateChild(s.getNode(), u, h, l, i, o)
                              : s.getNode())),
                    Gr(
                        t,
                        c,
                        s.isFullyInitialized() || qt(n),
                        e.filter.filtersNodes()
                    )
                );
            }
            function Oi(e, t, n, r, i, o, s, a) {
                var u = t.serverCache,
                    l = s ? e.filter : e.filter.getIndexedFilter();
                if (qt(n)) c = l.updateFullNode(u.getNode(), r, null);
                else if (l.filtersNodes() && !u.isFiltered())
                    var h = u.getNode().updateChild(n, r),
                        c = l.updateFullNode(u.getNode(), h, null);
                else {
                    s = kt(n);
                    if (!u.isCompleteForPath(n) && 1 < Dt(n)) return t;
                    (h = Ot(n)),
                        (r = u
                            .getNode()
                            .getImmediateChild(s)
                            .updateChild(h, r));
                    c =
                        ".priority" === s
                            ? l.updatePriority(u.getNode(), r)
                            : l.updateChild(u.getNode(), s, r, h, Ni, null);
                }
                l = $r(t, c, u.isFullyInitialized() || qt(n), l.filtersNodes());
                return Di(e, l, n, i, new Ri(i, l, o), a);
            }
            function Ai(e, t, n, r, i, o, s) {
                var a,
                    u,
                    l = t.eventCache,
                    h = new Ri(i, t, o);
                return qt(n)
                    ? ((u = e.filter.updateFullNode(
                          t.eventCache.getNode(),
                          r,
                          s
                      )),
                      Gr(t, u, !0, e.filter.filtersNodes()))
                    : ".priority" === (a = kt(n))
                    ? ((u = e.filter.updatePriority(t.eventCache.getNode(), r)),
                      Gr(t, u, l.isFullyInitialized(), l.isFiltered()))
                    : ((i = Ot(n)),
                      (o = l.getNode().getImmediateChild(a)),
                      (u = void 0),
                      (u = qt(i)
                          ? r
                          : null != (n = h.getCompleteChild(a))
                          ? ".priority" === At(i) && n.getChild(Mt(i)).isEmpty()
                              ? n
                              : n.updateChild(i, r)
                          : qn.EMPTY_NODE),
                      o.equals(u)
                          ? t
                          : Gr(
                                t,
                                e.filter.updateChild(
                                    l.getNode(),
                                    a,
                                    u,
                                    i,
                                    h,
                                    s
                                ),
                                l.isFullyInitialized(),
                                e.filter.filtersNodes()
                            ));
            }
            function Li(e, t) {
                return e.eventCache.isCompleteForChild(t);
            }
            function Mi(e, n, t) {
                return (
                    t.foreach(function (e, t) {
                        n = n.updateChild(e, t);
                    }),
                    n
                );
            }
            function Fi(r, i, e, t, o, s, a, u) {
                if (
                    i.serverCache.getNode().isEmpty() &&
                    !i.serverCache.isFullyInitialized()
                )
                    return i;
                var l = i,
                    t = qt(e) ? t : new Zr(null).setTree(e, t),
                    h = i.serverCache.getNode();
                return (
                    t.children.inorderTraversal(function (e, t) {
                        h.hasChild(e) &&
                            ((t = Mi(
                                0,
                                i.serverCache.getNode().getImmediateChild(e),
                                t
                            )),
                            (l = Oi(r, l, new Nt(e), t, o, s, a, u)));
                    }),
                    t.children.inorderTraversal(function (e, t) {
                        var n =
                            !i.serverCache.isCompleteForChild(e) &&
                            void 0 === t.value;
                        h.hasChild(e) ||
                            n ||
                            ((t = Mi(
                                0,
                                i.serverCache.getNode().getImmediateChild(e),
                                t
                            )),
                            (l = Oi(r, l, new Nt(e), t, o, s, a, u)));
                    }),
                    l
                );
            }
            var qi,
                Wi =
                    (Object.defineProperty(Qi.prototype, "query", {
                        get: function () {
                            return this.query_;
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    Qi);
            function Qi(e, t) {
                (this.query_ = e), (this.eventRegistrations_ = []);
                var n = this.query_.getQueryParams(),
                    r = new sr(n.getIndex()),
                    i = (o = n).loadsAllData()
                        ? new sr(o.getIndex())
                        : new (o.hasLimit() ? hr : ur)(o);
                this.processor_ = { filter: i };
                var e = t.serverCache,
                    n = t.eventCache,
                    o = r.updateFullNode(qn.EMPTY_NODE, e.getNode(), null),
                    t = i.updateFullNode(qn.EMPTY_NODE, n.getNode(), null),
                    r = new Ur(o, e.isFullyInitialized(), r.filtersNodes()),
                    i = new Ur(t, n.isFullyInitialized(), i.filtersNodes());
                (this.viewCache_ = Yr(i, r)),
                    (this.eventGenerator_ = new Vr(this.query_));
            }
            function ji(e) {
                return 0 === e.eventRegistrations_.length;
            }
            function Ui(e, t, n) {
                var r,
                    i = [];
                if (
                    (n &&
                        (g(
                            null == t,
                            "A cancel should cancel all event registrations."
                        ),
                        (r = e.query.path),
                        e.eventRegistrations_.forEach(function (e) {
                            e = e.createCancelEvent(n, r);
                            e && i.push(e);
                        })),
                    t)
                ) {
                    for (
                        var o = [], s = 0;
                        s < e.eventRegistrations_.length;
                        ++s
                    ) {
                        var a = e.eventRegistrations_[s];
                        if (a.matches(t)) {
                            if (t.hasAnyCallback()) {
                                o = o.concat(
                                    e.eventRegistrations_.slice(s + 1)
                                );
                                break;
                            }
                        } else o.push(a);
                    }
                    e.eventRegistrations_ = o;
                } else e.eventRegistrations_ = [];
                return i;
            }
            function Bi(e, t, n, r) {
                t.type === Nr.MERGE &&
                    null !== t.source.queryId &&
                    (g(
                        Xr(e.viewCache_),
                        "We should always have a full cache before handling merges"
                    ),
                    g(
                        Jr(e.viewCache_),
                        "Missing event cache, even though we have a server cache"
                    ));
                var i = e.viewCache_,
                    t = ki(e.processor_, i, t, n, r);
                return (
                    (n = e.processor_),
                    (r = t.viewCache),
                    g(
                        r.eventCache.getNode().isIndexed(n.filter.getIndex()),
                        "Event snap not indexed"
                    ),
                    g(
                        r.serverCache.getNode().isIndexed(n.filter.getIndex()),
                        "Server snap not indexed"
                    ),
                    g(
                        t.viewCache.serverCache.isFullyInitialized() ||
                            !i.serverCache.isFullyInitialized(),
                        "Once a server snap is complete, it should never go back"
                    ),
                    (e.viewCache_ = t.viewCache),
                    Hi(e, t.changes, t.viewCache.eventCache.getNode(), null)
                );
            }
            function Hi(e, t, n, r) {
                r = r ? [r] : e.eventRegistrations_;
                return zr(e.eventGenerator_, t, n, r);
            }
            var Vi = function () {
                this.views = new Map();
            };
            function zi(e, t, n, r) {
                var i,
                    o,
                    s = t.source.queryId;
                if (null !== s) {
                    var a = e.views.get(s);
                    return (
                        g(
                            null != a,
                            "SyncTree gave us an op for an invalid query."
                        ),
                        Bi(a, t, n, r)
                    );
                }
                var u = [];
                try {
                    for (
                        var l = _(e.views.values()), h = l.next();
                        !h.done;
                        h = l.next()
                    )
                        (a = h.value), (u = u.concat(Bi(a, t, n, r)));
                } catch (e) {
                    i = { error: e };
                } finally {
                    try {
                        h && !h.done && (o = l.return) && o.call(l);
                    } finally {
                        if (i) throw i.error;
                    }
                }
                return u;
            }
            function Ki(e, t, n, r, i) {
                var o = t.queryIdentifier(),
                    e = e.views.get(o);
                if (e) return e;
                (o = vi(n, i ? r : null)),
                    (e = !1),
                    (e =
                        !!o ||
                        ((o = r instanceof qn ? gi(n, r) : qn.EMPTY_NODE), !1)),
                    (i = Yr(new Ur(o, e, !1), new Ur(r, i, !1)));
                return new Wi(t, i);
            }
            function Yi(e, t, n, r, i, o) {
                var s,
                    o = Ki(e, t, r, i, o);
                return (
                    e.views.has(t.queryIdentifier()) ||
                        e.views.set(t.queryIdentifier(), o),
                    (t = n),
                    o.eventRegistrations_.push(t),
                    (t = n),
                    (o = (n = o).viewCache_.eventCache),
                    (s = []),
                    o.getNode().isLeafNode() ||
                        o.getNode().forEachChild(Pn, function (e, t) {
                            s.push(rr(e, t));
                        }),
                    o.isFullyInitialized() && s.push(nr(o.getNode())),
                    Hi(n, s, o.getNode(), t)
                );
            }
            function Gi(e, t, n, r) {
                var i,
                    o,
                    s = t.queryIdentifier(),
                    a = [],
                    u = [],
                    l = eo(e);
                if ("default" === s)
                    try {
                        for (
                            var h = _(e.views.entries()), c = h.next();
                            !c.done;
                            c = h.next()
                        ) {
                            var d = y(c.value, 2),
                                p = d[0],
                                f = d[1],
                                u = u.concat(Ui(f, n, r));
                            ji(f) &&
                                (e.views.delete(p),
                                f.query.getQueryParams().loadsAllData() ||
                                    a.push(f.query));
                        }
                    } catch (e) {
                        i = { error: e };
                    } finally {
                        try {
                            c && !c.done && (o = h.return) && o.call(h);
                        } finally {
                            if (i) throw i.error;
                        }
                    }
                else
                    (f = e.views.get(s)) &&
                        ((u = u.concat(Ui(f, n, r))),
                        ji(f) &&
                            (e.views.delete(s),
                            f.query.getQueryParams().loadsAllData() ||
                                a.push(f.query)));
                return (
                    l &&
                        !eo(e) &&
                        a.push(
                            (g(qi, "Reference.ts has not been loaded"),
                            new qi(t.database, t.path))
                        ),
                    { removed: a, events: u }
                );
            }
            function $i(e) {
                var t,
                    n,
                    r = [];
                try {
                    for (
                        var i = _(e.views.values()), o = i.next();
                        !o.done;
                        o = i.next()
                    ) {
                        var s = o.value;
                        s.query.getQueryParams().loadsAllData() || r.push(s);
                    }
                } catch (e) {
                    t = { error: e };
                } finally {
                    try {
                        o && !o.done && (n = i.return) && n.call(i);
                    } finally {
                        if (t) throw t.error;
                    }
                }
                return r;
            }
            function Ji(e, t) {
                var n,
                    r,
                    i,
                    o,
                    s = null;
                try {
                    for (
                        var a = _(e.views.values()), u = a.next();
                        !u.done;
                        u = a.next()
                    )
                        var l = u.value,
                            s =
                                s ||
                                ((i = t),
                                (o = void 0),
                                (o = Xr((l = l).viewCache_)) &&
                                (l.query.getQueryParams().loadsAllData() ||
                                    (!qt(i) &&
                                        !o.getImmediateChild(kt(i)).isEmpty()))
                                    ? o.getChild(i)
                                    : null);
                } catch (e) {
                    n = { error: e };
                } finally {
                    try {
                        u && !u.done && (r = a.return) && r.call(a);
                    } finally {
                        if (n) throw n.error;
                    }
                }
                return s;
            }
            function Xi(e, t) {
                if (t.getQueryParams().loadsAllData()) return to(e);
                t = t.queryIdentifier();
                return e.views.get(t);
            }
            function Zi(e, t) {
                return null != Xi(e, t);
            }
            function eo(e) {
                return null != to(e);
            }
            function to(e) {
                var t, n;
                try {
                    for (
                        var r = _(e.views.values()), i = r.next();
                        !i.done;
                        i = r.next()
                    ) {
                        var o = i.value;
                        if (o.query.getQueryParams().loadsAllData()) return o;
                    }
                } catch (e) {
                    t = { error: e };
                } finally {
                    try {
                        i && !i.done && (n = r.return) && n.call(r);
                    } finally {
                        if (t) throw t.error;
                    }
                }
                return null;
            }
            var no = 1,
                ro = function (e) {
                    (this.listenProvider_ = e),
                        (this.syncPointTree_ = new Zr(null)),
                        (this.pendingWriteTree_ = {
                            visibleWrites: ti.empty(),
                            allWrites: [],
                            lastWriteId: -1,
                        }),
                        (this.tagToQueryMap = new Map()),
                        (this.queryToTagMap = new Map());
                };
            function io(e, t, n, r, i) {
                var o, s, a, u;
                return (
                    (o = e.pendingWriteTree_),
                    (s = t),
                    (a = n),
                    (u = i),
                    g(
                        (r = r) > o.lastWriteId,
                        "Stacking an older write on top of newer ones"
                    ),
                    void 0 === u && (u = !0),
                    o.allWrites.push({
                        path: s,
                        snap: a,
                        writeId: r,
                        visible: u,
                    }),
                    u && (o.visibleWrites = ri(o.visibleWrites, s, a)),
                    (o.lastWriteId = r),
                    i ? po(e, new qr(kr(), t, n)) : []
                );
            }
            function oo(e, t, n, r) {
                var i, o, s;
                (i = e.pendingWriteTree_),
                    (o = t),
                    (s = n),
                    g(
                        (r = r) > i.lastWriteId,
                        "Stacking an older merge on top of newer ones"
                    ),
                    i.allWrites.push({
                        path: o,
                        children: s,
                        writeId: r,
                        visible: !0,
                    }),
                    (i.visibleWrites = ii(i.visibleWrites, o, s)),
                    (i.lastWriteId = r);
                n = Zr.fromObject(n);
                return po(e, new Qr(kr(), t, n));
            }
            function so(e, t, n) {
                void 0 === n && (n = !1);
                var r = (function (e, t) {
                    for (var n = 0; n < e.allWrites.length; n++) {
                        var r = e.allWrites[n];
                        if (r.writeId === t) return r;
                    }
                    return null;
                })(e.pendingWriteTree_, t);
                if (pi(e.pendingWriteTree_, t)) {
                    var i = new Zr(null);
                    return (
                        null != r.snap
                            ? (i = i.set(xt(), !0))
                            : De(r.children, function (e) {
                                  i = i.set(new Nt(e), !0);
                              }),
                        po(e, new Ar(r.path, i, n))
                    );
                }
                return [];
            }
            function ao(e, t, n) {
                return po(e, new qr(Dr(), t, n));
            }
            function uo(n, e, t, r) {
                var i = e.path,
                    o = n.syncPointTree_.get(i),
                    s = [];
                if (o && ("default" === e.queryIdentifier() || Zi(o, e))) {
                    var a = Gi(o, e, t, r);
                    0 === o.views.size &&
                        (n.syncPointTree_ = n.syncPointTree_.remove(i));
                    (t = a.removed),
                        (s = a.events),
                        (o =
                            -1 !==
                            t.findIndex(function (e) {
                                return e.getQueryParams().loadsAllData();
                            })),
                        (a = n.syncPointTree_.findOnPath(i, function (e, t) {
                            return eo(t);
                        }));
                    if (o && !a) {
                        i = n.syncPointTree_.subtree(i);
                        if (!i.isEmpty())
                            for (
                                var u = i.fold(function (e, t, n) {
                                        if (t && eo(t)) return [to(t)];
                                        var r = [];
                                        return (
                                            t && (r = $i(t)),
                                            De(n, function (e, t) {
                                                r = r.concat(t);
                                            }),
                                            r
                                        );
                                    }),
                                    l = 0;
                                l < u.length;
                                ++l
                            ) {
                                var h = u[l],
                                    c = h.query,
                                    h = _o(n, h);
                                n.listenProvider_.startListening(
                                    Co(c),
                                    yo(n, c),
                                    h.hashFn,
                                    h.onComplete
                                );
                            }
                    }
                    !a &&
                        0 < t.length &&
                        !r &&
                        (o
                            ? n.listenProvider_.stopListening(Co(e), null)
                            : t.forEach(function (e) {
                                  var t = n.queryToTagMap.get(vo(e));
                                  n.listenProvider_.stopListening(Co(e), t);
                              })),
                        (function (e, t) {
                            for (var n = 0; n < t.length; ++n) {
                                var r,
                                    i = t[n];
                                i.getQueryParams().loadsAllData() ||
                                    ((r = vo(i)),
                                    (i = e.queryToTagMap.get(r)),
                                    e.queryToTagMap.delete(r),
                                    e.tagToQueryMap.delete(i));
                            }
                        })(n, t);
                }
                return s;
            }
            function lo(e, t, n) {
                var r = t.path,
                    i = null,
                    o = !1;
                e.syncPointTree_.foreachOnPath(r, function (e, t) {
                    e = Wt(e, r);
                    (i = i || Ji(t, e)), (o = o || eo(t));
                });
                var s = e.syncPointTree_.get(r);
                s
                    ? ((o = o || eo(s)), (i = i || Ji(s, xt())))
                    : ((s = new Vi()),
                      (e.syncPointTree_ = e.syncPointTree_.set(r, s))),
                    null != i
                        ? (h = !0)
                        : ((h = !1),
                          (i = qn.EMPTY_NODE),
                          e.syncPointTree_
                              .subtree(r)
                              .foreachChild(function (e, t) {
                                  t = Ji(t, xt());
                                  t && (i = i.updateImmediateChild(e, t));
                              }));
                var a,
                    u,
                    l = Zi(s, t);
                l ||
                    t.getQueryParams().loadsAllData() ||
                    ((a = vo(t)),
                    g(
                        !e.queryToTagMap.has(a),
                        "View does not exist, but we have a tag"
                    ),
                    (u = no++),
                    e.queryToTagMap.set(a, u),
                    e.tagToQueryMap.set(u, a));
                var h = Yi(s, t, n, di(e.pendingWriteTree_, r), i, h);
                return (
                    l ||
                        o ||
                        ((s = Xi(s, t)),
                        (h = h.concat(
                            (function (e, t, n) {
                                var r = t.path,
                                    i = yo(e, t),
                                    n = _o(e, n),
                                    n = e.listenProvider_.startListening(
                                        Co(t),
                                        i,
                                        n.hashFn,
                                        n.onComplete
                                    ),
                                    r = e.syncPointTree_.subtree(r);
                                if (i)
                                    g(
                                        !eo(r.value),
                                        "If we're adding a query, it shouldn't be shadowed"
                                    );
                                else
                                    for (
                                        var o = r.fold(function (e, t, n) {
                                                if (!qt(e) && t && eo(t))
                                                    return [to(t).query];
                                                var r = [];
                                                return (
                                                    t &&
                                                        (r = r.concat(
                                                            $i(t).map(function (
                                                                e
                                                            ) {
                                                                return e.query;
                                                            })
                                                        )),
                                                    De(n, function (e, t) {
                                                        r = r.concat(t);
                                                    }),
                                                    r
                                                );
                                            }),
                                            s = 0;
                                        s < o.length;
                                        ++s
                                    ) {
                                        var a = o[s];
                                        e.listenProvider_.stopListening(
                                            Co(a),
                                            yo(e, a)
                                        );
                                    }
                                return n;
                            })(e, t, s)
                        ))),
                    h
                );
            }
            function ho(e, n, t) {
                var r = e.pendingWriteTree_,
                    e = e.syncPointTree_.findOnPath(n, function (e, t) {
                        e = Ji(t, Wt(e, n));
                        if (e) return e;
                    });
                return yi(r, n, e, t, !0);
            }
            function co(e, t) {
                var n = t.path,
                    r = null;
                e.syncPointTree_.foreachOnPath(n, function (e, t) {
                    e = Wt(e, n);
                    r = r || Ji(t, e);
                });
                var i = e.syncPointTree_.get(n);
                i
                    ? (r = r || Ji(i, xt()))
                    : ((i = new Vi()),
                      (e.syncPointTree_ = e.syncPointTree_.set(n, i)));
                var o = null != r,
                    s = o ? new Ur(r, !0, !1) : null,
                    o = Ki(
                        i,
                        t,
                        di(e.pendingWriteTree_, t.path),
                        o ? s.getNode() : qn.EMPTY_NODE,
                        o
                    );
                return Jr(o.viewCache_);
            }
            function po(e, t) {
                return (function e(t, n, r, i) {
                    {
                        if (qt(t.path)) return fo(t, n, r, i);
                        var o = n.get(xt());
                        null == r && null != o && (r = Ji(o, xt()));
                        var s = [],
                            a = kt(t.path),
                            u = t.operationForChild(a),
                            l = n.children.get(a);
                        return (
                            l &&
                                u &&
                                ((n = r ? r.getImmediateChild(a) : null),
                                (a = Ei(i, a)),
                                (s = s.concat(e(u, l, n, a)))),
                            (s = o ? s.concat(zi(o, t, i, r)) : s)
                        );
                    }
                })(t, e.syncPointTree_, null, di(e.pendingWriteTree_, xt()));
            }
            function fo(i, e, o, s) {
                var t = e.get(xt());
                null == o && null != t && (o = Ji(t, xt()));
                var a = [];
                return (
                    e.children.inorderTraversal(function (e, t) {
                        var n = o ? o.getImmediateChild(e) : null,
                            r = Ei(s, e),
                            e = i.operationForChild(e);
                        e && (a = a.concat(fo(e, t, n, r)));
                    }),
                    (a = t ? a.concat(zi(t, i, s, o)) : a)
                );
            }
            function _o(r, e) {
                var i = e.query,
                    o = yo(r, i);
                return {
                    hashFn: function () {
                        return (
                            e.viewCache_.serverCache.getNode() || qn.EMPTY_NODE
                        ).hash();
                    },
                    onComplete: function (e) {
                        if ("ok" === e)
                            return o
                                ? (function (e, t, n) {
                                      var r = go(e, n);
                                      if (r) {
                                          (n = mo(r)),
                                              (r = n.path),
                                              (n = n.queryId),
                                              (t = Wt(r, t));
                                          return wo(e, r, new Mr(Or(n), t));
                                      }
                                      return [];
                                  })(r, i.path, o)
                                : ((t = r),
                                  (n = i.path),
                                  po(t, new Mr(Dr(), n)));
                        var t,
                            n,
                            e = Le(e, i);
                        return uo(r, i, null, e);
                    },
                };
            }
            function yo(e, t) {
                t = vo(t);
                return e.queryToTagMap.get(t);
            }
            function vo(e) {
                return e.path.toString() + "$" + e.queryIdentifier();
            }
            function go(e, t) {
                return e.tagToQueryMap.get(t);
            }
            function mo(e) {
                var t = e.indexOf("$");
                return (
                    g(-1 !== t && t < e.length - 1, "Bad queryKey."),
                    { queryId: e.substr(t + 1), path: new Nt(e.substr(0, t)) }
                );
            }
            function wo(e, t, n) {
                var r = e.syncPointTree_.get(t);
                return (
                    g(
                        r,
                        "Missing sync point for query tag that we're tracking"
                    ),
                    zi(r, n, di(e.pendingWriteTree_, t), null)
                );
            }
            function Co(e) {
                return e.getQueryParams().loadsAllData() &&
                    !e.getQueryParams().isDefault()
                    ? e.getRef()
                    : e;
            }
            var bo =
                ((Eo.prototype.getImmediateChild = function (e) {
                    return new Eo(this.node_.getImmediateChild(e));
                }),
                (Eo.prototype.node = function () {
                    return this.node_;
                }),
                Eo);
            function Eo(e) {
                this.node_ = e;
            }
            var So =
                ((To.prototype.getImmediateChild = function (e) {
                    e = Ft(this.path_, e);
                    return new To(this.syncTree_, e);
                }),
                (To.prototype.node = function () {
                    return ho(this.syncTree_, this.path_);
                }),
                To);
            function To(e, t) {
                (this.syncTree_ = e), (this.path_ = t);
            }
            var Io = function (e) {
                    return (
                        ((e = e || {}).timestamp =
                            e.timestamp || new Date().getTime()),
                        e
                    );
                },
                Po = function (e, t, n) {
                    return e && "object" == typeof e
                        ? (g(
                              ".sv" in e,
                              "Unexpected leaf node or priority contents"
                          ),
                          "string" == typeof e[".sv"]
                              ? No(e[".sv"], t, n)
                              : "object" == typeof e[".sv"]
                              ? Ro(e[".sv"], t)
                              : void g(
                                    !1,
                                    "Unexpected server value: " +
                                        JSON.stringify(e, null, 2)
                                ))
                        : e;
                },
                No = function (e, t, n) {
                    if ("timestamp" === e) return n.timestamp;
                    g(!1, "Unexpected server value: " + e);
                },
                Ro = function (e, t, n) {
                    e.hasOwnProperty("increment") ||
                        g(
                            !1,
                            "Unexpected server value: " +
                                JSON.stringify(e, null, 2)
                        );
                    e = e.increment;
                    "number" != typeof e &&
                        g(!1, "Unexpected increment value: " + e);
                    t = t.node();
                    if (
                        (g(
                            null != t,
                            "Expected ChildrenNode.EMPTY_NODE for nulls"
                        ),
                        !t.isLeafNode())
                    )
                        return e;
                    t = t.getValue();
                    return "number" != typeof t ? e : t + e;
                },
                xo = function (e, t, n, r) {
                    return Do(t, new So(n, e), r);
                },
                ko = function (e, t, n) {
                    return Do(e, new bo(t), n);
                };
            function Do(e, r, i) {
                var t = e.getPriority().val(),
                    n = Po(t, r.getImmediateChild(".priority"), i);
                if (e.isLeafNode()) {
                    var o = e,
                        t = Po(o.getValue(), r, i);
                    return t !== o.getValue() || n !== o.getPriority().val()
                        ? new Sn(t, Bn(n))
                        : e;
                }
                var e = e,
                    s = e;
                return (
                    n !== e.getPriority().val() &&
                        (s = s.updatePriority(new Sn(n))),
                    e.forEachChild(Pn, function (e, t) {
                        var n = Do(t, r.getImmediateChild(e), i);
                        n !== t && (s = s.updateImmediateChild(e, n));
                    }),
                    s
                );
            }
            var Oo = function (e, t, n) {
                void 0 === e && (e = ""),
                    void 0 === t && (t = null),
                    void 0 === n && (n = { children: {}, childCount: 0 }),
                    (this.name = e),
                    (this.parent = t),
                    (this.node = n);
            };
            function Ao(e, t) {
                for (
                    var n = t instanceof Nt ? t : new Nt(t), r = e, i = kt(n);
                    null !== i;

                )
                    var o = O(r.node.children, i) || {
                            children: {},
                            childCount: 0,
                        },
                        r = new Oo(i, r, o),
                        i = kt((n = Ot(n)));
                return r;
            }
            function Lo(e) {
                return e.node.value;
            }
            function Mo(e, t) {
                (e.node.value = t), Qo(e);
            }
            function Fo(e) {
                return 0 < e.node.childCount;
            }
            function qo(n, r) {
                De(n.node.children, function (e, t) {
                    r(new Oo(e, n, t));
                });
            }
            function Wo(e) {
                return new Nt(
                    null === e.parent ? e.name : Wo(e.parent) + "/" + e.name
                );
            }
            function Qo(e) {
                var t, n, r, i;
                null !== e.parent &&
                    ((t = e.parent),
                    (n = e.name),
                    (i = (function (e) {
                        return void 0 === Lo(e) && !Fo(e);
                    })((r = e))),
                    (e = D(t.node.children, n)),
                    i && e
                        ? (delete t.node.children[n],
                          t.node.childCount--,
                          Qo(t))
                        : i ||
                          e ||
                          ((t.node.children[n] = r.node),
                          t.node.childCount++,
                          Qo(t)));
            }
            function jo(e) {
                return "string" == typeof e && 0 !== e.length && !Jo.test(e);
            }
            function Uo(e) {
                return "string" == typeof e && 0 !== e.length && !Xo.test(e);
            }
            function Bo(e) {
                return (
                    null === e ||
                    "string" == typeof e ||
                    ("number" == typeof e && !ce(e)) ||
                    (e && "object" == typeof e && D(e, ".sv"))
                );
            }
            function Ho(e, t, n, r, i) {
                (i && void 0 === n) || es(Q(e, t, i), n, r);
            }
            function Vo(e, t, n, r, i) {
                if (!i || void 0 !== n) {
                    var o = Q(e, t, i);
                    if (!n || "object" != typeof n || Array.isArray(n))
                        throw new Error(
                            o +
                                " must be an object containing the children to replace."
                        );
                    var s = [];
                    De(n, function (e, t) {
                        e = new Nt(e);
                        if (
                            (es(o, t, Ft(r, e)),
                            ".priority" === At(e) && !Bo(t))
                        )
                            throw new Error(
                                o +
                                    "contains an invalid value for '" +
                                    e.toString() +
                                    "', which must be a valid Firebase priority (a string, finite number, server value, or null)."
                            );
                        s.push(e);
                    }),
                        (function (e, t) {
                            for (var n = 0; n < t.length; n++)
                                for (
                                    var r, i = Lt((r = t[n])), o = 0;
                                    o < i.length;
                                    o++
                                )
                                    if (
                                        (".priority" !== i[o] ||
                                            o !== i.length - 1) &&
                                        !jo(i[o])
                                    )
                                        throw new Error(
                                            e +
                                                "contains an invalid key (" +
                                                i[o] +
                                                ") in path " +
                                                r.toString() +
                                                '. Keys must be non-empty strings and can\'t contain ".", "#", "$", "/", "[", or "]"'
                                        );
                            t.sort(Qt);
                            var s = null;
                            for (n = 0; n < t.length; n++) {
                                if (((r = t[n]), null !== s && Ut(s, r)))
                                    throw new Error(
                                        e +
                                            "contains a path " +
                                            s.toString() +
                                            " that is ancestor of another path " +
                                            r.toString()
                                    );
                                s = r;
                            }
                        })(o, s);
                }
            }
            function zo(e, t, n, r) {
                if (!r || void 0 !== n) {
                    if (ce(n))
                        throw new Error(
                            Q(e, t, r) +
                                "is " +
                                n.toString() +
                                ", but must be a valid Firebase priority (a string, finite number, server value, or null)."
                        );
                    if (!Bo(n))
                        throw new Error(
                            Q(e, t, r) +
                                "must be a valid Firebase priority (a string, finite number, server value, or null)."
                        );
                }
            }
            function Ko(e, t, n, r) {
                if (!r || void 0 !== n)
                    switch (n) {
                        case "value":
                        case "child_added":
                        case "child_removed":
                        case "child_changed":
                        case "child_moved":
                            break;
                        default:
                            throw new Error(
                                Q(e, t, r) +
                                    'must be a valid event type = "value", "child_added", "child_removed", "child_changed", or "child_moved".'
                            );
                    }
            }
            function Yo(e, t, n, r) {
                if (!((r && void 0 === n) || jo(n)))
                    throw new Error(
                        Q(e, t, r) +
                            'was an invalid key = "' +
                            n +
                            '".  Firebase keys must be non-empty strings and can\'t contain ".", "#", "$", "/", "[", or "]").'
                    );
            }
            function Go(e, t, n, r) {
                if (!((r && void 0 === n) || Uo(n)))
                    throw new Error(
                        Q(e, t, r) +
                            'was an invalid path = "' +
                            n +
                            '". Paths must be non-empty strings and can\'t contain ".", "#", "$", "[", or "]"'
                    );
            }
            function $o(e, t) {
                if (".info" === kt(t))
                    throw new Error(
                        e + " failed = Can't modify data under /.info/"
                    );
            }
            var Jo = /[\[\].#$\/\u0000-\u001F\u007F]/,
                Xo = /[\[\].#$\u0000-\u001F\u007F]/,
                Zo = 10485760,
                es = function (r, e, t) {
                    var i = t instanceof Nt ? new Bt(t, r) : t;
                    if (void 0 === e)
                        throw new Error(r + "contains undefined " + Vt(i));
                    if ("function" == typeof e)
                        throw new Error(
                            r +
                                "contains a function " +
                                Vt(i) +
                                " with contents = " +
                                e.toString()
                        );
                    if (ce(e))
                        throw new Error(
                            r + "contains " + e.toString() + " " + Vt(i)
                        );
                    if ("string" == typeof e && e.length > Zo / 3 && B(e) > Zo)
                        throw new Error(
                            r +
                                "contains a string greater than " +
                                Zo +
                                " utf8 bytes " +
                                Vt(i) +
                                " ('" +
                                e.substring(0, 50) +
                                "...')"
                        );
                    if (e && "object" == typeof e) {
                        var o = !1,
                            s = !1;
                        if (
                            (De(e, function (e, t) {
                                if (".value" === e) o = !0;
                                else if (
                                    ".priority" !== e &&
                                    ".sv" !== e &&
                                    ((s = !0), !jo(e))
                                )
                                    throw new Error(
                                        r +
                                            " contains an invalid key (" +
                                            e +
                                            ") " +
                                            Vt(i) +
                                            '.  Keys must be non-empty strings and can\'t contain ".", "#", "$", "/", "[", or "]"'
                                    );
                                var n;
                                (n = e),
                                    0 < (e = i).parts_.length &&
                                        (e.byteLength_ += 1),
                                    e.parts_.push(n),
                                    (e.byteLength_ += B(n)),
                                    Ht(e),
                                    es(r, t, i),
                                    (t = (e = i).parts_.pop()),
                                    (e.byteLength_ -= B(t)),
                                    0 < e.parts_.length && --e.byteLength_;
                            }),
                            o && s)
                        )
                            throw new Error(
                                r +
                                    ' contains ".value" child ' +
                                    Vt(i) +
                                    " in addition to actual children."
                            );
                    }
                },
                ts = function (e, t, n) {
                    var r = n.path.toString();
                    if (
                        "string" != typeof n.repoInfo.host ||
                        0 === n.repoInfo.host.length ||
                        (!jo(n.repoInfo.namespace) &&
                            "localhost" !== n.repoInfo.host.split(":")[0]) ||
                        (0 !== r.length &&
                            ((r =
                                (r = r) && r.replace(/^\/*\.info(\/|$)/, "/")),
                            !Uo(r)))
                    )
                        throw new Error(
                            Q(e, t, !1) +
                                'must be a valid firebase URL and the path can\'t contain ".", "#", "$", "[", or "]".'
                        );
                },
                ns = function () {
                    (this.eventLists_ = []), (this.recursionDepth_ = 0);
                };
            function rs(e, t) {
                for (var n = null, r = 0; r < t.length; r++) {
                    var i = t[r],
                        o = i.getPath();
                    null === n ||
                        jt(o, n.path) ||
                        (e.eventLists_.push(n), (n = null)),
                        (n =
                            null === n
                                ? { events: [], path: o }
                                : n).events.push(i);
                }
                n && e.eventLists_.push(n);
            }
            function is(e, t, n) {
                rs(e, n),
                    ss(e, function (e) {
                        return jt(e, t);
                    });
            }
            function os(e, t, n) {
                rs(e, n),
                    ss(e, function (e) {
                        return Ut(e, t) || Ut(t, e);
                    });
            }
            function ss(e, t) {
                e.recursionDepth_++;
                for (var n = !0, r = 0; r < e.eventLists_.length; r++) {
                    var i = e.eventLists_[r];
                    i &&
                        (t(i.path)
                            ? ((function (e) {
                                  for (var t = 0; t < e.events.length; t++) {
                                      var n,
                                          r = e.events[t];
                                      null !== r &&
                                          ((e.events[t] = null),
                                          (n = r.getEventRunner()),
                                          be && Se("event: " + r.toString()),
                                          Qe(n));
                                  }
                              })(e.eventLists_[r]),
                              (e.eventLists_[r] = null))
                            : (n = !1));
                }
                n && (e.eventLists_ = []), e.recursionDepth_--;
            }
            var as = "repo_interrupt",
                us = 25,
                ls =
                    ((hs.prototype.toString = function () {
                        return (
                            (this.repoInfo_.secure ? "https://" : "http://") +
                            this.repoInfo_.host
                        );
                    }),
                    hs);
            function hs(e, t, n, r) {
                (this.repoInfo_ = e),
                    (this.forceRestClient_ = t),
                    (this.app = n),
                    (this.authTokenProvider_ = r),
                    (this.dataUpdateCount = 0),
                    (this.statsListener_ = null),
                    (this.eventQueue_ = new ns()),
                    (this.nextWriteId_ = 1),
                    (this.interceptServerDataCallback_ = null),
                    (this.onDisconnect_ = Er()),
                    (this.transactionQueueTree_ = new Oo()),
                    (this.persistentConnection_ = null),
                    (this.key = this.repoInfo_.toURLString());
            }
            function cs(s) {
                if (
                    ((s.stats_ = tt(s.repoInfo_)),
                    s.forceRestClient_ ||
                        0 <=
                            (
                                ("object" == typeof window &&
                                    window.navigator &&
                                    window.navigator.userAgent) ||
                                ""
                            ).search(
                                /googlebot|google webmaster tools|bingbot|yahoo! slurp|baiduspider|yandexbot|duckduckbot/i
                            ))
                )
                    (s.server_ = new mr(
                        s.repoInfo_,
                        function (e, t, n, r) {
                            fs(s, e, t, n, r);
                        },
                        s.authTokenProvider_
                    )),
                        setTimeout(function () {
                            return _s(s, !0);
                        }, 0);
                else {
                    var e = s.app.options.databaseAuthVariableOverride;
                    if (null != e) {
                        if ("object" != typeof e)
                            throw new Error(
                                "Only objects are supported for option databaseAuthVariableOverride"
                            );
                        try {
                            x(e);
                        } catch (e) {
                            throw new Error(
                                "Invalid authOverride provided: " + e
                            );
                        }
                    }
                    (s.persistentConnection_ = new Xt(
                        s.repoInfo_,
                        s.app.options.appId,
                        function (e, t, n, r) {
                            fs(s, e, t, n, r);
                        },
                        function (e) {
                            _s(s, e);
                        },
                        function (e) {
                            var n;
                            (n = s),
                                De(e, function (e, t) {
                                    ys(n, e, t);
                                });
                        },
                        s.authTokenProvider_,
                        e
                    )),
                        (s.server_ = s.persistentConnection_);
                }
                var t, n;
                s.authTokenProvider_.addTokenChangeListener(function (e) {
                    s.server_.refreshAuthToken(e);
                }),
                    (s.statsReporter_ =
                        ((t = s.repoInfo_),
                        (n = function () {
                            return new Rr(s.stats_, s.server_);
                        }),
                        (t = t.toString()),
                        et[t] || (et[t] = n()),
                        et[t])),
                    (s.infoData_ = new Cr()),
                    (s.infoSyncTree_ = new ro({
                        startListening: function (e, t, n, r) {
                            var i = [],
                                o = s.infoData_.getNode(e.path);
                            return (
                                o.isEmpty() ||
                                    ((i = ao(s.infoSyncTree_, e.path, o)),
                                    setTimeout(function () {
                                        r("ok");
                                    }, 0)),
                                i
                            );
                        },
                        stopListening: function () {},
                    })),
                    ys(s, "connected", !1),
                    (s.serverSyncTree_ = new ro({
                        startListening: function (n, e, t, r) {
                            return (
                                s.server_.listen(n, t, e, function (e, t) {
                                    t = r(e, t);
                                    os(s.eventQueue_, n.path, t);
                                }),
                                []
                            );
                        },
                        stopListening: function (e, t) {
                            s.server_.unlisten(e, t);
                        },
                    }));
            }
            function ds(e) {
                e =
                    e.infoData_
                        .getNode(new Nt(".info/serverTimeOffset"))
                        .val() || 0;
                return new Date().getTime() + e;
            }
            function ps(e) {
                return Io({ timestamp: ds(e) });
            }
            function fs(e, t, n, r, i) {
                e.dataUpdateCount++;
                var o = new Nt(t);
                n = e.interceptServerDataCallback_
                    ? e.interceptServerDataCallback_(t, n)
                    : n;
                var s,
                    a,
                    u,
                    l = [],
                    h = o;
                0 <
                    (l = i
                        ? r
                            ? ((s = L(n, function (e) {
                                  return Bn(e);
                              })),
                              (function (e, t, n, r) {
                                  var i = go(e, r);
                                  if (i) {
                                      (r = mo(i)),
                                          (i = r.path),
                                          (r = r.queryId),
                                          (t = Wt(i, t)),
                                          (n = Zr.fromObject(n));
                                      return wo(e, i, new Qr(Or(r), t, n));
                                  }
                                  return [];
                              })(e.serverSyncTree_, o, s, i))
                            : ((t = Bn(n)),
                              (s = e.serverSyncTree_),
                              (a = o),
                              (u = t),
                              null == (i = go(s, (t = i)))
                                  ? []
                                  : ((t = mo(i)),
                                    (i = t.path),
                                    (t = t.queryId),
                                    (a = Wt(i, a)),
                                    wo(s, i, new qr(Or(t), a, u))))
                        : r
                        ? ((a = L(n, function (e) {
                              return Bn(e);
                          })),
                          (u = e.serverSyncTree_),
                          (r = o),
                          (a = a),
                          (a = Zr.fromObject(a)),
                          po(u, new Qr(Dr(), r, a)))
                        : ((n = Bn(n)), ao(e.serverSyncTree_, o, n))).length &&
                    (h = Ps(e, o)),
                    os(e.eventQueue_, h, l);
            }
            function _s(e, t) {
                ys(e, "connected", t),
                    !1 === t &&
                        (function (n) {
                            Es(n, "onDisconnectEvents");
                            var r = ps(n),
                                i = Er();
                            Tr(n.onDisconnect_, xt(), function (e, t) {
                                t = xo(e, t, n.serverSyncTree_, r);
                                Sr(i, e, t);
                            });
                            var o = [];
                            Tr(i, xt(), function (e, t) {
                                o = o.concat(ao(n.serverSyncTree_, e, t));
                                e = ks(n, e);
                                Ps(n, e);
                            }),
                                (n.onDisconnect_ = Er()),
                                os(n.eventQueue_, xt(), o);
                        })(e);
            }
            function ys(e, t, n) {
                (t = new Nt("/.info/" + t)), (n = Bn(n));
                e.infoData_.updateSnapshot(t, n);
                n = ao(e.infoSyncTree_, t, n);
                os(e.eventQueue_, t, n);
            }
            function vs(e) {
                return e.nextWriteId_++;
            }
            function gs(r, i, e, t, o) {
                Es(r, "set", { path: i.toString(), value: e, priority: t });
                var n = ps(r),
                    e = Bn(e, t),
                    t = ho(r.serverSyncTree_, i),
                    n = ko(e, t, n),
                    s = vs(r),
                    n = io(r.serverSyncTree_, i, n, s, !0);
                rs(r.eventQueue_, n),
                    r.server_.put(i.toString(), e.val(!0), function (e, t) {
                        var n = "ok" === e;
                        n || Pe("set at " + i + " failed: " + e);
                        n = so(r.serverSyncTree_, s, !n);
                        os(r.eventQueue_, i, n), Ss(0, o, e, t);
                    });
                e = ks(r, i);
                Ps(r, e), os(r.eventQueue_, e, []);
            }
            function ms(n, r, i) {
                n.server_.onDisconnectCancel(r.toString(), function (e, t) {
                    "ok" === e &&
                        !(function e(n, t) {
                            if (qt(t))
                                return (n.value = null), n.children.clear(), !0;
                            if (null !== n.value) {
                                if (n.value.isLeafNode()) return !1;
                                var r = n.value;
                                return (
                                    (n.value = null),
                                    r.forEachChild(Pn, function (e, t) {
                                        Sr(n, new Nt(e), t);
                                    }),
                                    e(n, t)
                                );
                            }
                            if (0 < n.children.size)
                                return (
                                    (r = kt(t)),
                                    (t = Ot(t)),
                                    n.children.has(r) &&
                                        e(n.children.get(r), t) &&
                                        n.children.delete(r),
                                    0 === n.children.size
                                );
                            return !0;
                        })(n.onDisconnect_, r),
                        Ss(0, i, e, t);
                });
            }
            function ws(n, r, e, i) {
                var o = Bn(e);
                n.server_.onDisconnectPut(
                    r.toString(),
                    o.val(!0),
                    function (e, t) {
                        "ok" === e && Sr(n.onDisconnect_, r, o), Ss(0, i, e, t);
                    }
                );
            }
            function Cs(e, t, n) {
                n =
                    ".info" === kt(t.path)
                        ? lo(e.infoSyncTree_, t, n)
                        : lo(e.serverSyncTree_, t, n);
                is(e.eventQueue_, t.path, n);
            }
            function bs(e) {
                e.persistentConnection_ &&
                    e.persistentConnection_.interrupt(as);
            }
            function Es(e) {
                for (var t = [], n = 1; n < arguments.length; n++)
                    t[n - 1] = arguments[n];
                var r = "";
                e.persistentConnection_ &&
                    (r = e.persistentConnection_.id + ":"),
                    Se.apply(void 0, s([r], y(t)));
            }
            function Ss(e, n, r, i) {
                n &&
                    Qe(function () {
                        var e, t;
                        "ok" === r
                            ? n(null)
                            : ((t = e = (r || "error").toUpperCase()),
                              i && (t += ": " + i),
                              ((t = new Error(t)).code = e),
                              n(t));
                    });
            }
            function Ts(e, t, n) {
                return ho(e.serverSyncTree_, t, n) || qn.EMPTY_NODE;
            }
            function Is(t, e) {
                var n;
                (e = void 0 === e ? t.transactionQueueTree_ : e) || xs(t, e),
                    Lo(e)
                        ? ((n = Rs(t, e)),
                          g(
                              0 < n.length,
                              "Sending zero length transaction queue"
                          ),
                          n.every(function (e) {
                              return 0 === e.status;
                          }) &&
                              (function (i, o, s) {
                                  for (
                                      var e = s.map(function (e) {
                                              return e.currentWriteId;
                                          }),
                                          t = Ts(i, o, e),
                                          n = t,
                                          e = t.hash(),
                                          r = 0;
                                      r < s.length;
                                      r++
                                  ) {
                                      var a = s[r];
                                      g(
                                          0 === a.status,
                                          "tryToSendTransactionQueue_: items in queue should all be run."
                                      ),
                                          (a.status = 1),
                                          a.retryCount++;
                                      var u = Wt(o, a.path);
                                      n = n.updateChild(
                                          u,
                                          a.currentOutputSnapshotRaw
                                      );
                                  }
                                  var t = n.val(!0),
                                      l = o;
                                  i.server_.put(
                                      l.toString(),
                                      t,
                                      function (e) {
                                          Es(i, "transaction put response", {
                                              path: l.toString(),
                                              status: e,
                                          });
                                          var t = [];
                                          if ("ok" === e) {
                                              for (
                                                  var n = [], r = 0;
                                                  r < s.length;
                                                  r++
                                              )
                                                  !(function (e) {
                                                      (s[e].status = 2),
                                                          (t = t.concat(
                                                              so(
                                                                  i.serverSyncTree_,
                                                                  s[e]
                                                                      .currentWriteId
                                                              )
                                                          )),
                                                          s[e].onComplete &&
                                                              n.push(
                                                                  function () {
                                                                      return s[
                                                                          e
                                                                      ].onComplete(
                                                                          null,
                                                                          !0,
                                                                          s[e]
                                                                              .currentOutputSnapshotResolved
                                                                      );
                                                                  }
                                                              ),
                                                          s[e].unwatcher();
                                                  })(r);
                                              xs(
                                                  i,
                                                  Ao(i.transactionQueueTree_, o)
                                              ),
                                                  Is(
                                                      i,
                                                      i.transactionQueueTree_
                                                  ),
                                                  os(i.eventQueue_, o, t);
                                              for (r = 0; r < n.length; r++)
                                                  Qe(n[r]);
                                          } else {
                                              if ("datastale" === e)
                                                  for (r = 0; r < s.length; r++)
                                                      3 === s[r].status
                                                          ? (s[r].status = 4)
                                                          : (s[r].status = 0);
                                              else {
                                                  Pe(
                                                      "transaction at " +
                                                          l.toString() +
                                                          " failed: " +
                                                          e
                                                  );
                                                  for (r = 0; r < s.length; r++)
                                                      (s[r].status = 4),
                                                          (s[r].abortReason =
                                                              e);
                                              }
                                              Ps(i, o);
                                          }
                                      },
                                      e
                                  );
                              })(t, Wo(e), n))
                        : Fo(e) &&
                          qo(e, function (e) {
                              Is(t, e);
                          });
            }
            function Ps(e, t) {
                var n = Ns(e, t),
                    t = Wo(n);
                return (
                    (function (u, l, h) {
                        if (0 === l.length) return;
                        for (
                            var c = [],
                                d = [],
                                p = l
                                    .filter(function (e) {
                                        return 0 === e.status;
                                    })
                                    .map(function (e) {
                                        return e.currentWriteId;
                                    }),
                                e = 0;
                            e < l.length;
                            e++
                        )
                            !(function (e) {
                                var t,
                                    n,
                                    r,
                                    i,
                                    o = l[e],
                                    s = Wt(h, o.path),
                                    a = !1;
                                g(
                                    null !== s,
                                    "rerunTransactionsUnderNode_: relativePath should not be null."
                                ),
                                    4 === o.status
                                        ? ((a = !0),
                                          (t = o.abortReason),
                                          (d = d.concat(
                                              so(
                                                  u.serverSyncTree_,
                                                  o.currentWriteId,
                                                  !0
                                              )
                                          )))
                                        : 0 === o.status &&
                                          (d =
                                              o.retryCount >= us
                                                  ? ((a = !0),
                                                    (t = "maxretry"),
                                                    d.concat(
                                                        so(
                                                            u.serverSyncTree_,
                                                            o.currentWriteId,
                                                            !0
                                                        )
                                                    ))
                                                  : ((n = Ts(u, o.path, p)),
                                                    (o.currentInputSnapshot =
                                                        n),
                                                    void 0 !==
                                                    (i = l[e].update(n.val()))
                                                        ? (es(
                                                              "transaction failed: Data returned ",
                                                              i,
                                                              o.path
                                                          ),
                                                          (r = Bn(i)),
                                                          ("object" ==
                                                              typeof i &&
                                                              null != i &&
                                                              D(
                                                                  i,
                                                                  ".priority"
                                                              )) ||
                                                              (r =
                                                                  r.updatePriority(
                                                                      n.getPriority()
                                                                  )),
                                                          (s =
                                                              o.currentWriteId),
                                                          (i = ps(u)),
                                                          (i = ko(r, n, i)),
                                                          (o.currentOutputSnapshotRaw =
                                                              r),
                                                          (o.currentOutputSnapshotResolved =
                                                              i),
                                                          (o.currentWriteId =
                                                              vs(u)),
                                                          p.splice(
                                                              p.indexOf(s),
                                                              1
                                                          ),
                                                          (d = d.concat(
                                                              io(
                                                                  u.serverSyncTree_,
                                                                  o.path,
                                                                  i,
                                                                  o.currentWriteId,
                                                                  o.applyLocally
                                                              )
                                                          )).concat(
                                                              so(
                                                                  u.serverSyncTree_,
                                                                  s,
                                                                  !0
                                                              )
                                                          ))
                                                        : ((a = !0),
                                                          (t = "nodata"),
                                                          d.concat(
                                                              so(
                                                                  u.serverSyncTree_,
                                                                  o.currentWriteId,
                                                                  !0
                                                              )
                                                          )))),
                                    os(u.eventQueue_, h, d),
                                    (d = []),
                                    a &&
                                        ((l[e].status = 2),
                                        (a = l[e].unwatcher),
                                        setTimeout(a, Math.floor(0)),
                                        l[e].onComplete &&
                                            ("nodata" === t
                                                ? c.push(function () {
                                                      return l[e].onComplete(
                                                          null,
                                                          !1,
                                                          l[e]
                                                              .currentInputSnapshot
                                                      );
                                                  })
                                                : c.push(function () {
                                                      return l[e].onComplete(
                                                          new Error(t),
                                                          !1,
                                                          null
                                                      );
                                                  })));
                            })(e);
                        xs(u, u.transactionQueueTree_);
                        for (e = 0; e < c.length; e++) Qe(c[e]);
                        Is(u, u.transactionQueueTree_);
                    })(e, Rs(e, n), t),
                    t
                );
            }
            function Ns(e, t) {
                for (
                    var n = e.transactionQueueTree_, r = kt(t);
                    null !== r && void 0 === Lo(n);

                )
                    (n = Ao(n, r)), (r = kt((t = Ot(t))));
                return n;
            }
            function Rs(e, t) {
                var n = [];
                return (
                    (function t(n, e, r) {
                        var i = Lo(e);
                        if (i) for (var o = 0; o < i.length; o++) r.push(i[o]);
                        qo(e, function (e) {
                            t(n, e, r);
                        });
                    })(e, t, n),
                    n.sort(function (e, t) {
                        return e.order - t.order;
                    }),
                    n
                );
            }
            function xs(t, e) {
                var n = Lo(e);
                if (n) {
                    for (var r = 0, i = 0; i < n.length; i++)
                        2 !== n[i].status && ((n[r] = n[i]), r++);
                    (n.length = r), Mo(e, 0 < n.length ? n : void 0);
                }
                qo(e, function (e) {
                    xs(t, e);
                });
            }
            function ks(t, e) {
                var n = Wo(Ns(t, e)),
                    e = Ao(t.transactionQueueTree_, e);
                return (
                    (function (e, t, n) {
                        for (var r = n ? e : e.parent; null !== r; ) {
                            if (t(r)) return;
                            r = r.parent;
                        }
                    })(e, function (e) {
                        Ds(t, e);
                    }),
                    Ds(t, e),
                    (function t(e, n, r, i) {
                        r && !i && n(e),
                            qo(e, function (e) {
                                t(e, n, !0, i);
                            }),
                            r && i && n(e);
                    })(e, function (e) {
                        Ds(t, e);
                    }),
                    n
                );
            }
            function Ds(e, t) {
                var n = Lo(t);
                if (n) {
                    for (var r = [], i = [], o = -1, s = 0; s < n.length; s++)
                        3 === n[s].status ||
                            (1 === n[s].status
                                ? (g(
                                      o === s - 1,
                                      "All SENT items should be at beginning of queue."
                                  ),
                                  (n[(o = s)].status = 3),
                                  (n[s].abortReason = "set"))
                                : (g(
                                      0 === n[s].status,
                                      "Unexpected transaction status in abort"
                                  ),
                                  n[s].unwatcher(),
                                  (i = i.concat(
                                      so(
                                          e.serverSyncTree_,
                                          n[s].currentWriteId,
                                          !0
                                      )
                                  )),
                                  n[s].onComplete &&
                                      r.push(
                                          n[s].onComplete.bind(
                                              null,
                                              new Error("set"),
                                              !1,
                                              null
                                          )
                                      )));
                    -1 === o ? Mo(t, void 0) : (n.length = o + 1),
                        os(e.eventQueue_, Wo(t), i);
                    for (s = 0; s < r.length; s++) Qe(r[s]);
                }
            }
            var Os = function (e, t) {
                    var n = As(e),
                        r = n.namespace;
                    "firebase.com" === n.domain &&
                        Ie(
                            n.host +
                                " is no longer supported. Please use <YOUR FIREBASE>.firebaseio.com instead"
                        ),
                        (r && "undefined" !== r) ||
                            "localhost" === n.domain ||
                            Ie(
                                "Cannot parse Firebase url. Please use https://<YOUR FIREBASE>.firebaseio.com"
                            ),
                        n.secure ||
                            ("undefined" != typeof window &&
                                window.location &&
                                window.location.protocol &&
                                -1 !==
                                    window.location.protocol.indexOf(
                                        "https:"
                                    ) &&
                                Pe(
                                    "Insecure Firebase access from a secure page. Please use https in calls to new Firebase()."
                                ));
                    e = "ws" === n.scheme || "wss" === n.scheme;
                    return {
                        repoInfo: new Ye(
                            n.host,
                            n.secure,
                            r,
                            t,
                            e,
                            "",
                            r !== n.subdomain
                        ),
                        path: new Nt(n.pathString),
                    };
                },
                As = function (e) {
                    var t,
                        n,
                        r,
                        i = "",
                        o = "",
                        s = "",
                        a = "",
                        u = "",
                        l = !0,
                        h = "https",
                        c = 443;
                    return (
                        "string" == typeof e &&
                            (0 <= (r = e.indexOf("//")) &&
                                ((h = e.substring(0, r - 1)),
                                (e = e.substring(r + 2))),
                            -1 === (t = e.indexOf("/")) && (t = e.length),
                            -1 === (n = e.indexOf("?")) && (n = e.length),
                            (i = e.substring(0, Math.min(t, n))),
                            t < n &&
                                (a = (function (e) {
                                    for (
                                        var t = "", n = e.split("/"), r = 0;
                                        r < n.length;
                                        r++
                                    )
                                        if (0 < n[r].length) {
                                            var i = n[r];
                                            try {
                                                i = decodeURIComponent(
                                                    i.replace(/\+/g, " ")
                                                );
                                            } catch (e) {}
                                            t += "/" + i;
                                        }
                                    return t;
                                })(e.substring(t, n))),
                            (n = (function (e) {
                                var t,
                                    n,
                                    r = {};
                                "?" === e.charAt(0) && (e = e.substring(1));
                                try {
                                    for (
                                        var i = _(e.split("&")), o = i.next();
                                        !o.done;
                                        o = i.next()
                                    ) {
                                        var s,
                                            a = o.value;
                                        0 !== a.length &&
                                            (2 === (s = a.split("=")).length
                                                ? (r[decodeURIComponent(s[0])] =
                                                      decodeURIComponent(s[1]))
                                                : Pe(
                                                      "Invalid query segment '" +
                                                          a +
                                                          "' in query '" +
                                                          e +
                                                          "'"
                                                  ));
                                    }
                                } catch (e) {
                                    t = { error: e };
                                } finally {
                                    try {
                                        o &&
                                            !o.done &&
                                            (n = i.return) &&
                                            n.call(i);
                                    } finally {
                                        if (t) throw t.error;
                                    }
                                }
                                return r;
                            })(e.substring(Math.min(e.length, n)))),
                            0 <= (r = i.indexOf(":"))
                                ? ((l = "https" === h || "wss" === h),
                                  (c = parseInt(i.substring(r + 1), 10)))
                                : (r = i.length),
                            "localhost" === (r = i.slice(0, r)).toLowerCase()
                                ? (o = "localhost")
                                : r.split(".").length <= 2
                                ? (o = r)
                                : ((r = i.indexOf(".")),
                                  (s = i.substring(0, r).toLowerCase()),
                                  (o = i.substring(r + 1)),
                                  (u = s)),
                            "ns" in n && (u = n.ns)),
                        {
                            host: i,
                            port: c,
                            domain: o,
                            subdomain: s,
                            secure: l,
                            scheme: h,
                            pathString: a,
                            namespace: u,
                        }
                    );
                },
                Ls =
                    ((Ms.prototype.val = function () {
                        return (
                            W("DataSnapshot.val", 0, 0, arguments.length),
                            this.node_.val()
                        );
                    }),
                    (Ms.prototype.exportVal = function () {
                        return (
                            W("DataSnapshot.exportVal", 0, 0, arguments.length),
                            this.node_.val(!0)
                        );
                    }),
                    (Ms.prototype.toJSON = function () {
                        return (
                            W("DataSnapshot.toJSON", 0, 1, arguments.length),
                            this.exportVal()
                        );
                    }),
                    (Ms.prototype.exists = function () {
                        return (
                            W("DataSnapshot.exists", 0, 0, arguments.length),
                            !this.node_.isEmpty()
                        );
                    }),
                    (Ms.prototype.child = function (e) {
                        W("DataSnapshot.child", 0, 1, arguments.length),
                            (e = String(e)),
                            Go("DataSnapshot.child", 1, e, !1);
                        var t = new Nt(e),
                            e = this.ref_.child(t);
                        return new Ms(this.node_.getChild(t), e, Pn);
                    }),
                    (Ms.prototype.hasChild = function (e) {
                        W("DataSnapshot.hasChild", 1, 1, arguments.length),
                            Go("DataSnapshot.hasChild", 1, e, !1);
                        e = new Nt(e);
                        return !this.node_.getChild(e).isEmpty();
                    }),
                    (Ms.prototype.getPriority = function () {
                        return (
                            W(
                                "DataSnapshot.getPriority",
                                0,
                                0,
                                arguments.length
                            ),
                            this.node_.getPriority().val()
                        );
                    }),
                    (Ms.prototype.forEach = function (n) {
                        var r = this;
                        return (
                            W("DataSnapshot.forEach", 1, 1, arguments.length),
                            j("DataSnapshot.forEach", 1, n, !1),
                            !this.node_.isLeafNode() &&
                                !!this.node_.forEachChild(
                                    this.index_,
                                    function (e, t) {
                                        return n(
                                            new Ms(t, r.ref_.child(e), Pn)
                                        );
                                    }
                                )
                        );
                    }),
                    (Ms.prototype.hasChildren = function () {
                        return (
                            W(
                                "DataSnapshot.hasChildren",
                                0,
                                0,
                                arguments.length
                            ),
                            !this.node_.isLeafNode() && !this.node_.isEmpty()
                        );
                    }),
                    Object.defineProperty(Ms.prototype, "key", {
                        get: function () {
                            return this.ref_.getKey();
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    (Ms.prototype.numChildren = function () {
                        return (
                            W(
                                "DataSnapshot.numChildren",
                                0,
                                0,
                                arguments.length
                            ),
                            this.node_.numChildren()
                        );
                    }),
                    (Ms.prototype.getRef = function () {
                        return (
                            W("DataSnapshot.ref", 0, 0, arguments.length),
                            this.ref_
                        );
                    }),
                    Object.defineProperty(Ms.prototype, "ref", {
                        get: function () {
                            return this.getRef();
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    Ms);
            function Ms(e, t, n) {
                (this.node_ = e), (this.ref_ = t), (this.index_ = n);
            }
            var Fs =
                ((qs.prototype.cancel = function (e) {
                    W("OnDisconnect.cancel", 0, 1, arguments.length),
                        j("OnDisconnect.cancel", 1, e, !0);
                    var t = new f();
                    return (
                        ms(this.repo_, this.path_, t.wrapCallback(e)), t.promise
                    );
                }),
                (qs.prototype.remove = function (e) {
                    W("OnDisconnect.remove", 0, 1, arguments.length),
                        $o("OnDisconnect.remove", this.path_),
                        j("OnDisconnect.remove", 1, e, !0);
                    var t = new f();
                    return (
                        ws(this.repo_, this.path_, null, t.wrapCallback(e)),
                        t.promise
                    );
                }),
                (qs.prototype.set = function (e, t) {
                    W("OnDisconnect.set", 1, 2, arguments.length),
                        $o("OnDisconnect.set", this.path_),
                        Ho("OnDisconnect.set", 1, e, this.path_, !1),
                        j("OnDisconnect.set", 2, t, !0);
                    var n = new f();
                    return (
                        ws(this.repo_, this.path_, e, n.wrapCallback(t)),
                        n.promise
                    );
                }),
                (qs.prototype.setWithPriority = function (e, t, n) {
                    W("OnDisconnect.setWithPriority", 2, 3, arguments.length),
                        $o("OnDisconnect.setWithPriority", this.path_),
                        Ho(
                            "OnDisconnect.setWithPriority",
                            1,
                            e,
                            this.path_,
                            !1
                        ),
                        zo("OnDisconnect.setWithPriority", 2, t, !1),
                        j("OnDisconnect.setWithPriority", 3, n, !0);
                    var r,
                        i,
                        o,
                        s,
                        a = new f();
                    return (
                        (r = this.repo_),
                        (i = this.path_),
                        (e = e),
                        (t = t),
                        (o = a.wrapCallback(n)),
                        (s = Bn(e, t)),
                        r.server_.onDisconnectPut(
                            i.toString(),
                            s.val(!0),
                            function (e, t) {
                                "ok" === e && Sr(r.onDisconnect_, i, s),
                                    Ss(0, o, e, t);
                            }
                        ),
                        a.promise
                    );
                }),
                (qs.prototype.update = function (e, t) {
                    if (
                        (W("OnDisconnect.update", 1, 2, arguments.length),
                        $o("OnDisconnect.update", this.path_),
                        Array.isArray(e))
                    ) {
                        for (var n = {}, r = 0; r < e.length; ++r)
                            n["" + r] = e[r];
                        (e = n),
                            Pe(
                                "Passing an Array to firebase.database.onDisconnect().update() is deprecated. Use set() if you want to overwrite the existing data, or an Object with integer keys if you really do want to only update some of the children."
                            );
                    }
                    Vo("OnDisconnect.update", 1, e, this.path_, !1),
                        j("OnDisconnect.update", 2, t, !0);
                    var i = new f();
                    return (
                        (function (n, r, i, o) {
                            if (A(i))
                                return (
                                    Se(
                                        "onDisconnect().update() called with empty data.  Don't do anything."
                                    ),
                                    Ss(0, o, "ok", void 0)
                                );
                            n.server_.onDisconnectMerge(
                                r.toString(),
                                i,
                                function (e, t) {
                                    "ok" === e &&
                                        De(i, function (e, t) {
                                            t = Bn(t);
                                            Sr(n.onDisconnect_, Ft(r, e), t);
                                        }),
                                        Ss(0, o, e, t);
                                }
                            );
                        })(this.repo_, this.path_, e, i.wrapCallback(t)),
                        i.promise
                    );
                }),
                qs);
            function qs(e, t) {
                (this.repo_ = e), (this.path_ = t);
            }
            var Ws =
                ((Qs.prototype.getPath = function () {
                    var e = this.snapshot.getRef();
                    return ("value" === this.eventType ? e : e.getParent())
                        .path;
                }),
                (Qs.prototype.getEventType = function () {
                    return this.eventType;
                }),
                (Qs.prototype.getEventRunner = function () {
                    return this.eventRegistration.getEventRunner(this);
                }),
                (Qs.prototype.toString = function () {
                    return (
                        this.getPath().toString() +
                        ":" +
                        this.eventType +
                        ":" +
                        x(this.snapshot.exportVal())
                    );
                }),
                Qs);
            function Qs(e, t, n, r) {
                (this.eventType = e),
                    (this.eventRegistration = t),
                    (this.snapshot = n),
                    (this.prevName = r);
            }
            var js =
                ((Us.prototype.getPath = function () {
                    return this.path;
                }),
                (Us.prototype.getEventType = function () {
                    return "cancel";
                }),
                (Us.prototype.getEventRunner = function () {
                    return this.eventRegistration.getEventRunner(this);
                }),
                (Us.prototype.toString = function () {
                    return this.path.toString() + ":cancel";
                }),
                Us);
            function Us(e, t, n) {
                (this.eventRegistration = e), (this.error = t), (this.path = n);
            }
            var Bs =
                ((Hs.prototype.respondsTo = function (e) {
                    return "value" === e;
                }),
                (Hs.prototype.createEvent = function (e, t) {
                    var n = t.getQueryParams().getIndex();
                    return new Ws(
                        "value",
                        this,
                        new Ls(e.snapshotNode, t.getRef(), n)
                    );
                }),
                (Hs.prototype.getEventRunner = function (e) {
                    var t = this.context_;
                    if ("cancel" === e.getEventType()) {
                        g(
                            this.cancelCallback_,
                            "Raising a cancel event on a listener with no cancel callback"
                        );
                        var n = this.cancelCallback_;
                        return function () {
                            n.call(t, e.error);
                        };
                    }
                    var r = this.callback_;
                    return function () {
                        r.call(t, e.snapshot);
                    };
                }),
                (Hs.prototype.createCancelEvent = function (e, t) {
                    return this.cancelCallback_ ? new js(this, e, t) : null;
                }),
                (Hs.prototype.matches = function (e) {
                    return (
                        e instanceof Hs &&
                        (!e.callback_ ||
                            !this.callback_ ||
                            (e.callback_ === this.callback_ &&
                                e.context_ === this.context_))
                    );
                }),
                (Hs.prototype.hasAnyCallback = function () {
                    return null !== this.callback_;
                }),
                Hs);
            function Hs(e, t, n) {
                (this.callback_ = e),
                    (this.cancelCallback_ = t),
                    (this.context_ = n);
            }
            var Vs,
                zs =
                    ((Ks.prototype.respondsTo = function (e) {
                        e =
                            "children_removed" ===
                            (e = "children_added" === e ? "child_added" : e)
                                ? "child_removed"
                                : e;
                        return D(this.callbacks_, e);
                    }),
                    (Ks.prototype.createCancelEvent = function (e, t) {
                        return this.cancelCallback_ ? new js(this, e, t) : null;
                    }),
                    (Ks.prototype.createEvent = function (e, t) {
                        g(
                            null != e.childName,
                            "Child events should have a childName."
                        );
                        var n = t.getRef().child(e.childName),
                            t = t.getQueryParams().getIndex();
                        return new Ws(
                            e.type,
                            this,
                            new Ls(e.snapshotNode, n, t),
                            e.prevName
                        );
                    }),
                    (Ks.prototype.getEventRunner = function (e) {
                        var t = this.context_;
                        if ("cancel" === e.getEventType()) {
                            g(
                                this.cancelCallback_,
                                "Raising a cancel event on a listener with no cancel callback"
                            );
                            var n = this.cancelCallback_;
                            return function () {
                                n.call(t, e.error);
                            };
                        }
                        var r = this.callbacks_[e.eventType];
                        return function () {
                            r.call(t, e.snapshot, e.prevName);
                        };
                    }),
                    (Ks.prototype.matches = function (t) {
                        var n = this;
                        if (t instanceof Ks) {
                            if (!this.callbacks_ || !t.callbacks_) return !0;
                            if (this.context_ === t.context_) {
                                var e = Object.keys(t.callbacks_),
                                    r = Object.keys(this.callbacks_),
                                    i = e.length;
                                if (i === r.length) {
                                    if (1 !== i)
                                        return r.every(function (e) {
                                            return (
                                                t.callbacks_[e] ===
                                                n.callbacks_[e]
                                            );
                                        });
                                    (e = e[0]), (r = r[0]);
                                    return !(
                                        r !== e ||
                                        (t.callbacks_[e] &&
                                            this.callbacks_[r] &&
                                            t.callbacks_[e] !==
                                                this.callbacks_[r])
                                    );
                                }
                            }
                        }
                        return !1;
                    }),
                    (Ks.prototype.hasAnyCallback = function () {
                        return null !== this.callbacks_;
                    }),
                    Ks);
            function Ks(e, t, n) {
                (this.callbacks_ = e),
                    (this.cancelCallback_ = t),
                    (this.context_ = n);
            }
            var Ys =
                (Object.defineProperty(Gs, "__referenceConstructor", {
                    get: function () {
                        return g(Vs, "Reference.ts has not been loaded"), Vs;
                    },
                    set: function (e) {
                        Vs = e;
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                (Gs.validateQueryEndpoints_ = function (e) {
                    var t = null,
                        n = null;
                    if (
                        (e.hasStart() && (t = e.getIndexStartValue()),
                        e.hasEnd() && (n = e.getIndexEndValue()),
                        e.getIndex() === an)
                    ) {
                        var r =
                                "Query: When ordering by key, you may only pass one argument to startAt(), endAt(), or equalTo().",
                            i =
                                "Query: When ordering by key, the argument passed to startAt(), startAfter(), endAt(), endBefore(), or equalTo() must be a string.";
                        if (e.hasStart()) {
                            if (e.getIndexStartName() !== Ne)
                                throw new Error(r);
                            if ("string" != typeof t) throw new Error(i);
                        }
                        if (e.hasEnd()) {
                            if (e.getIndexEndName() !== Re) throw new Error(r);
                            if ("string" != typeof n) throw new Error(i);
                        }
                    } else if (e.getIndex() === Pn) {
                        if ((null != t && !Bo(t)) || (null != n && !Bo(n)))
                            throw new Error(
                                "Query: When ordering by priority, the first argument passed to startAt(), startAfter() endAt(), endBefore(), or equalTo() must be a valid priority value (null, a number, or a string)."
                            );
                    } else if (
                        (g(
                            e.getIndex() instanceof zn || e.getIndex() === Zn,
                            "unknown index type."
                        ),
                        (null != t && "object" == typeof t) ||
                            (null != n && "object" == typeof n))
                    )
                        throw new Error(
                            "Query: First argument passed to startAt(), startAfter(), endAt(), endBefore(), or equalTo() cannot be an object."
                        );
                }),
                (Gs.validateLimit_ = function (e) {
                    if (
                        e.hasStart() &&
                        e.hasEnd() &&
                        e.hasLimit() &&
                        !e.hasAnchoredLimit()
                    )
                        throw new Error(
                            "Query: Can't combine startAt(), startAfter(), endAt(), endBefore(), and limit(). Use limitToFirst() or limitToLast() instead."
                        );
                }),
                (Gs.prototype.validateNoPreviousOrderByCall_ = function (e) {
                    if (!0 === this.orderByCalled_)
                        throw new Error(
                            e + ": You can't combine multiple orderBy calls."
                        );
                }),
                (Gs.prototype.getQueryParams = function () {
                    return this.queryParams_;
                }),
                (Gs.prototype.getRef = function () {
                    return (
                        W("Query.ref", 0, 0, arguments.length),
                        new Gs.__referenceConstructor(this.database, this.path)
                    );
                }),
                (Gs.prototype.on = function (e, t, n, r) {
                    W("Query.on", 2, 4, arguments.length),
                        Ko("Query.on", 1, e, !1),
                        j("Query.on", 2, t, !1);
                    n = Gs.getCancelAndContextArgs_("Query.on", n, r);
                    return (
                        "value" === e
                            ? this.onValueEvent(t, n.cancel, n.context)
                            : (((r = {})[e] = t),
                              this.onChildEvent(r, n.cancel, n.context)),
                        t
                    );
                }),
                (Gs.prototype.onValueEvent = function (e, t, n) {
                    n = new Bs(e, t || null, n || null);
                    Cs(this.repo, this, n);
                }),
                (Gs.prototype.onChildEvent = function (e, t, n) {
                    n = new zs(e, t, n);
                    Cs(this.repo, this, n);
                }),
                (Gs.prototype.off = function (e, t, n) {
                    W("Query.off", 0, 3, arguments.length),
                        Ko("Query.off", 1, e, !0),
                        j("Query.off", 2, t, !0),
                        U("Query.off", 3, n, !0);
                    var r = null,
                        i = null;
                    "value" === e
                        ? (r = new Bs(t || null, null, n || null))
                        : e &&
                          (t && ((i = {})[e] = t),
                          (r = new zs(i, null, n || null))),
                        (i = this.repo),
                        (n = r),
                        (n =
                            ".info" === kt((r = this).path)
                                ? uo(i.infoSyncTree_, r, n)
                                : uo(i.serverSyncTree_, r, n)),
                        is(i.eventQueue_, r.path, n);
                }),
                (Gs.prototype.get = function () {
                    var n,
                        r,
                        e,
                        t = this;
                    return (
                        (n = this.repo),
                        (r = this),
                        (null != (e = co(n.serverSyncTree_, r))
                            ? Promise.resolve(e)
                            : n.server_.get(r).then(
                                  function (e) {
                                      var t = Bn(e),
                                          e = ao(n.serverSyncTree_, r.path, t);
                                      return (
                                          is(n.eventQueue_, r.path, e),
                                          Promise.resolve(t)
                                      );
                                  },
                                  function (e) {
                                      return (
                                          Es(
                                              n,
                                              "get for query " +
                                                  x(r) +
                                                  " failed: " +
                                                  e
                                          ),
                                          Promise.reject(new Error(e))
                                      );
                                  }
                              )
                        ).then(function (e) {
                            return new Ls(
                                e,
                                t.getRef(),
                                t.getQueryParams().getIndex()
                            );
                        })
                    );
                }),
                (Gs.prototype.once = function (t, n, e, r) {
                    var i = this;
                    W("Query.once", 1, 4, arguments.length),
                        Ko("Query.once", 1, t, !1),
                        j("Query.once", 2, n, !0);
                    var o = Gs.getCancelAndContextArgs_("Query.once", e, r),
                        s = !0,
                        a = new f();
                    a.promise.catch(function () {});
                    var u = function (e) {
                        s &&
                            ((s = !1),
                            i.off(t, u),
                            n && n.bind(o.context)(e),
                            a.resolve(e));
                    };
                    return (
                        this.on(t, u, function (e) {
                            i.off(t, u),
                                o.cancel && o.cancel.bind(o.context)(e),
                                a.reject(e);
                        }),
                        a.promise
                    );
                }),
                (Gs.prototype.limitToFirst = function (e) {
                    if (
                        (W("Query.limitToFirst", 1, 1, arguments.length),
                        "number" != typeof e || Math.floor(e) !== e || e <= 0)
                    )
                        throw new Error(
                            "Query.limitToFirst: First argument must be a positive integer."
                        );
                    if (this.queryParams_.hasLimit())
                        throw new Error(
                            "Query.limitToFirst: Limit was already set (by another call to limit, limitToFirst, or limitToLast)."
                        );
                    return new Gs(
                        this.database,
                        this.path,
                        ((t = this.queryParams_),
                        (e = e),
                        ((t = t.copy()).limitSet_ = !0),
                        (t.limit_ = e),
                        (t.viewFrom_ = "l"),
                        t),
                        this.orderByCalled_
                    );
                    var t;
                }),
                (Gs.prototype.limitToLast = function (e) {
                    if (
                        (W("Query.limitToLast", 1, 1, arguments.length),
                        "number" != typeof e || Math.floor(e) !== e || e <= 0)
                    )
                        throw new Error(
                            "Query.limitToLast: First argument must be a positive integer."
                        );
                    if (this.queryParams_.hasLimit())
                        throw new Error(
                            "Query.limitToLast: Limit was already set (by another call to limit, limitToFirst, or limitToLast)."
                        );
                    return new Gs(
                        this.database,
                        this.path,
                        ((t = this.queryParams_),
                        (e = e),
                        ((t = t.copy()).limitSet_ = !0),
                        (t.limit_ = e),
                        (t.viewFrom_ = "r"),
                        t),
                        this.orderByCalled_
                    );
                    var t;
                }),
                (Gs.prototype.orderByChild = function (e) {
                    if (
                        (W("Query.orderByChild", 1, 1, arguments.length),
                        "$key" === e)
                    )
                        throw new Error(
                            'Query.orderByChild: "$key" is invalid.  Use Query.orderByKey() instead.'
                        );
                    if ("$priority" === e)
                        throw new Error(
                            'Query.orderByChild: "$priority" is invalid.  Use Query.orderByPriority() instead.'
                        );
                    if ("$value" === e)
                        throw new Error(
                            'Query.orderByChild: "$value" is invalid.  Use Query.orderByValue() instead.'
                        );
                    Go("Query.orderByChild", 1, e, !1),
                        this.validateNoPreviousOrderByCall_(
                            "Query.orderByChild"
                        );
                    e = new Nt(e);
                    if (qt(e))
                        throw new Error(
                            "Query.orderByChild: cannot pass in empty path.  Use Query.orderByValue() instead."
                        );
                    (e = new zn(e)), (e = yr(this.queryParams_, e));
                    return (
                        Gs.validateQueryEndpoints_(e),
                        new Gs(this.database, this.path, e, !0)
                    );
                }),
                (Gs.prototype.orderByKey = function () {
                    W("Query.orderByKey", 0, 0, arguments.length),
                        this.validateNoPreviousOrderByCall_("Query.orderByKey");
                    var e = yr(this.queryParams_, an);
                    return (
                        Gs.validateQueryEndpoints_(e),
                        new Gs(this.database, this.path, e, !0)
                    );
                }),
                (Gs.prototype.orderByPriority = function () {
                    W("Query.orderByPriority", 0, 0, arguments.length),
                        this.validateNoPreviousOrderByCall_(
                            "Query.orderByPriority"
                        );
                    var e = yr(this.queryParams_, Pn);
                    return (
                        Gs.validateQueryEndpoints_(e),
                        new Gs(this.database, this.path, e, !0)
                    );
                }),
                (Gs.prototype.orderByValue = function () {
                    W("Query.orderByValue", 0, 0, arguments.length),
                        this.validateNoPreviousOrderByCall_(
                            "Query.orderByValue"
                        );
                    var e = yr(this.queryParams_, Zn);
                    return (
                        Gs.validateQueryEndpoints_(e),
                        new Gs(this.database, this.path, e, !0)
                    );
                }),
                (Gs.prototype.startAt = function (e, t) {
                    void 0 === e && (e = null),
                        W("Query.startAt", 0, 2, arguments.length),
                        Ho("Query.startAt", 1, e, this.path, !0),
                        Yo("Query.startAt", 2, t, !0);
                    var n = fr(this.queryParams_, e, t);
                    if (
                        (Gs.validateLimit_(n),
                        Gs.validateQueryEndpoints_(n),
                        this.queryParams_.hasStart())
                    )
                        throw new Error(
                            "Query.startAt: Starting point was already set (by another call to startAt or equalTo)."
                        );
                    return (
                        void 0 === e && (t = e = null),
                        new Gs(this.database, this.path, n, this.orderByCalled_)
                    );
                }),
                (Gs.prototype.startAfter = function (e, t) {
                    void 0 === e && (e = null),
                        W("Query.startAfter", 0, 2, arguments.length),
                        Ho("Query.startAfter", 1, e, this.path, !1),
                        Yo("Query.startAfter", 2, t, !0);
                    var n,
                        t =
                            ((n = this.queryParams_),
                            (e = e),
                            (t = t),
                            ((t =
                                n.index_ === an
                                    ? fr(
                                          n,
                                          (e =
                                              "string" == typeof e ? Gn(e) : e),
                                          t
                                      )
                                    : fr(
                                          n,
                                          e,
                                          null == t ? Re : Gn(t)
                                      )).startAfterSet_ = !0),
                            t);
                    if (
                        (Gs.validateLimit_(t),
                        Gs.validateQueryEndpoints_(t),
                        this.queryParams_.hasStart())
                    )
                        throw new Error(
                            "Query.startAfter: Starting point was already set (by another call to startAt, startAfter or equalTo)."
                        );
                    return new Gs(
                        this.database,
                        this.path,
                        t,
                        this.orderByCalled_
                    );
                }),
                (Gs.prototype.endAt = function (e, t) {
                    void 0 === e && (e = null),
                        W("Query.endAt", 0, 2, arguments.length),
                        Ho("Query.endAt", 1, e, this.path, !0),
                        Yo("Query.endAt", 2, t, !0);
                    t = _r(this.queryParams_, e, t);
                    if (
                        (Gs.validateLimit_(t),
                        Gs.validateQueryEndpoints_(t),
                        this.queryParams_.hasEnd())
                    )
                        throw new Error(
                            "Query.endAt: Ending point was already set (by another call to endAt, endBefore, or equalTo)."
                        );
                    return new Gs(
                        this.database,
                        this.path,
                        t,
                        this.orderByCalled_
                    );
                }),
                (Gs.prototype.endBefore = function (e, t) {
                    void 0 === e && (e = null),
                        W("Query.endBefore", 0, 2, arguments.length),
                        Ho("Query.endBefore", 1, e, this.path, !1),
                        Yo("Query.endBefore", 2, t, !0);
                    var n,
                        t =
                            ((n = this.queryParams_),
                            (e = e),
                            (t = t),
                            ((t =
                                n.index_ === an
                                    ? _r(
                                          n,
                                          (e =
                                              "string" == typeof e ? $n(e) : e),
                                          t
                                      )
                                    : _r(
                                          n,
                                          e,
                                          null == t ? Ne : $n(t)
                                      )).endBeforeSet_ = !0),
                            t);
                    if (
                        (Gs.validateLimit_(t),
                        Gs.validateQueryEndpoints_(t),
                        this.queryParams_.hasEnd())
                    )
                        throw new Error(
                            "Query.endBefore: Ending point was already set (by another call to endAt, endBefore, or equalTo)."
                        );
                    return new Gs(
                        this.database,
                        this.path,
                        t,
                        this.orderByCalled_
                    );
                }),
                (Gs.prototype.equalTo = function (e, t) {
                    if (
                        (W("Query.equalTo", 1, 2, arguments.length),
                        Ho("Query.equalTo", 1, e, this.path, !1),
                        Yo("Query.equalTo", 2, t, !0),
                        this.queryParams_.hasStart())
                    )
                        throw new Error(
                            "Query.equalTo: Starting point was already set (by another call to startAt/startAfter or equalTo)."
                        );
                    if (this.queryParams_.hasEnd())
                        throw new Error(
                            "Query.equalTo: Ending point was already set (by another call to endAt/endBefore or equalTo)."
                        );
                    return this.startAt(e, t).endAt(e, t);
                }),
                (Gs.prototype.toString = function () {
                    return (
                        W("Query.toString", 0, 0, arguments.length),
                        this.repo.toString() +
                            (function (e) {
                                for (
                                    var t = "", n = e.pieceNum_;
                                    n < e.pieces_.length;
                                    n++
                                )
                                    "" !== e.pieces_[n] &&
                                        (t +=
                                            "/" +
                                            encodeURIComponent(
                                                String(e.pieces_[n])
                                            ));
                                return t || "/";
                            })(this.path)
                    );
                }),
                (Gs.prototype.toJSON = function () {
                    return (
                        W("Query.toJSON", 0, 1, arguments.length),
                        this.toString()
                    );
                }),
                (Gs.prototype.queryObject = function () {
                    return (
                        (e = this.queryParams_),
                        (n = {}),
                        e.startSet_ &&
                            ((n.sp = e.indexStartValue_),
                            e.startNameSet_ && (n.sn = e.indexStartName_)),
                        e.endSet_ &&
                            ((n.ep = e.indexEndValue_),
                            e.endNameSet_ && (n.en = e.indexEndName_)),
                        e.limitSet_ &&
                            ((n.l = e.limit_),
                            "" === (t = e.viewFrom_) &&
                                (t = e.isViewFromLeft() ? "l" : "r"),
                            (n.vf = t)),
                        e.index_ !== Pn && (n.i = e.index_.toString()),
                        n
                    );
                    var e, t, n;
                }),
                (Gs.prototype.queryIdentifier = function () {
                    var e = this.queryObject(),
                        e = ke(e);
                    return "{}" === e ? "default" : e;
                }),
                (Gs.prototype.isEqual = function (e) {
                    if (
                        (W("Query.isEqual", 1, 1, arguments.length),
                        !(e instanceof Gs))
                    )
                        throw new Error(
                            "Query.isEqual failed: First argument must be an instance of firebase.database.Query."
                        );
                    var t = this.repo === e.repo,
                        n = jt(this.path, e.path),
                        e = this.queryIdentifier() === e.queryIdentifier();
                    return t && n && e;
                }),
                (Gs.getCancelAndContextArgs_ = function (e, t, n) {
                    var r = { cancel: null, context: null };
                    if (t && n)
                        (r.cancel = t),
                            j(e, 3, r.cancel, !0),
                            (r.context = n),
                            U(e, 4, r.context, !0);
                    else if (t)
                        if ("object" == typeof t && null !== t) r.context = t;
                        else {
                            if ("function" != typeof t)
                                throw new Error(
                                    Q(e, 3, !0) +
                                        " must either be a cancel callback or a context object."
                                );
                            r.cancel = t;
                        }
                    return r;
                }),
                Object.defineProperty(Gs.prototype, "ref", {
                    get: function () {
                        return this.getRef();
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                Gs);
            function Gs(e, t, n, r) {
                (this.database = e),
                    (this.path = t),
                    (this.queryParams_ = n),
                    (this.orderByCalled_ = r),
                    (this.repo = e.repo_);
            }
            var $s =
                ((Js.prototype.toJSON = function () {
                    return (
                        W("TransactionResult.toJSON", 0, 1, arguments.length),
                        {
                            committed: this.committed,
                            snapshot: this.snapshot.toJSON(),
                        }
                    );
                }),
                Js);
            function Js(e, t) {
                (this.committed = e), (this.snapshot = t);
            }
            var Xs,
                Zs,
                ea =
                    (n(ta, (Xs = Ys)),
                    (ta.prototype.getKey = function () {
                        return (
                            W("Reference.key", 0, 0, arguments.length),
                            qt(this.path) ? null : At(this.path)
                        );
                    }),
                    (ta.prototype.child = function (e) {
                        var t, n, r, i;
                        return (
                            W("Reference.child", 1, 1, arguments.length),
                            "number" == typeof e
                                ? (e = String(e))
                                : e instanceof Nt ||
                                  (null === kt(this.path)
                                      ? ((t = "Reference.child"),
                                        (i = !(n = 1)),
                                        (r =
                                            (r = e) &&
                                            r.replace(/^\/*\.info(\/|$)/, "/")),
                                        Go(t, n, r, i))
                                      : Go("Reference.child", 1, e, !1)),
                            new ta(this.database, Ft(this.path, e))
                        );
                    }),
                    (ta.prototype.getParent = function () {
                        W("Reference.parent", 0, 0, arguments.length);
                        var e = Mt(this.path);
                        return null === e ? null : new ta(this.database, e);
                    }),
                    (ta.prototype.getRoot = function () {
                        W("Reference.root", 0, 0, arguments.length);
                        for (var e = this; null !== e.getParent(); )
                            e = e.getParent();
                        return e;
                    }),
                    (ta.prototype.set = function (e, t) {
                        W("Reference.set", 1, 2, arguments.length),
                            $o("Reference.set", this.path),
                            Ho("Reference.set", 1, e, this.path, !1),
                            j("Reference.set", 2, t, !0);
                        var n = new f();
                        return (
                            gs(
                                this.repo,
                                this.path,
                                e,
                                null,
                                n.wrapCallback(t)
                            ),
                            n.promise
                        );
                    }),
                    (ta.prototype.update = function (e, t) {
                        if (
                            (W("Reference.update", 1, 2, arguments.length),
                            $o("Reference.update", this.path),
                            Array.isArray(e))
                        ) {
                            for (var n = {}, r = 0; r < e.length; ++r)
                                n["" + r] = e[r];
                            (e = n),
                                Pe(
                                    "Passing an Array to Firebase.update() is deprecated. Use set() if you want to overwrite the existing data, or an Object with integer keys if you really do want to only update some of the children."
                                );
                        }
                        Vo("Reference.update", 1, e, this.path, !1),
                            j("Reference.update", 2, t, !0);
                        var i = new f();
                        return (
                            (function (i, o, e, s) {
                                Es(i, "update", {
                                    path: o.toString(),
                                    value: e,
                                });
                                var a,
                                    t,
                                    n = !0,
                                    r = ps(i),
                                    u = {};
                                De(e, function (e, t) {
                                    (n = !1),
                                        (u[e] = xo(
                                            Ft(o, e),
                                            Bn(t),
                                            i.serverSyncTree_,
                                            r
                                        ));
                                }),
                                    n
                                        ? (Se(
                                              "update() called with empty data.  Don't do anything."
                                          ),
                                          Ss(0, s, "ok", void 0))
                                        : ((a = vs(i)),
                                          (t = oo(i.serverSyncTree_, o, u, a)),
                                          rs(i.eventQueue_, t),
                                          i.server_.merge(
                                              o.toString(),
                                              e,
                                              function (e, t) {
                                                  var n = "ok" === e;
                                                  n ||
                                                      Pe(
                                                          "update at " +
                                                              o +
                                                              " failed: " +
                                                              e
                                                      );
                                                  var r = so(
                                                          i.serverSyncTree_,
                                                          a,
                                                          !n
                                                      ),
                                                      n =
                                                          0 < r.length
                                                              ? Ps(i, o)
                                                              : o;
                                                  os(i.eventQueue_, n, r),
                                                      Ss(0, s, e, t);
                                              }
                                          ),
                                          De(e, function (e) {
                                              e = ks(i, Ft(o, e));
                                              Ps(i, e);
                                          }),
                                          os(i.eventQueue_, o, []));
                            })(this.repo, this.path, e, i.wrapCallback(t)),
                            i.promise
                        );
                    }),
                    (ta.prototype.setWithPriority = function (e, t, n) {
                        if (
                            (W(
                                "Reference.setWithPriority",
                                2,
                                3,
                                arguments.length
                            ),
                            $o("Reference.setWithPriority", this.path),
                            Ho(
                                "Reference.setWithPriority",
                                1,
                                e,
                                this.path,
                                !1
                            ),
                            zo("Reference.setWithPriority", 2, t, !1),
                            j("Reference.setWithPriority", 3, n, !0),
                            ".length" === this.getKey() ||
                                ".keys" === this.getKey())
                        )
                            throw (
                                "Reference.setWithPriority failed: " +
                                this.getKey() +
                                " is a read-only object."
                            );
                        var r = new f();
                        return (
                            gs(this.repo, this.path, e, t, r.wrapCallback(n)),
                            r.promise
                        );
                    }),
                    (ta.prototype.remove = function (e) {
                        return (
                            W("Reference.remove", 0, 1, arguments.length),
                            $o("Reference.remove", this.path),
                            j("Reference.remove", 1, e, !0),
                            this.set(null, e)
                        );
                    }),
                    (ta.prototype.transaction = function (e, r, t) {
                        var i = this;
                        if (
                            (W("Reference.transaction", 1, 3, arguments.length),
                            $o("Reference.transaction", this.path),
                            j("Reference.transaction", 1, e, !1),
                            j("Reference.transaction", 2, r, !0),
                            (function (e, t, n, r) {
                                if (
                                    (!r || void 0 !== n) &&
                                    "boolean" != typeof n
                                )
                                    throw new Error(
                                        Q(e, t, r) + "must be a boolean."
                                    );
                            })("Reference.transaction", 3, t, !0),
                            ".length" === this.getKey() ||
                                ".keys" === this.getKey())
                        )
                            throw (
                                "Reference.transaction failed: " +
                                this.getKey() +
                                " is a read-only object."
                            );
                        void 0 === t && (t = !0);
                        var o = new f();
                        "function" == typeof r &&
                            o.promise.catch(function () {});
                        function n() {}
                        var s = new ta(this.database, this.path);
                        s.on("value", n);
                        return (
                            (function (e, t, n, r, i, o) {
                                Es(e, "transaction on " + t);
                                var s = {
                                        path: t,
                                        update: n,
                                        onComplete: r,
                                        status: null,
                                        order: we(),
                                        applyLocally: o,
                                        retryCount: 0,
                                        unwatcher: i,
                                        abortReason: null,
                                        currentWriteId: null,
                                        currentInputSnapshot: null,
                                        currentOutputSnapshotRaw: null,
                                        currentOutputSnapshotResolved: null,
                                    },
                                    n = Ts(e, t, void 0);
                                (s.currentInputSnapshot = n),
                                    void 0 === (r = s.update(n.val()))
                                        ? (s.unwatcher(),
                                          (s.currentOutputSnapshotRaw = null),
                                          (s.currentOutputSnapshotResolved =
                                              null),
                                          s.onComplete &&
                                              s.onComplete(
                                                  null,
                                                  !1,
                                                  s.currentInputSnapshot
                                              ))
                                        : (es(
                                              "transaction failed: Data returned ",
                                              r,
                                              s.path
                                          ),
                                          (s.status = 0),
                                          (i =
                                              Lo(
                                                  (o = Ao(
                                                      e.transactionQueueTree_,
                                                      t
                                                  ))
                                              ) || []).push(s),
                                          Mo(o, i),
                                          (o = void 0),
                                          "object" == typeof r &&
                                          null !== r &&
                                          D(r, ".priority")
                                              ? ((o = O(r, ".priority")),
                                                g(
                                                    Bo(o),
                                                    "Invalid priority returned by transaction. Priority must be a valid string, finite number, server value, or null."
                                                ))
                                              : (o = (
                                                    ho(e.serverSyncTree_, t) ||
                                                    qn.EMPTY_NODE
                                                )
                                                    .getPriority()
                                                    .val()),
                                          (i = ps(e)),
                                          (o = Bn(r, o)),
                                          (i = ko(o, n, i)),
                                          (s.currentOutputSnapshotRaw = o),
                                          (s.currentOutputSnapshotResolved = i),
                                          (s.currentWriteId = vs(e)),
                                          (s = io(
                                              e.serverSyncTree_,
                                              t,
                                              i,
                                              s.currentWriteId,
                                              s.applyLocally
                                          )),
                                          os(e.eventQueue_, t, s),
                                          Is(e, e.transactionQueueTree_));
                            })(
                                this.repo,
                                this.path,
                                e,
                                function (e, t, n) {
                                    e
                                        ? (o.reject(e),
                                          "function" == typeof r &&
                                              r(e, t, null))
                                        : ((n = new Ls(
                                              n,
                                              new ta(i.database, i.path),
                                              Pn
                                          )),
                                          o.resolve(new $s(t, n)),
                                          "function" == typeof r &&
                                              r(null, t, n));
                                },
                                function () {
                                    s.off("value", n);
                                },
                                t
                            ),
                            o.promise
                        );
                    }),
                    (ta.prototype.setPriority = function (e, t) {
                        W("Reference.setPriority", 1, 2, arguments.length),
                            $o("Reference.setPriority", this.path),
                            zo("Reference.setPriority", 1, e, !1),
                            j("Reference.setPriority", 2, t, !0);
                        var n = new f();
                        return (
                            gs(
                                this.repo,
                                Ft(this.path, ".priority"),
                                e,
                                null,
                                n.wrapCallback(t)
                            ),
                            n.promise
                        );
                    }),
                    (ta.prototype.push = function (e, t) {
                        W("Reference.push", 0, 2, arguments.length),
                            $o("Reference.push", this.path),
                            Ho("Reference.push", 1, e, this.path, !0),
                            j("Reference.push", 2, t, !0);
                        var n = ds(this.repo),
                            r = tr(n),
                            n = this.child(r),
                            i = this.child(r),
                            e =
                                null != e
                                    ? n.set(e, t).then(function () {
                                          return i;
                                      })
                                    : Promise.resolve(i);
                        return (
                            (n.then = e.then.bind(e)),
                            (n.catch = e.then.bind(e, void 0)),
                            "function" == typeof t && e.catch(function () {}),
                            n
                        );
                    }),
                    (ta.prototype.onDisconnect = function () {
                        return (
                            $o("Reference.onDisconnect", this.path),
                            new Fs(this.repo, this.path)
                        );
                    }),
                    Object.defineProperty(ta.prototype, "key", {
                        get: function () {
                            return this.getKey();
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    Object.defineProperty(ta.prototype, "parent", {
                        get: function () {
                            return this.getParent();
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    Object.defineProperty(ta.prototype, "root", {
                        get: function () {
                            return this.getRoot();
                        },
                        enumerable: !1,
                        configurable: !0,
                    }),
                    ta);
            function ta(e, t) {
                return Xs.call(this, e, t, new dr(), !1) || this;
            }
            (Ys.__referenceConstructor = ea),
                (Zs = ea),
                g(!qi, "__referenceConstructor has already been defined"),
                (qi = Zs);
            var na = "FIREBASE_DATABASE_EMULATOR_HOST",
                ra = {},
                ia = !1;
            function oa(e, t, n, r) {
                var i = n || e.options.databaseURL;
                void 0 === i &&
                    (e.options.projectId ||
                        Ie(
                            "Can't determine Firebase Database URL. Be sure to include  a Project ID when calling firebase.initializeApp()."
                        ),
                    Se("Using default host for project ", e.options.projectId),
                    (i = e.options.projectId + "-default-rtdb.firebaseio.com"));
                var o,
                    s = Os(i, r),
                    a = s.repoInfo,
                    n = void 0;
                (n = "undefined" != typeof process ? process.env[na] : n)
                    ? ((o = !0),
                      (i = "http://" + n + "?ns=" + a.namespace),
                      (a = (s = Os(i, r)).repoInfo))
                    : (o = !s.repoInfo.secure);
                t = r && o ? new Be() : new je(e, t);
                ts("Invalid Firebase Database URL", 1, s),
                    qt(s.path) ||
                        Ie(
                            "Database URL must point to the root of a Firebase Database (not including a child path)."
                        );
                t = (function (e, t, n) {
                    var r = O(ra, t.name);
                    r || ((r = {}), (ra[t.name] = r));
                    var i = O(r, e.toURLString());
                    i &&
                        Ie(
                            "Database initialized multiple times. Please make sure the format of the database URL matches with each database() call."
                        );
                    return (i = new ls(e, ia, t, n)), (r[e.toURLString()] = i);
                })(a, e, t);
                return new sa(t);
            }
            var sa =
                (Object.defineProperty(aa.prototype, "repo_", {
                    get: function () {
                        return (
                            this.instanceStarted_ ||
                                (cs(this.repoInternal_),
                                (this.instanceStarted_ = !0)),
                            this.repoInternal_
                        );
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                Object.defineProperty(aa.prototype, "root_", {
                    get: function () {
                        return (
                            this.rootInternal_ ||
                                (this.rootInternal_ = new ea(this, xt())),
                            this.rootInternal_
                        );
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                Object.defineProperty(aa.prototype, "app", {
                    get: function () {
                        return this.repo_.app;
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                (aa.prototype.useEmulator = function (e, t) {
                    var n;
                    this.checkDeleted_("useEmulator"),
                        this.instanceStarted_
                            ? Ie(
                                  "Cannot call useEmulator() after instance has already been initialized."
                              )
                            : ((n = this.repoInternal_),
                              (e = e),
                              (t = t),
                              (n.repoInfo_ = new Ye(
                                  e + ":" + t,
                                  !1,
                                  n.repoInfo_.namespace,
                                  n.repoInfo_.webSocketOnly,
                                  n.repoInfo_.nodeAdmin,
                                  n.repoInfo_.persistenceKey,
                                  n.repoInfo_.includeNamespaceInQueryParams
                              )),
                              n.repoInfo_.nodeAdmin &&
                                  (n.authTokenProvider_ = new Be()));
                }),
                (aa.prototype.ref = function (e) {
                    return (
                        this.checkDeleted_("ref"),
                        W("database.ref", 0, 1, arguments.length),
                        e instanceof ea
                            ? this.refFromURL(e.toString())
                            : void 0 !== e
                            ? this.root_.child(e)
                            : this.root_
                    );
                }),
                (aa.prototype.refFromURL = function (e) {
                    var t = "database.refFromURL";
                    this.checkDeleted_(t), W(t, 1, 1, arguments.length);
                    var n = Os(e, this.repo_.repoInfo_.nodeAdmin);
                    ts(t, 1, n);
                    e = n.repoInfo;
                    return (
                        this.repo_.repoInfo_.isCustomHost() ||
                            e.host === this.repo_.repoInfo_.host ||
                            Ie(
                                t +
                                    ": Host name does not match the current database: (found " +
                                    e.host +
                                    " but expected " +
                                    this.repo_.repoInfo_.host +
                                    ")"
                            ),
                        this.ref(n.path.toString())
                    );
                }),
                (aa.prototype.checkDeleted_ = function (e) {
                    null === this.repoInternal_ &&
                        Ie("Cannot call " + e + " on a deleted database.");
                }),
                (aa.prototype.goOffline = function () {
                    W("database.goOffline", 0, 0, arguments.length),
                        this.checkDeleted_("goOffline"),
                        bs(this.repo_);
                }),
                (aa.prototype.goOnline = function () {
                    var e;
                    W("database.goOnline", 0, 0, arguments.length),
                        this.checkDeleted_("goOnline"),
                        (e = this.repo_).persistentConnection_ &&
                            e.persistentConnection_.resume(as);
                }),
                (aa.ServerValue = {
                    TIMESTAMP: { ".sv": "timestamp" },
                    increment: function (e) {
                        return { ".sv": { increment: e } };
                    },
                }),
                aa);
            function aa(e) {
                var t = this;
                (this.repoInternal_ = e),
                    (this.instanceStarted_ = !1),
                    (this.INTERNAL = {
                        delete: function () {
                            return i(t, void 0, void 0, function () {
                                return o(this, function (e) {
                                    var t, n;
                                    return (
                                        this.checkDeleted_("delete"),
                                        (t = this.repo_),
                                        ((n = O(ra, t.app.name)) &&
                                            O(n, t.key) === t) ||
                                            Ie(
                                                "Database " +
                                                    t.app.name +
                                                    "(" +
                                                    t.repoInfo_ +
                                                    ") has already been deleted."
                                            ),
                                        bs(t),
                                        delete n[t.key],
                                        (this.repoInternal_ = null),
                                        (this.rootInternal_ = null),
                                        [2]
                                    );
                                });
                            });
                        },
                    }),
                    e instanceof ls ||
                        Ie(
                            "Don't call new Database() directly - please use firebase.database()."
                        );
            }
            var ua = Object.freeze({
                    __proto__: null,
                    forceLongPolling: function () {
                        pt.forceDisallow(), st.forceAllow();
                    },
                    forceWebSockets: function () {
                        st.forceDisallow();
                    },
                    isWebSocketsAvailable: function () {
                        return pt.isAvailable();
                    },
                    setSecurityDebugCallback: function (e, t) {
                        e.repo.persistentConnection_.securityDebugCallback_ = t;
                    },
                    stats: function (e, t) {
                        var i;
                        (e = e.repo),
                            void 0 === (t = t) && (t = !1),
                            "undefined" != typeof console &&
                                ((e = t
                                    ? (e.statsListener_ ||
                                          (e.statsListener_ = new Ir(e.stats_)),
                                      e.statsListener_.get())
                                    : e.stats_.get()),
                                (i = Object.keys(e).reduce(function (e, t) {
                                    return Math.max(t.length, e);
                                }, 0)),
                                De(e, function (e, t) {
                                    for (
                                        var n = e, r = e.length;
                                        r < i + 2;
                                        r++
                                    )
                                        n += " ";
                                    console.log(n + t);
                                }));
                    },
                    statsIncrementCounter: function (e, t) {
                        (e = e.repo),
                            (t = t),
                            e.stats_.incrementCounter(t),
                            (e = e.statsReporter_),
                            (t = t),
                            (e.statsToReport_[t] = !0);
                    },
                    dataUpdateCount: function (e) {
                        return e.repo.dataUpdateCount;
                    },
                    interceptServerData: function (e, t) {
                        (e = e.repo),
                            (t = t),
                            (e.interceptServerDataCallback_ = t);
                    },
                    initStandalone: function (e) {
                        var t = e.app,
                            n = e.url,
                            r = e.version,
                            i = e.customAuthImpl,
                            o = e.namespace,
                            e = void 0 !== (e = e.nodeAdmin) && e;
                        return (
                            ct(r),
                            (r = new K(
                                "auth-internal",
                                new $("database-standalone")
                            )).setComponent(
                                new H(
                                    "auth-internal",
                                    function () {
                                        return i;
                                    },
                                    "PRIVATE"
                                )
                            ),
                            { instance: oa(t, r, n, e), namespace: o }
                        );
                    },
                }),
                mt = Xt;
            (Xt.prototype.simpleListen = function (e, t) {
                this.sendRequest("q", { p: e }, t);
            }),
                (Xt.prototype.echo = function (e, t) {
                    this.sendRequest("echo", { d: e }, t);
                });
            var la,
                ha = Object.freeze({
                    __proto__: null,
                    DataConnection: mt,
                    RealTimeConnection: vt,
                    hijackHash: function (i) {
                        var o = Xt.prototype.put;
                        return (
                            (Xt.prototype.put = function (e, t, n, r) {
                                void 0 !== r && (r = i()),
                                    o.call(this, e, t, n, r);
                            }),
                            function () {
                                Xt.prototype.put = o;
                            }
                        );
                    },
                    ConnectionTarget: Ye,
                    queryIdentifier: function (e) {
                        return e.queryIdentifier();
                    },
                    forceRestClient: function (e) {
                        ia = e;
                    },
                }),
                ca = sa.ServerValue;
            ct((la = t.default).SDK_VERSION),
                la.INTERNAL.registerComponent(
                    new H(
                        "database",
                        function (e, t) {
                            t = t.instanceIdentifier;
                            return oa(
                                e.getProvider("app").getImmediate(),
                                e.getProvider("auth-internal"),
                                t,
                                void 0
                            );
                        },
                        "PUBLIC"
                    )
                        .setServiceProps({
                            Reference: ea,
                            Query: Ys,
                            Database: sa,
                            DataSnapshot: Ls,
                            enableLogging: le,
                            INTERNAL: ua,
                            ServerValue: ca,
                            TEST_ACCESS: ha,
                        })
                        .setMultipleInstances(!0)
                ),
                la.registerVersion("@firebase/database", "0.9.7");
        }.apply(this, arguments);
    } catch (e) {
        throw (
            (console.error(e),
            new Error(
                "Cannot instantiate firebase-database.js - be sure to load firebase-app.js first."
            ))
        );
    }
});
//# sourceMappingURL=firebase-database.js.map
