<?php

function descodeuses_customize_register($wp_customize) {
  // ajoute une nouvelle section au Customizer
  // attention : la section n'apparaît pas si elle ne contient
  // pas de paramètres/ options de personnalisation
  $wp_customize->add_section(
    'banner',
    array(
      'title' => 'Bannière',
      'description'   => 'Description de la section'
    )
  );

  $wp_customize->add_setting(
    'banner_image',
    array(
      'default' => get_template_directory() . '/assets/images/louvre-amy-leigh-barnard-unsplash.jpg',
      'type'  => 'theme_mod' // theme modification
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Image_control(
      $wp_customize,
      'banner_image',
      array(
        'label'   => 'Image de fond',
        'section' => 'banner',
        'settings'  => 'banner_image'
      )
    )
  );


  // nouveau panel (add_panel) au Customizer
  // appel de fonction/prototype similaire à add_section() !

  $wp_customize -> add_panel(
    'front-page',
    array(
      'title' => 'Page d\'accueil principale'
    )
  );


  // une nouvelle section du Customizer
  // titre : 'Conteneur',
  // identifiant : 'fp_container'
  // description : 'Réglages du conteneur de la page d\'accueil principale'
  // Cette nouvelle section est une sous-section de 'front_page' (clé 'panel')
  $wp_customize -> add_section(
    'fp_container',
    array(
      'title'=> 'Conteneur',
      'description' => 'Réglages du conteneur de la page d\'accueil principale',
      'panel' => 'front-page'
    )
  );


  // Ajouter un nouveau paramètre au Customizer *> chaque parametre est associé à un controleur (voir après)
  // identifiant : 'fp_container_image'
  // valeur par défaut : chemin vers l'image '/assets/images/louvre-amy-leigh-barnard-unsplash.jpg'
  // - utiliser la fonction get_template_directory()
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_container_image',
    array(
      'default' => get_template_directory() . '/assets/images/louvre-amy-leigh-barnard-unsplash.jpg',
      'type'  => 'theme_mod' // theme modification
    )
  );

  // Ajouter un contrôleur (c'est la visualisation du paramentre dans le customizer) associé au paramètre 'fp_container_image'
  // et permettant de sélectionner une image depuis la bibliothèque de médias WP
  // libellé : 'Image de fond'
  // description : 'Image de fond du conteneur de la page d\'accueil'
  // section : 'fp_container'

  $wp_customize->add_control(
    new WP_Customize_Image_control(
      $wp_customize,
      'fp_container_image',
      array(
        'label'   => 'Image de fond',
        'description'  => 'Image de fond du conteneur de la page d\'accueil',
        'setting' => 'fp_container_image',
        'section' => 'fp_container'
      )
    )
  );

  // Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_container_boxy'
  // valeur par défaut : false (booléen)
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_container_boxy',
    array(
      'default' => false,
      'type'  => 'theme_mod' // theme modification
    )
  );

  // Ajouter un contrôleur associé au paramètre 'fp_container_boxy'
  // libellé : 'Effet boxy'
  // description : 'Style du conteneur de la page d\'accueil.'
  // section : 'fp_container'
  // type : case à cocher - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/

  $wp_customize->add_control(
      'fp_container_boxy',
      array(
        'label'   => 'Affichage effet boxy',
        'description' => 'Style du conteneur de la page d\'accueil.',
        'section' => 'fp_container',
        'type' => 'checkbox'
      )
  );

  // Ajouter une nouvelle section au Customizer
  // titre : 'Textes et styles',
  // identifiant : 'fp_texts'
  // description : 'Réglages pour les textes de la page d\'accueil principale.'
  // Cette nouvelle section est une sous-section de 'front_page' (clé 'panel')

  $wp_customize -> add_section(
    'fp_texts',
    array(
      'title'=> 'Textes et styles',
      'description' => 'Réglages pour les textes de la page d\'accueil principale.',
      'panel' => 'front-page'
    )
  );

  // Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_texts_title'
  // valeur par défaut : 'Bienvenue !'
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_texts_title',
    array(
      'default' => 'Bienvenue !',
      'type'  => 'theme_mod' // theme modification
    )
  );

  // Ajouter un contrôleur associé au paramètre 'fp_texts_title'
  // libellé : 'Titre principal'
  // description : 'Texte du titre principal'
  // section : 'fp_texts'
  // type : texte - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/

  $wp_customize->add_control(
      'fp_texts_title',
      array(
        'label'   => 'Titre principal',
        'description' => 'Style du conteneur de la page d\'accueil.',
        'section' => 'fp_texts',
        'setting' => 'fp_texts_title',
        'type' => 'text'
      )
  );

  // Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_texts_title_size'
  // valeur par défaut : 90
  // type : 'theme_mod'

$wp_customize-> add_setting(
  'fp_texts_title_size',
  array(
    'default' => 90,
    'type' => 'theme_mod'
  )
);

  // Ajouter un contrôleur associé au paramètre 'fp_texts_title_size'
  // libellé : 'Taille du titre'
  // description : 'Taille du texte du titre principal'
  // section : 'fp_texts'
  // type : nombre - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/

  $wp_customize->add_control(
      'fp_texts_title_size',
      array(
        'label'   => 'Taille du titre',
        'description' => 'Taille du texte du titre principal',
        'section' => 'fp_texts',
        'type' => 'number'
      )
  );

  // Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_texts_description'
  // valeur par défaut : 'Un message d\'accueil personnalisé.'
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_texts_description',
    array(
      'default' => 'Un message d\'accueil personnalisé.',
      'type'  => 'theme_mod' // theme modification
    )
  );

  // Ajouter un contrôleur associé au paramètre 'fp_texts_description'
  // libellé : 'Description'
  // description : 'Texte d\'introduction'
  // section : 'fp_texts'
  // type : zone de texte - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/

  $wp_customize->add_control(
      'fp_texts_description',
      array(
        'label'   => 'Description',
        'description' => 'Texte d\'introduction',
        'section' => 'fp_texts',
        'type' => 'text' // on pourrait ne rien mettre car text est la valeur par défaut
      )
  );

  // TODO - En autonomie - Ajouter une nouvelle section au Customizer
  // titre : 'Bouton',
  // identifiant : 'fp_button'
  // description : 'Réglages pour le bouton de la page d\'accueil principale'
  // Cette nouvelle section est une sous-section de 'front_page' (clé 'panel')

  $wp_customize -> add_section(
    'fp_button',
    array(
      'title'=> 'Bouton',
      'description' => 'Réglages pour le bouton de la page d\'accueil principale',
      'panel' => 'front-page'
    )
  );


  // Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_button_text'
  // valeur par défaut : 'Un appel à l\'action'
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_button_text',
    array(
      'default' => 'Un appel à l\'action',
      'type'  => 'theme_mod' // theme modification
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_button_text'
  // libellé : 'Bouton'
  // description : 'Texte du bouton'
  // section : 'fp_button'
  // type : texte - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/

  $wp_customize->add_control(
      'fp_button_text',
      array(
        'label'   => 'Bouton',
        'description' => 'Texte du bouton',
        'section' => 'fp_button',
        'type' => 'radio',
        'choices' => array(
            'btn-style-1' => 'Style 1',
            'btn-style-2' => 'Style 2',
            'btn-style-3' => 'Style 3',
        )
      )
  );

  // Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_button_url'
  // valeur par défaut : ''
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_button_url',
    array(
      'default' => '',
      'type'  => 'theme_mod' // theme modification
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_button_url'
  // libellé : 'Lien'
  // description : 'Adresse URL du bouton'
  // section : 'fp_button'
  // type : adresse URL - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/

  $wp_customize->add_control(
      'fp_button_text',
      array(
        'label'   => 'lien',
        'description' => 'Adresse URL du bouton',
        'section' => 'fp_button',
        'type' => 'url',
      )
  );


  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_button_style'
  // valeur par défaut : 'btn-style-1'
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_button_style',
    array(
      'default' => 'btn-style-1',
      'type'  => 'theme_mod' // theme modification
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_button_style'
  // libellé : 'Style'
  // description : 'Style du bouton'
  // section : 'fp_button'
  // type : bouton radio - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
  // choix :
  // 'btn-style-1' => 'Style 1'
  // 'btn-style-2' => 'Style 2'
  // 'btn-style-3' => 'Style 3'

  $wp_customize->add_control(
      'fp_button_style',
      array(
        'label'   => 'style',
        'description' => 'Style du bouton',
        'section' => 'fp_button',
        'type' => 'radio',
        'choices' => array(
          'btn-style-1' => 'Style 1',
          'btn-style-2' => 'Style 2',
          'btn-style-3' => 'Style 3'
        )
      )
  );

  // TODO - En autonomie - Ajouter une nouvelle section au Customizer
  // titre : 'Citation',
  // identifiant : 'fp_quote'
  // description : 'Réglages pour la citation de la page d\'accueil principale'
  // Cette nouvelle section est une sous-section de 'front_page' (clé 'panel')

  $wp_customize -> add_section(
    'fp_quote',
    array(
      'title'=> 'Citation',
      'description' => 'Réglages pour la citation de la page d\'accueil principale',
      'panel' => 'front-page'
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_quote_text'
  // valeur par défaut : 'Ceci est une belle citation.'
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_quote_text',
    array(
      'default' => 'Ceci est une belle citation.',
      'type'  => 'theme_mod' // theme modification
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_quote_text'
  // libellé : 'Citation'
  // description : 'Texte de la citation'
  // section : 'fp_quote'
  // type : zone de texte - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/

  $wp_customize->add_setting(
    'fp_quote_text',
    array(
      'label' => 'Citation',
      'description' => 'Texte de la citation',
      'section'  => 'fp_quote', // theme modification
      'type' => 'textarea'
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_quote_source'
  // valeur par défaut : 'Ceci est une belle citation.'
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_quote_source',
    array(
      'default' => 'Ceci est une belle citation.',
      'type' => 'theme_mod'
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_quote_source'
  // libellé : 'Source'
  // description : 'Nom de l\'auteur de la citation'
  // section : 'fp_quote'
  // type : texte - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/

  $wp_customize->add_control(
      'fp_quote_source',
      array(
        'label'   => 'Source',
        'description' => 'Nom de l\'auteur de la citation',
        'section' => 'fp_quote',
        'type' => 'text'
        )
      );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_quote_background'
  // valeur par défaut : 'custom-quote'
  // type : 'theme_mod'

  $wp_customize->add_setting(
    'fp_quote_background',
    array(
      'default' => 'custom-quote',
      'type' => 'theme_mod'
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_quote_background'
  // libellé : 'Couleur'
  // description : 'Couleur de fond du bloc de citation'
  // section : 'fp_quote'
  // type : sélecteur - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
  // choix :
  // 'custom-quote' => 'Par défaut'
  // 'custom-quote-red' => 'Rouge'
  // 'custom-quote-green' => 'Vert'
  // 'custom-quote-blue' => 'Bleu'

  $wp_customize->add_control(
      'fp_quote_background',
      array(
        'label'   => 'Couleur',
        'description' => 'Couleur de fond du bloc de citation',
        'section' => 'fp_quote',
        'type' => 'select',
        'choices' => array(
          'custom-quote' => 'Par défaut',
          'custom-quote-red' => 'Rouge',
          'custom-quote-green' => 'Vert',
          'custom-quote-blue' => 'Bleu'
        )
      )
    );

}

add_action('customize_register', 'descodeuses_customize_register');

 ?>
