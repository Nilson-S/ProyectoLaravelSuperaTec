@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Contáctanos</h1>
        
        <!-- Sección de contacto general -->
        <div class="row">
            <div class="col-md-6">
                <p class="lead text-center mb-4">Puedes contactarnos a través de nuestros siguientes medios:</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light border-0 mb-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope fa-2x text-primary me-3"></i>
                            <div>
                                <strong>📧 Correo:</strong> <a href="mailto:Info@Superatec.org.ve" class="text-decoration-none text-primary">Info@Superatec.org.ve</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item bg-light border-0 mb-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone fa-2x text-warning me-3"></i>
                            <div>
                                <strong>📞 Teléfonos:</strong> 212-2356866 / 237-1040 / 234-7808 / 235-8266
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item bg-light border-0 mb-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt fa-2x text-success me-3"></i>
                            <div>
                                <strong>🌍 Ubicación:</strong> Oficina Central, Calle los Laboratorios, Edif. Torre Beta piso 4 oficina 402, Miranda, Venezuela
                                <br>
                                <a href="https://maps.app.goo.gl/a3Nbt7aRosSzwWfk7" target="_blank" class="btn btn-link p-0 text-decoration-none text-info">Ver en Google Maps</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item bg-light border-0">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock fa-2x text-danger me-3"></i>
                            <div>
                                <strong>⏰ Hora de atención:</strong> Lunes a Viernes: 8:00 am - 5:00 pm
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- Sección de WhatsApp -->
            <div class="col-md-6">
                <p class="lead text-center mb-4">También puedes enviarnos un mensaje por WhatsApp:</p>
                <a href="https://api.whatsapp.com/send/?phone=584126346921&text&type=phone_number&app_absent=0" class="btn btn-success btn-lg w-100" target="_blank">
                    Enviar mensaje por WhatsApp
                </a>
            </div>
        </div>
        
        <!-- Sección de estilo para mejorar presentación -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="text-center">
                    <p class="lead text-muted">Nos encantaría ayudarte. ¡No dudes en contactarnos!</p>
                </div>
            </div>
        </div>
    </div>
@endsection
