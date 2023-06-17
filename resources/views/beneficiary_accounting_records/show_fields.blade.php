<!-- Beneficiary Id Field -->
<div class="col-sm-12">
    {!! Form::label('beneficiary_id', 'Beneficiary Id:') !!}
    <p>{{ $beneficiaryAccountingRecords->beneficiary_id }}</p>
</div>

<!-- Transaction Type Field -->
<div class="col-sm-12">
    {!! Form::label('transaction_type', 'Transaction Type:') !!}
    <p>{{ $beneficiaryAccountingRecords->transaction_type }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $beneficiaryAccountingRecords->amount }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $beneficiaryAccountingRecords->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $beneficiaryAccountingRecords->updated_at }}</p>
</div>

