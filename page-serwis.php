<?php
/**
 * Template Name: Serwis
 * Slug: serwis
 */
get_header(); ?>

<style>
/* ── Serwis page ─────────────────────────────────────────────────────────── */
.serwis-hero {
    position: relative;
    padding-top: calc(var(--header-height) + 5rem);
    padding-bottom: 5.5rem;
    background: linear-gradient(135deg, var(--color-primary) 0%, #0e2f45 100%);
    overflow: hidden;
}
.serwis-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url('https://bluedragonjet.com/wp-content/uploads/2026/04/DSC02465-scaled.jpg') center/cover no-repeat;
    opacity: 0.15;
}
/* diagonal clip at bottom */
.serwis-hero::after {
    content: '';
    position: absolute;
    bottom: -2px; left: 0; right: 0;
    height: 80px;
    background: #fff;
    clip-path: polygon(0 100%, 100% 0, 100% 100%);
}
.serwis-hero__inner {
    position: relative;
    z-index: 1;
    max-width: var(--container-width);
    margin-inline: auto;
    padding-inline: 1.5rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}
.serwis-hero__label {
    display: inline-block;
    font-size: 0.72rem; font-weight: 700;
    letter-spacing: 0.14em; text-transform: uppercase;
    color: var(--color-secondary);
    background: rgba(36,151,208,0.15);
    border: 1px solid rgba(36,151,208,0.35);
    border-radius: 20px;
    padding: 0.3rem 0.85rem;
    margin-bottom: 1.25rem;
}
.serwis-hero__title {
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.12;
    margin-bottom: 1.25rem;
}
.serwis-hero__title span { color: var(--color-secondary); }
.serwis-hero__lead {
    font-size: 1rem;
    color: rgba(255,255,255,0.78);
    line-height: 1.75;
    margin-bottom: 2rem;
    max-width: 480px;
}
.serwis-hero__cta {
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.9rem 2rem;
    background: var(--color-secondary);
    color: #fff;
    border-radius: var(--radius);
    font-size: 0.88rem; font-weight: 700;
    letter-spacing: 0.04em; text-transform: uppercase;
    transition: background var(--transition-base), transform var(--transition-base);
    box-shadow: 0 6px 20px rgba(36,151,208,0.35);
}
.serwis-hero__cta:hover { background: var(--color-mid-blue); transform: translateY(-2px); }
.serwis-hero__stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
.serwis-hero__stat {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.14);
    border-radius: 10px;
    padding: 1.25rem 1.5rem;
    text-align: center;
}
.serwis-hero__stat-val {
    display: block;
    font-size: 1.9rem; font-weight: 800;
    color: var(--color-secondary);
    line-height: 1;
    margin-bottom: 0.35rem;
}
.serwis-hero__stat-lbl {
    font-size: 0.75rem; font-weight: 600;
    color: rgba(255,255,255,0.6);
    text-transform: uppercase; letter-spacing: 0.06em;
}

/* ── Features strip ──────────────────────────────────────────────────── */
.serwis-features {
    padding: 5rem 0 4rem;
    background: #fff;
}
.serwis-features__inner {
    max-width: var(--container-width);
    margin-inline: auto;
    padding-inline: 1.5rem;
}

/* 2-column layout: photo left + grid right */
.serwis-features__layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}
.serwis-features__photo {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    line-height: 0;
}
.serwis-features__photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 16px;
}
.serwis-features__right { }
.serwis-features__header {
    text-align: left;
    margin-bottom: 2rem;
}
.serwis-features__eyebrow {
    font-size: 0.72rem; font-weight: 700;
    letter-spacing: 0.14em; text-transform: uppercase;
    color: var(--color-secondary);
    display: block; margin-bottom: 0.75rem;
}
.serwis-features__title {
    font-size: clamp(1.5rem, 2.8vw, 2rem);
    font-weight: 800; color: var(--color-primary);
}
.serwis-features__grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.25rem;
}
.serwis-features__lead {
    font-size: 0.95rem; color: #5a7080; line-height: 1.7; margin-top: 0.6rem;
}

/* Feature list */
.serwis-feat-list {
    list-style: none; padding: 0; margin: 0;
    display: flex; flex-direction: column; gap: 0;
}
.serwis-feat-row {
    display: flex;
    align-items: flex-start;
    gap: 1.25rem;
    padding: 1.4rem 0;
    border-bottom: 1px solid #dce8f0;
}
.serwis-feat-row:last-child { border-bottom: none; }
.serwis-feat-row__icon {
    width: 46px; height: 46px; flex-shrink: 0;
    background: var(--color-secondary);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    color: #fff; margin-top: 2px;
}
.serwis-feat-row__icon svg { stroke: #fff; }
.serwis-feat-row__body h3 {
    font-size: 0.97rem; font-weight: 700;
    color: var(--color-primary);
    margin-bottom: 0.35rem; line-height: 1.3;
}
.serwis-feat-row__body p {
    font-size: 0.85rem; color: #5a7080; line-height: 1.68; margin: 0;
}

/* ── Process steps ───────────────────────────────────────────────────── */
.serwis-process {
    padding: 4rem 0 5rem;
    background: var(--color-light-gray);
}
.serwis-process__inner {
    max-width: var(--container-width);
    margin-inline: auto;
    padding-inline: 1.5rem;
}
.serwis-process__header { text-align: center; margin-bottom: 3rem; }
.serwis-process__eyebrow {
    font-size: 0.72rem; font-weight: 700;
    letter-spacing: 0.14em; text-transform: uppercase;
    color: var(--color-secondary);
    display: block; margin-bottom: 0.75rem;
}
.serwis-process__title {
    font-size: clamp(1.5rem, 2.8vw, 2rem);
    font-weight: 800; color: var(--color-primary);
}
.serwis-steps {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    position: relative;
}
.serwis-steps::before {
    content: '';
    position: absolute;
    top: 28px; left: 12.5%; right: 12.5%;
    height: 2px;
    background: linear-gradient(90deg, var(--color-secondary), var(--color-primary));
    z-index: 0;
}
.serwis-step {
    position: relative; z-index: 1;
    text-align: center;
    padding: 0 1rem;
}
.serwis-step__num {
    width: 56px; height: 56px;
    border-radius: 50%;
    background: var(--color-secondary);
    color: #fff;
    font-size: 1.2rem; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1.25rem;
    box-shadow: 0 4px 16px rgba(36,151,208,0.35);
}
.serwis-step__title { font-size: 0.9rem; font-weight: 700; color: var(--color-primary); margin-bottom: 0.4rem; }
.serwis-step__text  { font-size: 0.8rem; color: #5a7080; line-height: 1.6; }

/* ── Form section ────────────────────────────────────────────────────── */
.serwis-form-section {
    padding: 5rem 0 6rem;
    background: #fff;
}
.serwis-form-section__inner {
    max-width: var(--container-width);
    margin-inline: auto;
    padding-inline: 1.5rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: start;
}
.serwis-form-info__eyebrow {
    font-size: 0.72rem; font-weight: 700;
    letter-spacing: 0.14em; text-transform: uppercase;
    color: var(--color-secondary);
    display: block; margin-bottom: 0.75rem;
}
.serwis-form-info__title {
    font-size: clamp(1.5rem, 2.8vw, 2rem);
    font-weight: 800; color: var(--color-primary);
    margin-bottom: 1rem;
}
.serwis-form-info__lead {
    font-size: 0.93rem; color: #5a7080; line-height: 1.75;
    margin-bottom: 2rem;
}
.serwis-contact-items { display: flex; flex-direction: column; gap: 1.25rem; }
.serwis-contact-item {
    display: flex; gap: 1rem; align-items: center;
    padding: 1rem 1.25rem;
    background: var(--color-light-gray);
    border-radius: 10px;
    border: 1.5px solid #e4edf5;
}
.serwis-contact-item__icon {
    width: 40px; height: 40px; flex-shrink: 0;
    border-radius: 8px;
    background: rgba(36,151,208,0.1);
    display: flex; align-items: center; justify-content: center;
    color: var(--color-secondary);
}
.serwis-contact-item__label {
    display: block; font-size: 0.72rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 0.06em;
    color: #7a90a0; margin-bottom: 0.2rem;
}
.serwis-contact-item__val {
    font-size: 0.9rem; font-weight: 600;
    color: var(--color-primary);
}
.serwis-contact-item__val a { color: var(--color-secondary); }
.serwis-contact-item__val a:hover { text-decoration: underline; }

/* Form box */
.serwis-form-box {
    background: var(--color-light-gray);
    border: 1.5px solid #e4edf5;
    border-radius: 16px;
    padding: 2.5rem 2.25rem;
    box-shadow: var(--shadow-md);
}
.serwis-form-box__title {
    font-size: 1.15rem; font-weight: 800;
    color: var(--color-primary);
    margin-bottom: 0.3rem;
}
.serwis-form-box__sub {
    font-size: 0.82rem; color: #7a90a0;
    margin-bottom: 2rem;
}
.srv-field {
    display: flex; flex-direction: column; gap: 0.35rem;
    margin-bottom: 1rem;
}
.srv-field label {
    font-size: 0.78rem; font-weight: 600;
    color: var(--color-primary); letter-spacing: 0.02em;
}
.srv-field input,
.srv-field select,
.srv-field textarea {
    width: 100%;
    padding: 0.72rem 1rem;
    border: 1.5px solid #d1dce5;
    border-radius: var(--radius);
    font-family: var(--font-base);
    font-size: 1rem; color: var(--color-primary);
    background: #fff;
    outline: none; resize: vertical;
    transition: border-color var(--transition-base), box-shadow var(--transition-base);
}
.srv-field input:focus,
.srv-field select:focus,
.srv-field textarea:focus {
    border-color: var(--color-secondary);
    box-shadow: 0 0 0 3px rgba(36,151,208,0.14);
}
.srv-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
.srv-submit {
    display: flex; align-items: center; justify-content: center;
    gap: 0.6rem;
    width: 100%; margin-top: 0.75rem;
    padding: 1rem 2rem;
    background: var(--color-secondary);
    color: #fff; border: none; border-radius: var(--radius);
    font-family: var(--font-base);
    font-size: 0.92rem; font-weight: 700;
    letter-spacing: 0.04em; text-transform: uppercase;
    cursor: pointer;
    transition: background var(--transition-base), transform var(--transition-base), box-shadow var(--transition-base);
    box-shadow: 0 4px 18px rgba(36,151,208,0.32);
}
.srv-submit:hover { background: var(--color-mid-blue); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(36,151,208,0.42); }
.srv-submit--link { text-decoration: none; }
.srv-success {
    display: flex; align-items: center; gap: 0.9rem;
    padding: 1.25rem 1.5rem;
    background: #e7f7ee; border: 1.5px solid #60c07a;
    border-radius: var(--radius);
    color: #2c7a48; font-weight: 600; font-size: 0.9rem;
    margin-bottom: 1.5rem;
}

/* ── Responsive ──────────────────────────────────────────────────────── */
@media (max-width: 1024px) {
    .serwis-features__layout { grid-template-columns: 1fr; gap: 2.5rem; }
    .serwis-features__photo { max-height: 380px; }
    .serwis-features__header { text-align: center; }
    .serwis-steps::before { display: none; }
    .serwis-steps { grid-template-columns: repeat(2, 1fr); gap: 1.5rem; }
}
@media (max-width: 860px) {
    .serwis-hero__inner { grid-template-columns: 1fr; gap: 2.5rem; }
    .serwis-hero__stats { max-width: 400px; }
    .serwis-form-section__inner { grid-template-columns: 1fr; gap: 2.5rem; }
    .serwis-form-box { order: -1; }
}
@media (max-width: 600px) {
    .serwis-features__grid { grid-template-columns: 1fr; }
    .serwis-steps { grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .serwis-hero__stats { grid-template-columns: 1fr 1fr; }
    .srv-row { grid-template-columns: 1fr; }
    .serwis-form-box { padding: 1.75rem 1.25rem; }
}
</style>

<!-- ═══ HERO ════════════════════════════════════════════════════════════════ -->
<section class="serwis-hero" aria-label="Serwis Blue Dragon Jet">
    <div class="serwis-hero__inner">
        <div class="serwis-hero__text">
            <span class="serwis-hero__label"><?php esc_html_e( 'Wsparcie techniczne', 'blue-dragon-jet' ); ?></span>
            <h1 class="serwis-hero__title">
                <?php esc_html_e( 'Serwis i naprawy', 'blue-dragon-jet' ); ?><br>
                <span><?php esc_html_e( 'maszyn Blue Dragon Jet', 'blue-dragon-jet' ); ?></span>
            </h1>
            <p class="serwis-hero__lead">
                <?php esc_html_e( 'Usterka? Potrzebujesz przeglądu lub kalibracji? Nasz zespół serwisowy działa szybko — wypełnij formularz, odezwiemy się w ciągu 24h i skoordynujemy naprawę od A do Z.', 'blue-dragon-jet' ); ?>
            </p>
            <?php
            $serwis_hero_url = ( function_exists( 'bdj_current_lang' ) && bdj_current_lang() === 'en' )
                ? 'https://jr.bkf.pl/?cmd=PublicStart&ps=a30180b144354882bf1dbfd7aa536a2a&username=externalServiceRegistrationUserEn'
                : 'https://jr.bkf.pl/?cmd=PublicStart&ps=a30180b144354882bf1dbfd7aa536a2a&username=externalServiceRegistrationUser';
            ?>
            <button type="button" class="serwis-hero__cta bdj-serwis-modal-open">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
                <?php esc_html_e( 'Zgłoś usterkę', 'blue-dragon-jet' ); ?>
            </button>
        </div>
        <div class="serwis-hero__stats">
            <div class="serwis-hero__stat">
                <span class="serwis-hero__stat-val">24h</span>
                <span class="serwis-hero__stat-lbl"><?php esc_html_e( 'Czas reakcji', 'blue-dragon-jet' ); ?></span>
            </div>
            <div class="serwis-hero__stat">
                <span class="serwis-hero__stat-val">36</span>
                <span class="serwis-hero__stat-lbl"><?php esc_html_e( 'Mies. gwarancja', 'blue-dragon-jet' ); ?></span>
            </div>
            <div class="serwis-hero__stat">
                <span class="serwis-hero__stat-val">OEM</span>
                <span class="serwis-hero__stat-lbl"><?php esc_html_e( 'Oryg. części', 'blue-dragon-jet' ); ?></span>
            </div>
            <div class="serwis-hero__stat">
                <span class="serwis-hero__stat-val">60+</span>
                <span class="serwis-hero__stat-lbl"><?php esc_html_e( 'Krajów obsługi', 'blue-dragon-jet' ); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- ═══ FEATURES ════════════════════════════════════════════════════════════ -->
<section class="serwis-features">
    <div class="serwis-features__inner">
        <div class="serwis-features__layout">

            <!-- Zdjęcie po lewej -->
            <div class="serwis-features__photo" data-aos="fade-right">
                <img src="/wp-content/uploads/2026/05/IMG_20230719_133929-scaled-1.jpg"
                     alt="Serwis maszyn Blue Dragon Jet" loading="lazy">
            </div>

            <!-- Nagłówek + lista po prawej -->
            <div class="serwis-features__right">
                <div class="serwis-features__header" data-aos="fade-up">
                    <span class="serwis-features__eyebrow"><?php esc_html_e( 'Co oferujemy', 'blue-dragon-jet' ); ?></span>
                    <h2 class="serwis-features__title"><?php esc_html_e( 'Kompleksowa obsługa serwisowa', 'blue-dragon-jet' ); ?></h2>
                    <p class="serwis-features__lead"><?php esc_html_e( 'Każda maszyna BDJ objęta jest pełnym wsparciem — od gwarancji, przez części zamienne, aż po regularne przeglądy i kalibrację.', 'blue-dragon-jet' ); ?></p>
                </div>

                <ul class="serwis-feat-list">

                    <li class="serwis-feat-row" data-aos="fade-up" data-aos-delay="0">
                        <div class="serwis-feat-row__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="22" height="22"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
                        </div>
                        <div class="serwis-feat-row__body">
                            <h3><?php esc_html_e( 'Serwis gwarancyjny i pogwarancyjny', 'blue-dragon-jet' ); ?></h3>
                            <p><?php esc_html_e( 'Naprawiamy wszystkie modele BDJ — w gwarancji bezpłatnie, poza nią: transparentny kosztorys zanim cokolwiek rozłożymy.', 'blue-dragon-jet' ); ?></p>
                        </div>
                    </li>

                    <li class="serwis-feat-row" data-aos="fade-up" data-aos-delay="60">
                        <div class="serwis-feat-row__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="22" height="22"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.86 19.86 0 01-8.67-3.29 19.74 19.74 0 01-6-6 19.86 19.86 0 01-3.29-8.7A2 2 0 013.86 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
                        </div>
                        <div class="serwis-feat-row__body">
                            <h3><?php esc_html_e( 'Zdalna diagnostyka bez wysyłki maszyny', 'blue-dragon-jet' ); ?></h3>
                            <p><?php esc_html_e( 'Wiele usterek rozwiązujemy przez telefon lub videokonsultację — nasz technik przeprowadza Cię krok po kroku, bez kosztów transportu.', 'blue-dragon-jet' ); ?></p>
                        </div>
                    </li>

                    <li class="serwis-feat-row" data-aos="fade-up" data-aos-delay="180">
                        <div class="serwis-feat-row__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="22" height="22"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                        </div>
                        <div class="serwis-feat-row__body">
                            <h3><?php esc_html_e( 'Przeglądy okresowe i kalibracja', 'blue-dragon-jet' ); ?></h3>
                            <p><?php esc_html_e( 'Regularne przeglądy i certyfikowana kalibracja zapewniają precyzję i niezawodność — Twoja maszyna wraca z protokołem serwisowym i nową gwarancją na naprawione części.', 'blue-dragon-jet' ); ?></p>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</section>

<!-- ═══ PROCES SERWISOWY — 4 kroki ══════════════════════════════════════════ -->
<section class="serwis-process">
    <div class="serwis-process__inner">
        <div class="serwis-process__header" data-aos="fade-up">
            <span class="serwis-process__eyebrow"><?php esc_html_e( 'Jak to działa', 'blue-dragon-jet' ); ?></span>
            <h2 class="serwis-process__title"><?php esc_html_e( 'Proces serwisowy w 4 krokach', 'blue-dragon-jet' ); ?></h2>
        </div>
        <div class="serwis-steps">
            <div class="serwis-step" data-aos="fade-up" data-aos-delay="0">
                <div class="serwis-step__num">1</div>
                <h3 class="serwis-step__title"><?php esc_html_e( 'Wypełnij formularz', 'blue-dragon-jet' ); ?></h3>
                <p class="serwis-step__text"><?php esc_html_e( 'Opisz usterkę i podaj model maszyny. Zajmuje to mniej niż 2 minuty.', 'blue-dragon-jet' ); ?></p>
            </div>
            <div class="serwis-step" data-aos="fade-up" data-aos-delay="80">
                <div class="serwis-step__num">2</div>
                <h3 class="serwis-step__title"><?php esc_html_e( 'Wycena w 24h', 'blue-dragon-jet' ); ?></h3>
                <p class="serwis-step__text"><?php esc_html_e( 'Nasz technik analizuje zgłoszenie i kontaktuje się z wyceną lub zdalną diagnostyką.', 'blue-dragon-jet' ); ?></p>
            </div>
            <div class="serwis-step" data-aos="fade-up" data-aos-delay="160">
                <div class="serwis-step__num">3</div>
                <h3 class="serwis-step__title"><?php esc_html_e( 'Naprawa lub wysyłka', 'blue-dragon-jet' ); ?></h3>
                <p class="serwis-step__text"><?php esc_html_e( 'Rozwiązujemy problem zdalnie lub wysyłamy część / organizujemy odbiór maszyny.', 'blue-dragon-jet' ); ?></p>
            </div>
            <div class="serwis-step" data-aos="fade-up" data-aos-delay="240">
                <div class="serwis-step__num">4</div>
                <h3 class="serwis-step__title"><?php esc_html_e( 'Protokół i zwrot', 'blue-dragon-jet' ); ?></h3>
                <p class="serwis-step__text"><?php esc_html_e( 'Otrzymujesz protokół serwisowy i maszynę gotową do pracy — z nową gwarancją na naprawione części.', 'blue-dragon-jet' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ FORMULARZ ════════════════════════════════════════════════════════════ -->
<section id="formularz-serwisowy" class="serwis-form-section" aria-labelledby="srv-form-title">
    <div class="serwis-form-section__inner">

        <!-- Lewa: info kontaktowe -->
        <div class="serwis-form-info" data-aos="fade-right">
            <span class="serwis-form-info__eyebrow"><?php esc_html_e( 'Formularz serwisowy', 'blue-dragon-jet' ); ?></span>
            <h2 class="serwis-form-info__title" id="srv-form-title"><?php esc_html_e( 'Zgłoś usterkę online', 'blue-dragon-jet' ); ?></h2>
            <p class="serwis-form-info__lead">
                <?php esc_html_e( 'Wypełnij formularz jak najdokładniej — im więcej szczegółów, tym szybciej nasz technik zdiagnozuje problem i zaproponuje rozwiązanie. Odpowiadamy w ciągu', 'blue-dragon-jet' ); ?> <strong><?php esc_html_e( '24 godzin roboczych', 'blue-dragon-jet' ); ?></strong>.
            </p>
            <div class="serwis-contact-items">
                <div class="serwis-contact-item">
                    <div class="serwis-contact-item__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="20" height="20"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.86 19.86 0 01-8.67-3.29 19.74 19.74 0 01-6-6 19.86 19.86 0 01-3.29-8.7A2 2 0 013.86 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
                    </div>
                    <div>
                        <span class="serwis-contact-item__label"><?php esc_html_e( 'Telefon serwisowy', 'blue-dragon-jet' ); ?></span>
                        <span class="serwis-contact-item__val"><a href="tel:+48695881783">+48 695 881 783</a></span>
                    </div>
                </div>
                <div class="serwis-contact-item">
                    <div class="serwis-contact-item__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="20" height="20"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <span class="serwis-contact-item__label"><?php esc_html_e( 'E-mail serwisowy', 'blue-dragon-jet' ); ?></span>
                        <span class="serwis-contact-item__val"><a href="mailto:serwis@bluedragonjet.com">serwis@bluedragonjet.com</a></span>
                    </div>
                </div>
                <div class="serwis-contact-item">
                    <div class="serwis-contact-item__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="20" height="20"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <span class="serwis-contact-item__label"><?php esc_html_e( 'Godziny pracy serwisu', 'blue-dragon-jet' ); ?></span>
                        <span class="serwis-contact-item__val"><?php esc_html_e( 'Pon–Pt: 8:00–16:00', 'blue-dragon-jet' ); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Prawa: przycisk otwierający modal z formularzem -->
        <div class="serwis-form-box serwis-form-box--cta" data-aos="fade-left">
            <h3 class="serwis-form-box__title"><?php esc_html_e( 'Formularz zgłoszenia serwisowego', 'blue-dragon-jet' ); ?></h3>
            <p class="serwis-form-box__sub"><?php esc_html_e( 'Kliknij poniższy przycisk, aby przejść do systemu zgłoszeń serwisowych.', 'blue-dragon-jet' ); ?></p>
            <button type="button" class="srv-submit bdj-serwis-modal-open">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17" aria-hidden="true"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                <?php esc_html_e( 'Zgłoś usterkę', 'blue-dragon-jet' ); ?>
            </button>
        </div>

    </div>
</section>

<?php
$_serwis_iframe_url = ( function_exists( 'bdj_current_lang' ) && bdj_current_lang() === 'en' )
    ? 'https://jr.bkf.pl/?cmd=PublicStart&ps=a30180b144354882bf1dbfd7aa536a2a&username=externalServiceRegistrationUserEn'
    : 'https://jr.bkf.pl/?cmd=PublicStart&ps=a30180b144354882bf1dbfd7aa536a2a&username=externalServiceRegistrationUser';
?>

<!-- Modal serwisowy -->
<div id="bdj-serwis-modal" class="bdj-serwis-modal" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Formularz serwisowy', 'blue-dragon-jet' ); ?>" hidden>
    <div class="bdj-serwis-modal__backdrop"></div>
    <div class="bdj-serwis-modal__box">
        <div class="bdj-serwis-modal__header">
            <span class="bdj-serwis-modal__title"><?php esc_html_e( 'Formularz serwisowy', 'blue-dragon-jet' ); ?></span>
            <button type="button" class="bdj-serwis-modal__close" aria-label="<?php esc_attr_e( 'Zamknij', 'blue-dragon-jet' ); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="20" height="20" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <div class="bdj-serwis-modal__body">
            <div class="bdj-serwis-modal__spinner" aria-hidden="true"></div>
            <iframe
                id="bdj-serwis-iframe"
                src="about:blank"
                data-src="<?php echo esc_attr( $_serwis_iframe_url ); ?>"
                title="<?php esc_attr_e( 'Formularz serwisowy', 'blue-dragon-jet' ); ?>"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

<style>
.bdj-serwis-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}
.bdj-serwis-modal[hidden] { display: none; }

.bdj-serwis-modal__backdrop {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,.65);
    backdrop-filter: blur(3px);
    cursor: pointer;
}
.bdj-serwis-modal__box {
    position: relative;
    z-index: 1;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 24px 64px rgba(0,0,0,.25);
    width: 100%;
    max-width: 960px;
    height: 90vh;
    max-height: 860px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    animation: bdj-modal-in .22s ease;
}
@keyframes bdj-modal-in {
    from { opacity: 0; transform: translateY(16px) scale(.98); }
    to   { opacity: 1; transform: none; }
}
.bdj-serwis-modal__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: .9rem 1.25rem;
    border-bottom: 1px solid #e8ecf0;
    flex-shrink: 0;
}
.bdj-serwis-modal__title {
    font-weight: 600;
    font-size: 1rem;
    color: var(--color-dark, #1a2233);
}
.bdj-serwis-modal__close {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    border: none;
    background: #f3f5f7;
    border-radius: 50%;
    cursor: pointer;
    transition: background .15s;
    color: #555;
}
.bdj-serwis-modal__close:hover { background: #e4e8ec; color: #111; }

.bdj-serwis-modal__body {
    flex: 1;
    position: relative;
    overflow: hidden;
}
.bdj-serwis-modal__body iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: none;
    opacity: 0;
    transition: opacity .3s;
}
.bdj-serwis-modal__body iframe.is-loaded { opacity: 1; }

.bdj-serwis-modal__spinner {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: none;
}
.bdj-serwis-modal__spinner::after {
    content: '';
    width: 36px;
    height: 36px;
    border: 3px solid #e0e5ea;
    border-top-color: var(--color-primary, #0057a8);
    border-radius: 50%;
    animation: bdj-spin .7s linear infinite;
}
.bdj-serwis-modal__spinner.is-hidden { display: none; }
@keyframes bdj-spin { to { transform: rotate(360deg); } }

@media (max-width: 600px) {
    .bdj-serwis-modal { padding: 0; }
    .bdj-serwis-modal__box { border-radius: 0; height: 100dvh; max-height: none; }
}
</style>

<script>
(function () {
    var modal   = document.getElementById('bdj-serwis-modal');
    var iframe  = document.getElementById('bdj-serwis-iframe');
    var spinner = modal ? modal.querySelector('.bdj-serwis-modal__spinner') : null;

    function openModal() {
        if (!modal || !iframe) return;
        modal.hidden = false;
        document.body.style.overflow = 'hidden';
        // Załaduj iframe przy pierwszym otwarciu
        if (iframe.src === 'about:blank' || !iframe.src) {
            iframe.src = iframe.dataset.src;
            iframe.addEventListener('load', function () {
                iframe.classList.add('is-loaded');
                if (spinner) spinner.classList.add('is-hidden');
            }, { once: true });
        }
        // Focus trap — focus na przycisk zamknięcia
        var closeBtn = modal.querySelector('.bdj-serwis-modal__close');
        if (closeBtn) setTimeout(function(){ closeBtn.focus(); }, 50);
    }

    function closeModal() {
        if (!modal) return;
        modal.hidden = true;
        document.body.style.overflow = '';
    }

    // Otwieraj każdy przycisk z klasą bdj-serwis-modal-open
    document.querySelectorAll('.bdj-serwis-modal-open').forEach(function (btn) {
        btn.addEventListener('click', openModal);
    });

    // Zamknij przez X lub backdrop
    if (modal) {
        modal.querySelector('.bdj-serwis-modal__close').addEventListener('click', closeModal);
        modal.querySelector('.bdj-serwis-modal__backdrop').addEventListener('click', closeModal);
    }

    // Zamknij przez Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal && !modal.hidden) closeModal();
    });
})();
</script>

<?php get_footer(); ?>
