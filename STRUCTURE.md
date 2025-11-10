# Structure du Projet Portfolio

## Arborescence complète

```
edemclaude/
│
├── public/                          # Document Root (accessible via HTTP)
│   ├── index.php                    # Front Controller
│   ├── .htaccess                    # Réécriture d'URL Apache
│   └── assets/                      # ✅ Ressources statiques (PUBLIC)
│       ├── css/
│       │   ├── style.css            # CSS global
│       │   ├── animations.css       # Bibliothèque d'animations
│       │   ├── README.md            # Documentation CSS
│       │   └── pages/
│       │       └── home.css         # CSS page d'accueil
│       ├── js/
│       │   ├── app.js               # Script principal
│       │   └── animations.js        # Effets JavaScript
│       └── img/
│           └── .gitkeep
│
├── src/                             # Code source PHP (NON accessible via HTTP)
│   ├── Controllers/
│   │   └── HomeController.php       # Contrôleur page d'accueil
│   ├── Core/
│   │   ├── Env.php                  # Gestion variables d'environnement
│   │   └── Asset.php                # Helper chargement assets dynamique
│   └── Http/
│       └── Router.php               # Routeur HTTP
│
├── templates/                       # Templates PHP
│   └── home.php                     # Template page d'accueil
│
├── config/                          # Configuration
│   └── app.php                      # Config application
│
├── vendor/                          # Dépendances Composer (auto-généré)
│   └── autoload.php                 # Autoloader
│
├── .htaccess                        # Redirection vers public/
├── .gitignore                       # Fichiers ignorés par Git
├── .env                             # Variables d'environnement (NON versionné)
├── .env.example                     # Exemple de variables
├── composer.json                    # Configuration Composer
├── README.md                        # Documentation principale
├── ANIMATIONS.md                    # Documentation animations
├── VHOST_SETUP.md                   # Setup virtual host
└── STRUCTURE.md                     # Ce fichier
```

## Flux de requête

1. **Requête HTTP** → `http://edemclaude.test/`
2. **Serveur** → Document Root = `public/`
3. **`.htaccess`** (racine) → Redirige vers `public/`
4. **`public/.htaccess`** → Redirige vers `index.php`
5. **`public/index.php`** → Front Controller
   - Charge autoloader Composer
   - Initialise environnement (.env)
   - Configure application
   - Initialise routeur
   - Dispatche vers contrôleur
6. **Contrôleur** → `HomeController::index()`
   - Prépare les données
   - Définit les assets à charger
   - Rendu du template
7. **Template** → `templates/home.php`
   - Utilise `Asset::css()` et `Asset::js()`
   - Génère HTML avec versioning automatique
8. **Réponse HTML** → Envoyée au navigateur

## Assets - Chargement dynamique

### Dans le contrôleur
```php
public function index(): string
{
    $data = [
        'pageTitle' => 'Mon Portfolio',
        'cssFiles' => ['style.css', 'pages/home.css', 'animations.css'],
        'jsFiles' => ['animations.js', 'app.js']
    ];
    
    return $this->render('home', $data);
}
```

### Dans le template
```php
<?php use App\Core\Asset; ?>

<!-- Dans <head> -->
<?= Asset::css($cssFiles) ?>

<!-- Avant </body> -->
<?= Asset::js($jsFiles) ?>
```

### Résultat généré
```html
<link rel="stylesheet" href="/assets/css/style.css?v=1699999999">
<link rel="stylesheet" href="/assets/css/pages/home.css?v=1699999998">
<link rel="stylesheet" href="/assets/css/animations.css?v=1699999997">

<script src="/assets/js/animations.js?v=1699999996" defer></script>
<script src="/assets/js/app.js?v=1699999995" defer></script>
```

## Sécurité

### ✅ Fichiers protégés (hors de public/)
- Code PHP source (`src/`, `templates/`, `config/`)
- Variables d'environnement (`.env`)
- Configuration Composer
- Dépendances (`vendor/`)

### ✅ Fichiers accessibles (dans public/)
- Front controller (`index.php`)
- Assets statiques (CSS, JS, images)
- `.htaccess` pour réécriture

### ✅ .gitignore
- `.env` (secrets)
- `vendor/` (régénérable)
- `public/assets/img/*` (uploads)
- Fichiers IDE

## Avantages de cette structure

1. **Sécurité** - Code source inaccessible via HTTP
2. **Performance** - Cache busting automatique avec versioning
3. **Maintenabilité** - Séparation claire des responsabilités
4. **Évolutivité** - Facile d'ajouter de nouvelles pages/assets
5. **Standards** - Suit les bonnes pratiques PHP modernes
