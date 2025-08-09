@extends('layouts.master')
@section('main')

<script>
$.ajax({
    url: 'https://doneapp-api.rentalsprime.in/api/b2c/categories',
    type: 'GET',
    headers: {
        'Authorization': 'Bearer 4|fKPbhakBRSKiu1Z61dW6sGZCANBIiuEJpPHY284R9b67e616'
    },
    success: function(response) {
        console.log(response);
    },
    error: function(error) {
        console.error('Error fetching categories:', error);
    }
});
</script>
@endsection
