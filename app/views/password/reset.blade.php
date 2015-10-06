{{ isset($error)?$error:"" }}
<form action="{{ Route('do_reset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="c_mail" disabled="disabled" placeholder="Email" value="{{$user->email}}">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Password Confirmation">
    <input type="hidden" name="email" value="{{$user->email}}">
    <input type="submit" value="Reset Password">
</form>