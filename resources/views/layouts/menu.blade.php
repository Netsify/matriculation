<div align="center">Основное меню</div>
<hr>

<div class="card p-2 border-info mb-2" align="center">
    <a class="stretched-link" style="text-decoration: none" href="{{ route('adverts.index') }}">
        Объявления
    </a>
</div>

<div class="card p-2 border-info mb-2" align="center">
    <a class="stretched-link" style="text-decoration: none" href="{{ route('profiles.index') }}">
        Анкета
    </a>
</div>

<div class="card p-2 border-info mb-2" align="center">
    <a class="stretched-link" style="text-decoration: none" href="{{ route('documents.index') }}">
        Загрузка документов
    </a>
</div>

<div class="card p-2 border-info mb-5" align="center">
    <a class="stretched-link" style="text-decoration: none" href="">
        Контакты
    </a>
</div>

@if(Auth::user()->accessModeration())
    <div align="center">Дополнительно</div>
    <hr>
    <div class="card p-2 border-secondary mb-2" align="center">
        <a class="stretched-link" style="text-decoration: none" href="{{ route('adverts.create') }}">
            Новое объявление
        </a>
    </div>
@endif

@if(Auth::user()->accessAdministration())
    <div class="card p-2 border-danger mb-2" align="center">
        <a class="stretched-link" style="text-decoration: none" href="{{ route('users.index') }}">
            Абитуриенты
        </a>
    </div>
@endif
