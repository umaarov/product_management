<!DOCTYPE html>
<html>

<head>
    <title>Product Management System</title>

    @vite('resources/css/app.css')
</head>

<body>
    <nav>
        <a href="{{ route('categories.index') }}">Categories</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('clients.index') }}">Clients</a>
        <a href="{{ route('suppliers.index') }}">Suppliers</a>
        <a href="{{ route('sales.index') }}">Sale</a>
        <a href="{{ route('returns.index') }}">Returns</a>
        <a href="{{ route('analytics.index') }}">Analytics</a>
    </nav>

    <div>
        @yield('content')
    </div>
</body>

</html>
