<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container">
      @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="/tweets/{{$tweet->id}}/edit" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
          <label for="tweet" style="padding-top:20px;"> Update Tweet</label>
          <br>
          <textarea name="tweet" id="tweet" style="width:300px; height:100px;">{{ $tweet->tweet }}</textarea>
          <br>
          <button type="submit" style="margin-top:10px;">Save</button>
        </div>
      </form>

    </div>

  </body>
</html>
