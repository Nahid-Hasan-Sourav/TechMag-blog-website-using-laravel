
jQuery(document).ready(function () {


    // ADD BLOG START HERE
    jQuery(".add-new-blog-btn").click(function () {
        jQuery(".blog-add-modal").modal("show");
    });

    jQuery("#create-new-blog").click(function () {
        var category_id = Number(jQuery(".category_id").val());
        var blog_title = jQuery(".blog-title").val();
        var blog_description = jQuery(".blog-description").val();
        //var image=jQuery(".blog-image").val();
        var image = jQuery(".blog-image")[0].files[0];

        // const data ={
        //     'category_id':category_id,
        //     'blog_title':blog_title,
        //     'blog_description':blog_description,
        //     'image':image

        // }
        var formData = new FormData();
        formData.append("category_id", category_id);
        formData.append("blog_title", blog_title);
        formData.append("blog_description", blog_description);
        formData.append("image", image);
        console.log("All Data ", formData);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "/dashboard/create-new-blog",
            type: "POST",
            // data:{
            //     'category_id':category_id,
            //     'blog_title':blog_title,
            //     'blog_description':blog_description,
            //     'image':image

            // } ,
            data: formData,
            contentType: false, // Set contentType to false for file uploads
            processData: false, // Set processData to false for file uploads
            success: function (response) {


               if(response.status == "success"){
                jQuery(".blog-add-modal").modal("hide");

                Swal.fire({
                    icon: 'success',
                    title: 'Blog Added',
                    text: 'The Blog has been successfully added.',
                    timer: 5000, // Set the timer to 3000 milliseconds (3 seconds)
                    showConfirmButton: true // Hide the "OK" button
                  }).then(() => {
                    // After the timer expires, reload the page
                    window.location.reload();
                  });

               }
            },
            error: function (xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            },
        });
    });

    // jQuery("#create-new-blog").click(function() {
    //     var category_id = jQuery(".category_id").val();
    //     var blog_title = jQuery(".blog-title").val();
    //     var blog_description = jQuery(".blog-description").val();
    //     var image = jQuery(".blog-image")[0].files[0];  // Get the file object

    //     var formData = new FormData();  // Create FormData object
    //     formData.append('category_id', category_id);
    //     formData.append('blog_title', blog_title);
    //     formData.append('blog_description', blog_description);
    //     formData.append('image', image);  // Append the file to FormData

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         url: "/dashboard/create-new-blog",
    //         type: "POST",
    //         data: formData,  // Pass the FormData object
    //         contentType: false,  // Set contentType to false for file uploads
    //         processData: false,  // Set processData to false for file uploads
    //         success: function(response) {
    //             console.log("Response: ", response);
    //         },
    //         error: function(xhr, status, error) {
    //             console.log("Error: ", error);
    //         }
    //     });
    // });



     // ADD BLOG START END HERE

    //UPDATE START HERE
    jQuery(".edit-blog-btn").click(function(){
        var id=jQuery(this).val();
        jQuery(".update-blog-btn").val(id);
        jQuery(".blog-edit-modal").modal("show");

        $.ajax({
            url:"/dashboard/ad/edit-blog/"+id,
            type:"GET",
            success:function(res){
                if(res.status=="200"){
                    console.log("Data all ",res.categories)
                    jQuery(".blog-title").val(res.data.blog_title);
                    jQuery(".blog-description").val(res.data.description);
                    // jQuery(".show-image").attr("src", "{{asset(' + res.data.image + ')}}");
                    // var imageUrl = "{{asset('')}}" + res.data.image;
                    // jQuery(".show-image").attr("src", imageUrl);
                    var assetPath = jQuery(".asset-path").data("asset");
                    var imageUrl = assetPath + res.data.image;
                    jQuery(".show-image").attr("src", imageUrl);

                    var categoriesSelect = jQuery('.category_option');
                        categoriesSelect.empty();

                        res.categories.forEach(function(category) {
                        var option = jQuery('<option>').val(category.id).text(category.category_name);

                        if (category.id === res.data.category_id) {
                            option.attr("selected", "selected");
                          }

                        categoriesSelect.append(option);
                      });
                }
                else if(res.status=="400"){
                    alert("not ok");
                }
            }
        })


    });

    jQuery(".update-blog-btn").click(function(){
        var id=jQuery(this).val();
        // alert(id)
        var category_id = jQuery("#category_option").val();
        var blog_title = jQuery(".blog_title").val();
        var description =jQuery("#blog-description").val();
        var image = jQuery("#blog_image")[0].files[0];

        var formData = new FormData();
        formData.append("category_id", category_id);
        formData.append("blog_title", blog_title);
        formData.append("description", description);
        formData.append("image", image);

        console.log("Form Data ",formData);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "/dashboard/ed/update/"+id,
            type: "POST",

            data: formData,
            contentType: false, // Set contentType to false for file uploads
            processData: false, // Set processData to false for file uploads
            success: function (response) {

                if(response.status == "200"){
                    // $('#datatable').find('tbody').html(response.updatedTableHTML)
                    // console.log("Check ",response.updatedTableHTML)

                    // window.location.reload();

                    jQuery(".blog-edit-modal").modal("hide");
                    Swal.fire({
                        icon: 'success',
                        title: 'Features Status Updated',
                        text: 'The Features Status has been successfully updated.',
                        timer: 5000, // Set the timer to 3000 milliseconds (3 seconds)
                        showConfirmButton: true // Hide the "OK" button
                      }).then(() => {
                        // After the timer expires, reload the page
                        window.location.reload();
                      });
                }

               console.log("Id",response);


            },
            error: function (xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            },
        });



    });

    //UPDATE END HERE


    //update featured status

    $('.status-button').click(function() {
        var blogId = $(this).val();
        // alert(blogId)

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: '/dashboard/ed/update/featureStatus/'+blogId, // Replace with your server-side endpoint URL
            type: 'POST',
            dataType: 'json',
            //data: { blogId: blogId },
            success: function(response) {
              if (response.status === 'success') {

                Swal.fire({
                    icon: 'success',
                    title: 'Features Status Updated',
                    text: 'The Features Status has been successfully updated.',
                    timer: 5000, // Set the timer to 3000 milliseconds (3 seconds)
                    showConfirmButton: true // Hide the "OK" button
                  }).then(() => {
                    // After the timer expires, reload the page
                    window.location.reload();
                  });

              }
            },
            error: function(xhr, status, error) {
              console.log('Error:', error);
            }
          });
        });


})
