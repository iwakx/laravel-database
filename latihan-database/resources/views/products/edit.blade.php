<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Product</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e2e3e5;
            padding: 0;
            margin: 0;
        }

        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 2rem;
            animation: fadeIn 1s ease-in-out;
        }

        /* Container styling */
        .container {
            max-width: 650px;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            animation: slideIn 1s ease-out;
        }

        /* Flash messages */
        .alert {
            margin-top: 20px;
        }

        /* Animated form fields */
        .form-control {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 10px;
            padding: 15px;
            background-color: #f1f1f1;
        }

        .form-control:focus {
            background-color: #fff;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 500;
            color: #495057;
        }

        /* Updated button styles */
        .btn {
            transition: background-color 0.3s ease, transform 0.3s ease;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
            transform: translateY(-2px);
        }

        .btn-primary:active {
            background-color: #004085;
            border-color: #003366;
            transform: translateY(2px);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #4e555b;
            transform: translateY(-2px);
        }

        .form-control:hover {
            background-color: #e6f2ff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
        }

        /* Back to List button */
        .container a {
            margin-top: 20px;
            display: block;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
        }

        .container a:hover {
            background-color: #218838;
            text-decoration: none;
            transform: translateY(-5px);
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>

        <!-- Flash Message for success or error -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Form -->
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" required>{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}" required step="0.01">
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" name="stock" id="stock" value="{{ $product->stock }}" required step="1">
            </div>

            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
