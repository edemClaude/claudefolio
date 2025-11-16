<?php
use App\Core\Asset;
$pageTitle = $pageTitle ?? 'Portfolio';
$cssFiles = $cssFiles ?? ['style.css'];
$jsFiles = $jsFiles ?? ['app.js'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="Portfolio de Edem Claude KUMAZA, développeur web passionné">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?= Asset::css(array_merge($cssFiles, ['hamburger.css', 'footer.css'])) ?>
    <!-- favicon -->
    <link rel="icon" href="<?= Asset::img('favicon.ico') ?>" type="image/x-icon">
</head>
<body>
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-content">
            <div class="spinner"></div>
            <div class="loader-text">Chargement...</div>
        </div>
    </div>
    <?php include __DIR__ . '/components/header.php'; ?>
    
    <main>
        <!-- Hero Section -->
        <section id="home" class="hero">
            <div class="hero-content">
                <p class="hero-subtitle fade-in-down delay-1">Bienvenue sur mon portfolio</p>
                <h1 class="hero-title fade-in-up delay-2" data-text="Edem Claude KUMAZA">Edem Claude KUMAZA</h1>
                <p class="hero-description fade-in-up delay-3">
                    <span class="typing-effect">Web Developer</span> 
                    <br>passionné par la création d'expériences digitales modernes et performantes
                </p>
                <div class="hero-buttons fade-in-up delay-4">
                    <a href="#contact" class="btn btn-primary btn-shine">Me contacter</a>
                    <a href="#about" class="btn btn-outline wave-effect">En savoir plus</a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about">
            <div class="container">
                <h2 class="section-title">À propos de moi</h2>
                <div class="about-content">
                    <div class="about-text fade-in-left">
                        <h3>Développeur Web Full Stack</h3>
                        <p>
                            Passionné par le développement web, je crée des applications modernes, 
                            performantes et intuitives qui répondent aux besoins des utilisateurs.
                        </p>
                        <p>
                            Avec une expertise en front-end et back-end, je transforme vos idées 
                            en solutions digitales concrètes et innovantes.
                        </p>
                        <p>
                            Mon objectif est de concevoir des expériences utilisateur exceptionnelles 
                            tout en maintenant un code propre, maintenable et évolutif.
                        </p>
                    </div>
                    <div class="about-image fade-in-right">
                        <div class="about-placeholder scale-in">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="skills">
            <div class="container">
                <h2 class="section-title">Mes Compétences</h2>
                <div class="skills-grid">
                    <div class="card skill-card fade-in-up delay-1">
                        <div class="skill-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3>Front-End</h3>
                        <p>HTML, CSS, JavaScript, Angular, React, Vue.js</p>
                        <div class="skill-progress">
                            <div class="skill-progress-bar" data-width="90%"></div>
                        </div>
                    </div>
                    <div class="card skill-card fade-in-up delay-2">
                        <div class="skill-icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <h3>Back-End</h3>
                        <p>PHP, Node.js, MySQL, PostgreSQL, Laravel, Symfony</p>
                        <div class="skill-progress">
                            <div class="skill-progress-bar" data-width="85%"></div>
                        </div>
                    </div>
                    <div class="card skill-card fade-in-up delay-3">
                        <div class="skill-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3>DevOps</h3>
                        <p>Git, Docker, CI/CD, Cloud</p>
                        <div class="skill-progress">
                            <div class="skill-progress-bar" data-width="75%"></div>
                        </div>
                    </div>
                    <div class="card skill-card fade-in-up delay-4">
                        <div class="skill-icon">
                            <i class="fas fa-mobile-screen"></i>
                        </div>
                        <h3>Responsive Design</h3>
                        <p>Mobile-first, Progressive Web Apps</p>
                        <div class="skill-progress">
                            <div class="skill-progress-bar" data-width="95%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="contact-content">
                    <h2 class="section-title">Contactez-moi</h2>
                    <p style="margin-bottom: 20px;">Vous avez un projet en tête ? N'hésitez pas à me contacter !</p>
                    <div class="contact-items">

                        <a href="mailto:edemclaudek@gmail.com" class="contact-item" style="margin-bottom: 10px;">
                            <i class="fas fa-envelope"></i>
                            <span>edemclaudek@gmail.com</span>
                        </a>
                        <a href="tel:+221778433293" class="contact-item" style="margin-bottom: 10px;">
                            <i class="fas fa-phone"></i>
                            <span>+221 77 84 33 293</span>
                        </a>
                        <a href="https://github.com/edemClaude" target="_blank" class="contact-item" style="margin-bottom: 10px;">
                            <i class="fab fa-github"></i>
                            <span>GitHub</span>
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="contact-item" style="margin-bottom: 10px;">
                            <i class="fab fa-linkedin"></i>
                            <span>LinkedIn</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="newsletter" class="newsletter">
            <div class="container">
                <div class="newsletter-content">
                    <h2 class="section-title">Abonnez-vous à ma newsletter</h2>
                    <p>Recevez les dernières nouvelles et les meilleurs conseils pour votre développement web.</p>
                    <form id="newsletterForm" class="newsletter-form">
                        <input class="newsletter-input" type="email" id="email" name="email" placeholder="Votre adresse e-mail" required>
                        <button type="submit" class="btn btn-primary btn-shine">S'abonner</button>
                    </form>
                    <div id="newsletterMessage" class="newsletter-message"></div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/components/footer.php'; ?>
    
    <?= Asset::js(array_merge($jsFiles, ['hamburger.js'])) ?>
</body>
</html>
