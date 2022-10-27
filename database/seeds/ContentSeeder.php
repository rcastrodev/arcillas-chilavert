<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/cKYPy7COncektnPluWpkEPpMMbq1kZwfe4ftXzQA.png',
                'content_1' => 'images/home/3BvO8YFlcIkYj9IiY8Ot5lDqcNTW9rI24Fwhm5jz.png',
                'content_2' => 'Arcillas Chilavert',
            ]);
        }

        Content::create([
            'section_id' => 2,
            'image'     => 'images/home/dH2a0rbR4Az6byvGwn74CYViIHNW26HEq0gMLtiJ.png',
            'content_1' => 'MÁS DE 45 <br> AÑOS DE EXPERIENCIA EN EL MERCADO',
            'content_2' => '<p>Partiendo de Arcillas naturales, producimos pastas confiables para garantizarle una fabricación segura.</p>
            <p>Contamos con profesionales especializados en todos los sectores para dar cobertura a las necesidades de nuestros clientes y poder así ofrecer una garantía de servicio profesional.</p>',
        ]);
        
        /** Fin home page */

        /** Empresa  */
       for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id'    => 3,
                'order'         => 'AA',
                'image'         => 'images/company/g8JBOwsjXR3V5HnqMlDH4Hq7LXl1EBdy0OLtf6sp.png',
            ]);
        }

        /** Descripción de empresa */
        Content::create([
            'section_id' => 4,
            'image'     => 'images/company/Imagen_345.png',
            'content_1' => 'NUESTRA EMPRESA',
            'content_2' => '<p>Contamos con profesionales especializados en todos los sectores para dar cobertura a las necesidades de nuestros clientes y poder así ofrecer una garantía de servicio profesional.</p>
            <p>El reconocimiento de nuestros clientes, profesionales de la construcción, ferreterías, distribuidores y sectores del retail, se ha logrado estableciendo una relación equitativa y cuantitativa entre la calidad de nuestros productos, al contar con nuestra marca propia de primera calidad reconocida internacionalmente, un precio competitivo, agilidad en nuestro servicio y atención especializada.</p>
            <p>La atención de los clientes se realiza a través de un equipo de vendedores zonales, muchos de los cuales residen en la franja donde desarrollan sus actividades. Además contamos con una red de distribuidores propios desde hace 15 años a una vasta zona de nuestro país, manteniendo siempre un sólido prestigio, vinculado al respeto por sus clientes y proveedores, y al alto grado de calidad de su servicio, y de los productos que fabrica y representa.</p>',
 
        ]);
    }
}

   
