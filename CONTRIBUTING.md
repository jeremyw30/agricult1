# Guide de contribution - Agri-Cult 🤝

Merci de votre intérêt pour contribuer à Agri-Cult ! Ce document présente les guidelines pour une collaboration efficace et sécurisée.

## 🚀 Démarrage rapide

### 1. Accès au projet
- Le dépôt est **privé** - contactez Jérémy WENGLER pour obtenir l'accès
- Un accord de confidentialité/contribution doit être signé avant l'accès au code sensible
- Les nouveaux contributeurs reçoivent le rôle "Write" ou "Maintain" (pas Owner)

### 2. Onboarding (nouveaux contributeurs)
- Réunion d'onboarding de 30-60 minutes obligatoire
- Présentation de l'architecture et des objectifs
- Attribution des premières tâches et accès nécessaires

## 🔒 Sécurité et confidentialité

### Accord de contribution
Tous les contributeurs doivent signer l'accord suivant avant d'accéder au code :

```
ACCORD DE CONFIDENTIALITÉ & CONTRIBUTION - AGRI-CULT

Par la présente, [Nom du collaborateur] s'engage à :
- Garder strictement confidentielles toutes les informations, codes sources, 
  documents et données partagés dans le cadre du projet Agri-Cult
- Ne pas divulguer ces informations à des tiers
- Céder les contributions (code, docs, assets) sous licence interne 
  au propriétaire du projet Jérémy WENGLER, sauf accord écrit contraire

Durée : 3 ans après la dernière contribution 
(ou jusqu'à accord écrit différent)

Signatures : 
Propriétaire : _________________ Date : __/__/____
Collaborateur : _______________ Date : __/__/____

Note : Ce document est un modèle simple. Pour une protection légale 
complète, consulter un avocat.
```

### Bonnes pratiques de sécurité
- ✅ Accès minimum requis pour les tâches assignées
- ✅ Pas de partage de comptes admin, clés ou mots de passe
- ✅ Utiliser un gestionnaire de mots de passe (1Password, Bitwarden)
- ✅ Backups réguliers du dépôt privé
- ❌ Ne jamais commiter de secrets ou credentials
- ❌ Ne pas ouvrir le code sans autorisation

## 🌳 Workflow Git

### Structure des branches
- `main` : branche protégée, merge uniquement via PR + review obligatoire
- `feat/<description>` : nouvelles fonctionnalités
- `fix/<description>` : corrections de bugs
- `hotfix/<description>` : corrections urgentes

### Exemple de nommage
```bash
feat/user-authentication
feat/parcelle-management-ui
fix/chat-room-creation-bug
hotfix/security-vulnerability-fix
```

### Processus de Pull Request

1. **Créer une branche**
   ```bash
   git checkout -b feat/ma-nouvelle-fonctionnalite
   ```

2. **Développer et tester**
   ```bash
   # Développement avec commits atomiques
   git add .
   git commit -m "feat: add user authentication system"
   ```

3. **Ouvrir une Pull Request**
   - Titre clair et descriptif
   - Description détaillée avec sections :
     - **What** : Qu'est-ce qui a été fait
     - **Why** : Pourquoi cette modification
     - **How** : Comment cela fonctionne
   - Captures d'écran si modification UI
   - Checklist des tests effectués

4. **Review obligatoire**
   - Au moins 1 approbation requise avant merge
   - Tests CI doivent passer (si configurés)
   - Commentaires constructifs encouragés

5. **Merge**
   - Merge via squash pour un historique propre
   - Suppression automatique de la branche feature

### Template de Pull Request
```markdown
## 📋 Description
Brève description de la modification

## ✨ Changements
- [ ] Nouveau système d'authentification
- [ ] Tests unitaires ajoutés
- [ ] Documentation mise à jour

## 🧪 Tests effectués
- [ ] Tests unitaires passent
- [ ] Tests manuels UI
- [ ] Tests de régression

## 📸 Captures d'écran
(Si applicable)

## 🔗 Issues liées
Closes #123
```

## 🛠 Standards de développement

### Code Style
- **PHP** : PSR-12, utiliser PHP CS Fixer
- **JavaScript** : ESLint + Prettier
- **CSS** : BEM methodology
- **Twig** : Indentation 4 espaces

### Tests
- Tests unitaires obligatoires pour les nouvelles fonctionnalités
- Coverage minimum : 70%
- Tests d'intégration pour les API critiques

### Commits
Format conventionnel :
```
type(scope): description

feat(auth): add user login system
fix(chat): resolve room creation bug
docs(readme): update installation guide
test(user): add unit tests for user entity
```

Types : `feat`, `fix`, `docs`, `test`, `refactor`, `style`, `chore`

## 📊 Gestion des tâches

### Workflow Trello/GitHub Projects
1. **💡 Idées** : Backlog brut, brainstorming
2. **🧭 Priorisé** : Sprint backlog, tâches prêtes
3. **🛠 En cours** : Maximum 1-3 cartes par personne
4. **🔁 Revue/QA** : En attente de validation
5. **✅ Terminé** : Tâches complétées
6. **🐛 Bugs** : Problèmes à corriger

### Format des cartes
- **Titre** : Clair et actionnable
- **Description** : Contexte et critères d'acceptation
- **Estimation** : 1 (facile), 2 (moyen), 3 (complexe)
- **Labels** : frontend, backend, database, urgent, etc.
- **Assigné** : Responsable de la tâche

### Rituels d'équipe
- **Hebdomadaire** : Réunion 30 min (planning, review, blockers)
- **Daily** : Point rapide 10-15 min si nécessaire
- **Sprint Review** : Démonstration des fonctionnalités terminées

## 🎯 Tâches d'onboarding (7-14 premiers jours)

### Phase 1 : Découverte (Jours 1-3)
- [ ] Lire README et CONTRIBUTING
- [ ] Comprendre l'architecture (entités : Parcelle, Machine, Animal, Batiment)
- [ ] Explorer le code : contrôleurs, entités, templates
- [ ] Installer l'environnement local (XAMPP, PHP 8.2+, Composer, NPM)

### Phase 2 : Première contribution (Jours 4-7)
- [ ] Corriger un bug mineur ou ajouter un petit composant UI
- [ ] Créer une première PR pour évaluer le workflow
- [ ] Participer à une review de code

### Phase 3 : Montée en compétences (Jours 8-14)
- [ ] Comprendre la base de données et les relations
- [ ] Créer une migration simple ou ajouter des tests
- [ ] Configurer CI basique (lint, tests)

## 🚀 Installation développeur

### Prérequis
```bash
# Vérifier les versions
php --version        # >= 8.2
composer --version   # >= 2.0
node --version       # >= 16
npm --version        # >= 8
```

### Setup complet
```bash
# 1. Cloner le repo (accès requis)
git clone git@github.com:jeremyw30/agricult1.git
cd agricult1

# 2. Installation
composer install
npm install

# 3. Configuration
cp .env .env.local
# Modifier DATABASE_URL dans .env.local

# 4. Base de données
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load  # données de test

# 5. Assets
npm run dev

# 6. Lancer le serveur
symfony server:start
# ou
php -S localhost:8000 -t public/
```

### Commandes de développement
```bash
# Développement frontend
npm run watch          # Auto-rebuild
npm run dev           # Build development
npm run build         # Build production

# Backend
php bin/console cache:clear
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate

# Tests
php bin/phpunit
npm run test          # Si configuré

# Code quality
vendor/bin/php-cs-fixer fix  # Si configuré
vendor/bin/phpstan analyse   # Si configuré
```

## 📞 Communication

### Canaux de communication
- **Issues GitHub** : Bugs, améliorations, questions techniques
- **Pull Requests** : Reviews de code, discussions techniques
- **Réunions** : Planning, blockers, décisions architecturales

### Rôles et responsabilités
- **Lead Dev / Product Owner** : Jérémy WENGLER
  - Décisions finales sur architecture, versions, sécurité, déploiement
  - Accès aux ressources critiques (clés, domaines, comptes Stripe)
- **Dev / Contributor** : Autres membres
  - Développement des fonctionnalités assignées
  - Participation aux reviews
  - Respect des guidelines

## 📚 Ressources utiles

### Documentation technique
- [Symfony Documentation](https://symfony.com/doc/current/index.html)
- [Doctrine ORM](https://www.doctrine-project.org/projects/doctrine-orm/en/latest/)
- [Twig](https://twig.symfony.com/doc/3.x/)
- [Bootstrap 5](https://getbootstrap.com/docs/5.3/)

### Standards et conventions
- [PSR-12](https://www.php-fig.org/psr/psr-12/)
- [Conventional Commits](https://www.conventionalcommits.org/)
- [Git Flow](https://nvie.com/posts/a-successful-git-branching-model/)

---

## 🤝 Questions ?

N'hésitez pas à :
1. Consulter cette documentation
2. Créer une issue GitHub pour les questions techniques
3. Contacter Jérémy WENGLER pour les questions de process ou d'accès

**Bienvenue dans l'équipe Agri-Cult !** 🌾