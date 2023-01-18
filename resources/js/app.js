import './bootstrap';

    tinymce.init({
    selector: 'textarea.tinymce-editor',
    height: 300,
    menubar: true,
    plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount', 'image'
    ],
    toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    content_css: '//www.tiny.cloud/css/codepen.min.css'
});

$(document).ready( function () {
    $('#myTable').DataTable();
} );


