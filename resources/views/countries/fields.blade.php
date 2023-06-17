<!-- En Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('en_name', 'En Name:') !!}
    {!! Form::text('en_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Ar Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ar_name', 'Ar Name:') !!}
    {!! Form::text('ar_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Zone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_zone', 'Time Zone:') !!}
    {!! Form::number('time_zone', null, ['class' => 'form-control']) !!}
</div>