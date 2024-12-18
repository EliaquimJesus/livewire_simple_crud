<div>
    <div class="text-center my-5">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="128px">
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                @livewire('form-contact')
            </div>

            <div class="col-md-8">
                @livewire('contacts')
            </div>

        </div>
    </div>
</div>