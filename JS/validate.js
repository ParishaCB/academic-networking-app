var form = $("#regForm"); 
var val = {
    rules: {
    firstname: {
        required: true,
    },
    lastname: {
        required: true,
    },
    email: {
        required: true,
    }, 
    password: {
        required:true,
        minlength:8,
        maxlength:16,
    },
    cpassword: {
        required: true,
        equalTo: '#password',
    },
    userage: {
        required:true,
        minlength:2,
        maxlength:2,
        digits:true
    },
    },

        // Specify validation error messages
    messages: {
        firstname: "First Name is Required",
        lastname:  "Last Name is Required",

        email: {
        required:   "Email is required",
        email:      "Please Enter A Valid Email",
        },

        password: {
        required:   "Password is Required",
        minlength:  "Password Needs To Contain Minimum 8 Characters",
        maxlength:  "Password Is Limited To 16 Characters",
        },

        cpassword: {
        required:   "Please Confirm Your Password",
        equalTo: "Passwords Do Not Match.",
        },

        userage: {
        required: "Please Enter A Valid Age",
        },
        }
    }
   
  $("form").multiStepForm({
    validations:val
  })