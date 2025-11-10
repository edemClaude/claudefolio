<?php
use App\Core\Asset;
$pageTitle = $pageTitle ?? 'Services';
$cssFiles = $cssFiles ?? ['style.css'];
$jsFiles = $jsFiles ?? ['app.js'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="Services de développement web proposés par Edem Claude KUMAZA">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?= Asset::css(array_merge($cssFiles, ['hamburger.css', 'footer.css'])) ?>
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
        <section class="services-hero">
            <div class="container">
                <div class="hero-content" style="text-align: center;">
                    <h1 class="fade-in-up delay-1">Mes Services</h1>
                    <p class="hero-description fade-in-up delay-2">
                        Des solutions web sur mesure pour concrétiser vos projets digitaux
                    </p>
                </div>
            </div>
        </section>

        <!-- Services List -->
        <section class="services-list">
            <div class="container">
                <div class="services-grid">
                    <div class="card service-card fade-in-up delay-1">
                        <div class="card-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>Développement Web</h3>
                        <p>Sites et applications web modernes, performants et sur mesure.</p>
                    </div>

                    <div class="card service-card fade-in-up delay-2">
                        <div class="card-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h3>UI/UX Design</h3>
                        <p>Interfaces utilisateur intuitives et esthétiques.</p>
                    </div>

                    <div class="card service-card fade-in-up delay-3">
                        <div class="card-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3>Optimisation</h3>
                        <p>Performance, SEO et vitesse de chargement optimisés.</p>
                    </div>

                    <div class="card service-card fade-in-up delay-4">
                        <div class="card-icon">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <h3>Maintenance</h3>
                        <p>Suivi, mises à jour et support technique continu.</p>
                    </div>

                    <div class="card service-card fade-in-up delay-5">
                        <div class="card-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile</h3>
                        <p>Applications mobiles et Progressive Web Apps.</p>
                    </div>

                    <div class="card service-card fade-in-up delay-6">
                        <div class="card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Formation</h3>
                        <p>Accompagnement et formation aux technologies web.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="process-section">
            <div class="container">
                <h2 class="section-title">Mon Processus de Travail</h2>
                <p style="text-align: center; max-width: 700px; margin: 0 auto var(--spacing-lg);">
                    Une méthode éprouvée en 5 étapes pour garantir la réussite de votre projet
                </p>
                
                <div class="process-timeline">
                    <div class="process-step fade-in-up delay-1">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h3>Analyse & Découverte</h3>
                            <p>Échange sur vos besoins, objectifs et contraintes. Définition du cahier des charges et étude de faisabilité.</p>
                        </div>
                    </div>

                    <div class="process-step fade-in-up delay-2">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-pencil-ruler"></i>
                            </div>
                            <h3>Conception & Design</h3>
                            <p>Création des maquettes UI/UX, architecture technique et prototype interactif pour validation.</p>
                        </div>
                    </div>

                    <div class="process-step fade-in-up delay-3">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3>Développement</h3>
                            <p>Codage de votre projet avec les meilleures pratiques. Points réguliers et livraisons itératives.</p>
                        </div>
                    </div>

                    <div class="process-step fade-in-up delay-4">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-check-double"></i>
                            </div>
                            <h3>Tests & Validation</h3>
                            <p>Tests complets (fonctionnels, performance, sécurité) et corrections avant mise en ligne.</p>
                        </div>
                    </div>

                    <div class="process-step fade-in-up delay-5">
                        <div class="step-number">5</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h3>Déploiement & Suivi</h3>
                            <p>Mise en production, formation et accompagnement. Maintenance et support post-lancement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="services-cta">
            <div class="container">
                <h2 class="section-title">Prêt à démarrer votre projet ?</h2>
                <p>Discutons de vos besoins et trouvons la meilleure solution ensemble.</p>
                <a href="/contact" class="btn btn-primary btn-shine">Me contacter</a>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/components/footer.php'; ?>
    
    <?= Asset::js(array_merge($jsFiles, ['hamburger.js'])) ?>
</body>
</html>
