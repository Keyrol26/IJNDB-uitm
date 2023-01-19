  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link {{ request()->is('index') ? '' : 'collapsed' }}" href="{{ route('home') }}">
                  {{-- <img src="{{ asset('multiple/img/icon/patient.png') }}" > --}}
                  <i class="bi bi-circle" style="font-size: 10px;"> </i>
                  <span>Patient</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-heading">Pages</li>

          <li class="nav-item">
              <a class="nav-link {{ request()->is('mhd') ? '' : 'collapsed' }}" href="{{ route('showmhd') }}">
                  {{-- <img src="{{ asset('multiple/img/icon/mhd.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                  <span>MHD</span>
              </a>
          </li><!-- End MhdListing Page Nav -->

          <li class="nav-item">
              <a class="nav-link {{ request()->is('inpatient') ? '' : 'collapsed' }}" href="{{ route('inpatient') }}">
                  {{-- <img src="{{ asset('multiple/img/icon/bill.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                  <span>Inpatient Pre-Admission</span>
              </a>
          </li><!-- End inpatient Page Nav -->

          <li class="nav-item">
              <a class="nav-link {{ request()->is('subsidy') ? '' : 'collapsed' }}" href="{{ route('subsidy') }}">
                  {{-- <img src="{{ asset('multiple/img/icon/subsidy.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                  <span>Subsidy</span>
              </a>
          </li><!-- End Subsidy Page Nav -->

          <li class="nav-item">
              <a class="nav-link {{ request()->is('currentpatient') ? '' : 'collapsed' }}"
                  href="{{ route('currentpatient') }}">
                  {{-- <img src="{{ asset('multiple/img/icon/currentpatient.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                  <span>Current Patient</span>
              </a>
          </li><!-- End currentpatient Page Nav -->

          <li class="nav-item">
              <a class="nav-link {{ request()->is('currentappt') ? '' : 'collapsed' }}"
                  href="{{ route('currentappt') }}">
                  {{-- <img src="{{ asset('multiple/img/icon/bill.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                  <span>Appointment</span>
              </a>
          </li><!-- End appointment Page Nav -->


          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-circle" style="font-size: 10px;"></i><span>Bill</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
              <li>
                <a class="nav-link {{ request()->is('billoutpatient') ? '' : 'collapsed' }}"
                    href="{{ route('billoutpatient') }}">
                    {{-- <img src="{{ asset('multiple/img/icon/bill.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                    <span>Current Bill Outpatient</span>
                </a>
              </li>
              <li>
                <a class="nav-link {{ request()->is('billinpatient') ? '' : 'collapsed' }}"
                    href="{{ route('billinpatient') }}">
                    {{-- <img src="{{ asset('multiple/img/icon/bill.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                    <span>Current Bill Inpatient</span>
                </a>
              </li>
            </ul>
          </li><!-- End Icons Nav -->

          <li class="nav-item">
              <a class="nav-link {{ request()->is('icl') ? '' : 'collapsed' }}" href="{{ route('icl') }}">
                  {{-- <img src="{{ asset('multiple/img/icon/bill.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                  <span>ICL</span>
              </a>
          </li><!-- End ICL Page Nav -->

          <li class="nav-item">
              <a class="nav-link {{ request()->is('ot') ? '' : 'collapsed' }}" href="{{ route('ot') }}">
                  {{-- <img src="{{ asset('multiple/img/icon/operation.png') }}" > --}}<i class="bi bi-circle" style="font-size: 10px;"> </i>
                  <span>OT</span>
              </a>
          </li><!-- End OT Page Nav -->
      </ul>

  </aside><!-- End Sidebar-->

