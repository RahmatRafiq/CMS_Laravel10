<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li class="{{ $menu == 'Dashboard' ? 'mm-active' : '' }}">
            <a href="/" class="{{ $menu == 'Dashboard' ? 'active' : '' }}">
                <i class="uil-home-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ $menu == 'Akun Bank' ? 'mm-active' : '' }}">
            <a href="javascript: void(0);"
                class="has-arrow waves-effect
                {{ $menu == 'Akun Bank' ? 'mm-active' : '' }}
            ">
                <i class="uil-database"></i>
                <span>Manage Data</span>
            </a>
            <ul class="sub-menu mm-collapse mm-show">
                <li class="{{ $menu == 'Akun Bank' ? 'mm-active' : '' }}"><a
                        href="{{ route('master-data.akun-bank.index') }}">Akun Bank</a></li>
                <li><a href="{{ route('master-data.setting-margin.index') }}">Atur Margin</a></li>
                <li><a href="{{ route('master-data.barang.index') }}">Barang</a></li>
                <li><a href="{{ route('master-data.kategori.index') }}">Kategori</a></li>
                <li><a href="{{ route('master-data.kategori-provider.index') }}">Kategori Provider</a></li>
                <li><a href="{{ route('master-data.member-status.index') }}">Member Status</a></li>
                <li><a href="{{ route('master-data.pdam-alterra.index') }}">PDAM Alterra</a></li>
                <li><a href="{{ route('master-data.produk.index') }}">Produk</a></li>
                <li><a href="{{ route('master-data.provider.index') }}">Provider</a></li>
                <li><a href="{{ route('master-data.sub-kategori.index') }}">Sub Kategori</a></li>
                <li><a href="{{ route('master-data.setting.index') }}">Setting</a></li>
                <li><a href="{{ route('master-data.setting-point.index') }}">Setting Poin</a></li>
                <li><a href="{{ route('master-data.sub-kategori-provider.index') }}">Provider Sub Kategori</a></li>
                <li><a href="{{ route('master-data.disable-transaksi.index') }}">Disable Transaksi</a>
                </li>
            </ul>
        </li>

        {{-- <li class="{{ $menu == 'Dashboard' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="{{ $menu == 'Dashboard' ? 'active' : '' }}">
                <i class="uil-home-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ $menu == 'Courses' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.courses') }}" class="{{ $menu == 'Courses' ? 'active' : '' }}">
                <i class="uil-book-alt"></i>
                <span>Courses</span>
            </a>
        </li>

        <li class="{{ $menu == 'Members' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.members') }}" class="{{ $menu == 'Members' ? 'active' : '' }}">
                <i class="uil-users-alt"></i>
                <span>Members</span>
            </a>
        </li>

        <li class="{{ $menu == 'Certificates' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.certificates') }}" class="{{ $menu == 'Certificates' ? 'active' : '' }}">
                <i class="uil-book-alt"></i>
                <span>Certificates</span>
            </a>
        </li>

        <li class="{{ $menu == 'Orders' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.orders') }}" class="{{ $menu == 'Orders' ? 'active' : '' }}">
                <i class="uil-book-alt"></i>
                <span>Orders</span>
            </a>
        </li>

        <li class="{{ $menu == 'Emails' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.emails') }}" class="{{ $menu == 'Emails' ? 'active' : '' }}">
                <i class="uil-envelope"></i>
                <span>Emails</span>
            </a>
        </li>

        <li class="{{ $menu == 'Settings' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.settings') }}" class="{{ $menu == 'Settings' ? 'active' : '' }}">
                <i class="uil-cog"></i>
                <span>Settings</span>
            </a>
        </li>

        <li class="{{ $menu == 'Logout' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.logout') }}" class="{{ $menu == 'Logout' ? 'active' : '' }}">
                <i class="uil-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li> --}}
    </ul>
</div>
