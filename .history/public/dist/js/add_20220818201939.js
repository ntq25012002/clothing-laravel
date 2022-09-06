  var editor_config = {
    path_absolute : "/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    },
  };

  tinymce.init(editor_config);




$(function(){
  $(".tag_select2").select2({
      tags: true,
      tokenSeparators: [',']
  })
})


$(function(){
  $(".category_select2").select2({
    placeholder: "Chọn danh mục",
    allowClear: true
  })
})

const img = document.getElementById('formFile');
const imageFeature = document.querySelector('.image-feature');

function previewImage() {
    const file = img.files[0];
    // console.log(file);
    const preview = document.getElementById('img-preview');
    const reader = new FileReader();
    reader.addEventListener('load', function() {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

let arrDataImages = [];
let imageOlds = document.querySelector('.image-olds');
console.log(imageOlds);
if(imageOlds.value != '') {
  arrDataImages = JSON.parse(imageOlds.value)
}
let files = [], // will be store images
// button = document.querySelector('.top button'), // uupload button
// form = document.querySelector('.form-upload'), // form ( drag area )
form = document.querySelector('#form'), //
container = document.querySelector('.box'), // container in which image will be insert
text = document.querySelector('.inner'), // inner text of form
browse = document.querySelector('.select'), // text option fto run input
input = document.querySelector('.file'); // file input
browse.addEventListener('click', () => input.click());
// input change event
input.addEventListener('change', () => {
	let file = input.files;

	for (let i = 0; i < file.length; i++) {
		if (files.every(e => e.name !== file[i].name)) files.push(file[i])
	}

	form.reset();
	showImages();
})

const showImages = () => {
	let images = '';

  if(imageOlds.value != '') {
    if(arrDataImages.length > 0) {
      arrDataImages.forEach((item,i) => {
        images += `<div class="image">
                    <img src="http://127.0.0.1:8000/storage/product/${item}" alt="image">
                    <span onclick="deleteImage(${i})">&times;</span>
                  </div>`
      }) 
    }
  }

	files.forEach((e, i) => {
		images += `<div class="image">
    			<img src="${URL.createObjectURL(e)}" alt="image">
    			<span onclick="delImage(${i})">&times;</span>
    		</div>`
	})

	container.innerHTML = images;
} 
showImages()

const delImage = index => {
	files.splice(index, 1)
	showImages()
} 
const deleteImage = index => {
  arrDataImages.splice(index, 1)
	showImages()
}
// drag and drop 
form.addEventListener('dragover', e => {
	e.preventDefault()

	form.classList.add('dragover')
	text.innerHTML = 'Drop images here'
})

form.addEventListener('dragleave', e => {
	e.preventDefault()

	form.classList.remove('dragover')
	text.innerHTML = 'Drag & drop image here or <span class="select">Browse</span>'
})

form.addEventListener('drop', e => {
	e.preventDefault()

    form.classList.remove('dragover')
	text.innerHTML = 'Drag & drop image here or <span class="select">Browse</span>'

	let file = e.dataTransfer.files;
	for (let i = 0; i < file.length; i++) {
		if (files.every(e => e.name !== file[i].name)) files.push(file[i])
	}

	showImages();
})

// button.addEventListener('click', () => {
// 	let form = new FormData();
// 	files.forEach((e, i) => form.append(`file[${i}]`, e))

// 	// now you can send the image to server
	
// })

$(document).on('click','.btn-submit', function(e) {
  e.preventDefault();
  var list = new DataTransfer();
  var featureImage = new DataTransfer();
  if(img.files[0]) {
    featureImage.items.add(img.files[0])
    document.querySelector('#feature_image').files = featureImage.files

  }
  for (let i = 0; i < files.length; i++) {
    const fileItem = files[i];
    list.items.add(fileItem);
  }
  let dataImages = document.querySelector('.data-images')
  let myFileList = list.files;
  // let 
  document.querySelector('#images').files = myFileList
  imageOlds.value= JSON.stringify(arrDataImages)
  document.querySelector('#form-add').submit();
})