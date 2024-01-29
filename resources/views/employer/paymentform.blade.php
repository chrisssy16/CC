<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
    <!-- Include Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <h1>Payment Form</h1>
    <!-- Display bid details -->
    <p>Job Title: {{ $bid->job_title }}</p>
    <p>Price: ${{ $bid->price }}</p>
    
    <!-- Stripe Checkout Button -->
    <button id="checkout-button">Initiate Payment</button>

    <!-- JavaScript to handle Stripe Checkout -->
    <script>
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var checkoutButton = document.getElementById('checkout-button');

        checkoutButton.addEventListener('click', function() {
            // Create a Checkout session with the bid price
            stripe.redirectToCheckout({
                lineItems: [{
                    price: '{{ $bid->stripe_price_id }}', // Stripe Price ID
                    quantity: 1
                }],
                mode: 'payment',
                successUrl: '{{ route('payment.success') }}', // Redirect URL on successful payment
                cancelUrl: '{{ route('payment.cancel') }}' // Redirect URL if payment is canceled
            });
        });
    </script>
</body>
</html>
