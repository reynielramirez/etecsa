"use strict";

var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(n) {
    return typeof n;
} : function(n) {
    return n && "function" == typeof Symbol && n.constructor === Symbol && n !== Symbol.prototype ? "symbol" : typeof n;
};

!function(n) {
    function e(n) {
        return n = n || "", u.filter(function(e) {
            return n.match(new RegExp(e + "$", "gi"));
        }).pop();
    }
    function t() {
        var n = window.chrome, e = window.navigator, t = e.vendor, i = e.userAgent.indexOf("OPR") > -1, o = e.userAgent.indexOf("Edge") > -1;
        return null !== n && void 0 !== n && "Google Inc." === t && 0 == i && 0 == o;
    }
    function i() {
        var n = navigator.userAgent || navigator.vendor || window.opera, e = n.substr(0, 4);
        return /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(n) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(e);
    }
    function o() {
        var n;
        try {
            n = localStorage.getItem(m), n = JSON.parse(n);
        } catch (n) {}
        return n && "object" === ("undefined" == typeof n ? "undefined" : _typeof(n)) ? n : {};
    }
    function s(n) {
        localStorage.setItem(m, JSON.stringify(n));
    }
    function a(t, i) {
        n(t).not(".open-accessibility *").each(function() {
            var t = n(this), o = t.attr("data-open-accessibility-text-original");
            o || (o = t.css("font-size"), t.attr("data-open-accessibility-text-original", o));
            var s = e(o) || "", a = parseFloat(o) * i;
            t.css("font-size", a + s);
        });
    }
    function c(e) {
        var t = n(".open-accessibility-menu");
        try {
			Object.keys(e).forEach(function(n, i) {
				t.find('[data-lang="' + n + '"]').text(e[n]);
			});
		}catch(error){}
    }
    function l(e, t) {
        var i = {};
        return e.forEach(function(e) {
            var o = t && t[e] || d[e];
            if(n.isPlainObject(o)){
				i[e] = o;
			}
        }), i;
    }
    function r(n) {
        var e = "open-accessibility-size-";
        return e + n;
    }
    var d = {
        he: {
            "zoom-out": "הקטן",
            "zoom-in": "הגדל",
            invert: "היפוך צבעים",
            "bigger-mouse": "עכבר גדול",
            brightness: "בהירות",
            contrast: "ניגודיות",
            grayscale: "גווני אפור",
            reset: "ביטול שינויים"
        },
        en: {
            "zoom-out": "Zoom Out",
            "zoom-in": "Zoom In",
            invert: "Invert",
            "bigger-cursor": "Bigger Cursor",
            brightness: "Brightness",
            contrast: "Contrast",
            grayscale: "Grayscale",
            reset: "Undo Changes"
        },
        es: {
            "zoom-out": "Disminuir texto",
            "zoom-in": "Aumentar texto",
            invert: "Invertir",
            "bigger-cursor": "Cursor grande",
            brightness: "Brillo",
            contrast: "Contraste",
            grayscale: "Escala de grises",
            reset: "Restablecer"
        }
    }, p = '<div class="open-accessibility-cursor-workaround"></div>\n<div id="open-accessibility" class="open-accessibility open-accessibility-collapsed">\n    <div class="open-accessibility-container">\n\n        <div class="open-accessibility-expand-button">\n            <?xml version="1.0" encoding="utf-8"?>\n<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xodm="http://www.corel.com/coreldraw/odm/2003" xml:space="preserve" width="800px" height="800px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 811.25 811.26"><defs><style type="text/css"><![CDATA[.fil1 {fill:#FEFEFE}.fil0 {fill:#0099CC;fill-rule:nonzero}]]></style></defs><g id="Capa_x0020_1"><metadata id="CorelCorpID_0Corel-Layer"/><g id="_1274680143552"><path class="fil0" d="M405.63 0c112,0 213.41,45.4 286.81,118.81 73.41,73.4 118.81,174.81 118.81,286.82 0,112 -45.4,213.41 -118.81,286.82 -73.4,73.4 -174.81,118.81 -286.81,118.81 -112.01,0 -213.42,-45.41 -286.82,-118.81 -73.41,-73.41 -118.81,-174.82 -118.81,-286.82 0,-112.01 45.4,-213.42 118.81,-286.82 73.4,-73.41 174.81,-118.81 286.82,-118.81zm239.62 166c-61.32,-61.32 -146.04,-99.25 -239.62,-99.25 -93.59,0 -178.31,37.93 -239.63,99.25 -61.32,61.32 -99.25,146.04 -99.25,239.63 0,93.58 37.93,178.3 99.25,239.63 61.32,61.32 146.04,99.25 239.63,99.25 93.58,0 178.3,-37.93 239.62,-99.25 61.32,-61.33 99.25,-146.05 99.25,-239.63 0,-93.59 -37.93,-178.31 -99.25,-239.63z"/><path class="fil1" d="M405.63 129.97c152.23,0 275.65,123.42 275.65,275.66 0,152.24 -123.42,275.65 -275.65,275.65 -152.24,0 -275.66,-123.41 -275.66,-275.65 0,-152.24 123.42,-275.66 275.66,-275.66zm-51.83 68.76c6.95,-14.17 19.78,-24.16 33.77,-29.1 24.75,-8.74 45.47,-1.09 58.91,13.63l-0.03 0.02c5.32,5.83 9.41,12.73 12.08,20.09 2.66,7.38 3.95,15.31 3.65,23.18 -0.77,20.46 -11.86,40.39 -36.56,49.79l-2.37 0.8c-15.43,5.14 -30.76,3.13 -43.37,-3.22 -12.62,-6.35 -22.61,-17.15 -27.33,-29.55l0 -0.05 -0.66 -1.88 0 -0.05c-5.6,-16.84 -4.01,-31.61 1.91,-43.66zm-19.66 201.82c0.2,-14.98 0.39,-30.28 -1.17,-44.02 -9.43,-4.08 -23.05,-9.11 -37.29,-14.38 -32.78,-12.12 -68.6,-25.36 -75.26,-37.07 -1.93,-3.38 -3.24,-6.95 -3.97,-10.56 -1.48,-7.27 -0.59,-14.67 2.21,-21.12 2.87,-6.62 7.75,-12.3 14.15,-15.95 2.89,-1.65 6.13,-2.88 9.68,-3.6 14.28,-2.9 44.29,9.36 77.13,22.78 33,13.48 69.13,28.24 87.04,27.97 16.26,-0.25 49.33,-13.72 80.78,-26.52 35.13,-14.3 68.42,-27.85 84.03,-23.63 4.91,1.32 9.21,3.8 12.78,7.05 4.63,4.23 8.02,9.84 9.81,15.96 1.77,6.06 1.98,12.67 0.28,18.96 -1.34,4.97 -3.83,9.74 -7.63,13.89l-0.05 0c-7.29,7.99 -23.68,13.91 -35.76,18.28l-4.72 1.71c-4.67,1.73 -10.67,3.9 -17,6.18 -17.39,6.28 -37.52,13.54 -51.11,19.74 -1.56,14.22 -1.36,30.04 -1.16,45.57 0.09,6.13 0.16,12.23 0.14,18.31 -0.13,28.03 12.14,57.98 25.13,89.71 9.04,22.06 18.42,44.95 24.74,69.59 2.62,10.24 1.57,19.27 -1.83,26.55 -2.85,6.13 -7.38,10.98 -12.83,14.3l0.02 0.03c-5.38,3.27 -11.64,4.96 -18.04,4.82 -7.84,-0.16 -15.81,-3.01 -22.53,-8.98 -9.15,-8.14 -26.55,-57.47 -37.11,-87.42 -2.87,-8.15 -5.2,-14.77 -6.71,-18.69l-2.24 -6.09 -0.02 0c-4.48,-12.24 -8.38,-22.85 -20.92,-22.37 -11.63,0.44 -15.67,11.99 -20.14,24.77 -0.8,2.27 -1.61,4.58 -2.71,7.54 -2.82,7.57 -5.37,14.63 -7.92,21.7 -3.95,10.98 -7.93,22.01 -11.1,30.29l-0.05 0c-1.09,2.82 -2.44,7.01 -3.86,11.43 -5.32,16.46 -11.58,35.86 -24.78,43.07 -9.81,5.36 -19.06,6.03 -27.03,3.59 -4.3,-1.32 -8.11,-3.51 -11.36,-6.34 -3.07,-2.68 -5.64,-5.95 -7.64,-9.6 -4.87,-8.92 -6.29,-20.37 -3.06,-30.9 5.29,-17.27 12.32,-34.83 19.49,-52.76 14.48,-36.17 29.57,-73.86 29.46,-106.92 -0.02,-5.6 0.06,-11.21 0.13,-16.87z"/></g></g></svg>\n        </div>\n\n        <div class="open-accessibility-menu">\n            <div class="open-accessibility-close-button">\n                <?xml version="1.0" encoding="utf-8"?>\n<svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n    viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">\n<path fill="#000000" d="M22,20l5.9,5.9l-2,2L20,22l-5.9,5.9l-2-2L18,20l-5.9-5.9l2-2L20,18l5.9-5.9l2,2L22,20z"/>\n</svg>\n                \n            </div>\n\n            <div class="open-accessibility-menu-button open-accessibility-zoom-out-button">\n                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 106"><title>zoom-out</title><g id="Exploded_Icons" data-name="Exploded Icons"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M83.14,50.55H81.38l-.62-.6a14.44,14.44,0,1,0-1.56,1.56l.6.62v1.75L90.91,65l3.31-3.31Zm-13.34,0a10,10,0,1,1,10-10A10,10,0,0,1,69.8,50.55Zm1.11-11.11H64.25v2.22H75.36V39.44Z"/></g></svg>\n                <span data-lang="zoom-out">הקטן</span>\n            </div>\n\n            <div class="open-accessibility-menu-button open-accessibility-zoom-in-button">\n                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 106"><title>zoom-in</title><g id="Exploded_Icons" data-name="Exploded Icons"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M84.53,50.55H82.77l-.62-.6a14.33,14.33,0,1,0-1.55,1.56l.6.62v1.75L92.31,65l3.31-3.31Zm-13.33,0a10,10,0,1,1,10-10A10,10,0,0,1,71.2,50.55Zm5.55-8.89H72.31v4.45H70.08V41.66H65.64V39.44h4.44V35h2.23v4.45h4.44Z"/></g></svg>\n                <span data-lang="zoom-in">הגדל</span>\n            </div>\n\n            <div class="open-accessibility-menu-button open-accessibility-invert-button">\n                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 106"><title>invert</title><g id="Exploded_Icons" data-name="Exploded Icons"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M86.65,37.45,75.54,26.34,64.42,37.45a15.71,15.71,0,1,0,22.23,0ZM75.54,60.35a11.78,11.78,0,0,1-8.33-20.11l8.33-8.35Z"/></g></svg>                \n                <span data-lang="invert">היפוך צבעים</span>\n            </div>\n\n            <div class="open-accessibility-menu-button open-accessibility-cursor-button">\n                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 106"><title>cursor</title><g id="Exploded_Icons" data-name="Exploded Icons"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M83,47.53l-.07-.07V46H81.52L81.45,46V44.55H80L80,44.48V43.06H78.55L78.48,43V41.58H77.06L77,41.51V40.09H75.57L75.5,40V38.6H74.08L74,38.53V37.11H72.59L72.52,37V35.62H71.11L71,35.55V34.14H69.62l-.07-.07V32.65H68.13l-.07-.07V31.16H66.57V56.45h3V55l.07-.07H71V53.55l.07-.07h1.41V52.06l.07-.07h1.35l.07.07V55h1.42l.07.07v2.9h1.42L77,58v1.42h3V58l.07-.07h1.42V55H80L80,54.9V52H78.55l-.07-.07V50.5h6v-3ZM78.48,49H77v3H78.4l.08.07V55h1.41L80,55v2.83l-.07.07H77.06L77,57.87V55H75.57l-.07-.07V52H74.08L74,51.92V50.5H72.52v1.42l-.07.07H71v1.42l-.07.07H69.55V54.9l-.07.07H68.06V34.14h1.42l.07.07v1.41H71l.07.07v1.42h1.41l.07.07V38.6h1.42l.07.07v1.42h1.42l.07.07v1.42h1.42l.07.07v1.41H78.4l.08.07v1.42h1.41l.07.07V46h1.42l.07.07v1.42h1.42l.07.07V49Z"/></g></svg>\n                <span data-lang="bigger-cursor">עכבר גדול</span>\n            </div>\n\n            <div class="open-accessibility-menu-button open-accessibility-brightness-button">\n                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 106"><title>brightness</title><g id="Exploded_Icons" data-name="Exploded Icons"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M88.29,50.51l5.22-5.21-5.22-5.22v-7.4H80.9l-5.22-5.21-5.22,5.21H63.07v7.4L57.85,45.3l5.22,5.21v7.4h7.39l5.22,5.22,5.22-5.22h7.39ZM75.68,54.75V35.84a9.46,9.46,0,1,1,0,18.91Z"/></g></svg>                \n                <span data-lang="brightness">בהירות</span>\n            </div>\n\n            <div class="open-accessibility-menu-button open-accessibility-contrast-button">\n                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 106"><title>contrast</title><g id="Exploded_Icons" data-name="Exploded Icons"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M71.85,28.87H62.73a3.66,3.66,0,0,0-3.65,3.65V58.07a3.66,3.66,0,0,0,3.65,3.65h9.12v3.65H75.5V25.22H71.85Zm0,27.37H62.73L71.85,45.3ZM88.27,28.87H79.15v3.65h9.12V56.24L79.15,45.3V61.72h9.12a3.66,3.66,0,0,0,3.65-3.65V32.52A3.66,3.66,0,0,0,88.27,28.87Z"/></g></svg>\n                <span data-lang="contrast">ניגודיות</span>\n            </div>\n\n            <div class="open-accessibility-menu-button open-accessibility-monochrome-button">\n                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 106"><title>monochrome</title><g id="Exploded_Icons" data-name="Exploded Icons"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M90.28,32.87H84.44l-3.28-3.65h-11l-3.29,3.65H61.08a3.66,3.66,0,0,0-3.65,3.65V58.43a3.66,3.66,0,0,0,3.65,3.65h29.2a3.66,3.66,0,0,0,3.65-3.65V36.52A3.66,3.66,0,0,0,90.28,32.87Zm0,25.56H75.68V56.6a9.13,9.13,0,0,1,0-18.25V36.52h14.6Zm-5.47-11a9,9,0,0,0-9.13-9.12v3.28a5.84,5.84,0,0,1,0,11.68V56.6A9,9,0,0,0,84.81,47.47Zm-15,0a5.77,5.77,0,0,0,5.84,5.84V41.63A5.77,5.77,0,0,0,69.84,47.47Z"/></g></svg>\n                <span data-lang="grayscale">גווני אפור</span>\n            </div>\n\n            <div class="open-accessibility-menu-button open-accessibility-reset-button">\n                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 106"><title>revert</title><g id="Exploded_Icons" data-name="Exploded Icons"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" d="M75.26,38.68A17,17,0,0,0,64,42.91l-5.86-5.86V51.7H72.81l-5.89-5.89A13,13,0,0,1,87.63,51.7l3.86-1.27A17.12,17.12,0,0,0,75.26,38.68Z"/></g></svg>\n                <span data-lang="reset">בטל שינויים</span>\n            </div>\n\n\n            <div class="open-accessibility-menu-footer"></div>\n\n\n        </div>\n\n\n    </div>\n</div>', m = "open-accessibility-config", u = [ "px", "cm", "em", "ex", "in", "mm", "pc", "pt", "vh", "vw", "vmin" ];
    n.fn.accessibility = function(e) {
        function d() {
            b.isMenuOpened ? (x.fadeOut(300), f.fadeIn(300), w.removeClass("open-accessibility-collapsed"),
                w.addClass("open-accessibility-expanded")) : (x.fadeIn(300), f.fadeOut(300), w.removeClass("open-accessibility-expanded"),
                w.addClass("open-accessibility-collapsed"));
            var n = [];
            b.invert && n.push("invert(1)"), n.push("contrast(" + b.contrast + "%)"), n.push("brightness(" + b.brightness + "%)"),
                n.push("grayscale(" + b.grayscale + "%)");
            var e = n.join(" ");
            y.css("filter", e), y.css("-ms-filter", e), y.css("-moz-filter", e), y.css("-webkit-filter", e),
                y.css("-o-filter", e), a(b.textSelector, b.zoom), b.cursor ? (h.addClass("open-accessibility-cursor"),
            O || I.show()) : (h.removeClass("open-accessibility-cursor"), O || I.hide()), s(b);
        }
        var m = this;
        e = e || {};
        var u = {
            isMenuOpened: !1,
            highlightedLinks: !1,
            isMobileEnabled: !0,
            grayscale: 0,
            brightness: 100,
            contrast: 100,
            maxZoomLevel: 3,
            minZoomLevel: .5,
            zoomStep: .2,
            zoom: 1,
            cursor: !1,
            textSelector: ".open-accessibility-text",
            invert: !1,
            localization: [ "he" ],
            iconSize: "m",
            items: "body"
        }, v = o(), g = n.extend({}, u, e), b = n.extend({}, g, v, e);
        if (!b.isMobileEnabled && i()) return void console.log("disabling accessibility plugin due to mobile browser");
        m.prepend(p);
        var h = n("html"), y = n(b.items), w = n(".open-accessibility"), f = n(".open-accessibility-menu"), x = n(".open-accessibility-expand-button"), k = n(".open-accessibility-close-button"), V = n(".open-accessibility-invert-button"), z = n(".open-accessibility-cursor-button"), H = n(".open-accessibility-zoom-in-button"), _ = n(".open-accessibility-zoom-out-button"), M = n(".open-accessibility-brightness-button"), C = n(".open-accessibility-monochrome-button"), L = n(".open-accessibility-contrast-button"), Z = n(".open-accessibility-reset-button"), I = n(".open-accessibility-cursor-workaround");
        w.addClass(r(b.iconSize));
        var E = l(b.localization, b.localizationMap);
		try {
			c(E[Object.keys(E)[0]]), h.addClass("open-accessibility-zoom"), M.click(function() {
				b.brightness += 50, b.brightness > 150 && (b.brightness = 50), d();
			}), L.click(function() {
				b.contrast += 50, b.contrast > 150 && (b.contrast = 50), d();
			}), C.click(function() {
				b.grayscale += 100, b.grayscale > 100 && (b.grayscale = 0), d();
			}), Z.click(function() {
				b = n.extend({}, g), b.isMenuOpened = !1, d();
			}), H.click(function() {
				b.zoom = Math.min(b.maxZoomLevel, b.zoom + b.zoomStep), d();
			}), _.click(function() {
				b.zoom = Math.max(b.minZoomLevel, b.zoom - b.zoomStep), d();
			}), V.click(function() {
				b.invert = !b.invert, d();
			}), z.click(function() {
				b.cursor = !b.cursor, d();
			}), x.click(function() {
				b.isMenuOpened = !0, d();
			}), k.click(function() {
				b.isMenuOpened = !1, d();
			}), n(document).click(function(e) {
				n(e.target).closest(".open-accessibility").length || b.isMenuOpened && (b.isMenuOpened = !1,
					d());
			}), x.hide(), f.hide(), e.isMenuOpened ? (b.isMenuOpened = !0, f.show(), x.hide()) : b.isMenuOpened = !1,
				I.hide();
			var O = t();
			O || n(document).on("mousemove", function(n) {
				b.cursor && I.css({
					left: n.pageX / b.zoom,
					top: n.pageY / b.zoom
				});
			}), a(b.textSelector, 1), d();
		}catch(error){}
    };
}(jQuery || $);

