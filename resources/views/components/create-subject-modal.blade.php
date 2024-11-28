<!-- Modal -->
<div class="modal fade" id="createSubjectModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="editSubjectModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form method="POST" id="#create-subject-form" action="{{ route('subjects.store') }}">
                @csrf
                @method('POST')

                <input type="number" value="{{ $group->id }}" name="group_id" hidden>
                <div class="modal-header">
                    <h5 class="modal-title">Create Subject</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">


                    <div class="mb-3">
                        <label for="editSubjectFormControlInput1" class="form-label">Select subjects</label>
                        <select id="select-subject" class="form-control bg-light p-2" name="subject_id"
                            id="edit-subject-name">
                            <option value="new" selected>New Subject</option>
                            @foreach (App\Models\Subject::all() as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" id="create-new-subject-form">

                        <label for="edit-subject-name" class="form-label">Create New Subject</label>

                        <input type="text" autocomplete="off" class="form-control bg-light p-2"
                            id="edit-subject-name" placeholder="Ex: Interaction Design" name="name" value=" ">


                    </div>


                    <div class="mb-3">
                        <label for="edit-url-code" class="form-label">Start Time</label>
                        <input type="time" class="form-control bg-light p-2" id="edit-url-code"
                            placeholder="Ex: idsign" name="turn" value="">
                    </div>


                    <div class="mb-3">
                        <label for="select-day" class="form-label">Day of the week</label>
                        <select name="day" class="form-control bg-light p-2" id="select-day">
                            <option value="1">Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thursday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                            <option value="7">Sunday</option>
                        </select>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('select-subject');
            const newSubjectForm = document.getElementById('create-new-subject-form');

            // Lógica para mostrar u ocultar el div basado en el valor predeterminado
            if (select.value === 'new') {
                newSubjectForm.style.display = 'block'; // Mostrar si es "showDiv"
            } else {
                newSubjectForm.style.display = 'none'; // Ocultar si no es "showDiv"
            }
        });

        document.getElementById('select-subject').addEventListener('change', function() {
            const selectedValue = this.value; // Obtiene el valor seleccionado
            const newSubjectForm = document.getElementById('create-new-subject-form');
            console.log("");

            if (selectedValue === 'new') {
                newSubjectForm.style.display = 'block'; // Muestra el div
            } else {
                newSubjectForm.style.display = 'none'; // Oculta el div
            }
        });
    </script>
</div>
