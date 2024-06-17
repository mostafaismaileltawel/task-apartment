<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use App\Models\Apartment;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    protected $model = Apartment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Client-ID ' . env('UNSPLASH_ACCESS_APP_KEY'),
        ])->get('https://api.unsplash.com/photos/random', [
            'query' => 'apartment',
            'orientation' => 'landscape',
        ]);
        // Check for a successful response and get the image URL
        if ($response->successful()) {
            $image_url = $response->json()['urls']['regular'];
        } else {
            // Fallback image URL in case the API call fails
            $image_url = 'https://via.placeholder.com/640x480.png?text=No+Image';
        }

        return [
            'city' => $this->faker->city,
            'street' => $this->faker->streetName,
            'houseNumber' => $this->faker->buildingNumber,
            'salary' => $this->faker->randomFloat(2, 50000, 150000),
            'image' =>$image_url 
        ];
    }
}
