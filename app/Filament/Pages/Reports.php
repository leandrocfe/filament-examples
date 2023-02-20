<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Pages\Page;

class Reports extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.reports';

    public $type;

    public $from;

    public $until;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make()->schema([

                Select::make('type')
                    ->options([
                        1 => 'List of users',
                        2 => 'Users grouped by email',
                    ])->required(),

                DateTimePicker::make('from'),
                DateTimePicker::make('until'),
            ])
                ->columns(3),

        ];
    }

    public function submit(): void
    {
    }
}
