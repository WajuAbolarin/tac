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
        <div class="entry-header py-3 my-2">
            <div class="entry-title text-center">
                <h4 style="color:black">TACN Metro Youth Seed Funding Challenge</h4>
                <p class="space-up">
                <span class="space">• Agriculture/Food</span>
                <span class="space">• Fashion Design/Decoration</span>
                <span class="space">• IT/Tech</span>
                </p>
            </div>            <!-- -->
        </div>
        <!-- -->
            <div class="entry-content pt-3 mt-4">
            <div class="row">
                <div class="col-xs-12 col-md-6 mx-auto">
                    <div class="alert alert-info d-none border-0 shadow-sm notification" id="notification" role="alert">
                    </div>
                </div>
                @if(session('message'))
                <div class="col-xs-12 col-md-8 mx-auto">
                    <div class="alert alert-success d-flex justify-content-between">
                        <p>{{session('message')}}</p> <span class="d-inline-block ml-auto mt-auto h4"> &check; </span>
                    </div>
                </div>
                @endif
                <div class="col-xs-12 col-md-8 mx-auto">
                    <form id="register-form" action="seed" method="POST" novalidate id="seed-form">
                        @csrf
                        <div class="row">
                            @foreach ($submission::Questions as $question)
                            <div class="col-xs-12 col-lg-12 form-group">
                                <label for="{{$question['index']}}">{{$question['question']}} </label>
                                <br>
                                <textarea name="{{$question['index']}}" class="form-control" maxlength="{{$question['chars']}}">{{old($question['index'])}}</textarea>
                            <span class="count text-success"></span>
                        </div>
                        @if($errors->has($question['index']))
                            <div class="mx-auto alert alert-danger" role="alert">
                                please answer this questions, with a max of {{$question['chars']}} characters
                            </div>
                        @endif

                            @endforeach
                        </div>
                        <div class="row mt-4">
                            <div class="col-xs-12 col-md-6 ml-md-auto mb-md-5">
                                <button type="submit" class="btn btn-block" role="submit"> SUBMIT &rarr;</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- row -->
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
