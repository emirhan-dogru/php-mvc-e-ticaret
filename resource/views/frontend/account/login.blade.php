@extends('frontend.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-4">
                <h2>Login</h2>
                <form action="{{ base_url('giris-yap') }}" method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" placeholder="Email" class="form-control form-control-xs" name="email" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Password" class="form-control form-control-xs" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-outline-secondary btn-xs">Login</button>
                </form>
            </div>

            <div class="col-md-6 p-4">
                <h2>Register Now</h2>
                <form action="{{ base_url('uye-ol') }}" method="POST">
                    <div class="form-group">
                        <label>Name and Surname</label>
                        <input type="text" class="form-control form-control-xs" placeholder="Name and Surname"
                            name="name_surname" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-xs" placeholder="Email" name="email"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Birthdate</label>
                        <input type="date" class="form-control form-control-xs" name="birthdate" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control form-control-xs" name="passwordone"
                            placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label>Re Password</label>
                        <input type="password" class="form-control form-control-xs" name="passwordtwo"
                            placeholder="Re Password" required>
                    </div>

                    <div class="form-group">
                        <label>Choose Custom Question</label>
                        <select class="form-control form-control-xs" name="question_type" required>
                            <option value="">Seçiniz</option>
                            @foreach (questions() as $key => $value)
                                <option value="{{ $key }}"> {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Private Question Value</label>
                        <input type="text" class="form-control form-control-xs" placeholder="Private Question Value"
                            name="question_answer" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-xs">REGISTER</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('[name="passwordone"] , [name="passwordtwo"]').on('input', function() {
            const pass1 = $('[name="passwordone"]').val();
            const pass2 = $('[name="passwordtwo"]').val();

            if (pass1 === pass2) {
                $('[name="passwordone"]').css({
                    "border-color": "green"
                });

                $('[name="passwordtwo"]').css({
                    "border-color": "green"
                });
            } else {
                {
                    $('[name="passwordone"]').css({
                        "border-color": "red"
                    });

                    $('[name="passwordtwo"]').css({
                        "border-color": "red"
                    });
                }
            }
        })
    </script>
@endpush
