$(document).ready(function () {
  validation();
});

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
          minlength: "Your Brand name must consist of at least 2 characters"
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