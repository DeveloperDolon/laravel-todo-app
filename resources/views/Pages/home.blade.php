@extends('layouts.layout')
@section('content')
    <div class="">
        <h1 class="text-center md:text-3xl sm:text-2xl text-xl font-semibold my-10">Todo Application</h1>
        <form class="flex justify-center items-center">
            <div class="rounded-full overflow-hidden shadow-lg bg-slate-300 flex w-full items-center max-w-2xl mx-auto">
                <input class="py-3 outline-none border-none px-5 flex-1 bg-transparent rounded-full placeholder:text-gray-500" placeholder="Input task" type="text" >
                <button 
                class="text-black px-5 py-1 shadow-lg rounded-full md:text-4xl sm:text-3xl text-2xl font-semibold 
                flex items-center justify-center bg-white transition-all duration-300 hover:text-white hover:bg-gray-400 ">+</button>
            </div>
        </form>

        <div class="max-w-7xl mx-auto lg:px-5 md:px-6 px-5 grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5 my-10">
            <div class="bg-[#fff599] rounded-lg shadow-lg">
                <p class="md:text-base sm:text-sm text-xs font-semibold p-5 pb-2">Todo</p>
                <hr class="bg-black h-1">
                <div class="p-5">
                </div>
            </div>

            <div class="bg-[#85dcff] rounded-lg shadow-lg ">
                <p class="md:text-base sm:text-sm text-xs font-semibold p-5 pb-2">In Progress</p>
                <hr class="bg-black h-1">
                <div class="p-5">
                </div>
            </div>

            <div class="bg-[#a2ffa7aa] rounded-lg shadow-lg min-h-[calc(100vh-300px)]">
                <p class="md:text-base sm:text-sm text-xs font-semibold p-5 pb-2">Done</p>
                <hr class="bg-black h-1">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <p class="md:text-sm text-xs font-semibold flex-1">Task 1</p>
                        <button onclick="taskOption(1)" class="md:text-xl sm:text-lg text-base">...</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function taskOption(id) {
            console.log(id);
        }
    </script>
@endsection
