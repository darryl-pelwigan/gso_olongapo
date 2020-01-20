@if (!$errors->isEmpty())
  <div class="callout callout-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (Session::has('info'))
  <div class="callout callout-info">
    <ul>
      @foreach (Session::get('info') as $info)
        <li>{{ $info }}</li>
      @endforeach
    </ul>
  </div>
@endif