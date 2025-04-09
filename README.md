# Projet « MediaTek » 

## État d'avancement 
- TPs 01 à 03 -
- [x] CR(U)D `Book` 
- [x]  CR(U)D `Illustration` 
- [x]  CR(U)D `User` 
- [x]  Authentification standard
- [x]  MFA simple (au moyen de la fonction `fakeMailSend()`)
- [x]  Script `env.php` protégé
- [x]  Script `utils/db_connect.php`
- [ ]  Gestion des autorisations côté *front*
- [ ]  Gestion des autorisations côté *back*
- Complément (**obligatoire**) -
- [x] Validation et *sanitization* via la fonction `filter_input()`
- [ ] Protection CSRF
- [x] Gestion des exceptions liées à MySQL
- [x] Journalisation des erreurs *« techniques »*
- [ ] Journalisation des accès non autorisés - Autres
 
## Difficultés rencontrées et solutions 
- Adaptattion du model MVC avec les principes OWASP.
- Les rôles sont défini en BDD mais ne sont pas utilisé dans le site web.

## Remarques complémentaires
Dans le fichier mediatek_eval.sql vous trouverez de quoi créé la BDD 

