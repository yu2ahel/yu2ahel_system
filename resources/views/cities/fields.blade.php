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

<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country Id:') !!}
    {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control custom-select']) !!}
</div>
