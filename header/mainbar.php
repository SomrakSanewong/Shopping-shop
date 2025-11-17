<div class="main-header">
    <div class="container-fluid container-xl">
        <div class="d-flex align-items-center justify-content-between py-3">
            <a href="index.php" class="logo fw-bold fs-3 text-decoration-none">
                <h1>FashionStore</h1>
            </a>
            <form class="d-none d-lg-block" style="min-width: 440px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ค้นหาสินค้า">
                    <button class="btn btn-search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <div class="d-flex align-items-center">
                <button class="btn d-lg-none me-2">
                    <i class="bi bi-search"></i>
                </button>
                <div class="dropdown custom-dropdown">
                    <button class="btn me-2" onclick="toggleDropdown('accountDropdown')">
                        <i class="bi bi-person"></i>
                        <span class="action-text">Account</span>
                    </button>

                    <div class="dropdown-menu" id="accountDropdown">
                        <div class="dropdown-header">
                            <h6>Welcome to <span class="sitename">FashionStore</span></h6>
                            <p class="mb-0">Access account & manage orders</p>
                        </div>

                        <div class="dropdown-body">
                            <a class="dropdown-item d-flex align-items-center" href="account.php">
                                <i class="bi bi-person-circle me-2"></i>
                                <span>My Profile</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="orders.html">
                                <i class="bi bi-bag-check me-2"></i>
                                <span>My Orders</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="wishlist.html">
                                <i class="bi bi-heart me-2"></i>
                                <span>My Wishlist</span>
                            </a>
                        </div>

                        <div class="dropdown-footer">
                            <a href="login.html" class="btn btn-primary w-100 mb-2">Sign In</a>
                            <a href="register.html" class="btn btn-outline-primary w-100">Register</a>
                        </div>
                    </div>
                </div>
                <button class="btn me-2">
                    <i class="bi bi-heart none"></i>
                    <span class="action-text">Wishlist</span>
                </button>
                <div class="dropdown cart-dropdown">
                    <button class="header-action-btn" onclick="toggleDropdown('cartDropdown')">
                        <i class="bi bi-cart3"></i>
                        <span class="action-text d-none d-md-inline-block">Cart</span>
                        <span class="badge">3</span>
                    </button>

                    <div class="dropdown-menu cart-dropdown-menu" id="cartDropdown">

                        <div class="dropdown-header">
                            <h6>Shopping Cart (3)</h6>
                        </div>

                        <div class="dropdown-body">
                            <div class="cart-items">

                                <!-- Item -->
                                <div class="cart-item">
                                    <div class="cart-item-image">
                                        <img src="../assets/imang/test2.jpg" class="img-fluid">
                                    </div>
                                    <div class="cart-item-content">
                                        <h6 class="cart-item-title">Wireless Headphones</h6>
                                        <div class="cart-item-meta">1 × $89.99</div>
                                    </div>
                                    <button class="cart-item-remove">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>

                                <!-- Add more items if needed -->
                            </div>
                        </div>

                        <div class="dropdown-footer">
                            <div class="cart-total">
                                <span>Total:</span>
                                <span class="cart-total-price">$279.97</span>
                            </div>
                            <div class="cart-actions">
                                <a href="cart.html" class="btn btn-outline-primary">View Cart</a>
                                <a href="checkout.html" class="btn btn-primary">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button class="btn d-lg-none" onclick="document.querySelector('.navmenu ul').classList.toggle('active')">
                    <i class="bi bi-list" style="font-size: 28px;"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleDropdown(id) {
        const menu = document.getElementById(id);

        document.querySelectorAll('.dropdown-menu.show').forEach(m => {
            if (m !== menu) m.classList.remove('show');
        });

        menu.classList.toggle('show');
    }

    document.addEventListener("click", function(e) {
        const dropdowns = document.querySelectorAll(".dropdown");
        let inside = false;

        dropdowns.forEach(drop => {
            if (drop.contains(e.target)) inside = true;
        });

        if (!inside) {
            document.querySelectorAll(".dropdown-menu.show").forEach(menu => {
                menu.classList.remove("show");
            });
        }
    });
</script>