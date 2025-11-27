// Global variables
let cart = []
let orders = []
const products = [
  {
    id: 1,
    name: "Saumon Atlantique",
    description: "Saumon frais de l'Atlantique, pêché du jour",
    price: 24.9,
    image: "/fresh-atlantic-salmon-fillet.jpg",
    category: "poisson",
  },
  {
    id: 2,
    name: "Dorade Royale",
    description: "Dorade royale entière, idéale pour les grillades",
    price: 18.5,
    image: "/fresh-sea-bream-fish.jpg",
    category: "poisson",
  },
  {
    id: 3,
    name: "Crevettes Roses",
    description: "Crevettes roses fraîches, calibre moyen",
    price: 32.0,
    image: "/fresh-pink-shrimp-prawns.jpg",
    category: "crustace",
  },
  {
    id: 4,
    name: "Sole de Bretagne",
    description: "Sole fraîche de nos côtes bretonnes",
    price: 45.0,
    image: "/fresh-sole-fish-from-brittany.jpg",
    category: "poisson",
  },
  {
    id: 5,
    name: "Huîtres Spéciales",
    description: "Huîtres spéciales n°3, élevage traditionnel",
    price: 28.0,
    image: "/fresh-oysters-on-ice.jpg",
    category: "coquillage",
  },
  {
    id: 6,
    name: "Homard Bleu",
    description: "Homard bleu vivant, pêche locale",
    price: 65.0,
    image: "/fresh-blue-lobster.jpg",
    category: "crustace",
  },
]

// Initialize the application
document.addEventListener("DOMContentLoaded", () => {
  loadProducts()
  loadOrders()
  setupEventListeners()
  updateCartDisplay()
})

// Setup event listeners
function setupEventListeners() {
  // Contact form
  document.getElementById("contactForm").addEventListener("submit", handleContactForm)

  // Order form
  document.getElementById("orderForm").addEventListener("submit", handleOrderForm)

  // Smooth scrolling for navigation
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })
}

// Load products into the grid
function loadProducts() {
  const productsGrid = document.getElementById("productsGrid")
  productsGrid.innerHTML = ""

  products.forEach((product) => {
    const productCard = createProductCard(product)
    productsGrid.appendChild(productCard)
  })
}

// Create product card element
function createProductCard(product) {
  const card = document.createElement("div")
  card.className = "product-card fade-in"
  card.innerHTML = `
        <img src="${product.image}" alt="${product.name}" class="product-image">
        <div class="product-info">
            <h3 class="product-name">${product.name}</h3>
            <p class="product-description-card">${product.description}</p>
            <div class="product-price">${product.price.toFixed(2)}€/kg</div>
            <button class="add-to-cart" onclick="addToCart(${product.id})">
                Ajouter au panier
            </button>
        </div>
    `
  return card
}

// Add product to cart
function addToCart(productId) {
  const product = products.find((p) => p.id === productId)
  if (!product) return

  const existingItem = cart.find((item) => item.id === productId)

  if (existingItem) {
    existingItem.quantity += 1
  } else {
    cart.push({
      ...product,
      quantity: 1,
    })
  }

  updateCartDisplay()
  showNotification(`${product.name} ajouté au panier!`)
}

// Update cart display
function updateCartDisplay() {
  const cartCount = document.getElementById("cartCount")
  const cartItems = document.getElementById("cartItems")
  const cartTotal = document.getElementById("cartTotal")

  // Update cart count
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0)
  cartCount.textContent = totalItems

  // Update cart items
  cartItems.innerHTML = ""
  let total = 0

  cart.forEach((item) => {
    const itemTotal = item.price * item.quantity
    total += itemTotal

    const cartItem = document.createElement("div")
    cartItem.className = "cart-item"
    cartItem.innerHTML = `
            <div class="cart-item-info">
                <h4>${item.name}</h4>
                <div class="cart-item-price">${itemTotal.toFixed(2)}€</div>
            </div>
            <div class="quantity-controls">
                <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                <span>${item.quantity}</span>
                <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
            </div>
        `
    cartItems.appendChild(cartItem)
  })

  cartTotal.textContent = `${total.toFixed(2)}€`
}

// Update item quantity in cart
function updateQuantity(productId, change) {
  const item = cart.find((item) => item.id === productId)
  if (!item) return

  item.quantity += change

  if (item.quantity <= 0) {
    cart = cart.filter((item) => item.id !== productId)
  }

  updateCartDisplay()
}

// Toggle cart sidebar
function toggleCart() {
  const cartSidebar = document.getElementById("cartSidebar")
  cartSidebar.classList.toggle("open")
}

// Checkout process
function checkout() {
  if (cart.length === 0) {
    showNotification("Votre panier est vide!", "warning")
    return
  }

  const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0)
  const orderData = {
    id: Date.now(),
    items: [...cart],
    total: total,
    date: new Date().toLocaleDateString("fr-FR"),
    status: "pending",
    customer: "Client Web",
  }

  orders.unshift(orderData)
  cart = []
  updateCartDisplay()
  loadOrders()
  toggleCart()

  showNotification("Commande passée avec succès!", "success")
}

// Handle contact form submission
function handleContactForm(e) {
  e.preventDefault()

  const formData = new FormData(e.target)
  const contactData = {
    name: formData.get("name"),
    email: formData.get("email"),
    phone: formData.get("phone"),
    message: formData.get("message"),
  }

  // Simulate form submission
  console.log("Contact form submitted:", contactData)
  showNotification("Message envoyé avec succès!", "success")
  e.target.reset()
}

// Handle order form submission
function handleOrderForm(e) {
  e.preventDefault()

  const formData = new FormData(e.target)
  const orderData = {
    id: Date.now(),
    customerName: formData.get("customerName"),
    customerEmail: formData.get("customerEmail"),
    deliveryDate: formData.get("deliveryDate"),
    notes: formData.get("orderNotes"),
    date: new Date().toLocaleDateString("fr-FR"),
    status: "confirmed",
    items: [],
    total: 0,
  }

  orders.unshift(orderData)
  loadOrders()
  showNotification("Commande créée avec succès!", "success")
  e.target.reset()
}

// Load orders into the list
function loadOrders() {
  const ordersList = document.getElementById("ordersList")
  ordersList.innerHTML = ""

  if (orders.length === 0) {
    ordersList.innerHTML = "<p>Aucune commande récente</p>"
    return
  }

  orders.slice(0, 5).forEach((order) => {
    const orderItem = document.createElement("div")
    orderItem.className = "order-item"
    orderItem.innerHTML = `
            <div class="order-header">
                <span class="order-id">#${order.id}</span>
                <span class="order-status status-${order.status}">${getStatusText(order.status)}</span>
            </div>
            <div class="order-details">
                <p><strong>Client:</strong> ${order.customerName || order.customer}</p>
                <p><strong>Date:</strong> ${order.date}</p>
                <p><strong>Total:</strong> ${order.total.toFixed(2)}€</p>
                ${order.notes ? `<p><strong>Notes:</strong> ${order.notes}</p>` : ""}
            </div>
        `
    ordersList.appendChild(orderItem)
  })
}

// Get status text in French
function getStatusText(status) {
  const statusMap = {
    pending: "En attente",
    confirmed: "Confirmée",
    delivered: "Livrée",
  }
  return statusMap[status] || status
}

// Show notification
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: ${type === "success" ? "#28a745" : type === "warning" ? "#ffc107" : "#007bff"};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 4px;
        z-index: 1002;
        animation: slideIn 0.3s ease-out;
    `
  notification.textContent = message

  document.body.appendChild(notification)

  setTimeout(() => {
    notification.style.animation = "slideOut 0.3s ease-out"
    setTimeout(() => {
      document.body.removeChild(notification)
    }, 300)
  }, 3000)
}

// Scroll to section
function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId)
  if (section) {
    section.scrollIntoView({
      behavior: "smooth",
      block: "start",
    })
  }
}

// Add CSS animations for notifications
const style = document.createElement("style")
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`
document.head.appendChild(style)

// Initialize sample orders for demonstration
orders = [
  {
    id: 1001,
    customer: "Marie Dubois",
    date: new Date().toLocaleDateString("fr-FR"),
    status: "confirmed",
    total: 67.4,
    items: [
      { name: "Saumon Atlantique", quantity: 2, price: 24.9 },
      { name: "Crevettes Roses", quantity: 1, price: 32.0 },
    ],
  },
  {
    id: 1002,
    customer: "Jean Martin",
    date: new Date(Date.now() - 86400000).toLocaleDateString("fr-FR"),
    status: "delivered",
    total: 45.0,
    items: [{ name: "Sole de Bretagne", quantity: 1, price: 45.0 }],
  },
]
