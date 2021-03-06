@extends('layouts.app')
@section('content')
<div class="w-2/3 bg-gray-300 mx-auto p-6 shadow">
    <form action="/authors" method="POST" class="flex flex-col items-center">
        @csrf
        <h1>Add New Author</h1>
        <div class="pt-4">
            <input type="text" name="name" placeholder="full name" class="rounded px-4 py-2 w-64">
            @if($errors->has('name'))
                <p class="text-red-600">{{$errors->first('name')}}</p>
            @endif
        </div>
        <div class="pt-4">
            <input type="text" name="dob" placeholder="date of birth" class="rounded px-4 py-2 w-64">
            {{-- @if($errors->has('dob'))
                <p class="text-red-600">{{$errors->first('dob')}}</p>
                @endif --}}
                @error('dob')
                <p class="text-red-600">{{$message}}</p>
                @enderror

        </div>
        <div class="pt-4">
            <button class="bg-blue-400 text-white rounded py-2 px-4">Add New Author</button>
        </div>
    </form>
</div>
@endsection