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
        <div class="col-md-5 offset-md-4 mt-5">
            <h4>SUCCESS</h4>
        </div>
        <div class="col-md-5 offset-md-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5>
                            Email from: {{ $data['email_from'] }}
                        </h5>
                    </div>
                    <br>
                    <div>
                        <h5>
                            Email to: {{ $data['email_to'] }}
                        </h5>
                    </div>
                    <br>
                    <div>
                        <h5>
                            Email CC: {{ $data['email_cc'] }}
                        </h5>
                    </div>
                    <br>
                    <div>
                        <h5>
                            Subject: {{ $data['subject'] }}
                        </h5>
                    </div>
                    <br>
                    <div>
                        <h5>
                            Type: @if( $data['type'] == 1)
                            Text @else
                            HTML @endif
                        </h5>
                    </div>

                    <div class="mt-4">
                        <h5>
                            Body:
                        </h5>
                        <div class="border-gray-500/50 col-md-6">
                            @if($data['type'] == 1)
                                <h5>
                                    {{ $data['body'] }}
                                </h5>
                            @else
                                <iframe srcdoc="{{ $data['body'] }}" src="demo_iframe_srcdoc.htm"></iframe>
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
