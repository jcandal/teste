@extends('users.layout')

@section('content')
        <table class="table table-striped table-bordered" style="width:100%" id="user-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Criado em</th>
                </tr>
            </thead>
        </table>
@endsection
@section('scripts-app')
<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
            processing: true,
            serverSider: true,
            ajax: '{!! route('dataTableUser') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                decimal: ",",
                thousands: "."
            }
        });
    } );
</script>
@endsection