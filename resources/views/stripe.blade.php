<form action="/checkout" method="post">
    @csrf
    <input type="text" name="name" value="Test Customs 1">
    <input type="text" name="email" value="test@example.com">
    <button type="submit" class="btn btn-primary">Pay with Stripe</button>
</form>
