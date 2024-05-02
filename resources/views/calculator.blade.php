<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
    <meta author="Othmane AMAL">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Calculator</h4>
                    </div>
                    <div class="card-body">

                        @if (Session::has('result'))
                            <div class="alert alert-success">
                                {{ Session::get('result') }}
                            </div>
                        @endif
                        <form action="{{ route('calculator.calculate') }}" method="POST">
                            @csrf
                            <div class="form-group

                                <label for="first_number">First
                                Number</label>
                                <input type="text" name="first_number" class="form-control" id="first_number">
                                @error('first_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="second_number">Second Number</label>
                                <input type="text" name="second_number" class="form-control" id="second_number">
                                @error('second_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                                <label for="operator">
                                Operator</label>
                                <select name="operator" id="operator" class="form-control">
                                    <option value="+">Add</option>
                                    <option value="-">Subtract</option>
                                    <option value="*">Multiply</option>
                                    <option value="/">Divide</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Calculate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
