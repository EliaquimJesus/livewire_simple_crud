<div class="card p-5">

    <p class="mb-3">Contacts</p>

    @foreach($contacts as $contact)
    <div class="card p-3 mb-1">
        <div class="row">
            <div class="col">Name: {{ $contact->name }}</div>
            <div class="col">Email: {{ $contact->email }}</div>
            <div class="col">Phone: {{ $contact->phone }}</div>
        </div>
    </div>
    @endforeach

</div>