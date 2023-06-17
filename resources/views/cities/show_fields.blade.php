<!-- En Name Field -->
<div class="col-sm-12">
    {!! Form::label('en_name', 'En Name:') !!}
    <p>{{ $cities->en_name }}</p>
</div>

<!-- Ar Name Field -->
<div class="col-sm-12">
    {!! Form::label('ar_name', 'Ar Name:') !!}
    <p>{{ $cities->ar_name }}</p>
</div>

<!-- Country Id Field -->
<div class="col-sm-12">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $cities->country_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cities->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cities->updated_at }}</p>
</div>

