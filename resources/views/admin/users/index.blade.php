<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Lists</title>
</head>

<body>
    <nav>
        <a href="{{ route('admin.dashboard') }}" class="nav-link">← Back to Dashboard</a>
    </nav>

    <h1>User Management List</h1>

    @if(session('success'))
    <div style="background-color: #4CAF50; color: white; padding: 10px; margin: 10px 0; border-radius: 4px;">
        {{ session('success') }}
    </div>
    @endif

    <div>
        <table border="1" style="width: 100%; border-collapse: collapse;">
            <tr>
                <th style="padding: 10px; text-align: left;">Name</th>
                <th style="padding: 10px; text-align: left;">Email</th>
                <th style="padding: 10px; text-align: left;">Joined Date</th>
                <th style="padding: 10px; text-align: left;">Email Verified</th>
            </tr>

            @foreach($users as $user)
            <tr>
                <td style="padding: 10px;">{{ $user->name }}</td>
                <td style="padding: 10px;">{{ $user->email }}</td>
                <td style="padding: 10px;">{{ $user->created_at->format('M d, Y') }}</td>
                <td style="padding: 10px;">
                    @if($user->email_verified_at)
                    <span style="color: green;">✓ Verified</span>
                    @else
                    <span style="color: red;">✗ Not Verified</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Debug: Show user count -->
    <p style="margin-top: 20px; color: #666;">
        Total users: {{ count($users) }}
    </p>
</body>

</html>
