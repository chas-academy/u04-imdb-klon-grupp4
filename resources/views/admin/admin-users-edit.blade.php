<x-admin-layout class="mx-auto">
<div class="mx-auto w-2/3">
    <h1 class="text-center pt-32 pb-8 font-outfit text-2xl font-bold">
        EDIT USER
    </h1>
<form class="flex flex-col gap-1">
    <x-input-field id="name" placeholder="" value="{{ $fetchuser->username }}">Username:</x-input-field>
    <x-input-field id="name" placeholder="">Password:</x-input-field>
<x-input-field id="name" placeholder="" value="{{ $fetchuser->email}}">Email:</x-input-field>

<div class="flex flex-row gap-1 justify-end">
    <x-button variant="secondary" font="font-medium">Cancel</x-button>
    <x-button>Save</x-button>
</div>
</form>
</div>
</x-admin-layout>