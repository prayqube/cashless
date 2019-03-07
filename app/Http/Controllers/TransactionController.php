<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Vendors;
use DB;
Use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Excel;
use View;
use App\models\Transaction;
use App\Exports\TransactionsExportView;

class TransactionController extends Controller
{

	public function index()
	{

		$transactions=Transaction::all();

return view('transaction/view')->with('transactions',$transactions);
	}



	 public function export(Request $request){
       
         ob_end_clean();
        ob_start();
         Excel::create('TransactionList', function($excel) use ($request) {

      return   $excel->sheet('Transactions', function($sheet) use($request) {
         $input = $request->all();

        $input = json_decode($input['transactions'], TRUE);
         $data[] = ['TransactionId', 'EventId', 'UserId', 'amount','TRansactionType','BankRefNo','Status','DateCreated'];
             if(count($input)>0)
         {
        foreach($input as $key )
        {
        $data[]=[$key['transaction_id'],$key['event_id'],$key['user_id'],$key['amount'],$key['type'],$key['bank_reference_number'],$key['status'],$key['date_created']];
        }
                
        }
        $sheet->fromArray($data, null, 'A1', false, false);

        });
        })->export('xls');

        // return Excel::download($data, 'Transaction.xlsx');


    }
    public function search(Request $request)
    {

   DB::enableQueryLog();
   $filters=$request->all();

$transactions = Transaction::where(function($q) use ($filters) {
    $q->Where('transaction_id', "like",'%'.$filters['transaction_id'].'%');
    $q->Where('event_id', "like",'%'.$filters['event_id'].'%');
        $q->Where('user_id', "like",'%'.$filters['user_id'].'%');
    $q->Where('transaction_ref_number', "like",'%'.$filters['tran_reference_no'].'%');
    $q->Where('bank_reference_number', "like",'%'.$filters['bank_reference_no'].'%');
    $q->Where('amount', "like",'%'.$filters['amount'].'%');
    $q->Where('type', "like",'%'.$filters['transaction_type'].'%');
    $q->Where('status', "like",'%'.$filters['status'].'%');
    $q->Where('date_created', "like",'%'.$filters['date_created'].'%');
	})->get();
    return View::make('transaction.view')
                    ->with('transactions',$transactions);
                        
    }
}
?>