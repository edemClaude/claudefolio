<?php
use App\Core\Asset;
use App\Core\Translator;
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
    <meta name="description" content="Découvrez mes réalisations et projets web">
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
        <section class="portfolio-hero">
            <div class="container">
                <div class="hero-content" style="text-align: center;">
                    <h1 class="fade-in-up delay-1">
                        <?= Translator::trans('portfolio.title') ?>
                    </h1>
                    <p class="hero-description fade-in-up delay-2">
                        <?= Translator::trans('portfolio.subtitle') ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section class="portfolio-section">
            <div class="container">
                <!-- Filters -->
                <div class="portfolio-filters">
                    <button class="filter-btn active" data-filter="all">
                        <?= Translator::trans('portfolio.filter.all') ?>
                    </button>
                    <button class="filter-btn" data-filter="web">
                        <?= Translator::trans('portfolio.filter.web') ?>
                    </button>
                    <button class="filter-btn" data-filter="app">
                        <?= Translator::trans('portfolio.filter.app') ?>
                    </button>
                    <button class="filter-btn" data-filter="ecommerce">
                        <?= Translator::trans('portfolio.filter.ecommerce') ?>
                    </button>
                </div>

                <!-- Portfolio Grid -->
                <div class="portfolio-grid">
                    <!-- Projet 1 -->
                    <div class="card portfolio-item fade-in-up" data-category="web">
                        <div class="portfolio-image">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="portfolio-content">
                            <h3><?= Translator::trans('portfolio.project.1.title') ?></h3>
                            <p><?= Translator::trans('portfolio.project.1.text') ?></p>
                            <div class="portfolio-tags">
                                <span class="portfolio-tag">HTML/CSS</span>
                                <span class="portfolio-tag">PHP</span>
                                <span class="portfolio-tag">JavaScript</span>
                            </div>
                        </div>
                        <a href="#" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a>
                    </div>

                    <!-- Projet 2 -->
                    <div class="card portfolio-item fade-in-up delay-1" data-category="ecommerce">
                        <div class="portfolio-image">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="portfolio-content">
                            <h3><?= Translator::trans('portfolio.project.2.title') ?></h3>
                            <p><?= Translator::trans('portfolio.project.2.text') ?></p>
                            <div class="portfolio-tags">
                                <span class="portfolio-tag">PHP</span>
                                <span class="portfolio-tag">MySQL</span>
                                <span class="portfolio-tag">Stripe</span>
                            </div>
                        </div>
                        <a href="#" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a>
                    </div>

                    <!-- Projet 3 -->
                    <div class="card portfolio-item fade-in-up delay-2" data-category="app">
                        <div class="portfolio-image">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="portfolio-content">
                            <h3><?= Translator::trans('portfolio.project.3.title') ?></h3>
                            <p><?= Translator::trans('portfolio.project.3.text') ?></p>
                            <div class="portfolio-tags">
                                <span class="portfolio-tag">React</span>
                                <span class="portfolio-tag">Node.js</span>
                                <span class="portfolio-tag">MongoDB</span>
                            </div>
                        </div>
                        <a href="#" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a>
                    </div>

                    <!-- Projet 4 -->
                    <div class="card portfolio-item fade-in-up delay-3" data-category="web">
                        <div class="portfolio-image">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="portfolio-content">
                            <h3><?= Translator::trans('portfolio.project.4.title') ?></h3>
                            <p><?= Translator::trans('portfolio.project.4.text') ?></p>
                            <div class="portfolio-tags">
                                <span class="portfolio-tag">Vue.js</span>
                                <span class="portfolio-tag">GSAP</span>
                                <span class="portfolio-tag">WebGL</span>
                            </div>
                        </div>
                        <a href="#" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a>
                    </div>

                    <!-- Projet 5 -->
                    <div class="card portfolio-item fade-in-up delay-4" data-category="app">
                        <div class="portfolio-image">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="portfolio-content">
                            <h3><?= Translator::trans('portfolio.project.5.title') ?></h3>
                            <p><?= Translator::trans('portfolio.project.5.text') ?></p>
                            <div class="portfolio-tags">
                                <span class="portfolio-tag">React</span>
                                <span class="portfolio-tag">Chart.js</span>
                                <span class="portfolio-tag">API REST</span>
                            </div>
                        </div>
                        <a href="#" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a>
                    </div>

                    <!-- Projet 6 -->
                    <div class="card portfolio-item fade-in-up delay-5" data-category="web">
                        <div class="portfolio-image">
                            <i class="fas fa-blog"></i>
                        </div>
                        <div class="portfolio-content">
                            <h3><?= Translator::trans('portfolio.project.6.title') ?></h3>
                            <p><?= Translator::trans('portfolio.project.6.text') ?></p>
                            <div class="portfolio-tags">
                                <span class="portfolio-tag">PHP</span>
                                <span class="portfolio-tag">Laravel</span>
                                <span class="portfolio-tag">MySQL</span>
                            </div>
                        </div>
                        <a href="#" class="portfolio-link"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/components/footer.php'; ?>
    
    <?= Asset::js(array_merge($jsFiles, ['hamburger.js'])) ?>
    <script>
        // Filtres portfolio
        const filterBtns = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Activer le bouton
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                const filter = btn.getAttribute('data-filter');
                
                // Filtrer les items
                portfolioItems.forEach((item, index) => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        item.style.animationDelay = `${index * 0.1}s`;
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
