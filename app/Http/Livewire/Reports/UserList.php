<?php

namespace App\Http\Livewire\Reports;

use App\Models\User;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class UserList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $from;

    public $until;

    public function render()
    {
        return view('livewire.reports.user-list');
    }

    protected function getTableQuery(): Builder
    {
        return User::select()
            ->when(
                $this->from,
                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
            )
            ->when(
                $this->until,
                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
            );
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('created_at')->datetime(),
        ];
    }
}
