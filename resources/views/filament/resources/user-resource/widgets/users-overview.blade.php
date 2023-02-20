<x-filament::widget>
    <x-filament::card>
        My Custom Widget

        @if ($filters)
            <div>
                Filters applied: {{ var_export($filters) }}
            </div>
        @endif
    </x-filament::card>
</x-filament::widget>
