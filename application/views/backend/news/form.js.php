<script>
Dropzone.autoDiscover = false;
$(document).ready(function() {
    var $content = $('#content').html($('#content').text()).summernote();

    var $image_dropzone = new Dropzone('#image_dropzone', {
        addRemoveLinks: true,
        maxFiles: 1,
        url: site_url+'backend/news/upload',

        error: function(file, errorMessage) { this.removeFile(file); $('#image_dropzone_error').html(errorMessage);},
        init: function() {
            var myDropzone = this;
            $.getJSON(site_url+'api/news/index/'+$('#id').val(), function(data) {
                if (! $.isEmptyObject(data) && data.news.image != '') {
                    var mockFile = { accepted: true, name: data.news.image_name, size: data.news.image_size, dataURL: base_url+data.news.image };

                    myDropzone.emit('addedfile', mockFile);
                    myDropzone.createThumbnailFromUrl(
                        mockFile,
                        myDropzone.options.thumbnailWidth,
                        myDropzone.options.thumbnailHeight,
                        myDropzone.options.thumbnailMethod,
                        true,
                        function(thumbnail) { myDropzone.emit('thumbnail', mockFile, thumbnail); myDropzone.emit("complete", mockFile); }
                    );
                    myDropzone.files.push(mockFile);
                }
            });
        },
        removedfile: function(file) { $('#image').val(''); $('#image_dropzone_error').html(''); file.previewElement.remove(); },
        renameFilename: function (filename) { return new Date().getTime() + '_' + filename; },
        success: function(file, responseText) { $('#image').val(responseText.file.temp_full_path); },
    });
});
</script>
