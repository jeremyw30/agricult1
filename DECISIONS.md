# Décisions architecturales - Agri-Cult

Ce document trace les décisions importantes prises pour le projet Agri-Cult, avec leur contexte et leur justification.

## Format des décisions

Chaque décision suit ce format :
- **Date** : Quand la décision a été prise
- **Contexte** : Pourquoi cette décision était nécessaire
- **Décision** : Ce qui a été choisi
- **Alternatives** : Autres options considérées
- **Conséquences** : Impact de cette décision

---

## ADR-001 : Framework PHP - Symfony 7.2
**Date** : 2024-01-XX  
**Contexte** : Besoin d'un framework robuste pour une application de gestion agricole avec authentification, ORM, et fonctionnalités temps réel.  
**Décision** : Utilisation de Symfony 7.2 avec PHP 8.2+  
**Alternatives** : Laravel, CodeIgniter, framework custom  
**Conséquences** : 
- ✅ Écosystème mature et bien documenté
- ✅ Intégration native avec Doctrine ORM
- ✅ Support excellent pour les APIs et le temps réel (Mercure)
- ⚠️ Courbe d'apprentissage plus élevée pour les nouveaux développeurs

## ADR-002 : Base de données - MySQL/MariaDB
**Date** : 2024-01-XX  
**Contexte** : Besoin d'une base de données relationnelle pour gérer les entités agricoles (parcelles, machines, animaux, bâtiments).  
**Décision** : MySQL/MariaDB avec Doctrine ORM  
**Alternatives** : PostgreSQL, SQLite, MongoDB  
**Conséquences** :
- ✅ Excellente performance pour les requêtes relationnelles
- ✅ Support natif dans la plupart des hébergements
- ✅ Intégration parfaite avec Doctrine
- ⚠️ Moins de fonctionnalités avancées que PostgreSQL

## ADR-003 : Frontend - Twig + Bootstrap + Stimulus
**Date** : 2024-01-XX  
**Contexte** : Interface utilisateur responsive avec interactions modernes mais sans complexité SPA.  
**Décision** : Templates Twig, Bootstrap 5, Stimulus pour l'interactivité  
**Alternatives** : Vue.js SPA, React, Alpine.js  
**Conséquences** :
- ✅ Rendu côté serveur rapide
- ✅ SEO optimisé naturellement
- ✅ Moins de complexité JavaScript
- ⚠️ Moins d'interactivité que les frameworks SPA

## ADR-004 : Chat temps réel - Symfony Mercure
**Date** : 2024-01-XX  
**Contexte** : Besoin de communication temps réel entre utilisateurs agricoles.  
**Décision** : Utilisation de Symfony Mercure pour le chat  
**Alternatives** : WebSockets custom, Socket.io, Pusher  
**Conséquences** :
- ✅ Intégration native avec Symfony
- ✅ Protocol Server-Sent Events (SSE) simple
- ✅ Scalabilité avec Redis
- ⚠️ Moins de fonctionnalités que Socket.io

## ADR-005 : Gestion des assets - Webpack Encore
**Date** : 2024-01-XX  
**Contexte** : Build des assets CSS/JS avec optimisations pour la production.  
**Décision** : Symfony Webpack Encore  
**Alternatives** : Vite, Webpack vanilla, Parcel  
**Conséquences** :
- ✅ Intégration parfaite avec Symfony
- ✅ Configuration simplifiée
- ✅ Support Sass, PostCSS, optimisations
- ⚠️ Plus lent que Vite pour le développement

## ADR-006 : Architecture entités - Domain Driven Design
**Date** : 2024-01-XX  
**Contexte** : Modélisation du domaine agricole avec entités métier claires.  
**Décision** : Entités principales : User, Parcelle, Machine, Animal, Batiment, Transaction  
**Alternatives** : Approche plus générique, microservices  
**Conséquences** :
- ✅ Logique métier centralisée et claire
- ✅ Relations naturelles entre entités
- ✅ Facilite la compréhension du domaine
- ⚠️ Couplage plus fort entre modules

## ADR-007 : Authentification - Symfony Security
**Date** : 2024-01-XX  
**Contexte** : Système d'authentification sécurisé avec gestion des rôles.  
**Décision** : Symfony Security Component avec rôles ROLE_USER, ROLE_ADMIN  
**Alternatives** : JWT tokens, OAuth2, auth externe  
**Conséquences** :
- ✅ Sécurité éprouvée
- ✅ Gestion des sessions intégrée
- ✅ Système de rôles flexible
- ⚠️ Moins adapté aux APIs mobiles

## ADR-008 : Tests - PHPUnit + Symfony Testing
**Date** : 2024-01-XX  
**Contexte** : Assurer la qualité du code avec tests automatisés.  
**Décision** : PHPUnit pour tests unitaires, Symfony Testing pour tests fonctionnels  
**Alternatives** : Pest, Codeception, tests manuels uniquement  
**Conséquences** :
- ✅ Standard de l'industrie PHP
- ✅ Intégration parfaite avec Symfony
- ✅ Outils de mocking intégrés
- ⚠️ Configuration initiale nécessaire

## ADR-009 : Déploiement - Docker + CI/CD
**Date** : 2024-01-XX  
**Contexte** : Déploiement reproductible et automatisé.  
**Décision** : Configuration Docker avec CI/CD GitHub Actions (à implémenter)  
**Alternatives** : Déploiement FTP, Heroku, serveur dédié  
**Conséquences** :
- ✅ Environnements identiques dev/prod
- ✅ Déploiements automatisés
- ✅ Rollback facile
- ⚠️ Complexité infrastructure initiale

## ADR-010 : Collaboration - GitHub privé + workflows
**Date** : 2024-01-XX  
**Contexte** : Collaboration sécurisée sur code propriétaire avec nouveaux développeurs.  
**Décision** : Repo GitHub privé, branch protection, PR obligatoires, NDA  
**Alternatives** : GitLab self-hosted, Bitbucket, SVN  
**Conséquences** :
- ✅ Contrôle d'accès granulaire
- ✅ Protection propriété intellectuelle
- ✅ Workflow collaboratif éprouvé
- ⚠️ Coût des comptes privés

---

## 📝 Ajouter une décision

Pour ajouter une nouvelle décision :

1. Créer une nouvelle section ADR-XXX
2. Documenter le contexte et les alternatives
3. Expliquer la décision et ses conséquences
4. Commiter ce fichier avec la PR concernée

## 🔄 Révision des décisions

Les décisions peuvent être révisées si :
- Le contexte change significativement
- De nouvelles alternatives deviennent disponibles
- Les conséquences négatives deviennent problématiques

Dans ce cas, créer un nouvel ADR qui révise ou remplace l'ancien.