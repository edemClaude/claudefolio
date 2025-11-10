# Portfolio - Site Personnel

Projet PHP pour portfolio personnel.

## Structure

```
edemclaude/
├── public/           # Point d'entrée web (Document Root)
│   ├── index.php    # Front controller
│   ├── .htaccess    # Réécriture d'URL
│   └── assets/      # Ressources statiques (CSS, JS, images)
│       ├── css/
│       ├── js/
│       └── img/
├── src/             # Code source
│   ├── Controllers/ # Contrôleurs
│   ├── Core/        # Classes système (Env, Asset, etc.)
│   └── Http/        # Routeur HTTP
├── templates/       # Templates PHP
├── config/          # Configuration
│   └── app.php
└── .env.example     # Variables d'environnement (exemple)
```

## Installation

1. **Copier `.env.example` vers `.env`**
   ```bash
   copy .env.example .env
   ```

2. **Configurer le virtual host** pour pointer vers `public/`

3. **Accéder au site**
   - URL: `http://localhost` ou `http://edemclaude.test`

## Développement

- **Routeur**: `src/Http/Router.php`
- **Contrôleurs**: `src/Controllers/`
- **Templates**: `templates/`
- **Assets**: `public/assets/css/`, `public/assets/js/`, `public/assets/img/`
- **Helper Asset**: `src/Core/Asset.php` - Gestion dynamique des assets

## Routes

- `GET /` → Page d'accueil (HomeController::index)
- `GET /about` → À propos (AboutController::index)
- `GET /services` → Services (ServicesController::index)
- `GET /portfolio` → Portfolio (PortfolioController::index)
- `GET /contact` → Formulaire contact (ContactController::index)
- `POST /contact/submit` → Soumission formulaire (ContactController::submit)

## Fonctionnalités

### Architecture
- ✅ Routeur HTTP personnalisé (GET/POST)
- ✅ Architecture MVC propre
- ✅ Chargement dynamique des assets avec versioning
- ✅ Composants réutilisables (header)
- ✅ Gestion des variables d'environnement (.env)

### Design & UI
- ✅ Thème sombre moderne (bleu foncé)
- ✅ Menu hamburger responsive (mobile)
- ✅ Navigation avec highlight du lien actif
- ✅ Design moderne et professionnel
- ✅ Responsive sur tous écrans

### Pages
- ✅ **Accueil** - Hero, À propos, Compétences, Contact rapide
- ✅ **À propos** - Parcours, valeurs, timeline, statistiques
- ✅ **Services** - 6 services détaillés avec CTA
- ✅ **Portfolio** - Grille de projets avec filtres par catégorie
- ✅ **Contact** - Formulaire fonctionnel avec validation

### Animations & Interactions
- ✅ Loader de page
- ✅ Typing effect sur le hero
- ✅ Particules flottantes
- ✅ Barres de progression animées (compétences)
- ✅ Curseur personnalisé
- ✅ Scroll progressif
- ✅ Révélation au scroll
- ✅ Hover effects (wave, shine)
- ✅ Filtres portfolio interactifs

### Formulaire Contact
- ✅ Validation temps réel
- ✅ Soumission AJAX
- ✅ Messages succès/erreur
- ✅ Design moderne

## Tests

Le projet inclut une suite de tests unitaires et fonctionnels avec PHPUnit.

### Installation des dépendances de test

```bash
composer install
```

### Lancer les tests

```bash
# Tous les tests
composer test

# Ou directement avec PHPUnit
vendor/bin/phpunit
```

### Structure des tests

```
tests/
├── Unit/              # Tests unitaires
│   ├── Core/         # Tests des classes Core (Asset, Env)
│   └── Http/         # Tests du Router
└── Feature/          # Tests fonctionnels
    └── ControllersTest.php  # Tests des contrôleurs
```

### Tests disponibles

- ✅ **AssetTest** - Tests de génération CSS/JS avec versioning
- ✅ **EnvTest** - Tests de chargement des variables d'environnement
- ✅ **RouterTest** - Tests des routes GET/POST et dispatch
- ✅ **ControllersTest** - Tests fonctionnels de tous les contrôleurs


## Documentation

- 📄 **README.md** - Documentation principale
- 📄 **STRUCTURE.md** - Structure du projet et flux de requête
- 📄 **ANIMATIONS.md** - Documentation des animations
- 📄 **PAGES.md** - Guide de création de nouvelles pages
- 📄 **VHOST_SETUP.md** - Configuration du virtual host

## TODO

- [x] Tests unitaires (PHPUnit)
- [ ] Ajouter une vraie photo de profil
- [ ] Connecter le formulaire à un service email
- [ ] Intégrer une base de données
- [ ] Créer un back-office (admin)
- [ ] Ajouter un blog
- [ ] Ajouter plus de projets au portfolio
- [ ] Système de gestion de contenu
- [ ] Multilingue (FR/EN)
