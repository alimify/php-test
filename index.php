<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel PHP Skill Test - 60 Mint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  <div class="container">

  <div class="row">
    <div class="col-md-6">
            <form id="form" method="post" class="m-5">
                <div class="alert alert-success d-none" id="success">
                </div>
            <div class="form-group">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" id="product_name" name="product_name" class="form-control" required/>
            </div>
            <div class="form-group">
                <label class="form-label" for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required/>
            </div>
            <div class="form-group">
                <label class="form-label" for="quantity">Price</label>
                <input type="number" id="price" name="price" class="form-control" required/>
            </div>
            <div class="py-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
            </div>
        </form>

        <div id="products">


        </div>


    </div>
  </div>

  </div>



  <script>
    let ajaxUri = (url, method,params = {}, callback = (req) => {}) => {
        let xhr = new XMLHttpRequest()
        xhr.onreadystatechange = (res) => {
            if(xhr.readyState == 4){
                callback(xhr)
            }
        }
        xhr.open(method, url)
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send(JSON.stringify(params))
    }

    function fetchProducts(){
        ajaxUri('products_view.php', "GET",{}, function(res){
            document.getElementById('products').innerHTML = res.responseText
        })
    }

    fetchProducts()


    document.getElementById('form').addEventListener('submit', function(e){
        e.preventDefault()

        let product_name_ele = document.getElementById('product_name'),
         price_ele = document.getElementById('price'),
         quantity_ele = document.getElementById('quantity');

        ajaxUri("store_product.php","POST", {
            product_name: product_name_ele.value,
            price: price_ele.value,
            quantity: quantity_ele.value,
            submit:true
        },function(){
            fetchProducts()
            product_name_ele.value = ''
            price_ele.value = ''
            quantity_ele.value = ''
        })

    })

  </script>
  </body>
</html>