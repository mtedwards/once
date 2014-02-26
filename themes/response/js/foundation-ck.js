/*
 * Foundation Responsive Library
 * http://foundation.zurb.com
 * Copyright 2013, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
*//*jslint unparam: true, browser: true, indent: 2 */// Accommodate running jQuery or Zepto in noConflict() mode by
// using an anonymous function to redefine the $ shorthand name.
// See http://docs.jquery.com/Using_jQuery_with_Other_Libraries
// and http://zeptojs.com/
var libFuncName=null;if(typeof jQuery=="undefined"&&typeof Zepto=="undefined"&&typeof $=="function")libFuncName=$;else if(typeof jQuery=="function")libFuncName=jQuery;else{if(typeof Zepto!="function")throw new TypeError;libFuncName=Zepto}(function(e,t,n,r){"use strict";t.matchMedia=t.matchMedia||function(e,t){var n,r=e.documentElement,i=r.firstElementChild||r.firstChild,s=e.createElement("body"),o=e.createElement("div");o.id="mq-test-1";o.style.cssText="position:absolute;top:-100em";s.style.background="none";s.appendChild(o);return function(e){o.innerHTML='&shy;<style media="'+e+'"> #mq-test-1 { width: 42px; }</style>';r.insertBefore(s,i);n=o.offsetWidth===42;r.removeChild(s);return{matches:n,media:e}}}(n);Array.prototype.filter||(Array.prototype.filter=function(e){if(this==null)throw new TypeError;var t=Object(this),n=t.length>>>0;if(typeof e!="function")return;var r=[],i=arguments[1];for(var s=0;s<n;s++)if(s in t){var o=t[s];e&&e.call(i,o,s,t)&&r.push(o)}return r});Function.prototype.bind||(Function.prototype.bind=function(e){if(typeof this!="function")throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");var t=Array.prototype.slice.call(arguments,1),n=this,r=function(){},i=function(){return n.apply(this instanceof r&&e?this:e,t.concat(Array.prototype.slice.call(arguments)))};r.prototype=this.prototype;i.prototype=new r;return i});Array.prototype.indexOf||(Array.prototype.indexOf=function(e){if(this==null)throw new TypeError;var t=Object(this),n=t.length>>>0;if(n===0)return-1;var r=0;if(arguments.length>1){r=Number(arguments[1]);r!=r?r=0:r!=0&&r!=Infinity&&r!=-Infinity&&(r=(r>0||-1)*Math.floor(Math.abs(r)))}if(r>=n)return-1;var i=r>=0?r:Math.max(n-Math.abs(r),0);for(;i<n;i++)if(i in t&&t[i]===e)return i;return-1});e.fn.stop=e.fn.stop||function(){return this};t.Foundation={name:"Foundation",version:"4.3.1",cache:{},init:function(t,n,r,i,s,o){var u,a=[t,r,i,s],f=[],o=o||!1;o&&(this.nc=o);this.rtl=/rtl/i.test(e("html").attr("dir"));this.scope=t||this.scope;if(n&&typeof n=="string"&&!/reflow/i.test(n)){if(/off/i.test(n))return this.off();u=n.split(" ");if(u.length>0)for(var l=u.length-1;l>=0;l--)f.push(this.init_lib(u[l],a))}else{/reflow/i.test(n)&&(a[1]="reflow");for(var c in this.libs)f.push(this.init_lib(c,a))}typeof n=="function"&&a.unshift(n);return this.response_obj(f,a)},response_obj:function(e,t){for(var n=0,r=t.length;n<r;n++)if(typeof t[n]=="function")return t[n]({errors:e.filter(function(e){if(typeof e=="string")return e})});return e},init_lib:function(e,t){return this.trap(function(){if(this.libs.hasOwnProperty(e)){this.patch(this.libs[e]);return this.libs[e].init.apply(this.libs[e],t)}return function(){}}.bind(this),e)},trap:function(e,t){if(!this.nc)try{return e()}catch(n){return this.error({name:t,message:"could not be initialized",more:n.name+" "+n.message})}return e()},patch:function(e){this.fix_outer(e);e.scope=this.scope;e.rtl=this.rtl},inherit:function(e,t){var n=t.split(" ");for(var r=n.length-1;r>=0;r--)this.lib_methods.hasOwnProperty(n[r])&&(this.libs[e.name][n[r]]=this.lib_methods[n[r]])},random_str:function(e){var t="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".split("");e||(e=Math.floor(Math.random()*t.length));var n="";for(var r=0;r<e;r++)n+=t[Math.floor(Math.random()*t.length)];return n},libs:{},lib_methods:{set_data:function(e,t){var n=[this.name,+(new Date),Foundation.random_str(5)].join("-");Foundation.cache[n]=t;e.attr("data-"+this.name+"-id",n);return t},get_data:function(e){return Foundation.cache[e.attr("data-"+this.name+"-id")]},remove_data:function(t){if(t){delete Foundation.cache[t.attr("data-"+this.name+"-id")];t.attr("data-"+this.name+"-id","")}else e("[data-"+this.name+"-id]").each(function(){delete Foundation.cache[e(this).attr("data-"+this.name+"-id")];e(this).attr("data-"+this.name+"-id","")})},throttle:function(e,t){var n=null;return function(){var r=this,i=arguments;clearTimeout(n);n=setTimeout(function(){e.apply(r,i)},t)}},data_options:function(t){function u(e){return!isNaN(e-0)&&e!==null&&e!==""&&e!==!1&&e!==!0}function a(t){return typeof t=="string"?e.trim(t):t}var n={},r,i,s=(t.attr("data-options")||":").split(";"),o=s.length;for(r=o-1;r>=0;r--){i=s[r].split(":");/true/i.test(i[1])&&(i[1]=!0);/false/i.test(i[1])&&(i[1]=!1);u(i[1])&&(i[1]=parseInt(i[1],10));i.length===2&&i[0].length>0&&(n[a(i[0])]=a(i[1]))}return n},delay:function(e,t){return setTimeout(e,t)},scrollTo:function(n,r,i){if(i<0)return;var s=r-e(t).scrollTop(),o=s/i*10;this.scrollToTimerCache=setTimeout(function(){if(!isNaN(parseInt(o,10))){t.scrollTo(0,e(t).scrollTop()+o);this.scrollTo(n,r,i-10)}}.bind(this),10)},scrollLeft:function(e){if(!e.length)return;return"scrollLeft"in e[0]?e[0].scrollLeft:e[0].pageXOffset},empty:function(e){if(e.length&&e.length>0)return!1;if(e.length&&e.length===0)return!0;for(var t in e)if(hasOwnProperty.call(e,t))return!1;return!0}},fix_outer:function(e){e.outerHeight=function(e,t){return typeof Zepto=="function"?e.height():typeof t!="undefined"?e.outerHeight(t):e.outerHeight()};e.outerWidth=function(e,t){return typeof Zepto=="function"?e.width():typeof t!="undefined"?e.outerWidth(t):e.outerWidth()}},error:function(e){return e.name+" "+e.message+"; "+e.more},off:function(){e(this.scope).off(".fndtn");e(t).off(".fndtn");return!0},zj:e};e.fn.foundation=function(){var e=Array.prototype.slice.call(arguments,0);return this.each(function(){Foundation.init.apply(Foundation,[this].concat(e));return this})}})(libFuncName,this,this.document);(function(e,t,n,r){"use strict";Foundation.libs.forms={name:"forms",version:"4.3.1",cache:{},settings:{disable_class:"no-custom",last_combo:null},init:function(t,n,r){typeof n=="object"&&e.extend(!0,this.settings,n);if(typeof n!="string"){this.settings.init||this.events();this.assemble();return this.settings.init}return this[n].call(this,r)},assemble:function(){e('form.custom input[type="radio"]',e(this.scope)).not('[data-customforms="disabled"]').not("."+this.settings.disable_class).each(this.append_custom_markup);e('form.custom input[type="checkbox"]',e(this.scope)).not('[data-customforms="disabled"]').not("."+this.settings.disable_class).each(this.append_custom_markup);e("form.custom select",e(this.scope)).not('[data-customforms="disabled"]').not("."+this.settings.disable_class).not("[multiple=multiple]").each(this.append_custom_select)},events:function(){var r=this;e(this.scope).on("click.fndtn.forms","form.custom span.custom.checkbox",function(t){t.preventDefault();t.stopPropagation();r.toggle_checkbox(e(this))}).on("click.fndtn.forms","form.custom span.custom.radio",function(t){t.preventDefault();t.stopPropagation();r.toggle_radio(e(this))}).on("change.fndtn.forms","form.custom select",function(t,n){if(e(this).is('[data-customforms="disabled"]'))return;r.refresh_custom_select(e(this),n)}).on("click.fndtn.forms","form.custom label",function(t){if(e(t.target).is("label")){var n=e("#"+r.escape(e(this).attr("for"))).not('[data-customforms="disabled"]'),i,s;if(n.length!==0)if(n.attr("type")==="checkbox"){t.preventDefault();i=e(this).find("span.custom.checkbox");i.length===0&&(i=n.add(this).siblings("span.custom.checkbox").first());r.toggle_checkbox(i)}else if(n.attr("type")==="radio"){t.preventDefault();s=e(this).find("span.custom.radio");s.length===0&&(s=n.add(this).siblings("span.custom.radio").first());r.toggle_radio(s)}}}).on("mousedown.fndtn.forms","form.custom div.custom.dropdown",function(){return!1}).on("click.fndtn.forms","form.custom div.custom.dropdown a.current, form.custom div.custom.dropdown a.selector",function(t){var n=e(this),s=n.closest("div.custom.dropdown"),o=i(s,"select");s.hasClass("open")||e(r.scope).trigger("click");t.preventDefault();if(!1===o.is(":disabled")){s.toggleClass("open");s.hasClass("open")?e(r.scope).on("click.fndtn.forms.customdropdown",function(){s.removeClass("open");e(r.scope).off(".fndtn.forms.customdropdown")}):e(r.scope).on(".fndtn.forms.customdropdown");return!1}}).on("click.fndtn.forms touchend.fndtn.forms","form.custom div.custom.dropdown li",function(t){var r=e(this),s=r.closest("div.custom.dropdown"),o=i(s,"select"),u=0;t.preventDefault();t.stopPropagation();if(!e(this).hasClass("disabled")){e("div.dropdown").not(s).removeClass("open");var a=r.closest("ul").find("li.selected");a.removeClass("selected");r.addClass("selected");s.removeClass("open").find("a.current").text(r.text());r.closest("ul").find("li").each(function(e){r[0]===this&&(u=e)});o[0].selectedIndex=u;o.data("prevalue",a.html());if(typeof n.createEvent!="undefined"){var f=n.createEvent("HTMLEvents");f.initEvent("change",!0,!0);o[0].dispatchEvent(f)}else o[0].fireEvent("onchange")}});e(t).on("keydown",function(t){var r=n.activeElement,i=Foundation.libs.forms,s=e(".custom.dropdown.open");if(s.length>0){t.preventDefault();t.which===13&&s.find("li.selected").trigger("click");t.which===27&&s.removeClass("open");if(t.which>=65&&t.which<=90){var o=i.go_to(s,t.which),u=s.find("li.selected");if(o){u.removeClass("selected");i.scrollTo(o.addClass("selected"),300)}}if(t.which===38){var u=s.find("li.selected"),a=u.prev(":not(.disabled)");if(a.length>0){a.parent()[0].scrollTop=a.parent().scrollTop()-i.outerHeight(a);u.removeClass("selected");a.addClass("selected")}}else if(t.which===40){var u=s.find("li.selected"),o=u.next(":not(.disabled)");if(o.length>0){o.parent()[0].scrollTop=o.parent().scrollTop()+i.outerHeight(o);u.removeClass("selected");o.addClass("selected")}}}});this.settings.init=!0},go_to:function(e,t){var n=e.find("li"),r=n.length;if(r>0)for(var i=0;i<r;i++){var s=n.eq(i).text().charAt(0).toLowerCase();if(s===String.fromCharCode(t).toLowerCase())return n.eq(i)}},scrollTo:function(e,t){if(t<0)return;var n=e.parent(),r=this.outerHeight(e),i=r*e.index()-n.scrollTop(),s=i/t*10;this.scrollToTimerCache=setTimeout(function(){if(!isNaN(parseInt(s,10))){n[0].scrollTop=n.scrollTop()+s;this.scrollTo(e,t-10)}}.bind(this),10)},append_custom_markup:function(t,n){var r=e(n),i=r.attr("type"),s=r.next("span.custom."+i);r.parent().hasClass("switch")||r.addClass("hidden-field");s.length===0&&(s=e('<span class="custom '+i+'"></span>').insertAfter(r));s.toggleClass("checked",r.is(":checked"));s.toggleClass("disabled",r.is(":disabled"))},append_custom_select:function(t,n){var r=Foundation.libs.forms,i=e(n),s=i.next("div.custom.dropdown"),o=s.find("ul"),u=s.find(".current"),a=s.find(".selector"),f=i.find("option"),l=f.filter(":selected"),c=i.attr("class")?i.attr("class").split(" "):[],h=0,p="",d,v=!1;if(s.length===0){var m=i.hasClass("small")?"small":i.hasClass("medium")?"medium":i.hasClass("large")?"large":i.hasClass("expand")?"expand":"";s=e('<div class="'+["custom","dropdown",m].concat(c).filter(function(e,t,n){return e===""?!1:n.indexOf(e)===t}).join(" ")+'"><a href="#" class="selector"></a><ul /></div>');a=s.find(".selector");o=s.find("ul");p=f.map(function(){var t=e(this).attr("class")?e(this).attr("class"):"";return"<li class='"+t+"'>"+e(this).html()+"</li>"}).get().join("");o.append(p);v=s.prepend('<a href="#" class="current">'+l.html()+"</a>").find(".current");i.after(s).addClass("hidden-field")}else{p=f.map(function(){return"<li>"+e(this).html()+"</li>"}).get().join("");o.html("").append(p)}r.assign_id(i,s);s.toggleClass("disabled",i.is(":disabled"));d=o.find("li");r.cache[s.data("id")]=d.length;f.each(function(t){if(this.selected){d.eq(t).addClass("selected");v&&v.html(e(this).html())}e(this).is(":disabled")&&d.eq(t).addClass("disabled")});if(!s.is(".small, .medium, .large, .expand")){s.addClass("open");var r=Foundation.libs.forms;r.hidden_fix.adjust(o);h=r.outerWidth(d)>h?r.outerWidth(d):h;Foundation.libs.forms.hidden_fix.reset();s.removeClass("open")}},assign_id:function(e,t){var n=[+(new Date),Foundation.random_str(5)].join("-");e.attr("data-id",n);t.attr("data-id",n)},refresh_custom_select:function(t,n){var r=this,i=0,s=t.next(),o=t.find("option"),u=s.find("li");if(u.length!==this.cache[s.data("id")]||n){s.find("ul").html("");o.each(function(){var t=e("<li>"+e(this).html()+"</li>");s.find("ul").append(t)});o.each(function(t){if(this.selected){s.find("li").eq(t).addClass("selected");s.find(".current").html(e(this).html())}e(this).is(":disabled")&&s.find("li").eq(t).addClass("disabled")});s.removeAttr("style").find("ul").removeAttr("style");s.find("li").each(function(){s.addClass("open");r.outerWidth(e(this))>i&&(i=r.outerWidth(e(this)));s.removeClass("open")});u=s.find("li");this.cache[s.data("id")]=u.length}},toggle_checkbox:function(e){var t=e.prev(),n=t[0];if(!1===t.is(":disabled")){n.checked=n.checked?!1:!0;e.toggleClass("checked");t.trigger("change")}},toggle_radio:function(e){var t=e.prev(),n=t.closest("form.custom"),r=t[0];if(!1===t.is(":disabled")){n.find('input[type="radio"][name="'+this.escape(t.attr("name"))+'"]').next().not(e).removeClass("checked");e.hasClass("checked")||e.toggleClass("checked");r.checked=e.hasClass("checked");t.trigger("change")}},escape:function(e){return e?e.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&"):""},hidden_fix:{tmp:[],hidden:null,adjust:function(t){var n=this;n.hidden=t.parents();n.hidden=n.hidden.add(t).filter(":hidden");n.hidden.each(function(){var t=e(this);n.tmp.push(t.attr("style"));t.css({visibility:"hidden",display:"block"})})},reset:function(){var t=this;t.hidden.each(function(n){var i=e(this),s=t.tmp[n];s===r?i.removeAttr("style"):i.attr("style",s)});t.tmp=[];t.hidden=null}},off:function(){e(this.scope).off(".fndtn.forms")},reflow:function(){}};var i=function(t,n){var t=t.prev();while(t.length){if(t.is(n))return t;t=t.prev()}return e()}})(Foundation.zj,this,this.document);(function(e,t,n){function f(e){var t={},r=/^jQuery\d+$/;n.each(e.attributes,function(e,n){n.specified&&!r.test(n.name)&&(t[n.name]=n.value)});return t}function l(e,r){var i=this,s=n(i);if(i.value==s.attr("placeholder")&&s.hasClass("placeholder"))if(s.data("placeholder-password")){s=s.hide().next().show().attr("id",s.removeAttr("id").data("placeholder-id"));if(e===!0)return s[0].value=r;s.focus()}else{i.value="";s.removeClass("placeholder");i==t.activeElement&&i.select()}}function c(){var e,t=this,r=n(t),i=r,s=this.id;if(t.value==""){if(t.type=="password"){if(!r.data("placeholder-textinput")){try{e=r.clone().attr({type:"text"})}catch(o){e=n("<input>").attr(n.extend(f(this),{type:"text"}))}e.removeAttr("name").data({"placeholder-password":!0,"placeholder-id":s}).bind("focus.placeholder",l);r.data({"placeholder-textinput":e,"placeholder-id":s}).before(e)}r=r.removeAttr("id").hide().prev().attr("id",s).show()}r.addClass("placeholder");r[0].value=r.attr("placeholder")}else r.removeClass("placeholder")}var r="placeholder"in t.createElement("input"),i="placeholder"in t.createElement("textarea"),s=n.fn,o=n.valHooks,u,a;if(r&&i){a=s.placeholder=function(){return this};a.input=a.textarea=!0}else{a=s.placeholder=function(){var e=this;e.filter((r?"textarea":":input")+"[placeholder]").not(".placeholder").bind({"focus.placeholder":l,"blur.placeholder":c}).data("placeholder-enabled",!0).trigger("blur.placeholder");return e};a.input=r;a.textarea=i;u={get:function(e){var t=n(e);return t.data("placeholder-enabled")&&t.hasClass("placeholder")?"":e.value},set:function(e,r){var i=n(e);if(!i.data("placeholder-enabled"))return e.value=r;if(r==""){e.value=r;e!=t.activeElement&&c.call(e)}else i.hasClass("placeholder")?l.call(e,!0,r)||(e.value=r):e.value=r;return i}};r||(o.input=u);i||(o.textarea=u);n(function(){n(t).delegate("form","submit.placeholder",function(){var e=n(".placeholder",this).each(l);setTimeout(function(){e.each(c)},10)})});n(e).bind("beforeunload.placeholder",function(){n(".placeholder").each(function(){this.value=""})})}})(this,document,Foundation.zj);(function(e,t,n,r){"use strict";Foundation.libs.placeholder={name:"placeholder",version:"4.2.2",init:function(n,r,i){this.scope=n||this.scope;typeof r!="string"&&(t.onload=function(){e("input, textarea").placeholder()})}}})(Foundation.zj,this,this.document);(function(e,t,n,r){"use strict";Foundation.libs.reveal={name:"reveal",version:"4.2.2",locked:!1,settings:{animation:"fadeAndPop",animationSpeed:250,closeOnBackgroundClick:!0,closeOnEsc:!0,dismissModalClass:"close-reveal-modal",bgClass:"reveal-modal-bg",open:function(){},opened:function(){},close:function(){},closed:function(){},bg:e(".reveal-modal-bg"),css:{open:{opacity:0,visibility:"visible",display:"block"},close:{opacity:1,visibility:"hidden",display:"none"}}},init:function(t,n,r){Foundation.inherit(this,"data_options delay");typeof n=="object"?e.extend(!0,this.settings,n):typeof r!="undefined"&&e.extend(!0,this.settings,r);if(typeof n!="string"){this.events();return this.settings.init}return this[n].call(this,r)},events:function(){var t=this;e(this.scope).off(".fndtn.reveal").on("click.fndtn.reveal","[data-reveal-id]",function(n){n.preventDefault();if(!t.locked){var r=e(this),i=r.data("reveal-ajax");t.locked=!0;if(typeof i=="undefined")t.open.call(t,r);else{var s=i===!0?r.attr("href"):i;t.open.call(t,r,{url:s})}}}).on("click.fndtn.reveal",this.close_targets(),function(n){n.preventDefault();if(!t.locked){var r=e.extend({},t.settings,t.data_options(e(".reveal-modal.open")));if(e(n.target)[0]===e("."+r.bgClass)[0]&&!r.closeOnBackgroundClick)return;t.locked=!0;t.close.call(t,e(this).closest(".reveal-modal"))}}).on("open.fndtn.reveal",".reveal-modal",this.settings.open).on("opened.fndtn.reveal",".reveal-modal",this.settings.opened).on("opened.fndtn.reveal",".reveal-modal",this.open_video).on("close.fndtn.reveal",".reveal-modal",this.settings.close).on("closed.fndtn.reveal",".reveal-modal",this.settings.closed).on("closed.fndtn.reveal",".reveal-modal",this.close_video);e("body").bind("keyup.reveal",function(n){var r=e(".reveal-modal.open"),i=e.extend({},t.settings,t.data_options(r));n.which===27&&i.closeOnEsc&&r.foundation("reveal","close")});return!0},open:function(t,n){if(t)if(typeof t.selector!="undefined")var r=e("#"+t.data("reveal-id"));else{var r=e(this.scope);n=t}else var r=e(this.scope);if(!r.hasClass("open")){var i=e(".reveal-modal.open");typeof r.data("css-top")=="undefined"&&r.data("css-top",parseInt(r.css("top"),10)).data("offset",this.cache_offset(r));r.trigger("open");i.length<1&&this.toggle_bg(r);if(typeof n=="undefined"||!n.url){this.hide(i,this.settings.css.close);this.show(r,this.settings.css.open)}else{var s=this,o=typeof n.success!="undefined"?n.success:null;e.extend(n,{success:function(t,n,u){e.isFunction(o)&&o(t,n,u);r.html(t);e(r).foundation("section","reflow");s.hide(i,s.settings.css.close);s.show(r,s.settings.css.open)}});e.ajax(n)}}},close:function(t){var t=t&&t.length?t:e(this.scope),n=e(".reveal-modal.open");if(n.length>0){this.locked=!0;t.trigger("close");this.toggle_bg(t);this.hide(n,this.settings.css.close)}},close_targets:function(){var e="."+this.settings.dismissModalClass;return this.settings.closeOnBackgroundClick?e+", ."+this.settings.bgClass:e},toggle_bg:function(t){e(".reveal-modal-bg").length===0&&(this.settings.bg=e("<div />",{"class":this.settings.bgClass}).appendTo("body"));this.settings.bg.filter(":visible").length>0?this.hide(this.settings.bg):this.show(this.settings.bg)},show:function(n,r){if(r){if(/pop/i.test(this.settings.animation)){r.top=e(t).scrollTop()-n.data("offset")+"px";var i={top:e(t).scrollTop()+n.data("css-top")+"px",opacity:1};return this.delay(function(){return n.css(r).animate(i,this.settings.animationSpeed,"linear",function(){this.locked=!1;n.trigger("opened")}.bind(this)).addClass("open")}.bind(this),this.settings.animationSpeed/2)}if(/fade/i.test(this.settings.animation)){var i={opacity:1};return this.delay(function(){return n.css(r).animate(i,this.settings.animationSpeed,"linear",function(){this.locked=!1;n.trigger("opened")}.bind(this)).addClass("open")}.bind(this),this.settings.animationSpeed/2)}return n.css(r).show().css({opacity:1}).addClass("open").trigger("opened")}return/fade/i.test(this.settings.animation)?n.fadeIn(this.settings.animationSpeed/2):n.show()},hide:function(n,r){if(r){if(/pop/i.test(this.settings.animation)){var i={top:-e(t).scrollTop()-n.data("offset")+"px",opacity:0};return this.delay(function(){return n.animate(i,this.settings.animationSpeed,"linear",function(){this.locked=!1;n.css(r).trigger("closed")}.bind(this)).removeClass("open")}.bind(this),this.settings.animationSpeed/2)}if(/fade/i.test(this.settings.animation)){var i={opacity:0};return this.delay(function(){return n.animate(i,this.settings.animationSpeed,"linear",function(){this.locked=!1;n.css(r).trigger("closed")}.bind(this)).removeClass("open")}.bind(this),this.settings.animationSpeed/2)}return n.hide().css(r).removeClass("open").trigger("closed")}return/fade/i.test(this.settings.animation)?n.fadeOut(this.settings.animationSpeed/2):n.hide()},close_video:function(t){var n=e(this).find(".flex-video"),r=n.find("iframe");if(r.length>0){r.attr("data-src",r[0].src);r.attr("src","about:blank");n.hide()}},open_video:function(t){var n=e(this).find(".flex-video"),i=n.find("iframe");if(i.length>0){var s=i.attr("data-src");if(typeof s=="string")i[0].src=i.attr("data-src");else{var o=i[0].src;i[0].src=r;i[0].src=o}n.show()}},cache_offset:function(e){var t=e.show().height()+parseInt(e.css("top"),10);e.hide();return t},off:function(){e(this.scope).off(".fndtn.reveal")},reflow:function(){}}})(Foundation.zj,this,this.document);(function(e,t,n,r){"use strict";Foundation.libs.topbar={name:"topbar",version:"4.3.0",settings:{index:0,stickyClass:"sticky",custom_back_text:!0,back_text:"Back",is_hover:!0,mobile_show_parent_link:!0,scrolltop:!0,init:!1},init:function(n,r,i){Foundation.inherit(this,"data_options");var s=this;typeof r=="object"?e.extend(!0,this.settings,r):typeof i!="undefined"&&e.extend(!0,this.settings,i);if(typeof r!="string"){e(".top-bar, [data-topbar]").each(function(){e.extend(!0,s.settings,s.data_options(e(this)));s.settings.$w=e(t);s.settings.$topbar=e(this);s.settings.$section=s.settings.$topbar.find("section");s.settings.$titlebar=s.settings.$topbar.children("ul").first();s.settings.$topbar.data("index",0);var n=e("<div class='top-bar-js-breakpoint'/>").insertAfter(s.settings.$topbar);s.settings.breakPoint=n.width();n.remove();s.assemble();s.settings.is_hover&&s.settings.$topbar.find(".has-dropdown").addClass("not-click");s.settings.$topbar.parent().hasClass("fixed")&&e("body").css("padding-top",s.outerHeight(s.settings.$topbar))});s.settings.init||this.events();return this.settings.init}return this[r].call(this,i)},timer:null,events:function(){var n=this,r=this.outerHeight(e(".top-bar, [data-topbar]"));e(this.scope).off(".fndtn.topbar").on("click.fndtn.topbar",".top-bar .toggle-topbar, [data-topbar] .toggle-topbar",function(i){var s=e(this).closest(".top-bar, [data-topbar]"),o=s.find("section, .section"),u=s.children("ul").first();i.preventDefault();if(n.breakpoint()){if(!n.rtl){o.css({left:"0%"});o.find(">.name").css({left:"100%"})}else{o.css({right:"0%"});o.find(">.name").css({right:"100%"})}o.find("li.moved").removeClass("moved");s.data("index",0);s.toggleClass("expanded").css("height","")}if(!s.hasClass("expanded")){if(s.hasClass("fixed")){s.parent().addClass("fixed");s.removeClass("fixed");e("body").css("padding-top",r)}}else if(s.parent().hasClass("fixed")){s.parent().removeClass("fixed");s.addClass("fixed");e("body").css("padding-top","0");n.settings.scrolltop&&t.scrollTo(0,0)}}).on("click.fndtn.topbar",".top-bar li.has-dropdown",function(t){if(n.breakpoint())return;var r=e(this),i=e(t.target),s=r.closest("[data-topbar], .top-bar"),o=s.data("topbar");if(n.settings.is_hover&&!Modernizr.touch)return;t.stopImmediatePropagation();i[0].nodeName==="A"&&i.parent().hasClass("has-dropdown")&&t.preventDefault();r.hasClass("hover")?r.removeClass("hover").find("li").removeClass("hover"):r.addClass("hover")}).on("click.fndtn.topbar",".top-bar .has-dropdown>a, [data-topbar] .has-dropdown>a",function(t){if(n.breakpoint()){t.preventDefault();var r=e(this),i=r.closest(".top-bar, [data-topbar]"),s=i.find("section, .section"),o=i.children("ul").first(),u=r.next(".dropdown").outerHeight(),a=r.closest("li");i.data("index",i.data("index")+1);a.addClass("moved");if(!n.rtl){s.css({left:-(100*i.data("index"))+"%"});s.find(">.name").css({left:100*i.data("index")+"%"})}else{s.css({right:-(100*i.data("index"))+"%"});s.find(">.name").css({right:100*i.data("index")+"%"})}i.css("height",n.outerHeight(r.siblings("ul"),!0)+n.height(o))}});e(t).on("resize.fndtn.topbar",function(){n.breakpoint()||e(".top-bar, [data-topbar]").css("height","").removeClass("expanded").find("li").removeClass("hover")}.bind(this));e("body").on("click.fndtn.topbar",function(t){var n=e(t.target).closest("[data-topbar], .top-bar");if(n.length>0)return;e(".top-bar li, [data-topbar] li").removeClass("hover")});e(this.scope).on("click.fndtn",".top-bar .has-dropdown .back, [data-topbar] .has-dropdown .back",function(t){t.preventDefault();var r=e(this),i=r.closest(".top-bar, [data-topbar]"),s=i.children("ul").first(),o=i.find("section, .section"),u=r.closest("li.moved"),a=u.parent();i.data("index",i.data("index")-1);if(!n.rtl){o.css({left:-(100*i.data("index"))+"%"});o.find(">.name").css({left:100*i.data("index")+"%"})}else{o.css({right:-(100*i.data("index"))+"%"});o.find(">.name").css({right:100*i.data("index")+"%"})}i.data("index")===0?i.css("height",""):i.css("height",n.outerHeight(a,!0)+n.height(s));setTimeout(function(){u.removeClass("moved")},300)})},breakpoint:function(){return e(n).width()<=this.settings.breakPoint||e("html").hasClass("lt-ie9")},assemble:function(){var t=this;this.settings.$section.detach();this.settings.$section.find(".has-dropdown>a").each(function(){var n=e(this),r=n.siblings(".dropdown"),i=n.attr("href");if(t.settings.mobile_show_parent_link&&i&&i.length>1)var s=e('<li class="title back js-generated"><h5><a href="#"></a></h5></li><li><a class="parent-link js-generated" href="'+i+'">'+n.text()+"</a></li>");else var s=e('<li class="title back js-generated"><h5><a href="#"></a></h5></li>');t.settings.custom_back_text==1?s.find("h5>a").html("&laquo; "+t.settings.back_text):s.find("h5>a").html("&laquo; "+n.html());r.prepend(s)});this.settings.$section.appendTo(this.settings.$topbar);this.sticky()},height:function(t){var n=0,r=this;t.find("> li").each(function(){n+=r.outerHeight(e(this),!0)});return n},sticky:function(){var n="."+this.settings.stickyClass;if(e(n).length>0){var r=e(n).length?e(n).offset().top:0,i=e(t),s=this.outerHeight(e(".top-bar")),o;e(t).resize(function(){clearTimeout(o);o=setTimeout(function(){r=e(n).offset().top},105)});i.scroll(function(){if(i.scrollTop()>r){e(n).addClass("fixed");e("body").css("padding-top",s)}else if(i.scrollTop()<=r){e(n).removeClass("fixed");e("body").css("padding-top","0")}})}},off:function(){e(this.scope).off(".fndtn.topbar");e(t).off(".fndtn.topbar")},reflow:function(){}}})(Foundation.zj,this,this.document);(function(e){"use strict";e.fn.fitVids=function(t){var n={customSelector:null};if(!document.getElementById("fit-vids-style")){var r=document.createElement("div"),i=document.getElementsByTagName("base")[0]||document.getElementsByTagName("script")[0],s="&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>";r.className="fit-vids-style";r.id="fit-vids-style";r.style.display="none";r.innerHTML=s;i.parentNode.insertBefore(r,i)}t&&e.extend(n,t);return this.each(function(){var t=["iframe[src*='player.vimeo.com']","iframe[src*='youtube.com']","iframe[src*='youtube-nocookie.com']","iframe[src*='kickstarter.com'][src*='video.html']","object","embed"];n.customSelector&&t.push(n.customSelector);var r=e(this).find(t.join(","));r=r.not("object object");r.each(function(){var t=e(this);if(this.tagName.toLowerCase()==="embed"&&t.parent("object").length||t.parent(".fluid-width-video-wrapper").length)return;var n=this.tagName.toLowerCase()==="object"||t.attr("height")&&!isNaN(parseInt(t.attr("height"),10))?parseInt(t.attr("height"),10):t.height(),r=isNaN(parseInt(t.attr("width"),10))?t.width():parseInt(t.attr("width"),10),i=n/r;if(!t.attr("id")){var s="fitvid"+Math.floor(Math.random()*999999);t.attr("id",s)}t.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",i*100+"%");t.removeAttr("height").removeAttr("width")})})}})(window.jQuery||window.Zepto);window.matchMedia=window.matchMedia||function(e){"use strict";var t,n=e.documentElement,r=n.firstElementChild||n.firstChild,i=e.createElement("body"),s=e.createElement("div");return s.id="mq-test-1",s.style.cssText="position:absolute;top:-100em",i.style.background="none",i.appendChild(s),function(e){return s.innerHTML='&shy;<style media="'+e+'"> #mq-test-1 { width: 42px; }</style>',n.insertBefore(i,r),t=42===s.offsetWidth,n.removeChild(i),{matches:t,media:e}}}(document);(function(e){"use strict";function t(){E(!0)}var n={};if(e.respond=n,n.update=function(){},n.mediaQueriesSupported=e.matchMedia&&e.matchMedia("only all").matches,!n.mediaQueriesSupported){var r,i,s,o=e.document,u=o.documentElement,a=[],f=[],l=[],c={},h=30,p=o.getElementsByTagName("head")[0]||u,d=o.getElementsByTagName("base")[0],v=p.getElementsByTagName("link"),m=[],g=function(){for(var t=0;v.length>t;t++){var n=v[t],r=n.href,i=n.media,s=n.rel&&"stylesheet"===n.rel.toLowerCase();r&&s&&!c[r]&&(n.styleSheet&&n.styleSheet.rawCssText?(b(n.styleSheet.rawCssText,r,i),c[r]=!0):(!/^([a-zA-Z:]*\/\/)/.test(r)&&!d||r.replace(RegExp.$1,"").split("/")[0]===e.location.host)&&m.push({href:r,media:i}))}y()},y=function(){if(m.length){var e=m.shift();S(e.href,function(t){b(t,e.href,e.media),c[e.href]=!0,setTimeout(function(){y()},0)})}},b=function(e,t,n){var r=e.match(/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi),i=r&&r.length||0;t=t.substring(0,t.lastIndexOf("/"));var s=function(e){return e.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,"$1"+t+"$2$3")},o=!i&&n;t.length&&(t+="/"),o&&(i=1);for(var u=0;i>u;u++){var l,c,h,p;o?(l=n,f.push(s(e))):(l=r[u].match(/@media *([^\{]+)\{([\S\s]+?)$/)&&RegExp.$1,f.push(RegExp.$2&&s(RegExp.$2))),h=l.split(","),p=h.length;for(var d=0;p>d;d++)c=h[d],a.push({media:c.split("(")[0].match(/(only\s+)?([a-zA-Z]+)\s?/)&&RegExp.$2||"all",rules:f.length-1,hasquery:c.indexOf("(")>-1,minw:c.match(/\(min\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||""),maxw:c.match(/\(max\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||"")})}E()},w=function(){var e,t=o.createElement("div"),n=o.body,r=!1;return t.style.cssText="position:absolute;font-size:1em;width:1em",n||(n=r=o.createElement("body"),n.style.background="none"),n.appendChild(t),u.insertBefore(n,u.firstChild),e=t.offsetWidth,r?u.removeChild(n):n.removeChild(t),e=s=parseFloat(e)},E=function(e){var t="clientWidth",n=u[t],c="CSS1Compat"===o.compatMode&&n||o.body[t]||n,d={},m=v[v.length-1],g=(new Date).getTime();if(e&&r&&h>g-r)return clearTimeout(i),i=setTimeout(E,h),void 0;r=g;for(var y in a)if(a.hasOwnProperty(y)){var b=a[y],S=b.minw,x=b.maxw,T=null===S,N=null===x,C="em";S&&(S=parseFloat(S)*(S.indexOf(C)>-1?s||w():1)),x&&(x=parseFloat(x)*(x.indexOf(C)>-1?s||w():1)),b.hasquery&&(T&&N||!(T||c>=S)||!(N||x>=c))||(d[b.media]||(d[b.media]=[]),d[b.media].push(f[b.rules]))}for(var k in l)l.hasOwnProperty(k)&&l[k]&&l[k].parentNode===p&&p.removeChild(l[k]);for(var L in d)if(d.hasOwnProperty(L)){var A=o.createElement("style"),O=d[L].join("\n");A.type="text/css",A.media=L,p.insertBefore(A,m.nextSibling),A.styleSheet?A.styleSheet.cssText=O:A.appendChild(o.createTextNode(O)),l.push(A)}},S=function(e,t){var n=x();n&&(n.open("GET",e,!0),n.onreadystatechange=function(){4!==n.readyState||200!==n.status&&304!==n.status||t(n.responseText)},4!==n.readyState&&n.send(null))},x=function(){var t=!1;try{t=new e.XMLHttpRequest}catch(n){t=new e.ActiveXObject("Microsoft.XMLHTTP")}return function(){return t}}();g(),n.update=g,e.addEventListener?e.addEventListener("resize",t,!1):e.attachEvent&&e.attachEvent("onresize",t)}})(this);$("ul.tracks li").first().addClass("active");$("a#next").click(function(){var e=$(".active").next("li").length>0?$(".active").next("li"):$(".tracks li").first();$(".active").removeClass("active");e.addClass("active")});$(document).ready(function(){function e
(e){var t=/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,n=e;return t.test(n)}$(document).foundation();$(".entry-content").fitVids();$("form.custom").on("click","input#submit",function(){$(".error").hide();var t=$("input#Firstname").val(),n=$("input#Surname").val(),r=$("input#Email").val(),i=$("select#State").val();if(t==""){$("input#Firstname").focus();$("input#Firstname").next().show();return!1}if(n==""){$("input#Surname").focus();$("input#Surname").next().show();return!1}if(!e(r)){$("input#Email").focus();$("input#Email").next().show();return!1}if(i=="Select State"){$("select#State").focus();$("select#State").next().show();return!1}});$.fn.extend({rotaterator:function(e){var t={fadeSpeed:1e3,pauseSpeed:5e3,child:null},e=$.extend(t,e);return this.each(function(){var t=e,n=$(this),r=$(n.children(),n);r.each(function(){$(this).hide()});if(!t.child)var i=$(n).children(":first");else var i=t.child;$(i).fadeIn(t.fadeSpeed,function(){$(i).delay(t.pauseSpeed).fadeOut(t.fadeSpeed,function(){var e=$(this).next();e.length==0&&(e=$(n).children(":first"));$(n).rotaterator({child:e,fadeSpeed:t.fadeSpeed,pauseSpeed:t.pauseSpeed})})})})}});$(".quotes").rotaterator({fadeSpeed:1e3,pauseSpeed:6e3});$(".entry-content").on("click","a#toggle_compact",function(){$("ul#auditionees").toggleClass("compact");$(this).text($(this).text()=="Compact View"?"Full View":"Compact View")});if($(window).width()>"880"){(function(e,t,n){var r,i=e.getElementsByTagName(t)[0];if(e.getElementById(n))return;r=e.createElement(t);r.id=n;r.src="//connect.facebook.net/en_GB/all.js#xfbml=1&appId=681730241853452";i.parentNode.insertBefore(r,i)})(document,"script","facebook-jssdk");!function(e,t,n){var r,i=e.getElementsByTagName(t)[0],s=/^http:/.test(e.location)?"http":"https";if(!e.getElementById(n)){r=e.createElement(t);r.id=n;r.src=s+"://platform.twitter.com/widgets.js";i.parentNode.insertBefore(r,i)}}(document,"script","twitter-wjs")}});