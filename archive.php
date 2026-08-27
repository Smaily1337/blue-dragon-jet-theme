<?php get_header(); ?>

<?php
$current_cat = get_queried_object();
$all_cats    = get_terms( [ 'taxonomy' => 'article_category', 'hide_empty' => true ] );
$blog_url    = get_post_type_archive_link( 'post' ) ?: home_url( '/blog/' );
?>

<!-- ── Hero ── -->
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <span class="page-hero__eyebrow"><?php esc_html_e( 'Blog', 'blue-dragon-jet' ); ?></span>
        <h1 class="page-hero__title"><?php esc_html_e( 'Artykuły i aktualności', 'blue-dragon-jet' ); ?></h1>
        <p class="page-hero__subtitle"><?php esc_html_e( 'Porady techniczne, case study i nowości z branży wdmuchiwania kabli.', 'blue-dragon-jet' ); ?></p>
    </div>
</section>

<!-- ── Filtr kategorii ── -->
<?php if ( ! empty( $all_cats ) && ! is_wp_error( $all_cats ) ) : ?>
<div class="archive-filter">
    <div class="container">
        <div class="archive-filter__inner">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>"
               class="archive-filter__btn<?php echo ( ! is_tax( 'article_category' ) ) ? ' is-active' : ''; ?>">
                <?php esc_html_e( 'Wszystkie', 'blue-dragon-jet' ); ?>
            </a>
            <?php foreach ( $all_cats as $cat ) : ?>
                <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"
                   class="archive-filter__btn<?php echo ( is_tax( 'article_category', $cat->term_id ) ) ? ' is-active' : ''; ?>">
                    <?php echo esc_html( $cat->name ); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- ── Siatka artykułów ── -->
<section class="blog-archive">
    <div class="container">

        <?php if ( have_posts() ) : ?>
        <div class="blog-archive__grid">
            <?php while ( have_posts() ) : the_post(); ?>

            <article class="article-card">
                <a href="<?php the_permalink(); ?>" class="article-card__inner">

                    <!-- Miniatura -->
                    <div class="article-card__image">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        <?php else : ?>
                            <div class="article-card__no-img">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Treść karty -->
                    <div class="article-card__body">
                        <?php
                        $cats = get_the_terms( get_the_ID(), 'article_category' );
                        if ( $cats && ! is_wp_error( $cats ) ) : ?>
                            <span class="article-card__cat"><?php echo esc_html( $cats[0]->name ); ?></span>
                        <?php endif; ?>

                        <h2 class="article-card__title"><?php the_title(); ?></h2>

                        <div class="article-card__meta">
                            <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                        </div>

                        <?php $excerpt = get_the_excerpt();
                        if ( $excerpt ) : ?>
                            <p class="article-card__excerpt">
                                <?php echo esc_html( wp_trim_words( $excerpt, 18 ) ); ?>
                            </p>
                        <?php endif; ?>

                        <span class="article-card__link">
                            <?php esc_html_e( 'Czytaj dalej', 'blue-dragon-jet' ); ?> &rarr;
                        </span>
                    </div>

                </a>
            </article>

            <?php endwhile; ?>
        </div>

        <?php the_posts_pagination( [
            'mid_size'  => 2,
            'prev_text' => '&larr; ' . __( 'Poprzednia', 'blue-dragon-jet' ),
            'next_text' => __( 'Następna', 'blue-dragon-jet' ) . ' &rarr;',
            'class'     => 'archive-pagination',
        ] ); ?>

        <?php else : ?>
        <div class="archive-empty">
            <h2><?php esc_html_e( 'Brak artykułów', 'blue-dragon-jet' ); ?></h2>
            <p><?php esc_html_e( 'Wkrótce pojawią się nowe wpisy.', 'blue-dragon-jet' ); ?></p>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
