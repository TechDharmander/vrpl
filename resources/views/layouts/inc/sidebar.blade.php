<div class="sidebar">
  <div class="sidebar-header">
    <a href="{{ route('admin.admin-dashboard') }}" class="sidebar-logo">
      <x-application-logo class="" />
    </a>
  </div><!-- sidebar-header -->

  <div id="sidebarMenu" class="sidebar-body">
    <div class="nav-group show">
      <ul class="nav nav-sidebar">
        <li class="nav-item">
          <a href="{{ route('admin.admin-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>Song Categories</span></a>
          <nav class="nav nav-sub">
            <a href="{{ route('admin.song-category') }}" class="nav-sub-link">All Song Categories</a>
            <a href="{{ route('admin.song-subcategory') }}" class="nav-sub-link">All Song Sub-Categories</a>
          </nav>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.genres') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Genres</span></a>
        </li>
      </ul>
    </div><!-- nav-group -->

  </div>

</div><!-- sidebar -->