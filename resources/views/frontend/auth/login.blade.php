@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.frontend.auth.login_box_title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <form method="POST" action="{{ route('frontend.auth.login.post') }}"> 
                    @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control"
                                        placeholder="{{ __('validation.attributes.frontend.email') }}"
                                        maxlength="191"
                                        required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">{{ __('validation.attributes.frontend.password') }}</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control"
                                        placeholder="{{ __('validation.attributes.frontend.password') }}"
                                        required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" value="1" checked>
                                            {{ __('labels.frontend.auth.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('labels.frontend.auth.login_button') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        @if(config('access.captcha.login'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    <input type="hidden" name="captcha_status" value="true">
                                </div>
                            </div>
                        @endif
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group text-right">
                                    <a href="{{ route('frontend.auth.password.reset') }}">
                                        @lang('labels.frontend.passwords.forgot_password')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                @include('frontend.auth.includes.socialite')
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                </div><!--card body-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush
