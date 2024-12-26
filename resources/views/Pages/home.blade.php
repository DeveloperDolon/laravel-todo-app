@extends('layouts.layout')
@section('content')
    <div class="">
        <h1 class="text-center md:text-3xl sm:text-2xl text-xl font-semibold my-10">Todo Application</h1>
        <form class="flex justify-center items-center">
            <div class="rounded-full overflow-hidden shadow-lg bg-slate-300 flex w-full items-center max-w-2xl mx-auto">
                <input id="new-task-input"
                    class="py-3 outline-none border-none px-5 flex-1 bg-transparent rounded-full placeholder:text-gray-500"
                    placeholder="Input task" type="text">
                <button type="button" id="add-task-btn"
                    class="text-black px-5 py-1 shadow-lg rounded-full md:text-4xl sm:text-3xl text-2xl font-semibold 
                    flex items-center justify-center bg-white transition-all duration-300 hover:text-white hover:bg-gray-400">+</button>
            </div>
        </form>

        <div class="max-w-7xl mx-auto lg:px-5 md:px-6 px-5 grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5 my-10">
            <!-- Todo Section -->
            <div class="bg-[#fff599] rounded-lg shadow-lg">
                <p class="md:text-base sm:text-sm text-xs font-semibold p-5 pb-2">Todo</p>
                <hr class="bg-black h-1">
                <div class="p-5 min-h-[calc(100vh-300px)] dropzone" ondrop="drop(event)" ondragover="allowDrop(event)">
                </div>
            </div>

            <!-- In Progress Section -->
            <div class="bg-[#85dcff] rounded-lg shadow-lg">
                <p class="md:text-base sm:text-sm text-xs font-semibold p-5 pb-2">In Progress</p>
                <hr class="bg-black h-1">
                <div class="p-5 min-h-[calc(100vh-300px)] dropzone" ondrop="drop(event)" ondragover="allowDrop(event)">
                </div>
            </div>

            <!-- Done Section -->
            <div class="bg-[#a2ffa7aa] rounded-lg shadow-lg">
                <p class="md:text-base sm:text-sm text-xs font-semibold p-5 pb-2">Done</p>
                <hr class="bg-black h-1">
                <div class="p-5 min-h-[calc(100vh-300px)] dropzone" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div id="task-1" ondragstart="drag(event)" draggable="true"
                        class="flex justify-between items-center p-2 bg-white rounded-lg shadow-md my-2 cursor-pointer">
                        <div class="flex items-center gap-2">
                            <i class="fa-regular fa-circle-dot text-green-500"></i>
                            <p class="md:text-sm text-xs font-semibold flex-1">
                                Go to market and take something.
                            </p>
                        </div>
                        <button><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();

            const data = ev.dataTransfer.getData("text");
            const draggedElement = document.getElementById(data);

            if (!draggedElement) {
                console.error(`Element with ID ${data} not found.`);
                return;
            }

            const dropzone = ev.target.closest('.dropzone');
            if (dropzone) {
                dropzone.appendChild(draggedElement);
            } else {
                console.error('Drop target is not a valid dropzone.');
            }
        }

        document.getElementById('add-task-btn').addEventListener('click', () => {
            const taskInput = document.getElementById('new-task-input');
            const taskText = taskInput.value.trim();

            if (!taskText) {
                alert("Please enter a task.");
                return;
            }

            const newTaskId = `task-${Date.now()}`;

            const newTask = document.createElement('div');
            newTask.id = newTaskId;
            newTask.draggable = true;
            newTask.className =
                'flex justify-between items-center p-2 bg-white rounded-lg shadow-md my-2 cursor-pointer';
            newTask.ondragstart = (ev) => drag(ev);

            newTask.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-circle-dot text-blue-500"></i>
                    <p class="md:text-sm text-xs font-semibold flex-1">${taskText}</p>
                </div>
                <button onclick="this.parentElement.remove()"><i class="fa-solid fa-trash"></i></button>
            `;

            const todoDropzone = document.querySelector('.dropzone');
            todoDropzone.appendChild(newTask);

            taskInput.value = '';
        });
    </script>
@endsection
