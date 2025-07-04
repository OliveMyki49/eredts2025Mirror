!(function (e, t) {
    "object" == typeof exports && "undefined" != typeof module
      ? t(exports)
      : "function" == typeof define && define.amd
      ? define(["exports"], t)
      : t(((e = e || self)["leaflet-kmz"] = {}));
  })(this, function (e) {
    "use strict";
    function t(e) {
      return e["doc.kml"]
        ? "doc.kml"
        : (function (e) {
            return e.filter((e) => /.*\.kml/.test(e));
          })(Object.keys(e))[0];
    }
    function o(e) {
      return /\.(jpe?g|png|gif|bmp)$/i.test(e);
    }
    function i(e, t) {
      return t instanceof Promise
        ? t
        : Promise.all(
            e.map((e) =>
              (function (e) {
                return new Promise((t, o) => {
                  let i = document.createElement("script");
                  i.addEventListener("load", t.bind(e), { once: !0 }),
                    (i.src = e),
                    document.head.appendChild(i);
                });
              })(e)
            )
          );
    }
    function n(e, t) {
      let [o, i] = (function (e) {
          let t = L.latLngBounds(
              [
                e.getElementsByTagName("south")[0].childNodes[0].nodeValue,
                e.getElementsByTagName("west")[0].childNodes[0].nodeValue
              ],
              [
                e.getElementsByTagName("north")[0].childNodes[0].nodeValue,
                e.getElementsByTagName("east")[0].childNodes[0].nodeValue
              ]
            ),
            o = e.getElementsByTagName("rotation")[0];
          return (
            void 0 !== o && (o = parseFloat(o.childNodes[0].nodeValue)), [t, o]
          );
        })(e.getElementsByTagName("LatLonBox")[0]),
        n = e.getElementsByTagName("href")[0],
        r = e.getElementsByTagName("color")[0],
        a = e.getElementsByTagName("Icon")[0],
        s = {};
      return (
        !n && a && (n = a.getElementsByTagName("href")[0]),
        (n = n.childNodes[0].nodeValue),
        (n = t.icons[n] || n),
        r &&
          ((r = r.childNodes[0].nodeValue),
          (s.opacity = parseInt(r.substring(0, 2), 16) / 255),
          (s.color =
            "#" + r.substring(6, 8) + r.substring(4, 6) + r.substring(2, 4))),
        i && (s.rotation = i),
        new L.KMZImageOverlay(n, o, { opacity: s.opacity, angle: s.rotation })
      );
    }
    function r(e) {
      var t = e;
      if (e instanceof ArrayBuffer) {
        var o = (t = new Uint8Array(e).reduce(function (e, t) {
          return e + String.fromCharCode(t);
        }, ""))
          .substring(0, t.indexOf("?>"))
          .match(/encoding\s*=\s*["'](.*)["']/i);
        o && (t = new TextDecoder(o[1]).decode(e));
      }
      return t
        ? new DOMParser().parseFromString(t, "text/xml")
        : document.implementation.createDocument(null, "kml");
    }
    const a = (L.KMZLayer = L.FeatureGroup.extend({
      options: {
        interactive: !0,
        ballon: !0,
        bindPopup: !0,
        bindTooltip: !0,
        preferCanvas: !1
      },
      initialize: function (e, t) {
        L.extend(this.options, t),
          L.Browser.mobile && (this.options.bindTooltip = !1),
          (this._layers = {}),
          e && this.load(e);
      },
      add: function (e) {
        this.load(e);
      },
      load: function (e) {
        L.KMZLayer._jsPromise = i(
          this._requiredJSModules(),
          L.KMZLayer._jsPromise
        )
          .then(() => {
            return (
              (t = e),
              new Promise((e, o) => {
                let i = new XMLHttpRequest();
                i.open("GET", t),
                  i.setRequestHeader("X-Requested-With", "XMLHttpRequest"),
                  (i.responseType = "arraybuffer"),
                  (i.onload = () => {
                    4 !== i.readyState || (200 !== i.status && 0 !== i.status)
                      ? e("")
                      : e(i.response || i.responseText);
                  }),
                  (i.onerror = () =>
                    o("Error " + i.status + " while fetching remote file: " + t)),
                  i.send();
              })
            );
            var t;
          })
          .then((t) => {
            return this.parse(t, {
              name: ((o = e), o.split("/").pop()),
              icons: {}
            });
            var o;
          });
      },
      parse: function (e, t) {
        return (
          (o = e),
          "PK" ===
          String.fromCharCode(new Uint8Array(o, 0, 1), new Uint8Array(o, 1, 1))
            ? this._parseKMZ(e, t)
            : this._parseKML(e, t)
        );
        var o;
      },
      _parseKMZ: function (e, i) {
        var n;
        ((n = e),
        new Promise((e, t) => {
          window.JSZip.loadAsync(n).then((t) => {
            var i = Object.keys(t.files).map((e) => {
              var i = t.files[e];
              if (o(e)) {
                var n = e.split(".").pop().toLowerCase().replace("jpg", "jpeg"),
                  r = (function (e, t) {
                    var o = "text/plain";
                    return (
                      /\.(jpe?g|png|gif|bmp)$/i.test(e)
                        ? (o = "image/" + t)
                        : /\.kml$/i.test(e) && (o = "text/plain"),
                      o
                    );
                  })(e, n);
                return i
                  .async("base64")
                  .then((t) => [e, "data:" + r + ";base64," + t]);
              }
              return i.async("text").then((t) => [e, t]);
            });
            Promise.all(i).then((t) =>
              e(t.reduce((e, t) => ((e[t[0]] = t[1]), e), {}))
            );
          });
        })).then((e) => {
          var n = t(e),
            r = Object.keys(e).filter((e) => o(e)),
            a = e[n];
          (i.icons = r.reduce((t, o) => ((t[o] = e[o]), t), {})),
            this._parseKML(a, i);
        });
      },
      _parseKML: function (e, t) {
        var o = r(e),
          i = (function (e, t) {
            var o = e instanceof XMLDocument ? e : r(e),
              i = window.toGeoJSON.kml(o);
            return (i.properties = L.extend({}, i.properties, t || {})), i;
          })(o, t),
          n = (this.options.geometryToLayer || this._geometryToLayer).call(
            this,
            i,
            o
          );
        this.addLayer(n),
          this.fire("load", { layer: n, name: i.properties.name });
      },
      _geometryToLayer: function (e, t) {
        var o = this._map
            ? this._map.options.preferCanvas
            : this.options.preferCanvas,
          i = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'/%3E",
          r = L.geoJson(e, {
            pointToLayer: (t, n) =>
              o
                ? L.kmzMarker(n, {
                    iconUrl:
                      e.properties.icons[t.properties.icon] ||
                      t.properties.icon ||
                      i,
                    iconSize: [28, 28],
                    iconAnchor: [14, 14],
                    interactive: this.options.interactive
                  })
                : L.marker(n, {
                    icon: L.icon({
                      iconUrl:
                        e.properties.icons[t.properties.icon] ||
                        t.properties.icon ||
                        i,
                      iconSize: [28, 28],
                      iconAnchor: [14, 14]
                    }),
                    interactive: this.options.interactive
                  }),
            style: (e) => {
              var t = {},
                o = e.properties;
              return (
                o.stroke && ((t.stroke = !0), (t.color = o.stroke)),
                o.fill && ((t.fill = !0), (t.fillColor = o.fill)),
                o["stroke-opacity"] && (t.opacity = o["stroke-opacity"]),
                o["fill-opacity"] && (t.fillOpacity = o["fill-opacity"]),
                o["stroke-width"] && (t.weight = 1.05 * o["stroke-width"]),
                t
              );
            },
            onEachFeature: (e, t) => {
              if (this.options.ballon) {
                var o = e.properties,
                  i = o.name || "",
                  n = o.description || "";
                (i || n) &&
                  (this.options.bindPopup &&
                    t.bindPopup("<div><b>" + i + "</b><br>" + n + "</div>"),
                  this.options.bindTooltip &&
                    t.bindTooltip("<b>" + i + "</b>", {
                      direction: "auto",
                      sticky: !0
                    }));
              }
            },
            interactive: this.options.interactive
          });
        let a = t.getElementsByTagName("GroundOverlay");
        for (let t, o = 0; o < a.length; o++)
          (t = n(a[o], e.properties)), t && r.addLayer(t);
        return r;
      },
      _requiredJSModules: function () {
        var e = [],
          t = "https://unpkg.com/";
        return (
          "function" != typeof window.JSZip &&
            e.push(t + "jszip@3.5.0/dist/jszip.min.js"),
          "object" != typeof window.toGeoJSON &&
            e.push(t + "@tmcw/togeojson@4.1.0/dist/togeojson.umd.js"),
          e
        );
      }
    }));
    (L.kmzLayer = function (e, t) {
      return new L.KMZLayer(e, t);
    }),
      (L.KMZMarker = L.CircleMarker.extend({
        _updatePath: function () {
          var e = this._renderer,
            t = this._icon,
            o = this;
          e._drawing &&
            !o._empty() &&
            (t
              ? t.drawImage()
              : (((t = this._icon = new Image(
                  this.options.iconSize[0],
                  this.options.iconSize[1]
                )).anchor = [t.width / 2, t.height / 2]),
                (t.onload = t.drawImage = () => {
                  var i = o._point.subtract(t.anchor);
                  e._ctx.drawImage(t, i.x, i.y, t.width, t.height);
                }),
                (t.src = this.options.iconUrl)));
        }
      })),
      (L.kmzMarker = function (e, t) {
        return new L.KMZMarker(e, t);
      });
    var s = L.KMZMarker;
    (L.KMZImageOverlay = L.ImageOverlay.extend({
      options: { angle: 0 },
      _reset: function () {
        L.ImageOverlay.prototype._reset.call(this), this._rotate();
      },
      _animateZoom: function (e) {
        L.ImageOverlay.prototype._animateZoom.call(this, e), this._rotate();
      },
      _rotate: function () {
        if (L.DomUtil.TRANSFORM)
          this._image.style[L.DomUtil.TRANSFORM] +=
            " rotate(" + this.options.angle + "deg)";
        else if (L.Browser.ie) {
          var e = this.options.angle * (Math.PI / 180),
            t = Math.cos(e),
            o = Math.sin(e);
          this._image.style.filter +=
            " progid:DXImageTransform.Microsoft.Matrix(sizingMethod='auto expand', M11=" +
            t +
            ", M12=" +
            -o +
            ", M21=" +
            o +
            ", M22=" +
            t +
            ")";
        }
      },
      getBounds: function () {
        return this._bounds;
      }
    })),
      (e.KMZLayer = a),
      (e.KMZMarker = s),
      Object.defineProperty(e, "__esModule", { value: !0 });
  });
  //# sourceMappingURL=leaflet-kmz.js.map
  