import './bootstrap';
import 'flowbite';


import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener('DOMContentLoaded', function () {
    const textAreaIds = ['#description', '#requirements', '#content','#welfare']; // Danh sách các ID của textarea

    textAreaIds.forEach(id => {
        ClassicEditor.create(document.querySelector(id))
            .catch(error => {
                console.error(error);
            });
    });
});


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
