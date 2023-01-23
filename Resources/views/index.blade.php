@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-3">
    <div>@include('masterunit::components.content-title')</div>
    <div><a href="{{ route('master.units.create') }}" class="btn btn-outline-primary mb-0"><i class="fa fa-fw fa-plus"></i> Create New</a></div>
</div>
@include('masterunit::components.alert')
@include('masterunit::components.datatables')
@endsection
