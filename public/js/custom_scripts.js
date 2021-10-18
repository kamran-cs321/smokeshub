$('.js-pscroll').each(function() {
    $(this).css('position', 'relative');
    $(this).css('overflow', 'hidden');
    var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
    });

    $(window).on('resize', function() {
        ps.update();
    })
});
$('#update_password').on('submit', (function(e) {

     var password = document.getElementById("new_password").value;

    var email = document.getElementById("new_email").value;
    var username = document.getElementById("new_username").value;

    e.preventDefault();
             
                $.ajax({
                    url: '/user/update-info',
                    type:"POST", 
                    data:{
                        email :email,
                        password:password,
                        username:username
                         
                        },
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    success: function(response){ 
                        console.log(response);
                        if(response == 1){

                            swal("Wait!", "Infomation Updated.", "success");

                        }else{
                            
                            swal("Wait!", "Incorrect Information.", "danger");

                        }
                         
                  
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                            
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);    
                        }
                    });            

}));
    $("#update_password1").submit(function(event) {

        event.preventDefault();
        var post_url = "{{ url('/user/update-info') }}";
        var form_data = $(this).serialize();
        swal("Wait!", " Request Sent!", "success");

        $.post(post_url, form_data, function(response) {
            if (response == 1) {

                $('#password').modal('hide');
                document.getElementById("update_password").reset();
                swal("Wait!", "You password has been successffullly updated..", "success");

            } else {
                swal("Wait!", " Incorrect Current Password  Failed!");


            }

        });

    });

$('#contact_form').on('submit', (function(e) {
    e.preventDefault();
    var user_email = document.getElementById("user_email").value;
    var user_phone = document.getElementById("user_phone").value;
    var user_message = document.getElementById("user_message").value;
    var user_name = document.getElementById("user_name").value;
              
                $.ajax({
                    url: '/user/contact',
                    type:"POST", 
                    data:{
                        username :user_name,
                        user_email :user_email,
                        user_phone :user_phone,
                        user_message :user_message
                        },
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    success: function(response){ 
                        console.log(response);
                        document.getElementById("contact_form").reset();
                        swal("Wait!", "We have received your message.", "success");
                  
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                            
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);    
                        }
                    });            

}));
$('#subscriber-request').on('submit', (function(e) {
    e.preventDefault();
    var email = document.getElementById("email_address").value;

              
                $.ajax({
                    url: '/user/subscribe',
                    type:"POST", 
                    data:{
                        email :email
                         
                        },
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    success: function(response){ 
                        console.log(response);
                        document.getElementById("email_address").value = "";
                        swal("Wait!", "You have Subscribed.", "success");
                  
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                            
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);    
                        }
                    });            

}));

/*	
function add_to_cart(product_id){
          
    $.ajax({
            url: '/add-to-cart',
            type:"POST",
            data:{
                product_name : this.value
                 
                },
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            success: function(response){ 
                console.log(response);
            
                if(response == 1){
                    
                swal("Wait!", "Operation Successfull!", "success");
                }else{
                    
                swal("error!", "you can't repeat same operation on one record!", "danger");
                }

                location.reload();
                    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                    
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);    
                }
            });

}
*/
$( "#search_input" ).keyup(function() {
     
            $.ajax({
            url: '/search-product-info',
            type:"POST",
            data:{
                product_name : this.value
                 
                },
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            success: function(response){ 
                console.log(response);
                 
                $('#products_grid').html(response); 


		//    if(response == 1){
                    
        //         swal("Wait!", "Operation Successfull!", "success");
        //         } 

            //	location.reload();
                    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                    
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);    
                }
            });
         
    });
    function fetch_cart(){
        $.ajax({
            url: '/fetch-cart-info',
            type:"GET", 
            success: function(response){ 
                console.log(response);
                $('#cart_section').html(response); 

            //	location.reload();
                    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                    
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);    
                }
            });

    }

    function fetch_product_info(product_id){
         
        $.ajax({
            url: '/fetch-product-info',
            type:"POST", 
            data:{
                product_id : product_id
                 
                },
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            success: function(response){ 
                console.log(response);
                $('#product_info_section').modal('show'); 

                $('#product_section_info').html(response); 

            //	location.reload();
                    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                    
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);    
                }
            });

    }
    function remove_backdoor(){
        
        $('.modal-backdrop').remove();

    }

    

    function add_to_cart(product_id){
        $.ajax({
            url: '/add-to-cart/'+product_id,
            type:"GET",
            success: function(response){ 
                console.log(response);
                $('#done').text(response);
                if(response == 1){
                    
                swal("Wait!", "Processed into cart!", "success");
                }else{
                    
                swal("error!", "you can't repeat same operation on one record!", "danger");
                }

            //	location.reload();
                    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                    
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);    
                }
            });
    }
    
    function remove_from_cart(product_id){
        $.ajax({
            url: '/remove-from-cart/'+product_id,
            type:"GET",
            success: function(response){ 
                console.log(response);
                $('#done').text(response);
                if(response == 1){
                    
                swal("Wait!", "Processed into cart!", "success");
                }else{
                    
                swal("error!", "you can't repeat same operation on one record!", "danger");
                }

            //	location.reload();
                    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                    
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);    
                }
            });
    }

    function delete_product(product_id){
        $.ajax({
            url: '/remove-product-cart/'+product_id,
            type:"GET",
            success: function(response){ 
                console.log(response);
                $('#done').text(response);
                if(response == 1){
                    
                swal("Wait!", "Processed info cart!", "success");
                }else{
                    
                swal("error!", "you can't repeat same operation on one record!", "danger");
                }

            //	location.reload();
                    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                    
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);    
                }
            });
    }
