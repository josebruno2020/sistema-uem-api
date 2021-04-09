@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            {{-- @php
                dd($errors->all());
            @endphp --}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif