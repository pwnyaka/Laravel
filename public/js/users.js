"use strict";

window.onload = function () {
  let buttons = document.querySelectorAll('#toggleStatus');
  buttons.forEach((elem) => {
    elem.addEventListener('click', () => {
      let id = elem.getAttribute('data-id');
      fetch(`users/${id}/toggle-status`, {
        method: 'POST',
        body: JSON.stringify({
          '_token': document.querySelector('meta[name="csrf-token"]').content
        }),
        headers: {
          'content-type': 'application/json'
        }
      })
          .then(response => response.json())
          .then((data) => {
            document.querySelector(`#userStatus[data-id="${data.id}"]`).innerText = data.is_admin ? 'admin' : 'user';

          });
    })
  });
};