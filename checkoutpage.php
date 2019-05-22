<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/main.css">
        <title>Checkout book</title>
</head>
<body>

        <h1 class="checkoutTitle">Checkout</h1>
        
        <section class="checkout-flex">
                <section>
                        <h5>Your books</h5>
                        <table class="table">
                                <thead>
                                        <tr>
                                                <th scope="col">ISBN</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td>1234567</td>
                                        </tr>
                                        <tr>
                                                <td>1234567</td>
                                        </tr>
                                        <tr>
                                                <td>1234567</td>
                                        </tr>
                                        <tr>
                                                <td>1234567</td>
                                        </tr>
                                        <tr>
                                                <td>1234567</td>
                                        </tr>
                                </tbody>
                        </table>
                </section>

        <form method="POST" class="form">
        <h5>Fill in your information</h5>

        <label for="customer_name">Name</label>
        <input type="text" name="customer_name">

        <label for="customer_address">Address</label>
        <input type="text" name="customer_address">

        <label for="customer_address">Phone</label>
        <input type="text" name="customer_phone">

        <label for="customer_address">Card Details</label>
        <input type="text" name="card_details">
        <div>
                <input type="checkbox" class="checkbox"> <div>Approve general terms and conditions * </div> <br>
        </div>
        <button type="submit" class="btn">Submit</button>
        
        </form>

        </section>

        <a href="uploadpage.php"><button type="button" class="btn btn-lg returnBtn">Go back</button></a>
    
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>