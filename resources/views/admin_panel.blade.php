@php
  use App\Models\Statement;
  // $statements = Statement::all();
  $statements = Statement::where('status', 'new')->get();  
@endphp

@if(!$statements->isEmpty())

    @foreach($statements as $statement)

        <div class="flex flex-col mt-5 gap-3 w-72 border border-slate-900 rounded-xl p-4">
          
          <div>Имя: {{ $statement -> user_fullname }}</div>
          <div>Описание: {{ $statement -> description }}</div>
          <div class="border border-slate-900 rounded-xl p-2 w-fit">{{ $statement -> car_number }}</div>
          <div>Телефон: {{ $statement -> user_tel }}</div>
          <div>Email: {{ $statement -> user_email }}</div>

          <div class="flex gap-1 self-end">
            <form method="POST" action="{{ route('update_status') }}" >
              @csrf
              <input type="hidden" name="id" value="{{$statement -> id}}" required>
              <input type="hidden" name="status" value="confirmed" required>
              <button type="submit" class="text-green-500 border border-slate-900 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 14.5s1.5 0 3.5 3.5c0 0 5.559-9.167 10.5-11" color="currentColor"/></svg></button>
            </form>
            <form method="POST" action="{{ route('update_status') }}">
              @csrf
              <input type="hidden" name="id" value="{{$statement -> id}}" required>
              <input type="hidden" name="status" value="canceled" required>
              <button type="submit" class="text-red-500 border border-slate-900 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144m224 0L144 368"/></svg></и>
            </form>
          </div>

        </div>


    @endforeach
@else
  <p class="text-align">Нет заявок</p>
@endif