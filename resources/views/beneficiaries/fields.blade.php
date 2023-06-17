<?php
use App\Models\Beneficiary;
use App\User;


?>
<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!--  Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', Beneficiary::getAllTypes(), null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Date Of Birth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    {!! Form::text('date_of_birth', null, ['class' => 'form-control','id'=>'date_of_birth']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_birth').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Transferred From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transferred_from', 'Transferred From:') !!}
    {!! Form::text('transferred_from', null, ['class' => 'form-control']) !!}
</div>

<!-- About Field -->
<div class="form-group col-sm-6">
    {!! Form::label('about', 'About:') !!}
    {!! Form::text('about', null, ['class' => 'form-control']) !!}
</div>

<!-- Degree Field -->
<div class="form-group col-sm-6">
    {!! Form::label('degree', 'Degree:') !!}
    {!! Form::number('degree', null, ['class' => 'form-control']) !!}
</div>

<!-- Occupation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('occupation', 'Occupation:') !!}
    {!! Form::text('occupation', null, ['class' => 'form-control']) !!}
</div>
@php
    $disable = ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER ) && !empty(Auth::user()->firm) ) ? 'none' :'block'
@endphp
<div class="form-group col-sm-6" style="display: {{ $disable }}">
    <!-- Firm Id Field -->
    <div >
        {!! Form::label('firm_id', 'Firm Id:') !!}
        {!! Form::select('firm_id', $firmItems, (Auth::user()->firm ? Auth::user()->firm->id : null), ['class' => 'form-control custom-select']) !!}
    </div>
</div>


<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    {!! Form::select('branch_id', $firm_branchItems, null, ['class' => 'form-control custom-select']) !!}
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
