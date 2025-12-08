<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout | Byte Hardware</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
    <script src="script.js" defer></script>
</head>
<body>
    <input type="checkbox" id="cart-toggle" hidden>

    <header class="top-utility-bar">
        <div class="container">
            <div class="top-bar-content">
                <span class="promo-prev"><i class="fas fa-chevron-left"></i></span>
                <span class="promotion-text">🔥 Limited Time Offer: Save up to 50% on all electronics!</span>
                <span class="promo-next"><i class="fas fa-chevron-right"></i></span>
            </div>
        </div>
    </header>

    <div class="main-header">
        <div class="container">
            <div class="main-header-grid">
                <a href="index.php" class="logo">
                    <img src="images/byte.png" alt="Company Logo">
                </a>

                <div class="search-bar-container">
                    <input type="text" class="search-input" placeholder="Search for products, brands, and categories...">
                    <button class="search-button">
                        <i class="fas fa-search icon"></i>
                    </button>
                </div>

                <div class="user-actions">
                    <a href="#" class="action-link" id="loginBtn" title="Account">
                        <i class="fas fa-user icon"></i>
                    </a>
                    <label for="wishlist-toggle" class="action-link" title="Wishlist">
                        <i class="fas fa-heart icon"></i>
                        <span class="badge wishlist-badge" id="wishlist-count" style="display: none;">0</span>
                    </label>
                    <a href="javascript:void(0);" class="action-link" title="Shopping Cart (Disabled)">
                        <i class="fas fa-shopping-cart icon"></i>
                        <span class="badge cart-badge">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main class="container checkout-container">
        <div class="checkout-grid">
            <div class="billing-and-payment">
                <form id="checkoutForm">
                    <div class="checkout-section">
                        <h2>1. Shipping Information</h2>
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="fullName" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Street Address</label>
                            <input type="text" id="address" name="address" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="region">Province/Region</label>
                                <input type="text" id="region" name="region" required>
                            </div>
                            <div class="form-group">
                                <label for="postalCode">Postal Code</label>
                                <input type="text" id="postalCode" name="postalCode" required>
                            </div>
                        </div>
                    </div>

                    <div class="checkout-section">
                        <h2>2. Payment Method</h2>
                        <div class="payment-methods">
                            <div class="payment-method active" data-id="card">
                                <input type="radio" id="paymentCard" name="paymentMethod" value="card" checked>
                                <label for="paymentCard"><i class="fas fa-credit-card"></i> Credit/Debit Card</label>
                                <p>Pay securely with Visa, Mastercard, or Amex.</p>
                            </div>
                            <div class="payment-method" data-id="cod">
                                <input type="radio" id="paymentCOD" name="paymentMethod" value="cod">
                                <label for="paymentCOD"><i class="fas fa-truck-moving"></i> Cash on Delivery (COD)</label>
                                <p>Pay upon delivery of your order.</p>
                            </div>
                            <div class="payment-method" data-id="ewallet">
                                <input type="radio" id="paymentEWallet" name="paymentMethod" value="ewallet">
                                <label for="paymentEWallet"><i class="fas fa-wallet"></i> GCash/PayMaya</label>
                                <p>Use your preferred digital wallet for instant payment.</p>
                            </div >
                        </div>
                    </div>
                </form>
            </div>

            <div class="order-summary">
                <div class="checkout-section summary-box">
                    <h2>Order Summary</h2>
                    
                    <div class="summary-items" id="summary-items-list">
                        <div id="summary-empty-message" style="text-align: center; padding: 20px; color: var(--color-text-subtle);">
                            Your cart is empty. Please add items before checking out.
                        </div>
                    </div>

                    <div class="promo-code-section">
                        <h3>Have a Promo Code?</h3>
                        <div class="promo-input-group">
                            <input type="text" id="promoCodeInput" placeholder="Enter code">
                            <button id="applyPromoBtn">Apply</button>
                        </div>
                        <p id="promo-message" style="font-size: 0.9em; margin-top: 5px; min-height: 18px;"></p>
                    </div>

                    <div class="summary-totals">
                        <div class="summary-row">
                            <span class="label">Subtotal</span>
                            <span class="value" id="summary-subtotal">₱0.00</span>
                        </div>
                        <div class="summary-row discount-row" style="display: none;" id="discount-display-row">
                            <span class="label">Discount (<span id="discount-label">0%</span>)</span>
                            <span class="value" id="summary-discount">-₱0.00</span>
                        </div>
                        <div class="summary-row">
                            <span class="label">Shipping</span>
                            <span class="value" id="summary-shipping">₱0.00</span>
                        </div>
                        <div class="summary-row total-row">
                            <span class="label">Order Total</span>
                            <span class="value" id="summary-total">₱0.00</span>
                        </div>
                    </div>

                    <button type="submit" class="btn-place-order" id="placeOrderBtn" form="checkoutForm">Place Order</button>
                </div>
            </div>
        </div>
    </main>

    <footer class="site-footer">
        <div class="footer-bottom-bar">
            <p>Copyright © 2025 <a href="#">Byte Hardware</a>. All rights reserved.</p>
            <a href="mailto:websales@ByteHardware.com.ph" class="footer-message-link">
                <i class="fas fa-comment-dots"></i>
                <span>Message us</span>
            </a>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // --- CONSTANTS & DATA ---
            const FREE_SHIPPING_THRESHOLD = 2500;
            const SHIPPING_COST = 150.00;
            const PROMO_CODES = {
                // Example promo code: 10% off
                WELCOME10: { type: 'percentage', value: 10, label: '10%' },
                // Example promo code: Fixed amount off
                SAVE500: { type: 'fixed', value: 500.00, label: '₱500' }
            };

            let currentCart = JSON.parse(localStorage.getItem('cart')) || [];
            let appliedDiscount = null;

            // --- DOM CACHING ---
            const dom = {
                summaryList: document.getElementById('summary-items-list'),
                summaryEmpty: document.getElementById('summary-empty-message'),
                summarySubtotal: document.getElementById('summary-subtotal'),
                summaryShipping: document.getElementById('summary-shipping'),
                summaryDiscount: document.getElementById('summary-discount'),
                summaryTotal: document.getElementById('summary-total'),
                discountRow: document.getElementById('discount-display-row'),
                discountLabel: document.getElementById('discount-label'),
                checkoutForm: document.getElementById('checkoutForm'),
                promoInput: document.getElementById('promoCodeInput'),
                applyPromoBtn: document.getElementById('applyPromoBtn'),
                promoMessage: document.getElementById('promo-message')
            };
            
            // --- HELPER FUNCTIONS ---
            function formatCurrency(amount) {
                return `₱${amount.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            }

            // --- CORE LOGIC: CALCULATIONS & UI UPDATE ---
            function calculateTotals() {
                // 1. Calculate Subtotal
                const subtotal = currentCart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                
                // 2. Calculate Shipping
                const shipping = subtotal >= FREE_SHIPPING_THRESHOLD ? 0 : SHIPPING_COST;
                
                // 3. Calculate Discount
                let discount = 0;
                if (appliedDiscount) {
                    if (appliedDiscount.type === 'percentage') {
                        discount = subtotal * (appliedDiscount.value / 100);
                    } else if (appliedDiscount.type === 'fixed') {
                        discount = appliedDiscount.value;
                    }
                    // Ensure discount doesn't exceed subtotal
                    discount = Math.min(discount, subtotal);
                }

                // 4. Calculate Final Total
                const total = subtotal + shipping - discount;

                // 5. Update UI
                dom.summarySubtotal.textContent = formatCurrency(subtotal);
                dom.summaryShipping.textContent = shipping === 0 ? 'FREE' : formatCurrency(shipping);
                dom.summaryDiscount.textContent = formatCurrency(discount);
                dom.summaryTotal.textContent = formatCurrency(total);

                if (discount > 0) {
                    dom.discountRow.style.display = 'flex';
                    dom.discountLabel.textContent = appliedDiscount.label;
                } else {
                    dom.discountRow.style.display = 'none';
                }

                return { subtotal, shipping, discount, total };
            }

            function loadCartItems() {
                if (currentCart.length === 0) {
                    dom.summaryList.innerHTML = `<div id="summary-empty-message" style="text-align: center; padding: 20px; color: var(--color-text-subtle);">
                                Your cart is empty. <a href="index.php" style="color: var(--color-primary-blue);">Go back to shopping</a>.
                            </div>`;
                    document.getElementById('placeOrderBtn').disabled = true;
                    dom.summaryEmpty.style.display = 'block';
                    // Initialize totals to 0
                    dom.summarySubtotal.textContent = formatCurrency(0);
                    dom.summaryShipping.textContent = formatCurrency(0);
                    dom.summaryTotal.textContent = formatCurrency(0);
                    return;
                }
                
                document.getElementById('placeOrderBtn').disabled = false;
                dom.summaryEmpty.style.display = 'none';

                dom.summaryList.innerHTML = currentCart.map(item => `
                    <div class="summary-item">
                        <span class="item-name">${item.name}</span>
                        <span class="item-qty">x ${item.quantity}</span>
                        <span class="item-price">${formatCurrency(item.price * item.quantity)}</span>
                    </div>
                `).join('');

                calculateTotals();
            }

            // --- EVENT HANDLERS ---
            
            // Promo Code Handler
            dom.applyPromoBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const code = dom.promoInput.value.toUpperCase().trim();
                dom.promoMessage.style.color = 'var(--color-text-dark)';
                dom.promoMessage.textContent = ''; // Clear previous message
                
                if (PROMO_CODES[code]) {
                    appliedDiscount = PROMO_CODES[code];
                    calculateTotals();
                    dom.promoMessage.style.color = 'green';
                    dom.promoMessage.textContent = `Success! ${appliedDiscount.label} discount applied.`;
                } else {
                    appliedDiscount = null;
                    calculateTotals();
                    dom.promoMessage.style.color = 'var(--color-danger-red)';
                    dom.promoMessage.textContent = 'Invalid promo code.';
                }
            });

            // Payment Method Selector Handler (visual update)
            document.querySelectorAll('input[name="paymentMethod"]').forEach(input => {
                input.addEventListener('change', (e) => {
                    document.querySelectorAll('.payment-method').forEach(pm => pm.classList.remove('active'));
                    e.target.closest('.payment-method').classList.add('active');
                });
            });

            // Form Submission Handler (Place Order)
            dom.checkoutForm.addEventListener('submit', (e) => {
                e.preventDefault();
                
                if (currentCart.length === 0) {
                    alert("Your cart is empty. Cannot place an empty order.");
                    window.location.href = 'index.php'; // Redirect to shop
                    return;
                }

                // 1. Gather all form data
                const formData = new FormData(dom.checkoutForm);
                const data = Object.fromEntries(formData.entries());
                
                // 2. Validate essential fields (basic check)
                if (!data.fullName || !data.email || !data.address) {
                    alert("Please fill in all required shipping fields.");
                    return;
                }
                
                // 3. Final calculation
                const totals = calculateTotals();
                
                // 4. Construct Order Object
                const order = {
                    orderId: 'ORD-' + Date.now().toString().slice(-8), // Simple unique ID
                    date: new Date().toISOString(),
                    customer: data, // Includes all form fields
                    items: currentCart,
                    paymentMethod: data.paymentMethod,
                    ...totals // Spread subtotal, shipping, discount, total
                };

                // 5. Save Order and Clear Cart
                let orders = JSON.parse(localStorage.getItem('orders')) || [];
                orders.push(order);
                localStorage.setItem('orders', JSON.stringify(orders));
                localStorage.removeItem('cart');
                
                // Also clear cart in memory
                currentCart = []; 
                
                // 6. Show success and redirect
                alert(`🎉 Order placed successfully!\n\nOrder ID: ${order.orderId}\nTotal: ${formatCurrency(order.total)}\n\nThank you for choosing Byte Hardware!`);

                // Redirect to homepage after order
                window.location.href = 'index.php';
            });
            
            // --- INITIALIZATION ---
            loadCartItems();
        });
    </script>
</body>
</html>