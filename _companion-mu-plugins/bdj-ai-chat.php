<?php
/**
 * Plugin Name: Dragon AI Chat — Asystent BDJ
 * Description: Oficjalny widget asystenta AI Blue Dragon Jet (Dragon AI v0.0.14).
 * Version: 0.0.14
 * Author: Blue Dragon Jet
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'BDJ_AI_CHAT_URL' ) ) {
	define( 'BDJ_AI_CHAT_URL', 'https://asystent-bdj-ai.onrender.com' );
}

if ( ! defined( 'BDJ_AI_EMBED_VERSION' ) ) {
	define( 'BDJ_AI_EMBED_VERSION', '0.0.14' );
}

add_action(
	'wp_footer',
	function () {
		if ( is_admin() ) {
			return;
		}

		$lang = function_exists( 'bdj_current_lang' ) ? bdj_current_lang() : 'pl';
		if ( empty( $lang ) && function_exists( 'pll_current_language' ) ) {
			$lang = pll_current_language();
		}
		if ( empty( $lang ) ) {
			$lang = 'pl';
		}

		$tips = [
			'pl' => 'Cześć! Chętnie pomogę Ci w doborze części i parametrów 😊',
			'en' => 'Hi! I\'m happy to help you find the right parts and specs 😊',
			'de' => 'Hallo! Ich helfe Ihnen gerne bei der Teileauswahl und Spezifikationen 😊',
		];

		$close_labels = [
			'pl' => 'Zamknij',
			'en' => 'Close',
			'de' => 'Schließen',
		];

		$tip_text   = $tips[ $lang ] ?? $tips['pl'];
		$close_aria = $close_labels[ $lang ] ?? $close_labels['pl'];
		?>
<script id="bdj-dragon-ai-loader">
(function () {
  if (window.__bdjAiEmbedLoaded) return;
  window.__bdjAiEmbedLoaded = true;

  var BASE = <?php echo wp_json_encode( rtrim( BDJ_AI_CHAT_URL, '/' ) ); ?>;
  var EMBED_VERSION = <?php echo wp_json_encode( BDJ_AI_EMBED_VERSION ); ?>;
  var PAGE_LANG = <?php echo wp_json_encode( $lang ); ?>;
  var TIP_TEXT = <?php echo wp_json_encode( $tip_text ); ?>;
  var TIP_CLOSE = <?php echo wp_json_encode( $close_aria ); ?>;

  // Usun stare instancje
  ["bdj-ai-fab", "bdj-ai-tip", "bdj-ai-embed", "bdj-ai-widget"].forEach(function (id) {
    var el = document.getElementById(id);
    if (el) el.remove();
  });

  var style = document.createElement("style");
  style.textContent = [
    "#bdj-ai-fab{position:fixed!important;bottom:28px!important;right:28px!important;width:60px!important;height:60px!important;",
    "border:1px solid rgba(255,255,255,.2)!important;border-radius:50%!important;padding:0!important;margin:0!important;",
    "background:linear-gradient(145deg,#0f172a,#1e293b)!important;color:#fff!important;cursor:pointer!important;",
    "z-index:2147483647!important;box-shadow:0 12px 32px rgba(15,23,42,.32)!important;",
    "display:flex!important;align-items:center!important;justify-content:center!important;pointer-events:auto!important;touch-action:manipulation!important;",
    "transition:transform .2s ease,box-shadow .2s ease!important;}",
    "#bdj-ai-fab:hover{transform:scale(1.06)!important;box-shadow:0 16px 36px rgba(15,23,42,.4)!important;}",
    "#bdj-ai-fab.is-chat-open{display:none!important;}",
    "#bdj-ai-fab svg{width:26px;height:26px;pointer-events:none;}",
    "#bdj-ai-tip{position:fixed!important;bottom:100px!important;right:28px!important;max-width:min(320px,calc(100vw - 40px));",
    "z-index:2147483647!important;background:rgba(255,255,255,.96)!important;border:1px solid rgba(15,23,42,.08)!important;",
    "backdrop-filter:blur(12px)!important;-webkit-backdrop-filter:blur(12px)!important;",
    "border-radius:18px!important;padding:12px 14px!important;box-shadow:0 16px 36px rgba(15,23,42,.18)!important;",
    "cursor:pointer!important;font-family:system-ui,-apple-system,sans-serif!important;pointer-events:auto!important;display:none;touch-action:manipulation!important;}",
    "#bdj-ai-tip strong{display:block;font-size:14px;color:#0f172a;font-weight:700;}",
    "#bdj-ai-tip span{display:block;font-size:13px;color:#475569;line-height:1.35;margin-top:2px;}",
    "#bdj-ai-tip-close{background:none;border:none;font-size:18px;color:#94a3b8;cursor:pointer;padding:0 4px;pointer-events:auto!important;line-height:1;}",
    "#bdj-ai-tip-close:hover{color:#475569;}",
    "#bdj-ai-embed{display:none;position:fixed!important;",
    "bottom:max(24px,env(safe-area-inset-bottom,24px))!important;",
    "right:max(24px,env(safe-area-inset-right,24px))!important;",
    "width:min(440px,calc(100vw - 32px))!important;height:min(720px,calc(100dvh - 36px))!important;",
    "z-index:2147483646!important;background:#fff!important;pointer-events:none!important;border:none!important;",
    "border-radius:24px!important;overflow:hidden!important;",
    "box-shadow:0 24px 60px rgba(15,23,42,.22),0 8px 24px rgba(15,23,42,.08)!important;}",
    "#bdj-ai-embed.is-open{display:block!important;pointer-events:auto!important;}",
    "#bdj-ai-widget{width:100%!important;height:100%!important;border:0!important;background:transparent!important;}",
    "@media (max-width:680px){",
    "body.bdj-ai-chat-open{overflow:hidden!important;}",
    "#bdj-ai-fab,#bdj-ai-tip{display:none!important;}",
    "#bdj-ai-embed.is-open{inset:0!important;top:0!important;right:0!important;bottom:0!important;left:0!important;",
    "width:100%!important;height:100%!important;height:100dvh!important;max-width:none!important;max-height:none!important;",
    "border-radius:0!important;box-shadow:none!important;background:#fff!important;}",
    "}",
  ].join("");

  var fab = document.createElement("button");
  fab.id = "bdj-ai-fab";
  fab.type = "button";
  fab.setAttribute("aria-label", "Dragon AI");
  fab.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path><circle cx="8.5" cy="10.5" r="1" fill="currentColor" stroke="none"></circle><circle cx="12" cy="10.5" r="1" fill="currentColor" stroke="none"></circle><circle cx="15.5" cy="10.5" r="1" fill="currentColor" stroke="none"></circle></svg>';

  var tip = document.createElement("div");
  tip.id = "bdj-ai-tip";
  tip.innerHTML = '<div style="display:flex;gap:10px;align-items:flex-start;"><div style="flex:1;min-width:0;"><strong>DRAGON AI</strong><span>' + TIP_TEXT + '</span></div><button id="bdj-ai-tip-close" type="button" aria-label="' + TIP_CLOSE + '">&times;</button></div>';

  var wrap = document.createElement("div");
  wrap.id = "bdj-ai-embed";
  var frame = document.createElement("iframe");
  frame.id = "bdj-ai-widget";
  frame.title = "Dragon AI";
  frame.allow = "clipboard-write";
  frame.setAttribute("allowfullscreen", "true");
  wrap.appendChild(frame);

  var ready = false;
  var wantOpen = false;
  var loaded = false;

  function hideTip() { tip.style.display = "none"; }

  function showChat() {
    hideTip();
    fab.classList.add("is-chat-open");
    wrap.classList.add("is-open");
    wrap.style.display = "block";
    wrap.style.pointerEvents = "auto";
    document.body.classList.add("bdj-ai-chat-open");
  }

  function hideChat() {
    fab.classList.remove("is-chat-open");
    wrap.classList.remove("is-open");
    wrap.style.display = "none";
    wrap.style.pointerEvents = "none";
    document.body.classList.remove("bdj-ai-chat-open");
    wantOpen = false;
  }

  function sendOpen() {
    if (!frame.contentWindow) return;
    try { frame.contentWindow.postMessage({ type: "bdj-ai-command", action: "open" }, "*"); } catch (e) {}
  }

  function openChat() {
    wantOpen = true;
    showChat();
    ensureFrame();
    sendOpen();
  }

  window.__bdjOpenChat = openChat;
  window.__bdjHideChat = hideChat;

  function ensureFrame() {
    if (loaded) {
      sendOpen();
      return;
    }
    loaded = true;
    frame.src = BASE + "/?embed=1&open=1&lang=" + encodeURIComponent(PAGE_LANG) + "&v=" + encodeURIComponent(EMBED_VERSION);
  }

  // Integracja z formularzem strony (Krok 3 wizarda #wiz-form lub Contact Form 7)
  function forwardOfferToWpForm(data) {
    if (!data || typeof data !== "object") return false;

    var itemLines = (data.items || []).map(function (row) {
      return Array.isArray(row) ? row.filter(Boolean).join(" | ") : String(row);
    }).join("\n");

    var details = [
      data.company ? "Firma: " + data.company : "",
      data.machine ? "Maszyna: " + data.machine : "",
      data.message ? "Uwagi: " + data.message : "",
      itemLines ? "Wybrane części:\n" + itemLines : ""
    ].filter(Boolean).join("\n\n");

    // 1. Integracja z motywem Blue Dragon Jet (#wiz-form)
    var wizForm = document.getElementById("wiz-form");
    if (wizForm) {
      var nameEl = document.getElementById("bdj_name");
      if (nameEl && data.company) nameEl.value = data.company;

      var emailEl = document.getElementById("bdj_email");
      if (emailEl && data.email) emailEl.value = data.email;

      var phoneEl = document.getElementById("bdj_phone");
      if (phoneEl && data.phone) phoneEl.value = data.phone;

      var msgEl = document.getElementById("bdj_message");
      if (msgEl) {
        msgEl.value = details || (data.message || "");
      }

      var catInput = document.getElementById("wiz-cat-input");
      if (catInput) {
        catInput.value = (data.request_type === "oferta" ? "Części zamienne" : "Kontakt");
      }

      // Otwórz modal wizarda
      var overlay = document.getElementById("wiz-modal");
      if (overlay) {
        overlay.classList.add("is-open");
        document.body.style.overflow = "hidden";

        // Przejdź do kroku 3 (dane kontaktowe)
        [1, 2, 3].forEach(function(i){
          var s = document.getElementById("ws" + i);
          if (s) s.classList.toggle("is-visible", i === 3);
        });
        document.querySelectorAll(".wiz-sdot").forEach(function(d){
          var i = parseInt(d.dataset.step);
          d.classList.remove("is-active", "is-done");
          if (i < 3) d.classList.add("is-done");
          else if (i === 3) d.classList.add("is-active");
        });
        ["wln1", "wln2"].forEach(function(id){
          var l = document.getElementById(id);
          if (l) l.classList.add("is-done");
        });

        var sumEl = document.getElementById("wiz-sum");
        if (sumEl) {
          var sumHtml = "<strong>" + (data.machine ? ("BDJ " + data.machine.replace(/^BDJ\s+/i, "")) : "Zapytanie Dragon AI") + "</strong>";
          if (itemLines) {
            sumHtml += "<ul>" + (data.items || []).map(function(it){
              return "<li>" + (Array.isArray(it) ? it.join(" — ") : it) + "</li>";
            }).join("") + "</ul>";
          }
          sumEl.innerHTML = sumHtml;
        }
      }
      hideChat();
      return true;
    }

    // 2. Fallback do Contact Form 7
    var root = document.getElementById("offer-form");
    if (root) {
      var cf7 = root.querySelector("form.wpcf7-form");
      if (cf7) {
        function setField(name, val) {
          var el = cf7.querySelector("[name=\"" + name + "\"]");
          if (el && val != null && val !== "") el.value = val;
        }
        setField("your-email", data.email);
        setField("your-phone", data.phone);
        setField("calc01", data.machine || data.company || "");
        setField("calc02", details);
        setField("products-list", itemLines || details);
        root.scrollIntoView({ behavior: "smooth", block: "center" });
        hideChat();
        return true;
      }
    }

    return false;
  }

  function mount() {
    document.head.appendChild(style);
    document.body.appendChild(fab);
    document.body.appendChild(tip);
    document.body.appendChild(wrap);

    setTimeout(ensureFrame, 400);

    frame.addEventListener("load", function () {
      if (wantOpen) {
        setTimeout(function () { ready = true; sendOpen(); }, 80);
      }
    });

    setTimeout(function () {
      if (!wrap.classList.contains("is-open")) tip.style.display = "block";
    }, 2800);

    fab.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      openChat();
    });

    tip.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      if (e.target && e.target.id === "bdj-ai-tip-close") {
        hideTip();
        return;
      }
      openChat();
    });

    window.addEventListener("message", function (e) {
      if (!e.data || typeof e.data !== "object") return;
      if (e.data.type === "bdj-ai-ready") {
        ready = true;
        if (wantOpen) {
          try { frame.contentWindow.postMessage({ type: "bdj-ai-command", action: "open" }, "*"); } catch (err) {}
        }
      }
      if (e.data.type === "bdj-ai-resize") {
        if (e.data.open === false) hideChat();
      }
      if (e.data.type === "bdj-ai-offer") {
        forwardOfferToWpForm(e.data);
      }
    });
  }

  if (document.body) mount();
  else document.addEventListener("DOMContentLoaded", mount);
})();
</script>
		<?php
	},
	99
);
