@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Beneficiary Accounting Records</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($beneficiaryAccountingRecords, ['route' => ['beneficiaryAccountingRecords.update', $beneficiaryAccountingRecords->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('beneficiary_accounting_records.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('beneficiaryAccountingRecords.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
