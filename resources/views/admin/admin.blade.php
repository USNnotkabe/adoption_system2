<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Welcome to the Admin Dashboard</h1>

    <nav>
        <a href="{{ route('admin.pets.index') }}">Manage Pets</a>
        <a href="{{ route('admin.users.index') }}">Manage Users</a>
    </nav>
</body>

</html>
