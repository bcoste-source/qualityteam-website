# 🚀 Guide de déploiement - QualityTeam

Guide complet pour déployer le site sur **production** et **préprod** OVH avec configuration email simplifiée.

---

## ✅ Méthode avec variables d'environnement

**Avantage** : Un seul fichier `config.php` versionné, les mots de passe dans `.user.ini` sur le serveur.

---

## 🏠 Configuration en LOCAL (développement)

Le fichier `.user.ini` existe déjà en local avec le mode debug activé.

**Contenu du `.user.ini` local** :
```ini
; Configuration LOCAL - Debug activé, pas d'email
env[DEBUG_MODE] = true
```

✅ **Debug activé** - Vous voyez les erreurs PHP  
✅ **Cache désactivé** - Vos modifications apparaissent immédiatement  
❌ **Pas de SMTP** - Les emails ne sont pas envoyés (normal en local)  

**Note** : Ce fichier `.user.ini` est ignoré par Git et reste sur votre machine uniquement.

---

## 📋 Déploiement sur les SERVEURS

### Étape 1 : Déployer le code

```bash
# Sur votre serveur OVH (SSH)
cd /chemin/vers/votre/site
git pull origin main
```

### Étape 2 : Configurer les variables d'environnement

#### Sur PRODUCTION (www.qualityteam.fr)

```bash
# Créer le fichier .user.ini à la racine du site
nano .user.ini
```

Copiez ce contenu :

```ini
; Configuration PRODUCTION - www.qualityteam.fr
; Debug désactivé, cache activé

env[DEBUG_MODE] = false

env[SMTP_HOST] = ssl0.ovh.net
env[SMTP_PORT] = 465
env[SMTP_USERNAME] = b.coste@qualityteam.fr
env[SMTP_PASSWORD] = votre-mot-de-passe-email
```

**Remplacez** `votre-mot-de-passe-email` par le vrai mot de passe.

#### Sur PRÉPROD (preprod.qualityteam.fr)

```bash
# Créer le fichier .user.ini à la racine du site
nano .user.ini
```

Copiez ce contenu :

```ini
; Configuration PRÉPROD - preprod.qualityteam.fr
; Debug activé, cache désactivé

env[DEBUG_MODE] = true

env[SMTP_HOST] = ssl0.ovh.net
env[SMTP_PORT] = 465
env[SMTP_USERNAME] = b.coste@qualityteam.fr
env[SMTP_PASSWORD] = votre-mot-de-passe-email
```

**Remplacez** `votre-mot-de-passe-email` par le vrai mot de passe.

### Étape 3 : Sécuriser

```bash
# Sécuriser le fichier .user.ini
chmod 600 .user.ini
chown www-data:www-data .user.ini
```

**C'est tout !** ✨

---

## 🎯 Comment ça fonctionne ?

### Architecture simplifiée

```
Environnement           Fichiers              Debug    Cache    SMTP
──────────────────────────────────────────────────────────────────────────
Local (localhost)       config.php            ✅ On    ❌ Off   ❌ Pas de SMTP
                        + .user.ini (local)    (DEBUG_MODE=true)

Préprod                 config.php            ✅ On    ❌ Off   ✅ SMTP activé
(preprod.qualityteam.fr) + .user.ini          (DEBUG_MODE=true)

Production              config.php            ❌ Off   ✅ On    ✅ SMTP activé
(www.qualityteam.fr)    + .user.ini           (DEBUG_MODE=false)
```

### Le code dans config.php

```php
// Mode debug selon variable d'environnement
'debug' => getenv('DEBUG_MODE') === 'true',

// Cache inversé par rapport au debug
'cache' => [
    'pages' => ['active' => getenv('DEBUG_MODE') !== 'true']
],

// SMTP activé uniquement si mot de passe défini
'transport' => getenv('SMTP_PASSWORD') ? [
    'host' => getenv('SMTP_HOST'),
    'password' => getenv('SMTP_PASSWORD'),
    // ...
] : null,
```

✅ **En local** : Debug activé, pas de SMTP  
✅ **En préprod** : Debug activé, SMTP activé  
✅ **En production** : Debug désactivé, cache activé, SMTP activé  

---

## 📧 Variables d'environnement utilisées

### Paramètres disponibles

| Variable | Production | Préprod | Local | Description |
|----------|-----------|---------|-------|-------------|
| **DEBUG_MODE** | `false` | `true` | `true` | Active le mode debug et désactive le cache |
| **SMTP_HOST** | `ssl0.ovh.net` | `ssl0.ovh.net` | - | Serveur SMTP OVH |
| **SMTP_PORT** | `465` | `465` | - | Port SSL |
| **SMTP_USERNAME** | `b.coste@qualityteam.fr` | `b.coste@qualityteam.fr` | - | Compte email |
| **SMTP_PASSWORD** | Votre mot de passe | Votre mot de passe | - | Mot de passe email |

### 💡 Récupérer le mot de passe email OVH

1. [Espace client OVH](https://www.ovh.com/manager/)
2. **Web Cloud** → **Emails** → `qualityteam.fr`
3. Cliquez sur `b.coste@qualityteam.fr`
4. "Modifier le mot de passe" si besoin

---

## 🧪 Test après déploiement

### 1. Testez en PRÉPROD

```
https://preprod.qualityteam.fr/contact
```

1. Remplissez le formulaire
2. Soumettez
3. Vérifiez que vous recevez l'email sur `b.coste@qualityteam.fr`

### 2. Testez en PRODUCTION

```
https://www.qualityteam.fr/contact
```

1. Remplissez le formulaire
2. Soumettez
3. Vérifiez que vous recevez l'email

---

## 🔄 Workflow de développement

### En local (localhost)

Le fichier `.user.ini` existe en local avec `DEBUG_MODE=true`.

**Pour activer/désactiver le debug en local** :
```bash
# Éditer .user.ini
nano .user.ini

# Changer la valeur :
env[DEBUG_MODE] = true   # Debug activé
# ou
env[DEBUG_MODE] = false  # Debug désactivé
```

**Pour développer** :
```bash
git add .
git commit -m "Nouvelle fonctionnalité"
git push
```

→ Le fichier `.user.ini` reste **local uniquement** → Jamais poussé dans Git ✅

### Sur le serveur (préprod/production)

```bash
git pull
```

→ Le fichier `.user.ini` reste intact avec vos mots de passe ✅

---

## 🆘 Dépannage

### Les emails ne partent pas

1. **Vérifiez que `.user.ini` existe** :
   ```bash
   ls -la .user.ini
   cat .user.ini  # Vérifier le contenu
   ```

2. **Testez les variables** :
   ```php
   // Ajoutez temporairement au début de contact.php pour debug
   echo "DEBUG_MODE: " . getenv('DEBUG_MODE') . "<br>";
   echo "SMTP_PASSWORD présent: " . (getenv('SMTP_PASSWORD') ? 'oui' : 'non') . "<br>";
   die();
   ```

3. **Rechargez PHP-FPM** (parfois nécessaire) :
   ```bash
   # Selon votre config OVH
   sudo service php8.2-fpm reload
   ```

4. **Vérifiez les logs** :
   ```bash
   tail -f /var/log/apache2/error.log
   ```

### Le formulaire se recharge sans message

1. **Activez le mode debug** en éditant `.user.ini` :
   ```bash
   nano .user.ini
   # Ajoutez ou modifiez :
   env[DEBUG_MODE] = true
   ```

2. **Rechargez la page** et soumettez le formulaire

3. **Regardez le bloc de debug rouge** en haut de la page qui affiche toutes les informations

### Variables d'environnement non reconnues

OVH mutualisé utilise `.user.ini`. Si vous êtes sur un VPS, utilisez plutôt `.htaccess` :

```apache
# Pour PRODUCTION
SetEnv DEBUG_MODE false
SetEnv SMTP_HOST ssl0.ovh.net
SetEnv SMTP_PORT 465
SetEnv SMTP_USERNAME b.coste@qualityteam.fr
SetEnv SMTP_PASSWORD votre-mot-de-passe

# Pour PRÉPROD
# SetEnv DEBUG_MODE true
```

---

## 📊 Limites OVH

| Hébergement | Emails/heure | Emails/jour |
|-------------|--------------|-------------|
| **Mutualisé** | 200 | 2000 |
| **Performance** | Illimité | Illimité |

---

## ✅ Checklist de déploiement

### Local (développement)

- [x] Fichier `.user.ini` créé avec `DEBUG_MODE=true`
- [x] Debug activé (bloc rouge visible en cas d'erreur)
- [x] Cache désactivé (modifications immédiates)
- [x] Pas de SMTP (emails non envoyés)

### Préprod (preprod.qualityteam.fr)

- [ ] Code déployé : `git pull`
- [ ] Fichier `.user.ini` créé avec `DEBUG_MODE=true`
- [ ] Mot de passe SMTP rempli
- [ ] Permissions : `chmod 600 .user.ini`
- [ ] Debug activé (affichage des erreurs)
- [ ] Cache désactivé (tests plus faciles)
- [ ] Test formulaire de contact ✉️
- [ ] Email reçu sur `b.coste@qualityteam.fr` ✅

### Production (www.qualityteam.fr)

- [ ] Code déployé : `git pull`
- [ ] Fichier `.user.ini` créé avec `DEBUG_MODE=false`
- [ ] Mot de passe SMTP rempli
- [ ] Permissions : `chmod 600 .user.ini`
- [ ] Vérification : `.user.ini` pas dans Git
- [ ] Debug **désactivé** (`DEBUG_MODE=false`)
- [ ] Cache **activé** (performance)
- [ ] Test formulaire de contact ✉️
- [ ] Email reçu sur `b.coste@qualityteam.fr` ✅

---

## 🎉 Avantages de cette méthode

✅ **Ultra-simple** - Un seul fichier `.user.ini` par environnement  
✅ **Un seul config.php** - Fonctionne partout automatiquement  
✅ **Sécurisé** - Mots de passe jamais dans Git  
✅ **Flexible** - Debug géré par variable d'environnement  
✅ **Clean** - Pas de duplication de code  
✅ **Auto-adaptatif** - Debug + cache s'ajustent selon l'environnement  

---

## 📚 Ressources

- [OVH - Configuration SMTP](https://docs.ovh.com/fr/emails/generalites-sur-les-emails-mutualises/)
- [PHP .user.ini](https://www.php.net/manual/fr/configuration.file.per-user.php)
- [Kirby Email](https://getkirby.com/docs/guide/emails)

---

**Bon déploiement ! 🚀**
