<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Average Time In Minutes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('average_time_in_minutes', 'Average Time In Minutes:') !!}
    {!! Form::number('average_time_in_minutes', null, ['class' => 'form-control']) !!}
</div>

<!-- Default Price Regular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default_price_regular', 'Default Price Regular:') !!}
    {!! Form::number('default_price_regular', null, ['class' => 'form-control']) !!}
</div>

<!-- Default Price Urgent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default_price_urgent', 'Default Price Urgent:') !!}
    {!! Form::number('default_price_urgent', null, ['class' => 'form-control']) !!}
</div>

<!-- Default Price Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default_price_discount', 'Default Price Discount:') !!}
    {!! Form::number('default_price_discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Freeable Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_freeable', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_freeable', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_freeable', 'Is Freeable', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::select('service_id', $serviceItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department Id:') !!}
    {!! Form::select('department_id', $departmentItems, null, ['class' => 'form-control custom-select']) !!}
</div>
