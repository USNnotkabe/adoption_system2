<!-- <?php
// public/api.php - Place this file in your public directory

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Include Laravel's autoloader and bootstrap
require_once __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Boot the application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$app->boot();

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Get the request method and endpoint
$method = $_SERVER['REQUEST_METHOD'];
$request = isset($_GET['endpoint']) ? $_GET['endpoint'] : '';

// Get JSON input for POST/PUT requests
$input = json_decode(file_get_contents('php://input'), true);

try {
    // Route handling
    switch($request) {
        case 'pets':
            if ($method == 'GET') {
                getPets();
            } elseif ($method == 'POST') {
                addPet($input);
            }
            break;

        case 'pet':
            if ($method == 'GET' && isset($_GET['id'])) {
                getPetById($_GET['id']);
            } elseif ($method == 'PUT' && isset($_GET['id'])) {
                updatePet($_GET['id'], $input);
            } elseif ($method == 'DELETE' && isset($_GET['id'])) {
                deletePet($_GET['id']);
            }
            break;

        case 'applications':
            if ($method == 'GET') {
                getApplications();
            } elseif ($method == 'POST') {
                submitApplication($input);
            }
            break;

        case 'users':
            if ($method == 'POST') {
                registerUser($input);
            }
            break;

        case 'login':
            if ($method == 'POST') {
                loginUser($input);
            }
            break;

        default:
            http_response_code(404);
            echo json_encode(['error' => 'Endpoint not found']);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
}

// Function to get all pets
function getPets() {
    try {
        $pets = App\Models\Pet::orderBy('created_at', 'desc')->get();

        // Add additional fields for the mobile app
        $petsWithImages = $pets->map(function($pet) {
            return [
                'id' => $pet->id,
                'name' => $pet->name,
                'type' => $pet->type,
                'breed' => $pet->breed,
                'age' => $pet->age,
                'color' => $pet->color,
                'description' => $pet->description,
                'birth_date' => $pet->birth_date,
                'gender' => $pet->gender,
                'allergies' => $pet->allergies,
                'disabilities' => $pet->disabilities,
                'medication' => $pet->medication,
                'food_diet' => $pet->food_diet,
                'created_at' => $pet->created_at,
                'updated_at' => $pet->updated_at,
                // Add image URL based on pet type and breed
                'image_url' => getPetImageUrl($pet->type, $pet->breed),
                'location' => 'Main Adoption Center', // You can customize this
                'distance' => rand(1, 10) . '.' . rand(0, 9) . ' miles away',
                'rating' => number_format(rand(45, 50) / 10, 1),
                'is_liked' => false // Default value
            ];
        });

        echo json_encode([
            'success' => true,
            'data' => $petsWithImages,
            'count' => $pets->count()
        ]);
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to get a specific pet by ID
function getPetById($id) {
    try {
        $pet = App\Models\Pet::find($id);

        if ($pet) {
            $petData = [
                'id' => $pet->id,
                'name' => $pet->name,
                'type' => $pet->type,
                'breed' => $pet->breed,
                'age' => $pet->age,
                'color' => $pet->color,
                'description' => $pet->description,
                'birth_date' => $pet->birth_date,
                'gender' => $pet->gender,
                'allergies' => $pet->allergies,
                'disabilities' => $pet->disabilities,
                'medication' => $pet->medication,
                'food_diet' => $pet->food_diet,
                'created_at' => $pet->created_at,
                'updated_at' => $pet->updated_at,
                'image_url' => getPetImageUrl($pet->type, $pet->breed),
                'location' => 'Main Adoption Center',
                'distance' => rand(1, 10) . '.' . rand(0, 9) . ' miles away',
                'rating' => number_format(rand(45, 50) / 10, 1)
            ];

            echo json_encode(['success' => true, 'data' => $petData]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Pet not found']);
        }
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to add a new pet
function addPet($data) {
    try {
        $pet = App\Models\Pet::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'breed' => $data['breed'],
            'age' => $data['age'],
            'color' => $data['color'] ?? '',
            'description' => $data['description'],
            'birth_date' => $data['birth_date'] ?? null,
            'gender' => $data['gender'],
            'allergies' => $data['allergies'] ?? null,
            'disabilities' => $data['disabilities'] ?? null,
            'medication' => $data['medication'] ?? null,
            'food_diet' => $data['food_diet'] ?? null
        ]);

        echo json_encode(['success' => true, 'message' => 'Pet added successfully', 'pet_id' => $pet->id]);
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to update pet information
function updatePet($id, $data) {
    try {
        $pet = App\Models\Pet::find($id);

        if ($pet) {
            $pet->update([
                'name' => $data['name'] ?? $pet->name,
                'type' => $data['type'] ?? $pet->type,
                'breed' => $data['breed'] ?? $pet->breed,
                'age' => $data['age'] ?? $pet->age,
                'color' => $data['color'] ?? $pet->color,
                'description' => $data['description'] ?? $pet->description,
                'gender' => $data['gender'] ?? $pet->gender,
                'allergies' => $data['allergies'] ?? $pet->allergies,
                'disabilities' => $data['disabilities'] ?? $pet->disabilities,
                'medication' => $data['medication'] ?? $pet->medication,
                'food_diet' => $data['food_diet'] ?? $pet->food_diet
            ]);

            echo json_encode(['success' => true, 'message' => 'Pet updated successfully']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Pet not found']);
        }
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to delete a pet
function deletePet($id) {
    try {
        $pet = App\Models\Pet::find($id);

        if ($pet) {
            $pet->delete();
            echo json_encode(['success' => true, 'message' => 'Pet deleted successfully']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Pet not found']);
        }
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to get applications (you'll need to create Application model)
function getApplications() {
    try {
        // Assuming you have an Application model
        // $applications = App\Models\Application::with(['pet', 'user'])->orderBy('created_at', 'desc')->get();

        // For now, return empty array
        echo json_encode(['success' => true, 'data' => []]);
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to submit adoption application
function submitApplication($data) {
    try {
        // You'll need to create Application model and migration
        echo json_encode(['success' => true, 'message' => 'Application submitted successfully']);
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to register user
function registerUser($data) {
    try {
        // You'll need to create User model if not exists
        echo json_encode(['success' => true, 'message' => 'User registered successfully']);
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to login user
function loginUser($data) {
    try {
        // You'll need to implement user authentication
        echo json_encode(['success' => true, 'message' => 'Login successful']);
    } catch(Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}

// Function to get appropriate image URL for pets
function getPetImageUrl($type, $breed) {
    $dogImages = [
        'Golden Retriever' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?w=400&h=300&fit=crop',
        'Labrador Mix' => 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400&h=300&fit=crop',
        'German Shepherd' => 'https://images.unsplash.com/photo-1589941013453-ec89f33b5e95?w=400&h=300&fit=crop',
        'Beagle' => 'https://images.unsplash.com/photo-1505628346881-b72b27e84993?w=400&h=300&fit=crop',
        'Border Collie' => 'https://images.unsplash.com/photo-1551717743-49959800b1f6?w=400&h=300&fit=crop',
        'Bulldog' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400&h=300&fit=crop',
        'Pit Bull Mix' => 'https://images.unsplash.com/photo-1554456854-55a089fd4cb2?w=400&h=300&fit=crop',
        'Cocker Spaniel' => 'https://images.unsplash.com/photo-1518717758536-85ae29035b6d?w=400&h=300&fit=crop',
        'Husky' => 'https://images.unsplash.com/photo-1605568427561-40dd23c2acea?w=400&h=300&fit=crop',
        'Shih Tzu' => 'https://images.unsplash.com/photo-1583336663277-620dc1996580?w=400&h=300&fit=crop'
    ];

    $catImages = [
        'Maine Coon' => 'https://images.unsplash.com/photo-1574144611937-0df059b5ef3e?w=400&h=300&fit=crop',
        'Persian' => 'https://images.unsplash.com/photo-1533738363-b7f9aef128ce?w=400&h=300&fit=crop',
        'Domestic Shorthair' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=400&h=300&fit=crop',
        'Siamese' => 'https://images.unsplash.com/photo-1513245543132-31f507417b26?w=400&h=300&fit=crop',
        'Bengal' => 'https://images.unsplash.com/photo-1592194996308-7b43878e84a6?w=400&h=300&fit=crop',
        'Ragdoll' => 'https://images.unsplash.com/photo-1571566882372-1598d88abd90?w=400&h=300&fit=crop',
        'Russian Blue' => 'https://images.unsplash.com/photo-1596854407944-bf87f6fdd49e?w=400&h=300&fit=crop',
        'Calico' => 'https://images.unsplash.com/photo-1548681528-6a5c45b66b42?w=400&h=300&fit=crop',
        'Tuxedo' => 'https://images.unsplash.com/photo-1472491235688-bdc81a63246e?w=400&h=300&fit=crop',
        'British Shorthair' => 'https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?w=400&h=300&fit=crop'
    ];

    if ($type === 'Dog' && isset($dogImages[$breed])) {
        return $dogImages[$breed];
    } elseif ($type === 'Cat' && isset($catImages[$breed])) {
        return $catImages[$breed];
    }

    // Default images
    return $type === 'Dog' ?
        'https://images.unsplash.com/photo-1552053831-71594a27632d?w=400&h=300&fit=crop' :
        'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=400&h=300&fit=crop';
}
?> -->