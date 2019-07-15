
	@component('mail::message')
	# Invoice Paid

	Your invoice has been paid!

	@component('mail::button', ['url' => $url])
	View Invoice
	@endcomponent

	Thanks,<br>
	{{ config('app.name') }}
	@endcomponent
