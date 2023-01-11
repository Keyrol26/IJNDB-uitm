  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a class="logo d-flex align-items-center" href="/home">
              <img src="{{ asset('multiple/img/ijn-logo/ijn-logo.png') }}">
              <span class="d-none d-lg-block">DownTime DB</span></a>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->


      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">
              <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0"href="{{ route('logout') }}">
                      <img src="{{ asset('multiple/img/admin.png') }}" alt="Profile" class="rounded-circle">
                      <span class="d-none d-md-block">Sign Out</span>
                  </a><!-- End Profile Iamge Icon -->
              </li><!-- End Profile Nav -->

          </ul>
      </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
