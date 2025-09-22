# Agri-Cult 🌾

Agri-Cult est une application web de gestion agricole développée avec Symfony 7.2 et PHP 8.2+. L'application permet aux agriculteurs de gérer leurs parcelles, machines, animaux et bâtiments de manière efficace.

## 🚀 Fonctionnalités principales

- **Gestion des parcelles** : Suivi des cultures, rendements et rotations
- **Gestion des machines** : Inventaire et maintenance du matériel agricole
- **Gestion des animaux** : Suivi du cheptel et des soins vétérinaires
- **Gestion des bâtiments** : Organisation des installations agricoles
- **Chat en temps réel** : Communication entre utilisateurs avec Mercure
- **Interface responsive** : Optimisée pour desktop et mobile

## 🛠 Technologies utilisées

- **Backend** : Symfony 7.2, PHP 8.2+, Doctrine ORM
- **Frontend** : Twig, Bootstrap 5, Stimulus
- **Base de données** : MySQL/MariaDB
- **Build tools** : Webpack Encore, NPM
- **Temps réel** : Symfony Mercure

## 📋 Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js (version 16+ recommandée)
- NPM ou Yarn
- MySQL/MariaDB
- Serveur web (Apache/Nginx) ou utilisation du serveur de développement Symfony

## ⚡ Installation rapide

### 1. Cloner le projet
```bash
git clone https://github.com/jeremyw30/agricult1.git
cd agricult1
```

### 2. Installer les dépendances PHP
```bash
composer install
# En cas de problème de compatibilité PHP
composer update
```

### 3. Installer les dépendances Node.js
```bash
npm install
# En cas de problème avec certains packages Symfony
npm install --legacy-peer-deps
```

### 4. Configuration de l'environnement
```bash
# Copier le fichier d'environnement
cp .env .env.local

# Modifier .env.local avec vos paramètres de base de données
# DATABASE_URL="mysql://username:password@127.0.0.1:3306/agricult1"
```

### 5. Base de données
```bash
# Créer la base de données
php bin/console doctrine:database:create

# Exécuter les migrations
php bin/console doctrine:migrations:migrate

# (Optionnel) Charger des données de test
php bin/console doctrine:fixtures:load
```

### 6. Build des assets
```bash
# Pour le développement
npm run dev

# Pour la production
npm run build

# Mode watch (reconstruction automatique)
npm run watch
```

### 7. Lancer le serveur de développement
```bash
# Serveur Symfony
symfony server:start

# Ou avec PHP
php -S localhost:8000 -t public/
```

L'application sera accessible à l'adresse : http://localhost:8000

## 🔧 Développement

### Structure du projet
```
src/
├── Controller/     # Contrôleurs Symfony
├── Entity/         # Entités Doctrine
├── Repository/     # Dépôts Doctrine
└── ...

templates/          # Templates Twig
assets/            # Assets frontend (JS, CSS)
config/            # Configuration Symfony
migrations/        # Migrations de base de données
tests/             # Tests unitaires et fonctionnels
```

### Commandes utiles

```bash
# Cache
php bin/console cache:clear

# Générer une entité
php bin/console make:entity

# Créer une migration
php bin/console make:migration

# Tests
php bin/phpunit

# Linter PHP (si configuré)
vendor/bin/php-cs-fixer fix

# Analyse statique (si configuré)
vendor/bin/phpstan analyse
```

## 🤝 Contribution

Voir le fichier [CONTRIBUTING.md](CONTRIBUTING.md) pour les guidelines de contribution.

## 📝 Licence

Ce projet est sous licence propriétaire. Tous droits réservés.

## 👥 Équipe

- **Jérémy WENGLER** - Lead Developer / Product Owner
- Voir [CONTRIBUTING.md](CONTRIBUTING.md) pour rejoindre l'équipe

## 🆘 Support

Pour toute question ou problème :
1. Consulter la documentation
2. Vérifier les [issues GitHub](https://github.com/jeremyw30/agricult1/issues)
3. Contacter l'équipe de développement

---

**Agri-Cult** - Simplifier la gestion agricole 🌾