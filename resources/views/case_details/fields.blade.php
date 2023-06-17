<!-- Beneficiary Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficiary_id', 'Beneficiary Id:') !!}
    {!! Form::select('beneficiary_id', $beneficiaryItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Last Diagnosis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_diagnosis', 'Last Diagnosis:') !!}
    {!! Form::text('last_diagnosis', null, ['class' => 'form-control']) !!}
</div>

<!-- Initial Diagnosis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('initial_diagnosis', 'Initial Diagnosis:') !!}
    {!! Form::text('initial_diagnosis', null, ['class' => 'form-control']) !!}
</div>

<!-- Family Social Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('family_social_status', 'Family Social Status:') !!}
    {!! Form::number('family_social_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Father Occupation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('father_occupation', 'Father Occupation:') !!}
    {!! Form::text('father_occupation', null, ['class' => 'form-control']) !!}
</div>

<!-- Mother Occupation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mother_occupation', 'Mother Occupation:') !!}
    {!! Form::text('mother_occupation', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>