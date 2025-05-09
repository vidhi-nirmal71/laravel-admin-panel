<form method="POST" action="{{ route('frontend.user.profile.update') }}" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="avatar">{{ __('validation.attributes.frontend.avatar') }}</label>

                <div>
                    <input type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} /> Gravatar
                    <input type="radio" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} /> Upload

                    @foreach($logged_in_user->providers as $provider)
                        @if(strlen($provider->avatar))
                            <input type="radio" name="avatar_type" value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} /> {{ ucfirst($provider->provider) }}
                        @endif
                    @endforeach
                </div>
            </div><!--form-group-->

            <div class="form-group hidden" id="avatar_location">
                <input type="file" name="avatar_location" class="form-control-file">
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="first_name">{{ __('validation.attributes.frontend.first_name') }}</label>
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="{{ __('validation.attributes.frontend.first_name') }}" maxlength="191" required autofocus>
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="last_name">{{ __('validation.attributes.frontend.last_name') }}</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="{{ __('validation.attributes.frontend.last_name') }}" maxlength="191" required>
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    @if ($logged_in_user->canChangeEmail())
        <div class="row">
            <div class="col">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> @lang('strings.frontend.user.change_email_notice')
                </div>

                <div class="form-group">
                    <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('validation.attributes.frontend.email') }}" maxlength="191" required>
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    @endif

    <div class="row">
        <div class="col">
            <div class="form-group mb-0 clearfix">
                <button type="submit" class="btn btn-primary">{{ __('labels.general.buttons.update') }}</button>
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
</form>

@push('after-scripts')
    <script>
        $(function() {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });
    </script>
@endpush
