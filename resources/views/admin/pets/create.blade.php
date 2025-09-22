    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Pet</title>
    </head>

    <body>

        <h1>Create Pet</h1>

        @if ($errors->any())
        <div style="color: red; margin: 10px 0;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('admin.pets.store') }}">
            @csrf

            <div>
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>

                <label>Type</label>
                <input type="text" name="type" placeholder="Type" value="{{ old('type') }}" required>

                <label>Age</label>
                <input type="number" name="age" placeholder="Age" value="{{ old('age') }}" required>

                <label>Breed</label>
                <input type="text" name="breed" placeholder="Breed" value="{{ old('breed') }}">

                <label>Color</label>
                <input type="text" name="color" placeholder="Color" value="{{ old('color') }}">

                <label>Description</label>
                <textarea name="description" placeholder="Description">{{ old('description') }}</textarea>

                <label>Birth Date</label>
                <input type="date" name="birth_date" placeholder="Birth Date" value="{{ old('birth_date') }}">

                <label>Gender</label>
                <select name="gender">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="unknown" {{ old('gender') == 'unknown' ? 'selected' : '' }}>Unknown</option>
                </select>

                <label>Allergies</label>
                <input type="text" name="allergies" placeholder="Allergies" value="{{ old('allergies') }}">

                <label>Disabilities</label>
                <input type="text" name="disabilities" placeholder="Disabilities" value="{{ old('disabilities') }}">

                <label>Medication</label>
                <input type="text" name="medication" placeholder="Medication" value="{{ old('medication') }}">

                <label>Food Diet</label>
                <input type="text" name="food_diet" placeholder="Food Diet" value="{{ old('food_diet') }}">
                <label>Adoption Status</label>
                <div>
                    <input type="submit" value="Save Pet">
                    <a href="{{ route('admin.pets.index') }}">Cancel</a>
                </div>

            </div>
        </form>
    </body>

    </html>
