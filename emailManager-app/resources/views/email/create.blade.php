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
            <h4>Send Email</h4>
        </div>
        <div class="col-md-5 offset-md-4 mt-3">
            <form method="post" action="{{ route('email.sendEmail')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="mt-3">Email From</label>
                    <input type="email"
                           value="{{ old('email_from') }}"
                           name="email_from"
                           class="form-control mt-2 @error('email_from') is-invalid @enderror"
                           id="email_from"
                           aria-describedby=""
                           placeholder="Email from">
                    @error('email_from')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title" class="mt-3">Email to</label>
                    <input type="email"
                           value="{{ old('email_to') }}"
                           name="email_to"
                           class="form-control mt-2 @error('email_to') is-invalid @enderror"
                           id="email_to"
                           aria-describedby=""
                           placeholder="Email To">
                    @error('email_to')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title" class="mt-3">Email CC</label>
                    <input type="email"
                           value="{{ old('email_cc') }}"
                           name="email_cc"
                           class="form-control mt-2"
                           id="email_cc"
                           aria-describedby=""
                           placeholder="Email CC">
                </div>

                <div class="form-group">
                    <label for="title" class="mt-3">Subject</label>
                    <input type="text"
                           value="{{ old('subject') }}"
                           name="subject"
                           class="form-control mt-2 @error('subject') is-invalid @enderror"
                           id="subject"
                           aria-describedby=""
                           placeholder="Subject">

                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title" class="mt-3 col-6">Type</label>
                    <select name="type" class="form-group col-md-6 mt-3 @error('type') is-invalid @enderror" id="exampleSelectBorder">
                        <option disabled selected>-------</option>
                        <option {{ old('type') == 1 ? ' selected' : '' }} value="1">Text</option>
                        <option {{ old('type') == 2 ? ' selected' : '' }} value="2">HTML</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title" class="mt-3">Body</label>
                    <textarea
                        name="body"
                        class="form-control @error('body') is-invalid @enderror"
                        id="body"
                        cols="30"
                        rows="10">{{ old('body') }}</textarea>

                    @error('body')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Send Email</button>
            </form>

        </div>
    </div>

</div>

</body>
</html>
