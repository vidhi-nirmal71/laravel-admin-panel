@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.change_password'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<form method="POST" action="{{ route('admin.auth.user.change-password.post', $user) }}" class="form-horizontal">
    @csrf
    @method('PATCH')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.users.management')
                        <small class="text-muted">@lang('labels.backend.access.users.change_password')</small>
                    </h4>

                    <div class="small text-muted">
                        @lang('labels.backend.access.users.change_password_for', ['user' => $user->name])
                    </div>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        <label for="password" class="col-md-2 form-control-label">{{ __('validation.attributes.backend.access.users.password') }}</label>
                        <div class="col-md-10">
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.password') }}" required autofocus>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="password_confirmation" class="col-md-2 form-control-label">{{ __('validation.attributes.backend.access.users.password_confirmation') }}</label>
                        <div class="col-md-10">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('validation.attributes.backend.access.users.password_confirmation') }}" required>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{ route('admin.auth.user.index') }}" class="btn btn-secondary">{{ __('buttons.general.cancel') }}</a>
                </div><!--col-->

                <div class="col text-right">
                    <button type="submit" class="btn btn-primary">{{ __('buttons.general.crud.update') }}</button>
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
</form>
@endsection
