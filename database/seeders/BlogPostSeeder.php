<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_posts')->insert([
            [
                'title' => 'Fortalecimiento Integral de Escuelas Públicas y Liceos Productivos en los Estados Apure y Bolívar',
                'slug' => 'fortalecimiento-integral-escuelas-publicas',
                'content' => 'Metas del Proyecto
                1.200 docentes formados en habilidades productivas, del área socio-emocional y asesoría técnica agrícola.
                22 instituciones educativas: 12 Liceos y 10 talleres de educación laboral, en los estados Apure y Bolívar.
                Entrega de equipos y suministros agrícolas y de especialidad ocupacional para población especial totalizando en 22 kits institucionales y 1.540 kits individuales para docentes y estudiantes.
                Este proyecto se trabajó en consorcio con EducAccion.',
                'image' => 'proyecto1', // Nombre de la imagen
                'published_at' => Carbon::now(),
                'author_id' => 1, // ID del autor (ajústalo según tu base de datos)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Proyecto de Electrónica Aplicada y Emprendimiento',
                'slug' => 'proyecto-electronica-aplicada-emprendimiento',
                'content' => 'En 2.023 atendimos 96 jóvenes en Caracas y 126 en Felisa Urrutia en el estado Aragua, la meta es 300 jóvenes para 2.024.

                Fortalecimiento en habilidades STEAM, a través de la incorporación y manejo de una plataforma de código abierto, que permita el aprendizaje de un oficio mediante la electrónica aplicada.

                El proyecto atiende a jóvenes entre 16 a 25 años de las comunidades populares adyacentes a los Centros de Formación de Superatec.

                Metas del Proyecto
                300 jóvenes capacitados y certificados en electrónica aplicada
                40 proyectos con potencial de éxito en vinculación laboral o de emprendimiento.',
                'image' => 'proyecto2', // Nombre de la imagen
                'published_at' => Carbon::now(),
                'author_id' => 1, // ID del autor (ajústalo según tu base de datos)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
