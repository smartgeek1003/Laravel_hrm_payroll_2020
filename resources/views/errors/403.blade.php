@extends('administrator.master')
@section('title', __('Error 403'))

@section('main_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>403 {{ __('Error Page') }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
            <li class="active">404 {{ __('error') }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 403</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> {{ __('Oops! Forbidden') }}</h3>
                <p>{{ __('You don't have permission to access this page.') }}</p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
</div>
@endsection
