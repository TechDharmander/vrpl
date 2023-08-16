<div class="sidebar">
  <div class="sidebar-header">
    <a href="{{ route('admin.admin-dashboard') }}" class="sidebar-logo">
      <x-application-logo class="" />
    </a>
  </div><!-- sidebar-header -->

  <div id="sidebarMenu" class="sidebar-body">
    <div class="nav-group show">
      <ul class="nav nav-sidebar">
        @if(Auth::user()->role->value == 'superadmin')
          <li class="nav-item">
            <a href="{{ route('admin.admin-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Dashboard</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.song-releases') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Song Releases</span></a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>Users / Staff</span></a>
            <nav class="nav nav-sub">
              <a href="{{ route('admin.all-users') }}" class="nav-sub-link">All Users</a>
              <a href="{{ route('admin.all-staff') }}" class="nav-sub-link">All Staff</a>
            </nav>
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
          <li class="nav-item">
            <a href="{{ route('admin.composers') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Composers</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.producers') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Producers</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.artists') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Artists</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.lyricists') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Lyricists</span></a>
          </li>
        @endif
        
        @if(Auth::user()->role->value == 'user')
          <li class="nav-item">
            <a href="{{ route('user-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Dashboard</span></a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>Song Releases</span></a>
            <nav class="nav nav-sub">
              <a href="{{ route('song-release') }}" class="nav-sub-link">New Song Release</a>
              <a href="{{ route('all-releases', 'approved') }}" class="nav-sub-link">Approved Songs</a>
              <a href="{{ route('all-releases', 'draft') }}" class="nav-sub-link">Draft Songs</a>
              <a href="{{ route('all-releases', 'pending') }}" class="nav-sub-link">Pending Songs</a>
              <a href="{{ route('all-releases', 'onhold') }}" class="nav-sub-link">Onhold Songs</a>
              <a href="{{ route('all-releases', 'unapproved') }}" class="nav-sub-link">Unapproved Songs</a>
            </nav>
          </li>
        @endif
         
      
        @if(auth()->user()->role->value =='approval')
          <li class="nav-item">
            <a href="{{ route('approval.approval-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
              <span>Dashboard</span></a>
          </li>

          <li class="nav-item">
            <a href="{{ route('approval.songs-panding') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
              <span>Panding</span></a>
          </li>
         
          <li class="nav-item">
            <a href="{{ route('approval.songs-approved') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
              <span>Approved</span></a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('approval.songs-onhold') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
              <span>Onhold</span></a>
          </li>

          <li class="nav-item">
            <a href="{{ route('approval.songs-draft') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
              <span>Draft</span></a>
          </li>
        @endif
      </ul>
    </div><!-- nav-group -->

  </div>

</div><!-- sidebar -->