<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byte Hardware - PC Components & Accessories</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <input type="checkbox" id="cart-toggle" hidden>
    <input type="checkbox" id="wishlist-toggle" hidden>

    <label for="cart-toggle" class="cart-icon-label">
        <i class="fas fa-shopping-bag icon" style="font-size: 1.5rem; color: var(--color-primary-blue);"></i>
        <span class="cart-badge">0</span>
    </label>

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
                <a href="#" class="logo">
                    <img src="images/byte.png" alt="Company Logo">
                </a>

                <div class="search-bar-container">
                    <input type="text" class="search-input" placeholder="Search for products, brands, and categories...">
                    <button class="search-button">
                        <i class="fas fa-search icon"></i>
                    </button>
                </div>

                <div class="user-actions">
                    <div id="logged-in" style="display: none;">
                        <span id="user-info-name"></span>
                        <form action="database/delete.php" id="deleteForm" method="POST">

                            <input type="id" id="id" name="id" style="display: none">
                            <input type="email" id="email" name="email" style="display: none">
                            <button type="submit" id="delete-account" class="btn">Delete Account</button>

                        </form>
                    </div>
                    <a href="#" class="action-link" id="loginBtn" title="Account">
                        <i class="fas fa-user icon"></i>
                    </a>
                    <label for="wishlist-toggle" class="action-link" title="Wishlist">
                        <i class="fas fa-heart icon"></i>
                        <span class="badge wishlist-badge" id="wishlist-count" style="display: none;">0</span>
                    </label>
                    <label for="cart-toggle" class="action-link" title="Shopping Cart">
                        <i class="fas fa-shopping-cart icon"></i>
                        <span class="badge cart-badge" id="cart-count" style="display: none;"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <main class="container">
        <section class="hero-section">
            <div class="hero-banner-solid-blue">
                <div class="hero-text-overlay">
                    <p class="company-name">BYTE HARDWARE <span class="accent-text">PRESENTS</span></p>
                    <h2>New Arrivals: Performance PC Parts. <br>Up to 40% Off!</h2>
                    <p class="sub-text">Build your ultimate gaming rig or workstation with the newest, most powerful components.</p>
                    
                    <div class="promo-buttons-group">
                        <a href="#" class="shop-now-btn" id="shopNowBtn">Shop Now</a>
                        <span class="delivery-promo">FREE Delivery</span>
                        <span class="discount-promo">EXTRA 10% OFF</span>
                        <div class="small-print-group">
                            <span>Use code: WELCOME10</span>
                            <span>*Limited Time Offer</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-icons-section">
            <h3 class="section-title" style="text-align: center;">Popular Categories</h3>
            <div class="product-icons">
                
                <a href="#" class="category-link" data-category="Processors">
                    <img src="images/CPU.png" alt="CPU Category">
                    <div>CPU</div>
                </a>
                
                <a href="#" class="category-link" data-category="Graphics Cards">
                    <img src="images/GPU.png" alt="GPU Category">
                    <div>GRAPHICS CARDS</div>
                </a>
                
                <a href="#" class="category-link" data-category="Motherboards">
                    <img src="images/Mother Board.png" alt="Motherboard Category">
                    <div>MOTHERBOARDS</div>
                </a>
                
                <a href="#" class="category-link" data-category="Memory">
                    <img src="images/RAM.jpg" alt="RAM Category">
                    <div>RAM / MEMORY</div>
                </a>
                
                <a href="#" class="category-link" data-category="Storage">
                    <img src="images/SSD.jpg" alt="SSD Category">
                    <div>SSD STORAGE</div>
                </a>
                
                <a href="#" class="category-link" data-category="PC Cases">
                    <img src="images/CASE.png" alt="Case Category">
                    <div>PC CASES</div>
                </a>
                
                <a href="#" class="category-link" data-category="Peripherals">
                    <img src="images/MONITOR.jpg" alt="Monitor Category">
                    <div>MONITORS</div>
                </a>
                
            </div>
        </section>

        <section class="shop-container">
            <div class="products-area">
                <div class="products-header">
                    <h3 class="section-title">Featured Products</h3>
                    <div class="category-filters">
                        <button class="filter-btn active" data-filter="all">All Products</button>
                        <button class="filter-btn" data-filter="Graphics Cards">Graphics Cards</button>
                        <button class="filter-btn" data-filter="Processors">Processors</button>
                        <button class="filter-btn" data-filter="Memory">Memory</button>
                        <button class="filter-btn" data-filter="Motherboards">Motherboards</button>
                        <button class="filter-btn" data-filter="Storage">Storage</button>
                        <button class="filter-btn" data-filter="PC Cases">PC Cases</button>
                        <button class="filter-btn" data-filter="Peripherals">Peripherals</button>
                        <button class="filter-btn" data-filter="Accessories">Accessories</button>
                        <button class="filter-btn" data-filter="Components">Components</button>
                        <button class="filter-btn" data-filter="Cooling">Cooling</button>
                    </div>
                </div>
                <div class="product-grid">
                    
                    <div class="product-card" data-id="1" data-name="RTX 4070 Ti 12GB Gaming GPU" data-price="45999" data-category="Graphics Cards" data-image="https://placehold.co/200x160/F7F7F7/333?text=GPU">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=GPU" alt="High-End Graphics Card" class="product-image">
                        <p class="product-category">Graphics Cards</p>
                        <h4 class="product-name">RTX 4070 Ti 12GB Gaming GPU</h4>
                        <p class="product-price">₱45,999.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>
                    
                    <div class="product-card" data-id="2" data-name="Intel Core i7-14700K Desktop CPU" data-price="25950" data-category="Processors" data-image="https://placehold.co/200x160/F7F7F7/333?text=CPU">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=CPU" alt="Desktop Processor" class="product-image">
                        <p class="product-category">Processors</p>
                        <h4 class="product-name">Intel Core i7-14700K Desktop CPU</h4>
                        <p class="product-price">₱25,950.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>
                    
                    <div class="product-card" data-id="3" data-name="32GB DDR5 (2x16GB) RGB RAM Kit" data-price="8995" data-category="Memory" data-image="https://placehold.co/200x160/F7F7F7/333?text=RAM">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=RAM" alt="RAM Modules" class="product-image">
                        <p class="product-category">Memory</p>
                        <h4 class="product-name">32GB DDR5 (2x16GB) RGB RAM Kit</h4>
                        <p class="product-price">₱8,995.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>
                    
                    <div class="product-card" data-id="4" data-name="Z790 Chipset ATX Motherboard" data-price="18500" data-category="Motherboards" data-image="https://placehold.co/200x160/F7F7F7/333?text=MB">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=MB" alt="Motherboard" class="product-image">
                        <p class="product-category">Motherboards</p>
                        <h4 class="product-name">Z790 Chipset ATX Motherboard</h4>
                        <p class="product-price">₱18,500.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>

                    <div class="product-card" data-id="5" data-name="2TB NVMe M.2 Gen4 SSD" data-price="7299" data-category="Storage" data-image="https://placehold.co/200x160/F7F7F7/333?text=SSD">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=SSD" alt="SSD Storage" class="product-image">
                        <p class="product-category">Storage</p>
                        <h4 class="product-name">2TB NVMe M.2 Gen4 SSD</h4>
                        <p class="product-price">₱7,299.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>

                    <div class="product-card" data-id="6" data-name="Mid-Tower Case w/ Tempered Glass" data-price="4150" data-category="PC Cases" data-image="https://placehold.co/200x160/F7F7F7/333?text=Case">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=Case" alt="PC Case" class="product-image">
                        <p class="product-category">PC Cases</p>
                        <h4 class="product-name">Mid-Tower Case w/ Tempered Glass</h4>
                        <p class="product-price">₱4,150.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>

                    <div class="product-card" data-id="7" data-name="27-inch 144Hz Gaming Monitor" data-price="16999" data-category="Peripherals" data-image="https://placehold.co/200x160/F7F7F7/333?text=Monitor">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=Monitor" alt="Gaming Monitor" class="product-image">
                        <p class="product-category">Peripherals</p>
                        <h4 class="product-name">27-inch 144Hz Gaming Monitor</h4>
                        <p class="product-price">₱16,999.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>

                    <div class="product-card" data-id="8" data-name="Mechanical RGB Keyboard, Blue Switches" data-price="4750" data-category="Accessories" data-image="https://placehold.co/200x160/F7F7F7/333?text=Keyboard">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=Keyboard" alt="Mechanical Keyboard" class="product-image">
                        <p class="product-category">Accessories</p>
                        <h4 class="product-name">Mechanical RGB Keyboard, Blue Switches</h4>
                        <p class="product-price">₱4,750.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>

                    <div class="product-card" data-id="9" data-name="850W 80+ Gold Modular PSU" data-price="6200" data-category="Components" data-image="https://placehold.co/200x160/F7F7F7/333?text=PSU">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=PSU" alt="Power Supply Unit" class="product-image">
                        <p class="product-category">Components</p>
                        <h4 class="product-name">850W 80+ Gold Modular PSU</h4>
                        <p class="product-price">₱6,200.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>

                    <div class="product-card" data-id="10" data-name="240mm AIO Liquid CPU Cooler" data-price="5800" data-category="Cooling" data-image="https://placehold.co/200x160/F7F7F7/333?text=Cooler">
                        <div class="hover-bar">
                            <a href="#" class="action-icon" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            <a href="product-detail.php" class="action-icon" title="Quick View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="action-icon" title="Compare"><i class="fas fa-random"></i></a>
                        </div>
                        <a href="product-detail.php" class="product-link">
                        <img src="https://placehold.co/200x160/F7F7F7/333?text=Cooler" alt="CPU Cooler" class="product-image">
                        <p class="product-category">Cooling</p>
                        <h4 class="product-name">240mm AIO Liquid CPU Cooler</h4>
                        <p class="product-price">₱5,800.00</p>
                        </a>
                        <button class="btn-add">Add to Cart</button>
                    </div>
                    
                </div>
            </div>
            </section>
    </main>

    <div class="wishlist-panel">
        <div class="cart-header">
            <h3 id="wishlist-title">Your Wishlist (<span id="wishlist-count">0</span> Items)</h3>
            <label for="wishlist-toggle" class="close-cart">&times;</label>
        </div>
        
        <div class="cart-empty" id="wishlist-empty">
            <i class="fas fa-heart" style="font-size: 3rem; margin-bottom: 10px; color: #ff6b6b;"></i>
            <p>Your wishlist is empty.</p>
            <p>Save items you love for later!</p>
            <button class="return-shop-btn" onclick="document.getElementById('wishlist-toggle').checked = false;">Return to Shop</button>
        </div>

        <div class="cart-items" id="wishlist-items" style="display: none;">
        </div>

        <div class="cart-footer" id="wishlist-footer" style="display: none;">
            <button class="checkout-btn" id="add-all-to-cart-btn">Add All to Cart</button>
            <button class="continue-shopping-btn" onclick="document.getElementById('wishlist-toggle').checked = false;">Continue Shopping</button>
        </div>
    </div>

    <div class="cart-panel">
        <div class="cart-header">
            <h3 id="cart-title">Your Shopping Cart (<span id="cart-count">0</span> Items)</h3>
            <label for="cart-toggle" class="close-cart">&times;</label>
        </div>
        
        <div class="cart-empty" id="cart-empty">
            <i class="fas fa-shopping-bag" style="font-size: 3rem; margin-bottom: 10px;"></i>
            <p>Your cart is empty.</p>
            <p>Ready to shop? Find what you need!</p>
            <button class="return-shop-btn" onclick="document.getElementById('cart-toggle').checked = false;">Return to Shop</button>
        </div>

        <div class="cart-items" id="cart-items" style="display: none;">
        </div>

        <div class="cart-footer" id="cart-footer" style="display: none;">
            <div class="cart-total">
                <span>Subtotal:</span>
                <span id="cart-subtotal">₱0.00</span>
            </div>
            <button class="checkout-btn" onclick="window.location.href='checkout.php'">Proceed to Checkout</button>
            <button class="continue-shopping-btn" onclick="document.getElementById('cart-toggle').checked = false;">Continue Shopping</button>
        </div>
    </div>

    <footer class="site-footer">
    <div class="footer-container">
        <div class="footer-col footer-company-info">
            <h3 class="footer-heading">Byte Hardware</h3>
            <p>Philippines’ Leading Computer & Tech Retailer. Huge selection of desktops, PCs, components & accessories from top brands.</p>

            <h4 class="footer-sub-heading">We're Hiring!</h4>
            <p>Don't miss the chance to be part of our growing company. <a href="#">Apply now.</a></p>

            <div class="footer-logo-details">
                <img src="images/byte.png" alt="Byte Hardware Logo"> 
                <p>Byte Hardware</p>
            </div>

            <h4 class="footer-sub-heading">Follow Us</h4>
            <div class="footer-social-links">
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" title="Youtube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-col footer-contact-support">
            <h3 class="footer-heading">Need Help?</h3>
            <p>Need help or didn't find the item? Chat with a <strong>Personal Shopper</strong>:</p>

            <ul class="footer-list">
                <li><p><strong>Viber Community</strong> (8 AM - 9 PM): <a href="#">Link to Group</a></p></li>
                <li><p><strong>FB Chat</strong> (8 AM - 9 PM): <a href="#">@BYTEHardware</a></p></li>
            </ul>
            
            <h4 class="footer-sub-heading">Order Support</h4>
            <ul class="footer-list">
                <li>(02) 87725-8888 (Online)</li>
                <li>09190806888</li>
                <li><a href="mailto:websales@ByteHardware.com.ph">websales@ByteHardware.com.ph</a></li>
            </ul>
        </div>

        <div class="footer-col footer-info-policies">
            <h3 class="footer-heading">FAQ & Policies</h3>
            <ul class="footer-list">
                <li><a href="#">Official communication modes</a></li>
                <li><a href="#">How do I pay for my orders?</a></li>
                <li><a href="#">How will I receive the items I ordered?</a></li>
                <li><a href="#">Warranty and Sales Return Policy</a></li>
                <li><a href="#">Shipping Policy</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="footer-disclaimer">All Prices are subject to change without prior notice and may not be applicable for all physical branches.</p>
        </div>

        <div class="footer-col footer-safety-payment">
            <h3 class="footer-heading">Staying Safe Online</h3>
            <ul class="footer-list">
                <li><a href="#">Stick to Official Channels</a></li>
                <li><a href="#">Verify Emails & Authenticity</a></li>
                <li><a href="#">Use Official Bank Details ONLY</a></li>
                <li><a href="#">Protect your Credentials</a></li>
                <li><a href="#">When Unsure, Reach Out to us</a></li>
            </ul>
            <a href="#" class="footer-learn-more">LEARN MORE ></a>

            <div class="footer-payment-details">
                <p>Online payments are now available.</p>
            </div>
        </div>
    </div>

    <div class="footer-bottom-bar">
        <p>Copyright © 2025 <a href="#">Byte Hardware</a>. All rights reserved.</p>
        <a href="mailto:websales@ByteHardware.com.ph" class="footer-message-link">
            <i class="fas fa-comment-dots"></i>
            <span>Message us</span>
        </a>
    </div>
</footer>

    <div id="loginModal" class="modal">
        <div class="modal-content animated-login">
            <span class="close-modal">&times;</span>
            <div class="container-animated">
                <div class="login-box">
                    <h2>Login</h2>
                    <form id="loginForm" action="database/login.php" method="POST">
                        <div class="input-box">
                            <input type="email" id="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <input type="password" id="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <button type="submit" class="btn">Login</button>
                        <div class="signup-link">
                            <a href="#" id="showSignup">Signup</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="registerModal" class="modal">
        <div class="modal-content animated-login">
            <span class="close-modal-register">&times;</span>
            <div class="container-animated">
                <div class="login-box">
                    <h2>Sign Up</h2>
                    <form id="registerForm" action="database/register.php" method="POST">
                        <div class="input-box">
                            <input type="text" id="reg-name" name="name" required>
                            <label>Full Name</label>
                        </div>
                        <div class="input-box">
                            <input type="email" id="reg-email" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <input type="password" id="reg-password" name="password" required>
                            <label>Password</label>
                        </div>
                        <div class="input-box">
                            <input type="password" id="reg-confirm-password" name="confirm-password" required>
                            <label>Confirm Password</label>
                        </div>
                        <button type="submit" class="btn">Create Account</button>
                        <div class="signup-link">
                            <a href="#" id="showLogin">Already have an account? Log in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>