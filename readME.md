### Requirements:

    - Symfony CLI
    - Composer
    - MySQL/ PostgreSQL/ MariaDB

### Initialisation du projet : 

    - composer install  #Installer toutes les librairies utilisées dans le projet
    - Modifier la variable d'environnement relative à la base de données
    - php bin/console doctrine:database:create  #Création de la base de données

### Mise à jour du schèma de la base de données :

    - php bin/console make:migration
    - php bin/console doctrine:migration:migrate

### Importation de l'utilisateur par défaut:

    - php bin/console d:f:l

### Lancer le serveur 

    - symfony serve 

 Lien : https://localhost:8000/