<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable-master-unit" class="w-100 table table-hover" width="100%">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="datatable-master-unit-modal-delete" tabindex="-1" aria-labelledby="datatable-master-unit-modal-deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <p class="fw-bolder">Are you sure wants delete this data as permanently ?</p>
                    <form id="datatable-master-unit-form-delete" action="" method="POST">
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

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endpush

@push('js')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$(function(){
    'use strict';

    const DTMasterunit = $('#datatable-master-unit').DataTable({
        processing: true,
        serverSide: true,
        ajax : {
            url : `{{ route('master.units.datatables') }}`
        },
        columns : [
            { 
                data : 'code', 
                width : '100px', 
                render(data, type, row, meta){
                    return `<a href="{{ route('master.units.index') }}/${data}" class="fw-bold">${data}</a>`;
                }
            },
            { 
                data : 'name'
            },
            { 
                data : 'code',
                width : '10px', 
                className : 'text-center',
                render(data, type, row, meta){
                    return `<div class="dropdown dropstart">
                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('master.units.index') }}/${data}/edit"><i class="fa fa-fw fa-edit"></i> Edit</a></li>
                            <li>
                                <a class="dropdown-item text-danger" 
                                    data-bs-toggle="modal"
                                    href="#datatable-master-unit-modal-delete" 
                                    data-action="{{ route('master.units.index') }}/${data}">
                                    <i class="fa fa-fw fa-trash"></i> Delete
                                </a>
                            </li>
                        </ul>
                    </div>`;
                }
            }
        ]
    });

    $('#datatable-master-unit-form-delete').submit(function(e){
        e.preventDefault();
        $.post(this.getAttribute('action'),{
            _method : 'DELETE',
            _token : `{{ csrf_token() }}`
        }, function(){
            $('[data-bs-dismiss="modal"]').trigger('click');
            DTMasterunit.draw();
        },'json');
    });

    $('#datatable-master-unit-modal-delete').on({
        'show.bs.modal' : (e) => {
            let sourceElement   = $(e.relatedTarget),
                formDelete      = $('#datatable-master-unit-form-delete');
            formDelete.attr('action',sourceElement.attr('data-action'));
        }
    });

});
</script>
@endpush