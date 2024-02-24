<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Dashboard Klassy Cafe</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    @if(auth()->check() && auth()->user()->role == 'super admin')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('users') }}">
        <i class="fas fa-fw fa-user-alt"></i>
        <span>User</span></a>
    </li>
    @endif

    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'super admin']))
    <li class="nav-item">
      <a class="nav-link" href="{{ route('images') }}">
        <i class="fas fa-fw fa-image"></i>
        <span>Main Banner</span></a>
    </li>
    @endif

    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'super admin']))
    <li class="nav-item">
      <a class="nav-link" href="{{ route('menu.index') }}">
        <i class="fas fa-fw fa-bowl-food"></i>
        <span>Menu</span></a>
    </li>
    @endif

    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'super admin']))
    <li class="nav-item">
      <a class="nav-link" href="{{ route('chef.index') }}">
        <i class="fas fa-fw fa-kitchen-set"></i>
        <span>Chef</span></a>
    </li>
    @endif

    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'super admin']))
    <li class="nav-item">
      <a class="nav-link" href="{{ route('reservation.index') }}">
        <i class="fas fa-fw fa-chair"></i>
        <span>Reservation</span></a>
    </li>
    @endif

    <li class="nav-item">
      <a class="nav-link" href="{{ route('profile.show') }}">
        <i class="fas fa-fw fa-person"></i>
        <span>Profile</span></a>
    </li>

    
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    
  </ul>