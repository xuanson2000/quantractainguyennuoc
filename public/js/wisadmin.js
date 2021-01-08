$(document).ready(function () {
    if($(".mce-content").length > 0){
        tinymce.init({
            selector: 'textarea.mce-content',
            height: 300,
            themes: "modern",
            skin: "lightgray",
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_css: [
                '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700&amp;subset=vietnamese',
                '//www.tinymce.com/css/codepen.min.css']
        });
    }
});