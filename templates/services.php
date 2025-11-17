<?php
use App\Core\Asset;
use App\Core\Translator;
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
        <section class="services-hero">
            <div class="container">
                <div class="hero-content" style="text-align: center;">
                    <h1 class="fade-in-up delay-1">
                        <?= Translator::trans('services.title') ?>
                    </h1>
                    <p class="hero-description fade-in-up delay-2">
                        <?= Translator::trans('services.subtitle') ?>
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
                        <h3><?= Translator::trans('services.card.1.title') ?></h3>
                        <p><?= Translator::trans('services.card.1.text') ?></p>
                    </div>

                    <div class="card service-card fade-in-up delay-2">
                        <div class="card-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h3><?= Translator::trans('services.card.2.title') ?></h3>
                        <p><?= Translator::trans('services.card.2.text') ?></p>
                    </div>

                    <div class="card service-card fade-in-up delay-3">
                        <div class="card-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3><?= Translator::trans('services.card.3.title') ?></h3>
                        <p><?= Translator::trans('services.card.3.text') ?></p>
                    </div>

                    <div class="card service-card fade-in-up delay-4">
                        <div class="card-icon">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <h3><?= Translator::trans('services.card.4.title') ?></h3>
                        <p><?= Translator::trans('services.card.4.text') ?></p>
                    </div>

                    <div class="card service-card fade-in-up delay-5">
                        <div class="card-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3><?= Translator::trans('services.card.5.title') ?></h3>
                        <p><?= Translator::trans('services.card.5.text') ?></p>
                    </div>

                    <div class="card service-card fade-in-up delay-6">
                        <div class="card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3><?= Translator::trans('services.card.6.title') ?></h3>
                        <p><?= Translator::trans('services.card.6.text') ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="process-section">
            <div class="container">
                <h2 class="section-title"><?= Translator::trans('services.process.title') ?></h2>
                <p style="text-align: center; max-width: 700px; margin: 0 auto var(--spacing-lg);">
                    <?= Translator::trans('services.process.subtitle') ?>
                </p>
                
                <div class="process-timeline">
                    <div class="process-step fade-in-up delay-1">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h3><?= Translator::trans('services.process.step1.title') ?></h3>
                            <p><?= Translator::trans('services.process.step1.text') ?></p>
                        </div>
                    </div>

                    <div class="process-step fade-in-up delay-2">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-pencil-ruler"></i>
                            </div>
                            <h3><?= Translator::trans('services.process.step2.title') ?></h3>
                            <p><?= Translator::trans('services.process.step2.text') ?></p>
                        </div>
                    </div>

                    <div class="process-step fade-in-up delay-3">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3><?= Translator::trans('services.process.step3.title') ?></h3>
                            <p><?= Translator::trans('services.process.step3.text') ?></p>
                        </div>
                    </div>

                    <div class="process-step fade-in-up delay-4">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-check-double"></i>
                            </div>
                            <h3><?= Translator::trans('services.process.step4.title') ?></h3>
                            <p><?= Translator::trans('services.process.step4.text') ?></p>
                        </div>
                    </div>

                    <div class="process-step fade-in-up delay-5">
                        <div class="step-number">5</div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h3><?= Translator::trans('services.process.step5.title') ?></h3>
                            <p><?= Translator::trans('services.process.step5.text') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="services-cta" style="background: var(--bg-main);">
            <div class="container">
                <h2 class="section-title"><?= Translator::trans('services.cta.title') ?></h2>
                <p><?= Translator::trans('services.cta.subtitle') ?></p>
                <a href="/contact" class="btn btn-primary btn-shine">
                    <?= Translator::trans('services.cta.button') ?>
                </a>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/components/footer.php'; ?>
    
    <?= Asset::js(array_merge($jsFiles, ['hamburger.js'])) ?>
</body>
</html>
