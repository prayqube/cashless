<?php
namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\models\transaction;

class TransactionsExportView implements FromView
{
    public function view(): View
    {
        return view('transaction.table', [
            'transactions' => Transaction::all()
        ]);
    }
}


?>