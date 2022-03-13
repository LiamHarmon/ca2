// Product Name Validation
function productName_validation(){
    'use strict';
    var product_name = document.getElementById("name");
    var product_value = document.getElementById("name").value;
    var product_length = product_value.length;
    var letters = /^[0-9A-Za-z ]*$/;
    if(product_length < 4 || !product_value.match(letters))
    {
    document.getElementById('name_err').innerHTML = 'Product Name must be at least 4 characters long and can contain numbers.';
    product_name.focus();
    document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('name_err').innerHTML = 'Valid Product Name';
    document.getElementById('name_err').style.color = "#00AF33";
    }
    }

    // Product Description Validation
    function productDescription_validation(){
        'use strict';
        var description_name = document.getElementById("description");
        var description_value = document.getElementById("description").value;
        var description_length = description_value.length;
        var letters = /^[-@.,'\/#&+\w\s]*$/;
        if(description_length < 50 || !description_value.match(letters))
        {
        document.getElementById('desc_err').innerHTML = 'Product Description must contain letters and can contain alphanumeric characters as well.';
        description_name.focus();
        document.getElementById('desc_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('desc_err').innerHTML = 'Valid Product Description';
        document.getElementById('desc_err').style.color = "#00AF33";
        }
        }

        // Product Price Validation
    function productPrice_validation(){
        'use strict';
        var price_name = document.getElementById("price");
        var price_value = document.getElementById("price").value;
        if(price_value < 50 || price_value > 300)
        {
        document.getElementById('price_err').innerHTML = 'Product Price cannot be less than $50 and greater than $300';
        price_name.focus();
        document.getElementById('price_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('price_err').innerHTML = 'Valid Product Price';
        document.getElementById('price_err').style.color = "#00AF33";
        }
        }