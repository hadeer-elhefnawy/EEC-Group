<?php

namespace App\Http\Controllers;

use App\Category;
use App\Department;
use App\Section;
use App\Product;
use App\Order;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $orders = Order::with(['section', 'department', 'products', 'products.category'])->get();
        return view('orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $departments = Department::all();
        $sections = Section::all();
        $products = Product::all();


        // dd(auth()->user());
        return view('orders.create', compact("categories", "departments", "sections", "products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        // return $request->all();
        $prices = (array_column(array_values($request->items), 'price'));
        $quanties = (array_column(array_values($request->items), 'quantity'));
        $sub_totals = array_map(function ($prices, $quanties) {
            return $prices * $quanties;
        }, $prices, $quanties);

        $order = $request->only('department_id', 'section_id');
        $order['user_id'] = auth()->user()->id;
        $order['total_price'] = array_sum($sub_totals);
//        dd($order);
        $sectionName = Section::findorfail($request->section_id)->name;
        $order_product = array_values($request->items);
        $newOrder = new Order();
        $newOrder->fill($order);
        $newOrder->save();
        $newOrder->order_number = $sectionName . '-' . date('Y') . '-' . $newOrder->id;
        $newOrder->products()->attach($order_product, ['order_id' => $newOrder->id]);
        $newOrder->save();
        return redirect()->route('orders.index')
            ->with('success', 'orders has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        // $order->products()->detach($product->id);
        // dd('ok');
        $orders = order::with('items')->get();
        return view('orders.show', compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $categories = Category::all();
        $departments = Department::all();
        $sections = Section::all();
        $products = Product::all();
        return view('orders.edit', compact("categories", "departments", "sections", "products", 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // validation
        // return $request->all();
        $prices = (array_column(array_values($request->items), 'price'));
        $quanties = (array_column(array_values($request->items), 'quantity'));
        $sub_totals = array_map(function ($prices, $quanties) {
            return $prices * $quanties;
        }, $prices, $quanties);


//        dd($order);
        $sectionName = Section::findorfail($request->section_id)->name;
        $order_product = array_values($request->items);
        $newOrder = $order;
        $newOrder->order_number = $sectionName . '-' . date('Y') . '-' . $newOrder->id;
        $newOrder->department_id = $request->department_id;
        $newOrder->section_id = $request->section_id;
        $newOrder->total_price = array_sum($sub_totals);
        $newOrder->user_id = auth()->user()->id;
        $newOrder->products()->sync($order_product, ['order_id' => $newOrder->id]);
        $newOrder->save();
        return redirect()->route('orders.index')
            ->with('success', 'orders has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'order deleted successfully');
    }
}
