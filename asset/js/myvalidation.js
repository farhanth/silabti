// form update gambar profil
$("#edit_image_button").click(function() {
    $("#update_gambar_profile").click();
})

$('#update_gambar_profile').change(function(e) {
    var fileName = document.getElementById("update_gambar_profile").files[0];
    var preview = document.querySelector('#gambar_profil');
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    }

    if (fileName) {
        reader.readAsDataURL(fileName);
    }
	$('#form_gambar_profile').submit();
});
// form update gambar profil end