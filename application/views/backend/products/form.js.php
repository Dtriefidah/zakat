<script>
Dropzone.autoDiscover = false;
$(document).ready(function() {
    var $images_dropzone = new Dropzone('#images_dropzone', {
        addRemoveLinks: true,
        maxFiles: 5,
        url: site_url+'api/products/upload',

        error: function(file, errorMessage) { this.removeFile(file); $('#images_dropzone_error').html(errorMessage); },
        init: function() {
            var myDropzone = this;
            $.getJSON(site_url+'api/products/index/'+$('#id').val(), function(data) {
                if (! $.isEmptyObject(data) && data.products.images != '') {
                    $(data.products.images).each(function(index, image) {
                        var mockFile = { accepted: true, name: image.image_name, size: image.image_size, dataURL: base_url+image.image };

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
                    });
                }
            });
        },
        removedfile: function(file) {
            var index = '';
            $('span[data-dz-name]').each(function(i) { if ($(this).html() == file.name) { index = i; } });
            $('.images:eq('+(index + 1)+')').remove(); $('#images_dropzone_error').html(''); file.previewElement.remove();
        },
        renameFilename: function (filename) { return new Date().getTime() + '_' + filename; },
        success: function(file, responseText) { $('.images:last').after('<input class="images" name="images[]"" type="hidden" value="'+responseText.file.temp_full_path+'" />'); },
    });
});
</script>
