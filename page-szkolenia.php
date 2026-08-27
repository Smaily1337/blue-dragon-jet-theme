<?php
/**
 * Template Name: BDJ Academy
 * Template Post Type: page
 */
get_header();
?>

<!-- ── Hero akademii ── -->
<section class="academy-hero">
    <div class="academy-hero__bg" aria-hidden="true"></div>
    <div class="academy-hero__overlay" aria-hidden="true"></div>
    <div class="container academy-hero__content">
        <span class="academy-hero__eyebrow"><?php esc_html_e( 'Wiedza i szkolenia', 'blue-dragon-jet' ); ?></span>
        <h1 class="academy-hero__title">
            BDJ <span class="academy-hero__accent">Academy</span>
        </h1>
        <p class="academy-hero__sub">
            <?php esc_html_e( 'Profesjonalne szkolenia z zakresu wdmuchiwania kabli, obsługi maszyn i optymalizacji instalacji światłowodowych.', 'blue-dragon-jet' ); ?>
        </p>
        <a href="#kursy" class="hero__cta"><?php esc_html_e( 'Zobacz kursy', 'blue-dragon-jet' ); ?></a>
    </div>
</section>

<!-- ── Dlaczego BDJ Academy ── -->
<section class="academy-why">
    <div class="container">
        <div class="academy-why__layout">

            <!-- Zdjęcie po lewej -->
            <div class="academy-why__photo" data-aos="fade-right">
                <img src="/wp-content/uploads/2026/05/Frame-30.png"
                     alt="Szkolenie Blue Dragon Jet Academy – praktyczne ćwiczenia" loading="lazy">
            </div>

            <!-- Treść po prawej -->
            <div class="academy-why__content">
                <header class="academy-why__header" data-aos="fade-up">
                    <span class="section-header__eyebrow"><?php esc_html_e( 'Dlaczego warto', 'blue-dragon-jet' ); ?></span>
                    <h2 class="section-header__title"><?php esc_html_e( 'Szkolenia stworzone przez praktyków', 'blue-dragon-jet' ); ?></h2>
                    <p class="academy-why__lead"><?php esc_html_e( 'Nasi trenerzy to inżynierowie z wieloletnią praktyką terenową — uczą tego, co sami stosują na co dzień.', 'blue-dragon-jet' ); ?></p>
                </header>

                <ul class="academy-why__list">

                    <li class="academy-why__item" data-aos="fade-up" data-aos-delay="0">
                        <div class="academy-why__item-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                            </svg>
                        </div>
                        <div class="academy-why__item-body">
                            <h3><?php esc_html_e( 'Teoria połączona z praktyką', 'blue-dragon-jet' ); ?></h3>
                            <p><?php esc_html_e( 'Każde szkolenie to połowa sali i połowa warsztatu — uczestnicy ćwiczą wdmuchiwanie kabli na prawdziwych maszynach BDJ w warunkach zbliżonych do tych z placu budowy.', 'blue-dragon-jet' ); ?></p>
                        </div>
                    </li>

                    <li class="academy-why__item" data-aos="fade-up" data-aos-delay="60">
                        <div class="academy-why__item-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                        <div class="academy-why__item-body">
                            <h3><?php esc_html_e( 'Kameralne grupy, indywidualne podejście', 'blue-dragon-jet' ); ?></h3>
                            <p><?php esc_html_e( 'Maksymalnie 10 uczestników na jedną edycję. Każdy ma czas na pytania, może wielokrotnie powtórzyć ćwiczenie i wyjść z kursu pewny swoich umiejętności.', 'blue-dragon-jet' ); ?></p>
                        </div>
                    </li>

                    <li class="academy-why__item" data-aos="fade-up" data-aos-delay="120">
                        <div class="academy-why__item-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
                                <circle cx="12" cy="8" r="6"/>
                                <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/>
                            </svg>
                        </div>
                        <div class="academy-why__item-body">
                            <h3><?php esc_html_e( 'Certyfikat rozpoznawany w branży', 'blue-dragon-jet' ); ?></h3>
                            <p><?php esc_html_e( 'Absolwenci otrzymują imienny certyfikat Blue Dragon Jet Academy. Dokument potwierdzający kompetencje operatora — cenny przy przetargach i audytach.', 'blue-dragon-jet' ); ?></p>
                        </div>
                    </li>

                    <li class="academy-why__item" data-aos="fade-up" data-aos-delay="180">
                        <div class="academy-why__item-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <polyline points="9 12 11 14 15 10"/>
                            </svg>
                        </div>
                        <div class="academy-why__item-body">
                            <h3><?php esc_html_e( 'Autoryzowani inżynierowie BDJ', 'blue-dragon-jet' ); ?></h3>
                            <p><?php esc_html_e( 'Szkolenia prowadzą wyłącznie inżynierowie z certyfikacją Blue Dragon Jet — ci sami, którzy projektują maszyny i wspierają klientów na co dzień.', 'blue-dragon-jet' ); ?></p>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</section>

<!-- ── Cennik szkoleń ── -->
<section class="academy-pricing" id="cennik">
    <div class="container">
        <div class="academy-pricing__header" data-aos="fade-up">
            <h2><?php esc_html_e( 'Cennik szkoleń', 'blue-dragon-jet' ); ?></h2>
            <p><?php esc_html_e( 'Wybierz pakiet dopasowany do wielkości Twojego zespołu. Cena zawiera materiały szkoleniowe i certyfikat ukończenia.', 'blue-dragon-jet' ); ?></p>
        </div>
        <div class="academy-pricing__cards" data-aos="fade-up" data-aos-delay="100">

            <!-- Pakiet S -->
            <div class="academy-pricing__card">
                <div class="academy-pricing__card-header">
                    <span class="academy-pricing__plan"><?php esc_html_e( 'Pakiet S', 'blue-dragon-jet' ); ?></span>
                    <span class="academy-pricing__people"><?php esc_html_e( 'do 2 osób', 'blue-dragon-jet' ); ?></span>
                </div>
                <div class="academy-pricing__price">
                    <span class="academy-pricing__amount">1 500</span>
                    <span class="academy-pricing__currency">zł<small class="academy-pricing__net">netto</small></span>
                </div>
                <ul class="academy-pricing__features">
                    <li><?php esc_html_e( 'Szkolenie dla 1–2 uczestników', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Materiały szkoleniowe', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Certyfikat ukończenia', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Praktyczne ćwiczenia na maszynie', 'blue-dragon-jet' ); ?></li>
                </ul>
                <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="academy-pricing__cta">
                    <?php esc_html_e( 'Zapytaj o termin', 'blue-dragon-jet' ); ?> &rarr;
                </a>
            </div>

            <!-- Pakiet M -->
            <div class="academy-pricing__card academy-pricing__card--featured">
                <div class="academy-pricing__badge"><?php esc_html_e( 'Najpopularniejszy', 'blue-dragon-jet' ); ?></div>
                <div class="academy-pricing__card-header">
                    <span class="academy-pricing__plan"><?php esc_html_e( 'Pakiet M', 'blue-dragon-jet' ); ?></span>
                    <span class="academy-pricing__people"><?php esc_html_e( 'do 5 osób', 'blue-dragon-jet' ); ?></span>
                </div>
                <div class="academy-pricing__price">
                    <span class="academy-pricing__amount">2 400</span>
                    <span class="academy-pricing__currency">zł<small class="academy-pricing__net">netto</small></span>
                </div>
                <ul class="academy-pricing__features">
                    <li><?php esc_html_e( 'Szkolenie dla 3–5 uczestników', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Materiały szkoleniowe', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Certyfikat ukończenia', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Praktyczne ćwiczenia na maszynie', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Konsultacje po szkoleniu (30 dni)', 'blue-dragon-jet' ); ?></li>
                </ul>
                <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="academy-pricing__cta academy-pricing__cta--featured">
                    <?php esc_html_e( 'Zapytaj o termin', 'blue-dragon-jet' ); ?> &rarr;
                </a>
            </div>

            <!-- Pakiet L -->
            <div class="academy-pricing__card">
                <div class="academy-pricing__card-header">
                    <span class="academy-pricing__plan"><?php esc_html_e( 'Pakiet L', 'blue-dragon-jet' ); ?></span>
                    <span class="academy-pricing__people"><?php esc_html_e( 'do 10 osób', 'blue-dragon-jet' ); ?></span>
                </div>
                <div class="academy-pricing__price">
                    <span class="academy-pricing__amount">3 900</span>
                    <span class="academy-pricing__currency">zł<small class="academy-pricing__net">netto</small></span>
                </div>
                <ul class="academy-pricing__features">
                    <li><?php esc_html_e( 'Szkolenie dla 6–10 uczestników', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Materiały szkoleniowe', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Certyfikat ukończenia', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Praktyczne ćwiczenia na maszynie', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Konsultacje po szkoleniu (60 dni)', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Szkolenie u Ciebie w firmie', 'blue-dragon-jet' ); ?></li>
                </ul>
                <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="academy-pricing__cta">
                    <?php esc_html_e( 'Zapytaj o termin', 'blue-dragon-jet' ); ?> &rarr;
                </a>
            </div>

        </div>
        <div class="academy-pricing__includes" data-aos="fade-up" data-aos-delay="200">
            <div class="academy-pricing__includes-grid">
                <div class="academy-pricing__include-item">
                    <span class="academy-pricing__include-icon">📚</span>
                    <span><?php esc_html_e( 'Materiały szkoleniowe', 'blue-dragon-jet' ); ?></span>
                </div>
                <div class="academy-pricing__include-item">
                    <span class="academy-pricing__include-icon">☕</span>
                    <span><?php esc_html_e( 'Śniadanie', 'blue-dragon-jet' ); ?></span>
                </div>
                <div class="academy-pricing__include-item">
                    <span class="academy-pricing__include-icon">🍽️</span>
                    <span><?php esc_html_e( 'Obiad', 'blue-dragon-jet' ); ?></span>
                </div>
                <div class="academy-pricing__include-item">
                    <span class="academy-pricing__include-icon">🎁</span>
                    <span><?php esc_html_e( 'Pakiet gadżetów firmowych', 'blue-dragon-jet' ); ?></span>
                </div>
                <div class="academy-pricing__include-item">
                    <span class="academy-pricing__include-icon">🏅</span>
                    <span><?php esc_html_e( 'Certyfikat ukończenia', 'blue-dragon-jet' ); ?></span>
                </div>
            </div>
            <p class="academy-pricing__note">
                <?php esc_html_e( '* Ceny netto. Do podanych kwot należy doliczyć podatek VAT 23%. W przypadku większych grup prosimy o indywidualną wycenę.', 'blue-dragon-jet' ); ?>
            </p>
        </div>
    </div>
</section>

<style>
.academy-pricing {
    padding: 80px 0;
    background: #f8fafc;
}
.academy-pricing__header {
    text-align: center;
    margin-bottom: 48px;
}
.academy-pricing__header h2 {
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    font-weight: 700;
    color: var(--color-primary, #1E425D);
    margin-bottom: 12px;
}
.academy-pricing__header p {
    font-size: 1.05rem;
    color: #555;
    max-width: 560px;
    margin: 0 auto;
    line-height: 1.65;
}
.academy-pricing__cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
    max-width: 960px;
    margin: 0 auto;
}
.academy-pricing__card {
    background: #fff;
    border: 2px solid #e8edf2;
    border-radius: 16px;
    padding: 36px 28px 32px;
    display: flex;
    flex-direction: column;
    position: relative;
    transition: box-shadow 0.25s, transform 0.25s;
}
.academy-pricing__card:hover {
    box-shadow: 0 8px 32px rgba(30,66,93,0.10);
    transform: translateY(-4px);
}
.academy-pricing__card--featured {
    border-color: var(--color-secondary, #2497D0);
    box-shadow: 0 8px 40px rgba(36,151,208,0.16);
}
.academy-pricing__badge {
    position: absolute;
    top: -14px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--color-secondary, #2497D0);
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .06em;
    text-transform: uppercase;
    padding: 4px 16px;
    border-radius: 20px;
    white-space: nowrap;
}
.academy-pricing__card-header {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    margin-bottom: 18px;
}
.academy-pricing__plan {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--color-primary, #1E425D);
}
.academy-pricing__people {
    font-size: 0.85rem;
    color: var(--color-secondary, #2497D0);
    font-weight: 600;
    background: rgba(36,151,208,0.1);
    padding: 3px 10px;
    border-radius: 20px;
}
.academy-pricing__price {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 6px;
    margin-bottom: 24px;
    border-bottom: 1px solid #eef1f5;
    padding-bottom: 20px;
}
.academy-pricing__amount {
    font-size: 2.8rem;
    font-weight: 800;
    color: var(--color-primary, #1E425D);
    line-height: 1;
}
.academy-pricing__currency {
    font-size: 1.1rem;
    font-weight: 600;
    color: #777;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 1px;
}
.academy-pricing__net {
    font-size: 0.65rem;
    font-weight: 600;
    letter-spacing: .05em;
    text-transform: uppercase;
    color: #aaa;
    display: block;
}
.academy-pricing__features {
    list-style: none;
    padding: 0;
    margin: 0 0 28px 0;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.academy-pricing__features li {
    font-size: 0.9rem;
    color: #444;
    padding-left: 22px;
    position: relative;
    line-height: 1.5;
}
.academy-pricing__features li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--color-secondary, #2497D0);
    font-weight: 700;
}
.academy-pricing__cta {
    display: block;
    text-align: center;
    background: var(--color-primary, #1E425D);
    color: #fff;
    text-decoration: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: background 0.2s, transform 0.2s;
}
.academy-pricing__cta:hover {
    background: #163248;
    transform: translateY(-1px);
    color: #fff;
    text-decoration: none;
}
.academy-pricing__cta--featured {
    background: var(--color-secondary, #2497D0);
}
.academy-pricing__cta--featured:hover {
    background: #1a7ab5;
}
.academy-pricing__includes {
    margin-top: 40px;
}
.academy-pricing__includes-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px 24px;
    margin-bottom: 20px;
    background: #fff;
    border: 1.5px solid #e2ecf5;
    border-radius: 14px;
    padding: 20px 24px;
    max-width: 760px;
    margin-left: auto;
    margin-right: auto;
}
.academy-pricing__include-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.88rem;
    font-weight: 600;
    color: #1E425D;
}
.academy-pricing__include-icon {
    font-size: 1.2rem;
}
.academy-pricing__note {
    text-align: center;
    font-size: 0.8rem;
    color: #888;
    margin-top: 16px;
    max-width: 640px;
    margin-left: auto;
    margin-right: auto;
}
@media (max-width: 768px) {
    .academy-pricing__cards {
        grid-template-columns: 1fr;
        max-width: 400px;
    }
    .academy-pricing__card--featured {
        order: -1;
    }
    .academy-pricing__includes-grid {
        gap: 10px 16px;
        padding: 16px;
    }
}
</style>

<!-- ── Treść strony (opcjonalna — z WordPress edytora) ── -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    $content = get_the_content();
    if ( $content ) : ?>
<section class="academy-content">
    <div class="container">
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php endif; endwhile; endif; ?>

<!-- ── CTA banner ── -->
<section class="academy-cta-banner">
    <div class="container">
        <div class="academy-cta-banner__inner">
            <div class="academy-cta-banner__text">
                <h2><?php esc_html_e( 'Gotowy na szkolenie?', 'blue-dragon-jet' ); ?></h2>
                <p><?php esc_html_e( 'Skontaktuj się z nami, a dobierzemy odpowiedni kurs dla Ciebie i Twojego zespołu.', 'blue-dragon-jet' ); ?></p>
            </div>
            <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="mpp__cta mpp__cta--primary" style="min-width:200px;display:inline-block;text-align:center;">
                <?php esc_html_e( 'SKONTAKTUJ SIĘ', 'blue-dragon-jet' ); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
