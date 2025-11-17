 <?php
use App\Core\Asset;
use App\Core\Translator;
$pageTitle = $pageTitle ?? 'Contact';
$cssFiles = $cssFiles ?? ['style.css'];
$jsFiles = $jsFiles ?? ['app.js'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="Contactez Edem Claude KUMAZA pour vos projets web">
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
        <section class="contact-hero">
            <div class="container">
                <div class="hero-content" style="text-align: center;">
                    <h1 class="fade-in-up delay-1">
                        <?= Translator::trans('contact.title') ?>
                    </h1>
                    <p class="hero-description fade-in-up delay-2">
                        <?= Translator::trans('contact.subtitle') ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section">
            <div class="container">
                <div class="contact-wrapper">
                    <!-- Informations de contact -->
                    <div class="contact-info-card card fade-in-left">
                        <h3 style="margin-bottom: var(--spacing-md);">
                            <?= Translator::trans('contact.info.title') ?>
                        </h3>
                        
                        <div class="contact-info-list">
                            <a href="mailto:edemclaudek@gmail.com" class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h4>Email</h4>
                                    <p>edemclaudek@gmail.com</p>
                                </div>
                            </a>
                            
                            <a href="tel:+221778433293" class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h4>Téléphone</h4>
                                    <p>+221 77 843 32 93</p>
                                </div>
                            </a>
                            
                            <div class="contact-info-item" style="cursor: default;">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h4>Localisation</h4>
                                    <p>Dakar, Sénégal</p>
                                </div>
                            </div>
                            
                            <div class="contact-info-item" style="cursor: default;">
                                <div class="contact-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h4>Disponibilité</h4>
                                    <p>Lun - Ven, 8h - 19h</p>
                                </div>
                            </div>
                        </div>
                        
                        <h4 style="margin-top: var(--spacing-md); margin-bottom: var(--spacing-sm);">Réseaux sociaux</h4>
                        <div class="social-links">
                            <a href="https://github.com/edemclaude" target="_blank" class="social-link" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://linkedin.com" target="_blank" class="social-link" title="LinkedIn">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="https://twitter.com" target="_blank" class="social-link" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Formulaire de contact -->
                    <div class="contact-form fade-in-right">
                        <h3 style="margin-bottom: var(--spacing-md);">
                            <?= Translator::trans('contact.form.title') ?>
                        </h3>
                        
                        <div id="formMessage" class="form-message"></div>
                        
                        <form id="contactForm" method="POST">
                            <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">
                            <div class="form-group">
                                <label for="name"><?= Translator::trans('contact.form.name') ?></label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    required 
                                    placeholder="<?= Translator::trans('contact.form.placeholder.name') ?>"
                                >
                            </div>
                            
                            <div class="form-group">
                                <label for="email"><?= Translator::trans('contact.form.email') ?></label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    required 
                                    placeholder="<?= Translator::trans('contact.form.placeholder.email') ?>"
                                >
                            </div>
                            
                            <div class="form-group">
                                <label for="subject"><?= Translator::trans('contact.form.subject') ?></label>
                                <input 
                                    type="text" 
                                    id="subject" 
                                    name="subject" 
                                    placeholder="<?= Translator::trans('contact.form.placeholder.subject') ?>"
                                >
                            </div>
                            
                            <div class="form-group">
                                <label for="message"><?= Translator::trans('contact.form.message') ?></label>
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    required 
                                    placeholder="<?= Translator::trans('contact.form.placeholder.message') ?>"
                                ></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-shine form-submit">
                                <?= Translator::trans('contact.form.submit') ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/components/footer.php'; ?>
    
    <?= Asset::js(array_merge($jsFiles, ['hamburger.js'])) ?>
</body>
</html>
