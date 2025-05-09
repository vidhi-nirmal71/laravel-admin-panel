@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.expired_password_box_title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.frontend.passwords.expired_password_box_title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <form method="PATCH" action="{{ route('frontend.auth.password.expired.update') }}" class="form-horizontal">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="old_password">@lang('validation.attributes.frontend.old_password')</label>
                                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="@lang('validation.attributes.frontend.old_password')" required>
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

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    <button type="submit" class="btn btn-primary">@lang('labels.frontend.passwords.update_password_button')</button>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    </form>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-6 -->
    </div><!-- row -->
@endsection
