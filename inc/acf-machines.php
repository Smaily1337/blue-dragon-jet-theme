<?php
/**
 * ACF — pola tłumaczeń dla CPT "machine"
 * Dodaje zakładki PL / EN / DE z polami opisu i tekstów kompatybilności.
 * Pole PL = istniejący edytor WP (post_content). EN i DE to osobne pola ACF.
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

add_action( 'acf/init', function () {
    acf_add_local_field_group( [
        'key'      => 'group_machine_translations',
        'title'    => 'Tłumaczenia — EN / DE',
        'fields'   => [

            // ── Tab PL ──────────────────────────────────────────────────
            [
                'key'   => 'field_machine_tab_pl',
                'label' => '🇵🇱 Polski',
                'type'  => 'tab',
            ],
            [
                'key'     => 'field_machine_note_pl',
                'label'   => 'Tytuł i opis (PL)',
                'type'    => 'message',
                'message' => 'Tytuł i opis po polsku edytujesz w standardowym edytorze WordPress powyżej (pole "Tytuł" i edytor treści).',
                'esc_html'=> 0,
            ],
            [
                'key'          => 'field_machine_card_pdf',
                'label'        => 'Karta katalogowa PDF (PL)',
                'name'         => 'machine_card_pdf',
                'type'         => 'file',
                'return_format'=> 'url',
                'library'      => 'all',
                'mime_types'   => 'pdf',
                'instructions' => 'Karta katalogowa w języku polskim (PDF). Pojawi się jako przycisk pobierania na stronie maszyny.',
            ],

            // ── Tab EN ──────────────────────────────────────────────────
            [
                'key'   => 'field_machine_tab_en',
                'label' => '🇬🇧 English',
                'type'  => 'tab',
            ],
            [
                'key'         => 'field_machine_title_en',
                'label'       => 'Product name (EN)',
                'name'        => 'machine_title_en',
                'type'        => 'text',
                'instructions'=> 'English product title shown on cards and product page. E.g. "BDJ NEXT Cable Blowing Machine"',
                'placeholder' => 'Leave empty to use Polish title',
            ],
            [
                'key'         => 'field_machine_excerpt_en',
                'label'       => 'Short description — card (EN)',
                'name'        => 'machine_excerpt_en',
                'type'        => 'textarea',
                'rows'        => 3,
                'instructions'=> 'Short description shown on machine cards (archive, homepage). Max ~150 chars.',
                'placeholder' => 'Leave empty to use Polish excerpt',
            ],
            [
                'key'         => 'field_machine_desc_en',
                'label'       => 'Full description (EN)',
                'name'        => 'machine_desc_en',
                'type'        => 'wysiwyg',
                'tabs'        => 'visual',
                'toolbar'     => 'full',
                'media_upload'=> 0,
                'instructions'=> 'Full English description shown on the product page.',
            ],
            [
                'key'         => 'field_machine_microduct_text_en',
                'label'       => 'Inner Ø of duct (EN)',
                'name'        => 'machine_microduct_text_en',
                'type'        => 'text',
                'instructions'=> 'e.g. "5/3.5 mm – 14/10 mm"',
            ],
            [
                'key'         => 'field_machine_pipe_text_en',
                'label'       => 'Outer Ø of cable (EN)',
                'name'        => 'machine_pipe_text_en',
                'type'        => 'text',
                'instructions'=> 'e.g. "up to 12 mm"',
            ],
            [
                'key'          => 'field_machine_card_pdf_en',
                'label'        => 'Product card PDF (EN)',
                'name'         => 'machine_card_pdf_en',
                'type'         => 'file',
                'return_format'=> 'url',
                'library'      => 'all',
                'mime_types'   => 'pdf',
                'instructions' => 'English product card/datasheet PDF. Leave empty to use the Polish version.',
            ],

            // ── Tab DE ──────────────────────────────────────────────────
            [
                'key'   => 'field_machine_tab_de',
                'label' => '🇩🇪 Deutsch',
                'type'  => 'tab',
            ],
            [
                'key'         => 'field_machine_title_de',
                'label'       => 'Produktname (DE)',
                'name'        => 'machine_title_de',
                'type'        => 'text',
                'instructions'=> 'Deutscher Produkttitel auf Karten und Produktseite. Z.B. "BDJ NEXT Kabeleinblasmaschine"',
                'placeholder' => 'Leer lassen = polnischer Titel wird verwendet',
            ],
            [
                'key'         => 'field_machine_excerpt_de',
                'label'       => 'Kurzbeschreibung — Karte (DE)',
                'name'        => 'machine_excerpt_de',
                'type'        => 'textarea',
                'rows'        => 3,
                'instructions'=> 'Kurze Beschreibung auf Maschinenkarten (Archiv, Startseite). Max ~150 Zeichen.',
                'placeholder' => 'Leer lassen = polnische Kurzbeschreibung',
            ],
            [
                'key'         => 'field_machine_desc_de',
                'label'       => 'Vollständige Beschreibung (DE)',
                'name'        => 'machine_desc_de',
                'type'        => 'wysiwyg',
                'tabs'        => 'visual',
                'toolbar'     => 'full',
                'media_upload'=> 0,
                'instructions'=> 'Deutsche Version der Hauptbeschreibung auf der Produktseite.',
            ],
            [
                'key'         => 'field_machine_microduct_text_de',
                'label'       => 'Innendurchmesser Mikrorohr (DE)',
                'name'        => 'machine_microduct_text_de',
                'type'        => 'text',
                'instructions'=> 'z.B. "5/3,5 mm – 14/10 mm"',
            ],
            [
                'key'         => 'field_machine_pipe_text_de',
                'label'       => 'Außendurchmesser Kabel (DE)',
                'name'        => 'machine_pipe_text_de',
                'type'        => 'text',
                'instructions'=> 'z.B. "bis 12 mm"',
            ],
            [
                'key'          => 'field_machine_card_pdf_de',
                'label'        => 'Produktdatenblatt PDF (DE)',
                'name'         => 'machine_card_pdf_de',
                'type'         => 'file',
                'return_format'=> 'url',
                'library'      => 'all',
                'mime_types'   => 'pdf',
                'instructions' => 'Deutsches Produktdatenblatt (PDF). Leer lassen = polnische Version wird verwendet.',
            ],
        ],
        'location' => [
            [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'machine' ] ],
        ],
        'position'      => 'normal',
        'style'         => 'default',
        'label_placement' => 'top',
        'menu_order'    => 10,
    ] );
} );
