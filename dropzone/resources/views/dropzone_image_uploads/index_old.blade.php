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
    <form method="post" action="{{url('dropzone-image-upload')}}" enctype="multipart/form-data"
                  class="dropzone" id="dropzone">
    @csrf
</form>
<script type="text/javascript">

        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            timeout: 5000,
            success: function(file, response)
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
</body>
</html>
