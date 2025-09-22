<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Admin Dashboard</h1>

    <div style="display: flex; gap: 20px; margin: 20px 0;">
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px;">
            <h3>Total Pets</h3>
            <p style="font-size: 2em; margin: 0;">{{ $totalPets }}</p>
        </div>

        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px;">
            <h3>Available Pets</h3>
            <p style="font-size: 2em; margin: 0;">{{ $availablePets }}</p>
        </div>

        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px;">
            <h3>Adopted Pets</h3>
            <p style="font-size: 2em; margin: 0;">{{ $adoptedPets }}</p>
        </div>

        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px;">
            <h3>Total Users</h3>
            <p style="font-size: 2em; margin: 0;">{{ $totalUsers }}</p>
        </div>
    </div>
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px;">
        <h3>Pending Adoptions</h3>
        <p style="font-size: 2em; margin: 0;">{{ $pendingAdoptions }}</p>
    </div>

    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.pets.index') }}"
            style="background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;">
            Manage Pets
        </a>
    </div>


    <div>
        <a href="{{ route('dashboard') }}"
            style="background: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;">
            Go Back to Dashboard
        </a>
    </div>

</body>

</html>