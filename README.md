# Agri-Cult

Projet de gestion d’exploitation agricole — Symfony & EasyAdmin

## Lancer avec Docker

Environnements disponibles: développement (par défaut) et production (override).

### Prérequis
- Docker et Docker Compose installés

### Démarrage en développement

```bash
# 1) Démarrer les services (Traefik, Nginx, PHP-FPM, Postgres, Mailpit, Mercure, Assets)
docker compose up -d --build

# 2) Vérifier que tout est prêt
docker compose ps
docker compose logs -f app

# 3) Initialiser la base si besoin (création du schéma)
docker compose exec app php bin/console doctrine:schema:update --force --complete

# 4) (Optionnel) Importer les données météo Gavray 2024
docker compose exec app php bin/console app:import-meteo-gavray

# 5) Accès
# - Application: http://localhost
# - Traefik dashboard (dev): http://localhost:8080
# - Mailpit: http://localhost:8025
```

Commandes utiles en dev:

```bash
# Arrêter
docker compose down

# Voir les logs d’un service
docker compose logs -f app
docker compose logs -f nginx
docker compose logs -f traefik

# Recompiler les assets en watch (déjà lancé via service assets)
docker compose logs -f assets
```

### Démarrage en production (override)

L’override `compose.prod.yaml` active `APP_ENV=prod`, installe les dépendances sans dev et réchauffe le cache.

```bash
# Build et lancement (prod override)
docker compose -f compose.yaml -f compose.prod.yaml up -d --build

# Lancer un build d’assets unique (si nécessaire)
docker compose run --rm assets_build

# Vérifier
docker compose ps
docker compose logs -f app

# Arrêter
docker compose -f compose.yaml -f compose.prod.yaml down
```

Notes:
- En dev, l’opcache est configuré pour recharger automatiquement les changements.
- La base Postgres est persistée dans le volume `db_data`.
- Les routes HTTP passent par Traefik vers Nginx puis PHP-FPM.

## Propriété

Ce projet est la propriété de **jeremyw30**.  
Toute contribution est la bienvenue, mais le propriétaire reste **jeremyw30**.

## Collaboration

- Les collaborateurs peuvent coder, proposer des améliorations et participer au développement.  
- Les décisions finales et la gestion du projet sont réservées au propriétaire.  

## Rôles

- **Administrateur (Owner)** :  
	- **jeremyw30**  
	- Gestion complète du projet, décisions finales, validation des contributions, gestion des accès.  

- **Modérateur (Collaborator)** :  
	- **Antoine-Sevec**  
	- Peut développer, proposer des améliorations et signaler des bugs.  
	- Ne dispose pas des droits d’administration ni de gestion des accès.  

## Licence

Ce projet est sous licence MIT.  
Voir le fichier [LICENSE](LICENSE) pour les détails.  

---

**Contact propriétaire** :  
- jeremy.wengler@live.be  
- webmaster@agri-cult.be  
