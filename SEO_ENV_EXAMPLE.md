# Variables d'Environnement SEO pour COCEC Togo

## 📋 Configuration Requise

Ajoutez ces variables dans votre fichier `.env` pour activer toutes les fonctionnalités SEO.

## 🌐 Configuration Générale du Site

```env
# Configuration SEO de base
SITE_NAME="COCEC Togo"
SITE_DESCRIPTION="Coopérative d'Épargne et de Crédit au Togo - Solutions financières, crédits, épargne et services bancaires depuis 2001"
SITE_KEYWORDS="COCEC, microfinance, Togo, épargne, crédit, prêt, finance, coopérative, Lomé, Kanyikope, services bancaires, transfert d'argent, tontine, investissement"
SITE_AUTHOR="COCEC Togo"
SITE_LANGUAGE="fr"
SITE_LOCALE="fr_FR"
SITE_URL="https://cocectogo.com"
```

## 📱 Réseaux Sociaux

```env
# Facebook
FACEBOOK_APP_ID=votre_facebook_app_id
FACEBOOK_PAGE_URL=https://facebook.com/cocectogo

# Twitter
TWITTER_USERNAME="@COCECTogo"

# LinkedIn
LINKEDIN_COMPANY_URL=https://linkedin.com/company/cocec-togo

# WhatsApp
WHATSAPP_PHONE="+22891126471"
```

## 🔍 Google Services

```env
# Google Analytics
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXX

# Google Search Console
GOOGLE_SEARCH_CONSOLE_VERIFICATION=votre_code_verification

# Google AdSense
GOOGLE_ADSENSE_ID=ca-pub-XXXXXXXXXX

# Google Tag Manager
GOOGLE_TAG_MANAGER_ID=GTM-XXXXXXX
```

## 🎨 Configuration des Images

```env
# Images par défaut
SITE_LOGO="assets/images/Logo.png"
OG_IMAGE_DEFAULT="assets/images/Logo.png"
TWITTER_IMAGE_DEFAULT="assets/images/Logo.png"
FAVICON="assets/images/Logo.png"
APPLE_TOUCH_ICON="assets/images/Logo.png"
```

## 📍 Informations Géographiques

```env
# Coordonnées géographiques
SITE_LATITUDE="6.1375"
SITE_LONGITUDE="1.2123"
SITE_ADDRESS="Kanyikope, Lomé, Togo"
SITE_REGION="Maritime"
SITE_COUNTRY="Togo"
SITE_CURRENCY="XOF"
```

## ⏰ Horaires et Informations

```env
# Horaires d'ouverture
SITE_OPENING_HOURS="Mo-Fr 08:00-17:00"
SITE_PRICE_RANGE="$$"
SITE_FOUNDING_DATE="2001"

# Méthodes de paiement
SITE_PAYMENT_METHODS="Cash,Bank Transfer,Mobile Money"
SITE_CURRENCIES_ACCEPTED="XOF"
```

## 🚀 Activation des Fonctionnalités

### 1. Copiez le fichier d'exemple
```bash
cp .env.example .env
```

### 2. Configurez vos variables
Remplacez les valeurs par vos informations réelles.

### 3. Activez Google Analytics
Une fois configuré, Google Analytics sera automatiquement activé en production.

### 4. Vérifiez Google Search Console
Ajoutez votre site et utilisez le code de vérification.

## 📊 Vérification

### Vérifiez que les meta tags sont bien générés :
1. Ouvrez votre site dans un navigateur
2. Clic droit → "Afficher le code source"
3. Recherchez les balises `<meta>` et `<title>`

### Vérifiez le sitemap :
- Accédez à `https://votresite.com/sitemap.xml`

### Vérifiez robots.txt :
- Accédez à `https://votresite.com/robots.txt`

## 🔧 Dépannage

### Les meta tags ne s'affichent pas ?
- Vérifiez que le cache des vues est vidé : `php artisan view:clear`
- Vérifiez que le composant `<x-seo-meta>` est bien utilisé

### Google Analytics ne fonctionne pas ?
- Vérifiez que `GOOGLE_ANALYTICS_ID` est configuré
- Vérifiez que vous êtes en production (`APP_ENV=production`)

### Le sitemap n'est pas accessible ?
- Vérifiez que le fichier `public/sitemap.xml` existe
- Vérifiez les permissions du fichier

## 📈 Prochaines Étapes

1. **Configurer Google Analytics** avec votre ID
2. **Ajouter votre site à Google Search Console**
3. **Créer un profil Google My Business**
4. **Optimiser le contenu** avec les nouveaux composants SEO
5. **Surveiller les performances** dans Google Analytics

---

**Note** : Gardez ces informations confidentielles et ne les partagez jamais publiquement.
