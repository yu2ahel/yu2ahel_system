<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $firmBranches->name }}</p>
</div>

<!-- Working Hours Field -->
<div class="col-sm-12">
    {!! Form::label('working_hours', 'Working Hours:') !!}
    <p>{{ $firmBranches->working_hours }}</p>
</div>

<!-- Firm Id Field -->
<div class="col-sm-12">
    {!! Form::label('firm_id', 'Firm Id:') !!}
    <p>{{ $firmBranches->firm_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $firmBranches->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $firmBranches->updated_at }}</p>
</div>

