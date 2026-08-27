(function () {
    'use strict';

    /* ── Header scroll ─────────────────────────────────────────────────── */
    const header = document.getElementById('site-header');
    if (header) {
        let ticking = false;
        window.addEventListener('scroll', function () {
            if (!ticking) {
                requestAnimationFrame(function () {
                    header.classList.toggle('scrolled', window.scrollY > 50);
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    /* ── Hamburger ─────────────────────────────────────────────────────── */
    const hamburger = document.querySelector('.hamburger');
    const primaryNav = document.getElementById('primary-nav');
    if (hamburger && primaryNav) {
        hamburger.addEventListener('click', function () {
            const open = hamburger.classList.toggle('is-active');
            primaryNav.classList.toggle('is-open', open);
            hamburger.setAttribute('aria-expanded', String(open));
        });
    }

    /* ── Animated counters (IntersectionObserver) ──────────────────────── */
    const statEls = document.querySelectorAll('.stat__number');

    function runCounter(el) {
        const target = parseInt(el.dataset.target, 10);
        const duration = 1800;
        const startTime = performance.now();

        function tick(now) {
            const elapsed  = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const eased    = 1 - Math.pow(1 - progress, 3); // ease-out cubic
            el.textContent = Math.round(eased * target);
            if (progress < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }

    if (statEls.length) {
        const io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    runCounter(entry.target);
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statEls.forEach(function (el) { io.observe(el); });
    }

    /* ── History timeline — scroll driven ─────────────────────────────── */
    (function () {
        var section = document.querySelector('.history');
        var fill    = document.getElementById('history-fill');
        var items   = document.querySelectorAll('.history__item');
        if (!section || !fill || !items.length) return;

        var count = items.length;

        function update() {
            var rect     = section.getBoundingClientRect();
            var winH     = window.innerHeight;
            // start animating when section top crosses 85% of viewport height
            // finish by the time section center passes mid-screen
            var progress = Math.max(0, Math.min(1,
                (winH * 0.85 - rect.top) / (rect.height * 0.65)
            ));

            fill.style.width = (progress * 100) + '%';

            items.forEach(function (item, i) {
                // spread thresholds: 0, 0.28, 0.56, 0.84 → fire early
                var threshold = (i / count) * 0.85;
                item.classList.toggle('is-active', progress >= threshold);
            });
        }

        window.addEventListener('scroll', update, { passive: true });
        update(); // run once on load
    }());

    /* ── Value props panels — scroll reveal ───────────────────────────── */
    var vpPanels = document.querySelectorAll('.vp__panel');
    if (vpPanels.length) {
        var vpObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    vpObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        vpPanels.forEach(function (panel, i) {
            panel.style.transitionDelay = (i * 0.15) + 's';
            vpObserver.observe(panel);
        });
    }

    /* ── Reviews slider (identyczny mechanizm co maszyny) ─────────────────── */
    (function () {
        var track   = document.querySelector('.reviews__track');
        var prevBtn = document.getElementById('reviews-prev');
        var nextBtn = document.getElementById('reviews-next');
        var dotsEl  = document.getElementById('reviews-dots');
        if (!track || !prevBtn || !nextBtn) return;

        var cards   = Array.from(track.children);
        if (!cards.length) return;

        var current = 0;
        var GAP = 32; // 2rem

        function visibleCount() {
            if (window.innerWidth <= 600) return 1;
            if (window.innerWidth <= 900) return 2;
            return 3;
        }
        function maxIndex() { return Math.max(0, cards.length - visibleCount()); }
        function cardWidth() {
            var vis = visibleCount();
            return (track.parentElement.offsetWidth - GAP * (vis - 1)) / vis;
        }

        function buildDots() {
            if (!dotsEl) return;
            dotsEl.innerHTML = '';
            var cnt = maxIndex() + 1;
            if (cnt <= 1) { dotsEl.style.display = 'none'; return; }
            dotsEl.style.display = '';
            for (var i = 0; i < cnt; i++) {
                var dot = document.createElement('button');
                dot.className = 'reviews__dot' + (i === current ? ' is-active' : '');
                dot.setAttribute('aria-label', 'Opinia ' + (i + 1));
                (function (idx) {
                    dot.addEventListener('click', function () { goTo(idx); });
                }(i));
                dotsEl.appendChild(dot);
            }
        }
        function updateDots() {
            if (!dotsEl) return;
            dotsEl.querySelectorAll('.reviews__dot').forEach(function (d, i) {
                d.classList.toggle('is-active', i === current);
            });
        }

        function goTo(index) {
            var max = maxIndex();
            current = Math.max(0, Math.min(index, max));
            track.style.transform = 'translateX(-' + (current * (cardWidth() + GAP)) + 'px)';
            prevBtn.disabled = (current === 0);
            nextBtn.disabled = (current >= max);
            updateDots();
        }

        prevBtn.addEventListener('click', function () { goTo(current - 1); });
        nextBtn.addEventListener('click', function () { goTo(current + 1); });

        // Touch swipe
        var touchStartX = 0;
        track.addEventListener('touchstart', function (e) { touchStartX = e.touches[0].clientX; }, { passive: true });
        track.addEventListener('touchend', function (e) {
            if (Math.abs(touchStartX - e.changedTouches[0].clientX) > 50)
                goTo(touchStartX > e.changedTouches[0].clientX ? current + 1 : current - 1);
        });

        // Auto-advance + pause on hover
        var autoTimer = setInterval(function () { goTo(current < maxIndex() ? current + 1 : 0); }, 7000);
        track.parentElement.addEventListener('mouseenter', function () { clearInterval(autoTimer); });
        track.parentElement.addEventListener('mouseleave', function () {
            autoTimer = setInterval(function () { goTo(current < maxIndex() ? current + 1 : 0); }, 7000);
        });

        // Rebuild on resize
        var resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () { buildDots(); goTo(Math.min(current, maxIndex())); }, 150);
        });

        buildDots();
        goTo(0);
    }());

    /* ── Machines carousel ─────────────────────────────────────────────── */
    (function () {
        var track   = document.getElementById('machines-track');
        var prevBtn = document.getElementById('machines-prev');
        var nextBtn = document.getElementById('machines-next');
        var dotsEl  = document.getElementById('machines-dots');
        if (!track || !prevBtn || !nextBtn) return;

        var cards = Array.from(track.children);
        if (!cards.length) return;

        var current = 0;
        var GAP = 32; // 2rem in px

        function visibleCount() {
            if (window.innerWidth <= 600) return 1;
            if (window.innerWidth <= 900) return 2;
            return 3;
        }

        function maxIndex() {
            return Math.max(0, cards.length - visibleCount());
        }

        function cardWidth() {
            var wrap = track.parentElement;
            var vis  = visibleCount();
            return (wrap.offsetWidth - GAP * (vis - 1)) / vis;
        }

        function buildDots() {
            if (!dotsEl) return;
            dotsEl.innerHTML = '';
            var count = maxIndex() + 1;
            if (count <= 1) { dotsEl.style.display = 'none'; return; }
            dotsEl.style.display = '';
            for (var i = 0; i < count; i++) {
                var dot = document.createElement('button');
                dot.className = 'machines__dot' + (i === current ? ' is-active' : '');
                dot.setAttribute('aria-label', 'Slide ' + (i + 1));
                (function (idx) {
                    dot.addEventListener('click', function () { goTo(idx); });
                }(i));
                dotsEl.appendChild(dot);
            }
        }

        function updateDots() {
            if (!dotsEl) return;
            var dots = dotsEl.querySelectorAll('.machines__dot');
            dots.forEach(function (d, i) {
                d.classList.toggle('is-active', i === current);
            });
        }

        function goTo(index) {
            var max = maxIndex();
            // Nieskończona pętla
            if (index > max) index = 0;
            if (index < 0)   index = max;
            current = index;
            var offset = current * (cardWidth() + GAP);
            track.style.transform = 'translateX(-' + offset + 'px)';
            prevBtn.disabled = false;
            nextBtn.disabled = false;
            updateDots();
        }

        // Autoplay co 5 sekund
        var autoplayTimer = null;
        function startAutoplay() {
            stopAutoplay();
            autoplayTimer = setInterval(function () { goTo(current + 1); }, 5000);
        }
        function stopAutoplay() {
            if (autoplayTimer) { clearInterval(autoplayTimer); autoplayTimer = null; }
        }

        prevBtn.addEventListener('click', function () {
            goTo(current - 1);
            stopAutoplay();
            setTimeout(startAutoplay, 8000); // wznów po 8s od ręcznego kliknięcia
        });
        nextBtn.addEventListener('click', function () {
            goTo(current + 1);
            stopAutoplay();
            setTimeout(startAutoplay, 8000);
        });

        // Touch/swipe support
        var touchStartX = 0;
        track.addEventListener('touchstart', function (e) {
            touchStartX = e.touches[0].clientX;
            stopAutoplay();
        }, { passive: true });
        track.addEventListener('touchend', function (e) {
            var diff = touchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 50) goTo(diff > 0 ? current + 1 : current - 1);
            setTimeout(startAutoplay, 8000);
        });

        // Pauza gdy kursor nad karuzelą
        track.parentElement.addEventListener('mouseenter', stopAutoplay);
        track.parentElement.addEventListener('mouseleave', startAutoplay);

        // Rebuild on resize
        var resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                buildDots();
                goTo(Math.min(current, maxIndex()));
            }, 150);
        });

        buildDots();
        goTo(0);
        startAutoplay();
    }());

    /* ── Live Search for Machines & Accessories (Autocomplete) ────────── */
    (function () {
        var searchWrap = document.getElementById('bdj-archive-search');
        var input      = document.getElementById('bdj-search-input');
        var dropdown   = document.getElementById('bdj-search-dropdown');
        var clearBtn   = document.getElementById('bdj-search-clear');
        var spinner    = document.getElementById('bdj-search-spinner');
        if (!input || !dropdown) return;

        var ajaxUrl = (window.bdj_live_search_cfg && window.bdj_live_search_cfg.ajax_url)
            ? window.bdj_live_search_cfg.ajax_url
            : '/wp-admin/admin-ajax.php';
        var lang = (window.bdj_live_search_cfg && window.bdj_live_search_cfg.lang)
            ? window.bdj_live_search_cfg.lang
            : 'pl';

        var noResultsText = (window.bdj_live_search_cfg && window.bdj_live_search_cfg.no_results && window.bdj_live_search_cfg.no_results[lang])
            ? window.bdj_live_search_cfg.no_results[lang]
            : 'Brak wyników dla';

        var cache = {};
        var debounceTimer = null;
        var activeIndex = -1;
        var currentQuery = '';

        function escapeHtml(str) {
            return String(str || '').replace(/[&<>"']/g, function (m) {
                return ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' })[m];
            });
        }

        function highlightMatch(text, query) {
            if (!query || !text) return escapeHtml(text);
            var escaped = escapeHtml(text);
            var q = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            return escaped.replace(new RegExp('(' + q + ')', 'gi'), '<strong style="color:var(--color-secondary);font-weight:800;">$1</strong>');
        }

        function renderResults(items, query) {
            activeIndex = -1;
            if (!items || !items.length) {
                dropdown.innerHTML = '<div class="archive-filter__result-empty">' +
                    escapeHtml(noResultsText) + ' "<strong>' + escapeHtml(query) + '</strong>"</div>';
                dropdown.style.display = 'block';
                return;
            }

            var html = '';
            items.forEach(function (it, idx) {
                var thumbHtml = it.thumb
                    ? '<img src="' + escapeHtml(it.thumb) + '" class="archive-filter__result-img" alt="" loading="lazy">'
                    : '<div class="archive-filter__result-img" style="background:#e2e8f0;display:flex;align-items:center;justify-content:center;color:#94a3b8;font-size:0.7rem;">BDJ</div>';

                var badgeHtml = it.category
                    ? '<span class="archive-filter__result-badge">' + escapeHtml(it.category) + '</span>'
                    : '';

                var specsHtml = it.specs
                    ? '<span>' + escapeHtml(it.specs) + '</span>'
                    : '';

                html += '<a href="' + escapeHtml(it.url) + '" class="archive-filter__result-item" data-index="' + idx + '" role="option">' +
                    thumbHtml +
                    '<div class="archive-filter__result-info">' +
                        '<h4 class="archive-filter__result-title">' + highlightMatch(it.title, query) + '</h4>' +
                        '<div class="archive-filter__result-meta">' + badgeHtml + specsHtml + '</div>' +
                    '</div>' +
                '</a>';
            });

            dropdown.innerHTML = html;
            dropdown.style.display = 'block';
        }

        function closeDropdown() {
            dropdown.style.display = 'none';
            dropdown.innerHTML = '';
            activeIndex = -1;
        }

        function fetchResults(q) {
            var trimmed = q.trim();
            if (trimmed.length < 1) {
                closeDropdown();
                if (spinner) spinner.style.display = 'none';
                return;
            }

            if (cache[trimmed]) {
                if (spinner) spinner.style.display = 'none';
                renderResults(cache[trimmed], trimmed);
                return;
            }

            if (spinner) spinner.style.display = 'block';

            var url = ajaxUrl + '?action=bdj_live_search&q=' + encodeURIComponent(trimmed) + '&lang=' + encodeURIComponent(lang);

            fetch(url)
                .then(function (res) { return res.json(); })
                .then(function (res) {
                    if (spinner) spinner.style.display = 'none';
                    if (res && res.success) {
                        cache[trimmed] = res.data;
                        if (input.value.trim() === trimmed) {
                            renderResults(res.data, trimmed);
                        }
                    }
                })
                .catch(function () {
                    if (spinner) spinner.style.display = 'none';
                });
        }

        input.addEventListener('input', function () {
            var val = input.value;
            currentQuery = val;
            if (clearBtn) clearBtn.style.display = val.length ? 'block' : 'none';

            clearTimeout(debounceTimer);
            if (val.trim().length === 0) {
                closeDropdown();
                return;
            }

            debounceTimer = setTimeout(function () {
                fetchResults(val);
            }, 160);
        });

        input.addEventListener('focus', function () {
            if (input.value.trim().length > 0) {
                fetchResults(input.value);
            }
        });

        if (clearBtn) {
            clearBtn.addEventListener('click', function () {
                input.value = '';
                clearBtn.style.display = 'none';
                closeDropdown();
                input.focus();
            });
        }

        // Keyboard navigation
        input.addEventListener('keydown', function (e) {
            var items = dropdown.querySelectorAll('.archive-filter__result-item');
            if (!items.length || dropdown.style.display === 'none') return;

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                activeIndex = (activeIndex + 1) >= items.length ? 0 : activeIndex + 1;
                updateActiveItem(items);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                activeIndex = (activeIndex - 1) < 0 ? items.length - 1 : activeIndex - 1;
                updateActiveItem(items);
            } else if (e.key === 'Enter') {
                if (activeIndex >= 0 && items[activeIndex]) {
                    e.preventDefault();
                    window.location.href = items[activeIndex].getAttribute('href');
                }
            } else if (e.key === 'Escape') {
                closeDropdown();
            }
        });

        function updateActiveItem(items) {
            items.forEach(function (el, idx) {
                if (idx === activeIndex) {
                    el.classList.add('is-selected');
                    el.scrollIntoView({ block: 'nearest' });
                } else {
                    el.classList.remove('is-selected');
                }
            });
        }

        // Click outside closes dropdown
        document.addEventListener('click', function (e) {
            if (searchWrap && !searchWrap.contains(e.target)) {
                closeDropdown();
            }
        });
    }());

}());
