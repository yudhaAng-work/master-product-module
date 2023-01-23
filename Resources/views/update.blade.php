@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <div>@include('masterunit::components.content-title')</div>
        <div><a href="{{ route('master.units.index') }}" class="btn btn-outline-secondary mb-0"><i class="fa fa-fw fa-table"></i> Datatable</a></div>
    </div>
    @include('masterunit::components.alert')
    <div class="row">
        <div class="col-md-6">
        @include('masterunit::components.form',[
            'form' => (object)[
                'method'    => 'PUT',
                'action'    => route('master.units.update', ['unit'=>$unit])
            ]
        ])
        </div>
    </div>
@endsection
