<!DOCTYPE html>
<html>
    @include('sub.head')
    <body class="skin-blue">
        @include('sub.header')

		<!-- =========================================================================== -->
        <div class="wrapper row-offcanvas row-offcanvas-left">
        		@include('sub.left-menu')
			<aside class="right-side">
			  <section class="content-header">  
		        @yield('konten-header')
		        <ol class="breadcrumb">
		            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li class="active">@yield('judul')</li>
		        </ol>
			    </section>
			    <!-- Main content -->
				<section class="content">
				    <!-- Small boxes -->
				    <div class="row" id="load-page">
				        @yield('konten')
				    </div>
				</section>
			</aside>
        </div>
        <!-- =========================================================================== -->
		@include('sub.footer')