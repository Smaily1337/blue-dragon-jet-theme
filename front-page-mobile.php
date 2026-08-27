<?php
/**
 * Dedicated Mobile Homepage Template (Wersja Mobilna)
 * Optimized specifically for smartphones: fast, clean, zero horizontal overflow, thumb-friendly touch targets.
 */
get_header();

$_lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';

$_mt = [
    'pl' => [
        'hero_badge'        => '🇪🇺 Europejski Producent Maszyn FTTH',
        'hero_title'        => 'Wdmuchiwarki do kabli światłowodowych',
        'hero_sub'          => 'Polska precyzja inżynieryjna, natychmiastowa wysyłka w 24h i stała dostępność części zamiennych.',
        'btn_catalog'       => 'Zobacz maszyny',
        'btn_ai'            => 'Doradca AI 24/7',
        'badge_eu'          => 'Produkcja w Polsce (UE)',
        'badge_24h'         => 'Wysyłka w 24h',
        'badge_parts'       => 'Części od ręki',
        'badge_train'       => 'Szkolenie w cenie',
        'filter_all'        => 'Wszystkie',
        'filter_flag'       => 'Flagowe',
        'filter_ftth'       => 'Mikrokable FTTH',
        'filter_heavy'      => 'Magistralne',
        'see_machine'       => 'Zobacz szczegóły',
        'quick_quote'       => 'Szybka wycena',
        'ai_card_title'     => 'Nie wiesz jaką maszynę lub uszczelkę wybrać?',
        'ai_card_sub'       => 'Nasz asystent techniczny AI zna parametry każdego kabla, rury i wdmuchiwarki. Odpowiada w 3 sekundy!',
        'ai_chip1'          => 'Jaka maszyna do mikrorurki 7mm?',
        'ai_chip2'          => 'Uszczelka kabla do BDJ MAX',
        'ai_chip3'          => 'Jaki kompresor do BDJ BUDGET?',
        'ai_open_btn'       => 'Porozmawiaj z Doradcą AI ⚡',
        'why_title'         => 'Dlaczego Blue Dragon Jet?',
        'why_1_t'           => 'Wysyłka w 24h',
        'why_1_d'           => 'Ekspresowa dostawa w Polsce i całej Europie bezpośrednio z magazynu.',
        'why_2_t'           => 'Polski Producent (UE)',
        'why_2_d'           => 'Solidna konstrukcja z aluminium lotniczego, bezawaryjność na lata.',
        'why_3_t'           => 'Części stale na stanie',
        'why_3_d'           => 'Oponki, uszczelki mikrorurki, pasy i tulejki wysyłamy od ręki.',
        'why_4_t'           => 'Szkolenie i serwis',
        'why_4_d'           => 'Kompleksowe wdrożenie instalatorów, autoryzowany serwis gwarancyjny.',
        'contact_title'     => 'Potrzebujesz maszyny lub części?',
        'contact_sub'       => 'Nasi doradcy techniczni dobiorą optymalny zestaw do Twoich prac.',
        'call_now'          => 'Zadzwoń do nas teraz',
        'write_email'       => 'Napisz e-mail',
        'faq_title'         => 'Najczęstsze pytania',
        'faq1_q'            => 'Jak szybko otrzymam zamówioną maszynę?',
        'faq1_a'            => 'Większość modeli wdmuchiwarek BDJ oraz akcesoriów posiadamy na stanie magazynowym. Wysyłka następuje w ciągu 24 godzin.',
        'faq2_q'            => 'Czy do maszyny dołączone jest szkolenie?',
        'faq2_a'            => 'Tak! Do każdej zakupionej maszyny oferujemy pełne szkolenie techniczne z zasad bezpiecznego i efektywnego wdmuchiwania kabli.',
        'faq3_q'            => 'Czy kupię u Was uszczelki i części zamienne?',
        'faq3_a'            => 'Oczywiście. Posiadamy pełen asortyment uszczelek kabla, uszczelek rury, tulejek zaciskowych, pasów napędowych i manometrów.',
        'switch_desktop'    => 'Przełącz na wersję komputerową (Desktop)',
        'all_rights'        => 'Wszelkie prawa zastrzeżone.',
    ],
    'en' => [
        'hero_badge'        => '🇪🇺 European Fiber Blowing Machines Manufacturer',
        'hero_title'        => 'Fiber Optic Cable Blowing Machines',
        'hero_sub'          => 'Polish engineering precision, immediate 24h shipping across Europe, and permanent spare parts availability.',
        'btn_catalog'       => 'View Machines',
        'btn_ai'            => 'AI Advisor 24/7',
        'badge_eu'          => 'Manufactured in Poland (EU)',
        'badge_24h'         => '24h Shipping',
        'badge_parts'       => 'Parts in stock',
        'badge_train'       => 'Training included',
        'filter_all'        => 'All',
        'filter_flag'       => 'Flagship',
        'filter_ftth'       => 'FTTH Microcables',
        'filter_heavy'      => 'Trunk & Backbone',
        'see_machine'       => 'View details',
        'quick_quote'       => 'Quick quote',
        'ai_card_title'     => 'Need help choosing the right machine or seal?',
        'ai_card_sub'       => 'Our technical AI assistant knows every cable, duct, and machine specification. Answers in 3 seconds!',
        'ai_chip1'          => 'Which machine for 7mm microduct?',
        'ai_chip2'          => 'Cable seal for BDJ MAX',
        'ai_chip3'          => 'Compressor for BDJ BUDGET?',
        'ai_open_btn'       => 'Chat with AI Advisor ⚡',
        'why_title'         => 'Why Blue Dragon Jet?',
        'why_1_t'           => '24h Shipping',
        'why_1_d'           => 'Express delivery across Europe directly from our central warehouse.',
        'why_2_t'           => 'EU Manufacturer',
        'why_2_d'           => 'Solid aircraft-grade aluminum construction, reliable for years.',
        'why_3_t'           => 'Parts always in stock',
        'why_3_d'           => 'Drive wheels, gaskets, belts, and collets dispatched immediately.',
        'why_4_t'           => 'Training & Support',
        'why_4_d'           => 'Comprehensive operator training and warranty service support.',
        'contact_title'     => 'Need a machine or spare parts?',
        'contact_sub'       => 'Our technical engineers will help you pick the right configuration.',
        'call_now'          => 'Call us now',
        'write_email'       => 'Send email',
        'faq_title'         => 'Frequently Asked Questions',
        'faq1_q'            => 'How quickly will I receive my order?',
        'faq1_a'            => 'Most BDJ machines and accessories are in stock and dispatched within 24 hours.',
        'faq2_q'            => 'Is operator training included?',
        'faq2_a'            => 'Yes! We provide full technical training and operating guidance with every machine.',
        'faq3_q'            => 'Can I buy seals and replacement parts?',
        'faq3_a'            => 'Absolutely. We carry all cable seals, duct seals, drive belts, and manometers in stock.',
        'switch_desktop'    => 'Switch to desktop view',
        'all_rights'        => 'All rights reserved.',
    ],
    'de' => [
        'hero_badge'        => '🇪🇺 Europäischer Hersteller von Einblasgeräten',
        'hero_title'        => 'Kabel-Einblasgeräte für Glasfaser',
        'hero_sub'          => 'Polnische Präzisionstechnik, 24h-Expressversand in ganz Europa und permanente Ersatzteilverfügbarkeit.',
        'btn_catalog'       => 'Maschinen ansehen',
        'btn_ai'            => 'KI-Berater 24/7',
        'badge_eu'          => 'Hergestellt in Polen (EU)',
        'badge_24h'         => '24h Versand',
        'badge_parts'       => 'Teile auf Lager',
        'badge_train'       => 'Schulung inklusive',
        'filter_all'        => 'Alle',
        'filter_flag'       => 'Flaggschiffe',
        'filter_ftth'       => 'FTTH Mikrokabel',
        'filter_heavy'      => 'Haupttrassen',
        'see_machine'       => 'Details ansehen',
        'quick_quote'       => 'Schnelles Angebot',
        'ai_card_title'     => 'Brauchen Sie Hilfe bei der Auswahl von Maschine oder Dichtung?',
        'ai_card_sub'       => 'Unser technischer KI-Berater kennt alle Spezifikationen und antwortet in 3 Sekunden!',
        'ai_chip1'          => 'Welche Maschine für 7mm Mikrorohr?',
        'ai_chip2'          => 'Kabeldichtung für BDJ MAX',
        'ai_chip3'          => 'Kompressor für BDJ BUDGET?',
        'ai_open_btn'       => 'Mit KI-Berater chatten ⚡',
        'why_title'         => 'Warum Blue Dragon Jet?',
        'why_1_t'           => '24h Versand',
        'why_1_d'           => 'Expressversand in ganz Europa direkt ab Zentrallager.',
        'why_2_t'           => 'EU-Hersteller',
        'why_2_d'           => 'Robuste Bauweise aus Flugzeugaluminium, jahrelang zuverlässig.',
        'why_3_t'           => 'Teile immer auf Lager',
        'why_3_d'           => 'Antriebsräder, Dichtungen, Riemen und Buchsen sofort lieferbar.',
        'why_4_t'           => 'Schulung & Service',
        'why_4_d'           => 'Umfassende Einweisung für Installateure und Garantieservice.',
        'contact_title'     => 'Benötigen Sie eine Maschine oder Ersatzteile?',
        'contact_sub'       => 'Unsere Techniker beraten Sie gerne persönlich.',
        'call_now'          => 'Jetzt anrufen',
        'write_email'       => 'E-Mail schreiben',
        'faq_title'         => 'Häufig gestellte Fragen',
        'faq1_q'            => 'Wie schnell erhalte ich die bestellte Maschine?',
        'faq1_a'            => 'Die meisten Modelle sind auf Lager und werden innerhalb von 24 Stunden versendet.',
        'faq2_q'            => 'Ist eine Schulung inbegriffen?',
        'faq2_a'            => 'Ja! Zu jeder Maschine bieten wir eine umfassende technische Schulung an.',
        'faq3_q'            => 'Kann ich Dichtungen und Ersatzteile nachbestellen?',
        'faq3_a'            => 'Selbstverständlich. Wir führen alle Dichtungen, Riemen und Manometer auf Lager.',
        'switch_desktop'    => 'Zur Desktop-Version wechseln',
        'all_rights'        => 'Alle Rechte vorbehalten.',
    ],
];
$t = $_mt[ $_lang ] ?? $_mt['pl'];

// Pobierz wdmuchiwarki
$_m_args = [
    'post_type'      => 'machine',
    'posts_per_page' => 12,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
    'tax_query'      => [ [
        'taxonomy' => 'machine_category',
        'field'    => 'slug',
        'terms'    => 'wdmuchiwarki',
    ] ],
];
$mob_machines = get_posts( $_m_args );
if ( empty( $mob_machines ) ) {
    $mob_machines = get_posts( [ 'post_type' => 'machine', 'posts_per_page' => 8, 'post_status' => 'publish' ] );
}
?>

<div class="bdj-mob-app" id="bdj-mob-app">

    <!-- ═══ 1. HERO CARD ═══════════════════════════════════════════════════════ -->
    <section class="bdj-mob-hero">
        <div class="bdj-mob-hero__backdrop"></div>
        <div class="bdj-mob-hero__content">
            <span class="bdj-mob-badge">
                <span class="bdj-mob-badge__dot"></span>
                <?php echo esc_html( $t['hero_badge'] ); ?>
            </span>
            <h1 class="bdj-mob-hero__title"><?php echo esc_html( $t['hero_title'] ); ?></h1>
            <p class="bdj-mob-hero__sub"><?php echo esc_html( $t['hero_sub'] ); ?></p>
            
            <div class="bdj-mob-hero__actions">
                <a href="#mob-machines" class="bdj-mob-btn bdj-mob-btn--primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                    <?php echo esc_html( $t['btn_catalog'] ); ?>
                </a>
                <button type="button" class="bdj-mob-btn bdj-mob-btn--ai" onclick="if(window.__bdjOpenChat){window.__bdjOpenChat();}else{var c=document.getElementById('bdj-chat-launcher');if(c)c.click();}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    <?php echo esc_html( $t['btn_ai'] ); ?>
                </button>
            </div>

            <div class="bdj-mob-hero__trust">
                <span>✓ <?php echo esc_html( $t['badge_eu'] ); ?></span>
                <span>✓ <?php echo esc_html( $t['badge_24h'] ); ?></span>
                <span>✓ <?php echo esc_html( $t['badge_parts'] ); ?></span>
                <span>✓ <?php echo esc_html( $t['badge_train'] ); ?></span>
            </div>
        </div>
    </section>

    <!-- ═══ 2. KATEGORIE / SZYBKI FILTR ════════════════════════════════════════ -->
    <div class="bdj-mob-pills-bar">
        <a href="#mob-machines" class="bdj-mob-pill is-active">🔥 <?php echo esc_html( $t['filter_all'] ); ?></a>
        <a href="<?php echo esc_url( home_url( '/machines/bdj-max-dualhead/' ) ); ?>" class="bdj-mob-pill">⚡ BDJ MAX</a>
        <a href="<?php echo esc_url( home_url( '/machines/bdj-budget-plus-easy-set/' ) ); ?>" class="bdj-mob-pill">🎯 BDJ BUDGET</a>
        <a href="<?php echo esc_url( home_url( '/machines/bdj-hydro-chain-multitube/' ) ); ?>" class="bdj-mob-pill">🌊 BDJ HYDRO</a>
        <a href="<?php echo esc_url( home_url( '/machines/bdj-mini-counter/' ) ); ?>" class="bdj-mob-pill">🚀 BDJ MINI</a>
        <a href="<?php echo esc_url( home_url( '/serwis/' ) ); ?>" class="bdj-mob-pill">⚙️ Serwis & Części</a>
    </div>

    <!-- ═══ 3. LISTA MASZYN ════════════════════════════════════════════════════ -->
    <section class="bdj-mob-section" id="mob-machines">
        <div class="bdj-mob-section__head">
            <h2 class="bdj-mob-section__title">Wybierz wdmuchiwarkę</h2>
            <span class="bdj-mob-section__count"><?php echo count( $mob_machines ); ?> modele</span>
        </div>

        <div class="bdj-mob-cards-grid">
            <?php foreach ( $mob_machines as $m ) :
                $m_id   = $m->ID;
                $title  = get_the_title( $m_id );
                $link   = get_permalink( $m_id );
                $thumb  = get_the_post_thumbnail_url( $m_id, 'medium_large' ) ?: get_the_post_thumbnail_url( $m_id, 'medium' );
                $md     = get_post_meta( $m_id, 'machine_microduct_diameter', true );
                $pd     = get_post_meta( $m_id, 'machine_pipe_diameter', true );
                $range  = get_post_meta( $m_id, 'machine_range', true ) ?: 'do 2500 m';
                $speed  = get_post_meta( $m_id, 'machine_speed', true ) ?: 'do 110 m/min';
                $cat    = get_the_terms( $m_id, 'machine_category' );
                $cat_name = ( $cat && ! is_wp_error( $cat ) ) ? $cat[0]->name : 'Wdmuchiwarka';
            ?>
            <article class="bdj-mob-card">
                <a href="<?php echo esc_url( $link ); ?>" class="bdj-mob-card__img-wrap">
                    <?php if ( $thumb ) : ?>
                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy" class="bdj-mob-card__img">
                    <?php else : ?>
                        <div class="bdj-mob-card__img-ph">BDJ</div>
                    <?php endif; ?>
                    <span class="bdj-mob-card__cat"><?php echo esc_html( $cat_name ); ?></span>
                </a>
                <div class="bdj-mob-card__body">
                    <h3 class="bdj-mob-card__title">
                        <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
                    </h3>
                    
                    <div class="bdj-mob-card__specs">
                        <?php if ( ! empty( $md ) ) : ?>
                            <div class="bdj-mob-card__spec-item">
                                <span class="bdj-mob-card__spec-lbl">Kabel:</span>
                                <strong><?php echo esc_html( is_array( $md ) ? implode( ', ', $md ) : $md ); ?></strong>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $pd ) ) : ?>
                            <div class="bdj-mob-card__spec-item">
                                <span class="bdj-mob-card__spec-lbl">Rura:</span>
                                <strong><?php echo esc_html( is_array( $pd ) ? implode( ', ', $pd ) : $pd ); ?></strong>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="bdj-mob-card__actions">
                        <a href="<?php echo esc_url( $link ); ?>" class="bdj-mob-btn bdj-mob-btn--sm bdj-mob-btn--primary">
                            <?php echo esc_html( $t['see_machine'] ); ?> &rarr;
                        </a>
                        <a href="tel:+48695881783" class="bdj-mob-btn bdj-mob-btn--sm bdj-mob-btn--outline">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            Wycena
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ═══ 4. INTERAKTYWNA KARTA DORADCY AI ════════════════════════════════════ -->
    <section class="bdj-mob-ai-banner">
        <div class="bdj-mob-ai-banner__glow"></div>
        <div class="bdj-mob-ai-banner__header">
            <div class="bdj-mob-ai-avatar">🤖</div>
            <div>
                <h3 class="bdj-mob-ai-title"><?php echo esc_html( $t['ai_card_title'] ); ?></h3>
                <p class="bdj-mob-ai-sub"><?php echo esc_html( $t['ai_card_sub'] ); ?></p>
            </div>
        </div>

        <div class="bdj-mob-ai-prompts">
            <button type="button" class="bdj-mob-ai-chip" onclick="if(window.__bdjOpenChat){window.__bdjOpenChat('<?php echo esc_js( $t['ai_chip1'] ); ?>');}">
                💬 „<?php echo esc_html( $t['ai_chip1'] ); ?>”
            </button>
            <button type="button" class="bdj-mob-ai-chip" onclick="if(window.__bdjOpenChat){window.__bdjOpenChat('<?php echo esc_js( $t['ai_chip2'] ); ?>');}">
                💬 „<?php echo esc_html( $t['ai_chip2'] ); ?>”
            </button>
            <button type="button" class="bdj-mob-ai-chip" onclick="if(window.__bdjOpenChat){window.__bdjOpenChat('<?php echo esc_js( $t['ai_chip3'] ); ?>');}">
                💬 „<?php echo esc_html( $t['ai_chip3'] ); ?>”
            </button>
        </div>

        <button type="button" class="bdj-mob-btn bdj-mob-btn--ai-cta" onclick="if(window.__bdjOpenChat){window.__bdjOpenChat();}else{var c=document.getElementById('bdj-chat-launcher');if(c)c.click();}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            <?php echo esc_html( $t['ai_open_btn'] ); ?>
        </button>
    </section>

    <!-- ═══ 5. KORZYŚCI 2x2 ═════════════════════════════════════════════════════ -->
    <section class="bdj-mob-section">
        <div class="bdj-mob-section__head">
            <h2 class="bdj-mob-section__title"><?php echo esc_html( $t['why_title'] ); ?></h2>
        </div>
        <div class="bdj-mob-benefits-grid">
            <div class="bdj-mob-benefit-card">
                <span class="bdj-mob-benefit-icon">🚚</span>
                <strong><?php echo esc_html( $t['why_1_t'] ); ?></strong>
                <p><?php echo esc_html( $t['why_1_d'] ); ?></p>
            </div>
            <div class="bdj-mob-benefit-card">
                <span class="bdj-mob-benefit-icon">🇵🇱</span>
                <strong><?php echo esc_html( $t['why_2_t'] ); ?></strong>
                <p><?php echo esc_html( $t['why_2_d'] ); ?></p>
            </div>
            <div class="bdj-mob-benefit-card">
                <span class="bdj-mob-benefit-icon">⚙️</span>
                <strong><?php echo esc_html( $t['why_3_t'] ); ?></strong>
                <p><?php echo esc_html( $t['why_3_d'] ); ?></p>
            </div>
            <div class="bdj-mob-benefit-card">
                <span class="bdj-mob-benefit-icon">🎓</span>
                <strong><?php echo esc_html( $t['why_4_t'] ); ?></strong>
                <p><?php echo esc_html( $t['why_4_d'] ); ?></p>
            </div>
        </div>
    </section>

    <!-- ═══ 6. SZYBKI KONTAKT ═══════════════════════════════════════════════════ -->
    <section class="bdj-mob-section bdj-mob-section--contact">
        <div class="bdj-mob-contact-card">
            <h3 class="bdj-mob-contact-title"><?php echo esc_html( $t['contact_title'] ); ?></h3>
            <p class="bdj-mob-contact-sub"><?php echo esc_html( $t['contact_sub'] ); ?></p>
            
            <div class="bdj-mob-contact-buttons">
                <a href="tel:+48695881783" class="bdj-mob-btn bdj-mob-btn--call-full">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    +48 695 881 783 (Inżynier)
                </a>
                <a href="tel:+48914835011" class="bdj-mob-btn bdj-mob-btn--call-full bdj-mob-btn--sec">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    +48 91 483 50 11 (Biuro)
                </a>
                <a href="mailto:biuro@bluedragonjet.com" class="bdj-mob-btn bdj-mob-btn--mail">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    biuro@bluedragonjet.com
                </a>
            </div>
        </div>
    </section>

    <!-- ═══ 7. FAQ ACCORDION ════════════════════════════════════════════════════ -->
    <section class="bdj-mob-section">
        <div class="bdj-mob-section__head">
            <h2 class="bdj-mob-section__title"><?php echo esc_html( $t['faq_title'] ); ?></h2>
        </div>
        <div class="bdj-mob-faq-list">
            <details class="bdj-mob-faq-item">
                <summary class="bdj-mob-faq-q">
                    <span><?php echo esc_html( $t['faq1_q'] ); ?></span>
                    <svg class="bdj-mob-faq-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <div class="bdj-mob-faq-a"><?php echo esc_html( $t['faq1_a'] ); ?></div>
            </details>

            <details class="bdj-mob-faq-item">
                <summary class="bdj-mob-faq-q">
                    <span><?php echo esc_html( $t['faq2_q'] ); ?></span>
                    <svg class="bdj-mob-faq-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <div class="bdj-mob-faq-a"><?php echo esc_html( $t['faq2_a'] ); ?></div>
            </details>

            <details class="bdj-mob-faq-item">
                <summary class="bdj-mob-faq-q">
                    <span><?php echo esc_html( $t['faq3_q'] ); ?></span>
                    <svg class="bdj-mob-faq-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <div class="bdj-mob-faq-a"><?php echo esc_html( $t['faq3_a'] ); ?></div>
            </details>
        </div>
    </section>

    <!-- ═══ 8. PRZEŁĄCZNIK WIDOKU (DESKTOP / MOBILE) ════════════════════════════ -->
    <div class="bdj-mob-switcher">
        <a href="<?php echo esc_url( add_query_arg( 'view', 'desktop' ) ); ?>" class="bdj-mob-switcher__link">
            💻 <?php echo esc_html( $t['switch_desktop'] ); ?>
        </a>
        <p class="bdj-mob-copy">&copy; <?php echo date('Y'); ?> Blue Dragon Jet Sp. z o.o. · <?php echo esc_html( $t['all_rights'] ); ?></p>
    </div>

</div><!-- .bdj-mob-app -->

<?php get_footer(); ?>
