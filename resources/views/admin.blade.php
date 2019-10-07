@extends('template')


@section('content')
<!--TODO Verify functions-->
<div class="container">
    <table>
        <thead>
        <tr>
            <th>Nom du flux</th>
            <th>URL</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>HelloWorld</td>
            <td>http://...</td>
            <td>
                <a class="waves-effect waves-light btn modal-trigger" href="#modal-modify">Modify</a>
                <a class="waves-effect waves-light btn">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="section">
        <a class="btn-floating btn-large waves-effect waves-light teal"><i class="material-icons">add</i></a>

    </div>
</div>

<div class="modal" id="modal-modify">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>
@endsection
