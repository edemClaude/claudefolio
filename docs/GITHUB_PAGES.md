# 🌐 Configuration GitHub Pages

Guide pour déployer votre portfolio gratuitement sur GitHub Pages.

## 🚀 Méthode 1: Configuration manuelle (Recommandé)

### Étape 1: Activer GitHub Pages

1. Allez sur votre repo: https://github.com/edemClaude/claudefolio
2. Cliquez sur **Settings** (⚙️)
3. Dans le menu gauche, cliquez sur **Pages**
4. Sous "Build and deployment":
   - **Source**: Sélectionnez `GitHub Actions`
5. Cliquez sur **Save**

### Étape 2: Le workflow est déjà configuré!

Le fichier `.github/workflows/deploy.yml` a déjà été créé et va:
- ✅ Se déclencher à chaque push sur `main`
- ✅ Installer PHP 8.3
- ✅ Installer les dépendances Composer
- ✅ Créer le .env automatiquement
- ✅ Déployer sur GitHub Pages

### Étape 3: Push et vérifier

```bash
git add .
git commit -m "ci: Add GitHub Actions workflows for tests and deployment"
git push
```

Ensuite:
1. Allez sur l'onglet **Actions** de votre repo
2. Vous verrez le workflow "Deploy to GitHub Pages" en cours
3. Une fois terminé (✓ vert), votre site sera disponible à:
   
   **https://edemclaude.github.io/claudefolio/**

## 🔧 Méthode 2: Configuration avec branche gh-pages

Si vous préférez déployer depuis une branche dédiée:

### Créer la branche gh-pages

```bash
# Créer une branche orpheline
git checkout --orphan gh-pages

# Copier le contenu
git rm -rf .
cp -r ../edemclaude-backup/* .

# Commit initial
git add .
git commit -m "Initial GitHub Pages deployment"
git push origin gh-pages

# Retourner sur main
git checkout main
```

### Configurer dans GitHub

1. **Settings** > **Pages**
2. **Source**: `Deploy from a branch`
3. **Branch**: `gh-pages` / `/ (root)`
4. **Save**

## ⚙️ Configuration pour PHP sur GitHub Pages

### ⚠️ Important: Limitation GitHub Pages

GitHub Pages sert des **fichiers statiques** (HTML, CSS, JS) uniquement.
**Il ne peut PAS exécuter PHP directement.**

### Solutions possibles:

#### Option A: Générer du HTML statique (Recommandé)

Créer un script qui génère des fichiers HTML:

```bash
# Créer un build script
php build.php
```

**`build.php`:**
```php
<?php
require 'vendor/autoload.php';

$pages = ['/', '/about', '/services', '/portfolio', '/contact'];

foreach ($pages as $page) {
    // Simuler la requête
    $_SERVER['REQUEST_URI'] = $page;
    
    // Générer le HTML
    ob_start();
    require 'public/index.php';
    $html = ob_get_clean();
    
    // Sauvegarder
    $filename = $page === '/' ? 'index.html' : trim($page, '/') . '.html';
    file_put_contents("build/$filename", $html);
}
```

#### Option B: Hébergement PHP gratuit

Pour un site PHP dynamique, utilisez:
- **InfinityFree** (https://infinityfree.net/) - PHP gratuit
- **000webhost** (https://www.000webhost.com/) - Hébergement gratuit
- **Heroku** (https://www.heroku.com/) - Free tier disponible
- **Railway** (https://railway.app/) - Déploiement moderne

#### Option C: Conversion Progressive Web App (PWA)

Utiliser un framework JavaScript qui consomme une API PHP:
- Frontend sur GitHub Pages (HTML/CSS/JS)
- Backend PHP hébergé ailleurs (API)

## 🎯 Notre recommandation

Pour votre portfolio:

### 1. **GitHub Pages** pour la démo statique
- Générer des HTML statiques depuis vos templates PHP
- Parfait pour montrer le design et l'UX
- Gratuit et rapide

### 2. **Hébergement PHP** pour la version complète
- InfinityFree ou 000webhost pour héberger la version PHP
- Ajouter le lien dans votre README:
  - Demo statique: https://edemclaude.github.io/claudefolio/
  - Version complète: https://votresite.infinityfree.net/

## 📝 Mettre à jour le README

Une fois déployé, mettez à jour les liens:

```markdown
**🌐 [Démo Live](https://edemclaude.github.io/claudefolio/)** 
**💻 [Version PHP complète](https://votresite.com)**
```

## ✅ Vérification

Après déploiement, vérifiez:
- [ ] Site accessible sur https://edemclaude.github.io/claudefolio/
- [ ] CSS et JS chargent correctement
- [ ] Images s'affichent
- [ ] Navigation fonctionne
- [ ] Responsive sur mobile
- [ ] Aucune erreur dans la console (F12)

## 🐛 Debugging

Si le site ne fonctionne pas:

1. **Vérifier l'onglet Actions**
   - Le workflow a-t-il réussi? (✓ vert)
   
2. **Vérifier les chemins des assets**
   - Chemins absolus vs relatifs
   - Vérifier `.htaccess` et `Asset::setBasePath()`

3. **Vérifier la console browser**
   - Erreurs 404 sur les fichiers CSS/JS?
   - Corriger les chemins dans `Asset.php`

## 🎉 Félicitations!

Votre portfolio est maintenant:
- ✅ Sur GitHub avec tests automatiques
- ✅ Déployé gratuitement
- ✅ Accessible publiquement
- ✅ Avec CI/CD configuré
