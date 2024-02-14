<header id="page-topbar" style="position: sticky; top: 0">
    <div class="navbar-header">
        <div class="d-flex">
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <img src="{{ asset('user/img/logo.jpeg') }}" class="logo" style="height: 52px; align-self: center;" />
        </div>



        <div class="dropdown d-inline-block ">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user"
                    src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Marcus</span>
                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="#"><i
                        class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
                        class="align-middle">View Profile</span></a>
                <a class="dropdown-item" href="#"><i
                        class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span
                        class="align-middle">My Wallet</span></a>
                <a class="dropdown-item d-block" href="#"><i
                        class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span
                        class="align-middle">Settings</span> <span
                        class="badge bg-success-subtle text-success rounded-pill mt-1 ms-2">03</span></a>
                <a class="dropdown-item" href="#"><i
                        class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span
                        class="align-middle">Lock screen</span></a>
                <a class="dropdown-item" href="#"><i
                        class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span
                        class="align-middle">Sign out</span></a>
            </div>
        </div>
    </div>
</header>
