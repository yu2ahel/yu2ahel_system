<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $userType->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $userType->description }}</p>
</div>

<!-- Is Dashboard Accesable Field -->
<div class="col-sm-12">
    {!! Form::label('is_dashboard_accesable', 'Is Dashboard Accesable:') !!}
    <p>{{ $userType->is_dashboard_accesable }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $userType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $userType->updated_at }}</p>
</div>

