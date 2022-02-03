Hello tous le monde voici votre prochain exercice. Pour information certains d'entre vous devront me faire la présentation du projet.
Le projet est une plateforme de communication et gestion de taches des entreprises.

Une partie avec le dashboard (admin) et une autre avec l'application des entreprises
Dashboard admin est en laravel (adminlte)
L'application des entreprises en vuejs




L'entreprise peut :
- se créer un compte
- se connecter
- avant d’accéder au dashboard il doit pouvoir compléter son profil avec un stepper (tant que son profil n’est pas complet, il ne peut pas accéder au dashboard)
- accéder au dashboard
- voir et update son profil (mais pas la TVA et info récupérer)
- discuter avec un admin (pas de temps réel, une mise à jour manuelle quand le user recharge la page)

CORRIGER
- voir la liste de tâches (Todo) et changer le status “open” + “done”




L’admin peut :
- se connecter
- pouvoir discuter avec les sociétés (pas de temps réel, une mise à jour manuelle quand le user recharge la page)
- pouvoir voir le profile d’une société
- pouvoir voir et ajouter des taches à la société






Le stepper se fera en 2 étapes (entreprise/personne de contact). Il faudra effectuer une vérification sur le numéro de TVA (avec un bouton a coté de l'input TVA) et faire la vérification et récupération des données pour pré remplir les champs. (Les informations récupérables via l'api TVA seront verrouillées et non-modifiables dans le stepper ex: nom de l'entreprise). Quand le numéro de TVA est vérifier et que les champs sont tous complet dans l'étape 1, le bouton Next sera visible et cliquable pour passer à la 2eme étape.
Informations du Stepper :
- numéro de TVA

- nom de l’entreprise
- activité de l’entreprise
- adresse
- ville
- pays
- numéro fixe
- code postal


- e-mail personne de contact
- nom personne de contact
- numéro personne de contact

2 Dashboards. 1 pour l'admin, ce sera avec admin lte en Laravel et 1 pour l'entreprise, ce sera du côté vue.


Après avoir fini cette partie, il faudra rajouter les fonctionnalités suivantes : 
- e-mail pour création de compte et pour nouvelle tache reçue
- récap des taches a faire dans la liste par e-mail (en fin de journée à 21h)
- login via google pour l'admin (Laravel socialite)
- temps réel sur les messages (Laravel-websockets)
- ajouter des notifications quand on reçoit un message et une tache
- toutes les actions comme les notifications, e-mails, messages doivent être des EVENTS
- utiliser le système de Jobs pour lancer les EVENTS

Notification->Jobs->Event
---------------------------‐--------------------------------------------------
Deadline : 4 Fevrier
(si la moitié n'a pas fini, on ajoutera une semaine)
Vous pouvez utiliser tout ce que vous trouvez sur le net pour réaliser l'exercice.
Ceux qui auront fini en premier doivent le dire à Nathan pour qu'il m'organise une présentation avec vous.
Cette exercice me permettra de voir si vous savez faire correctement des recherches et trouver des solutions par vous même. Bonne chance