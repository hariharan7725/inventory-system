<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

@include('loader')

<div class="container">
    @yield('content')
</div>

<script>
    window.onload = () => {
        document.getElementById('loader').style.display = 'none';
    };
</script>

</body>
</html>
