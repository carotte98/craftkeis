{{-- this is the actual email that will be sent --}}
<h1>New Contact Form Submission</h1>

<p><strong>Customer Name:</strong> {{ $formData['name'] }}</p>
<p><strong>Customer Email:</strong> {{ $formData['email'] }}</p>
<p><strong>Message:</strong> 
<br>{{ $formData['message'] }}</p>
