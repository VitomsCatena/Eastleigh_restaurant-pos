<?php
$menu = [
    "Drinks" => [
        ["name" => "Shaah Cadeys", "price" => 50], ["name" => "Shaah Bigays", "price" => 40],
        ["name" => "Camel Milk", "price" => 150], ["name" => "Mango Puree", "price" => 120],
        ["name" => "Vimto Float", "price" => 150], ["name" => "Isbaandhees Mix", "price" => 120],
        ["name" => "Lemon Mint Crush", "price" => 150], ["name" => "Avocado Shake", "price" => 180],
        ["name" => "Stoney Tangawizi", "price" => 70], ["name" => "Tamarind (Bari)", "price" => 100]
    ],
    "Starters" => [
        ["name" => "Beef Sambusa", "price" => 30], ["name" => "Chicken Sambusa", "price" => 35],
        ["name" => "Bajiya", "price" => 50], ["name" => "Nafaqo", "price" => 60],
        ["name" => "Mushakal", "price" => 150], ["name" => "Kashata", "price" => 40],
        ["name" => "Salami Rolls", "price" => 120], ["name" => "Fish Cutlets", "price" => 100],
        ["name" => "Lentil Soup", "price" => 150], ["name" => "Veg Spring Rolls", "price" => 30]
    ],
    "Main Dish" => [
        ["name" => "Bariis Iskukaris", "price" => 450], ["name" => "Beef Suqaar", "price" => 400],
        ["name" => "Chicken Suqaar", "price" => 380], ["name" => "Goat Meat", "price" => 550],
        ["name" => "Pasto Salatade", "price" => 350], ["name" => "Fish Steak", "price" => 600],
        ["name" => "KK (Kibeiti)", "price" => 350], ["name" => "Camel Meat", "price" => 650],
        ["name" => "Muufo & Stew", "price" => 400], ["name" => "Soor & Digir", "price" => 300]
    ],
    "Platters" => [
        ["name" => "6th Street Special", "price" => 1200], ["name" => "Camel Lovers", "price" => 1500],
        ["name" => "Seafood Platter", "price" => 1800], ["name" => "Vegetarian Feast", "price" => 800],
        ["name" => "Sultan's Tray", "price" => 3500], ["name" => "Breakfast Platter", "price" => 600],
        ["name" => "KK Mountain", "price" => 1200], ["name" => "Meat Lovers Combo", "price" => 1600],
        ["name" => "Shared Pasto", "price" => 1000], ["name" => "Eastleigh Mix", "price" => 1400]
    ],
    "Snacks" => [
        ["name" => "Malawah", "price" => 50], ["name" => "Anjero", "price" => 40],
        ["name" => "Kabaab", "price" => 100], ["name" => "Bur (Mandazi)", "price" => 20],
        ["name" => "Grilled Maize", "price" => 50], ["name" => "Samosa Wraps", "price" => 150],
        ["name" => "Potato Wedges", "price" => 150], ["name" => "Doolsho", "price" => 80],
        ["name" => "Bisbaas Bread", "price" => 60], ["name" => "Fried Cassava", "price" => 70]
    ],
    "Desserts" => [
        ["name" => "Xalwo", "price" => 100], ["name" => "Gashaato", "price" => 50],
        ["name" => "Cream Caramel", "price" => 200], ["name" => "Icun", "price" => 150],
        ["name" => "Labani", "price" => 250], ["name" => "Fruit Salad", "price" => 150],
        ["name" => "Baklava", "price" => 300], ["name" => "Sweet Surbiyaan", "price" => 250],
        ["name" => "Zalabia", "price" => 100], ["name" => "Shushumow", "price" => 120]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eastleigh Kitchen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="pos-container">
        <div class="sidebar">
            <div class="logo">EASTLEIGH KITCHEN</div>
            <?php foreach (array_keys($menu) as $cat): ?>
                <button class="cat-btn" onclick="showCategory('<?php echo $cat; ?>')"><?php echo $cat; ?></button>
            <?php endforeach; ?>
        </div>

        <div class="main-screen">
            <div class="header">
                <h1 id="cat-title">Drinks</h1>
                <input type="text" id="search" placeholder="Search product..." onkeyup="searchItems()">
            </div>
            
            <div id="items-container">
                <?php $i = 1; foreach ($menu as $category => $items): ?>
                    <div class="category-set" id="cat-<?php echo $category; ?>" style="display: <?php echo ($category == 'Drinks') ? 'block' : 'none'; ?>;">
                        <div class="grid">
                            <?php foreach ($items as $item): ?>
                                <div class="item-card" onclick="addToCart('<?php echo $item['name']; ?>', <?php echo $item['price']; ?>)">
                                    <img src="https://picsum.photos/400/300?random=<?php echo $i++; ?>" alt="Food">
                                    <div class="info">
                                        <h4><?php echo $item['name']; ?></h4>
                                        <p>Ksh <?php echo $item['price']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="receipt-section">
            <h3>Current Order</h3>
            <div id="cart-items">
                </div>
            <div class="checkout-box">
                <div class="total-row">
                    <span>Total</span>
                    <span id="grand-total">Ksh 0</span>
                </div>
                <button class="pay-btn" onclick="completeSale()">COMPLETE SALE</button>
                <button class="clear-btn" onclick="clearCart()">Clear All</button>
            </div>
        </div>
    </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
 <script>
        let cart = [];

        function showCategory(cat) {
            document.querySelectorAll('.category-set').forEach(el => el.style.display = 'none');
            document.getElementById('cat-' + cat).style.display = 'block';
            document.getElementById('cat-title').innerText = cat;
        }

        function addToCart(name, price) {
            cart.push({name, price});
            updateUI();
        }

        function updateUI() {
            const container = document.getElementById('cart-items');
            container.innerHTML = '';
            let total = 0;
            cart.forEach((item, index) => {
                total += item.price;
                container.innerHTML += `
                    <div class="cart-row">
                        <span>${item.name}</span>
                        <span><b>${item.price}</b> <button onclick="removeItem(${index})">×</button></span>
                    </div>`;
            });
            document.getElementById('grand-total').innerText = 'Ksh ' + total;
        }

        function removeItem(index) {
            cart.splice(index, 1);
            updateUI();
        }

        function clearCart() {
            cart = [];
            updateUI();
        }

        function searchItems() {
            let input = document.getElementById('search').value.toLowerCase();
            let cards = document.querySelectorAll('.item-card');
            cards.forEach(card => {
                let name = card.querySelector('h4').innerText.toLowerCase();
                card.style.display = name.includes(input) ? "flex" : "none";
            });
        }

        function completeSale() {
            if(cart.length === 0) return alert("Cart is empty!");
            alert("Order processed! Printing receipt...");
            clearCart();
        }
    </script>
</body>
</html>
