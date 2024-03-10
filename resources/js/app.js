import './bootstrap';
import 'preline'

import {createUpload} from "@mux/upchunk"

window.createUpload = createUpload

// window.addEventListener('alert', (event) => {
//     let data = event.detail;
//
//     Swal.fire({
//         position: data.position,
//         icon: data.type,
//         title: data.title,
//         timer: data.timer
//     })
//
// })
//
//
// window.addEventListener('notify', event => {
//     alert('Name updated to: ' + event.detail.newName);
// })
