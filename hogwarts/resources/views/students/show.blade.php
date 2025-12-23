@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Student Details</h2>
    </div>
    <div class="card-body text-center">
        <h3>{{ $student->name }}</h3>
        <p><strong>Matricula:</strong> {{ $student->matricula }}</p>
        <p><strong>Age:</strong> {{ $student->age }}</p>
        <p><strong>Sex:</strong> {{ $student->sex }}</p>
        <p><strong>Blood Status:</strong> {{ $student->blood_status }}</p>

        <hr>

        <h4>House: {{ $student->house }}</h4>

        <div class="mt-4">
            @if($student->house == 'Grifinória')
<pre>
──▄▀▀▀▀▀───▄█▀▀▀█▄
──▐▄▄▄▄▄▄▄▄██▌▀▄▀▐██
──▐▒▒▒▒▒▒▒▒███▌▀▐███
───▌▒▓▒▒▒▒▓▒██▌▀▐██
 ───▌▓▐▀▀▀▀▌▓─▀▀
</pre>
            @elseif($student->house == 'Sonserina')
<pre>
   _______
  /       \
 /  _   _  \
 | (o) (o) |
 \    <    /
  \   ^   /
   \_____/
</pre>
            @elseif($student->house == 'Corvinal')
<pre>
   /\_/\
  ( o.o )
   > ^ <
</pre>
            @elseif($student->house == 'Lufa-Lufa')
<pre>
     _.---._    /\\
  ./'       "--`\//
./              o \
/./\  )______   \__ \
./  / /\ \   | \ \  \ \
   / /  \ \  | |\ \  \7
    "     "    "  "
</pre>
            @endif
        </div>

        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</div>
@endsection
