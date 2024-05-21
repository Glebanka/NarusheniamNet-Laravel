@php
  use App\Models\Statement;
  $statements = Statement::where('user_fullname', $user->fullname)->orderBy('id', 'desc')->get();
@endphp

<a href="new_statement" class="text-blue-700 bg-blue-100 rounded-xl p-3 hover:bg-blue-700 hover:text-blue-100 font-bold duration-500 mt-4 w-72 text-center">Создать новое заявление</a>

  @if(!$statements->isEmpty())

    @foreach($statements as $statement)

    <div class="flex flex-col mt-5 gap-3 w-72 border border-slate-900 rounded-xl p-4">
      <div>{{ $statement -> description }}</div>
      <div class="self-end border border-slate-900 rounded-xl p-2 w-fit">{{ $statement -> car_number }}</div>

      @if($statement -> status == 'new')

      <div class="self-end text-gray-400">Новый</div>
      
      @elseif ($statement -> status == 'confirmed')
      
      <div class="self-end text-green-500">Подтверждено</div>

      @else
      
      <div class="self-end text-red-500">Отклонено</div>
      

      @endif

    </div>
    @endforeach

  @endif
