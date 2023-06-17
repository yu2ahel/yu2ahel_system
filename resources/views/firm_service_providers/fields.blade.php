<!-- Job Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_title', 'Job Title:') !!}
    {!! Form::text('job_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Basic Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('basic_salary', 'Basic Salary:') !!}
    {!! Form::number('basic_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Default Services Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default_services_percentage', 'Default Services Percentage:') !!}
    {!! Form::number('default_services_percentage', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Of Registration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_registration', 'Date Of Registration:') !!}
    {!! Form::text('date_of_registration', null, ['class' => 'form-control','id'=>'date_of_registration']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_registration').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Firm Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firm_id', 'Firm Id:') !!}
    {!! Form::select('firm_id', $firmItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('service_provider_id', 'Service Provider:') !!}
    {!! Form::select('service_provider_id', $providorItems, null, ['class' => 'form-control custom-select']) !!}
</div>
