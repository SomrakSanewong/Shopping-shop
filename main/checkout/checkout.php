<section class="checkout-section section">
    <div class="container checkout-container">

        <!-- LEFT -->
        <div class="checkout-left">

            <!-- === STEPPER === -->
            <div class="stepper">
                <div class="step" data-step="1">
                    <div class="circle">1</div>
                    <p>Information</p>
                </div>
                <div class="line"></div>

                <div class="step" data-step="2">
                    <div class="circle">2</div>
                    <p>Shipping</p>
                </div>
                <div class="line"></div>

                <div class="step" data-step="3">
                    <div class="circle">3</div>
                    <p>Payment</p>
                </div>
                <div class="line"></div>

                <div class="step" data-step="4">
                    <div class="circle">4</div>
                    <p>Review</p>
                </div>
            </div>

            <!-- === FORM (ทั้งหมดมีเพียงฟอร์มเดียว) === -->
            <form id="checkoutForm">

                <!-- ================================= -->
                <!-- STEP 1 – INFORMATION -->
                <!-- ================================= -->
                <div class="step-page" id="step-1">
                    <h3>Customer Information</h3>
                    <p>Please enter your contact details</p>

                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Your First Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Your Last Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Your Email">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" placeholder="Your Phone Number">
                    </div>

                    <button type="button" class="btn-primary next-btn" data-next="2">
                        Continue to Shipping
                    </button>
                </div>

                <!-- ================================= -->
                <!-- STEP 2 – SHIPPING -->
                <!-- ================================= -->
                <div class="step-page" id="step-2">
                    <h3>Shipping Address</h3>
                    <p>Where should we deliver your order?</p>

                    <div class="form-group">
                        <label>Street Address</label>
                        <input type="text" placeholder="Street Address">
                    </div>

                    <div class="form-group">
                        <label>Apartment, Suite, (optional)</label>
                        <input type="text" placeholder="Apartment, Suite, Unit, etc.">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" placeholder="State">
                        </div>
                        <div class="form-group">
                            <label>ZIP Code</label>
                            <input type="text" placeholder="ZIP Code">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <select>
                            <option>Select Country</option>
                        </select>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="addr">
                        <label for="addr">Save this address for future orders</label>
                    </div>

                    <div class="two-buttons">
                        <button type="button" class="btn-secondary back-btn" data-back="1">
                            Back to Information
                        </button>

                        <button type="button" class="btn-primary next-btn" data-next="3">
                            Continue to Payment
                        </button>
                    </div>
                </div>

                <div class="step-page" id="step-3">
                    <h3>Payment Method</h3>
                    <p>Choose how you'd like to pay</p>

                    <!-- Credit Card -->
                    <div class="payment-box">
                        <div class="payment-header">
                            <label>
                                <input type="radio" name="payment" value="card" checked>
                                Credit / Debit Card
                            </label>
                            <div class="icons">
                                <i class="bi bi-credit-card"></i>
                                <i class="bi bi-wallet2"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="cc-form active">
                            <input type="text" placeholder="Card Number">

                            <div class="row-2">
                                <input type="text" placeholder="MM/YY">
                                <input type="text" placeholder="123">
                            </div>

                            <input type="text" placeholder="Name on Card">
                        </div>
                    </div>

                    <!-- PayPal -->
                    <div class="payment-option">
                        <div class="payment-option-header">
                            <label>
                                <input type="radio" name="payment" value="paypal">
                                PayPal
                            </label>
                            <i class="bi bi-paypal icon"></i>
                        </div>
                        <hr>
                        <div class="payment-info">
                            You will be redirected to PayPal to complete your purchase securely.
                        </div>
                    </div>

                    <!-- Apple Pay -->
                    <div class="payment-option">
                        <div class="payment-option-header">
                            <label>
                                <input type="radio" name="payment" value="apple">
                                Apple Pay
                            </label>
                            <i class="bi bi-apple icon"></i>
                        </div>
                        <hr>
                        <div class="payment-info">
                            You will be prompted to authorize payment with Apple Pay.
                        </div>
                    </div>

                    <div class="two-buttons">
                        <button type="button" class="btn-secondary back-btn" data-back="2">Back to Shipping</button>
                        <button type="button" class="btn-primary next-btn" data-next="4">Review Order</button>
                    </div>
                </div>


                <!-- STEP 4 – REVIEW ORDER -->
                <div class="step-page" id="step-4">
                    <h3>Review Your Order</h3>
                    <p>Please review your information before placing your order</p>

                    <!-- CONTACT -->
                    <div class="review-box">
                        <div class="review-header">
                            <h4>Contact Information</h4>
                            <span class="edit-link" data-edit="1">Edit</span>
                        </div>
                        <p>John Doe</p>
                        <p>johndoe@example.com</p>
                        <p>+1 (555) 123-4567</p>
                    </div>

                    <!-- SHIPPING -->
                    <div class="review-box">
                        <div class="review-header">
                            <h4>Shipping Address</h4>
                            <span class="edit-link" data-edit="2">Edit</span>
                        </div>
                        <p>123 Main Street, Apt 4B</p>
                        <p>New York, NY 10001</p>
                        <p>United States</p>
                    </div>

                    <!-- PAYMENT -->
                    <div class="review-box">
                        <div class="review-header">
                            <h4>Payment Method</h4>
                            <span class="edit-link" data-edit="3">Edit</span>
                        </div>

                        <p><i class="bi bi-credit-card"></i> Credit Card ending in 3456</p>
                    </div>

                    <!-- TERMS -->
                    <div class="terms">
                        <input type="checkbox" id="agree-terms">
                        <label for="agree-terms">
                            I agree to the <a href="#">Terms and Conditions</a> and 
                            <a href="#">Privacy Policy</a>
                        </label>
                    </div>

                    <div class="two-buttons">
                        <button type="button" class="btn-secondary back-btn" data-back="3">
                            Back to Payment
                        </button>

                        <button type="button" class="btn-success place-order-btn" disabled>
                            Place Order
                        </button>
                    </div>

                </div>

            </form>
        </div>

        <!-- ===== RIGHT: ORDER SUMMARY (อยู่ตลอดทุกหน้า) ===== -->
        <div class="checkout-right">
            <div class="summary-card">
                <h4>Order Summary</h4>

                <div class="summary-item">
                    <img src="test.png">
                    <div>
                        <h5>Lorem Ipsum Dolor</h5>
                        <p>Color: Black | Size: M</p>
                        <span>1 × $89.99</span>
                    </div>
                </div>

                <div class="summary-item">
                    <img src="test.png">
                    <div>
                        <h5>Sit Amet Consectetur</h5>
                        <p>Color: White | Size: L</p>
                        <span>2 × $59.99</span>
                    </div>
                </div>

                <hr>

                <div class="summary-row"><p>Subtotal</p><span>$209.97</span></div>
                <div class="summary-row"><p>Shipping</p><span>$9.99</span></div>
                <div class="summary-row"><p>Tax</p><span>$21.00</span></div>

                <div class="summary-total">
                    <p>Total</p>
                    <span>$240.96</span>
                </div>

                <div class="promo-box">
                    <input type="text" placeholder="Promo Code">
                    <button>Apply</button>
                </div>

                <div class="secure">
                    <i class="bi bi-shield-check"></i> Secure Checkout
                </div>
            </div>
        </div>

    </div>
</section>
