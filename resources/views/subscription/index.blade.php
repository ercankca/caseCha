<!-- resources/views/subscriptions/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subscriptions</div>

                    <div class="card-body">
                        <a href="{{ route('subscription.create') }}" class="btn btn-primary mb-3">Create Subscription</a>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->name }}</td>
                                    <td>{{ $subscription->description }}</td>
                                    <td>{{ $subscription->price }}</td>
                                    <td>{{ $subscription->start_date }}</td>
                                    <td>{{ $subscription->end_date }}</td>
                                    <td>
                                        <a href="{{ route('subscription.edit', $subscription->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('subscription.destroy', $subscription->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subscription?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
