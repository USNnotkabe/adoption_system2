<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create Pet</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
        @endif
    </div>

    <form method="post" action="{{ route('pet.store') }}">
        @csrf
        @method('post')


        <div>
            <label>name</label>
            <input type="text" name="name" placeholder="Name">

            <label>type</label>
            <input type="text" name="type" placeholder="Type">

            <label>age</label>
            <input type="number" name="age" placeholder="Age">

            <label>breed</label>
            <input type="text" name="breed" placeholder="Breed">

            <label>color</label>
            <input type="text" name="color" placeholder="Color">

            <label>description</label>
            <input type="text" name="description" placeholder="Description">

            <label>birt date</label>
            <input type="date" name="birth_date" placeholder="Birth Date">

            <label>gender</label>
            <input type="text" name="gender" placeholder="gender">

            <label>allergies</label>
            <input type="text" name="allergies" placeholder="Allergies">

            <label>disabilities</label>
            <input type="text" name="disabilities" placeholder="Dissabilities">

            <label>medication</label>
            <input type="text" name="medication" placeholder="Medication">

            <label>food diet</label>
            <input type="text" name="food_diet" placeholder="Food Diet">

            <div>
                <input type="submit" value="Save a Pet">

            </div>

        </div>



    </form>








</body>

</html>