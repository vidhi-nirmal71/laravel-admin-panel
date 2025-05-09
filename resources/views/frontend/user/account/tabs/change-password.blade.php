<form method="PATCH" action="{{ route('frontend.auth.password.update') }}" class="form-horizontal">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="old_password">@lang('validation.attributes.frontend.old_password')</label>
                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="@lang('validation.attributes.frontend.old_password')" required autofocus>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="password">@lang('validation.attributes.frontend.password')</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="@lang('validation.attributes.frontend.password')" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="password_confirmation">@lang('validation.attributes.frontend.password_confirmation')</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="@lang('validation.attributes.frontend.password_confirmation')" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group mb-0 clearfix">
                <button type="submit" class="btn btn-primary">@lang('labels.general.buttons.update') @lang('validation.attributes.frontend.password')</button>
            </div>
        </div>
    </div>
</form>
