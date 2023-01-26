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
# Application Web Tennis Club

Réalisation d'une version 'simple' d'un Club de Tennis.

# _Commencer_

Ces instructions vous donneront une copie du projet opérationnel sur
votre machine locale à des fins de développement et de test. 

# _Conditions préalables // Installation_

## Pour Windows 10\11 

Configuration requise pour que le projet soit opérationnel sur votre ordinateur local.

au minimun [XAMPP](https://www.apachefriends.org/fr/index.html) est requis pour faire marcher le site 

- Import depuis PhpMyAdmin de la base de données avec le fichier : :
     - "db-import-MPD-4-phpMyAdmin.sql" 
     - Chemin : tennis\Src\sql\db-import-MPD-4-phpMyAdmin.sql

a ajouter dans xampp\apache\conf\extra\httpd-vhosts.conf

```sh
# change [ton_chemin] par le chemin ou tu a placer ton dossier
```
```html
<VirtualHost *:80>
    ServerAdmin webmaster@tennis.fr
    DocumentRoot "[ton_chemin]/tennis/public"
    ServerName tennis
    ServerAlias www.tennis.org
    ErrorLog "logs/tennis-error.log"
    CustomLog "logs/tennis-access.log" common
	<Directory [ton_chemin]/tennis/public>
		Options Indexes FollowSymLinks Includes
		AllowOverride All
		Require all granted
	</Directory>
	RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L,NE]
</VirtualHost>

<VirtualHost *:443>
    ServerAdmin webmaster@tennis.fr
    DocumentRoot "[ton_chemin]/tennis/public"
    ServerName tennis
    ServerAlias www.tennis.org
    ErrorLog "logs/tennis-error.log"
    CustomLog "logs/tennis-access.log" common
	SSLEngine on
	SSLCertificateFile [ton_chemin]/tennis/config/cert/www.tennis.org.pem
	SSLCertificateKeyFile [ton_chemin]/tennis/config/cert/www.tennis.org-key.pem
	<Directory [ton_chemin]/tennis/public>
		Options Indexes FollowSymLinks Includes
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

 modifie dans le fichier suivant  Windows\System32\drivers\ect\hosts

et ajoute la ligne suivante :

	127.0.0.1		www.tennis.org

reload XAMPP 

C'est bon maintenant tu peux lancer le club de tennis pour cela lance dans ton navigateur : ```www.tennis.org ``` ou clic [ICI](https://www.tennis.org/)

## Auteur

**_PALLAS_**


