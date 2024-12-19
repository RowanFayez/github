<?php
function component($product_name, $product_price, $product_image, $product_id) {
    echo "
    <div class='col-md-3'>
        <div class='pro'>
            <img src='$product_image' alt='$product_name'>
            <div class='des'>
                <h5>$product_name</h5>
                <span>$product_price</span>
                <h4>$product_price</h4>
                <form method='POST'>
                    <input type='hidden' name='product_id' value='$product_id'>
                    <button type='submit' name='add' class='cart'><i class='fa fa-shopping-cart'></i></button>
                </form>
            </div>
        </div>
    </div>";
}

function cartElement($productimg, $productname, $productprice, $productid, $quantity = 1)
{
    $element = "
    <form action='cart.php?action=remove&id=$productid' method='post' class='cart-items'>
        <div class='border rounded'>
            <div class='row bg-white'>
                <div class='col-md-3 pl-0'>
                    <img src='$productimg' alt='Product Image' class='img-fluid'>
                </div>
                <div class='col-md-6'>
                    <h5 class='pt-2'>$productname</h5>
                    <small class='text-secondary'>Price: $$productprice</small>
                    <div class='qty d-flex pt-2'>
                        <small>Qty: $quantity</small>
                    </div>
                    <div class='total pt-2'>
                        <small>Total: $" . ($productprice * $quantity) . "</small>
                    </div>
                </div>
                <div class='col-md-3 py-3'>
                    <button type='submit' class='btn btn-warning'>Remove</button>
                </div>
            </div>
        </div>
    </form>
    ";
    echo $element;
}

?>
