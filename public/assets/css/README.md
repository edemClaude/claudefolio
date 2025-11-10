# Structure CSS du Portfolio

## Organisation

### `style.css` - CSS Global
Fichier principal contenant les styles réutilisables:
- Variables CSS (couleurs, espacements, transitions)
- Reset CSS
- Typographie
- Composants communs (buttons, cards, navigation, footer)
- Responsive de base

### `pages/` - CSS par page
Dossier contenant les styles spécifiques à chaque page:
- `home.css` - Page d'accueil (hero, about, skills, contact)
- (Futures pages à ajouter ici)

## Thème de couleurs

### Bleu foncé
- `--bg-main`: #0f172a (Fond principal)
- `--bg-secondary`: #1e293b (Fond secondaire)
- `--bg-card`: #1e3a5f (Fond des cartes)

### Accents bleus
- `--primary`: #1e3a8a
- `--primary-light`: #3b82f6
- `--accent`: #60a5fa
- `--accent-bright`: #93c5fd

### Texte
- `--text-primary`: #f1f5f9 (Titres)
- `--text-secondary`: #cbd5e1 (Paragraphes)
- `--text-muted`: #94a3b8 (Texte secondaire)

## Utilisation

### Pour une nouvelle page
1. Créer `pages/nouvelle-page.css`
2. Dans le contrôleur, définir les CSS:
```php
$data = [
    'cssFiles' => ['style.css', 'pages/nouvelle-page.css']
];
```
3. Dans le template:
```php
<?= Asset::css($cssFiles) ?>
```

### Variables disponibles
Utiliser les variables CSS pour maintenir la cohérence:
```css
.mon-element {
    background: var(--bg-card);
    color: var(--text-primary);
    padding: var(--spacing-md);
    border-radius: var(--radius);
}
```

## Composants réutilisables

- `.btn`, `.btn-primary`, `.btn-outline`
- `.card`
- `.container`
- `.section-title`
