<?php
/*
 * A view of the order catalogue, with a select widget for product
 * category and a table of products in the currently-selected
 * category.
 * 
 * Input params: 
 * 
 */

define('COMBO_SIZE', 10);  // Number of lines to display

$orderArray = array("id" => "Order ID", 
    "customerID" =>  "Customer Name", 
    "employeeID" => "Employee Name",
    "orderDate" => "Order Date",
    "requiredDate" => "Required Date",
    "shippedDate" => "Shipped Date",
    "shipVia" => "Shipped Via",
    "freight" => "Freight Cost ($)");

$orderDetailsArray = array("id" => "Order Details ID", 
    "productID" => "Product ID",
    "quantity" => "Quantity",
    "discount" => "Discount");

/*
 * Return the HTML for a div containing a label, a combo box and a 'go'
 * button. 
 * @param string $label - text to display as a label
 * @param assoc-array $map - a map from value to name
 * @param int $selectedRowValue - the value of the currently-selected option
 * @param int $size - the number of elements to display
 * @return - an html string for display
 */
function comboBoxHtml($label, $map, $selectedRowValue, $size=1) {
    $html = "<div class='combobox'><span class='combo-label'>$label:</span> ";
    $html .= "<select id='$label' name='$label' size='$size'>";
    foreach ($map as $id => $name) {
        if ($id === intval($selectedRowValue)) {
            $selected = 'selected';
        } else {
            $selected = '';
        }
        $html .= "<option value='$id' $selected>$name</option>\n";
    }
    $html .= "</select>\n";
    $html .= "<input type='submit' name='$label-submit' value='Go'>\n";
    $html .= "</div>";
    return $html;
}

?>

<h1>Northwind Order Browser</h1>

<div class='order-browser'> 
    <form id="browser-form" action="<?php echo site_url('orders/browser'); ?>" method="get">
        <?php
        echo comboBoxHtml('Order', $orderMap, $order->id, COMBO_SIZE);
     
        ?>
        <div class='product-details'>
        <h2>Order</h2>
        <table id='ProductDetails'>
            <?php foreach ((array) $orderArray as $field => $orderItem) { ?>
                <tr>
                    <?php
                    echo ("<td> $orderItem </t>");
                    
                    if ($field == 'customerID') {
                        echo ("<td>" . $customer->companyName. "</td>");
                    } elseif ($field =='employeeID') {
                        echo ("<td>" . $employee-> firstName . " ". $employee->lastName. "</td>");
                    } elseif ($field =='shipVia') {
                        echo ("<td>" . $shipper-> companyName. "</td>");  
                    } else {
                        echo ("<td>" . $order->$field . "</td>");
                    }
            }
            ?>
                
        </table>
        
        
        
        
                <h3>Order Details</h3>
        <table id='ProductDetails'>
            <?php foreach ((array) $orderDetailsArray as $field => $orderDetsItem) { ?>
                <tr>
                    <?php
                    echo ("<td> $orderDetsItem </t>");
                    if ($field == 'productID') {
                        echo ("<td>" . $orderDetailsMap[$orderDetails->productID]. "</td>");
                    } else {
                        echo ("<td>" . $orderDetails->$field . "</td>");
                    }
                    
                    
                    

                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
        </div>
    </form>
</div>
