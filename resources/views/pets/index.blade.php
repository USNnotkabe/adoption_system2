<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet lists</title>
</head>

<body>

    <h1>Pets</h1>
    @if(session('success'))
    <div style="background-color: #4CAF50; color: white; padding: 10px; margin: 10px 0; border-radius: 4px;">
        {{ session('success') }}
    </div>
    @endif





    <div>
        <a href="{{ route('pet.create') }}" class="create-btn">Add New Pet</a>
    </div>

    <div>
        <table border="1">

            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Age</th>
                <th>Breed</th>
                <th>Color</th>
                <th>Description</th>
                <th>Birth Date</th>
                <th>gender</th>
                <th>allergies</th>
                <th>dissabilities</th>
                <th>medication</th>
                <th>food diet</th>
                <th>edit</th>
                <th>delete</th>


            </tr>
            @foreach($pets as $pet)
            <tr>

                <td>{{ $pet->name }}</td>
                <td>{{ $pet->type }}</td>
                <td>{{ $pet->age }}</td>
                <td>{{ $pet->breed }}</td>
                <td>{{ $pet->color }}</td>
                <td>{{ $pet->description }}</td>
                <td>{{ $pet->birth_date }}</td>
                <td>{{ $pet->gender }}</td>
                <td>{{ $pet->allergies }}</td>
                <td>{{ $pet->disabilities }}</td>
                <td>{{ $pet->medication }}</td>
                <td>{{ $pet->food_diet }}</td>

                <td> <a href="{{ route('pet.edit', parameters: ['pet' => $pet]) }}">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('pet.destroy', ['pet' => $pet]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"
                            onclick="return confirm('Are you sure you want to delete this pet: {{ $pet->name }}?')">
                    </form>
                </td>

            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
