@include('head')

@if (!Auth::check())

  @include('auth')

@else


  @include('header')
  
  @if (session('success'))
      <div class="text-xl text-center text-green-500">
          {{ session('success') }}
      </div>
  @endif

  @include('cabinet')

@endif