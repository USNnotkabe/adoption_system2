@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Pets</h1>

    @if($pets->count() > 0)
    <div class="row">
        @foreach($pets as $pet)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if($pet->image)
                <img src="{{ asset('storage/' . $pet->image) }}" class="card-img-top" alt="{{ $pet->name }}">
                @else
                <img src="{{ asset('images/default-pet.png') }}" class="card-img-top" alt="No image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $pet->name }}</h5>
                    <p class="card-text">
                        Breed: {{ $pet->breed }} <br>
                        Age: {{ $pet->age }} years <br>
                        Status: {{ ucfirst($pet->adoption_status) }}
                    </p>
                    <a href="#" class="btn btn-primary">Adopt Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>No pets available right now.</p>
    @endif
</div>
@endsection