@extends('layouts.layout')
@section('content')
    <div class="max-w-5xl mx-auto">
        <h1 class="text-center md:text-3xl sm:text-2xl text-xl font-semibold my-10">Todo Application</h1>
        <form class="flex justify-center items-center">
            <div class="rounded-full overflow-hidden shadow-lg bg-slate-300 flex w-full items-center max-w-2xl mx-auto">
                <input class="py-3 outline-none border-none px-5 flex-1 bg-transparent rounded-full placeholder:text-gray-500" placeholder="Input task" type="text" >
                <button 
                class="text-black px-5 py-1 shadow-lg rounded-full md:text-4xl sm:text-3xl text-2xl font-semibold 
                flex items-center justify-center bg-white transition-all duration-300 hover:text-white hover:bg-gray-400 ">+</button>
            </div>
        </form>
    </div>
@endsection
