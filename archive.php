<?php
/**
 * The template for displaying archive pages (categories, tags, etc.).
 *
 * @package BlueDragonJet
 */

get_header();

$lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';

$labels = [
    'pl' => [
        'eyebrow'     => 'Kategoria artykułów',
        'subtitle'    => 'Praktyczna wiedza inżynieryjna, poradniki wdmuchiwania światłowodów i nowości ze świata Blue Dragon Jet.',
        'all'         => 'Wszystkie',
        'search_ph'   => 'Szukaj w tej kategorii...',
        'read_more'   => 'Czytaj artykuł',
        'read_time'   => 'min czytania',
        'no_results'  => 'Brak artykułów w tej kategorii',
        'no_res_desc' => 'Spróbuj wpisać inną frazę lub zresetuj wyszukiwanie.',
        'reset'       => 'Pokaż wszystkie artykuły',
        'prev'        => 'Poprzednia',
        'next'        => 'Następna',
    ],
    'en' => [
        'eyebrow'     => 'Article Category',
        'subtitle'    => 'Practical engineering knowledge, cable blowing guides and news from Blue Dragon Jet.',
        'all'         => 'All',
        'search_ph'   => 'Search in this category...',
        'read_more'   => 'Read article',
        'read_time'   => 'min read',
        'no_results'  => 'No articles found in this category',
        'no_res_desc' => 'Try another search term or reset the filter.',
        'reset'       => 'Show all articles',
        'prev'        => 'Previous',
        'next'        => 'Next',
    ],
    'de' => [
        'eyebrow'     => 'Artikelkategorie',
        'subtitle'    => 'Praktisches Ingenieurwissen, Anleitungen zum Kabeleinblasen und Neuigkeiten von Blue Dragon Jet.',
        'all'         => 'Alle',
        'search_ph'   => 'In dieser Kategorie suchen...',
        'read_more'   => 'Artikel lesen',
        'read_time'   => 'Min. Lesezeit',
        'no_results'  => 'Keine Artikel in dieser Kategorie gefunden',
        'no_res_desc' => 'Versuchen Sie einen anderen Suchbegriff oder setzen Sie den Filter zurück.',
        'reset'       => 'Alle Artikel anzeigen',
        'prev'        => 'Vorherige',
        'next'        => 'Nächste',
    ],
];

$l = $labels[ $lang ] ?? $labels['pl'];

$current_term = get_queried_object();
$all_cats     = get_terms( [ 'taxonomy' => 'article_category', 'hide_empty' => true ] );
$articles_url = get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/artykuly/' );
$archive_title = single_term_title( '', false ) ?: ( single_cat_title( '', false ) ?: __( 'Artykuły', 'blue-dragon-jet' ) );
?>

<!-- ── Hero ── -->
<section class="page-hero" style="background-image:url('<?php echo esc_url( content_url( 'uploads/2026/04/tlo.png' ) ); ?>'); background-size:cover; background-position:center;">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <span class="page-hero__eyebrow"><?php echo esc_html( $l['eyebrow'] ); ?></span>
        <h1 class="page-hero__title"><?php echo esc_html( $archive_title ); ?></h1>
        <p class="page-hero__subtitle"><?php echo esc_html( $l['subtitle'] ); ?></p>
    </div>
</section>

<!-- ── Filtr kategorii i wyszukiwarka live ── -->
<div class="archive-filter">
    <div class="container">
        <div class="archive-filter__inner">
            <div class="archive-filter__nav">
                <a href="<?php echo esc_url( $articles_url ); ?>"
                   class="archive-filter__btn<?php echo ( ! is_tax( 'article_category' ) && ! is_category() ) ? ' is-active' : ''; ?>">
                    <?php echo esc_html( $l['all'] ); ?>
                </a>
                <?php if ( ! empty( $all_cats ) && ! is_wp_error( $all_cats ) ) : ?>
                    <?php foreach ( $all_cats as $cat ) : ?>
                        <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"
                           class="archive-filter__btn<?php echo ( is_tax( 'article_category', $cat->term_id ) ) ? ' is-active' : ''; ?>">
                            <?php echo esc_html( $cat->name ); ?> (<?php echo esc_html( $cat->count ); ?>)
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- ── Live Article Search Bar ── -->
            <div class="archive-filter__search" id="bdj-article-search">
                <div class="archive-filter__search-box">
                    <svg class="archive-filter__search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input type="text"
                           class="archive-filter__search-input"
                           id="bdj-article-search-input"
                           placeholder="<?php echo esc_attr( $l['search_ph'] ); ?>"
                           autocomplete="off"
                           aria-label="<?php echo esc_attr( $l['search_ph'] ); ?>">
                    <button type="button" class="archive-filter__search-clear" id="bdj-article-search-clear" aria-label="Wyczyść" style="display:none;">&times;</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ── Siatka artykułów ── -->
<section class="blog-archive">
    <div class="container">

        <?php if ( have_posts() ) : ?>
        <div class="blog-archive__grid" id="bdj-articles-grid">
            <?php while ( have_posts() ) : the_post();
                $content = get_the_content();
                $word_count = str_word_count( strip_tags( $content ) );
                $reading_time = max( 1, ceil( $word_count / 200 ) );
                $cats = get_the_terms( get_the_ID(), 'article_category' );
                $cat_name = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';

                // Clean excerpt by removing leading duplicate title
                $title_str = get_the_title();
                $excerpt_raw = get_the_excerpt();
                $clean_excerpt = preg_replace( '/^' . preg_quote( wp_strip_all_tags( $title_str ), '/' ) . '\s*/i', '', wp_strip_all_tags( $excerpt_raw ) );
                if ( empty( $clean_excerpt ) ) {
                    $clean_excerpt = wp_strip_all_tags( $excerpt_raw );
                }
            ?>

            <article class="article-card"
                     data-title="<?php echo esc_attr( strtolower( get_the_title() ) ); ?>"
                     data-excerpt="<?php echo esc_attr( strtolower( $clean_excerpt ) ); ?>"
                     data-cat="<?php echo esc_attr( strtolower( $cat_name ) ); ?>">
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
                        <?php if ( $cat_name ) : ?>
                            <span class="article-card__cat"><?php echo esc_html( $cat_name ); ?></span>
                        <?php endif; ?>

                        <h2 class="article-card__title"><?php the_title(); ?></h2>

                        <div class="article-card__meta">
                            <span class="article-card__meta-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>
                            </span>
                            <span class="article-card__meta-sep" aria-hidden="true">•</span>
                            <span class="article-card__meta-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <span><?php echo esc_html( $reading_time . ' ' . $l['read_time'] ); ?></span>
                            </span>
                        </div>

                        <?php if ( $clean_excerpt ) : ?>
                            <p class="article-card__excerpt">
                                <?php echo esc_html( wp_trim_words( $clean_excerpt, 22 ) ); ?>
                            </p>
                        <?php endif; ?>

                        <span class="article-card__link">
                            <?php echo esc_html( $l['read_more'] ); ?> &rarr;
                        </span>
                    </div>

                </a>
            </article>

            <?php endwhile; ?>
        </div>

        <!-- Stan braku wyników wyszukiwania (JS) -->
        <div class="archive-empty" id="bdj-articles-no-results" style="display:none;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" style="width:48px;height:48px;margin:0 auto 1rem;display:block;color:#7a95a8;">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <h2><?php echo esc_html( $l['no_results'] ); ?></h2>
            <p><?php echo esc_html( $l['no_res_desc'] ); ?></p>
            <button type="button" class="archive-filter__btn is-active" id="bdj-articles-reset-btn" style="margin-top:1rem;cursor:pointer;">
                &larr; <?php echo esc_html( $l['reset'] ); ?>
            </button>
        </div>

        <?php the_posts_pagination( [
            'mid_size'           => 2,
            'prev_text'          => '&larr; ' . $l['prev'],
            'next_text'          => $l['next'] . ' &rarr;',
            'screen_reader_text' => ' ',
            'class'              => 'archive-pagination',
        ] ); ?>

        <?php else : ?>
        <div class="archive-empty">
            <h2><?php echo esc_html( $l['no_results'] ); ?></h2>
            <p><?php echo esc_html( $l['no_res_desc'] ); ?></p>
        </div>
        <?php endif; ?>

    </div>
</section>

<!-- ── Skrypt natychmiastowego wyszukiwania na żywo ── -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('bdj-article-search-input');
    var clearBtn    = document.getElementById('bdj-article-search-clear');
    var grid        = document.getElementById('bdj-articles-grid');
    var emptyBox    = document.getElementById('bdj-articles-no-results');
    var resetBtn    = document.getElementById('bdj-articles-reset-btn');
    var pagination  = document.querySelector('.archive-pagination');

    if (!searchInput || !grid) return;

    var cards = Array.from(grid.querySelectorAll('.article-card'));

    function filterArticles() {
        var q = searchInput.value.trim().toLowerCase();

        if (clearBtn) {
            clearBtn.style.display = q ? 'block' : 'none';
        }

        var visibleCount = 0;

        cards.forEach(function (card) {
            var title   = card.getAttribute('data-title') || '';
            var excerpt = card.getAttribute('data-excerpt') || '';
            var cat     = card.getAttribute('data-cat') || '';

            var matches = !q || title.includes(q) || excerpt.includes(q) || cat.includes(q);

            if (matches) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (emptyBox) {
            emptyBox.style.display = (visibleCount === 0) ? 'block' : 'none';
        }

        if (pagination) {
            pagination.style.display = q ? 'none' : '';
        }
    }

    searchInput.addEventListener('input', filterArticles);

    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            searchInput.value = '';
            filterArticles();
            searchInput.focus();
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            searchInput.value = '';
            filterArticles();
            searchInput.focus();
        });
    }
});
</script>

<?php get_footer(); ?>
