@php
    use App\User;
@endphp
<!-- Beneficiary Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficiary_id', 'Beneficiary Id:') !!}
    {!! Form::select('beneficiary_id', $beneficiaryItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Transaction Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_type', 'Transaction Type:') !!}
    {!! Form::select('transaction_type', $transactionTypes , null, ['class' => 'form-control']) !!}

</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {{-- {!! Form::number('amount', null, ['class' => 'form-control']) !!} --}}
    {!! Form::number('amount',null,['class' => 'form-control','step'=>'any']) !!}
</div>
@php
    $disable = ((Auth::user()->type == User::TYPE_FIRM_ADMIN || Auth::user()->type == User::TYPE_FIRM_USER ) && !empty(Auth::user()->firm) ) ? 'none' :'block'
@endphp
<div class="form-group col-sm-6" style="display: {{ $disable }}">
    <!-- Firm Id Field -->
    <div >
        {!! Form::label('firm_id', 'Firm Id:') !!}
        {!! Form::select('firm_id', $firmItems, (Auth::user()->firm ? Auth::user()->firm->id : null), ['class' => 'form-control custom-select']) !!}
    </div>
</div>
