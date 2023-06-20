let _limitedData = null;
export function getProductData(){
    // 好眠商品資料獲取
    fetch('json/products_items.json?23062001')
    .then(res => {
        return res.json();
    })
    .then(productsData => 
        productList_temp(productsData)
    );

    // 限時商品資料獲取
    fetch('json/products_limited_items.json?0608')
    .then(res => {
        return res.json();
    })
    .then(limitedData => {
        _limitedData = limitedData;
        limitedList_temp(limitedData)
    });
    
};
const main_product_url = location.href;
let main_product_id = 0;
if(main_product_url.indexOf('?') != -1){
    main_product_id = main_product_url.split('id=')[1]
}

function productList_temp(getData){
    let list_template = ``;
    let count = 1;
    getData.forEach( (item, index) => {
        if (item.main_product_id === main_product_id) {
            if (count % 3 === 1) {
                list_template += `<div class="products_box_line line${(count/3 + 1).toFixed(0)}">`
            }
            list_template += `
                <div class="products_box_item">
                    <a href="${item.product_link}">
                        <span class="product_img"><img src="images/products/${item.category}/${item.category}_${count++}.png"></span>
                        <div style="text-align: center; margin-top: 15px; color: #666; font-size: 18px;">${item.product_name}</div>
                    </a>
                </div>`;
            if (count % 3 === 1) {
                list_template += `</div>`;
            }
            console.log(item, index)
        }
    })
    $('#products_box').html(list_template)
}
function limitedList_temp(getData){
    let list_template= ``;
    getData.forEach( (item, index) => {
    let showType = item.videoId ? `<div class="videoBox"><iframe src=https://www.youtube.com/embed/${item.videoId} frameborder="0" allowFullScreen="true"></iframe></div>` : `<img src="./images/limited/limited_item_${index > 8 ? Number(index + 1) : '0' + Number(index + 1)}.jpg?0221">`;
    
        let isLastOne = index == getData.length - 1 ? 'isLastOne' : '';
        list_template += `
        <div class="products_box_item abc" id="anchor${index+1}">
            <a href="javascript: void(0);">
                <span class="product_img">${showType}</span>
                <div class="textContainer">
                    <div class="titleDiv">
                        <div class="updateDate">
                            <div>${item.date}</div>
                            <div class="borderLine"></div>
                        </div>
                        <div class="product_title">${item.titleLine1}</div>
                    </div>
                    <div class="contentDiv">
                        <div class="product_desc">${item.desc}</div>
                    </div>
                </div>
                <div class="breakLine ${isLastOne}"></div>
            </a>
        </div>
        `
    });
    $('.limited_products').html(list_template);
    setTimeout(() => {
        let _width = $('.product_img img').width();
        if ($('.videoBox')) {
            if ($('.product_img img')) {
                // 有圖片，iframe 使用圖片寬度
                $('.videoBox').width(_width);
            } else {
                // 沒有圖片，iframe 寬度用扣的
                let boxWidth = $('.products_box_item').width();
                let textContainerWidth = $('.textContainer').width();
                let smallerWidth = boxWidth > textContainerWidth ? textContainerWidth : boxWidth;  
                $('.videoBox').width(smallerWidth);
            }
        }
        if (!_width) {
            limitedList_temp(_limitedData);
        }
    }, 500)
}
getProductData();
