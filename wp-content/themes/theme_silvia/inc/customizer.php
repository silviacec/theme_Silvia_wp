<?php

function theme_customize_register($wp_customize) {
  // function qui permet d'ajouter des sections dans le customizer
  $wp_customize -> add_section(
    'banner',
    array(
      'title'         => 'Bannière',
      'description'   => 'Image de la page de blog'
    )
);

  $wp_customize->add_setting(
    'banner_image',
    array(
      // valeur par défaut si non définie par l'utilisateur du thème
      'default'     => get_template_directory() .'/assets/images/louvre-amy-leigh-barnard-unsplash.jpg',
      'type'        => 'theme_mod' // valeur par défaut
    )
  );


  $wp_customize->add_control(
    // Quand une utilise un contrôle complexe : sélecteur d'image, de média, de couleur, etc.
    // on ne passe qu'un seul paramètre à la fonction : un objet correspondant au type de contrôle souhaité
    // Ici, on utilise la classe WP_Customize_Image_control pour afficher un sélecteur d'image
    new WP_Customize_Image_control(
    $wp_customize, // 1er arg : notre objet $wp_customize représentant le Customizer au niveau du code
    'banner_image', // 2e arg : identifiant du paramètre auquel est associé le contrôle
    array ( // 3e arg : tableau de propriétés du contrôle
      'label' => 'Image d\'accueil',
      'section' => 'banner', // identifiant de la section
      'setting' => 'banner_image' // identifiant du paramètre
    )
    )
  ); // VOIR EXEMPLE D'APPEL DE FONCTION add_control() POUR UN USAGE CLASSIQUE
  // (contrôle non-complexe : text, textarea, checkbox, etc.)


  $wp_customize -> add_panel(
    'front_page',
    array(
      'title'         => 'Page d\'accueil principale' // On ne détermine que le titre,
      // la description n'est pas prise en charge pour le panel (ne s'affichera pas)
    )
  );


  $wp_customize -> add_section(
    'fp_container',
    array(
      'title'         => 'Image et titre de l\'accueil',
      'panel'         => 'front_page'
    )
  );

  $wp_customize->add_setting(
    'fp_container_image',
    array(
    'default'   => get_template_directory() . '/assets/images/louvre-amy-leigh-barnard-unsplash.jpg',
    'type'      => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Image_control(
      $wp_customize,
      'fp_container_image',
      array(
        'label'   => 'Image de la page d\'accueil',
        'description'   => 'Image qui s\'affiche en haut de la page d\'accueil',
        'section' => 'fp_container',
        'setting'  => 'fp_container_image'
      )
    )
  );

  $wp_customize->add_setting(
    'fp_texts_title',
    array(
    'default'     => 'Bienvenue !',
    'type'        => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    'fp_texts_title',
    array(
      'label'          => 'Titre principal',
      'description'    => 'Texte du titre principal',
      'section'        => 'fp_container',
      'setting'        => 'fp_texts_title',
      'type'           => 'text'
    )
  );

  $wp_customize->add_setting(
    'fp_texts_title_size',
    array(
    'default'     => 90,
    'type'        => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    'fp_texts_title_size',
    array(
      'label'          => 'Taille du titre',
      'description'    => 'Taille du texte du titre principal',
      'section'        => 'fp_container',
      'setting'        => 'fp_texts_title_size',
      'type'           => 'number'
    )
  );



  //ajout d'une nouvelle section pour le reste de la page principale
  $wp_customize -> add_section(
    'fp_container2',
    array(
      'title'         => 'Main',
      'description'   => 'Partie principale de la page d\'accueil',
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
        'description'   => 'Image du contenu de la page d\'accueil',
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
    'label'          => 'Titre',
    'description'    => 'Texte du titre de l\'article en une',
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
    'label'          => 'Taille du titre',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_title_size',
    'type'           => 'number'
  )
);

$wp_customize->add_setting(
  'fp_texts2_description',
  array(
  'default'     => '',
  'type'        => 'theme_mod'
  )
);

$wp_customize->add_control(
  'fp_texts2_description',
  array(
    'label'          => 'Texte d\'article',
    'description'    => 'Article de une',
    'section'        => 'fp_container2',
    'setting'        => 'fp_texts2_description',
    'type'           => 'textarea'
  )
);

  $wp_customize->add_setting(
    'fp_container_boxy',
    array(
    'default'     => false,
    'type'        => 'theme_mod'
    )
  );


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


  $wp_customize -> add_section(
    'fp_button',
    array(
      'title'         => 'Boutons',
      'description'   => 'Réglages pour le bouton de la page d\'accueil',
      'panel'         => 'front_page'
    )
  );

  $wp_customize->add_setting(
    'fp_button_text',
    array(
    'default'     => 'Un appel à l\'action',
    'type'        => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    'fp_button_text',
    array(
      'label'          => 'Bouton principal',
      'description'    => 'Texte du bouton',
      'section'        => 'fp_button',
      'setting'        => 'fp_button_text',
      'type'           => 'text'
    )
  );

  $wp_customize->add_setting(
    'fp_button_url',
    array(
    'default'     => '',
    'type'        => 'theme_mod'
    )
  );


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

  $wp_customize->add_setting(
    'fp_button_style',
    array(
    'default'     => 'btn-style-1',
    'type'        => 'theme_mod'
    )
  );

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

  $wp_customize -> add_section(
    'fp_button2',
    array(
      'title'         => 'Bouton secondaire',
      'description'   => 'Réglages pour le bouton sous l\'article',
      'panel'         => 'front_page'
    )
  );

  $wp_customize->add_setting(
    'fp_button2_text',
    array(
    'default'     => 'Un appel à l\'action',
    'type'        => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    'fp_button2_text',
    array(
      'label'          => 'Bouton',
      'description'    => 'Texte du bouton',
      'section'        => 'fp_button',
      'setting'        => 'fp_button_text',
      'type'           => 'text'
    )
  );

  $wp_customize->add_setting(
    'fp_button2_url',
    array(
    'default'     => '',
    'type'        => 'theme_mod'
    )
  );


  $wp_customize->add_control(
    'fp_button2_url',
    array(
      'label'          => 'Lien',
      'description'    => 'Adresse URL du bouton',
      'section'        => 'fp_button',
      'setting'        => 'fp_button_url',
      'type'           => 'dropdown-pages'
    )
  );

  $wp_customize->add_setting(
    'fp_button2_style',
    array(
    'default'     => 'btn-style-1',
    'type'        => 'theme_mod'
    )
  );

  $wp_customize->add_control(
    'fp_button2_style',
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

// insérer ici les trois petits articles customisés dans une section à part
$wp_customize -> add_section(
  'fp_accroches',
  array(
    'title'         => 'Accroches',
    'description'   => 'Petits articles en bas de l\'article principal',
    'panel'         => 'front_page'
  )
);

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
    'section'        => 'fp_accroches',
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
    'section'        => 'fp_accroches',
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
    'section'        => 'fp_accroches',
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
    'section'        => 'fp_accroches',
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
    'section'        => 'fp_accroches',
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
    'section'        => 'fp_accroches',
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
          'default' => 'custom-quote-style-1',
          'type' =>'theme_mod'
        )
      );

      $wp_customize->add_control(
        'fp_quote_background',
        array(
          'label'       => 'Style',
          'description' => 'Style de la citation',
          'section'     => 'fp_quote',
          'type' => 'radio',
          'choices' => array(
            'custom-quote-style-1' => 'Style 1',
            'custom-quote-style-2' => 'Style 2',
            'custom-quote-style-3' => 'Style 3'
          )
        )
      );

// color picker ok mais ce n'est pas ici qu'il faut l'insérer
      // $wp_customize->add_setting(
      //   'custom_quote_background',
      //   array(
      //     'default' => 'custom_quote',
      //     'type' => 'theme_mod'
      //   )
      // );
      //
      // $wp_customize->add_control(
      //   new WP_Customize_Color_control(
      //     $wp_customize,
      //     'custom_quote_background',
      //     array(
      //       'label' => 'Couleur',
      //       'description' => 'Couleur de fond du bloc de citation',
      //       'section' => 'fp_quote',
      //       'setting' => 'custom_quote_background'
      //     )
      //   )
      // );

$wp_customize->add_section(
      'copyright',
        array(
          'title'         => 'Copyright',
          'description'   => 'Personnalisation de la partie copyright'
        )
      );

      $wp_customize->add_setting(
        'cr_text',
        array(
          'default' => 'Tous droits réservés',
          'type' => 'theme_mod'
        )
      );

      $wp_customize->add_control(
        'cr_text',
        array(
          'label' => 'Texte du copyright',
          'section' => 'copyright',
          'setting' => 'cr_text',
          'type' => 'text'
        )
      );

}

add_action('customize_register', 'theme_customize_register');

?>
