/**
 * Created by Tonda on 17.03.2017.
 */


function add_into_cart(event, form_element) {
    event.preventDefault();
    var product_id = form_element["product-id"].value;
    var product_quantity = form_element["product-quantity"].value;


    var request = new XMLHttpRequest();
    request.open("POST", "add_to_cart.php?ajax=true", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("product-id=" + product_id + "&product-quantity=" + product_quantity);

    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response;
            try {
                response = JSON.parse(this.responseText);
            } catch (e) {
                alert("error");
            }

            if (response.result) {
                update_items_in_cart(response.inCart);
            } else {
                alert(response.error);
            }



        }
    };

    return false;
}


function update_items_in_cart(num) {
    document.getElementById("nav-cart-items").innerHTML = "("+num+")";

}