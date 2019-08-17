<!--- start multi image -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


<link src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
$(document).ready(function() {

    $(".btn-success").click(function() {
        var html = $(".clone").html();
        $(".increment").after(html);
    });

    $("body").on("click", ".btn-danger", function() {
        $(this).parents(".control-group").remove();
    });

});
</script>

<!--- end multi image -->

<script type="text/javascript">
function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            $("#targetLayer").html('<img src="' + e.target.result +
                '" width="200px" height="200px" class="upload-preview" />');
            $("#targetLayer").css('opacity', '0.7');
            $(".icon-choose-image").css('opacity', '0.5');
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
    }
}
</script>