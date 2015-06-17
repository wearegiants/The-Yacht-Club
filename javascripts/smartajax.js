(function(e,t,n){function r(){}function o(){r.currentRequest=false;r._proceed=e.extend({},r._proceedTemplate)}function u(e,t){var n="";var r=true;for(var i=0;i<e.length;i++){if(!r)n+=t;r=false;n+=e[i]}return n}function a(e,t){for(var n=0;n<t.length;n++)if(t[n]==e)return true;return false}function f(e,t){for(var n=0;n<t.length;n++)if(e.is(t[n].selector))return t[n];return false}function l(t){var n=t.serialize();var r;r=e("input[name][type=submit].SmartAjax_clicked",t);if(r.length==0)r=e("input[name][type=submit]",t);if(r.length==0)return n;var i=r.attr("name")+"="+r.val();if(n.length>0)n+="&"+i;else n=i;return n}function c(e,t){if(e.indexOf("?")>0)e=e.substring(0,e.indexOf("?"));return e+"?"+t}var s;r.supported=window.History.enabled;r.enabled=true;r.html4=true;r.isAbsolute=new RegExp("^https?://","i");r.hasProtocol=new RegExp("^([a-z+]+)://","i");r.contentTypeMatch=/([a-z0-9\*\.\-]+)\/([a-z0-9\*\.\-]+)/i;r.isDebug=false;r.linkFilter=["jpe?g","png","gif","bmp","swf","mp3","flv","mp4","wmv","wav","flac","midi","txt","pdf","pptx?","xlsx?","odt","odp","ods","ppsx?","csv","css","js","vbs","djvu","zip","rar","7zip","tar","gz","tgz","bin","avi","mkv","3gp","sub","srt","diff"];r.allowedTypes=["","text/html","text/xml","text/plain"];r.root=t.getRootUrl().replace(/\/$/,"");r.options={cache:false,timeout:5,reload:false,replace:false,history:true,analytics:true,containers:[{selector:"#content, article, #article, .article, #post, .post",ifNotFound:"reload"}],before:function(e){r.proceed()},success:function(e){r.proceed()},error:function(e){window.location=e},done:function(e,t){}};r.state=t.getState();r.currentRequest=false;r.instanceOptions=r.options;r.isManual=false;r._binds=[];r._formbinds=[];r._proceedTemplate={url:"",step:0,data:"",method:"get",vars:{},replace:false};r._proceed={};o();r.setOptions=function(t){e.extend(r.options,t);r.instanceOptions=e.extend({},r.options,r.instanceOptions,t)};r.unbind=function(){r._binds=[]};r.unbindForms=function(){r._formbinds=[]};r.bind=function(e,t){r._binds.unshift({selector:e,options:t})};r.bindForms=function(e,t){r._formbinds.unshift({selector:e,options:t})};r._init=function(){e(r.handleFormButtons);e(document).on("click.smartajax",function(t){if(!t.isDefaultPrevented()){if(t.which!=1)return true;var n=e(t.target);if(!n.is("a")){n=n.parents("a:first");if(n.length==0)return true}var i=f(n,r._binds);if(i===false)return true;var s=r.handle(n,i.options);if(s===false)t.preventDefault();return s}});e(document).on("submit.smartajax",function(t){if(!t.isDefaultPrevented()){var n=e(t.target);if(!n.is("form")){n=n.filter("input[type=submit]").parents("form:first");if(n.length==0)return true}var i=e("input[name][type=submit].SmartAjax_clicked",n);if(i.length>0){if(i.is(".nojs"))return true}var s=f(n,r._formbinds);if(s===false)return true;var o=r.handleForm(n,s.options);if(o===false)t.preventDefault();return o}})};r.handle=function(t,n){$element=e(t).filter("a:ajaxlink").filter(":first");if($element.length==0)return true;if(r.isDebug)console.log("SmartAjax: Handling ",$element);return!r.load($element.attr("href"),n)};r.handleForm=function(t,i){$element=e(t).filter(":ajaxform").filter(":first");if($element.length==0)return true;if(r.isDebug)console.log("SmartAjax: Handling form ",$element);if($element.find("input[type=file]").length>0){if($element.attr("action")==n||$element.attr("action").length==0)$element.attr("action",r.state.url);return true}var s=l($element);var o="get";if($element.attr("method").length>0&&$element.attr("method").toLowerCase()=="post")o="post";var u=r.state.url;if($element.attr("action")!=null&&$element.attr("action").length>0)u=$element.attr("action");if(typeof i!=="object")i={};if(o!="get")i.replace=true;else{u=c(u,s);s={}}i.reload=true;return!r.load(u,i,o,s)};r.load=function(i,s,u,a){if(u==n)u="get";if(a==n)a={};r.isManual=true;i=t.getFullUrl(i||"");r.instanceOptions=e.extend({},r.options,s);if(!r.instanceOptions.reload&&i==r.state.url)return true;o();r._proceed.url=i;r._proceed.step=1;r._proceed.method=u;r._proceed.vars=a;var f=r.instanceOptions.before(i);if(f===false){o();return false}return true};r.proceed=function(){var u=r;var a=u._proceed.url;if(u._proceed.step==0||a.length==0)return false;if(u._proceed.step==1){s=document.title;if(!u.instanceOptions.history)t.replaceState({rand:Math.random()},null,u.state.url);else if(u.instanceOptions.replace)t.replaceState({rand:Math.random()},null,u._proceed.url);else if(u.instanceOptions.reload&&a==u.state.url)t.pushState({rand:Math.random()},null,u._proceed.url);else t.pushState(null,null,u._proceed.url)}else if(u._proceed.step==3){r.load_internal(r._proceed.url)}else if(u._proceed.step==2){var f=u._proceed.data.replace(/<\!DOCTYPE[^\>]*>/i,"").replace(/<(html|head|body|title)( ([^\>]*))?\>/gi,'<div id="smartajax-$1" style="display:none;" $2>').replace(/<(meta|script|link)( ([^\>]*))?\>/gi,'<div class="smartajax-meta smartajax-$1" style="display:none;" $2>').replace(/<\/(html|head|body|title|meta|script|link)\>/gi,"</div>");if(u.isDebug)console.log("SmartAjax: handling data from ",a);var l=e(f);var c=l.find("#smartajax-title");e("body").attr("class",l.find("#smartajax-body").andSelf().filter("#smartajax-body").attr("class"));if(c.length>0)document.title=c.text();var h=[];for(i=0;i<u.instanceOptions.containers.length;i++){var p=u.instanceOptions.containers[i];var d=l.find(p.selector).andSelf().filter(p.selector).filter(":first");if(d.length==0){if(p.ifNotFound==n)p.ifNotFound="reload";if(typeof p.ifNotFound==="function")p.ifNotFound(p,e(document).find(p.selector));else if(p.ifNotFound=="reload"){window.location=a;return false}else if(p.ifNotFound=="empty")e(document).find(p.selector).empty();else if(p.ifNotFound=="hide")e(document).find(p.selector).hide();else if(p.ifNotFound=="keep")continue}else{var v=e(document).find(p.selector);v.html(d.html());if(p.showIfFound&&v.is(":hidden"))v.show();r.runScripts(v.find(".smartajax-script"));h.push(p)}d.remove()}var m=l.filter(".smartajax-script");e("body").append(m);r.runScripts(m);if(u.instanceOptions.analytics!==false){if(typeof u.instanceOptions.analytics==="object")u.instanceOptions.analytics.push(["_trackPageview",t.getShortUrl(a)]);else if(window._gaq!=n)window._gaq.push(["_trackPageview",t.getShortUrl(a)]);else if(window.pageTracker!=n)window.pageTracker._trackPageview(t.getShortUrl(a))}if(u.isDebug)console.log("SmartAjax: done with ",a);r.handleFormButtons();o();u.instanceOptions.done(a,h)}};r.runScripts=function(t){t.each(function(){var t=e(this);var n=t.html().replace(/&/g,"&").replace(/"/g,'"').replace(/&#39;/g,"'").replace(/</g,"<").replace(/>/g,">");var r=document.createElement("script");if(t.attr("type")!=null)r.setAttribute("type",e(this).attr("type"));if(t.attr("src")!=null)r.setAttribute("src",e(this).attr("src"));if(n.length>0){if(/msie/.test(navigator.userAgent.toLowerCase())){r.text=n;t.after(r);t.remove()}else{var i=document.createTextNode(n);r.appendChild(i);t.after(r);t.remove()}}})};r.handleChangeState=function(){var e=t.getState();document.title=s;r.state=e;if(r.isDebug)console.log("SmartAjax: State changed!",e);if(!r.isManual){o();r.instanceOptions=r.options;r._proceed.url=r.state.url;r._proceed.step=3;var n=r.instanceOptions.before(r.state.url);if(n===false)o()}else r.load_internal(r._proceed.url);r.isManual=false;return true};r.load_internal=function(t){var n=r;if(n.currentRequest!==false)r.abort(false);n.currentRequest=e.ajax(t,{cache:n.instanceOptions.cache,timeout:n.instanceOptions.timeout*1e3,type:n._proceed.method.toUpperCase(),data:n._proceed.vars,beforeSend:function(e,t){e.setRequestHeader("Accept","text/html")},error:function(e,r,i){if(n.currentRequest===false)return;if(n.isDebug)console.log("SmartAjax: error loading ",t);o();n.instanceOptions.error(t)},success:function(e,r,i){n._proceed.step=2;n._proceed.url=t;n._proceed.data=e;n.instanceOptions.success(t)},onreadystatechange:function(e,t){if((e.readyState==2||e.readyState==3)&&e.getResponseHeader("Content-Type").length>0){var n=e.getResponseHeader("Content-Type").match(r.contentTypeMatch);if(!a(n[0],r.allowedTypes))r.abort(true)}}})};r.abort=function(e){if(e==n)e=true;if(r.currentRequest!==false){var t=r.currentRequest;if(!e)r.currentRequest=false;t.abort();o()}};r.handleFormButtons=function(){e("form input[type=submit]").on("click",function(){e("input[type=submit]",e(this).parents("form")).removeClass("SmartAjax_clicked");e(this).addClass("SmartAjax_clicked")})};e.expr[":"].ajaxlink=function(t,n,i,s){var o=e(t);var a=r;if(!o.is("a"))return false;var f=o.attr("href");if(typeof f==="undefined"||f===false)return false;var l=new RegExp("\\.("+u(a.linkFilter,"|")+")(#.*)?$","i");if(l.test(f)||f.substr(0,1)=="#"||f.substr(0,11)=="javascript:")return false;else if(a.isAbsolute.test(f))return f.substr(0,a.root.length)==a.root;else if(a.hasProtocol.test(f))return false;else return true};e.expr[":"].ajaxform=function(t,n,i,s){var o=e(t);var u=r;if(!o.is("form"))return false;var a=o.attr("action")||"";if(u.isAbsolute.test(a))return a.substr(0,u.root.length)==u.root;else if(u.hasProtocol.test(a))return false;else return true};e.ajaxPrefilter(function(e,t,n){if(e.onreadystatechange){var r=e.xhr;e.xhr=function(){function i(){e.onreadystatechange(t,n)}var t=r.apply(this,arguments);if(t.addEventListener){t.addEventListener("readystatechange",i,false)}else{setTimeout(function(){var e=t.onreadystatechange;if(e){t.onreadystatechange=function(){i();e.apply(this,arguments)}}},0)}return t}}});window.SmartAjax=r;r._init();t.Adapter.bind(window,"statechange",r.handleChangeState)})(window.jQuery,window.History)