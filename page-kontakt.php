<?php
/**
 * Template Name: Kontakt — Wizard
 * Slug: kontakt
 */

/* ── PHP: obsługa wysyłki formularza ─────────────────────────────────────── */
$wizard_sent    = false;
$wizard_error   = '';
$wizard_success = false;

if ( isset( $_POST['bdj_wizard_submit'] ) && check_admin_referer( 'bdj_wizard_form', 'bdj_wizard_nonce' ) ) {
    $category  = sanitize_text_field( wp_unslash( $_POST['bdj_category']  ?? '' ) );
    $products  = array_map( 'sanitize_text_field', (array) ( $_POST['bdj_products'] ?? [] ) );
    $name      = sanitize_text_field( wp_unslash( $_POST['bdj_name']     ?? '' ) );
    $email     = sanitize_email( wp_unslash( $_POST['bdj_email']         ?? '' ) );
    $phone     = sanitize_text_field( wp_unslash( $_POST['bdj_phone']    ?? '' ) );
    $message   = sanitize_textarea_field( wp_unslash( $_POST['bdj_message'] ?? '' ) );
    $gdpr      = ! empty( $_POST['bdj_gdpr'] );

    // Rate limiting — max 5 wysłań na minutę z jednego IP
    $ip        = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0' );
    $rate_key  = 'bdj_form_' . md5( $ip );
    $rate_count = (int) get_transient( $rate_key );
    if ( $rate_count >= 5 ) {
        $wizard_error = 'Zbyt wiele zapytań. Poczekaj chwilę i spróbuj ponownie.';
    }

    // Weryfikacja Cloudflare Turnstile
    $ts_token  = sanitize_text_field( wp_unslash( $_POST['cf-turnstile-response'] ?? '' ) );
    $ts_secret = defined( 'CLOUDFLARE_TURNSTILE_SECRET' ) ? CLOUDFLARE_TURNSTILE_SECRET : '';
    $ts_valid  = false;
    if ( $ts_token && $ts_secret ) {
        $ts_resp = wp_remote_post( 'https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'body' => [ 'secret' => $ts_secret, 'response' => $ts_token ],
        ] );
        if ( ! is_wp_error( $ts_resp ) ) {
            $ts_data  = json_decode( wp_remote_retrieve_body( $ts_resp ), true );
            $ts_valid = ! empty( $ts_data['success'] );
        }
    }

    if ( ! $name || ! is_email( $email ) || ! $category || empty( $products ) || ! $gdpr ) {
        $wizard_error = 'Wypełnij wszystkie wymagane pola i zaznacz zgodę RODO.';
    } elseif ( ! $ts_valid ) {
        $wizard_error = 'Weryfikacja antyspamowa nie powiodła się. Spróbuj ponownie.';
    } else {
        $subject = '[BDJ] Zapytanie: ' . $category . ' — ' . $name;
        $body    = "Kategoria: {$category}\n";
        $body   .= 'Wybrane produkty: ' . implode( ', ', $products ) . "\n\n";
        $body   .= "Imię i nazwisko: {$name}\n";
        $body   .= "E-mail: {$email}\n";
        $body   .= "Telefon: {$phone}\n\n";
        $body   .= "Wiadomość:\n{$message}";

        $headers = [
            'Content-Type: text/plain; charset=UTF-8',
            'Reply-To: ' . $name . ' <' . $email . '>',
        ];

        $sent = wp_mail( 'info@bluedragonjet.com', $subject, $body, $headers );
        if ( $sent ) {
            set_transient( $rate_key, $rate_count + 1, 60 );
            $wizard_success = true;
        } else {
            $wizard_error = 'Wystąpił błąd wysyłki. Spróbuj ponownie lub skontaktuj się telefonicznie.';
        }
    }
}

/* ── PHP: lista produktów ─────────────────────────────────────────────────── */
$machines_query = new WP_Query( [
    'post_type'      => 'machine',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
] );
$machine_list = [];
while ( $machines_query->have_posts() ) {
    $machines_query->the_post();
    $machine_list[] = get_the_title();
}
wp_reset_postdata();

if ( empty( $machine_list ) ) {
    $machine_list = [ 'BDJ Standard', 'BDJ Extended', 'BDJ Mini', 'BDJ Pro', 'BDJ BRAI', 'Kompresor BDJ' ];
}

$accessories_list = [
    'Głowice do wdmuchiwania kabli',
    'Głowice do mikrokanalizacji',
    'Adaptery i przejściówki',
    'Uszczelki i zestawy serwisowe',
    'Wózki transportowe',
    'Prowadnice kabli',
    'Części zamienne',
    'Inne akcesoria',
];

get_header();
?>

<style>
/* ── Wizard Contact — strona kontaktowa ──────────────────────────────────── */
.wiz-page {
    padding-top: calc(var(--header-height) + 3rem);
    padding-bottom: 5rem;
    background: var(--color-light-gray);
    min-height: 100vh;
}
.wiz-wrap {
    max-width: 720px;
    margin-inline: auto;
    padding-inline: 1.25rem;
}

/* ── Nagłówek sekcji ─────────────────────────────────────────────────────── */
.wiz-hero {
    text-align: center;
    margin-bottom: 2.5rem;
}
.wiz-hero__eyebrow {
    display: inline-block;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-secondary);
    margin-bottom: 0.5rem;
}
.wiz-hero__title {
    font-size: clamp(1.6rem, 4vw, 2.2rem);
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: 0.6rem;
}
.wiz-hero__sub {
    font-size: 0.92rem;
    color: #5a7080;
    line-height: 1.65;
}

/* ── Progress bar ────────────────────────────────────────────────────────── */
.wiz-progress {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
    gap: 0;
}
.wiz-step-dot {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.3rem;
    flex: 0 0 auto;
    position: relative;
    z-index: 1;
}
.wiz-step-dot__circle {
    width: 36px; height: 36px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.8rem;
    font-weight: 700;
    border: 2px solid #c9d8e4;
    background: #fff;
    color: #8fa5b5;
    transition: all 0.3s ease;
}
.wiz-step-dot__label {
    font-size: 0.65rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #8fa5b5;
    white-space: nowrap;
    transition: color 0.3s ease;
}
.wiz-step-dot.is-active .wiz-step-dot__circle {
    background: var(--color-secondary);
    border-color: var(--color-secondary);
    color: #fff;
    box-shadow: 0 0 0 4px rgba(36,151,208,0.2);
}
.wiz-step-dot.is-active .wiz-step-dot__label { color: var(--color-secondary); }
.wiz-step-dot.is-done .wiz-step-dot__circle {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: #fff;
}
.wiz-step-dot.is-done .wiz-step-dot__label { color: var(--color-primary); }
.wiz-step-line {
    flex: 1;
    height: 2px;
    background: #c9d8e4;
    margin-bottom: 1.2rem;
    transition: background 0.3s ease;
}
.wiz-step-line.is-done { background: var(--color-primary); }

/* ── Card ────────────────────────────────────────────────────────────────── */
.wiz-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(30,66,93,0.08);
    padding: 2.25rem 2rem;
    display: none;
}
.wiz-card.is-visible { display: block; }
.wiz-card__title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--color-primary);
    margin-bottom: 0.35rem;
}
.wiz-card__sub {
    font-size: 0.85rem;
    color: #6a8090;
    margin-bottom: 1.75rem;
    line-height: 1.55;
}

/* ── Krok 1 — kafelki kategorii ──────────────────────────────────────────── */
.wiz-tiles {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
.wiz-tile {
    border: 2px solid #e4edf5;
    border-radius: 12px;
    padding: 2rem 1.5rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.25s ease;
    background: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.9rem;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
}
.wiz-tile:hover, .wiz-tile:focus-visible {
    border-color: var(--color-secondary);
    box-shadow: 0 6px 24px rgba(36,151,208,0.15);
    transform: translateY(-2px);
}
.wiz-tile:active { transform: translateY(0); }
.wiz-tile__icon {
    width: 64px; height: 64px;
    border-radius: 14px;
    background: rgba(36,151,208,0.1);
    display: flex; align-items: center; justify-content: center;
}
.wiz-tile__icon svg { width: 32px; height: 32px; stroke: var(--color-secondary); }
.wiz-tile__name {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--color-primary);
}
.wiz-tile__desc {
    font-size: 0.8rem;
    color: #6a8090;
    line-height: 1.5;
}

/* ── Krok 2 — checkboxy produktów ────────────────────────────────────────── */
.wiz-products {
    display: flex;
    flex-direction: column;
    gap: 0.55rem;
}
.wiz-check {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    padding: 0.9rem 1.1rem;
    border: 1.5px solid #e4edf5;
    border-radius: 10px;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
}
.wiz-check:hover { border-color: var(--color-secondary); background: rgba(36,151,208,0.03); }
.wiz-check input[type="checkbox"] {
    width: 18px; height: 18px;
    accent-color: var(--color-secondary);
    flex-shrink: 0;
    cursor: pointer;
}
.wiz-check.is-checked {
    border-color: var(--color-secondary);
    background: rgba(36,151,208,0.06);
}
.wiz-check__label {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--color-primary);
}

/* ── Krok 3 — pola formularza ────────────────────────────────────────────── */
.wiz-summary-box {
    background: rgba(36,151,208,0.06);
    border: 1.5px solid rgba(36,151,208,0.25);
    border-radius: 10px;
    padding: 1rem 1.25rem;
    margin-bottom: 1.5rem;
    font-size: 0.85rem;
    color: var(--color-primary);
    line-height: 1.6;
}
.wiz-summary-box strong { color: var(--color-secondary); }
.wiz-field {
    margin-bottom: 1.1rem;
}
.wiz-field label {
    display: block;
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--color-primary);
    margin-bottom: 0.35rem;
    letter-spacing: 0.01em;
}
.wiz-field input,
.wiz-field textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1.5px solid #d0dde8;
    border-radius: 8px;
    font-size: 1rem;
    font-family: var(--font-base);
    color: var(--color-primary);
    background: #fff;
    transition: border-color 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
}
.wiz-field input:focus,
.wiz-field textarea:focus {
    outline: none;
    border-color: var(--color-secondary);
    box-shadow: 0 0 0 3px rgba(36,151,208,0.15);
}
.wiz-field textarea { resize: vertical; min-height: 100px; }
.wiz-field-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
.wiz-gdpr {
    display: flex;
    gap: 0.7rem;
    align-items: flex-start;
    margin-top: 0.5rem;
    margin-bottom: 1.25rem;
}
.wiz-gdpr input[type="checkbox"] {
    margin-top: 2px;
    flex-shrink: 0;
    width: 16px; height: 16px;
    accent-color: var(--color-secondary);
    cursor: pointer;
}
.wiz-gdpr__text {
    font-size: 0.75rem;
    color: #6a8090;
    line-height: 1.55;
}

/* ── Nawigacja ───────────────────────────────────────────────────────────── */
.wiz-turnstile {
    margin-top: 1.5rem;
    display: flex;
    justify-content: flex-start;
}
.wiz-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1.25rem;
    gap: 0.75rem;
}
.wiz-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.8rem 1.75rem;
    border-radius: 8px;
    font-size: 0.87rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    cursor: pointer;
    border: none;
    transition: all 0.25s ease;
}
.wiz-btn--back {
    background: transparent;
    color: #6a8090;
    border: 1.5px solid #d0dde8;
}
.wiz-btn--back:hover { background: #f3f7fa; border-color: #a0b5c5; color: var(--color-primary); }
.wiz-btn--next, .wiz-btn--submit {
    background: var(--color-secondary);
    color: #fff;
    box-shadow: 0 4px 14px rgba(36,151,208,0.3);
    margin-left: auto;
}
.wiz-btn--next:hover, .wiz-btn--submit:hover {
    background: var(--color-mid-blue, #1a7fb0);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(36,151,208,0.4);
}
.wiz-btn svg { width: 15px; height: 15px; }

/* ── Error ───────────────────────────────────────────────────────────────── */
.wiz-error {
    background: #fdf0f0;
    border: 1.5px solid #e5a0a0;
    border-radius: 8px;
    padding: 0.85rem 1rem;
    font-size: 0.85rem;
    color: #a03030;
    margin-bottom: 1.25rem;
}

/* ── Success ─────────────────────────────────────────────────────────────── */
.wiz-success {
    text-align: center;
    padding: 3rem 1.5rem;
}
.wiz-success__icon {
    width: 72px; height: 72px;
    border-radius: 50%;
    background: rgba(36,151,208,0.1);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1.25rem;
}
.wiz-success__icon svg { width: 36px; height: 36px; stroke: var(--color-secondary); }
.wiz-success__title {
    font-size: 1.35rem;
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: 0.6rem;
}
.wiz-success__text {
    font-size: 0.92rem;
    color: #5a7080;
    line-height: 1.65;
}

/* ── Responsywność ───────────────────────────────────────────────────────── */
@media (max-width: 540px) {
    .wiz-card { padding: 1.5rem 1.1rem; }
    .wiz-tiles { grid-template-columns: 1fr; gap: 0.75rem; }
    .wiz-tile { flex-direction: row; text-align: left; padding: 1.25rem; }
    .wiz-tile__icon { width: 48px; height: 48px; flex-shrink: 0; }
    .wiz-tile__icon svg { width: 24px; height: 24px; }
    .wiz-field-row { grid-template-columns: 1fr; }
    .wiz-step-dot__label { display: none; }
}
</style>

<div class="wiz-page">
<div class="wiz-wrap">

    <!-- Nagłówek -->
    <div class="wiz-hero">
        <span class="wiz-hero__eyebrow"><?php esc_html_e( 'Kontakt', 'blue-dragon-jet' ); ?></span>
        <h1 class="wiz-hero__title"><?php esc_html_e( 'Skontaktuj się z nami', 'blue-dragon-jet' ); ?></h1>
        <p class="wiz-hero__sub"><?php esc_html_e( 'Wybierz kategorię i produkty, które Cię interesują — przygotujemy odpowiedź dopasowaną do Twojego zapytania.', 'blue-dragon-jet' ); ?></p>
    </div>

    <?php if ( $wizard_success ) : ?>
    <!-- Potwierdzenie wysyłki -->
    <div class="wiz-card is-visible">
        <div class="wiz-success">
            <div class="wiz-success__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
            <h2 class="wiz-success__title"><?php esc_html_e( 'Wiadomość wysłana!', 'blue-dragon-jet' ); ?></h2>
            <p class="wiz-success__text"><?php esc_html_e( 'Dziękujemy za kontakt. Odpiszemy w ciągu 24 godzin roboczych.', 'blue-dragon-jet' ); ?></p>
        </div>
    </div>
    <?php else : ?>

    <!-- Progress bar -->
    <div class="wiz-progress" id="wiz-progress" role="list" aria-label="<?php esc_attr_e( 'Kroki formularza', 'blue-dragon-jet' ); ?>">
        <div class="wiz-step-dot is-active" data-step="1" role="listitem">
            <div class="wiz-step-dot__circle">1</div>
            <span class="wiz-step-dot__label"><?php esc_html_e( 'Kategoria', 'blue-dragon-jet' ); ?></span>
        </div>
        <div class="wiz-step-line" id="line-1"></div>
        <div class="wiz-step-dot" data-step="2" role="listitem">
            <div class="wiz-step-dot__circle">2</div>
            <span class="wiz-step-dot__label"><?php esc_html_e( 'Produkty', 'blue-dragon-jet' ); ?></span>
        </div>
        <div class="wiz-step-line" id="line-2"></div>
        <div class="wiz-step-dot" data-step="3" role="listitem">
            <div class="wiz-step-dot__circle">3</div>
            <span class="wiz-step-dot__label"><?php esc_html_e( 'Dane', 'blue-dragon-jet' ); ?></span>
        </div>
    </div>

    <form method="post" id="wiz-form" novalidate>
        <?php wp_nonce_field( 'bdj_wizard_form', 'bdj_wizard_nonce' ); ?>
        <input type="hidden" name="bdj_category" id="bdj_category" value="">

        <!-- ─── KROK 1: Wybór kategorii ─────────────────────────────────── -->
        <div class="wiz-card is-visible" id="wiz-step-1">
            <h2 class="wiz-card__title"><?php esc_html_e( 'Czego dotyczy zapytanie?', 'blue-dragon-jet' ); ?></h2>
            <p class="wiz-card__sub"><?php esc_html_e( 'Kliknij kafelek, aby przejść dalej.', 'blue-dragon-jet' ); ?></p>

            <div class="wiz-tiles">
                <div class="wiz-tile" data-category="Maszyny" tabindex="0" role="button" aria-label="<?php esc_attr_e( 'Maszyny', 'blue-dragon-jet' ); ?>">
                    <div class="wiz-tile__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8m-4-4v4"/>
                            <path d="M7 7h2v6H7zm4 2h2v4h-2zm4-3h2v7h-2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="wiz-tile__name"><?php esc_html_e( 'Maszyny', 'blue-dragon-jet' ); ?></div>
                        <div class="wiz-tile__desc"><?php esc_html_e( 'Urządzenia do wdmuchiwania kabli i mikrokanalizacji', 'blue-dragon-jet' ); ?></div>
                    </div>
                </div>

                <div class="wiz-tile" data-category="Akcesoria" tabindex="0" role="button" aria-label="<?php esc_attr_e( 'Akcesoria', 'blue-dragon-jet' ); ?>">
                    <div class="wiz-tile__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="wiz-tile__name"><?php esc_html_e( 'Akcesoria', 'blue-dragon-jet' ); ?></div>
                        <div class="wiz-tile__desc"><?php esc_html_e( 'Głowice, adaptery, części zamienne i wyposażenie dodatkowe', 'blue-dragon-jet' ); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ─── KROK 2: Wybór produktów ─────────────────────────────────── -->
        <div class="wiz-card" id="wiz-step-2">
            <h2 class="wiz-card__title" id="wiz-step-2-title"><?php esc_html_e( 'Wybierz produkty', 'blue-dragon-jet' ); ?></h2>
            <p class="wiz-card__sub"><?php esc_html_e( 'Możesz wybrać kilka pozycji jednocześnie.', 'blue-dragon-jet' ); ?></p>

            <!-- Lista maszyn -->
            <div class="wiz-products" id="wiz-products-machines">
                <?php foreach ( $machine_list as $machine ) : ?>
                <label class="wiz-check">
                    <input type="checkbox" name="bdj_products[]" value="<?php echo esc_attr( $machine ); ?>">
                    <span class="wiz-check__label"><?php echo esc_html( $machine ); ?></span>
                </label>
                <?php endforeach; ?>
            </div>

            <!-- Lista akcesoriów -->
            <div class="wiz-products" id="wiz-products-accessories" style="display:none;">
                <?php foreach ( $accessories_list as $acc ) : ?>
                <label class="wiz-check">
                    <input type="checkbox" name="bdj_products[]" value="<?php echo esc_attr( $acc ); ?>">
                    <span class="wiz-check__label"><?php echo esc_html( $acc ); ?></span>
                </label>
                <?php endforeach; ?>
            </div>

            <div class="wiz-nav">
                <button type="button" class="wiz-btn wiz-btn--back" data-goto="1">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
                    <?php esc_html_e( 'Wstecz', 'blue-dragon-jet' ); ?>
                </button>
                <button type="button" class="wiz-btn wiz-btn--next" data-goto="3" id="wiz-next-2">
                    <?php esc_html_e( 'Dalej', 'blue-dragon-jet' ); ?>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>

        <!-- ─── KROK 3: Dane kontaktowe ──────────────────────────────────── -->
        <div class="wiz-card" id="wiz-step-3">
            <h2 class="wiz-card__title"><?php esc_html_e( 'Twoje dane kontaktowe', 'blue-dragon-jet' ); ?></h2>
            <p class="wiz-card__sub"><?php esc_html_e( 'Uzupełnij formularz — odpiszemy w ciągu 24 godzin.', 'blue-dragon-jet' ); ?></p>

            <!-- Podsumowanie wyboru -->
            <div class="wiz-summary-box" id="wiz-summary" aria-live="polite">
                <strong><?php esc_html_e( 'Twój wybór:', 'blue-dragon-jet' ); ?></strong>
                <span id="wiz-summary-text"></span>
            </div>

            <?php if ( $wizard_error ) : ?>
                <div class="wiz-error" role="alert"><?php echo esc_html( $wizard_error ); ?></div>
            <?php endif; ?>

            <div class="wiz-field-row">
                <div class="wiz-field">
                    <label for="bdj_name"><?php esc_html_e( 'Imię i nazwisko *', 'blue-dragon-jet' ); ?></label>
                    <input type="text" id="bdj_name" name="bdj_name" required autocomplete="name"
                        value="<?php echo isset($_POST['bdj_name']) ? esc_attr(wp_unslash($_POST['bdj_name'])) : ''; ?>">
                </div>
                <div class="wiz-field">
                    <label for="bdj_email"><?php esc_html_e( 'Adres e-mail *', 'blue-dragon-jet' ); ?></label>
                    <input type="email" id="bdj_email" name="bdj_email" required autocomplete="email"
                        value="<?php echo isset($_POST['bdj_email']) ? esc_attr(wp_unslash($_POST['bdj_email'])) : ''; ?>">
                </div>
            </div>
            <div class="wiz-field">
                <label for="bdj_phone"><?php esc_html_e( 'Numer telefonu', 'blue-dragon-jet' ); ?></label>
                <input type="tel" id="bdj_phone" name="bdj_phone" autocomplete="tel"
                    value="<?php echo isset($_POST['bdj_phone']) ? esc_attr(wp_unslash($_POST['bdj_phone'])) : ''; ?>">
            </div>
            <div class="wiz-field">
                <label for="bdj_message"><?php esc_html_e( 'Dodatkowa wiadomość', 'blue-dragon-jet' ); ?></label>
                <textarea id="bdj_message" name="bdj_message" rows="4" placeholder="<?php esc_attr_e( 'Opcjonalnie — opisz szczegóły zapytania, ilość sztuk, termin realizacji itd.', 'blue-dragon-jet' ); ?>"><?php echo isset($_POST['bdj_message']) ? esc_textarea(wp_unslash($_POST['bdj_message'])) : ''; ?></textarea>
            </div>

            <div class="wiz-gdpr">
                <input type="checkbox" id="bdj_gdpr" name="bdj_gdpr" value="1" required
                    <?php checked( ! empty( $_POST['bdj_gdpr'] ) ); ?>>
                <label for="bdj_gdpr" class="wiz-gdpr__text">
                    <?php esc_html_e( 'Wyrażam zgodę na przetwarzanie moich danych osobowych przez GAMM-BUD Sp. z o.o. w celu odpowiedzi na zapytanie (zgodnie z RODO). *', 'blue-dragon-jet' ); ?>
                </label>
            </div>

            <div class="wiz-turnstile">
                <div class="cf-turnstile" data-sitekey="0x4AAAAAADnKZeTx5h-TfgAI" data-theme="light"></div>
            </div>

            <div class="wiz-nav">
                <button type="button" class="wiz-btn wiz-btn--back" data-goto="2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
                    <?php esc_html_e( 'Wstecz', 'blue-dragon-jet' ); ?>
                </button>
                <button type="submit" name="bdj_wizard_submit" class="wiz-btn wiz-btn--submit">
                    <?php esc_html_e( 'Wyślij zapytanie', 'blue-dragon-jet' ); ?>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>
                    </svg>
                </button>
            </div>
        </div>

    </form>
    <?php endif; ?>

</div><!-- .wiz-wrap -->
</div><!-- .wiz-page -->

<script>
(function () {
    var currentStep = 1;
    var selectedCategory = '';
    var categoryInput = document.getElementById('bdj_category');

    /* ── helpers ─────────────────────────────────────────────────────────── */
    function showStep(n) {
        [1, 2, 3].forEach(function (i) {
            var card = document.getElementById('wiz-step-' + i);
            if (card) card.classList.toggle('is-visible', i === n);
        });
        updateProgress(n);
        window.scrollTo({ top: 0, behavior: 'smooth' });
        currentStep = n;
    }

    function updateProgress(n) {
        [1, 2, 3].forEach(function (i) {
            var dot = document.querySelector('.wiz-step-dot[data-step="' + i + '"]');
            if (!dot) return;
            dot.classList.remove('is-active', 'is-done');
            if (i < n) dot.classList.add('is-done');
            else if (i === n) dot.classList.add('is-active');
        });
        ['1', '2'].forEach(function (i) {
            var line = document.getElementById('line-' + i);
            if (!line) return;
            line.classList.toggle('is-done', n > parseInt(i));
        });
    }

    function getChecked() {
        return Array.from(
            document.querySelectorAll('input[name="bdj_products[]"]:checked')
        ).map(function (cb) { return cb.value; });
    }

    function updateSummary() {
        var checked = getChecked();
        var text = document.getElementById('wiz-summary-text');
        if (!text) return;
        var label = selectedCategory
            ? ' <strong>' + selectedCategory + '</strong> → '
            : '';
        text.innerHTML = label + (checked.length
            ? checked.join(', ')
            : '—');
    }

    /* ── Krok 1: kliknięcie kafelka ─────────────────────────────────────── */
    document.querySelectorAll('.wiz-tile').forEach(function (tile) {
        function choose() {
            selectedCategory = tile.getAttribute('data-category');
            categoryInput.value = selectedCategory;

            // Pokaż właściwą listę produktów
            document.getElementById('wiz-products-machines').style.display =
                selectedCategory === 'Maszyny' ? 'flex' : 'none';
            document.getElementById('wiz-products-accessories').style.display =
                selectedCategory === 'Akcesoria' ? 'flex' : 'none';

            // Odznacz checkboxy poprzedniej kategorii
            document.querySelectorAll('input[name="bdj_products[]"]').forEach(function (cb) {
                cb.checked = false;
                cb.closest('.wiz-check').classList.remove('is-checked');
            });

            // Aktualizuj tytuł kroku 2
            var t2 = document.getElementById('wiz-step-2-title');
            if (t2) t2.textContent = selectedCategory === 'Maszyny'
                ? 'Wybierz maszyny'
                : 'Wybierz akcesoria';

            showStep(2);
        }

        tile.addEventListener('click', choose);
        tile.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); choose(); }
        });
    });

    /* ── Krok 2: checkboxy ───────────────────────────────────────────────── */
    document.querySelectorAll('.wiz-check').forEach(function (label) {
        label.addEventListener('click', function (e) {
            if (e.target.tagName === 'INPUT') return; // natywny click
            var cb = label.querySelector('input[type="checkbox"]');
            cb.checked = !cb.checked;
            label.classList.toggle('is-checked', cb.checked);
        });
    });
    document.querySelectorAll('.wiz-check input').forEach(function (cb) {
        cb.addEventListener('change', function () {
            cb.closest('.wiz-check').classList.toggle('is-checked', cb.checked);
        });
    });

    /* ── Krok 2 → 3: walidacja ───────────────────────────────────────────── */
    var nextBtn = document.getElementById('wiz-next-2');
    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            if (getChecked().length === 0) {
                alert('Wybierz przynajmniej jeden produkt.');
                return;
            }
            updateSummary();
            showStep(3);
        });
    }

    /* ── Przyciski Wstecz ────────────────────────────────────────────────── */
    document.querySelectorAll('[data-goto]').forEach(function (btn) {
        if (btn.classList.contains('wiz-btn--next')) return;
        btn.addEventListener('click', function () {
            showStep(parseInt(btn.getAttribute('data-goto')));
        });
    });

    /* ── Walidacja kroku 3 przed wysłaniem ───────────────────────────────── */
    var form = document.getElementById('wiz-form');
    if (form) {
        form.addEventListener('submit', function (e) {
            var name  = document.getElementById('bdj_name');
            var email = document.getElementById('bdj_email');
            var gdpr  = document.getElementById('bdj_gdpr');
            var ok = true;

            if (!name || !name.value.trim())  { ok = false; name && name.focus(); }
            else if (!email || !/\S+@\S+\.\S+/.test(email.value)) { ok = false; email && email.focus(); }
            else if (!gdpr || !gdpr.checked)  { ok = false; gdpr && gdpr.focus(); }

            if (!ok) {
                e.preventDefault();
                alert('<?php echo esc_js( __( 'Wypełnij wymagane pola i zaznacz zgodę RODO.', 'blue-dragon-jet' ) ); ?>');
            }
        });
    }

    /* ── Jeśli błąd PHP — wróć do kroku 3 ──────────────────────────────── */
    <?php if ( $wizard_error ) : ?>
    selectedCategory = <?php echo wp_json_encode( sanitize_text_field( wp_unslash( $_POST['bdj_category'] ?? '' ) ) ); ?>;
    categoryInput.value = selectedCategory;
    showStep(3);
    updateSummary();
    <?php endif; ?>
})();
</script>

<?php get_footer(); ?>
