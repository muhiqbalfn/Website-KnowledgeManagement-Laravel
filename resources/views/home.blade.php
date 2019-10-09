@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                @if(Auth::user()->level == 'admin')
                    <div class="panel-body">
                        Halaman admin !
                    </div>
                @else
                    <div class="panel-body">
                        Halaman user !
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection