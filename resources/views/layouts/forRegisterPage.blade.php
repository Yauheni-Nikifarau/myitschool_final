<div class="container">
    <h1 class="page-title">Registration</h1>

    <form class="logreg-group" method="POST">
        @csrf
        <div class="form-floating">
            <label for="floatingInput">Name</label>
            <input type="text" name="name" class="form-text_input @error('name') is-invalid @enderror"  value="{{ old('name') }}" id="floatingInput">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <label for="floatingInput">Surname</label>
            <input type="text" name="surname" class="form-text_input @error('surname') is-invalid @enderror"  value="{{ old('surname') }}" id="floatingInput">
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <label for="floatingInput">Email</label>
            <input type="email" name="email" class="form-text_input @error('email') is-invalid @enderror"  value="{{ old('email') }}" id="floatingInput">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating mt-3 mb-3">
            <label for="floatingInput">Password</label>
            <input type="password" name="password" class="form-text_input @error('password') is-invalid @enderror" id="floatingInput">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating mt-3 mb-3">
            <label for="floatingInput">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-text_input @error('password_confirmation') is-invalid @enderror" id="floatingInput">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <label for="floatingInput">Birth date</label>
            <input type="date" name="birth_date" class="form-text_input @error('birth_date') is-invalid @enderror"  value="{{ old('birth_date') }}" id="floatingInput">
            @error('birth_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-button-group" role="group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>
