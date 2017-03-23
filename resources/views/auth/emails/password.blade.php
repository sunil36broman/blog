click here to reset your passsword:<br>
<a href="{{ $link= url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>