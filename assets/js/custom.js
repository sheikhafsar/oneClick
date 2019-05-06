
$(document).ready(function () {
    var base_url = $("#base_url").val();
    var product_id = 0;
    $('[data-toggle="popover"]').popover();  //initializing bootstrap popover plugin 
    $('.datepicker').datepicker({
        autoclose:true,
        format:'yyyy-mm-dd',
        startDate:'-0d'
    });
    $('.datepicker2').datepicker({
        autoclose:true,
        format:'yyyy-mm-dd'
    });
    $(".yearPicker").datepicker( {
        autoclose:true,
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });

    $(".monthPicker").datepicker( {
        autoclose:true,
        format: " yyyy-mm", // Notice the Extra space at the beginning
        viewMode: "months", 
        minViewMode: "months"
    });
    
   $("#dataTable-deliveryList").DataTable({
        "paging": false,
        "lengthChange": false
    });
    
    $("#dataTable-products").DataTable({
        "paging": true,
        "lengthChange": true
    });
     
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".image-box").change(function () {
        readURL(this);
    });

    $(".btnAddList").click(function () {
        product_id = $(this).attr("data-id");
    //alert(pid);
    });
    $(".listNames").click(function () {
        var link = $(this).attr("data-link") + product_id;
        //alert(link);
        window.location.href = link;
    });

    $("#chkuseCredits").click(function () {
        if ($(this).is(":checked")) {
            $("#txtcreditValue").removeAttr("disabled");
        } else {
            $("#txtcreditValue").val(0);
            $("#txtcreditValue").attr("disabled", "TRUE");
        }
    });
    $(".delUser").click(function () {
        var id = $(this).attr("data-id");
        var link =$("#btnDelete").attr("href") + id;
        $("#btnDelete").attr("href",link);        
    });
    
    $(".delProduct").click(function () {
        var id = $(this).attr("data-id");
        var link =$("#btnDelete").attr("href") + id;
        $("#btnDelete").attr("href",link);        
    });
    
    $(".delCategory").click(function () {
        var id = $(this).attr("data-id");
        var link =$("#btnDelete").attr("href") + id;
        $("#btnDelete").attr("href",link);        
    });
    
    $(".delFeedback").click(function () {
        var id = $(this).attr("data-id");
        var link =$("#btnDelete").attr("href") + id;
        $("#btnDelete").attr("href",link);        
    });
    
    $(".delOffer").click(function () {
        var id = $(this).attr("data-id");
        var link =$("#btnDelete").attr("href") + id;
        $("#btnDelete").attr("href",link);        
    });
    
    $(".delNews").click(function () {
        var id = $(this).attr("data-id");
        var link =$("#btnDelete").attr("href") + id;
        $("#btnDelete").attr("href",link);        
    });
    
    $(".delGallery").click(function () {
        var id = $(this).attr("data-id");
        var link =$("#btnDelete").attr("href") + id;
        $("#btnDelete").attr("href",link);        
    });
    
    $(".delStore").click(function () {
        var id = $(this).attr("data-id");
        var link =$("#btnDelete").attr("href") + id;
        $("#btnDelete").attr("href",link);        
    });



    $(".userEdit").click(function () {
        var id = $(this).attr("data-id");
        var base_url = $("#base_url").val();
        $(".error-msg").addClass("hidden");
        
        $.ajax({
            type: "Post",
            url: base_url + "index.php/User/getUser_detailsbyId",
            cache: false,
            dataType: 'json',
            data: ({
                'user_id': id

            }),
            success: function (data) {
                $("#hdnUserId").val(data.user_id);   
                $("#txtFirstName").val(data.firstName);
                $("#txtLastName").val(data.lastName);
                $("#txtUserName").val(data.username);
                $("#selUserType").val(data.userType);
            }

        });
      

    });
    
    $(".editStore").click(function () {
        var id = $(this).attr("data-id");
        var base_url = $("#base_url").val();       
        $(".error-msg").addClass("hidden");         
        $.ajax({
            type: "Post",
            url: base_url + "index.php/Store/getStores_detailsbyId",
            cache: false,
            dataType: 'json',
            data: ({
                'store_id': id

            }),
            success: function (data) {               
                $("#hdnStoreId").val(data.id);   
                $("#txtStoreName").val(data.name);
                $("#txtAddress").val(data.address);
                $("#txtLat").val(data.lat);
                $("#txtlong").val(data.lng);
            }

        });
      

    });
    
    $(".editProduct").click(function () {
        var id = $(this).attr("data-id");
        var base_url = $("#base_url").val();
        //alert(base_url);
        $.ajax({
            type: "Post",
            url: base_url + "index.php/Product/getProduct_detailsbyId",
            cache: false,
            dataType: 'json',
            data: ({
                'product_id': id

            }),
            success: function (data) {
                console.log(data);
                
                $("#hdnProductId").val(data.pid);   
                $("#txtProductName").val(data.pname);
                $("#txtManufName").val(data.manufacturer_name);
                $("#txtDateOfManuf").val(data.dt_of_manuf);
                $("#txtDateOfExpiry").val(data.dt_of_exp);
                $("#selCategory").val(data.category);
                $("#txtPrice").val(data.price);
                $("#txtStock").val(data.stock);
                if(data.image!=""){
                    $("#viewImage").attr("src",base_url + data.image);  
                }
            }

        });
      

    });
    
    $(".editCategory").click(function () {
        var id = $(this).attr("data-id");
        var base_url = $("#base_url").val();
        //alert(base_url);
        $.ajax({
            type: "Post",
            url: base_url + "index.php/Product/getCategory_detailsbyId",
            cache: false,
            dataType: 'json',
            data: ({
                'id': id

            }),
            success: function (data) {
                console.log(data);
                
                $("#hdnCategoryId").val(data.id);   
                $("#txtCategoryTitle").val(data.categoryTitle);
                $("#txtCategoryValue").val(data.categoryName);               
                $("#selCategoryParent").val(data.parentId);               
                if(data.image!=""){
                    $("#viewImage").attr("src",base_url + data.image);  
                }
            }

        });
      

    });
    
    $(".editOffer").click(function () {
        
        var id = $(this).attr("data-id");
        var base_url = $("#base_url").val();
        $(".error-msg").addClass("hidden");
        
        $.ajax({
            type: "Post",
            url: base_url + "index.php/Offer/getOffer_detailsbyId",
            cache: false,
            dataType: 'json',
            data: ({
                'offer_id': id
            }),
            success: function (data) {
                console.log(data);
                $("#hdnOfferId").val(data.id);   
                $("#txtOfferDescription").val(data.description);
                $("#txtStartDate").val(data.startDate);
                $("#txtEndDate").val(data.endDate);
                $("#selType").val(data.type);
                $("#selType").trigger("change");
                
                
               
                if(data.type=="category"){
                    $("#txtApplyTo_category").val(data.applyTo);
                } else if(data.type == "product"){
                    $("#txtApplyTo_product").val(data.applyTo);
                }
                $("#txtDiscountValue").val(data.discountValue);
                if(data.activeStatus=="enabled"){
                    $("#txtStatus").prop('checked',true);
                } else {
                    $("#txtStatus").prop('checked',false);
                }
            }

        });
      

    });
    
    $(".editNews").click(function () {
        
        var id = $(this).attr("data-id");
        var base_url = $("#base_url").val();
        $(".error-msg").addClass("hidden");
        
        $.ajax({
            type: "Post",
            url: base_url + "index.php/News/getNews_detailsbyId",
            cache: false,
            dataType: 'json',
            data: ({
                'news_id': id
            }),
            success: function (data) {
                console.log(data);
                $("#hdnNewsId").val(data.id);   
                $("#txtNewsTitle").val(data.title);
                $("#txtDescription").val(data.description);
                $("#selStatus$").val(data.activeStatus);
               
            }

        });
      

    });
    
    
    /*code to reset form when the modal is hidden*/
    $(".modal").on('hidden.bs.modal',function(){
        $(this).find('form').trigger('reset');
        $("#viewImage").attr("src",base_url + "assets/images/noImage.jpg"); 
        $(".hidden_id").val(0);
    });
    
    $("#selType").change(function(){
        console.log($(this).val());
        if($(this).val()=="all"){
            $("#applyTo_category").addClass("hidden");
            $("#applyTo_product").addClass("hidden");
        } else if($(this).val()=="category"){
            if($("#applyTo_category").hasClass("hidden")){
                $("#applyTo_category").removeClass("hidden");
            }
            if(!$("#applyTo_product").hasClass("hidden")){
                $("#applyTo_product").addClass("hidden");
            }
        } else if($(this).val()=="product"){
            if($("#applyTo_product").hasClass("hidden")){
                $("#applyTo_product").removeClass("hidden");
            }
            if(!$("#applyTo_category").hasClass("hidden")){
                $("#applyTo_category").addClass("hidden");
            }
        }
    });
    
    
    
    

    function show_formError(textbox,msg){
        var par = $("#"+ textbox).parent().find(".error-msg");
        par.text(msg);
        par.removeClass("hidden");
    }
    
    
    $(".editStore").click(function () {
        var id = $(this).attr("data-id");
        var base_url = $("#base_url").val();
        //alert(base_url);
        $.ajax({
            type: "Post",
            url: base_url + "index.php/Store/getStore_detailsbyId",
            cache: false,
            dataType: 'json',
            data: ({
                'id': id

            }),
            success: function (data) {
                console.log(data);
                
                $("#hdnStoreId").val(data.id);   
                $("#txtStoreName").val(data.name);
                $("#txtAddress").val(data.address);               
                $("#txtLat").val(data.lat);     
                $("#txtlong").val(data.lng);    
                
            }

        });
      

    });
//document.ready ends--------------------
});



//Bootstrap sidebar menu
$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
}) 