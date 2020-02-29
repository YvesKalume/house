@extends('layouts.main')
@section('content')
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Se connecter</h2>
            </div>
            <form action="{{route('user.login')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="phone">Télephone</label>
                    <input class="form-control item" name="phone" type="tel" id="phone" value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" name="password" type="password" id="password">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember_me">
                        <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Connexion</button>
            </form>
        </div>
    </section>
</main>
@endsection
