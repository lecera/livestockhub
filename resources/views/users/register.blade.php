<x-layout>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="signup-form">
            <form action="/register" method="POST">
                <div class="text-center">
                    <h2>Register</h2>
                    <p class="hint-text">Create yout account. It's free and only takes a minute.</p>
                </div>
                <div class="form-group mb-3">
                    <label for="fullname">Full Name<span style="color:rgb(199, 42, 42)">*</span></label>
                    <input type="text" name="fullname" class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" id="fullname" value="{{old('fullname')}}">
                    @if ($errors->has('fullname'))
                        <div class="invalid-feedback">{{ $errors->first('fullname') }}</div>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address<span style="color:rgb(199, 42, 42)">*</span></label>
                    <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" value="{{old('address')}}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="mobile_number">Mobile Number<span style="color:rgb(199, 42, 42)">*</span></label>
                    <input type="text" name="mobile_number" class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}" id="mobile_number" value="{{old('mobile_number')}}">
                    @if ($errors->has('mobile_number'))
                        <div class="invalid-feedback">{{ $errors->first('mobile_number') }}</div>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password<span style="color:rgb(199, 42, 42)">*</span></label>
                    <input type="text" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" value="{{old('password')}}">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="confirm_password">Confirm Password<span style="color:rgb(199, 42, 42)">*</span></label>
                    <input type="text" name="confirm_password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" id="confirm_password" value="{{old('confirm_password')}}">
                    @if ($errors->has('confirm_password'))
                        <div class="invalid-feedback">{{ $errors->first('confirm_password') }}</div>
                    @endif
                </div>
                <button class="btn btn-primary mb-3">Save</button>
            </form>
            {{-- <form method="POST" action="/register">
                @csrf
            
                <div>
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
            
                <div>
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
            
                <div>
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                </div>
            
                <div>
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </form> --}}
            
        </div>
    </div>
</x-layout>