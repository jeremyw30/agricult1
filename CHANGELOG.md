# Changelog Agri-Cult

Ce fichier trace les changements notables du projet Agri-Cult.

Le format est basé sur [Keep a Changelog](https://keepachangelog.com/fr/1.0.0/),
et ce projet adhère à [Semantic Versioning](https://semver.org/lang/fr/).

## [Unreleased]

### Added
- Documentation complète du projet (README.md, CONTRIBUTING.md)
- Modèle d'accord de collaboration et NDA
- Templates GitHub pour issues et pull requests
- Workflow CI/CD basique avec GitHub Actions
- Documentation des décisions architecturales (DECISIONS.md)
- Guidelines de sécurité et protection des données sensibles

### Changed
- Amélioration du .gitignore pour exclure les fichiers sensibles
- Structure de projet plus professionnelle

### Security
- Mise en place de guidelines de sécurité strictes
- Protection contre les commits accidentels de credentials

## [1.0.0] - 2024-XX-XX

### Added
- Application de base Symfony 7.2 avec PHP 8.2+
- Système d'authentification utilisateur
- Gestion des entités agricoles (Parcelles, Machines, Animaux, Bâtiments)
- Chat en temps réel avec Mercure
- Interface utilisateur responsive avec Bootstrap 5
- Base de données MySQL avec Doctrine ORM

### Features
- **Authentification** : Inscription, connexion, gestion des rôles
- **Parcelles** : Création, modification, suivi des cultures
- **Machines** : Inventaire du matériel agricole
- **Animaux** : Gestion du cheptel
- **Bâtiments** : Organisation des installations
- **Chat** : Communication temps réel entre utilisateurs
- **Transactions** : Système de gestion financière basique

### Technical
- Framework Symfony 7.2
- PHP 8.2+ avec support des dernières fonctionnalités
- Base de données relationnelle avec migrations Doctrine
- Assets management avec Webpack Encore
- Templates Twig pour le rendu serveur
- Stimulus pour l'interactivité JavaScript

---

## Template pour nouvelles versions

```markdown
## [X.Y.Z] - YYYY-MM-DD

### Added
- Nouvelles fonctionnalités

### Changed
- Modifications de fonctionnalités existantes

### Deprecated
- Fonctionnalités qui seront supprimées

### Removed
- Fonctionnalités supprimées

### Fixed
- Corrections de bugs

### Security
- Corrections de sécurité
```

## Convention de versioning

- **MAJOR** (X.0.0) : Changements incompatibles avec les versions précédentes
- **MINOR** (0.Y.0) : Nouvelles fonctionnalités compatibles
- **PATCH** (0.0.Z) : Corrections de bugs compatibles

### Exemples
- `1.0.0` → `1.1.0` : Nouvelle fonctionnalité (gestion des cultures)
- `1.1.0` → `1.1.1` : Correction de bug
- `1.1.1` → `2.0.0` : Refonte complète de l'API

## Processus de release

1. Mise à jour de ce CHANGELOG avec les modifications
2. Tag git avec le numéro de version : `git tag v1.0.0`
3. Build et tests de la version
4. Déploiement en production
5. Communication des changements à l'équipe