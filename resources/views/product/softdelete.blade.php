@extends('dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 30px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }
        
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #495057;
        }
    </style>
</head>
<body>
    {{-- @include('includes.header') --}}

    <h1> Show All Products "Soft Delete" </h1>
    
    <table>
        <thead>
            <tr>
                <th>product id</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr> 
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_description }}</td>
                <td>{{ $product->product_price }}</td>
                <td><img src="{{ asset($product->image) }}" style="height: 60px; width:auto;" alt="Post Image"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection
