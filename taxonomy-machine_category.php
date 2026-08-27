<?php get_header(); ?>

<?php
$current_term = get_queried_object();   // aktualnie wybrana kategoria
$cat_terms    = get_terms( [ 'taxonomy' => 'machine_category', 'hide_empty' => true ] );
$archive_url  = get_post_type_archive_link( 'machine' ) ?: home_url( '/machines/' );
$lang         = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
$placeholders = [
    'pl' => 'Szukaj maszyny lub akcesoriów...',
    'en' => 'Search machines or accessories...',
    'de' => 'Maschine oder Zubehör suchen...',
];
$placeholder = $placeholders[ $lang ] ?? $placeholders['pl'];
?>

<!-- ── Page Hero ── -->
<section class="page-hero" style="background-image:url('https://bluedragonjet.com/wp-content/uploads/2026/04/tlo-1.jpg'); background-size:cover; background-position:center;">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <span class="page-hero__eyebrow"><?php esc_html_e( 'Oferta', 'blue-dragon-jet' ); ?></span>
        <h1 class="page-hero__title">
            <?php echo esc_html( $current_term->name ?? __( 'Maszyny', 'blue-dragon-jet' ) ); ?>
        </h1>
        <p class="page-hero__subtitle">
            <?php if ( ! empty( $current_term->description ) ) :
                echo esc_html( $current_term->description );
            else :
                esc_html_e( 'Profesjonalne maszyny do wdmuchiwania kabli i mikrokabli', 'blue-dragon-jet' );
            endif; ?>
        </p>
    </div>
</section>

<!-- ── Filtr kategorii i wyszukiwarka live ── -->
<div class="archive-filter">
    <div class="container">
        <div class="archive-filter__inner">
            <div class="archive-filter__nav">
                <a href="<?php echo esc_url( $archive_url ); ?>" class="archive-filter__btn">
                    <?php esc_html_e( 'Wszystkie', 'blue-dragon-jet' ); ?>
                </a>
                <?php if ( ! empty( $cat_terms ) && ! is_wp_error( $cat_terms ) ) : ?>
                    <?php foreach ( $cat_terms as $term ) : ?>
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"
                           class="archive-filter__btn<?php echo ( $current_term && $current_term->term_id === $term->term_id ) ? ' is-active' : ''; ?>">
                            <?php echo esc_html( $term->name ); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- ── Live Autocomplete Search Bar ── -->
            <div class="archive-filter__search" id="bdj-archive-search">
                <div class="archive-filter__search-box">
                    <svg class="archive-filter__search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input type="text"
                           class="archive-filter__search-input"
                           id="bdj-search-input"
                           placeholder="<?php echo esc_attr( $placeholder ); ?>"
                           autocomplete="off"
                           aria-label="<?php echo esc_attr( $placeholder ); ?>">
                    <button type="button" class="archive-filter__search-clear" id="bdj-search-clear" aria-label="Wyczyść" style="display:none;">&times;</button>
                    <div class="archive-filter__search-spinner" id="bdj-search-spinner" style="display:none;"></div>
                </div>
                <div class="archive-filter__dropdown" id="bdj-search-dropdown" style="display:none;" role="listbox"></div>
            </div>
        </div>
    </div>
</div>

<!-- ── Siatka maszyn ── -->
<section class="archive-machines">
    <div class="container">

        <?php if ( have_posts() ) : ?>

        <div class="archive-machines__grid">
            <?php while ( have_posts() ) : the_post(); ?>

            <article class="machine-card">
                <a href="<?php the_permalink(); ?>" class="machine-card__inner">

                    <!-- Zdjęcie -->
                    <?php $badge_html = bdj_machine_badge_html( get_the_ID() ); ?>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="machine-card__image">
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                            <?php if ( $badge_html ) echo $badge_html; // phpcs:ignore ?>
                        </div>
                    <?php else : ?>
                        <div class="machine-card__image image-placeholder" style="aspect-ratio:16/10;">
                            <?php if ( $badge_html ) echo $badge_html; // phpcs:ignore ?>
                        </div>
                    <?php endif; ?>

                    <!-- Treść karty -->
                    <div class="machine-card__body">
                        <?php
                        $card_terms = get_the_terms( get_the_ID(), 'machine_category' );
                        if ( $card_terms && ! is_wp_error( $card_terms ) ) : ?>
                            <span class="machine-card__cat">
                                <?php echo esc_html( $card_terms[0]->name ); ?>
                            </span>
                        <?php endif; ?>

                        <h3 class="machine-card__title"><?php the_title(); ?></h3>

                        <?php
                        $a_md    = get_post_meta( get_the_ID(), 'machine_microduct_diameter', true );
                        $a_pd    = get_post_meta( get_the_ID(), 'machine_pipe_diameter', true );
                        $a_specs = array_merge( is_array( $a_md ) ? $a_md : [], is_array( $a_pd ) ? $a_pd : [] );
                        if ( $a_specs ) : ?>
                            <p class="machine-card__specs">
                                <?php echo esc_html( implode( ' · ', $a_specs ) ); ?>
                            </p>
                        <?php endif; ?>

                        <?php $excerpt = get_the_excerpt();
                        if ( $excerpt ) : ?>
                            <p class="machine-card__text">
                                <?php echo esc_html( wp_trim_words( $excerpt, 14 ) ); ?>
                            </p>
                        <?php endif; ?>

                        <span class="machine-card__link">
                            <?php esc_html_e( 'Zobacz szczegóły', 'blue-dragon-jet' ); ?> &rarr;
                        </span>
                    </div>

                </a>
            </article>

            <?php endwhile; ?>
        </div><!-- .archive-machines__grid -->

        <!-- Paginacja -->
        <?php the_posts_pagination( [
            'mid_size'           => 2,
            'prev_text'          => '&larr; ' . __( 'Poprzednia', 'blue-dragon-jet' ),
            'next_text'          => __( 'Następna', 'blue-dragon-jet' ) . ' &rarr;',
            'screen_reader_text' => ' ',
            'class'              => 'archive-pagination',
        ] ); ?>

        <?php else : ?>

        <!-- Pusty stan -->
        <div class="archive-empty">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2"/>
                <circle cx="8.5" cy="8.5" r="1.5"/>
                <polyline points="21 15 16 10 5 21"/>
            </svg>
            <h2><?php esc_html_e( 'Brak maszyn', 'blue-dragon-jet' ); ?></h2>
            <p><?php esc_html_e( 'Nie znaleziono maszyn w tej kategorii.', 'blue-dragon-jet' ); ?></p>
            <a href="<?php echo esc_url( $archive_url ); ?>" class="archive-filter__btn is-active">
                &larr; <?php esc_html_e( 'Wszystkie maszyny', 'blue-dragon-jet' ); ?>
            </a>
        </div>

        <?php endif; ?>

    </div><!-- .container -->
</section>

<?php get_footer(); ?>
