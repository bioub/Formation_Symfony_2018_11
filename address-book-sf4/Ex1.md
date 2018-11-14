Exercice 1
----------

### Créer un contrôleur `ContactController`

Utiliser la commande `make:controller`


### Ajouter 5 méthodes dans `ContactController`

* index (ou list) (existe déjà avec `make:controller`)
* add
* show
* delete
* update

Puis ajouter les 5 templates dans `templates/contact`

### Ajouter les annotations `@Route` sur `ContactController`

Utiliser les URLs suivantes

* index (ou list) -> /contacts
* add -> /contacts/add
* show -> /contacts/123
* delete -> /contacts/123/delete
* update -> /contacts/123/update

Faire en sorte que 123 soit paramétrable

### Dans `templates/base.html.twig`

Ajouter 2 liens vers index et add