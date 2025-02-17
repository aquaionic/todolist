@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center justify-center">
            ➕ Tambah Tugas
        </a>

        <ul class="mt-4 space-y-2">
            @foreach ($tasks as $task)
                <li class="flex items-center justify-between border-b py-2 bg-gray-100 p-3 rounded-lg">
                    <div>
                        <strong class="text-lg">{{ $task->title }}</strong>
                        <p class="text-sm text-gray-600">{{ $task->description }}</p>
                        <span class="text-xs {{ $task->is_completed ? 'text-green-500' : 'text-red-500' }}">
                            {{ $task->is_completed ? 'Selesai ✅' : 'Belum Selesai ❌' }}
                        </span>
                    </div>

                    <!-- Dropdown Button -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="bg-gray-200 hover:bg-gray-300 text-gray-600 px-3 py-1 rounded-full">
                            ⋮
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg overflow-hidden z-10">
                            <a href="{{ route('tasks.edit', $task) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">✏️ Edit</a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="block w-full text-left px-4 py-2 text-red-500 hover:bg-gray-100">🗑️ Hapus</button>
                            </form>

                            @if (!$task->is_completed)
                                <form action="{{ route('tasks.complete', $task) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-green-500 hover:bg-gray-100">✅ Tandai Selesai</button>
                                </form>
                            @else
                                <form action="{{ route('tasks.uncomplete', $task) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-yellow-500 hover:bg-gray-100">🔄 Belum Selesai</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection