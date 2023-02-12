@extends('layouts.app-main')

    <div class="container">
        <h1 class="text-center my-5">Cards</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Card Number</th>
                <th>Expiration Date</th>
                <th>CVV2</th>
                <th>Default</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cards as $card)
                <tr>
                    <td>{{ $card->card_number }}</td>
                    <td>{{ $card->expiration_date }}</td>
                    <td>{{ $card->cvv2 }}</td>
                    <td>{{ $card->default ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('cards.show', $card->id) }}" class="btn btn-primary">Show </a>
                        <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-secondary"> Edit </a>
                        <form action="{{ route('cards.destroy', $card->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('cards.default', $card->id) }}" class="btn btn-success"> Set Default </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            <a href="{{ route('cards.create') }}" class="btn btn-primary">Create Card</a>
        </div>
    </div>
