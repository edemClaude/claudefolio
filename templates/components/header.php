<?php
/**
 * Composant Header - Navigation principale du site
 * 
 * Ce composant affiche la navigation avec logo, menu hamburger et liens.
 * Il gère également la détection de la page active.
 * 
 * @package Templates\Components
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */

use App\Core\Asset;
use App\Core\Translator;

// Détection du chemin actuel pour le highlighting des liens
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
if ($scriptName !== '/' && str_starts_with($currentPath, $scriptName)) {
    $currentPath = substr($currentPath, strlen($scriptName)) ?: '/';
}

/**
 * Vérifie si un lien de navigation est actif
 * 
 * @param string $path Chemin de la route à vérifier
 * @param string $currentPath Chemin actuel de la page
 * @return string Attribut class="active" si le chemin correspond, sinon chaîne vide
 */
if (!function_exists('isActive')) {
    function isActive($path, $currentPath) {
        return $currentPath === $path ? 'class="active"' : '';
    }
}
?>
<!-- Navigation -->
<header>
    <nav class="container">
        <a href="/" class="logo">edem<span>Claude</span>K.</a>
        
        <button class="hamburger" aria-label="Menu">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
        
        <ul class="nav-links">
            <li><a href="/" <?= isActive('/', $currentPath) ?>><?= Translator::trans('nav.home') ?></a></li>
            <li><a href="/about" <?= isActive('/about', $currentPath) ?>><?= Translator::trans('nav.about') ?></a></li>
            <li><a href="/services" <?= isActive('/services', $currentPath) ?>><?= Translator::trans('nav.services') ?></a></li>
            <li><a href="/portfolio" <?= isActive('/portfolio', $currentPath) ?>><?= Translator::trans('nav.portfolio') ?></a></li>
            <li><a href="/contact" <?= isActive('/contact', $currentPath) ?>><?= Translator::trans('nav.contact') ?></a></li>
            <li class="nav-lang-switch">
                <a href="<?= $currentPath ?>?lang=fr" <?= Translator::getLocale() === 'fr' ? 'class="active"' : '' ?>>FR</a>
                |
                <a href="<?= $currentPath ?>?lang=en" <?= Translator::getLocale() === 'en' ? 'class="active"' : '' ?>>EN</a>
            </li>
        </ul>
    </nav>
    <div class="nav-overlay"></div>
</header>
