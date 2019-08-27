
import tinymce from 'tinymce';
import 'tinymce/themes/silver'
import 'tinymce/plugins/image';
import { format } from 'url';


require("../../node_modules/tinymce/skins/ui/oxide/content.min.css");
require("../../node_modules/tinymce/skins/ui/oxide/content.mobile.min.css");
require("../../node_modules/tinymce/skins/ui/oxide/skin.min.css");
require("../../node_modules/tinymce/skins/ui/oxide/skin.mobile.min.css");

let form = document.querySelector(".tinymce");

tinymce.init({
    selector: '.tinymce',
    plugins: 'image',
    toolbar: 'image',
    automatic_uploads: true,
    images_upload_url: '/uploads/article-section-uploads/'+form.dataset.postId,
    file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {

            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
        };

        input.click();
    }
});