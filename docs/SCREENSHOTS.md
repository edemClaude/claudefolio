# 📸 Guide pour ajouter des Screenshots

Pour compléter le README avec de belles captures d'écran de votre portfolio, suivez ces étapes:

## 🎯 Screenshots nécessaires

### 1. **Page d'accueil** (`home.png`)
- Résolution: 1920x1080
- Capturer: Hero section + About + Skills
- Nom: `docs/screenshots/home.png`

### 2. **Portfolio** (`portfolio.png`)
- Résolution: 1920x1080
- Capturer: Grille de projets avec filtres
- Nom: `docs/screenshots/portfolio.png`

### 3. **Services** (`services.png`)
- Résolution: 1920x1080
- Capturer: Cards de services + processus
- Nom: `docs/screenshots/services.png`

### 4. **Mobile - Home** (`mobile-home.png`)
- Résolution: 375x812 (iPhone X)
- Capturer: Hero section mobile
- Nom: `docs/screenshots/mobile-home.png`

### 5. **Mobile - Menu** (`mobile-menu.png`)
- Résolution: 375x812
- Capturer: Menu hamburger ouvert
- Nom: `docs/screenshots/mobile-menu.png`

### 6. **Mobile - Portfolio** (`mobile-portfolio.png`)
- Résolution: 375x812
- Capturer: Portfolio en grille mobile
- Nom: `docs/screenshots/mobile-portfolio.png`

## 🛠️ Outils recommandés

### Windows
- **Outil Capture d'écran** (Touche Windows + Shift + S)
- **Snipping Tool**
- **ShareX** (gratuit, avec éditeur)

### Chrome DevTools pour Mobile
1. F12 pour ouvrir DevTools
2. Cliquer sur l'icône mobile (Toggle device toolbar)
3. Sélectionner "iPhone X" ou "Responsive"
4. Ajuster la taille: 375x812
5. Capturer avec F12 > Menu ⋮ > Capture screenshot

## 📐 Optimisation des images

Après capture, optimisez avec:
- **TinyPNG** (https://tinypng.com/) - Compression PNG/JPEG
- **Squoosh** (https://squoosh.app/) - Google's image optimizer

### Format recommandé
```bash
Format: PNG ou JPEG
Compression: 70-80%
Taille max: 500KB par image
```

## 🚀 Ajout au repo

```bash
# Créer le dossier si nécessaire
mkdir -p docs/screenshots

# Ajouter vos screenshots
git add docs/screenshots/*.png
git commit -m "docs: Add screenshots to README"
git push
```

## 💡 Alternative: Images en ligne

Si vous préférez héberger ailleurs:
- **Imgur** (https://imgur.com/)
- **GitHub Issues** (uploader dans un issue puis copier le lien)
- **Cloudinary** (CDN gratuit)

Puis remplacer dans README.md:
```markdown
![Home Page](https://i.imgur.com/VOTRE_IMAGE.png)
```

## ✅ Checklist

- [ ] Screenshot desktop - Home
- [ ] Screenshot desktop - Portfolio
- [ ] Screenshot desktop - Services
- [ ] Screenshot mobile - Home
- [ ] Screenshot mobile - Menu ouvert
- [ ] Screenshot mobile - Portfolio
- [ ] Images optimisées (< 500KB chacune)
- [ ] Images ajoutées dans `docs/screenshots/`
- [ ] README.md mis à jour
- [ ] Commit et push sur GitHub
