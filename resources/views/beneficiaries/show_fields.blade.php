<!-- Full Name Field -->
<div class="col-sm-12">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $beneficiaries->full_name }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $beneficiaries->type }}</p>
</div>

<!-- Date Of Birth Field -->
<div class="col-sm-12">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    <p>{{ $beneficiaries->date_of_birth }}</p>
</div>

<!-- Transferred From Field -->
<div class="col-sm-12">
    {!! Form::label('transferred_from', 'Transferred From:') !!}
    <p>{{ $beneficiaries->transferred_from }}</p>
</div>

<!-- About Field -->
<div class="col-sm-12">
    {!! Form::label('about', 'About:') !!}
    <p>{{ $beneficiaries->about }}</p>
</div>

<!-- Degree Field -->
<div class="col-sm-12">
    {!! Form::label('degree', 'Degree:') !!}
    <p>{{ $beneficiaries->degree }}</p>
</div>

<!-- Occupation Field -->
<div class="col-sm-12">
    {!! Form::label('occupation', 'Occupation:') !!}
    <p>{{ $beneficiaries->occupation }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $beneficiaries->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $beneficiaries->updated_at }}</p>
</div>

