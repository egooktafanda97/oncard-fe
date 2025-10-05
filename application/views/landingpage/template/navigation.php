<body>
    <header id="nav-menu" aria-label="navigation bar" style="z-index:99999;">
      <div class="container">
        <div class="nav-start" >
          <a class="logo" href="<?=base_url('Welcome');?>" style="font-family: 'Quicksand', sans-serif!important; font-weight:700; font-size:1.5em;">
            <img
              src="<?=base_url();?>assets_oncard/logo/logo_dongker.png"
              width="auto"
              height="35"
              alt="Inc Logo"
            />
            <!-- oncard.id -->
          </a>
          <nav class="menu">
            <ul class="menu-bar">
              <li>
                <button
                  class="nav-link dropdown-btn"
                  data-dropdown="dropdown1"
                  aria-haspopup="true"
                  aria-expanded="false"
                  aria-label="browse"
                >
                  Layanan
                  <i class="bx bx-chevron-down" aria-hidden="true"></i>
                </button>
                <div id="dropdown1" class="dropdown">
                  <ul role="menu">
                    <li role="menuitem">
                      <a class="dropdown-link" href="<?=base_url();?>Welcome/produk_kartudigitalsantri">
                        <img src="<?=base_url();?>assets_oncard/images/menu1.webp" class="icon" style="width:60px;height:60px;" />
                        <div>
                          <span class="dropdown-link-title"
                            >Cashless System</span
                          >
                          <p>Fitur terpopuler</p>
                        </div>
                      </a>
                    </li>
                    <li role="menuitem">
                      <a class="dropdown-link" href="<?=base_url();?>Welcome/produk_pembayaranspp">
                      <img src="<?=base_url();?>assets_oncard/images/menu2.webp" class="icon" style="width:60px;height:60px;" />
                        <div>
                          <span class="dropdown-link-title"
                            >Pembayaran Pendidikan</span
                          >
                          <p>Sistem Biaya Pendidikan</p>
                        </div>
                      </a>
                    </li>
                    <li role="menuitem">
                      <a class="dropdown-link" href="<?=base_url();?>Welcome/produk_psb">
                      <img src="<?=base_url();?>assets_oncard/images/menu3.webp" class="icon" style="width:60px;height:60px;" />
                        <div>
                          <span class="dropdown-link-title">Sistem PSB</span>
                          <p>Sistem penerimaan siswa baru</p>
                        </div>
                      </a>
                    </li>
                    <li role="menuitem">
                      <a class="dropdown-link" href="<?=base_url();?>Welcome/produk_poskantin">
                      <img src="<?=base_url();?>assets_oncard/images/menu4.webp" class="icon" style="width:60px;height:60px;" />
                        <div>
                          <span class="dropdown-link-title">Sistem POS Merchant</span>
                          <p>Merchant memiliki kasir cerdas yang modern</p>
                        </div>
                      </a>
                    </li>
                  </ul>

                  
                </div>
              </li>
              <li>
                <button
                  class="nav-link dropdown-btn"
                  data-dropdown="dropdown2"
                  aria-haspopup="true"
                  aria-expanded="false"
                  aria-label="discover"
                >
                  Mitra
                  <i class="bx bx-chevron-down" aria-hidden="true"></i>
                </button>
                <div id="dropdown2" class="dropdown">
                  <ul role="menu">
                    <li>
                      <span class="dropdown-link-title">Perbankan</span>
                    </li>
                    <li role="menuitem">
                      <a class="dropdown-link" href="<?=base_url();?>Welcome/partner_brks">Bank Riau Kepri Syariah</a>
                    </li>
                    <!-- <li role="menuitem">
                      <a class="dropdown-link" href="#illustrations"
                        >Payment Gateway</a
                      >
                    </li> -->
                  </ul>
                  <ul role="menu">
                    <li>
                      <span class="dropdown-link-title">Support Sistem</span>
                    </li>
                    <li role="menuitem">
                      <a class="dropdown-link" href="<?=base_url();?>Welcome/partner_wa"
                        >Whatsapp Official Broadcast</a
                      >
                    </li>
                    <li role="menuitem">
                      <a class="dropdown-link" href="<?=base_url();?>Welcome/partner_pg"
                        >Payment Gateway</a
                      >
                    </li>
                  </ul>
                </div>
              </li>
              <li><a class="nav-link" href="<?=base_url();?>Welcome/promo">Promo</a></li>
              <li><a class="nav-link" href="<?=base_url('Welcome/kontak');?>">Kontak</a></li>
              <li><a class="nav-link" href="<?=base_url('Welcome/about');?>">Tentang</a></li>
            </ul>
          </nav>
        </div>
        <div class="nav-end">
          <div class="right-container me-3">
            <!-- <form class="search" role="search">
              <input type="search" name="search" placeholder="Search" />
              <i class="bx bx-search" aria-hidden="true"></i>
            </form> -->

            <!-- <a href="#profile">
              <img
                src="<?=base_url();?>assets_oncard/assets_landingmenu/images/user.jpg"
                width="30"
                height="30"
                alt="user image"
              />
            </a> -->
            
          </div>
          <button class="btn btn-success bg-dongker" onclick="window.location.href='<?=base_url();?>Login'">Login</button>

          <button
            id="hamburger"
            aria-label="hamburger"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="bx bx-menu" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </header>

    