#!/bin/bash

# Validation script for Agri-Cult development environment
# Usage: ./validate-setup.sh

set -e

echo "🔍 Validation de l'environnement de développement Agri-Cult"
echo "============================================================"

errors=0

# Function to check command
check_command() {
    if command -v "$1" &> /dev/null; then
        echo "✅ $1 est installé"
        if [ -n "$2" ]; then
            version=$($1 $2 2>/dev/null | head -n1)
            echo "   Version: $version"
        fi
    else
        echo "❌ $1 n'est pas installé"
        errors=$((errors + 1))
    fi
}

# Function to check file
check_file() {
    if [ -f "$1" ]; then
        echo "✅ $1 existe"
    else
        echo "❌ $1 manquant"
        errors=$((errors + 1))
    fi
}

# Function to check directory
check_directory() {
    if [ -d "$1" ]; then
        echo "✅ $1/ existe"
    else
        echo "❌ $1/ manquant"
        errors=$((errors + 1))
    fi
}

echo "🛠️ Outils de développement"
echo "----------------------------"
check_command "php" "--version"
check_command "composer" "--version"
check_command "node" "--version"
check_command "npm" "--version"

echo ""
echo "📁 Structure du projet"
echo "----------------------"
check_file "composer.json"
check_file "package.json"
check_file ".env"
check_file "README.md"
check_file "CONTRIBUTING.md"
check_directory "src"
check_directory "templates"
check_directory "config"

echo ""
echo "🔧 Dépendances"
echo "--------------"
check_directory "vendor"
if [ -d "vendor" ]; then
    if [ -f "vendor/autoload.php" ]; then
        echo "✅ Autoload PHP configuré"
    else
        echo "❌ Autoload PHP manquant"
        errors=$((errors + 1))
    fi
fi

check_directory "node_modules"
if [ -d "node_modules" ]; then
    if [ -f "node_modules/.bin/encore" ]; then
        echo "✅ Webpack Encore installé"
    else
        echo "❌ Webpack Encore manquant"
        errors=$((errors + 1))
    fi
fi

echo ""
echo "⚙️ Configuration"
echo "----------------"
check_file ".env.local"
if [ -f ".env.local" ]; then
    if grep -q "DATABASE_URL" .env.local; then
        echo "✅ DATABASE_URL configurée"
    else
        echo "⚠️ DATABASE_URL non configurée dans .env.local"
    fi
fi

echo ""
echo "🏗️ Build et assets"
echo "-------------------"
if [ -d "public/build" ]; then
    echo "✅ Assets compilés trouvés"
else
    echo "⚠️ Assets non compilés (exécuter 'npm run dev')"
fi

echo ""
echo "📋 Commandes de base"
echo "--------------------"
if php bin/console --version >/dev/null 2>&1; then
    echo "✅ Console Symfony fonctionne"
    version=$(php bin/console --version 2>/dev/null)
    echo "   $version"
else
    echo "❌ Console Symfony ne fonctionne pas"
    errors=$((errors + 1))
fi

if npm run --silent >/dev/null 2>&1; then
    echo "✅ Scripts NPM disponibles"
else
    echo "❌ Scripts NPM non disponibles"
    errors=$((errors + 1))
fi

echo ""
echo "📚 Documentation"
echo "----------------"
check_file "CHANGELOG.md"
check_file "DECISIONS.md"
check_file "COLLABORATION_AGREEMENT_TEMPLATE.md"
check_file "MESSAGE_TEMPLATES.md"
check_directory ".github"

if [ -d ".github/ISSUE_TEMPLATE" ]; then
    echo "✅ Templates d'issues configurés"
else
    echo "❌ Templates d'issues manquants"
    errors=$((errors + 1))
fi

if [ -f ".github/PULL_REQUEST_TEMPLATE.md" ]; then
    echo "✅ Template de PR configuré"
else
    echo "❌ Template de PR manquant"
    errors=$((errors + 1))
fi

echo ""
echo "🔒 Sécurité et Git"
echo "------------------"
if [ -f ".gitignore" ]; then
    echo "✅ .gitignore présent"
    if grep -q "\.env\.local" .gitignore; then
        echo "✅ Fichiers d'environnement ignorés"
    else
        echo "⚠️ Vérifier l'exclusion des fichiers sensibles"
    fi
else
    echo "❌ .gitignore manquant"
    errors=$((errors + 1))
fi

if git --version >/dev/null 2>&1; then
    echo "✅ Git disponible"
    if git status >/dev/null 2>&1; then
        echo "✅ Dépôt Git initialisé"
    else
        echo "❌ Pas dans un dépôt Git"
        errors=$((errors + 1))
    fi
else
    echo "❌ Git non installé"
    errors=$((errors + 1))
fi

echo ""
echo "📊 Tests recommandés"
echo "--------------------"
echo "💡 Pour vérifier que tout fonctionne :"
echo "   1. Compiler les assets : npm run dev"
echo "   2. Créer la BDD : php bin/console doctrine:database:create"
echo "   3. Migrations : php bin/console doctrine:migrations:migrate"
echo "   4. Serveur : symfony server:start ou php -S localhost:8000 -t public/"
echo "   5. Tests : php bin/phpunit (si configuré)"

echo ""
echo "📋 Résumé"
echo "----------"
if [ $errors -eq 0 ]; then
    echo "🎉 Environnement correctement configuré !"
    echo "✅ Tous les éléments essentiels sont présents"
    echo ""
    echo "🚀 Prêt pour le développement Agri-Cult !"
else
    echo "⚠️ $errors problème(s) détecté(s)"
    echo ""
    echo "💡 Actions recommandées :"
    if [ ! -d "vendor" ]; then
        echo "   • Installer les dépendances PHP : composer install"
    fi
    if [ ! -d "node_modules" ]; then
        echo "   • Installer les dépendances Node : npm install"
    fi
    if [ ! -f ".env.local" ]; then
        echo "   • Créer le fichier .env.local : cp .env .env.local"
    fi
    echo ""
    echo "🔧 Consulter README.md et CONTRIBUTING.md pour plus de détails"
fi

echo ""
echo "📞 Support"
echo "----------"
echo "En cas de problème :"
echo "• Documentation : README.md, CONTRIBUTING.md"
echo "• Issues GitHub : https://github.com/jeremyw30/agricult1/issues"
echo "• Contact : Jérémy WENGLER"