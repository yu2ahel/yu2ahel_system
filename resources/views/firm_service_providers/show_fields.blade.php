<!-- Job Title Field -->
<div class="col-sm-12">
    {!! Form::label('job_title', 'Job Title:') !!}
    <p>{{ $firmServiceProviders->job_title }}</p>
</div>

<!-- Basic Salary Field -->
<div class="col-sm-12">
    {!! Form::label('basic_salary', 'Basic Salary:') !!}
    <p>{{ $firmServiceProviders->basic_salary }}</p>
</div>

<!-- Default Services Percentage Field -->
<div class="col-sm-12">
    {!! Form::label('default_services_percentage', 'Default Services Percentage:') !!}
    <p>{{ $firmServiceProviders->default_services_percentage }}</p>
</div>

<!-- Date Of Registration Field -->
<div class="col-sm-12">
    {!! Form::label('date_of_registration', 'Date Of Registration:') !!}
    <p>{{ $firmServiceProviders->date_of_registration }}</p>
</div>

<!-- Firm Id Field -->
<div class="col-sm-12">
    {!! Form::label('firm_id', 'Firm Id:') !!}
    <p>{{ $firmServiceProviders->firm_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $firmServiceProviders->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $firmServiceProviders->updated_at }}</p>
</div>

