<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-data"></i>
                        <span key="t-master">Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('jenis_kendaraan.index') }}" key="t-default">Jenis Kendaraan</a></li>
                        <li><a href="{{ route('jenis_transmisi.index') }}" key="t-default">Jenis Transmisi</a></li>
                        <li><a href="{{ route('part_category.index') }}" key="t-default">Part Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('booking.index') }}" class="waves-effect">
                        <i class="bx bx-book"></i>
                        <span key="t-dashboards">Booking</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('part.index') }}" class="waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-part">Part</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tips.index') }}" class="waves-effect">
                        <i class='bx bx-question-mark'></i>
                        <span key="t-tips">Tips</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
