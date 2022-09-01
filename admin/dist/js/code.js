/**生成一個隨機數**/
function randomNum(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}
/**生成一個隨機色**/
function randomColor(min, max) {
    var r = randomNum(min, max);
    var g = randomNum(min, max);
    var b= randomNum(min, max);
    return "rgb(" + r + "," + g + "," + b + ")";
}		   
var code = drawPic();
document.querySelector(".code_img").onclick = function(e) {
    e.preventDefault();
    code=drawPic();
}
/**繪制驗證碼圖片**/
function drawPic() {
    var canvas = document.querySelector("#canvas");
    var width = canvas.width;
    var height = canvas.height;
    //獲取該canvas的2D繪圖環境 
    var ctx = canvas.getContext('2d'); 
    ctx.textBaseline ='bottom';
    /**繪制背景色**/
    ctx.fillStyle = randomColor(180,240);
    //顏色若太深可能導致看不清
    ctx.fillRect(0,0,width,height);
    /**繪制文字**/
    var str ='123456789';
　　　　 var code="";
　　　　　//生成四個驗證碼
    for(var i=1;i<=4;i++) {
        var txt = str[randomNum(0,str.length)];
        code=code+txt;
        ctx.fillStyle = randomColor(50,160);
        //隨機生成字體顏色
        ctx.font = randomNum(20,30) +"px SimHei";
        //隨機生成字體大小
        var x =2 +i *15;
        var y = randomNum(25,30);
        var deg = randomNum(-12,12);
        //修改坐標原點和旋轉角度
        ctx.translate(x, y); 
        ctx.rotate(deg * Math.PI /180); 
        ctx.fillText(txt,0,0);
        //恢復坐標原點和旋轉角度
        ctx.rotate(-deg * Math.PI /180);
        ctx.translate(-x, -y);
    }
    
    /**繪制幹擾線**/
    for(var i=0;i<3;i++) {
        ctx.strokeStyle = randomColor(40, 180);
        ctx.beginPath();
        ctx.moveTo(randomNum(0,width/2), randomNum(0,height/2));
        ctx.lineTo(randomNum(0,width/2), randomNum(0,height));
        ctx.stroke();
    }
    /**繪制幹擾點**/
    for(var i=0;i <5;i++) {
        ctx.fillStyle = randomColor(255);
        ctx.beginPath();
        ctx.arc(randomNum(0, width), randomNum(0, height),1,0,2* Math.PI);
        ctx.fill();
    }
    console.log(code);
    return code;
}		
