@extends('dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 100px auto;
        background: #1f2937;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        margin-bottom: 20px;
        color: #7d8491;
        text-align: center;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #7d8491;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        background-color: #213757;
        border-radius: 4px;
        color: white;
        /* border: 1px solid #ced4da; */
        box-sizing: border-box;
    }
    .btn-success {
        background-color: #28a745;
        border: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-success:hover {
        background-color: #218838;
    }
</style>
<body>
    <div class="container">
        <h1>Edit category</h1>
        <form action="{{route('category.update',$categories->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">name</label>
                <input type="text" name="category_name" class="form-control" value="{{ $categories->category_name }}" required>
            </div>
            <div class="form-group">
                <label for="title">name</label>
                <input type="text" name="category_description" class="form-control" value="{{ $categories->category_description }}" required>
            </div>
            <div class="form-group">
                <label for="director">image</label>
                <input type="file" name="image" class="form-control"  required>
                <img style="padding-top: 10px; width: 100px; height: 100px;" src="{{ asset($categories->image) }}" alt="">
            </div>

    
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>
@endsection