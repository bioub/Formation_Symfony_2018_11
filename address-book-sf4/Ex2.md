Exercice 2
----------

### Créer un contrôleur `SocieteController`

Utiliser la commande `make:controller`

### Ajouter 2 méthodes dans `SocieteController`

* index (ou list) (existe déjà avec `make:controller`)
* show

Puis ajouter les 2 templates dans `templates/societe`

### Ajouter les annotations `@Route` sur `SocieteController`

Utiliser les URLs suivantes

* index (ou list) -> /societes
* show -> /societes/123

Faire en sorte que 123 soit paramétrable

### Dans `templates/base.html.twig`

Ajouter 1 lien vers index

### Créer l'entité `App\Entity\Societe`

Utiliser la commande `make:entity`

Par exemple avec 2 propriété/colonnnes : nom, ville...

### Générer la table societe

Utiliser la commande `doctrine:schema:update --dump-sql` 
pour vérifier puis `doctrine:schema:update --force` pour la créer dans MySQL

### Ajouter des sociétés via phpMyAdmin

[http://localhost/phpmyadmin](http://localhost/phpmyadmin)

### Créer du faux texte dans les 2 templates

### Appeler les méthodes find et findAll de Doctrine puis remplacer le faux-text