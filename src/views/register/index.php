<div class="d-flex justify-content-center align-items-center">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form method="POST" action="/registerUser">
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Type your Username..." required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Type your Email..." required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Type your Password..." required>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm your Password..." required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <p>Do have you an account? <a href="/login">Log In</a></p>
            </form>
        </div>
    </div>
</div>

