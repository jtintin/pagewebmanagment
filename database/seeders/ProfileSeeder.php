<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create a profile
        Profile::create([
            'name' => 'Mi Empresa',
            'slogan' => 'Calidad y Servicio',
            'description' => 'Somos una empresa dedicada a brindar los mejores servicios a nuestros clientes.',
            'logo' => 'https://via.placeholder.com/150',
            'address' => 'Calle Falsa 123, Ciudad, País',
            'phone' => '+1234567890',
            'email' => 'contacto@laraveltech.com',
            'website' => 'https://laraveltech.com',
            'facebook' => 'https://facebook.com/laraveltech',
            'instagram' => 'https://instagram.com/laraveltech', 
            'linkedin' => 'https://linkedin.com/company/laraveltech',
            'twitter' => 'https://twitter.com/laraveltech',
            'mission' => 'Brindar servicios de calidad que superen las expectativas de nuestros clientes.',
            'vision' => 'Ser la empresa líder en el sector, reconocida por nuestra',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'map_embed' => '<iframe src="https://maps.app.goo.gl/K9jpoZgJ9QDQQWUk7" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);                            
    }
}
