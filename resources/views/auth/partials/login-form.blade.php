<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
  {{ csrf_field() }}
  <label class="label">Email</label>
  <p class="control">
    <input id="email" name="email" type="email" class="input" required autofocus="">
  </p>
  <label class="label">Password</label>
  <p class="control">
    <input id="password" name="password" type="password" class="input" required>
  </p>
  <hr>
  <p class="control">
    <button class="button is-primary" type="submit">Login</button>
    <button class="button is-default">Cancel</button>
  </p>
</form>
