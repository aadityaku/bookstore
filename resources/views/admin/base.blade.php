 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | BookStore - life bana lo</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"></head>
<body class="">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container">
            <a href="" class="navbar-brand">BookStore - Admin Panel</a>

            

            <ul class="navbar-nav">
               
                <li class="nav-item"><a href="" class="nav-link">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row g-2">
            <div class="col-3">
                <div class="list-group">
                    <a href="{{ route("admin.dashboard") }}" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="{{ route("product.index") }}" class="list-group-item list-group-item-action">Manage Products</a>
                    <a href="{{ route("order.index") }}" class="list-group-item list-group-item-action">Manage Orders</a>
                    <a href="{{ route("category.index") }}" class="list-group-item list-group-item-action">Manage Categories</a>
                    <a href="{{ route("address.index") }}" class="list-group-item list-group-item-action">Manage Addresses</a>
                    <a href="{{ route("coupon.index") }}" class="list-group-item list-group-item-action">Manage Coupons</a>
                    <a href="{{ route("user.index") }}" class="list-group-item list-group-item-action">Manage Users</a>
                </div>
            </div>
            <div class="col-9">
    @section('content')
        
    @show
            </div>
        </div>
    </div>
</body>
</html>
