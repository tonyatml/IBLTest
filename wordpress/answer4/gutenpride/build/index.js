!function(){"use strict";var e,t={817:function(){var e=window.wp.blocks,t=window.wp.element,n=window.wp.components,r=window.wp.blockEditor,o=JSON.parse('{"u2":"create-block/gutenpride"}');(0,e.registerBlockType)(o.u2,{example:{attributes:{message:"Gutenpride"}},edit:function(e){let{attributes:o,setAttributes:i}=e;const u=(0,r.useBlockProps)();return(0,t.createElement)("div",u,(0,t.createElement)(n.TextControl,{value:o.message,onChange:e=>i({message:e})}))},save:function(e){let{attributes:n}=e;const o=r.useBlockProps.save();return(0,t.createElement)("div",o,n.message)}})}},n={};function r(e){var o=n[e];if(void 0!==o)return o.exports;var i=n[e]={exports:{}};return t[e](i,i.exports,r),i.exports}r.m=t,e=[],r.O=function(t,n,o,i){if(!n){var u=1/0;for(l=0;l<e.length;l++){n=e[l][0],o=e[l][1],i=e[l][2];for(var s=!0,a=0;a<n.length;a++)(!1&i||u>=i)&&Object.keys(r.O).every((function(e){return r.O[e](n[a])}))?n.splice(a--,1):(s=!1,i<u&&(u=i));if(s){e.splice(l--,1);var c=o();void 0!==c&&(t=c)}}return t}i=i||0;for(var l=e.length;l>0&&e[l-1][2]>i;l--)e[l]=e[l-1];e[l]=[n,o,i]},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={826:0,431:0};r.O.j=function(t){return 0===e[t]};var t=function(t,n){var o,i,u=n[0],s=n[1],a=n[2],c=0;if(u.some((function(t){return 0!==e[t]}))){for(o in s)r.o(s,o)&&(r.m[o]=s[o]);if(a)var l=a(r)}for(t&&t(n);c<u.length;c++)i=u[c],r.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return r.O(l)},n=self.webpackChunkgutenpride=self.webpackChunkgutenpride||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var o=r.O(void 0,[431],(function(){return r(817)}));o=r.O(o)}();