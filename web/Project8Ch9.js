// Event listener to clear sessionStorage when reload page
window.addEventListener("load", function (){
    sessionStorage.clear();
})

// Get shoppingCart element
let shoppingCart = document.getElementById('shoppingCart');

// Create shopping cart table header
function createTableWithHeader() {
    // Create the code for the table and the table header
    let cartTable = document.createElement("table");
    cartTable.id = "cartTable";
    cartTable.innerHTML = `<tr><th>Item Description</th><th>Price</th><th>Size</th><th>Qty</th>`;
    return cartTable;
}

// Create shopping cart table row
function createRow(data) {
    let newRow = document.createElement('tr');

    let productCellDesc = document.createElement("td");
    productCellDesc.textContent = data.description;
    newRow.appendChild(productCellDesc);

    let productCellPrice = document.createElement("td");
    productCellPrice.textContent = data.price;
    newRow.appendChild(productCellPrice);

    let productCellSize = document.createElement("td");
    productCellSize.textContent = data.size;
    newRow.appendChild(productCellSize);

    let productCellQty = document.createElement("td");
    productCellQty.textContent = data.quantity;
    newRow.appendChild(productCellQty);

    return newRow;
}

// Create shopping cart table content of rows
function createCartContent(totalItems, table) {
    for (let i = 1; i <= totalItems; i++) {
        let data = JSON.parse(sessionStorage.getItem('item' + i));
        table.appendChild(createRow(data))
    }
}

// Build the shopping cart on updates
function buildShoppingCart() {
    let table = createTableWithHeader();
    let totalItems = parseInt(sessionStorage.getItem('itemsInCart'));
    createCartContent(totalItems, table);

    //override shopping cart with new table
    shoppingCart.innerHTML = '';
    shoppingCart.appendChild(table)
}

// Add items to cart
function addToCart (id) {
    let description = document.getElementById(`${id}.description`).textContent;
    let price = document.getElementById(`${id}.price`).value;
    let size = document.getElementById(`${id}.size`).value;
    let quantity = document.getElementById(`${id}.quantity`).value;

    // we add one item into the cart
    let totalItems = sessionStorage.getItem('itemsInCart') ? parseInt(sessionStorage.getItem('itemsInCart')) : 0;
    totalItems += 1;
    sessionStorage.setItem('itemsInCart', `${totalItems}`);

    // Item data
    let item = {
        description,
        price,
        size,
        quantity
    }

    // Save the item in the cart
    sessionStorage.setItem('item' + totalItems, JSON.stringify(item));

    // Update the shopping cart
    buildShoppingCart();
}