# This is a minimal set of ANSI/VT100 color codes
_END=$'\x1b[0m
_BOLD=$'\x1b[1m
_UNDER=$'\x1b[4m
_REV=$'\x1b[7m

# Colors
_GREY=$'\x1b[30m
_RED=$'\x1b[31m
_GREEN=$'\x1b[32m
_YELLOW=$'\x1b[33m
_BLUE=$'\x1b[34m
_PURPLE=$'\x1b[35m
_CYAN=$'\x1b[36m
_WHITE=$'\x1b[37m

# Colored backgrounds
_IGREY=$'\x1b[40m
_IRED=$'\x1b[41m
_IGREEN=$'\x1b[42m
_IYELLOW=$'\x1b[43m
_IBLUE=$'\x1b[44m
_IPURPLE=$'\x1b[45m
_ICYAN=$'\x1b[46m
_IWHITE=$'\x1b[47m


COMPOSER        = $(EXEC_PHP) composer.phar
SYMFONY         = $(EXEC_PHP) bin/console

HOSTNAME 			=  app-engine.fr
APP_NAME 			=  "APP ENGINE"

DATABASE_USER		= root
DATABASE_PASSWORD	= root
DATABASE_HOST		= 127.0.0.1
DATABASE_PORT		= 8889
DATABASE_NAME		= prod_la_chaumotte

TRUSTED_PROXIES		= 80.14.233.112,192.168.120.6


db_update:

	@echo "\n${_GREEN}Mise à jours des tables de la base de donnée en cours ...${_END}\n"

	@php $(SYMFONY) doctrine:schema:update --force
	@echo "- Mises à jours des tables ${_GREEN}[OK]${_END}"

clean:

	@echo "\n${_GREEN}Suppression des caches en cours ...${_END}\n"
	
	@rm -rf ./src/Controller || true
	@rm -rf ./src/Entity || true
	@rm -rf ./src/Form || true	
	@rm -rf ./src/Repository || true
	@rm -rf ./src/Migrations || true
	@rm -rf ./src/DataFixtures/AppFixtures.php || true
	@rm -rf ./translations || true
	@echo "- Suppression des dossiers symfony de base non utilisés ${_GREEN}[OK]${_END}"
	
	@rm -rf ./var/cache || true
	@echo "- Suppression des caches généraux ${_GREEN}[OK]${_END}"

	@rm -rf ./public/assets/media/cache || true
	@echo "- Suppression des caches images ${_GREEN}[OK]${_END}"

	@rm -rf ./var/log || true
	@echo "- Suppression des caches de logs ${_GREEN}[OK]${_END}"

	@rm -rf .env.bak || true
	@rm -rf composer.json.bak || true
	@rm -rf manifest.json.bak || true
	@echo "- Suppression des fichiers temporaires .bak ${_GREEN}[OK]${_END}"

	@rm -rf ./public/build || true
	@mkdir  ./public/build
	@echo "- Suppression du dossier build ${_GREEN}[OK]${_END}"

	@echo "\n${_GREEN} [OK] Suppression des caches terminé !${_END}\n"

setdev:

	@sed -i.bak s/APP_ENV=prod/APP_ENV=dev/g .env
	@sed -i.bak s/APP_DEBUG=0/APP_DEBUG=1/g .env
	@sed -i.bak s/\"optimize-autoloader\":\ true/\"optimize-autoloader\":\ false/g composer.json
	@sed -i.bak s/\"classmap-authoritative\":\ true/\"classmap-authoritative\":\ false/g composer.json
	@sed -i.bak s/\"apcu-autoloader\":\ true/\"apcu-autoloader\":\ false/g composer.json
	@echo "\n- Modifications du fichier composer.json ${_GREEN}[OK]${_END}\n"

	@echo "\n${_GREEN}Mise à jours des dépendances en cours ...${_END}\n"
	@php $(COMPOSER) update
	@echo "\n- Mises à jours des dépendances ${_GREEN}[OK]${_END}\n"

	@echo "\n${_GREEN} Regénération des fichiers de l'autoload en cours ...${_END}\n"
	@php $(COMPOSER)  dump-autoload
	@echo "\n- Regénération des fichiers de l'autoload ${_GREEN}[OK]${_END}\n"

	@echo "${_GREEN} [OK] Mise en mode "dev" terminé !${_END}\n"

setprod:

	@sed -i.bak s/APP_ENV=dev/APP_ENV=prod/g .env
	@sed -i.bak s/APP_DEBUG=1/APP_DEBUG=0/g .env
	@sed -i.bak s/\"optimize-autoloader\":\ false/\"optimize-autoloader\":\ true/g composer.json
	@sed -i.bak s/\"classmap-authoritative\":\ false/\"classmap-authoritative\":\ true/g composer.json
	@sed -i.bak s/\"apcu-autoloader\":\ false/\"apcu-autoloader\":\ true/g composer.json
	@echo "\n- Modifications du fichier composer.json ${_GREEN}[OK]${_END}\n"

	@php $(COMPOSER) update -o -a --apcu-autoloader
	@echo "\n- Mises à jours des dépendances ${_GREEN}[OK]${_END}\n"

	@php $(COMPOSER) dump-autoload -o -a --apcu
	@echo "\n- Regénération des fichiers de l'autoload ${_GREEN}[OK]${_END}\n"

	@echo "- Mise en mode "prod" ${_GREEN}[OK]${_END}\n"

install:

	@echo "\n${_GREEN}Installation de l'application en cours ...${_END}\n"

	@rm ./public/robots.txt || true
	@cp ./setup/robots.txt ./public/robots.txt
	@sed -i.bak s/HOSTNAME/$(HOSTNAME)/g ./public/robots.txt
	@rm ./public/robots.txt.bak
	@echo "- Création du fichier robots.txt ${_GREEN}[OK]${_END}"

	@rm ./public/manifest.json || true
	@cp ./setup/manifest.json ./public/manifest.json
	@sed -i.bak s/APP_NAME/$(APP_NAME)/g ./public/manifest.json
	@rm ./public/manifest.json.bak
	@echo "- Création du fichier manifest.json${_GREEN}[OK]${_END}"

	@rm .env || true
	@cp ./setup/.env.dist .env
	@sed -i.bak s/DATABASE_USER/$(DATABASE_USER)/g .env
	@sed -i.bak s/DATABASE_PASSWORD/$(DATABASE_PASSWORD)/g .env
	@sed -i.bak s/DATABASE_HOST/$(DATABASE_HOST)/g .env
	@sed -i.bak s/DATABASE_PORT/$(DATABASE_PORT)/g .env
	@sed -i.bak s/DATABASE_NAME/$(DATABASE_NAME)/g .env
	@sed -i.bak s/TRUSTED_PROXIES=TRUSTED_PROXIES/TRUSTED_PROXIES=$(TRUSTED_PROXIES)/g .env
	@rm .env.bak
	@echo "- Création du fichier d'environnement .env ${_GREEN}[OK]${_END}\n"

	@rm -rf ./public/build
	@mkdir ./public/build


	@echo "\n${_GREEN}Mise à jours de composer en cours ...${_END}\n"
	@php $(COMPOSER) self-update
	@echo "\n- Mises à jours de composer ${_GREEN}[OK]${_END}\n"

	@echo "\n${_GREEN}Installation des dépendances en cours ...${_END}\n"
	@php $(COMPOSER) install
	@echo "- Installation des dépendances ${_GREEN}[OK]${_END}"

	@make clean
		
	@php $(SYMFONY) asset:install
	@echo "- Installation des assets ${_GREEN}[OK]${_END}"	

	@make setdev

	@php $(COMPOSER) dump-autoload
	@echo "\n- Regénération des fichiers de l'autoload ${_GREEN}[OK]${_END}\n"


	@php $(SYMFONY) doctrine:database:drop --force | true
	@php $(SYMFONY) doctrine:database:create
	@echo "\n- Création de la base de donnée : $(DATABASE_NAME) ${_GREEN}[OK]${_END}"

	@php $(SYMFONY) doctrine:schema:update --force
	@echo "\n- Création des tables de la base de donnée ${_GREEN}[OK]${_END}\n"

	yes | php $(SYMFONY) doctrine:fixtures:load
	@echo "\n- Mise à jours des données par défaut ${_GREEN}[OK]${_END}\n"

	@echo "\n${_GREEN} [OK] L'installation est terminée !${_END}\n\n"

reset:

	@php $(SYMFONY) doctrine:database:drop --force | true
	@php $(SYMFONY) doctrine:database:create
	@echo "\n- Création de la base de donnée : $(DATABASE_NAME) ${_GREEN}[OK]${_END}"

	@php $(SYMFONY) doctrine:schema:update --force
	@echo "\n- Création des tables de la base de donnée ${_GREEN}[OK]${_END}\n"

	yes | php $(SYMFONY) doctrine:fixtures:load
	@echo "\n- Mise à jours des données par défaut ${_GREEN}[OK]${_END}\n"

	@echo "\n${_GREEN} [OK] L'installation est terminée !${_END}\n\n"