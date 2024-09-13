@extends('layouts.app')
@vite('resources/css/categories/category.css')
@section('content')
    <h1>Create Category</h1>
    <form action="{{ route('categories.store', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
        <button type="submit">Update</button>
    </form>
@endsection
