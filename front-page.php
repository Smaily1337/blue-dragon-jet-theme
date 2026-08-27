<?php
get_header();
$_fp   = bdj_fp_id();
$_lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';

// Tłumaczenia ogólnych sekcji strony głównej (maszyny, dystrybucja, partnerzy, opinie, kontakt, wizard)
$_fpt = [
    'pl' => [
        'machines_eyebrow'  => 'Produkty',
        'machines_title'    => 'Nasze maszyny do wdmuchiwania kabli',
        'learn_more'        => 'Dowiedz się więcej',
        'all_machines'      => 'Zobacz wszystkie maszyny',
        'distrib_eyebrow'   => 'Dystrybucja',
        'distrib_title'     => 'Nasi dystrybutorzy na całym świecie',
        'distrib_cta'       => 'Zostań dystrybutorem',
        'partners_eyebrow'  => 'Zaufali nam',
        'partners_title'    => 'Nasi partnerzy',
        'reviews_eyebrow'   => 'Opinie',
        'contact_eyebrow'   => 'Kontakt',
        'contact_title'     => 'Skontaktuj się z nami',
        'phone'             => 'Telefon',
        'email'             => 'E-mail',
        'address'           => 'Adres',
        'sent_badge'        => 'Wysłano',
        'msg_sent'          => 'Wiadomość wysłana!',
        'msg_thanks'        => 'Dziękujemy. Odpiszemy w ciągu 24 godzin roboczych.',
        'reply_24h'         => 'Odpowiedź w 24h',
        'steps_3'           => '3 proste kroki',
        'have_question'     => 'Masz pytanie o nasze produkty?',
        'contact_sub'       => 'Wybierz kategorię i produkty — dopasujemy ofertę do Twoich potrzeb i odezwiemy się w ciągu jednego dnia roboczego.',
        'send_inquiry'      => 'Wyślij zapytanie',
        'call_us'           => 'Zadzwoń',
        'form_title'        => 'Formularz zapytania',
        'step_cat'          => 'Kategoria',
        'step_prod'         => 'Produkty',
        'step_data'         => 'Dane',
        'close'             => 'Zamknij',
        'select_products'   => 'Wybierz produkty',
        'select_multiple'   => 'Możesz zaznaczyć kilka pozycji.',
        'duct_inner'        => 'Śr. wewnętrzna rurki',
        'cable_outer'       => 'Śr. zewnętrzna kabla',
        'recommended'       => 'Polecane',
        'back'              => 'Wstecz',
        'next_step'         => 'Dalej',
        'your_contact'      => 'Twoje dane kontaktowe',
        'reply_sub'         => 'Odpiszemy w ciągu 24 godzin roboczych.',
        'full_name'         => 'Imię i nazwisko *',
        'email_label'       => 'Adres e-mail *',
        'phone_label'       => 'Numer telefonu',
        'add_message'       => 'Dodatkowa wiadomość',
        'msg_placeholder'   => 'Opcjonalnie — szczegóły, termin realizacji, pytania techniczne...',
        'gdpr'              => 'Wyrażam zgodę na przetwarzanie moich danych osobowych przez GAMM-BUD Sp. z o.o. (Skarbimierzyce 22, 72-002 Dołuje) w celu udzielenia odpowiedzi na zapytanie — zgodnie z RODO. *',
    ],
    'en' => [
        'machines_eyebrow'  => 'Products',
        'machines_title'    => 'Our cable blowing machines',
        'learn_more'        => 'Learn more',
        'all_machines'      => 'View all machines',
        'distrib_eyebrow'   => 'Distribution',
        'distrib_title'     => 'Our distributors around the world',
        'distrib_cta'       => 'Become a distributor',
        'partners_eyebrow'  => 'Trusted by',
        'partners_title'    => 'Our partners',
        'reviews_eyebrow'   => 'Reviews',
        'contact_eyebrow'   => 'Contact',
        'contact_title'     => 'Get in touch',
        'phone'             => 'Phone',
        'email'             => 'E-mail',
        'address'           => 'Address',
        'sent_badge'        => 'Sent',
        'msg_sent'          => 'Message sent!',
        'msg_thanks'        => 'Thank you. We\'ll respond within 24 business hours.',
        'reply_24h'         => 'Reply within 24h',
        'steps_3'           => '3 simple steps',
        'have_question'     => 'Have a question about our products?',
        'contact_sub'       => 'Select a category and products — we\'ll tailor an offer to your needs and get back to you within one business day.',
        'send_inquiry'      => 'Send enquiry',
        'call_us'           => 'Call us',
        'form_title'        => 'Enquiry form',
        'step_cat'          => 'Category',
        'step_prod'         => 'Products',
        'step_data'         => 'Details',
        'close'             => 'Close',
        'select_products'   => 'Select products',
        'select_multiple'   => 'You can select multiple items.',
        'duct_inner'        => 'Inner duct diameter',
        'cable_outer'       => 'Outer cable diameter',
        'recommended'       => 'Recommended',
        'back'              => 'Back',
        'next_step'         => 'Next',
        'your_contact'      => 'Your contact details',
        'reply_sub'         => 'We\'ll reply within 24 business hours.',
        'full_name'         => 'Full name *',
        'email_label'       => 'E-mail address *',
        'phone_label'       => 'Phone number',
        'add_message'       => 'Additional message',
        'msg_placeholder'   => 'Optional — details, timeline, technical questions...',
        'gdpr'              => 'I consent to the processing of my personal data by GAMM-BUD Sp. z o.o. (Skarbimierzyce 22, 72-002 Dołuje) for the purpose of responding to my enquiry — in accordance with GDPR. *',
    ],
    'de' => [
        'machines_eyebrow'  => 'Produkte',
        'machines_title'    => 'Unsere Kabeleinblasmaschinen',
        'learn_more'        => 'Mehr erfahren',
        'all_machines'      => 'Alle Maschinen ansehen',
        'distrib_eyebrow'   => 'Vertrieb',
        'distrib_title'     => 'Unsere Händler auf der ganzen Welt',
        'distrib_cta'       => 'Händler werden',
        'partners_eyebrow'  => 'Vertrauen uns',
        'partners_title'    => 'Unsere Partner',
        'reviews_eyebrow'   => 'Bewertungen',
        'contact_eyebrow'   => 'Kontakt',
        'contact_title'     => 'Kontaktieren Sie uns',
        'phone'             => 'Telefon',
        'email'             => 'E-Mail',
        'address'           => 'Adresse',
        'sent_badge'        => 'Gesendet',
        'msg_sent'          => 'Nachricht gesendet!',
        'msg_thanks'        => 'Vielen Dank. Wir antworten innerhalb von 24 Werktunden.',
        'reply_24h'         => 'Antwort in 24h',
        'steps_3'           => '3 einfache Schritte',
        'have_question'     => 'Haben Sie eine Frage zu unseren Produkten?',
        'contact_sub'       => 'Wählen Sie eine Kategorie und Produkte — wir passen das Angebot an Ihre Bedürfnisse an und melden uns innerhalb eines Werktages.',
        'send_inquiry'      => 'Anfrage senden',
        'call_us'           => 'Anrufen',
        'form_title'        => 'Anfrageformular',
        'step_cat'          => 'Kategorie',
        'step_prod'         => 'Produkte',
        'step_data'         => 'Daten',
        'close'             => 'Schließen',
        'select_products'   => 'Produkte auswählen',
        'select_multiple'   => 'Sie können mehrere Positionen auswählen.',
        'duct_inner'        => 'Innendurchmesser des Rohrs',
        'cable_outer'       => 'Außendurchmesser des Kabels',
        'recommended'       => 'Empfohlen',
        'back'              => 'Zurück',
        'next_step'         => 'Weiter',
        'your_contact'      => 'Ihre Kontaktdaten',
        'reply_sub'         => 'Wir antworten innerhalb von 24 Werktunden.',
        'full_name'         => 'Vor- und Nachname *',
        'email_label'       => 'E-Mail-Adresse *',
        'phone_label'       => 'Telefonnummer',
        'add_message'       => 'Zusätzliche Nachricht',
        'msg_placeholder'   => 'Optional — Details, Zeitrahmen, technische Fragen...',
        'gdpr'              => 'Ich stimme der Verarbeitung meiner personenbezogenen Daten durch GAMM-BUD Sp. z o.o. (Skarbimierzyce 22, 72-002 Dołuje) zur Beantwortung meiner Anfrage gemäß DSGVO zu. *',
    ],
];
$_fpt = $_fpt[ $_lang ] ?? $_fpt['pl'];

/* Pobierz pole w aktywnym języku; fallback → PL → $default */
function _fp( string $key, string $default = '' ): string {
    global $_fp, $_lang;
    if ( ! function_exists( 'get_field' ) ) return $default;
    $sfx = ( $_lang !== 'pl' ) ? '_' . $_lang : '';
    if ( $sfx ) {
        $v = get_field( $key . $sfx, $_fp );
        if ( $v !== null && $v !== '' && $v !== false ) return (string) $v;
    }
    $v = get_field( $key, $_fp );
    return ( $v !== null && $v !== '' && $v !== false ) ? (string) $v : $default;
}

/* Pobierz repeater w aktywnym języku; fallback → PL → null */
function _fp_rows( string $key ): ?array {
    global $_fp, $_lang;
    if ( ! function_exists( 'get_field' ) ) return null;
    $sfx = ( $_lang !== 'pl' ) ? '_' . $_lang : '';
    if ( $sfx ) {
        $rows = get_field( $key . $sfx, $_fp );
        if ( $rows ) return $rows;
    }
    return get_field( $key, $_fp ) ?: null;
}
?>

<div class="bdj-desktop-only">
<!-- ═══ HERO ════════════════════════════════════════════════════════════════ -->
<section class="hero" aria-label="<?php esc_attr_e( 'Strona główna', 'blue-dragon-jet' ); ?>">
    <div class="hero__bg" style="background-image:url('<?php echo esc_url( _fp( 'fp_hero_bg', content_url( 'uploads/2026/04/tlo.png' ) ) ); ?>');" role="img" aria-label="Maszyny Blue Dragon Jet"></div>
    <div class="hero__overlay" aria-hidden="true"></div>
    <div class="hero__content">
        <h1 class="hero__title">
            <?php echo esc_html( _fp( 'fp_hero_title', __( 'Europejski producent', 'blue-dragon-jet' ) ) ); ?><br>
            <span><?php echo esc_html( _fp( 'fp_hero_title2', __( 'maszyn do wdmuchiwania kabli.', 'blue-dragon-jet' ) ) ); ?></span>
        </h1>
        <p class="hero__subtitle">
            <?php
            $_hero_sub_default = [
                'pl' => 'Projektowane i produkowane w Polsce (EU) — precyzyjna inżynieria w konkurencyjnej cenie.',
                'en' => 'Designed and manufactured in Poland (EU) — precision engineering at a competitive price.',
                'de' => 'Entwickelt und gefertigt in Polen (EU) — Präzisionstechnik zu einem wettbewerbsfähigen Preis.',
            ];
            echo esc_html( _fp( 'fp_hero_subtitle', $_hero_sub_default[ $_lang ] ?? $_hero_sub_default['pl'] ) );
            ?>
        </p>
        <a href="<?php echo esc_url( _fp( 'fp_hero_cta_url', '#maszyny' ) ); ?>" class="hero__cta">
            <?php echo esc_html( _fp( 'fp_hero_cta_text', __( 'Zobacz maszyny', 'blue-dragon-jet' ) ) ); ?>
        </a>
    </div>
</section>

<!-- ═══ PASEK WARTOŚCI — 5 KOLUMN ══════════════════════════════════════════ -->
<?php
$_vs_icons = [
    '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
    '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
    '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
    '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
    '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/>',
];
$_vs_defaults = [
    [ 'heading' => __( 'Ekspresowa wysyłka', 'blue-dragon-jet' ),      'text' => __( 'Zamówione maszyny wysyłamy w ciągu 24h. Gwarantujemy szybką dostawę na terenie całej Europy.', 'blue-dragon-jet' ) ],
    [ 'heading' => __( 'Profesjonalne doradztwo', 'blue-dragon-jet' ), 'text' => __( 'Nasi inżynierowie pomogą dobrać właściwy model. Masz pytania? Zadzwoń lub napisz — odpowiadamy szybko.', 'blue-dragon-jet' ) ],
    [ 'heading' => __( 'Szkolenia', 'blue-dragon-jet' ),               'text' => __( 'Do każdej maszyny zapewniamy pełne szkolenie. Poznaj mechanizmy działania i optymalne sposoby użytkowania urządzeń.', 'blue-dragon-jet' ) ],
    [ 'heading' => __( 'Naprawa / Serwis', 'blue-dragon-jet' ),        'text' => __( 'Oferujemy serwis oraz naprawę maszyn. Szybka dostępność części zamiennych dla wszystkich modeli Blue Dragon Jet.', 'blue-dragon-jet' ) ],
    [ 'heading' => __( 'Polityka jakości', 'blue-dragon-jet' ),        'text' => __( 'Działamy zgodnie z normami ISO i standardami CE. Każda maszyna przechodzi rygorystyczną kontrolę jakości przed wysyłką.', 'blue-dragon-jet' ) ],
];
$_vs_rows = _fp_rows( 'fp_value_strip' ) ?? $_vs_defaults;
?>
<div class="value-strip">
    <div class="container">
        <?php foreach ( $_vs_rows as $i => $_vs ) : ?>
        <div class="vs__item">
            <div class="vs__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <?php echo $_vs_icons[ $i ] ?? $_vs_icons[0]; // phpcs:ignore ?>
                </svg>
            </div>
            <h3 class="vs__heading"><?php echo esc_html( $_vs['heading'] ); ?></h3>
            <p class="vs__text"><?php echo esc_html( $_vs['text'] ); ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- ═══ NASZE MASZYNY (KARUZELA) ═════════════════════════════════════════════ -->
<section id="maszyny" class="machines" aria-labelledby="machines-title">
    <div class="container">
        <header class="machines__header" data-aos="fade-up">
            <span class="machines__eyebrow"><?php echo esc_html( $_fpt['machines_eyebrow'] ); ?></span>
            <h2 class="machines__title" id="machines-title"><?php echo esc_html( $_fpt['machines_title'] ); ?></h2>
        </header>
    </div>

    <?php
    // Pokaż tylko wdmuchiwarki + DragonAir (kompresory i akcesoria wykluczone)
    $_fp_wdm_ids = get_posts( [
        'post_type'      => 'machine',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'fields'         => 'ids',
        'tax_query'      => [ [ 'taxonomy' => 'machine_category', 'field' => 'slug', 'terms' => 'wdmuchiwarki' ] ],
    ] );
    $_fp_dragonair = get_page_by_path( 'dragonair', OBJECT, 'machine' );
    if ( $_fp_dragonair ) $_fp_wdm_ids[] = $_fp_dragonair->ID;
    $_fp_wdm_ids = array_unique( $_fp_wdm_ids );

    $machines_query = new WP_Query( [
        'post_type'      => 'machine',
        'post__in'       => $_fp_wdm_ids ?: [ 0 ],
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'post__in menu_order',
        'order'          => 'ASC',
    ] );
    $has_machines = $machines_query->have_posts();
    ?>

    <div class="machines__carousel-wrap" data-aos="fade-up" data-aos-delay="100">
        <div class="machines__carousel">
            <div class="machines__track" id="machines-track">

                <?php if ( $has_machines ) : ?>
                    <?php while ( $machines_query->have_posts() ) : $machines_query->the_post(); ?>
                    <article class="machine-card">
                        <a href="<?php the_permalink(); ?>" class="machine-card__inner">
                            <?php $badge_html = bdj_machine_badge_html( get_the_ID() ); ?>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="machine-card__image">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                    <?php if ( $badge_html ) echo $badge_html; // phpcs:ignore ?>
                                </div>
                            <?php else : ?>
                                <div class="machine-card__image image-placeholder">
                                    <?php if ( $badge_html ) echo $badge_html; // phpcs:ignore ?>
                                </div>
                            <?php endif; ?>
                            <div class="machine-card__body">
                                <?php
                                $terms = get_the_terms( get_the_ID(), 'machine_category' );
                                if ( $terms && ! is_wp_error( $terms ) ) : ?>
                                    <span class="machine-card__cat"><?php echo esc_html( $terms[0]->name ); ?></span>
                                <?php endif; ?>
                                <h3 class="machine-card__title"><?php the_title(); ?></h3>
                                <?php
                                $md = get_post_meta( get_the_ID(), 'machine_microduct_diameter', true );
                                $pd = get_post_meta( get_the_ID(), 'machine_pipe_diameter', true );
                                $specs = array_merge( is_array($md) ? $md : [], is_array($pd) ? $pd : [] );
                                if ( $specs ) :
                                ?>
                                <p class="machine-card__specs">
                                    <?php echo esc_html( implode( ' · ', $specs ) ); ?>
                                </p>
                                <?php endif; ?>
                                <p class="machine-card__text"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 12, '…' ) ); ?></p>
                                <span class="machine-card__link"><?php echo esc_html( $_fpt['learn_more'] ); ?> &rarr;</span>
                            </div>
                        </a>
                    </article>
                    <?php endwhile; wp_reset_postdata(); ?>

                <?php else : ?>
                    <?php foreach ( [ 'Microjet', 'PowerJet Pro', 'DragonBlast HD' ] as $pname ) : ?>
                    <article class="machine-card">
                        <div class="machine-card__inner">
                            <div class="machine-card__image image-placeholder"></div>
                            <div class="machine-card__body">
                                <span class="machine-card__cat"><?php esc_html_e( 'Wdmuchiwanie kabli', 'blue-dragon-jet' ); ?></span>
                                <h3 class="machine-card__title"><?php echo esc_html( $pname ); ?></h3>
                                <p class="machine-card__text"><?php esc_html_e( 'Szczegóły produktu wkrótce. Skontaktuj się z nami po specyfikację.', 'blue-dragon-jet' ); ?></p>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div><!-- .machines__track -->
        </div><!-- .machines__carousel -->

        <div class="machines__nav">
            <button class="machines__btn machines__btn--prev" id="machines-prev" aria-label="<?php esc_attr_e( 'Poprzedni', 'blue-dragon-jet' ); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
            </button>
            <div class="machines__dots" id="machines-dots"></div>
            <button class="machines__btn machines__btn--next" id="machines-next" aria-label="<?php esc_attr_e( 'Następny', 'blue-dragon-jet' ); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
        </div>

        <div class="machines__all-wrap" data-aos="fade-up" data-aos-delay="150">
            <a href="<?php echo esc_url( get_term_link( 'wdmuchiwarki', 'machine_category' ) ?: home_url('/machine-category/wdmuchiwarki/') ); ?>" class="machines__all-btn">
                <?php echo esc_html( $_fpt['all_machines'] ); ?>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" width="16" height="16"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- ═══ LICZBY ══════════════════════════════════════════════════════════════ -->
<?php
$_stats_defaults = [
    [ 'number' => 50,   'suffix' => '+',  'label' => __( 'Krajów obsługiwanych', 'blue-dragon-jet' ) ],
    [ 'number' => 1500, 'suffix' => '+',  'label' => __( 'Sprzedanych maszyn',  'blue-dragon-jet' ) ],
    [ 'number' => 10,   'suffix' => '+',  'label' => __( 'Lat doświadczenia',   'blue-dragon-jet' ) ],
    [ 'number' => 24,   'suffix' => '/7', 'label' => __( 'Wsparcie techniczne', 'blue-dragon-jet' ) ],
];
$_stats_rows = _fp_rows( 'fp_stats' ) ?? $_stats_defaults;
?>
<section id="liczby" class="stats" aria-label="<?php esc_attr_e( 'Firma w liczbach', 'blue-dragon-jet' ); ?>">
    <div class="container">
        <div class="stats__grid">
            <?php foreach ( $_stats_rows as $i => $_stat ) : ?>
            <div class="stat" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                <div class="stat__value">
                    <span class="stat__number" data-target="<?php echo intval( $_stat['number'] ); ?>">0</span>
                    <span class="stat__suffix"><?php echo esc_html( $_stat['suffix'] ); ?></span>
                </div>
                <span class="stat__label"><?php echo esc_html( $_stat['label'] ); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══ O NAS — OŚ CZASU ══════════════════════════════════════════════════ -->
<?php
$_tl_icons = [
    '<path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>',
    '<path d="M3 12h18M3 6h18M3 18h18"/><circle cx="19" cy="12" r="2"/>',
    '<circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/>',
    '<circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
];
$_tl_defaults = [
    [ 'year' => '1992', 'text' => __( 'Założenie spółki GAMM-BUD — start jako dostawca sprzętu dla branży wodno-kanalizacyjnej.', 'blue-dragon-jet' ) ],
    [ 'year' => '2002', 'text' => __( 'Wdrożenie sprzętu do bezwykopowych napraw sieci kanalizacyjnych pod marką Green Dragon Products.', 'blue-dragon-jet' ) ],
    [ 'year' => '2012', 'text' => __( 'Uruchomienie produkcji własnych wdmuchiwarek do kabli światłowodowych pod marką Blue Dragon Jet.', 'blue-dragon-jet' ) ],
    [ 'year' => '2015', 'text' => __( 'Dynamiczny rozwój eksportu — nasze maszyny trafiają do klientów na całym świecie.', 'blue-dragon-jet' ) ],
    [ 'year' => '2025', 'text' => __( 'BDJ NEXT — nasz bestseller. Najpopularniejsza wdmuchiwarka w ofercie, ceniona przez klientów na całym świecie.', 'blue-dragon-jet' ) ],
];
$_tl_rows = _fp_rows( 'fp_timeline' ) ?? $_tl_defaults;
$_tl_heading = _fp( 'fp_history_heading', __( 'Nasza historia', 'blue-dragon-jet' ) );
?>
<section id="o-nas" class="history" aria-labelledby="history-title">
    <div class="container">
        <h2 class="history__heading" id="history-title">
            <?php echo esc_html( $_tl_heading ); ?>
        </h2>
    </div>

    <div class="history__timeline-wrap">
        <div class="container">
            <div class="history__track" aria-hidden="true">
                <div class="history__track-fill" id="history-fill"></div>
            </div>
            <div class="history__items">
                <?php foreach ( $_tl_rows as $i => $_tl ) : ?>
                <div class="history__item" data-index="<?php echo $i; ?>">
                    <div class="history__year"><?php echo esc_html( $_tl['year'] ); ?></div>
                    <div class="history__dot"></div>
                    <div class="history__content">
                        <div class="history__icon">
                            <svg viewBox="0 0 24 24"><?php echo $_tl_icons[ $i ] ?? $_tl_icons[0]; // phpcs:ignore ?></svg>
                        </div>
                        <p><?php echo esc_html( $_tl['text'] ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ═══ GALERIA I WIDEO ════════════════════════════════════════════════════ -->
<?php
$_gal_defaults = [
    [ 'image' => home_url( '/wp-content/uploads/2026/05/DSC02443-scaled.jpg' ), 'alt' => 'Blue Dragon Jet – maszyna w pracy' ],
    [ 'image' => home_url( '/wp-content/uploads/2026/05/DSC02471-scaled.jpg' ), 'alt' => 'Blue Dragon Jet – instalacja w terenie' ],
    [ 'image' => home_url( '/wp-content/uploads/2026/05/DSC02457-scaled.jpg' ), 'alt' => 'Blue Dragon Jet – sprzęt do wdmuchiwania kabli' ],
    [ 'image' => home_url( '/wp-content/uploads/2026/05/042-1.jpg' ),           'alt' => 'Blue Dragon Jet – maszyna BDJ' ],
];
$_gal_rows = ( function_exists( 'get_field' ) ? get_field( 'fp_gallery_images', $_fp ) : null ) ?: $_gal_defaults;
$_vid1 = _fp( 'fp_video_1', 'https://www.youtube.com/embed/9q8XTSFKa9k?rel=0&modestbranding=1' );
$_vid2 = _fp( 'fp_video_2', 'https://www.youtube.com/embed/upfZrb2_bmA?rel=0&modestbranding=1' );
?>
<section id="galeria" class="gallery-section" aria-labelledby="gallery-title">
    <div class="container">
        <h2 class="gallery-section__heading" id="gallery-title"><?php echo esc_html( _fp( 'fp_gallery_heading', __( 'Maszyny w akcji', 'blue-dragon-jet' ) ) ); ?></h2>
        <p class="gallery-section__sub"><?php echo esc_html( _fp( 'fp_gallery_sub', __( 'Zobacz nasze urządzenia podczas pracy w terenie.', 'blue-dragon-jet' ) ) ); ?></p>

        <div class="gallery-grid">
            <?php foreach ( $_gal_rows as $gi => $_gimg ) : ?>
            <div class="gallery-grid__item<?php echo $gi === 0 ? ' gallery-grid__item--wide' : ''; ?>">
                <img src="<?php echo esc_url( is_array( $_gimg['image'] ) ? ( $_gimg['image']['url'] ?? '' ) : $_gimg['image'] ); ?>" alt="<?php echo esc_attr( $_gimg['alt'] ); ?>" loading="lazy">
            </div>
            <?php endforeach; ?>
        </div>

        <div class="gallery-videos">
            <?php if ( $_vid1 ) : ?>
            <div class="gallery-video-wrap">
                <iframe src="<?php echo esc_url( $_vid1 ); ?>" title="Blue Dragon Jet – demo maszyny" allowfullscreen loading="lazy"></iframe>
            </div>
            <?php endif; ?>
            <?php if ( $_vid2 ) : ?>
            <div class="gallery-video-wrap">
                <iframe src="<?php echo esc_url( $_vid2 ); ?>" title="Blue Dragon Jet – wideo" allowfullscreen loading="lazy"></iframe>
            </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- ═══ DYSTRYBUTORZY — MAPA ══════════════════════════════════════════════════ -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="anonymous">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin="anonymous"></script>

<section id="dystrybutorzy" class="reach" aria-labelledby="reach-title">
    <div class="container">
        <header class="reach__header" data-aos="fade-up">
            <span class="reach__eyebrow"><?php echo esc_html( $_fpt['distrib_eyebrow'] ); ?></span>
            <h2 class="reach__title" id="reach-title"><?php echo esc_html( $_fpt['distrib_title'] ); ?></h2>
        </header>

        <div class="reach__map-wrap" data-aos="fade-up" data-aos-delay="100">
            <div id="distributor-map" class="reach__leaflet-map"></div>
        </div>

        <div class="reach__cta-wrap" data-aos="fade-up" data-aos-delay="200">
            <a href="#kontakt" class="reach__cta"><?php echo esc_html( $_fpt['distrib_cta'] ); ?></a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('distributor-map', {
        center: [50, 15],
        zoom: 4,
        scrollWheelZoom: false,
        zoomControl: true,
        attributionControl: true
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        maxZoom: 18
    }).addTo(map);

    var pinIcon = L.divIcon({
        className: '',
        html: '<div style="width:14px;height:14px;background:#2497D0;border:2.5px solid #fff;border-radius:50%;box-shadow:0 0 0 4px rgba(36,151,208,0.3);"></div>',
        iconSize: [14, 14],
        iconAnchor: [7, 7],
        popupAnchor: [0, -12]
    });

    <?php
    $_cn = [
        'pl' => [ 'Polska'=>'Polska','Niemcy'=>'Niemcy','Czechy'=>'Czechy','Dania'=>'Dania','Norwegia'=>'Norwegia','Finlandia'=>'Finlandia','Belgia'=>'Belgia','Wielka Brytania'=>'Wielka Brytania','Irlandia'=>'Irlandia','Hiszpania'=>'Hiszpania','Włochy'=>'Włochy','Chorwacja'=>'Chorwacja','ZEA'=>'ZEA' ],
        'en' => [ 'Polska'=>'Poland','Niemcy'=>'Germany','Czechy'=>'Czech Republic','Dania'=>'Denmark','Norwegia'=>'Norway','Finlandia'=>'Finland','Belgia'=>'Belgium','Wielka Brytania'=>'United Kingdom','Irlandia'=>'Ireland','Hiszpania'=>'Spain','Włochy'=>'Italy','Chorwacja'=>'Croatia','ZEA'=>'UAE' ],
        'de' => [ 'Polska'=>'Polen','Niemcy'=>'Deutschland','Czechy'=>'Tschechien','Dania'=>'Dänemark','Norwegia'=>'Norwegen','Finlandia'=>'Finnland','Belgia'=>'Belgien','Wielka Brytania'=>'Vereinigtes Königreich','Irlandia'=>'Irland','Hiszpania'=>'Spanien','Włochy'=>'Italien','Chorwacja'=>'Kroatien','ZEA'=>'VAE' ],
    ];
    $c = $_cn[ $_lang ] ?? $_cn['pl'];
    ?>
    var distributors = [
        { lat: 53.43, lng: 14.55, name: 'Blue Dragon Jet', detail: 'Szczecin, <?php echo esc_js($c['Polska']); ?><br>+48 91 483 50 11<br>info@bluedragonjet.com', main: true },
        { lat: 51.97, lng: 17.49, name: 'MP-Technik', detail: 'Poznańska 47, 63-200 Cielcza<br><?php echo esc_js($c['Polska']); ?><br>+48 695 438 850<br>mateusz.kalmucki@mp-technik.com.pl' },
        { lat: 52.22, lng: 21.03, name: 'xBest', detail: 'Al. Jerozolimskie 96, 00-807 Warszawa<br>Branch: ul. św. Józefa 141D, 44-200 Rybnik<br><?php echo esc_js($c['Polska']); ?><br>+48 666 078 517<br>p.jastal@xbest.pl' },
        { lat: 52.26, lng: 21.10, name: 'Teleoptics', detail: 'ul. Aleksandra Kotsisa 4, 03-307 Warszawa<br><?php echo esc_js($c['Polska']); ?><br>+48 798 220 104<br>klaudia.mroczkowska@teleoptics.com.pl' },
        { lat: 51.24, lng: 6.78, name: 'MAUNT', detail: 'Kaiserswerther Strasse 135, 40474 Düsseldorf<br><?php echo esc_js($c['Niemcy']); ?><br>(+49) 6597901152<br>johannes.bohm@maunt.com' },
        { lat: 50.03, lng: 14.45, name: 'VanCo', detail: 'U čokoládoven 9, 143 00 Praha 4<br><?php echo esc_js($c['Czechy']); ?><br>(+420) 246 035 451<br>mencl@vanco.cz' },
        { lat: 55.77, lng: 12.19, name: 'Teklet', detail: 'Most Knuda All 5E, 3660 Stenløse<br><?php echo esc_js($c['Dania']); ?><br>(+45) 61425030<br>hh@teklet.dk' },
        { lat: 59.95, lng: 10.75, name: 'eMcom', detail: 'Sven Oftedals vei 5, NO-0950 Oslo<br><?php echo esc_js($c['Norwegia']); ?><br>(+47) 90588084<br>bjorn@emcom.no' },
        { lat: 59.27, lng: 10.41, name: 'MAXETA', detail: 'Narverødveien 40, 3113 Tønsberg<br><?php echo esc_js($c['Norwegia']); ?><br>+47 92065026<br>roar.kristoffersen@maxeta.no' },
        { lat: 60.46, lng: 22.02, name: 'Tellads Oy', detail: 'Putkikatu 16, 21110 Naantali<br><?php echo esc_js($c['Finlandia']); ?><br>+358 50 480 3813<br>janne.vartiainen@dnwpartners.com' },
        { lat: 50.99, lng: 4.73, name: 'Mampaey Engineering', detail: 'Baalsebaan 81, 3120 Tremelo<br><?php echo esc_js($c['Belgia']); ?><br>+32 474 96 14 51<br>bruno@mampaey-engineering.be' },
        { lat: 52.24, lng: 0.41, name: 'FRAME Communications', detail: 'Unit 3, The Old Railway Station<br>Newmarket, Suffolk CB8 9WT<br><?php echo esc_js($c['Wielka Brytania']); ?><br>+353 86 842 8177<br>gavin@frame.ie' },
        { lat: 53.14, lng: -6.07, name: 'FRAME Communications', detail: 'The Grid, Greystones, Co. Wicklow<br><?php echo esc_js($c['Irlandia']); ?><br>+353870031861<br>tony@frame.ie' },
        { lat: 42.60, lng: -5.57, name: 'KYO ELECTRIC SLU', detail: '<?php echo esc_js($c['Hiszpania']); ?><br>(+34) 987795201<br>pereiro@kyoelectric.es' },
        { lat: 46.50, lng: 11.35, name: 'Volta', detail: 'Via Copernico 13/A, 39100 Bolzano<br><?php echo esc_js($c['Włochy']); ?><br>(+39) 0471546148<br>spada@volta-macchine.com' },
        { lat: 45.13, lng: 7.57, name: 'Bonomedia', detail: '<?php echo esc_js($c['Włochy']); ?><br>(+39) 3356187574<br>carlo@bonomedia.it' },
        { lat: 45.80, lng: 15.71, name: 'COMTERRA', detail: 'J.Jelačića 89, HR-10430 Samobor<br><?php echo esc_js($c['Chorwacja']); ?><br>+385 99 5642 496<br>zdenko@comterra.hr' },
        { lat: 25.79, lng: 55.94, name: 'Empirical Testing Solutions', detail: 'Al Hamra Industrial Zone<br>Ras Al Khaimah, <?php echo esc_js($c['ZEA']); ?><br>(+971) 559994937<br>vinesh@empiricalts.com' },
    ];

    distributors.forEach(function (d) {
        var icon = d.main ? L.divIcon({
            className: '',
            html: '<div style="width:16px;height:16px;background:#1E425D;border:2.5px solid #fff;border-radius:50%;box-shadow:0 0 0 5px rgba(30,66,93,0.3);"></div>',
            iconSize: [16, 16], iconAnchor: [8, 8], popupAnchor: [0, -12]
        }) : pinIcon;

        L.marker([d.lat, d.lng], { icon: icon }).addTo(map)
            .bindPopup('<strong style="color:#1E425D;">' + d.name + '</strong><br><span style="color:#4a6070;font-size:12px;">' + d.detail + '</span>');
    });
});
</script>

<!-- ═══ PARTNERZY ════════════════════════════════════════════════════════════ -->
<section id="partnerzy" class="partners" aria-labelledby="partners-title">
    <div class="container">
        <header class="partners__header" data-aos="fade-up">
            <span class="partners__eyebrow"><?php echo esc_html( $_fpt['partners_eyebrow'] ); ?></span>
            <h2 class="partners__title" id="partners-title"><?php echo esc_html( $_fpt['partners_title'] ); ?></h2>
        </header>
    </div>
    <div class="marquee-container" data-aos="fade-up" data-aos-delay="100">
        <div class="marquee-content">
            <?php
            $partner_logos = [
                [ 'src' => content_url( '/uploads/2026/05/wwww.jpg' ),                          'alt' => 'Partner' ],
                [ 'src' => content_url( '/uploads/2026/05/xbestfibre_optic_solutions-scaled.png' ), 'alt' => 'Best Fibre Optic Solutions' ],
                [ 'src' => content_url( '/uploads/2026/05/VanCo_logo.jpg' ),                    'alt' => 'VanCo' ],
                [ 'src' => content_url( '/uploads/2026/05/Tracto-logo-1.png' ),                 'alt' => 'Tracto' ],
                [ 'src' => content_url( '/uploads/2026/05/Teklet.png' ),                        'alt' => 'Teklet' ],
                [ 'src' => content_url( '/uploads/2026/05/mp-technik.png' ),                    'alt' => 'MP Technik' ],
                [ 'src' => content_url( '/uploads/2026/05/Mampaey-Logo.jpg' ),                  'alt' => 'Mampaey' ],
                [ 'src' => content_url( '/uploads/2026/05/LOGO-novi-b-02-02-2-1.png' ),         'alt' => 'Novi' ],
                [ 'src' => content_url( '/uploads/2026/05/frameLogo2020.png' ),                 'alt' => 'Frame' ],
                [ 'src' => content_url( '/uploads/2026/05/FCA.png' ),                           'alt' => 'FCA' ],
                [ 'src' => content_url( '/uploads/2026/05/BKF-Myjnie.png' ),                    'alt' => 'BKF Myjnie' ],
            ];
            // Pierwsze przejście
            foreach ( $partner_logos as $logo ) {
                echo '<div class="marquee-item"><img src="' . esc_url( $logo['src'] ) . '" alt="' . esc_attr( $logo['alt'] ) . '" loading="lazy"></div>';
            }
            // Duplikat dla zapętlenia
            foreach ( $partner_logos as $logo ) {
                echo '<div class="marquee-item" aria-hidden="true"><img src="' . esc_url( $logo['src'] ) . '" alt="" loading="lazy"></div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- ═══ OPINIE ════════════════════════════════════════════════════════════════ -->
<?php
$_rev_colors = [ '#2497D0', '#38a169', '#e09000', '#805ad5', '#1E425D' ];
$_rev_bgs    = [ '#e8f4fb', '#edf7f0', '#fef3e2', '#f0e8f8', '#e8f4fb' ];
$_rev_defaults = [
    [ 'text' => __( 'Jestem bardzo zadowolony z obsługi, szczególnie Pana Pawła. Profesjonalne podejście i szybka realizacja zamówienia.', 'blue-dragon-jet' ), 'author_name' => 'Maciej Siwczak',   'author_country' => 'Polska'    ],
    [ 'text' => __( 'Firma godna zaufania. Zakupiony sprzęt działa bez zarzutu, a serwis posprzedażowy na bardzo wysokim poziomie.', 'blue-dragon-jet' ),          'author_name' => 'Tomasz Poremba',   'author_country' => 'Polska'    ],
    [ 'text' => __( 'After a few months of using Blue Dragon Jet Extended I can easily say it was one of the best choices for my telecommunication contracts. Works twice as fast and with much greater precision.', 'blue-dragon-jet' ), 'author_name' => 'Martin L. Ivanov', 'author_country' => 'Bulgaria'  ],
    [ 'text' => __( 'Dopiero zaczynam używać BDJ Standard i rejestratora BDJ Brai. Na rynku niemieckim to idealny zestaw. Kontakt i obsługa z firmą na 5!', 'blue-dragon-jet' ), 'author_name' => 'Opti-Center Team', 'author_country' => 'Niemcy'    ],
    [ 'text' => __( 'Polecam sprzęt do sieci FTTH. Mam model Mini i działa jak trzeba — niezawodny, precyzyjny, wart swojej ceny.', 'blue-dragon-jet' ),             'author_name' => 'Aleksander Schmidt','author_country' => 'Polska'    ],
];
$_rev_rows = _fp_rows( 'fp_reviews' ) ?? $_rev_defaults;
$_rev_title = _fp( 'fp_reviews_title', __( 'Co mówią nasi klienci', 'blue-dragon-jet' ) );
?>
<section class="reviews" aria-label="<?php esc_attr_e( 'Opinie klientów', 'blue-dragon-jet' ); ?>">
    <div class="container">
        <header class="reviews__header">
            <span class="reviews__eyebrow"><?php echo esc_html( $_fpt['reviews_eyebrow'] ); ?></span>
            <h2 class="reviews__title"><?php echo esc_html( $_rev_title ); ?></h2>
        </header>

        <div class="reviews__slider" id="reviews-slider">
            <div class="reviews__track" id="reviews-track">
                <?php foreach ( $_rev_rows as $ri => $_rev ) :
                    $rc = $_rev_colors[ $ri % count( $_rev_colors ) ];
                    $rb = $_rev_bgs[ $ri % count( $_rev_bgs ) ];
                ?>
                <div class="review-card">
                    <div class="review-card__stars">★★★★★</div>
                    <p class="review-card__text"><?php echo esc_html( $_rev['text'] ); ?></p>
                    <div class="review-card__author">
                        <div class="review-card__avatar">
                            <svg viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="24" fill="<?php echo esc_attr( $rb ); ?>"/><circle cx="24" cy="19" r="7" fill="<?php echo esc_attr( $rc ); ?>"/><path d="M8 42c0-8.8 7.2-16 16-16s16 7.2 16 16" fill="<?php echo esc_attr( $rc ); ?>"/></svg>
                        </div>
                        <div><strong><?php echo esc_html( $_rev['author_name'] ); ?></strong><span><?php echo esc_html( $_rev['author_country'] ); ?></span></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="reviews__nav">
                <button class="reviews__btn" id="reviews-prev" aria-label="<?php esc_attr_e( 'Poprzednia', 'blue-dragon-jet' ); ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <div class="reviews__dots" id="reviews-dots"></div>
                <button class="reviews__btn" id="reviews-next" aria-label="<?php esc_attr_e( 'Następna', 'blue-dragon-jet' ); ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ═══ SERWIS — teaser (pełna strona: /serwis/) ════════════════════════════ -->
<section class="serwis-teaser" aria-labelledby="serwis-teaser-title">
    <div class="container">
        <div class="serwis-teaser__inner" data-aos="fade-up">
            <div class="serwis-teaser__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="36" height="36"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
            </div>
            <div class="serwis-teaser__text">
                <h2 class="serwis-teaser__title" id="serwis-teaser-title"><?php echo esc_html( _fp( 'fp_serwis_title', __( 'Potrzebujesz serwisu?', 'blue-dragon-jet' ) ) ); ?></h2>
                <p><?php echo esc_html( _fp( 'fp_serwis_text', __( 'Usterka, przegląd, kalibracja lub zamówienie części — nasz zespół odpowiada w ciągu 24h. Zgłoś usterkę online, zanim straci czas na przestój.', 'blue-dragon-jet' ) ) ); ?></p>
            </div>
            <a href="<?php echo esc_url( home_url( '/serwis/' ) ); ?>" class="serwis-teaser__cta">
                <?php echo esc_html( _fp( 'fp_serwis_cta', __( 'Zgłoś usterkę', 'blue-dragon-jet' ) ) ); ?> &rarr;
            </a>
        </div>
    </div>
</section>

<!-- ═══ KONTAKT ══════════════════════════════════════════════════════════════ -->
<?php
/* ── obsługa wizarda kontaktowego ─────────────────────────────────────────── */
$wiz_success = false;
$wiz_error   = '';
if ( isset( $_POST['bdj_wizard_submit'] ) && check_admin_referer( 'bdj_wizard_form', 'bdj_wizard_nonce' ) ) {
    $wiz_category = sanitize_text_field( wp_unslash( $_POST['bdj_category'] ?? '' ) );
    $wiz_products = array_map( 'sanitize_text_field', (array) ( $_POST['bdj_products'] ?? [] ) );
    $wiz_name     = sanitize_text_field( wp_unslash( $_POST['bdj_name']    ?? '' ) );
    $wiz_email    = sanitize_email( wp_unslash( $_POST['bdj_email']        ?? '' ) );
    $wiz_phone    = sanitize_text_field( wp_unslash( $_POST['bdj_phone']   ?? '' ) );
    $wiz_message  = sanitize_textarea_field( wp_unslash( $_POST['bdj_message'] ?? '' ) );
    $wiz_gdpr     = ! empty( $_POST['bdj_gdpr'] );

    $needs_products = ! in_array( $wiz_category, [ 'Kontakt' ], true );
    if ( ! $wiz_name || ! is_email( $wiz_email ) || ! $wiz_category || ( $needs_products && empty( $wiz_products ) ) || ! $wiz_gdpr ) {
        $wiz_error = __( 'Wypełnij wszystkie wymagane pola i zaznacz zgodę RODO.', 'blue-dragon-jet' );
    } else {
        $subject = '[BDJ] Zapytanie: ' . $wiz_category . ' — ' . $wiz_name;
        $body    = "Kategoria: {$wiz_category}\n"
                 . ( $wiz_products ? 'Wybrane produkty: ' . implode( ', ', $wiz_products ) . "\n\n" : '' )
                 . "Imię i nazwisko: {$wiz_name}\n"
                 . "E-mail: {$wiz_email}\n"
                 . "Telefon: {$wiz_phone}\n\n"
                 . "Wiadomość:\n{$wiz_message}";
        $headers = [ 'Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $wiz_name . ' <' . $wiz_email . '>' ];
        $wiz_success = wp_mail( 'info@bluedragonjet.com', $subject, $body, $headers );
        if ( ! $wiz_success ) $wiz_error = __( 'Błąd wysyłki. Spróbuj ponownie lub zadzwoń.', 'blue-dragon-jet' );
    }
}
/* ── dane do wizarda ─────────────────────────────────────────────────────── */
$wiz_machines = [];
$wiz_mq = new WP_Query( [ 'post_type' => 'machine', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'ASC', 'tax_query' => [ [ 'taxonomy' => 'machine_category', 'field' => 'slug', 'terms' => [ 'akcesoria', 'kompresory' ], 'operator' => 'NOT IN' ] ] ] );
while ( $wiz_mq->have_posts() ) {
    $wiz_mq->the_post();
    $wiz_machines[] = [
        'title' => get_the_title(),
        'thumb' => get_the_post_thumbnail_url( null, 'medium' ) ?: '',
    ];
}
wp_reset_postdata();
if ( empty( $wiz_machines ) ) {
    $wiz_machines = array_map( fn($t) => [ 'title' => $t, 'thumb' => '' ],
        [ 'BDJ Standard', 'BDJ Extended', 'BDJ Mini', 'BDJ Pro', 'BDJ BRAIN', 'Kompresor BDJ' ] );
}
/* Produkty z kategorii Akcesoria */
$wiz_acc_products = [];
$wiz_aq = new WP_Query( [ 'post_type' => 'machine', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'ASC', 'tax_query' => [ [ 'taxonomy' => 'machine_category', 'field' => 'slug', 'terms' => 'akcesoria' ] ] ] );
while ( $wiz_aq->have_posts() ) { $wiz_aq->the_post(); $wiz_acc_products[] = [ 'title' => get_the_title(), 'thumb' => get_the_post_thumbnail_url( null, 'medium' ) ?: '' ]; }
wp_reset_postdata();
if ( empty( $wiz_acc_products ) ) $wiz_acc_products = array_map( fn($t) => [ 'title' => $t, 'thumb' => '' ], [ 'Głowice do wdmuchiwania', 'Głowice do mikrokanalizacji', 'Adaptery i przejściówki', 'Uszczelki i zestawy serwisowe', 'Wózki transportowe', 'Prowadnice kabli', 'Części zamienne' ] );
/* Produkty z kategorii Kompresory */
$wiz_comp_products = [];
$wiz_cq = new WP_Query( [ 'post_type' => 'machine', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'ASC', 'tax_query' => [ [ 'taxonomy' => 'machine_category', 'field' => 'slug', 'terms' => 'kompresory' ] ] ] );
while ( $wiz_cq->have_posts() ) { $wiz_cq->the_post(); $wiz_comp_products[] = [ 'title' => get_the_title(), 'thumb' => get_the_post_thumbnail_url( null, 'medium' ) ?: '' ]; }
wp_reset_postdata();
if ( empty( $wiz_comp_products ) ) $wiz_comp_products = array_map( fn($t) => [ 'title' => $t, 'thumb' => '' ], [ 'Kompresor BDJ Air 5L', 'Kompresor BDJ Air 10L', 'Agregat sprężarkowy' ] );

/* Tłumaczenia kafelków wizarda */
$_wt = [
    'pl' => [
        'tile_machines'      => 'Maszyny',
        'tile_machines_desc' => 'Urządzenia do wdmuchiwania kabli i mikrokanalizacji',
        'tile_acc'           => 'Akcesoria',
        'tile_acc_desc'      => 'Głowice, adaptery, uszczelki i części zamienne',
        'tile_comp'          => 'Kompresory',
        'tile_comp_desc'     => 'Agregaty i sprężarki do maszyn BDJ',
        'tile_contact'       => 'Kontakt',
        'tile_contact_desc'  => 'Ogólne pytanie lub wiadomość do naszego zespołu',
        'step1_title'        => 'Czego dotyczy zapytanie?',
        'step1_sub'          => 'Kliknij kafelek, aby przejść do wyboru produktów.',
        'search_acc'         => 'Szukaj akcesoriów…',
        'search_comp'        => 'Szukaj kompresorów…',
    ],
    'en' => [
        'tile_machines'      => 'Machines',
        'tile_machines_desc' => 'Cable blowing and microduct installation machines',
        'tile_acc'           => 'Accessories',
        'tile_acc_desc'      => 'Heads, adapters, seals and spare parts',
        'tile_comp'          => 'Compressors',
        'tile_comp_desc'     => 'Air compressors and aggregates for BDJ machines',
        'tile_contact'       => 'Contact',
        'tile_contact_desc'  => 'General question or message to our team',
        'step1_title'        => 'What is your enquiry about?',
        'step1_sub'          => 'Click a tile to proceed to product selection.',
        'search_acc'         => 'Search accessories…',
        'search_comp'        => 'Search compressors…',
    ],
    'de' => [
        'tile_machines'      => 'Maschinen',
        'tile_machines_desc' => 'Kabeleinblasmaschinen und Mikrokanalisation',
        'tile_acc'           => 'Zubehör',
        'tile_acc_desc'      => 'Köpfe, Adapter, Dichtungen und Ersatzteile',
        'tile_comp'          => 'Kompressoren',
        'tile_comp_desc'     => 'Aggregate und Kompressoren für BDJ-Maschinen',
        'tile_contact'       => 'Kontakt',
        'tile_contact_desc'  => 'Allgemeine Frage oder Nachricht an unser Team',
        'step1_title'        => 'Worum geht es bei Ihrer Anfrage?',
        'step1_sub'          => 'Klicken Sie auf eine Kachel, um Produkte auszuwählen.',
        'search_acc'         => 'Zubehör suchen…',
        'search_comp'        => 'Kompressoren suchen…',
    ],
];
$_wt = $_wt[ $_lang ] ?? $_wt['pl'];
?>

<style>
/* ── Modal overlay ───────────────────────────────────────────────────────── */
.wiz-modal-overlay {
    position:fixed;inset:0;z-index:9000;
    background:rgba(7,28,48,.82);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);
    display:flex;align-items:center;justify-content:center;padding:1rem;
    opacity:0;pointer-events:none;transition:opacity .3s;
}
.wiz-modal-overlay.is-open { opacity:1;pointer-events:all; }
.wiz-modal {
    background:#fff;border-radius:16px;width:100%;max-width:860px;
    max-height:92vh;display:flex;flex-direction:column;
    box-shadow:0 24px 80px rgba(0,0,0,.35);
    transform:translateY(24px) scale(.97);transition:transform .3s;
}
.wiz-modal-overlay.is-open .wiz-modal { transform:translateY(0) scale(1); }
.wiz-modal__header {
    display:flex;align-items:center;justify-content:space-between;
    padding:1.25rem 1.5rem 1rem;border-bottom:1px solid #e4edf5;flex-shrink:0;
}
.wiz-modal__logo { font-size:.9rem;font-weight:800;color:var(--color-primary);letter-spacing:-.01em; }
.wiz-modal__close {
    width:36px;height:36px;border-radius:50%;border:none;background:#f0f5fa;
    display:flex;align-items:center;justify-content:center;cursor:pointer;color:#5a7080;transition:background .2s,color .2s;
}
.wiz-modal__close:hover { background:#e0eaf3;color:var(--color-primary); }
.wiz-modal__close svg { width:16px;height:16px; }
.wiz-modal__body { flex:1;overflow-y:auto;padding:1.5rem; }
/* ── Progress ────────────────────────────────────────────────────────────── */
.wiz-progress { display:flex;align-items:center;margin-bottom:1.75rem; }
.wiz-sdot { display:flex;flex-direction:column;align-items:center;gap:.25rem;flex-shrink:0; }
.wiz-sdot__c { width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:700;border:2px solid #c9d8e4;background:#fff;color:#8fa5b5;transition:all .3s; }
.wiz-sdot__l { font-size:.6rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:#8fa5b5;white-space:nowrap;transition:color .3s; }
.wiz-sdot.is-active .wiz-sdot__c { background:var(--color-secondary);border-color:var(--color-secondary);color:#fff;box-shadow:0 0 0 4px rgba(36,151,208,.2); }
.wiz-sdot.is-active .wiz-sdot__l { color:var(--color-secondary); }
.wiz-sdot.is-done .wiz-sdot__c { background:var(--color-primary);border-color:var(--color-primary);color:#fff; }
.wiz-sdot.is-done .wiz-sdot__l { color:var(--color-primary); }
.wiz-sline { flex:1;height:2px;background:#c9d8e4;margin-bottom:1.1rem;transition:background .3s; }
.wiz-sline.is-done { background:var(--color-primary); }
/* ── Steps ───────────────────────────────────────────────────────────────── */
.wiz-step { display:none; }
.wiz-step.is-visible { display:block; }
.wiz-step__title { font-size:1.1rem;font-weight:800;color:var(--color-primary);margin-bottom:.2rem; }
.wiz-step__sub { font-size:.82rem;color:#6a8090;margin-bottom:1.4rem; }
/* ── Step 1: kafelki kategorii ───────────────────────────────────────────── */
.wiz-tiles { display:grid;grid-template-columns:1fr 1fr;gap:.75rem; }
.wiz-tile {
    border:2px solid #e4edf5;border-radius:14px;padding:2rem 1.5rem;text-align:center;cursor:pointer;
    transition:all .2s;background:#fafcfe;display:flex;flex-direction:column;align-items:center;gap:.75rem;
    user-select:none;-webkit-tap-highlight-color:transparent;
}
.wiz-tile:hover,.wiz-tile:focus-visible { border-color:var(--color-secondary);box-shadow:0 6px 24px rgba(36,151,208,.18);transform:translateY(-3px);background:#fff; }
.wiz-tile__icon { width:64px;height:64px;border-radius:14px;background:rgba(36,151,208,.1);display:flex;align-items:center;justify-content:center; }
.wiz-tile__icon svg { width:32px;height:32px;stroke:var(--color-secondary); }
.wiz-tile__name { font-size:1.1rem;font-weight:800;color:var(--color-primary); }
.wiz-tile__desc { font-size:.78rem;color:#6a8090;line-height:1.5; }
/* ── Step 2: filtry rozmiarów ────────────────────────────────────────────── */
.wiz-params { background:#f7fafc;border:1.5px solid #e4edf5;border-radius:10px;padding:1rem 1.1rem;margin-bottom:1rem; }
.wiz-param-row { display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;padding:.4rem 0; }
.wiz-param-row + .wiz-param-row { border-top:1px solid #e4edf5;margin-top:.4rem;padding-top:.8rem; }
.wiz-param-label { display:flex;align-items:center;gap:.35rem;font-size:.72rem;font-weight:700;color:var(--color-primary);white-space:nowrap;min-width:160px; }
.wiz-param-label svg { width:14px;height:14px;stroke:var(--color-secondary);flex-shrink:0; }
.wiz-size-btns { display:flex;flex-wrap:wrap;gap:.35rem; }
.wiz-size-btn {
    padding:.32rem .75rem;border-radius:99px;font-size:.72rem;font-weight:700;
    border:1.5px solid #d0dde8;background:#fff;color:#5a7080;cursor:pointer;
    transition:all .18s;white-space:nowrap;
}
.wiz-size-btn:hover { border-color:var(--color-secondary);color:var(--color-secondary); }
.wiz-size-btn.is-active { background:var(--color-secondary);border-color:var(--color-secondary);color:#fff;box-shadow:0 2px 8px rgba(36,151,208,.3); }
.wiz-params__hint { font-size:.75rem;color:var(--color-secondary);font-weight:600;margin:.5rem 0 0;min-height:1rem; }
.wiz-select { flex:1;min-width:180px;padding:.55rem .85rem;border:1.5px solid #d0e4f0;border-radius:7px;font-size:.88rem;font-family:inherit;color:var(--color-primary);background:#fff;cursor:pointer;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath fill='none' stroke='%231E425D' stroke-width='1.5' d='M1 1l4 4 4-4'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right .75rem center;padding-right:2rem; }
.wiz-select:focus { outline:none;border-color:var(--color-secondary);box-shadow:0 0 0 3px rgba(36,151,208,.15); }
/* ── Step 2: siatka maszyn ze zdjęciami ─────────────────────────────────── */
.wiz-machine-grid { display:grid;grid-template-columns:repeat(3,1fr);gap:.75rem; }
.wiz-mc {
    border:2px solid #e4edf5;border-radius:10px;overflow:hidden;cursor:pointer;
    transition:all .25s;background:#fff;user-select:none;-webkit-tap-highlight-color:transparent;
    position:relative;
}
.wiz-mc:hover { border-color:var(--color-secondary);transform:translateY(-2px);box-shadow:0 4px 16px rgba(36,151,208,.18); }
.wiz-mc.is-checked { border-color:var(--color-secondary);background:rgba(36,151,208,.04); }
.wiz-mc.is-dimmed { opacity:.35;filter:grayscale(.4); }
.wiz-mc.is-dimmed:hover { opacity:.6;filter:none; }
.wiz-mc input[type=checkbox] { position:absolute;top:.6rem;right:.6rem;width:18px;height:18px;accent-color:var(--color-secondary);cursor:pointer;z-index:1; }
.wiz-mc__badge {
    display:none;position:absolute;top:.5rem;left:.5rem;z-index:2;
    background:var(--color-secondary);color:#fff;font-size:.6rem;font-weight:800;
    padding:.18rem .5rem;border-radius:99px;letter-spacing:.04em;text-transform:uppercase;
}
.wiz-mc.is-recommended .wiz-mc__badge { display:block; }
.wiz-mc.is-recommended { border-color:var(--color-secondary);box-shadow:0 0 0 1px var(--color-secondary); }
.wiz-mc__img { width:100%;aspect-ratio:4/3;object-fit:cover;display:block;background:#f0f5fa; }
.wiz-mc__img-placeholder { width:100%;aspect-ratio:4/3;background:linear-gradient(135deg,#e8f1f8 0%,#d0e3f0 100%);display:flex;align-items:center;justify-content:center; }
.wiz-mc__img-placeholder svg { width:36px;height:36px;stroke:#9ab5c8;opacity:.7; }
.wiz-mc__name { padding:.6rem .7rem;font-size:.78rem;font-weight:700;color:var(--color-primary);line-height:1.3; }
/* ── Step 2: wyszukiwarka ────────────────────────────────────────────────── */
.wiz-search-wrap { position:relative;margin-bottom:.85rem; }
.wiz-search-wrap svg { position:absolute;left:.75rem;top:50%;transform:translateY(-50%);width:15px;height:15px;stroke:#8fa5b5;pointer-events:none; }
.wiz-search { width:100%;padding:.6rem .75rem .6rem 2.25rem;border:1.5px solid #d0dde8;border-radius:8px;font-size:.85rem;color:var(--color-primary);background:#f7fafc;outline:none;transition:border-color .2s; }
.wiz-search:focus { border-color:var(--color-secondary);background:#fff; }
/* ── Step 2: akcesoria/kompresory (siatka ze zdjęciami) ─────────────────── */
.wiz-products { display:flex;flex-direction:column;gap:.4rem; }
.wiz-check { display:flex;align-items:center;gap:.75rem;padding:.75rem 1rem;border:1.5px solid #e4edf5;border-radius:8px;cursor:pointer;transition:border-color .2s,background .2s;user-select:none; }
.wiz-check:hover { border-color:var(--color-secondary);background:rgba(36,151,208,.03); }
.wiz-check input { width:17px;height:17px;accent-color:var(--color-secondary);flex-shrink:0;cursor:pointer; }
.wiz-check.is-checked { border-color:var(--color-secondary);background:rgba(36,151,208,.06); }
.wiz-check__lbl { font-size:.88rem;font-weight:600;color:var(--color-primary); }
.wiz-mc--hidden { display:none!important; }
/* ── Step 3: dane kontaktowe ─────────────────────────────────────────────── */
.wiz-s3-layout { display:grid;grid-template-columns:1fr 1fr;gap:1.5rem; }
.wiz-s3-left,.wiz-s3-right {}
.wiz-summary { background:rgba(36,151,208,.07);border:1.5px solid rgba(36,151,208,.22);border-radius:8px;padding:.85rem 1rem;margin-bottom:1.25rem;font-size:.82rem;color:var(--color-primary);line-height:1.6; }
.wiz-summary strong { color:var(--color-secondary); }
.wiz-summary ul { margin:.3rem 0 0 1rem;padding:0; }
.wiz-summary li { margin:.1rem 0; }
.wiz-error-msg { background:#fdf0f0;border:1.5px solid #e5a0a0;border-radius:8px;padding:.75rem 1rem;font-size:.82rem;color:#a03030;margin-bottom:1rem; }
/* ── Nav ─────────────────────────────────────────────────────────────────── */
.wiz-nav { display:flex;justify-content:space-between;align-items:center;margin-top:1.5rem;gap:.5rem; }
.wiz-btn { display:inline-flex;align-items:center;gap:.45rem;padding:.75rem 1.5rem;border-radius:8px;font-size:.85rem;font-weight:700;cursor:pointer;border:none;transition:all .2s;line-height:1; }
.wiz-btn--back { background:transparent;color:#6a8090;border:1.5px solid #d0dde8; }
.wiz-btn--back:hover { background:#f3f7fa;color:var(--color-primary); }
.wiz-btn--next,.wiz-btn--submit { background:var(--color-secondary);color:#fff;box-shadow:0 3px 14px rgba(36,151,208,.3);margin-left:auto; }
.wiz-btn--next:hover,.wiz-btn--submit:hover { background:#1a7fb0;transform:translateY(-1px); }
.wiz-btn svg { width:14px;height:14px; }
/* ── Success screen ──────────────────────────────────────────────────────── */
.wiz-success { text-align:center;padding:3rem 1rem; }
.wiz-success__icon { width:72px;height:72px;border-radius:50%;background:rgba(36,151,208,.1);display:flex;align-items:center;justify-content:center;margin:0 auto 1.1rem; }
.wiz-success__icon svg { width:36px;height:36px;stroke:var(--color-secondary); }
.wiz-success__title { font-size:1.4rem;font-weight:800;color:var(--color-primary);margin-bottom:.5rem; }
.wiz-success__text { font-size:.9rem;color:#5a7080; }
/* ── RODO ────────────────────────────────────────────────────────────────── */
.wiz-gdpr { display:flex;gap:.65rem;align-items:flex-start;margin:.75rem 0 1rem; }
.wiz-gdpr input { margin-top:3px;flex-shrink:0;width:16px;height:16px;accent-color:var(--color-secondary); }
.wiz-gdpr__text { font-size:.72rem;color:#6a8090;line-height:1.55; }
/* ── Contact section CTA card ────────────────────────────────────────────── */
.contact__wiz-cta {
    background:linear-gradient(135deg,var(--color-primary) 0%,#0e3a5e 60%,#0a2a45 100%);
    border-radius:16px;padding:2rem 2rem 1.75rem;display:flex;flex-direction:column;gap:0;
    position:relative;overflow:hidden;min-height:260px;justify-content:flex-end;
}
.contact__wiz-cta::before {
    content:'';position:absolute;inset:0;
    background:radial-gradient(ellipse 70% 60% at 90% 20%,rgba(36,151,208,.35) 0%,transparent 70%);
    pointer-events:none;
}
.contact__wiz-cta__badges {
    display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:1.25rem;position:relative;z-index:1;
}
.contact__wiz-cta__badge {
    display:inline-flex;align-items:center;gap:.35rem;
    background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.2);
    border-radius:99px;padding:.3rem .75rem;font-size:.72rem;font-weight:700;
    color:rgba(255,255,255,.9);letter-spacing:.02em;backdrop-filter:blur(4px);
}
.contact__wiz-cta__badge svg { width:12px;height:12px;stroke:rgba(255,255,255,.8); }
.contact__wiz-cta__heading {
    font-size:1.45rem;font-weight:900;color:#fff;line-height:1.2;
    margin-bottom:.6rem;position:relative;z-index:1;
    text-shadow:0 2px 12px rgba(0,0,0,.2);
}
.contact__wiz-cta__sub {
    font-size:.85rem;color:rgba(255,255,255,.72);line-height:1.6;
    margin-bottom:1.5rem;position:relative;z-index:1;max-width:360px;
}
.contact__wiz-cta__actions { display:flex;gap:.65rem;flex-wrap:wrap;align-items:center; }
.contact__wiz-btn {
    display:inline-flex;align-items:center;gap:.7rem;align-self:flex-start;
    background:#fff;color:var(--color-primary);font-weight:800;font-size:.95rem;
    padding:.85rem 1.75rem;border-radius:10px;border:1.5px solid transparent;cursor:pointer;
    box-shadow:0 4px 20px rgba(0,0,0,.25);transition:all .22s;
    text-decoration:none;position:relative;z-index:1;letter-spacing:.01em;
}
.contact__wiz-btn:hover {
    background:var(--color-secondary);color:#fff;
    transform:translateY(-2px);box-shadow:0 8px 32px rgba(36,151,208,.5);
}
.contact__wiz-btn svg { width:18px;height:18px;flex-shrink:0; }
.contact__wiz-btn--call {
    background:transparent;color:#fff;
    border-color:rgba(255,255,255,.35);box-shadow:none;
}
.contact__wiz-btn--call:hover {
    background:rgba(255,255,255,.12);color:#fff;
    border-color:rgba(255,255,255,.6);box-shadow:none;
}
.contact__wiz-cta__deco {
    position:absolute;top:-30px;right:-30px;width:180px;height:180px;
    border-radius:50%;border:2px solid rgba(255,255,255,.08);pointer-events:none;z-index:0;
}
.contact__wiz-cta__deco2 {
    position:absolute;top:20px;right:20px;width:100px;height:100px;
    border-radius:50%;border:1.5px solid rgba(255,255,255,.06);pointer-events:none;z-index:0;
}
.contact__wiz-cta__icon {
    position:absolute;top:1.5rem;right:1.75rem;opacity:.18;z-index:0;
}
.contact__wiz-cta__icon svg { width:80px;height:80px;stroke:#fff;stroke-width:.75; }
/* ── Responsive ─────────────────────────────────────────────────────────── */
@media(max-width:700px){
    .wiz-machine-grid { grid-template-columns:repeat(2,1fr); }
    .wiz-s3-layout { grid-template-columns:1fr; }
    .wiz-param-row { flex-direction:column;align-items:flex-start; }
    .wiz-param-label { min-width:unset; }
}
@media(max-width:480px){
    .wiz-tiles { grid-template-columns:1fr; }
    .wiz-tile { flex-direction:row;text-align:left;padding:1rem 1.25rem; }
    .wiz-machine-grid { grid-template-columns:repeat(2,1fr);gap:.5rem; }
    .wiz-sdot__l { display:none; }
    .wiz-modal__body { padding:1rem; }
    .wiz-size-btn { font-size:.68rem;padding:.28rem .6rem; }
}
</style>

<section id="kontakt" class="contact" aria-labelledby="contact-title">
    <div class="container">
        <header class="contact__header" data-aos="fade-up">
            <span class="contact__eyebrow"><?php echo esc_html( $_fpt['contact_eyebrow'] ); ?></span>
            <h2 class="contact__title" id="contact-title"><?php echo esc_html( $_fpt['contact_title'] ); ?></h2>
        </header>

        <div class="contact__inner">

            <!-- Dane kontaktowe -->
            <div class="contact__info" data-aos="fade-right">
                <div class="contact__info-item">
                    <div class="contact__info-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <div>
                        <strong class="contact__info-label"><?php echo esc_html( $_fpt['phone'] ); ?></strong>
                        <a href="tel:+48914835011" class="contact__info-value">+48 91 483 50 11</a>
                        <a href="tel:+48914831157" class="contact__info-value">+48 91 483 11 57</a>
                    </div>
                </div>
                <div class="contact__info-item">
                    <div class="contact__info-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <strong class="contact__info-label"><?php echo esc_html( $_fpt['email'] ); ?></strong>
                        <a href="mailto:info@bluedragonjet.com" class="contact__info-value">info@bluedragonjet.com</a>
                    </div>
                </div>
                <div class="contact__info-item">
                    <div class="contact__info-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <strong class="contact__info-label"><?php echo esc_html( $_fpt['address'] ); ?></strong>
                        <span class="contact__info-value">GAMM-BUD Sp. z o.o.</span>
                        <span class="contact__info-value">Skarbimierzyce 22, 72-002 Dołuje</span>
                    </div>
                </div>
            </div>

            <!-- CTA otwierające wizard -->
            <div class="contact__form-wrap contact__wiz-cta" data-aos="fade-left">
                <!-- dekoracje tła -->
                <div class="contact__wiz-cta__deco" aria-hidden="true"></div>
                <div class="contact__wiz-cta__deco2" aria-hidden="true"></div>
                <div class="contact__wiz-cta__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                </div>

                <?php if ( $wiz_success ) : ?>
                    <div class="contact__wiz-cta__badges">
                        <span class="contact__wiz-cta__badge">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                            <?php echo esc_html( $_fpt['sent_badge'] ); ?>
                        </span>
                    </div>
                    <p class="contact__wiz-cta__heading"><?php echo esc_html( $_fpt['msg_sent'] ); ?></p>
                    <p class="contact__wiz-cta__sub"><?php echo esc_html( $_fpt['msg_thanks'] ); ?></p>
                <?php else : ?>
                    <div class="contact__wiz-cta__badges">
                        <span class="contact__wiz-cta__badge">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <?php echo esc_html( $_fpt['reply_24h'] ); ?>
                        </span>
                        <span class="contact__wiz-cta__badge">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <?php echo esc_html( $_fpt['steps_3'] ); ?>
                        </span>
                    </div>
                    <p class="contact__wiz-cta__heading"><?php echo esc_html( $_fpt['have_question'] ); ?></p>
                    <p class="contact__wiz-cta__sub"><?php echo esc_html( $_fpt['contact_sub'] ); ?></p>
                    <div class="contact__wiz-cta__actions">
                        <button type="button" class="contact__wiz-btn" id="wiz-open-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                            <?php echo esc_html( $_fpt['send_inquiry'] ); ?>
                        </button>
                        <a href="tel:+48914835011" class="contact__wiz-btn contact__wiz-btn--call">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <?php echo esc_html( $_fpt['call_us'] ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- ═══ MODAL WIZARD ═══════════════════════════════════════════════════════ -->
<div class="wiz-modal-overlay" id="wiz-overlay" role="dialog" aria-modal="true" aria-labelledby="wiz-modal-title">
    <div class="wiz-modal">
        <div class="wiz-modal__header">
            <span class="wiz-modal__logo" id="wiz-modal-title">Blue Dragon Jet — <?php echo esc_html( $_fpt['form_title'] ); ?></span>
            <!-- Progress w nagłówku -->
            <div class="wiz-progress" style="flex:1;margin:0 2rem 0 1.5rem;">
                <div class="wiz-sdot is-active" data-step="1">
                    <div class="wiz-sdot__c">1</div>
                    <span class="wiz-sdot__l"><?php echo esc_html( $_fpt['step_cat'] ); ?></span>
                </div>
                <div class="wiz-sline" id="wln1"></div>
                <div class="wiz-sdot" data-step="2">
                    <div class="wiz-sdot__c">2</div>
                    <span class="wiz-sdot__l"><?php echo esc_html( $_fpt['step_prod'] ); ?></span>
                </div>
                <div class="wiz-sline" id="wln2"></div>
                <div class="wiz-sdot" data-step="3">
                    <div class="wiz-sdot__c">3</div>
                    <span class="wiz-sdot__l"><?php echo esc_html( $_fpt['step_data'] ); ?></span>
                </div>
            </div>
            <button type="button" class="wiz-modal__close" id="wiz-close-btn" aria-label="<?php echo esc_attr( $_fpt['close'] ); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <div class="wiz-modal__body">
            <form method="post" id="wiz-form" novalidate>
            <?php wp_nonce_field( 'bdj_wizard_form', 'bdj_wizard_nonce' ); ?>
            <input type="hidden" name="bdj_category" id="wiz_category" value="">

            <!-- Krok 1: Wybór kategorii -->
            <div class="wiz-step is-visible" id="ws1">
                <p class="wiz-step__title"><?php echo esc_html( $_wt['step1_title'] ); ?></p>
                <p class="wiz-step__sub"><?php echo esc_html( $_wt['step1_sub'] ); ?></p>
                <div class="wiz-tiles">
                    <div class="wiz-tile" data-cat="Maszyny" tabindex="0" role="button">
                        <div class="wiz-tile__icon">
                            <svg viewBox="0 0 102 67" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="0" y="60" width="100" height="5" rx="1.5" stroke-width="1.8"/><rect x="14" y="10" width="72" height="50" rx="2" stroke-width="1.8"/><rect x="14" y="4" width="72" height="9" rx="2" stroke-width="1.8"/><circle cx="63" cy="2.5" r="2" stroke-width="1.4"/><circle cx="72" cy="2" r="1.5" stroke-width="1.4"/><rect x="17" y="14" width="63" height="20" rx="10" stroke-width="1.6"/><circle cx="31" cy="24" r="6" stroke-width="1.4"/><circle cx="44" cy="24" r="6" stroke-width="1.4"/><circle cx="57" cy="24" r="6" stroke-width="1.4"/><circle cx="69" cy="24" r="6" stroke-width="1.4"/><rect x="17" y="36" width="63" height="20" rx="10" stroke-width="1.6"/><circle cx="31" cy="46" r="6" stroke-width="1.4"/><circle cx="44" cy="46" r="6" stroke-width="1.4"/><circle cx="57" cy="46" r="6" stroke-width="1.4"/><circle cx="69" cy="46" r="6" stroke-width="1.4"/><rect x="1" y="25" width="11" height="26" rx="2" stroke-width="1.4"/><circle cx="6.5" cy="31.5" r="3.5" stroke-width="1.3"/><line x1="6.5" y1="31.5" x2="8" y2="29.2" stroke-width="1.3"/><line x1="12" y1="41" x2="14" y2="41" stroke-width="1.3"/><line x1="12" y1="45" x2="14" y2="45" stroke-width="1.3"/></svg>
                        </div>
                        <div>
                            <div class="wiz-tile__name"><?php echo esc_html( $_wt['tile_machines'] ); ?></div>
                            <div class="wiz-tile__desc"><?php echo esc_html( $_wt['tile_machines_desc'] ); ?></div>
                        </div>
                    </div>
                    <div class="wiz-tile" data-cat="Akcesoria" tabindex="0" role="button">
                        <div class="wiz-tile__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
                        </div>
                        <div>
                            <div class="wiz-tile__name"><?php echo esc_html( $_wt['tile_acc'] ); ?></div>
                            <div class="wiz-tile__desc"><?php echo esc_html( $_wt['tile_acc_desc'] ); ?></div>
                        </div>
                    </div>
                    <div class="wiz-tile" data-cat="Kompresory" tabindex="0" role="button">
                        <div class="wiz-tile__icon">
                            <svg viewBox="0 0 46 42" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 4.5 Q18 1.5 23 1.5 Q28 1.5 28 4.5"/><rect x="1" y="4.5" width="44" height="5.5" rx="1.5"/><rect x="1" y="10" width="44" height="22" rx="2"/><circle cx="9" cy="21" r="7"/><line x1="38" y1="12.5" x2="44" y2="12.5"/><line x1="38" y1="15.5" x2="44" y2="15.5"/><line x1="38" y1="18.5" x2="44" y2="18.5"/><line x1="38" y1="21.5" x2="44" y2="21.5"/><line x1="38" y1="24.5" x2="44" y2="24.5"/><line x1="38" y1="27.5" x2="44" y2="27.5"/><line x1="4" y1="32" x2="4" y2="35"/><line x1="41" y1="32" x2="41" y2="35"/><circle cx="8" cy="37.5" r="2.5"/><circle cx="37" cy="37.5" r="2.5"/></svg>
                        </div>
                        <div>
                            <div class="wiz-tile__name"><?php echo esc_html( $_wt['tile_comp'] ); ?></div>
                            <div class="wiz-tile__desc"><?php echo esc_html( $_wt['tile_comp_desc'] ); ?></div>
                        </div>
                    </div>
                    <div class="wiz-tile" data-cat="Kontakt" tabindex="0" role="button">
                        <div class="wiz-tile__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                        </div>
                        <div>
                            <div class="wiz-tile__name"><?php echo esc_html( $_wt['tile_contact'] ); ?></div>
                            <div class="wiz-tile__desc"><?php echo esc_html( $_wt['tile_contact_desc'] ); ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Krok 2: Wybór produktów -->
            <div class="wiz-step" id="ws2">
                <p class="wiz-step__title" id="ws2-title"><?php echo esc_html( $_fpt['select_products'] ); ?></p>
                <p class="wiz-step__sub"><?php echo esc_html( $_fpt['select_multiple'] ); ?></p>

                <!-- Maszyny — filtry rozmiarów + siatka -->
                <div id="wiz-pm" style="display:none">

                    <div class="wiz-params">
                        <div class="wiz-param-row">
                            <label class="wiz-param-label" for="wiz-sel-duct">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/></svg>
                                <?php echo esc_html( $_fpt['duct_inner'] ); ?>
                            </label>
                            <select class="wiz-select" id="wiz-sel-duct">
                                <option value="">— <?php echo esc_html( $_fpt['duct_inner'] ); ?> —</option>
                                <option value="xsmall">≤ 5 mm</option>
                                <option value="small">5–10 mm</option>
                                <option value="medium">10–16 mm</option>
                                <option value="large">16–25 mm</option>
                                <option value="xlarge">≥ 25 mm</option>
                            </select>
                        </div>
                        <div class="wiz-param-row">
                            <label class="wiz-param-label" for="wiz-sel-cable">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="2" x2="12" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                                <?php echo esc_html( $_fpt['cable_outer'] ); ?>
                            </label>
                            <select class="wiz-select" id="wiz-sel-cable">
                                <option value="">— <?php echo esc_html( $_fpt['cable_outer'] ); ?> —</option>
                                <option value="xsmall">≤ 3 mm</option>
                                <option value="small">3–8 mm</option>
                                <option value="medium">8–14 mm</option>
                                <option value="large">14–22 mm</option>
                                <option value="xlarge">≥ 22 mm</option>
                            </select>
                        </div>
                        <p class="wiz-params__hint" id="wiz-match-hint"></p>
                    </div>

                    <div class="wiz-machine-grid" id="wiz-mgrid">
                        <?php foreach ( $wiz_machines as $m ) : ?>
                        <div class="wiz-mc" data-val="<?php echo esc_attr( $m['title'] ); ?>">
                            <input type="checkbox" name="bdj_products[]" value="<?php echo esc_attr( $m['title'] ); ?>" aria-label="<?php echo esc_attr( $m['title'] ); ?>">
                            <span class="wiz-mc__badge"><?php echo esc_html( $_fpt['recommended'] ); ?></span>
                            <?php if ( $m['thumb'] ) : ?>
                                <img class="wiz-mc__img" src="<?php echo esc_url( $m['thumb'] ); ?>" alt="<?php echo esc_attr( $m['title'] ); ?>" loading="lazy">
                            <?php else : ?>
                                <div class="wiz-mc__img-placeholder">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                </div>
                            <?php endif; ?>
                            <div class="wiz-mc__name"><?php echo esc_html( $m['title'] ); ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Akcesoria — siatka ze zdjęciami + wyszukiwarka -->
                <div id="wiz-pa" style="display:none">
                    <div class="wiz-search-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input type="text" class="wiz-search" id="wiz-search-acc" placeholder="<?php echo esc_attr( $_wt['search_acc'] ); ?>">
                    </div>
                    <div class="wiz-machine-grid" id="wiz-agrid">
                        <?php foreach ( $wiz_acc_products as $a ) : ?>
                        <div class="wiz-mc" data-val="<?php echo esc_attr( $a['title'] ); ?>" data-name="<?php echo esc_attr( strtolower( $a['title'] ) ); ?>">
                            <input type="checkbox" name="bdj_products[]" value="<?php echo esc_attr( $a['title'] ); ?>" aria-label="<?php echo esc_attr( $a['title'] ); ?>">
                            <?php if ( $a['thumb'] ) : ?>
                                <img class="wiz-mc__img" src="<?php echo esc_url( $a['thumb'] ); ?>" alt="<?php echo esc_attr( $a['title'] ); ?>" loading="lazy">
                            <?php else : ?>
                                <div class="wiz-mc__img-placeholder">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                </div>
                            <?php endif; ?>
                            <div class="wiz-mc__name"><?php echo esc_html( $a['title'] ); ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Kompresory — siatka ze zdjęciami + wyszukiwarka -->
                <div id="wiz-pk" style="display:none">
                    <div class="wiz-search-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input type="text" class="wiz-search" id="wiz-search-comp" placeholder="<?php echo esc_attr( $_wt['search_comp'] ); ?>">
                    </div>
                    <div class="wiz-machine-grid" id="wiz-kgrid">
                        <?php foreach ( $wiz_comp_products as $p ) : ?>
                        <div class="wiz-mc" data-val="<?php echo esc_attr( $p['title'] ); ?>" data-name="<?php echo esc_attr( strtolower( $p['title'] ) ); ?>">
                            <input type="checkbox" name="bdj_products[]" value="<?php echo esc_attr( $p['title'] ); ?>" aria-label="<?php echo esc_attr( $p['title'] ); ?>">
                            <?php if ( $p['thumb'] ) : ?>
                                <img class="wiz-mc__img" src="<?php echo esc_url( $p['thumb'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" loading="lazy">
                            <?php else : ?>
                                <div class="wiz-mc__img-placeholder">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                </div>
                            <?php endif; ?>
                            <div class="wiz-mc__name"><?php echo esc_html( $p['title'] ); ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="wiz-nav">
                    <button type="button" class="wiz-btn wiz-btn--back" data-goto="1">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
                        <?php echo esc_html( $_fpt['back'] ); ?>
                    </button>
                    <button type="button" class="wiz-btn wiz-btn--next" id="wiz-n2">
                        <?php echo esc_html( $_fpt['next_step'] ); ?>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                </div>
            </div>

            <!-- Krok 3: Dane kontaktowe -->
            <div class="wiz-step" id="ws3">
                <p class="wiz-step__title"><?php echo esc_html( $_fpt['your_contact'] ); ?></p>
                <p class="wiz-step__sub"><?php echo esc_html( $_fpt['reply_sub'] ); ?></p>

                <?php if ( $wiz_error ) : ?>
                    <div class="wiz-error-msg" role="alert"><?php echo esc_html( $wiz_error ); ?></div>
                <?php endif; ?>

                <div class="wiz-s3-layout">
                    <div class="wiz-s3-left">
                        <div class="wiz-summary" id="wiz-sum" aria-live="polite"></div>
                        <div class="contact__field">
                            <label for="bdj_name"><?php echo esc_html( $_fpt['full_name'] ); ?></label>
                            <input type="text" id="bdj_name" name="bdj_name" required autocomplete="name" value="<?php echo isset($_POST['bdj_name']) ? esc_attr(wp_unslash($_POST['bdj_name'])) : ''; ?>">
                        </div>
                        <div class="contact__field">
                            <label for="bdj_email"><?php echo esc_html( $_fpt['email_label'] ); ?></label>
                            <input type="email" id="bdj_email" name="bdj_email" required autocomplete="email" value="<?php echo isset($_POST['bdj_email']) ? esc_attr(wp_unslash($_POST['bdj_email'])) : ''; ?>">
                        </div>
                        <div class="contact__field">
                            <label for="bdj_phone"><?php echo esc_html( $_fpt['phone_label'] ); ?></label>
                            <input type="tel" id="bdj_phone" name="bdj_phone" autocomplete="tel" value="<?php echo isset($_POST['bdj_phone']) ? esc_attr(wp_unslash($_POST['bdj_phone'])) : ''; ?>">
                        </div>
                    </div>
                    <div class="wiz-s3-right">
                        <div class="contact__field" style="height:100%">
                            <label for="bdj_message"><?php echo esc_html( $_fpt['add_message'] ); ?></label>
                            <textarea id="bdj_message" name="bdj_message" rows="6" style="height:calc(100% - 1.5rem)" placeholder="<?php echo esc_attr( $_fpt['msg_placeholder'] ); ?>"><?php echo isset($_POST['bdj_message']) ? esc_textarea(wp_unslash($_POST['bdj_message'])) : ''; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="wiz-gdpr">
                    <input type="checkbox" id="bdj_gdpr" name="bdj_gdpr" value="1" required <?php checked(!empty($_POST['bdj_gdpr'])); ?>>
                    <label for="bdj_gdpr" class="wiz-gdpr__text"><?php echo esc_html( $_fpt['gdpr'] ); ?></label>
                </div>

                <div class="wiz-nav">
                    <button type="button" class="wiz-btn wiz-btn--back" data-goto="2">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
                        <?php echo esc_html( $_fpt['back'] ); ?>
                    </button>
                    <button type="submit" name="bdj_wizard_submit" class="wiz-btn wiz-btn--submit">
                        <?php echo esc_html( $_fpt['send_inquiry'] ); ?>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </div>
            </div>

            </form>
        </div><!-- .wiz-modal__body -->
    </div><!-- .wiz-modal -->
</div><!-- .wiz-modal-overlay -->

<script>
(function(){
    var cur=1, cat='', catInput=document.getElementById('wiz_category');
    var overlay=document.getElementById('wiz-overlay');
    var selDuct='', selCable='';

    /* ── Mapowanie maszyn → rozmiary rurek i kabli ─────────────────────────── */
    var sizeMap = {
        'BDJ MINI':                   { duct:['xsmall'],                   cable:['xsmall'] },
        'BDJ MINI COUNTER':           { duct:['xsmall'],                   cable:['xsmall'] },
        'BDJ BUDGET':                 { duct:['small'],                    cable:['small'] },
        'BDJ Budget Easy Set':        { duct:['small'],                    cable:['small'] },
        'BDJ Budget Plus':            { duct:['small'],                    cable:['small'] },
        'BDJ BUDGET PLUS EASY SET':   { duct:['small'],                    cable:['small'] },
        'BDJ NEXT':                   { duct:['medium'],                   cable:['small','medium'] },
        'BDJ EXTENDED':               { duct:['medium'],                   cable:['medium'] },
        'BDJ BRAIN':                  { duct:['small','medium'],           cable:['small','medium'] },
        'BDJ Brain V3':               { duct:['small','medium'],           cable:['small','medium'] },
        'BDJ EXTERNAL DEVICE':        { duct:['xsmall','small','medium','large','xlarge'], cable:['xsmall','small','medium','large','xlarge'] },
        'BDJ MAX DUALHEAD':           { duct:['large'],                    cable:['large'] },
        'BDJ HYDRO':                  { duct:['large'],                    cable:['large'] },
        'BDJ HYDRO CHAIN MULTITUBE':  { duct:['large','xlarge'],           cable:['large','xlarge'] },
        'DragonAir':                  { duct:['xlarge'],                   cable:['xlarge'] },
    };

    /* ── Filtruj siatkę maszyn ─────────────────────────────────────────────── */
    function filterMachines(){
        var hint=document.getElementById('wiz-match-hint');
        var count=0;
        document.querySelectorAll('#wiz-mgrid .wiz-mc').forEach(function(card){
            var name=card.dataset.val;
            var spec=sizeMap[name]||{duct:[],cable:[]};
            var matchDuct = !selDuct || spec.duct.indexOf(selDuct)>-1;
            var matchCable= !selCable|| spec.cable.indexOf(selCable)>-1;
            var match = matchDuct && matchCable;
            var hasFilter = selDuct || selCable;
            card.classList.toggle('is-recommended', hasFilter && match);
            card.classList.toggle('is-dimmed', hasFilter && !match && !card.classList.contains('is-checked'));
            if(match && hasFilter) count++;
        });
        if(hint){
            if(!selDuct && !selCable) hint.textContent='';
            else if(count===0) hint.textContent='<?php echo esc_js(__('Brak dokładnego dopasowania — wybierz inne parametry lub zaznacz maszynę ręcznie.','blue-dragon-jet')); ?>';
            else hint.textContent=count+' <?php echo esc_js(__('maszyn pasuje do wybranych parametrów','blue-dragon-jet')); ?>';
        }
    }

    /* ── Size selects ─────────────────────────────────────────────────────── */
    var selDuctEl  = document.getElementById('wiz-sel-duct');
    var selCableEl = document.getElementById('wiz-sel-cable');
    if(selDuctEl)  selDuctEl.addEventListener('change',  function(){ selDuct=this.value;  filterMachines(); });
    if(selCableEl) selCableEl.addEventListener('change', function(){ selCable=this.value; filterMachines(); });

    /* ── Modal open/close ──────────────────────────────────────────────────── */
    function openModal(){
        overlay.classList.add('is-open');
        document.body.style.overflow='hidden';
        overlay.querySelector('.wiz-modal__close').focus();
    }
    function closeModal(){
        overlay.classList.remove('is-open');
        document.body.style.overflow='';
        var btn=document.getElementById('wiz-open-btn');
        if(btn) btn.focus();
    }
    var openBtn=document.getElementById('wiz-open-btn');
    if(openBtn) openBtn.addEventListener('click',openModal);
    document.getElementById('wiz-close-btn').addEventListener('click',closeModal);
    overlay.addEventListener('click',function(e){ if(e.target===overlay) closeModal(); });
    document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&overlay.classList.contains('is-open')) closeModal(); });

    /* ── Step navigation ───────────────────────────────────────────────────── */
    function show(n){
        [1,2,3].forEach(function(i){
            var s=document.getElementById('ws'+i);
            if(s) s.classList.toggle('is-visible',i===n);
        });
        document.querySelectorAll('.wiz-sdot').forEach(function(d){
            var i=parseInt(d.dataset.step);
            d.classList.remove('is-active','is-done');
            if(i<n) d.classList.add('is-done');
            else if(i===n) d.classList.add('is-active');
        });
        ['wln1','wln2'].forEach(function(id,idx){
            var l=document.getElementById(id);
            if(l) l.classList.toggle('is-done',n>idx+1);
        });
        cur=n;
        var mb=overlay.querySelector('.wiz-modal__body');
        if(mb) mb.scrollTop=0;
    }

    function checkedVals(){
        return Array.from(document.querySelectorAll('#wiz-form input[name="bdj_products[]"]:checked')).map(function(c){return c.value;});
    }
    function updateSum(){
        var s=document.getElementById('wiz-sum');
        if(!s) return;
        var c=checkedVals();
        var extra='';
        if(selDuct||selCable){
            var sizes=[];
            var dmap={xsmall:'≤5mm',small:'5–10mm',medium:'10–16mm',large:'16–25mm',xlarge:'≥25mm'};
            var cmap={xsmall:'≤3mm',small:'3–8mm',medium:'8–14mm',large:'14–22mm',xlarge:'≥22mm'};
            if(selDuct) sizes.push('<?php echo esc_js(__('Rurka','blue-dragon-jet')); ?>: '+(dmap[selDuct]||selDuct));
            if(selCable) sizes.push('<?php echo esc_js(__('Kabel','blue-dragon-jet')); ?>: '+(cmap[selCable]||selCable));
            extra='<br><small style="color:#6a8090">'+sizes.join(' / ')+'</small>';
        }
        var html='<strong>'+cat+'</strong>'+extra;
        if(c.length){ html+='<ul>'+c.map(function(v){return '<li>'+v+'</li>';}).join('')+'</ul>'; }
        s.innerHTML=html;
    }

    /* ── Wyszukiwarka dla siatek ───────────────────────────────────────────── */
    function bindSearch(inputId, gridId){
        var inp=document.getElementById(inputId);
        if(!inp) return;
        inp.addEventListener('input',function(){
            var q=inp.value.toLowerCase().trim();
            document.querySelectorAll('#'+gridId+' .wiz-mc').forEach(function(card){
                var name=card.dataset.name||card.dataset.val.toLowerCase();
                card.classList.toggle('wiz-mc--hidden', q!==''&&name.indexOf(q)===-1);
            });
        });
    }
    bindSearch('wiz-search-acc','wiz-agrid');
    bindSearch('wiz-search-comp','wiz-kgrid');

    /* ── Step 1: tile click ────────────────────────────────────────────────── */
    document.querySelectorAll('.wiz-tile').forEach(function(t){
        function pick(){
            cat=t.dataset.cat; catInput.value=cat;
            /* Kontakt — pomiń step 2 */
            if(cat==='Kontakt'){ updateSum(); show(3); return; }
            var pm=document.getElementById('wiz-pm');
            if(pm) pm.style.display=cat==='Maszyny'?'block':'none';
            document.getElementById('wiz-pa').style.display=cat==='Akcesoria'?'block':'none';
            var pk=document.getElementById('wiz-pk');
            if(pk) pk.style.display=cat==='Kompresory'?'block':'none';
            /* reset */
            document.querySelectorAll('#wiz-form input[name="bdj_products[]"]').forEach(function(cb){
                cb.checked=false;
                var mc=cb.closest('.wiz-mc');
                if(mc){ mc.classList.remove('is-checked','is-recommended','is-dimmed'); }
                var ch=cb.closest('.wiz-check');
                if(ch) ch.classList.remove('is-checked');
            });
            /* reset search */
            ['wiz-search-acc','wiz-search-comp'].forEach(function(id){
                var s=document.getElementById(id); if(s) s.value='';
            });
            document.querySelectorAll('#wiz-agrid .wiz-mc,#wiz-kgrid .wiz-mc').forEach(function(c){ c.classList.remove('wiz-mc--hidden'); });
            selDuct=''; selCable='';
            if(selDuctEl)  selDuctEl.value='';
            if(selCableEl) selCableEl.value='';
            filterMachines();
            var t2=document.getElementById('ws2-title');
            var titles={'Maszyny':'<?php echo esc_js(__('Wybierz maszyny','blue-dragon-jet')); ?>','Akcesoria':'<?php echo esc_js(__('Wybierz akcesoria','blue-dragon-jet')); ?>','Kompresory':'<?php echo esc_js(__('Wybierz kompresory','blue-dragon-jet')); ?>'};
            if(t2) t2.textContent=titles[cat]||cat;
            show(2);
        }
        t.addEventListener('click',pick);
        t.addEventListener('keydown',function(e){if(e.key==='Enter'||e.key===' '){e.preventDefault();pick();}});
    });

    /* ── Step 2: machine card click ────────────────────────────────────────── */
    document.querySelectorAll('.wiz-mc').forEach(function(card){
        card.addEventListener('click',function(e){
            var cb=card.querySelector('input[type=checkbox]');
            if(e.target===cb) return;
            cb.checked=!cb.checked;
            card.classList.toggle('is-checked',cb.checked);
            if(cb.checked) card.classList.remove('is-dimmed');
        });
        var cb=card.querySelector('input[type=checkbox]');
        if(cb) cb.addEventListener('change',function(){
            card.classList.toggle('is-checked',cb.checked);
            if(cb.checked) card.classList.remove('is-dimmed');
        });
    });

    /* ── Step 2: accessory checkbox ────────────────────────────────────────── */
    document.querySelectorAll('.wiz-check').forEach(function(l){
        l.addEventListener('click',function(e){
            if(e.target.tagName==='INPUT') return;
            var cb=l.querySelector('input');cb.checked=!cb.checked;
            l.classList.toggle('is-checked',cb.checked);
        });
        var ci=l.querySelector('input');
        if(ci) ci.addEventListener('change',function(){ l.classList.toggle('is-checked',ci.checked); });
    });

    /* ── Step 2 → 3 ────────────────────────────────────────────────────────── */
    var n2=document.getElementById('wiz-n2');
    if(n2) n2.addEventListener('click',function(){
        if(cat!=='Kontakt'&&!checkedVals().length){alert('<?php echo esc_js(__('Wybierz przynajmniej jeden produkt.','blue-dragon-jet')); ?>');return;}
        updateSum(); show(3);
    });

    /* ── Back buttons ───────────────────────────────────────────────────────── */
    document.querySelectorAll('[data-goto]').forEach(function(b){
        if(b.classList.contains('wiz-btn--next')) return;
        b.addEventListener('click',function(){show(parseInt(b.dataset.goto));});
    });

    /* ── Submit validation ──────────────────────────────────────────────────── */
    var form=document.getElementById('wiz-form');
    if(form) form.addEventListener('submit',function(e){
        var n=document.getElementById('bdj_name'),em=document.getElementById('bdj_email'),g=document.getElementById('bdj_gdpr');
        if(!n||!n.value.trim()||!em||!/\S+@\S+\.\S+/.test(em.value)||!g||!g.checked){
            e.preventDefault();alert('<?php echo esc_js(__('Wypełnij wymagane pola i zaznacz zgodę RODO.','blue-dragon-jet')); ?>');
        }
    });

    <?php if($wiz_error): ?>
    cat=<?php echo wp_json_encode(sanitize_text_field(wp_unslash($_POST['bdj_category']??''))); ?>;
    catInput.value=cat;
    var pm=document.getElementById('wiz-pm');
    if(pm) pm.style.display=cat==='Maszyny'?'block':'none';
    document.getElementById('wiz-pa').style.display=cat==='Akcesoria'?'block':'none';
    var pkr=document.getElementById('wiz-pk'); if(pkr) pkr.style.display=cat==='Kompresory'?'block':'none';
    <?php $err_products = array_map('sanitize_text_field', (array)($_POST['bdj_products']??[])); ?>
    var errProds=<?php echo wp_json_encode($err_products); ?>;
    errProds.forEach(function(v){
        var cb=document.querySelector('#wiz-form input[name="bdj_products[]"][value="'+CSS.escape(v)+'"]');
        if(cb){cb.checked=true;var mc=cb.closest('.wiz-mc');if(mc)mc.classList.add('is-checked');var ch=cb.closest('.wiz-check');if(ch)ch.classList.add('is-checked');}
    });
    updateSum(); show(3); openModal();
    <?php endif; ?>
})();
</script>

<!-- ═══ NAJNOWSZE ARTYKUŁY ════════════════════════════════════════════════════ -->
<?php
$latest_posts = new WP_Query( [
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
] );
if ( $latest_posts->have_posts() ) : ?>
<section class="home-articles">
    <div class="container">
        <header class="home-articles__header">
            <h2 class="home-articles__title"><?php esc_html_e( 'Najnowsze artykuły', 'blue-dragon-jet' ); ?></h2>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/blog/' ) ); ?>" class="home-articles__all"><?php esc_html_e( 'Wszystkie artykuły', 'blue-dragon-jet' ); ?> &rarr;</a>
        </header>
        <div class="home-articles__grid">
            <?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="home-article-card">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="home-article-card__img"><?php the_post_thumbnail( 'medium_large' ); ?></div>
                <?php endif; ?>
                <div class="home-article-card__body">
                    <?php
                    $acats = get_the_terms( get_the_ID(), 'article_category' );
                    if ( $acats && ! is_wp_error( $acats ) ) :
                        echo '<span class="home-article-card__cat">' . esc_html( $acats[0]->name ) . '</span>';
                    endif;
                    ?>
                    <h3 class="home-article-card__title"><?php the_title(); ?></h3>
                    <time class="home-article-card__date"><?php echo esc_html( get_the_date() ); ?></time>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ═══ GEO: FAQ (Najczęściej zadawane pytania — dół strony) ═══════════════════ -->
<?php
$_faq_data = [
    'pl' => [
        'eye'      => 'Baza Wiedzy FTTH',
        'h'        => 'Najczęściej zadawane pytania (FAQ)',
        'sub'      => 'Odpowiedzi ekspertów Blue Dragon Jet na kluczowe pytania techniczne.',
        'note_h'   => 'Masz inne pytania techniczne?',
        'note_p'   => 'Nasz Wirtualny Doradca AI natychmiast dobierze wdmuchiwarkę, kompresor i akcesoria do Twojego projektu.',
        'note_btn' => 'Zapytaj Doradcę AI',
        'list'     => [
            [ 'q' => 'Czym różni się wdmuchiwanie kabli metodą pneumatyczną od tradycyjnego zaciągania?', 'a' => 'Wdmuchiwanie pneumatyczne wykorzystuje sprężone powietrze, które unosi kabel wewnątrz mikrorury i niweluje tarcie wzdłuż całej trasy, eliminując naprężenia osiowe i ryzyko zerwania włókien światłowodowych.' ],
            [ 'q' => 'Jak dobrać odpowiednią wdmuchiwarkę Blue Dragon Jet do projektu?', 'a' => 'Do instalacji mikrokabli abonenckich (0.8–6 mm) w budynkach idealny jest BDJ Mini. Do sieci miejskich (2.5–10 mm) polecamy BDJ Next, a do długich tras magistralnych (do 15–20 mm) modele BDJ MAX lub BDJ Hydro.' ],
            [ 'q' => 'Jakie parametry powinien mieć kompresor do wdmuchiwarek światłowodowych?', 'a' => 'Do mikrokabli wystarcza kompresor o ciśnieniu 10–12 bar i przepływie 1.0–1.5 m³/min. Dla większych kabli magistralnych zalecane jest 15 bar oraz wydatek 3.0–10.0 m³/min wraz z chłodnicą DragonAir.' ],
            [ 'q' => 'Czy maszyny Blue Dragon Jet posiadają gwarancję i certyfikaty CE?', 'a' => 'Tak, wszystkie maszyny produkowane są w Polsce (UE) przez GAMM-BUD zgodnie z normami ISO i posiadają pełną 36-miesięczną gwarancję producenta oraz certyfikat CE.' ],
        ]
    ],
    'en' => [
        'eye'      => 'FTTH Knowledge Base',
        'h'        => 'Frequently Asked Questions (FAQ)',
        'sub'      => 'Expert answers regarding fiber blowing machines, compressor sizing, and BDJ technology.',
        'note_h'   => 'Have more technical questions?',
        'note_p'   => 'Our AI Technical Advisor will instantly help you match the right machine, compressor, and accessories.',
        'note_btn' => 'Ask AI Advisor',
        'list'     => [
            [ 'q' => 'How does pneumatic cable blowing compare to traditional pulling?', 'a' => 'Pneumatic blowing uses compressed air to float the fiber cable inside the microduct, drastically reducing friction and preventing cable strain or fiber breakage over long distances.' ],
            [ 'q' => 'Which Blue Dragon Jet machine should I choose for my project?', 'a' => 'For subscriber microcables (0.8–6 mm), choose BDJ Mini. For metro and distribution routes (2.5–10 mm), select BDJ Next. For heavy backbone installations (up to 20 mm), choose BDJ MAX or BDJ Hydro.' ],
            [ 'q' => 'What compressor specifications are required for BDJ machines?', 'a' => 'A compressor operating at 10–15 bar with airflow from 1.0 m³/min (for microcables) to 10.0 m³/min (for backbone routes) is recommended, alongside a DragonAir aftercooler.' ],
            [ 'q' => 'Where are Blue Dragon Jet machines manufactured?', 'a' => 'All Blue Dragon Jet machines are manufactured in Poland (European Union) by GAMM-BUD since 2001, backed by CE certification and a 36-month warranty.' ],
        ]
    ],
    'de' => [
        'eye'      => 'LWL Wissensdatenbank',
        'h'        => 'Häufig gestellte Fragen (FAQ)',
        'sub'      => 'Expertenantworten zu Maschinenwahl, Kompressoranforderungen und BDJ Systemen.',
        'note_h'   => 'Haben Sie weitere technische Fragen?',
        'note_p'   => 'Unser KI-Fachberater hilft Ihnen sofort bei der Auswahl der passenden Einblasmaschine und des Zubehörs.',
        'note_btn' => 'KI-Berater fragen',
        'list'     => [
            [ 'q' => 'Was sind die Vorteile des pneumatischen Einblasens gegenüber dem Ziehen?', 'a' => 'Beim Einblasen trägt die Druckluft das Kabel im Mikrorohr und reduziert Reibung auf ein Minimum. Dadurch werden Zugspannungen und Glasfaserbrüche zuverlässig verhindert.' ],
            [ 'q' => 'Welche BDJ Einblasmaschine ist für mein Projekt geeignet?', 'a' => 'Für Mikrokabel (0,8–6 mm) empfiehlt sich BDJ Mini. Für Stadtnetze (2,5–10 mm) ist BDJ Next ideal, und für schwere Trassenkabel (bis 20 mm) eignen sich BDJ MAX oder BDJ Hydro.' ],
            [ 'q' => 'Welche Anforderungen muss der Kompressor erfüllen?', 'a' => 'Erforderlich ist ein Betriebsdruck von 10–15 bar mit 1,0 bis 10,0 m³/min Liefermenge, idealerweise kombiniert mit dem DragonAir Nachkühler.' ],
            [ 'q' => 'Wo werden Blue Dragon Jet Maschinen produziert?', 'a' => 'Alle Blue Dragon Jet Maschinen werden in Polen (EU) durch GAMM-BUD seit 2001 nach ISO-Standards gefertigt und bieten 36 Monate Garantie sowie CE-Kennzeichnung.' ],
        ]
    ]
];
$_cur_faq = $_faq_data[ $_lang ] ?? $_faq_data['pl'];
?>
<section class="geo-section" id="faq">
    <div class="container">
        <div class="geo-header">
            <span class="geo-header__eyebrow"><?php echo esc_html( $_cur_faq['eye'] ); ?></span>
            <h2 class="geo-header__title"><?php echo esc_html( $_cur_faq['h'] ); ?></h2>
            <p class="geo-header__desc"><?php echo esc_html( $_cur_faq['sub'] ); ?></p>
        </div>

        <div class="geo-faq-list">
            <?php foreach ( $_cur_faq['list'] as $idx => $f ) : ?>
            <details class="geo-faq-item" <?php echo $idx === 0 ? 'open' : ''; ?>>
                <summary class="geo-faq-summary"><?php echo esc_html( $f['q'] ); ?></summary>
                <div class="geo-faq-answer">
                    <p><?php echo esc_html( $f['a'] ); ?></p>
                </div>
            </details>
            <?php endforeach; ?>
        </div>

        <!-- FAQ CTA Card -->
        <div class="geo-faq-footer">
            <div class="geo-faq-footer__info">
                <div class="geo-faq-footer__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="22" height="22" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><circle cx="8.5" cy="10.5" r="1" fill="currentColor"/><circle cx="12" cy="10.5" r="1" fill="currentColor"/><circle cx="15.5" cy="10.5" r="1" fill="currentColor"/></svg>
                </div>
                <div>
                    <h4 class="geo-faq-footer__title"><?php echo esc_html( $_cur_faq['note_h'] ?? 'Masz inne pytania techniczne?' ); ?></h4>
                    <p class="geo-faq-footer__text"><?php echo esc_html( $_cur_faq['note_p'] ?? 'Nasz Wirtualny Doradca AI pomoże dobrać odpowiednią wdmuchiwarkę.' ); ?></p>
                </div>
            </div>
            <button type="button" class="geo-faq-footer__btn" onclick="if(window.__bdjOpenChat){window.__bdjOpenChat();}else{var f=document.getElementById('bdj-ai-fab');if(f)f.click();}">
                <?php echo esc_html( $_cur_faq['note_btn'] ?? 'Zapytaj Doradcę AI' ); ?> &rarr;
            </button>
        </div>
    </div>
</section>
</div><!-- .bdj-desktop-only -->

<div class="bdj-mobile-only">
    <?php get_template_part( 'front-page-mobile-content' ); ?>
</div><!-- .bdj-mobile-only -->

<?php get_footer(); ?>
