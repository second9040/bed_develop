import{c as o,a as t,F as d,r as _,e as f,o as n,n as b,t as l,b as k,p as x,g as y,_ as w,m as I,q as S}from"./index-CzyOK8N6.js";const C="/bed_develop/assets/images/map_icon.png",c=e=>(x("data-v-aecec9fd"),e=e(),y(),e),j={class:"expeienceSite other_page",id:"expeienceSite"},N={class:"container"},L={class:"main_section"},$={class:"container"},A={class:"breadcrumb_content"},B=c(()=>t("a",{href:"javascript: void(0)"},"首頁",-1)),E=[B],Q=c(()=>t("li",null,"體驗據點",-1)),F={class:"row"},P={class:"col-md-12"},R=c(()=>t("h2",{class:"page_title"},"體驗據點",-1)),U={class:"site_div"},V={class:"img_container"},q=["src"],z={class:"sub_item_div"},M={class:"left"},T={class:"sub_item"},W=["href"],D={key:0,class:"map_icon",src:C,alt:"Map Icon"},G={class:"right"},H={class:"sub_item"},X={class:"contact_div"},Y=c(()=>t("div",{class:"left"},[t("h4",null,"聯絡製床所"),t("p",null,"歡迎加入官方LINE@，或是使用表單與我們聯繫，製床所非常樂意協助您解決任何有關床墊、商品等睡眠時遇到的問題！"),t("h6",null,"製床所客戶服務時間："),t("p",null,"週一至週日 的 10:00-20:00"),t("p",null,"若您在上述以外時間聯繫製床所，我們將於上班時間儘快回覆。")],-1)),Z={class:"right"},J=f('<div class="row" data-v-aecec9fd><div class="name_div form-group col-md-6" data-v-aecec9fd><h6 for="name" data-v-aecec9fd>姓名</h6><input class="form-control" id="name" type="text" placeholder="" data-v-aecec9fd></div><div class="tel_div form-group col-md-6" data-v-aecec9fd><h6 for="phone" data-v-aecec9fd>聯絡電話</h6><input class="form-control" id="phone" type="text" placeholder="" data-v-aecec9fd></div></div>',1),K={class:"remark_div row"},O=c(()=>t("div",{class:"form-group col-md-12"},[t("h6",{for:"remark"},"備註"),t("textarea",{class:"form-control",rows:"4",placeholder:""})],-1)),tt={class:"btn_div"},et=c(()=>t("a",{href:"https://line.me/ti/p/~@121povpz",target:"_blank"},[t("span",null,"LINE與我們聯絡")],-1)),st=[et];function ot(e,s,p,u,v,r){return n(),o("div",j,[t("div",N,[t("div",L,[t("div",$,[t("div",A,[t("ul",null,[t("li",{onClick:s[0]||(s[0]=a=>r.goto("home"))},E),Q])]),t("div",F,[t("div",P,[R,t("div",U,[(n(!0),o(d,null,_(v.site_obj,(a,h)=>(n(),o("div",{class:b(["site_item",{odd:(h+1)%2==1,even:(h+1)%2==0}])},[t("div",V,[t("img",{src:r.getImagePath(a.img)},null,8,q)]),t("h4",null,l(a.title),1),t("div",z,[t("div",M,[(n(!0),o(d,null,_(a.sub_title.slice(0,2),(i,m)=>(n(),o("div",T,[t("h6",null,l(i.title),1),t("p",null,[t("span",null,l(i.content[0]),1),t("a",{href:i.map,target:"_blank"},[m==0?(n(),o("img",D)):k("",!0)],8,W)])]))),256))]),t("div",G,[(n(!0),o(d,null,_(a.sub_title.slice(2),(i,m)=>(n(),o("div",H,[t("h6",null,l(i.title),1),(n(!0),o(d,null,_(i.content,g=>(n(),o("ul",null,[t("li",null,l(g),1)]))),256))]))),256))])])],2))),256))]),t("div",X,[Y,t("div",Z,[t("form",null,[J,t("div",K,[O,t("div",tt,[t("button",{class:"sendForm button btn btn-primary",type:"button",onClick:s[1]||(s[1]=a=>r.buyNow(e.discount_obj))},"送出表單"),t("button",{class:"btn-chatbed button btn btn-primary",type:"button",onClick:s[2]||(s[2]=a=>r.buyNow(e.discount_obj))},st)])])])])])])])])])])])}const nt=e=>{try{let s=location.href.includes("bed_develop")?"/bed_develop/":"";const p=e.replace("@","../.."+s);return new URL(p,import.meta.url).href}catch(s){console.warn(s)}},at={name:"experience_site",data(){return{site_obj:[{img:"/assets/images/experience_site/site1.png",title:"忠明旗艦店 - 體驗免預約",sub_title:[{title:"● 體驗地址",content:["台中市北區忠明路234號"],map:"https://maps.app.goo.gl/SdT2S3j7pAErf8UB7"},{title:"● 營業時間",content:["週一至週日 10:00 ~21: 30"]},{title:"● 特色商品",content:["硬式獨立筒（單人加大）","非常扎實硬式獨立筒（標準雙人）","高碳鋼Q床（標準雙人）","Q彈簧（標準雙人）","--更多請到店體驗--"]}]},{img:"/assets/images/experience_site/site2.png",title:"東山分店 - 體驗免預約",sub_title:[{title:"● 體驗地址",content:["台中市北屯區東山路一段35 - 2號"],map:"https://maps.app.goo.gl/eMc5oGj1j8YXHZTs6"},{title:"● 營業時間",content:["週一至週日 11:00 ~19: 30"]},{title:"● 特色商品",content:["硬式獨立筒（單人加大）","非常扎實硬式獨立筒（標準雙人）","高碳鋼Q床（標準雙人）","Q彈簧（標準雙人）","--更多請到店體驗--"]}]}]}},computed:{...I(["clickShowCart","showCartAside","cart_items"])},methods:{...S(["toggleCart","countItem","removeItem","validateAmount","changeCartItemAmount","emptyCart"]),getImagePath(e){return nt(`@/${e}`)},transformURL(e){const s=/https?:\/\/[^\s]+/g;return e.replace(s,function(u){return`<a href="${u}" target="_blank" style="color: #30526b; text-decoration: underline;">${u}</a>`})},buyNow(e){},goto(e,s=null){this.$router.push({name:e,hash:s})}},mounted(){}},ct=w(at,[["render",ot],["__scopeId","data-v-aecec9fd"]]);export{ct as default};
