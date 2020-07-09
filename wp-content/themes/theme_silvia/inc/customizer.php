<?php

function theme_customize_register($wp_customize) {
  // add_section() : permet d'ajouter une nouvelle section au Customizer
  // pour y afficher un ensemble de paramètres/ contrôles
  // Voir prototype : https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
  // - premier argument : identifiant de la section (choisi par vous), doit être unique
  // - deuxième argument : tableau de propriétés pour déterminer le titre, la description, etc.
  // Liste des propriétés possibles : https://developer.wordpress.org/reference/classes/wp_customize_section/__construct/
  $wp_customize -> add_section(
    'banner',
    array(
      'title'         => 'Bannière',
      'description'   => 'Image d\'accueil la page de blog'
    )
);

  // add_setting() : permetet de déclarer/ enregistrer un nouveau paramètre
  // voir prototype : https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
  // - premier argument : identifiant du paramètre (choisi par vous), doit être unique
  // - deuxième argument : tableau de propriétés du paramètre
  // Liste des propriétés possibles : https://developer.wordpress.org/reference/classes/wp_customize_setting/__construct/
  // Attention : un paramètre est toujours associé à un contrôle
  // le contrôle détermine la manière dont le paramètre est graphiquement représenté dans le Customizer
  $wp_customize->add_setting(
    'banner_image',
    array(
      // valeur par défaut si non définie par l'utilisateur du thème
      'default'     => get_template_directory() .'/assets/images/louvre-amy-leigh-barnard-unsplash.jpg',
      'type'        => 'theme_mod' // valeur par défaut
    )
  );

  // add_control( : permet d'ajouter un nouveau contrôle au Customizer
  // un contrôle est toujours associé à un paramètre
  // un contrôle représente visuellement le paramètre auquel il est associé
  // au niveau du Customizer
  // voir prototype : https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
  // - premier argument : identifiant du paramètre auquel est associé le contrôle
  // - deuxième argument : tableau de propriétés du contrôle
  // Liste des propriétés possibles : https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
  $wp_customize->add_control(
    // Quand une utilise un contrôle complexe : sélecteur d'image, de média, de couleur, etc.
    // on ne passe qu'un seul paramètre à la fonction : un objet correspondant au type de contrôle souhaité
    // Ici, on utilise la classe WP_Customize_Image_control pour afficher un sélecteur d'image
    new WP_Customize_Image_control(
    $wp_customize, // 1er arg : notre objet $wp_customize représentant le Customizer au niveau du code
    'banner_image', // 2e arg : identifiant du paramètre auquel est associé le contrôle
    array ( // 3e arg : tableau de propriétés du contrôle
      'label' => 'Image d\'accueil',
      'section' => 'banner', // identifiant de la section dans laquelle afficher le contrôle
      'setting' => 'banner_image' // on rappelle de nouveau l'identifiant du paramètre auquel est associé le contrôle
    )
    )
  ); // VOIR EXEMPLE D'APPEL DE FONCTION add_control() POUR UN USAGE CLASSIQUE À LA LIGNE 132
  // (contrôle non-complexe : text, textarea, checkbox, etc.)

  // TODO - En autonomie - Ajouter un nouveau panel (add_panel) au Customizer
  // identifiant : 'front_page'
  // titre : 'Page d\'accueil principale'
  // appel de fonction/prototype similaire à add_section() !
  // IMPORTANT : la seule différence entre un panel est une section est que le panel
  // est fait pour contenir des sections (affichées comme sous-sections donc).
  // C'est bien utile pour ranger les options du Customizer par zone/ objectif/ similitude...
  // À vous de décider !
  $wp_customize -> add_panel(
    'front_page',
    array(
      'title'         => 'Page d\'accueil principale' // On ne détermine que le titre,
      // la description n'est pas prise en charge pour le panel (ne s'affichera pas)
    )
  );

  // TODO - En autonomie - Ajouter une nouvelle section au Customizer
  // titre : 'Conteneur',
  // identifiant : 'fp_container'
  // description : 'Réglages du conteneur de la page d\'accueil principale'
  // Cette nouvelle section est une sous-section de 'front_page' (clé 'panel')
  $wp_customize -> add_section(
    'fp_container',
    array(
      'title'         => 'Accueil',
      'description'   => 'Réglages du haut de la page d\'accueil principale',
      'panel'         => 'front_page'
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_container_image'
  // valeur par défaut : chemin vers l'image '/assets/images/louvre-amy-leigh-barnard-unsplash.jpg'
  // - utiliser la fonction get_template_directory()
  // type : 'theme_mod'
  $wp_customize->add_setting(
    'fp_container_image',
    array(
    'default'   => get_template_directory() . '/assets/images/louvre-amy-leigh-barnard-unsplash.jpg',
    'type'      => 'theme_mod'
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_container_image'
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
        'description'   => 'Image de la page d\'accueil',
        'section' => 'fp_container',
        'setting'  => 'fp_container_image'
      )
    )
  );

  //ajout d'une nouvelle section pour le reste de la page principale
  $wp_customize -> add_section(
    'fp_container2',
    array(
      'title'         => 'Partie principale de la page',
      'description'   => 'Réglages du deuxième conteneur de la page d\'accueil',
      'panel'         => 'front_page'
    )
  );

  $wp_customize->add_setting(
    'fp_container2_image',
    array(
    'default'   => get_template_directory() . '/assets/images/yannis-papanastasopoulos-unsplash.jpg',
    'type'      => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Image_control(
      $wp_customize,
      'fp_container2_image',
      array(
        'label'   => 'Image',
        'description'   => 'Image du conteneur de la page d\'accueil',
        'section' => 'fp_container2',
        'setting'  => 'fp_container2_image'
      )
    )
  );

//ajouter ici les settings et controls titre et texte de la deuxième partie de la page d'accueil
$wp_customize->add_setting(
  'fp_texts2_title',
  array(
  'default'     => 'Le titre ici',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts2_title',
  array(
    'label'          => 'Titre secondaire',
    'description'    => 'Texte du titre secondaire',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title',
    'type'           => 'text'
  )
);

$wp_customize->add_setting(
  'fp_texts2_title_size',
  array(
  'default'     => 70,
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts2_title_size',
  array(
    'label'          => 'Taille du titre secondaire',
    'description'    => 'Taille du texte du titre secondaire',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title_size',
    'type'           => 'number'
  )
);

$wp_customize->add_setting(
  'fp_texts2_description',
  array(
  'default'     => 'L\'article sous l\'image.',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts2_description',
  array(
    'label'          => 'Description',
    'description'    => 'Texte accompagnant la photo secondaire',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_description',
    'type'           => 'textarea'
  )
);






  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_container_boxy'
  // valeur par défaut : false (booléen)
  // type : 'theme_mod'
  $wp_customize->add_setting(
    'fp_container_boxy',
    array(
    'default'     => false,
    'type'        => 'theme_mod'
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_container_boxy'
  // libellé : 'Affichage avec effet boxy'
  // description : 'Style du conteneur de la page d\'accueil.'
  // section : 'fp_container'
  // type : case à cocher - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
  // EXEMPLE D'USAGE D'UN CONTRÔLE CLASSIQUE (checkbox) ne faisant pas appel à une classe WP
  // il suffit de spécifier le type du contrôle dans la clé 'type' du tableau de propriétés
  // du contrôle
  $wp_customize->add_control(
    'fp_container_boxy', // 1er arg : identifiant du paramètre auquel associer le contrôle
    array( // 2e arg : tableau de propriétés du contrôle
      'label'          => 'Affichage avec effet boxy',
      'description'    => 'Style du conteneur de la page d\'accueil.',
      'section'        => 'fp_container', // identifiant de la section dans laquelle afficher le contrôle
      'setting'        => 'fp_container_boxy', // on rappelle de nouveau l'identifiant du paramètre auquel associer le contrôle
      'type'           => 'checkbox' // on détermine le type du contrôle
    )
  );

  // TODO - En autonomie - Ajouter une nouvelle section au Customizer
  // titre : 'Textes et styles',
  // identifiant : 'fp_texts'
  // description : 'Réglages pour les textes de la page d\'accueil principale.'
  // Cette nouvelle section est une sous-section de 'front_page' (clé 'panel')
  $wp_customize -> add_section(
    'fp_texts',
    array(
      'title'         => 'Textes et styles',
      'description'   => 'Réglages pour les textes de la page d\'accueil principale.',
      'panel'         => 'front_page' // identifiant du panel dans lequel afficher notre section
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_texts_title'
  // valeur par défaut : 'Bienvenue !'
  // type : 'theme_mod'
  $wp_customize->add_setting(
    'fp_texts_title',
    array(
    'default'     => 'Bienvenue !',
    'type'        => 'theme_mod'
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_texts_title'
  // libellé : 'Titre principal'
  // description : 'Texte du titre principal'
  // section : 'fp_texts'
  // type : texte - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
  $wp_customize->add_control(
    'fp_texts_title',
    array(
      'label'          => 'Titre principal',
      'description'    => 'Texte du titre principal',
      'section'        => 'fp_texts',
      'setting'        => 'fp_texts_title',
      'type'           => 'text'
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_texts_title_size'
  // valeur par défaut : 90
  // type : 'theme_mod'
  $wp_customize->add_setting(
    'fp_texts_title_size',
    array(
    'default'     => 90,
    'type'        => 'theme_mod'
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_texts_title_size'
  // libellé : 'Taille du titre'
  // description : 'Taille du texte du titre principal'
  // section : 'fp_texts'
  // type : nombre - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
  $wp_customize->add_control(
    'fp_texts_title_size',
    array(
      'label'          => 'Taille du titre',
      'description'    => 'Taille du texte du titre principal',
      'section'        => 'fp_texts',
      'setting'        => 'fp_texts_title_size',
      'type'           => 'number'
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_texts_description'
  // valeur par défaut : 'Un message d\'accueil personnalisé.'
  // type : 'theme_mod'
  $wp_customize->add_setting(
    'fp_texts_description',
    array(
    'default'     => 'Un message d\'accueil personnalisé.',
    'type'        => 'theme_mod'
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_texts_description'
  // libellé : 'Description'
  // description : 'Texte d\'introduction'
  // section : 'fp_texts'
  // type : zone de texte - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
  $wp_customize->add_control(
    'fp_texts_description',
    array(
      'label'          => 'Description',
      'description'    => 'Texte d\'introduction',
      'section'        => 'fp_texts',
      'setting'        => 'fp_texts_description',
      'type'           => 'textarea'
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
      'title'         => 'Bouton',
      'description'   => 'Réglages pour le bouton de la page d\'accueil principale',
      'panel'         => 'front_page'
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_button_text'
  // valeur par défaut : 'Un appel à l\'action'
  // type : 'theme_mod'
  $wp_customize->add_setting(
    'fp_button_text',
    array(
    'default'     => 'Un appel à l\'action',
    'type'        => 'theme_mod'
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
      'label'          => 'Bouton',
      'description'    => 'Texte du bouton',
      'section'        => 'fp_button',
      'setting'        => 'fp_button_text',
      'type'           => 'text'
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_button_url'
  // valeur par défaut : ''
  // type : 'theme_mod'
  $wp_customize->add_setting(
    'fp_button_url',
    array(
    'default'     => '',
    'type'        => 'theme_mod'
    )
  );

  // TODO - En autonomie - Ajouter un contrôleur associé au paramètre 'fp_button_url'
  // libellé : 'Lien'
  // description : 'Adresse URL du bouton'
  // section : 'fp_button'
  // type : adresse URL - Voir doc pour connaître la valeur à passer :
  // https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
  $wp_customize->add_control(
    'fp_button_url',
    array(
      'label'          => 'Lien',
      'description'    => 'Adresse URL du bouton',
      'section'        => 'fp_button',
      'setting'        => 'fp_button_url',
      'type'           => 'url'
    )
  );

  // TODO - En autonomie - Ajouter un nouveau paramètre au Customizer
  // identifiant : 'fp_button_style'
  // valeur par défaut : 'btn-style-1'
  // type : 'theme_mod'
  $wp_customize->add_setting(
    'fp_button_style',
    array(
    'default'     => 'btn-style-1',
    'type'        => 'theme_mod'
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
      'label'          => 'Style',
      'description'    => 'Style du bouton',
      'section'        => 'fp_button',
      'setting'        => 'fp_button_style',
      'type'           => 'radio',
      'choices'        => array(
                            'btn-style-1' => 'Style 1',
                            'btn-style-2' => 'Style 2',
                            'btn-style-3' => 'Style 3'
                          )
    )
  );

// insérer ici les trois petits articles customisés
// Accroche 1
$wp_customize->add_setting(
  'fp_texts_title_accr1',
  array(
  'default'     => 'Titre de l\'accroche 1',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts_title_accr1',
  array(
    'label'          => 'Titre de l\'accroche 1',
    'description'    => 'Titre de la première accroche',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title',
    'type'           => 'text'
  )
);

$wp_customize->add_setting(
  'fp_texts_descr_accr1',
  array(
  'default'     => 'Texte de l\'accroche 1',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts_descr_accr1',
  array(
    'label'          => 'Texte de l\'accroche 1',
    'description'    => 'Texte de la première accroche',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title',
    'type'           => 'textarea'
  )
);

// Accroche 2
$wp_customize->add_setting(
  'fp_texts_title_accr2',
  array(
  'default'     => 'Titre de l\'accroche 2',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts_title_accr2',
  array(
    'label'          => 'Titre de l\'accroche 2',
    'description'    => 'Titre de la deuxième accroche',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title',
    'type'           => 'text'
  )
);

$wp_customize->add_setting(
  'fp_texts_descr_accr2',
  array(
  'default'     => 'Texte de l\'accroche 2',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts_descr_accr2',
  array(
    'label'          => 'Texte de l\'accroche 2',
    'description'    => 'Texte de la deuxième accroche',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title',
    'type'           => 'textarea'
  )
);

// Accroche 3
$wp_customize->add_setting(
  'fp_texts_title_accr3',
  array(
  'default'     => 'Titre de l\'accroche 3',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts_title_accr3',
  array(
    'label'          => 'Titre de l\'accroche 3',
    'description'    => 'Titre de la troisième accroche',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title',
    'type'           => 'text'
  )
);

$wp_customize->add_setting(
  'fp_texts_descr_accr3',
  array(
  'default'     => 'Texte de l\'accroche 3',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts_descr_accr3',
  array(
    'label'          => 'Texte de l\'accroche 3',
    'description'    => 'Texte de la troisième accroche',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title',
    'type'           => 'textarea'
  )
);

// Partie citation:
  $wp_customize -> add_section(
    'fp_quote',
    array(
      'title'         => 'Citation',
      'description'   => 'Réglages pour la citation de la page d\'accueil principale',
      'panel'         => 'front_page'
    )
  );

  $wp_customize->add_setting(
    'fp_quote_text',
    array(
    'default'     => 'Ceci est une belle citation.',
    'type'        => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    'fp_quote_text',
    array(
      'label'          => 'Citation',
      'description'    => 'Texte de la citation',
      'section'        => 'fp_quote',
      'setting'        => 'fp_quote_text',
      'type'           => 'textarea'
    )
  );

  $wp_customize->add_setting(
    'fp_quote_source',
    array(
    'default'     => 'Ada Lovelace',
    'type'        => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    'fp_quote_source',
    array(
      'label'          => 'Source',
      'description'    => 'Nom de l\'auteur de la citation',
      'section'        => 'fp_quote',
      'setting'        => 'fp_quote_source',
      'type'           => 'text'
    )
  );

  $wp_customize->add_setting(
    'fp_quote_background',
    array(
    'default'     => 'custom-quote',
    'type'        => 'theme_mod'
    )
  );

}

add_action('customize_register', 'theme_customize_register');

?>
