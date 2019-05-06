<div class="container-fluid" style="padding:5px;margin-left: 10px;margin-right: 10px;" >

    <div class="row">
        <div class="col-md-2">
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar">
                    <ul class="nav" id="main-menu">
                        <form method="POST" action="<?php echo base_url(); ?>index.php/ProductController/viewProducts" >
                            <h4>Filter</h4>
                            <li>
                                <h4>Category</h4>
                                <div style="margin-left:20px;">
                                    <select class="form-control" id="selCategory" name="sel_Category">
                                        <option value="0">---No Category---</option>
                                        <?php foreach ($categories as $item) {?>
                                            <option <?php
if (isset($filterData['category'])) {
    if ($filterData['category'] == $item->id) {
        echo "selected";
    }
}
    ?> value="<?php echo $item->id; ?>"><?php echo $item->categoryTitle; ?></option>

                                        <?php }?>
                                    </select>
                                </div>

                            </li>
                                
                                </div>
                            </li>-->
                            <li>
                                <h4>Price</h4>
                                <div style="margin-left:20px;">
                                    <input type="checkbox" <?php
if (isset($filterData['price'])) {
    if (array_search("1000,2000", $filterData['price']) !== false) {
        echo "checked";
    }
}
?> name="filterPrice[]" value="1000,2000" /> 1000 - 2000 <br>
                                    <input type="checkbox" <?php
if (isset($filterData['price'])) {
    if (array_search("500,1000", $filterData['price']) !== false) {
        echo "checked";
    }
}
?>  name="filterPrice[]" value="500,1000" /> 500 - 1000 <br>
                                    <input type="checkbox" <?php
if (isset($filterData['price'])) {
    if (array_search("250,500", $filterData['price']) !== false) {
        echo "checked";
    }
}
?>   name="filterPrice[]" value="250,500" /> 250 - 500 <br>
                                    <input type="checkbox" <?php
if (isset($filterData['price'])) {
    if (array_search("100,250", $filterData['price']) !== false) {
        echo "checked";
    }
}
?>   name="filterPrice[]" value="100,250" /> 100 - 250 <br>
                                    <input type="checkbox" <?php
if (isset($filterData['price'])) {
    if (array_search("50,100", $filterData['price']) !== false) {
        echo "checked";
    }
}
?>   name="filterPrice[]" value="50,100" /> 50 - 100 <br>
                                    <input type="checkbox" <?php
if (isset($filterData['price'])) {
    if (array_search("0,50", $filterData['price']) !== false) {
        echo "checked";
    }
}
?>   name="filterPrice[]" value="0,50" /> 0 - 50 <br>
                                </div>
                            </li>
                            <li>
                                <br>
                                <input type="submit" name="filterStatus" class="form-control" value="Apply" />
                            </li>
                        </form>
                    </ul>
                </div>

            </nav>
            <!--             /. NAV SIDE  -->
        </div>
        <div class="col-md-10">
            <?php
if ($products) {
    $cartId = $this->CustomerModel->getCustomersByCustomerId($this->session->userdata('userId'))->cart_id;
    foreach ($products as $item) {
        $offerData = $this->Offers_model->getPrice($item->pid);
        ?>
                    <div class="col-sm-3 col-lg-3 col-md-3" >
                        <div class="thumbnail" style="height:400px;">
                            <?php if ($offerData['hasOffer']) {?>
                                <h4 style="position:absolute;font-size: 20px;float:left;background-color: orangered;color:white;padding:5px;">Offer</h4>
                            <?php }?>
                            <img src="<?php
if ($item->image != '') {
            echo base_url() . $item->image;
        } else {
            echo base_url() . 'assets/images/noImage.jpg';
        }
        ?>" class="center-block" style="height:150px;" />
                            <div class="caption">

                                <h4><a href="#"><?php echo $item->pname ?></a></h4>
                                <h4 class="pull-right">
                                    <?php
if ($offerData['hasOffer']) {
            echo '<s style="color:gray;font-size:15px;"><i class="fa fa-rupee"></i>. ' . $item->price . '</s> <i class="fa fa-rupee"></i>' . $offerData['price'];
        } else {
            echo '<i class="fa fa-rupee"></i>' . $offerData['price'];
        }
        ?>
                                </h4>

                                <p><?php echo $item->manufacturer_name ?></p>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                            </div>
                            <a type="button" class="btn btn-xs btn-success btnAddList" style="margin:10px;" data-id="<?php echo $item->pid; ?>" href="<?php echo base_url(); ?>index.php/Product_list_details/add_list_item/<?php echo $cartId; ?>/<?php echo $item->pid; ?>" ><i class="fa fa-shopping-cart"></i> Cart</a>
                            <button type="button" class="btn btn-xs btn-primary btnAddList pull-right" style="margin:10px;" data-id="<?php echo $item->pid; ?>" data-toggle="modal" data-target="#myModal">Add to List</button>

                        </div>
                    </div>
                    <?php
}
} else {
    ?>
                <div class="row text-center">
                    <div class="col-md-6 col-md-offset-3 alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>NO PRODUCTS FOUND</strong>
                    </div>

                </div>
            <?php }
?>
        </div>
    </div>

</div>

<!-- Modal to display all wishlists of the customer -->

