<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Welcome to Our Shop</h1>

        <!-- Dropdown selection for branches -->
        <div class="dropdown mb-4">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="branchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if($branchId)
                    {{ $branches->where('id', $branchId)->first()->name }}
                @else
                    Select Branches
                @endif
            </button>
            <div class="dropdown-menu" aria-labelledby="branchDropdown">
                @foreach($branches as $branch)
                    <a class="dropdown-item" href="{{ route('shop.index', ['branch_id' => $branch->id]) }}">{{ $branch->name }}</a>
                @endforeach
            </div>
        </div>

        <div class="row">
            @foreach($inventoryItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text">Price: ${{ $item->price }}</p>
                            <a href="#" class="btn btn-primary" onclick="showProductModal('{{ $item->id }}', '{{ $item->name }}', '{{ $item->description }}', {{ $item->price }}, {{ $item->quantity }}, {{ $branchId }})">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination links -->
        <div class="row">
            <div class="col-md-12">
                {{ $inventoryItems->links() }}
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript to update dropdown text -->
    <script>
        // Function to show the modal with product details
        function showProductModal(id, name, description, price, quantity, branchId) {
            document.getElementById('productId').value = id;
            document.getElementById('productName').innerText = name;
            document.getElementById('productDescription').innerText = description;
            document.getElementById('productPrice').innerText = price;
            document.getElementById('productQuantity').innerText = quantity;
            document.getElementById('quantity').value = 1; // Reset quantity input to 1
            document.getElementById('totalPrice').innerText = price; // Reset total price to product price
            document.getElementById('branchId').value = branchId;
            $('#productModal').modal('show');
        }

        // Function to increment quantity
        function incrementQuantity() {
            var quantityElement = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityElement.value);
            quantityElement.value = currentQuantity + 1;
            calculateTotal();
        }

        // Function to decrement quantity
        function decrementQuantity() {
            var quantityElement = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityElement.value);
            if (currentQuantity > 1) {
                quantityElement.value = currentQuantity - 1;
                calculateTotal();
            }
        }

        // Function to calculate total price based on quantity input
        function calculateTotal() {
            var quantity = parseInt(document.getElementById('quantity').value);
            var price = parseFloat(document.getElementById('productPrice').innerText);
            var totalPrice = quantity * price;
            document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
        }

        // Function to handle buy now button click
        function buyProduct() {
            var productId = document.getElementById('productId').value;
            var quantity = parseInt(document.getElementById('quantity').value);
            var price = parseFloat(document.getElementById('productPrice').innerText);
            var branchId = document.getElementById('branchId').value;

            // AJAX request to order the product
            $.ajax({
                url: "{{ route('order.product') }}",
                type: "POST",
                data: {
                    productId: productId,
                    quantity: quantity,
                    price: price,
                    branchId: branchId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    // Show success message
                    alert("Order placed successfully. Order ID: " + response.orderID);
                    // Reload the page
                    location.reload();
                },
                error: function(xhr) {
                    // Add logic to handle errors, like showing an error message
                    console.log(xhr.responseText);
                }
            });
        }
    </script>

    <!-- Add this modal template to your existing HTML code -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="productName"></h5>
                    <p id="productDescription"></p>
                    <p>Price: $<span id="productPrice"></span></p>
                    <p>Current Quantity: <span id="productQuantity"></span></p>
                    <input type="hidden" id="productId">
                    <input type="hidden" id="branchId">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" onclick="decrementQuantity()">-</button>
                            </div>
                            <input type="text" class="form-control text-center" id="quantity" name="quantity" value="1" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="incrementQuantity()">+</button>
                            </div>
                        </div>
                    </div>
                    <p>Total Price: $<span id="totalPrice"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="buyProduct()">Order Now</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
