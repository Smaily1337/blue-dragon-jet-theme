<?php
/**
 * Template Name: BDJ Academy
 * Template Post Type: page
 */
// Suppress default theme output – the SPA takes over the full viewport
get_header(); ?>
<div id="bdj-webapp-container">

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <style>
        #bdj-webapp-container {
            position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: 2147483647; background-color: #f8fafd;
            overflow-y: auto; overflow-x: hidden;
            margin: 0; padding: 0;
            font-family: 'Outfit', sans-serif; text-align: left; color: #1E425D;
        }
        #bdj-webapp-container * { box-sizing: border-box; font-family: 'Outfit', sans-serif !important; }
        #bdj-webapp-container a { text-decoration: none; border: none; box-shadow: none; }
        html { margin-top: 0 !important; }
        #wpadminbar { display: none !important; }
        :root { --bdj-blue: #2497D0; --bdj-dark: #1E425D; --white: #FFFFFF; }

        .bdj-container { max-width: 1200px; margin: 0 auto; padding: 20px; min-height: 80vh; }
        .view-section { display: none; animation: fadeIn 0.5s ease-out; padding-bottom: 60px; }
        .view-section.active-view { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .grid-machines { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; margin-top: 30px; }
        .machine-card {
            background: #fff; border-radius: 20px; overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); cursor: pointer;
            transition: transform 0.3s; position: relative;
        }
        .machine-card:hover { transform: translateY(-10px); box-shadow: 0 25px 50px -12px rgba(36, 151, 208, 0.5); }
        .img-wrapper { height: 250px; width: 100%; position: relative; background: #fff; overflow: hidden; }
        .machine-card img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.5s; }
        .machine-card:hover img { transform: scale(1.05); }
        .machine-card h3 { padding: 25px; text-align: center; margin: 0; font-size: 1.4rem; font-weight: 800; color: var(--bdj-dark); position: relative; z-index: 2; background: #fff; }

        .snake-border { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 10; }
        .snake-border rect {
            fill: none !important; stroke: var(--bdj-blue); stroke-width: 8px; stroke-dasharray: 100; stroke-dashoffset: 100;
            transition: stroke-dashoffset 0.6s ease-in-out; rx: 20px; ry: 20px;
        }
        .machine-card:hover .snake-border rect { stroke-dashoffset: 0; }

        .svg-icon { width: 100%; height: 100%; fill: currentColor; display: block; }
        .icon-circle {
            width: 80px; height: 80px; background-color: #eaf6fc; color: var(--bdj-blue);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 15px auto; padding: 22px; transition: 0.3s;
        }
        .options-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; max-width: 1000px; margin: 0 auto; }
        .option-card {
            background: #fff; padding: 40px 20px; border-radius: 20px; text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); cursor: pointer; transition: 0.3s; border: 2px solid transparent;
        }
        .option-card:hover { transform: scale(1.05); border-color: var(--bdj-blue); box-shadow: 0 20px 40px -10px rgba(36, 151, 208, 0.3); }
        .option-card:hover .icon-circle { background-color: var(--bdj-blue); color: #fff; }
        .option-title { font-weight: 900; font-size: 1.2rem; margin-bottom: 5px; }
        .option-desc { font-size: 0.9rem; color: #666; }

        .bdj-header { background: var(--bdj-blue); padding: 15px 0; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 100; width: 100%; }
        .bdj-header img { height: 50px; width: auto; display: inline-block; margin: 0; }

        .search-container { position: relative; max-width: 500px; margin: 0 auto 30px auto; }
        .search-input { width: 100%; padding: 15px 25px; padding-right: 50px; border-radius: 50px; border: 1px solid #ddd; font-size: 1.1rem; outline: none; }
        .search-input:focus { border-color: var(--bdj-blue); box-shadow: 0 0 15px rgba(36,151,208,0.15); }
        .search-icon-svg { position: absolute; right: 20px; top: 50%; transform: translateY(-50%); width: 20px; fill: #999; pointer-events: none; }

        .top-bar { margin-bottom: 30px; }
        .back-btn { background: transparent; border: 2px solid var(--bdj-dark); color: var(--bdj-dark); padding: 10px 30px; border-radius: 50px; cursor: pointer; font-weight: 800; display: inline-flex; align-items: center; gap: 10px; transition: 0.3s; font-size: 1rem; }
        .back-btn:hover { background: var(--bdj-dark); color: #fff; }

        .selected-machine-display { text-align: center; margin-bottom: 50px; }
        .selected-machine-display img { height: 300px; max-width: 100%; object-fit: contain; }
        .selected-machine-display h2 { font-size: 2.5rem; font-weight: 900; color: var(--bdj-blue); margin-top: 20px; text-transform: uppercase; }

        .top-controls {
            position: fixed; top: 20px; right: 20px; z-index: 20002;
            display: flex; gap: 12px; align-items: center;
        }
        .control-btn {
            width: 45px; height: 45px; background: #fff; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15); cursor: pointer;
            color: var(--bdj-blue); transition: 0.3s; position: relative;
        }
        .control-btn:hover { transform: scale(1.1); background-color: var(--bdj-blue); color: #fff; }

        .notification-dot {
            position: absolute; top: 0; right: 0; width: 12px; height: 12px;
            background: #ff4757; border-radius: 50%; border: 2px solid #fff;
            animation: pulse 2s infinite;
        }
        @keyframes pulse { 0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 71, 87, 0.7); } 70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(255, 71, 87, 0); } 100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 71, 87, 0); } }

        .lang-dropdown {
            position: absolute; top: 60px; right: 0;
            background: #fff; padding: 8px; border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            display: none; flex-direction: column; gap: 5px; min-width: 70px;
            animation: fadeIn 0.2s;
        }
        .lang-dropdown.show { display: flex; }
        .lang-option {
            background: transparent; border: none; padding: 8px 15px;
            font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 0.9rem;
            color: #999; cursor: pointer; border-radius: 8px; transition: 0.2s; text-align: center;
        }
        .lang-option:hover { background: #f0f7fa; color: var(--bdj-blue); }
        .lang-option.active { color: var(--bdj-blue); background: #eaf6fc; }

        .news-list { max-width: 800px; margin: 0 auto; }
        .news-item {
            background: #fff; padding: 25px; border-radius: 15px; margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03); display: flex; align-items: center; gap: 20px;
            cursor: pointer; transition: 0.3s; border-left: 5px solid var(--bdj-blue);
        }
        .news-item:hover { transform: translateX(10px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        .news-date { font-size: 0.8rem; color: #999; font-weight: 700; white-space: nowrap; }
        .news-content h3 { margin: 0 0 5px 0; font-size: 1.1rem; color: var(--bdj-dark); }
        .news-content p { margin: 0; font-size: 0.9rem; color: #666; }
        .news-arrow { margin-left: auto; color: var(--bdj-blue); }

        .floating-home-link { position: fixed; bottom: 30px; right: 30px; width: 80px; height: 80px; z-index: 10000; cursor: pointer; background-color: #E8E8E8; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); transition: transform 0.3s; }
        .floating-home-link:hover { transform: scale(1.1); }
        .floating-home-link img { width: 60% !important; height: auto !important; display: block; margin: 0 !important; }

        .page-transition-layer { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: var(--bdj-blue); z-index: 20000; transform: scaleX(0); transform-origin: left; pointer-events: none; }
        .page-transition-layer.active { animation: swipe 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards; }
        @keyframes swipe { 0% { transform: scaleX(0); transform-origin: left; } 45% { transform: scaleX(1); } 55% { transform: scaleX(1); transform-origin: right; } 100% { transform: scaleX(0); transform-origin: right; } }
        .transition-logo-container { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 20001; display: flex; align-items: center; justify-content: center; pointer-events: none; opacity: 0; }
        .transition-logo-container img { max-width: 300px; }
        .transition-logo-container.active { animation: logoReveal 0.8s linear forwards; }
        @keyframes logoReveal { 0% { opacity: 0; transform: scale(0.9); } 35% { opacity: 1; transform: scale(1); } 65% { opacity: 1; transform: scale(1); } 100% { opacity: 0; transform: scale(1.1); } }

        .soon-container { text-align: center; padding: 60px; background: #fff; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        footer { text-align: center; margin-top: 60px; padding: 20px; opacity: 0.7; font-size: 0.9rem; }

        /* =============================================
           SPECS TABLE
           ============================================= */
        .specs-section {
            max-width: 1000px;
            margin: 50px auto 0 auto;
        }

        .specs-toggle-btn {
            width: 100%;
            background: #fff;
            border: 2px solid #e0eef5;
            border-radius: 18px;
            padding: 22px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Outfit', sans-serif !important;
            color: var(--bdj-dark);
        }
        .specs-toggle-btn:hover {
            border-color: var(--bdj-blue);
            box-shadow: 0 8px 30px rgba(36,151,208,0.18);
        }
        .specs-toggle-btn.open {
            border-color: var(--bdj-blue);
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom-color: transparent;
            box-shadow: 0 -4px 20px rgba(36,151,208,0.1);
        }

        .specs-toggle-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .specs-toggle-icon {
            width: 64px; height: 64px;
            background: #eaf6fc;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: var(--bdj-blue);
            flex-shrink: 0;
            transition: 0.3s ease;
        }
        .specs-toggle-btn:hover .specs-toggle-icon,
        .specs-toggle-btn.open .specs-toggle-icon {
            background: var(--bdj-blue);
            color: #fff;
        }
        .specs-icon-svg {
            width: 30px; height: 30px;
            fill: currentColor;
        }

        .specs-toggle-label {
            font-weight: 900;
            font-size: 1.35rem;
            color: var(--bdj-dark);
            letter-spacing: 0.01em;
        }
        .specs-toggle-sub {
            font-size: 0.95rem;
            color: #9ab5c8;
            font-weight: 600;
            margin-top: 3px;
        }

        .specs-chevron {
            width: 32px; height: 32px;
            color: var(--bdj-blue);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
            background: #eaf6fc;
            border-radius: 50%;
            padding: 4px;
        }
        .specs-toggle-btn.open .specs-chevron {
            transform: rotate(180deg);
            background: #d0ecf8;
        }

        .specs-body {
            background: #fff;
            border: 2px solid var(--bdj-blue);
            border-top: none;
            border-bottom-left-radius: 18px;
            border-bottom-right-radius: 18px;
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
            opacity: 0;
        }
        .specs-body.open {
            max-height: 3000px;
            opacity: 1;
        }

        .specs-table {
            width: 100%;
            border-collapse: collapse;
        }
        .specs-table tr {
            transition: background 0.2s;
        }
        .specs-table tr:nth-child(even) {
            background: #f4f9fd;
        }
        .specs-table tr:hover {
            background: #e8f5fc;
        }
        .specs-table tr:last-child td {
            border-bottom: none;
        }
        .specs-table td {
            padding: 18px 32px;
            border-bottom: 1px solid #e0eef8;
            vertical-align: top;
            line-height: 1.6;
        }
        .specs-table td:first-child {
            font-weight: 900;
            color: var(--bdj-blue);
            width: 40%;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .specs-table td:last-child {
            color: var(--bdj-dark);
            font-size: 1.1rem;
            font-weight: 600;
        }

        .specs-list-value {
            list-style: none;
            margin: 0; padding: 0;
        }
        .specs-list-value li {
            padding: 4px 0;
            position: relative;
            padding-left: 18px;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .specs-list-value li::before {
            content: "–";
            position: absolute;
            left: 0;
            color: var(--bdj-blue);
            font-weight: 800;
        }

        .specs-no-data {
            text-align: center;
            padding: 40px;
            color: #999;
            font-size: 1rem;
        }

        /* ---- RESPONSYWNOŚĆ MOBILNA ---- */
        @media (max-width: 768px) {
            .bdj-container { padding: 12px; }
            .grid-machines { grid-template-columns: 1fr 1fr; gap: 16px; }
            .machine-card h3 { font-size: 1rem; padding: 15px 10px; }
            .img-wrapper { height: 160px; }

            .selected-machine-display img { height: 200px; }
            .selected-machine-display h2 { font-size: 1.8rem; }
            .options-grid { grid-template-columns: 1fr; gap: 14px; }
            .option-card { padding: 28px 20px; }

            .specs-section { margin: 30px auto 0 auto; }
            .specs-toggle-btn { padding: 16px 18px; }
            .specs-toggle-icon { width: 50px; height: 50px; }
            .specs-icon-svg { width: 24px; height: 24px; }
            .specs-toggle-label { font-size: 1.05rem; }
            .specs-toggle-sub { font-size: 0.82rem; }
            .specs-chevron { width: 26px; height: 26px; }

            .specs-table, .specs-table tbody, .specs-table tr, .specs-table td {
                display: block;
                width: 100%;
            }
            .specs-table tr {
                border-bottom: 2px solid #e0eef8;
                padding: 14px 18px;
            }
            .specs-table tr:last-child { border-bottom: none; }
            .specs-table td {
                border-bottom: none;
                padding: 3px 0;
                width: 100% !important;
            }
            .specs-table td:first-child {
                font-size: 0.78rem;
                color: var(--bdj-blue);
                margin-bottom: 4px;
                white-space: normal;
            }
            .specs-table td:last-child {
                font-size: 1rem;
            }
            .specs-list-value li { font-size: 1rem; }

            .top-controls { top: 12px; right: 12px; gap: 8px; }
            .control-btn { width: 38px; height: 38px; }
            .floating-home-link { width: 58px; height: 58px; bottom: 18px; right: 18px; }
        }

        @media (max-width: 480px) {
            .grid-machines { grid-template-columns: 1fr; gap: 16px; }
            .selected-machine-display h2 { font-size: 1.5rem; }
        }
    </style>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="floating-home-link" title="Powrót na stronę główną">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:36px;height:36px;color:var(--bdj-dark);">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
    </a>

    <div class="top-controls">
        <div class="control-btn" onclick="navigate('news')" title="Nowości">
            <svg style="width:22px; height:22px; fill:currentColor;" viewBox="0 0 24 24"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
            <span class="notification-dot"></span>
        </div>
        <div class="control-btn" onclick="toggleLangMenu()" title="Zmień język">
            <svg style="width:22px; height:22px; fill:currentColor;" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95a15.65 15.65 0 0 0-1.38-3.56c1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2 0 .68.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2 0-.68.07-1.35.16-2h4.68c.09.65.16 1.32.16 2 0 .68-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2 0-.68-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"/></svg>
        </div>
        <div id="lang-menu" class="lang-dropdown">
            <button class="lang-option active" data-lang-code="pl" onclick="selectLang('pl')">PL</button>
            <button class="lang-option" data-lang-code="en" onclick="selectLang('en')">EN</button>
            <button class="lang-option" data-lang-code="de" onclick="selectLang('de')">DE</button>
        </div>
    </div>

    <div class="page-transition-layer" id="transition-layer"></div>
    <div class="transition-logo-container" id="transition-logo">
        <img src="https://bluedragonjet.com/wp-content/uploads/2026/01/ACADEMY-2.png" alt="Academy Logo">
    </div>

    <header class="bdj-header">
        <img src="https://bluedragonjet.com/wp-content/uploads/2026/01/ACADEMY-2.png" alt="BDJ Academy Logo">
    </header>

    <div class="bdj-container">

        <!-- HOME VIEW -->
        <div id="home-view" class="view-section active-view">
            <h1 style="text-align:center; color:#1E425D; margin: 40px 0;" data-lang="title">WYBIERZ URZĄDZENIE</h1>
            <div class="search-container">
                <input type="text" id="search-input" class="search-input" placeholder="Szukaj..." oninput="filterMachines()">
                <svg class="search-icon-svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
            </div>
            <div class="grid-machines" id="machines-container"></div>
        </div>

        <!-- NEWS VIEW -->
        <div id="news-view" class="view-section">
            <div class="top-bar">
                <button class="back-btn" onclick="navigate('home')">
                    <svg style="width:16px; height:16px; fill:currentColor;" viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
                    <span data-lang="back">POWRÓT</span>
                </button>
            </div>
            <h2 style="text-align:center; color:#2497D0; margin-bottom:30px;" data-lang="newsHeading">OSTATNIE ZMIANY</h2>
            <div class="news-list">
                <div class="news-item" onclick="selectMachineById('next')">
                    <div class="news-date">06.02.2026</div>
                    <div class="news-content"><h3 data-lang="news1Title">Nowe wideo: NEXT</h3><p data-lang="news1Desc">Dodano film instruktażowy dla maszyny NEXT.</p></div>
                    <div class="news-arrow">&#10132;</div>
                </div>
                <div class="news-item" onclick="selectMachineById('budget')">
                    <div class="news-date">06.02.2026</div>
                    <div class="news-content"><h3 data-lang="news2Title">Nowe wideo: BUDGET</h3><p data-lang="news2Desc">Zaktualizowany poradnik wideo dla modelu BUDGET.</p></div>
                    <div class="news-arrow">&#10132;</div>
                </div>
                <div class="news-item">
                    <div class="news-date">01.02.2026</div>
                    <div class="news-content"><h3 data-lang="news3Title">Start BDJ Academy</h3><p data-lang="news3Desc">Witamy na nowej platformie szkoleniowej.</p></div>
                </div>
            </div>
        </div>

        <!-- DETAIL VIEW -->
        <div id="detail-view" class="view-section">
            <div class="top-bar">
                <button class="back-btn" onclick="navigate('home')">
                    <svg style="width:16px; height:16px; fill:currentColor;" viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
                    <span data-lang="back">POWRÓT</span>
                </button>
            </div>
            <div class="selected-machine-display">
                <img id="detail-img" src="" alt="">
                <h2 id="detail-title"></h2>
            </div>
            <div class="options-grid">
                <div class="option-card" onclick="goToLink('instrukcja')">
                    <div class="icon-circle"><svg class="svg-icon" viewBox="0 0 24 24"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg></div>
                    <div class="option-title" data-lang="manual">INSTRUKCJA</div>
                    <div class="option-desc" data-lang="manualDesc">Pobierz plik PDF</div>
                </div>
                <div class="option-card" onclick="goToLink('karta')">
                    <div class="icon-circle"><svg class="svg-icon" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg></div>
                    <div class="option-title" data-lang="card">KARTA PRODUKTU</div>
                    <div class="option-desc" data-lang="cardDesc">Specyfikacja techniczna</div>
                </div>
                <div class="option-card" onclick="goToLink('film')">
                    <div class="icon-circle"><svg class="svg-icon" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>
                    <div class="option-title" data-lang="video">PORADNIK</div>
                    <div class="option-desc" data-lang="videoDesc">Obejrzyj wideo</div>
                </div>
            </div>

            <!-- SPECS TABLE -->
            <div class="specs-section">
                <button class="specs-toggle-btn" id="specs-toggle" onclick="toggleSpecs()">
                    <div class="specs-toggle-left">
                        <div class="specs-toggle-icon">
                            <svg class="specs-icon-svg" viewBox="0 0 24 24">
                                <path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 6v3h5V9H4zm0 5v3h5v-3H4zm7-5v3h5V9h-5zm0 5v3h5v-3h-5zm7-5v3h2V9h-2zm0 5v3h2v-3h-2zM4 5v2h16V5H4z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="specs-toggle-label" data-lang="specsLabel">DANE TECHNICZNE</div>
                            <div class="specs-toggle-sub" data-lang="specsSubLabel">Kliknij, aby rozwinąć specyfikację</div>
                        </div>
                    </div>
                    <svg class="specs-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                <div class="specs-body" id="specs-body">
                    <table class="specs-table" id="specs-table"></table>
                </div>
            </div>
        </div>

        <!-- SOON VIEW -->
        <div id="soon-view" class="view-section">
            <div class="top-bar"><button class="back-btn" onclick="navigate('detail')"><span data-lang="back">POWRÓT</span></button></div>
            <div class="soon-container">
                <svg style="width:100px; height:100px; fill:#2497D0; margin-bottom:20px;" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 1.74.5 3.37 1.41 4.84.95 1.54 2.2 2.86 3.59 3.66v2c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2c1.39-.8 2.64-2.12 3.59-3.66C21.5 12.37 22 10.74 22 9c0-3.87-3.13-7-7-7zm0 2c1.85 0 3.48.98 4.41 2.45L12 11.2V4zm-1 8.6l-2.6-4.6C8.14 8.7 8 9.34 8 10c0 2.21 1.79 4 4 4v.6zM13 4v7.2l4.41-4.75C16.48 4.98 14.85 4 13 4zm5.4 6c0 .66-.14 1.3-.39 1.9l-2.61-2.8L18.4 10z"/></svg>
                <h2 data-lang="soon">Wkrótce dostępne</h2>
            </div>
        </div>

        <footer>&copy; 2025 Blue Dragon Jet Academy</footer>
    </div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const app = document.getElementById('bdj-webapp-container');
        if (app) { document.body.appendChild(app); }
        init();
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('lang-menu');
            const btn = document.querySelector('.control-btn[onclick="toggleLangMenu()"]');
            if (menu && menu.classList.contains('show') && !menu.contains(event.target) && !btn.contains(event.target)) {
                menu.classList.remove('show');
            }
        });
    });

    const translations = {
        pl: { title: "WYBIERZ URZĄDZENIE", back: "POWRÓT", manual: "INSTRUKCJA", manualDesc: "Pobierz plik PDF", card: "KARTA PRODUKTU", cardDesc: "Specyfikacja techniczna", video: "PORADNIK", videoDesc: "Obejrzyj wideo", soon: "Wkrótce dostępne", search: "Szukaj urządzenia...", specsLabel: "DANE TECHNICZNE", specsSubLabel: "Kliknij, aby rozwinąć specyfikację", newsHeading: "OSTATNIE ZMIANY", news1Title: "Nowe wideo: NEXT", news1Desc: "Dodano film instruktażowy dla maszyny NEXT.", news2Title: "Nowe wideo: BUDGET", news2Desc: "Zaktualizowany poradnik wideo dla modelu BUDGET.", news3Title: "Start BDJ Academy", news3Desc: "Witamy na nowej platformie szkoleniowej." },
        en: { title: "SELECT DEVICE", back: "BACK", manual: "MANUAL", manualDesc: "Download PDF file", card: "PRODUCT CARD", cardDesc: "Technical Specification", video: "TUTORIAL", videoDesc: "Watch Video", soon: "Coming Soon", search: "Search device...", specsLabel: "TECHNICAL SPECS", specsSubLabel: "Click to expand specifications", newsHeading: "LATEST UPDATES", news1Title: "New video: NEXT", news1Desc: "Instructional video added for the NEXT machine.", news2Title: "New video: BUDGET", news2Desc: "Updated video tutorial for the BUDGET model.", news3Title: "BDJ Academy Launch", news3Desc: "Welcome to the new training platform." },
        de: { title: "GERÄT AUSWÄHLEN", back: "ZURÜCK", manual: "ANLEITUNG", manualDesc: "PDF herunterladen", card: "PRODUKTKARTE", cardDesc: "Technische Spezifikation", video: "VIDEOANLEITUNG", videoDesc: "Video ansehen", soon: "Demnächst verfügbar", search: "Gerät suchen...", specsLabel: "TECHNISCHE DATEN", specsSubLabel: "Klicken zum Aufklappen", newsHeading: "LETZTE ÄNDERUNGEN", news1Title: "Neues Video: NEXT", news1Desc: "Schulungsvideo für die Maschine NEXT wurde hinzugefügt.", news2Title: "Neues Video: BUDGET", news2Desc: "Aktualisiertes Video-Tutorial für das BUDGET-Modell.", news3Title: "Start BDJ Academy", news3Desc: "Willkommen auf der neuen Schulungsplattform." }
    };

    // Sync with site-wide language cookie
    function _getCookieLang() {
        var m = document.cookie.match(/(?:^|;\s*)bdj_lang=([^;]+)/);
        if (!m) return 'pl';
        return m[1] === 'en_US' ? 'en' : m[1] === 'de_DE' ? 'de' : 'pl';
    }
    let currentLang = _getCookieLang();

    function toggleLangMenu() {
        document.getElementById('lang-menu').classList.toggle('show');
    }

    function selectLang(lang) {
        setLanguage(lang);
        document.getElementById('lang-menu').classList.remove('show');
    }

    const specsDB = {
        brain: [
            { label: "Pomiar ciśnienia w głowicy", value: "0 – 16 bar" },
            { label: "Pomiar ciśnienia silników", value: "0 – 16 bar" },
            { label: "Zasilanie", value: "Ładowanie z sieci 230 V, 50 Hz" },
            { label: "Wymiary (dł. × szer. × wys.)", value: "610 × 300 × 320 mm" },
            { label: "Waga", value: "10 kg" }
        ],
        budget: [
            { label: "Średnica kabla", value: "0,5 – 6 mm" },
            { label: "Średnica rury", value: "5, 7, 10, 12, 14, 16 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "700 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "60 m/min" },
            { label: "Maks. ciśnienie pracy", value: "15 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "260 × 100 × 140 mm; waga ok. 2 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "465 × 400 × 155 mm; waga ok. 8 kg" },
            { label: "Wymagana wydajność kompresora", value: "mikrorurki do 8 mm – 0,8 m³/min; mikrorurki 8–12 mm – 1,0 m³/min; mikrorurki 12–16 mm – 1,5 m³/min", list: true },
            { label: "Zalecany kompresor", value: "KAESER M17A, ATMOS PB82" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        budget_easyset: [
            { label: "Średnica kabla", value: "0,5 – 6 mm" },
            { label: "Średnica rury", value: "5, 7, 10, 12, 14, 16 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "700 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "60 m/min" },
            { label: "Maks. ciśnienie pracy", value: "15 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "260 × 100 × 140 mm; waga ok. 2 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "465 × 400 × 155 mm; waga ok. 8 kg" },
            { label: "Wymagana wydajność kompresora", value: "mikrorurki do 8 mm – 0,8 m³/min; mikrorurki 8–12 mm – 1,0 m³/min; mikrorurki 12–16 mm – 1,5 m³/min", list: true },
            { label: "Zalecany kompresor", value: "KAESER M17A, ATMOS PB82" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        budget_plus: [
            { label: "Średnica kabla", value: "0,5 – 6 mm" },
            { label: "Średnica rury", value: "5, 7, 10 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "700 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "60 m/min" },
            { label: "Maks. ciśnienie pracy", value: "15 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "260 × 100 × 140 mm; waga ok. 2 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "465 × 400 × 155 mm; waga ok. 8 kg" },
            { label: "Wymagana wydajność kompresora", value: "mikrokanały do 8 mm – 0,8 m³/min; mikrorurki 8–12 mm – 1,0 m³/min; mikrorurki 12–15 mm – 1,5 m³/min", list: true },
            { label: "Zalecany kompresor", value: "KAESER M17A, ATMOS PB82" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        budget_plus_easyset: [
            { label: "Średnica kabla", value: "0,5 – 6 mm" },
            { label: "Średnica rury", value: "5, 7, 10 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "700 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "60 m/min" },
            { label: "Maks. ciśnienie pracy", value: "15 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "260 × 100 × 140 mm; waga ok. 2 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "465 × 400 × 155 mm; waga ok. 8 kg" },
            { label: "Wymagana wydajność kompresora", value: "mikrokanały do 8 mm – 0,8 m³/min; mikrorurki 8–12 mm – 1,0 m³/min; mikrorurki 12–15 mm – 1,5 m³/min", list: true },
            { label: "Zalecany kompresor", value: "KAESER M17A, ATMOS PB82" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        extended: [
            { label: "Średnica kabla", value: "2,5 – 12 mm" },
            { label: "Średnica rury", value: "5, 7, 10, 12, 14, 16, 20 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "2500 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "110 m/min" },
            { label: "Maks. ciśnienie pracy", value: "15 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "580 × 300 × 320 mm; waga ok. 20 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "640 × 390 × 410 mm; waga ok. 33 kg" },
            { label: "Wymagana wydajność kompresora", value: "mikrorurki do 8 mm – 0,8 m³/min; mikrorurki 8–12 mm – 1,0 m³/min; mikrorurki 12–16 mm – 1,5 m³/min; mikrorurki 15–20 mm – 3,5 m³/min", list: true },
            { label: "Zalecany kompresor", value: "KAESER M17A, ATMOS PB82" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        hydro: [
            { label: "Średnica kabla", value: "Ø 6 – 15 mm" },
            { label: "Średnica rury", value: "Ø 32, 40, 50 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "2500 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "80 m/min" },
            { label: "Maks. ciśnienie pracy", value: "10 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "620 × 300 × 380 mm; waga ok. 35 kg" },
            { label: "Wymiary w skrzyni transportowej", value: "690 × 430 × 440 mm; waga ok. 48 kg" },
            { label: "Wymagana wydajność kompresora", value: "8 – 10 m³/min" },
            { label: "Agregat hydrauliczny", value: "700 × 420 × 490 mm; waga 56 kg; maks. ciśnienie: 160 bar" },
            { label: "Zalecany kompresor", value: "KAESER M82A" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        hydrochain: [
            { label: "Średnica kabla", value: "6 – 20 mm" },
            { label: "Średnica rury", value: "32, 40, 50 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "2500 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "80 m/min" },
            { label: "Maks. ciśnienie pracy", value: "10 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "850 × 400 × 300 mm; waga ok. 42 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "920 × 530 × 440 mm; waga ok. 55 kg" },
            { label: "Wymagana wydajność kompresora", value: "8 – 10 m³/min" },
            { label: "Agregat hydrauliczny", value: "630 × 530 × 510 mm; waga 54 kg; maks. ciśnienie: 110 bar" },
            { label: "Zalecany kompresor", value: "KAESER M82A" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        hydrochain_multitube: [
            { label: "Średnica pakietów mikrorurek", value: "3–5 × 10 mm lub 7 × 10 mm lub 3–5 × 12 mm lub 7 × 12 mm" },
            { label: "Średnica rury", value: "32, 40, 50 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "1500 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "80 m/min" },
            { label: "Maks. ciśnienie pracy", value: "10 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "850 × 400 × 300 mm; waga ok. 42 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "920 × 530 × 440 mm; waga ok. 55 kg" },
            { label: "Wymagana wydajność kompresora", value: "8 – 10 m³/min" },
            { label: "Agregat hydrauliczny", value: "630 × 530 × 510 mm; waga 54 kg; maks. ciśnienie: 110 bar" },
            { label: "Zalecany kompresor", value: "KAESER M82A" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        mini: [
            { label: "Średnica kabla", value: "Ø 0,7 – 10 mm" },
            { label: "Średnica rury", value: "Ø 5 – 16 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "1000 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "110 m/min" },
            { label: "Maks. ciśnienie pracy", value: "15 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "260 × 160 × 230 mm; waga ok. 5 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "480 × 350 × 330 mm; waga ok. 15 kg" },
            { label: "Wymagana wydajność kompresora", value: "mikrorurki do 8 mm – 0,8 m³/min; mikrorurki 8–12 mm – 1,0 m³/min; mikrorurki 12–16 mm – 1,5 m³/min", list: true },
            { label: "Zalecany kompresor", value: "KAESER M17A, ATMOS PB82" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        mini_counter: [
            { label: "Średnica kabla", value: "Ø 0,7 – 10 mm" },
            { label: "Średnica rury", value: "Ø 5 – 16 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "1000 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "110 m/min" },
            { label: "Maks. ciśnienie pracy", value: "15 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "260 × 160 × 230 mm; waga ok. 5 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "480 × 350 × 330 mm; waga ok. 15 kg" },
            { label: "Wymagana wydajność kompresora", value: "mikrorurki do 8 mm – 0,8 m³/min; mikrorurki 8–12 mm – 1,0 m³/min; mikrorurki 12–16 mm – 1,5 m³/min", list: true },
            { label: "Zalecany kompresor", value: "KAESER M17A, ATMOS PB82" },
            { label: "Gwarancja", value: "36 miesięcy" },
            { label: "Uwagi", value: "Wersja z mechanicznym licznikiem długości" }
        ],
        next: [
            { label: "Średnica kabla", value: "4 – 10 mm" },
            { label: "Średnica rury", value: "5, 7, 10, 12, 14, 16 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "2500 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "110 m/min" },
            { label: "Maks. ciśnienie pracy", value: "15 bar" },
            { label: "Zalecany kompresor", value: "KAESER M17A, ATMOS PB82" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ],
        max: [
            { label: "Średnica kabla", value: "Ø 6 – 15 mm" },
            { label: "Średnica rury", value: "Ø 32, 40, 50 mm" },
            { label: "Maks. zasięg wdmuchiwania", value: "2500 m" },
            { label: "Maks. prędkość wdmuchiwania", value: "ok. 120 m/min" },
            { label: "Maks. ciśnienie pracy", value: "10 bar" },
            { label: "Wymiary wdmuchiwarki (dł. × szer. × wys.)", value: "620 × 300 × 380 mm; waga ok. 35 kg" },
            { label: "Dostawa w skrzyni transportowej", value: "690 × 430 × 440 mm; waga ok. 48 kg" },
            { label: "Wymagana wydajność kompresora", value: "mikrorurki do 8 mm – 0,8 m³/min; mikrorurki 8–12 mm – 1,0 m³/min; mikrorurki 12–15 mm – 1,5 m³/min; mikrorurki 15–20 mm – 3,5 m³/min; rury 32–50 mm – 8–10 m³/min", list: true },
            { label: "Zalecany kompresor", value: "KAESER M82A" },
            { label: "Gwarancja", value: "36 miesięcy" }
        ]
    };

    const machines = [
        { name: "BUDGET", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/Budget-8-scaled.jpg", id: "budget", videoLink: "https://youtu.be/IjhSdY4QAtM", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Budget-PL-1-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Budget-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-Budget-DE-2.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-PL.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-ENG.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-DE.pdf" } },
        { name: "BUDGET EASY SET", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/Budget-EasySet-3-scaled.jpg", id: "budget_easyset", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Budget-Easy-Set-EN-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Budget-Plus-Easy-Set-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-Budget-Easy-Set-DE-2.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-PL.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-ENG.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-DE.pdf" } },
        { name: "BUDGET PLUS", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/Budget-Plus-1-scaled.jpg", id: "budget_plus", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Budget-PLUS-PL-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Budget-PLUS-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-Budget-Easy-Set-DE-2.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-PL.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-ENG.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-DE.pdf" } },
        { name: "BUDGET PLUS EASY SET", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/Budget-Plus-EasySet-1-scaled.jpg", id: "budget_plus_easyset", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Budget-Plus-Easy-Set-PL-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Budget-Plus-Easy-Set-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-Budget-Plus-Easy-Set-DE-1.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-PL.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-ENG.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-BUDGET-DE.pdf" } },
        { name: "MINI", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/Mini-2-scaled.jpg", id: "mini", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Mini-PL-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Mini-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-Mini-DE-1.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-MINI-PL.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-MINI-ENG.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-MINI-DE.pdf" } },
        { name: "MINI COUNTER", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/BDJ-Mini-Counter-1-scaled.jpg", id: "mini_counter", videoLink: "https://youtu.be/36XA_qZ422o", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Mini-Counter-PL-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Mini-Counter-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-Mini-Counter-DE-1.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-MINI-PL.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-MINI-ENG.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-MINI-DE.pdf" } },
        { name: "NEXT", img: "https://bluedragonjet.com/wp-content/uploads/2025/03/001-scaled.jpg", id: "next", videoLink: "https://youtu.be/upfZrb2_bmA", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2025/04/BDJ-Next-PL-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2025/04/BDJ-NEXT-EN-1.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2025/04/BDJ-NEXT-DE.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-Pneumatic-Standard_Extended_NEXT_MAX.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/User-Manual-ENG-Pneumatic-Standard_Extended_NEXT_MAX-1.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Benutzerhandbuch-DE-Pneumatic-Standard_Extended_NEXT_MAX.pdf" } },
        { name: "MAX", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/MAX-2-scaled.jpg", id: "max", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-MAX-PL-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Max-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/DE-BDJ-Max-2.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-Pneumatic-Standard_Extended_NEXT_MAX.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/User-Manual-ENG-Pneumatic-Standard_Extended_NEXT_MAX-1.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Benutzerhandbuch-DE-Pneumatic-Standard_Extended_NEXT_MAX.pdf" } },
        { name: "HYDRO BELT CABLE", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/Hydro-1-scaled.jpg", id: "hydro", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-HYDRO-EN.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-HYDRO-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-HYDRO-DE-1.pdf" } },
        { name: "HYDRO CHAIN CABLE", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/Hydrochain-1-scaled.jpg", id: "hydrochain", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-HYDRO-CHAIN-CABLE-PL-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-HYDRO-CHAIN-CABLE-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-Hydro-Chain-Cable-DE-1.pdf" } },
        { name: "HYDRO CHAIN MULTI TUBE", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/BDJ-Hydro-Chain-Multi-Tube-1-scaled.jpg", id: "hydrochain_multitube" },
        { name: "BRAIN", img: "https://bluedragonjet.com/wp-content/uploads/2022/12/BRAIN-3-scaled.jpg", id: "brain" },
        { name: "EXTENDED", img: "https://bluedragonjet.com/wp-content/uploads/2026/02/image.png", id: "extended", cards: { pl: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Extended-PL-1.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2024/05/BDJ-Extended-EN.pdf", de: "https://bluedragonjet.de/wp-content/uploads/2024/05/BDJ-Extended-DE-2023-2.pdf" }, manuals: { pl: "https://bluedragonjet.com/wp-content/uploads/2026/01/Instrukcja-obslugi-Pneumatic-Standard_Extended_NEXT_MAX.pdf", en: "https://bluedragonjet.com/wp-content/uploads/2026/01/User-Manual-ENG-Pneumatic-Standard_Extended_NEXT_MAX-1.pdf", de: "https://bluedragonjet.com/wp-content/uploads/2026/01/Benutzerhandbuch-DE-Pneumatic-Standard_Extended_NEXT_MAX.pdf" } }
    ];

    let currentMachine = null;
    let specsOpen = false;

    function init() {
        setLanguage(currentLang);
        renderMachines(machines);
    }

    function renderMachines(list) {
        const container = document.getElementById('machines-container');
        if(!container) return;
        container.innerHTML = '';
        list.forEach((machine, index) => {
            const card = document.createElement('div');
            card.className = 'machine-card';
            card.style.animation = `fadeIn 0.5s ease forwards ${index * 0.1}s`;
            card.onclick = () => selectMachine(machine);
            card.innerHTML = `
                <svg class="snake-border" xmlns="http://www.w3.org/2000/svg"><rect x="0" y="0" width="100%" height="100%" rx="20" ry="20" pathLength="100" /></svg>
                <div class="img-wrapper"><img src="${machine.img}" alt="${machine.name}"></div>
                <h3>${machine.name}</h3>
            `;
            container.appendChild(card);
        });
    }

    function filterMachines() {
        const query = document.getElementById('search-input').value.toLowerCase();
        if(!query) { renderMachines(machines); return; }
        renderMachines(machines.filter(m => m.name.toLowerCase().includes(query)));
    }

    function setLanguage(lang) {
        currentLang = lang;
        document.querySelectorAll('.lang-option').forEach(btn => {
            btn.classList.remove('active');
            if(btn.dataset.langCode === lang) btn.classList.add('active');
        });
        document.querySelectorAll('[data-lang]').forEach(el => {
            const key = el.getAttribute('data-lang');
            if (translations[lang] && translations[lang][key]) el.innerText = translations[lang][key];
        });
        const si = document.getElementById('search-input');
        if (si) si.placeholder = translations[lang]['search'];
    }

    function navigate(viewId) {
        const layer = document.getElementById('transition-layer');
        const logo = document.getElementById('transition-logo');
        layer.classList.remove('active'); logo.classList.remove('active');
        void layer.offsetWidth;
        layer.classList.add('active'); logo.classList.add('active');
        setTimeout(() => {
            window.scrollTo(0,0);
            document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active-view'));
            const target = document.getElementById(viewId + '-view');
            if(target) target.classList.add('active-view');
            if(viewId==='home') {
                currentMachine = null;
                document.getElementById('search-input').value = "";
                renderMachines(machines);
            }
            closeSpecs();
        }, 400);
    }

    function selectMachine(machine) {
        currentMachine = machine;
        document.getElementById('detail-title').innerText = machine.name;
        document.getElementById('detail-img').src = machine.img;
        closeSpecs();
        renderSpecsTable(machine.id);
        navigate('detail');
    }

    function selectMachineById(id) {
        const machine = machines.find(m => m.id === id);
        if (machine) selectMachine(machine);
    }

    function goToLink(type) {
        if (!currentMachine) return;
        let targetLink = null;
        if (type === 'film') {
            if (currentMachine.videoLink) window.open(currentMachine.videoLink, '_blank');
            else navigate('soon');
            return;
        } else if (type === 'karta') {
            if (currentMachine.cards) targetLink = currentMachine.cards[currentLang] || currentMachine.cards['en'] || currentMachine.cards['pl'];
        } else if (type === 'instrukcja') {
            if (currentMachine.manuals) targetLink = currentMachine.manuals[currentLang] || currentMachine.manuals['en'] || currentMachine.manuals['pl'];
        }
        if (targetLink) window.open(targetLink, '_blank');
        else navigate('soon');
    }

    function renderSpecsTable(machineId) {
        const table = document.getElementById('specs-table');
        const specs = specsDB[machineId];

        if (!specs || specs.length === 0) {
            table.innerHTML = '<tr><td colspan="2" class="specs-no-data">Brak danych technicznych dla tego urządzenia.</td></tr>';
            return;
        }

        table.innerHTML = specs.map(row => {
            let valueCell;
            if (row.list) {
                const items = row.value.split(';').map(s => s.trim()).filter(Boolean);
                if (items.length > 1) {
                    valueCell = `<ul class="specs-list-value">${items.map(i => `<li>${i}</li>`).join('')}</ul>`;
                } else {
                    valueCell = row.value;
                }
            } else {
                valueCell = row.value;
            }
            return `<tr><td>${row.label}</td><td>${valueCell}</td></tr>`;
        }).join('');
    }

    function toggleSpecs() {
        const btn = document.getElementById('specs-toggle');
        const body = document.getElementById('specs-body');
        specsOpen = !specsOpen;
        btn.classList.toggle('open', specsOpen);
        body.classList.toggle('open', specsOpen);
    }

    function closeSpecs() {
        specsOpen = false;
        const btn = document.getElementById('specs-toggle');
        const body = document.getElementById('specs-body');
        if (btn) btn.classList.remove('open');
        if (body) body.classList.remove('open');
    }

    function startApp() {
        const app = document.getElementById('bdj-webapp-container');
        if (app) document.body.appendChild(app);
        setLanguage(currentLang);
        renderMachines(machines);
        const container = document.getElementById('machines-container');
        if (!container || container.innerHTML.trim() === "") {
            setTimeout(() => renderMachines(machines), 500);
        }
    }

    startApp();
    window.addEventListener('load', startApp);
</script>
<?php get_footer(); ?>
