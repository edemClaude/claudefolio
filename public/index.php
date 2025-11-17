<?php
/**
 * Point d'entrée principal de l'application
 * 
 * Ce fichier est le front controller qui gère toutes les requêtes HTTP.
 * Il initialise l'autoloader Composer, charge les variables d'environnement,
 * configure les routes et dispatch les requêtes vers les contrôleurs appropriés.
 * 
 * @package    Portfolio Edem Claude KUMAZA
 * @author     Edem Claude KUMAZA
 * @version    1.0.0
 * @link       http://localhost/edemclaude/
 */

declare(strict_types=1);

// Définition du chemin racine du projet
$root = dirname(__DIR__);

// ========== AUTOLOAD ==========
// Chargement automatique des classes via Composer
require $root . '/vendor/autoload.php';

// ========== SESSION ==========
// Démarrage de la session pour la gestion des tokens CSRF et autres données utilisateur
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ========== ENVIRONNEMENT ==========
// Chargement des variables d'environnement depuis le fichier .env
App\Core\Env::load($root . '/.env');

// ========== CONFIGURATION ==========
// Chargement de la configuration de l'application
$config = require $root . '/config/app.php';

// ========== LANGUE / TRADUCTION ==========
// Détermination de la langue courante (fr / en) via paramètre ?lang= et session
$locale = $_GET['lang'] ?? ($_SESSION['locale'] ?? 'fr');
if (!in_array($locale, ['fr', 'en'], true)) {
    $locale = 'fr';
}

$_SESSION['locale'] = $locale;
\App\Core\Translator::setLocale($locale);

// ========== ASSETS ==========
// Initialisation du helper de gestion des assets (CSS/JS)
App\Core\Asset::setBasePath('');

// ========== ROUTEUR ==========
// Création de l'instance du routeur
$router = new App\Http\Router();

// ========== DÉFINITION DES ROUTES ==========
// Routes GET - Pages publiques
$router->get('/', [App\Controllers\HomeController::class, 'index']);
$router->get('/about', [App\Controllers\AboutController::class, 'index']);
$router->get('/services', [App\Controllers\ServicesController::class, 'index']);
$router->get('/portfolio', [App\Controllers\PortfolioController::class, 'index']);
$router->get('/contact', [App\Controllers\ContactController::class, 'index']);

// Routes POST - Traitement des formulaires
$router->post('/contact/submit', [App\Controllers\ContactController::class, 'submit']);

// ========== DISPATCH ==========
// Récupération de la méthode HTTP et de l'URI
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

// Nettoyage de l'URI pour gérer les sous-dossiers
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
if ($scriptName !== '/' && str_starts_with($uri, $scriptName)) {
    $uri = substr($uri, strlen($scriptName)) ?: '/';
}

// Mode debug - Affichage des informations de requête en commentaire HTML
if ($config['debug']) {
    echo "<!-- DEBUG: Method=$method, URI=$uri, Script=$scriptName -->\n";
}

// Dispatch de la requête vers le bon contrôleur
echo $router->dispatch($method, $uri);
