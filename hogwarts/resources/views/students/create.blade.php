@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Sorting Hat Ceremony</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <h4>Student Information</h4>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="matricula" class="form-label">Matricula (ID)</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="mb-3">
                <label for="sex" class="form-label">Sex</label>
                <input type="text" class="form-control" id="sex" name="sex" required>
            </div>
            <div class="mb-3">
                <label for="blood_status" class="form-label">Blood Status (Pure-blood/Muggle-born/etc)</label>
                <input type="text" class="form-control" id="blood_status" name="blood_status" required>
            </div>

            <hr>
            <h4>Sorting Hat Questions</h4>

            <div class="mb-3">
                <label class="form-label">1. Qual dessas qualidades você mais valoriza?</label>
                <select class="form-select" name="q1" required>
                    <option value="1">Coragem</option>
                    <option value="2">Ambição</option>
                    <option value="3">Inteligência</option>
                    <option value="4">Lealdade</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">2. Qual dessas criaturas mágicas você prefere?</label>
                <select class="form-select" name="q2" required>
                    <option value="1">Fênix</option>
                    <option value="2">Serpente</option>
                    <option value="3">Coruja</option>
                    <option value="4">Texugo</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">3. Qual dessas matérias você mais gosta?</label>
                <select class="form-select" name="q3" required>
                    <option value="1">Defesa Contra as Artes das Trevas</option>
                    <option value="2">Poções</option>
                    <option value="3">Feitiços</option>
                    <option value="4">Herbologia</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">4. Qual dessas lugares você preferiria explorar?</label>
                <select class="form-select" name="q4" required>
                    <option value="1">A Floresta Proibida</option>
                    <option value="2">As Masmorras</option>
                    <option value="3">A Torre da Corvinal</option>
                    <option value="4">A cozinha dos elfos domésticos</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">5. Qual dessas palavras melhor descreve você?</label>
                <select class="form-select" name="q5" required>
                    <option value="1">Destemido</option>
                    <option value="2">Astuto</option>
                    <option value="3">Sábio</option>
                    <option value="4">Trabalhador</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Let the Sorting Hat Decide!</button>
        </form>
    </div>
</div>
@endsection
