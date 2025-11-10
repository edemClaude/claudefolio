# Documentation des Animations et Effets

## Système de chargement dynamique

### Helper Asset (`src/Core/Asset.php`)
Charge automatiquement les fichiers CSS et JS avec versioning (cache busting):

```php
// Dans le contrôleur
$data = [
    'cssFiles' => ['style.css', 'pages/home.css', 'animations.css'],
    'jsFiles' => ['animations.js', 'app.js']
];

// Dans le template
<?= Asset::css($cssFiles) ?>
<?= Asset::js($jsFiles) ?>
```

## Animations CSS disponibles

### Loader de page
- Spinner rotatif
- Fade out automatique après chargement
- Classe: `.page-loader`

### Animations d'apparition
- `.fade-in` - Apparition simple
- `.fade-in-up` - Apparition depuis le bas
- `.fade-in-down` - Apparition depuis le haut
- `.fade-in-left` - Apparition depuis la gauche
- `.fade-in-right` - Apparition depuis la droite
- `.scale-in` - Apparition avec zoom

### Délais progressifs
Utiliser `.delay-1` à `.delay-6` pour échelonner les animations:
```html
<div class="fade-in-up delay-1">Premier élément</div>
<div class="fade-in-up delay-2">Deuxième élément</div>
```

### Effets interactifs
- `.wave-effect` - Effet d'onde au survol
- `.btn-shine` - Brillance qui traverse le bouton
- `.glitch` - Effet glitch sur le texte
- `.typing-text` - Texte qui s'écrit progressivement

### Barres de progression
```html
<div class="skill-progress">
    <div class="skill-progress-bar" data-width="90%"></div>
</div>
```

## Effets JavaScript

### 1. Typing Effect (Machine à écrire)
Effet de texte qui s'écrit et s'efface en boucle:
- Élément: `.typing-effect`
- Mots configurables dans `animations.js`

### 2. Particules flottantes
- 20 particules animées dans le hero
- Mouvement vertical aléatoire
- Automatique

### 3. Compteurs animés
```html
<div class="counter" data-target="150">0</div>
```
Le compteur s'anime automatiquement au scroll jusqu'à la valeur cible.

### 4. Barres de progression
S'animent automatiquement quand la section apparaît à l'écran.

### 5. Parallaxe sur les cartes
Les cartes suivent légèrement le mouvement de la souris.

### 6. Curseur personnalisé
- Point lumineux qui suit la souris
- S'agrandit au survol des liens/boutons

### 7. Barre de progression du scroll
Barre en haut de page indiquant la progression du scroll.

### 8. Révélation au scroll
Les sections et éléments apparaissent progressivement au scroll.

### 9. Highlight de navigation
Le lien actif dans le menu change de couleur selon la section visible.

## Performances

### Cache busting
Les fichiers CSS/JS sont versionnés automatiquement avec `filemtime()`:
```
style.css?v=1699999999
```

### Chargement asynchrone
Les scripts JS sont chargés avec `defer` par défaut.

### Optimisations
- Animations CSS plutôt que JS quand possible
- IntersectionObserver pour déclencher les animations
- RequestAnimationFrame pour les compteurs

## Personnalisation

### Modifier la vitesse des animations
Dans `animations.css`, ajuster les durées:
```css
.fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}
```

### Ajouter de nouvelles animations
1. Définir le keyframe dans `animations.css`
2. Créer une classe utilitaire
3. Appliquer dans le HTML

### Désactiver des effets
Commenter ou retirer les sections dans `animations.js`:
```javascript
// createParticles(heroSection, 20); // Désactivé
```

## Browser Support
- Tous les navigateurs modernes
- Fallback gracieux pour les anciens navigateurs
- Préfères-reduced-motion respecté (à ajouter si besoin)
