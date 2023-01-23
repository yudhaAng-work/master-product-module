<form method="POST" action="{{ ($form->action ?? route('master.units.store'))  }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method(($form->method ?? 'POST'))
    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <label for="">Code</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code', ($unit->code ?? '')) }}" autofocus>
                @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', ($unit->name ?? '')) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-end">
                <a class="btn btn-outline-secondary" href="javascript:history.back();" ><i class="fa fa-ban"></i> Cancel</a>
                <button class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</form>