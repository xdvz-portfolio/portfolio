@php
  // Проверка, активирован ли сайдбар
  $display_sidebar = is_active_sidebar('sidebar-primary');
@endphp

@if ($display_sidebar)
  <aside class="sidebar">
    <div class="sidebar-container">
      {!! dynamic_sidebar('sidebar-primary') !!}
    </div>
  </aside>
@endif
