<button type="button" class="btn btn-warning text-light"
        data-toggle="modal" data-target="#changeModal">
    Change Role
</button>

<form method="POST" action="{{ route('users.update', [$user]) }}">
    @csrf
    @method('PUT')
    @component('components.modal')
        @slot('modal_id')
            changeModal
        @endslot
        @slot('modal_label')
            changeRole
        @endslot
        @slot('modal_title')
            <strong>Changing User's Role</strong>
        @endslot
        @slot('modal_body')
            <div class="form-group row">
                <label class="col-sm-3 col-md-2">
                    <strong>Role:</strong>
                </label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="client"
                           name="role"
                           class="custom-control-input"
                           value="client"
                            {{ (old('role') ??$user->role)
                            === 'client' ? 'checked' : ''}}>
                    <label class="custom-control-label"
                           for="client">Client</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="doctor"
                           name="role"
                           class="custom-control-input"
                           value="doctor" {{ (old('role') ?? $user->role)
                            ==='doctor' ? 'checked' : ''}}>
                    <label class="custom-control-label"
                           for="doctor">Doctor</label>
                </div>
            </div>
        @endslot
        @slot('modal_footer')
            <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close
            </button>
            <button type="submit" class="btn btn-primary">Confirm</button>
        @endslot
    @endcomponent
</form>