```
 _______   ______  __       __        ______   ______  
|       \ /      \|  \     |  \      /      \ /      \ 
| ▓▓▓▓▓▓▓\  ▓▓▓▓▓▓\ ▓▓     | ▓▓     |  ▓▓▓▓▓▓\  ▓▓▓▓▓▓\
| ▓▓__/ ▓▓ ▓▓__| ▓▓ ▓▓     | ▓▓     | ▓▓__| ▓▓ ▓▓___\▓▓
| ▓▓    ▓▓ ▓▓    ▓▓ ▓▓     | ▓▓     | ▓▓    ▓▓\▓▓    \ 
| ▓▓▓▓▓▓▓| ▓▓▓▓▓▓▓▓ ▓▓     | ▓▓     | ▓▓▓▓▓▓▓▓_\▓▓▓▓▓▓\
| ▓▓     | ▓▓  | ▓▓ ▓▓_____| ▓▓_____| ▓▓  | ▓▓  \__| ▓▓
| ▓▓     | ▓▓  | ▓▓ ▓▓     \ ▓▓     \ ▓▓  | ▓▓\▓▓    ▓▓
 \▓▓      \▓▓   \▓▓\▓▓▓▓▓▓▓▓\▓▓▓▓▓▓▓▓\▓▓   \▓▓ \▓▓▓▓▓▓ 
                                                       
```
# Application Web Bagel-Quizz

Réalisation d'une version 'simple' d'un quiz.

# _Commencer_

Ces instructions vous donneront une copie du projet opérationnel sur
votre machine locale à des fins de développement et de test. 

# _Conditions préalables // Installation_

## Pour Windows 10\11 

Configuration requise pour que le projet soit opérationnel sur votre ordinateur local.

au minimun [XAMPP](https://www.apachefriends.org/fr/index.html) est requis pour faire marcher le site 

- Import depuis PhpMyAdmin de la base de données avec le fichier : :
     - "db-import-MPD-4-phpMyAdmin.sql" 
     - Chemin : bagel-quizz\Src\sql\db-import-MPD-4-phpMyAdmin.sql

a ajouter dans xampp\apache\conf\extra\httpd-vhosts.conf

```sh
# change [ton_chemin] par le chemin ou tu a placer ton dossier
```
```html
<VirtualHost *:80>
    ServerAdmin webmaster@burger-quizz.fr
    DocumentRoot "[ton_chemin]/bagel-quizz/public"
    ServerName bagel_quizz
    ServerAlias www.bagel_quizz.fr
    ErrorLog "logs/bagel-quizz-error.log"
    CustomLog "logs/bagel-quizz-access.log" common
	<Directory [ton_chemin]/bagel-quizz/public>
		Options Indexes FollowSymLinks Includes
		AllowOverride All
		Require all granted
	</Directory>
	RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L,NE]
</VirtualHost>

<VirtualHost *:443>
    ServerAdmin webmaster@burger-quizz.fr
    DocumentRoot "[ton_chemin]/bagel-quizz/public"
    ServerName bagel_quizz
    ServerAlias www.bagel_quizz.fr
    ErrorLog "logs/bagel-quizz-error.log"
    CustomLog "logs/bagel-quizz-access.log" common
	SSLEngine on
	SSLCertificateFile [ton_chemin]/bagel-quizz/config/cert/www.bagel_quizz.fr.pem
	SSLCertificateKeyFile [ton_chemin]/bagel-quizz/config/cert/www.bagel_quizz.fr-key.pem
	<Directory [ton_chemin]/bagel-quizz/public>
		Options Indexes FollowSymLinks Includes
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

 modifie dans le fichier suivant  Windows\System32\drivers\ect\hosts

et ajoute la ligne suivante :

	127.0.0.1		www.bagel_quizz.fr

reload XAMPP 

C'est bon maintenant tu peux jouer au jeu Bagel-Quizz pour cela lance dans ton navigateur : ```www.bagel_quizz.fr ``` ou clic [ICI](https://www.bagel_quizz.fr/)

## Auteur

**_PALLAS_**


