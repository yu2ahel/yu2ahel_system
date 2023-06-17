@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('app.departments') }}</h1>
            </div>
            @if (Auth::user()->permiisionsOwner('manage department'))
            <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('departments.create') }}">
                        {{__("app.create_department")}}
                    </a>
            </div>
            @endif
        </div>
    </div>
</section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('departments.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

