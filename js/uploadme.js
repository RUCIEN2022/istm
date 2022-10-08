$(document).ready(function () {
    $(document).on('change', '#file', function () {
        var property = document.getElementById("file").files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg', 'mp4', 'MP4', 'mp3', 'MP3']) == -1) {
            alert("image non valide!");
        }
        var image_size = property.size;

        var form_data = new FormData();
        form_data.append("file", property);
        $.ajax({
            url: "upload.php",
            method: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#uplaoded_image').html("<label class='text-success'>Image upload...</label>");
            },
            success: function (data) {
                $('#uploaded_image').html(data);
            }
        });

    });
});