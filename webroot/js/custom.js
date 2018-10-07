$(document).ready(function () {
  autocomplete();
  hide_show();
  $('.slider').bxSlider({
    mode: 'horizontal',
    captions: false,
    controls:true
  });
  advanced_option();
  validation();
});
function autocomplete(){
  $("#speciality-name").change(function(){ 
    var siteUrl = $('#siteurl').val();
    var Url = 'home/getBrand';
    var speciality_val = $("#speciality-name").val();
        $.ajax({
          url: Url,
          dataType: "HTML",
          data: {speciality: speciality_val},
          beforeSend: function(){ 
             $(".brand_group").hide();
             $("#preloader").removeClass('hidden');
           }
         }).done(function( data ) {
               $('.brand_group').html(data);
               setTimeout(function(){                
                 $("#preloader").addClass('hidden');
                 $(".brand_group").fadeIn();
               }, 500);
        });
  });
}
function hide_show(){
  // $('#advanced_brand').hide();
  // $('#advanced_option').click(function(){
  //   $("#advanced_brand").show();
  // })
}

function advanced_option(){
  $('#speciality-name').change(function(e){
    if(($(this).val()) != ''){
      $('.advanced_div').fadeIn('slow');
      autocomplete();
    }else{
      $('.advanced_div').hide();
    }
  });
}

function validation(){
  $("#addbrandForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 2
        },
        position: {
          required: true,
          number: true
        },
        image: {
          required: true,
          minlength: 5
        },
        speciality_id: {
          required: true
        }
      },
      messages: {
        name: {
          required: "Please enter a brand name",
          minlength: "Your username must consist of at least 2 characters"
        },
        position: {
          required: "Please provide a position"
        },
        image: {
          required: "Please provide a valid image"
        },
        speciality_id: "Please select a speciality"
      }
    });
}