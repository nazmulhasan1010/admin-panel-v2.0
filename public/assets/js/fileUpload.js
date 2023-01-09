// modal show
var reader = new FileReader();
$('.fileUploadModalShow').click(function (e) {
    let urlMain = $('.fileUploadForm').attr("action"),
        url = urlMain + $(this).data('url');
    $('#fileUploadModal').modal('show');
    $('.fileSubmit').click(function (e) {
        e.preventDefault();
        let file = $('#avatarFile')[0].files[0];
        let files = new FormData();
        files.append('file', file);
        let config = {
            headers: {'Content-Type': 'multipart/form-data'},
            onUploadProgress: function (progressEvent) {
                let percentage = Math.round((progressEvent.loaded * 100) / progressEvent.total).toFixed(2);
                $('.progress-bar').css('display', 'block');
                $('.indicator-bar').css('width', percentage + '%');
                $('.percentage').text(percentage + ' %');
            }
        };
        axios.post(url, files, config).then(function (response) {
            console.log(response)
            if (response.data.status === 'success') {
                $('#fileUploadModal').modal('hide');
                toasterShow('success', 'Avatar updated successfully');
                $('.fileUploadModalShow').attr('src', urlMain + "/storage/" + response.data.file);
            }
        }).catch(function (error) {
            // toasterShow('error', error.message)
        });
    });
});

// select file upload option
$('.uploadFileButton').click(function () {
    $('.takeFileButton').removeClass('button-active')
    $(this).addClass('button-active')
    $('.fileUploadModal').removeClass('modal-lg')
});
$('.takeFileButton').click(function () {
    $('.uploadFileButton').removeClass('button-active')
    $(this).addClass('button-active')
    $('.fileUploadModal').addClass('modal-lg')
});

// drag and drop
$('#avatarFile').change(function () {
    var filesCount = $(this)[0].files.length;
    if (filesCount === 1) {
        var fileName = $(this).val().split('\\').pop();
    } else {
        textBox.text(filesCount + ' files selected');
    }
    // image preview
    reader.readAsDataURL($(this)[0].files[0]);
    reader.onload = function (event) {
        var source = event.target.result;
        $('.imagePreView').attr('src', source).css('display', 'block');
        $('.image-preview-area').css('display', 'block');
    }
    $('.drag-text').css('display', 'none')
});
