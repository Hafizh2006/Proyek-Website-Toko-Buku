<?php 

require_once "../includes/header.php";


?>
<title>Toko Buku</title>
</head>
<body>

<header class="site-header">
    <div class="kategori-button"> <button class="tombol-kategori" aria-expanded="false" aria-controls="panel-kategori">
            <span class="ikon-kategori" aria-hidden="true">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6L8 10L12 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span class="label-kategori">Kategori</span>
        </button>
    </div>

    <div class="search-container">
        <input type="text" class="search-input" placeholder="Cari">
        <button class="search-icon-btn" aria-label="Tombol Cari">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 16 16">
                <path fill="#6B7280" d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>

    <nav class="auth-nav">
        <button type="button" class="btn btn-signin">Sign In</button>
        <button type="button" class="btn btn-signup">Sign Up</button>
    </nav>
</header>

<div class="slide-containerbox">

    
    <div class="slider-container">
        <div class="slider-wrapper">
            <div class="slide"><img src="" alt="Gambar 1"></div>
            <div class="slide"><img src="" alt="Gambar 2"></div>
            <div class="slide"><img src="" alt="Gambar 3"></div>
        </div>
        <button class="prev-btn">&lt;</button>
        <button class="next-btn">&gt;</button>
        <div class="slider-dots"></div>
    </div>
</div>
    
<?php 

require_once "../includes/footer.php";
?>