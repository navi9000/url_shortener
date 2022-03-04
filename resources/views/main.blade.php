@extends('layouts.app')

@section('content')
<div class="max-w-5xl bg-white rounded-lg my-6 mx-auto p-12 shadow-md">
    <form method="post" action="{{secure_url('/')}}" class="flex gap-6">
        @csrf
        <input type="text" autocomplete="off" placeholder="Введите URL" name="url" class="flex-1 focus:outline-none focus:ring-2 focus:ring-red-600 rounded-lg p-3">
        <button type="submit" class="flex-0 ring-red-600 ring-2 rounded-lg p-3 text-red-600 font-bold hover:bg-red-600 hover:text-white hover:shadow-lg transition duration-300 ease-out">Получить короткую ссылку</button>
    </form>
    @if (session('token'))
    <form action="{{secure_asset('remote', ['token' => session('token')])}}">
        @csrf

        <button type="submit" class="my-6 hover:underline">{{ltrim(url()->current(), 'https://') . '/' . session('token')}}</button>
    </form>
    @endif
</div>
@endsection