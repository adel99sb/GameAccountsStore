<?php

namespace App\Http\Controllers;

use App\Models\BoostOrder;
use App\Models\CoachingOrder;
use App\Models\WinsOrder;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $boostOrders = BoostOrder::all();
        $coachingOrders = CoachingOrder::all();
        $winsOrders = WinsOrder::all();

        return view('orders.index', compact('boostOrders', 'coachingOrders', 'winsOrders'));
    }

    public function boostOrders()
    {
        $boostOrders = BoostOrder::all();
        return view('orders.boost_orders', compact('boostOrders'));
    }

    public function coachingOrders()
    {
        $coachingOrders = CoachingOrder::all();
        return view('orders.coaching_orders', compact('coachingOrders'));
    }

    public function winsOrders()
    {
        $winsOrders = WinsOrder::all();
        return view('orders.wins_orders', compact('winsOrders'));
    }

    public function getOrdersByUserId($userId)
    {
        $boostOrders = BoostOrder::where('user_id', $userId)->get();
        $coachingOrders = CoachingOrder::where('user_id', $userId)->get();
        $winsOrders = WinsOrder::where('user_id', $userId)->get();

        return view('orders.index', compact('boostOrders', 'coachingOrders', 'winsOrders'));
    }

    public function getOrdersByEmployeeId($employeeId)
    {
        $boostOrders = BoostOrder::where('employee_id', $employeeId)->get();
        $coachingOrders = CoachingOrder::where('employee_id', $employeeId)->get();
        $winsOrders = WinsOrder::where('employee_id', $employeeId)->get();

        return view('orders.index', compact('boostOrders', 'coachingOrders', 'winsOrders'));
    }

    public function updateOrderStatus($orderId, $type, $status)
    {
        $order = null;

        if ($type === 'boost') {
            $order = BoostOrder::findOrFail($orderId);
        } elseif ($type === 'coaching') {
            $order = CoachingOrder::findOrFail($orderId);
        } elseif ($type === 'wins') {
            $order = WinsOrder::findOrFail($orderId);
        }

        if ($order) {
            $order->status = $status;
            $order->save();

            if ($status == 'completed' && $order->employee_id) {
                $employee = User::find($order->employee_id);
                $employee->balance += $order->price * 0.10;
                $employee->save();
            }

            return redirect()->back()->with('success', 'Order status updated successfully');
        }

        return redirect()->back()->with('error', 'Order not found');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'game_name' => 'required|string',
            'platform' => 'required|string',
            'region' => 'required|string',
            'start_tier' => 'sometimes|string',
            'start_division' => 'sometimes|string',
            'desired_tier' => 'sometimes|string',
            'desired_division' => 'sometimes|string',
            'number_of_hours' => 'sometimes|integer',
            'number_of_wins' => 'sometimes|integer',
            'roll' => 'sometimes|string|nullable',
            'is_streaming' => 'required|boolean',
            'is_solo' => 'required|boolean',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'type' => 'required|string|in:boost,coaching,wins',
        ]);

        if ($data['type'] === 'boost') {
            BoostOrder::create($data);
        } elseif ($data['type'] === 'coaching') {
            CoachingOrder::create($data);
        } elseif ($data['type'] === 'wins') {
            WinsOrder::create($data);
        }

        return redirect()->back()->with('success', 'Order placed successfully');
    }
}
