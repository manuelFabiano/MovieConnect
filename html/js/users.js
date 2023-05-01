function banUser(username) {
    // Mostra il modal
    const banUserModal = document.getElementById('banna-utente-modal');
    banUserModal.classList.remove('hidden');

    const banUserForm = document.getElementById('banna-utente-form');
    // Crea un nuovo elemento input di tipo "hidden"
    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'username');
    hiddenInput.setAttribute('value', username);

    banUserForm.appendChild(hiddenInput);

    const cancelButton = document.getElementById('banna-utente-modal-cancel');
    cancelButton.addEventListener('click', cancelBan);
};
//funzione per disattivare il modal se si preme annulla
function cancelBan() {
    const banUserModal = document.getElementById('banna-utente-modal');
    banUserModal.classList.add('hidden');
}

function changeRole(username) {
    // Mostra il modal
    const changeRoleModal = document.getElementById('cambia-ruolo-modal');
    changeRoleModal.classList.remove('hidden');

    const changeRoleForm = document.getElementById('cambia-ruolo-form');
    // Crea un nuovo elemento input di tipo "hidden"
    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'username');
    hiddenInput.setAttribute('value', username);

    changeRoleForm.appendChild(hiddenInput);

    const cancelButton = document.getElementById('cambia-ruolo-modal-cancel');
    cancelButton.addEventListener('click', cancelChangeRole);
};
//funzione per disattivare il modal se si preme annulla
function cancelChangeRole() {
    const changeRoleModal = document.getElementById('cambia-ruolo-modal');
    changeRoleModal.classList.add('hidden');
}