<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $serviceTypes->name }}</p>
</div>

<!-- Average Time In Minutes Field -->
<div class="col-sm-12">
    {!! Form::label('average_time_in_minutes', 'Average Time In Minutes:') !!}
    <p>{{ $serviceTypes->average_time_in_minutes }}</p>
</div>

<!-- Default Price Regular Field -->
<div class="col-sm-12">
    {!! Form::label('default_price_regular', 'Default Price Regular:') !!}
    <p>{{ $serviceTypes->default_price_regular }}</p>
</div>

<!-- Default Price Urgent Field -->
<div class="col-sm-12">
    {!! Form::label('default_price_urgent', 'Default Price Urgent:') !!}
    <p>{{ $serviceTypes->default_price_urgent }}</p>
</div>

<!-- Default Price Discount Field -->
<div class="col-sm-12">
    {!! Form::label('default_price_discount', 'Default Price Discount:') !!}
    <p>{{ $serviceTypes->default_price_discount }}</p>
</div>

<!-- Is Freeable Field -->
<div class="col-sm-12">
    {!! Form::label('is_freeable', 'Is Freeable:') !!}
    <p>{{ $serviceTypes->is_freeable }}</p>
</div>

<!-- Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('service_id', 'Service Id:') !!}
    <p>{{ $serviceTypes->service_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $serviceTypes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $serviceTypes->updated_at }}</p>
</div>

