export function getProductData(){
    // 好眠商品資料獲取
    fetch('json/products_items.json?22102601')
    .then(res => {
        return res.json();
    })
    .then(productsData => 
        productList_temp(productsData)
    );

    // 限時商品資料獲取
    fetch('json/products_limited_items.json')
    .then(res => {
        return res.json();
    })
    .then(limitedData => 
        limitedList_temp(limitedData)
    );
    
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
        }
    })
    $('#products_box').html(list_template)
}

function limitedList_temp(getData){
    let list_template= ``;
    getData.forEach( (item, index) => {
        list_template += `
        <div class="products_box_item">
            <a href="javascript: void(0);">
                <div class="textContainer">
                    <div class="product_title">${item.titleLine1}</div>
                    <div class="product_title">${item.titleLine2}</div>
                    <div class="updateDate">${item.date}</div>
                    <div class="breakLine"></div>
                    <div class="product_desc">${item.desc}</div>
                </div>
                <span class="product_img"><img src="./images/limited/limited_item_0${index+1}.jpg?1"></span>
            </a>
        </div>
        `
    });
    $('.limited_products').html(list_template)
}
getProductData();
