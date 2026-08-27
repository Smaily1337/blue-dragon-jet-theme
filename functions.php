<?php

require_once get_template_directory() . '/inc/acf-front-page.php';
require_once get_template_directory() . '/inc/acf-machines.php';

/* ═══════════════════════════════════════════════════════════════════════════
   THEME SETUP
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'after_setup_theme', function () {
    load_theme_textdomain( 'blue-dragon-jet', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ] );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    register_nav_menus( [ 'primary' => __( 'Primary Menu', 'blue-dragon-jet' ) ] );
} );

/* ═══════════════════════════════════════════════════════════════════════════
   ASSETS
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'blue-dragon-jet-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap',
        [], null );

    wp_enqueue_style( 'aos',
        'https://unpkg.com/aos@2.3.4/dist/aos.css',
        [], '2.3.4' );

    wp_enqueue_style( 'blue-dragon-jet-style',
        get_stylesheet_uri(),
        [ 'blue-dragon-jet-fonts', 'aos' ], $ver );

    wp_enqueue_script( 'aos',
        'https://unpkg.com/aos@2.3.4/dist/aos.js',
        [], '2.3.4', true );

    wp_add_inline_script( 'aos', 'AOS.init({ duration: 700, once: true, offset: 60 });' );

    wp_enqueue_script( 'blue-dragon-jet-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [], $ver, true );

    wp_localize_script( 'blue-dragon-jet-main', 'bdj_live_search_cfg', [
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'lang'     => function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl',
        'no_results' => [
            'pl' => 'Brak wyników dla',
            'en' => 'No results for',
            'de' => 'Keine Ergebnisse für',
        ],
    ] );

    // Cloudflare Turnstile — tylko na stronie kontakt
    if ( is_page_template( 'page-kontakt.php' ) ) {
        wp_enqueue_script( 'cf-turnstile',
            'https://challenges.cloudflare.com/turnstile/v0/api.js',
            [], null, true );
    }
} );

/* ═══════════════════════════════════════════════════════════════════════════
   SEO: BreadcrumbList JSON-LD dla stron maszyn
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'wp_head', function () {
    if ( ! is_singular( 'machine' ) ) return;
    $lang        = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
    $labels      = [ 'pl' => 'Maszyny', 'en' => 'Machines', 'de' => 'Maschinen' ];
    $archive_url = get_post_type_archive_link( 'machine' ) ?: home_url( '/machines/' );
    $crumbs      = [
        [ 'id' => 1, 'name' => ( $lang === 'en' ? 'Home' : ( $lang === 'de' ? 'Startseite' : 'Strona główna' ) ), 'url' => home_url( '/' ) ],
        [ 'id' => 2, 'name' => $labels[ $lang ] ?? $labels['pl'], 'url' => $archive_url ],
        [ 'id' => 3, 'name' => get_the_title(), 'url' => get_permalink() ],
    ];
    $items = array_map( fn( $c ) => [
        '@type'    => 'ListItem',
        'position' => $c['id'],
        'name'     => $c['name'],
        'item'     => $c['url'],
    ], $crumbs );
    echo '<script type="application/ld+json">' . wp_json_encode( [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $items,
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
} );

/* ═══════════════════════════════════════════════════════════════════════════
   CUSTOM POST TYPE: machine
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'init', function () {
    register_post_type( 'machine', [
        'labels' => [
            'name'                  => __( 'Maszyny',                    'blue-dragon-jet' ),
            'singular_name'         => __( 'Maszyna',                    'blue-dragon-jet' ),
            'add_new'               => __( 'Dodaj maszynę',              'blue-dragon-jet' ),
            'add_new_item'          => __( 'Dodaj maszynę',              'blue-dragon-jet' ),
            'edit_item'             => __( 'Edytuj maszynę',             'blue-dragon-jet' ),
            'new_item'              => __( 'Nowa maszyna',               'blue-dragon-jet' ),
            'view_item'             => __( 'Zobacz maszynę',             'blue-dragon-jet' ),
            'all_items'             => __( 'Wszystkie maszyny',          'blue-dragon-jet' ),
            'search_items'          => __( 'Szukaj maszyn',              'blue-dragon-jet' ),
            'not_found'             => __( 'Brak maszyn',                'blue-dragon-jet' ),
            'not_found_in_trash'    => __( 'Brak w koszu',               'blue-dragon-jet' ),
            'featured_image'        => __( 'Główne zdjęcie maszyny',     'blue-dragon-jet' ),
            'set_featured_image'    => __( 'Dodaj główne zdjęcie',       'blue-dragon-jet' ),
            'remove_featured_image' => __( 'Usuń zdjęcie',               'blue-dragon-jet' ),
            'use_featured_image'    => __( 'Użyj jako głównego zdjęcia', 'blue-dragon-jet' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => [ 'slug' => 'machines' ],
        'supports'     => [ 'title', 'editor', 'thumbnail' ],
        'menu_icon'    => 'dashicons-admin-tools',
        'show_in_rest' => true,   // needed for REST, but Gutenberg disabled below
    ] );
} );

/* ═══════════════════════════════════════════════════════════════════════════
   DISABLE GUTENBERG — only for 'machine' CPT
═══════════════════════════════════════════════════════════════════════════ */
add_filter( 'use_block_editor_for_post_type', function ( bool $use, string $post_type ): bool {
    return ( $post_type === 'machine' ) ? false : $use;
}, 10, 2 );

/* ═══════════════════════════════════════════════════════════════════════════
   CUSTOM TAXONOMY: machine_category
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'init', function () {
    register_taxonomy( 'machine_category', 'machine', [
        'labels' => [
            'name'              => __( 'Kategorie maszyn',   'blue-dragon-jet' ),
            'singular_name'     => __( 'Kategoria',          'blue-dragon-jet' ),
            'add_new_item'      => __( 'Dodaj kategorię',    'blue-dragon-jet' ),
            'edit_item'         => __( 'Edytuj kategorię',   'blue-dragon-jet' ),
            'update_item'       => __( 'Aktualizuj',         'blue-dragon-jet' ),
            'new_item_name'     => __( 'Nowa kategoria',     'blue-dragon-jet' ),
            'search_items'      => __( 'Szukaj kategorii',   'blue-dragon-jet' ),
            'all_items'         => __( 'Wszystkie kategorie','blue-dragon-jet' ),
            'parent_item'       => __( 'Nadrzędna',          'blue-dragon-jet' ),
            'parent_item_colon' => __( 'Nadrzędna:',         'blue-dragon-jet' ),
        ],
        'hierarchical'      => true,
        'public'            => true,
        'show_in_rest'      => true,
        'rewrite'           => [ 'slug' => 'machine-category' ],
        'show_admin_column' => true,
    ] );
} );

/* ═══════════════════════════════════════════════════════════════════════════
   ARCHIWA I KATEGORIE: 12 elementów na stronę (siatka 3-kolumnowa = 4 pełne rzędy)
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'pre_get_posts', function ( WP_Query $query ): void {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if (
        $query->is_post_type_archive( 'machine' ) ||
        $query->is_tax( 'machine_category' ) ||
        $query->is_tax( 'article_category' ) ||
        $query->is_archive() ||
        $query->is_home()
    ) {
        $query->set( 'posts_per_page', 12 );
    }
} );

/* ═══════════════════════════════════════════════════════════════════════════
   META BOX — Parametry maszyny
   Pola: checkbox kalkulator, checkboxy średnic, pole tekstowe
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'add_meta_boxes', function () {
    add_meta_box(
        'machine_parameters',
        __( 'Parametry maszyny', 'blue-dragon-jet' ),
        'bdj_machine_params_render',
        'machine',
        'normal',
        'high'
    );
} );

function bdj_machine_params_render( WP_Post $post ): void {
    wp_nonce_field( 'bdj_machine_params_save', 'bdj_machine_params_nonce' );

    $in_calc   = get_post_meta( $post->ID, 'machine_in_calculator',     true );
    $microduct = get_post_meta( $post->ID, 'machine_microduct_diameter', true );
    $pipe      = get_post_meta( $post->ID, 'machine_pipe_diameter',      true );
    $match     = get_post_meta( $post->ID, 'machine_perfect_match',      true );

    $microduct = is_array( $microduct ) ? $microduct : [];
    $pipe      = is_array( $pipe )      ? $pipe      : [];

    $microduct_options = [
        '0.8-6mm'  => '0.8–6 mm',
        '4-10mm'   => '4–10 mm',
        '10-15mm'  => '10–15 mm',
    ];
    $pipe_options = [
        'microduct 5-16mm' => 'Microduct 5–16 mm',
        'pipes 32-50mm'    => 'Pipes 32–50 mm',
    ];
    ?>
    <style>
        .bdj-params-table { width: 100%; border-collapse: collapse; font-size: 13px; }
        .bdj-params-table th,
        .bdj-params-table td  { padding: 12px 14px; border-bottom: 1px solid #f0f0f0; vertical-align: top; }
        .bdj-params-table tr:last-child th,
        .bdj-params-table tr:last-child td { border-bottom: none; }
        .bdj-params-table th  { width: 220px; font-weight: 600; color: #3c434a; text-align: left; line-height: 1.5; }
        .bdj-params-table th small { font-weight: 400; color: #646970; display: block; }
        .bdj-params-table .description { color: #646970; font-size: 12px; margin-top: 6px; }
        .bdj-check-group { display: flex; flex-wrap: wrap; gap: 10px 18px; padding-top: 2px; }
        .bdj-check-group label { display: flex; align-items: center; gap: 7px; cursor: pointer; }
        .bdj-check-group input[type="checkbox"],
        .bdj-single-check input[type="checkbox"] { width: 15px; height: 15px; cursor: pointer; accent-color: #2497D0; }
        .bdj-single-check { display: flex; align-items: center; gap: 8px; cursor: pointer; }
    </style>

    <table class="bdj-params-table">

        <!-- ── Kalkulator ── -->
        <tr>
            <th>
                <label for="machine_in_calculator">
                    <?php esc_html_e( 'In calculator?', 'blue-dragon-jet' ); ?>
                </label>
            </th>
            <td>
                <label class="bdj-single-check">
                    <input type="checkbox" id="machine_in_calculator"
                           name="machine_in_calculator" value="1"
                           <?php checked( '1', $in_calc ); ?>>
                    <?php esc_html_e( 'Dodaj do kalkulatora', 'blue-dragon-jet' ); ?>
                </label>
                <p class="description">
                    <?php esc_html_e( 'Zaznacz, jeśli maszyna ma być widoczna w kalkulatorze kosztów.', 'blue-dragon-jet' ); ?>
                </p>
            </td>
        </tr>

        <!-- ── Średnica mikrokabla ── -->
        <tr>
            <th>
                <?php esc_html_e( 'Średnica mikrokabla', 'blue-dragon-jet' ); ?>
                <small>Microduct diameter</small>
            </th>
            <td>
                <div class="bdj-check-group">
                    <?php foreach ( $microduct_options as $val => $label ) : ?>
                        <label>
                            <input type="checkbox"
                                   name="machine_microduct_diameter[]"
                                   value="<?php echo esc_attr( $val ); ?>"
                                   <?php checked( in_array( $val, $microduct, true ), true ); ?>>
                            <?php echo esc_html( $label ); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </td>
        </tr>

        <!-- ── Średnica rury ── -->
        <tr>
            <th>
                <?php esc_html_e( 'Średnica rury', 'blue-dragon-jet' ); ?>
                <small>Pipe diameter</small>
            </th>
            <td>
                <div class="bdj-check-group">
                    <?php foreach ( $pipe_options as $val => $label ) : ?>
                        <label>
                            <input type="checkbox"
                                   name="machine_pipe_diameter[]"
                                   value="<?php echo esc_attr( $val ); ?>"
                                   <?php checked( in_array( $val, $pipe, true ), true ); ?>>
                            <?php echo esc_html( $label ); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </td>
        </tr>

        <!-- ── Mikrorurka — opis tekstowy ── -->
        <?php
        $microduct_text = get_post_meta( $post->ID, 'machine_microduct_text', true );
        $pipe_text      = get_post_meta( $post->ID, 'machine_pipe_text',      true );
        ?>
        <tr style="background:#edf7ff;">
            <th>
                <?php esc_html_e( 'Mikrorurka — opis', 'blue-dragon-jet' ); ?>
                <small><?php esc_html_e( 'Wyświetlany na stronie produktu', 'blue-dragon-jet' ); ?></small>
            </th>
            <td>
                <input type="text"
                       id="machine_microduct_text"
                       name="machine_microduct_text"
                       value="<?php echo esc_attr( $microduct_text ); ?>"
                       class="large-text"
                       placeholder="<?php esc_attr_e( 'np. Mikrorurka 5/3,5 mm – 7/5,5 mm – 10/8 mm', 'blue-dragon-jet' ); ?>">
                <p class="description">
                    <?php esc_html_e( 'Dowolny tekst opisujący kompatybilne mikrorurki. Zostanie wyróżniony na stronie produktu.', 'blue-dragon-jet' ); ?>
                </p>
            </td>
        </tr>

        <!-- ── Kabel — opis tekstowy ── -->
        <tr style="background:#edf7ff;">
            <th>
                <?php esc_html_e( 'Kabel — opis', 'blue-dragon-jet' ); ?>
                <small><?php esc_html_e( 'Wyświetlany na stronie produktu', 'blue-dragon-jet' ); ?></small>
            </th>
            <td>
                <input type="text"
                       id="machine_pipe_text"
                       name="machine_pipe_text"
                       value="<?php echo esc_attr( $pipe_text ); ?>"
                       class="large-text"
                       placeholder="<?php esc_attr_e( 'np. Kabel ø 2–10 mm, przewody wielożyłowe', 'blue-dragon-jet' ); ?>">
                <p class="description">
                    <?php esc_html_e( 'Dowolny tekst opisujący kompatybilne kable. Zostanie wyróżniony na stronie produktu.', 'blue-dragon-jet' ); ?>
                </p>
            </td>
        </tr>

        <!-- ── Idealne do zestawu ── -->
        <?php
        // $match now stores a post ID (int). Support legacy text values too.
        $match_id = absint( $match );
        $other_machines = get_posts( [
            'post_type'      => 'machine',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'title',
            'order'          => 'ASC',
            'exclude'        => [ $post->ID ],
            'fields'         => 'ids',
        ] );
        ?>
        <tr>
            <th>
                <label for="machine_perfect_match">
                    <?php esc_html_e( 'Idealny zestaw z', 'blue-dragon-jet' ); ?>
                </label>
                <small><?php esc_html_e( 'Wybierz maszynę z listy', 'blue-dragon-jet' ); ?></small>
            </th>
            <td>
                <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
                    <select id="machine_perfect_match" name="machine_perfect_match"
                            style="min-width:280px;max-width:420px;padding:6px 10px;font-size:13px;border:1px solid #8c8f94;border-radius:4px;">
                        <option value=""><?php esc_html_e( '— Brak —', 'blue-dragon-jet' ); ?></option>
                        <?php foreach ( $other_machines as $mid ) : ?>
                            <option value="<?php echo esc_attr( $mid ); ?>"
                                <?php selected( $match_id, $mid ); ?>>
                                <?php echo esc_html( get_the_title( $mid ) ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if ( $match_id && get_post_status( $match_id ) ) : ?>
                    <div style="display:flex;align-items:center;gap:8px;background:#f0f8ff;border:1px solid #bdd9ee;border-radius:6px;padding:6px 10px;">
                        <?php if ( has_post_thumbnail( $match_id ) ) : ?>
                            <img src="<?php echo esc_url( get_the_post_thumbnail_url( $match_id, 'thumbnail' ) ); ?>"
                                 style="width:40px;height:32px;object-fit:cover;border-radius:3px;">
                        <?php endif; ?>
                        <span style="font-size:12px;font-weight:600;color:#1E425D;">
                            <?php echo esc_html( get_the_title( $match_id ) ); ?>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
                <p class="description" style="margin-top:6px;">
                    <?php esc_html_e( 'Wybrana maszyna będzie wyświetlana na karcie produktu jako polecany zestaw.', 'blue-dragon-jet' ); ?>
                </p>
            </td>
        </tr>

        <!-- ── Etykieta / odznaka ── -->
        <?php
        $bestseller  = get_post_meta( $post->ID, 'machine_bestseller',  true );
        $is_new      = get_post_meta( $post->ID, 'machine_badge_new',   true );
        $badge_custom = get_post_meta( $post->ID, 'machine_badge_custom', true );
        ?>
        <tr style="background:#fff8f0;">
            <th>
                <?php esc_html_e( 'Etykieta na karcie', 'blue-dragon-jet' ); ?>
                <small><?php esc_html_e( 'Wyróżnienie produktu', 'blue-dragon-jet' ); ?></small>
            </th>
            <td>
                <div class="bdj-check-group" style="flex-direction:column; gap:10px;">
                    <label>
                        <input type="checkbox" name="machine_bestseller" value="1" <?php checked( '1', $bestseller ); ?>>
                        <span style="display:inline-block;background:#e53e3e;color:#fff;font-size:11px;font-weight:700;padding:2px 8px;border-radius:3px;letter-spacing:.08em;text-transform:uppercase;">BESTSELLER</span>
                        <?php esc_html_e( '— czerwona etykieta', 'blue-dragon-jet' ); ?>
                    </label>
                    <label>
                        <input type="checkbox" name="machine_badge_new" value="1" <?php checked( '1', $is_new ); ?>>
                        <span style="display:inline-block;background:#38a169;color:#fff;font-size:11px;font-weight:700;padding:2px 8px;border-radius:3px;letter-spacing:.08em;text-transform:uppercase;">NOWOŚĆ</span>
                        <?php esc_html_e( '— zielona etykieta', 'blue-dragon-jet' ); ?>
                    </label>
                    <div style="display:flex;align-items:center;gap:8px;margin-top:2px;">
                        <span style="font-size:13px;color:#3c434a;"><?php esc_html_e( 'Własna etykieta:', 'blue-dragon-jet' ); ?></span>
                        <input type="text" name="machine_badge_custom"
                               value="<?php echo esc_attr( $badge_custom ); ?>"
                               placeholder="<?php esc_attr_e( 'np. PROMOCJA', 'blue-dragon-jet' ); ?>"
                               style="width:160px;padding:4px 8px;font-size:13px;">
                        <span style="font-size:12px;color:#646970;"><?php esc_html_e( '→ niebieska etykieta', 'blue-dragon-jet' ); ?></span>
                    </div>
                </div>
            </td>
        </tr>

    </table>
    <?php
}

/* ─── Bezpieczny zapis wszystkich pól ─────────────────────────────────── */
add_action( 'save_post_machine', function ( int $post_id ): void {

    if ( ! isset( $_POST['bdj_machine_params_nonce'] ) ||
         ! wp_verify_nonce(
             sanitize_text_field( wp_unslash( $_POST['bdj_machine_params_nonce'] ) ),
             'bdj_machine_params_save'
         ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    /* ── 1. In calculator ── */
    if ( isset( $_POST['machine_in_calculator'] ) ) {
        update_post_meta( $post_id, 'machine_in_calculator', '1' );
    } else {
        delete_post_meta( $post_id, 'machine_in_calculator' );
    }

    /* ── 2. Microduct diameter (whitelist) ── */
    $allowed_microduct = [ '0.8-6mm', '4-10mm', '10-15mm' ];
    if ( ! empty( $_POST['machine_microduct_diameter'] ) && is_array( $_POST['machine_microduct_diameter'] ) ) {
        $clean = array_values( array_intersect(
            array_map( 'sanitize_text_field', wp_unslash( $_POST['machine_microduct_diameter'] ) ),
            $allowed_microduct
        ) );
        update_post_meta( $post_id, 'machine_microduct_diameter', $clean );
    } else {
        delete_post_meta( $post_id, 'machine_microduct_diameter' );
    }

    /* ── 3. Pipe diameter (whitelist) ── */
    $allowed_pipe = [ 'microduct 5-16mm', 'pipes 32-50mm' ];
    if ( ! empty( $_POST['machine_pipe_diameter'] ) && is_array( $_POST['machine_pipe_diameter'] ) ) {
        $clean = array_values( array_intersect(
            array_map( 'sanitize_text_field', wp_unslash( $_POST['machine_pipe_diameter'] ) ),
            $allowed_pipe
        ) );
        update_post_meta( $post_id, 'machine_pipe_diameter', $clean );
    } else {
        delete_post_meta( $post_id, 'machine_pipe_diameter' );
    }

    /* ── 3b. Microduct text ── */
    $microduct_text = isset( $_POST['machine_microduct_text'] )
        ? sanitize_text_field( wp_unslash( $_POST['machine_microduct_text'] ) ) : '';
    if ( $microduct_text !== '' ) {
        update_post_meta( $post_id, 'machine_microduct_text', $microduct_text );
    } else {
        delete_post_meta( $post_id, 'machine_microduct_text' );
    }

    /* ── 3c. Pipe text ── */
    $pipe_text = isset( $_POST['machine_pipe_text'] )
        ? sanitize_text_field( wp_unslash( $_POST['machine_pipe_text'] ) ) : '';
    if ( $pipe_text !== '' ) {
        update_post_meta( $post_id, 'machine_pipe_text', $pipe_text );
    } else {
        delete_post_meta( $post_id, 'machine_pipe_text' );
    }

    /* ── 4b. Bestseller / badge ── */
    if ( isset( $_POST['machine_bestseller'] ) ) {
        update_post_meta( $post_id, 'machine_bestseller', '1' );
    } else {
        delete_post_meta( $post_id, 'machine_bestseller' );
    }
    if ( isset( $_POST['machine_badge_new'] ) ) {
        update_post_meta( $post_id, 'machine_badge_new', '1' );
    } else {
        delete_post_meta( $post_id, 'machine_badge_new' );
    }
    $badge_custom = isset( $_POST['machine_badge_custom'] )
        ? sanitize_text_field( wp_unslash( $_POST['machine_badge_custom'] ) ) : '';
    if ( $badge_custom !== '' ) {
        update_post_meta( $post_id, 'machine_badge_custom', $badge_custom );
    } else {
        delete_post_meta( $post_id, 'machine_badge_custom' );
    }

    /* ── 4. Perfect match (post ID) ── */
    $match_id = isset( $_POST['machine_perfect_match'] ) ? absint( wp_unslash( $_POST['machine_perfect_match'] ) ) : 0;
    if ( $match_id && get_post_status( $match_id ) && $match_id !== $post_id ) {
        update_post_meta( $post_id, 'machine_perfect_match', $match_id );
    } else {
        delete_post_meta( $post_id, 'machine_perfect_match' );
    }
} );

/* ═══════════════════════════════════════════════════════════════════════════
   HELPER — odznaka maszyny (zwraca HTML lub pusty string)
═══════════════════════════════════════════════════════════════════════════ */
function bdj_machine_badge_html( int $post_id ): string {
    if ( get_post_meta( $post_id, 'machine_bestseller', true ) ) {
        return '<span class="mc-badge mc-badge--red">BESTSELLER</span>';
    }
    if ( get_post_meta( $post_id, 'machine_badge_new', true ) ) {
        return '<span class="mc-badge mc-badge--green">NOWOŚĆ</span>';
    }
    $custom = get_post_meta( $post_id, 'machine_badge_custom', true );
    if ( $custom ) {
        return '<span class="mc-badge mc-badge--blue">' . esc_html( strtoupper( $custom ) ) . '</span>';
    }
    return '';
}

/* ═══════════════════════════════════════════════════════════════════════════
   BLOG — kategorie artykułów
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'init', function () {
    register_taxonomy( 'article_category', 'post', [
        'labels' => [
            'name'          => __( 'Kategorie artykułów', 'blue-dragon-jet' ),
            'singular_name' => __( 'Kategoria',           'blue-dragon-jet' ),
            'add_new_item'  => __( 'Dodaj kategorię',     'blue-dragon-jet' ),
            'all_items'     => __( 'Wszystkie kategorie', 'blue-dragon-jet' ),
        ],
        'hierarchical'      => true,
        'public'            => true,
        'show_in_rest'      => true,
        'rewrite'           => [ 'slug' => 'article-category' ],
        'show_admin_column' => true,
    ] );
} );

/* ═══════════════════════════════════════════════════════════════════════════
   CONTACT FORM HANDLER
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'init', function () {
    if ( empty( $_POST['bdj_submit'] ) ) return;

    if ( ! isset( $_POST['bdj_nonce'] ) ||
         ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bdj_nonce'] ) ), 'bdj_contact_form' ) ) {
        return;
    }

    $name    = sanitize_text_field( wp_unslash( $_POST['bdj_name']    ?? '' ) );
    $email   = sanitize_email(      wp_unslash( $_POST['bdj_email']   ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['bdj_phone']   ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['bdj_message'] ?? '' ) );

    if ( ! $name || ! is_email( $email ) || ! $message ) return;

    $to      = get_option( 'admin_email' );
    $subject = sprintf( __( 'Nowe zapytanie od %s – Blue Dragon Jet', 'blue-dragon-jet' ), $name );
    $body    = "Imię / Firma: {$name}\nE-mail: {$email}\nTelefon: {$phone}\n\nWiadomość:\n{$message}";
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        "Reply-To: {$name} <{$email}>",
    ];

    wp_mail( $to, $subject, $body, $headers );

    wp_safe_redirect( add_query_arg( 'contact', 'success', wp_get_referer() ?: home_url() ) );
    exit;
} );

/* ═══════════════════════════════════════════════════════════════════════════
   SERVICE FORM HANDLER
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'init', function () {
    if ( empty( $_POST['bdj_service_submit'] ) ) return;

    if ( ! isset( $_POST['bdj_service_nonce'] ) ||
         ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bdj_service_nonce'] ) ), 'bdj_service_form' ) ) {
        return;
    }

    $name    = sanitize_text_field( wp_unslash( $_POST['srv_name']    ?? '' ) );
    $email   = sanitize_email(      wp_unslash( $_POST['srv_email']   ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['srv_phone']   ?? '' ) );
    $serial  = sanitize_text_field( wp_unslash( $_POST['srv_serial']  ?? '' ) );
    $model   = sanitize_text_field( wp_unslash( $_POST['srv_model']   ?? '' ) );
    $problem = sanitize_textarea_field( wp_unslash( $_POST['srv_problem'] ?? '' ) );

    if ( ! $name || ! is_email( $email ) || ! $model || ! $problem ) return;

    $to      = get_option( 'admin_email' );
    $subject = sprintf( '[SERWIS] %s – model: %s – Blue Dragon Jet', $name, $model );
    $body    = "=== ZGŁOSZENIE SERWISOWE ===\n\n"
             . "Zgłaszający:   {$name}\n"
             . "E-mail:        {$email}\n"
             . "Telefon:       {$phone}\n"
             . "Model maszyny: {$model}\n"
             . "Nr seryjny:    {$serial}\n\n"
             . "Opis usterki:\n{$problem}\n";
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        "Reply-To: {$name} <{$email}>",
    ];

    wp_mail( $to, $subject, $body, $headers );

    wp_safe_redirect( add_query_arg( 'serwis', 'success', wp_get_referer() ?: home_url( '/#serwis' ) ) );
    exit;
} );

/* ═══════════════════════════════════════════════════════════════════════════
   DOMYŚLNE KATEGORIE MASZYN — tworzone raz przy aktywacji/wczytaniu
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'init', function () {
    $default_cats = [
        'Wdmuchiwanie kabli' => 'wdmuchiwanie-kabli',
        'Kompresory'         => 'kompresory',
        'Akcesoria'          => 'akcesoria',
    ];
    foreach ( $default_cats as $name => $slug ) {
        if ( ! term_exists( $slug, 'machine_category' ) ) {
            wp_insert_term( $name, 'machine_category', [ 'slug' => $slug ] );
        }
    }
}, 99 );

/* ═══════════════════════════════════════════════════════════════════════════
   TYTUŁY MASZYNY — PL / EN / DE
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'add_meta_boxes', function () {
    add_meta_box(
        'machine_titles_lang',
        '🌐 Tytuł maszyny — PL / EN / DE',
        'bdj_machine_titles_render',
        'machine',
        'normal',
        'high'
    );
} );

function bdj_machine_titles_render( WP_Post $post ): void {
    wp_nonce_field( 'bdj_machine_titles_save', 'bdj_machine_titles_nonce' );
    $title_en = get_post_meta( $post->ID, 'machine_title_en', true );
    $title_de = get_post_meta( $post->ID, 'machine_title_de', true );
    ?>
    <style>
        .bdj-titles-grid { display:grid; gap:14px; }
        .bdj-titles-grid label { font-weight:600; font-size:12px; color:#3c434a; display:flex; align-items:center; gap:6px; margin-bottom:4px; }
        .bdj-titles-grid .bdj-title-pl { background:#f6f7f7; border:1px solid #dcdcde; border-radius:4px; padding:9px 12px; font-size:14px; color:#777; width:100%; box-sizing:border-box; }
        .bdj-titles-grid input[type=text] { width:100%; box-sizing:border-box; }
        .bdj-titles-note { font-size:11px; color:#888; margin-top:2px; }
    </style>
    <div class="bdj-titles-grid">
        <div>
            <label>🇵🇱 Polski (tytuł główny)</label>
            <div class="bdj-title-pl"><?php echo esc_html( $post->post_title ); ?></div>
            <p class="bdj-titles-note">Edytuj w polu „Tytuł" na górze strony.</p>
        </div>
        <div>
            <label for="machine_title_en">🇬🇧 English title</label>
            <input type="text" id="machine_title_en" name="machine_title_en"
                   value="<?php echo esc_attr( $title_en ); ?>"
                   placeholder="Leave empty to use Polish title">
        </div>
        <div>
            <label for="machine_title_de">🇩🇪 Deutscher Titel</label>
            <input type="text" id="machine_title_de" name="machine_title_de"
                   value="<?php echo esc_attr( $title_de ); ?>"
                   placeholder="Leer lassen = polnischer Titel">
        </div>
    </div>
    <?php
}

add_action( 'save_post_machine', function ( int $post_id ): void {
    if ( ! isset( $_POST['bdj_machine_titles_nonce'] ) ) return;
    if ( ! wp_verify_nonce( sanitize_key( $_POST['bdj_machine_titles_nonce'] ), 'bdj_machine_titles_save' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    foreach ( [ 'machine_title_en', 'machine_title_de' ] as $key ) {
        $val = isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : '';
        if ( $val !== '' ) {
            update_post_meta( $post_id, $key, $val );
        } else {
            delete_post_meta( $post_id, $key );
        }
    }
} );

/* ═══════════════════════════════════════════════════════════════════════════
   GALERIA MASZYNY — meta box z wieloma zdjęciami
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'add_meta_boxes', function () {
    add_meta_box(
        'machine_gallery',
        __( 'Galeria zdjęć maszyny', 'blue-dragon-jet' ),
        'bdj_machine_gallery_render',
        'machine',
        'normal',
        'low'
    );
} );

function bdj_machine_gallery_render( WP_Post $post ): void {
    wp_nonce_field( 'bdj_machine_gallery_save', 'bdj_machine_gallery_nonce' );
    $gallery_ids = get_post_meta( $post->ID, 'machine_gallery_ids', true );
    $gallery_ids = $gallery_ids ? $gallery_ids : '';
    ?>
    <style>
        #bdj-gallery-preview { display:flex; flex-wrap:wrap; gap:10px; margin-bottom:12px; min-height:60px; }
        #bdj-gallery-preview .bdj-thumb { position:relative; width:100px; height:80px; border-radius:4px; overflow:hidden; border:1px solid #ddd; }
        #bdj-gallery-preview .bdj-thumb img { width:100%; height:100%; object-fit:cover; display:block; }
        #bdj-gallery-preview .bdj-thumb__remove { position:absolute; top:3px; right:3px; background:rgba(0,0,0,0.65); color:#fff; border:none; border-radius:50%; width:20px; height:20px; font-size:12px; line-height:20px; text-align:center; cursor:pointer; padding:0; }
        #bdj-gallery-add { cursor:pointer; }
    </style>
    <div id="bdj-gallery-preview"></div>
    <input type="hidden" id="bdj_machine_gallery_ids" name="bdj_machine_gallery_ids" value="<?php echo esc_attr( $gallery_ids ); ?>">
    <button type="button" id="bdj-gallery-add" class="button">
        <?php esc_html_e( '+ Dodaj zdjęcia do galerii', 'blue-dragon-jet' ); ?>
    </button>
    <p class="description" style="margin-top:8px;"><?php esc_html_e( 'Zdjęcia galerii wyświetlane na stronie produktu.', 'blue-dragon-jet' ); ?></p>
    <script>
    (function($){
        var ids = $('#bdj_machine_gallery_ids').val() ? $('#bdj_machine_gallery_ids').val().split(',') : [];
        function renderThumbs() {
            var $p = $('#bdj-gallery-preview'); $p.empty();
            ids.forEach(function(id, i) {
                if (!id) return;
                wp.media.attachment(id).fetch().then(function(data) {
                    var url = data.sizes && data.sizes.thumbnail ? data.sizes.thumbnail.url : data.url;
                    var $t = $('<div class="bdj-thumb"><img src="'+url+'"><button class="bdj-thumb__remove" data-i="'+i+'">&times;</button></div>');
                    $p.append($t);
                });
            });
        }
        renderThumbs();
        $('#bdj-gallery-preview').on('click', '.bdj-thumb__remove', function(){
            ids.splice($(this).data('i'), 1);
            $('#bdj_machine_gallery_ids').val(ids.join(','));
            renderThumbs();
        });
        $('#bdj-gallery-add').on('click', function(e){
            e.preventDefault();
            var frame = wp.media({ title: 'Wybierz zdjęcia galerii', button:{text:'Dodaj do galerii'}, multiple:true });
            frame.on('select', function(){
                frame.state().get('selection').each(function(att){
                    if (ids.indexOf(String(att.id)) === -1) ids.push(String(att.id));
                });
                $('#bdj_machine_gallery_ids').val(ids.join(','));
                renderThumbs();
            });
            frame.open();
        });
    }(jQuery));
    </script>
    <?php
}

add_action( 'save_post_machine', function ( int $post_id ): void {
    if ( ! isset( $_POST['bdj_machine_gallery_nonce'] ) ||
         ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bdj_machine_gallery_nonce'] ) ), 'bdj_machine_gallery_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $ids = isset( $_POST['bdj_machine_gallery_ids'] ) ? sanitize_text_field( wp_unslash( $_POST['bdj_machine_gallery_ids'] ) ) : '';
    // Keep only numeric IDs
    $clean = implode( ',', array_filter( array_map( 'absint', explode( ',', $ids ) ) ) );
    if ( $clean ) {
        update_post_meta( $post_id, 'machine_gallery_ids', $clean );
    } else {
        delete_post_meta( $post_id, 'machine_gallery_ids' );
    }
}, 20 );

/* ═══════════════════════════════════════════════════════════════════════════
   DOKUMENTY MASZYNY — meta box z kartami produktu (PDF)
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'add_meta_boxes', function () {
    add_meta_box(
        'machine_documents',
        __( 'Dokumenty / Karty produktu (PDF)', 'blue-dragon-jet' ),
        'bdj_machine_documents_render',
        'machine',
        'normal',
        'low'
    );
} );

function bdj_machine_documents_render( WP_Post $post ): void {
    wp_nonce_field( 'bdj_machine_docs_save', 'bdj_machine_docs_nonce' );
    $doc_ids = get_post_meta( $post->ID, 'machine_document_ids', true );
    $doc_ids = $doc_ids ? $doc_ids : '';
    ?>
    <style>
        #bdj-docs-list { margin-bottom: 12px; }
        #bdj-docs-list .bdj-doc-item {
            display: flex; align-items: center; gap: 10px;
            padding: 8px 10px; background: #f8f9fa; border-radius: 6px;
            border: 1px solid #e2e8f0; margin-bottom: 6px; font-size: 13px;
        }
        #bdj-docs-list .bdj-doc-item .bdj-doc-icon { color: #e53e3e; font-size: 16px; }
        #bdj-docs-list .bdj-doc-item .bdj-doc-name { flex: 1; color: #1E425D; font-weight: 500; }
        #bdj-docs-list .bdj-doc-item .bdj-doc-remove {
            background: none; border: none; color: #999; cursor: pointer;
            font-size: 16px; line-height: 1; padding: 0 4px;
        }
        #bdj-docs-list .bdj-doc-item .bdj-doc-remove:hover { color: #e53e3e; }
        #bdj-docs-add { cursor: pointer; }
    </style>
    <div id="bdj-docs-list"></div>
    <input type="hidden" id="bdj_machine_document_ids" name="bdj_machine_document_ids" value="<?php echo esc_attr( $doc_ids ); ?>">
    <button type="button" id="bdj-docs-add" class="button">
        <?php esc_html_e( '+ Dodaj dokument / kartę produktu', 'blue-dragon-jet' ); ?>
    </button>
    <p class="description" style="margin-top:8px;">
        <?php esc_html_e( 'Dodaj pliki PDF (karty produktu, instrukcje, certyfikaty). Będą dostępne do pobrania w zakładce "Dokumenty" na stronie produktu.', 'blue-dragon-jet' ); ?>
    </p>
    <script>
    (function($){
        var ids = $('#bdj_machine_document_ids').val() ? $('#bdj_machine_document_ids').val().split(',') : [];
        function renderDocs() {
            var $list = $('#bdj-docs-list'); $list.empty();
            ids.forEach(function(id, i) {
                if (!id) return;
                wp.media.attachment(id).fetch().then(function(data) {
                    var name = data.filename || data.title || 'dokument-' + id;
                    var $item = $(
                        '<div class="bdj-doc-item">' +
                        '<span class="bdj-doc-icon">📄</span>' +
                        '<span class="bdj-doc-name">' + $('<span>').text(name).html() + '</span>' +
                        '<button type="button" class="bdj-doc-remove" data-i="' + i + '">&times;</button>' +
                        '</div>'
                    );
                    $list.append($item);
                });
            });
            if (!ids.filter(Boolean).length) {
                $list.html('<p style="color:#999;font-size:13px;margin:0 0 8px;"><?php esc_html_e( 'Brak dodanych dokumentów.', 'blue-dragon-jet' ); ?></p>');
            }
        }
        renderDocs();
        $('#bdj-docs-list').on('click', '.bdj-doc-remove', function(){
            ids.splice($(this).data('i'), 1);
            $('#bdj_machine_document_ids').val(ids.join(','));
            renderDocs();
        });
        $('#bdj-docs-add').on('click', function(e){
            e.preventDefault();
            var frame = wp.media({
                title: 'Wybierz dokumenty PDF',
                button: { text: 'Dodaj dokumenty' },
                multiple: true,
                library: { type: 'application/pdf' }
            });
            frame.on('select', function(){
                frame.state().get('selection').each(function(att){
                    if (ids.indexOf(String(att.id)) === -1) ids.push(String(att.id));
                });
                $('#bdj_machine_document_ids').val(ids.join(','));
                renderDocs();
            });
            frame.open();
        });
    }(jQuery));
    </script>
    <?php
}

// Note: language switcher logic is in mu-plugins/bdj-lang-switcher.php
// (loads before theme so locale filter fires before load_theme_textdomain)

/* ═══════════════════════════════════════════════════════════════════════════
   SEO FIXES
═══════════════════════════════════════════════════════════════════════════ */

// 1. Unikalne, wielojęzyczne tytuły stron z kluczowymi frazami SEO i GEO
add_filter( 'document_title_parts', function ( array $parts ): array {
    $lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';

    if ( is_front_page() ) {
        $taglines = [
            'pl' => 'Producent wdmuchiwarek do światłowodów | Maszyny FTTH',
            'en' => 'Fiber Optic Cable Blowing Machine Manufacturer | FTTH Jetting Equipment',
            'de' => 'Glasfaser Einblasmaschinen Hersteller | LWL Einblastechnik FTTH',
        ];
        $parts['title']   = 'Blue Dragon Jet';
        $parts['tagline'] = $taglines[ $lang ] ?? $taglines['pl'];
        return $parts;
    }

    if ( is_post_type_archive( 'machine' ) ) {
        $archive_titles = [
            'pl' => 'Wdmuchiwarki do światłowodów | Maszyny i Akcesoria FTTH – Blue Dragon Jet',
            'en' => 'Fiber Optic Cable Blowing Machines & FTTH Jetting Equipment – Blue Dragon Jet',
            'de' => 'Glasfaser Einblasmaschinen & LWL Verlegetechnik – Blue Dragon Jet',
        ];
        $parts['title'] = $archive_titles[ $lang ] ?? $archive_titles['pl'];
        unset( $parts['tagline'] );
        return $parts;
    }

    if ( is_singular( 'machine' ) ) {
        $title_suffix = [
            'pl' => 'Wdmuchiwarka do światłowodów | Blue Dragon Jet',
            'en' => 'Fiber Optic Cable Blowing Machine | Blue Dragon Jet',
            'de' => 'Glasfaser Einblasmaschine | Blue Dragon Jet',
        ];
        $parts['title'] = get_the_title() . ' – ' . ( $title_suffix[ $lang ] ?? $title_suffix['pl'] );
        unset( $parts['tagline'] );
        return $parts;
    }

    $slug_titles = [
        'pl' => [
            'o-nas'                => 'O firmie | Producent maszyn do wdmuchiwania kabli FTTH od 2001',
            'serwis'               => 'Serwis wdmuchiwarek BDJ | Gwarancja, naprawy, kalibracja',
            'szkolenia'            => 'Szkolenia FTTH | Certyfikowane wdmuchiwanie kabli światłowodowych',
            'kontakt'              => 'Kontakt | Dobór wdmuchiwarki do światłowodów i wycena B2B',
            'akademia'             => 'BDJ Academy | Kursy i wiedza o wdmuchiwaniu światłowodów',
            'polityka-prywatnosci' => 'Polityka prywatności | Blue Dragon Jet',
        ],
        'en' => [
            'o-nas'                => 'About Us | European Cable Blowing Machine Manufacturer Since 2001',
            'serwis'               => 'Machine Service & Calibration | Blue Dragon Jet Support',
            'szkolenia'            => 'FTTH Cable Blowing Training | Certified Operator Courses',
            'kontakt'              => 'Contact & B2B Quote | Blue Dragon Jet Fiber Equipment',
            'akademia'             => 'BDJ Academy | Online Cable Blowing Knowledge & Guides',
            'polityka-prywatnosci' => 'Privacy Policy | Blue Dragon Jet',
        ],
        'de' => [
            'o-nas'                => 'Über uns | Hersteller von Glasfaser Einblasmaschinen seit 2001',
            'serwis'               => 'Service & Kalibrierung | Blue Dragon Jet Support',
            'szkolenia'            => 'FTTH Schulungen | Zertifizierte Glasfaser-Einblastechnik',
            'kontakt'              => 'Kontakt & Angebot | Glasfaser Einblasgeräte B2B',
            'akademia'             => 'BDJ Akademie | Wissen & Schulung für LWL-Einblastechnik',
            'polityka-prywatnosci' => 'Datenschutzerklärung | Blue Dragon Jet',
        ],
    ];

    global $post;
    if ( $post && isset( $slug_titles[ $lang ][ $post->post_name ] ) ) {
        $parts['title'] = $slug_titles[ $lang ][ $post->post_name ];
        unset( $parts['tagline'] );
    }
    return $parts;
} );

// 2a. Tłumaczenie tytułów maszyn — podmienia the_title() na EN/DE jeśli pole wypełnione
add_filter( 'the_title', function( string $title, int $post_id = 0 ): string {
    if ( is_admin() || ! $post_id ) return $title;
    if ( get_post_type( $post_id ) !== 'machine' ) return $title;
    $lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
    if ( $lang === 'pl' || ! function_exists( 'get_field' ) ) return $title;
    $translated = get_field( 'machine_title_' . $lang, $post_id );
    return ( $translated && trim( $translated ) !== '' ) ? $translated : $title;
}, 10, 2 );

// 2b. Tłumaczenie excerpt maszyn — podmienia get_the_excerpt() na EN/DE
add_filter( 'get_the_excerpt', function( string $excerpt, $post ): string {
    if ( is_admin() ) return $excerpt;
    $post_id = is_object( $post ) ? $post->ID : (int) $post;
    if ( ! $post_id || get_post_type( $post_id ) !== 'machine' ) return $excerpt;
    $lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
    if ( $lang === 'pl' || ! function_exists( 'get_field' ) ) return $excerpt;
    $translated = get_field( 'machine_excerpt_' . $lang, $post_id );
    return ( $translated && trim( $translated ) !== '' ) ? $translated : $excerpt;
}, 10, 2 );

// 2c. Napraw H1 w treści postów maszyn → H2 (żeby nie było dwóch H1)
add_filter( 'the_content', function ( string $content ): string {
    if ( ! is_singular( 'machine' ) ) return $content;
    $content = preg_replace( '/<h1(\b[^>]*)>/i', '<h2$1>', $content );
    $content = preg_replace( '/<\/h1>/i', '</h2>', $content );
    return $content;
} );

// 3. Wyłącz hreflang Polylang (obsługujemy czyste URL-e bezpośrednio w header.php)
add_filter( 'pll_rel_hreflang_attributes', '__return_empty_array' );

// 4. Schema.org Organization & LocalBusiness & Manufacturer (GEO Authority)
add_action( 'wp_head', function (): void {
    if ( ! is_front_page() ) return;
    $lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';

    $descs = [
        'pl' => 'GAMM-BUD / Blue Dragon Jet — polski i europejski producent profesjonalnych maszyn do wdmuchiwania kabli i mikrokabli światłowodowych FTTH. Działamy od 2001 roku w ponad 60 krajach na świecie.',
        'en' => 'GAMM-BUD / Blue Dragon Jet — European manufacturer of professional fiber optic cable blowing machines and FTTH microduct equipment. Operating since 2001 across 60+ countries worldwide.',
        'de' => 'GAMM-BUD / Blue Dragon Jet — Europäischer Hersteller von professionellen Glasfaser-Einblasmaschinen und FTTH Mikrorohr-Geräten. Tätig seit 2001 in über 60 Ländern weltweit.',
    ];

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => [ 'Organization', 'Manufacturer', 'LocalBusiness' ],
        'name'     => 'GAMM-BUD Sp. z o.o. / Blue Dragon Jet',
        'legalName'=> 'GAMM-BUD Sp. z o.o.',
        'alternateName' => [ 'Blue Dragon Jet', 'BDJ Machines', 'BDJ Cable Blowing' ],
        'url'      => home_url( '/' ),
        'logo'     => [
            '@type' => 'ImageObject',
            'url'   => get_theme_file_uri( 'assets/img/logo.svg' ),
        ],
        'image'        => get_theme_file_uri( 'assets/img/og-default.jpg' ),
        'description'  => $descs[ $lang ] ?? $descs['pl'],
        'foundingDate' => '2001',
        'address'      => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Skarbimierzyce, ul. Wiosenna 4',
            'addressLocality' => 'Dołuje / Szczecin',
            'postalCode'      => '72-002',
            'addressCountry'  => 'PL',
        ],
        'geo' => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => 53.4219,
            'longitude' => 14.4172,
        ],
        'areaServed' => [ 'Poland', 'Germany', 'France', 'Italy', 'Spain', 'United Kingdom', 'European Union', 'Worldwide' ],
        'knowsAbout' => [
            'Fiber optic cable blowing machines',
            'Wdmuchiwanie światłowodów',
            'Glasfaser Einblasmaschinen',
            'FTTH telecommunication infrastructure',
            'Microduct cable jetting',
        ],
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'telephone'         => '+48-695-881-783',
            'email'             => 'info@bluedragonjet.com',
            'contactType'       => 'customer service',
            'availableLanguage' => [ 'Polish', 'English', 'German' ],
        ],
        'sameAs' => [
            'https://www.linkedin.com/company/blue-dragon-jet',
        ],
    ];
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}, 5 );

// 5. Schema.org FAQPage (Klucz do Google AI Overviews, Gemini, ChatGPT Search & Perplexity)
add_action( 'wp_head', function (): void {
    if ( ! is_front_page() && ! is_post_type_archive( 'machine' ) ) return;
    $lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';

    $faqs_by_lang = [
        'pl' => [
            [
                'q' => 'Co to jest wdmuchiwarka do światłowodów i jak działa?',
                'a' => 'Wdmuchiwarka do światłowodów (np. Blue Dragon Jet) to specjalistyczna maszyna wykorzystująca metodę pneumatyczno-mechaniczną do instalacji mikrokabli i kabli światłowodowych w mikrorurach i rurociągach kablowych za pomocą sprężonego powietrza i napędu mechanicznego.',
            ],
            [
                'q' => 'Do jakich średnic kabli nadają się maszyny Blue Dragon Jet?',
                'a' => 'Maszyny BDJ obsługują mikrokable i kable światłowodowe o średnicach od 0.8 mm do 15 mm (modele BDJ Mini, BDJ Next, BDJ Budget, BDJ Standard, BDJ Extended, BDJ MAX oraz BDJ Hydro) w mikrorurach o średnicy od 5 mm do 50 mm.',
            ],
            [
                'q' => 'Jaki kompresor jest wymagany do wdmuchiwania światłowodów?',
                'a' => 'Zalecany jest kompresor o ciśnieniu roboczym od 10 do 15 bar i wydajności od 1.0 m³/min (dla mikrokabli) do 10.0 m³/min (dla grubych kabli magistralnych). BDJ produkuje również dedykowane chłodnice i osprzęt DragonAir.',
            ],
            [
                'q' => 'Gdzie są produkowane maszyny Blue Dragon Jet i jaka jest gwarancja?',
                'a' => 'Wszystkie wdmuchiwarki Blue Dragon Jet są projektowane i produkowane w Polsce (Unia Europejska) przez firmę GAMM-BUD z ponad 20-letnim doświadczeniem (od 2001 r.). Wszystkie maszyny objęte są pełną 36-miesięczną gwarancją producenta.',
            ],
        ],
        'en' => [
            [
                'q' => 'What is a fiber optic cable blowing machine and how does it work?',
                'a' => 'A fiber optic cable blowing machine (such as Blue Dragon Jet) is a specialized device utilizing a pneumatic-mechanical method to install microcables and fiber cables into microducts using compressed air and a mechanical belt drive.',
            ],
            [
                'q' => 'What cable diameters can Blue Dragon Jet machines blow?',
                'a' => 'Blue Dragon Jet machines cover fiber optic cables and microcables from 0.8 mm to 15 mm (models BDJ Mini, BDJ Next, BDJ Budget, BDJ Standard, BDJ Extended, BDJ MAX, and BDJ Hydro) in ducts ranging from 5 mm to 50 mm.',
            ],
            [
                'q' => 'What compressor is required for fiber optic cable jetting?',
                'a' => 'A compressor with working pressure of 10 to 15 bar and airflow between 1.0 m³/min (for microducts) and 10.0 m³/min (for feeder cables) is recommended.',
            ],
            [
                'q' => 'Where are Blue Dragon Jet machines manufactured?',
                'a' => 'All Blue Dragon Jet blowing machines are engineered and manufactured in Poland (European Union) by GAMM-BUD with over 20 years of experience since 2001, backed by a 36-month manufacturer warranty.',
            ],
        ],
        'de' => [
            [
                'q' => 'Was ist eine Glasfaser-Einblasmaschine und wie funktioniert sie?',
                'a' => 'Eine Glasfaser-Einblasmaschine (wie Blue Dragon Jet) ist ein Präzisionsgerät, das Glasfaserkabel und Mikrokabel pneumatisch-mechanisch mittels Druckluft und Riemenantrieb schonend in Mikrorohre einbläst.',
            ],
            [
                'q' => 'Welche Kabeldurchmesser können mit BDJ Maschinen eingeblasen werden?',
                'a' => 'Blue Dragon Jet Einblasmaschinen eignen sich für Glasfaserkabel von 0,8 mm bis 15 mm (Modelle BDJ Mini, BDJ Next, BDJ Budget, BDJ Standard, BDJ Extended, BDJ MAX, BDJ Hydro) in Rohren von 5 mm bis 50 mm.',
            ],
            [
                'q' => 'Welcher Kompressor wird für das Glasfaser-Einblasen benötigt?',
                'a' => 'Empfohlen wird ein Kompressor mit einem Arbeitsdruck von 10 bis 15 bar und einer Fördermenge von 1,0 m³/min bis 10,0 m³/min.',
            ],
            [
                'q' => 'Wo werden Blue Dragon Jet Einblasgeräte hergestellt?',
                'a' => 'Alle Blue Dragon Jet Maschinen werden in Polen (Europäische Union) von GAMM-BUD mit über 20 Jahren Erfahrung seit 2001 hergestellt und verfügen über 36 Monate Herstellergarantie.',
            ],
        ],
    ];

    $items = $faqs_by_lang[ $lang ] ?? $faqs_by_lang['pl'];
    $main_entity = [];
    foreach ( $items as $it ) {
        $main_entity[] = [
            '@type'          => 'Question',
            'name'           => $it['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $it['a'],
            ],
        ];
    }

    $schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $main_entity,
    ];
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}, 6 );

// 6. WebSite Schema z SearchAction
add_action( 'wp_head', function (): void {
    if ( ! is_front_page() ) return;
    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        'name'     => 'Blue Dragon Jet',
        'url'      => home_url( '/' ),
    ];
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}, 5 );

// 7. Breadcrumb Schema na podstronach (Wielojęzyczne)
add_action( 'wp_head', function (): void {
    if ( is_front_page() || is_home() ) return;
    $lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';

    $home_names = [ 'pl' => 'Strona główna', 'en' => 'Home', 'de' => 'Startseite' ];
    $mach_names = [ 'pl' => 'Maszyny', 'en' => 'Machines', 'de' => 'Maschinen' ];

    $items = [
        [ '@type' => 'ListItem', 'position' => 1, 'name' => $home_names[ $lang ] ?? 'Strona główna', 'item' => home_url( '/' ) ],
    ];
    if ( is_singular( 'machine' ) ) {
        $items[] = [ '@type' => 'ListItem', 'position' => 2, 'name' => $mach_names[ $lang ] ?? 'Maszyny', 'item' => ( get_post_type_archive_link( 'machine' ) ?: home_url( '/machines/' ) ) ];
        $items[] = [ '@type' => 'ListItem', 'position' => 3, 'name' => get_the_title(), 'item' => get_permalink() ];
    } elseif ( is_singular() ) {
        $items[] = [ '@type' => 'ListItem', 'position' => 2, 'name' => get_the_title(), 'item' => get_permalink() ];
    }
    if ( count( $items ) < 2 ) return;
    $schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $items,
    ];
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}, 5 );

// 8. Ogranicz users z sitemapy (niepotrzebne dla SEO)
add_filter( 'wp_sitemaps_users_query_args', function () { return [ 'include' => [] ]; } );

// 9. GEO: Zezwolenie dla botów AI i wyszukiwarek generatywnych (robots.txt)
add_filter( 'robots_txt', function( string $output, bool $public ): string {
    if ( ! $public ) return $output;
    $ai_bots = "\n# Generative Engine Optimization (GEO) & AI Search Engines\n"
             . "User-agent: GPTBot\nAllow: /\n\n"
             . "User-agent: ChatGPT-User\nAllow: /\n\n"
             . "User-agent: PerplexityBot\nAllow: /\n\n"
             . "User-agent: Google-Extended\nAllow: /\n\n"
             . "User-agent: ClaudeBot\nAllow: /\n\n"
             . "User-agent: Applebot-Extended\nAllow: /\n\n";
    return $output . $ai_bots;
}, 10, 2 );

/* ═══════════════════════════════════════════════════════════════════════════
   MACHINE DOCS META
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'save_post_machine', function ( int $post_id ): void {
    if ( ! isset( $_POST['bdj_machine_docs_nonce'] ) ||
         ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bdj_machine_docs_nonce'] ) ), 'bdj_machine_docs_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $ids   = isset( $_POST['bdj_machine_document_ids'] ) ? sanitize_text_field( wp_unslash( $_POST['bdj_machine_document_ids'] ) ) : '';
    $clean = implode( ',', array_filter( array_map( 'absint', explode( ',', $ids ) ) ) );
    if ( $clean ) {
        update_post_meta( $post_id, 'machine_document_ids', $clean );
    } else {
        delete_post_meta( $post_id, 'machine_document_ids' );
    }
}, 25 );

/* ═══════════════════════════════════════════════════════════════════════════
   LIVE SEARCH AJAX ENDPOINT FOR MACHINES & ACCESSORIES
═══════════════════════════════════════════════════════════════════════════ */
add_action( 'wp_ajax_bdj_live_search', 'bdj_ajax_live_search_handler' );
add_action( 'wp_ajax_nopriv_bdj_live_search', 'bdj_ajax_live_search_handler' );

function bdj_ajax_live_search_handler(): void {
    $q    = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : '';
    $lang = isset( $_GET['lang'] ) ? sanitize_key( $_GET['lang'] ) : 'pl';
    if ( ! in_array( $lang, [ 'pl', 'en', 'de' ], true ) ) {
        $lang = 'pl';
    }

    if ( mb_strlen( trim( $q ) ) < 1 ) {
        wp_send_json_success( [] );
    }

    $q_clean = trim( $q );

    // 1. Główne zapytanie WordPress
    $query = new WP_Query( [
        'post_type'      => 'machine',
        'post_status'    => 'publish',
        'posts_per_page' => 12,
        's'              => $q_clean,
    ] );

    $results = [];
    $seen_ids = [];

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $post_id = get_the_ID();
            $seen_ids[] = $post_id;

            $title = get_the_title();
            if ( $lang !== 'pl' && function_exists( 'get_field' ) ) {
                $tr_title = get_field( 'machine_title_' . $lang, $post_id );
                if ( ! empty( $tr_title ) ) {
                    $title = $tr_title;
                }
            }

            $cats     = get_the_terms( $post_id, 'machine_category' );
            $cat_name = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';

            $a_md      = get_post_meta( $post_id, 'machine_microduct_diameter', true );
            $a_pd      = get_post_meta( $post_id, 'machine_pipe_diameter', true );
            $specs_arr = array_merge( is_array( $a_md ) ? $a_md : [], is_array( $a_pd ) ? $a_pd : [] );
            $specs     = ! empty( $specs_arr ) ? implode( ' · ', $specs_arr ) : '';

            $thumb = get_the_post_thumbnail_url( $post_id, 'thumbnail' ) ?: get_the_post_thumbnail_url( $post_id, 'medium' ) ?: '';

            $url = get_permalink( $post_id );
            if ( function_exists( 'bdj_lang_url' ) ) {
                $url = bdj_lang_url( $lang, $url );
            }

            $results[] = [
                'id'       => $post_id,
                'title'    => $title,
                'url'      => $url,
                'thumb'    => $thumb,
                'category' => $cat_name,
                'specs'    => $specs,
            ];
        }
        wp_reset_postdata();
    }

    // 2. Jeśli mało wyników, przeszukaj także przetłumaczone tytuły i excerpt
    if ( count( $results ) < 6 ) {
        $all_machines = get_posts( [
            'post_type'      => 'machine',
            'post_status'    => 'publish',
            'posts_per_page' => 100,
            'exclude'        => $seen_ids,
        ] );

        $q_lower = mb_strtolower( $q_clean );
        foreach ( $all_machines as $m ) {
            $title = $m->post_title;
            if ( $lang !== 'pl' && function_exists( 'get_field' ) ) {
                $tr_title = get_field( 'machine_title_' . $lang, $m->ID );
                if ( ! empty( $tr_title ) ) {
                    $title = $tr_title;
                }
            }

            $matches = ( mb_stripos( $title, $q_lower ) !== false ) ||
                       ( mb_stripos( $m->post_content, $q_lower ) !== false ) ||
                       ( mb_stripos( $m->post_excerpt, $q_lower ) !== false );

            if ( $matches ) {
                $cats     = get_the_terms( $m->ID, 'machine_category' );
                $cat_name = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';
                $a_md     = get_post_meta( $m->ID, 'machine_microduct_diameter', true );
                $a_pd     = get_post_meta( $m->ID, 'machine_pipe_diameter', true );
                $specs_arr = array_merge( is_array( $a_md ) ? $a_md : [], is_array( $a_pd ) ? $a_pd : [] );
                $specs    = ! empty( $specs_arr ) ? implode( ' · ', $specs_arr ) : '';
                $thumb    = get_the_post_thumbnail_url( $m->ID, 'thumbnail' ) ?: '';
                $url      = get_permalink( $m->ID );
                if ( function_exists( 'bdj_lang_url' ) ) {
                    $url = bdj_lang_url( $lang, $url );
                }

                $results[] = [
                    'id'       => $m->ID,
                    'title'    => $title,
                    'url'      => $url,
                    'thumb'    => $thumb,
                    'category' => $cat_name,
                    'specs'    => $specs,
                ];

                if ( count( $results ) >= 10 ) break;
            }
        }
    }

    wp_send_json_success( $results );
}

/**
 * Detect whether mobile view should be served.
 * Supports:
 * - ?view=mobile / ?view=desktop query param (sets cookie)
 * - bdj_view_mode cookie
 * - wp_is_mobile() for actual phone/tablet devices
 */
function bdj_is_mobile(): bool {
    if ( isset( $_GET['view'] ) ) {
        if ( $_GET['view'] === 'mobile' ) return true;
        if ( $_GET['view'] === 'desktop' ) return false;
    }
    if ( isset( $_COOKIE['bdj_view_mode'] ) ) {
        if ( $_COOKIE['bdj_view_mode'] === 'mobile' ) return true;
        if ( $_COOKIE['bdj_view_mode'] === 'desktop' ) return false;
    }
    return function_exists( 'wp_is_mobile' ) && wp_is_mobile();
}

add_action( 'init', function() {
    if ( isset( $_GET['view'] ) && in_array( $_GET['view'], [ 'mobile', 'desktop' ], true ) ) {
        setcookie( 'bdj_view_mode', sanitize_text_field( $_GET['view'] ), time() + 86400 * 30, '/' );
        $_COOKIE['bdj_view_mode'] = sanitize_text_field( $_GET['view'] );
    }
} );
