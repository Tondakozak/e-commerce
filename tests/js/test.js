/**
 * Created by Tonda on 02.04.2017.
 */

QUnit.test("Add product", function (assert) {

    var sort = new SortProducts();

    var data = {
        "_id": {"$oid": "58de499517d5e025c0003826"},
        "name": "Base London Black",
        "description": "hese Derby shoes will introduce a sophisticated and classic style to a formal footwear collection. Offering a sleek leather design in black with seamed detailing, they are finished with secure lace-up fastenings and a smart almond toe.\r\n\r\n",
        "brand": "Derby",
        "price": 70,
        "quantity": 98,
        "size": 42,
        "category": ["black", "classic", "formal"],
        "gender": "male",
        "photos": ["084011769560.jpg"],
        "ordered_quantity": 2
    };

    sort.addProduct(data);

    assert.equal(sort.products.data[0].name, "Base London Black");


});

QUnit.test("Get First product", function (assert) {

    var sort = new SortProducts();
    fillByData(sort);
    var first = sort.getFirst();

    assert.equal(first.name, "Base London Black");


});

QUnit.test("Get Last product", function (assert) {

    var sort = new SortProducts();
    fillByData(sort);
    var last = sort.getLast();

    assert.equal(last.name, "Silver diamante trim");


});


QUnit.test("Sort Products By Price Lowest First", function (assert) {

    var sort = new SortProducts();
    fillByData(sort);

    sort.sortData("price", 0);

    var first = sort.getFirst();

    assert.equal(first.price, 10);


});

QUnit.test("Sort Products By Price Highest First", function (assert) {

    var sort = new SortProducts();
    fillByData(sort);

    sort.sortData("price", 1);

    var first = sort.getFirst();

    assert.equal(first.price, 250);


});


QUnit.test("Sort Products By Popularity", function (assert) {

    var sort = new SortProducts();
    fillByData(sort);

    sort.sortData("ordered_quantity", 1);

    var first = sort.getFirst();

    assert.equal(first.name, "Mantaray Tan leather lace up boots");


});








function fillByData(obj) {
    var data = {
        "_id": {"$oid": "58de499517d5e025c0003826"},
        "name": "Base London Black",
        "description": "hese Derby shoes will introduce a sophisticated and classic style to a formal footwear collection. Offering a sleek leather design in black with seamed detailing, they are finished with secure lace-up fastenings and a smart almond toe.\r\n\r\n",
        "brand": "Derby",
        "price": 70,
        "quantity": 98,
        "size": 42,
        "category": ["black", "classic", "formal"],
        "gender": "male",
        "photos": ["084011769560.jpg"],
        "ordered_quantity": 2
    };

    var data2 = {
        "_id": {"$oid": "58de49f017d5e025c0003827"},
        "name": "Mantaray Tan leather lace up boots",
        "description": "These classic boots from Mantaray will make a great addition to a man&#39;s off-duty footwear collection. ",
        "brand": "Mantaray",
        "price": 10,
        "quantity": 493,
        "size": 35,
        "category": ["brown", "off-duty", "leather"],
        "gender": "male",
        "photos": ["084010723770.jpg"],
        "ordered_quantity": 7
    };


    var data3 = {
        "_id": {"$oid": "58de4d0c17d5e025c000382d"},
        "name": "Silver diamante trim",
        "description": "From Debut, these sandals are perfect for adding a touch of sparkle to an evening ensemble. In silver with a pretty diamante trim, this eye-catching pair offers an adjustable.",
        "brand": "Debut",
        "price": 250,
        "quantity": 500,
        "size": 34,
        "category": ["silver", "sandals", "casual", "heel"],
        "gender": "female",
        "photos": ["sdfasf.jpg"],
        "ordered_quantity": 1
    };

    obj.addProduct(data);
    obj.addProduct(data2);
    obj.addProduct(data3);
}









var x = [{
    "_id": {"$oid": "58de499517d5e025c0003826"},
    "name": "Base London Black",
    "description": "hese Derby shoes will introduce a sophisticated and classic style to a formal footwear collection. Offering a sleek leather design in black with seamed detailing, they are finished with secure lace-up fastenings and a smart almond toe.\r\n\r\n",
    "brand": "Derby",
    "price": 70,
    "quantity": 98,
    "size": 42,
    "category": ["black", "classic", "formal"],
    "gender": "male",
    "photos": ["084011769560.jpg"],
    "ordered_quantity": 2
}, {
    "_id": {"$oid": "58de49f017d5e025c0003827"},
    "name": "Mantaray Tan leather lace up boots",
    "description": "These classic boots from Mantaray will make a great addition to a man&#39;s off-duty footwear collection. Made from genuine leather, their durable design features zip and lace fastenings for a secure and comfortable all-day fit. In tan, they will team effortlessly with denim and a chunky knit for weekend appeal.\r\n\r\n",
    "brand": "Mantaray",
    "price": 100,
    "quantity": 493,
    "size": 35,
    "category": ["brown", "off-duty", "leather"],
    "gender": "male",
    "photos": ["084010723770.jpg"],
    "ordered_quantity": 7
}, {
    "_id": {"$oid": "58de4a4617d5e025c0003828"},
    "name": "RJR.John Rocha Tan leather brogues",
    "description": "From our exclusive RJR.John Rocha range, these shoes have been designed in a classic brogue style with signature punched hole detailing. With a premium leather finish, this key transitional pair offers a smooth leather lining for both durability and comfort.\r\n\r\n",
    "brand": "RJR.John Rocha",
    "price": 125,
    "quantity": 494,
    "size": 36,
    "category": ["brown", "leather", "formal"],
    "gender": "male",
    "photos": ["084010723970.jpg"],
    "ordered_quantity": 6
}, {
    "_id": {"$oid": "58de4ac117d5e025c0003829"},
    "name": "Base London Tan",
    "description": "These Derby shoes will introduce a sophisticated and classic style to a formal footwear collection. Offering a sleek leather design in tan with seamed detailing, they are finished with secure lace-up fastenings and a smart almond toe.\r\n\r\n",
    "brand": "Derby",
    "price": 45,
    "quantity": 28,
    "size": 29,
    "category": ["brown", "classic", "formal"],
    "gender": "male",
    "photos": ["084011769670.jpg"],
    "ordered_quantity": 1
}, {
    "_id": {"$oid": "58de4d0c17d5e025c000382d"},
    "name": "Silver diamante trim",
    "description": "From Debut, these sandals are perfect for adding a touch of sparkle to an evening ensemble. In silver with a pretty diamante trim, this eye-catching pair offers an adjustable ankle buckle fastening and has been designed with a stiletto heel for feminine appeal.\r\n\r\n",
    "brand": "Debut",
    "price": 250,
    "quantity": 500,
    "size": 34,
    "category": ["silver", "sandals", "casual", "heel"],
    "gender": "female",
    "photos": ["sdfasf.jpg"],
    "ordered_quantity": 1
}, {
    "_id": {"$oid": "58de4d6517d5e025c000382e"},
    "name": "Silver Dawson",
    "description": "These &#39;Dawson&#39; mid court shoes are perfect for adding a touch of sparkle to an evening outfit. Their contemporary design is finished in silver with textured uppers and a stiletto heel.\r\n\r\n",
    "brand": "Debut",
    "price": 310,
    "quantity": 49,
    "size": 38,
    "category": ["silver", "heel", "formal,"],
    "gender": "female",
    "photos": ["050010681197.jpg"],
    "ordered_quantity": 1
}, {
    "_id": {"$oid": "58de52f917d5e025c0003834"},
    "name": "Mens Lightweight Trainers Running Shoes",
    "description": "People who has fat or wide feet should order a larger size.The image may show slight differences to the actual item in color and texture.",
    "brand": "Generic",
    "price": 19,
    "quantity": 48,
    "size": 42,
    "category": ["sport", "black", "casual", "trainers", "blue", "yellow", "textile"],
    "gender": "male",
    "photos": ["(2).jpg"],
    "ordered_quantity": 2
}, {
    "_id": {"$oid": "58de534717d5e025c0003835"},
    "name": "Mens Canvas Baseball Shoes Trainers - Baltimore",
    "description": "Mens Canvas Baseball Shoes Trainers - Baltimore\r\nClassic Casual Retro footwear available in sizes 6 - 12\r\n\r\n",
    "brand": "Generic",
    "price": 10,
    "quantity": 800,
    "size": 40,
    "category": ["sport", "white", "casual", "trainers", "textile"],
    "gender": "male",
    "photos": ["(0).jpg"],
    "ordered_quantity": 0
}];