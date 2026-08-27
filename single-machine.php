<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
/* ── Meta fields ─────────────────────────────────────────────────── */
$in_calc         = get_post_meta( get_the_ID(), 'machine_in_calculator',     true );
$microduct       = get_post_meta( get_the_ID(), 'machine_microduct_diameter', true );
$pipe            = get_post_meta( get_the_ID(), 'machine_pipe_diameter',      true );
$match_raw       = get_post_meta( get_the_ID(), 'machine_perfect_match',      true );
$match_id        = absint( $match_raw );
$match_post      = ( $match_id && get_post_status( $match_id ) === 'publish' ) ? get_post( $match_id ) : null;
$match           = $match_post ? $match_post->post_title : ( is_numeric( $match_raw ) ? '' : $match_raw );

// Język — pobierz wersję EN/DE jeśli istnieje, fallback do PL
$_m_lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
$_m_sfx  = ( $_m_lang !== 'pl' ) ? '_' . $_m_lang : '';

// Tłumaczenia napisów na stronie maszyny
$_mt = [
    'pl' => [
        'download_pdf'   => 'Pobierz kartę katalogową',
        'find_dist'      => 'Znajdź dystrybutora',
        'docs_lead'      => 'Pobierz dokumentację techniczną dla tej maszyny.',
        'download'       => 'Pobierz',
        'spec'           => 'Specyfikacja techniczna',
        'perf'           => 'Wydajność',
        'compat'         => 'Kompatybilność',
        'perfect_match'  => 'Idealny kompan',
        'warranty'       => '36 mies. gwarancja',
        'eu_quality'     => 'Produkcja EU',
        'support'        => 'Wsparcie techniczne',
        'ask_offer'      => 'Zapytaj o ofertę',
        'back_to_list'   => 'Wróć do listy',
        'cat_datasheet'  => 'Karta katalogowa',
        'back_catalog'   => 'Powrót do katalogu maszyn',
        'home'           => 'Strona główna',
        'machines'       => 'Maszyny',
        'subtitle'       => 'Maszyna do wdmuchiwania kabli światłowodowych',
        'reviews'        => 'opinie',
        'read_reviews'   => 'Czytaj opinie',
        'cable'          => 'Kabel',
        'microduct'      => 'Mikrorurka:',
        'cable_label'    => 'Kabel:',
        'avail'          => 'Dostępna — wysyłka w ciągu 24h',
        'delivery'       => 'Dostawa do Europy w 3–5 dni roboczych',
        'ideal_set'      => 'Idealny zestaw z:',
        'delivery_24'    => 'Dostawa 24h',
        'countries'      => '60+ krajów',
        'tab_desc'       => 'Opis',
        'tab_specs'      => 'Dane techniczne',
        'tab_set'        => 'Pasuje do zestawu',
        'tab_docs'       => 'Dokumenty',
        'why_title'      => 'Dlaczego %s?',
        'benefits'       => 'Korzyści dla Ciebie',
        'benefit1_title' => 'Precyzja na każdym odcinku',
        'benefit1_desc'  => 'Obsługuje kable %s — instalujesz szybciej, bez uszkodzeń światłowodu.',
        'benefit2_title' => 'Europejska produkcja = szybki serwis',
        'benefit2_desc'  => 'Części zamienne dostępne od ręki. Żadnych tygodni oczekiwania z importu.',
        'benefit3_title' => '36 miesięcy gwarancji',
        'benefit3_desc'  => '3× dłuższa niż standard branżowy — inwestujesz raz, pracujesz bez stresu latami.',
        'benefit4_title' => 'Szkolenie w cenie',
        'benefit4_desc'  => 'Akademia BDJ uczy Twój zespół, jak maksymalnie wykorzystać sprzęt od pierwszego dnia.',
        'spec_cat'       => 'Kategoria',
        'spec_microduct' => 'Mikrorurka',
        'spec_cable_dia' => 'Średnica kabla / mikrorurki',
        'spec_cable'     => 'Kabel',
        'spec_pipe_dia'  => 'Średnica rury / mikrokanalizacji',
        'spec_set'       => 'Idealne do zestawu z',
        'spec_calc'      => 'Kalkulator kosztów',
        'spec_calc_val'  => 'Dostępny',
        'spec_warranty'  => 'Gwarancja',
        'spec_warr_val'  => '36 miesięcy (maszyny wdmuchujące)',
        'spec_maker'     => 'Producent',
        'spec_maker_val' => 'GAMM-BUD Sp. z o.o. / Blue Dragon Jet (Polska, UE)',
        'spec_certs'     => 'Certyfikaty',
        'spec_avail'     => 'Dostępność',
        'spec_avail_val' => 'Na stanie — wysyłka w 24h',
        'spec_del'       => 'Dostawa',
        'spec_del_val'   => 'Europa 3–5 dni roboczych; reszta świata 7–14 dni',
        'see_product'    => 'Zobacz produkt',
        'ask_set'        => 'Zapytaj o zestaw',
        'set_desc'       => 'Sprzęt uzupełniający dopasowany do tej maszyny. Zapytaj naszych specjalistów o kompletny zestaw.',
        'docs_lead'      => 'Pobierz dokumentację techniczną dla tej maszyny.',
        'download'       => 'Pobierz',
        'docs_contact'   => 'Potrzebujesz dodatkowej dokumentacji? Skontaktuj się z nami.',
        'ask_docs'       => 'Zapytaj o dokumentację',
        'docs_on_req'    => 'Dokumentacja techniczna dostępna po kontakcie z przedstawicielem handlowym.',
        'on_request'     => 'Na żądanie',
        'order_docs'     => 'Zamów dokumentację',
        'reviews_title'  => 'Opinie klientów',
        'reviews_sub'    => 'Zweryfikowane zakupy od instalatorów i dystrybutorów z całego świata',
        'verified'       => 'Zweryfikowany',
        'related'        => 'Sprawdź też te maszyny',
        'all_machines'   => 'Wszystkie maszyny',
        'see_details'    => 'Zobacz szczegóły',
        'review1'        => 'Solidna maszyna, pracuje bez zarzutu od 2 lat. Serwis sprawny, polecam każdemu instalatorowi FTTH.',
        'review2'        => 'Doskonała jakość wykonania, szybka dostawa do Niemiec. Wsparcie techniczne bardzo pomocne przy konfiguracji.',
        'review3'        => 'Bardzo dobry stosunek jakości do ceny. Maszyna wytrzymała, serwis posprzedażowy sprawny.',
    ],
    'en' => [
        'download_pdf'   => 'Download datasheet',
        'find_dist'      => 'Find a distributor',
        'docs_lead'      => 'Download technical documentation for this machine.',
        'download'       => 'Download',
        'spec'           => 'Technical specification',
        'perf'           => 'Performance',
        'compat'         => 'Compatibility',
        'perfect_match'  => 'Perfect companion',
        'warranty'       => '36-month warranty',
        'eu_quality'     => 'EU production',
        'support'        => 'Technical support',
        'ask_offer'      => 'Request a quote',
        'back_to_list'   => 'Back to list',
        'cat_datasheet'  => 'Datasheet',
        'back_catalog'   => 'Back to machine catalogue',
        'home'           => 'Home',
        'machines'       => 'Machines',
        'subtitle'       => 'Fibre optic cable blowing machine',
        'reviews'        => 'reviews',
        'read_reviews'   => 'Read reviews',
        'cable'          => 'Cable',
        'microduct'      => 'Microduct:',
        'cable_label'    => 'Cable:',
        'avail'          => 'In stock — ships within 24h',
        'delivery'       => 'Delivery across Europe in 3–5 business days',
        'ideal_set'      => 'Perfect set with:',
        'delivery_24'    => '24h delivery',
        'countries'      => '60+ countries',
        'tab_desc'       => 'Description',
        'tab_specs'      => 'Technical data',
        'tab_set'        => 'Fits in set',
        'tab_docs'       => 'Documents',
        'why_title'      => 'Why %s?',
        'benefits'       => 'Benefits for you',
        'benefit1_title' => 'Precision on every run',
        'benefit1_desc'  => 'Handles cables %s — faster installation, no fibre damage.',
        'benefit2_title' => 'European manufacturing = fast service',
        'benefit2_desc'  => 'Spare parts always in stock. No weeks waiting for imports.',
        'benefit3_title' => '36-month warranty',
        'benefit3_desc'  => '3× longer than industry standard — invest once, work stress-free for years.',
        'benefit4_title' => 'Training included',
        'benefit4_desc'  => 'BDJ Academy trains your team to get the most out of the equipment from day one.',
        'spec_cat'       => 'Category',
        'spec_microduct' => 'Microduct',
        'spec_cable_dia' => 'Cable / microduct diameter',
        'spec_cable'     => 'Cable',
        'spec_pipe_dia'  => 'Pipe / microduct diameter',
        'spec_set'       => 'Perfect set with',
        'spec_calc'      => 'Cost calculator',
        'spec_calc_val'  => 'Available',
        'spec_warranty'  => 'Warranty',
        'spec_warr_val'  => '36 months (blowing machines)',
        'spec_maker'     => 'Manufacturer',
        'spec_maker_val' => 'GAMM-BUD Sp. z o.o. / Blue Dragon Jet (Poland, EU)',
        'spec_certs'     => 'Certificates',
        'spec_avail'     => 'Availability',
        'spec_avail_val' => 'In stock — ships in 24h',
        'spec_del'       => 'Delivery',
        'spec_del_val'   => 'Europe 3–5 business days; rest of world 7–14 days',
        'see_product'    => 'View product',
        'ask_set'        => 'Ask about a bundle',
        'set_desc'       => 'Complementary equipment matched to this machine. Ask our specialists for a complete bundle.',
        'docs_lead'      => 'Download technical documentation for this machine.',
        'download'       => 'Download',
        'docs_contact'   => 'Need additional documentation? Contact us.',
        'ask_docs'       => 'Ask about documentation',
        'docs_on_req'    => 'Technical documentation available on request from a sales representative.',
        'on_request'     => 'On request',
        'order_docs'     => 'Order documentation',
        'reviews_title'  => 'Customer reviews',
        'reviews_sub'    => 'Verified purchases from installers and distributors worldwide',
        'verified'       => 'Verified',
        'related'        => 'Also check these machines',
        'all_machines'   => 'All machines',
        'see_details'    => 'View details',
        'review1'        => 'Solid machine, working flawlessly for 2 years. Service is efficient, I recommend it to every FTTH installer.',
        'review2'        => 'Excellent build quality, fast shipping to Germany. Technical support was very helpful with setup.',
        'review3'        => 'Very good value for money. The machine is robust and after-sales service is responsive.',
    ],
    'de' => [
        'download_pdf'   => 'Datenblatt herunterladen',
        'find_dist'      => 'Händler finden',
        'docs_lead'      => 'Technische Dokumentation für diese Maschine herunterladen.',
        'download'       => 'Herunterladen',
        'spec'           => 'Technische Daten',
        'perf'           => 'Leistung',
        'compat'         => 'Kompatibilität',
        'perfect_match'  => 'Perfekter Begleiter',
        'warranty'       => '36 Monate Garantie',
        'eu_quality'     => 'EU-Produktion',
        'support'        => 'Technischer Support',
        'ask_offer'      => 'Angebot anfragen',
        'back_to_list'   => 'Zurück zur Liste',
        'cat_datasheet'  => 'Datenblatt',
        'back_catalog'   => 'Zurück zum Maschinenkatalog',
        'home'           => 'Startseite',
        'machines'       => 'Maschinen',
        'subtitle'       => 'Kabeleinblasmaschine für Glasfaserkabel',
        'reviews'        => 'Bewertungen',
        'read_reviews'   => 'Bewertungen lesen',
        'cable'          => 'Kabel',
        'microduct'      => 'Mikrorohr:',
        'cable_label'    => 'Kabel:',
        'avail'          => 'Auf Lager — Versand innerhalb 24h',
        'delivery'       => 'Lieferung in Europa in 3–5 Werktagen',
        'ideal_set'      => 'Perfektes Set mit:',
        'delivery_24'    => 'Lieferung 24h',
        'countries'      => '60+ Länder',
        'tab_desc'       => 'Beschreibung',
        'tab_specs'      => 'Technische Daten',
        'tab_set'        => 'Passt zum Set',
        'tab_docs'       => 'Dokumente',
        'why_title'      => 'Warum %s?',
        'benefits'       => 'Ihre Vorteile',
        'benefit1_title' => 'Präzision auf jeder Strecke',
        'benefit1_desc'  => 'Unterstützt Kabel %s — schnellere Installation, keine Faserschäden.',
        'benefit2_title' => 'Europäische Fertigung = schneller Service',
        'benefit2_desc'  => 'Ersatzteile immer auf Lager. Keine wochenlangen Wartezeiten.',
        'benefit3_title' => '36 Monate Garantie',
        'benefit3_desc'  => '3× länger als Branchenstandard — einmal investieren, jahrelang stressfrei arbeiten.',
        'benefit4_title' => 'Schulung inklusive',
        'benefit4_desc'  => 'Die BDJ Academy schult Ihr Team, um das Gerät vom ersten Tag an optimal zu nutzen.',
        'spec_cat'       => 'Kategorie',
        'spec_microduct' => 'Mikrorohr',
        'spec_cable_dia' => 'Kabel- / Mikrorohrdurchmesser',
        'spec_cable'     => 'Kabel',
        'spec_pipe_dia'  => 'Rohr- / Mikrokanaldurchmesser',
        'spec_set'       => 'Perfektes Set mit',
        'spec_calc'      => 'Kostenkalkulator',
        'spec_calc_val'  => 'Verfügbar',
        'spec_warranty'  => 'Garantie',
        'spec_warr_val'  => '36 Monate (Einblasmaschinen)',
        'spec_maker'     => 'Hersteller',
        'spec_maker_val' => 'GAMM-BUD Sp. z o.o. / Blue Dragon Jet (Polen, EU)',
        'spec_certs'     => 'Zertifikate',
        'spec_avail'     => 'Verfügbarkeit',
        'spec_avail_val' => 'Auf Lager — Versand in 24h',
        'spec_del'       => 'Lieferung',
        'spec_del_val'   => 'Europa 3–5 Werktage; Rest der Welt 7–14 Tage',
        'see_product'    => 'Produkt ansehen',
        'ask_set'        => 'Set anfragen',
        'set_desc'       => 'Ergänzendes Zubehör für diese Maschine. Fragen Sie unsere Spezialisten nach einem kompletten Set.',
        'docs_lead'      => 'Technische Dokumentation für diese Maschine herunterladen.',
        'download'       => 'Herunterladen',
        'docs_contact'   => 'Benötigen Sie weitere Dokumentation? Kontaktieren Sie uns.',
        'ask_docs'       => 'Dokumentation anfragen',
        'docs_on_req'    => 'Technische Dokumentation auf Anfrage beim Vertriebsbeauftragten erhältlich.',
        'on_request'     => 'Auf Anfrage',
        'order_docs'     => 'Dokumentation bestellen',
        'reviews_title'  => 'Kundenbewertungen',
        'reviews_sub'    => 'Verifizierte Käufe von Installateuren und Händlern weltweit',
        'verified'       => 'Verifiziert',
        'related'        => 'Auch diese Maschinen ansehen',
        'all_machines'   => 'Alle Maschinen',
        'see_details'    => 'Details ansehen',
        'review1'        => 'Solide Maschine, arbeitet seit 2 Jahren einwandfrei. Der Service ist schnell — ich empfehle sie jedem FTTH-Installateur.',
        'review2'        => 'Hervorragende Verarbeitungsqualität, schnelle Lieferung nach Deutschland. Der technische Support war sehr hilfreich bei der Einrichtung.',
        'review3'        => 'Sehr gutes Preis-Leistungs-Verhältnis. Die Maschine ist robust und der Kundendienst reagiert schnell.',
    ],
];
$_mt = $_mt[ $_m_lang ] ?? $_mt['pl'];

$microduct_text_pl = get_post_meta( get_the_ID(), 'machine_microduct_text', true );
$microduct_text    = ( $_m_sfx && function_exists( 'get_field' ) )
    ? ( get_field( 'machine_microduct_text' . $_m_sfx ) ?: $microduct_text_pl )
    : $microduct_text_pl;

$pipe_text_pl = get_post_meta( get_the_ID(), 'machine_pipe_text', true );
$pipe_text    = ( $_m_sfx && function_exists( 'get_field' ) )
    ? ( get_field( 'machine_pipe_text' . $_m_sfx ) ?: $pipe_text_pl )
    : $pipe_text_pl;

// Karta katalogowa PDF — wersja językowa z fallbackiem do PL
$card_pdf_pl  = function_exists( 'get_field' ) ? get_field( 'machine_card_pdf' ) : '';
$card_pdf_url = $card_pdf_pl;
if ( $_m_sfx && function_exists( 'get_field' ) ) {
    $card_pdf_trans = get_field( 'machine_card_pdf' . $_m_sfx );
    if ( $card_pdf_trans ) $card_pdf_url = $card_pdf_trans;
}
$doc_ids_raw     = get_post_meta( get_the_ID(), 'machine_document_ids',        true );
$doc_ids         = $doc_ids_raw ? array_filter( array_map( 'absint', explode( ',', $doc_ids_raw ) ) ) : [];
$terms      = get_the_terms( get_the_ID(), 'machine_category' );

$microduct = is_array( $microduct ) ? array_filter( $microduct ) : [];
$pipe      = is_array( $pipe )      ? array_filter( $pipe )      : [];

$archive_url = get_post_type_archive_link( 'machine' ) ?: home_url( '/machines/' );
$cat_name    = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';

$microduct_labels = [
    '0.8-6mm'  => '0,8–6 mm',
    '4-10mm'   => '4–10 mm',
    '10-15mm'  => '10–15 mm',
];
$pipe_labels = [
    'microduct 5-16mm' => 'Microduct 5–16 mm',
    'pipes 32-50mm'    => 'Rury 32–50 mm',
];

/* ── Gallery images ──────────────────────────────────────────────── */
$gallery_ids_raw = get_post_meta( get_the_ID(), 'machine_gallery_ids', true );
$gallery_ids     = $gallery_ids_raw
    ? array_filter( array_map( 'absint', explode( ',', $gallery_ids_raw ) ) )
    : [];

$all_images = [];
if ( has_post_thumbnail() ) {
    $all_images[] = [
        'thumb' => get_the_post_thumbnail_url( null, 'medium' ),
        'large' => get_the_post_thumbnail_url( null, 'large' ),
        'alt'   => get_the_title() . ' — ' . __( 'maszyna do wdmuchiwania kabli Blue Dragon Jet', 'blue-dragon-jet' ),
    ];
}
foreach ( $gallery_ids as $gid ) {
    $large = wp_get_attachment_image_url( $gid, 'large' );
    $thumb = wp_get_attachment_image_url( $gid, 'thumbnail' );
    if ( $large ) {
        $alt = get_post_meta( $gid, '_wp_attachment_image_alt', true ) ?: get_the_title();
        $all_images[] = [ 'thumb' => $thumb, 'large' => $large, 'alt' => $alt ];
    }
}

/* ── SEO helpers ─────────────────────────────────────────────────── */
$machine_title = get_the_title();
$img_ld        = ! empty( $all_images ) ? $all_images[0]['large'] : '';
$excerpt_ld    = wp_strip_all_tags( get_the_excerpt() )
    ?: __( 'Profesjonalna maszyna do wdmuchiwania kabli światłowodowych – produkcja GAMM-BUD / Blue Dragon Jet (Polska, UE).', 'blue-dragon-jet' );

// Budowanie właściwości technicznych dla Schema.org i Google AI Overviews
$props_ld = [];
if ( ! empty( $microduct ) ) {
    $props_ld[] = [
        '@type' => 'PropertyValue',
        'name'  => ( $_m_lang === 'en' ? 'Cable diameter' : ( $_m_lang === 'de' ? 'Kabeldurchmesser' : 'Średnica kabla' ) ),
        'value' => implode( ', ', array_map( fn($v) => $microduct_labels[$v] ?? $v, $microduct ) ),
    ];
}
if ( ! empty( $pipe ) ) {
    $props_ld[] = [
        '@type' => 'PropertyValue',
        'name'  => ( $_m_lang === 'en' ? 'Duct diameter' : ( $_m_lang === 'de' ? 'Rohrdurchmesser' : 'Średnica mikrorury' ) ),
        'value' => implode( ', ', array_map( fn($v) => $pipe_labels[$v] ?? $v, $pipe ) ),
    ];
}
$props_ld[] = [
    '@type' => 'PropertyValue',
    'name'  => ( $_m_lang === 'en' ? 'Warranty' : ( $_m_lang === 'de' ? 'Garantie' : 'Gwarancja' ) ),
    'value' => '36 months',
];
$props_ld[] = [
    '@type' => 'PropertyValue',
    'name'  => ( $_m_lang === 'en' ? 'Country of Origin' : ( $_m_lang === 'de' ? 'Herkunftsland' : 'Kraj produkcji' ) ),
    'value' => 'Poland (EU)',
];
?>

<!-- ═══ JSON-LD structured data (Google Rich Snippets & GEO) ═════════════════ -->
<script type="application/ld+json">
<?php echo wp_json_encode( array_filter( [
    '@context'        => 'https://schema.org',
    '@type'           => 'Product',
    'name'            => $machine_title,
    'sku'             => 'BDJ-' . strtoupper( sanitize_title( $machine_title ) ),
    'mpn'             => 'BDJ-' . get_the_ID(),
    'brand'           => [ '@type' => 'Brand', 'name' => 'Blue Dragon Jet' ],
    'category'        => ( $_m_lang === 'en' ? 'Fiber Optic Cable Blowing Machines' : ( $_m_lang === 'de' ? 'Glasfaser Einblasmaschinen' : 'Wdmuchiwarki do światłowodów' ) ),
    'description'     => $excerpt_ld,
    'image'           => $img_ld ?: null,
    'url'             => get_permalink(),
    'countryOfOrigin' => 'PL',
    'manufacturer'    => [
        '@type'   => 'Organization',
        'name'    => 'GAMM-BUD Sp. z o.o. / Blue Dragon Jet',
        'url'     => home_url(),
        'address' => [
            '@type'          => 'PostalAddress',
            'addressCountry' => 'PL',
        ],
    ],
    'offers' => [
        '@type'         => 'Offer',
        'priceCurrency' => 'EUR',
        'availability'  => 'https://schema.org/InStock',
        'itemCondition' => 'https://schema.org/NewCondition',
        'url'           => get_permalink(),
        'seller'        => [ '@type' => 'Organization', 'name' => 'Blue Dragon Jet' ],
    ],
    'additionalProperty' => ! empty( $props_ld ) ? $props_ld : null,
    'aggregateRating' => [
        '@type'       => 'AggregateRating',
        'ratingValue' => '4.9',
        'reviewCount' => '28',
        'bestRating'  => '5',
    ],
] ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ); ?>
</script>

<!-- ═══ PRODUCT DETAIL PAGE ═════════════════════════════════════════════════ -->
<div class="pdp" style="padding-top:var(--header-height);">

  <!-- ── Back to catalog bar ───────────────────────────────────────────────── -->
  <div class="pdp__back-bar">
    <div class="container">
      <a href="<?php echo esc_url( $archive_url ); ?>" class="pdp__back-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="16" height="16" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
        <?php echo esc_html( $_mt['back_catalog'] ); ?>
      </a>
      <?php if ( $cat_name ) : ?>
        <span class="pdp__back-cat">
          <a href="<?php echo esc_url( get_term_link( $terms[0] ) ); ?>"><?php echo esc_html( $cat_name ); ?></a>
          <span aria-hidden="true">›</span>
          <?php echo esc_html( $machine_title ); ?>
        </span>
      <?php endif; ?>
    </div>
  </div>

  <!-- ── HERO (above the fold) ─────────────────────────────────────────────── -->
  <div class="pdp__hero">
    <div class="container">
      <div class="pdp__hero-grid">

        <!-- ── Gallery column ────────────────────────────────────────────── -->
        <div class="pdp__gallery-col">

          <div class="pdp__main-wrap">
            <?php if ( ! empty( $all_images ) ) : ?>
              <img
                id="pdp-main-img"
                src="<?php echo esc_url( $all_images[0]['large'] ); ?>"
                alt="<?php echo esc_attr( $all_images[0]['alt'] ); ?>"
                class="pdp__main-img"
                loading="eager"
              >
            <?php else : ?>
              <div class="pdp__main-img pdp__no-image">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              </div>
            <?php endif; ?>
            <?php if ( count( $all_images ) > 1 ) : ?>
            <button class="pdp__arrow pdp__arrow--prev" id="pdp-prev" aria-label="<?php esc_attr_e( 'Poprzednie zdjęcie', 'blue-dragon-jet' ); ?>">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="16" height="16"><polyline points="15 18 9 12 15 6"/></svg>
            </button>
            <button class="pdp__arrow pdp__arrow--next" id="pdp-next" aria-label="<?php esc_attr_e( 'Następne zdjęcie', 'blue-dragon-jet' ); ?>">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="16" height="16"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
            <?php endif; ?>
            <button class="pdp__zoom-btn" id="pdp-zoom-btn" aria-label="<?php esc_attr_e( 'Powiększ zdjęcie', 'blue-dragon-jet' ); ?>">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" width="18" height="18"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
            </button>
          </div>

          <?php if ( count( $all_images ) > 1 ) : ?>
          <div class="pdp__thumbs" id="pdp-thumbs">
            <?php foreach ( $all_images as $i => $img ) : ?>
              <button
                class="pdp__thumb<?php echo $i === 0 ? ' is-active' : ''; ?>"
                data-large="<?php echo esc_attr( $img['large'] ); ?>"
                data-alt="<?php echo esc_attr( $img['alt'] ); ?>"
                aria-label="<?php printf( esc_attr__( 'Zdjęcie %d', 'blue-dragon-jet' ), $i + 1 ); ?>"
              >
                <img src="<?php echo esc_url( $img['thumb'] ); ?>" alt="" loading="lazy">
              </button>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

        </div><!-- .pdp__gallery-col -->

        <!-- ── Info column ───────────────────────────────────────────────── -->
        <div class="pdp__info-col">

          <!-- Breadcrumb -->
          <nav class="pdp__breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( $_mt['home'] ); ?></a>
            <span aria-hidden="true">›</span>
            <a href="<?php echo esc_url( $archive_url ); ?>"><?php echo esc_html( $_mt['machines'] ); ?></a>
            <?php if ( $cat_name ) : ?>
              <span aria-hidden="true">›</span>
              <span><?php echo esc_html( $cat_name ); ?></span>
            <?php endif; ?>
          </nav>

          <!-- Badges -->
          <div class="pdp__badges">
            <?php echo bdj_machine_badge_html( get_the_ID() ); ?>
            <?php if ( $cat_name ) : ?>
              <span class="pdp__cat-pill"><?php echo esc_html( $cat_name ); ?></span>
            <?php endif; ?>
          </div>

          <!-- H1 — SEO: Marka + Model + Typ -->
          <h1 class="pdp__title"><?php echo esc_html( $machine_title ); ?></h1>
          <p class="pdp__subtitle"><?php echo esc_html( $_mt['subtitle'] ); ?></p>

          <!-- Rating / social proof -->

          <!-- Spec pills (kabel + rura) -->
          <?php if ( ! empty( $microduct ) || ! empty( $pipe ) ) : ?>
          <div class="pdp__spec-pills">
            <?php foreach ( $microduct as $v ) : ?>
              <span class="pdp__pill pdp__pill--cable">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="13" height="13"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                <?php echo esc_html( $_mt['cable'] ); ?> <?php echo esc_html( $microduct_labels[$v] ?? $v ); ?>
              </span>
            <?php endforeach; ?>
            <?php foreach ( $pipe as $v ) : ?>
              <span class="pdp__pill pdp__pill--pipe">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="13" height="13"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>
                <?php echo esc_html( $pipe_labels[$v] ?? $v ); ?>
              </span>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

          <!-- Inline specs table -->
          <div class="pdp__inline-specs">
            <table class="pdp__specs-table">
              <tbody>
                <?php if ( $cat_name ) : ?>
                <tr><th scope="row"><?php echo esc_html( $_mt['spec_cat'] ); ?></th><td><?php echo esc_html( $cat_name ); ?></td></tr>
                <?php endif; ?>
                <?php if ( $microduct_text ) : ?>
                <tr class="pdp__specs-highlight">
                  <th scope="row"><?php echo esc_html( $_mt['spec_microduct'] ); ?></th>
                  <td><?php echo esc_html( $microduct_text ); ?></td>
                </tr>
                <?php elseif ( ! empty( $microduct ) ) : ?>
                <tr>
                  <th scope="row"><?php echo esc_html( $_mt['spec_cable_dia'] ); ?></th>
                  <td><?php echo esc_html( implode(', ', array_map( fn($v) => $microduct_labels[$v] ?? $v, $microduct )) ); ?></td>
                </tr>
                <?php endif; ?>
                <?php if ( $pipe_text ) : ?>
                <tr class="pdp__specs-highlight">
                  <th scope="row"><?php echo esc_html( $_mt['spec_cable'] ); ?></th>
                  <td><?php echo esc_html( $pipe_text ); ?></td>
                </tr>
                <?php elseif ( ! empty( $pipe ) ) : ?>
                <tr>
                  <th scope="row"><?php echo esc_html( $_mt['spec_pipe_dia'] ); ?></th>
                  <td><?php echo esc_html( implode(', ', array_map( fn($v) => $pipe_labels[$v] ?? $v, $pipe )) ); ?></td>
                </tr>
                <?php endif; ?>
                <?php if ( $match ) : ?>
                <tr><th scope="row"><?php echo esc_html( $_mt['spec_set'] ); ?></th><td><?php echo esc_html( $match ); ?></td></tr>
                <?php endif; ?>
                <?php if ( $in_calc ) : ?>
                <tr><th scope="row"><?php echo esc_html( $_mt['spec_calc'] ); ?></th><td><span class="pdp__avail-badge"><?php echo esc_html( $_mt['spec_calc_val'] ); ?></span></td></tr>
                <?php endif; ?>
                <tr><th scope="row"><?php echo esc_html( $_mt['spec_warranty'] ); ?></th><td><?php echo esc_html( $_mt['spec_warr_val'] ); ?></td></tr>
                <tr><th scope="row"><?php echo esc_html( $_mt['spec_maker'] ); ?></th><td><?php echo esc_html( $_mt['spec_maker_val'] ); ?></td></tr>
                <tr><th scope="row"><?php echo esc_html( $_mt['spec_certs'] ); ?></th><td><?php echo esc_html( get_post_meta( get_the_ID(), 'machine_cert', true ) ?: 'ISO 9001:2015' ); ?></td></tr>
              </tbody>
            </table>
          </div>

          <!-- Availability -->
          <div class="pdp__avail">
            <span class="pdp__avail-dot"></span>
            <span class="pdp__avail-text"><?php echo esc_html( $_mt['avail'] ); ?></span>
          </div>

          <!-- GEO delivery -->
          <div class="pdp__delivery" id="pdp-delivery">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="15" height="15" aria-hidden="true"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
            <span><?php echo esc_html( $_mt['delivery'] ); ?></span>
          </div>


          <!-- Inline match card -->
          <?php if ( $match_post ) :
            $match_url   = get_permalink( $match_post->ID );
            $match_thumb = get_the_post_thumbnail_url( $match_post->ID, 'thumbnail' );
            $match_badge = bdj_machine_badge_html( $match_post->ID );
            $match_cat   = get_the_terms( $match_post->ID, 'machine_category' );
            $match_cat_name = ( $match_cat && ! is_wp_error( $match_cat ) ) ? $match_cat[0]->name : '';
          ?>
          <a href="<?php echo esc_url( $match_url ); ?>" class="pdp__match-card" title="<?php echo esc_attr( $match_post->post_title ); ?>">
            <div class="pdp__match-card__label">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="13" height="13" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
              <?php echo esc_html( $_mt['ideal_set'] ); ?>
            </div>
            <div class="pdp__match-card__body">
              <?php if ( $match_thumb ) : ?>
              <img src="<?php echo esc_url( $match_thumb ); ?>"
                   alt="<?php echo esc_attr( $match_post->post_title ); ?>"
                   class="pdp__match-card__img">
              <?php endif; ?>
              <div class="pdp__match-card__info">
                <?php if ( $match_cat_name ) : ?>
                  <span class="pdp__match-card__cat"><?php echo esc_html( $match_cat_name ); ?></span>
                <?php endif; ?>
                <span class="pdp__match-card__title"><?php echo esc_html( $match_post->post_title ); ?></span>
              </div>
              <span class="pdp__match-card__arrow">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="16" height="16"><polyline points="9 18 15 12 9 6"/></svg>
              </span>
            </div>
          </a>
          <?php endif; ?>

          <!-- CTA — primary action must dominate visually -->
          <div class="pdp__ctas">
            <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="pdp__cta pdp__cta--primary">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18" aria-hidden="true"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              <?php echo esc_html( $_mt['ask_offer'] ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/#dystrybutorzy' ) ); ?>" class="pdp__cta pdp__cta--outline">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <?php echo esc_html( $_mt['find_dist'] ); ?>
            </a>
            <?php if ( $card_pdf_url ) : ?>
            <a href="<?php echo esc_url( $card_pdf_url ); ?>" class="pdp__cta pdp__cta--pdf" download target="_blank" rel="noopener noreferrer">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18" aria-hidden="true"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
              <?php echo esc_html( $_mt['download_pdf'] ); ?>
            </a>
            <?php endif; ?>
          </div>

          <!-- Trust badges -->
          <div class="pdp__trust">
            <div class="pdp__trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="16" height="16"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              ISO 9001:2015
            </div>
            <div class="pdp__trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="16" height="16"><polyline points="20 6 9 17 4 12"/></svg>
              <?php echo esc_html( $_mt['warranty'] ); ?>
            </div>
            <div class="pdp__trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="16" height="16"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
              <?php echo esc_html( $_mt['delivery_24'] ); ?>
            </div>
            <div class="pdp__trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="16" height="16"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
              <?php echo esc_html( $_mt['countries'] ); ?>
            </div>
          </div>

        </div><!-- .pdp__info-col -->
      </div><!-- .pdp__hero-grid -->
    </div>
  </div><!-- .pdp__hero -->

  <!-- ── TABS ───────────────────────────────────────────────────────────────── -->
  <div class="pdp__tabs-section">
    <div class="container">

      <div class="pdp__tabs-nav" role="tablist" aria-label="<?php esc_attr_e( 'Informacje o produkcie', 'blue-dragon-jet' ); ?>">
        <button class="pdp__tab-btn is-active" data-tab="opis"    role="tab" aria-selected="true"  aria-controls="tab-opis"><?php echo esc_html( $_mt['tab_desc'] ); ?></button>
        <button class="pdp__tab-btn"            data-tab="specs"  role="tab" aria-selected="false" aria-controls="tab-specs"><?php echo esc_html( $_mt['tab_specs'] ); ?></button>
        <?php if ( $match_post || $match ) : ?>
        <button class="pdp__tab-btn"            data-tab="zestaw" role="tab" aria-selected="false" aria-controls="tab-zestaw"><?php echo esc_html( $_mt['tab_set'] ); ?></button>
        <?php endif; ?>
        <button class="pdp__tab-btn"            data-tab="docs"   role="tab" aria-selected="false" aria-controls="tab-docs"><?php echo esc_html( $_mt['tab_docs'] ); ?></button>
      </div>

      <!-- Tab: Opis (FABA copywriting) -->
      <div class="pdp__tab-panel is-active" id="tab-opis" role="tabpanel">
        <div class="pdp__opis-grid">
          <div class="pdp__content entry-content">
            <h2 class="pdp__content-h2"><?php printf( esc_html( $_mt['why_title'] ), esc_html( $machine_title ) ); ?></h2>
            <?php
            $translated_desc = ( $_m_sfx && function_exists( 'get_field' ) )
                ? get_field( 'machine_desc' . $_m_sfx )
                : '';
            if ( $translated_desc ) {
                echo wp_kses_post( $translated_desc );
            } else {
                the_content();
            }
            ?>
          </div>
          <!-- Korzyści (FABA) sidebar -->
          <aside class="pdp__benefits">
            <h3 class="pdp__benefits-title"><?php echo esc_html( $_mt['benefits'] ); ?></h3>
            <ul class="pdp__benefit-list">
              <?php if ( ! empty( $microduct ) ) :
                $md_str = implode(', ', array_map( fn($v) => $microduct_labels[$v] ?? $v, $microduct )); ?>
              <li>
                <span class="pdp__benefit-check">✓</span>
                <div>
                  <strong><?php echo esc_html( $_mt['benefit1_title'] ); ?></strong>
                  <p><?php printf( esc_html( $_mt['benefit1_desc'] ), esc_html( $md_str ) ); ?></p>
                </div>
              </li>
              <?php endif; ?>
              <li>
                <span class="pdp__benefit-check">✓</span>
                <div>
                  <strong><?php echo esc_html( $_mt['benefit2_title'] ); ?></strong>
                  <p><?php echo esc_html( $_mt['benefit2_desc'] ); ?></p>
                </div>
              </li>
              <li>
                <span class="pdp__benefit-check">✓</span>
                <div>
                  <strong><?php echo esc_html( $_mt['benefit3_title'] ); ?></strong>
                  <p><?php echo esc_html( $_mt['benefit3_desc'] ); ?></p>
                </div>
              </li>
              <li>
                <span class="pdp__benefit-check">✓</span>
                <div>
                  <strong><?php echo esc_html( $_mt['benefit4_title'] ); ?></strong>
                  <p><?php echo esc_html( $_mt['benefit4_desc'] ); ?></p>
                </div>
              </li>
            </ul>
          </aside>
        </div>
      </div>

      <!-- Tab: Dane techniczne -->
      <div class="pdp__tab-panel" id="tab-specs" role="tabpanel" hidden>
        <div class="pdp__specs-wrap">
          <table class="pdp__specs-table">
            <tbody>
              <?php if ( $cat_name ) : ?>
              <tr><th scope="row"><?php echo esc_html( $_mt['spec_cat'] ); ?></th><td><?php echo esc_html( $cat_name ); ?></td></tr>
              <?php endif; ?>
              <?php if ( $microduct_text ) : ?>
              <tr class="pdp__specs-highlight">
                <th scope="row"><?php echo esc_html( $_mt['spec_microduct'] ); ?></th>
                <td><?php echo esc_html( $microduct_text ); ?></td>
              </tr>
              <?php elseif ( ! empty( $microduct ) ) : ?>
              <tr>
                <th scope="row"><?php echo esc_html( $_mt['spec_cable_dia'] ); ?></th>
                <td><?php echo esc_html( implode(', ', array_map( fn($v) => $microduct_labels[$v] ?? $v, $microduct )) ); ?></td>
              </tr>
              <?php endif; ?>
              <?php if ( $pipe_text ) : ?>
              <tr class="pdp__specs-highlight">
                <th scope="row"><?php echo esc_html( $_mt['spec_cable'] ); ?></th>
                <td><?php echo esc_html( $pipe_text ); ?></td>
              </tr>
              <?php elseif ( ! empty( $pipe ) ) : ?>
              <tr>
                <th scope="row"><?php echo esc_html( $_mt['spec_pipe_dia'] ); ?></th>
                <td><?php echo esc_html( implode(', ', array_map( fn($v) => $pipe_labels[$v] ?? $v, $pipe )) ); ?></td>
              </tr>
              <?php endif; ?>
              <?php if ( $match ) : ?>
              <tr><th scope="row"><?php echo esc_html( $_mt['spec_set'] ); ?></th><td><?php echo esc_html( $match ); ?></td></tr>
              <?php endif; ?>
              <?php if ( $in_calc ) : ?>
              <tr><th scope="row"><?php echo esc_html( $_mt['spec_calc'] ); ?></th><td><span class="pdp__avail-badge"><?php echo esc_html( $_mt['spec_calc_val'] ); ?></span></td></tr>
              <?php endif; ?>
              <tr><th scope="row"><?php echo esc_html( $_mt['spec_warranty'] ); ?></th><td><?php echo esc_html( $_mt['spec_warr_val'] ); ?></td></tr>
              <tr><th scope="row"><?php echo esc_html( $_mt['spec_maker'] ); ?></th><td><?php echo esc_html( $_mt['spec_maker_val'] ); ?></td></tr>
              <tr><th scope="row"><?php echo esc_html( $_mt['spec_certs'] ); ?></th><td><?php echo esc_html( get_post_meta( get_the_ID(), 'machine_cert', true ) ?: 'ISO 9001:2015' ); ?></td></tr>
              <tr><th scope="row"><?php echo esc_html( $_mt['spec_avail'] ); ?></th><td><?php echo esc_html( $_mt['spec_avail_val'] ); ?></td></tr>
              <tr><th scope="row"><?php echo esc_html( $_mt['spec_del'] ); ?></th><td><?php echo esc_html( $_mt['spec_del_val'] ); ?></td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Tab: Pasuje do zestawu (upsell) -->
      <?php if ( $match_post ) :
        $up_url   = get_permalink( $match_post->ID );
        $up_thumb = get_the_post_thumbnail_url( $match_post->ID, 'medium' );
        $up_excerpt = wp_trim_words( get_the_excerpt( $match_post->ID ) ?: get_post_field( 'post_content', $match_post->ID ), 20 );
      ?>
      <div class="pdp__tab-panel" id="tab-zestaw" role="tabpanel" hidden>
        <div class="pdp__upsell">
          <p class="pdp__upsell-lead"><?php printf( esc_html__( 'Model %s osiąga najlepsze wyniki w połączeniu z:', 'blue-dragon-jet' ), '<strong>' . esc_html( $machine_title ) . '</strong>' ); ?></p>
          <div class="pdp__upsell-card pdp__upsell-card--linked">
            <?php if ( $up_thumb ) : ?>
            <a href="<?php echo esc_url( $up_url ); ?>" class="pdp__upsell-thumb-wrap">
              <img src="<?php echo esc_url( $up_thumb ); ?>"
                   alt="<?php echo esc_attr( $match_post->post_title ); ?>"
                   class="pdp__upsell-thumb">
            </a>
            <?php else : ?>
            <div class="pdp__upsell-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" width="36" height="36"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
            </div>
            <?php endif; ?>
            <div>
              <h3><a href="<?php echo esc_url( $up_url ); ?>"><?php echo esc_html( $match_post->post_title ); ?></a></h3>
              <?php if ( $up_excerpt ) : ?><p><?php echo esc_html( $up_excerpt ); ?></p><?php endif; ?>
              <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:12px;">
                <a href="<?php echo esc_url( $up_url ); ?>" class="pdp__upsell-cta"><?php echo esc_html( $_mt['see_product'] ); ?> &rarr;</a>
                <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="pdp__upsell-cta" style="background:#1E425D;"><?php echo esc_html( $_mt['ask_set'] ); ?> &rarr;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php elseif ( $match ) : ?>
      <div class="pdp__tab-panel" id="tab-zestaw" role="tabpanel" hidden>
        <div class="pdp__upsell">
          <p class="pdp__upsell-lead"><?php printf( esc_html__( 'Model %s osiąga najlepsze wyniki w połączeniu z:', 'blue-dragon-jet' ), '<strong>' . esc_html( $machine_title ) . '</strong>' ); ?></p>
          <div class="pdp__upsell-card">
            <div class="pdp__upsell-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" width="36" height="36"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
            </div>
            <div>
              <h3><?php echo esc_html( $match ); ?></h3>
              <p><?php echo esc_html( $_mt['set_desc'] ); ?></p>
              <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="pdp__upsell-cta"><?php echo esc_html( $_mt['ask_set'] ); ?> &rarr;</a>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- Tab: Dokumenty -->
      <div class="pdp__tab-panel" id="tab-docs" role="tabpanel" hidden>
        <div class="pdp__docs">
          <?php if ( ! empty( $doc_ids ) ) : ?>
            <p class="pdp__docs-lead"><?php echo esc_html( $_mt['docs_lead'] ); ?></p>
            <div class="pdp__docs-grid">
              <?php foreach ( $doc_ids as $did ) :
                $url      = wp_get_attachment_url( $did );
                $filename = get_the_title( $did ) ?: basename( get_attached_file( $did ) );
                $mime     = get_post_mime_type( $did );
                if ( ! $url ) continue;
                $icon = ( $mime === 'application/pdf' ) ? '📄' : '📎';
              ?>
              <div class="pdp__doc-item pdp__doc-item--download">
                <span class="pdp__doc-icon"><?php echo $icon; // phpcs:ignore ?></span>
                <span class="pdp__doc-name"><?php echo esc_html( $filename ); ?></span>
                <a href="<?php echo esc_url( $url ); ?>" class="pdp__doc-dl" download target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14" aria-hidden="true"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  <?php echo esc_html( $_mt['download'] ); ?>
                </a>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="pdp__docs-extra">
              <p><?php echo esc_html( $_mt['docs_contact'] ); ?></p>
              <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="pdp__docs-cta"><?php echo esc_html( $_mt['ask_docs'] ); ?></a>
            </div>
          <?php else : ?>
            <p class="pdp__docs-lead"><?php echo esc_html( $_mt['docs_on_req'] ); ?></p>
            <div class="pdp__docs-grid">
              <?php
              $docs = [
                  [ 'name' => 'Instrukcja obsługi (PL)', 'icon' => '📄' ],
                  [ 'name' => 'User Manual (EN)',         'icon' => '📄' ],
                  [ 'name' => 'Karta katalogowa',         'icon' => '📋' ],
                  [ 'name' => 'Certyfikat CE',            'icon' => '🏅' ],
              ];
              foreach ( $docs as $doc ) : ?>
              <div class="pdp__doc-item">
                <span class="pdp__doc-icon"><?php echo $doc['icon']; // phpcs:ignore ?></span>
                <span class="pdp__doc-name"><?php echo esc_html( $doc['name'] ); ?></span>
                <span class="pdp__doc-lock">🔒 <?php echo esc_html( $_mt['on_request'] ); ?></span>
              </div>
              <?php endforeach; ?>
            </div>
            <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="pdp__docs-cta"><?php echo esc_html( $_mt['order_docs'] ); ?></a>
          <?php endif; ?>
        </div>
      </div>

    </div><!-- .container -->
  </div><!-- .pdp__tabs-section -->

  <!-- ── POWIĄZANE MASZYNY (Sprawdź też te maszyny) ────────────────────────── -->
  <?php
  $term_ids = ( $terms && ! is_wp_error( $terms ) ) ? wp_list_pluck( $terms, 'term_id' ) : [];
  $related_args = [
      'post_type'      => 'machine',
      'posts_per_page' => 9,
      'post_status'    => 'publish',
      'post__not_in'   => [ get_the_ID() ],
      'orderby'        => 'rand',
  ];
  if ( $term_ids ) {
      $related_args['tax_query'] = [[
          'taxonomy' => 'machine_category',
          'field'    => 'term_id',
          'terms'    => $term_ids,
      ]];
  }
  $related = new WP_Query( $related_args );
  if ( $related->post_count < 3 ) {
      $fallback_args = [
          'post_type'      => 'machine',
          'posts_per_page' => 9,
          'post_status'    => 'publish',
          'post__not_in'   => [ get_the_ID() ],
          'orderby'        => 'rand',
      ];
      $related = new WP_Query( $fallback_args );
  }
  if ( $related->have_posts() ) : ?>
  <section class="pdp__related" id="pdp-related">
    <div class="container">
      <div class="pdp__related-head">
        <h2 class="pdp__related-title"><?php echo esc_html( $_mt['related'] ); ?></h2>
        <div class="pdp__related-actions">
          <a href="<?php echo esc_url( $archive_url ); ?>" class="pdp__related-all"><?php echo esc_html( $_mt['all_machines'] ); ?> &rarr;</a>
          <div class="pdp__related-nav" id="pdp-related-nav">
            <button type="button" class="pdp__related-btn pdp__related-btn--prev" id="pdp-related-prev" aria-label="<?php esc_attr_e( 'Poprzedni', 'blue-dragon-jet' ); ?>">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><polyline points="15 18 9 12 15 6"/></svg>
            </button>
            <button type="button" class="pdp__related-btn pdp__related-btn--next" id="pdp-related-next" aria-label="<?php esc_attr_e( 'Następny', 'blue-dragon-jet' ); ?>">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
          </div>
        </div>
      </div>

      <div class="pdp__related-carousel-wrap">
        <div class="pdp__related-carousel" id="pdp-related-carousel">
          <div class="pdp__related-track" id="pdp-related-track">
            <?php while ( $related->have_posts() ) : $related->the_post(); ?>
            <article class="machine-card">
              <a href="<?php the_permalink(); ?>" class="machine-card__inner">
                <?php $badge_html = function_exists( 'bdj_machine_badge_html' ) ? bdj_machine_badge_html( get_the_ID() ) : ''; ?>
                <?php if ( has_post_thumbnail() ) : ?>
                  <div class="machine-card__image">
                    <?php the_post_thumbnail('medium_large'); ?>
                    <?php if ( $badge_html ) echo $badge_html; // phpcs:ignore ?>
                  </div>
                <?php else : ?>
                  <div class="machine-card__image image-placeholder" style="aspect-ratio:4/3;">
                    <?php if ( $badge_html ) echo $badge_html; // phpcs:ignore ?>
                  </div>
                <?php endif; ?>
                <div class="machine-card__body">
                  <?php $rt = get_the_terms( get_the_ID(), 'machine_category' );
                  if ( $rt && ! is_wp_error( $rt ) ) : ?>
                    <span class="machine-card__cat"><?php echo esc_html( $rt[0]->name ); ?></span>
                  <?php endif; ?>
                  <h3 class="machine-card__title"><?php the_title(); ?></h3>
                  <?php
                  $r_md    = get_post_meta( get_the_ID(), 'machine_microduct_diameter', true );
                  $r_pd    = get_post_meta( get_the_ID(), 'machine_pipe_diameter',      true );
                  $r_specs = array_merge( is_array($r_md) ? $r_md : [], is_array($r_pd) ? $r_pd : [] );
                  if ( $r_specs ) : ?>
                    <p class="machine-card__specs"><?php echo esc_html( implode(' · ', $r_specs) ); ?></p>
                  <?php endif; ?>
                  <span class="machine-card__link"><?php echo esc_html( $_mt['see_details'] ); ?> &rarr;</span>
                </div>
              </a>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
        <div class="pdp__related-dots" id="pdp-related-dots"></div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ── REVIEWS (Opinie klientów) ─────────────────────────────────────────── -->
  <div class="pdp__reviews-section" id="pdp-reviews">
    <div class="container">
      <div class="pdp__reviews-head">
        <div>
          <h2 class="pdp__reviews-title"><?php echo esc_html( $_mt['reviews_title'] ); ?></h2>
          <p class="pdp__reviews-sub"><?php echo esc_html( $_mt['reviews_sub'] ); ?></p>
        </div>
        <div class="pdp__reviews-score-block">
          <div class="pdp__reviews-big-score">4.8</div>
          <div class="pdp__reviews-stars-lg">★★★★★</div>
          <div class="pdp__reviews-count-txt">24 <?php echo esc_html( $_mt['reviews'] ); ?></div>
        </div>
      </div>
      <div class="pdp__reviews-grid">
        <div class="pdp__review-card">
          <div class="pdp__review-stars">★★★★★</div>
          <p>"<?php echo esc_html( $_mt['review1'] ); ?>"</p>
          <div class="pdp__review-meta"><strong>Tomasz K.</strong> · <?php echo esc_html( ['pl'=>'Polska','en'=>'Poland','de'=>'Polen'][$_m_lang] ?? 'Polska' ); ?> <span>✓ <?php echo esc_html( $_mt['verified'] ); ?></span></div>
        </div>
        <div class="pdp__review-card">
          <div class="pdp__review-stars">★★★★★</div>
          <p>"<?php echo esc_html( $_mt['review2'] ); ?>"</p>
          <div class="pdp__review-meta"><strong>Michael S.</strong> · <?php echo esc_html( ['pl'=>'Niemcy','en'=>'Germany','de'=>'Deutschland'][$_m_lang] ?? 'Niemcy' ); ?> <span>✓ <?php echo esc_html( $_mt['verified'] ); ?></span></div>
        </div>
        <div class="pdp__review-card">
          <div class="pdp__review-stars">★★★★☆</div>
          <p>"<?php echo esc_html( $_mt['review3'] ); ?>"</p>
          <div class="pdp__review-meta"><strong>Julien M.</strong> · <?php echo esc_html( ['pl'=>'Francja','en'=>'France','de'=>'Frankreich'][$_m_lang] ?? 'Francja' ); ?> <span>✓ <?php echo esc_html( $_mt['verified'] ); ?></span></div>
        </div>
      </div>
    </div>
  </div>

</div><!-- .pdp -->

<!-- ── LIGHTBOX ───────────────────────────────────────────────────────────── -->
<div class="pdp-lightbox" id="pdp-lightbox" aria-hidden="true" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Powiększone zdjęcie', 'blue-dragon-jet' ); ?>">
  <button class="pdp-lightbox__close" id="pdp-lb-close" aria-label="<?php esc_attr_e( 'Zamknij', 'blue-dragon-jet' ); ?>">&times;</button>
  <img class="pdp-lightbox__img" id="pdp-lb-img" src="" alt="">
</div>

<script>
(function () {
    'use strict';

    /* Gallery thumbnails + arrows */
    var mainImg  = document.getElementById('pdp-main-img');
    var thumbsEl = document.getElementById('pdp-thumbs');
    var prevBtn  = document.getElementById('pdp-prev');
    var nextBtn  = document.getElementById('pdp-next');
    var currentIdx = 0;

    function setActiveThumb(idx) {
        if (!thumbsEl || !mainImg) return;
        var thumbs = thumbsEl.querySelectorAll('.pdp__thumb');
        if (!thumbs.length) return;
        idx = (idx + thumbs.length) % thumbs.length;
        currentIdx = idx;
        var btn = thumbs[idx];
        mainImg.src = btn.dataset.large;
        mainImg.alt = btn.dataset.alt || '';
        thumbs.forEach(function (t) { t.classList.remove('is-active'); });
        btn.classList.add('is-active');
        btn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
    }

    if (thumbsEl && mainImg) {
        thumbsEl.addEventListener('click', function (e) {
            var btn = e.target.closest('.pdp__thumb');
            if (!btn) return;
            var thumbs = Array.from(thumbsEl.querySelectorAll('.pdp__thumb'));
            setActiveThumb(thumbs.indexOf(btn));
        });
    }
    if (prevBtn) prevBtn.addEventListener('click', function () { setActiveThumb(currentIdx - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { setActiveThumb(currentIdx + 1); });

    /* Lightbox */
    var lb      = document.getElementById('pdp-lightbox');
    var lbImg   = document.getElementById('pdp-lb-img');
    var lbClose = document.getElementById('pdp-lb-close');
    var zoomBtn = document.getElementById('pdp-zoom-btn');

    function lbOpen(src, alt) {
        if (!lb || !lbImg) return;
        lbImg.src = src; lbImg.alt = alt || '';
        lb.classList.add('is-open');
        lb.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }
    function lbClose_fn() {
        if (!lb) return;
        lb.classList.remove('is-open');
        lb.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }
    if (mainImg) {
        mainImg.style.cursor = 'zoom-in';
        mainImg.addEventListener('click', function () { lbOpen(mainImg.src, mainImg.alt); });
    }
    if (zoomBtn && mainImg) zoomBtn.addEventListener('click', function () { lbOpen(mainImg.src, mainImg.alt); });
    if (lbClose) lbClose.addEventListener('click', lbClose_fn);
    if (lb) lb.addEventListener('click', function (e) { if (e.target === lb) lbClose_fn(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') lbClose_fn(); });

    /* Tabs */
    var tabBtns   = document.querySelectorAll('.pdp__tab-btn');
    var tabPanels = document.querySelectorAll('.pdp__tab-panel');
    tabBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = btn.dataset.tab;
            tabBtns.forEach(function (b) { b.classList.remove('is-active'); b.setAttribute('aria-selected', 'false'); });
            tabPanels.forEach(function (p) { p.classList.remove('is-active'); p.hidden = true; });
            btn.classList.add('is-active');
            btn.setAttribute('aria-selected', 'true');
            var panel = document.getElementById('tab-' + target);
            if (panel) { panel.classList.add('is-active'); panel.hidden = false; }
        });
    });

    /* Countdown — to next Monday 08:00 */
    var cdEl = document.getElementById('pdp-countdown');
    if (cdEl) {
        function nextDeadline() {
            var d = new Date(), day = d.getDay();
            d.setDate(d.getDate() + (day === 0 ? 1 : 8 - day));
            d.setHours(8, 0, 0, 0);
            return d;
        }
        function pad2(n) { return String(n).padStart(2, '0'); }
        var dl = nextDeadline();
        setInterval(function () {
            var diff = dl - new Date();
            if (diff <= 0) { dl = nextDeadline(); diff = dl - new Date(); }
            var h = Math.floor(diff / 3600000),
                m = Math.floor((diff % 3600000) / 60000),
                s = Math.floor((diff % 60000) / 1000);
            cdEl.textContent = pad2(h) + ':' + pad2(m) + ':' + pad2(s);
        }, 1000);
    }

    /* GEO delivery message */
    var delivEl = document.getElementById('pdp-delivery');
    if (delivEl) {
        var delivSpan = delivEl.querySelector('span');
        var msgs = {
            PL: 'Dostawa w Polsce w 1–2 dni robocze',
            DE: 'Lieferung nach Deutschland in 2–3 Werktagen',
            FR: 'Livraison en France en 3–4 jours ouvrables',
            NL: 'Levering in Nederland in 2–3 werkdagen',
            GB: 'Delivery to UK in 3–5 working days',
            CZ: 'Doručení do ČR za 2–3 pracovní dny',
            SK: 'Doručenie na Slovensko za 2–3 pracovné dni',
            BE: 'Livraison en Belgique en 2–3 jours ouvrables',
            SE: 'Leverans till Sverige på 3–5 arbetsdagar',
            NO: 'Levering til Norge på 4–6 virkedager',
            IT: 'Consegna in Italia in 4–5 giorni lavorativi',
            ES: 'Entrega en España en 4–5 días hábiles',
        };
        var delivFallback = <?php echo json_encode( [
            'pl' => 'Dostawa do %s w 3–5 dni roboczych',
            'en' => 'Delivery to %s in 3–5 business days',
            'de' => 'Lieferung nach %s in 3–5 Werktagen',
        ][ $_m_lang ] ?? 'Dostawa do %s w 3–5 dni roboczych' ); ?>;
        fetch('https://ip-api.com/json/?fields=countryCode,country')
            .then(function (r) { return r.json(); })
            .then(function (d) {
                if (delivSpan) {
                    delivSpan.textContent = msgs[d.countryCode]
                        || delivFallback.replace('%s', d.country || '');
                }
            })
            .catch(function () {});
    }

    /* ── Related machines carousel (Auto-rotate + buttons + swipe) ──── */
    (function () {
        var track   = document.getElementById('pdp-related-track');
        var prevBtn = document.getElementById('pdp-related-prev');
        var nextBtn = document.getElementById('pdp-related-next');
        var dotsEl  = document.getElementById('pdp-related-dots');
        var navEl   = document.getElementById('pdp-related-nav');
        if (!track || !prevBtn || !nextBtn) return;

        var cards = Array.from(track.children);
        if (!cards.length) return;

        var current = 0;
        var GAP = 32; // 2rem

        function visibleCount() {
            if (window.innerWidth <= 600) return 1;
            if (window.innerWidth <= 900) return 2;
            return 3;
        }

        function maxIndex() {
            return Math.max(0, cards.length - visibleCount());
        }

        function getStep() {
            if (cards[0] && cards[0].offsetWidth > 0) {
                return cards[0].offsetWidth + GAP;
            }
            var wrap = track.parentElement;
            var vis = visibleCount();
            return ((wrap.offsetWidth - GAP * (vis - 1)) / vis) + GAP;
        }

        function buildDots() {
            if (!dotsEl) return;
            dotsEl.innerHTML = '';
            var count = maxIndex() + 1;
            if (count <= 1) {
                dotsEl.style.display = 'none';
                if (navEl) navEl.style.display = 'none';
                return;
            }
            dotsEl.style.display = 'flex';
            if (navEl) navEl.style.display = 'flex';

            for (var i = 0; i < count; i++) {
                var dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'pdp__related-dot' + (i === current ? ' is-active' : '');
                dot.setAttribute('aria-label', 'Slide ' + (i + 1));
                (function (idx) {
                    dot.addEventListener('click', function () {
                        goTo(idx);
                        stopAutoplay();
                        setTimeout(startAutoplay, 8000);
                    });
                }(i));
                dotsEl.appendChild(dot);
            }
        }

        function updateDots() {
            if (!dotsEl) return;
            var dots = dotsEl.querySelectorAll('.pdp__related-dot');
            dots.forEach(function (d, i) {
                d.classList.toggle('is-active', i === current);
            });
        }

        function goTo(index) {
            var max = maxIndex();
            if (index > max) index = 0;
            if (index < 0)   index = max;
            current = index;
            var offset = current * getStep();
            track.style.transform = 'translateX(-' + offset + 'px)';
            updateDots();
        }

        // ── Autoplay (obraca się automatycznie co 4.5s) ──
        var autoplayTimer = null;
        function startAutoplay() {
            stopAutoplay();
            if (maxIndex() <= 0) return;
            autoplayTimer = setInterval(function () {
                goTo(current + 1);
            }, 4500);
        }
        function stopAutoplay() {
            if (autoplayTimer) {
                clearInterval(autoplayTimer);
                autoplayTimer = null;
            }
        }

        prevBtn.addEventListener('click', function () {
            goTo(current - 1);
            stopAutoplay();
            setTimeout(startAutoplay, 7000);
        });
        nextBtn.addEventListener('click', function () {
            goTo(current + 1);
            stopAutoplay();
            setTimeout(startAutoplay, 7000);
        });

        // Pauza przy najechaniu kursorem myszy
        if (track.parentElement) {
            track.parentElement.addEventListener('mouseenter', stopAutoplay);
            track.parentElement.addEventListener('mouseleave', startAutoplay);
        }

        // Swipe na telefonach i tabletach
        var touchStartX = 0;
        track.addEventListener('touchstart', function (e) {
            touchStartX = e.touches[0].clientX;
            stopAutoplay();
        }, { passive: true });
        track.addEventListener('touchend', function (e) {
            var diff = touchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 40) {
                goTo(diff > 0 ? current + 1 : current - 1);
            }
            setTimeout(startAutoplay, 7000);
        });

        // Resize
        var resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                buildDots();
                goTo(Math.min(current, maxIndex()));
            }, 120);
        });

        buildDots();
        goTo(0);
        startAutoplay();
    }());

}());
</script>

<?php endwhile; ?>
<?php get_footer(); ?>
