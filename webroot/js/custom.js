$(document).ready(function () {
  autocomplete();
  hide_show();
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
            $.map( data, function( item ) {
               $('#brand-name').append('<option value="'+item.id+'">' + item.value + '</option>');
          });
          $("#brand-name").trigger("chosen:updated");
          $("#brand-name").trigger("liszt:updated");
        });
  });
}
function hide_show(){
  $('#advanced_brand').hide();
  $('#advanced_option').click(function(){
    autocomplete();
    $("#advanced_brand").show();
  })
}