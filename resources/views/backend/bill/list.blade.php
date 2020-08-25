@extends('backend.master.master')

@section('title','Bills List')

@section('content')
    <div class="container-fluid mt-5">
       
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Customer</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
            
                        <tbody>
            
                            @forelse ($bills as $key => $bill)
                                <tr>
                                    <td><a href="{{ route('bills.detail',$bill->id) }}">{{ $bill->id }}</a></td>
                                    <td>{{ $bill->customer->name }}</td>
                                    <td>{{ $bill->totalPrice }}</td>
                                   
                                </tr>
                            @empty
                                <tr>
                                    <td>No Data</td>
                                </tr>
                            @endforelse
                   
            
                        </tbody>
            
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection