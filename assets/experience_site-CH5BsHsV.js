import{c as o,a as t,F as r,r as d,e as b,o as n,n as f,t as l,b as y,p as x,g as k,_ as w,m as I,q as S}from"./index-D01y0pXx.js";const C=""+new URL("map_icon-BJy7Nm1Q.png",import.meta.url).href,c=e=>(x("data-v-0a828ee9"),e=e(),k(),e),N={class:"expeienceSite other_page",id:"expeienceSite"},j={class:"container"},L={class:"main_section"},A={class:"container"},B=c(()=>t("div",{class:"breadcrumb_content"},[t("ul",null,[t("li",null,[t("a",{href:"/"},"首頁")]),t("li",null,"體驗據點")])],-1)),Q={class:"row"},$={class:"col-md-12"},E=c(()=>t("h2",{class:"page_title"},"體驗據點",-1)),R={class:"site_div"},U={class:"img_container"},F=["src"],P={class:"sub_item_div"},V={class:"left"},q={class:"sub_item"},z=["href"],M={key:0,class:"map_icon",src:C,alt:"Map Icon"},T={class:"right"},W={class:"sub_item"},D={class:"contact_div"},G=c(()=>t("div",{class:"left"},[t("h4",null,"聯絡製床所"),t("p",null,"歡迎加入官方LINE@，或是使用表單與我們聯繫，製床所非常樂意協助您解決任何有關床墊、商品等睡眠時遇到的問題！"),t("h6",null,"製床所客戶服務時間："),t("p",null,"週一至週日 的 10:00-20:00"),t("p",null,"若您在上述以外時間聯繫製床所，我們將於上班時間儘快回覆。")],-1)),H={class:"right"},J=b('<div class="row" data-v-0a828ee9><div class="name_div form-group col-md-6" data-v-0a828ee9><h6 for="name" data-v-0a828ee9>姓名</h6><input class="form-control" id="name" type="text" placeholder="" data-v-0a828ee9></div><div class="tel_div form-group col-md-6" data-v-0a828ee9><h6 for="phone" data-v-0a828ee9>聯絡電話</h6><input class="form-control" id="phone" type="text" placeholder="" data-v-0a828ee9></div></div>',1),X={class:"remark_div row"},Y=c(()=>t("div",{class:"form-group col-md-12"},[t("h6",{for:"remark"},"備註"),t("textarea",{class:"form-control",rows:"4",placeholder:""})],-1)),Z={class:"btn_div"},K=c(()=>t("a",{href:"https://line.me/ti/p/~@121povpz",target:"_blank"},[t("span",null,"LINE與我們聯絡")],-1)),O=[K];function tt(e,s,h,_,v,p){return n(),o("div",N,[t("div",j,[t("div",L,[t("div",A,[B,t("div",Q,[t("div",$,[E,t("div",R,[(n(!0),o(r,null,d(v.site_obj,(a,u)=>(n(),o("div",{class:f(["site_item",{odd:(u+1)%2==1,even:(u+1)%2==0}])},[t("div",U,[t("img",{src:p.getImagePath(a.img)},null,8,F)]),t("h4",null,l(a.title),1),t("div",P,[t("div",V,[(n(!0),o(r,null,d(a.sub_title.slice(0,2),(i,m)=>(n(),o("div",q,[t("h6",null,l(i.title),1),t("p",null,[t("span",null,l(i.content[0]),1),t("a",{href:i.map,target:"_blank"},[m==0?(n(),o("img",M)):y("",!0)],8,z)])]))),256))]),t("div",T,[(n(!0),o(r,null,d(a.sub_title.slice(2),(i,m)=>(n(),o("div",W,[t("h6",null,l(i.title),1),(n(!0),o(r,null,d(i.content,g=>(n(),o("ul",null,[t("li",null,l(g),1)]))),256))]))),256))])])],2))),256))]),t("div",D,[G,t("div",H,[t("form",null,[J,t("div",X,[Y,t("div",Z,[t("button",{class:"sendForm button btn btn-primary",type:"button",onClick:s[0]||(s[0]=a=>p.buyNow(e.discount_obj))},"送出表單"),t("button",{class:"btn-chatbed button btn btn-primary",type:"button",onClick:s[1]||(s[1]=a=>p.buyNow(e.discount_obj))},O)])])])])])])])])])])])}const et=e=>{try{const s=e.replace("@","..");return new URL(s,import.meta.url).href}catch(s){console.warn(s)}},st={name:"experience_site",data(){return{site_obj:[{img:"assets/images/experience_site/site1.png",title:"忠明旗艦店 - 體驗免預約",sub_title:[{title:"● 體驗地址",content:["台中市北區忠明路234號"],map:"https://maps.app.goo.gl/SdT2S3j7pAErf8UB7"},{title:"● 營業時間",content:["週一至週日 10:00 ~21: 30"]},{title:"● 特色商品",content:["硬式獨立筒（單人加大）","非常扎實硬式獨立筒（標準雙人）","高碳鋼Q床（標準雙人）","Q彈簧（標準雙人）","--更多請到店體驗--"]}]},{img:"assets/images/experience_site/site2.png",title:"東山分店 - 體驗免預約",sub_title:[{title:"● 體驗地址",content:["台中市北屯區東山路一段35 - 2號"],map:"https://maps.app.goo.gl/eMc5oGj1j8YXHZTs6"},{title:"● 營業時間",content:["週一至週日 11:00 ~19: 30"]},{title:"● 特色商品",content:["硬式獨立筒（單人加大）","非常扎實硬式獨立筒（標準雙人）","高碳鋼Q床（標準雙人）","Q彈簧（標準雙人）","--更多請到店體驗--"]}]}]}},computed:{...I(["clickShowCart","showCartAside","cart_items"])},methods:{...S(["toggleCart","countItem","removeItem","validateAmount","changeCartItemAmount","emptyCart"]),getImagePath(e){return et(`@/${e}`)},transformURL(e){const s=/https?:\/\/[^\s]+/g;return e.replace(s,function(_){return`<a href="${_}" target="_blank" style="color: #30526b; text-decoration: underline;">${_}</a>`})},buyNow(e){}},mounted(){}},nt=w(st,[["render",tt],["__scopeId","data-v-0a828ee9"]]);export{nt as default};
