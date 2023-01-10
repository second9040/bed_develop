export function getProductData(){
    fetch('json/products_items.json?230110')
    .then(res => {
        return res.json();
    })
    .then(productsData => console.log(productsData))
}
