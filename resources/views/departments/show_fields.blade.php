<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $departments->name }}</p>
</div>

<!-- Brief Field -->
<div class="col-sm-12">
    {!! Form::label('brief', 'Brief:') !!}
    <p>{{ $departments->brief }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $departments->description }}</p>
</div>

<!-- Photo Field -->
<div class="col-sm-12">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{{ $departments->photo }}</p>
</div>

<!-- Firm Id Field -->
<div class="col-sm-12">
    {!! Form::label('firm_id', 'Firm Id:') !!}
    <p>{{ $departments->firm_id }}</p>
</div>

<!-- Supervisor Id Field -->
<div class="col-sm-12">
    {!! Form::label('supervisor_id', 'Supervisor Id:') !!}
    <p>{{ $departments->supervisor_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $departments->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $departments->updated_at }}</p>
</div>

