<!-- Modal -->
<div class="modal fade" id="editGroupModalCenter-{{ $group->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editGroupModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form method="POST" id="#edit-group-form-{{ $group->id }}" data-id="{{ $group->id }}"
                action="{{ route('groups.update', $group->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Group</h5>
                    <button type="button" class="btn-close text-dark" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label for="editGroupFormControlInput1" class="form-label">Group Name</label>
                        <input type="text" class="form-control bg-light p-2" id="edit-group-name"
                            placeholder="Ex: Interaction Design" name="name" value="{{ $group->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="editGroupFormControlInput1" class="form-label">Url Code</label>
                        <input type="text" class="form-control bg-light p-2" id="edit-url-code"
                            placeholder="Ex: idsign" name="code" value="{{ $group->code }}">
                    </div>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status of the group
                            schedule</label>
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                            name="is_active" value="1" {{ $group->is_active ? 'checked' : '' }}>
                    </div>
                    



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
