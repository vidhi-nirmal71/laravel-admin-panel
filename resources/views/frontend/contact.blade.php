@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.frontend.contact.box_title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <form method="POST" action="{{ route('frontend.contact.send') }}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">{{ __('validation.attributes.frontend.name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('validation.attributes.frontend.name') }}" maxlength="191" value="{{ optional(auth()->user())->name }}" required autofocus>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('validation.attributes.frontend.email') }}" maxlength="191" value="{{ optional(auth()->user())->email }}" required>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone">{{ __('validation.attributes.frontend.phone') }}</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="{{ __('validation.attributes.frontend.phone') }}" maxlength="191" required>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="message">{{ __('validation.attributes.frontend.message') }}</label>
                                    <textarea name="message" id="message" class="form-control" placeholder="{{ __('validation.attributes.frontend.message') }}" rows="3" required></textarea>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        @if(config('access.captcha.contact'))
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
                                    <button type="submit" class="btn btn-primary">{{ __('labels.frontend.contact.button') }}</button>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    </form>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush