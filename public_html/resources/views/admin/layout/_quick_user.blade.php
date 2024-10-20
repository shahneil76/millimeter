<div id="kt_quick_user" class="offcanvas offcanvas-right offcanvas-user">
    <div
        class="offcanvas-header d-flex align-items-center justify-content-between p-7  border border-top-0 border-left-0 border-right-0  bg-secondary">
        <h4 class="font-weight-bold m-0">
            {{ Auth::user()->name }}
        </h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-danger" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>

    <div class="offcanvas-content">
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="btn btn-profile w-100 text-left py-3"><i
                        class="far fa-user text-primary px-5"></i>My Profile</a>
            </div>
            <div class="col-lg-12 border border-bottom-0 border-left-0 border-right-0">
                <a href="#" class="btn btn-profile w-100 text-left py-3"><i
                        class="fas fa-unlock-alt text-primary px-5"></i>Change Password</a>
            </div>
            <div class="col-lg-12 text-right border border-bottom-0 border-left-0 border-right-0">
                <a href="{{ route('logout') }}" class="btn btn-light-danger btn-sm m-5" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
