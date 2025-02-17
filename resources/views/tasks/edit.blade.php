@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Tugas</h2>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="block font-semibold">Judul Tugas</label>
                <input type="text" id="title" name="title" class="border p-2 w-full rounded" value="{{ $task->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="block font-semibold">Deskripsi</label>
                <textarea id="description" name="description" class="border p-2 w-full rounded">{{ $task->description }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Perbarui</button>
            <a href="{{ route('tasks.index') }}" class="text-gray-500">Batal</a>
        </form>
    </div>
@endsection