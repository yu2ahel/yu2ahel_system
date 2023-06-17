<!-- Room Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_name', 'Room Name:') !!}
    {!! Form::text('room_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Capacity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_capacity', 'Room Capacity:') !!}
    {!! Form::number('room_capacity', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    {!! Form::select('branch_id', $firm_branchItems, null, ['class' => 'form-control custom-select']) !!}
</div>
