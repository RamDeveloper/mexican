$(document).ready(function () {
  autocomplete();
  hide_show();
  $('.slider').bxSlider({
    mode: 'horizontal',
    captions: false,
    slideWidth: 900,
    controls:true
  });
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
           $("#brand-name option").remove();
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
    $("#advanced_brand").show();
  })
}