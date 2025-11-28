// Products Data
const products = [
    {
        id: 1,
        name: "Saumon Atlantique",
        category: "poisson",
        price: 2400.90,
        description: "Saumon frais de l'Atlantique, qualité premium",
        image: "public/WhatsApp Image 2025-11-27 à 21.26.18_0bcf79af.jpg",
        featured: true
    },
    {
        id: 2,
        name: "Thon Albacore",
        category: "poisson",
        price: 3200.50,
        description: "Thon albacore frais, idéal pour tataki",
        image: "public/WhatsApp Image 2025-11-27 à 21.26.19_9f9a501e.jpg",
        featured: true
    },
    {
        id: 3,
        name: "Dorade Royale",
        category: "poisson",
        price: 1800.90,
        description: "Dorade royale de Méditerranée",
        image: "public/WhatsApp Image 2025-11-27 à 21.26.20_3ea55906.jpg",
        featured: false
    },
    {
        id: 4,
        name: "Homard Breton",
        category: "crustaces",
        price: 4500.00,
        description: "Homard breton vivant, 500g",
        image: "public/crustatt 2025-11-27 à 21.36.10_cf7ad906.jpg",
        featured: true
    },
    {
        id: 5,
        name: "Crevettes Roses",
        category: "crustaces",
        price: 2800.90,
        description: "Crevettes roses sauvages",
        image: "public/rose 2025-11-27 à 21.36.09_588f2065.jpg",
        featured: false
    },
    {
        id: 6,
        name: "Tourteau",
        category: "crustaces",
        price: 2200.50,
        description: "Tourteau cuit, 1kg",
        image: "public/caraImage 2025-11-27 à 21.36.10_be0e74cf.jpg",
        featured: false
    },
    {
        id: 7,
        name: "Huîtres Spéciales",
        category: "coquillages",
        price: 1500.90,
        description: "Douzaine d'huîtres spéciales n°3",
        image: "public/WhatsApp Image 2025-11-27 à 21.36.11_8c547de6.jpg",
        featured: true
    },
    {
        id: 8,
        name: "Moules de Bouchot",
        category: "coquillages",
        price: 8000.50,
        description: "Moules de bouchot AOP, 1kg",
        image: "public/WhatsApp Image 2025-11-27 à 22.21.56_09ac33bb.jpg",
        featured: false
    },
    {
        id: 9,
        name: "Saint-Jacques",
        category: "coquillages",
        price: 3800.00,
        description: "Noix de Saint-Jacques fraîches",
        image: "public/fresh-oysters-on-ice.jpg",
        featured: false
    },
    {
        id: 10,
        name: "Bar de Ligne",
        category: "poisson",
        price: 2900.90,
        description: "Bar de ligne pêché au large",
        image: "public/WhatsApp Image 2025-11-27 à 21.26.20_7b461d0a.jpg",
        featured: true
    },
    {
        id: 11,
        name: "Sole",
        category: "poisson",
        price: 3500.50,
        description: "Sole fraîche de petite pêche",
        image: "public/WhatsApp Image 2025-11-27 à 21.26.35_a3d34690.jpg",
        featured: false
    },
    {
        id: 12,
        name: "Langoustines",
        category: "crustaces",
        price: 4200.00,
        description: "Langoustines vivantes, premium",
        image: "public/long Image 2025-11-27 à 21.36.10_a7013290.jpg",
        featured: true
    }
];

// Cart State
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Theme Management
function initTheme() {
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
}

function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
}

// Cart Functions
function updateCartCount() {
    const count = cart.reduce((total, item) => total + item.quantity, 0);
    document.getElementById('cartCount').textContent = count;
}

function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ ...product, quantity: 1 });
    }
    
    saveCart();
    updateCartCount();
    showNotification('Produit ajouté au panier!');
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    saveCart();
    updateCartCount();
    renderCart();
}

function updateQuantity(productId, change) {
    const item = cart.find(item => item.id === productId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(productId);
        } else {
            saveCart();
            renderCart();
        }
    }
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function calculateTotal() {
    return cart.reduce((total, item) => total + (item.price * item.quantity), 0);
}

// Render Functions
function renderProducts(productsToRender, containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;
    
    container.innerHTML = productsToRender.map(product => `
        <div class="product-card">
            <img src="${product.image}" alt="${product.name}" class="product-image">
            <div class="product-content">
                <div class="product-category">${product.category}</div>
                <h3 class="product-title">${product.name}</h3>
                <p class="product-description">${product.description}</p>
                <div class="product-footer">
                    <span class="product-price">${product.price.toFixed(2)} Fc</span>
                    <button class="add-to-cart" onclick="addToCart(${product.id})">
                        Ajouter
                    </button>
                </div>
            </div>
        </div>
    `).join('');
}

function renderCart() {
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    
    if (cart.length === 0) {
        cartItems.innerHTML = '<div class="empty-cart">Votre panier est vide</div>';
        cartTotal.textContent = '0.00 Fc';
        return;
    }
    
    cartItems.innerHTML = cart.map(item => `
        <div class="cart-item">
            <img src="${item.image}" alt="${item.name}" class="cart-item-image">
            <div class="cart-item-info">
                <div class="cart-item-title">${item.name}</div>
                <div class="cart-item-price">${item.price.toFixed(2)} Fc</div>
                <div class="cart-item-actions">
                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                    <span>${item.quantity}</span>
                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                    <button class="remove-btn" onclick="removeFromCart(${item.id})">Retirer</button>
                </div>
            </div>
        </div>
    `).join('');
    
    cartTotal.textContent = calculateTotal().toFixed(2) + ' Fc';
}

// Modal Functions
function openCart() {
    renderCart();
    document.getElementById('cartModal').classList.add('active');
}

function closeCart() {
    document.getElementById('cartModal').classList.remove('active');
}

// Notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: var(--accent);
        color: white;
        padding: 1rem 2rem;
        border-radius: 8px;
        z-index: 10000;
        animation: slideIn 0.3s ease;
    `;
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 2000);
}

// Filter Products
function filterProducts(category) {
    const allProducts = document.getElementById('allProducts');
    if (!allProducts) return;
    
    const filtered = category === 'all' 
        ? products 
        : products.filter(p => p.category === category);
    
    renderProducts(filtered, 'allProducts');
    
    // Update active filter button
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.getAttribute('data-category') === category) {
            btn.classList.add('active');
        }
    });
}

// Contact Form
function handleContactForm(e) {
    e.preventDefault();
    showNotification('Message envoyé avec succès!');
    e.target.reset();
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    // Initialize theme
    initTheme();

    // Listen for theme changes from other tabs/windows
    window.addEventListener('storage', (e) => {
        if (e.key === 'theme') {
            document.documentElement.setAttribute('data-theme', e.newValue);
        }
    });

    // Re-sync theme when tab becomes visible (for navigation between pages)
    document.addEventListener('visibilitychange', () => {
        if (!document.hidden) {
            const savedTheme = localStorage.getItem('theme') || 'dark';
            const currentTheme = document.documentElement.getAttribute('data-theme');
            if (savedTheme !== currentTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
            }
        }
    });

    // Theme toggle
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', toggleTheme);
    }
    
    // Cart button
    const cartButton = document.getElementById('cartButton');
    if (cartButton) {
        cartButton.addEventListener('click', openCart);
    }
    
    // Close cart
    const closeCartBtn = document.getElementById('closeCart');
    if (closeCartBtn) {
        closeCartBtn.addEventListener('click', closeCart);
    }
    
    // Close modal on outside click
    const modal = document.getElementById('cartModal');
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeCart();
        });
    }
    
    // Render featured products on home page
    const featuredContainer = document.getElementById('featuredProducts');
    if (featuredContainer) {
        const featured = products.filter(p => p.featured);
        renderProducts(featured, 'featuredProducts');
    }
    
    // Render all products on products page
    const allProductsContainer = document.getElementById('allProducts');
    if (allProductsContainer) {
        renderProducts(products, 'allProducts');
        
        // Setup filters
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const category = btn.getAttribute('data-category');
                filterProducts(category);
            });
        });
    }
    
    // Contact form
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactForm);
    }
    
    // Update cart count
    updateCartCount();
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(400px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(400px); opacity: 0; }
    }
`;
document.head.appendChild(style);