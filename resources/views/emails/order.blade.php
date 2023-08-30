{{-- this is the actual email that will be sent --}}
<h1>Order Confirmation</h1>

<p>Thank you {{$user->name}} for your request to <strong>{{$details['user1']}}!</strong></p>
<p>You requested a <strong>"{{$details['serviceTitle']}}"</strong> with a price of <strong>{{$details['price']}}€</strong></p>
<p>These are your requirements:<br>
    {{$details['title']}}<br>
    {{$details['description']}}</p>