jQuery(document).ready(function () {
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
               

                console.log("Response : ", response);
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
});
