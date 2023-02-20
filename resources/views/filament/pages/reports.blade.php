<x-filament::page>
    <form wire:submit.prevent="submit" class="space-y-8">
        <x-filament::card>

            {{ $this->form }}

            <x-filament::button type="submit" form="submit">
                Submit
            </x-filament::button>

        </x-filament::card>

        @if ($type === '1')
            <!-- user list -->
            <livewire:reports.user-list key="{{ now() }}" :from="$from" :until="$until" />
        @endif

        @if ($type === '2')
            <!-- total users by email (domain) -->
            <livewire:reports.users-by-email key="{{ now() }}" :from="$from" :until="$until" />
        @endif

    </form>
</x-filament::page>
