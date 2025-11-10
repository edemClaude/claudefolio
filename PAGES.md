# Documentation des Pages

## Pages disponibles

### 1. Accueil (`/`)
**Contrôleur**: `HomeController`  
**Template**: `templates/home.php`  
**CSS**: `pages/home.css`

**Sections**:
- Hero avec typing effect et particules
- À propos (présentation)
- Compétences avec barres de progression
- Contact rapide

---

### 2. Services (`/services`)
**Contrôleur**: `ServicesController`  
**Template**: `templates/services.php`  
**CSS**: `pages/services.css`

**Contenu**:
- 6 services principaux
  - Développement Web
  - UI/UX Design
  - Optimisation & Performance
  - Maintenance & Support
  - Applications Mobiles
  - Formation & Conseil
- CTA vers contact

---

### 3. Portfolio (`/portfolio`)
**Contrôleur**: `PortfolioController`  
**Template**: `templates/portfolio.php`  
**CSS**: `pages/portfolio.css`

**Fonctionnalités**:
- Filtres par catégorie (Tous, Web, Applications, E-commerce)
- Grille de projets responsive
- 6 projets exemples
- Hover effects sur les cartes
- Animation au scroll

---

### 4. Contact (`/contact`)
**Contrôleur**: `ContactController`  
**Template**: `templates/contact.php`  
**CSS**: `pages/contact.css`  
**JS**: `contact.js`

**Fonctionnalités**:
- Formulaire de contact fonctionnel
- Validation côté client (temps réel)
- Soumission AJAX
- Messages de succès/erreur
- Informations de contact
- Liens réseaux sociaux

**Routes**:
- `GET /contact` - Affiche le formulaire
- `POST /contact/submit` - Traite la soumission

---

## Menu de Navigation

### Desktop
Navigation horizontale avec hover effects

### Mobile (≤ 768px)
**Menu Hamburger**:
- Icône hamburger en haut à droite
- Menu slide-in depuis la droite
- Overlay semi-transparent
- Fermeture au clic sur overlay ou lien
- Animation smooth

**Fichiers**:
- CSS: `hamburger.css`
- JS: `hamburger.js`

---

## Composants Réutilisables

### Header (`templates/components/header.php`)
Navigation commune à toutes les pages avec:
- Logo cliquable
- Menu hamburger (mobile)
- Liens de navigation
- Highlight du lien actif
- Overlay pour mobile

---

## Structure d'une nouvelle page

### 1. Créer le contrôleur
```php
// src/Controllers/MaPageController.php
<?php
declare(strict_types=1);

namespace App\Controllers;

class MaPageController
{
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Ma Page - Portfolio',
            'cssFiles' => ['style.css', 'pages/ma-page.css', 'animations.css'],
            'jsFiles' => ['animations.js', 'app.js']
        ];
        
        return $this->render('ma-page', $data);
    }

    private function render(string $template, array $data = []): string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../../templates/' . $template . '.php';
        return ob_get_clean();
    }
}
```

### 2. Créer le template
```php
// templates/ma-page.php
<?php
use App\Core\Asset;
$pageTitle = $pageTitle ?? 'Ma Page';
$cssFiles = $cssFiles ?? ['style.css'];
$jsFiles = $jsFiles ?? ['app.js'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <?= Asset::css(array_merge($cssFiles, ['hamburger.css'])) ?>
</head>
<body>
    <div class="page-loader">
        <div class="loader-content">
            <div class="spinner"></div>
            <div class="loader-text">Chargement...</div>
        </div>
    </div>
    
    <?php include __DIR__ . '/components/header.php'; ?>
    
    <main>
        <!-- Votre contenu ici -->
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; 2025 Edem Claude KUMAZA. Tous droits réservés.</p>
        </div>
    </footer>
    
    <?= Asset::js(array_merge($jsFiles, ['hamburger.js'])) ?>
</body>
</html>
```

### 3. Créer le CSS
```css
/* public/assets/css/pages/ma-page.css */
.ma-page-hero {
    min-height: 60vh;
    background: linear-gradient(135deg, var(--bg-main) 0%, var(--primary-dark) 100%);
    padding-top: 100px;
}

/* Autres styles spécifiques */
```

### 4. Ajouter la route
```php
// public/index.php
$router->get('/ma-page', [App\Controllers\MaPageController::class, 'index']);
```

### 5. Ajouter au menu
```php
// templates/components/header.php
<li><a href="/ma-page" <?= isActive('/ma-page', $currentPath) ?>>Ma Page</a></li>
```

---

## Formulaires

### Exemple de soumission AJAX

**HTML** (dans le template):
```html
<form id="monForm">
    <input type="text" name="champ" required>
    <button type="submit">Envoyer</button>
</form>
<div id="message"></div>
```

**JavaScript**:
```javascript
document.getElementById('monForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    
    const response = await fetch('/route/submit', {
        method: 'POST',
        body: formData
    });
    
    const data = await response.json();
    document.getElementById('message').textContent = data.message;
});
```

**Contrôleur**:
```php
public function submit(): string
{
    $champ = $_POST['champ'] ?? '';
    
    // Traitement...
    
    return json_encode([
        'success' => true,
        'message' => 'Succès !'
    ]);
}
```

**Route**:
```php
$router->post('/route/submit', [Controller::class, 'submit']);
```

---

## Assets par page

| Page | CSS | JavaScript |
|------|-----|------------|
| Accueil | `style.css`, `pages/home.css`, `animations.css`, `hamburger.css` | `animations.js`, `app.js`, `hamburger.js` |
| Services | `style.css`, `pages/services.css`, `animations.css`, `hamburger.css` | `animations.js`, `app.js`, `hamburger.js` |
| Portfolio | `style.css`, `pages/portfolio.css`, `animations.css`, `hamburger.css` | `animations.js`, `app.js`, `hamburger.js` |
| Contact | `style.css`, `pages/contact.css`, `animations.css`, `hamburger.css` | `animations.js`, `app.js`, `contact.js`, `hamburger.js` |

---

## Animations disponibles

Sur toutes les pages, vous pouvez utiliser:
- `.fade-in-up`, `.fade-in-down`, `.fade-in-left`, `.fade-in-right`
- `.scale-in`
- `.delay-1` à `.delay-6`
- `.btn-shine`, `.wave-effect`
- Classes `.card` avec hover automatique

Voir `ANIMATIONS.md` pour plus de détails.
