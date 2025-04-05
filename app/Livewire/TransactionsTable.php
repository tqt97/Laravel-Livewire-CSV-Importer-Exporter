<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionsTable extends Component
{
    use WithPagination;

    public array $selectedIds = [];

    public array $selectPage = [];

    public function updatedSelectPage()
    {
        if (in_array($this->transactions->currentPage(), $this->selectPage)) {
            $this->selectedIds = array_values(
                array_unique(
                    array_merge(
                        $this->selectedIds,
                        $this->transactions->pluck('id')->map(fn ($id) => (string) $id)->toArray()
                    )
                )
            );
        } else {
            $this->selectedIds = array_values(
                array_filter($this->selectedIds, function ($id) {
                    return ! in_array($id, $this->transactions->pluck('id')->toArray());
                })
            );
        }
    }

    #[Computed()]
    public function transactions()
    {
        return Transaction::query()
            ->orderBy('date', 'desc')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.transactions-table', [
            'transactions' => $this->transactions,
        ]);
    }
}
