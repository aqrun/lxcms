!function(e){function n(t){if(r[t])return r[t].exports;var o=r[t]={i:t,l:!1,exports:{}};return e[t].call(o.exports,o,o.exports,n),o.l=!0,o.exports}var t=window.webpackJsonp;window.webpackJsonp=function(n,r,i){for(var a,s,c=0,u=[];c<n.length;c++)s=n[c],o[s]&&u.push(o[s][0]),o[s]=0;for(a in r)Object.prototype.hasOwnProperty.call(r,a)&&(e[a]=r[a]);for(t&&t(n,r,i);u.length;)u.shift()()};var r={},o={1:0};n.e=function(e){function t(){s.onerror=s.onload=null,clearTimeout(c);var n=o[e];0!==n&&(n&&n[1](new Error("Loading chunk "+e+" failed.")),o[e]=void 0)}var r=o[e];if(0===r)return new Promise(function(e){e()});if(r)return r[2];var i=new Promise(function(n,t){r=o[e]=[n,t]});r[2]=i;var a=document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript",s.charset="utf-8",s.async=!0,s.timeout=12e4,n.nc&&s.setAttribute("nonce",n.nc),s.src=n.p+""+e+".56775f58af253c9bfe02.js";var c=setTimeout(t,12e4);return s.onerror=s.onload=t,a.appendChild(s),i},n.m=e,n.c=r,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:r})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},n.p="dist/",n.oe=function(e){throw console.error(e),e},n(n.s=0)}([function(e,n,t){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var r=t(1);!function(e){e(function(){switch(Object(r.a)(),g.menuUri){case"/backend/admin-users":t.e(0).then(t.bind(null,3)).then(function(e){return e.init()})}})}(jQuery)},function(e,n,t){"use strict";function r(){$(".sidebar-menu li:not(.treeview) > a").on("click",function(){var e=$(this),n=e.parent().addClass("active");n.siblings(".treeview.active").find("> a").trigger("click"),n.siblings().removeClass("active").find("li").removeClass("active"),e.parents(".main-sidebar").find(".sidebar-menu>li").removeClass("active")})}function o(){var e=$('a[href="'+g.menuUri+'"]');e.parent().siblings().removeClass("active"),e.parent().addClass("active"),e.parents(".treeview").addClass("active")}function i(){window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";var e=document.head.querySelector('meta[name="csrf-token"]');e?window.axios.defaults.headers.common["X-CSRF-TOKEN"]=e.content:console.error("CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"),o(),r(),$('[data-toggle="popover"]').popover()}n.a=i;var a=t(2);t.n(a);$.fn.editable.defaults.params=function(e){return e._token=LA.token,e._editable=1,e._method="PUT",e},toastr.options={closeButton:!0,progressBar:!0,showMethod:"slideDown",timeOut:4e3}},function(e,n){e.exports={nprogress:"nprogress",spinner:"spinner"}}]);