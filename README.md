# 🏦 Refonte du Site Web COCEC

## 📌 Description

Ce projet est une **refonte du site web de la COCEC** ([https://www.cocectogo.org/](https://www.cocectogo.org/)).  
L'objectif est de :
- Moderniser l'interface utilisateur (UX/UI)
- Assurer la compatibilité multi-support (mobile, tablette, desktop)
- Optimiser le référencement naturel (SEO)
- Intégrer des fonctionnalités avancées

### 🔧 Technologies principales :
- **Backend** : Laravel (PHP 8.1+)
- **Base de données** : MySQL
- **Frontend** : HTML5, SCSS, JS
- **Administration** : Interface CMS intuitive
- **Fonctionnalités** : Simulateur de prêt, formulaire dynamique, blog, carrière, carte interactive des agences

---

## ✅ Prérequis

Avant d'installer le projet, assurez-vous d'avoir :

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & npm
- Git
- Serveur web local (ex. : Apache, Nginx, Laravel Valet, Laravel Sail)
- Terminal / shell

---

## 🚀 Guide d'installation du projet COCEC (Laravel) sous Windows

### 📌 Prérequis Windows
Avant d'installer le projet, assurez-vous d'avoir les outils suivants :

1. **XAMPP** (inclut PHP, MySQL et Apache)
   🔗 Télécharger : https://www.apachefriends.org/fr/index.html

2. **Composer** (gestionnaire de dépendances PHP)
   🔗 Télécharger : https://getcomposer.org/

⚠️ **Important** : Assurez-vous que PHP et Composer sont bien ajoutés à la variable d'environnement PATH de Windows.

### 📥 Clonage du projet

1. Ouvrez un terminal (CMD, PowerShell ou le terminal de VS Code).
2. Exécutez la commande suivante pour cloner le projet :
   ```bash
   git clone https://github.com/Angelot120/COCEC.git
   ```
3. Une fois le dépôt cloné, naviguez dans le dossier du projet :
   ```bash
   cd COCEC
   ```

### ⚙️ Configuration & Installation

1. **Ouvrez le projet** dans votre éditeur préféré :
   - Visual Studio Code (recommandé)
   - Sublime Text
   - Cursor, etc.

2. **Ouvrez un terminal** à la racine du projet.

3. **Installez les dépendances PHP** :
   ```bash
   composer install
   ```

4. **Lancez les migrations et insérez les données de base** :
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Créez le lien vers le dossier storage** :
   ```bash
   php artisan storage:link
   ```

6. **Installez les packages nécessaires** :
   ```bash
   composer require laravel/sanctum
   composer require barryvdh/laravel-dompdf
   ```

7. **Nettoyez et régénérez le cache** :
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   composer dump-autoload
   ```

### 🚀 Démarrer le serveur Laravel

Lancez le serveur de développement avec :
```bash
php artisan serve
```

Vous pourrez ensuite accéder à votre site en ouvrant ce lien dans votre navigateur :
👉 **http://127.0.0.1:8000/**

### 🔐 Accès à l'interface d'administration

- **Lien** : http://127.0.0.1:8000/admin
- **Identifiants de connexion** :
  - Email : `contact@cocec.com`
  - Mot de passe : `Jq]\hE[Wh?]~,Npq048U-7uNpw`

Cliquez sur "Se connecter" pour accéder à l'espace administrateur.

### 📝 Remarques importantes :

- Si vous rencontrez une erreur liée à DomPDF, vérifiez que l'extension PHP GD est bien activée dans votre php.ini.
- Vous pouvez modifier les informations d'accès dans la base de données si nécessaire.

---

## 🚀 Installation (Méthode générale)

### 1. Cloner le dépôt

```bash
git clone https://github.com/Angelot120/COCEC.git
cd COCEC
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances frontend

```bash
npm install
npm run dev
```

### 4. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

**Modifier les variables du fichier `.env` :**

- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

### 5. Créer la base de données

Créer une base nommée `cocec_db` et mettre à jour `.env` en conséquence.

### 6. Exécuter les migrations

```bash
php artisan migrate
```

### (Optionnel) Remplir la base avec des données de test

```bash
php artisan db:seed
```

### 7. Lancer le serveur de développement

```bash
php artisan serve
```

📍 Accédez au site à l'adresse : `http://localhost:8000`

---

## 🗂️ Structure du projet

```
├── app/                  # Logique métier (Modèles, contrôleurs, services)
├── resources/views/      # Vues Blade (Frontend & Admin)
├── public/               # Assets compilés (CSS, JS, Images)
├── database/migrations/  # Schéma des tables
└── routes/
    ├── web.php           # Routes web
    └── api.php           # Routes API
```

---

## ⚙️ Fonctionnalités principales

### 🎨 Frontend :
- Pages responsives : Accueil, Services, Carrière, Blog, Contact, FAQ
- Développé avec HTML5, SCSS et JS natif

### 🛠️ Backend :
- Laravel avec MySQL
- CMS intégré : gestion produits, blogs, offres, formulaires, agences

### 🚀 Fonctionnalités spécifiques :
- Simulateur de prêt avec tableau d'amortissement
- Formulaires dynamiques (ex. ouverture de compte)
- Candidatures en ligne (section Carrière)
- Avis et FAQ dynamiques
- Pop-up d'annonces
- **Nouveau** : Système de signatures avec capture et visualisation en plein écran

### 🔐 Sécurité :
- CSRF, XSS, SQL injection
- SSL recommandé

### 🔍 SEO :
- URLs optimisées pour le référencement naturel

---

## 📜 Scripts utiles

| Action | Commande |
|--------|----------|
| Vider le cache      | `php artisan cache:clear`<br>`php artisan config:clear`<br>`php artisan view:clear` |

---

## ✅ Tests

Pour exécuter les tests :

```bash
php artisan test
```

---

## 🚢 Déploiement

1. Configurer un serveur avec Nginx ou Apache
2. Copier les fichiers du projet
3. Lancer :

```bash
composer install --optimize-autoloader --no-dev
npm run build
```

4. Donner les permissions aux dossiers :

```bash
chmod -R 775 storage bootstrap/cache
```

5. Configurer `.env` pour la prod
6. Exécuter les migrations :

```bash
php artisan migrate --force
```

---

## 🤝 Contribution

1. **Fork** du projet
2. Créez une branche :  
   `git checkout -b feature/ma-fonctionnalite`
3. Commitez vos changements :  
   `git commit -m "Ajout de la fonctionnalité X"`
4. Poussez votre branche :  
   `git push origin feature/ma-fonctionnalite`
5. Créez une **Pull Request**

---

## 📞 Support

**Contact :**  
👤 DOUVON Angélot
📧 douvonangelotadn@gmail.com  
📱 +228 90174377

---

## 📄 Licence

Ce projet est sous **licence privée**, réservé à **COCEC** et **DIGITALIS TOGO**.  
🔒 Toute utilisation ou diffusion non autorisée est strictement interdite.

---

### 🚀 DIGITALIS TOGO  
_Cabinet de digitalisation et de gestion des entreprises_