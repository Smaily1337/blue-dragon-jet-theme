<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php $cats = get_the_terms( get_the_ID(), 'article_category' ); ?>

<!-- ── Hero artykułu ── -->
<section class="post-hero<?php echo has_post_thumbnail() ? ' post-hero--has-image' : ''; ?>">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-hero__bg" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>');" role="img" aria-label="<?php the_title_attribute(); ?>"></div>
        <div class="post-hero__overlay"></div>
    <?php endif; ?>
    <div class="container post-hero__content">
        <?php if ( $cats && ! is_wp_error( $cats ) ) : ?>
            <a href="<?php echo esc_url( get_term_link( $cats[0] ) ); ?>" class="post-hero__cat">
                <?php echo esc_html( $cats[0]->name ); ?>
            </a>
        <?php endif; ?>
        <h1 class="post-hero__title"><?php the_title(); ?></h1>
        <div class="post-hero__meta">
            <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
            <?php if ( get_the_author() ) : ?>
                <span class="post-hero__author"><?php echo esc_html( get_the_author() ); ?></span>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ── Treść artykułu ── -->
<div class="post-layout">
    <div class="container post-layout__inner">

        <!-- Lewa: treść -->
        <article class="post-content entry-content">
            <?php the_content(); ?>

            <?php
            $page_links = wp_link_pages( [ 'echo' => false ] );
            if ( $page_links ) echo '<div class="post-content__pages">' . $page_links . '</div>'; // phpcs:ignore
            ?>
        </article>

        <!-- Prawa: sidebar -->
        <aside class="post-sidebar">

            <!-- Powrót -->
            <a href="<?php echo esc_url( home_url( '/artykuly/' ) ); ?>" class="post-sidebar__back">
                &larr; <?php esc_html_e( 'Wszystkie artykuły', 'blue-dragon-jet' ); ?>
            </a>

            <!-- Kategorie -->
            <?php if ( $cats && ! is_wp_error( $cats ) ) : ?>
            <div class="post-sidebar__block">
                <h3 class="post-sidebar__heading"><?php esc_html_e( 'Kategoria', 'blue-dragon-jet' ); ?></h3>
                <?php foreach ( $cats as $cat ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="post-sidebar__cat">
                        <?php echo esc_html( $cat->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Powiązane artykuły -->
            <?php
            $term_ids = ( $cats && ! is_wp_error( $cats ) ) ? wp_list_pluck( $cats, 'term_id' ) : [];
            $related  = new WP_Query( [
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post__not_in'   => [ get_the_ID() ],
                'orderby'        => 'date',
                'order'          => 'DESC',
                'tax_query'      => $term_ids ? [ [ 'taxonomy' => 'article_category', 'field' => 'term_id', 'terms' => $term_ids ] ] : [],
            ] );
            if ( $related->have_posts() ) : ?>
            <div class="post-sidebar__block">
                <h3 class="post-sidebar__heading"><?php esc_html_e( 'Powiązane artykuły', 'blue-dragon-jet' ); ?></h3>
                <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="post-sidebar__related">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-sidebar__related-img"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
                    <?php endif; ?>
                    <span><?php the_title(); ?></span>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php endif; ?>

            <!-- CTA -->
            <div class="post-sidebar__cta">
                <p><?php esc_html_e( 'Zainteresowany naszymi maszynami?', 'blue-dragon-jet' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>" class="mpp__cta mpp__cta--primary" style="display:block;text-align:center;margin-top:.75rem;">
                    <?php esc_html_e( 'ZAPYTAJ O OFERTĘ', 'blue-dragon-jet' ); ?>
                </a>
            </div>

        </aside>

    </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>
