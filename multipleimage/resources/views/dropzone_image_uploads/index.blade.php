<!DOCTYPE html>
<html>
<head>
    <title>Laravel Dropzone Multiple Images Uploading - W3Adda</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
       <style>
        .dropzone .dz-preview .dz-image {
        border-radius: 0px;
        overflow: hidden;
        width: 120px;
        height: 120px;
        position: relative;
        display: block;
        z-index: 10;
}

</style>
</head>

<body>
    <div class="container">

        <h3>Laravel Dropzone Multiple Images Uploading - W3Adda</h3>

        <form  id="form" enctype="multipart/form-data">
            @csrf
            <div id="imageUpload" class="dropzone"></div>
          </form>


</body>
<script>

myDropzone = new Dropzone('div#imageUpload', {
    addRemoveLinks: true,
    autoProcessQueue: true,
    uploadMultiple: true,
    parallelUploads: 100,
   // maxFiles: 3,
    paramName: 'file',
    clickable: true,
    url: '{{url('dropzone-image-upload')}}',
    init: function () {

        var myDropzone = this;
        // Update selector to match your button
        // $btn.click(function (e) {
        //     e.preventDefault();
        //     if ( $form.valid() ) {
        //         myDropzone.processQueue();
        //     }
        //     return false;
        // });

        this.on('sending', function (file, xhr, formData) {
            // Append all form inputs to the formData Dropzone will POST
            var data = $("#form").serializeArray();
            $.each(data, function (key, el) {
                formData.append(el.name, el.value);
            });
            console.log(formData);


        });
    },
    error: function (file, response){
        if ($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    successmultiple: function (file, response) {
        console.log(file, response);
        $modal.modal("show");
    },
    completemultiple: function (file, response) {
        console.log(file, response, "completemultiple");
        //$modal.modal("show");
    },
    reset: function () {
        console.log("resetFiles");
        this.removeAllFiles(true);
    }
});
    </script>
