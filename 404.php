<?php
/**
 * 404 – Strona nie znaleziona
 */
get_header();
?>

<style>
.error404-wrap {
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 6rem 1.5rem;
    background: var(--color-light-gray);
    text-align: center;
}
.error404__inner { max-width: 560px; }

.error404__code {
    font-size: clamp(6rem, 18vw, 10rem);
    font-weight: 900;
    line-height: 1;
    color: var(--color-secondary);
    opacity: 0.18;
    letter-spacing: -0.04em;
    margin-bottom: -1.5rem;
}
.error404__title {
    font-size: clamp(1.6rem, 4vw, 2.2rem);
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: 1rem;
}
.error404__text {
    font-size: 1rem;
    color: #5a7080;
    line-height: 1.7;
    margin-bottom: 2.5rem;
}
.error404__actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}
.error404__btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.85rem 2rem;
    border-radius: 100px;
    font-size: 0.88rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    transition: all 0.25s ease;
}
.error404__btn--primary {
    background: var(--color-secondary);
    color: #fff;
    box-shadow: 0 6px 20px rgba(36,151,208,0.3);
}
.error404__btn--primary:hover { background: var(--color-mid-blue); transform: translateY(-2px); }
.error404__btn--ghost {
    border: 2px solid var(--color-primary);
    color: var(--color-primary);
}
.error404__btn--ghost:hover { background: var(--color-primary); color: #fff; }

.error404__search {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid #dce8f0;
}
.error404__search p {
    font-size: 0.85rem;
    color: #7a90a0;
    margin-bottom: 0.75rem;
}
.error404__search-form {
    display: flex;
    gap: 0.5rem;
    max-width: 360px;
    margin: 0 auto;
}
.error404__search-form input {
    flex: 1;
    padding: 0.7rem 1rem;
    border: 1.5px solid #d0dde8;
    border-radius: 100px;
    font-size: 0.9rem;
    outline: none;
    font-family: var(--font-base);
    color: var(--color-primary);
    transition: border-color 0.2s;
}
.error404__search-form input:focus { border-color: var(--color-secondary); }
.error404__search-form button {
    padding: 0.7rem 1.25rem;
    background: var(--color-secondary);
    color: #fff;
    border: none;
    border-radius: 100px;
    font-size: 0.85rem;
    font-weight: 700;
    cursor: pointer;
    font-family: var(--font-base);
    transition: background 0.2s;
}
.error404__search-form button:hover { background: var(--color-mid-blue); }
</style>

<main class="error404-wrap">
    <div class="error404__inner">
        <div class="error404__code">404</div>
        <h1 class="error404__title"><?php esc_html_e( 'Strona nie została znaleziona', 'blue-dragon-jet' ); ?></h1>
        <p class="error404__text">
            <?php esc_html_e( 'Wygląda na to, że szukana strona nie istnieje lub została przeniesiona. Sprawdź adres URL albo wróć na stronę główną.', 'blue-dragon-jet' ); ?>
        </p>

        <div class="error404__actions">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="error404__btn error404__btn--primary">
                <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                <?php esc_html_e( 'Strona główna', 'blue-dragon-jet' ); ?>
            </a>
            <a href="<?php echo esc_url( get_post_type_archive_link('machine') ?: home_url('/machines/') ); ?>" class="error404__btn error404__btn--ghost">
                <?php esc_html_e( 'Zobacz maszyny', 'blue-dragon-jet' ); ?>
            </a>
        </div>

        <div class="error404__search">
            <p><?php esc_html_e( 'Lub wyszukaj czego szukasz:', 'blue-dragon-jet' ); ?></p>
            <form class="error404__search-form" action="<?php echo esc_url( home_url('/') ); ?>" method="get">
                <input type="search" name="s" placeholder="<?php esc_attr_e( 'Szukaj...', 'blue-dragon-jet' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
                <button type="submit"><?php esc_html_e( 'Szukaj', 'blue-dragon-jet' ); ?></button>
            </form>
        </div>
    </div>
</main>

<?php get_footer(); ?>
