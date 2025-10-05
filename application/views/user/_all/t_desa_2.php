<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Harmoni Sejahtera - Website Resmi Desa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset dan Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #27ae60;
            --primary-light: #2ecc71;
            --primary-dark: #219653;
            --secondary: #16a085;
            --accent: #f39c12;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --gray: #7f8c8d;
            --white: #ffffff;
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: var(--dark);
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .section-title p {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--gradient);
            margin: 15px auto;
            border-radius: 2px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: var(--gradient);
            color: var(--white);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--white);
        }

        /* Header Styles */
        header {
            background: rgba(255, 255, 255, 0.95);
            color: var(--dark);
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        header.scrolled {
            padding: 10px 0;
            background: rgba(255, 255, 255, 0.98);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
        }

        .logo-text h1 {
            font-size: 1.8rem;
            line-height: 1.2;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .logo-text span {
            font-size: 0.9rem;
            color: var(--gray);
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 25px;
        }

        nav ul li a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 5px 10px;
            border-radius: 4px;
            position: relative;
        }

        nav ul li a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }

        nav ul li a:hover:after, 
        nav ul li a.active:after {
            width: 100%;
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.9)), url('https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1474&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--white);
            text-align: center;
            padding: 180px 0 120px;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero h2 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .hero-btns .btn {
            padding: 15px 35px;
        }

        .btn-white {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-white:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Infografis Section */
        .infografis-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .infografis-card {
            background: var(--white);
            border-radius: 15px;
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .infografis-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        .infografis-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .infografis-card i {
            font-size: 3.5rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }

        .infografis-card h3 {
            color: var(--dark);
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .infografis-card .number {
            font-size: 2.8rem;
            font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin: 15px 0;
        }

        /* Blog Section */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .blog-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .blog-img {
            height: 220px;
            background: var(--primary-light);
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .blog-img:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
        }

        .blog-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary);
            color: var(--white);
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            z-index: 2;
        }

        .blog-content {
            padding: 25px;
        }

        .blog-content h3 {
            color: var(--dark);
            margin-bottom: 15px;
            font-size: 1.3rem;
            line-height: 1.4;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .blog-content p {
            margin-bottom: 20px;
            color: var(--gray);
        }

        /* Agenda Section */
        .agenda-container {
            background: var(--white);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }

        .agenda-container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        .agenda-item {
            display: flex;
            padding: 25px 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .agenda-item:last-child {
            border-bottom: none;
        }

        .agenda-date {
            background: var(--gradient);
            color: var(--white);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            min-width: 90px;
            margin-right: 25px;
            flex-shrink: 0;
        }

        .agenda-date .day {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
        }

        .agenda-date .month {
            font-size: 1rem;
            font-weight: 500;
        }

        .agenda-content h3 {
            color: var(--dark);
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .agenda-content p {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            color: var(--gray);
        }

        .agenda-content i {
            margin-right: 10px;
            color: var(--primary);
        }

        /* Keuangan Section */
        .keuangan-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .keuangan-card {
            background: var(--white);
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .keuangan-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        .keuangan-card h3 {
            color: var(--dark);
            margin-bottom: 25px;
            font-size: 1.4rem;
        }

        .chart-container {
            height: 200px;
            margin-bottom: 25px;
            position: relative;
        }

        .chart {
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            height: 100%;
            padding: 0 20px;
        }

        .bar {
            width: 40px;
            background: var(--gradient);
            border-radius: 5px 5px 0 0;
            position: relative;
            transition: height 1s ease;
        }

        .bar-label {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .keuangan-total {
            font-size: 2.2rem;
            font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 15px 0;
        }

        /* Perangkat Desa Section */
        .perangkat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .perangkat-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .perangkat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .perangkat-img {
            height: 250px;
            background: var(--primary-light);
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .perangkat-img:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
        }

        .perangkat-content {
            padding: 25px;
        }

        .perangkat-content h3 {
            color: var(--dark);
            margin-bottom: 5px;
            font-size: 1.4rem;
        }

        .perangkat-content .jabatan {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .perangkat-social {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .perangkat-social a {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--light);
            color: var(--dark);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .perangkat-social a:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* Kontak Section */
        .kontak-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
        }

        .kontak-info {
            background: var(--white);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }

        .kontak-info:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        .kontak-info h3 {
            color: var(--dark);
            margin-bottom: 25px;
            font-size: 1.5rem;
        }

        .kontak-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .kontak-item i {
            font-size: 1.5rem;
            color: var(--primary);
            margin-right: 15px;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .kontak-item h4 {
            color: var(--dark);
            margin-bottom: 5px;
        }

        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            height: 100%;
            min-height: 400px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: var(--white);
            padding: 70px 0 20px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col h3 {
            font-size: 1.4rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: var(--primary);
        }

        .footer-col p {
            color: rgba(255,255,255,0.7);
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col ul li a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .footer-col ul li a i {
            margin-right: 10px;
            width: 20px;
        }

        .footer-col ul li a:hover {
            color: var(--primary);
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: var(--white);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 1s ease forwards;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero h2 {
                font-size: 2.8rem;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }

            nav ul {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background: var(--white);
                flex-direction: column;
                padding: 20px 0;
                text-align: center;
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }

            nav ul.active {
                display: flex;
            }

            nav ul li {
                margin: 10px 0;
            }

            .hero {
                padding: 150px 0 100px;
            }

            .hero h2 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .hero-btns {
                flex-direction: column;
                align-items: center;
            }

            .agenda-item {
                flex-direction: column;
                text-align: center;
            }

            .agenda-date {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .kontak-container, .keuangan-container {
                grid-template-columns: 1fr;
            }
            
            .blog-grid, .perangkat-grid, .infografis-grid {
                grid-template-columns: 1fr;
            }
            
            .agenda-container {
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="logo-text">
                    <h1>Desa Harmoni Sejahtera</h1>
                    <span>Kecamatan Makmur, Kabupaten Hijau</span>
                </div>
            </div>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
            <nav>
                <ul>
                    <li><a href="#beranda" class="active">Beranda</a></li>
                    <li><a href="#infografis">Infografis</a></li>
                    <li><a href="#blog">Blog Desa</a></li>
                    <li><a href="#agenda">Agenda</a></li>
                    <li><a href="#keuangan">Keuangan</a></li>
                    <li><a href="#perangkat">Perangkat Desa</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="container">
            <div class="hero-content fade-in">
                <h2>Desa Harmoni Sejahtera</h2>
                <p>Desa yang harmonis, hijau, dan sejahtera dengan masyarakat yang mandiri dan berbudaya.</p>
                <div class="hero-btns">
                    <a href="#infografis" class="btn">Jelajahi Desa</a>
                    <a href="#kontak" class="btn btn-white">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Infografis Section -->
    <section id="infografis">
        <div class="container">
            <div class="section-title">
                <h2>Infografis Desa</h2>
                <p>Data terkini mengenai kondisi dan perkembangan Desa Harmoni Sejahtera</p>
            </div>
            <div class="infografis-grid">
                <div class="infografis-card fade-in">
                    <i class="fas fa-users"></i>
                    <h3>Jumlah Penduduk</h3>
                    <div class="number">4.125</div>
                    <p>Jiwa</p>
                </div>
                <div class="infografis-card fade-in">
                    <i class="fas fa-home"></i>
                    <h3>Jumlah KK</h3>
                    <div class="number">1.050</div>
                    <p>Kepala Keluarga</p>
                </div>
                <div class="infografis-card fade-in">
                    <i class="fas fa-male"></i>
                    <h3>Laki-laki</h3>
                    <div class="number">2.080</div>
                    <p>Jiwa</p>
                </div>
                <div class="infografis-card fade-in">
                    <i class="fas fa-female"></i>
                    <h3>Perempuan</h3>
                    <div class="number">2.045</div>
                    <p>Jiwa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Desa Section -->
    <section id="blog">
        <div class="container">
            <div class="section-title">
                <h2>Blog Desa</h2>
                <p>Informasi dan berita terbaru dari Desa Harmoni Sejahtera</p>
            </div>
            <div class="blog-grid">
                <div class="blog-card fade-in">
                    <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1474&q=80');">
                        <div class="blog-date">15 Okt 2023</div>
                    </div>
                    <div class="blog-content">
                        <h3>Festival Budaya Desa Harmoni Sejahtera 2023</h3>
                        <div class="blog-meta">
                            <span><i class="far fa-user"></i> Admin Desa</span>
                            <span><i class="far fa-eye"></i> 245</span>
                        </div>
                        <p>Desa Harmoni Sejahtera sukses menggelar Festival Budaya tahunan dengan berbagai pertunjukan tradisional dan kuliner khas desa.</p>
                        <a href="#" class="btn">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="blog-card fade-in">
                    <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=1474&q=80');">
                        <div class="blog-date">5 Sep 2023</div>
                    </div>
                    <div class="blog-content">
                        <h3>Panen Raya Padi Organik Desa</h3>
                        <div class="blog-meta">
                            <span><i class="far fa-user"></i> Tim Pertanian</span>
                            <span><i class="far fa-eye"></i> 189</span>
                        </div>
                        <p>Petani Desa Harmoni Sejahtera menikmati hasil panen padi organik yang melimpah dengan sistem pertanian berkelanjutan.</p>
                        <a href="#" class="btn">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="blog-card fade-in">
                    <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1474&q=80');">
                        <div class="blog-date">20 Agu 2023</div>
                    </div>
                    <div class="blog-content">
                        <h3>Pembangunan Jalan Desa Tahap II Selesai</h3>
                        <div class="blog-meta">
                            <span><i class="far fa-user"></i> Tim Infrastruktur</span>
                            <span><i class="far fa-eye"></i> 156</span>
                        </div>
                        <p>Pembangunan jalan desa tahap II sepanjang 2 km telah selesai dan dapat digunakan masyarakat untuk akses transportasi.</p>
                        <a href="#" class="btn">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Agenda Desa Section -->
    <section id="agenda">
        <div class="container">
            <div class="section-title">
                <h2>Agenda Desa</h2>
                <p>Jadwal kegiatan dan event terdekat di Desa Harmoni Sejahtera</p>
            </div>
            <div class="agenda-container fade-in">
                <div class="agenda-item">
                    <div class="agenda-date">
                        <div class="day">25</div>
                        <div class="month">Okt</div>
                    </div>
                    <div class="agenda-content">
                        <h3>Musyawarah Desa Tahunan</h3>
                        <p><i class="far fa-clock"></i> 08.00 - 12.00 WIB</p>
                        <p><i class="fas fa-map-marker-alt"></i> Balai Desa Harmoni Sejahtera</p>
                        <p>Musyawarah desa untuk membahas program kerja tahun depan dan evaluasi kinerja tahun ini.</p>
                    </div>
                </div>
                <div class="agenda-item">
                    <div class="agenda-date">
                        <div class="day">10</div>
                        <div class="month">Nov</div>
                    </div>
                    <div class="agenda-content">
                        <h3>Pelatihan Kewirausahaan Pemuda Desa</h3>
                        <p><i class="far fa-clock"></i> 09.00 - 15.00 WIB</p>
                        <p><i class="fas fa-map-marker-alt"></i> Aula Serba Guna Desa</p>
                        <p>Pelatihan kewirausahaan bagi pemuda desa untuk mengembangkan potensi ekonomi lokal.</p>
                    </div>
                </div>
                <div class="agenda-item">
                    <div class="agenda-date">
                        <div class="day">17</div>
                        <div class="month">Nov</div>
                    </div>
                    <div class="agenda-content">
                        <h3>Kerja Bakti Bersih Desa</h3>
                        <p><i class="far fa-clock"></i> 07.00 - 10.00 WIB</p>
                        <p><i class="fas fa-map-marker-alt"></i> Seluruh Area Desa</p>
                        <p>Kegiatan kerja bakti membersihkan lingkungan desa dari sampah dan menjaga kelestarian alam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Keuangan Desa Section -->
    <section id="keuangan">
        <div class="container">
            <div class="section-title">
                <h2>Keuangan Desa</h2>
                <p>Transparansi pengelolaan keuangan Desa Harmoni Sejahtera</p>
            </div>
            <div class="keuangan-container">
                <div class="keuangan-card fade-in">
                    <h3>Anggaran Pendapatan dan Belanja Desa (APBDes) 2023</h3>
                    <div class="chart-container">
                        <div class="chart">
                            <div class="bar" style="height: 80%;">
                                <span class="bar-label">Pendapatan</span>
                            </div>
                            <div class="bar" style="height: 70%;">
                                <span class="bar-label">Belanja</span>
                            </div>
                            <div class="bar" style="height: 10%;">
                                <span class="bar-label">Surplus</span>
                            </div>
                        </div>
                    </div>
                    <p>Total Anggaran</p>
                    <div class="keuangan-total">Rp 1.550.000.000</div>
                    <a href="#" class="btn">Detail Laporan</a>
                </div>
                <div class="keuangan-card fade-in">
                    <h3>Realisasi Anggaran Triwulan III 2023</h3>
                    <div class="chart-container">
                        <div class="chart">
                            <div class="bar" style="height: 85%; background: var(--primary-light);">
                                <span class="bar-label">Pendapatan</span>
                            </div>
                            <div class="bar" style="height: 75%; background: var(--primary-light);">
                                <span class="bar-label">Belanja</span>
                            </div>
                        </div>
                    </div>
                    <p>Realisasi Triwulan III</p>
                    <div class="keuangan-total">Rp 420.500.000</div>
                    <a href="#" class="btn">Lihat Detail</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Perangkat Desa Section -->
    <section id="perangkat">
        <div class="container">
            <h2 class="section-title">Perangkat Desa</h2>
            <div class="perangkat-grid">
                <div class="perangkat-card">
                    <div class="perangkat-img" style="background-image: url('https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                    <div class="perangkat-content">
                        <h3>Budi Santoso</h3>
                        <div class="jabatan">Kepala Desa</div>
                        <p>Memimpin desa sejak tahun 2019 dengan visi menjadikan Desa Hijau Makmur sebagai desa mandiri dan sejahtera.</p>
                    </div>
                </div>
                <div class="perangkat-card">
                    <div class="perangkat-img" style="background-image: url('https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                    <div class="perangkat-content">
                        <h3>Siti Rahayu</h3>
                        <div class="jabatan">Sekretaris Desa</div>
                        <p>Bertanggung jawab atas administrasi dan dokumentasi kegiatan desa serta koordinasi program kerja.</p>
                    </div>
                </div>
                <div class="perangkat-card">
                    <div class="perangkat-img" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                    <div class="perangkat-content">
                        <h3>Joko Prasetyo</h3>
                        <div class="jabatan">Kasi Pemerintahan</div>
                        <p>Mengurusi bidang pemerintahan, kependudukan, dan pencatatan sipil serta pelayanan masyarakat.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Kontak Desa Section -->
    <section id="kontak">
        <div class="container">
            <h2 class="section-title">Kontak Desa</h2>
            <div class="kontak-container">
                <div class="kontak-info">
                    <h3>Informasi Kontak</h3>
                    <div class="kontak-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Alamat Kantor Desa</h4>
                            <p>Jl. Desa Makmur No. 123, Desa Hijau Makmur<br>Kecamatan Sejahtera, Kabupaten Harmoni<br>Jawa Tengah 56123</p>
                        </div>
                    </div>
                    <div class="kontak-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Telepon</h4>
                            <p>(021) 1234-5678</p>
                        </div>
                    </div>
                    <div class="kontak-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>info@desahijaumakmur.id</p>
                        </div>
                    </div>
                    <div class="kontak-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Jam Operasional</h4>
                            <p>Senin - Jumat: 08.00 - 16.00 WIB<br>Sabtu: 08.00 - 12.00 WIB</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.789030133378!2d107.61015831431784!3d-6.917069769730087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e62ec119bb6d%3A0xee0e0e6c8f1e4d3a!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1628587212583!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <h3>Desa Hijau Makmur</h3>
                    <p>Desa yang hijau, asri, dan makmur dengan masyarakat yang sejahtera dan berbudaya.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Menu Cepat</h3>
                    <ul>
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#infografis">Infografis</a></li>
                        <li><a href="#blog">Blog Desa</a></li>
                        <li><a href="#agenda">Agenda</a></li>
                        <li><a href="#keuangan">Keuangan</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="#">Surat Pengantar</a></li>
                        <li><a href="#">Kartu Keluarga</a></li>
                        <li><a href="#">KTP Elektronik</a></li>
                        <li><a href="#">Izin Usaha</a></li>
                        <li><a href="#">Layanan Lainnya</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Kontak</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Desa Makmur No. 123</li>
                        <li><i class="fas fa-phone"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-envelope"></i> info@desahijaumakmur.id</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Desa Hijau Makmur. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            document.querySelector('nav ul').classList.toggle('active');
        });

        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu after clicking a link
                    document.querySelector('nav ul').classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>