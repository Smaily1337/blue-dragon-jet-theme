<?php
/**
 * Template Name: O nas
 * Slug: o-nas
 */
get_header(); ?>

<style>
/* ── O nas page styles ──────────────────────────────────────────────────── */
.onas-hero {
    position: relative;
    padding-top: calc(var(--header-height) + 4rem);
    padding-bottom: 5rem;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
    overflow: hidden;
}
.onas-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url('https://bluedragonjet.com/wp-content/uploads/2022/12/Gamm-Bud.jpg') center/cover no-repeat;
    opacity: 0.12;
}
.onas-hero__inner {
    position: relative;
    z-index: 1;
    max-width: var(--container-width);
    margin-inline: auto;
    padding-inline: 1.5rem;
}
.onas-hero__label {
    display: inline-block;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.7);
    margin-bottom: 1rem;
}
.onas-hero__title {
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.15;
    max-width: 680px;
    margin-bottom: 1.25rem;
}
.onas-hero__title span { color: rgba(255,255,255,0.65); }
.onas-hero__lead {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.82);
    max-width: 560px;
    line-height: 1.7;
}

/* ── Stats bar ────────────────────────────────────────────────────────── */
.onas-stats {
    background: var(--color-white);
    border-bottom: 1px solid #e4edf5;
}
.onas-stats__grid {
    max-width: var(--container-width);
    margin-inline: auto;
    padding-inline: 1.5rem;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
}
.onas-stat {
    padding: 2.5rem 1.5rem;
    text-align: center;
    border-right: 1px solid #e4edf5;
}
.onas-stat:last-child { border-right: none; }
.onas-stat__number {
    display: block;
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 800;
    color: var(--color-secondary);
    line-height: 1;
    margin-bottom: 0.35rem;
}
.onas-stat__label {
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--color-primary);
    text-transform: uppercase;
    letter-spacing: 0.06em;
    opacity: 0.7;
}

/* ── Story section ────────────────────────────────────────────────────── */
.onas-story {
    padding: var(--section-padding);
    background: var(--color-white);
}
.onas-story__grid {
    max-width: var(--container-width);
    margin-inline: auto;
    padding-inline: 1.5rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: center;
}
.onas-story__img-wrap {
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    aspect-ratio: 4/3;
}
.onas-story__img-wrap img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
}
.onas-story__tag {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-secondary);
    margin-bottom: 0.75rem;
}
.onas-story__heading {
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 800;
    color: var(--color-primary);
    line-height: 1.2;
    margin-bottom: 1.5rem;
}
.onas-story__body {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.onas-story__body p {
    font-size: 0.95rem;
    color: #4a6070;
    line-height: 1.75;
}

/* ── Values grid ──────────────────────────────────────────────────────── */
.onas-values {
    padding: var(--section-padding);
    background: var(--color-light-gray);
}
.onas-values__inner {
    max-width: var(--container-width);
    margin-inline: auto;
    padding-inline: 1.5rem;
}
.onas-values__header {
    text-align: center;
    margin-bottom: 3.5rem;
}
.onas-values__tag {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-secondary);
    margin-bottom: 0.75rem;
}
.onas-values__title {
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 800;
    color: var(--color-primary);
}
.onas-values__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}
.onas-value-card {
    background: var(--color-white);
    border-radius: var(--radius);
    padding: 2rem 1.75rem;
    border: 1.5px solid #e4edf5;
    box-shadow: var(--shadow-sm);
    transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.onas-value-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}
.onas-value-card__icon {
    width: 44px; height: 44px;
    border-radius: 10px;
    background: rgba(36, 151, 208, 0.1);
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 1.25rem;
    color: var(--color-secondary);
}
.onas-value-card__icon svg { width: 22px; height: 22px; }
.onas-value-card__title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-primary);
    margin-bottom: 0.6rem;
}
.onas-value-card__text {
    font-size: 0.88rem;
    color: #5a7080;
    line-height: 1.7;
}

/* ── Certifications strip ─────────────────────────────────────────────── */
.onas-certs {
    padding: 4rem 1.5rem;
    background: var(--color-primary);
}
.onas-certs__inner {
    max-width: var(--container-width);
    margin-inline: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 3rem;
    flex-wrap: wrap;
}
.onas-certs__text { flex: 1; min-width: 280px; }
.onas-certs__label {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.6);
    margin-bottom: 0.75rem;
}
.onas-certs__heading {
    font-size: clamp(1.4rem, 2.5vw, 1.9rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 1rem;
}
.onas-certs__desc {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.72);
    line-height: 1.7;
    max-width: 460px;
}
.onas-certs__badges {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
    align-items: center;
}
.onas-cert-badge {
    background: rgba(255,255,255,0.08);
    border: 1.5px solid rgba(255,255,255,0.18);
    border-radius: 8px;
    padding: 1.25rem 1.75rem;
    text-align: center;
    min-width: 140px;
}
.onas-cert-badge__title {
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--color-secondary);
    margin-bottom: 0.3rem;
}
.onas-cert-badge__sub {
    font-size: 0.72rem;
    color: rgba(255,255,255,0.55);
    line-height: 1.4;
}

/* ── CTA ──────────────────────────────────────────────────────────────── */
.onas-cta {
    padding: var(--section-padding);
    background: var(--color-white);
    text-align: center;
}
.onas-cta__inner {
    max-width: 640px;
    margin-inline: auto;
    padding-inline: 1.5rem;
}
.onas-cta__title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: 1rem;
}
.onas-cta__desc {
    font-size: 0.95rem;
    color: #5a7080;
    line-height: 1.7;
    margin-bottom: 2rem;
}
.onas-cta__btns {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}
.onas-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.85rem 2rem;
    border-radius: var(--radius);
    font-size: 0.88rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    transition: background var(--transition-base), transform var(--transition-base), box-shadow var(--transition-base);
    cursor: pointer;
    border: none;
}
.onas-btn--primary {
    background: var(--color-secondary);
    color: #fff;
    box-shadow: 0 4px 18px rgba(36,151,208,0.3);
}
.onas-btn--primary:hover {
    background: var(--color-mid-blue);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(36,151,208,0.4);
}
.onas-btn--outline {
    background: transparent;
    color: var(--color-primary);
    border: 2px solid var(--color-primary);
}
.onas-btn--outline:hover {
    background: var(--color-primary);
    color: #fff;
    transform: translateY(-2px);
}

/* ── Responsive ───────────────────────────────────────────────────────── */
@media (max-width: 900px) {
    .onas-stats__grid { grid-template-columns: repeat(2, 1fr); }
    .onas-stat { border-right: none; border-bottom: 1px solid #e4edf5; }
    .onas-stat:nth-child(odd) { border-right: 1px solid #e4edf5; }
    .onas-stat:nth-last-child(-n+2) { border-bottom: none; }
    .onas-story__grid { grid-template-columns: 1fr; gap: 2.5rem; }
    .onas-values__grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
    .onas-stats__grid { grid-template-columns: 1fr 1fr; }
    .onas-values__grid { grid-template-columns: 1fr; }
    .onas-certs__inner { flex-direction: column; }
}
</style>

<!-- ═══ HERO ════════════════════════════════════════════════════════════════ -->
<section class="onas-hero">
    <div class="onas-hero__inner">
        <p class="onas-hero__label"><?php esc_html_e( 'O nas', 'blue-dragon-jet' ); ?></p>
        <h1 class="onas-hero__title">
            <?php esc_html_e( 'Polska inżynieria', 'blue-dragon-jet' ); ?><br>
            <span><?php esc_html_e( 'na rynkach całego świata', 'blue-dragon-jet' ); ?></span>
        </h1>
        <p class="onas-hero__lead">
            <?php esc_html_e( 'Od ponad dwóch dekad projektujemy i produkujemy maszyny do wdmuchiwania kabli, które pracują w ponad 60 krajach. Łączymy doświadczenie inżynierów z nowoczesną technologią CNC — wszystko pod jednym dachem, w Polsce.', 'blue-dragon-jet' ); ?>
        </p>
    </div>
</section>

<!-- ═══ STATS BAR ════════════════════════════════════════════════════════════ -->
<section class="onas-stats" aria-label="<?php esc_attr_e( 'Liczby', 'blue-dragon-jet' ); ?>">
    <div class="onas-stats__grid">
        <div class="onas-stat">
            <span class="onas-stat__number stat__number" data-target="60">0</span><span class="onas-stat__number" style="font-size:clamp(1.5rem,3vw,2rem);color:var(--color-secondary);font-weight:800;">+</span>
            <span class="onas-stat__label"><?php esc_html_e( 'krajów eksportu', 'blue-dragon-jet' ); ?></span>
        </div>
        <div class="onas-stat">
            <span class="onas-stat__number stat__number" data-target="20">0</span><span class="onas-stat__number" style="font-size:clamp(1.5rem,3vw,2rem);color:var(--color-secondary);font-weight:800;">+</span>
            <span class="onas-stat__label"><?php esc_html_e( 'lat doświadczenia', 'blue-dragon-jet' ); ?></span>
        </div>
        <div class="onas-stat">
            <span class="onas-stat__number stat__number" data-target="36">0</span>
            <span class="onas-stat__number" style="font-size:clamp(1.5rem,3vw,2rem);color:var(--color-secondary);font-weight:800;"> <?php esc_html_e( 'mies.', 'blue-dragon-jet' ); ?></span>
            <span class="onas-stat__label"><?php esc_html_e( 'gwarancja na maszyny', 'blue-dragon-jet' ); ?></span>
        </div>
        <div class="onas-stat">
            <span class="onas-stat__number" style="font-size:clamp(2rem,4vw,2.8rem);font-weight:800;color:var(--color-secondary);line-height:1;display:block;margin-bottom:0.35rem;">ISO</span>
            <span class="onas-stat__label"><?php esc_html_e( '9001:2015 od 2001 r.', 'blue-dragon-jet' ); ?></span>
        </div>
    </div>
</section>

<!-- ═══ STORY ════════════════════════════════════════════════════════════════ -->
<section class="onas-story">
    <div class="onas-story__grid">

        <div class="onas-story__img-wrap">
            <img
                src="https://bluedragonjet.com/wp-content/uploads/2022/12/Gamm-Bud.jpg"
                alt="<?php esc_attr_e( 'Siedziba firmy GAMM-BUD — producent maszyn Blue Dragon Jet', 'blue-dragon-jet' ); ?>"
                loading="lazy"
            >
        </div>

        <div class="onas-story__content">
            <p class="onas-story__tag"><?php esc_html_e( 'Nasza historia', 'blue-dragon-jet' ); ?></p>
            <h2 class="onas-story__heading"><?php esc_html_e( 'GAMM-BUD — maszyny, które pracują na całym świecie', 'blue-dragon-jet' ); ?></h2>
            <div class="onas-story__body">
                <p>
                    <?php esc_html_e( 'Jesteśmy polskim producentem maszyn do wdmuchiwania kabli i mikrokanalizacji, działającym pod marką', 'blue-dragon-jet' ); ?>
                    <strong>Blue Dragon Jet</strong>.
                    <?php esc_html_e( 'Projektujemy, konstruujemy i wytwarzamy wszystko we własnym zakładzie — od prototypu po gotową maszynę, gotową do pracy w terenie.', 'blue-dragon-jet' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'Nasze urządzenia docierają do instalatorów i dystrybutorów w ponad', 'blue-dragon-jet' ); ?>
                    <strong>60 <?php esc_html_e( 'krajach', 'blue-dragon-jet' ); ?></strong>
                    <?php esc_html_e( '— od Europy przez Bliski Wschód po Azję i obie Ameryki. Za każdą maszyną stoi interdyscyplinarny zespół: inżynierowie konstrukcyjni, programiści, operatorzy CNC i specjaliści ds. jakości.', 'blue-dragon-jet' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'Wierzymy, że dobra inżynieria to nie tylko precyzja wykonania, ale też rzetelna obsługa po sprzedaży. Dlatego oferujemy', 'blue-dragon-jet' ); ?>
                    <strong><?php esc_html_e( '36-miesięczną gwarancję', 'blue-dragon-jet' ); ?></strong>
                    <?php esc_html_e( 'na maszyny wdmuchujące i pełne wsparcie techniczne niezależnie od miejsca, w którym pracuje Twój sprzęt.', 'blue-dragon-jet' ); ?>
                </p>
            </div>
        </div>

    </div>
</section>

<!-- ═══ VALUES ═══════════════════════════════════════════════════════════════ -->
<section class="onas-values">
    <div class="onas-values__inner">
        <div class="onas-values__header">
            <p class="onas-values__tag"><?php esc_html_e( 'Dlaczego Blue Dragon Jet', 'blue-dragon-jet' ); ?></p>
            <h2 class="onas-values__title"><?php esc_html_e( 'Co wyróżnia nasze maszyny', 'blue-dragon-jet' ); ?></h2>
        </div>
        <div class="onas-values__grid">

            <div class="onas-value-card">
                <div class="onas-value-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                    </svg>
                </div>
                <h3 class="onas-value-card__title"><?php esc_html_e( 'Produkcja własna, pełna kontrola', 'blue-dragon-jet' ); ?></h3>
                <p class="onas-value-card__text">
                    <?php esc_html_e( 'Każda maszyna powstaje w naszym zakładzie — od projektu CAD, przez obróbkę CNC, po końcowe testy. Nie podwykonawcy, nie kompromisy w jakości.', 'blue-dragon-jet' ); ?>
                </p>
            </div>

            <div class="onas-value-card">
                <div class="onas-value-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3 class="onas-value-card__title"><?php esc_html_e( '36-miesięczna gwarancja', 'blue-dragon-jet' ); ?></h3>
                <p class="onas-value-card__text">
                    <?php esc_html_e( 'Standardowe 12 miesięcy gwarancji na akcesoria i aż 36 miesięcy na maszyny wdmuchujące. Wiemy, że nasz sprzęt wytrzyma — i gwarantujemy to na piśmie.', 'blue-dragon-jet' ); ?>
                </p>
            </div>

            <div class="onas-value-card">
                <div class="onas-value-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                </div>
                <h3 class="onas-value-card__title"><?php esc_html_e( 'Zasięg globalny', 'blue-dragon-jet' ); ?></h3>
                <p class="onas-value-card__text">
                    <?php esc_html_e( 'Działamy w ponad 60 krajach dzięki sieci zaufanych dystrybutorów. Lokalna obsługa, globalna jakość — dostarczamy sprzęt tam, gdzie potrzebujesz.', 'blue-dragon-jet' ); ?>
                </p>
            </div>

            <div class="onas-value-card">
                <div class="onas-value-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/>
                        <path d="M15.54 8.46a5 5 0 0 1 0 7.07M8.46 8.46a5 5 0 0 0 0 7.07"/>
                    </svg>
                </div>
                <h3 class="onas-value-card__title"><?php esc_html_e( 'Wsparcie techniczne', 'blue-dragon-jet' ); ?></h3>
                <p class="onas-value-card__text">
                    <?php esc_html_e( 'Nasi inżynierowie są dostępni zarówno zdalnie, jak i w terenie. Oferujemy szkolenia operatorów, serwis gwarancyjny i pogwarancyjny oraz szybką realizację części zamiennych.', 'blue-dragon-jet' ); ?>
                </p>
            </div>

            <div class="onas-value-card">
                <div class="onas-value-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3 class="onas-value-card__title"><?php esc_html_e( 'Interdyscyplinarny zespół', 'blue-dragon-jet' ); ?></h3>
                <p class="onas-value-card__text">
                    <?php esc_html_e( 'Inżynierowie, konstruktorzy, programiści i operatorzy CNC pracują razem pod jednym dachem. To skraca czas reakcji i pozwala szybko wdrażać niestandardowe rozwiązania.', 'blue-dragon-jet' ); ?>
                </p>
            </div>

            <div class="onas-value-card">
                <div class="onas-value-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </div>
                <h3 class="onas-value-card__title"><?php esc_html_e( 'Produkt z Unii Europejskiej', 'blue-dragon-jet' ); ?></h3>
                <p class="onas-value-card__text">
                    <?php esc_html_e( 'Nasze maszyny są projektowane i wytwarzane w Polsce (UE), zgodnie z europejskimi normami bezpieczeństwa. Precyzyjna inżynieria w konkurencyjnej cenie.', 'blue-dragon-jet' ); ?>
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ═══ CERTIFICATIONS ════════════════════════════════════════════════════════ -->
<section class="onas-certs">
    <div class="onas-certs__inner">
        <div class="onas-certs__text">
            <p class="onas-certs__label"><?php esc_html_e( 'Jakość potwierdzona', 'blue-dragon-jet' ); ?></p>
            <h2 class="onas-certs__heading"><?php esc_html_e( 'Certyfikat ISO 9001:2015', 'blue-dragon-jet' ); ?><br><?php esc_html_e( '— od 2001 roku', 'blue-dragon-jet' ); ?></h2>
            <p class="onas-certs__desc">
                <?php esc_html_e( 'System zarządzania jakością wdrożyliśmy, kiedy większość branży dopiero o nim słyszała. Dziś certyfikat ISO jest dla nas standardem, a nie wyróżnikiem — bo jakość zaczyna się przy projektowaniu, nie przy kontroli końcowej.', 'blue-dragon-jet' ); ?>
            </p>
        </div>
        <div class="onas-certs__badges">
            <div class="onas-cert-badge">
                <div class="onas-cert-badge__title">ISO 9001:2015</div>
                <div class="onas-cert-badge__sub"><?php esc_html_e( 'Certyfikat nr', 'blue-dragon-jet' ); ?><br>200777/A/0001/UK/Po</div>
            </div>
            <div class="onas-cert-badge">
                <div class="onas-cert-badge__title">Made in Poland</div>
                <div class="onas-cert-badge__sub"><?php esc_html_e( 'Projekt &amp; produkcja', 'blue-dragon-jet' ); ?><br><?php esc_html_e( 'w Polsce (UE)', 'blue-dragon-jet' ); ?></div>
            </div>
            <div class="onas-cert-badge">
                <div class="onas-cert-badge__title">36 <?php esc_html_e( 'mies.', 'blue-dragon-jet' ); ?></div>
                <div class="onas-cert-badge__sub"><?php esc_html_e( 'Gwarancja na', 'blue-dragon-jet' ); ?><br><?php esc_html_e( 'maszyny wdmuchujące', 'blue-dragon-jet' ); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ CTA ═══════════════════════════════════════════════════════════════════ -->
<section class="onas-cta">
    <div class="onas-cta__inner">
        <h2 class="onas-cta__title"><?php esc_html_e( 'Chcesz wiedzieć więcej?', 'blue-dragon-jet' ); ?></h2>
        <p class="onas-cta__desc">
            <?php esc_html_e( 'Skontaktuj się z nami — chętnie opowiemy o naszych rozwiązaniach, pokażemy maszyny w akcji lub umówimy prezentację na żywo.', 'blue-dragon-jet' ); ?>
        </p>
        <div class="onas-cta__btns">
            <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="onas-btn onas-btn--primary">
                <?php esc_html_e( 'Skontaktuj się', 'blue-dragon-jet' ); ?>
            </a>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'machine' ) ?: home_url( '/machines/' ) ); ?>" class="onas-btn onas-btn--outline">
                <?php esc_html_e( 'Zobacz maszyny', 'blue-dragon-jet' ); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
