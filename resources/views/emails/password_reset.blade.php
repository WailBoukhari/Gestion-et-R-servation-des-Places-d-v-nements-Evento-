<x-mail::message>
    # Introduction

    You are receiving this email because we received a password reset request for your account.

    <x-mail::button :url="''">
        Reset Password

    </x-mail::button>
    If you did not request a password reset, no further action is required.

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
