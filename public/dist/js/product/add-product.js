$(function(){
    $(".tag_select2").select2({
        tags: true,
        tokenSeparators: [',']
    })
})

const img = document.getElementById('formFile');
const imageFeature = document.querySelector('.image-feature');

// previewElement.classList.add('d-flex', 'flex-wrap');

function previewImage() {
    const file = img.files[0];
    const preview = document.getElementById('img-preview');
    const reader = new FileReader();
    reader.addEventListener('load', function() {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}
