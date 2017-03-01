<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Tweet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Tweet</th>
            </tr>
            </thead>
              <tr>
                <td>{{ $tweet->tweet }}</td>
              </tr>
        </table>
        <button style="padding:10px;"><a href="/tweets/{{$tweet->id}}/edit"> Update Tweet </a> </button>
        <br>
        <br>
      <button>  <a href="/" class="btn">Back to tweets</a> </button>

    </div>

</body>
</html>
