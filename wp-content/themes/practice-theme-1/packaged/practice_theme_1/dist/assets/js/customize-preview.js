!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=5)}([function(e,t){e.exports=jQuery},,,,,function(e,t,n){e.exports=n(7)},,function(e,t,n){"use strict";n.r(t);var o=n(0),r=n.n(o),i=function(e,t){t=(((t||"")+"").toLowerCase().match(/<[a-z][a-z0-9]*>/g)||[]).join("");return e.replace(/<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi,"").replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,(function(e,n){return t.indexOf("<"+n.toLowerCase()+">")>-1?e:""}))};wp.customize("blogname",(function(e){e.bind((function(e){r()(".c-header__blogname").html(e)}))})),wp.customize("practice_theme_1_display_author_info",(function(e){e.bind((function(e){e?r()(".c-post-author").show():r()(".c-post-author").hide()}))})),wp.customize("practice_theme_1_accent_color",(function(e){e.bind((function(e){var t="",n=practice_theme_1["inline-css"];for(var o in n){for(var i in t+="".concat(o," {"),n[o]){var u=n[o][i];t+="".concat(i,": ").concat(wp.customize(u).get())}t+="}"}r()("#practice_theme_1-stylesheet-inline-css").html(t)}))})),wp.customize("practice_theme_1_site_info",(function(e){e.bind((function(e){r()(".c-site-info__text").html(i(e,"<a>"))}))}))}]);