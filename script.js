let isLoggedIn = false;

document.addEventListener('DOMContentLoaded', () => {

    // --- 1. PROMOTIONS SLIDER MODULE ---
    const PromoSlider = {
        promos: [
            "🔥 Limited Time Offer: Save up to 50% on all electronics!",
            "✨ Get 10% OFF your first order with code WELCOME10!",
            "🚚 Free shipping on all orders over ₱2,500!",
            "⭐ New products added daily!"
        ],
        currentIndex: 0,
        promotionText: document.querySelector('.promotion-text'),
        promoNext: document.querySelector('.promo-next'),
        promoPrev: document.querySelector('.promo-prev'),

        updatePromo() {
            if (this.promotionText) {
                this.promotionText.textContent = this.promos[this.currentIndex];
            }
        },

        init() {
            this.updatePromo();
            if (this.promoNext && this.promoPrev) {
                this.promoNext.addEventListener('click', () => {
                    this.currentIndex = (this.currentIndex + 1) % this.promos.length;
                    this.updatePromo();
                });
                this.promoPrev.addEventListener('click', () => {
                    this.currentIndex = (this.currentIndex - 1 + this.promos.length) % this.promos.length;
                    this.updatePromo();
                });
            }
        }
    };

// -------------------------------------------------------------------

    // --- 2. CART & WISHLIST STATE MANAGEMENT MODULE ---
    const StoreState = {
        cart: JSON.parse(localStorage.getItem('cart')) || [],
        wishlist: JSON.parse(localStorage.getItem('wishlist')) || [],

        saveState() {
            localStorage.setItem('cart', JSON.stringify(this.cart));
            localStorage.setItem('wishlist', JSON.stringify(this.wishlist));
        },

        showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'cart-notification';
            notification.innerHTML = `<i class="fas fa-check-circle"></i><span>${message}</span>`;
            document.body.appendChild(notification);
            setTimeout(() => notification.classList.add('show'), 10);
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        },

        // --- Cart Logic ---
        updateCartUI() {
            const cartCount = document.getElementById('cart-count'); // Target for badge count
            const cartBadge = document.querySelector('.cart-badge'); // Target for badge count (redundant but included for robustness)
            const cartItemsContainer = document.getElementById('cart-items');
            const cartFooter = document.getElementById('cart-footer');
            const cartEmpty = document.getElementById('cart-empty');
            const cartSubtotal = document.getElementById('cart-subtotal');
            const totalItems = this.cart.reduce((sum, item) => sum + item.quantity, 0);

            // UPDATED: Logic to display totalItems only if greater than 0, otherwise set to empty string (for CSS to hide the badge)
            const displayCount = totalItems > 0 ? totalItems : '';
            if (cartCount) cartCount.textContent = displayCount;
            if (cartBadge) cartBadge.textContent = displayCount;

            if (this.cart.length === 0) {
                if (cartEmpty) cartEmpty.style.display = 'block';
                if (cartItemsContainer) cartItemsContainer.style.display = 'none';
                if (cartFooter) cartFooter.style.display = 'none';
            } else {
                if (cartEmpty) cartEmpty.style.display = 'none';
                if (cartItemsContainer) cartItemsContainer.style.display = 'block';
                if (cartFooter) cartFooter.style.display = 'block';

                cartItemsContainer.innerHTML = this.cart.map(item => `
                    <div class="cart-item" data-id="${item.id}">
                        <img src="${item.image}" alt="${item.name}">
                        <div class="cart-item-details">
                            <h4>${item.name}</h4>
                            <p class="cart-item-price">₱${item.price.toLocaleString()}</p>
                            <div class="cart-item-quantity">
                                <button class="qty-btn minus" data-id="${item.id}">-</button>
                                <span>${item.quantity}</span>
                                <button class="qty-btn plus" data-id="${item.id}">+</button>
                            </div>
                        </div>
                        <button class="remove-item" data-id="${item.id}"><i class="fas fa-times"></i></button>
                    </div>
                `).join('');

                const subtotal = this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                if (cartSubtotal) cartSubtotal.textContent = `₱${subtotal.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

                cartItemsContainer.querySelectorAll('.qty-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const id = parseInt(e.target.dataset.id);
                        const isPlus = e.target.classList.contains('plus');
                        this.updateQuantity(id, isPlus ? 1 : -1);
                    });
                });
                cartItemsContainer.querySelectorAll('.remove-item').forEach(btn => {
                    btn.addEventListener('click', (e) => this.removeFromCart(parseInt(e.currentTarget.dataset.id)));
                });
            }
            this.saveState();
        },

        addToCart(product) {
            const existingItem = this.cart.find(item => item.id === product.id);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                this.cart.push({ ...product, quantity: 1 });
            }
            this.updateCartUI();
            this.showNotification(`${product.name} added to cart!`);
            const cartToggle = document.getElementById('cart-toggle');
            if (cartToggle) cartToggle.checked = true;
        },

        updateQuantity(id, change) {
            const item = this.cart.find(item => item.id === id);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    this.removeFromCart(id);
                } else {
                    this.updateCartUI();
                }
            }
        },

        removeFromCart(id) {
            this.cart = this.cart.filter(item => item.id !== id);
            this.updateCartUI();
        },

        // --- Wishlist Logic ---
        updateWishlistUI() {
            const wishlistCount = document.getElementById('wishlist-count'); // Target for badge count
            const wishlistBadge = document.querySelector('.wishlist-badge'); // Target for badge count (redundant but included for robustness)
            const wishlistItemsContainer = document.getElementById('wishlist-items');
            const wishlistEmpty = document.getElementById('wishlist-empty');
            const wishlistFooter = document.getElementById('wishlist-footer');
            const totalWishlistItems = this.wishlist.length;

            // UPDATED: Logic to display totalWishlistItems only if greater than 0, otherwise set to empty string (for CSS to hide the badge)
            const displayWishlistCount = totalWishlistItems > 0 ? totalWishlistItems : '';
            if (wishlistCount) wishlistCount.textContent = displayWishlistCount;
            if (wishlistBadge) wishlistBadge.textContent = displayWishlistCount;

            // Update heart icons on product cards
            document.querySelectorAll('.product-card').forEach(card => {
                const productId = parseInt(card.dataset.id);
                const heartIcon = card.querySelector('.action-icon[title="Add to Wishlist"] i');
                const isInWishlist = this.wishlist.some(item => item.id === productId);
                if (heartIcon) {
                    heartIcon.classList.toggle('fas', isInWishlist);
                    heartIcon.classList.toggle('far', !isInWishlist);
                    heartIcon.style.color = isInWishlist ? '#ff6b6b' : '';
                }
            });

            if (this.wishlist.length === 0) {
                if (wishlistEmpty) wishlistEmpty.style.display = 'block';
                if (wishlistItemsContainer) wishlistItemsContainer.style.display = 'none';
                if (wishlistFooter) wishlistFooter.style.display = 'none';
            } else {
                if (wishlistEmpty) wishlistEmpty.style.display = 'none';
                if (wishlistItemsContainer) wishlistItemsContainer.style.display = 'block';
                if (wishlistFooter) wishlistFooter.style.display = 'block';

                wishlistItemsContainer.innerHTML = this.wishlist.map(item => `
                    <div class="cart-item" data-id="${item.id}">
                        <img src="${item.image}" alt="${item.name}">
                        <div class="cart-item-details">
                            <h4>${item.name}</h4>
                            <p class="cart-item-price">₱${item.price.toLocaleString()}</p>
                            <button class="btn-add wishlist-add-to-cart" data-id="${item.id}">Add to Cart</button>
                        </div>
                        <button class="remove-item" data-id="${item.id}"><i class="fas fa-times"></i></button>
                    </div>
                `).join('');

                wishlistItemsContainer.querySelectorAll('.wishlist-add-to-cart').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const id = parseInt(e.target.dataset.id);
                        const item = this.wishlist.find(w => w.id === id);
                        if (item) this.addToCart(item);
                    });
                });
                wishlistItemsContainer.querySelectorAll('.remove-item').forEach(btn => {
                    btn.addEventListener('click', (e) => this.removeFromWishlist(parseInt(e.currentTarget.dataset.id)));
                });
            }
            this.saveState();
        },

        addToWishlist(product) {
            const existingItem = this.wishlist.find(item => item.id === product.id);
            if (existingItem) {
                this.removeFromWishlist(product.id);
                this.showNotification(`${product.name} removed from wishlist!`);
            } else {
                this.wishlist.push(product);
                this.updateWishlistUI();
                this.showNotification(`${product.name} added to wishlist!`);
            }
        },

        removeFromWishlist(id) {
            this.wishlist = this.wishlist.filter(item => item.id !== id);
            this.updateWishlistUI();
        },

        addAllWishlistToCart() {
            if (this.wishlist.length === 0) return;
            this.wishlist.forEach(item => this.addToCart(item));
            this.wishlist = [];
            this.updateWishlistUI();
            this.showNotification('All items moved to cart!');
            const wishlistToggle = document.getElementById('wishlist-toggle');
            const cartToggle = document.getElementById('cart-toggle');

            if (wishlistToggle) wishlistToggle.checked = false;
            if (cartToggle) cartToggle.checked = true;
        },
        
        init() {
            this.updateCartUI();
            this.updateWishlistUI();

            const addAllToCartBtn = document.getElementById('add-all-to-cart-btn');
            if (addAllToCartBtn) {
                addAllToCartBtn.addEventListener('click', () => this.addAllWishlistToCart());
            }

            // Global listeners for product cards (Add to Cart)
            document.querySelectorAll('.btn-add').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const productCard = e.target.closest('.product-card');
                    if (!productCard) return;

                    const product = {
                        id: parseInt(productCard.dataset.id),
                        name: productCard.dataset.name,
                        price: parseFloat(productCard.dataset.price),
                        category: productCard.dataset.category,
                        image: productCard.dataset.image
                    };
                    this.addToCart(product);
                });
            });

            // Global listeners for product cards (Add to Wishlist)
            document.querySelectorAll('.action-icon[title="Add to Wishlist"]').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const productCard = e.target.closest('.product-card');
                    if (!productCard) return;

                    const product = {
                        id: parseInt(productCard.dataset.id),
                        name: productCard.dataset.name,
                        price: parseFloat(productCard.dataset.price),
                        category: productCard.dataset.category,
                        image: productCard.dataset.image
                    };
                    this.addToWishlist(product);
                });
            });
        }
    };

// -------------------------------------------------------------------

    // --- 3. PRODUCT FILTERING & SEARCH MODULE ---
    const ProductInteractions = {
        filterBtns: document.querySelectorAll('.filter-btn'),
        productCards: document.querySelectorAll('.product-card'),
        searchInput: document.querySelector('.search-input'),
        searchButton: document.querySelector('.search-button'),
        shopContainer: document.querySelector('.shop-container'),

        applyFilter(filter) {
            this.filterBtns.forEach(b => b.classList.remove('active'));
            const activeBtn = document.querySelector(`.filter-btn[data-filter="${filter}"]`);
            if (activeBtn) activeBtn.classList.add('active');

            this.productCards.forEach(card => {
                const category = card.getAttribute('data-category');
                const isMatch = filter === 'all' || category === filter;
                
                // Use a short delay to ensure transition runs when re-showing elements
                if (isMatch) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        },

        performSearch() {
            const searchTerm = this.searchInput.value.toLowerCase().trim();
            let hasResults = false;

            // Reset view if search term is empty
            if (searchTerm === '') {
                this.applyFilter('all');
                return;
            }

            this.filterBtns.forEach(b => b.classList.remove('active'));

            this.productCards.forEach(card => {
                const productName = card.dataset.name.toLowerCase();
                const productCategory = card.dataset.category.toLowerCase();

                const isMatch = productName.includes(searchTerm) || productCategory.includes(searchTerm);

                if (isMatch) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 10);
                    hasResults = true;
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });

            if (this.shopContainer) this.shopContainer.scrollIntoView({ behavior: 'smooth' });
            if (!hasResults) StoreState.showNotification(`No products found for "${searchTerm}"`);
        },
        
        // --- Custom Query Example: Filter by Rating ---
        queryByRating(minRating) {
            let hasResults = false;
            const ratingThreshold = parseFloat(minRating);

            if (isNaN(ratingThreshold)) return;
            
            // Deactivate category filters
            this.filterBtns.forEach(b => b.classList.remove('active'));

            this.productCards.forEach(card => {
                // Assumes product card has data-rating attribute, e.g., data-rating="4.5"
                const productRating = parseFloat(card.dataset.rating) || 0; 
                const isMatch = productRating >= ratingThreshold;
                
                if (isMatch) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 10);
                    hasResults = true;
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });

            if (this.shopContainer) this.shopContainer.scrollIntoView({ behavior: 'smooth' });
            if (!hasResults) StoreState.showNotification(`No products found with rating ${ratingThreshold} and above.`);
        },


        init() {
            // Filter buttons
            this.filterBtns.forEach(btn => {
                btn.addEventListener('click', () => this.applyFilter(btn.getAttribute('data-filter')));
            });

            // Category links
            document.querySelectorAll('.category-link').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.applyFilter(link.getAttribute('data-category'));
                    if (this.shopContainer) this.shopContainer.scrollIntoView({ behavior: 'smooth' });
                });
            });

            // Shop Now button
            const shopNowBtn = document.getElementById('shopNowBtn');
            if (shopNowBtn) {
                shopNowBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.applyFilter('all');
                    if (this.shopContainer) this.shopContainer.scrollIntoView({ behavior: 'smooth' });
                });
            }

            // Search logic
            if (this.searchButton) {
                this.searchButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.performSearch();
                });
            }
            if (this.searchInput) {
                this.searchInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        this.performSearch();
                    }
                });
                this.searchInput.addEventListener('input', () => {
                    if (this.searchInput.value.trim() === '') this.performSearch();
                });
            }
            
            // Example custom query listener (requires a button/element with this ID)
            const highRatingButton = document.getElementById('filterHighRating');
            if (highRatingButton) {
                highRatingButton.addEventListener('click', () => {
                    this.queryByRating(4.0); // Filters for 4.0 stars and above
                });
            }
        }
    };

// -------------------------------------------------------------------

    // --- 4. MODAL & AUTHENTICATION MODULE ---
    const ModalManager = {
        loginModal: document.getElementById('loginModal'),
        registerModal: document.getElementById('registerModal'),
        loginBtn: document.getElementById('loginBtn'),
        loginForm: document.getElementById('loginForm'),
        registerForm: document.getElementById('registerForm'),

        showModal(modal) {
            if (modal) modal.style.display = 'flex';
        },

        hideModal(modal) {
            if (modal) modal.style.display = 'none';
        },

        updateUserUI(user) {
            if (this.loginBtn) this.loginBtn.title = `Logged in as ${user.name}`;
        },

        init() {
            // Initial UI check for stored user
            const storedUser = localStorage.getItem('user');
            if (storedUser) {
                try { this.updateUserUI(JSON.parse(storedUser)); } catch (e) { localStorage.removeItem('user'); }
            }

            // // Open Login
            // if (this.loginBtn) {
            //     this.loginBtn.addEventListener('click', (e) => {
            //         e.preventDefault();
            //         this.showModal(this.loginModal);
            //     });
            // }

            // Close Modals
            document.querySelectorAll('.close-modal, .close-modal-register').forEach(btn => {
                btn.addEventListener('click', () => {
                    this.hideModal(this.loginModal);
                    this.hideModal(this.registerModal);
                });
            });
            window.addEventListener('click', (e) => {
                if (e.target === this.loginModal) this.hideModal(this.loginModal);
                if (e.target === this.registerModal) this.hideModal(this.registerModal);
            });

            // Switch Modals
            const showSignup = document.getElementById('showSignup');
            const showLogin = document.getElementById('showLogin');
            if (showSignup && this.registerModal && this.loginModal) showSignup.addEventListener('click', (e) => {
                e.preventDefault();
                this.hideModal(this.loginModal);
                this.showModal(this.registerModal);
            });
            if (showLogin && this.registerModal && this.loginModal) showLogin.addEventListener('click', (e) => {
                e.preventDefault();
                this.hideModal(this.registerModal);
                this.showModal(this.loginModal);
            });

            // --- Login Submission (Placeholder for database interaction) ---
            // if (this.loginForm) {
            //     this.loginForm.addEventListener('submit', async (e) => {
            //         e.preventDefault();
            //         const email = document.getElementById('email').value;
            //         const password = document.getElementById('password').value;

            //         // --- START Mock/Placeholder Login Logic ---
            //         if (email === "test@example.com" && password === "password123") {
            //             const mockUser = { name: "Test User", email: email };
            //             localStorage.setItem('user', JSON.stringify(mockUser));
            //             alert(`Welcome back, ${mockUser.name}! (MOCK LOGIN SUCCESS)`);
            //             this.hideModal(this.loginModal);
            //             this.updateUserUI(mockUser);
            //         } else {
            //             // NOTE: This is where you would integrate your actual fetch('database/login.php', ...)
            //             alert('Login failed. (MOCK) Use test@example.com and password123.');
            //         }
            //         // --- END Mock/Placeholder Login Logic ---
            //     });
            // }

            // --- Register Submission (Placeholder for database interaction) ---
            // if (this.registerForm) {
            //     this.registerForm.addEventListener('submit', async (e) => {
            //         e.preventDefault();
            //         const name = document.getElementById('reg-name').value;
            //         const email = document.getElementById('reg-email').value;
            //         const password = document.getElementById('reg-password').value;
            //         const confirmPassword = document.getElementById('reg-confirm-password').value;

            //         if (password !== confirmPassword) {
            //             alert('Passwords do not match!');
            //             return;
            //         }
            //         if (password.length < 6) {
            //             alert('Password must be at least 6 characters long.');
            //             return;
            //         }

            //         // --- START Mock/Placeholder Registration Logic ---
            //         alert('Registration successful! (MOCK) You can now log in with your details.');
            //         this.hideModal(this.registerModal);
            //         this.showModal(this.loginModal);
            //         document.getElementById('email').value = email; 
            //         // --- END Mock/Placeholder Registration Logic ---
            //     });
            // }
        }
    };

// -------------------------------------------------------------------

    // --- 4.1 SCROLL EFFECTS MODULE (Floating Element Hider) ---
    const ScrollEffects = {
        init() {
            // NOTE: Ensure your floating message/chat button has this class.
            const floatingButton = document.querySelector('.floating-chat-button');
            const footer = document.querySelector('.site-footer');

            if (!floatingButton || !footer) {
                console.info("Floating button or footer not found. Scroll effects inactive.");
                return;
            }

            const handleFloatingButtonVisibility = () => {
                // Get the height of the viewport
                const viewportHeight = window.innerHeight;
                
                // Get the position of the footer relative to the viewport.
                // rect.top is the distance from the viewport's top to the element's top.
                const footerRect = footer.getBoundingClientRect();
                
                // Hide the button when the top of the footer starts entering the viewport (footerRect.top <= viewportHeight)
                if (footerRect.top <= viewportHeight) {
                    floatingButton.style.opacity = '0';
                    floatingButton.style.pointerEvents = 'none'; // Prevent accidental clicks while hidden
                } else {
                    floatingButton.style.opacity = '1';
                    floatingButton.style.pointerEvents = 'auto'; // Restore functionality
                }
            };

            // Attach scroll listener
            window.addEventListener('scroll', handleFloatingButtonVisibility);
            
            // Initial check on load (for pages that load scrolled down)
            handleFloatingButtonVisibility();
        }
    };

// -------------------------------------------------------------------

    // --- 4.2 PRODUCT DETAIL INTERACTIONS MODULE (Specific to product-detail.html) ---
    const ProductDetailInteractions = {
        
        getProductData() {
            // Get base product details from static HTML
            const name = document.querySelector('.product-info h1')?.textContent.trim() || 'RTX 4070 Ti 12GB Gaming GPU';
            const priceText = document.querySelector('.current-price')?.textContent.replace('₱', '').replace(/,/g, '');
            const basePrice = parseFloat(priceText) || 45999.00;
            const quantity = parseInt(document.getElementById('quantityInput')?.value) || 1;

            // NOTE: Using a static ID as the HTML doesn't provide a unique one
            return {
                id: 101, // Static ID for this product
                name: name,
                price: basePrice,
                quantity: quantity,
                image: document.getElementById('mainImage')?.src || 'https://placehold.co/500x350/F7F7F7/333?text=RTX+4070+Ti'
            };
        },

        handlePurchaseAction(redirect) {
            const product = this.getProductData();
            
            // Add item(s) to the cart based on the selected quantity
            for (let i = 0; i < product.quantity; i++) {
                StoreState.addToCart(product);
            }
            
            if (redirect) {
                 // For "Buy Now", navigate to checkout after adding to cart
                 setTimeout(() => {
                     window.location.href = 'checkout.html';
                 }, 100); 
            }
        },

        init() {
            // --- Quantity Selector Logic ---
            const qtyInput = document.getElementById('quantityInput');
            const decreaseBtn = document.getElementById('decreaseQty');
            const increaseBtn = document.getElementById('increaseQty');

            if (decreaseBtn && increaseBtn && qtyInput) {
                decreaseBtn.addEventListener('click', () => {
                    let currentQty = parseInt(qtyInput.value);
                    if (currentQty > 1) {
                        qtyInput.value = currentQty - 1;
                    }
                });

                increaseBtn.addEventListener('click', () => {
                    let currentQty = parseInt(qtyInput.value);
                    let maxQty = parseInt(qtyInput.getAttribute('max')) || 100;
                    if (currentQty < maxQty) {
                        qtyInput.value = currentQty + 1;
                    }
                });
            }

            // --- Image Thumbnail Switching Logic ---
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.thumbnail-image');

            if (mainImage && thumbnails.length > 0) {
                thumbnails.forEach(thumbnail => {
                    thumbnail.addEventListener('click', () => {
                        const targetSrc = thumbnail.getAttribute('data-src');
                        if (targetSrc) {
                            mainImage.src = targetSrc;
                        }

                        // Update active state
                        thumbnails.forEach(t => t.classList.remove('active'));
                        thumbnail.classList.add('active');
                    });
                });
            }

            // --- Action Button Logic ---
            const addToCartBtn = document.getElementById('addToCartBtn');
            const buyNowBtn = document.querySelector('.btn-buy-now');
            const addToWishlistBtn = document.getElementById('addToWishlistBtn');

            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', (e) => {
                    e.preventDefault(); 
                    this.handlePurchaseAction(false); // false for "Add to Cart"
                });
            }

            if (buyNowBtn) {
                buyNowBtn.addEventListener('click', (e) => {
                    e.preventDefault(); // CRUCIAL: Stop default navigation to 'checkout.html'
                    this.handlePurchaseAction(true); // true for "Buy Now" (redirect)
                });
            }
            
            if (addToWishlistBtn) {
                addToWishlistBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const product = this.getProductData();
                    StoreState.addToWishlist(product);

                    // Update the heart icon instantly 
                    const heartIcon = e.currentTarget.querySelector('.fa-heart');
                    if (heartIcon) {
                        const isInWishlist = StoreState.wishlist.some(item => item.id === product.id);
                        heartIcon.classList.toggle('fas', isInWishlist); 
                        heartIcon.classList.toggle('far', !isInWishlist); 
                        heartIcon.style.color = isInWishlist ? 'red' : '';
                    }
                });
            }
        }
    };

// -------------------------------------------------------------------

    // --- 5. INITIALIZATION ---
    PromoSlider.init();
    StoreState.init();
    ProductInteractions.init(); // Assuming this is for index.html but runs globally
    ModalManager.init();
    ScrollEffects.init(); 
    ProductDetailInteractions.init(); // <-- NEW: Initialize product detail page logic
});

document.addEventListener('DOMContentLoaded', () => {
    // --- Modal Elements ---
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const loginBtn = document.getElementById('loginBtn');
    
    // Close buttons
    const closeLogin = document.querySelector('.close-modal');
    const closeRegister = document.querySelector('.close-modal-register');
    
    // Link to switch forms
    const showSignupLink = document.getElementById('showSignup');
    const showLoginLink = document.getElementById('showLogin');

    // --- Utility Functions ---

    // Function to open a modal
    const openModal = (modal) => {
        modal.style.display = 'block';
    }

    // Function to close a modal
    const closeModal = (modal) => {
        modal.style.display = 'none';
        // Optional: Reset form fields on close
        const form = modal.querySelector('form');
        if (form) {
            form.reset();
        }
    }

    // --- Event Listeners ---

    // 1. Open Login Modal when the Account icon is clicked
    if (loginBtn) {
        loginBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (!isLoggedIn) {
                openModal(loginModal);
            }
        });
    }

    // 2. Close Login Modal
    if (closeLogin) {
        closeLogin.addEventListener('click', () => {
            closeModal(loginModal);
        });
    }

    // 3. Close Register Modal
    if (closeRegister) {
        closeRegister.addEventListener('click', () => {
            closeModal(registerModal);
        });
    }

    // 4. Switch from Login to Signup
    if (showSignupLink) {
        showSignupLink.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal(loginModal);
            openModal(registerModal);
        });
    }

    // 5. Switch from Signup to Login
    if (showLoginLink) {
        showLoginLink.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal(registerModal);
            openModal(loginModal);
        });
    }

    // 6. Close modals when clicking outside of them
    window.addEventListener('click', (event) => {
        if (event.target === loginModal) {
            closeModal(loginModal);
        }
        if (event.target === registerModal) {
            closeModal(registerModal);
        }
    });

    // 7. Handle form submission (Add your actual backend logic here)
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get the form and its data using the FormData API
            const form = e.target;
            const formData = new FormData(form);

            // Send the data using the Fetch API
            fetch(form.action, {
                method: form.method,
                body: formData // The FormData object is automatically formatted
            })
            .then(response => response.json()) // Expect a plain text response from PHP
            .then(result => {
                // Display the message returned by the PHP script
                console.log(result);

                if(result.status == 'success') {
                    isLoggedIn = true;
                    document.getElementById('user-info-name').innerHTML = result.user.name;
                    document.querySelector('#logged-in input[type="id"]').value = result.user.id;
                    document.querySelector('#logged-in input[type="email"]').value = result.user.email;
                    document.getElementById('logged-in').style.display = "block";
                }
                // Optional: Clear the form fields after successful submission
                // form.reset(); 
            })
            .catch(error => {
                // Handle network errors
                console.log(error);
                //document.getElementById('responseMessage').innerHTML = "<span style='color: red;'>An error occurred: " + error + "</span>";
            });

            closeModal(loginModal);
            //alert('Login Attempted! (See console for details)');
            // **Your actual login logic would go here**
            // console.log('Login Data:', {
            //     email: document.getElementById('email').value,
            //     password: document.getElementById('password').value
            // });
            // If login successful: closeModal(loginModal);
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const password = document.getElementById('reg-password').value;
            const confirmPassword = document.getElementById('reg-confirm-password').value;

            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return;
            }
            else {
                 // Get the form and its data using the FormData API
                const form = e.target;
                const formData = new FormData(form);

                // Send the data using the Fetch API
                fetch(form.action, {
                    method: form.method,
                    body: formData // The FormData object is automatically formatted
                })
                .then(response => response.text()) // Expect a plain text response from PHP
                .then(result => {
                    // Display the message returned by the PHP script
                    console.log(result);
                    
                    // Optional: Clear the form fields after successful submission
                    // form.reset(); 
                })
                .catch(error => {
                    // Handle network errors
                    console.log(error);
                    //document.getElementById('responseMessage').innerHTML = "<span style='color: red;'>An error occurred: " + error + "</span>";
                });
            }

            //alert('Registration Attempted! (See console for details)');
            // **Your actual registration logic would go here**
            // console.log('Register Data:', {
            //     name: document.getElementById('reg-name').value,
            //     email: document.getElementById('reg-email').value,
            //     password: password
            // });
            // If registration successful: closeModal(registerModal);
        });
    }

    const deleteForm = document.getElementById('deleteForm');

    deleteForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Get the form and its data using the FormData API
        const form = e.target;
        const formData = new FormData(form);

        // Send the data using the Fetch API
        fetch(form.action, {
            method: form.method,
            body: formData // The FormData object is automatically formatted
        })
        .then(response => response.json()) // Expect a plain text response from PHP
        .then(result => {
            // Display the message returned by the PHP script
            console.log(result);
            isLoggedIn = false;
            document.getElementById('logged-in').style.display = "none";
            // Optional: Clear the form fields after successful submission
            // form.reset(); 
        })
        .catch(error => {
            // Handle network errors
            console.log(error);
            //document.getElementById('responseMessage').innerHTML = "<span style='color: red;'>An error occurred: " + error + "</span>";
        });
    });
});