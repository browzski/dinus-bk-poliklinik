   <!-- #Left Sidebar ==================== -->
   <div class="sidebar">
    <div class="sidebar-inner">
      <!-- ### $Sidebar Header ### -->
      <div class="sidebar-logo">
        <div class="peers ai-c fxw-nw">
          <div class="peer peer-greed">
            <a class="sidebar-link td-n" href="{{url('/dokter')}}">
              <div class="peers ai-c fxw-nw">
                <div class="peer">
                  <div class="logo">
                    <img src="{{url("assets/static/images/logo.png")}}" alt="">
                  </div>
                </div>
                <div class="peer peer-greed">
                  <h5 class="lh-1 mB-0 logo-text">{{env('APP_NAME')}}</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="peer">
            <div class="mobile-toggle sidebar-toggle">
              <a href="" class="td-n">
                <i class="ti-arrow-circle-left"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ### $Sidebar Menu ### -->
      <ul class="sidebar-menu scrollable pos-r">
        <li class="nav-item mT-30 actived">
          <a class="sidebar-link" href="{{url('/dokter')}}">
            <span class="icon-holder">
              <i class="c-blue-500 ti-home"></i>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="sidebar-link" href="{{url('/dokter/jadwal')}}">
            <span class="icon-holder">
              <i class="c-deep-orange-500 ti-calendar"></i>
            </span>
            <span class="title">Input Jadwal Periksa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="sidebar-link" href="{{url('/dokter/periksa')}}">
            <span class="icon-holder">
              <i class="c-brown-500 ti-user"></i>
            </span>
            <span class="title">Periksa Pasien</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="sidebar-link" href="{{url('/dokter/riwayat/')}}">
            <span class="icon-holder">
              <i class="c-blue-500 ti-share"></i>
            </span>
            <span class="title">Riwayat Pasien</span>
          </a>
        </li>
      
        
      </ul>
    </div>
  </div>
