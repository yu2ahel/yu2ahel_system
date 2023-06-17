<!-- Beneficiary Id Field -->
<div class="col-sm-12">
    {!! Form::label('beneficiary_id', 'Beneficiary Id:') !!}
    <p>{{ $caseDetails->beneficiary_id }}</p>
</div>

<!-- Last Diagnosis Field -->
<div class="col-sm-12">
    {!! Form::label('last_diagnosis', 'Last Diagnosis:') !!}
    <p>{{ $caseDetails->last_diagnosis }}</p>
</div>

<!-- Initial Diagnosis Field -->
<div class="col-sm-12">
    {!! Form::label('initial_diagnosis', 'Initial Diagnosis:') !!}
    <p>{{ $caseDetails->initial_diagnosis }}</p>
</div>

<!-- Family Social Status Field -->
<div class="col-sm-12">
    {!! Form::label('family_social_status', 'Family Social Status:') !!}
    <p>{{ $caseDetails->family_social_status }}</p>
</div>

<!-- Father Occupation Field -->
<div class="col-sm-12">
    {!! Form::label('father_occupation', 'Father Occupation:') !!}
    <p>{{ $caseDetails->father_occupation }}</p>
</div>

<!-- Mother Occupation Field -->
<div class="col-sm-12">
    {!! Form::label('mother_occupation', 'Mother Occupation:') !!}
    <p>{{ $caseDetails->mother_occupation }}</p>
</div>

<!-- Escorter Name Field -->
<div class="col-sm-12">
    {!! Form::label('escorter_name', 'Escorter Name:') !!}
    <p>{{ $caseDetails->escorter_name }}</p>
</div>

<!-- Notes Field -->
<div class="col-sm-12">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{{ $caseDetails->notes }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $caseDetails->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $caseDetails->updated_at }}</p>
</div>

