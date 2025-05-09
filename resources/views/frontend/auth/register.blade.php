@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.frontend.auth.register_box_title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <form method="POST" action="{{ route('frontend.auth.register.post') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="first_name">@lang('validation.attributes.frontend.first_name')</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="@lang('validation.attributes.frontend.first_name')" maxlength="191" required>
                                </div><!--col-->
                            </div><!--row-->

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="last_name">@lang('validation.attributes.frontend.last_name')</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="@lang('validation.attributes.frontend.last_name')" maxlength="191" required>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">@lang('validation.attributes.frontend.email')</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="@lang('validation.attributes.frontend.email')" maxlength="191" required>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">@lang('validation.attributes.frontend.password')</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="@lang('validation.attributes.frontend.password')" required>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password_confirmation">@lang('validation.attributes.frontend.password_confirmation')</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="@lang('validation.attributes.frontend.password_confirmation')" required>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        @if(config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    <input type="hidden" name="captcha_status" value="true">
                                </div><!--col-->
                            </div><!--row-->
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    <button type="submit" class="btn btn-primary">@lang('labels.frontend.auth.register_button')</button>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    </form>

                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                @include('frontend.auth.includes.socialite')
                            </div>
                        </div><!--/ .col -->
                    </div><!-- / .row -->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif
@endpush
