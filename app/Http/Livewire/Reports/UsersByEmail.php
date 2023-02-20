<?php

namespace App\Http\Livewire\Reports;

use App\Models\User;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class UsersByEmail extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $from;

    public $until;

    public function getTableRecordKey(Model $record): string
    {
        return uniqid();
    }

    public function render()
    {
        return view('livewire.reports.users-by-email');
    }

    protected function getTableQuery(): Builder
    {
        return User::selectRaw('domain, count(*) as total')
            ->when(
                $this->from,
                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
            )
            ->when(
                $this->until,
                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
            )
            ->groupBy('domain');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('domain'),
            Tables\Columns\TextColumn::make('total'),
        ];
    }
}
