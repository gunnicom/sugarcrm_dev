/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add("dump",function(g){var b=g.Lang,c="{...}",f="f(){...}",a=", ",d=" => ",e=function(p,n){var j,h,l=[],k=b.type(p);if(!b.isObject(p)){return p+"";}else{if(k=="date"){return p;}else{if(p.nodeType&&p.tagName){return p.tagName+"#"+p.id;}else{if(p.document&&p.navigator){return"window";}else{if(p.location&&p.body){return"document";}else{if(k=="function"){return f;}}}}}}n=(b.isNumber(n))?n:3;if(k=="array"){l.push("[");for(j=0,h=p.length;j<h;j=j+1){if(b.isObject(p[j])){l.push((n>0)?b.dump(p[j],n-1):c);}else{l.push(p[j]);}l.push(a);}if(l.length>1){l.pop();}l.push("]");}else{if(k=="regexp"){l.push(p.toString());}else{l.push("{");for(j in p){if(p.hasOwnProperty(j)){try{l.push(j+d);if(b.isObject(p[j])){l.push((n>0)?b.dump(p[j],n-1):c);}else{l.push(p[j]);}l.push(a);}catch(m){l.push("Error: "+m.message);}}}if(l.length>1){l.pop();}l.push("}");}}return l.join("");};g.dump=e;b.dump=e;},"3.3.0");
