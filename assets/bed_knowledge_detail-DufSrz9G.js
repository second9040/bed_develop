import{c as n,a as t,t as c,F as _,r as m,b as h,o as a,_ as u,m as p,q as g}from"./index-D01y0pXx.js";const b={class:"bed_knowledge_detail other_page",id:"bed_knowledge_detail"},k={class:"container"},w={class:"main_section"},v={class:"container"},j={key:0,class:"row"},f={class:"col-md-12"},y={class:"info_div"},I={class:"date"},C={class:"tag_div"},B={class:"tag"},L={class:"content_div"},T=["innerHTML"],A=["innerHTML"],H={class:"btn_box"};function M(e,o,r,i,s,d){return a(),n("div",b,[t("div",k,[t("div",w,[t("div",v,[s.know_obj?(a(),n("div",j,[t("div",f,[t("h2",null,c(s.know_obj.title),1),t("div",y,[t("div",I,c(s.know_obj.date),1),t("div",C,[(a(!0),n(_,null,m(s.know_obj.tag,l=>(a(),n("div",B,c(l),1))),256))])]),t("div",L,[t("div",{class:"desc",innerHTML:s.know_obj.desc},null,8,T),t("div",{class:"detail",innerHTML:d.processImg(s.know_obj.detail)},null,8,A)]),t("div",H,[t("button",{class:"goBack button btn btn-outline-primary",type:"button",onClick:o[0]||(o[0]=l=>d.goBack())},"返回列表")])])])):h("",!0)])])])])}const S=e=>{try{const o=e.replace("@","..");return new URL(o,import.meta.url).href}catch(o){console.warn(o)}},N={name:"bed_knowledge_detail",components:{},data(){return{know_obj:null}},computed:{...p(["clickShowCart","showCartAside","cart_items"])},methods:{...g(["toggleCart","countItem","removeItem","validateAmount","changeCartItemAmount","emptyCart"]),getImagePath(e){return S(`@/${e}`)},truncateText(e){return e.length>60&&(e=e.slice(0,60)+'...<span class="read-more">more</span>',e=e.replace("<...","...").replace("<b...","...").replace("<br...","...")),e},processImg(e){return e.replace(/<img\s+(?:[^>]*?\s+)?src=(["'])(.*?)\1/g,(o,r,i)=>`<img src=${r}${this.getImagePath(i)}${r}`)},goBack(){this.$router.go(-1),window.scrollTo({top:0})}},mounted(){history.state.know_obj?this.know_obj=JSON.parse(history.state.know_obj):this.$router.push({name:"bed_knowledge"})}},$=u(N,[["render",M],["__scopeId","data-v-a76064c8"]]);export{$ as default};
