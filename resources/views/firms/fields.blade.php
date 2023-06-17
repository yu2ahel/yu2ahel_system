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

<!-- Ar About Firm Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ar_about_firm', 'Ar About Firm:') !!}
    {!! Form::textarea('ar_about_firm', null, ['class' => 'form-control']) !!}
</div>

<!-- En About Firm Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('en_about_firm', 'En About Firm:') !!}
    {!! Form::textarea('en_about_firm', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Of Establishment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_establishment', 'Date Of Establishment:') !!}
    {!! Form::text('date_of_establishment', null, ['class' => 'form-control','id'=>'date_of_establishment']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_establishment').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tax Register No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_register_no', 'Tax Register No:') !!}
    {!! Form::number('tax_register_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Commercial Register No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commercial_register_no', 'Commercial Register No:') !!}
    {!! Form::number('commercial_register_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Firm Classification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firm_classification', 'Firm Classification:') !!}
    {!! Form::text('firm_classification', null, ['class' => 'form-control']) !!}
</div>

<!-- Main Branch Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('main_branch_address', 'Main Branch Address:') !!}
    {!! Form::text('main_branch_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Main Branch City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('main_branch_city_id', 'Main Branch City Id:') !!}
    {!! Form::select('main_branch_city_id', $cityItems, null, ['class' => 'form-control custom-select']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>
