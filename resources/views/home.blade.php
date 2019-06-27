@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
        <div class="col-md-12 row-block">
            <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">
                <strong>Login With Facebook</strong>
            </a>     
        </div>
    </div>
</div>
@endsection
