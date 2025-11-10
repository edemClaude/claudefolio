# Configuration du Virtual Host

## Fichiers créés
- ✅ `c:\laragon\etc\apache2\sites-enabled\edemclaude.conf`

## Étapes pour activer

### 1. Ajouter au fichier hosts
**Ouvrir en tant qu'administrateur**: `C:\Windows\System32\drivers\etc\hosts`

Ajouter cette ligne à la fin:
```
127.0.0.1    edemclaude.test
```

### 2. Redémarrer Apache
- Clic droit sur Laragon → Apache → Reload
- Ou: Laragon → Stop All → Start All

### 3. Tester
Ouvrir le navigateur: `http://edemclaude.test/`

---

## Alternative automatique (plus simple)

Laragon peut gérer automatiquement les virtual hosts:

1. Menu Laragon → Préférences → Services
2. Cocher "Auto virtual hosts"
3. Redémarrer Laragon

Tous vos projets dans `www/` seront accessibles via `http://nomduprojet.test/`
