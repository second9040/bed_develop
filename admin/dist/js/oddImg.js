var update = document.querySelector('#imgUpdate');//上傳file的ID
if(update) {
    update.onchange = function () {
        if (!update.value.match(/.jpg|.gif|.png|.jpeg|.bmp|.svg/)){
            alert("上傳的圖片格式不正確, 請重新選擇");
        }else{
            //清空圖片
            $(".oddImg").html("");
            $("#imgUrl").val("");
            var file = this.files[0];
            var base64 = new FileReader();
            base64.readAsDataURL(file);
            base64.onload= function(){
                var div = document.createElement('div');
                var result = '<div class="odd_delete"><i class="fas fa-trash"></i></div><div class="result"><img class="oddpic" src="'+this.result+'" alt="'+this.fileName+'"/></div>';
                div.innerHTML = result;
                var showImg = $(".oddImg").append(div);
                showImg.src = base64.result;
            };
        }
    }
}

$(document).on("click",".odd_delete",function(){
    $(".oddImg").html("");
    $("#imgUrl").val("");
    update.value = "";
});

$(".imgUpdate").click(function(){
    update.click();
});

var update2 = document.querySelector('#imgUpdate2');//上傳file的ID
if(update2) {
    update2.onchange = function () {
        if (!update2.value.match(/.jpg|.gif|.png|.jpeg|.bmp|.svg/)){
            alert("上傳的圖片格式不正確, 請重新選擇");
        }else{
            //清空圖片
            $(".oddImg2").html("");
            $("#imgUrl2").val("");
            var file = this.files[0];
            var base64 = new FileReader();
            base64.readAsDataURL(file);
            base64.onload= function(){
                var div = document.createElement('div');
                var result = '<div class="odd_delete2"><i class="fas fa-trash"></i></div><div class="result"><img class="oddpic2" src="'+this.result+'" alt="'+this.fileName+'"/></div>';
                div.innerHTML = result;
                var showImg = $(".oddImg2").append(div);
                showImg.src = base64.result;
            };
        }
    }
}

$(document).on("click",".odd_delete2",function(){
    $(".oddImg2").html("");
    $("#imgUrl2").val("");
    update2.value = "";
});

$(".imgUpdate2").click(function(){
    update2.click();
});