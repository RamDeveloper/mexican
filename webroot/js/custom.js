$(document).ready(function () {
  autocomplete();
});
function autocomplete(){
  $("#speciality-name").change(function(){ 
    var siteUrl = $('#siteurl').val();
    var Url = 'home/getBrand';
    var speciality_val = $("#speciality-name").val();
        $.ajax({
          url: Url,
          dataType: "json",
          data: {speciality: speciality_val},
          beforeSend: function(){ 
           $("#brand-name").empty(); 
           }
         }).done(function( data ) {
           response( $.map( data, function( item ) {
               $('#brand-name').append('<option value="'+item.id+'">' + item.name + '</option>');
          }));
 
          $("#brand-name").trigger("chosen:updated");
          $("#brand-name").trigger("liszt:updated");
 
        });
  });
}