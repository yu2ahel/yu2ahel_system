<!-- En Name Field -->
<div class="col-sm-12">
    {!! Form::label('en_name', 'En Name:') !!}
    <p>{{ $countries->en_name }}</p>
</div>

<!-- Ar Name Field -->
<div class="col-sm-12">
    {!! Form::label('ar_name', 'Ar Name:') !!}
    <p>{{ $countries->ar_name }}</p>
</div>

<!-- Time Zone Field -->
<div class="col-sm-12">
    {!! Form::label('time_zone', 'Time Zone:') !!}
    <p>{{ $countries->time_zone }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $countries->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $countries->updated_at }}</p>
</div>

