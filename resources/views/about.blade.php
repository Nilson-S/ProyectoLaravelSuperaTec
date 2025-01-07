@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sobre Nosotros</h1>
        <h4 class="text-center mb-4">SUPERATEC</h4>
        <p class="text-center mb-5">Superación a través de la tecnología</p>

        <div class="row">
            <!-- Quiénes Somos -->
            <div class="col-md-4 mb-4">
                <div class="p-4 text-center" style="background-color: rgba(0, 123, 255, 0.1); border-radius: 8px;">
                    <h2 class="text-primary mb-3">Quiénes Somos</h2>
                    <p class="lead">
                        Somos una Organización de Desarrollo Social educativa, flexible, que ofrece oportunidades de superación, mediante la formación tecnológica, humana, laboral y de emprendimiento, en alianza con instituciones afines.
                    </p>
                </div>
            </div>

            <!-- Misión -->
            <div class="col-md-4 mb-4">
                <div class="p-4 text-center" style="background-color: rgba(40, 167, 69, 0.1); border-radius: 8px;">
                    <h3 class="text-success mt-4 mb-3">Misión</h3>
                    <p class="lead">
                        Fortalecer capacidades de las personas, utilizando la tecnología y el conocimiento, como herramientas para su formación integral, la empleabilidad y el emprendimiento.
                    </p>
                </div>
            </div>

            <!-- Visión -->
            <div class="col-md-4 mb-5">
                <div class="p-4 text-center" style="background-color: rgba(23, 162, 184, 0.1); border-radius: 8px;">
                    <h3 class="text-info mt-4 mb-3">Visión</h3>
                    <p class="lead">
                        Ser una Organización de Desarrollo Social innovadora y reconocida internacionalmente por su excelencia en el cumplimiento de su Misión.
                    </p>
                </div>
            </div>
        </div>

        <!-- Historia de Superatec -->
        <div class="col-12 mt-5">
            <div class="p-5" style="background-color: #007BFF; color: white;">
                <h2 class="text-center mb-4">Historia de Superatec</h2>
                
                <!-- Imagen de Herman De Kesel alineada a la derecha -->
                <div class="row">
                    <div class="col-md-9">
                        <p class="text-justify">
                            Herman De Kesel (†), nativo de Bélgica, fue un ejecutivo activo en negocios internacionales de Europa, América latina y Asia. Llegó a Venezuela en 1970 como Gerente General de Operaciones de la compañía International Paper, la cual se estaba asociando con Tablopan de Venezuela para iniciar un proyecto en conjunto.
                        </p>
                        <p class="text-justify">
                            Hasta 1985 Herman De Kesel ocupó distintos cargos de gerencia en el sector privado y en 1986 migra a los Estados Unidos de América.
                        </p>
                        <p class="text-justify">
                            Durante su estancia en el Sillicon Valley (zona sur del área de la Bahía de San Francisco, en el norte de California), Herman De Kesel observó algunas iniciativas de centros de informática, que estaban comenzando en los Estados Unidos y pensó que eran excelentes iniciativas para alcanzar las ideas que tenía en mente.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('images/herman.png') }}" class="img-fluid float-end" style="max-width: 100%; height: auto; border-radius: 8px;" alt="Herman De Kesel">
                    </div>
                </div>
            </div>
        </div>

        <!-- Nuestros Valores -->
        <div class="col-12">
            <h2 class="text-center text-dark mt-4 mb-4">Nuestros Valores</h2>
            <div class="row">
                <!-- Superación -->
                <div class="col-md-3 mb-3">
                    <div class="p-4 text-center" style="background-color: #007BFF; color: white; border-radius: 8px;">
                        <h4>Superación</h4>
                        <p>
                            Utilizamos la educación y el trabajo, para el crecimiento humano, ocupacional y económico, como proyecto de vida, haciéndonos más aptos y mejores personas.
                        </p>
                    </div>
                </div>

                <!-- Solidaridad -->
                <div class="col-md-3 mb-3">
                    <div class="p-4 text-center" style="background-color: #FFC107; color: black; border-radius: 8px;">
                        <h4>Solidaridad</h4>
                        <p>
                            Tenemos disposición permanente de colaborar con el bien común, acompañando con respeto, en palabra y acción al que necesita de nuestro apoyo, creando conciencia social haciéndonos más aptos y mejores personas.
                        </p>
                    </div>
                </div>

                <!-- Responsabilidad -->
                <div class="col-md-3 mb-3">
                    <div class="p-4 text-center" style="background-color: #28A745; color: white; border-radius: 8px;">
                        <h4>Responsabilidad</h4>
                        <p>
                            Cumplimos con eficiencia lo que programamos, demostrando iniciativa y liderazgo, afrontando positivamente el cambio, y transformando los problemas en oportunidades de crecimiento.
                        </p>
                    </div>
                </div>

                <!-- Integridad -->
                <div class="col-md-3 mb-3">
                    <div class="p-4 text-center" style="background-color: #800000; color: white; border-radius: 8px;">
                        <h4>Integridad</h4>
                        <p>
                            Actuamos siempre con honradez, demostrando ser auténticos, sinceros y respetuosos de nosotros mismos y de los demás.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
