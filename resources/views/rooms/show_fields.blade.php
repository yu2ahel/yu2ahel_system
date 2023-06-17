<!-- Room Name Field -->
<div class="col-sm-12">
    {!! Form::label('room_name', 'Room Name:') !!}
    <p>{{ $rooms->room_name }}</p>
</div>

<!-- Room Capacity Field -->
<div class="col-sm-12">
    {!! Form::label('room_capacity', 'Room Capacity:') !!}
    <p>{{ $rooms->room_capacity }}</p>
</div>

<!-- Branch Id Field -->
<div class="col-sm-12">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    <p>{{ $rooms->branch_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $rooms->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $rooms->updated_at }}</p>
</div>

