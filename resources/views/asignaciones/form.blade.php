<div class="box box-info padding-1">
    <div class="box-body">
        <!-- UTILIZACION DEL FORM BLADE PARA MAYOR RAPIDEZ Y QUE ME PERMITE DE MANERA FACIL INTEGRARLOS PARA EL EDITAR Y CREAR -->
        <!-- FORMATO EJ FORM::TEXT(NAME, VALUE, [OTRAS COSAS])-->

        <div class="row">

            <div class="col-md-6 col-sm-12 col-xs-12 q-pa-xs">
                {{ Form::label('cooperante_id', 'Cooperante: ') }}
                {{ Form::select('cooperante_id', $cooperantes, $asignacione->cooperante_id, ['class' => 'form-control' . ($errors->has('cooperante_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('cooperante_id', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 q-pa-xs">
                {{ Form::label('proyecto_id', 'Proyectos: ') }}
                {{ Form::select('proyecto_id', $proyectos, $asignacione->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 q-pa-xs">
                    {{ Form::label('fecha_asignacion', 'Fecha de asignación: ') }}
                    {{ Form::date('fecha_asignacion', $asignacione->fecha_asignacion, ['class' => 'form-control' . ($errors->has('fecha_asignacion') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('fecha_asignacion', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>
            
            <div class="col-md-6 col-sm-12 col-xs-12 q-pa-xs">
                {{ Form::label('monto', 'Monto: ') }}
                {{ Form::text('monto', $asignacione->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : '')]) }}
                {!! $errors->first('monto', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>
        </div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>