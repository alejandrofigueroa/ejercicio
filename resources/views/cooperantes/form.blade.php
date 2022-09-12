<div class="box box-info padding-1">
    <div class="box-body">
        <!-- UTILIZACION DEL FORM BLADE PARA MAYOR RAPIDEZ Y QUE ME PERMITE DE MANERA FACIL INTEGRARLOS PARA EL EDITAR Y CREAR -->
        <!-- FORMATO EJ FORM::TEXT(NAME, VALUE, [OTRAS COSAS])-->
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 q-pa-xs">
                    {{ Form::label('nombre_cooperante') }}
                    {{ Form::text('nombre_cooperante', $cooperante->nombre_cooperante, ['class' => 'form-control' . ($errors->has('nombre_cooperante') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('nombre_cooperante', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>
            
            <div class="col-md-6 col-sm-12 col-xs-12 q-pa-xs">
                {{ Form::label('email_cooperante') }}
                {{ Form::text('email_cooperante', $cooperante->email_cooperante, ['class' => 'form-control' . ($errors->has('email_cooperante') ? ' is-invalid' : '')]) }}
                {!! $errors->first('email_cooperante', '<div class="invalid-feedback">:message</p></div>') !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('direccion_cooperante') }}
            {{ Form::textarea('direccion_cooperante', $cooperante->direccion_cooperante, ['class' => 'form-control' . ($errors->has('direccion_cooperante') ? ' is-invalid' : '')]) }}
            {!! $errors->first('direccion_cooperante', '<div class="invalid-feedback">:message</p></div>') !!}
        </div>
        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>