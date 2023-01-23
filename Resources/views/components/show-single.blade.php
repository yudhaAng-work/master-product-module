<div class="card shadow">
    <div class="card-header">
        Data Unit
    </div>
    <div class="card-body">
        <dl>
            <dt>Code</dt>
            <dd>{{ $unit->code }}</dd>

            <dt>Name</dt>
            <dd>{{ $unit->name }}</dd>

            <dt>Created At</dt>
            <dd>{{ $unit->created_at }}</dd>

            <dt>Last Update</dt>
            <dd>{{ $unit->updated_at }}</dd>
        </dl>
    </div>
</div>