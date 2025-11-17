<?php
use App\Core\Asset;
use App\Core\Translator;
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
    <!-- Favicon -->
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
        <section class="about-hero">
            <div class="container">
                <div class="about-hero-content">
                    <div class="about-hero-text fade-in-left">
                        <p class="subtitle"><?= Translator::trans('about.hero.subtitle') ?></p>
                        <h1>Edem Claude KUMAZA</h1>
                        <p class="hero-description">
                            <?= Translator::trans('about.hero.description') ?>
                        </p>
                        <div class="hero-buttons" style="margin-top: var(--spacing-md);">
                            <div class="cta-buttons">
                                <a href="/portfolio" class="btn btn-primary btn-shine">
                                    <?= Translator::trans('about.hero.cta.portfolio') ?>
                                </a>
                                <a href="/contact" class="btn btn-outline">
                                    <?= Translator::trans('about.hero.cta.contact') ?>
                                </a>
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
                    <h2 class="section-title"><?= Translator::trans('about.story.title') ?></h2>
                    <div class="story-text">
                        <p class="fade-in-up delay-1">
                            <?= Translator::trans("about.story.p1") ?>
                        </p>
                        <p class="fade-in-up delay-2">
                            <?= Translator::trans("about.story.p2") ?>
                        </p>
                        <p class="fade-in-up delay-3">
                            <?= Translator::trans("about.story.p3") ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="about-stats">
            <div class="container">
                <h2 class="section-title"><?= Translator::trans('about.stats.title') ?></h2>
                <div class="stats-grid">
                    <div class="stat-card card fade-in-up delay-1">
                        <span class="stat-number counter" data-target="50">0</span>
                        <span class="stat-label"><?= Translator::trans('about.stats.projects') ?></span>
                    </div>
                    <div class="stat-card card fade-in-up delay-2">
                        <span class="stat-number counter" data-target="5">0</span>
                        <span class="stat-label"><?= Translator::trans('about.stats.years') ?></span>
                    </div>
                    <div class="stat-card card fade-in-up delay-3">
                        <span class="stat-number counter" data-target="30">0</span>
                        <span class="stat-label"><?= Translator::trans('about.stats.clients') ?></span>
                    </div>
                    <div class="stat-card card fade-in-up delay-4">
                        <span class="stat-number counter" data-target="100">0</span>
                        <span class="stat-label"><?= Translator::trans('about.stats.satisfaction') ?></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="about-values">
            <div class="container">
                <h2 class="section-title"><?= Translator::trans('about.values.title') ?></h2>
                <div class="values-grid">
                    <div class="card value-card fade-in-up delay-1">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3><?= Translator::trans('about.values.innovation.title') ?></h3>
                        <p><?= Translator::trans('about.values.innovation.text') ?></p>
                    </div>
                    <div class="card value-card fade-in-up delay-2">
                        <div class="value-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3><?= Translator::trans('about.values.quality.title') ?></h3>
                        <p><?= Translator::trans('about.values.quality.text') ?></p>
                    </div>
                    <div class="card value-card fade-in-up delay-3">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3><?= Translator::trans('about.values.collaboration.title') ?></h3>
                        <p><?= Translator::trans('about.values.collaboration.text') ?></p>
                    </div>
                    <div class="card value-card fade-in-up delay-4">
                        <div class="value-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3><?= Translator::trans('about.values.learning.title') ?></h3>
                        <p><?= Translator::trans('about.values.learning.text') ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline Section -->
        <section class="about-timeline">
            <div class="container">
                <h2 class="section-title"><?= Translator::trans('about.timeline.title') ?></h2>
                <div class="timeline">
                    <div class="timeline-item fade-in-up delay-1">
                        <div class="timeline-content">
                            <h3><?= Translator::trans('about.timeline.1.title') ?></h3>
                            <h4><?= Translator::trans('about.timeline.1.company') ?></h4>
                            <p><?= Translator::trans('about.timeline.1.text') ?></p>
                        </div>
                        <div class="timeline-year"><?= Translator::trans('about.timeline.1.year') ?></div>
                    </div>

                    <div class="timeline-item fade-in-up delay-2">
                        <div class="timeline-content">
                            <h3><?= Translator::trans('about.timeline.2.title') ?></h3>
                            <h4><?= Translator::trans('about.timeline.2.company') ?></h4>
                            <p><?= Translator::trans('about.timeline.2.text') ?></p>
                        </div>
                        <div class="timeline-year"><?= Translator::trans('about.timeline.2.year') ?></div>
                    </div>

                    <div class="timeline-item fade-in-up delay-3">
                        <div class="timeline-content">
                            <h3><?= Translator::trans('about.timeline.3.title') ?></h3>
                            <h4><?= Translator::trans('about.timeline.3.company') ?></h4>
                            <p><?= Translator::trans('about.timeline.3.text') ?></p>
                        </div>
                        <div class="timeline-year"><?= Translator::trans('about.timeline.3.year') ?></div>
                    </div>

                    <div class="timeline-item fade-in-up delay-4">
                        <div class="timeline-content">
                            <h3><?= Translator::trans('about.timeline.4.title') ?></h3>
                            <h4><?= Translator::trans('about.timeline.4.company') ?></h4>
                            <p><?= Translator::trans('about.timeline.4.text') ?></p>
                        </div>
                        <div class="timeline-year"><?= Translator::trans('about.timeline.4.year') ?></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="about-cta">
            <div class="container">
                <h2 class="section-title"><?= Translator::trans('about.cta.title') ?></h2>
                <p class="hero-description"><?= Translator::trans('about.cta.text') ?></p>
                <div class="cta-buttons">
                    <a href="/contact" class="btn btn-primary btn-shine">
                        <?= Translator::trans('about.cta.contact') ?>
                    </a>
                    <a href="/services" class="btn btn-outline">
                        <?= Translator::trans('about.cta.services') ?>
                    </a>
                </div>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/components/footer.php'; ?>
    
    <?= Asset::js(array_merge($jsFiles, ['hamburger.js'])) ?>
</body>
</html>
