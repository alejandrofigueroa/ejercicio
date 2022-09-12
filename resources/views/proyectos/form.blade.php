<div class="box box-info padding-1">
    <div class="box-body">
        <!-- UTILIZACION DEL FORM BLADE PARA MAYOR RAPIDEZ Y QUE ME PERMITE DE MANERA FACIL INTEGRARLOS PARA EL EDITAR Y CREAR -->
        <!-- FORMATO EJ FORM::TEXT(NAME, VALUE, [OTRAS COSAS])-->

        <div class="row">
        
            <div class="col-md-6 col-sm-12 col-xs-12 q-pa-xs">
                    {{ Form::label('nombre_proyecto') }}
                    {{ Form::text('nombre_proyecto', $proyecto->nombre_proyecto, ['class' => 'form-control' . ($errors->has('nombre_proyecto') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('nombre_proyecto', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 q-pa-xs">
                {{ Form::label('estado', 'Estado: ') }}
                {{ Form::select('estado', [0 => 'Habilitado', 1 => 'Deshabilitado'], $proyecto->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>
        
            <div class="col-md-12 col-sm-12 col-xs-12 q-pa-xs">
                {{ Form::label('descripcion_proyecto') }}
                {{ Form::textarea('descripcion_proyecto', $proyecto->descripcion_proyecto, ['class' => 'form-control' . ($errors->has('descripcion_proyecto') ? ' is-invalid' : '')]) }}
                {!! $errors->first('descripcion_proyecto', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>

        </div>
        
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>