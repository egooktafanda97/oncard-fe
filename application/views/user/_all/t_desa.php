<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Hijau Makmur - Website Resmi Desa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset dan Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #2e7d32;
            --primary-light: #4caf50;
            --primary-dark: #1b5e20;
            --secondary: #8bc34a;
            --accent: #ffc107;
            --light: #f1f8e9;
            --dark: #1b1b1b;
            --gray: #757575;
            --white: #ffffff;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        section {
            padding: 60px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--primary-dark);
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--primary);
            margin: 10px auto;
            border-radius: 2px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Header Styles */
        header {
            background: var(--primary);
            color: var(--white);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            height: 50px;
        }

        .logo-text h1 {
            font-size: 1.5rem;
            line-height: 1.2;
        }

        .logo-text span {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 5px 10px;
            border-radius: 4px;
        }

        nav ul li a:hover {
            background: rgba(255,255,255,0.1);
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(46, 125, 50, 0.8), rgba(46, 125, 50, 0.9)), url('https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1474&q=80');
            background-size: cover;
            background-position: center;
            color: var(--white);
            text-align: center;
            padding: 100px 0;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        /* Infografis Section */
        .infografis-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .infografis-card {
            background: var(--white);
            border-radius: 8px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            border-top: 4px solid var(--primary);
        }

        .infografis-card:hover {
            transform: translateY(-10px);
        }

        .infografis-card i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .infografis-card h3 {
            color: var(--primary-dark);
            margin-bottom: 10px;
        }

        .infografis-card .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        /* Blog Section */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .blog-card {
            background: var(--white);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .blog-img {
            height: 200px;
            background: var(--primary-light);
            background-size: cover;
            background-position: center;
        }

        .blog-content {
            padding: 20px;
        }

        .blog-content h3 {
            color: var(--primary-dark);
            margin-bottom: 10px;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 15px;
        }

        /* Agenda Section */
        .agenda-container {
            background: var(--white);
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .agenda-item {
            display: flex;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .agenda-item:last-child {
            border-bottom: none;
        }

        .agenda-date {
            background: var(--primary);
            color: var(--white);
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            min-width: 80px;
            margin-right: 20px;
        }

        .agenda-date .day {
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1;
        }

        .agenda-date .month {
            font-size: 0.9rem;
        }

        .agenda-content h3 {
            color: var(--primary-dark);
            margin-bottom: 5px;
        }

        /* Keuangan Section */
        .keuangan-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .keuangan-card {
            background: var(--white);
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
        }

        .keuangan-card h3 {
            color: var(--primary-dark);
            margin-bottom: 20px;
        }

        .chart {
            height: 200px;
            background: var(--light);
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            padding: 10px;
        }

        .bar {
            width: 30px;
            background: var(--primary);
            border-radius: 4px 4px 0 0;
            position: relative;
        }

        .bar-label {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
        }

        .keuangan-total {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin: 10px 0;
        }

        /* Perangkat Desa Section */
        .perangkat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .perangkat-card {
            background: var(--white);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
        }

        .perangkat-img {
            height: 200px;
            background: var(--primary-light);
            background-size: cover;
            background-position: center;
        }

        .perangkat-content {
            padding: 20px;
        }

        .perangkat-content h3 {
            color: var(--primary-dark);
            margin-bottom: 5px;
        }

        .perangkat-content .jabatan {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Kontak Section */
        .kontak-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .kontak-info {
            background: var(--white);
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .kontak-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .kontak-item i {
            font-size: 1.5rem;
            color: var(--primary);
            margin-right: 15px;
            margin-top: 5px;
        }

        .map-container {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 400px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Footer */
        footer {
            background: var(--primary-dark);
            color: var(--white);
            padding: 50px 0 20px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-col h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
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
            background: var(--secondary);
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: var(--white);
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
            background: var(--primary-light);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
        }

        /* Responsive Styles */
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
                background: var(--primary-dark);
                flex-direction: column;
                padding: 20px 0;
                text-align: center;
            }

            nav ul.active {
                display: flex;
            }

            nav ul li {
                margin: 10px 0;
            }

            .hero h2 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-tree fa-2x"></i>
                </div>
                <div class="logo-text">
                    <h1>Desa Hijau Makmur</h1>
                    <span>Kecamatan Sejahtera, Kabupaten Harmoni</span>
                </div>
            </div>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
            <nav>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
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
            <h2>Selamat Datang di Desa Hijau Makmur</h2>
            <p>Desa yang hijau, asri, dan makmur dengan masyarakat yang sejahtera dan berbudaya.</p>
            <a href="#infografis" class="btn">Jelajahi Desa Kami</a>
        </div>
    </section>

    <!-- Infografis Section -->
    <section id="infografis">
        <div class="container">
            <h2 class="section-title">Infografis Desa</h2>
            <div class="infografis-grid">
                <div class="infografis-card">
                    <i class="fas fa-users"></i>
                    <h3>Jumlah Penduduk</h3>
                    <div class="number">3.250</div>
                    <p>Jiwa</p>
                </div>
                <div class="infografis-card">
                    <i class="fas fa-home"></i>
                    <h3>Jumlah KK</h3>
                    <div class="number">850</div>
                    <p>Kepala Keluarga</p>
                </div>
                <div class="infografis-card">
                    <i class="fas fa-male"></i>
                    <h3>Laki-laki</h3>
                    <div class="number">1.620</div>
                    <p>Jiwa</p>
                </div>
                <div class="infografis-card">
                    <i class="fas fa-female"></i>
                    <h3>Perempuan</h3>
                    <div class="number">1.630</div>
                    <p>Jiwa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Desa Section -->
    <section id="blog">
        <div class="container">
            <h2 class="section-title">Blog Desa</h2>
            <div class="blog-grid">
                <div class="blog-card">
                    <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1474&q=80');"></div>
                    <div class="blog-content">
                        <h3>Festival Budaya Desa Hijau Makmur 2023</h3>
                        <div class="blog-meta">
                            <span><i class="far fa-calendar"></i> 15 Oktober 2023</span>
                            <span><i class="far fa-user"></i> Admin Desa</span>
                        </div>
                        <p>Desa Hijau Makmur sukses menggelar Festival Budaya tahunan dengan berbagai pertunjukan tradisional dan kuliner khas desa.</p>
                        <a href="#" class="btn" style="margin-top: 15px;">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=1474&q=80');"></div>
                    <div class="blog-content">
                        <h3>Panen Raya Padi Organik Desa</h3>
                        <div class="blog-meta">
                            <span><i class="far fa-calendar"></i> 5 September 2023</span>
                            <span><i class="far fa-user"></i> Tim Pertanian</span>
                        </div>
                        <p>Petani Desa Hijau Makmur menikmati hasil panen padi organik yang melimpah dengan sistem pertanian berkelanjutan.</p>
                        <a href="#" class="btn" style="margin-top: 15px;">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1474&q=80');"></div>
                    <div class="blog-content">
                        <h3>Pembangunan Jalan Desa Tahap II Selesai</h3>
                        <div class="blog-meta">
                            <span><i class="far fa-calendar"></i> 20 Agustus 2023</span>
                            <span><i class="far fa-user"></i> Tim Infrastruktur</span>
                        </div>
                        <p>Pembangunan jalan desa tahap II sepanjang 2 km telah selesai dan dapat digunakan masyarakat untuk akses transportasi.</p>
                        <a href="#" class="btn" style="margin-top: 15px;">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Agenda Desa Section -->
    <section id="agenda">
        <div class="container">
            <h2 class="section-title">Agenda Desa</h2>
            <div class="agenda-container">
                <div class="agenda-item">
                    <div class="agenda-date">
                        <div class="day">25</div>
                        <div class="month">Okt</div>
                        <div class="year">2023</div>
                    </div>
                    <div class="agenda-content">
                        <h3>Musyawarah Desa Tahunan</h3>
                        <p><i class="far fa-clock"></i> 08.00 - 12.00 WIB</p>
                        <p><i class="fas fa-map-marker-alt"></i> Balai Desa Hijau Makmur</p>
                        <p>Musyawarah desa untuk membahas program kerja tahun depan dan evaluasi kinerja tahun ini.</p>
                    </div>
                </div>
                <div class="agenda-item">
                    <div class="agenda-date">
                        <div class="day">10</div>
                        <div class="month">Nov</div>
                        <div class="year">2023</div>
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
                        <div class="year">2023</div>
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
            <h2 class="section-title">Keuangan Desa</h2>
            <div class="keuangan-container">
                <div class="keuangan-card">
                    <h3>Anggaran Pendapatan dan Belanja Desa (APBDes) 2023</h3>
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
                    <p>Total Anggaran</p>
                    <div class="keuangan-total">Rp 1.250.000.000</div>
                    <a href="#" class="btn">Detail Laporan</a>
                </div>
                <div class="keuangan-card">
                    <h3>Realisasi Anggaran Triwulan III 2023</h3>
                    <div class="chart">
                        <div class="bar" style="height: 85%; background: var(--primary-light);">
                            <span class="bar-label">Pendapatan</span>
                        </div>
                        <div class="bar" style="height: 75%; background: var(--primary-light);">
                            <span class="bar-label">Belanja</span>
                        </div>
                    </div>
                    <p>Realisasi Triwulan III</p>
                    <div class="keuangan-total">Rp 320.500.000</div>
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
                <div class="perangkat-card">
                    <div class="perangkat-img" style="background-image: url('https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                    <div class="perangkat-content">
                        <h3>Dewi Lestari</h3>
                        <div class="jabatan">Kasi Kesejahteraan</div>
                        <p>Bertugas dalam bidang kesejahteraan masyarakat, kesehatan, dan program sosial desa.</p>
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