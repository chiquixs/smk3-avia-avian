<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Avia Avian Tbk — Profil &amp; Struktur Perusahaan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --green-900: #06402A;
            --green-800: #0A4A2C;
            --green-700: #0E5A36;
            --teal-600: #00696A;
            --green-500: #3FA34D;
            --lime-500: #5CB85A;
            --paper: #F3FAF5;
            --white: #FFFFFF;
            --ink-900: #102218;
            --ink-700: #3A4D43;
            --ink-500: #647A6F;
            --line: #DCEDE2;
            --shadow-sm: 0 2px 10px rgba(6, 64, 42, 0.07);
            --shadow-md: 0 10px 28px rgba(6, 64, 42, 0.12);
            --radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--ink-900);
            background: var(--white);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--green-900);
            letter-spacing: -0.01em;
        }

        .mono {
            font-family: 'IBM Plex Mono', monospace;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img,
        svg {
            display: block;
            max-width: 100%;
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 24px;
        }

        section {
            position: relative;
        }

        :focus-visible {
            outline: 2px solid var(--green-500);
            outline-offset: 3px;
        }

        button {
            font-family: inherit;
        }

        /* ---------- nav ---------- */
        .nav {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(6px);
            border-bottom: 1px solid var(--line);
        }

        .nav .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 78px;
        }

        .nav__brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav__brand img {
            height: 40px;
            width: auto;
        }

        .nav__brand-text {
            line-height: 1.2;
        }

        .nav__brand-text strong {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            color: var(--green-900);
        }

        .nav__brand-text span {
            display: block;
            font-size: 11.5px;
            color: var(--ink-500);
        }

        .nav__links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav__links a {
            font-size: 14px;
            font-weight: 600;
            color: var(--ink-700);
            padding: 6px 2px;
            border-bottom: 2px solid transparent;
            transition: color .15s, border-color .15s;
        }

        .nav__links a:hover,
        .nav__links a.active {
            color: var(--green-800);
            border-bottom-color: var(--green-500);
        }

        .nav__toggle {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            color: var(--green-900);
            cursor: pointer;
        }

        @media (max-width:880px) {
            .nav__links {
                display: none;
            }

            .nav__toggle {
                display: block;
            }

            .nav.open .nav__links {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
                position: absolute;
                top: 78px;
                left: 0;
                right: 0;
                background: #fff;
                padding: 14px 24px 22px;
                border-bottom: 1px solid var(--line);
                box-shadow: var(--shadow-md);
            }

            .nav.open .nav__links a {
                padding: 9px 0;
                width: 100%;
                border-bottom: none;
            }
        }

        /* ---------- buttons ---------- */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 22px;
            border-radius: 9px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: transform .12s, box-shadow .12s, background .15s;
            white-space: nowrap;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--green-700);
            color: #fff;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background: var(--green-900);
        }

        .btn-outline {
            background: transparent;
            border-color: var(--line);
            color: var(--green-900);
        }

        .btn-outline:hover {
            border-color: var(--green-500);
            color: var(--green-700);
        }

        .btn-light {
            background: rgba(255, 255, 255, 0.16);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.35);
        }

        .btn-light:hover {
            background: rgba(255, 255, 255, 0.26);
        }

        .btn-sm {
            padding: 8px 15px;
            font-size: 13px;
        }

        /* ---------- shared section chrome ---------- */
        .section-pad {
            padding: 90px 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--green-700);
            font-weight: 500;
            margin-bottom: 14px;
        }

        .eyebrow::before {
            content: '';
            width: 18px;
            height: 2px;
            background: var(--lime-500);
            display: inline-block;
        }

        .section-head {
            max-width: 680px;
            margin-bottom: 44px;
        }

        .section-head h2 {
            font-size: clamp(26px, 3.2vw, 33px);
            margin-bottom: 12px;
        }

        .section-head p {
            color: var(--ink-500);
            font-size: 15.5px;
        }

        .alt-bg {
            background: var(--paper);
        }

        .card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius);
        }

        /* ---------- hero ---------- */
        .hero {
            background: linear-gradient(180deg, var(--green-900) 0%, var(--green-800) 55%, var(--green-700) 100%);
            color: #fff;
            overflow: hidden;
        }

        .hero__blobs {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .hero .container {
            position: relative;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 48px;
            align-items: center;
            padding-top: 72px;
            padding-bottom: 72px;
        }

        .hero__eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 7px 14px;
            border-radius: 99px;
            font-size: 12.5px;
            font-family: 'IBM Plex Mono', monospace;
            color: #D9F0DF;
            margin-bottom: 22px;
        }

        .hero h1 {
            color: #fff;
            font-size: clamp(30px, 4.3vw, 46px);
            line-height: 1.14;
            margin-bottom: 16px;
        }

        .hero h1 em {
            font-style: normal;
            color: #9BE29C;
        }

        .hero p.lead {
            color: #CBE6CF;
            font-size: 16px;
            max-width: 480px;
            margin-bottom: 30px;
        }

        .hero__actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .hero__facts {
            display: grid;
            grid-template-columns: repeat(3, auto);
            gap: 30px;
        }

        .hero__fact strong {
            display: block;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 22px;
            color: #fff;
        }

        .hero__fact span {
            display: block;
            font-size: 12px;
            color: #B9D9BD;
            margin-top: 3px;
        }

        .hero__card {
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 16px;
            padding: 26px;
            backdrop-filter: blur(4px);
        }

        .hero__card h4 {
            color: #fff;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-family: 'IBM Plex Mono', monospace;
            font-weight: 500;
            margin-bottom: 16px;
        }

        .hero__card ul {
            list-style: none;
        }

        .hero__card li {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            font-size: 13.8px;
            color: #DCEFDD;
            padding: 9px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero__card li:last-child {
            border-bottom: none;
        }

        .hero__card li i {
            color: #9BE29C;
            margin-top: 2px;
        }

        @media (max-width:860px) {
            .hero .container {
                grid-template-columns: 1fr;
                padding-top: 52px;
            }

            .hero__facts {
                grid-template-columns: repeat(3, 1fr);
                gap: 14px;
            }
        }

        /* ---------- profil perusahaan ---------- */
        .profile-grid {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 18px;
        }

        .profile-card {
            padding: 26px;
        }

        .profile-card h4 {
            font-size: 15px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-card h4 i {
            color: var(--green-700);
            font-size: 15px;
        }

        .profile-card p {
            font-size: 14.5px;
            color: var(--ink-700);
        }

        .profile-list {
            display: grid;
            gap: 14px;
        }

        .profile-row {
            display: flex;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid var(--line);
        }

        .profile-row:last-child {
            border-bottom: none;
        }

        .profile-row dt {
            font-size: 12px;
            font-family: 'IBM Plex Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--ink-500);
            width: 150px;
            flex-shrink: 0;
            padding-top: 2px;
        }

        .profile-row dd {
            font-size: 14.8px;
            color: var(--ink-900);
            font-weight: 500;
        }

        .fact-pills {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .fact-pill {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--paper);
            border: 1px solid var(--line);
            padding: 10px 16px;
            border-radius: 99px;
            font-size: 13px;
            color: var(--ink-700);
        }

        .fact-pill i {
            color: var(--green-700);
        }

        @media (max-width:860px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-row {
                flex-direction: column;
                gap: 4px;
            }

            .profile-row dt {
                width: auto;
            }
        }

        /* ---------- upload box (used for org chart, K3 chart, denah) ---------- */
        .upload-box {
            border: 2px dashed var(--line);
            border-radius: var(--radius);
            background: var(--paper);
            min-height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            transition: border-color .15s, background .15s;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .upload-box:hover {
            border-color: var(--green-500);
            background: #EAF7EC;
        }

        .upload-box.has-image {
            cursor: default;
            background: #fff;
            border-style: solid;
            border-color: var(--line);
            padding: 0;
        }

        .upload-box__empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 10px;
            color: var(--ink-500);
        }

        .upload-box__empty i {
            font-size: 30px;
            color: var(--green-500);
        }

        .upload-box__empty strong {
            font-size: 14.5px;
            color: var(--ink-900);
            font-weight: 600;
        }

        .upload-box__empty span {
            font-size: 12.5px;
        }

        .upload-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            background: #fff;
        }

        .upload-box__replace {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(6, 64, 42, 0.85);
            color: #fff;
            font-size: 12.5px;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .upload-box__replace:hover {
            background: var(--green-900);
        }

        .upload-grid {
            display: grid;
            grid-template-columns: 1fr 0.85fr;
            gap: 28px;
            align-items: start;
        }

        .upload-grid .upload-info h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .upload-grid .upload-info p {
            font-size: 14px;
            color: var(--ink-500);
            margin-bottom: 18px;
        }

        .upload-grid .upload-info ul {
            display: grid;
            gap: 10px;
        }

        .upload-grid .upload-info li {
            display: flex;
            gap: 10px;
            font-size: 13.8px;
            color: var(--ink-700);
            align-items: flex-start;
        }

        .upload-grid .upload-info li i {
            color: var(--green-700);
            margin-top: 3px;
            font-size: 12px;
        }

        @media (max-width:860px) {
            .upload-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ---------- denah tabs ---------- */
        .tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 28px;
            flex-wrap: wrap;
            border-bottom: 1px solid var(--line);
        }

        .tab-btn {
            background: none;
            border: none;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            color: var(--ink-500);
            cursor: pointer;
            border-bottom: 2.5px solid transparent;
            margin-bottom: -1px;
            transition: color .15s, border-color .15s;
        }

        .tab-btn:hover {
            color: var(--green-800);
        }

        .tab-btn.active {
            color: var(--green-800);
            border-bottom-color: var(--green-700);
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        /* ---------- footer ---------- */
        footer {
            background: var(--green-900);
            color: #B9D9BD;
            padding: 48px 0 24px;
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 28px;
            margin-bottom: 28px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-brand img {
            height: 34px;
            filter: brightness(0) invert(1);
            opacity: 0.92;
        }

        .footer-brand strong {
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            display: block;
        }

        .footer-brand span {
            font-size: 12px;
            color: #9DC4A2;
        }

        footer .footer-links {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        footer .footer-links a {
            font-size: 13.5px;
            color: #B9D9BD;
        }

        footer .footer-links a:hover {
            color: #fff;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            padding-top: 18px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 12.3px;
            color: #79A180;
        }

        [data-animate] {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity .6s ease, transform .6s ease;
        }

        [data-animate].in {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <!-- ================= NAV ================= -->
    <nav class="nav" id="mainNav">
        <div class="container">
            <a href="#hero" class="nav__brand">
                <img src="{{ asset('assets/logo-avian.png') }}" alt="Logo">
                <span class="nav__brand-text"><strong>PT Avia Avian Tbk</strong><span>Profil &amp; Struktur
                        Perusahaan</span></span>
            </a>
            <div class="nav__links" id="navLinks">
                <a href="#profil">Profil Perusahaan</a>
                <a href="#struktur-organisasi">Struktur Organisasi</a>
                <a href="#tim-k3">Tim K3</a>
                <a href="#denah">Denah</a>
            </div>
            <button class="nav__toggle" id="navToggle" aria-label="Buka menu"><i class="fa-solid fa-bars"></i></button>
        </div>
    </nav>

    <!-- ================= HERO ================= -->
    <header class="hero" id="hero">
        <div class="hero__blobs">
            <svg width="100%" height="100%" viewBox="0 0 1140 560" preserveAspectRatio="xMidYMid slice"
                style="position:absolute;inset:0;opacity:0.55;">
                <path
                    d="M780 -40 C 950 30, 1080 140, 1040 280 C 1000 420, 820 470, 720 380 C 620 290, 640 150, 700 70 C 730 30, 750 -10, 780 -40 Z"
                    fill="#00696A" opacity="0.35" />
                <path
                    d="M880 60 C 1040 90, 1140 220, 1080 360 C 1020 500, 830 520, 760 400 C 700 300, 760 150, 850 90 Z"
                    fill="#3FA34D" opacity="0.30" />
                <path
                    d="M960 220 C 1080 250, 1110 380, 1010 450 C 920 510, 800 460, 800 370 C 800 290, 880 200, 960 220 Z"
                    fill="#5CB85A" opacity="0.30" />
            </svg>
        </div>
        <div class="container">
            <div>
                <div class="hero__eyebrow"><i class="fa-solid fa-paint-roller"></i> Sejak 1978 — Sidoarjo, Jawa Timur
                </div>
                <h1>Mengecat masa depan Indonesia dengan <em>kualitas dan tanggung jawab.</em></h1>
                <p class="lead">PT Avia Avian Tbk adalah perusahaan manufaktur cat, pelapis bangunan, dan bahan kimia
                    pendukung — berkomitmen menjadi yang terintegrasi, ramah lingkungan, dan terpercaya di Indonesia.
                </p>
                <div class="hero__actions">
                    <a href="/admin" class="btn btn-primary">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Masuk Dashboard SMK3
                    </a>
                    <a href="#struktur-organisasi" class="btn btn-light"><i class="fa-solid fa-sitemap"></i> Struktur
                        Organisasi</a>
                </div>
                <div class="hero__facts">
                    <div class="hero__fact"><strong class="mono">1978</strong><span>Tahun berdiri</span></div>
                    <div class="hero__fact"><strong class="mono">5</strong><span>Lini produk utama</span></div>
                    <div class="hero__fact"><strong class="mono">3</strong><span>Lantai kantor &amp; pabrik</span></div>
                </div>
            </div>
            <div class="hero__card">
                <h4>Sekilas Perusahaan</h4>
                <ul>
                    <li><i class="fa-solid fa-industry"></i> Manufaktur cat, pelapis bangunan &amp; bahan kimia
                        pendukung</li>
                    <li><i class="fa-solid fa-location-dot"></i> Kantor pusat &amp; pabrik di Sidoarjo, Jawa Timur</li>
                    <li><i class="fa-solid fa-swatchbook"></i> Cat tembok, cat kayu, cat besi, pelapis anti bocor,
                        thinner</li>
                    <li><i class="fa-solid fa-leaf"></i> Fokus pada produk ramah lingkungan &amp; berkualitas</li>
                </ul>
            </div>
        </div>
    </header>

    <!-- ================= PROFIL PERUSAHAAN ================= -->
    <section class="section-pad" id="profil">
        <div class="container">
            <div class="section-head">
                <div class="eyebrow">Profil Perusahaan</div>
                <h2>Mengenal PT Avia Avian Tbk</h2>
                <p>Informasi dasar perusahaan sebagai acuan identitas, lini usaha, dan arah strategis ke depan.</p>
            </div>

            <div class="profile-grid">
                <div class="card profile-card" data-animate>
                    <dl class="profile-list">
                        <div class="profile-row">
                            <dt>Nama</dt>
                            <dd>PT Avia Avian Tbk</dd>
                        </div>
                        <div class="profile-row">
                            <dt>Bidang Usaha</dt>
                            <dd>Perusahaan manufaktur yang bergerak di bidang produksi cat, pelapis bangunan, dan bahan
                                kimia pendukung.</dd>
                        </div>
                        <div class="profile-row">
                            <dt>Produk</dt>
                            <dd>Cat tembok, cat kayu, cat besi, pelapis anti bocor, thinner</dd>
                        </div>
                        <div class="profile-row">
                            <dt>Tahun Berdiri</dt>
                            <dd>1978</dd>
                        </div>
                        <div class="profile-row">
                            <dt>Lokasi</dt>
                            <dd>Kantor pusat dan pabrik berada di Sidoarjo, Jawa Timur</dd>
                        </div>
                    </dl>
                    <div class="fact-pills">
                        <div class="fact-pill"><i class="fa-solid fa-calendar"></i> 48 tahun beroperasi</div>
                        <div class="fact-pill"><i class="fa-solid fa-droplet"></i> 5 kategori produk</div>
                        <div class="fact-pill"><i class="fa-solid fa-map-pin"></i> Sidoarjo, Jawa Timur</div>
                    </div>
                </div>

                <div class="card profile-card" data-animate>
                    <h4><i class="fa-solid fa-bullseye"></i> Visi &amp; Misi</h4>
                    <p style="margin-bottom:18px;">Menjadi perusahaan cat terintegrasi, ramah lingkungan, dan terpercaya
                        di Indonesia, dengan fokus pada pengembangan cat berkualitas untuk memberikan nilai tambah bagi
                        pemangku kepentingan.</p>
                    <h4><i class="fa-solid fa-swatchbook"></i> Lini Produk</h4>
                    <p>Cat tembok &middot; Cat kayu &middot; Cat besi &middot; Pelapis anti bocor &middot; Thinner</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= STRUKTUR ORGANISASI ================= -->
    <section class="section-pad alt-bg" id="struktur-organisasi">
        <div class="container">
            <div class="section-head">
                <div class="eyebrow">Struktur Organisasi</div>
                <h2>Struktur organisasi tingkat korporat</h2>
            </div>

            <div class="upload-grid">
                <div class="upload-box has-image">
                    <img src="{{ asset('assets/struktur-organisasi.png') }}" alt="Struktur Organisasi">
                </div>

                <div class="upload-info">
                    <h3>Tentang struktur ini</h3>
                    <p>Bagan ini memetakan jajaran komisaris hingga direktur PT Avia Avian Tbk.</p>

                    <ul>
                        <li><i class="fa-solid fa-circle"></i> Komisaris & Komisaris Independen mengawasi arah strategis
                            perusahaan</li>
                        <li><i class="fa-solid fa-circle"></i> Direktur Utama & Wakil Direktur Utama memimpin
                            operasional harian</li>
                        <li><i class="fa-solid fa-circle"></i> Direktur fungsional membawahi operasional, keuangan,
                            serta penelitian & inovasi</li>
                        <li><i class="fa-solid fa-circle"></i> Wakil direktur menjalankan fungsi IT, pemasaran,
                            penjualan, dan operasional</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= STRUKTUR TIM K3 ================= -->
    <section class="section-pad" id="tim-k3">
        <div class="container">
            <div class="section-head">
                <div class="eyebrow">Struktur Tim K3</div>
                <h2>Struktur Tim Kesehatan &amp; Keselamatan Kerja</h2>
                <p>Upload bagan struktur Tim K3 (Ketua, Wakil Ketua, Sekretaris, dan koordinator-koordinator) pada kotak
                    di bawah ini.</p>
            </div>

            <div class="upload-grid">
                <div class="upload-box has-image">
                    <img src="{{ asset('assets/struktur-k3.png') }}" alt="Struktur Tim K3">
                </div>

                <div class="upload-info">
                    <h3>Tentang struktur ini</h3>
                    <p>Tim K3 bertanggung jawab langsung atas keselamatan kerja di seluruh area kantor dan pabrik.</p>

                    <ul>
                        <li><i class="fa-solid fa-circle"></i> Ketua & Wakil Ketua memimpin program K3 secara
                            keseluruhan</li>
                        <li><i class="fa-solid fa-circle"></i> Sekretaris mengelola dokumentasi & administrasi K3</li>
                        <li><i class="fa-solid fa-circle"></i> Koordinator EHS mengawasi seluruh koordinator bidang</li>
                        <li><i class="fa-solid fa-circle"></i> Koordinator bidang menangani tanggap darurat, kebakaran,
                            kesehatan & lingkungan, bahan kimia, floor warden, keamanan, emisi, elektrikal, hingga P3K
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= DENAH ================= -->
    <section class="section-pad alt-bg" id="denah">
        <div class="container">
            <div class="section-head">
                <div class="eyebrow">Denah Kantor &amp; Pabrik</div>
                <h2>Denah dan jalur evakuasi — 3 lantai</h2>
                <p>Upload gambar denah resmi untuk masing-masing lantai. Ringkasan fitur keselamatan setiap lantai
                    ditampilkan di samping.</p>
            </div>

            <div class="tabs" id="denahTabs">
                <button class="tab-btn active" data-tab="lt1">Lantai 1 — Produksi &amp; Logistik</button>
                <button class="tab-btn" data-tab="lt2">Lantai 2 — Lab &amp; Penunjang</button>
                <button class="tab-btn" data-tab="lt3">Lantai 3 — Perkantoran</button>
            </div>

            <div class="tab-panel active" id="panel-lt1">
                <div class="upload-grid">
                    <div class="upload-box has-image">
                        <img src="{{ asset('assets/denah-lantai-1.png') }}" alt="Denah Lantai 2">
                    </div>
                    <div class="upload-info">
                        <h3>Fitur keselamatan Lantai 1</h3>
                        <ul>
                            <li><i class="fa-solid fa-circle"></i> Area publik &amp; staf: resepsionis, pos keamanan,
                                klinik &amp; P3K, toilet, ruang ganti</li>
                            <li><i class="fa-solid fa-circle"></i> Area industri: produksi utama, penyimpanan bahan
                                kimia, gudang produk jadi, loading/unloading</li>
                            <li><i class="fa-solid fa-circle"></i> Wajib APD lengkap &amp; larangan merokok di seluruh
                                area produksi dan gudang</li>
                            <li><i class="fa-solid fa-circle"></i> Ruang bahan kimia dilengkapi simbol bahaya dan
                                exhaust fan</li>
                            <li><i class="fa-solid fa-circle"></i> APAR, CCTV, detektor asap di titik rawan, serta 1
                                hidran dekat gudang produk jadi</li>
                            <li><i class="fa-solid fa-circle"></i> Jalur kuning khusus forklift agar tidak berbenturan
                                dengan pekerja</li>
                            <li><i class="fa-solid fa-circle"></i> 5 pintu exit menuju satu titik kumpul utama di luar
                                gedung</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-panel" id="panel-lt2">
                <div class="upload-grid">
                    <div class="upload-box has-image">
                        <img src="{{ asset('assets/denah-lantai-2.png') }}" alt="Denah Lantai 2">
                    </div>
                    <div class="upload-info">
                        <h3>Fitur keselamatan Lantai 2</h3>
                        <ul>
                            <li><i class="fa-solid fa-circle"></i> Ruang kerja: laboratorium QC, R&amp;D, ruang
                                monitoring, ruang training K3</li>
                            <li><i class="fa-solid fa-circle"></i> Fasilitas penunjang: toilet, loker, ruang peralatan
                                K3, pantry, ruang istirahat</li>
                            <li><i class="fa-solid fa-circle"></i> APAR tersebar di hampir seluruh ruangan, dilengkapi
                                CCTV &amp; detektor asap</li>
                            <li><i class="fa-solid fa-circle"></i> Larangan merokok, wajib APD di laboratorium, koridor
                                wajib bebas rintangan</li>
                            <li><i class="fa-solid fa-circle"></i> Jalur evakuasi ditandai garis merah mengelilingi area
                                tengah</li>
                            <li><i class="fa-solid fa-circle"></i> 3 pintu exit (atas, kiri bawah, kanan) menuju titik
                                kumpul utama</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-panel" id="panel-lt3">
                <div class="upload-grid">
                    <div class="upload-box has-image">
                        <img src="{{ asset('assets/denah-lantai-3.png') }}" alt="Denah Lantai 3">
                    </div>
                    <div class="upload-info">
                        <h3>Fitur keselamatan Lantai 3</h3>
                        <ul>
                            <li><i class="fa-solid fa-circle"></i> Ruang kerja: direktur, manager, staff &amp;
                                administrasi, rapat, arsip, IT &amp; server</li>
                            <li><i class="fa-solid fa-circle"></i> Fasilitas: toilet, musholla, tangga &amp; lift,
                                pantry &amp; area makan, area istirahat, klinik &amp; P3K</li>
                            <li><i class="fa-solid fa-circle"></i> APAR di setiap ruangan tanpa kecuali, CCTV &amp;
                                detektor asap di seluruh ruang kerja</li>
                            <li><i class="fa-solid fa-circle"></i> Jalur evakuasi koridor tengah bergaris hijau berpanah
                            </li>
                            <li><i class="fa-solid fa-circle"></i> 4 pintu keluar darurat: 2 ujung koridor (kiri-kanan)
                                + 2 tangga darurat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="footer-brand">
                    <img src="{{ asset('assets/logo-avian.png') }}" alt="Avian Brands">
                    <div><strong>PT Avia Avian Tbk</strong><span>Sidoarjo, Jawa Timur — sejak 1978</span></div>
                </div>
                <div class="footer-links">
                    <a href="#profil">Profil Perusahaan</a>
                    <a href="#struktur-organisasi">Struktur Organisasi</a>
                    <a href="#tim-k3">Tim K3</a>
                    <a href="#denah">Denah</a>
                </div>
            </div>
            <div class="footer-bottom">
                <span>© 2026 PT Avia Avian Tbk. Dokumen internal.</span>
                <span>Disusun untuk keperluan profil &amp; struktur perusahaan</span>
            </div>
        </div>
    </footer>

    <script>
        // mobile nav toggle
        const navToggle = document.getElementById('navToggle');
        const mainNav = document.getElementById('mainNav');

        navToggle.addEventListener('click', () => {
            mainNav.classList.toggle('open');
        });

        document.querySelectorAll('#navLinks a').forEach(link => {
            link.addEventListener('click', () => {
                mainNav.classList.remove('open');
            });
        });

        // scroll spy
        const sections = document.querySelectorAll('section[id]');
        const navAnchors = document.querySelectorAll('.nav__links a');

        const spyObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navAnchors.forEach(anchor => {
                        anchor.classList.toggle(
                            'active',
                            anchor.getAttribute('href') === '#' + entry.target.id
                        );
                    });
                }
            });
        }, {
            rootMargin: '-40% 0px -55% 0px'
        });

        sections.forEach(section => {
            spyObserver.observe(section);
        });

        // reveal animation
        const animObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                }
            });
        }, {
            threshold: 0.15
        });

        document.querySelectorAll('[data-animate]').forEach(el => {
            animObserver.observe(el);
        });

        // tabs denah
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabPanels = document.querySelectorAll('.tab-panel');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {

                tabBtns.forEach(b => {
                    b.classList.remove('active');
                });

                tabPanels.forEach(panel => {
                    panel.classList.remove('active');
                });

                btn.classList.add('active');

                document
                    .getElementById('panel-' + btn.dataset.tab)
                    .classList.add('active');
            });
        });
    </script>
</body>

</html>