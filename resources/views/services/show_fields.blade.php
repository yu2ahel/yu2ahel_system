<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $services->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $services->description }}</p>
</div>

<!-- Percentage Discount For Group Service Field -->
<div class="col-sm-12">
    {!! Form::label('percentage_discount_for_group_service', 'Percentage Discount For Group Service:') !!}
    <p>{{ $services->percentage_discount_for_group_service }}</p>
</div>

<!-- Is Schedulable Field -->
<div class="col-sm-12">
    {!! Form::label('is_schedulable', 'Is Schedulable:') !!}
    <p>{{ $services->is_schedulable }}</p>
</div>

<!-- Is Plannable Field -->
<div class="col-sm-12">
    {!! Form::label('is_plannable', 'Is Plannable:') !!}
    <p>{{ $services->is_plannable }}</p>
</div>

<!-- Is Attendable Field -->
<div class="col-sm-12">
    {!! Form::label('is_attendable', 'Is Attendable:') !!}
    <p>{{ $services->is_attendable }}</p>
</div>

<!-- Firm Id Field -->
<div class="col-sm-12">
    {!! Form::label('firm_id', 'Firm Id:') !!}
    <p>{{ $services->firm_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $services->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $services->updated_at }}</p>
</div>

