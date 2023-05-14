<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-swatchbook"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Shop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tổng quan</span>
        </a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/customer/manage">
            <i class="fa fa-users"></i>
            <span>Quản lý khách hàng</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/book/manage">
            <i class="fas fa-book"></i>
            <span>Quản lý sách</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/invoice/manage">
            <i class="fa fa-receipt"></i>
            <span>Quản lý hóa đơn</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseTacGia"
            aria-expanded="true" aria-controls="collapseTacGia">
            <i class="fa fa-cubes"></i>
            <span>Danh mục tác giả</span>
        </a>
        <div id="collapseTacGia" class="collapse" aria-labelledby="headingTacGia" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded sub-menu">
                <a class="collapse-item" href="/admin/author/manage">
                    <span>Quản lý tác giả</span>
                </a>
                <a class="collapse-item" href="/admin/author_participate/manage">
                    <span>Quản lý tham gia</span>
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseTheLoai"
            aria-expanded="true" aria-controls="collapseTheLoai">
            <i class="fa fa-cubes"></i>
            <span>Danh mục thể loại</span>
        </a>
        <div id="collapseTheLoai" class="collapse" aria-labelledby="headingTheloai"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded sub-menu">
                <a class="collapse-item" href="/admin/theme_book/manage">
                    <span>Quản lý chủ đề</span>
                </a>
                <a class="collapse-item" href="/admin/type_book/manage">
                    <span>Quản lý loại</span>
                </a>
                <a class="collapse-item" href="/admin/category/manage">
                    <span>Quản lý thể loại</span>
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/supplier/manage">
            <i class="far fa-address-card"></i>
            <span>Quản lý nhà xuất bản</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/filter_price/manage">
            <i class="fas fa-wallet"></i>
            <span>Quản lý bảng lọc giá</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/promotion/manage">
            <i class="fas fa-percentage"></i>
            <span>Quản lý khuyến mại</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/address_ship/manage">
            <i class="fas fa-map-marked-alt"></i>
            <span>Quản lý địa chỉ giao hàng</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/new/manage">
            <i class="fas fa-newspaper"></i>
            <span>Quản lý bài viết</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/evaluate/users">
            <i class="fas fa-user-alt"></i>
            <span>Quản lý người đánh giá</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/evaluate/messages">
            <i class="far fa-comment"></i>
            <span>Quản lý tin đánh giá</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
</ul>