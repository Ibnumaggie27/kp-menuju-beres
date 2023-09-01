<li
class="sidebar-item  has-sub">
<a href="#" class='sidebar-link' style="color: var(--bs-dark-text);">
    <i class="bi bi-menu-down"></i>
    <span>Pemilih&Kandidat</span>
</a>
<ul class="submenu ">
    <li class="submenu-item ">
        <a href="{{ route('backend.pemilih.index') }}" style="color: var(--bs-dark-text);">{{ __('sidebar.voter') }}</a>
        <a href="{{ route('backend.kandidat.index') }}" style="color: var(--bs-dark-text);">{{ __('sidebar.candidate') }}</a>
    </li>
</ul>
</li>