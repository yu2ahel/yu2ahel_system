<?php
use App\Models\ServiceProvider;
use App\User;
?>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('photo', ['class' => 'custom-file-input']) !!}
            {!! Form::label('photo', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Id Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_number', 'Id Number:') !!}
    {!! Form::number('id_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_type', 'Id Type:') !!}
    {!! Form::select('id_type', ServiceProvider::getAllStatus(), null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ServiceProvider::getAllGenders(), null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- About Field -->
<div class="form-group col-sm-6">
    {!! Form::label('about', 'About:') !!}
    {!! Form::text('about', null, ['class' => 'form-control']) !!}
</div>

<!-- User Type Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div> --}}

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

@php
    $disable = ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) ) ? 'none' :'block'
@endphp
<div class="form-group col-sm-6" style="display: {{ $disable }}">
    <!-- Firm Id Field -->
    <div >
        {!! Form::label('firm_id', 'Firm Id:') !!}
        {!! Form::select('firm_id', $firmItems, (Auth::user()->firm ? Auth::user()->firm->id : null), ['class' => 'form-control custom-select']) !!}
    </div>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('user_type_id', 'User Type:') !!}
    {!! Form::select('user_type_id', $userTypeItems, null, ['class' => 'form-control custom-select']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirm Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'password_confirmation:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

