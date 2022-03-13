function productName_validation(){
    'use strict';
    var product_name = document.getElementById("name");
    var product_value = document.getElementById("name").value;
    var product_length = product_value.length;
    var letters = /^[0-9A-Za-z\s]*$/;
    if(product_length < 4 || !product_value.match(letters))
    {
    document.getElementById('name_err').innerHTML = 'Product Name must be at least 4 characters long and can contain numbers.';
    product_name.focus();
    document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('name_err').innerHTML = 'Valid username';
    document.getElementById('name_err').style.color = "#00AF33";
    }
    }

    function productDescription_validation(){
        'use strict';
        var product_description = document.getElementById("description");
        var product_value = document.getElementById("description").value;
        var product_length = product_value.length;
        var letters = /^[0-9A-Za-z\s]*$/;
        if(product_length < 10 || !product_value.match(letters))
        {
        document.getElementById('desc_err').innerHTML = 'Product Description must contain letters and can contain alphanumeric characters as well.';
        product_description.focus();
        document.getElementById('desc_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('desc_err').innerHTML = 'Valid description';
        document.getElementById('desc_err').style.color = "#00AF33";
        }
        }