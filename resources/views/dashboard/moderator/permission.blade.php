
      <div class="card">
            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">Moderator Permission</h3>
              @php
                  $models = ['moderator', 'category', 'product'];
                  $maps = ['create', 'read', 'update', 'delete'];
              @endphp
              <ul class="nav nav-pills ml-auto p-2">
                @foreach ($models as $index=>$model)
                  <li class="nav-item"><a class="nav-link {{ $index == 0 ? 'active' :'' }}" href="#{{ $model }}" data-toggle="tab">{{ $model }}</a></li>
                @endforeach
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                @foreach ($models as $index=>$model)
                  <div class="tab-pane  {{ $index == 0 ? 'active' :'' }}" id="{{ $model }}">
                    @foreach ($maps as $map)
                      <label><input type="checkbox" name="permissions[]" value="{{ $map .'_'. $model }}">{{ $map }}</label>
                    @endforeach
                  </div>
                @endforeach
                
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>