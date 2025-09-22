#!/bin/bash

# Setup script for Agri-Cult development environment
# Usage: ./setup.sh

set -e

echo "🌾 Configuration de l'environnement de développement Agri-Cult"
echo "================================================================"

# Check PHP version
echo "📋 Vérification des prérequis..."
php_version=$(php -v | head -n1 | cut -d" " -f2 | cut -d"." -f1-2)
required_php="8.2"

if ! command -v php &> /dev/null; then
    echo "❌ PHP n'est pas installé"
    exit 1
fi

if [[ "$(printf '%s\n' "$required_php" "$php_version" | sort -V | head -n1)" != "$required_php" ]]; then
    echo "❌ PHP $required_php+ requis (version actuelle: $php_version)"
    exit 1
fi

echo "✅ PHP $php_version détecté"

# Check Composer
if ! command -v composer &> /dev/null; then
    echo "❌ Composer n'est pas installé"
    echo "💡 Installez Composer: https://getcomposer.org/download/"
    exit 1
fi

echo "✅ Composer détecté"

# Check Node.js
if ! command -v node &> /dev/null; then
    echo "❌ Node.js n'est pas installé"
    echo "💡 Installez Node.js: https://nodejs.org/"
    exit 1
fi

node_version=$(node -v | cut -d"v" -f2 | cut -d"." -f1)
if [ "$node_version" -lt 16 ]; then
    echo "⚠️ Node.js 16+ recommandé (version actuelle: $(node -v))"
fi

echo "✅ Node.js $(node -v) détecté"

# Install PHP dependencies
echo ""
echo "📦 Installation des dépendances PHP..."
if [ -f "composer.lock" ]; then
    composer install
else
    echo "⚠️ composer.lock non trouvé, exécution de composer update..."
    composer update
fi

# Install Node.js dependencies
echo ""
echo "📦 Installation des dépendances Node.js..."
if npm install; then
    echo "✅ Dépendances Node.js installées"
else
    echo "⚠️ Erreur avec npm install, tentative avec --legacy-peer-deps..."
    npm install --legacy-peer-deps
fi

# Setup environment file
echo ""
echo "⚙️ Configuration de l'environnement..."
if [ ! -f ".env.local" ]; then
    if [ -f ".env" ]; then
        cp .env .env.local
        echo "✅ Fichier .env.local créé"
        echo "💡 Modifiez .env.local avec vos paramètres de base de données"
    else
        echo "⚠️ Fichier .env non trouvé"
    fi
else
    echo "✅ Fichier .env.local existe déjà"
fi

# Build assets
echo ""
echo "🏗️ Build des assets..."
npm run dev

echo ""
echo "🎉 Configuration terminée !"
echo ""
echo "📋 Prochaines étapes :"
echo "   1. Modifier .env.local avec vos paramètres de BDD"
echo "   2. Créer la base de données :"
echo "      php bin/console doctrine:database:create"
echo "   3. Exécuter les migrations :"
echo "      php bin/console doctrine:migrations:migrate"
echo "   4. Lancer le serveur de développement :"
echo "      symfony server:start"
echo "      ou"
echo "      php -S localhost:8000 -t public/"
echo ""
echo "📚 Documentation complète dans README.md et CONTRIBUTING.md"
echo ""
echo "🤝 Bon développement sur Agri-Cult ! 🌾"