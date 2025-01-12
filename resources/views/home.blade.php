@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <!-- Sección de bienvenida -->
        <div class="text-center mb-5">
            <h1 data-aos="fade-down">Bienvenido a SuperaTec</h1>
            <p class="lead" data-aos="fade-up">Ofrecemos cursos en áreas como tecnología, emprendimiento y formación humana.
            </p>
        </div>

        <!-- Sección de Servicios Corporativos y Superatec Escuela -->
        <div class="row mb-5">
            <div class="col-md-6" data-aos="fade-right">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-center">Servicios Corporativos</h4>
                        <p class="card-text">
                            En la búsqueda de potenciar las competencias de los colaboradores, los programas
                            in company o a la medida ofrecen soluciones formativas, que desarrollan conocimientos
                            específicos adaptados a las necesidades de las empresas. En Superatec, adaptamos nuestro
                            portafolio de cursos y talleres a las necesidades de su empresa o diseñamos un currículo
                            completamente nuevo que busca potenciar el desempeño del trabajador y por consiguiente,
                            de la empresa.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-left">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-center">Superatec Escuela</h4>
                        <p class="card-text">
                            Esta iniciativa tiene por objeto mejorar las destrezas tecnológicas de los docentes de las
                            instituciones públicas y privadas del país, brindando elementos orientadores que permitan
                            su aplicación a los alumnos que atienden. La formación básicamente comprende estrategias
                            educativas innovadoras, recursos del aprendizaje y toda capacitación con base en las
                            necesidades de adiestramiento docente.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Áreas de Formación -->
        <div class="row mb-5 text-center">
            @php
                $areas = [
                    [
                        'icon' => 'fas fa-laptop-code',
                        'title' => 'Tecnología',
                        'text' =>
                            'Representa la meta de alfabetización tecnológica  en nuestras comunidades con el uso de dispositivos electrónicos para procesos comunicacionales, laborales y de participación consciente como ciudadano digital, generando “Competencias Digitales” al servicio de nuestros participantes.',
                    ],
                    [
                        'icon' => 'fas fa-users',
                        'title' => 'Humana',
                        'text' =>
                            'Promovemos el crecimiento personal y el desarrollo de las habilidades sociales en el participante, a través de la reorientación de actitudes y conductas basadas en  actividades experienciales y auto exploratorias, que permitan su efectivo desempeño en los diversos ámbitos de su vida.',
                    ],
                    [
                        'icon' => 'fas fa-briefcase',
                        'title' => 'Laboral',
                        'text' =>
                            'La Formación Laboral representa una  oportunidad para el desarrollo personal y profesional de los participantes, que persigue generar competencias y habilidades como un espacio de preparación para el mundo laboral y la gestión de un empleo digno',
                    ],
                    [
                        'icon' => 'fas fa-lightbulb',
                        'title' => 'Emprendimiento',
                        'text' =>
                            'Promovemos conocimientos,  herramientas y habilidades personales y profesionales en pro de los procesos financieros. Destacando actitudes como la creatividad, innovación, y proactividad, por medio del manejo de diversos instrumentos que fortalezcan su idea de negocio.',
                    ],
                    [
                        'icon' => 'fas fa-graduation-cap',
                        'title' => 'Habilidades para el Aprendizaje',
                        'text' =>
                            'En ocasiones  se requiere complementar y reforzar las competencias de los estudiantes, esto ha hecho surgir esta área como respuesta a los procesos propios del análisis, el desarrollo del pensamiento lógico matemático, la toma de decisiones y el conocimiento de los idiomas.',
                    ],
                ];
            @endphp

            @foreach ($areas as $area)
                <div class="col-md-4 mb-4" data-aos="zoom-in">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="{{ $area['icon'] }} fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">{{ $area['title'] }}</h5>
                            <p class="card-text">{{ $area['text'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Sección de Competencias -->
        <div class="row mb-5">
            @php
                $competencias = [
                    [
                        'icon' => 'fas fa-tools',
                        'title' => 'Educación en y Para el Trabajo',
                        'text' =>
                            'Los participantes adquieren herramientas y habilidades para optimizar su situación personal a través de la maximización de su potencial laboral.',
                    ],
                    [
                        'icon' => 'fas fa-users-cog',
                        'title' => 'Desarrollo Personal y Social',
                        'text' =>
                            'Los participantes valoran la importancia de recibir una educación que integra los conocimientos técnicos y el conocimiento que fortalece el desarrollo humano.',
                    ],
                    [
                        'icon' => 'fas fa-handshake',
                        'title' => 'Ciudadanía y Conciencia Social',
                        'text' =>
                            'Los participantes demuestran sus deberes y derechos comprometiéndose al desempeño colaborativo y cooperativo acatando las normas de convivencias en sus diferentes entornos.',
                    ],
                    [
                        'icon' => 'fas fa-comments',
                        'title' => 'Comunicación Asertiva y Efectiva',
                        'text' =>
                            'Los participantes utilizan principios que fortalecen la convivencia utilizando la comunicación de manera asertiva y efectiva personal y digitalmente.',
                    ],
                    [
                        'icon' => 'fas fa-laptop',
                        'title' => 'Herramientas Digitales al servicio de la Investigación',
                        'text' =>
                            'Los participantes obtienen y publican información y gestionan procesos de investigación a través del uso de las TIC y sus Herramientas Digitales, respetando la propiedad intelectual y su marco legal.',
                    ],
                    [
                        'icon' => 'fas fa-brain',
                        'title' => 'Pensamiento Crítico y Computacional',
                        'text' =>
                            'Los participantes se reconocen como pensadores críticos de libre pensamiento y de opciones diferentes ante problemáticas diversas, apoyando en sus conocimientos de procesos y entornos computacionales.',
                    ],
                    [
                        'icon' => 'fas fa-lightbulb',
                        'title' => 'Emprendimiento',
                        'text' =>
                            'Los participantes comprenden el emprendimiento como una necesidad de poner en marcha cualquier proyecto o actividad que busca satisfacer una utilidad que puede ser social y/o personal, desarrollando habilidades para ampliar sus capacidades y aptitudes.',
                    ],
                    [
                        'icon' => 'fas fa-chalkboard-teacher',
                        'title' => 'Herramientas de la Informática Educativa',
                        'text' =>
                            'Los participantes comprenden el diseño e implementación de las Tecnologías de información y Comunicación en los procesos educacionales en sus distintos ámbitos, tanto administrativo como en el proceso enseñanza-aprendizaje.',
                    ],
                ];
            @endphp

            @foreach ($competencias as $index => $competencia)
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="number-box me-3">{{ $index + 1 }}</div>
                                <i class="{{ $competencia['icon'] }} fa-2x text-primary"></i>
                            </div>
                            <h6 class="card-title">{{ $competencia['title'] }}</h6>
                            <p class="card-text">{{ $competencia['text'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Sección final -->
        <div class="text-center" data-aos="fade-up">
            <h1 class="mb-2">En Superatec Siempre Decimos</h1>
            <h2 class="text-primary">Superarse es la Clave</h2>
        </div>
    </div>

    <!-- AOS Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
@endsection
