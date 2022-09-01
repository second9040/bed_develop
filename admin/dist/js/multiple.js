document.getElementById("add-pic-btn").addEventListener("change",function(){
    var obj = this,
        length = obj.files.length,
        arrTitle = []; 
        _html = '';

    for(var i=0; i<length; i++) {
        var reader = new FileReader();
        if (!reader) {
           console.log('對不起，您的瀏覽器不支持！請更換瀏覽器試一下');
            return
        }
        arrTitle.push(obj.files[i].name)
        reader.error=function(e){
            console.log("读取异常")
        };
        (function(i){
            reader.onload = function(e){
                var _src = e.target.result;
                var divItem = document.createElement('div');
                    divItem.setAttribute('class','item');
                var divPic = document.createElement('div');
                    divPic.setAttribute('class','picBox');
                var img = document.createElement('img');
                    img.setAttribute('class','img');
                    img.setAttribute('src',_src);
                var divInput = document.createElement('input');
                    divInput.setAttribute('class','addInput');
                    divInput.setAttribute('placeholder','文字說明');
                var divTk = document.createElement('div');
                    divTk.setAttribute('class','tk')
                var spanDel = document.createElement('span');
                    spanDel.setAttribute('class','picDelete');
                    spanDel.setAttribute('title',arrTitle[i]);
                    spanDel.innerText = '刪除圖片';

                divTk.innerHTML = arrTitle[i];
                divItem.appendChild(divPic);
                divPic.appendChild(img);
                divItem.appendChild(divTk);
                divItem.appendChild(divInput);
                divItem.appendChild(spanDel);
                var groupTu =  document.getElementById('groupTu');
                groupTu.insertBefore(divItem, groupTu.firstChild);
                spanDel.onclick = function(){
                    removeItem(this);
                    return false;
                };
            };
        })(i)
        reader.onprogress=function(e){
            if(e.lengthComputable){
               console.log("正在讀取文件")
            }
        };
        reader.readAsDataURL(obj.files[i]);
    }

})
function removeItem(delNode){
    var itemNode = delNode.parentNode,
        title = delNode.getAttribute('title');
    var flag = confirm("確認要刪除名為"+title+"的圖片？");
    if(flag) {
        itemNode.parentNode.removeChild(itemNode);
        console.log('删除成功~')
    }
    return false;0
}