<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquamar - Poissons Frais en Ligne</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  
    <script>
        // Apply theme immediately to prevent flash
        const savedTheme = localStorage.getItem('theme') || 'dark';
        document.documentElement.setAttribute('data-theme', savedTheme);
    </script>
    
</head>
<body>
    <!-- Ocean Background -->
    <!-- Ocean Background -->
<div class="ocean-background">
  <video class="ocean-video" autoplay muted loop playsinline preload="auto" poster="public/ocean-poster.jpg">
    <source src="./assets/videos/WhatsApp Vidéo 2025-11-29 à 15.34.08_4c83f2d1.mp4" type="video/mp4">
    <source src="./assets/videos/3.mp4" type="video/webm">

  </video>

    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>

    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    
    </div>


    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="index.html" class="logo">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6.5 12c.94-3.46 4.94-6 8.5-6 3.56 0 6.06 2.54 7 6-.94 3.46-4.44 6-8 6s-7.56-2.54-8.5-6Z"/>
                        <path d="M18 12v.5"/>
                        <path d="M16 17.93a9.77 9.77 0 0 1 0-11.86"/>
                        <path d="M7 10.67C7 8 5.58 5.97 2.73 5.5c-1 1.5-1 5 .23 6.5-1.24 1.5-1.24 5-.23 6.5C5.58 18.03 7 16 7 13.33"/>
                    </svg>
                    <span>Aquamar</span>
                </a>
                <nav class="nav">
                    <a href="<?= Router\Router::route('') ?>" class="nav-link active">Accueil</a>
                    <a href="<?= Router\Router::route('products') ?>" class="nav-link">Produits</a>
                    <a href="about.html" class="nav-link">À Propos</a>
                    <a href="" class="nav-link">Contact</a>
                    <a href="<?= Router\Router::route('admin') ?>" class="nav-link">dashboard</a>
                    <a href="<?= Router\Router::route('login') ?>" class="nav-link">Connexion</a>
                </nav>
                <div class="header-actions">
                    <button class="theme-toggle" id="themeToggle" aria-label="Changer de thème">
                        <svg class="sun-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="4"/>
                            <path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                        </svg>
                        <svg class="moon-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                        </svg>
                    </button>
                    <button class="cart-button" id="cartButton">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="8" cy="21" r="1"/>
                            <circle cx="19" cy="21" r="1"/>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                        </svg>
                        <span class="cart-count" id="cartCount">0</span>
                    </button>
                    <button class="cart-button">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Vidéo PC -->
        <video class="hero-video hero-video-pc" autoplay muted loop playsinline preload="auto">
            <source src="public/Vidéo2 2025-11-30 à 14.47.28_c340b21e.mp4" type="video/mp4">
        </video>
        <!-- Bulles pour PC -->
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>

        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>

        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Poissons Frais Livrés à Votre Porte</h1>
                <p class="hero-description">
                    Découvrez notre sélection premium de poissons et fruits de mer frais,
                    pêchés de manière durable et livrés directement chez vous.
                </p>
                <a href="products.html" class="btn btn-primary">Voir nos produits</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6.5 12c.94-3.46 4.94-6 8.5-6 3.56 0 6.06 2.54 7 6-.94 3.46-4.44 6-8 6s-7.56-2.54-8.5-6Z"/>
                            <path d="M18 12v.5"/>
                            <path d="M16 17.93a9.77 9.77 0 0 1 0-11.86"/>
                            <path d="M7 10.67C7 8 5.58 5.97 2.73 5.5c-1 1.5-1 5 .23 6.5-1.24 1.5-1.24 5-.23 6.5C5.58 18.03 7 16 7 13.33"/>
                        </svg>
                    </div>
                    <h3>Fraîcheur Garantie</h3>
                    <p>Pêchés du jour et livrés en 24h</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.3 0 3.5 2 3.5 4v1c0 1.1.9 2 2 2s2-.9 2-2V9c0-2.5 1.2-4.5 3.5-4.5C21 4.5 22 6 22 8v2"/>
                            <path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 3.4 2 5.5 2s3-.5 5.5-2c2.5 0 3.5 2 5.5 2"/>
                            <path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 3.4 2 5.5 2s3-.5 5.5-2c2.5 0 3.5 2 5.5 2"/>
                        </svg>
                    </div>
                    <h3>Pêche Durable</h3>
                    <p>Respectueux de l'environnement</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h2"/>
                            <path d="M15 18H9"/>
                            <path d="M19 18h2a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2h-3.5"/>
                            <circle cx="7" cy="18" r="2"/>
                            <circle cx="17" cy="18" r="2"/>
                        </svg>
                    </div>
                    <h3>Livraison Rapide</h3>
                    <p>Livraison gratuite dès 5000 Fc</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/>
                        </svg>
                    </div>
                    <h3>Qualité Premium</h3>
                    <p>Sélection par nos experts</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="products-section">
        <div class="container">
            <h2 class="section-title">Produits Vedettes</h2>
            <div class="products-grid" id="featuredProducts"></div>
            <div class="text-center">
                <a href="products.html" class="btn btn-secondary">Voir tous les produits</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Aquamar</h4>
                    <p>Votre poissonnerie en ligne de confiance depuis 2024</p>
                </div>
                <div class="footer-section">
                    <h4>Liens Rapides</h4>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="products.html">Produits</a></li>
                        <li><a href="about.html">À Propos</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <ul>
                        <li>Email: contact@Aquamar.fr</li>
                        <li>Tél: 01 23 45 67 89</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Aquamar. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Cart Modal -->
    <div class="modal" id="cartModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Votre Panier</h2>
                <button class="modal-close" id="closeCart">&times;</button>
            </div>
            <div class="modal-body" id="cartItems"></div>
            <div class="modal-footer">
                <div class="cart-total">
                    <span>Total:</span>
                    <span id="cartTotal">0.00 Fc</span>
                </div>
                <button class="btn btn-primary btn-full">Commander</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>