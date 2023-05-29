jQuery(document).ready(function(){
   jQuery(".add-new-blog-btn").click(function(){
    jQuery(".blog-add-modal").modal("show");
   });

   jQuery("#create-new-blog").click(function(){
    var category_id = jQuery(".category_id").val();
    var blog_title  =jQuery(".blog-title").val();
    var blog_description = jQuery(".blog-description").val()
    var image=jQuery(".blog-image").val();

    const data ={
        'category_id':category_id,
        'blog_title':blog_title,
        'blog_description':blog_description,
        'image':image
    }
    console.log("All Data ",data);

   });
});
