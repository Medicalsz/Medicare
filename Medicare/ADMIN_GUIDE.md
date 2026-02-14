# Interface d'Administration Medicare

## Composants Créés

### 1. **AdminTopBar** (`_admintopbar.html.twig`)
Barre de navigation supérieure pour l'administration avec :
- ❌ **Pas de logo** (comme demandé)
- 🔍 Barre de recherche
- 🔔 Notifications avec badge
- 👤 Menu profil avec dropdown
- 🍔 Bouton hamburger pour toggle sidebar

### 2. **AdminSidebar** (`_adminsidebar.html.twig`)
Menu latéral avec les sections suivantes :
- 📊 **Dashboard** - Vue d'ensemble
- 👥 **Utilisateurs** - Gestion des utilisateurs
- 💗 **Patients** - Liste des patients
- 🏥 **Médecins** - Gestion des médecins
- 📅 **Rendez-vous** - Gestion des RDV
- 👔 **Collaborateurs** - Équipe médicale
- 📈 **Statistiques** - Rapports et analytics
- ⚙️ **Paramètres** - Configuration système

### 3. **AdminBase** (`admin_base.html.twig`)
Template de base pour toutes les pages admin incluant :
- TopBar + Sidebar
- Zone de contenu principal
- Scripts JavaScript nécessaires

### 4. **Dashboard Admin** (`admin/dashboard.html.twig`)
Page d'exemple avec :
- 📊 Cartes statistiques (Utilisateurs, Patients, Médecins, RDV)
- 📋 Tableau des rendez-vous récents
- 🔔 Activités récentes
- 📢 Notifications système

## Fichiers CSS

### `admintopbar.css`
- Design moderne avec gradient violet (#667eea → #764ba2)
- Responsive mobile
- Dropdown animé pour le profil
- Badge de notifications

### `adminsidebar.css`
- Fond sombre (#1e1e2d)
- Navigation avec icônes Bootstrap Icons
- Indicateur actif animé
- Responsive avec overlay mobile

### `admindashboard.css`
- Cartes statistiques avec gradients
- Tableaux stylisés
- Badges de statut colorés
- Boutons admin personnalisés

## JavaScript

### `admindashboard.js`
- Toggle sidebar mobile avec hamburger
- Gestion overlay
- Highlight automatique du lien actif
- Gestion dropdown profil

## Utilisation

### Créer une nouvelle page admin :

```twig
{% extends 'admin_base.html.twig' %}

{% block title %}Ma Page Admin{% endblock %}

{% block body %}
    <div class="admin-page-header">
        <h1 class="admin-page-title">Titre de la page</h1>
        <p class="admin-page-subtitle">Description</p>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Contenu</h3>
        </div>
        <div class="admin-card-body">
            <!-- Votre contenu ici -->
        </div>
    </div>
{% endblock %}
```

### Classes CSS utiles :

- `.admin-card` - Carte blanche avec ombre
- `.admin-btn-primary` - Bouton principal (gradient violet)
- `.admin-btn-success` - Bouton vert
- `.admin-btn-danger` - Bouton rouge
- `.admin-btn-secondary` - Bouton gris
- `.admin-badge` - Badge de statut
- `.admin-table` - Tableau stylisé
- `.admin-stat-card` - Carte statistique

## Accès

📍 **URL** : `/admin/dashboard`

⚠️ **Note** : Les routes sont actuellement en "#". Il faudra créer les contrôleurs pour chaque section.

## Design

🎨 **Palette de couleurs** :
- Primary : Gradient #667eea → #764ba2 (violet)
- Success : #11998e (vert)
- Warning : #f5576c (rose)
- Info : #4facfe (bleu)
- Dark : #1e1e2d (fond sidebar)

## Responsive

📱 **Breakpoints** :
- Desktop : Sidebar fixe à 280px
- Tablette/Mobile (< 992px) : Sidebar coulissante avec overlay

## Prochaines étapes

1. ✅ Composants admin créés
2. ⏳ Créer les contrôleurs pour chaque section
3. ⏳ Implémenter la gestion des rôles (ROLE_ADMIN)
4. ⏳ Connecter aux entités (User, Patient, Medecin, etc.)
5. ⏳ Ajouter la pagination
6. ⏳ Ajouter les filtres de recherche
7. ⏳ Créer les formulaires CRUD
