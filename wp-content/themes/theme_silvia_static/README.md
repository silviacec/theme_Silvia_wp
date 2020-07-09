# descodeuses-projet-final
![Logo de l'association Descodeuses](https://descodeuses.org/img/logo-descodeuses.701b1e3c.png)

Thème WordPress à développer en autonomie de A à Z dans le cadre du projet final de la formation WordPress pour l'association Descodeuses.

Le début officiel du projet est le lundi 6 juillet 2020.
Le projet est à rendre au plus tard **le dimanche 12 juillet 2020 à 23 h 59** dans une deux formes suivantes :
- dépôt git public sur votre compte GitHub ou Gitlab (méthode recommandée pour faciliter la correction)
- fichier zip à déposer dans Google Classroom à la section [Projet final](https://classroom.google.com/u/2/c/ODUyMzgxODEzMjBa/a/MTI4MDQwNDkxMTIz/details).

Veuillez noter qu'**une attention particulière sera portée au respect des délais**.
Si le projet est rendu sous forme de dépôt git, seul le plus ancien commit antérieur à 00 h 00 sera considéré.
Si rendu sous forme d'archive, veuillez noter que le dépôt sur Classroom sera automatiquement fermé le lundi 13 juillet à 00 h 00.

**Pour faciliter la correction, merci de nommer votre thème de la même manière que vous-même (prénom).**

# Travail à faire /100 points

Barème du projet sur 100 points à faire obligatoirement selon vos capacités, en vous aidant de la documentation et en vous référant au code du thème "Descodeuses" écrit ensemble.

50 points bonus potentiels pour aller plus loin (investissement personnel).

## Templates /50 points

- [ ] Modèle de page d’accueil statique : `front-page.php`
- [ ] Modèle des articles : `index.php`
- [ ] Modèle d’un article : `single.php`
- [ ] Modèle des commentaires : `comments.php`
- [ ] Modèle de page : `page.php`
- [ ] Partie de modèle d’en-tête : `header.php`
- [ ] Partie de modèle de pied de page : `footer.php`
- [ ] Partie de modèle de barre latérale : `sidebar.php`

## Fichiers annexes /50 points

- [ ] `style.css` (informations du thème - [rappel des champs possibles](https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/)) /8 points
- [ ] `screenshot.png` (au bon format) /2 points
- [ ] `functions.php`
- [ ] `customizer.php`

### Options de personnalisation à développer (`customizer.php` et `functions.php`) /40 points

#### En-tête /5 points

1. Afficher un logo personnalisé ou titre du site si non défini
2. Menu principal

#### Pied de page /10 points

1. 4 zones de widgets
2. Pouvoir changer le texte du copyright ("© 2020 Descodeuses. Tous droits réservés").
3. Menu secondaire

#### Page d'accueil (`front-page.php`) /20 points

1. Pouvoir changer l'image de fond.
2. Titre : pouvoir modifier texte et taille.
3. Boutons : pouvoir changer le texte, le le style et l'url du bouton.

- Bouton 1 : pour le style, utiliser des boutons radio pour le contrôle. Pour les choix, utiliser les clés suivantes : `btn-style-1`, `btn-style-2`, `btn-style-3` (classes CSS).
- Bouton 2 : même chose que le bouton 1. + Pour l'url, utiliser un contrôle de type `dropdown-pages`. S'aider de `get_page_uri()` et `bloginfo()` pour reconstituer l'URL de la page choisie dans Customizer.

4. Toutes les zones de texte doivent être modifiables.
5. Zone de citation : pouvoir changer les textes et le style.
Pour le style, utiliser un sélecteur pour le contrôle et les clés suivantes pour les choix : `custom-quote-style-1`, `custom-quote-style-2`, `custom-quote-style-3` (classes CSS).

#### Page de blog /5 points

1. Zone de widgets latérale.
2. Case à cocher pour afficher ou non la barre latérale (ajouter la classe `hidden` si cochée)

# Pour aller plus loin - points bonus /50 points

## D'autres modèles et fonctionnalités à développer /30 points
- [ ] Modèle de page d'erreur : `404.php`
- [ ] Formulaire de recherche en pop-up (voir clic sur icon loupe dans l'en-tête)
- [ ] Prise en compte de WooCommerce :
  - [ ] lier l'icône panier dans `header.php` à WooCommerce
    - ne l'afficher que si WooCommerce est installé sur le site
    - mettre à jour le nombre affiché selon le nombre d'articles dans le panier WooCommerce

Aide pour WooCommerce :
- Voir [Documentation officielle de WooCommerce](https://docs.woocommerce.com/documentation/plugins/woocommerce/woocommerce-codex/theming/)
- Liste des [fonctions officielles WooCommerce](https://docs.woocommerce.com/wc-apidocs/package-WooCommerce.Functions.html)

## Rendre le thème "prêt à traduire" /10 points
Vous avez certainement vu les fonctions `__()` et `__e()` entourer du texte dans les extraits de code trouvés sur Internet... Ces fonctions servent à rendre un thème "prêt à traduire" par vous-même ou d'autres développeurs.

Pour cela, nous créons un dossier `languages` qui contiendra les fichiers de traduction des chaînes de caractères de notre thème dans différentes langues.

Par exemple, dans `index.php` :
- au lieu d'écrire `<a href="<?php the_permalink(); ?>">Lire la suite</a>` en dur (chaîne de caractères non traduisible)
- nous écrirons : `<a href="<?php the_permalink(); ?>">__('Lire la suite', 'descodeuses')</a>`
- ou encore : `<a href="<?php the_permalink(); ?>">__e('Lire la suite', 'descodeuses')</a>` si on fait appel à `echo` pour afficher la chaîne sur le navigateur (lire l'article recommandé ci-dessous pour en savoir plus)

**NB** Avec `descodeuses` le nom du dossier du thème (renommer `dynamic` par `descodeuses`). WordPress ira ainsi chercher lui-même le fichier de traduction nécessaire dans le dossier `languages` pour traduire la chaîne `Lire la suite` dans la langue choisie par les utilisateurs de notre thème dans leurs réglages WordPress !

Je vous invite à lire l'article suivant (en Anglais) pour en apprendre davantage sur la traduction de thème et comment l'implémenter :
"[How to Localize a WordPress Theme and Make it Translation Ready](https://premium.wpmudev.org/blog/how-to-localize-a-wordpress-theme-and-make-it-translation-ready/)"

## Respect des bonnes pratiques de développement /10 points

### Eviter d'écrire du CSS dans du HTML /5 points

En terme de qualité de code, on déconseille d'écrire du CSS dans du HTML.
Nous l'avons pourtant fait plusieurs fois. Pourquoi ? Parce que cette solution est la plus rapide !

Je vous encourage maintenant à trouver, en vous aidant d'Internet et des forums techniques tels que le [WordPress Forum](https://wordpress.org/support/forum/wp-advanced/) ou [StackOverflow](https://stackoverflow.com/), la **bonne manière** de faire des modifications de style (en lien avec les paramètres de notre Customizer) pour garder un code propre.

Pour gagner du temps de développement, vous pouvez simplement **détailler votre réflexion** dans un fichier texte (pdf) en incluant des extraits de code commentés (pas de copier-coller d'Internet sans explications) et en soulignant les avantages et les inconvénients des solutions trouvées.

Cette section du projet vise à tester :
- votre esprit critique vis à vis de la qualité de votre code
- votre capacité à lire, comprendre et analyser du code non-familier
- votre capacité à présenter une solution technique en langage naturel
- et votre débrouillardise. :-)

### Inclure correctement les fichiers de style CSS dans notre thème /5 points

Pour inclure notre fichier `style.css` nous avons ajouté une balise `<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">` dans `header.php` mais est-ce recommandé par WordPress ?

Suspens... La réponse est non ! Quelle est la bonne façon de faire ?
Passer par `functions.php` !

Aide :
- Documentation officielle : [Including CSS & JavaScript](https://developer.wordpress.org/themes/basics/including-css-javascript/)
- Article de blog : [How to Properly Include CSS and JS in your WordPress Themes and Plugins](https://rudrastyh.com/wordpress/include-css-and-javascript.html)

Faire de même pour les lignes de code suivantes (toujours dans `header.php`) :

```
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@0;1&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/4e5f136f21.js" crossorigin="anonymous"></script>
<script src="./assets/js/main.js" type="text/javascript"></script>
```

# Documentation WordPress

Consulter la documentation officielle de WordPress pour développeurs :
- [guide du développement de thème](https://developer.wordpress.org/themes/)
- [référence des fonctions WordPress prédéfinies](https://developer.wordpress.org/reference/)
