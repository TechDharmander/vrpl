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
          <a href="{{ route('admin.admin-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Home</span></a>
        </li>
        
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Home</span></a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Verification Dash</span></a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Financial Dash</span></a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Label Management Dash</span></a></li>
        <li class="nav-item">
          <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>User Profile /Staff Profile</span></a>
          <nav class="nav nav-sub">
            <a href="{{ route('admin.all-users') }}" class="nav-sub-link">All Users</a>
            <a href="{{ route('admin.all-staff') }}" class="nav-sub-link">All Staff</a>
          </nav>
        </li>

        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Promotions Dash</span></a></li>
        <li class="nav-item">
          <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>Songs uploaded dash</span></a>
          <nav class="nav nav-sub">
            <a href="" class="nav-sub-link">Pending Song</a>
            <a href="" class="nav-sub-link">On Hold Songs</a>
            <a href="" class="nav-sub-link">Approved Songs</a>
          </nav>
        </li>
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Support Dash</span></a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Site settings (theme, colour, page modification)</span></a></li>
        
<hr>
        <li class="nav-item">
          <a href="{{ route('admin.song-releases') }}" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Song
              Releases</span></a>
        </li>
        

        <li class="nav-item">
          <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>User Profile /Staff Profile</span></a>
          <nav class="nav nav-sub">
            <a href="{{ route('admin.all-users') }}" class="nav-sub-link">All Users</a>
            <a href="{{ route('admin.all-staff') }}" class="nav-sub-link">All Staff</a>
          </nav>
        </li>

        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Promotions Dash</span></a></li>
        <li class="nav-item">
          <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>Songs uploaded dash</span></a>
          <nav class="nav nav-sub">
            <a href="" class="nav-sub-link">Pending Song</a>
            <a href="" class="nav-sub-link">On Hold Songs</a>
            <a href="" class="nav-sub-link">Approved Songs</a>
          </nav>
        </li>
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Support Dash</span></a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i> <span>Site settings (theme, colour, page modification)</span></a></li>
        
        <hr>
        <li class="nav-item">

          <a href="{{ route('admin.genres') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Genres</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.composers') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Composers</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.producers') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Producers</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.artists') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Artists</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.lyricists') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Lyricists</span></a>
        </li>
        @endif

        @if(Auth::user()->role->value == 'user')
        <li class="nav-item">
          <a href="{{ route('user-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Home</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('song-release') }}" class="nav-link"><i class="ri-gallery-line"></i> <span>Create Song
              Release</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('song-release') }}" class="nav-link"><i class="ri-gallery-line"></i> <span>Revenue and
              Analytics</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('song-release') }}" class="nav-link"><i class="ri-gallery-line"></i>
            <span>Promotions</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('song-release') }}" class="nav-link"><i class="ri-gallery-line"></i> <span>LIVE
              Releases</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('song-release') }}" class="nav-link"><i class="ri-gallery-line"></i> <span>Conflicts (alert
              sign)</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link has-sub"><i class="ri-gallery-line"></i> <span>Release Services</span></a>
          <nav class="nav nav-sub">
            <a href="" class="nav-sub-link">Remove YouTube Claim</a>
            <a href="" class="nav-sub-link">Whitelist Facebook page</a>
            <a href="" class="nav-sub-link">Whitelist Instagram page</a>
          </nav>
        </li>
        <li class="nav-item">
          <a href="{{ route('song-release') }}" class="nav-link"><i class="ri-gallery-line"></i> <span>Help and
              Support</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('song-release') }}" class="nav-link"><i class="ri-gallery-line"></i> <span>FAQs</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('song-release') }}" class="nav-link"><i class="ri-gallery-line"></i>
            <span>Tutorials</span></a>
        </li>

        @endif

        @if(auth()->user()->role->value =='approval')
        <li class="nav-item">
          <a href="{{ route('approval.approval-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Home</span></a>
        </li>

        <li class="nav-item">
          <a href="{{ route('approval.songs-panding') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Pending for Verification</span></a>
        </li>

        <li class="nav-item">
          <a href="{{ route('approval.songs-approved') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Songs verified by me</span></a>
        </li>

        <li class="nav-item">
          <a href="{{ route('approval.songs-onhold') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Songs on HOLD</span></a>
        </li>

       
        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Music Videos on HOLD</span></a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Music Videos verified by me</span></a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>LIVE Songs</span></a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>LIVE Music videos</span></a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Tickets</span></a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Update LIVE Links and Codes </span>
          </a>
        </li>
        @endif

        

        @if(Auth::user()->role->value == 'aggregator')
        <li class="nav-item">
          <a href="{{ route('aggregator.aggregator-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Home</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Add New Sub-Labe</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Revenue and Analytics</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>My Sub-Labels</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Help and Support</span></a>
        </li>

        @endif



        @if(Auth::user()->role->value == 'accountant')

        <li class="nav-item">
          <a href="{{ route('finance.finance-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Home</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Revenue and Analytics</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Revenue data management  </span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>All Users</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Pending for KYC</span></a>
        </li>


        @endif
        @if(Auth::user()->role->value == 'promotion')
        <li class="nav-item">
          <a href="{{ route('promotion.promotion-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Home</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Update Playlisitng</span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Tickets  </span></a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i>
            <span>Update offers</span></a>
        </li>


        @endif


        
        @if(Auth::user()->role->value == 'planner')

        <li class="nav-item"><a href="{{ route('planner.planner-dashboard') }}" class="nav-link"><i class="ri-calendar-todo-line"></i><span>Home</span></a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="ri-calendar-todo-line"></i><span>Agreement creation wizard</span></a> </li>
        <li class="nav-item"> <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i><span>All Users  </span></a></li>
        <li class="nav-item"> <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i><span>All Artists</span></a></li>
        <li class="nav-item"> <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i><span>All Labels</span></a></li>
        <li class="nav-item"> <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i><span>All Aggregators</span></a></li>
        <li class="nav-item"> <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i><span>All Referrals</span></a></li>
        <li class="nav-item"> <a href="" class="nav-link"><i class="ri-calendar-todo-line"></i><span>Plan Assignment</span></a></li>
        @endif

      </ul>
    </div><!-- nav-group -->

  </div>

  @if(Auth::user()->role->value == 'user')

  <div class="sidebar-footer">
    <div class="sidebar-footer-top">
 
      <div class="sidebar-footer-body">
        <h6>UPLOAD STATUS</h6>
      </div><!-- sidebar-footer-body -->
      <a id="sidebarFooterMenu" href="" class="dropdown-link"><i class="ri-arrow-down-s-line"></i></a>
    </div><!-- sidebar-footer-top -->
    <div class="sidebar-footer-menu">

      <nav class="nav">
        <a href=""><i class="ri-edit-2-line"></i> Pending for Approval (4)</a>
        <a href=""><i class="ri-profile-line"></i> Approved Release (7)</a>
        <a href=""><i class="ri-profile-line"></i> Rejected Release (5)</a>
        <hr>
        <a href=""><i class="ri-profile-line"></i> Draft/Pending for Submission (3)</a>
      </nav>
    </div><!-- sidebar-footer-menu -->
  </div><!-- sidebar-footer -->

  @endif
</div><!-- sidebar -->