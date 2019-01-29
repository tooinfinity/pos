      <div class="form-group">
          <label>first name</label>
          <input type="text" name="first_name" id="" class="form-control" value="{{ old('first_name') }}" required>
      </div>
      <div class="form-group">
          <label>last name</label>
          <input type="text" name="last_name" id="" class="form-control" value="{{ old('last_name') }}" required>
      </div>
      <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" id="" class="form-control" value="{{ old('email') }}" required>
      </div>
      <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" id="" class="form-control" required>
      </div>
      <div class="form-group">
          <label>Password Confirmation</label>
          <input type="password" name="password_confirmation" id="" class="form-control" required>
      </div>
      <div class="form-group">
          @include('dashboard.moderator.permission')
      </div>