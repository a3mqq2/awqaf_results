<!-- الصفحة الرئيسية -->
<li class="pc-item">
  <a href="{{ route('admin.dashboard') }}" class="pc-link">
    <span class="pc-micon">
      <i class="ti ti-home"></i>
    </span>
    <span class="pc-mtext">لوحة التحكم</span>
  </a>
</li>

<!-- إدارة النتائج -->
<li class="pc-item">
  <a href="{{ route('admin.results.index') }}" class="pc-link">
    <span class="pc-micon">
      <i class="ti ti-file-text"></i>
    </span>
    <span class="pc-mtext">إدارة النتائج</span>
  </a>
</li>

<!-- تسجيل الخروج -->
<li class="pc-item">
  <a href="{{ route('logout') }}" class="pc-link">
    <span class="pc-micon">
      <i class="ti ti-logout"></i>
    </span>
    <span class="pc-mtext">تسجيل الخروج</span>
  </a>
</li>
