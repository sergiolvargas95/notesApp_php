
const deleteModal = document.getElementById('deleteModal');
const noteIdInput = document.getElementById('noteIdToDelete');

deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const noteId = button.getAttribute('data-note-id');
    noteIdInput.value = noteId;
});

document.getElementById('deleteForm').addEventListener('submit', function (event) {
    console.log('Deleting note with ID:', noteIdInput.value);
});
