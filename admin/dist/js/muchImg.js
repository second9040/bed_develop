var input = document.getElementById("file_input");
var result;
var dataArr = []; // 储存所选图片的结果(文件名和base64数据)
var fd;  //FormData方式发送请求
var reselect = document.getElementById("reselect");
var selectImg = document.getElementById("selectImg");
var oInput = document.getElementById("file_input");
if(typeof FileReader === 'undefined'){
    alert("抱歉, 您的瀏覽器不支持 FileReader");
    input.setAttribute('disabled','disabled');
}else{
    input.addEventListener('change',readFile,false);
}　　　　　//handler

function readFile(){
    fd = new FormData();
    var iLen = this.files.length;    
    for(var i=0;i<iLen;i++){
        if (!input['value'].match(/.jpg|.gif|.png|.jpeg|.bmp|.svg/i)){　　//判断上传文件格式
            return alert("上傳的圖片格式不正確, 請重新選擇");
        }                       
        var reader = new FileReader();
        fd.append(i,this.files[i]);
        reader.readAsDataURL(this.files[i]);  //转成base64
        reader.fileName = this.files[i].name;
        reader.onload = function(e){
            var imgMsg = {
                name : this.fileName,//获取文件名
                base64 : this.result   //reader.readAsDataURL方法执行完后, base64数据储存在reader.result里
            }
            dataArr.push(imgMsg);
            result = '<div class="delete"><i class="fas fa-trash"></i></div><div class="result"><img class="subPic" src="'+this.result+'" alt=""/></div>';
            var div = document.createElement('div');
            div.innerHTML = result;
            div['className'] = 'afterImg';
            var showImg = $(".updateImg").append(div);      
            div.onclick = function(){
                $(this).remove();
            }
        }
    }
}
reselect.onclick=function(){       
    $('.afterImg').remove();
}

selectImg.onclick=function(){
    oInput.value = "";   
    oInput.click();
}

$(document).on("click",".afterImg",function(){
    $(this).remove();
});










