# Structure des Produits COCEC

## Vue d'ensemble

Le système de produits de COCEC utilise une architecture dynamique basée sur un fichier JSON pour gérer les informations des produits. Cette approche permet une maintenance facile et une mise à jour rapide des contenus sans modification du code.

## Structure des fichiers

```
resources/views/main/product/
├── index.blade.php          # Page principale des produits
└── details.blade.php        # Page de détails d'un produit

public/assets/data/
└── products.json           # Données des produits

routes/web.php              # Routes pour les produits
```

## Fichier JSON des produits

Le fichier `public/assets/data/products.json` contient toutes les informations des produits organisées par catégories.

### Structure d'un produit

```json
{
  "id": 1,
  "slug": "transfert",
  "title": "Transfert",
  "category": "services",
  "icon": "fas fa-exchange-alt",
  "short_description": "Description courte du produit",
  "description": "Description détaillée du produit",
  "features": [
    "Caractéristique 1",
    "Caractéristique 2"
  ],
  "requirements": [
    "Condition requise 1",
    "Condition requise 2"
  ],
  "image": "nom-image.jpg"
}
```

### Champs obligatoires

- **id**: Identifiant unique du produit
- **slug**: URL-friendly identifier (utilisé dans les liens)
- **title**: Nom du produit
- **category**: Catégorie du produit (`epargne`, `credit`, `services`)
- **icon**: Classe CSS de l'icône FontAwesome
- **short_description**: Description courte pour les cartes
- **description**: Description complète pour la page de détails
- **features**: Liste des caractéristiques du produit
- **requirements**: Liste des conditions requises

### Catégories disponibles

1. **epargne**: Produits d'épargne
2. **credit**: Produits de crédit
3. **services**: Services divers

## Produits actuels

Basés sur le site web officiel de COCEC (https://www.cocectogo.org/nos-produits) :

### Services
- **Transfert**: Transferts d'argent rapides et sécurisés
- **Conseils et Financement**: Conseils financiers personnalisés
- **Domiciliation de Salaire**: Réception automatique du salaire

### Crédit
- **Crédit**: Solutions de crédit adaptées

### Épargne
- **Épargne**: Solutions d'épargne sécurisées
- **Tontine**: Système d'épargne rotatif traditionnel

## Comment modifier les produits

### 1. Ajouter un nouveau produit

1. Ouvrir `public/assets/data/products.json`
2. Ajouter un nouvel objet produit dans le tableau `products`
3. S'assurer que tous les champs obligatoires sont présents
4. Utiliser un `slug` unique

### 2. Modifier un produit existant

1. Localiser le produit dans le fichier JSON
2. Modifier les champs souhaités
3. Sauvegarder le fichier

### 3. Supprimer un produit

1. Supprimer l'objet produit du tableau `products`
2. S'assurer que les `id` restent séquentiels

## Routes disponibles

- `/products` : Page principale des produits
- `/products/details?slug=nom-du-produit` : Page de détails d'un produit

## Fonctionnalités

### Page principale (`index.blade.php`)
- Affichage des produits par catégories avec onglets
- Chargement dynamique depuis le JSON
- Navigation vers les pages de détails

### Page de détails (`details.blade.php`)
- Affichage complet des informations du produit
- Caractéristiques et conditions requises
- Liens vers le contact et retour aux produits
- Gestion des erreurs (produit non trouvé)

## Avantages de cette architecture

1. **Maintenance facile** : Modification des contenus sans toucher au code
2. **Performance** : Chargement dynamique et mise en cache possible
3. **Flexibilité** : Ajout/modification de produits sans redéploiement
4. **SEO-friendly** : URLs propres et structure sémantique
5. **Responsive** : Design adaptatif pour tous les appareils

## Icônes disponibles

Le système utilise FontAwesome. Voici quelques exemples d'icônes couramment utilisées :

- `fas fa-exchange-alt` : Transfert
- `fas fa-hand-holding-usd` : Crédit
- `fas fa-piggy-bank` : Épargne
- `fas fa-users` : Tontine
- `fas fa-chart-line` : Conseils
- `fas fa-university` : Domiciliation

## Support

Pour toute question ou modification, consulter la documentation FontAwesome pour les icônes disponibles : https://fontawesome.com/icons 