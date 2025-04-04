<x-admin-layout class="mx-auto">
<div class="mx-auto w-2/3">
    <h1 class="text-center pt-32 pb-8 font-outfit text-2xl font-bold">
        EDIT USER
    </h1>
<form class="flex flex-col gap-1" method="POST" action="{{ route('admin.admin-users-update', $fetchuser->username) }}">
    @csrf
     {{method_field('PUT')}}
    <x-input-field id="name" placeholder="" value="{{ $fetchuser->username }}">Username:</x-input-field>
    <x-input-field id="password" placeholder="">Password:</x-input-field>
<x-input-field id="email" placeholder="" value="{{ $fetchuser->email}}">Email:</x-input-field>

<div class="flex flex-row gap-1 justify-end">
    <x-button variant="secondary" font="font-medium"><a href="{{ route('admin.admin-users-index') }}">Cancel</a></x-button>
    <x-button>Save</x-button>
</div>
</form>
</div>
</x-admin-layout>