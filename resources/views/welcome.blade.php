<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="BookHub - Toko Buku Online Modern dengan Koleksi Terlengkap">

        <title>BookHub - Toko Buku Online</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Styles -->
        <style>
            :root {
                --primary: #4f46e5;
                --primary-dark: #4338ca;
                --secondary: #10b981;
                --dark: #1e293b;
                --light: #f8fafc;
                --gray: #94a3b8;
                --danger: #ef4444;
            }
            
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            
            body {
                font-family: 'Poppins', sans-serif;
                color: var(--dark);
                background-color: #f1f5f9;
                line-height: 1.6;
            }
            
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }
            
            /* Header Styles */
            header {
                background-color: white;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                position: sticky;
                top: 0;
                z-index: 100;
            }
            
            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 0;
            }
            
            .logo {
                font-size: 24px;
                font-weight: 700;
                color: var(--primary);
                text-decoration: none;
                display: flex;
                align-items: center;
            }
            
            .logo i {
                margin-right: 10px;
                color: var(--secondary);
            }
            
            .nav-links {
                display: flex;
                gap: 25px;
            }
            
            .nav-links a {
                text-decoration: none;
                color: var(--dark);
                font-weight: 500;
                transition: color 0.3s;
            }
            
            .nav-links a:hover {
                color: var(--primary);
            }
            
            .nav-actions {
                display: flex;
                gap: 15px;
                align-items: center;
            }
            
            .btn {
                padding: 8px 16px;
                border-radius: 6px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s;
                text-decoration: none;
                display: inline-block;
            }
            
            .btn-primary {
                background-color: var(--primary);
                color: white;
                border: 2px solid var(--primary);
            }
            
            .btn-primary:hover {
                background-color: var(--primary-dark);
                border-color: var(--primary-dark);
            }
            
            .btn-outline {
                background-color: transparent;
                color: var(--primary);
                border: 2px solid var(--primary);
            }
            
            .btn-outline:hover {
                background-color: var(--primary);
                color: white;
            }
            
            .cart-icon {
                position: relative;
                font-size: 20px;
                color: var(--dark);
            }
            
            .cart-count {
                position: absolute;
                top: -8px;
                right: -8px;
                background-color: var(--danger);
                color: white;
                border-radius: 50%;
                width: 18px;
                height: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 10px;
                font-weight: bold;
            }
            
            /* Hero Section */
            .hero {
                background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
                padding: 80px 0;
                border-radius: 0 0 20px 20px;
                margin-bottom: 40px;
            }
            
            .hero-content {
                display: flex;
                align-items: center;
                gap: 40px;
            }
            
            .hero-text {
                flex: 1;
            }
            
            .hero-title {
                font-size: 48px;
                font-weight: 700;
                margin-bottom: 20px;
                line-height: 1.2;
                color: var(--dark);
            }
            
            .hero-subtitle {
                font-size: 18px;
                color: var(--gray);
                margin-bottom: 30px;
            }
            
            .hero-image {
                flex: 1;
                display: flex;
                justify-content: center;
            }
            
            .hero-image img {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
            
            /* Featured Categories */
            .section-title {
                font-size: 28px;
                font-weight: 600;
                margin-bottom: 30px;
                position: relative;
                padding-bottom: 10px;
            }
            
            .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 60px;
                height: 4px;
                background-color: var(--primary);
                border-radius: 2px;
            }
            
            .categories {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
                margin-bottom: 50px;
            }
            
            .category-card {
                background-color: white;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                transition: transform 0.3s, box-shadow 0.3s;
            }
            
            .category-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }
            
            .category-image {
                height: 120px;
                background-color: #e0e7ff;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--primary);
                font-size: 40px;
            }
            
            .category-info {
                padding: 15px;
            }
            
            .category-name {
                font-weight: 600;
                margin-bottom: 5px;
            }
            
            .category-count {
                font-size: 14px;
                color: var(--gray);
            }
            
            /* Featured Books */
            .books {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 25px;
                margin-bottom: 50px;
            }
            
            .book-card {
                background-color: white;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                transition: transform 0.3s, box-shadow 0.3s;
            }
            
            .book-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }
            
            .book-cover {
                height: 300px;
                background-color: #f1f5f9;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }
            
            .book-cover img {
                max-width: 80%;
                max-height: 80%;
                object-fit: contain;
                transition: transform 0.3s;
            }
            
            .book-card:hover .book-cover img {
                transform: scale(1.05);
            }
            
            .book-badge {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: var(--secondary);
                color: white;
                padding: 5px 10px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 500;
            }
            
            .book-info {
                padding: 15px;
            }
            
            .book-title {
                font-weight: 600;
                margin-bottom: 5px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            
            .book-author {
                font-size: 14px;
                color: var(--gray);
                margin-bottom: 10px;
            }
            
            .book-price {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-top: 15px;
            }
            
            .price {
                font-weight: 700;
                color: var(--primary);
            }
            
            .price-original {
                text-decoration: line-through;
                color: var(--gray);
                font-size: 14px;
                margin-right: 5px;
            }
            
            .add-to-cart {
                background-color: var(--primary);
                color: white;
                border: none;
                width: 35px;
                height: 35px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            
            .add-to-cart:hover {
                background-color: var(--primary-dark);
            }
            
            /* Testimonials */
            .testimonials {
                background-color: white;
                padding: 60px 0;
                margin-bottom: 50px;
                border-radius: 20px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }
            
            .testimonial-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 30px;
            }
            
            .testimonial-card {
                background-color: #f8fafc;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }
            
            .testimonial-text {
                font-style: italic;
                margin-bottom: 20px;
                position: relative;
            }
            
            .testimonial-text::before,
            .testimonial-text::after {
                content: '"';
                font-size: 24px;
                color: var(--primary);
                opacity: 0.3;
            }
            
            .testimonial-author {
                display: flex;
                align-items: center;
                gap: 15px;
            }
            
            .author-avatar {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background-color: #e0e7ff;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--primary);
                font-weight: 600;
            }
            
            .author-info h4 {
                font-weight: 600;
                margin-bottom: 5px;
            }
            
            .author-info p {
                font-size: 14px;
                color: var(--gray);
            }
            
            /* Newsletter */
            .newsletter {
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                padding: 50px 0;
                border-radius: 20px;
                color: white;
                text-align: center;
                margin-bottom: 50px;
            }
            
            .newsletter h2 {
                font-size: 28px;
                margin-bottom: 15px;
            }
            
            .newsletter p {
                margin-bottom: 30px;
                opacity: 0.9;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }
            
            .newsletter-form {
                display: flex;
                max-width: 500px;
                margin: 0 auto;
            }
            
            .newsletter-input {
                flex: 1;
                padding: 12px 15px;
                border: none;
                border-radius: 6px 0 0 6px;
                font-size: 16px;
            }
            
            .newsletter-btn {
                background-color: var(--secondary);
                color: white;
                border: none;
                padding: 0 25px;
                border-radius: 0 6px 6px 0;
                font-weight: 500;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            
            .newsletter-btn:hover {
                background-color: #0ca678;
            }
            
            /* Footer */
            footer {
                background-color: var(--dark);
                color: white;
                padding: 60px 0 30px;
            }
            
            .footer-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 40px;
                margin-bottom: 40px;
            }
            
            .footer-logo {
                font-size: 24px;
                font-weight: 700;
                color: white;
                margin-bottom: 20px;
                display: inline-block;
            }
            
            .footer-about p {
                opacity: 0.7;
                margin-bottom: 20px;
            }
            
            .social-links {
                display: flex;
                gap: 15px;
            }
            
            .social-link {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.1);
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background-color 0.3s;
            }
            
            .social-link:hover {
                background-color: var(--primary);
            }
            
            .footer-title {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 20px;
                position: relative;
                padding-bottom: 10px;
            }
            
            .footer-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 40px;
                height: 3px;
                background-color: var(--primary);
            }
            
            .footer-links {
                list-style: none;
            }
            
            .footer-links li {
                margin-bottom: 10px;
            }
            
            .footer-links a {
                color: rgba(255, 255, 255, 0.7);
                text-decoration: none;
                transition: color 0.3s;
            }
            
            .footer-links a:hover {
                color: white;
            }
            
            .footer-contact p {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 15px;
                opacity: 0.7;
            }
            
            .footer-bottom {
                text-align: center;
                padding-top: 30px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                opacity: 0.7;
                font-size: 14px;
            }
            
            /* Responsive */
            @media (max-width: 768px) {
                .hero-content {
                    flex-direction: column;
                    text-align: center;
                }
                
                .hero-title {
                    font-size: 36px;
                }
                
                .nav-links {
                    display: none;
                }
                
                .newsletter-form {
                    flex-direction: column;
                    gap: 10px;
                }
                
                .newsletter-input,
                .newsletter-btn {
                    width: 100%;
                    border-radius: 6px;
                }
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <header>
            <div class="container">
                <nav class="navbar">
                    <a href="#" class="logo">
                        <i class="fas fa-book-open"></i> BookHub
                    </a>
                    
                    <div class="nav-links">
                    <a href="#beranda">Beranda</a>
                    <a href="#kategori">Kategori</a>
                    <a href="#buku-terbaru">Buku Terbaru</a>
                    <a href="#penawaran">Faq</a>
                    <a href="#tentang-kami">Tentang Kami</a>
                    </div>

                    <div class="nav-actions">
                        <a href="{{ url('/home') }}" class="btn btn-outline">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    </div>
                </nav>
            </div>
        </header>
        
        <!-- Hero Section -->
        <section class="hero" id="beranda">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1 class="hero-title">Temukan Buku Impian Anda di BookHub</h1>
                        <p class="hero-subtitle">Lebih dari 10.000 judul buku tersedia untuk memenuhi kebutuhan literasi Anda. Dapatkan diskon hingga 40% untuk pembelian pertama!</p>
                        <div class="hero-actions">
                            <a href="#" class="btn btn-primary">Jelajahi Sekarang</a>
                            <a href="#" class="btn btn-outline">Lihat Promo</a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Book Collection">
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Main Content -->
        <main class="container">
            <!-- Featured Categories -->
            <section id="kategori">
                <h2 class="section-title">Kategori Populer</h2>
                <div class="categories">
                    <div class="category-card">
                        <div class="category-image">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="category-info">
                            <h3 class="category-name">Teknologi</h3>
                            <p class="category-count">1,245 Buku</p>
                        </div>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-image">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="category-info">
                            <h3 class="category-name">Bisnis</h3>
                            <p class="category-count">892 Buku</p>
                        </div>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-image">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="category-info">
                            <h3 class="category-name">Psikologi</h3>
                            <p class="category-count">756 Buku</p>
                        </div>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-image">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div class="category-info">
                            <h3 class="category-name">Kuliner</h3>
                            <p class="category-count">543 Buku</p>
                        </div>
                    </div>
                    
                    <div class="category-card">
                        <div class="category-image">
                            <i class="fas fa-child"></i>
                        </div>
                        <div class="category-info">
                            <h3 class="category-name">Anak-anak</h3>
                            <p class="category-count">1,087 Buku</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Featured Books -->
            <section id="buku-terbaru">
                <h2 class="section-title">Buku Terbaru</h2>
                <div class="books">
                    <div class="book-card">
                        <div class="book-cover">
                            <img src="https://m.media-amazon.com/images/I/41xShlnTZTL._SX376_BO1,204,203,200_.jpg" alt="Book Cover">
                            <span class="book-badge">Baru</span>
                        </div>
                        <div class="book-info">
                            <h3 class="book-title">Clean Code: Handbook of Agile Software Craftsmanship</h3>
                            <p class="book-author">Robert C. Martin</p>
                            <div class="book-price">
                                <div>
                                    <span class="price-original">Rp 250.000</span>
                                    <span class="price">Rp 199.000</span>
                                </div>
                                <button class="add-to-cart">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="book-card">
                        <div class="book-cover">
                        <img src="https://cdn.gramedia.com/uploads/items/9786020633176_.Atomic_Habit.jpg" alt="Atomic Habits Book Cover">
                        </div>
                        <div class="book-info">
                            <h3 class="book-title">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</h3>
                            <p class="book-author">James Clear</p>
                            <div class="book-price">
                                <div>
                                    <span class="price-original">Rp 180.000</span>
                                    <span class="price">Rp 149.000</span>
                                </div>
                                <button class="add-to-cart">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="book-card">
                        <div class="book-cover">
                        <img src="https://cdn.gramedia.com/uploads/items/Psychology_Of_Money.jpg" alt="Psychology of Money Book Cover">
                        <span class="book-badge">Bestseller</span>
                        </div>
                        <div class="book-info">
                            <h3 class="book-title">The Psychology of Money: Timeless lessons on wealth, greed, and happiness</h3>
                            <p class="book-author">Morgan Housel</p>
                            <div class="book-price">
                                <div>
                                    <span class="price-original">Rp 220.000</span>
                                    <span class="price">Rp 175.000</span>
                                </div>
                                <button class="add-to-cart">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="book-card">
                        <div class="book-cover">
                            <img src="https://m.media-amazon.com/images/I/51mN3bY0JjL._SY425_.jpg" alt="Book Cover">
                        </div>
                        <div class="book-info">
                            <h3 class="book-title">Deep Work: Rules for Focused Success in a Distracted World</h3>
                            <p class="book-author">Cal Newport</p>
                            <div class="book-price">
                                <div>
                                    <span class="price">Rp 165.000</span>
                                </div>
                                <button class="add-to-cart">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Testimonials -->
            <section class="testimonials" id="penawaran">
                <div class="container">
                    <h2 class="section-title">Apa Kata Pelanggan Kami</h2>
                    <div class="testimonial-grid">
                        <div class="testimonial-card">
                            <p class="testimonial-text">BookHub membuat saya mudah menemukan buku yang saya cari. Pengiriman cepat dan buku sampai dalam kondisi sempurna. Sangat direkomendasikan!</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">AS</div>
                                <div class="author-info">
                                    <h4>Andi Setiawan</h4>
                                    <p>Pembaca Setia</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="testimonial-card">
                            <p class="testimonial-text">Saya suka koleksi buku anak-anak di BookHub. Anak saya sangat senang dengan buku yang saya beli. Harganya juga lebih murah dibanding toko lain.</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">DM</div>
                                <div class="author-info">
                                    <h4>Dewi Mulyani</h4>
                                    <p>Ibu Rumah Tangga</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="testimonial-card">
                            <p class="testimonial-text">Sebagai mahasiswa, saya sering membutuhkan buku referensi. BookHub selalu menyediakan buku yang saya butuhkan dengan harga terjangkau.</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">RS</div>
                                <div class="author-info">
                                    <h4>Rizky Saputra</h4>
                                    <p>Mahasiswa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Newsletter -->
            <section class="newsletter">
                <div class="container">
                    <h2>Berlangganan Newsletter Kami</h2>
                    <p>Dapatkan informasi tentang buku terbaru, promo menarik, dan artikel literasi langsung ke email Anda.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Alamat email Anda" class="newsletter-input" required>
                        <button type="submit" class="newsletter-btn">Berlangganan</button>
                    </form>
                </div>
            </section>
        </main>
        
        <!-- Footer -->
        <footer>
            <div class="container" id="tentang-kami">
                <div class="footer-grid">
                    <div class="footer-about">
                        <a href="#" class="footer-logo">
                            <i class="fas fa-book-open"></i> BookHub
                        </a>
                        <p>BookHub adalah toko buku online terkemuka di Indonesia dengan koleksi terlengkap dan harga terbaik.</p>
                        <div class="social-links">
                            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="footer-title">Tautan Cepat</h3>
                        <ul class="footer-links">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Katalog Buku</a></li>
                            <li><a href="#">Promo</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="footer-title">Kategori</h3>
                        <ul class="footer-links">
                            <li><a href="#">Fiksi</a></li>
                            <li><a href="#">Non-Fiksi</a></li>
                            <li><a href="#">Bisnis</a></li>
                            <li><a href="#">Teknologi</a></li>
                            <li><a href="#">Anak-anak</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-contact">
                        <h3 class="footer-title">Kontak Kami</h3>
                        <p><i class="fas fa-map-marker-alt"></i> Jl. Buku No. 123, Jakarta</p>
                        <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
                        <p><i class="fas fa-envelope"></i> info@bookhub.id</p>
                        <p><i class="fas fa-clock"></i> Buka Setiap Hari: 08.00 - 20.00</p>
                    </div>
                </div>
                
                <div class="footer-bottom">
                    <p>&copy; 2023 BookHub. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>