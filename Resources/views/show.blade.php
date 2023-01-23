@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-3">
    <div>@include('masterunit::components.content-title')</div>
    <div>
        <a href="{{ route('master.units.index') }}" class="btn btn-outline-secondary mb-0"><i class="fa fa-fw fa-table"></i> Datatable</a>
        <a href="{{ route('master.units.create') }}" class="btn btn-outline-primary mb-0"><i class="fa fa-fw fa-plus"></i> Create New</a>
    </div>
</div>
@include('masterunit::components.alert')
<div class="row">
    <div class="col-md-6">
        @include('masterunit::components.show-single')
        <div class="d-flex justify-content-between mt-2">
            <div>
                <a href="javascript:history.back();" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="text-end">
                <button type="button" data-bs-target="#master-unit-modal-delete" data-bs-toggle="modal" class="btn btn-outline-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>
                <a class="btn btn-outline-secondary" href="{{ route('master.units.edit',['unit'=>$unit]) }}" ><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="master-unit-modal-delete" tabindex="-1" aria-labelledby="master-unit-modal-deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <p class="fw-bolder">Are you sure wants delete this data as permanently ?</p>
                    <form id="master-unit-form-delete" action="{{ route('master.units.destroy',['unit'=>$unit]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
