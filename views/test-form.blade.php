@extends('layout')
@section('content')
<form method="post" action="amar/nam">
    <input name="username" type="text" placeholder="Username" value="<?php if(isset($input['username'])) echo $input['username']; ?>"><br>
    <input name="password" type="text" placeholder="Password" value="<?php if(isset($input['password'])) echo $input['password']; ?>"><br>
    <input type="submit" value="submit"><br>
</form>
    @endsection