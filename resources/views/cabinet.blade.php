@php
  $user = Auth::user();
@endphp

<div class="flex flex-col items-center mt-5 gap-3">
  @if ($user -> fullname == 'copp')
  
  <h1 class="text-4xl">Админ-панель</h1>
  @include('admin_panel')
  
  @else
  
  <h1 class="text-4xl">Личный кабинет</h1>
    @include('user_panel')
    
  @endif
</div>