export function getProductData(){
    fetch('json/products_items.json?230711-1')
    .then(res => {
        return res.json();
    })
    .then(productsData => console.log(productsData))
}
