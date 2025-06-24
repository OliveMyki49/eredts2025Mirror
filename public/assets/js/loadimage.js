
$( document ).ready(function() {
function readIMG(x){
    if(x.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#photome').attr('src',e.target.result);
        }
        reader.readAsDataURL(x.files[0]);
    }
}
$("#image").change(function(){
    readIMG(this);
});
});
