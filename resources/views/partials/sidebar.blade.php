<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-title">Product</li>

        <li class="sidebar-item {{ Request::is('category*') ? 'active' : '' }}">
            <a href="{{ route('category.index') }}" class='sidebar-link'>
                <i class="bi bi-bookmarks-fill"></i>
                <span>Kategori</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::is('product*') ? 'active' : '' }}">
            <a href="{{ route('product.index') }}" class='sidebar-link'>
                <i class="bi bi-card-checklist"></i>
                <span>Barang</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::is('supplier*') ? 'active' : '' }}">
            <a href="{{ route('supplier.index') }}" class='sidebar-link'>
                <i class="bi bi-person-square"></i>
                <span>Supplier</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::is('transactionin*') ? 'active' : '' }}">
            <a href="{{ route('transactionin.index') }}" class='sidebar-link'>
                <i class="bi bi-wallet2"></i>
                <span>Data Pembelian</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::is('transactionout*') ? 'active' : '' }}">
            <a href="{{ route('transactionout.index') }}" class='sidebar-link'>
                <i class="bi bi-cash-coin"></i>
                <span>Data Penjualan</span>
            </a>
        </li>

        <li class="sidebar-title ">Access Control</li>
        @if (auth()->user()->role === 'superadmin')
            <li class="sidebar-item {{ Request::is('useraccess*') ? 'active' : '' }}">
                <a href="{{ route('useraccess.index') }}" class='sidebar-link'>
                    <i class="bi bi-people"></i>
                    <span>User Role</span>
                </a>
            </li>
        @endif
        <li class="sidebar-item ">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class='btn border-0'>
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="ms-3">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</div>
</div>
</div>
