@inject('submission', 'App\Submission')
@extends('layouts.app')
@section('title', 'The Apostolic Church Nigeria Abuja Metropolis Easter Youth Convocation')
@push('header-scripts')
<style>
.space{
    padding: 0 10px;
}
.space-up{
    padding-top: 20px;
}
</style>
<link rel="stylesheet" href="{{mix('css/app.css')}}">
<link rel="stylesheet" href="{{mix('css/seed.css')}}">
@endpush
@section('content')
<div class="main-content">
    <div class="container">
        <div class="entry-content pt-2 mt-3 px-auto d-flex justify-content-center">
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfjapMhSe2DmZ0cUCfkTJTE-fMb6YHwMbjXBmqMJC_APnzVOg/viewform?embedded=true" width="700" height="1024" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
        </div>
        <!-- entry-content -->
    </div>
    <!-- container -->
</div>
<!-- main-content -->
@endsection
@push('footer-scripts')
<script src="{{mix('js/submission.js')}}"></script>
@endpush
