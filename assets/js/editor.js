
import tinymce from 'tinymce';
import 'tinymce/themes/silver'
import 'tinymce/plugins/image';


require("../../node_modules/tinymce/skins/ui/oxide/content.min.css");
require("../../node_modules/tinymce/skins/ui/oxide/content.mobile.min.css");
require("../../node_modules/tinymce/skins/ui/oxide/skin.min.css");
require("../../node_modules/tinymce/skins/ui/oxide/skin.mobile.min.css");

tinymce.init({
    selector: '.tinymce',
    plugins: 'image',
    toolbar: 'image',
})