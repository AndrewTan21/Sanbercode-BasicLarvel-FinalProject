<aside class="main-sidebar sidebar-light-primary elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      {{-- <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span> --}}

      <img src="{{asset('assets/img/ind.png')}}" alt="tumpukan meluap Logo" style="max-height: 45px; line-height: .8; margin-left: .8rem; margin-right: .5rem; margin-top: -3px;">
      <span class="brand-text font-weight-light" style="font-family: D-DIN;">tumpukan <span style="color: #000000; font-weight: bold">meluap</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @guest
          
          @if (Route::has('register'))
            <img src="{{ asset('assets/img/guest.png') }}" class="img-circle elevation-2" alt="User Image">
          @endif

          @else
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">

          @endguest
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name ?? 'Guest' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/question" class="nav-link">
              <i class="nav-icon far fa-question-circle"></i>
              <p>
                Questions
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>