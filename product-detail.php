<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RTX 4070 Ti 12GB Gaming GPU | Byte Hardware</title>
   
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
    <script src="script.js" defer></script>
</head>
<body>
    <input type="checkbox" id="cart-toggle" hidden>

    <label for="cart-toggle" class="cart-icon-label fixed md:hidden">
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
                    <label for="cart-toggle" class="action-link md:flex" title="Shopping Cart">
                        <i class="fas fa-shopping-cart icon"></i>
                        <span class="badge cart-badge" id="cart-count">0</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <main class="container">
        <section class="product-detail-container">
            <div class="product-images">
                <img src="https://placehold.co/500x350/F7F7F7/333?text=RTX+4070+Ti" alt="RTX 4070 Ti 12GB Gaming GPU" class="main-image" id="mainImage">
                <div class="thumbnail-gallery">
                    <img src="https://placehold.co/80x80/F7F7F7/333?text=Front" alt="Front View" class="thumbnail-image active" data-src="https://placehold.co/500x350/F7F7F7/333?text=RTX+4070+Ti">
                    <img src="https://placehold.co/80x80/F7F7F7/333?text=Ports" alt="Port View" class="thumbnail-image" data-src="https://placehold.co/500x350/F7F7F7/333?text=PORTS">
                    <img src="https://placehold.co/80x80/F7F7F7/333?text=Side" alt="Side View" class="thumbnail-image" data-src="https://placehold.co/500x350/F7F7F7/333?text=SIDE">
                    <img src="https://placehold.co/80x80/F7F7F7/333?text=Box" alt="Box Art" class="thumbnail-image" data-src="https://placehold.co/500x350/F7F7F7/333?text=BOX">
                </div>
            </div>

            <div class="product-info">
                <p class="product-category">Graphics Cards</p>
                <h1>RTX 4070 Ti 12GB Gaming GPU</h1>
                <div class="rating">
                    ★★★★★
                    <span>(45 Reviews)</span>
                </div>

                <div class="price-section">
                    <div class="price-display">
                        <span class="current-price">₱45,999.00</span>
                        <span class="old-price">₱50,000.00</span>
                    </div>
                    <div class="stock-status in-stock">
                        <i class="fas fa-check-circle"></i> In Stock
                    </div>
                </div>

                <div class="details-group">
                    <h3>Key Features</h3>
                    <ul class="key-features">
                        <li>12GB GDDR6X VRAM</li>
                        <li>High-performance Ray Tracing Cores</li>
                        <li>DLSS 3 & AI Acceleration</li>
                        <li>Triple-fan cooling solution</li>
                        <li>PCIe 4.0 Interface</li>
                    </ul>
                </div>

                <div class="action-buttons">
                    <div class="quantity-controls">
                        <button class="quantity-btn" id="decreaseQty">-</button>
                        <input type="number" class="quantity-input" id="quantityInput" value="1" min="1" max="100">
                        <button class="quantity-btn" id="increaseQty">+</button>
                    </div>
                    <button class="btn-add-cart" id="addToCartBtn">Add to Cart</button>
                    <button class="btn-buy-now">Buy Now</button>
                    <button class="wishlist-icon" id="addToWishlistBtn" title="Add to Wishlist"><i class="far fa-heart"></i></button>
                </div>

                <div class="product-description">
                    <h3>Product Description</h3>
                    <p>Experience ultra-performance in gaming with the RTX 4070 Ti. Built with the ultra-efficient architecture, it delivers a quantum leap in performance for demanding games and creative projects. Enjoy lifelike virtual worlds with ray tracing and ultra-high FPS with the power of DLSS 3. This card features a robust thermal design for maximum stability under load.</p>
                </div>
            </div>
        </section>

        <section class="details-tabs-section">
            <div class="tabs-header">
                <button class="tab-button active" data-tab="specs">
                    <i class="fas fa-list-alt"></i> Specifications
                </button>
                <button class="tab-button" data-tab="reviews">
                    <i class="fas fa-star"></i> Reviews 
                    <span class="badge reviews-count">(45)</span>
                </button>
                <button class="tab-button" data-tab="qa">
                    <i class="fas fa-question-circle"></i> Q&A
                </button>
            </div>

            <div class="tabs-content">
                
                <div id="specs" class="tab-pane active">
                    <h4 class="tab-pane-heading">Technical Specifications</h4>
                    <table class="specs-table">
                        <tbody>
                            <tr>
                                <th colspan="2" class="specs-group-header">Graphics Core</th>
                            </tr>
                            <tr>
                                <td>GPU Architecture</td>
                                <td>Ada Lovelace</td>
                            </tr>
                            <tr>
                                <td>CUDA Cores</td>
                                <td>7680</td>
                            </tr>
                            <tr>
                                <td>Boost Clock</td>
                                <td>2610 MHz (Factory Overclocked)</td>
                            </tr>
                            
                            <tr>
                                <th colspan="2" class="specs-group-header">Memory Details</th>
                            </tr>
                            <tr>
                                <td>Video Memory (VRAM)</td>
                                <td>12GB GDDR6X</td>
                            </tr>
                            <tr>
                                <td>Memory Interface</td>
                                <td>192-bit</td>
                            </tr>
                            <tr>
                                <td>Memory Clock</td>
                                <td>21 Gbps</td>
                            </tr>

                            <tr>
                                <th colspan="2" class="specs-group-header">Power & Connectivity</th>
                            </tr>
                            <tr>
                                <td>Power Connectors</td>
                                <td>1x 16-pin (12VHPWR)</td>
                            </tr>
                            <tr>
                                <td>Recommended PSU</td>
                                <td>700W</td>
                            </tr>
                            <tr>
                                <td>Outputs</td>
                                <td>3x DisplayPort 1.4, 1x HDMI 2.1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="reviews" class="tab-pane">
                    <div class="reviews-summary">
                        <div class="overall-rating-box">
                            <span class="overall-score">4.8</span>
                            <div class="overall-stars">★★★★★</div>
                            <p>Based on 45 verified reviews</p>
                        </div>
                        <div class="rating-breakdown">
                            <div class="rating-bar-row">
                                <span>5 Stars</span>
                                <div class="bar-container"><div class="bar fill-90"></div></div>
                                <span class="count">38</span>
                            </div>
                            <div class="rating-bar-row">
                                <span>4 Stars</span>
                                <div class="bar-container"><div class="bar fill-10"></div></div>
                                <span class="count">4</span>
                            </div>
                            <div class="rating-bar-row">
                                <span>3 Stars</span>
                                <div class="bar-container"><div class="bar fill-5"></div></div>
                                <span class="count">2</span>
                            </div>
                            <div class="rating-bar-row">
                                <span>2 Stars</span>
                                <div class="bar-container"><div class="bar fill-0"></div></div>
                                <span class="count">0</span>
                            </div>
                            <div class="rating-bar-row">
                                <span>1 Star</span>
                                <div class="bar-container"><div class="bar fill-2"></div></div>
                                <span class="count">1</span>
                            </div>
                        </div>
                    </div>

                    <div class="write-review-section">
                        <button class="btn-primary">Write a Review</button>
                    </div>

                    <div class="customer-reviews-list">
                        <div class="review-item">
                            <div class="review-header">
                                <span class="review-author">Mark D. L. <i class="fas fa-check-circle verified-icon" title="Verified Purchase"></i></span>
                                <span class="review-date">Dec 5, 2025</span>
                                <div class="review-stars">★★★★★</div>
                            </div>
                            <h5 class="review-title">Absolute Beast!</h5>
                            <p class="review-body">Upgraded from a 3070 and the performance jump is insane. Ray tracing is actually usable now, and DLSS 3 is magic in Cyberpunk. Stays cool even under heavy load.</p>
                        </div>

                        <div class="review-item">
                            <div class="review-header">
                                <span class="review-author">Jane T.</span>
                                <span class="review-date">Nov 28, 2025</span>
                                <div class="review-stars">★★★★☆</div>
                            </div>
                            <h5 class="review-title">Great Card, Pricey</h5>
                            <p class="review-body">Fantastic 4K performance, smooth gameplay across all my titles. Docking one star because the price is still a bit high compared to last generation, but no regrets on the performance.</p>
                        </div>
                        
                        <button class="btn-load-more">Load More Reviews</button>
                    </div>
                </div>

                <div id="qa" class="tab-pane">
                    <h4 class="tab-pane-heading">Customer Questions & Answers</h4>
                    <div class="qa-section">
                        <p>Have a question about the **RTX 4070 Ti**? Ask the community!</p>
                        <textarea class="qa-input" placeholder="Enter your question here..."></textarea>
                        <button class="btn-primary">Submit Question</button>
                    </div>
                    <div class="qa-list">
                        <div class="qa-item">
                            <p class="question">Q: Does this card use the standard 8-pin power connector?</p>
                            <p class="answer">A: No, this model uses the new 16-pin (12VHPWR) connector, though an adapter is usually included in the box.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-col footer-company-info">
                <h3 class="footer-heading">Byte Hardware</h3>
                <p>Philippines’ Leading Computer & Tech Retailer. Huge selection of desktops, PCs, components & accessories from top brands.</p>

                <h4 class="footer-sub-heading">We're Hiring!</h4>
                <p>Don't miss the chance to be part of our growing company. <a href="#">Apply now.</a></p>

                <div class="footer-logo-details">
                    <img src="Logo/byte.png" alt="Byte Hardware Logo"> 
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
    
</body>
</html>