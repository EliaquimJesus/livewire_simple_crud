<div class="card p-5">

    <p class="mb-3">Contacts</p>

    @if($contacts->count() === 0)
    <div class="opacity-50">☹️ No contacts found</div>
    @else

    @foreach($contacts as $contact)
    <div class="card bg-dark p-3 mb-1">
        <div class="row">
            <div class="col">Name: {{ $contact->name }}</div>
            <div class="col">Email: {{ $contact->email }}</div>
            <div class="col">Phone: {{ $contact->phone }}</div>
            <div class="col">
                <a href="{{ route('contacts.edit', ['id' => encrypt($contact->id)]) }}"
                    class="btn btn-sm btn-success">Update</a>
                <a href="{{ route('contacts.delete', ['id' => encrypt($contact->id)]) }}"
                    class="btn btn-sm btn-danger">Delete</a>
            </div>
        </div>
    </div>
    @endforeach

    @endif

</div>