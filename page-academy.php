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
        <header class="section-header" data-aos="fade-up">
            <span class="section-header__eyebrow"><?php esc_html_e( 'Dlaczego warto', 'blue-dragon-jet' ); ?></span>
            <h2 class="section-header__title"><?php esc_html_e( 'Szkolenia stworzone przez praktyków', 'blue-dragon-jet' ); ?></h2>
        </header>
        <div class="academy-why__grid">

            <div class="academy-why__card" data-aos="fade-up" data-aos-delay="0">
                <div class="academy-why__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                </div>
                <h3><?php esc_html_e( 'Teoria i praktyka', 'blue-dragon-jet' ); ?></h3>
                <p><?php esc_html_e( 'Każde szkolenie łączy solidną wiedzę techniczną z ćwiczeniami na rzeczywistym sprzęcie Blue Dragon Jet.', 'blue-dragon-jet' ); ?></p>
            </div>

            <div class="academy-why__card" data-aos="fade-up" data-aos-delay="100">
                <div class="academy-why__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3><?php esc_html_e( 'Małe grupy', 'blue-dragon-jet' ); ?></h3>
                <p><?php esc_html_e( 'Kameralne grupy do 8 osób gwarantują indywidualne podejście i czas na każde pytanie uczestnika.', 'blue-dragon-jet' ); ?></p>
            </div>

            <div class="academy-why__card" data-aos="fade-up" data-aos-delay="200">
                <div class="academy-why__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6"/>
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/>
                    </svg>
                </div>
                <h3><?php esc_html_e( 'Certyfikat ukończenia', 'blue-dragon-jet' ); ?></h3>
                <p><?php esc_html_e( 'Po ukończeniu szkolenia każdy uczestnik otrzymuje certyfikat Blue Dragon Jet Academy potwierdzający kompetencje.', 'blue-dragon-jet' ); ?></p>
            </div>

            <div class="academy-why__card" data-aos="fade-up" data-aos-delay="300">
                <div class="academy-why__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <polyline points="9 12 11 14 15 10"/>
                    </svg>
                </div>
                <h3><?php esc_html_e( 'Autoryzowane centrum', 'blue-dragon-jet' ); ?></h3>
                <p><?php esc_html_e( 'Szkolenia prowadzone przez autoryzowanych inżynierów Blue Dragon Jet z wieloletnim doświadczeniem w branży.', 'blue-dragon-jet' ); ?></p>
            </div>

        </div>
    </div>
</section>

<!-- ── Kursy ── -->
<section id="kursy" class="academy-courses">
    <div class="container">
        <header class="section-header" data-aos="fade-up">
            <span class="section-header__eyebrow"><?php esc_html_e( 'Oferta szkoleń', 'blue-dragon-jet' ); ?></span>
            <h2 class="section-header__title"><?php esc_html_e( 'Dostępne kursy', 'blue-dragon-jet' ); ?></h2>
        </header>

        <div class="academy-courses__grid">

            <!-- Kurs 1 -->
            <article class="academy-course-card" data-aos="fade-up">
                <div class="academy-course-card__badge"><?php esc_html_e( 'Podstawowy', 'blue-dragon-jet' ); ?></div>
                <h3 class="academy-course-card__title"><?php esc_html_e( 'Obsługa maszyn BDJ', 'blue-dragon-jet' ); ?></h3>
                <ul class="academy-course-card__list">
                    <li><?php esc_html_e( 'Zasady wdmuchiwania kabli i mikrokabli', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Przygotowanie trasy instalacyjnej', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Obsługa i regulacja maszyny', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Diagnostyka błędów i rozwiązywanie problemów', 'blue-dragon-jet' ); ?></li>
                </ul>
                <div class="academy-course-card__meta">
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> 2 dni</span>
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg> maks. 8 os.</span>
                </div>
                <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="academy-course-card__cta">
                    <?php esc_html_e( 'Zapisz się', 'blue-dragon-jet' ); ?> &rarr;
                </a>
            </article>

            <!-- Kurs 2 -->
            <article class="academy-course-card academy-course-card--featured" data-aos="fade-up" data-aos-delay="100">
                <div class="academy-course-card__badge"><?php esc_html_e( 'Zaawansowany', 'blue-dragon-jet' ); ?></div>
                <h3 class="academy-course-card__title"><?php esc_html_e( 'Serwis i konserwacja maszyn', 'blue-dragon-jet' ); ?></h3>
                <ul class="academy-course-card__list">
                    <li><?php esc_html_e( 'Budowa mechanizmu napędowego', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Wymiana części eksploatacyjnych', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Serwis kompresorów i przewodów', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Przeglądy okresowe i dokumentacja', 'blue-dragon-jet' ); ?></li>
                </ul>
                <div class="academy-course-card__meta">
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> 3 dni</span>
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg> maks. 6 os.</span>
                </div>
                <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="academy-course-card__cta">
                    <?php esc_html_e( 'Zapisz się', 'blue-dragon-jet' ); ?> &rarr;
                </a>
            </article>

            <!-- Kurs 3 -->
            <article class="academy-course-card" data-aos="fade-up" data-aos-delay="200">
                <div class="academy-course-card__badge"><?php esc_html_e( 'Korporacyjny', 'blue-dragon-jet' ); ?></div>
                <h3 class="academy-course-card__title"><?php esc_html_e( 'Szkolenie dedykowane dla firm', 'blue-dragon-jet' ); ?></h3>
                <ul class="academy-course-card__list">
                    <li><?php esc_html_e( 'Program dostosowany do Twoich maszyn', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Szkolenie na miejscu u klienta', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Dowolna liczba uczestników', 'blue-dragon-jet' ); ?></li>
                    <li><?php esc_html_e( 'Wsparcie poszkoleniowe 30 dni', 'blue-dragon-jet' ); ?></li>
                </ul>
                <div class="academy-course-card__meta">
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> <?php esc_html_e( 'do ustalenia', 'blue-dragon-jet' ); ?></span>
                    <span><?php esc_html_e( 'cena na zapytanie', 'blue-dragon-jet' ); ?></span>
                </div>
                <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="academy-course-card__cta">
                    <?php esc_html_e( 'Zapytaj o ofertę', 'blue-dragon-jet' ); ?> &rarr;
                </a>
            </article>

        </div>
    </div>
</section>

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
