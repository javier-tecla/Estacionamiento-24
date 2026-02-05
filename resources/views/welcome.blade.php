<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Soluciones de Estacionamiento</title>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
       rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

   <style>
       /* Reset y Variables */
       * {
           margin: 0;
           padding: 0;
           box-sizing: border-box;
       }

       :root {
           --primary-color: #0a0a0a;
           --secondary-color: #1a1a1a;
           --accent-color: #ffffff;
           --accent-gold: #d4af37;
           --text-primary: #ffffff;
           --text-secondary: #a0a0a0;
           --text-muted: #666666;
           --gradient-primary: linear-gradient(135deg, #000000, #1a1a1a);
           --gradient-accent: linear-gradient(135deg, #d4af37, #f4d03f);
           --shadow-light: 0 10px 40px rgba(0, 0, 0, 0.1);
           --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.3);
           --border-radius: 12px;
           --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
       }

       body {
           font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
           line-height: 1.6;
           color: var(--text-primary);
           background: var(--primary-color);
           overflow-x: hidden;
       }

       .container {
           max-width: 1200px;
           margin: 0 auto;
           padding: 0 2rem;
       }

       /* Navigation */
       .navbar {
           position: fixed;
           top: 0;
           width: 100%;
           background: rgba(10, 10, 10, 0.9);
           backdrop-filter: blur(20px);
           border-bottom: 1px solid rgba(255, 255, 255, 0.1);
           z-index: 1000;
           transition: var(--transition);
       }

       .nav-container {
           max-width: 1200px;
           margin: 0 auto;
           display: flex;
           justify-content: space-between;
           align-items: center;
           padding: 1rem 2rem;
       }

       .nav-logo {
           font-size: 1.5rem;
           font-weight: 700;
           color: var(--text-primary);
           display: flex;
           align-items: center;
           gap: 0.5rem;
       }

       .logo-icon {
           font-size: 1.2rem;
           color: var(--accent-gold);
       }

       .nav-menu {
           display: flex;
           gap: 2.5rem;
       }

       .nav-link {
           color: var(--text-secondary);
           text-decoration: none;
           font-weight: 500;
           font-size: 0.95rem;
           transition: var(--transition);
           position: relative;
       }

       .nav-link:hover {
           color: var(--text-primary);
       }

       .nav-link::after {
           content: '';
           position: absolute;
           bottom: -5px;
           left: 0;
           width: 0;
           height: 2px;
           background: var(--accent-gold);
           transition: width 0.3s ease;
       }

       .nav-link:hover::after {
           width: 100%;
       }

       .nav-cta {
           background: var(--gradient-accent);
           color: var(--primary-color);
           border: none;
           padding: 0.8rem 2rem;
           border-radius: 50px;
           font-weight: 600;
           font-size: 0.9rem;
           cursor: pointer;
           transition: var(--transition);
           box-shadow: var(--shadow-light);
       }

       .nav-cta:hover {
           transform: translateY(-2px);
           box-shadow: var(--shadow-heavy);
       }

       /* Hero Section */
       .hero {
           height: 100vh;
           position: relative;
           display: flex;
           align-items: center;
           justify-content: center;
           overflow: hidden;
       }

       .hero-background {
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           z-index: -2;
       }

       .hero-image {
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background-size: cover;
           background-position: center;
           background-attachment: fixed;
       }

       .hero-overlay {
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6));
           z-index: -1;
       }

       .hero-content {
           text-align: center;
           max-width: 800px;
           padding: 0 2rem;
           animation: fadeInUp 1s ease-out;
       }

       .hero-badge {
           display: inline-block;
           background: rgba(212, 175, 55, 0.1);
           color: var(--accent-gold);
           padding: 0.5rem 1.5rem;
           border-radius: 50px;
           font-size: 0.9rem;
           font-weight: 500;
           margin-bottom: 2rem;
           border: 1px solid rgba(212, 175, 55, 0.3);
       }

       .hero-title {
           font-size: clamp(2.5rem, 8vw, 4.5rem);
           font-weight: 800;
           line-height: 1.1;
           margin-bottom: 2rem;
           letter-spacing: -0.02em;
       }

       .title-line {
           display: block;
       }

       .title-emphasis {
           background: var(--gradient-accent);
           background-clip: text;
           -webkit-background-clip: text;
           -webkit-text-fill-color: transparent;
       }

       .hero-description {
           font-size: 1.25rem;
           color: var(--text-secondary);
           margin-bottom: 3rem;
           line-height: 1.6;
           max-width: 600px;
           margin-left: auto;
           margin-right: auto;
       }

       .hero-actions {
           display: flex;
           gap: 1.5rem;
           justify-content: center;
           margin-bottom: 4rem;
           flex-wrap: wrap;
       }

       .btn-primary {
           background: var(--gradient-accent);
           color: var(--primary-color);
           border: none;
           padding: 1rem 2.5rem;
           border-radius: 50px;
           font-weight: 600;
           font-size: 1rem;
           cursor: pointer;
           transition: var(--transition);
           display: flex;
           align-items: center;
           gap: 0.5rem;
           box-shadow: var(--shadow-light);
       }

       .btn-primary:hover {
           transform: translateY(-3px);
           box-shadow: var(--shadow-heavy);
       }

       .btn-secondary {
           background: transparent;
           color: var(--text-primary);
           border: 2px solid rgba(255, 255, 255, 0.3);
           padding: 1rem 2.5rem;
           border-radius: 50px;
           font-weight: 600;
           font-size: 1rem;
           cursor: pointer;
           transition: var(--transition);
           display: flex;
           align-items: center;
           gap: 0.5rem;
           backdrop-filter: blur(10px);
       }

       .btn-secondary:hover {
           background: rgba(255, 255, 255, 0.1);
           border-color: var(--accent-gold);
       }

       .hero-stats {
           display: flex;
           justify-content: center;
           gap: 4rem;
           flex-wrap: wrap;
       }

       .stat-item {
           text-align: center;
       }

       .stat-number {
           display: block;
           font-size: 2.5rem;
           font-weight: 700;
           color: var(--accent-gold);
           line-height: 1;
       }

       .stat-label {
           font-size: 0.9rem;
           color: var(--text-secondary);
           margin-top: 0.5rem;
       }

       .hero-scroll {
           position: absolute;
           bottom: 2rem;
           left: 50%;
           transform: translateX(-50%);
       }

       .scroll-indicator {
           width: 2px;
           height: 30px;
           background: var(--accent-gold);
           border-radius: 2px;
           animation: scrollPulse 2s infinite;
       }

       /* Features Section */
       .features {
           padding: 8rem 0;
           background: var(--secondary-color);
           position: relative;
       }

       .section-header {
           text-align: center;
           margin-bottom: 6rem;
       }

       .section-badge {
           display: inline-block;
           background: rgba(212, 175, 55, 0.1);
           color: var(--accent-gold);
           padding: 0.5rem 1.5rem;
           border-radius: 50px;
           font-size: 0.9rem;
           font-weight: 500;
           margin-bottom: 1.5rem;
           border: 1px solid rgba(212, 175, 55, 0.3);
       }

       .section-title {
           font-size: clamp(2rem, 5vw, 3.5rem);
           font-weight: 700;
           margin-bottom: 1.5rem;
           line-height: 1.2;
       }

       .section-description {
           font-size: 1.1rem;
           color: var(--text-secondary);
           max-width: 600px;
           margin: 0 auto;
           line-height: 1.6;
       }

       .features-grid {
           display: grid;
           grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
           gap: 3rem;
       }

       .feature-card {
           background: rgba(255, 255, 255, 0.05);
           border-radius: var(--border-radius);
           overflow: hidden;
           transition: var(--transition);
           border: 1px solid rgba(255, 255, 255, 0.1);
           backdrop-filter: blur(10px);
       }

       .feature-card:hover {
           transform: translateY(-10px);
           box-shadow: var(--shadow-heavy);
           border-color: var(--accent-gold);
       }

       .feature-image {
           height: 200px;
           background-size: cover;
           background-position: center;
           position: relative;
           overflow: hidden;
       }

       .feature-content {
           padding: 2rem;
       }

       .feature-icon {
           width: 60px;
           height: 60px;
           background: var(--gradient-accent);
           border-radius: 50%;
           display: flex;
           align-items: center;
           justify-content: center;
           margin-bottom: 1.5rem;
           color: var(--primary-color);
           font-size: 1.5rem;
       }

       .feature-title {
           font-size: 1.5rem;
           font-weight: 600;
           margin-bottom: 1rem;
           color: var(--text-primary);
       }

       .feature-description {
           color: var(--text-secondary);
           line-height: 1.6;
       }

       /* Gallery Section */
       .gallery {
           padding: 8rem 0;
           background: var(--primary-color);
       }

       .gallery-container {
           display: grid;
           grid-template-columns: 2fr 1fr 1fr;
           grid-template-rows: repeat(3, 250px);
           gap: 1rem;
           max-width: 1200px;
           margin: 0 auto;
           padding: 0 2rem;
       }

       .gallery-item {
           position: relative;
           overflow: hidden;
           border-radius: var(--border-radius);
           transition: var(--transition);
           cursor: pointer;
       }

       .gallery-item.large {
           grid-row: span 2;
       }

       .gallery-item.medium {
           grid-row: span 1;
       }

       .gallery-item.small {
           grid-row: span 1;
       }

       .gallery-item img {
           width: 100%;
           height: 100%;
           object-fit: cover;
           transition: var(--transition);
       }

       .gallery-item:hover img {
           transform: scale(1.1);
       }

       .gallery-overlay {
           position: absolute;
           bottom: 0;
           left: 0;
           right: 0;
           background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
           padding: 2rem;
           transform: translateY(100%);
           transition: var(--transition);
       }

       .gallery-item:hover .gallery-overlay {
           transform: translateY(0);
       }

       .gallery-label {
           color: var(--text-primary);
           font-weight: 600;
           font-size: 1.1rem;
       }

       /* CTA Section */
       .cta {
           padding: 8rem 0;
           position: relative;
           text-align: center;
       }

       .cta-background {
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background-size: cover;
           background-position: center;
           background-attachment: fixed;
           z-index: -2;
       }

       .cta-overlay {
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background: rgba(0, 0, 0, 0.8);
           z-index: -1;
       }

       .cta-content {
           max-width: 600px;
           margin: 0 auto;
       }

       .cta-title {
           font-size: clamp(2rem, 5vw, 3rem);
           font-weight: 700;
           margin-bottom: 1.5rem;
           line-height: 1.2;
       }

       .cta-description {
           font-size: 1.2rem;
           color: var(--text-secondary);
           margin-bottom: 3rem;
           line-height: 1.6;
       }

       .cta-button {
           background: var(--gradient-accent);
           color: var(--primary-color);
           border: none;
           padding: 1.2rem 3rem;
           border-radius: 50px;
           font-weight: 700;
           font-size: 1.1rem;
           cursor: pointer;
           transition: var(--transition);
           display: inline-flex;
           align-items: center;
           gap: 0.8rem;
           box-shadow: var(--shadow-light);
       }

       .cta-button:hover {
           transform: translateY(-3px);
           box-shadow: var(--shadow-heavy);
       }

       /* Footer */
       .footer {
           background: var(--secondary-color);
           padding: 4rem 0 2rem;
           border-top: 1px solid rgba(255, 255, 255, 0.1);
       }

       .footer-content {
           display: grid;
           grid-template-columns: 2fr 1fr 1fr 1fr;
           gap: 3rem;
           margin-bottom: 3rem;
       }

       .footer-brand {
           max-width: 400px;
       }

       .footer-logo {
           font-size: 1.5rem;
           font-weight: 700;
           color: var(--text-primary);
           display: flex;
           align-items: center;
           gap: 0.5rem;
           margin-bottom: 1rem;
       }

       .footer-description {
           color: var(--text-secondary);
           line-height: 1.6;
           margin-bottom: 2rem;
       }

       .social-links {
           display: flex;
           gap: 1rem;
       }

       .social-links a {
           width: 40px;
           height: 40px;
           background: rgba(255, 255, 255, 0.1);
           border-radius: 50%;
           display: flex;
           align-items: center;
           justify-content: center;
           color: var(--text-secondary);
           transition: var(--transition);
       }

       .social-links a:hover {
           background: var(--accent-gold);
           color: var(--primary-color);
       }

       .footer-column h4 {
           color: var(--text-primary);
           font-weight: 600;
           margin-bottom: 1.5rem;
       }

       .footer-column a,
       .footer-column span {
           color: var(--text-secondary);
           text-decoration: none;
           display: block;
           margin-bottom: 0.8rem;
           transition: var(--transition);
       }

       .footer-column a:hover {
           color: var(--accent-gold);
       }

       .footer-bottom {
           text-align: center;
           padding-top: 2rem;
           border-top: 1px solid rgba(255, 255, 255, 0.1);
           color: var(--text-muted);
       }

       /* Animations */
       @keyframes fadeInUp {
           from {
               opacity: 0;
               transform: translateY(50px);
           }

           to {
               opacity: 1;
               transform: translateY(0);
           }
       }

       @keyframes scrollPulse {

           0%,
           100% {
               transform: translateY(0);
               opacity: 1;
           }

           50% {
               transform: translateY(10px);
               opacity: 0.5;
           }
       }

       /* Responsive Design */
       @media (max-width: 1024px) {
           .gallery-container {
               grid-template-columns: 1fr 1fr;
               grid-template-rows: repeat(4, 200px);
           }

           .gallery-item.large {
               grid-row: span 2;
           }
       }

       @media (max-width: 768px) {
           .nav-menu {
               display: none;
           }

           .hero-actions {
               flex-direction: column;
               align-items: center;
           }

           .hero-stats {
               gap: 2rem;
           }

           .features-grid {
               grid-template-columns: 1fr;
               gap: 2rem;
           }

           .gallery-container {
               grid-template-columns: 1fr;
               grid-template-rows: repeat(5, 250px);
           }

           .gallery-item.large,
           .gallery-item.medium,
           .gallery-item.small {
               grid-row: span 1;
           }

           .footer-content {
               grid-template-columns: 1fr;
               gap: 2rem;
               text-align: center;
           }
       }

       @media (max-width: 480px) {
           .container {
               padding: 0 1rem;
           }

           .nav-container {
               padding: 1rem;
           }

           .hero-content {
               padding: 0 1rem;
           }

           .btn-primary,
           .btn-secondary,
           .cta-button {
               width: 100%;
               justify-content: center;
           }
       }
   </style>
</head>

<body>
   <!-- Navigation -->
   <nav class="navbar">
       <div class="nav-container">
           <div class="nav-logo">
               <span class="logo-icon">◆</span>
               ESTACIONAMIENTO 24
           </div>
           <div class="nav-menu">
               <a href="#home" class="nav-link">Inicio</a>
               <a href="#services" class="nav-link">Servicios</a>
               <a href="#about" class="nav-link">Nosotros</a>
               <a href="#contact" class="nav-link">Contactos</a>
           </div>
           <a href="{{ url('/admin') }}" class="nav-cta">Comenzar</a>
       </div>
   </nav>

   <!-- Hero Section -->
   <section id="home" class="hero">
       <div class="hero-background">
           <div class="hero-overlay"></div>
           <video autoplay muted loop class="hero-video">
               <source src="" type="video/mp4">
           </video>
           <div class="hero-image"
               style="background-image: url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&auto=format&fit=crop&w=2669&q=80')">
           </div>
       </div>

       <div class="hero-content">
           <h1 class="hero-title">
               <span class="title-line title-emphasis">Un Parqueo</span>
               <span class="title-line">Con Excelencia</span>
           </h1>
           <p class="hero-description">
               Experimenta el futuro del parqueo con nuestro sistema inteligente,
               fluido y diseñado.
           </p>
           <div class="hero-actions">
               <a href="{{ url('/admin') }}" class="btn-primary">
                   <span>Explorar Soluciones</span>
                   <i class="fas fa-arrow-right"></i>
               </a>
               <a href="{{ url('/admin') }}" class="btn-secondary">
                   <i class="fas fa-play"></i>
                   <span>Ver Demo</span>
               </a>
           </div>
           <div class="hero-stats">
               <div class="stat-item">
                   <span class="stat-number">Muchos</span>
                   <span class="stat-label">Espacios Gestionados</span>
               </div>
               <div class="stat-item">
                   <span class="stat-number">24/7</span>
                   <span class="stat-label">Disponibilidad</span>
               </div>
               <div class="stat-item">
                   <span class="stat-number">99.9%</span>
                   <span class="stat-label">Tiempo Activo</span>
               </div>
           </div>
       </div>

       <div class="hero-scroll">
           <div class="scroll-indicator"></div>
       </div>
   </section>

   <!-- Features Section -->
   <section id="services" class="features">
       <div class="container">
           <div class="section-header">
               <span class="section-badge">Nuestros Servicios</span>
               <h2 class="section-title">Soluciones Inteligentes de Parqueo</h2>
               <p class="section-description">
                   La tecnología avanzada se encuentra con el servicio para ofrecer
                   una experiencia de parqueo sin igual.
               </p>
           </div>

           <div class="features-grid">
               <div class="feature-card">
                   <div class="feature-image"
                       style="background-image: url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')">
                   </div>
                   <div class="feature-content">
                       <div class="feature-icon">
                           <i class="fas fa-mobile-alt"></i>
                       </div>
                       <h3 class="feature-title">Reservas Inteligentes</h3>
                       <p class="feature-description">
                           Reserva y gestiona tu espacio de parqueo al instante a través de nuestra aplicación móvil.
                       </p>
                   </div>
               </div>

               <div class="feature-card">
                   <div class="feature-image"
                       style="background-image: url('https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')">
                   </div>
                   <div class="feature-content">
                       <div class="feature-icon">
                           <i class="fas fa-shield-alt"></i>
                       </div>
                       <h3 class="feature-title">Seguridad Premium</h3>
                       <p class="feature-description">
                           Vigilancia avanzada y control de acceso garantizan la seguridad de tu vehículo en todo
                           momento.
                       </p>
                   </div>
               </div>

               <div class="feature-card">
                   <div class="feature-image"
                       style="background-image: url('https://images.unsplash.com/photo-1514235986586-9b1e33c38fa3?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                   </div>
                   <div class="feature-content">
                       <div class="feature-icon">
                           <i class="fas fa-chart-line"></i>
                       </div>
                       <h3 class="feature-title">Análisis en Tiempo Real</h3>
                       <p class="feature-description">
                           Perspectivas integrales y análisis para optimizar la eficiencia del parqueo y los ingresos.
                       </p>
                   </div>
               </div>
           </div>
       </div>
   </section>

   

   <!-- CTA Section -->
   <section class="cta">
       <div class="cta-background"
           style="background-image: url('https://images.unsplash.com/photo-1542282088-fe8426682b8f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2126&q=80')">
       </div>
       <div class="cta-overlay"></div>
       <div class="container">
           <div class="cta-content">
               <h2 class="cta-title">¿Listo para Experimentar el Parqueo?</h2>
               <p class="cta-description">
                   Únete a miles de clientes satisfechos que han revolucionado su experiencia de parqueo.
               </p>
               <a href="{{ url('/admin') }}" class="cta-button">
                   <span>Comienza Tu Experiencia</span>
                   <i class="fas fa-arrow-right"></i>
               </a>
           </div>
       </div>
   </section>

   <!-- Footer -->
   <footer class="footer">
       <div class="container">
           <div class="footer-content">
               <div class="footer-brand">
                   <div class="footer-logo">
                       <span class="logo-icon">◆</span>
                       HILARI PARK
                   </div>
                   <p class="footer-description">
                       Redefiniendo el parqueo con soluciones
                       y excelencia en el servicio excepcional.
                   </p>
                   <div class="social-links">
                       <a href="#"><i class="fab fa-twitter"></i></a>
                       <a href="#"><i class="fab fa-instagram"></i></a>
                       <a href="#"><i class="fab fa-linkedin"></i></a>
                   </div>
               </div>

               <div class="footer-links">
                   <div class="footer-column">
                       <h4>Contacto</h4>
                       <span>La Paz, Bolivia</span>
                       <span>+591 75657007</span>
                       <span>info@hilariweb.com</span>
                   </div>
               </div>
           </div>

           <div class="footer-bottom">
               <p>&copy; 2025 HILARI PARK. All rights reserved.</p>
           </div>
       </div>
   </footer>
</body>

</html>