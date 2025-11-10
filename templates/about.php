<?php
use App\Core\Asset;
$pageTitle = $pageTitle ?? 'À propos';
$cssFiles = $cssFiles ?? ['style.css'];
$jsFiles = $jsFiles ?? ['app.js'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="Découvrez le parcours et les valeurs d'Edem Claude KUMAZA, développeur web passionné">
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
        <section class="about-hero">
            <div class="container">
                <div class="about-hero-content">
                    <div class="about-hero-text fade-in-left">
                        <p class="subtitle">Développeur Web Passionné</p>
                        <h1>Edem Claude KUMAZA</h1>
                        <p class="hero-description">
                            Je transforme des idées en expériences digitales exceptionnelles. 
                            Avec une approche centrée sur l'utilisateur et une passion pour le code propre, 
                            je crée des solutions web modernes et performantes.
                        </p>
                        <div class="hero-buttons" style="margin-top: var(--spacing-md);">
                            <div class="cta-buttons">
                                <a href="/portfolio" class="btn btn-primary btn-shine">Voir mes réalisations</a>
                                <a href="/contact" class="btn btn-outline">Me contacter</a>
                            </div>
                        </div>
                    </div>
                    <div class="about-hero-image fade-in-right">
                        <div class="about-profile scale-in delay-2">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Story Section -->
        <section class="about-story">
            <div class="container">
                <div class="story-content">
                    <h2 class="section-title">Mon Histoire</h2>
                    <div class="story-text">
                        <p class="fade-in-up delay-1">
                            Passionné par la technologie depuis mon plus jeune âge, j'ai découvert le développement web 
                            et ai immédiatement été captivé par la possibilité de créer des expériences interactives 
                            qui touchent des millions d'utilisateurs à travers le monde.
                        </p>
                        <p class="fade-in-up delay-2">
                            Au fil des années, j'ai développé une expertise solide en développement full-stack, 
                            maîtrisant aussi bien les technologies front-end (HTML, CSS, JavaScript, React, Vue.js) 
                            que back-end (PHP, Node.js, bases de données). Cette polyvalence me permet d'avoir 
                            une vision globale des projets et de proposer des solutions complètes et optimisées.
                        </p>
                        <p class="fade-in-up delay-3">
                            Mon approche se concentre sur la création d'applications performantes, accessibles 
                            et maintenables. Je crois fermement que la qualité du code et l'expérience utilisateur 
                            sont les piliers d'un projet web réussi. Chaque ligne de code que j'écris est pensée 
                            pour être claire, efficace et évolutive.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="about-stats">
            <div class="container">
                <h2 class="section-title">En Quelques Chiffres</h2>
                <div class="stats-grid">
                    <div class="stat-card card fade-in-up delay-1">
                        <span class="stat-number counter" data-target="50">0</span>
                        <span class="stat-label">Projets Réalisés</span>
                    </div>
                    <div class="stat-card card fade-in-up delay-2">
                        <span class="stat-number counter" data-target="5">0</span>
                        <span class="stat-label">Années d'Expérience</span>
                    </div>
                    <div class="stat-card card fade-in-up delay-3">
                        <span class="stat-number counter" data-target="30">0</span>
                        <span class="stat-label">Clients Satisfaits</span>
                    </div>
                    <div class="stat-card card fade-in-up delay-4">
                        <span class="stat-number counter" data-target="100">0</span>
                        <span class="stat-label">% Satisfaction</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="about-values">
            <div class="container">
                <h2 class="section-title">Mes Valeurs</h2>
                <div class="values-grid">
                    <div class="card value-card fade-in-up delay-1">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>Innovation</h3>
                        <p>Toujours à l'affût des dernières technologies pour proposer des solutions modernes et performantes</p>
                    </div>
                    <div class="card value-card fade-in-up delay-2">
                        <div class="value-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Qualité</h3>
                        <p>Code propre, maintenable et testé. La qualité n'est pas négociable</p>
                    </div>
                    <div class="card value-card fade-in-up delay-3">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Collaboration</h3>
                        <p>Travail d'équipe et communication transparente pour des projets réussis</p>
                    </div>
                    <div class="card value-card fade-in-up delay-4">
                        <div class="value-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3>Apprentissage</h3>
                        <p>Formation continue et veille technologique constante pour rester à la pointe</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline Section -->
        <section class="about-timeline">
            <div class="container">
                <h2 class="section-title">Mon Parcours</h2>
                <div class="timeline">
                    <div class="timeline-item fade-in-up delay-1">
                        <div class="timeline-content">
                            <h3>Développeur Full Stack Senior</h3>
                            <h4>Freelance</h4>
                            <p>Accompagnement de clients sur des projets web variés, du site vitrine à l'application métier complexe</p>
                        </div>
                        <div class="timeline-year">2023</div>
                    </div>

                    <div class="timeline-item fade-in-up delay-2">
                        <div class="timeline-content">
                            <h3>Lead Developer</h3>
                            <h4>Tech Company</h4>
                            <p>Direction technique d'une équipe de 5 développeurs, architecture de solutions scalables</p>
                        </div>
                        <div class="timeline-year">2021</div>
                    </div>

                    <div class="timeline-item fade-in-up delay-3">
                        <div class="timeline-content">
                            <h3>Développeur Full Stack</h3>
                            <h4>Digital Agency</h4>
                            <p>Développement de sites web et applications pour des clients variés (PME, startups)</p>
                        </div>
                        <div class="timeline-year">2019</div>
                    </div>

                    <div class="timeline-item fade-in-up delay-4">
                        <div class="timeline-content">
                            <h3>Développeur Junior</h3>
                            <h4>Première Expérience</h4>
                            <p>Apprentissage des fondamentaux et premiers projets professionnels</p>
                        </div>
                        <div class="timeline-year">2018</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="about-cta">
            <div class="container">
                <h2 class="section-title">Travaillons Ensemble</h2>
                <p class="hero-description">Vous avez un projet en tête ? Discutons-en !</p>
                <div class="cta-buttons">
                    <a href="/contact" class="btn btn-primary btn-shine">Me contacter</a>
                    <a href="/services" class="btn btn-outline">Voir mes services</a>
                </div>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/components/footer.php'; ?>
    
    <?= Asset::js(array_merge($jsFiles, ['hamburger.js'])) ?>
</body>
</html>
