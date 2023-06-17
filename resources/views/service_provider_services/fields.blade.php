@php
use App\User;
@endphp

<!-- Firm Id Field -->
@php
    $disable = ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) ) ? 'none' :'block'
@endphp
<div class="form-group col-sm-6" style="display: {{ $disable }}">
    {!! Form::label('firm_id', 'Firm Id:') !!}
    {!! Form::select('firm_id', $firmItems,(Auth::user()->firm ? Auth::user()->firm->id : null), ['class' => 'form-control custom-select']) !!}
</div>





<!-- Service Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    {!! Form::select('service_type_id', $service_typeItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Service Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_provider_id', 'Service Provider Id:') !!}
    {!! Form::select('service_provider_id', $service_providerItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Service Provider Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_provider_percentage', 'Service Provider Percentage:') !!}
    {!! Form::number('service_provider_percentage', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Regular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_regular', 'Price Regular:') !!}
    {!! Form::number('price_regular', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Urgent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_urgent', 'Price Urgent:') !!}
    {!! Form::number('price_urgent', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_discount', 'Price Discount:') !!}
    {!! Form::number('price_discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Free Accepted Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_free_accepted', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_free_accepted', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_free_accepted', 'Is Free Accepted', ['class' => 'form-check-label']) !!}
    </div>
</div>
