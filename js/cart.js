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

/*
db.users.update({
    "_id":"32fg0n6jsd10jdhpuu6uhp4nb1"
    },{address: {line_1: "Buxton Roand 155",
        line_2: "Bud 155",
        town: "Londýn",
        postcode: "nw9 5ha"
    },
    name: "tonda Kozák",
    tel: "555555555"}
)*/


function manage_cart() {
    var inputs = document.getElementsByTagName("input");
    var timeouts = {};
    for (var i = 0; i < inputs.length; i++) {
        (function(i) {
            if (inputs[i].hasAttribute("data-product")) {
                inputs[i].onchange = function () {manage_change_quantity(inputs[i]);};
                inputs[i].onkeyup = function () {manage_change_quantity(inputs[i]);};
            }
        })(i);

    }


    function manage_change_quantity(inp) {
        var product_id = inp.getAttribute("data-product-id");
        if (typeof timeouts[product_id] != "undefined") {
            clearTimeout(timeouts[product_id]);
        }
        timeouts[product_id] = setTimeout(function () {change_quantity(inp)}, 300);
    }

    function change_quantity(inp) {
        var product_id = inp.getAttribute("data-product-id");
        var new_quantity = inp.value*1;
        var old_quantity = inp.getAttribute("data-product-value")*1;
        var quantity = new_quantity - old_quantity;

        document.getElementById("loader-"+(product_id)).style.visibility = "visible";
        inp.disabled = true;

        if (new_quantity == 0) {
            document.getElementById("row-"+product_id).style.opacity = 0.3;
        } else {
            document.getElementById("row-"+product_id).style.opacity = 1;
        }

        var request = new XMLHttpRequest();
        request.open("POST", "add_to_cart.php?ajax=true", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("product-id=" + product_id + "&product-quantity=" + quantity);

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
                    update_prices(inp)
                } else {
                    alert(response.error);
                    inp.value = old_quantity;
                }

                document.getElementById("loader-"+(product_id)).style.visibility = "hidden";
                inp.disabled = false;

            }
        };
    }


    function update_prices(inp, new_quantity) {
        var product_id = inp.getAttribute("data-product-id");
        var new_quantity = inp.value*1;
        var old_quantity = inp.getAttribute("data-product-value")*1;
        var quantity = new_quantity - old_quantity;

        var old_price = document.getElementById("price-"+product_id).getAttribute("data-price")*1;
        var new_price = new_quantity * (inp.getAttribute("data-product-price")*1);

        var price_diff = new_price - old_price;

        // update total item price
        document.getElementById("price-"+product_id).setAttribute("data-price", ""+new_price);
        document.getElementById("price-"+product_id).innerHTML = "£"+new_price;

        // update total price
        var total_price = document.getElementById("total-price").getAttribute("data-price")*1 + price_diff;
        document.getElementById("total-price").setAttribute("data-price", ""+total_price);
        document.getElementById("total-price").innerHTML = "£"+total_price;

        // update total number of items
        var total_quantity = document.getElementById("total-quantity").getAttribute("data-quantity")*1 + (new_quantity - old_quantity);
        document.getElementById("total-quantity").setAttribute("data-quantity", ""+total_quantity);
        document.getElementById("total-quantity").innerHTML = total_quantity;

        inp.setAttribute("data-product-value", new_quantity);
    }
}

manage_cart();