@php
    use App\User;
@endphp

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Percentage Discount For Group Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('percentage_discount_for_group_service', 'Percentage Discount For Group Service:') !!}
    {!! Form::number('percentage_discount_for_group_service', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Schedulable Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_schedulable', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_schedulable', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_schedulable', 'Is Schedulable', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Is Plannable Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_plannable', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_plannable', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_plannable', 'Is Plannable', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Is Attendable Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_attendable', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_attendable', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_attendable', 'Is Attendable', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Firm Id Field -->
@php
    $disable = ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) ) ? 'none' :'block'
@endphp
<div class="form-group col-sm-6" style="display: {{ $disable }}">
    {!! Form::label('firm_id', 'Firm Id:') !!}
    {!! Form::select('firm_id', $firmItems, (Auth::user()->firm ? Auth::user()->firm->id : null), ['class' => 'form-control custom-select']) !!}
</div>
