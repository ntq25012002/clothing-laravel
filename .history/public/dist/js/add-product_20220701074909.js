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

// function readAndShowFiles() {
//     console.log("Checkpoint2"); //test
//     var tiv = new tivAPI();
//     var array = tiv.getLoadedImages();
//     tiv.showLoadedImages(array);
// }

// function tivAPI() {
//     var imagesarray = new Array();


//     return {
//         loadImages: function() {
//             console.log("Loading Files"); //test
//             var files = document.getElementById("imageDetails").files;
//             for (var i = 0; i < files.length; i++) {
//                 var file = files[i];
//                 // Have to check that this is an image though
//                 // using the file.name TODO
//             }
//             console.log(files.length); //test
//             return files;
//         },
//         getLoadedImages: function() {
//             imagesarray = this.loadImages();
//             console.log("Returning Files"); //test
//             console.log(imagesarray.length);
//             return imagesarray;
//         },
//         showLoadedImages: function(elem) {
//             console.log("Showing Files"); //test
//             var files = elem;
//             var reader = new FileReader();
//             // Closure to capture the file information.
//             for (var i = 0; i < files.length; i++) {
//                 var file = files[i];
//                 reader.onload = (function(file) {
//                     return function(e) {
//                         // Render thumbnail.
//                         var span = document.createElement('span');
//                         span.innerHTML = ['<img style="width:90px" src="', e.target.result,
//                             '" title="', escape(file.name), '">'
//                         ].join('');
//                         document.getElementById('list').insertBefore(span, null);
//                     };

//                 })(file);
//                 // Read in the image file as a data URL.
//                 reader.readAsDataURL(file);
//             }
//         }
//     };
// }