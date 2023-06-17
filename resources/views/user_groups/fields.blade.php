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
@php
    $disable = ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER) && !empty(Auth::user()->firm) ) ? 'none' :'block'
@endphp
<div class="form-group col-sm-6" style="display: {{ $disable }}">
    <!-- Firm Id Field -->
    <div >
        {!! Form::label('firm_id', 'Firm Id:') !!}
        {!! Form::select('firm_id', $firmItems, (Auth::user()->firm ? Auth::user()->firm->id : null), ['class' => 'form-control custom-select']) !!}
    </div>
</div>
