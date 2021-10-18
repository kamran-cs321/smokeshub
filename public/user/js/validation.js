$.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element)
      || value.length >= 8
      && /\d/.test(value)
      && /[a-z]/i.test(value);
  }, '* Your password must be at least 6 characters long and contain at least one number and one char\'.');

  $.validator.addMethod('validPhoneNumber', function(value, element) {
    return this.optional(element)
      && /\d/.test(value)
  }, '* Your password must be at least 6 characters long and contain at least one number and one char\'.');
  $.validator.addMethod('validName', function(value, element) {
      return this.optional(element)
        || value.length >= 3
        && /^[A-Za-z ]+$/.test(value);
    }, '* Your password must be at least 6 characters long and contain at least one number and one char\'.');

    $.validator.addMethod('validcnic', function(value, element) {
        return this.optional(element)
          || value.length >= 10
          && /[\d -]+/g.test(value);
      }, '* Your password must be at least 6 characters long and contain at least one number and one char\'.');

  // $('#contact-agent-form').validate({
  //     rules:{
  //         name:{
  //           required:true
  //         },
  //         email: {
  //             required: true,
  //             email:true
  //         },
  //         phone_number: {
  //           required:true
  //         },
  //         message:{
  //           required: true
  //         }
  //     },
  //     errorPlacement: function(error, element) {
  //         error.insertBefore(element);
  //         error.siblings(".input-icon").addClass("error-icon");
  //         // console.log(error.siblings(".input-icon"));
  //         // element.parent(".form-group").child(".input-icon").addClass("saqlainError");
  //     },
  //     messages: {
  //         name:{
  //           required:"* Please enter the name"
  //         },
  //         email: {
  //             required: "* Please enter an email address",
  //             email : "* Please enter valid email"
  //         },
  //         phone_number:{
  //           required:"* Please enter the phone number"
  //         },
  //         message:{
  //           required:"* Please enter the message"
  //         }
  //     }
  // });
$('.login-form').not("#contactform").validate({
    rules:{
        email: {
            required: true,
            email:true
        },
        password: {
          required: true
        },
    },
    messages: {
        email: {
            required: "! Please enter your email address",
            email : "! Please enter valid email address"
        },
        password:"! Please enter your password"
    }
});
$('.vendor-login').validate({
    rules:{
        email: {
            required: true,
            email:true
        },
        password: {
          required: true
        },
    },
    messages: {
        email: {
            required: "! Please enter your email address",
            email : "! Please enter valid email address"
        },
        password:"! Please enter your password"
    }
});
$('.customer-registration').validate({
    rules:{
        customer_name:{
            required: true,
            validName:true
        },
        customer_email:{
            required: true,
            email:true
        },
        customer_password: {
            required: true,
            strongPassword:true
        },
        customer_conform_password: {
          required: true,
          equalTo:'#customer_password'
        },
        customer_country: {
            required: true
        },
        customer_city: {
            required:true,
            validName:true
        },
        customer_address:{
            required:true
        },
        cutomer_image: {
            required: true
        }
    },
    messages: {
        customer_name:{
            required:"Please enter your name",
            validName:"Please enter valid name"
        },
        customer_email:{
            required:"Please enter your email address",
            email:"Please enter valid email address"
        },
        customer_password: {
            required: "Please enter your password",
            strongPassword:"Password must contains alphanumeric  and length > 8"
        },
        customer_conform_password:{
          required: "Please conform password",
          equalTo: "Password does not match"
        },
        customer_country:{
            required:"Select country"
        },
        customer_city:{
            required: "Please enter city",
            validName:"Enter valid city"
        },
        customer_address:{
            required:"Please enter your address"
        },
        customer_image:{
            required:"Please select your image",
            validPhoneNumber:"Please enter valid phone number"
        }

    }
});
$('.vendor-registration').validate({
    rules:{
        vendor_name:{
            required: true,
            validName:true
        },
        vendor_email:{
            required: true,
            email:true
        },
        vendor_phone: {
          required: true
        },
        vendor_relation :{
          required: true
        },
        vendor_password: {
            required: true,
            strongPassword:true
        },
        vendor_conform_password: {
            required: true,
            equalTo:'#vendor_password'
        },
        vendor_country: {
            required: true
        },
        vendor_city: {
            required:true,
            validName:true
        },
        vendor_address:{
            required:true
        },
        vendor_image: {
            required: true
        },
        vendor_cnic:{
          required:true,
          validcnic:true
        },
        brand_name:{
          required: true,
        },
        brand_email_address: {
          required: true,
          email: true
        },
        brand_phone:{
          required:true,
        },
        brand_address:{
          required:true
        }
    },
    messages: {
        vendor_name:{
          required:"Please enter vendor's name",
          validName:"Please enter valid name"
        },
        vendor_email:{
            required:"Please enter vendor's email address",
            email:"Please enter valid email address"
        },
        vendor_phone: {
          required: "Please enter vendor's phone number"
        },
        vendor_relation :{
          required: 'Relationship with the brand'
        },
        vendor_password: {
            required: "Please enter vendor's password",
            strongPassword:"Password must contains alphanumeric and length > 8"
        },
        vendor_conform_password: {
          required:'Please conform password',
          equalTo:"Password does not match"
        },
        vendor_country:{
            required:"Please select country"
        },
        vendor_city:{
            required: "Please enter city",
            validName:"Enter valid city"
        },
        vendor_address:{
            required:"Please enter vendor's address"
        },
        vedor_image:{
            required:"Please select vendor's profile image"
        },
        vendor_cnic : {
          required: "Please enter vendor CNIC No.",
          validcnic:"Please enter valid CNIC NO."
        },
        brand_name:{
          required: "Please enter brand name",
        },
        brand_email_address: {
          required: "Please enter brand email address",
          email: "Please enter valid email"
        },
        brand_phone:{
          required:"Please enter brand phone number",
        },
        brand_address:{
          required:"Please enter brand address"
        }


    }
});
$('#contactform').validate({
    rules:{
        name:{
            required:true
        },
        email: {
            required: true,
            email:true
        },
        phone_number: {
            required: true
        },
        message:{
            required:true
        }
    },
    messages: {
        name:{
            required:"* Please enter the name"
        },
        email: {
            required: "* Please enter an email address",
            email : "* Please enter valid email"
        },
        phone_number:{
           required: "* Please enter the phone number"
        },
        message:{
            required:"Please enter the message"
        }
    }
});
$('.add-review').validate({
    rules:{
        review_text:{
            required: true,
        }
  },
    messages: {
        review_text:{
          required:"Please write some review"
        }
    }
});
