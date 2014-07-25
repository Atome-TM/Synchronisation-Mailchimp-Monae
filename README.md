## Présentation du projet

Cet outil écrit en PHP, permet de synchroniser votre liste de clients dans l'outil <a href="http://www.monae.fr/" target="_blank">MonAE</a> avec une liste sur <a href="http://mailchimp.com/" target="_blank">Mailchimp</a>.

Vous pourrez ainsi gérer vos mailing vers vos clients grâce à Mailchimp

## Comment ça marche ?

Il s'agit de quelques dossiers, à installer en local sur un serveur Apache (de type Xampp, Mampp etc suffira).

Aucune base de données n'est nécessaire.

Avant de lancer l'application dans un navigateur, pensez à aller faire un tour dans le fichier **config.php** et de modifier la constante indiquant le chemin "racine" de votre installation.

Si les paramètres ne s'enregistrent pas, pensez à donner les droits en écriture au dossier "data", et à tous ses fichiers.

Pour faire fonctionner l'application vous aurez besoin :

- De votre clé API Mailchimp (<a href="http://kb.mailchimp.com/article/where-can-i-find-my-api-key/" target="_blank">Où trouver cette clé ?</a>)
- De vos identifiants MonAE (Email, FirmID, Login(API), Mot de passe(API))

Une fois ces informations enregistrées dans l'application, vous pourrez choisir la liste Mailchimp sur laquelle vous voulez voir apparaitre vos clients.

Vous devrez donc avoir une liste préparée sur Mailchimp avec les champs que vous désirez.

Ensuite, vous n'aurez plus qu'à sélectionner en face de chaque champs issu de MonAE, le champ Mailchimp qui lui correspond. 

Vous êtes, bien entendu, obligé de choisir l'email au minimum.

Vous cliquez sur "Sychroniser", et vous pourrez voir sur votre interface Mailchimp, la liste de vos clients apparaitre.

## Informations

### Version

1.0

_L'application est totalement fonctionnelle, néanmoins elle peut encore largement être améliorée. Notamment sur la gestion des erreurs et des messages de succès._

### Licence GNU GPL

Pour savoir ce que vous pouvez faire ou pas avec mon outil, voici quelques liens à lire :

- [Texte officiel (EN)](http://www.gnu.org/copyleft/gpl.html)
- [Article WIkipedia](http://fr.wikipedia.org/wiki/Licence_publique_g%C3%A9n%C3%A9rale_GNU)
- [Guide rapide de la GPLv3](http://www.gnu.org/licenses/quick-guide-gplv3.html)

### Crédits

2014 - Thomas Moreira - www.thomasmoreira.fr
