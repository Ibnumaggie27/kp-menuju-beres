<div id="sidebar" class="active">
    <div class="sidebar-wrapper active"   style="background-color: var(--bs-body-bg);">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                <img src="{{ asset('mazer') }}/assets/images/logo/smk.png" alt="Logo" style="width: 80px; height: auto; position: absolute; top: 65%; left: 30%; transform: translate(-50%, -50%);">
                </div>
                <div class="dropdown">
  <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li>
        <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="light">
  <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i>
  light
  </button>
</li>
<li>
    <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="dark">
  <i class="bi bi-moon-fill me-2 opacity-50" data-theme-icon="bi-moon-fill"></i>
  dark
  </button>
</li>
</ul>
</div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title" style="color: var(--bs-dark-text);">Menu</li>

                <li class="sidebar-item  ">
                    <a href="{{ route('dashboard') }}" class='sidebar-link' style="color: var(--bs-dark-text);">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
