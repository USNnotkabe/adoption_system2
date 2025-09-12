<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;
use Carbon\Carbon;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        // Dogs data
        $dogs = [
            [
                'name' => 'Buddy',
                'type' => 'Dog',
                'age' => 3,
                'breed' => 'Golden Retriever',
                'color' => 'Golden',
                'description' => 'Friendly and energetic dog, great with kids and families. Loves playing fetch and going on walks.',
                'birth_date' => Carbon::now()->subYears(3)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Premium dry food, grain-free preferred'
            ],
            [
                'name' => 'Luna',
                'type' => 'Dog',
                'age' => 2,
                'breed' => 'Labrador Mix',
                'color' => 'Black',
                'description' => 'Sweet and gentle rescue dog. Very loyal and loves cuddles. Good with other pets.',
                'birth_date' => Carbon::now()->subYears(2)->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Regular dog food, sensitive stomach formula'
            ],
            [
                'name' => 'Max',
                'type' => 'Dog',
                'age' => 4,
                'breed' => 'German Shepherd',
                'color' => 'Brown and Black',
                'description' => 'Intelligent and protective. Well-trained and obedient. Perfect for active families.',
                'birth_date' => Carbon::now()->subYears(4)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'High-protein dog food'
            ],
            [
                'name' => 'Bella',
                'type' => 'Dog',
                'age' => 1,
                'breed' => 'Beagle',
                'color' => 'Tri-color',
                'description' => 'Young and playful pup. Very social and loves meeting new people and dogs.',
                'birth_date' => Carbon::now()->subYear()->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Puppy formula dry food'
            ],
            [
                'name' => 'Charlie',
                'type' => 'Dog',
                'age' => 5,
                'breed' => 'Border Collie',
                'color' => 'Black and White',
                'description' => 'Highly intelligent and active. Needs mental stimulation and exercise. Great for experienced dog owners.',
                'birth_date' => Carbon::now()->subYears(5)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Active dog formula with omega-3'
            ],
            [
                'name' => 'Daisy',
                'type' => 'Dog',
                'age' => 6,
                'breed' => 'Bulldog',
                'color' => 'White and Brown',
                'description' => 'Calm and gentle senior dog. Loves lazy afternoons and short walks. Great companion for quiet homes.',
                'birth_date' => Carbon::now()->subYears(6)->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => null,
                'medication' => 'Joint supplements',
                'food_diet' => 'Senior dog food, low-fat formula'
            ],
            [
                'name' => 'Rocky',
                'type' => 'Dog',
                'age' => 3,
                'breed' => 'Pit Bull Mix',
                'color' => 'Gray',
                'description' => 'Strong and loyal. Very affectionate with his family. Needs experienced owner and proper socialization.',
                'birth_date' => Carbon::now()->subYears(3)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'High-quality protein-rich food'
            ],
            [
                'name' => 'Molly',
                'type' => 'Dog',
                'age' => 4,
                'breed' => 'Cocker Spaniel',
                'color' => 'Golden',
                'description' => 'Sweet-natured and gentle. Great with children and elderly. Loves being groomed and pampered.',
                'birth_date' => Carbon::now()->subYears(4)->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Standard adult dog food'
            ],
            [
                'name' => 'Zeus',
                'type' => 'Dog',
                'age' => 2,
                'breed' => 'Husky',
                'color' => 'Gray and White',
                'description' => 'Energetic and adventurous. Loves cold weather and long hikes. Perfect for active outdoor enthusiasts.',
                'birth_date' => Carbon::now()->subYears(2)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'High-energy dog food with fish oil'
            ],
            [
                'name' => 'Sophie',
                'type' => 'Dog',
                'age' => 7,
                'breed' => 'Shih Tzu',
                'color' => 'White and Brown',
                'description' => 'Calm senior dog who loves attention and gentle pets. Perfect lap dog for quiet households.',
                'birth_date' => Carbon::now()->subYears(7)->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => 'Mild arthritis',
                'medication' => 'Arthritis medication',
                'food_diet' => 'Senior small-breed formula'
            ]
        ];

        // Cats data
        $cats = [
            [
                'name' => 'Whiskers',
                'type' => 'Cat',
                'age' => 3,
                'breed' => 'Maine Coon',
                'color' => 'Orange Tabby',
                'description' => 'Large, fluffy, and friendly cat. Very social and loves being around people. Great with other cats.',
                'birth_date' => Carbon::now()->subYears(3)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Premium cat food, wet and dry mix'
            ],
            [
                'name' => 'Princess',
                'type' => 'Cat',
                'age' => 2,
                'breed' => 'Persian',
                'color' => 'White',
                'description' => 'Elegant and calm. Loves being brushed and pampered. Perfect indoor companion for quiet homes.',
                'birth_date' => Carbon::now()->subYears(2)->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'High-quality wet food for long-haired cats'
            ],
            [
                'name' => 'Shadow',
                'type' => 'Cat',
                'age' => 4,
                'breed' => 'Domestic Shorthair',
                'color' => 'Black',
                'description' => 'Independent but affectionate. Great hunter and very intelligent. Good for experienced cat owners.',
                'birth_date' => Carbon::now()->subYears(4)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Standard adult cat food'
            ],
            [
                'name' => 'Mimi',
                'type' => 'Cat',
                'age' => 1,
                'breed' => 'Siamese',
                'color' => 'Cream and Brown',
                'description' => 'Very vocal and social young cat. Loves attention and playing with toys. Great personality.',
                'birth_date' => Carbon::now()->subYear()->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Kitten formula transitioning to adult'
            ],
            [
                'name' => 'Tiger',
                'type' => 'Cat',
                'age' => 5,
                'breed' => 'Bengal',
                'color' => 'Brown Spotted',
                'description' => 'Active and playful with beautiful markings. Very intelligent and loves interactive toys.',
                'birth_date' => Carbon::now()->subYears(5)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'High-protein cat food'
            ],
            [
                'name' => 'Mittens',
                'type' => 'Cat',
                'age' => 6,
                'breed' => 'Ragdoll',
                'color' => 'Blue and White',
                'description' => 'Very docile and relaxed. Loves being held and cuddled. Perfect for families with children.',
                'birth_date' => Carbon::now()->subYears(6)->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Senior cat formula with joint support'
            ],
            [
                'name' => 'Smokey',
                'type' => 'Cat',
                'age' => 3,
                'breed' => 'Russian Blue',
                'color' => 'Gray',
                'description' => 'Quiet and gentle. A bit shy at first but very loving once comfortable. Prefers calm environments.',
                'birth_date' => Carbon::now()->subYears(3)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Sensitive stomach formula'
            ],
            [
                'name' => 'Luna',
                'type' => 'Cat',
                'age' => 4,
                'breed' => 'Calico',
                'color' => 'Orange, Black, and White',
                'description' => 'Beautiful tri-colored female with a feisty personality. Very playful and loves climbing.',
                'birth_date' => Carbon::now()->subYears(4)->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Indoor cat formula' 
            ],
            [
                'name' => 'Oreo',
                'type' => 'Cat',
                'age' => 2,
                'breed' => 'Tuxedo',
                'color' => 'Black and White',
                'description' => 'Playful and energetic with distinctive markings. Very social and loves interacting with humans.',
                'birth_date' => Carbon::now()->subYears(2)->format('Y-m-d'),
                'gender' => 'male',
                'allergies' => null,
                'disabilities' => null,
                'medication' => null,
                'food_diet' => 'Young adult cat food'
            ],
            [
                'name' => 'Chloe',
                'type' => 'Cat',
                'age' => 7,
                'breed' => 'British Shorthair',
                'color' => 'Gray',
                'description' => 'Mature and dignified senior cat. Very well-behaved and loves quiet companionship.',
                'birth_date' => Carbon::now()->subYears(7)->format('Y-m-d'),
                'gender' => 'female',
                'allergies' => null,
                'disabilities' => 'Early stage kidney disease',
                'medication' => 'Kidney support supplements',
                'food_diet' => 'Prescription kidney diet'
            ]
        ];

        // Insert all dogs
        foreach ($dogs as $dog) {
            Pet::create($dog);
        }

        // Insert all cats
        foreach ($cats as $cat) {
            Pet::create($cat);
        }
    }
}
