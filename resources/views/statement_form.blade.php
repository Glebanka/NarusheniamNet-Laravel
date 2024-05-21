@include('head')

@include('header')

  <form class="bg-white flex flex-col items-center gap-8 rounded-xl p-5 mt-6" method="POST" action="{{ route('statement') }}">
    <h2 class="text-2xl font-bold text-center">Формирование заявления</h2>
    @csrf
    <div class="flex flex-col gap-2 w-72">
      <p class="">Государственный регистрационный номер автомобиля</p>
      <input type="text" class="bg-slate-100 p-3 rounded-xl  @error('car_number') bg-red-300 @enderror" placeholder="аб123в 55" name='car_number' value="{{ old('car_number') }}" required>
      @error('car_number')
      <span class="text-red-400" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="flex flex-col gap-2 w-72">
      <p class="">Опишите нарушение</p>
      <textarea class="bg-slate-100 p-3 rounded-xl @error('description') bg-red-300 @enderror" name="description" value="{{ old('description') }}" required rows="5"></textarea>
      @error('description')
      <span class="text-red-400" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <input type="submit" class="w-72 p-3 bg-blue-700 text-cyan-50 rounded-xl mt-8 cursor-pointer hover:bg-blue-600 duration-500" value="Отправить"></input>
  </form>