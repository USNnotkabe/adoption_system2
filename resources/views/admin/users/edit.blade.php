<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <h1>Edit User</h1>

    @if ($errors->any())
    <div style="color: red; margin: 10px 0;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('put')

        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Full Name" value="{{ $user->name }}" required>

            <label>Email</label>
            <input type="email" name="email" placeholder="Email Address" value="{{ $user->email }}" required>

            <label>Password (leave blank to keep current)</label>
            <input type="password" name="password" placeholder="New Password">

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm New Password">

            <label>Role</label>
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="user" {{ ($user->role ?? 'user') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>

            <div style="margin-top: 20px;">
                <input type="submit" value="Update User"
                    style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                <a href="{{ route('admin.users.index') }}"
                    style="margin-left: 10px; text-decoration: none; color: #6c757d;">Cancel</a>
            </div>
        </div>
    </form>
</body>

</html>
