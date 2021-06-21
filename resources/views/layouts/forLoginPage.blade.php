<div class="container">
    <h1 class="page-title">Authorization</h1>

    <form class="logreg-group" method="POST">
        @csrf
        <div class="form-floating">
            <label for="floatingInput">Email</label>
            <input type="email" name="email" class="form-text_input @error('email') is-invalid @enderror" id="floatingInput">
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
        <p>If you don't have an account <a href="/register">press here for registration</a></p>

        <div class="form-button-group" role="group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>
