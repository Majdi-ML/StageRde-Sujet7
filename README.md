# StageRde-Sujet7
Ce projet est une plateforme de gestion des offres professionnelles, y compris les offres de stages et d'emplois. L'objectif principal de cette plateforme est de simplifier les processus de collecte des candidatures et de partage des candidatures avec les professionnels.

## Processus actuel (manuel)
Actuellement, les processus de collecte des candidatures et de partage des candidatures avec les professionnels sont réalisés manuellement. Voici une description des étapes du processus actuel :

Collecte des candidatures : Les candidats intéressés par une offre professionnelle soumettent leurs candidatures via un formulaire en ligne. Les informations fournies par les candidats sont collectées manuellement.

Partage des candidatures avec les professionnels : Une fois les candidatures collectées, elles sont partagées avec les professionnels concernés par le biais de fichiers ou d'e-mails. Les professionnels examinent ensuite les candidatures et prennent des décisions.

## Technologies utilisées
Ce projet est développé en utilisant les technologies suivantes :

Symfony 5 : Framework PHP utilisé pour développer l'application web.
MariaDB : Système de gestion de base de données relationnelle utilisé pour stocker les données des offres professionnelles et des candidatures.

##Configuration du projet
Avant de pouvoir exécuter l'application, vous devez effectuer les étapes suivantes :

1-Assurez-vous d'avoir installé PHP, Symfony 5 et MariaDB sur votre système.

2-Clonez ce dépôt de code sur votre machine locale.


git clone https://github.com/votre-utilisateur/plateforme-offres-professionnelles.git

3-Configurez la base de données MariaDB en créant une nouvelle base de données pour le projet.

4-Mettez à jour le fichier .env avec les informations de connexion à votre base de données.


DATABASE_URL=mysql://user:password@localhost:port/nom_base_de_donnees

5-Installez les dépendances du projet en exécutant la commande suivante dans le répertoire du projet :

composer install

6-Exécutez les migrations pour créer les tables de base de données nécessaires.

php bin/console doctrine:migrations:migrate

7-Lancez l'application Symfony en utilisant le serveur de développement intégré.


symfony server:start

L'application sera accessible à l'adresse http://localhost:8000.

Contribuer
Les contributions à ce projet sont les bienvenues. Si vous souhaitez contribuer, veuillez suivre les étapes suivantes :

## Fork ce dépôt de code.

1-Créez une branche pour votre fonctionnalité ou correction de bug.

git checkout -b ma-branche

2-Effectuez les modifications nécessaires et testez-les.

3-Soumettez une demande de pull avec vos modifications.

Nous apprécions vos contributions pour améliorer cette plateforme de gestion des offres professionnelles.

N'hésitez pas à personnaliser ce contenu en fonction des détails spécifiques de votre projet. Ajoutez des sections supplémentaires pour décrire les fonctionnalités, les instructions d'installation, les captures d'écran, etc.