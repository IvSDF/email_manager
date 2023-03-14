<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-5 offset-md-6 mt-5">
            <h4>SUCCESS</h4>
        </div>
        <div class="col-md-5 offset-md-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        Email from: {{ $data['email_from'] }}
                    </div>
                    <br>
                    <div class="list-group">
                        Email to: {{ $data['email_to'] }}
                    </div>
                    <br>
                    <div class="list-group">
                        Email CC: {{ $data['email_cc'] }}
                    </div>
                    <br>
                    <div class="list-group">
                        Subject: {{ $data['subject'] }}
                    </div>
                    <br>
                    <div class="list-group">
                            Type: @if( $data['type'] == 1)
                            Text @else
                            HTML @endif
                    </div>

                    <div class="list-group">
                            <label for="title" class="mt-3">Body:</label>
                        <div class="border col-md-16 mt-2">
                            @if($data['type'] == 1)
                                {{ $data['body'] }}
                            @else
                                <iframe class="col-md-6"
                                        srcdoc="{{ $data['body'] }}"
                                        src="demo_iframe_srcdoc.htm">
                                </iframe>
                            @endif
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
