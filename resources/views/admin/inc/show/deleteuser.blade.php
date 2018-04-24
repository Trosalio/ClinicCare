<button type="button" class="btn btn-danger text-light"
        data-toggle="modal" data-target="#deleteModal">
    Delete This User
</button>

@component('components.modal')
    @slot('modal_id')
        deleteModal
    @endslot
    @slot('modal_label')
        deleteUser
    @endslot
    @slot('modal_title')
        <strong>Deleting User: {{  $user->username }}</strong>
    @endslot
    @slot('modal_body')
        Are you sure you want to delete this
        <strong>user</strong>?
    @endslot
    @slot('modal_footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="POST"
              action="{{ route('users.destroy', [$user]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">
                Confirm
            </button>
        </form>
    @endslot
@endcomponent