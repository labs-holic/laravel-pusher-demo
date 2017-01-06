<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
  {{ csrf_field() }}
  <label class="label">Name</label>
  <p class="control">
    <input id="name" name="name" class="input" type="text" required autofocus>
  </p>
  <label class="label">Email</label>
  <p class="control">
    <input id="email" name="email" type="email" class="input" required>
  </p>
  <hr>
  <label class="label">Password</label>
  <p class="control">
    <input id="password" name="password" class="input" type="password" required>
  </p>
  <label class="label">Confirm password</label>
  <p class="control">
    <input id="password-confirm" name="password_confirmation" type="password" class="input" required>
  </p>
  <hr>
  <p class="control">
    <button class="button is-primary" type="submit">Register</button>
    <button class="button is-default">Cancel</button>
  </p>
</form>
