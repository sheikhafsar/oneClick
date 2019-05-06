
<div class="container" style="padding:5px;margin-left: 10px;margin-right: 10px;" >

    <div class="row">

        <div class="col-md-12">
            <?php
if ($products) {
    foreach ($products as $item) {
        ?>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="<?php
if ($item->image != '') {
            echo base_url() . $item->image;
        } else {
            echo base_url() . 'assets/images/noImage.jpg';
        }
        ?>" class="center-block" style="height:160px;width:150px" />
                            <div class="caption">
                                <h4 class="pull-right">Rs. <?php echo $item->price ?></h4>
                                <h4><a href="#"><?php echo $item->pname ?></a>
                                </h4>
                                <p><?php echo $item->manufacturer_name ?></p>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                            </div>
                            <button type="button" class="btn btn-xs btn-primary btnAddList" style="margin:10px;" data-id="<?php echo $item->pid; ?>" data-toggle="modal" data-target="#myModal">Add to List</button>

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
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-md-6 col-md-offset-3">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Wish Lists</h4>
            </div>
            <div class="modal-body">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="list-group">

                            <?php
                                $count = 0;
                                if ($product_list_details) {
                            ?>

                                <?php foreach ($product_list_details as $list) {?>

                                    <?php echo '<a class="list-group-item listItem listNames" data-link="' . base_url() . 'index.php/Product_list_details/add_list_item/' . $list->list_id . '/" >' . $list->list_name . '</a>'; ?>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
