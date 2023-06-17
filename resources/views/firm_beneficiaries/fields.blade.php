<!-- Firm Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firm_id', 'Firm Id:') !!}
    {!! Form::select('firm_id', $firmItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    {!! Form::select('branch_id', $firm_branchItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Beneficiary Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficiary_id', 'Beneficiary Id:') !!}
    {!! Form::select('beneficiary_id', $beneficiaryItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Supervisor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supervisor_id', 'Supervisor Id:') !!}
    {!! Form::select('supervisor_id', $service_providerItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Registration Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registration_date', 'Registration Date:') !!}
    {!! Form::text('registration_date', null, ['class' => 'form-control','id'=>'registration_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#registration_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>
