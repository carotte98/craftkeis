<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // DEVELOPMENT DELETE LATER
    public function loginAsUser($userId)
    {
        $user = User::findOrFail($userId);
        Auth::login($user);

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::latest()->paginate(6),
        ]);
    }

    public function manageClient()
    {
        return view('orders.manageClient', ['orders' => auth()->user()->orderClient()->get()]);
    }

    public function manageCreator()
    {
        return view('orders.manageCreator', ['orders' => auth()->user()->orderCreator()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Service $service)
    {
        return view('orders.create', [
            'service' => $service
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id1' => 'required', // creator
            'user_id2' => 'required', // client
            'service_id' => 'required',
            'price' => 'required',
        ]);

        $formFields['order_status'] = 'pending';
        $formFields['completed_at'] = null;

        Order::create($formFields);

        ////// send order confirmation email
        // Fetch user names
        $user1 = User::find($formFields['user_id1']); //creator
        // $user2 = User::find($formFields['user_id2']); //client

        // Fetch service title
        $service = Service::find($formFields['service_id']);
        $serviceTitle = $service ? $service->title : 'Unknown Service';

        // send order confirmation email
        $currentLoggedUser = auth()->user();
        $detailsToMail = [
            'user1' => $user1->name,
            // 'user2' => $user2->name,
            'serviceTitle' => $serviceTitle,
            'price' => $formFields['price'],
            'title' => $formFields['title'],
            'description' => $formFields['description'],
        ];
        Mail::to($currentLoggedUser->email)->send(new OrderConfirmationMail($currentLoggedUser, $detailsToMail));

        //CREATE CONVERSATION BETWEEN USERS
        $user_id1 = $formFields['user_id1'];
        $user_id2 = $formFields['user_id2'];
        //If user does not write to himself then
        if ($user_id1 != $user_id2) {
            //In short, get that one specific conversation where user and contact is present
            $conversation = Conversation::where([
                ['user_id1', $user_id1],
                ['user_id2', $user_id2],
            ])->orWhere([
                ['user_id1', $user_id2],
                ['user_id2', $user_id1],
            ])->first();

            //If the conversation does not exist then create it
            if (!$conversation) {
                $conversation = Conversation::create([
                    'user_id1' => $user_id1,
                    'user_id2' => $user_id2,
                ]);
            }
        }

        // Create Logs in admin.log
        Log::channel('admin')->info(" New Order: Client_ID: $user_id2, Creator_ID $user_id1, Service: $serviceTitle");

        // return redirect('/')->with('message', 'Order created successfully');
    
        return redirect('/services/index')->with('message', 'Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    public function updateStatus(Request $request, Order $order)
    {
        if (Auth::user()->id !== $order->service->users->id) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        // the creator updates the status of the order
        $newStatus = $request->input('status');

        if ($newStatus === 'accepted' || $newStatus === 'declined' || $newStatus === 'finished' || $newStatus === 'paid') {
            if ($newStatus === 'paid') {
                
                //update, completed_at
                $order->completed_at = now();
                }
            $order->order_status = $newStatus;
            $order->save();

            // Create Logs in admin.log
            Log::channel('admin')->info("Service Status Update: Service: " . $order->title . " Status: $newStatus");

            return redirect()->back()->with('status', 'Order status updated successfully.');
        }

        // Create Logs in admin.log
        Log::channel('admin')->info("Service Status Update: Service: " . $order->title . " Status: FAILED");

        return redirect()->back()->withErrors('Invalid status update.');
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        // Create Logs in admin.log
        Log::channel('admin')->info("Service Status Deleted: Service: " . $order->title);

        return redirect(url()->previous())->with('message', 'Order deleted successfully');
    }
}
