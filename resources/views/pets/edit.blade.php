<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Edit a Pet</h1>

    <form method="post" action="{{ route('pet.update', $pet)}}">
        @csrf
        @method('put')


        <div>
            <label>name</label>
            <input type="text" name="name" placeholder="Name" required value="{{ $pet->name }}">

            <label>type</label>
            <input type="text" name="type" placeholder="Type" required value="{{ $pet->type }}>" <label>age


            </label>
            <input type="number" name="age" placeholder="Age" required value="{{ $pet->age }}">

            <label>breed</label>
            <input type="text" name="breed" placeholder="Breed" required value="{{ $pet->breed }}">

            <label>color</label>
            <input type="text" name="color" placeholder="Color" required value="{{ $pet->color }}>">

            <label>description</label>
            <input type="text" name="description" placeholder="Description" required value="{{ $pet->description }}">">

            <label>birt date</label>
            <input type="date" name="birth_date" placeholder="Birth Date" required value="{{ $pet->birth_date }}">">

            <label>gender</label>
            <input type="text" name="gender" placeholder="gender" required value="{{ $pet->gender }}>">

            <label>allergies</label>
            <input type="text" name="allergies" placeholder="Allergies" required value="{{ $pet->allergies }}>">

            <label>disabilities</label>
            <input type="text" name="disabilities" placeholder="Dissabilities" required
                value="{{ $pet->disabilities }}>">

            <label>medication</label>
            <input type="text" name="medication" placeholder="Medication" required value="{{ $pet->medication }}">

            <label>food diet</label>
            <input type="text" name="food_diet" placeholder="Food Diet" required value="{{ $pet->food_diet }}">

            <div>
                <input type="submit" value="update">

            </div>

        </div>


    </form>


</body>

</html>
