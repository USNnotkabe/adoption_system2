<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pet->name }} - Pet Details</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        line-height: 1.6;
    }

    .pet-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        max-width: 600px;
    }

    .pet-header {
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .pet-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin: 20px 0;
    }

    .info-item {
        padding: 10px;
        background: white;
        border-radius: 4px;
    }

    .info-label {
        font-weight: bold;
        color: #333;
    }

    .status-available {
        color: #28a745;
        font-weight: bold;
    }

    .status-pending {
        color: #ffc107;
        font-weight: bold;
    }

    .status-adopted {
        color: #dc3545;
        font-weight: bold;
    }

    .btn {
        background: #007bff;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        margin-right: 10px;
    }

    .btn-secondary {
        background: #6c757d;
    }
    </style>
</head>

<body>
    <div class="pet-card">
        <div class="pet-header">
            <h1>{{ $pet->name }}</h1>
            <p><strong>Status:</strong>
                <span class="status-{{ $pet->adoption_status }}">
                    {{ ucfirst($pet->adoption_status ?? 'available') }}
                </span>
            </p>
        </div>

        <div class="pet-info">
            <div class="info-item">
                <div class="info-label">Type:</div>
                <div>{{ $pet->type }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Age:</div>
                <div>{{ $pet->age }} years old</div>
            </div>

            <div class="info-item">
                <div class="info-label">Breed:</div>
                <div>{{ $pet->breed ?? 'Mixed' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Color:</div>
                <div>{{ $pet->color ?? 'Not specified' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Gender:</div>
                <div>{{ ucfirst($pet->gender ?? 'unknown') }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Birth Date:</div>
                <div>{{ $pet->birth_date ?? 'Not specified' }}</div>
            </div>
        </div>

        @if($pet->description)
        <div class="info-item" style="grid-column: span 2; margin: 10px 0;">
            <div class="info-label">Description:</div>
            <div>{{ $pet->description }}</div>
        </div>
        @endif

        <div class="pet-info">
            @if($pet->allergies)
            <div class="info-item">
                <div class="info-label">Allergies:</div>
                <div>{{ $pet->allergies }}</div>
            </div>
            @endif

            @if($pet->disabilities)
            <div class="info-item">
                <div class="info-label">Disabilities:</div>
                <div>{{ $pet->disabilities }}</div>
            </div>
            @endif

            @if($pet->medication)
            <div class="info-item">
                <div class="info-label">Medication:</div>
                <div>{{ $pet->medication }}</div>
            </div>
            @endif

            @if($pet->food_diet)
            <div class="info-item">
                <div class="info-label">Special Diet:</div>
                <div>{{ $pet->food_diet }}</div>
            </div>
            @endif
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('pets.index') }}" class="btn btn-secondary">← Back to Pets</a>

            @if($pet->adoption_status === 'available')
            <a href="#" class="btn">Adopt {{ $pet->name }}</a>
            @endif
        </div>
    </div>
</body>

</html>
