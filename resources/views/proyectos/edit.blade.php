@extends('layout')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar proyecto: {{ $proyecto->nombre }}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('proyectos.update', $proyecto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('proyectos.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection