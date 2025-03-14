<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Modern Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product List</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); /* Gradient from blue to purple */
            margin: 0;
            padding: 0;
            color: #fff; /* Ensuring the text is readable against the background */
        }

        h1 {
            color: #fff;
            text-align: center;
            font-weight: 600;
            margin-top: 50px;
            animation: fadeIn 1s ease-in-out;
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 10px;
            font-size: 1rem;
            background-color: #e3f2fd;
            color: #1e88e5;
        }

        .btn {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .table {
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table th, table td {
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid #ddd;
        }

        table tr {
            transition: transform 0.3s ease;
        }

        table tr:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #4db6ac; /* Soft teal */
            color: #fff;
        }

        .table td {
            background-color: #ffffff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f1f1f1;
        }

        /* Button styles */
        .btn-primary {
            background-color: #1e90ff; /* Sky blue */
            border-color: #1e90ff;
            color: #fff;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #006db3;
            border-color: #005f8f;
        }

        .btn-info {
            background-color: #32cd32; /* Lime green */
            border-color: #32cd32;
            color: #fff;
            font-weight: 600;
        }

        .btn-info:hover {
            background-color: #28a745;
            border-color: #218838;
        }

        .btn-warning {
            background-color: #ffeb3b; /* Yellow */
            border-color: #ffeb3b;
            color: #212529;
            font-weight: 600;
        }

        .btn-warning:hover {
            background-color: #fbc02d;
            border-color: #f9a825;
        }

        .btn-danger {
            background-color: #f44336; /* Soft red */
            border-color: #f44336;
            color: #fff;
            font-weight: 600;
        }

        .btn-danger:hover {
            background-color: #c62828;
            border-color: #b71c1c;
        }

        .btn-primary, .btn-info, .btn-warning, .btn-danger {
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 0.875rem;
        }

        /* Back to List button styles */
        .btn-back {
            background-color: #00796b; /* Teal */
            border-color: #00796b;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #004d40;
            border-color: #004d40;
            transform: scale(1.05);
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-5">Daftar Produk</h1>

        <!-- Flash Message for success -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Create Product Button -->
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Buat produk baru</a>

        <!-- Product Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ number_format($product->stock) }}</td>
                        <td>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
