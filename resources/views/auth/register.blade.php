@extends('layouts.main')
@section('content')
<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Creer un compte</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                                {{ $error }}
                        @endforeach
                    </div>
                @endif

            </div>
            <form action="{{route('user.register')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Prénom &amp; Nom</label>
                    <input class="form-control item" type="text" id="name" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="phone">Télephone</label>
                    <input class="form-control item" type="tel" name="phone" id="phone"  value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control item" type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation mot de passe</label>
                    <input class="form-control item" type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <button class="btn btn-primary btn-block" type="submit">S'inscrire</button>
        </form>
        </div>
    </section>
</main>
@endsection
