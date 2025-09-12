<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet</title>
</head>

<body>
    <h1>Edit Pet</h1>

    @if ($errors->any())
    <div style="color: red; margin: 10px 0;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ route('admin.pets.update', $pet) }}">
        @csrf
        @method('put')

        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ $pet->name }}" required>

            <label>Type</label>
            <input type="text" name="type" placeholder="Type" value="{{ $pet->type }}" required>

            <label>Age</label>
            <input type="number" name="age" placeholder="Age" value="{{ $pet->age }}" required>

            <label>Breed</label>
            <input type="text" name="breed" placeholder="Breed" value="{{ $pet->breed }}">

            <label>Color</label>
            <input type="text" name="color" placeholder="Color" value="{{ $pet->color }}">

            <label>Description</label>
            <textarea name="description" placeholder="Description">{{ $pet->description }}</textarea>

            <label>Birth Date</label>
            <input type="date" name="birth_date" placeholder="Birth Date" value="{{ $pet->birth_date }}">

            <label>Gender</label>
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="male" {{ $pet->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $pet->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="unknown" {{ $pet->gender == 'unknown' ? 'selected' : '' }}>Unknown</option>
            </select>

            <label>Allergies</label>
            <input type="text" name="allergies" placeholder="Allergies" value="{{ $pet->allergies }}">

            <label>Disabilities</label>
            <input type="text" name="disabilities" placeholder="Disabilities" value="{{ $pet->disabilities }}">

            <label>Medication</label>
            <input type="text" name="medication" placeholder="Medication" value="{{ $pet->medication }}">

            <label>Food Diet</label>
            <input type="text" name="food_diet" placeholder="Food Diet" value="{{ $pet->food_diet }}">

            <div>
                <input type="submit" value="Update Pet">
                <a href="{{ route('admin.pets.index') }}">Cancel</a>
            </div>
        </div>
    </form>
</body>

</html>
