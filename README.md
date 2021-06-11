## Bienvenue sur notre repo du Projet Reservations.

Ce projet a été réalisé dans le cadre du cours de WPWD de l'EPFC.

Les membres du groupe du projet Reservations sont :
<br>
[Radad El Jaidi](https://github.com/Radad-J)
<br>
[Nathan](https://github.com/mvker)
<br>
[Maxime](https://github.com/M-Boudart)
<br>
[Adam](https://github.com/adamprefo)

Vous pourrez retrouver l'avancement des tâches de chacun des membres sur le [board Trello](https://trello.com/b/y85nxpRZ/wpwd-groupe-1) dédié au groupe.

Si vous souhaitez voir la participation de chacun des membres, [cliquez ici](https://github.com/Radad-J/Reservations/graphs/contributors)

Chacun des membres a pu se familiariser avec le travail en équipe, le versioning d'un projet sur github, les méthodes GIT et surtout Laravel.

## Comment l'installer

In the terminal, run :
```
git clone https://github.com/Radad-J/Reservations.git
```
Then :
```
php composer.phar install
```
In the root directory, make sure to rename the ".env.example" file to ".env"

Create a database named "reservations" in your PhpMyAdmin dashboard or MySQL CLI.
```
CLI Query :
CREATE DATABASE reservations;
```
When that's done, run the migrations in your terminal :
```
php artisan migrate
```
Then run the seeders :
```
php artisan db:seed
```

To run the project in the local server :
```
php artisan serve
```

You're all set !
