<?php
/**
 * ACF field groups for the front page — PL / EN / DE.
 * Each group has 3 tabs (Polski, English, Deutsch).
 */
if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

function bdj_fp_id(): int {
    return (int) get_option( 'page_on_front' );
}

/* ── Helper: sub-fields z prefiksem językowym ─────────────────────────── */
function bdj_acf_lang_fields( array $base_fields, string $lang ): array {
    $out = [];
    // Separator / tab
    $out[] = [
        'key'   => 'field_tab_' . $lang . '_' . md5( implode( ',', array_column( $base_fields, 'name' ) ) ),
        'label' => [ 'pl' => 'Polski 🇵🇱', 'en' => 'English 🇬🇧', 'de' => 'Deutsch 🇩🇪' ][ $lang ] ?? $lang,
        'name'  => '',
        'type'  => 'tab',
        'placement' => 'top',
    ];
    foreach ( $base_fields as $f ) {
        $suffix = $lang === 'pl' ? '' : '_' . $lang;
        $new    = $f;
        $new['key']  = $f['key'] . ( $lang === 'pl' ? '' : '_' . $lang );
        $new['name'] = $f['name'] . $suffix;
        $out[] = $new;
    }
    return $out;
}

/* ══════════════════════════════════════════════════════════════════════════
   REJESTRACJA GRUP PÓL
   ══════════════════════════════════════════════════════════════════════════ */
add_action( 'acf/init', function () {

    $loc = [ [ [ 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ] ] ];

    /* ── Hero ─────────────────────────────────────────────────────────── */
    $hero_base = [
        [ 'key' => 'field_fp_hero_title',    'label' => 'Nagłówek — linia 1', 'name' => 'fp_hero_title',    'type' => 'text' ],
        [ 'key' => 'field_fp_hero_title2',   'label' => 'Nagłówek — linia 2', 'name' => 'fp_hero_title2',   'type' => 'text' ],
        [ 'key' => 'field_fp_hero_subtitle', 'label' => 'Podtytuł',           'name' => 'fp_hero_subtitle', 'type' => 'textarea', 'rows' => 2 ],
        [ 'key' => 'field_fp_hero_cta_text', 'label' => 'Przycisk — tekst',  'name' => 'fp_hero_cta_text', 'type' => 'text' ],
    ];
    $hero_shared = [
        [ 'key' => 'field_tab_hero_shared', 'label' => 'Wspólne', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
        [ 'key' => 'field_fp_hero_cta_url', 'label' => 'Przycisk — link (wspólny)', 'name' => 'fp_hero_cta_url', 'type' => 'text' ],
        [ 'key' => 'field_fp_hero_bg',      'label' => 'Tło hero — URL zdjęcia (wspólne)', 'name' => 'fp_hero_bg', 'type' => 'text' ],
    ];
    acf_add_local_field_group( [
        'key'        => 'group_fp_hero',
        'title'      => '🏠 Hero',
        'fields'     => array_merge(
            bdj_acf_lang_fields( $hero_base, 'pl' ),
            bdj_acf_lang_fields( $hero_base, 'en' ),
            bdj_acf_lang_fields( $hero_base, 'de' ),
            $hero_shared
        ),
        'location'   => $loc,
        'menu_order' => 10,
    ] );

    /* ── Pasek wartości ───────────────────────────────────────────────── */
    $vs_sub = [
        [ 'key' => 'field_fp_vs_heading', 'label' => 'Nagłówek', 'name' => 'heading', 'type' => 'text' ],
        [ 'key' => 'field_fp_vs_text',    'label' => 'Opis',     'name' => 'text',    'type' => 'textarea', 'rows' => 2 ],
    ];
    $vs_repeater = fn( string $sfx ) => [ [
        'key'        => 'field_fp_vs' . $sfx,
        'label'      => 'Kafelki',
        'name'       => 'fp_value_strip' . $sfx,
        'type'       => 'repeater',
        'max'        => 5,
        'layout'     => 'row',
        'sub_fields' => array_map( fn($f) => array_merge( $f, [
            'key'  => $f['key'] . $sfx,
            'name' => $f['name'],
        ] ), $vs_sub ),
    ] ];
    acf_add_local_field_group( [
        'key'        => 'group_fp_vs',
        'title'      => '🏠 Pasek wartości',
        'fields'     => array_merge(
            [ [ 'key' => 'field_tab_vs_pl', 'label' => 'Polski 🇵🇱',   'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $vs_repeater(''),
            [ [ 'key' => 'field_tab_vs_en', 'label' => 'English 🇬🇧', 'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $vs_repeater('_en'),
            [ [ 'key' => 'field_tab_vs_de', 'label' => 'Deutsch 🇩🇪',  'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $vs_repeater('_de')
        ),
        'location'   => $loc,
        'menu_order' => 20,
    ] );

    /* ── Liczby ───────────────────────────────────────────────────────── */
    $stat_sub_num  = [ 'key' => 'field_fp_stat_number', 'label' => 'Liczba',   'name' => 'number', 'type' => 'number' ];
    $stat_sub_sfx  = [ 'key' => 'field_fp_stat_suffix', 'label' => 'Sufiks',   'name' => 'suffix', 'type' => 'text', 'instructions' => 'np. + lub /7' ];
    $stat_sub_lbl  = [ 'key' => 'field_fp_stat_label',  'label' => 'Etykieta', 'name' => 'label',  'type' => 'text' ];
    $stat_rep = fn( string $sfx ) => [ [
        'key'        => 'field_fp_stats' . $sfx,
        'label'      => 'Liczniki',
        'name'       => 'fp_stats' . $sfx,
        'type'       => 'repeater',
        'max'        => 6,
        'layout'     => 'table',
        'sub_fields' => [
            array_merge( $stat_sub_num, [ 'key' => $stat_sub_num['key'] . $sfx ] ),
            array_merge( $stat_sub_sfx, [ 'key' => $stat_sub_sfx['key'] . $sfx ] ),
            array_merge( $stat_sub_lbl, [ 'key' => $stat_sub_lbl['key'] . $sfx ] ),
        ],
    ] ];
    acf_add_local_field_group( [
        'key'        => 'group_fp_stats',
        'title'      => '🏠 Liczby',
        'fields'     => array_merge(
            [ [ 'key' => 'field_tab_stats_pl', 'label' => 'Polski 🇵🇱',   'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $stat_rep(''),
            [ [ 'key' => 'field_tab_stats_en', 'label' => 'English 🇬🇧', 'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $stat_rep('_en'),
            [ [ 'key' => 'field_tab_stats_de', 'label' => 'Deutsch 🇩🇪',  'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $stat_rep('_de')
        ),
        'location'   => $loc,
        'menu_order' => 30,
    ] );

    /* ── Historia ─────────────────────────────────────────────────────── */
    $tl_sub = [
        [ 'key' => 'field_fp_tl_year', 'label' => 'Rok',  'name' => 'year', 'type' => 'text' ],
        [ 'key' => 'field_fp_tl_text', 'label' => 'Opis', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ],
    ];
    $tl_group = fn( string $sfx ) => [
        [ 'key' => 'field_fp_history_heading' . $sfx, 'label' => 'Nagłówek sekcji', 'name' => 'fp_history_heading' . $sfx, 'type' => 'text' ],
        [
            'key'        => 'field_fp_timeline' . $sfx,
            'label'      => 'Etapy',
            'name'       => 'fp_timeline' . $sfx,
            'type'       => 'repeater',
            'layout'     => 'row',
            'sub_fields' => array_map( fn($f) => array_merge( $f, [ 'key' => $f['key'] . $sfx ] ), $tl_sub ),
        ],
    ];
    acf_add_local_field_group( [
        'key'        => 'group_fp_history',
        'title'      => '🏠 Historia',
        'fields'     => array_merge(
            [ [ 'key' => 'field_tab_hist_pl', 'label' => 'Polski 🇵🇱',   'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $tl_group(''),
            [ [ 'key' => 'field_tab_hist_en', 'label' => 'English 🇬🇧', 'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $tl_group('_en'),
            [ [ 'key' => 'field_tab_hist_de', 'label' => 'Deutsch 🇩🇪',  'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $tl_group('_de')
        ),
        'location'   => $loc,
        'menu_order' => 40,
    ] );

    /* ── Galeria ─────────────────────────────────────────────────────── */
    $gal_text = fn( string $sfx ) => [
        [ 'key' => 'field_fp_gallery_heading' . $sfx, 'label' => 'Nagłówek galerii', 'name' => 'fp_gallery_heading' . $sfx, 'type' => 'text' ],
        [ 'key' => 'field_fp_gallery_sub'     . $sfx, 'label' => 'Podtytuł',         'name' => 'fp_gallery_sub'     . $sfx, 'type' => 'text' ],
    ];
    $gal_shared = [
        [ 'key' => 'field_tab_gal_shared', 'label' => 'Zdjęcia i wideo (wspólne)', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
        [
            'key'        => 'field_fp_gallery_images',
            'label'      => 'Zdjęcia (max 4)',
            'name'       => 'fp_gallery_images',
            'type'       => 'repeater',
            'max'        => 4,
            'layout'     => 'table',
            'sub_fields' => [
                [ 'key' => 'field_fp_gimg_img', 'label' => 'Zdjęcie', 'name' => 'image', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'thumbnail' ],
                [ 'key' => 'field_fp_gimg_alt', 'label' => 'Alt',     'name' => 'alt',   'type' => 'text' ],
            ],
        ],
        [ 'key' => 'field_fp_video1', 'label' => 'YouTube embed URL 1', 'name' => 'fp_video_1', 'type' => 'text' ],
        [ 'key' => 'field_fp_video2', 'label' => 'YouTube embed URL 2', 'name' => 'fp_video_2', 'type' => 'text' ],
    ];
    acf_add_local_field_group( [
        'key'        => 'group_fp_gallery',
        'title'      => '🏠 Galeria i wideo',
        'fields'     => array_merge(
            [ [ 'key' => 'field_tab_gal_pl', 'label' => 'Polski 🇵🇱',   'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $gal_text(''),
            [ [ 'key' => 'field_tab_gal_en', 'label' => 'English 🇬🇧', 'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $gal_text('_en'),
            [ [ 'key' => 'field_tab_gal_de', 'label' => 'Deutsch 🇩🇪',  'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $gal_text('_de'),
            $gal_shared
        ),
        'location'   => $loc,
        'menu_order' => 50,
    ] );

    /* ── Opinie ─────────────────────────────────────────────────────── */
    $rev_sub = [
        [ 'key' => 'field_fp_rev_text',    'label' => 'Treść opinii',    'name' => 'text',           'type' => 'textarea', 'rows' => 3 ],
        [ 'key' => 'field_fp_rev_author',  'label' => 'Imię i nazwisko', 'name' => 'author_name',    'type' => 'text' ],
        [ 'key' => 'field_fp_rev_country', 'label' => 'Kraj / Firma',    'name' => 'author_country', 'type' => 'text' ],
    ];
    $rev_group = fn( string $sfx ) => [
        [ 'key' => 'field_fp_reviews_title' . $sfx, 'label' => 'Nagłówek sekcji', 'name' => 'fp_reviews_title' . $sfx, 'type' => 'text' ],
        [
            'key'        => 'field_fp_reviews' . $sfx,
            'label'      => 'Opinie',
            'name'       => 'fp_reviews' . $sfx,
            'type'       => 'repeater',
            'layout'     => 'row',
            'sub_fields' => array_map( fn($f) => array_merge( $f, [ 'key' => $f['key'] . $sfx ] ), $rev_sub ),
        ],
    ];
    acf_add_local_field_group( [
        'key'        => 'group_fp_reviews',
        'title'      => '🏠 Opinie klientów',
        'fields'     => array_merge(
            [ [ 'key' => 'field_tab_rev_pl', 'label' => 'Polski 🇵🇱',   'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $rev_group(''),
            [ [ 'key' => 'field_tab_rev_en', 'label' => 'English 🇬🇧', 'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $rev_group('_en'),
            [ [ 'key' => 'field_tab_rev_de', 'label' => 'Deutsch 🇩🇪',  'name' => '', 'type' => 'tab', 'placement' => 'top' ] ], $rev_group('_de')
        ),
        'location'   => $loc,
        'menu_order' => 60,
    ] );

    /* ── Serwis teaser ───────────────────────────────────────────────── */
    $srv_base = [
        [ 'key' => 'field_fp_serwis_title', 'label' => 'Nagłówek',       'name' => 'fp_serwis_title', 'type' => 'text' ],
        [ 'key' => 'field_fp_serwis_text',  'label' => 'Opis',           'name' => 'fp_serwis_text',  'type' => 'textarea', 'rows' => 2 ],
        [ 'key' => 'field_fp_serwis_cta',   'label' => 'Przycisk tekst', 'name' => 'fp_serwis_cta',   'type' => 'text' ],
    ];
    acf_add_local_field_group( [
        'key'        => 'group_fp_serwis',
        'title'      => '🏠 Serwis (teaser)',
        'fields'     => array_merge(
            bdj_acf_lang_fields( $srv_base, 'pl' ),
            bdj_acf_lang_fields( $srv_base, 'en' ),
            bdj_acf_lang_fields( $srv_base, 'de' )
        ),
        'location'   => $loc,
        'menu_order' => 70,
    ] );

    /* ── Kontakt ─────────────────────────────────────────────────────── */
    $con_base = [
        [ 'key' => 'field_fp_contact_eyebrow', 'label' => 'Eyebrow (małe)', 'name' => 'fp_contact_eyebrow', 'type' => 'text' ],
        [ 'key' => 'field_fp_contact_title',   'label' => 'Nagłówek',       'name' => 'fp_contact_title',   'type' => 'text' ],
        [ 'key' => 'field_fp_contact_sub',     'label' => 'Podtytuł',       'name' => 'fp_contact_sub',     'type' => 'textarea', 'rows' => 2 ],
        [ 'key' => 'field_fp_contact_btn',     'label' => 'Przycisk tekst', 'name' => 'fp_contact_btn',     'type' => 'text' ],
    ];
    acf_add_local_field_group( [
        'key'        => 'group_fp_contact',
        'title'      => '🏠 Sekcja Kontakt',
        'fields'     => array_merge(
            bdj_acf_lang_fields( $con_base, 'pl' ),
            bdj_acf_lang_fields( $con_base, 'en' ),
            bdj_acf_lang_fields( $con_base, 'de' )
        ),
        'location'   => $loc,
        'menu_order' => 80,
    ] );

} );

/* ══════════════════════════════════════════════════════════════════════════
   PRE-POPULACJA TREŚCI — PL / EN / DE
   ══════════════════════════════════════════════════════════════════════════ */
add_action( 'wp_loaded', function () {
    if ( get_option( 'bdj_fp_fields_populated_v3' ) || ! function_exists( 'update_field' ) ) return;
    $id = bdj_fp_id();
    if ( ! $id ) return;

    /* ── Hero PL ── */
    update_field( 'fp_hero_title',    'Europejski producent', $id );
    update_field( 'fp_hero_title2',   'maszyn do wdmuchiwania kabli.', $id );
    update_field( 'fp_hero_subtitle', 'Projektowane i produkowane w Polsce (UE) — precyzyjna inżynieria w konkurencyjnej cenie.', $id );
    update_field( 'fp_hero_cta_text', 'Zobacz maszyny', $id );
    update_field( 'fp_hero_cta_url',  '#maszyny', $id );
    update_field( 'fp_hero_bg', 'https://bluedragonjet.com/wp-content/uploads/2026/04/DSC02465-scaled.jpg', $id );

    /* ── Hero EN ── */
    update_field( 'fp_hero_title_en',    'European manufacturer', $id );
    update_field( 'fp_hero_title2_en',   'of cable blowing machines.', $id );
    update_field( 'fp_hero_subtitle_en', 'Designed and manufactured in Poland (EU) — precision engineering at a competitive price.', $id );
    update_field( 'fp_hero_cta_text_en', 'See machines', $id );

    /* ── Hero DE ── */
    update_field( 'fp_hero_title_de',    'Europäischer Hersteller', $id );
    update_field( 'fp_hero_title2_de',   'von Kabeleinblasmaschinen.', $id );
    update_field( 'fp_hero_subtitle_de', 'Entwickelt und produziert in Polen (EU) — Präzisionstechnik zu wettbewerbsfähigen Preisen.', $id );
    update_field( 'fp_hero_cta_text_de', 'Maschinen ansehen', $id );

    /* ── Value strip PL ── */
    update_field( 'fp_value_strip', [
        [ 'heading' => 'Ekspresowa wysyłka',      'text' => 'Zamówione maszyny wysyłamy w ciągu 24h. Gwarantujemy szybką dostawę na terenie całej Europy.' ],
        [ 'heading' => 'Profesjonalne doradztwo', 'text' => 'Nasi inżynierowie pomogą dobrać właściwy model. Masz pytania? Zadzwoń lub napisz — odpowiadamy szybko.' ],
        [ 'heading' => 'Szkolenia',               'text' => 'Do każdej maszyny zapewniamy pełne szkolenie. Poznaj mechanizmy działania i optymalne sposoby użytkowania urządzeń.' ],
        [ 'heading' => 'Naprawa / Serwis',        'text' => 'Oferujemy serwis oraz naprawę maszyn. Szybka dostępność części zamiennych dla wszystkich modeli Blue Dragon Jet.' ],
        [ 'heading' => 'Polityka jakości',        'text' => 'Działamy zgodnie z normami ISO i standardami CE. Każda maszyna przechodzi rygorystyczną kontrolę jakości przed wysyłką.' ],
    ], $id );

    /* ── Value strip EN ── */
    update_field( 'fp_value_strip_en', [
        [ 'heading' => 'Express shipping',       'text' => 'Ordered machines are shipped within 24h. We guarantee fast delivery throughout Europe.' ],
        [ 'heading' => 'Professional advice',    'text' => 'Our engineers will help you choose the right model. Questions? Call or write — we respond quickly.' ],
        [ 'heading' => 'Training',               'text' => 'Full training is provided with every machine. Learn how it works and how to use it optimally.' ],
        [ 'heading' => 'Repair / Service',       'text' => 'We offer service and repair of machines. Fast availability of spare parts for all Blue Dragon Jet models.' ],
        [ 'heading' => 'Quality policy',         'text' => 'We operate in accordance with ISO standards and CE certification. Every machine undergoes rigorous quality control before shipping.' ],
    ], $id );

    /* ── Value strip DE ── */
    update_field( 'fp_value_strip_de', [
        [ 'heading' => 'Expressversand',          'text' => 'Bestellte Maschinen werden innerhalb von 24h versendet. Wir garantieren schnelle Lieferung in ganz Europa.' ],
        [ 'heading' => 'Professionelle Beratung', 'text' => 'Unsere Ingenieure helfen bei der Auswahl des richtigen Modells. Fragen? Rufen Sie an oder schreiben Sie — wir antworten schnell.' ],
        [ 'heading' => 'Schulungen',              'text' => 'Jede Maschine wird mit einer vollständigen Schulung geliefert. Lernen Sie die Funktionsweise und optimale Nutzung kennen.' ],
        [ 'heading' => 'Reparatur / Service',     'text' => 'Wir bieten Service und Reparatur von Maschinen an. Schnelle Verfügbarkeit von Ersatzteilen für alle Blue Dragon Jet Modelle.' ],
        [ 'heading' => 'Qualitätspolitik',        'text' => 'Wir arbeiten nach ISO-Normen und CE-Standards. Jede Maschine durchläuft eine strenge Qualitätskontrolle vor dem Versand.' ],
    ], $id );

    /* ── Stats PL ── */
    update_field( 'fp_stats', [
        [ 'number' => 50,   'suffix' => '+',  'label' => 'Krajów obsługiwanych' ],
        [ 'number' => 1500, 'suffix' => '+',  'label' => 'Sprzedanych maszyn'  ],
        [ 'number' => 10,   'suffix' => '+',  'label' => 'Lat doświadczenia'   ],
        [ 'number' => 24,   'suffix' => '/7', 'label' => 'Wsparcie techniczne' ],
    ], $id );

    /* ── Stats EN ── */
    update_field( 'fp_stats_en', [
        [ 'number' => 50,   'suffix' => '+',  'label' => 'Countries served'    ],
        [ 'number' => 1500, 'suffix' => '+',  'label' => 'Machines sold'       ],
        [ 'number' => 10,   'suffix' => '+',  'label' => 'Years of experience' ],
        [ 'number' => 24,   'suffix' => '/7', 'label' => 'Technical support'   ],
    ], $id );

    /* ── Stats DE ── */
    update_field( 'fp_stats_de', [
        [ 'number' => 50,   'suffix' => '+',  'label' => 'Bediente Länder'     ],
        [ 'number' => 1500, 'suffix' => '+',  'label' => 'Verkaufte Maschinen' ],
        [ 'number' => 10,   'suffix' => '+',  'label' => 'Jahre Erfahrung'     ],
        [ 'number' => 24,   'suffix' => '/7', 'label' => 'Technischer Support' ],
    ], $id );

    /* ── History PL ── */
    update_field( 'fp_history_heading', 'Nasza historia', $id );
    update_field( 'fp_timeline', [
        [ 'year' => '1992', 'text' => 'Założenie spółki GAMM-BUD — start jako dostawca sprzętu dla branży wodno-kanalizacyjnej.' ],
        [ 'year' => '2002', 'text' => 'Wdrożenie sprzętu do bezwykopowych napraw sieci kanalizacyjnych pod marką Green Dragon Products.' ],
        [ 'year' => '2012', 'text' => 'Uruchomienie produkcji własnych wdmuchiwarek do kabli światłowodowych pod marką Blue Dragon Jet.' ],
        [ 'year' => '2015', 'text' => 'Dynamiczny rozwój eksportu — nasze maszyny trafiają do klientów na całym świecie.' ],
    ], $id );

    /* ── History EN ── */
    update_field( 'fp_history_heading_en', 'Our history', $id );
    update_field( 'fp_timeline_en', [
        [ 'year' => '1992', 'text' => 'Founding of GAMM-BUD company — start as a supplier of equipment for the water and sewage industry.' ],
        [ 'year' => '2002', 'text' => 'Implementation of equipment for trenchless repair of sewage networks under the Green Dragon Products brand.' ],
        [ 'year' => '2012', 'text' => 'Launch of own fiber optic cable blowing machine production under the Blue Dragon Jet brand.' ],
        [ 'year' => '2015', 'text' => 'Dynamic export development — our machines reach customers worldwide.' ],
    ], $id );

    /* ── History DE ── */
    update_field( 'fp_history_heading_de', 'Unsere Geschichte', $id );
    update_field( 'fp_timeline_de', [
        [ 'year' => '1992', 'text' => 'Gründung der GAMM-BUD GmbH — Start als Lieferant von Ausrüstung für die Wasser- und Abwasserbranche.' ],
        [ 'year' => '2002', 'text' => 'Einführung von Geräten für die grabenlose Reparatur von Kanalisationsnetzen unter der Marke Green Dragon Products.' ],
        [ 'year' => '2012', 'text' => 'Start der Eigenproduktion von Glasfaserkabeleinblasmaschinen unter der Marke Blue Dragon Jet.' ],
        [ 'year' => '2015', 'text' => 'Dynamische Exportentwicklung — unsere Maschinen erreichen Kunden weltweit.' ],
    ], $id );

    /* ── Gallery PL ── */
    update_field( 'fp_gallery_heading', 'Maszyny w akcji', $id );
    update_field( 'fp_gallery_sub',     'Zobacz nasze urządzenia podczas pracy w terenie.', $id );
    update_field( 'fp_gallery_images', [
        [ 'image' => home_url( '/wp-content/uploads/2026/05/DSC02443-scaled.jpg' ), 'alt' => 'Blue Dragon Jet – maszyna w pracy' ],
        [ 'image' => home_url( '/wp-content/uploads/2026/05/DSC02471-scaled.jpg' ), 'alt' => 'Blue Dragon Jet – instalacja w terenie' ],
        [ 'image' => home_url( '/wp-content/uploads/2026/05/DSC02457-scaled.jpg' ), 'alt' => 'Blue Dragon Jet – sprzęt do wdmuchiwania kabli' ],
        [ 'image' => home_url( '/wp-content/uploads/2026/05/042-1.jpg' ),           'alt' => 'Blue Dragon Jet – maszyna BDJ' ],
    ], $id );
    update_field( 'fp_video_1', 'https://www.youtube.com/embed/9q8XTSFKa9k?rel=0&modestbranding=1', $id );
    update_field( 'fp_video_2', 'https://www.youtube.com/embed/upfZrb2_bmA?rel=0&modestbranding=1', $id );

    /* ── Gallery EN/DE (same images, different headings) ── */
    update_field( 'fp_gallery_heading_en', 'Machines in action', $id );
    update_field( 'fp_gallery_sub_en',     'See our equipment at work in the field.', $id );
    update_field( 'fp_gallery_heading_de', 'Maschinen im Einsatz', $id );
    update_field( 'fp_gallery_sub_de',     'Sehen Sie unsere Geräte bei der Arbeit im Gelände.', $id );

    /* ── Reviews PL ── */
    update_field( 'fp_reviews_title', 'Co mówią nasi klienci', $id );
    update_field( 'fp_reviews', [
        [ 'text' => 'Jestem bardzo zadowolony z obsługi, szczególnie Pana Pawła. Profesjonalne podejście i szybka realizacja zamówienia.', 'author_name' => 'Maciej Siwczak',    'author_country' => 'Polska'   ],
        [ 'text' => 'Firma godna zaufania. Zakupiony sprzęt działa bez zarzutu, a serwis posprzedażowy na bardzo wysokim poziomie.',         'author_name' => 'Tomasz Poremba',   'author_country' => 'Polska'   ],
        [ 'text' => 'After a few months of using Blue Dragon Jet Extended I can easily say it was one of the best choices for my telecommunication contracts. Works twice as fast and with much greater precision.', 'author_name' => 'Martin L. Ivanov', 'author_country' => 'Bulgaria' ],
        [ 'text' => 'Dopiero zaczynam używać BDJ Standard i rejestratora BDJ Brai. Na rynku niemieckim to idealny zestaw. Kontakt i obsługa z firmą na 5!', 'author_name' => 'Opti-Center Team', 'author_country' => 'Niemcy'  ],
        [ 'text' => 'Polecam sprzęt do sieci FTTH. Mam model Mini i działa jak trzeba — niezawodny, precyzyjny, wart swojej ceny.',             'author_name' => 'Aleksander Schmidt','author_country' => 'Polska'   ],
    ], $id );

    /* ── Reviews EN ── */
    update_field( 'fp_reviews_title_en', 'What our clients say', $id );
    update_field( 'fp_reviews_en', [
        [ 'text' => 'I am very satisfied with the service, especially Mr. Paweł. Professional approach and fast order fulfillment.', 'author_name' => 'Maciej Siwczak',    'author_country' => 'Poland'  ],
        [ 'text' => 'A trustworthy company. The purchased equipment works flawlessly, and the after-sales service is at a very high level.',  'author_name' => 'Tomasz Poremba',   'author_country' => 'Poland'  ],
        [ 'text' => 'After a few months of using Blue Dragon Jet Extended I can easily say it was one of the best choices for my telecommunication contracts. Works twice as fast and with much greater precision.', 'author_name' => 'Martin L. Ivanov', 'author_country' => 'Bulgaria' ],
        [ 'text' => 'I am just starting to use the BDJ Standard and the BDJ Brain recorder. On the German market it is an ideal set. Contact and service with the company gets a 5!', 'author_name' => 'Opti-Center Team', 'author_country' => 'Germany' ],
        [ 'text' => 'I recommend the equipment for FTTH networks. I have the Mini model and it works as it should — reliable, precise, worth its price.', 'author_name' => 'Aleksander Schmidt', 'author_country' => 'Poland' ],
    ], $id );

    /* ── Reviews DE ── */
    update_field( 'fp_reviews_title_de', 'Was unsere Kunden sagen', $id );
    update_field( 'fp_reviews_de', [
        [ 'text' => 'Ich bin sehr zufrieden mit dem Service, besonders mit Herrn Paweł. Professioneller Ansatz und schnelle Auftragserfüllung.', 'author_name' => 'Maciej Siwczak',    'author_country' => 'Polen'      ],
        [ 'text' => 'Ein vertrauenswürdiges Unternehmen. Das gekaufte Gerät funktioniert einwandfrei und der After-Sales-Service ist auf sehr hohem Niveau.', 'author_name' => 'Tomasz Poremba', 'author_country' => 'Polen' ],
        [ 'text' => 'Nach einigen Monaten der Nutzung des Blue Dragon Jet Extended kann ich sagen, dass es eine der besten Entscheidungen für meine Telekommunikationsverträge war. Arbeitet doppelt so schnell und viel präziser.', 'author_name' => 'Martin L. Ivanov', 'author_country' => 'Bulgarien' ],
        [ 'text' => 'Ich fange gerade an, den BDJ Standard und den BDJ Brain Recorder zu benutzen. Auf dem deutschen Markt ist das eine ideale Kombination. Kontakt und Service mit dem Unternehmen — Note 1!', 'author_name' => 'Opti-Center Team', 'author_country' => 'Deutschland' ],
        [ 'text' => 'Ich empfehle die Ausrüstung für FTTH-Netze. Ich habe das Mini-Modell und es funktioniert wie es soll — zuverlässig, präzise, seinen Preis wert.', 'author_name' => 'Aleksander Schmidt', 'author_country' => 'Polen' ],
    ], $id );

    /* ── Serwis PL ── */
    update_field( 'fp_serwis_title', 'Potrzebujesz serwisu?', $id );
    update_field( 'fp_serwis_text',  'Usterka, przegląd, kalibracja lub zamówienie części — nasz zespół odpowiada w ciągu 24h. Zgłoś usterkę online, zanim straci czas na przestój.', $id );
    update_field( 'fp_serwis_cta',   'Zgłoś usterkę', $id );

    /* ── Serwis EN ── */
    update_field( 'fp_serwis_title_en', 'Need service?', $id );
    update_field( 'fp_serwis_text_en',  'Malfunction, inspection, calibration or ordering parts — our team responds within 24h. Report the issue online before it costs you downtime.', $id );
    update_field( 'fp_serwis_cta_en',   'Report a fault', $id );

    /* ── Serwis DE ── */
    update_field( 'fp_serwis_title_de', 'Service benötigt?', $id );
    update_field( 'fp_serwis_text_de',  'Störung, Inspektion, Kalibrierung oder Teilebestellung — unser Team antwortet innerhalb von 24h. Melden Sie das Problem online, bevor es zu Ausfallzeiten kommt.', $id );
    update_field( 'fp_serwis_cta_de',   'Störung melden', $id );

    /* ── Kontakt PL ── */
    update_field( 'fp_contact_eyebrow', 'Kontakt', $id );
    update_field( 'fp_contact_title',   'Zapytaj o ofertę', $id );
    update_field( 'fp_contact_sub',     'Dobierzemy maszynę do Twoich potrzeb i odpowiemy na każde pytanie.', $id );
    update_field( 'fp_contact_btn',     'Skontaktuj się z nami', $id );

    /* ── Kontakt EN ── */
    update_field( 'fp_contact_eyebrow_en', 'Contact', $id );
    update_field( 'fp_contact_title_en',   'Request an offer', $id );
    update_field( 'fp_contact_sub_en',     'We will select the right machine for your needs and answer every question.', $id );
    update_field( 'fp_contact_btn_en',     'Contact us', $id );

    /* ── Kontakt DE ── */
    update_field( 'fp_contact_eyebrow_de', 'Kontakt', $id );
    update_field( 'fp_contact_title_de',   'Angebot anfragen', $id );
    update_field( 'fp_contact_sub_de',     'Wir wählen die richtige Maschine für Ihre Bedürfnisse aus und beantworten alle Fragen.', $id );
    update_field( 'fp_contact_btn_de',     'Kontaktieren Sie uns', $id );

    update_option( 'bdj_fp_fields_populated_v3', true );
} );
