<section class="cart-section section">
    <div class="container cart-grid">

        <!-- ================= CART ITEMS ================= -->
        <div class="cart-left">

            <div class="cart-header">
                <p>Product</p>
                <div class="cart-head-right">
                    <p>Price</p>
                    <p>Quantity</p>
                    <p>Total</p>
                </div>
            </div>
            <hr>

            <!-- ITEM 1 -->
            <div class="cart-item">
                <div class="cart-product">
                    <img src="assets/imang/test2.jpg" alt="">
                    <div>
                        <b>Lorem ipsum dolor sit amet</b>
                        <p>Color: Black</p>
                        <p>Size: M</p>
                        <button class="remove">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    </div>
                </div>

                <div class="cart-price">$89.99</div>

                <div class="cart-qty">
                    <button class="quantity-btn quantity-minus">−</button>
                    <input type="number" class="quantity-number" value="1">
                    <button class="quantity-btn quantity-plus">+</button>
                </div>

                <div class="cart-total">$89.99</div>
            </div>
            <hr>

            <!-- ITEM 2 -->
            <div class="cart-item">
                <div class="cart-product">
                    <img src="assets/imang/test2.jpg" alt="">
                    <div>
                        <b>Consectetur adipiscing elit</b>
                        <p>Color: White</p>
                        <p>Size: L</p>
                        <button class="remove">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    </div>
                </div>

                <div class="cart-price">
                    <span class="sale">$64.99</span>
                    <del>$79.99</del>
                </div>

                <div class="cart-qty">
                    <button class="quantity-btn quantity-minus">−</button>
                    <input type="number" class="quantity-number" value="1">
                    <button class="quantity-btn quantity-plus">+</button>
                </div>

                <div class="cart-total">$129.98</div>
            </div>
            <hr>

            <!-- ITEM 3 -->
            <div class="cart-item">
                <div class="cart-product">
                    <img src="assets/imang/test2.jpg" alt="">
                    <div>
                        <b>Sed do eiusmod tempor</b>
                        <p>Color: Blue</p>
                        <p>Size: S</p>
                        <button class="remove">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    </div>
                </div>

                <div class="cart-price">$49.99</div>

                <div class="cart-qty">
                    <button class="quantity-btn quantity-minus">−</button>
                    <input type="number" class="quantity-number" value="1">
                    <button class="quantity-btn quantity-plus">+</button>
                </div>

                <div class="cart-total">$49.99</div>
            </div>
            <hr>

            <!-- COUPON -->
            <div class="coupon-and-buttons-wrapper">
                <div class="coupon-box">
                    <input type="text" placeholder="Coupon code">
                    <button class="apply">Apply Coupon</button>
                </div>

                <div class="cart-buttons">
                    <button class="update"><i class="bi bi-arrow-clockwise"></i> Update Cart</button>
                    <button class="clear"><i class="bi bi-trash"></i> Clear Cart</button>
                </div>
            </div>
        </div>

        <!-- ================= ORDER SUMMARY ================= -->
        <div class="cart-right">
            <h4>Order Summary</h4>
            <hr>

            <div class="summary-row">
                <p>Subtotal</p>
                <p class="summary-total">$269.96</p>
            </div>

            <div class="shipping-block">
                <p class="shipping-title">Shipping</p>
                
                <div class="shipping-options-group">
                    <label class="shipping-option">
                        <input type="radio" name="ship" checked>
                        <span>Standard Delivery - $4.99</span>
                    </label>

                    <label class="shipping-option">
                        <input type="radio" name="ship">
                        <span>Express Delivery - $12.99</span>
                    </label>

                    <label class="shipping-option">
                        <input type="radio" name="ship">
                        <span>Free Shipping (Orders over $300)</span>
                    </label>
                </div>
            </div>

            <div class="summary-row">
                <p>Tax</p>
                <p><b>$27.00</b></p>
            </div>

            <div class="summary-row">
                <p>Discount</p>
                <p><b>-$0.00</b></p>
            </div>

            <hr>

            <div class="summary-row total">
                <p>Total</p>
                <p><b>$301.95</b></p>
            </div>

            <button class="checkout-btn">
                Proceed to Checkout <i class="bi bi-arrow-right"></i>
            </button>

            <div class="continue">
                <i class="bi bi-arrow-left"></i> Continue Shopping
            </div>

            <hr>

            <div class="accept">
                <p>We Accept</p>
                <i class="bi bi-credit-card"></i>
                <i class="bi bi-paypal"></i>
                <i class="bi bi-wallet2"></i>
                <i class="bi bi-bank"></i>
            </div>
        </div>

    </div>
</section>
