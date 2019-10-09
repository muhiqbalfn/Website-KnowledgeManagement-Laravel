@extends('layouts.app')

@section('content')
<!-- Automatic element centering using js -->
<div class="center">            
    <div class="headline text-center" id="time">
        <!-- Time auto generated by js -->
    </div><!-- /.headline -->
    
    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ asset('img/avatar5.png') }}" alt="user image"/>
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <div class="lockscreen-credentials">   

            <div class="input-group">
                <input type="password" class="form-control" placeholder="Go to home" disabled="true" />
                <div class="input-group-btn">
                    <a href="{{ url('/home') }}">
                        <button class="btn btn-flat"><i class="fa fa-arrow-right text-muted"></i></button>
                    </a>
                </div>
            </div>
        </div><!-- /.lockscreen credentials -->

    </div><!-- /.lockscreen-item -->

    <div class="lockscreen-link">
        <a href="login.html">Or sign in as a different user</a>
    </div>            
</div><!-- /.center -->
@endsection
