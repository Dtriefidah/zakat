function summernoteSendFile(file, url, element) {
    var form_data = new FormData();
    form_data.append('file', file);
    $.ajax({
        contentType: false, data: form_data, processData: false, type: 'POST',
        success: function(response) { $(element).summernote('editor.insertImage', response.file_path, response.file_name); },
        url: url,
    });
}
