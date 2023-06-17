{{--  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>  --}}
<form>
    <div class="mb-2">
        <label for="nom" class="form-label">nom :</label>
        <input value="{{ $user->nom }}" id="nom" type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"/>
        @error("nom")
              <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-2">
        <label for="prenom" class="form-label">prénom :</label>
        <input id="prenom" type="text" name="prenom" class="form-control"/>
        @error("prenom")
             <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-2">
        <label for="phone" class="form-label">phone :</label>
        <input id="phone" type="text" name="phone" class="form-control"/>
        @error("phone")
             <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-2">
        <label for="email" class="form-label">email :</label>
        <input id="email" type="email" name="email" class="form-control"/>
        @error("email")
             <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-2">
        <label for="password" class="form-label">neauvau mot de pass :</label>
        <input id="password" type="password" name="password" class="form-control"/>
        @error("password")
             <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-2">
        <?php $img = auth()->user()->img; ?>
        <img width="220" height="180" src="{{ asset('assets/img/profile').'/'.$img }}"/> <br/>
        <label for="img" class="form-label mt-1">image :</label>
        <input id="img" type="file" name="img" class="form-control"/>
    </div>
    <div class="mb-2">
        <a class="btn btn-primary">modifier</a>
        <a href="javascript:history.go(-1)" class="btn btn-light">cancel</a>
    </div>
</form>
