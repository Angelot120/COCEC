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

Avant d’installer le projet, assurez-vous d’avoir :

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & npm
- Git
- Serveur web local (ex. : Apache, Nginx, Laravel Valet, Laravel Sail)
- Terminal / shell

---

## 🚀 Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/[votre-nom-utilisateur]/cocec.git
cd cocec
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

### 4. Configurer l’environnement

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

📍 Accédez au site à l’adresse : `http://localhost:8000`

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
- Simulateur de prêt avec tableau d’amortissement
- Formulaires dynamiques (ex. ouverture de compte)
- Candidatures en ligne (section Carrière)
- Avis et FAQ dynamiques
- Pop-up d'annonces

### 🔐 Sécurité :
- CSRF, XSS, SQL injection
- SSL recommandé

### 🔍 SEO :
- URLs optimisées pour le référencement naturel

---

## 📜 Scripts utiles

| Action | Commande |
|--------|----------|
| Compiler les assets | `npm run dev` |
| Compiler en prod    | `npm run build` |
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
👤 DOUVON Kodjovi Angélot  
📧 douvonangelotadn@gmail.com  
📱 +228 90174377

---

## 📄 Licence

Ce projet est sous **licence privée**, réservé à **COCEC** et **DIGITALIS TOGO**.  
🔒 Toute utilisation ou diffusion non autorisée est strictement interdite.

---

### 🚀 DIGITALIS TOGO  
_Cabinet de digitalisation et de gestion des entreprises_