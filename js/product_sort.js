/**
 * Created by Tonda on 30.03.2017.
 */

function SortProducts(data) {
    this.products = {};
    this.products.data = data;
    this.products.coverEl = document.getElementsByName("products-cover");
    this.products.order = [];
    this.products.positions = [];

    this.animation = {};
    this.animation.timer = null;
    this.animation.duration = 300;
    this.animation.fps = 50;
    this.animation.oneTimeoutDuration = this.animation.duration / (this.animation.duration/1000 * this.animation.fps);

    this.products.filter = {};
    this.products.filterCount = {};

    this.init();

}

SortProducts.prototype.init = function () {
    // store html for each product and add sortNumber
    for(var i = 0; i < this.products.data.length; i++) {
        var id = this.products.data[i]._id["$oid"];
        this.products.data[i].html = this.getProductHTML(id);

        this.products.order[i] = id;

        this.products.data[i].sort = i;
        this.products.data[i].showed = true;
    }

    this.fillFilter();
    this.setVisibility();
    this.showHideProducts(false);


}

SortProducts.prototype.getProductHTML = function (id) {
    return document.getElementById("product-"+id).outerHTML;
}

SortProducts.prototype.sortProducts = function (criterium, order) {
    this.sortData(criterium, order);
    this.getPositions();
    this.moveProducts();

}

SortProducts.prototype.sortData = function(criterium, order) {

    for (var i = 0; i < this.products.data.length-1; i++) {
        var min = i;
        for (var k = i+1; k < this.products.data.length; k++) {
            if (this.products.data[k][criterium]*1 < this.products.data[min][criterium]*1) {
                min = k;
            }
        }
        var tmp = this.products.data[i];
        this.products.data[i] = this.products.data[min];
        this.products.data[min] = tmp;
    }

    if (order == 1) {
        this.products.data = this.products.data.reverse();
    }
}

SortProducts.prototype.displayProducts = function () {
    var html = "";
    for(var i = 0; i < this.products.data.length; i++) {
        html += this.products.data[i].html;
    }
    html += "<div style='clear: both'></div>";

    document.getElementById("products-cover").innerHTML = html;
    this.showHideProducts(false);
    document.getElementById("products-cover").style.height = "auto";
}

SortProducts.prototype.setVisibility = function () {

    for(var i = 0; i < this.products.data.length; i++) {
        var show = true;
        var product = this.products.data[i];
        if (this.products.filter.gender.indexOf(product.gender) > -1 && this.products.filter.gender.length  < this.products.filterCount.gender) {
            show = false;
        }

        if (this.products.filter.brand.indexOf(product.brand) > -1 && this.products.filter.brand.length < this.products.filterCount.brand) {
            show = false;
        }



        var filterPrice = this.products.filter.price;
        var x = Math.ceil(product.price/100.0)*100;
        var mm = this.products.filter.price.indexOf(Math.ceil(product.price/100.0)*100);
        if (this.products.filter.price.indexOf(Math.ceil(product.price/100.0)*100) >= 0  && this.products.filter.price.length  < this.products.filterCount.price) {
            show = false;
        }

        this.products.data[i].showed = show;
    }
}

SortProducts.prototype.fillFilter = function () {
    var filterEl = document.getElementById("sort-filter");
    var inputs = filterEl.getElementsByTagName("input");
    this.products.filterCount = {};
    for (var i = 0; i < inputs.length; i++) {
        var filterName = inputs[i].getAttribute("data-filter");
        var filterValue = inputs[i].getAttribute("data-filter-value");
        if (filterName == "price") {
            filterValue = filterValue*1;
        }
        this.products.filterCount[filterName] = this.products.filterCount[filterName] || 0;
        this.products.filterCount[filterName]++;

        this.products.filter[filterName] = this.products.filter[filterName] || [];
        if (!inputs[i].checked) {
            if (this.products.filter[filterName].indexOf(filterValue)  == -1) {
                this.products.filter[filterName].push(filterValue);
            }
        } else {
            if (this.products.filter[filterName].indexOf(filterValue) > -1) {
                this.products.filter[filterName].splice(this.products.filter[filterName].indexOf(filterValue), 1);
            }
        }
    }

    return this.products.filter;
}

SortProducts.prototype.showHideProducts = function(animation) {

    var animate = (animation)?"-animate":"";
    for (var i = 0; i < this.products.data.length; i++) {
        var id = this.products.data[i]._id["$oid"];



        if (this.products.data[i].showed) {
            if (document.getElementById("product-"+id).className.search("showed") == -1) {
                document.getElementById("product-"+id).className = "col-md-3  product-item product-showed"+animate;

            }
        } else {
            if (document.getElementById("product-"+id).className.search("hidden") == -1) {
                document.getElementById("product-" + id).className = "col-md-3  product-item product-hidden" + animate;
            }
        }
    }
}


SortProducts.prototype.filter = function () {
    this.fillFilter();
    this.setVisibility();
    this.showHideProducts(true);
}

SortProducts.prototype.animateSorting = function () {

}

SortProducts.prototype.getPositions = function () {
    this.products.positions = [];
    var elementsAll = document.getElementsByClassName("product-item");
    var elements = [];
    for (var i = 0; i < elementsAll.length; i++) {
        if (elementsAll[i].className.search("hidden") == -1) {
            elements.push(elementsAll[i]);
        }
    }
    var j = 0;
    var frames = (this.animation.duration/1000 * this.animation.fps);

    for (var i = 0; i < this.products.data.length; i++) {
        if (this.products.data[i].showed) {
            var currentPosition = {};
            currentPosition.left = document.getElementById("product-"+this.products.data[i]._id["$oid"]).offsetLeft;
            currentPosition.top = document.getElementById("product-"+this.products.data[i]._id["$oid"]).offsetTop;


            this.products.data[i].newPosition = {};
            this.products.data[i].newPosition.top = elements[j].offsetTop;
            this.products.data[i].newPosition.left = elements[j].offsetLeft;

            this.products.data[i].moveStep = {};
            this.products.data[i].moveStep.top = (elements[j].offsetTop - currentPosition.top) / frames;
            this.products.data[i].moveStep.left = (elements[j].offsetLeft - currentPosition.left) / frames;
         /*   var leftPrevious = elements[j].offsetLeft;
            var moveTop = this.products.data[i].moveStep.top;
            var moveLeft = this.products.data[i].moveStep.left;*/

            j++;
        }
    }
}


SortProducts.prototype.moveProducts = function () {


    document.getElementById("products-cover").style.height = window.getComputedStyle(document.getElementById("products-cover")).height;

    for (var i = 0; i < this.products.data.length; i++) {
        if (this.products.data[i].showed) {
            var id = this.products.data[i]._id["$oid"];

            this.products.data[i].currentPosition = {};
            this.products.data[i].currentPosition.left = document.getElementById("product-"+id).offsetLeft+"px";
            this.products.data[i].currentPosition.top = document.getElementById("product-"+id).offsetTop+"px";
        }
    }

    for (var i = 0; i < this.products.data.length; i++) {
        if (this.products.data[i].showed) {
            var id = this.products.data[i]._id["$oid"];
            document.getElementById("product-"+id).style.width = window.getComputedStyle(document.getElementById("product-"+id)).width;
            document.getElementById("product-"+id).style.height = window.getComputedStyle(document.getElementById("product-"+id)).height;

            document.getElementById("product-"+id).style.top = this.products.data[i].currentPosition.top
            document.getElementById("product-"+id).style.left = this.products.data[i].currentPosition.left;
            document.getElementById("product-"+id).style.position = "absolute";
        }
    }

    clearTimeout(this.animation.timer);

    var frames = (this.animation.duration/1000 * this.animation.fps);
    var frame = 1;
    var self = this;

    function animateProduct() {

        for (var i = 0; i < self.products.data.length; i++) {
            if (self.products.data[i].showed) {
                var id = self.products.data[i]._id["$oid"];
                var left = document.getElementById("product-"+id).style.left.replace("px", "")*1;
                var top = document.getElementById("product-"+id).style.top.replace("px", "")*1;



                left += self.products.data[i].moveStep.left;
                top += self.products.data[i].moveStep.top;
                document.getElementById("product-"+id).style.top = top+"px";
                document.getElementById("product-"+id).style.left = left+"px";
            }
        }

        self.showHideProducts(false);

        if (frame < frames) {
            self.animation.timer = setTimeout(function () {
                animateProduct();
            }, self.animation.oneTimeoutDuration);
        } else {
            console.log(self);
            self.displayProducts();

        }

        frame++;


    }

    animateProduct();

}