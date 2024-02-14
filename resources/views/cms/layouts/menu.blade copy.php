<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="position: sticky;">

    <!-- LOGO -->
    {{-- <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('user/img/logo.jpeg') }}" alt="" height="52">
            </span>

            <span class="logo-lg">
                <img src="{{ asset('user/img/logo.jpeg') }}" alt="" height="48">
            </span>

        </a>

        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('user/img/logo.jpeg') }}" alt="" height="52">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('user/img/logo.jpeg') }}" alt="" height="48">
            </span>

        </a>
        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
            <i class="uil-times"></i>
        </button>
    </div> --}}


    <div data-simplebar class="sidebar-menu-scroll" style="margin-top: 0; height: 100vh; display: unset;">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/" aria-expanded="true">
                        <i class="uil-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Apps</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-database"></i>
                        <span>Manage Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/manage-data/akun_bank">Akun Bank</a></li>
                        <li><a href="/manage-data/barang">Barang</a></li>
                        <li><a href="/manage-data/kategori">Kategori</a></li>
                        <li><a href="/manage-data/member-status">Member Status</a></li>
                        <li><a href="/manage-data/altera-pdam">PDAM Alterra</a></li>
                        <li><a href="/manage-data/produk">Produk</a></li>
                        <li><a href="/manage-data/kategori-provider">Provider Kategori</a>
                        </li>
                        <li><a href="/manage-data/provider">Provider</a></li>
                        <li><a href="/manage-data/sub-kategori">Sub Kategori</a></li>
                        <li><a href="/manage-data/setting-margin">Atur Margin</a></li>
                        <li><a href="/manage-data/setting">Setting</a></li>
                        <li><a href="/manage-data/setting-poin">Setting Poin</a></li>
                        <li><a href="/manage-data/sub-kategori-provider">Provider Sub
                                Kategori</a></li>
                        <li><a href="/manage-data/sub-kategori">Sub Kategori</a></li>
                        <li><a href="/manage-data/disable-transaksi">Disable Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-users-alt"></i>
                        <span>Manage Member</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/manage-member/member">Member</a></li>
                        <li><a href="/manage-member/kyc-member">KYC Member</a></li>
                        <li><a href="/manage-member/banned-member">Banned Member</a></li>
                        <li><a href="/manage-member/member-status">Member Status Aktif</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-info-circle"></i>
                        <span>Produk MS</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/produk-member-status">Produk</a></li>
                        <li><a href="/image-member-status">Gambar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/poin" aria-expanded="true">
                        <i class="uil-0-plus"></i>
                        <span>Poin</span>
                    </a>
                </li>
                <li>
                    <a href="/transaksi-realtime" aria-expanded="true">
                        <i class="uil-transaction"></i>
                        <span>Transaksi Realtime</span>
                    </a>
                </li>
                <li>
                    <a href="/flash-sale">
                        <i class="uil-tag-alt"></i>
                        <span>Flash Sale</span>
                    </a>
                </li>
                <li>
                    <a href="profile">
                        <i class="uil-user-circle"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="ganti-password">
                        <i class="uil-key-skeleton"></i>
                        <span>Ganti Password</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-share-alt"></i>
                        Multi Level
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
